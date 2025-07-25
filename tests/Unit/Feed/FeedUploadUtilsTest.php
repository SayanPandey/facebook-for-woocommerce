<?php
/** Copyright (c) Facebook, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FacebookCommerce
 */

 require_once __DIR__ . '/FeedDataTestBase.php';

/**
 * Class FeedUploadUtilsTest
 */
class FeedUploadUtilsTest extends FeedDataTestBase {

	/* ------------------ Test Methods ------------------ */

	public function test_get_ratings_and_reviews_data_valid_review() {
		// Create a product.
		$product_id = self::factory()->post->create( [
			'post_type'   => 'product',
			'post_status' => 'publish',
			'post_title'  => 'Test Product',
			'post_name'   => 'test-product'
		] );
		update_post_meta( $product_id, '_sku', 'SKU123' );

		// Create a review comment.
		$comment_id = self::factory()->comment->create( [
			'comment_post_ID' => $product_id,
			'comment_type'    => 'review',
			'comment_date'    => '2023-10-01 10:00:00',
			'comment_content' => 'Awesome product!',
			'comment_author'  => 'John Doe',
			'user_id'         => 0,
		] );
		update_comment_meta( $comment_id, 'rating', 5 );

		//Query arguments to fetch R&R data
		$query_args = array(
			'status'       => 'approve',
			'post_type'    => 'product',
			'comment_type' => 'review',
		);

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_ratings_and_reviews_data( $query_args );

		$expected_review = [
			'aggregator'                      => 'woocommerce',
			'store.name'                      => 'Test Store',
			'store.id'                        => '123456789',
			'store.storeUrls'                 => "['https://example.com/shop/']",
			'review_id'                       => (string) $comment_id,
			'rating'                          => 5,
			'title'                           => null,
			'content'                         => 'Awesome product!',
			'created_at'                      => '2023-10-01 10:00:00',
			'updated_at'                      => null,
			'review_image_urls'               => null,
			'incentivized'                    => 'false',
			'has_verified_purchase'           => 'false',
			'reviewer.name'                   => 'John Doe',
			'reviewer.reviewerID'             => "0",
			'reviewer.isAnonymous'            => 'true',
			'product.name'                    => 'Test Product',
			'product.url'                     => 'https://example.com/product/test-product',
			'product.productIdentifiers.skus' => "['SKU123']",
		];

		$this->assertCount( 1, $result, 'Expected one review returned.' );
		$this->assertEquals( $expected_review, $result[0], 'Review output does not match expected data.' );
	}

	public function test_get_ratings_and_reviews_data_non_product_review() {
		// Create a non-product post.
		$post_id = self::factory()->post->create( [
			'post_type'   => 'post',
			'post_status' => 'publish',
			'post_title'  => 'Non Product Post',
			'post_name'   => 'non-product-post'
		] );

		// Create a comment for the non-product.
		$comment_id = self::factory()->comment->create( [
			'comment_post_ID' => $post_id,
			'comment_date'    => '2023-10-01 10:00:00',
			'comment_content' => 'This comment is not associated with a product.',
			'comment_author'  => 'Jane Doe',
			'user_id'         => 2,
		] );
		update_comment_meta( $comment_id, 'rating', 4 );

		//Query arguments to fetch R&R data
		$query_args = array(
			'status'       => 'approve',
			'post_type'    => 'product',
			'comment_type' => 'review',
		);

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_ratings_and_reviews_data( $query_args );
		$this->assertEmpty( $result, 'Expected no review for a non-product comment.' );
	}

	public function test_get_ratings_and_reviews_data_no_rating_review() {
		// Create a product.
		$product_id = self::factory()->post->create( [
			'post_type'   => 'product',
			'post_status' => 'publish',
			'post_title'  => 'Test Product 300',
			'post_name'   => 'test-product-300'
		] );
		update_post_meta( $product_id, '_sku', 'SKU300' );

		// Create a comment without a valid rating.
		$comment_id = self::factory()->comment->create( [
			'comment_post_ID' => $product_id,
			'comment_type'    => 'review',
			'comment_date'    => '2023-10-01 10:00:00',
			'comment_content' => 'I did not rate this product.',
			'comment_author'  => 'Alice',
			'user_id'         => 3,
		] );

		//Query arguments to fetch R&R data
		$query_args = array(
			'status'       => 'approve',
			'post_type'    => 'product',
			'comment_type' => 'review',
		);

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_ratings_and_reviews_data( $query_args );
		$this->assertEmpty( $result, 'Expected no review when rating is missing.' );
	}

	public function test_get_ratings_and_reviews_data_invalid_product() {
		// Create a comment referring to a non-existent product.
		$invalid_product_id = 999999;
		$comment_id         = self::factory()->comment->create( [
			'comment_post_ID' => $invalid_product_id,
			'comment_type'    => 'review',
			'comment_date'    => '2023-10-01 12:00:00',
			'comment_content' => 'Product does not exist.',
			'comment_author'  => 'Bob',
			'user_id'         => 4,
		] );
		update_comment_meta( $comment_id, 'rating', 3 );

		//Query arguments to fetch R&R data
		$query_args = array(
			'status'       => 'approve',
			'post_type'    => 'product',
			'comment_type' => 'review',
		);

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_ratings_and_reviews_data( $query_args );
		$this->assertEmpty( $result, 'Expected no review for comment with invalid product.' );
	}

	public function test_get_coupons_data_valid_coupon_with_target_product() {
		// Create a target product.
		$product1 = new WC_Product_Simple();
		$product1->set_name('Included Product 1');
		$product1->set_slug('included-product-1');
		$product1->set_status('publish');
		$product1->set_sku('product-sku-1');
		$product1->save();
		$included_product1 = $product1->get_id();

		// Create a coupon with a valid coupon code.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'COUPON-CODE-1',
		]);
		// Set coupon meta so that it is valid and a percentage discount.
		update_post_meta( $coupon_id, 'discount_type', 'percent' );
		update_post_meta( $coupon_id, 'coupon_amount', '15' ); // 15% discount
		update_post_meta( $coupon_id, 'free_shipping', 'no' );
		update_post_meta( $coupon_id, 'usage_limit', '' );
		update_post_meta( $coupon_id, 'limit_usage_to_x_items', '' );
		update_post_meta( $coupon_id, 'maximum_amount', '' );
		update_post_meta( $coupon_id, 'email_restrictions', array() );
		update_post_meta( $coupon_id, 'product_ids', array( $product1->get_id() ) );
		update_post_meta( $coupon_id, 'usage_count', 2 );
		// Stored as 'yes'/'no' in post data. See update_post_meta in WC_Coupon_Data_Store_CPT
		update_post_meta( $coupon_id, 'exclude_sale_items', wc_bool_to_string( true ) );

		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1, // retrieve all items
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data( $query_args );

		// Verify that one coupon is returned.
		$this->assertCount( 1, $result, 'Should have returned one coupon in the feed data.' );
		$coupon_data = $result[0];

		// Build the expected coupon shape according to how FeedUploadUtils outputs the data.
		$expected_coupon = [
			'offer_id'                              => $coupon_id,              // coupon ID as an integer
			'title'                                 => 'COUPON-CODE-1',         // uppercase coupon post title
			'value_type'                            => 'PERCENTAGE',
			'percent_off'                           => '15',                    // as a string
			'fixed_amount_off'                      => '',                      // empty string output
			'application_type'                      => 'BUYER_APPLIED',
			'target_type'                           => 'LINE_ITEM',
			'target_granularity'                    => 'ITEM_LEVEL',
			'target_selection'                      => 'SPECIFIC_PRODUCTS',
			'start_date_time'                       => $coupon_data['start_date_time'], // use the output from the coupon post date/time
			'end_date_time'                         => '',
			'coupon_codes'                          => ['COUPON-CODE-1'],
			'public_coupon_code'                    => '',
			'target_filter'                         => '{"or":[{"retailer_id":{"eq":"product-sku-1_'.$product1->get_id().'"}}]}',
			'target_product_retailer_ids'           => '',
			'target_product_group_retailer_ids'     => '',
			'target_product_set_retailer_ids'       => '',
			'redeem_limit_per_user'                 => 0,
			'min_subtotal'                          => '',
			'min_quantity'                          => '',
			'offer_terms'                           => '',
			'redemption_limit_per_seller'           => 0,
			'target_quantity'                       => '',
			'prerequisite_filter'                   => '',
			'prerequisite_product_retailer_ids'     => '',
			'prerequisite_product_group_retailer_ids' => '',
			'prerequisite_product_set_retailer_ids'   => '',
			'exclude_sale_priced_products'          => 'YES',
			'target_shipping_option_types'          => '',
			'usage_count' => 2,
		];

		// Assert that the coupon data exactly matches the expected shape.
		$this->assertEquals( $expected_coupon, $coupon_data, 'Coupon feed data does not match expected data structure.' );
	}

	public function test_get_coupons_data_valid_shipping_coupon() {
		// Create a coupon with a valid coupon code.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'COUPON-CODE-1',
		]);
		// Set coupon meta with free_shipping => yes
		update_post_meta( $coupon_id, 'discount_type', 'fixed_cart' );
		update_post_meta( $coupon_id, 'coupon_amount', '0' );
		update_post_meta( $coupon_id, 'free_shipping', 'yes' );
		update_post_meta( $coupon_id, 'usage_limit', '' );
		update_post_meta( $coupon_id, 'limit_usage_to_x_items', '' );
		update_post_meta( $coupon_id, 'maximum_amount', '' );
		update_post_meta( $coupon_id, 'email_restrictions', array() );
		update_post_meta( $coupon_id, 'exclude_sale_items', wc_bool_to_string( false ) );


		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1, // retrieve all items
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data( $query_args );

		// Verify that one coupon is returned.
		$this->assertCount( 1, $result, 'Should have returned one coupon in the feed data.' );
		$coupon_data = $result[0];

		// Build the expected coupon shape according to how FeedUploadUtils outputs the data.
		$expected_coupon = [
			'offer_id'                              => $coupon_id,              // coupon ID as an integer
			'title'                                 => 'COUPON-CODE-1',         // uppercase coupon post title
			'value_type'                            => 'PERCENTAGE',
			'fixed_amount_off'                      => '0',                      // empty string output
			'percent_off'                           => '100',                    // as a string
			'application_type'                      => 'BUYER_APPLIED',
			'target_type'                           => 'SHIPPING',
			'target_granularity'                    => 'ORDER_LEVEL',
			'target_selection'                      => 'ALL_CATALOG_PRODUCTS',
			'start_date_time'                       => $coupon_data['start_date_time'], // use the output from the coupon post date/time
			'end_date_time'                         => '',
			'coupon_codes'                          => ['COUPON-CODE-1'],
			'public_coupon_code'                    => '',
			'target_filter'                         => '',
			'target_product_retailer_ids'           => '',
			'target_product_group_retailer_ids'     => '',
			'target_product_set_retailer_ids'       => '',
			'redeem_limit_per_user'                 => 0,
			'min_subtotal'                          => '',
			'min_quantity'                          => '',
			'offer_terms'                           => '',
			'redemption_limit_per_seller'           => 0,
			'target_quantity'                       => '',
			'prerequisite_filter'                   => '',
			'prerequisite_product_retailer_ids'     => '',
			'prerequisite_product_group_retailer_ids' => '',
			'prerequisite_product_set_retailer_ids'   => '',
			'exclude_sale_priced_products'          => 'NO',
			'target_shipping_option_types'          => ['STANDARD'],
			'usage_count' => 0,
		];

		// Assert that the coupon data exactly matches the expected shape.
		$this->assertEquals( $expected_coupon, $coupon_data, 'Coupon feed data does not match expected data structure.' );
	}

	public function test_get_coupons_data_coupon_with_included_excluded_products() {
		// Create products for inclusion and exclusion.
		$product1 = new WC_Product_Simple();
		$product1->set_name('Included Product 1');
		$product1->set_slug('included-product-1');
		$product1->set_status('publish');
		$product1->set_sku('product-sku-1');
		$product1->save();
		$included_product1 = $product1->get_id();

		$product2 = new WC_Product_Simple();
		$product2->set_name('Included Product 2');
		$product2->set_slug('included-product-2');
		$product2->set_status('publish');
		$product2->set_sku('product-sku-2');
		$product2->save();
		$included_product2 = $product2->get_id();

		$product3 = new WC_Product_Simple();
		$product3->set_name('Excluded Product');
		$product3->set_slug('excluded-product');
		$product3->set_status('publish');
		$product3->set_sku('product-sku-3');
		$product3->save();
		$excluded_product = $product3->get_id();

		// Create a coupon with both included and excluded product and category restrictions.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'COUPON-INCL-EXCL',
		]);
		// Set coupon meta so that it is valid with a percentage discount.
		update_post_meta( $coupon_id, 'discount_type', 'percent' );
		update_post_meta( $coupon_id, 'coupon_amount', '20' ); // 20% discount
		update_post_meta( $coupon_id, 'free_shipping', 'no' );
		update_post_meta( $coupon_id, 'usage_limit', '' );
		update_post_meta( $coupon_id, 'limit_usage_to_x_items', '' );
		update_post_meta( $coupon_id, 'maximum_amount', '' );
		update_post_meta( $coupon_id, 'email_restrictions', array() );
		// Set product restrictions.
		update_post_meta( $coupon_id, 'product_ids', array( $included_product1, $included_product2 ) );
		update_post_meta( $coupon_id, 'exclude_product_ids', array( $excluded_product ) );

		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data( $query_args );
		$this->assertCount( 1, $result, 'Should have returned one coupon in the feed data.' );
		$coupon_data = $result[0];

		// Build the expected coupon shape.
		$expected_coupon = [
			'offer_id'                              => $coupon_id,                          // coupon ID as an integer
			'title'                                 => 'COUPON-INCL-EXCL',                  // uppercase coupon post title
			'value_type'                            => 'PERCENTAGE',
			'percent_off'                           => '20',                                // as a string
			'fixed_amount_off'                      => '',                                  // empty string output
			'application_type'                      => 'BUYER_APPLIED',
			'target_type'                           => 'LINE_ITEM',
			'target_granularity'                    => 'ITEM_LEVEL',
			'target_selection'                      => 'SPECIFIC_PRODUCTS',
			'start_date_time'                       => $coupon_data['start_date_time'],     // use the generated start date/time
			'end_date_time'                         => '',
			'coupon_codes'                          => ['COUPON-INCL-EXCL'],                // coupon_codes as an array containing the title
			'public_coupon_code'                    => '',
			'target_filter'                         => '{"and":[{"or":[{"retailer_id":{"eq":"product-sku-1_'.$product1->get_id().'"}},{"retailer_id":{"eq":"product-sku-2_'.$product2->get_id().'"}}]},{"and":[{"retailer_id":{"neq":"product-sku-3_'.$product3->get_id().'"}}]}]}',
			'target_product_retailer_ids'           => '',
			'target_product_group_retailer_ids'     => '',
			'target_product_set_retailer_ids'       => '',
			'redeem_limit_per_user'                 => 0,
			'min_subtotal'                          => '',
			'min_quantity'                          => '',
			'offer_terms'                           => '',
			'redemption_limit_per_seller'           => 0,
			'target_quantity'                       => '',
			'prerequisite_filter'                   => '',
			'prerequisite_product_retailer_ids'     => '',
			'prerequisite_product_group_retailer_ids' => '',
			'prerequisite_product_set_retailer_ids'   => '',
			'exclude_sale_priced_products'          => 'NO',
			'target_shipping_option_types'          => '',
			'usage_count' => 0,
		];

		$this->assertEquals( $expected_coupon, $coupon_data, 'Coupon feed data with included/excluded restrictions does not match expected data structure.' );
	}

	public function test_get_coupons_data_coupon_with_included_excluded_categories() {
		// Create product categories.
		$included_cat = self::factory()->term->create([
			'taxonomy' => 'product_cat',
			'name'     => 'Included Category',
		]);
		$excluded_cat = self::factory()->term->create([
			'taxonomy' => 'product_cat',
			'name'     => 'Excluded Category',
		]);

		// Create products and assign them to categories.
		$product1 = new WC_Product_Simple();
		$product1->set_name('Product In Included Category 1');
		$product1->set_slug('product-in-included-cat-1');
		$product1->set_status('publish');
		$product1->set_sku('product-sku-1');
		$product1->set_category_ids([ $included_cat ]);
		$product1->save();
		$prod_id1 = $product1->get_id();

		$product2 = new WC_Product_Simple();
		$product2->set_name('Product In Included Category 2');
		$product2->set_slug('product-in-included-cat-2');
		$product2->set_status('publish');
		$product2->set_sku('product-sku-2');
		$product2->set_category_ids([ $included_cat ]);
		$product2->save();
		$prod_id2 = $product2->get_id();

		$product3 = new WC_Product_Simple();
		$product3->set_name('Product In Excluded Category');
		$product3->set_slug('product-in-excluded-cat');
		$product3->set_status('publish');
		$product3->set_sku('product-sku-3');
		$product3->set_category_ids([ $excluded_cat ]);
		$product3->save();
		$prod_id3 = $product3->get_id();

		// Create a coupon that restricts by category.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'COUPON-CAT-ONLY',
		]);
		// Set coupon meta for a percentage discount.
		update_post_meta( $coupon_id, 'discount_type', 'percent' );
		update_post_meta( $coupon_id, 'coupon_amount', '15' ); // 15% discount
		update_post_meta( $coupon_id, 'free_shipping', 'no' );
		update_post_meta( $coupon_id, 'usage_limit', '' );
		update_post_meta( $coupon_id, 'limit_usage_to_x_items', '' );
		update_post_meta( $coupon_id, 'maximum_amount', '' );
		update_post_meta( $coupon_id, 'email_restrictions', array() );
		// Instead of setting product_ids, set category restrictions.
		update_post_meta( $coupon_id, 'product_categories', [ $included_cat ] );
		update_post_meta( $coupon_id, 'exclude_product_categories', [ $excluded_cat ] );

		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data( $query_args );
		$this->assertCount( 1, $result, 'Should have returned one coupon in the feed data.' );
		$coupon_data = $result[0];

		// Expected target_filter:
		// The get_target_filter() function pulls products via wc_get_products() based on the category IDs.
		// It should return products from the included category (product1 and product2) and products from the excluded category (product3).
		// The expected JSON string (assuming WC_Facebookcommerce_Utils::get_fb_retailer_id returns "<sku>_<id>") is:
		$expected_target_filter = '{"and":[{"or":[{"retailer_id":{"eq":"' . $product1->get_sku() . '_' . $prod_id1 . '"}},{"retailer_id":{"eq":"' . $product2->get_sku() . '_' . $prod_id2 . '"}}]},{"and":[{"retailer_id":{"neq":"' . $product3->get_sku() . '_' . $prod_id3 . '"}}]}]}';

		// Build the expected coupon shape.
		$expected_coupon = [
			'offer_id'                              => $coupon_id,                          // coupon ID as an integer
			'title'                                 => 'COUPON-CAT-ONLY',                   // uppercase coupon post title
			'value_type'                            => 'PERCENTAGE',
			'percent_off'                           => '15',                                // as a string
			'fixed_amount_off'                      => '',                                  // empty string output
			'application_type'                      => 'BUYER_APPLIED',
			'target_type'                           => 'LINE_ITEM',
			'target_granularity'                    => 'ITEM_LEVEL',
			'target_selection'                      => 'SPECIFIC_PRODUCTS',
			'start_date_time'                       => $coupon_data['start_date_time'],     // generated start date/time
			'end_date_time'                         => '',
			'coupon_codes'                          => ['COUPON-CAT-ONLY'],                 // coupon_codes as an array containing the code
			'public_coupon_code'                    => '',
			'target_filter'                         => $expected_target_filter,
			'target_product_retailer_ids'           => '',
			'target_product_group_retailer_ids'     => '',
			'target_product_set_retailer_ids'       => '',
			'redeem_limit_per_user'                 => 0,
			'min_subtotal'                          => '',
			'min_quantity'                          => '',
			'offer_terms'                           => '',
			'redemption_limit_per_seller'           => 0,
			'target_quantity'                       => '',
			'prerequisite_filter'                   => '',
			'prerequisite_product_retailer_ids'     => '',
			'prerequisite_product_group_retailer_ids' => '',
			'prerequisite_product_set_retailer_ids'   => '',
			'exclude_sale_priced_products'          => 'NO',
			'target_shipping_option_types'          => '',
			'usage_count' => 0,
		];

		$this->assertEquals( $expected_coupon, $coupon_data, 'Coupon feed data with included/excluded category restrictions does not match expected data structure.' );
	}

	public function test_get_coupons_data_invalid_coupon_both_amount_and_free_ship() {
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta( $coupon_id, 'discount_type', 'percent' );
		update_post_meta( $coupon_id, 'coupon_amount', '10' );
		update_post_meta( $coupon_id, 'free_shipping', 'yes' );  // Conflicting: free shipping + amount
		update_post_meta( $coupon_id, 'email_restrictions', array( 'test@example.com' ) );
		update_post_meta( $coupon_id, 'product_brands', array( 'brand1' ) );
		update_post_meta( $coupon_id, 'exclude_product_brands', array( 'brand2' ) );

		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data( $query_args );

		// Expect that the coupon is filtered out as invalid and thus not included in the feed.
		$this->assertEmpty( $result, 'Expected no coupon to be returned for an invalid coupon configuration.' );
	}

	public function test_get_coupons_data_invalid_coupon_missing_code() {
		// Create a coupon with an empty code.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => '', // Missing code
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];
		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if coupon code is missing.');
	}

	public function test_get_coupons_data_invalid_coupon_maximum_spend_set() {
		// Create a coupon with a valid code but a maximum spend set.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		// Set maximum spend (should be zero to be valid).
		update_post_meta($coupon_id, 'maximum_amount', '50');
		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];
		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if maximum spend is set.');
	}

	public function test_get_coupons_data_invalid_coupon_allowed_emails_set() {
		// Create a coupon with allowed emails specified.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		// Set allowed emails (should be empty to be valid).
		$coupon = new WC_Coupon( $coupon_id );
		$coupon->set_email_restrictions(['test@example.com']);
		$coupon->save();

		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];

		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if allowed emails are set.');
	}

	public function test_get_coupons_data_invalid_coupon_limit_usage_set() {
		// Create a coupon with a limit_usage_to_x_items value set.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		// Set limit_usage_to_x_items to a positive value.
		update_post_meta($coupon_id, 'limit_usage_to_x_items', '5');
		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];
		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if limit_usage_to_x_items is set.');
	}

	public function test_get_coupons_data_invalid_coupon_brand_targeting() {
		// Create a coupon that uses product brand targeting.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		// Set product_brands meta so that it is non-empty.
		update_post_meta($coupon_id, 'product_brands', ['brand1']);
		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];
		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if product_brands targeting is used.');
	}

	public function test_get_coupons_data_invalid_coupon_excluded_brand_targeting() {
		// Create a coupon that uses excluded product brand targeting.
		$coupon_id = self::factory()->post->create([
			'post_type'   => 'shop_coupon',
			'post_status' => 'publish',
			'post_title'  => 'VALIDCODE',
		]);
		update_post_meta($coupon_id, 'discount_type', 'percent');
		update_post_meta($coupon_id, 'coupon_amount', '10');
		// Set exclude_product_brands meta so that it is non-empty.
		update_post_meta($coupon_id, 'exclude_product_brands', ['brand2']);
		$query_args = [
			'post_type'      => 'shop_coupon',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		];
		$result = \WooCommerce\Facebook\Feed\FeedUploadUtils::get_coupons_data($query_args);
		$this->assertEmpty($result, 'Expected coupon to be invalid if excluded product_brands targeting is used.');
	}

	public function test_build_category_tree() {
		// Mock categories
		$categories = [
			(object) ['term_taxonomy_id' => 1, 'name' => 'Category 1', 'parent' => 0],
			(object) ['term_taxonomy_id' => 2, 'name' => 'Category 2', 'parent' => 0],
			(object) ['term_taxonomy_id' => 3, 'name' => 'Subcategory 1', 'parent' => 1],
			(object) ['term_taxonomy_id' => 4, 'name' => 'Subcategory 2', 'parent' => 1],
		];

		// Use reflection to access the private method
		$reflection = new \ReflectionClass(\WooCommerce\Facebook\Feed\FeedUploadUtils::class);
		$method = $reflection->getMethod('build_category_tree');
		$method->setAccessible(true);

		// Invoke the private method
		$category_tree = $method->invokeArgs(null, [$categories]);

		$expected = [
			[
				'title' => 'Category 1',
				'resourceType' => 'collection',
				'retailerID' => 1,
				'items' => [
					[
						'title' => 'Subcategory 1',
						'resourceType' => 'collection',
						'retailerID' => 3,
					],
					[
						'title' => 'Subcategory 2',
						'resourceType' => 'collection',
						'retailerID' => 4,
					],
				]
			],
			[
				'title' => 'Category 2',
				'resourceType' => 'collection',
				'retailerID' => 2,
			]
		];

		$this->assertEquals($expected, $category_tree, 'Category tree does not match expected structure.');
	}
}
