<?php
// phpcs:ignoreFile
/**
 * Copyright (c) Facebook, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FacebookCommerce
 */

namespace WooCommerce\Facebook;

defined( 'ABSPATH' ) or exit;

use WooCommerce\Facebook\Api\Orders\Order;
use WooCommerce\Facebook\Api\Request;
use WooCommerce\Facebook\Api\Response;
use WooCommerce\Facebook\Events\Event;

use WooCommerce\Facebook\Framework\Api\Base;
use WooCommerce\Facebook\Framework\Api\Exception as ApiException;

/**
 * API handler.
 *
 * @since 2.0.0
 *
 * @method \WooCommerce\Facebook\Framework\Api\Request get_request()
 */
class Api extends Base {

	use Api\Traits\Rate_Limited_API;

	/** @var string URI used for the request */
	protected $request_uri = \WC_Facebookcommerce_Graph_API::GRAPH_API_URL . \WC_Facebookcommerce_Graph_API::API_VERSION;

	/** @var string the configured access token */
	protected $access_token;

	/**
	 * Constructor.
	 *
	 * @since 2.0.0
	 *
	 * @param string $access_token access token to use for API requests
	 */
	public function __construct( $access_token ) {
		$this->access_token = $access_token;
		$this->request_headers = array(
			'Authorization' => "Bearer {$access_token}",
		);
		$this->set_request_content_type_header( 'application/json' );
		$this->set_request_accept_header( 'application/json' );
	}


	/**
	 * Gets the access token being used for API requests.
	 *
	 * @since 2.1.0
	 *
	 * @return string
	 */
	public function get_access_token() {
		return $this->access_token;
	}


	/**
	 * Sets the access token to use for API requests.
	 *
	 * @since 2.1.0
	 *
	 * @param string $access_token access token to set
	 */
	public function set_access_token( $access_token ) {
		$this->access_token = $access_token;
	}


	/**
	 * Performs an API request.
	 *
	 * @since 2.1.0
	 *
	 * @param Api\Request $request request object
	 * @return Api\Response
	 * @throws Api\Exceptions\Request_Limit_Reached|ApiException
	 */
	public function perform_request( $request ) {
		$rate_limit_id   = $request::get_rate_limit_id();
		$delay_timestamp = $this->get_rate_limit_delay( $rate_limit_id );
		// if there is a delayed timestamp in the future, throw an exception
		if ( $delay_timestamp >= time() ) {
			$this->handle_throttled_request( $rate_limit_id, $delay_timestamp );
		} else {
			$this->set_rate_limit_delay( $rate_limit_id, 0 );
		}
		return parent::perform_request( $request );
	}


	/**
	 * Validates a response after it has been parsed and instantiated.
	 *
	 * Throws an exception if a rate limit or general API error is included in the response.
	 *
	 * @since 2.0.0
	 *
	 * @throws ApiException
	 */
	protected function do_post_parse_response_validation() {
		/** @var Api\Response $response */
		$response = $this->get_response();
		$request  = $this->get_request();
		if ( $response && $response->has_api_error() ) {
			$code    = $response->get_api_error_code();
			$message = sprintf( '%s: %s', $response->get_api_error_type(), $response->get_user_error_message() ?: $response->get_api_error_message() );
			/**
			 * Graph API
			 *
			 * 4 - API Too Many Calls
			 * 17 - API User Too Many Calls
			 * 32 - Page-level throttling
			 * 613 - Custom-level throttling
			 *
			 * Marketing API (Catalog Batch API)
			 *
			 * 80004 - There have been too many calls to this ad-account
			 *
			 * @link https://developers.facebook.com/docs/graph-api/using-graph-api/error-handling#errorcodes
			 * @link https://developers.facebook.com/docs/graph-api/using-graph-api/error-handling#rate-limiting-error-codes
			 * @link https://developers.facebook.com/docs/marketing-api/reference/product-catalog/batch/#validation-rules
			 */
			if ( in_array( $code, array( 4, 17, 32, 613, 80001, 80004 ), true ) ) {
				$delay_in_seconds = $this->calculate_rate_limit_delay( $response, $this->get_response_headers() );
				if ( $delay_in_seconds > 0 ) {
					$rate_limit_id = $request::get_rate_limit_id();
					$timestamp     = time() + $delay_in_seconds;
					$this->set_rate_limit_delay( $rate_limit_id, $timestamp );
					$this->handle_throttled_request( $rate_limit_id, $timestamp );
				} else {
					throw new Api\Exceptions\Request_Limit_Reached( $message, $code );
				}
			}

			/**
			 * Handle invalid token errors
			 *
			 * @link https://developers.facebook.com/docs/graph-api/using-graph-api/error-handling#errorcodes
			 */
			if ( ( $code >= 200 && $code < 300 ) || in_array( $code, array( 10, 102, 190 ), false ) ) {
				set_transient( 'wc_facebook_connection_invalid', time(), DAY_IN_SECONDS );
			} else {
				// this was an unrelated error, so the OAuth connection may still be valid
				delete_transient( 'wc_facebook_connection_invalid' );
			}
			// if the code indicates a retry and we've not hit the retry limit, perform the request again
			if ( in_array( $code, $request->get_retry_codes(), false ) && $request->get_retry_count() < $request->get_retry_limit() ) {
				$request->mark_retry();
				$this->response = $this->perform_request( $request );
				return;
			}
			throw new ApiException( $message, $code );
		}
		// if we get this far we're connected, so delete any invalid connection flag
		delete_transient( 'wc_facebook_connection_invalid' );
	}


	/**
	 * Handles a throttled API request.
	 *
	 * @since 2.1.0
	 *
	 * @param string $rate_limit_id ID for the API request
	 * @param int    $timestamp timestamp until the delay is over
	 * @throws Api\Exceptions\Request_Limit_Reached
	 */
	private function handle_throttled_request( $rate_limit_id, $timestamp ) {
		if ( time() > $timestamp ) {
			return;
		}
		$exception = new Api\Exceptions\Request_Limit_Reached( "{$rate_limit_id} requests are currently throttled.", 401 );
		$date_time = new \DateTime();
		$date_time->setTimestamp( $timestamp );
		$exception->set_throttle_end( $date_time );
		throw $exception;
	}


	/**
	 * Gets a Page object from Facebook.
	 *
	 * @since 2.0.0
	 *
	 * @param string $page_id page ID
	 * @return Api\Pages\Read\Response
	 * @throws ApiException
	 */
	public function get_page( $page_id ) {
		$request = new Api\Pages\Read\Request( $page_id );
		$this->set_response_handler( Api\Pages\Read\Response::class );
		return $this->perform_request( $request );
	}


	/**
	 * Creates a Product Group object.
	 *
	 * @since 2.0.0
	 *
	 * @param string $catalog_id catalog ID
	 * @param array  $data product group data
	 * @return Response
	 * @throws ApiException
	 */
	public function create_product_group( $catalog_id, $data ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$catalog_id}/product_groups",
				'method' => 'POST',
			)
		);
		$request->set_data( $data );
		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Updates the default product item and the available variation attributes of a product group.
	 *
	 * @since 2.0.0
	 *
	 * @param string $product_group_id product group ID
	 * @param array  $data product group data
	 * @return Response
	 * @throws ApiException
	 */
	public function update_product_group( $product_group_id, $data ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$product_group_id}",
				'method' => 'POST',
			)
		);
		$request->set_data( $data );
		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Deletes a Product Group object.
	 *
	 * @since 2.0.0
	 *
	 * @param string $product_group_id
	 * @return Response
	 * @throws ApiException
	 */
	public function delete_product_group( $product_group_id ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$product_group_id}",
				'method' => 'DELETE',
			)
		);
		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}



	/**
	 * Finds a Product Item using the Catalog ID and the Retailer ID of the product or product variation.
	 *
	 * @since 2.0.0
	 *
	 * @param string $catalog_id catalog ID
	 * @param string $retailer_id retailer ID of the product
	 * @return Response
	 * @throws ApiException
	 */
	public function find_product_item( $catalog_id, $retailer_id ) {
		$request = new \WooCommerce\Facebook\Api\Catalog\Product_Item\Find\Request( $catalog_id, $retailer_id );
		$this->set_response_handler( \WooCommerce\Facebook\Api\Catalog\Product_Item\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Creates a Product Item object.
	 *
	 * @since 2.0.0
	 *
	 * @param string $product_group_id parent product ID
	 * @param array  $data product data
	 * @return Response
	 * @throws ApiException
	 */
	public function create_product_item( $product_group_id, $data ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$product_group_id}/products",
				'method' => 'POST',
			)
		);
		$request->set_data( $data );
		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Updates a Product Item object.
	 *
	 * @since 2.0.0
	 *
	 * @param string $product_item_id product item ID
	 * @param array  $data product data
	 * @return Response
	 * @throws ApiException
	 */
	public function update_product_item( $product_item_id, $data ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$product_item_id}",
				'method' => 'POST',
			)
		);
		$request->set_data( $data );
		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Deletes a Product Item object.
	 *
	 * @since 2.0.0
	 *
	 * @param string $product_item_id product item ID
	 * @return Response
	 * @throws ApiException
	 */
	public function delete_product_item( $product_item_id ) {
		$request = $this->get_new_request(
			array(
				'path'   => "/{$product_item_id}",
				'method' => 'DELETE',
			)
		);

		$this->set_response_handler( Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Gets the next page of results for a paginated response.
	 *
	 * @since 2.0.0
	 *
	 * @param Api\Response $response previous response object
	 * @param int          $additional_pages number of additional pages of results to retrieve
	 * @return Api\Response|null
	 * @throws ApiException
	 */
	public function next( Api\Response $response, $additional_pages = null ) {
		$next_response = null;
		// get the next page if we haven't reached the limit of pages to retrieve and the endpoint for the next page is available
		if ( ( null === $additional_pages || $response->get_pages_retrieved() <= $additional_pages ) && $response->get_next_page_endpoint() ) {
			$components = parse_url( str_replace( $this->request_uri, '', $response->get_next_page_endpoint() ) );
			$request = $this->get_new_request(
				array(
					'path'   => isset( $components['path'] ) ? $components['path'] : '',
					'method' => 'GET',
					'params' => isset( $components['query'] ) ? wp_parse_args( $components['query'] ) : array(),
				)
			);
			$this->set_response_handler( get_class( $response ) );
			$next_response = $this->perform_request( $request );
			// this is the n + 1 page of results for the original response
			$next_response->set_pages_retrieved( $response->get_pages_retrieved() + 1 );
		}
		return $next_response;
	}

	/**
	 * Gets all new orders.
	 *
	 * @since 2.1.0
	 *
	 * @param string $page_id page ID
	 * @return Api\Orders\Response
	 * @throws ApiException
	 */
	public function get_new_orders( $page_id ) {
		$request_args = array(
			'state' => array(
				Order::STATUS_PROCESSING,
				Order::STATUS_CREATED,
			),
		);
		$request = new Api\Orders\Request( $page_id, $request_args );
		$this->set_response_handler( Api\Orders\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Gets the latest cancelled orders.
	 *
	 * @since 2.1.0
	 *
	 * @param string $page_id page ID
	 * @return Api\Orders\Response
	 * @throws ApiException
	 */
	public function get_cancelled_orders( $page_id ) {
		$request_args = array(
			'state'         => array(
				Order::STATUS_COMPLETED,
			),
			'updated_after' => time() - facebook_for_woocommerce()->get_commerce_handler()->get_orders_handler()->get_order_update_interval(),
			'filters'       => 'has_cancellations',
		);
		$request = new Api\Orders\Request( $page_id, $request_args );
		$this->set_response_handler( Api\Orders\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Gets a single order based on its remote ID.
	 *
	 * @since 2.1.0
	 *
	 * @param string $remote_id remote order ID
	 * @return Api\Orders\Read\Response
	 * @throws ApiException
	 */
	public function get_order( $remote_id ) {
		$request = new Api\Orders\Read\Request( $remote_id );
		$this->set_response_handler( Api\Orders\Read\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Acknowledges the given order.
	 *
	 * @since 2.1.0
	 *
	 * @param string $remote_id remote order ID
	 * @param string $merchant_order_reference WC order ID
	 * @return Api\Response
	 * @throws ApiException
	 */
	public function acknowledge_order( $remote_id, $merchant_order_reference ) {
		$request = new Api\Orders\Acknowledge\Request( $remote_id, $merchant_order_reference );
		$this->set_response_handler( Api\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Issues a fulfillment request for the given order.
	 *
	 * @see https://developers.facebook.com/docs/commerce-platform/order-management/fulfillment-api#attach_shipment
	 *
	 * @since 2.1.0
	 *
	 * @param string $remote_id remote order ID
	 * @param array  $fulfillment_data fulfillment data to be sent on the request
	 * @return Api\Response
	 * @throws ApiException
	 */
	public function fulfill_order( $remote_id, $fulfillment_data ) {
		$request = new Api\Orders\Fulfillment\Request( $remote_id, $fulfillment_data );
		$this->set_response_handler( Api\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Cancels the given order.
	 *
	 * @since 2.1.0
	 *
	 * @param string $remote_id remote order ID
	 * @param string $reason cancellation reason
	 * @param bool   $restock_items whether to restock items remotely
	 * @return Api\Response
	 * @throws ApiException
	 */
	public function cancel_order( $remote_id, $reason, $restock_items = true ) {
		$request = new Api\Orders\Cancel\Request( $remote_id, $reason, $restock_items );
		$this->set_response_handler( Api\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Issues a refund request for the given order.
	 *
	 * @see https://developers.facebook.com/docs/commerce-platform/order-management/cancellation-refund-api#refund_order
	 *
	 * @since 2.1.0
	 *
	 * @param string $remote_id remote order ID
	 * @param array  $refund_data refund data to be sent on the request
	 * @return Api\Response
	 * @throws ApiException
	 */
	public function add_order_refund( $remote_id, $refund_data ) {
		$request = new Api\Orders\Refund\Request( $remote_id, $refund_data );
		$this->set_response_handler( Api\Response::class );
		return $this->perform_request( $request );
	}

	/**
	 * Returns a new request object.
	 *
	 * @since 2.0.0
	 *
	 * @param array $args {
	 *     Optional. An array of request arguments.
	 *
	 *     @type string $path request path
	 *     @type string $method request method
	 *     @type array $params request parameters
	 * }
	 * @return Request
	 */
	protected function get_new_request( $args = array() ) {
		$defaults = array(
			'path'   => '/',
			'method' => 'GET',
			'params' => array(),
		);
		$args    = wp_parse_args( $args, $defaults );
		$request = new Request( $args['path'], $args['method'] );
		if ( $args['params'] ) {
			$request->set_params( $args['params'] );
		}
		return $request;
	}

	/**
	 * Returns the plugin class instance associated with this API.
	 *
	 * @since 2.0.0
	 *
	 * @return \WC_Facebookcommerce
	 */
	protected function get_plugin() {
		return facebook_for_woocommerce();
	}
}
