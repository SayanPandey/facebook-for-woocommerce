<?php
/**
 * Category Section
 * 
 * slug: books-library/product-section
 * title: Team Section
 * categories: books-library
 */

$books_library_plugins_list = get_option( 'active_plugins' );
$books_library_plugin = 'woocommerce/woocommerce.php';
$books_library_results = in_array( $books_library_plugin , $books_library_plugins_list);
if ( $books_library_results )  {

    return array(
        'title'      =>__( 'Product Section', 'books-library' ),
        'categories' => array( 'books-library' ),
        'content'    => '<!-- wp:spacer {"height":"40px"} -->
        <div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:group {"className":"services-box","layout":{"type":"constrained","contentSize":"80%"}} -->
        <div class="wp-block-group services-box"><!-- wp:group {"className":"service-group","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
        <div class="wp-block-group service-group"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()) .'/assets/images/product-heading.png","id":39,"dimRatio":50,"customOverlayColor":"#483e3d","isUserOverlayColor":false,"minHeight":50,"style":{"border":{"width":"0px","style":"none","radius":"6px"},"spacing":{"blockGap":"0","padding":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover" style="border-style:none;border-width:0px;border-radius:6px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#483e3d"></span><img class="wp-block-cover__image-background wp-image-39" alt="" src="'.esc_url(get_template_directory_uri()) .'/assets/images/product-heading.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"800","fontSize":"21px"}},"textColor":"background","fontFamily":"lexend_deca"} -->
        <p class="has-text-align-center has-background-color has-text-color has-link-color has-lexend-deca-font-family" style="font-size:21px;font-style:normal;font-weight:800;text-transform:capitalize">'. esc_html__('recommended Books','books-library') .'</p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:cover -->

        <!-- wp:spacer {"height":"5px"} -->
        <div style="height:5px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:woocommerce/product-collection {"queryId":66,"query":{"perPage":6,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":6,"shrinkColumns":false},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"className":"product-section"} -->
        <div class="wp-block-woocommerce-product-collection product-section"><!-- wp:woocommerce/product-template -->
        <!-- wp:woocommerce/product-image {"showSaleBadge":false,"saleBadgeAlign":"left","isDescendentOfQueryLoop":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"6px"}}} /-->

        <!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"5px"},"padding":{"right":"var:preset|spacing|20"}}},"fontSize":"medium","fontFamily":"lexend_deca","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

        <!-- wp:post-terms {"term":"product_cat","textAlign":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"right":"var:preset|spacing|20"}}},"fontSize":"extra-small","fontFamily":"lexend_deca"} /-->
        <!-- /wp:woocommerce/product-template --></div>
        <!-- /wp:woocommerce/product-collection --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->

        <!-- wp:spacer {"height":"50px"} -->
        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->',
    );
} else {   

    return array(
        'title'      =>__( 'Product Section', 'books-library' ),
        'categories' => array( 'books-library' ),
        'content'    => '<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"services-box","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group services-box"><!-- wp:group {"className":"service-group","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group service-group"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()) .'/assets/images/product-heading.png","id":39,"dimRatio":50,"customOverlayColor":"#483e3d","isUserOverlayColor":false,"minHeight":50,"style":{"border":{"width":"0px","style":"none","radius":"6px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-style:none;border-width:0px;border-radius:6px;min-height:50px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#483e3d"></span><img class="wp-block-cover__image-background wp-image-39" alt="" src="'.esc_url(get_template_directory_uri()) .'/assets/images/product-heading.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"800","fontSize":"21px"}},"textColor":"background","fontFamily":"lexend_deca"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-lexend-deca-font-family" style="font-size:21px;font-style:normal;font-weight:800;text-transform:capitalize">'. esc_html__('recommended Books','books-library') .'</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:columns {"verticalAlignment":null,"className":"product-section-static","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns product-section-static" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":59,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product01.png" alt="" class="wp-image-59" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":58,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product02.png" alt="" class="wp-image-58" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":57,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product03.png" alt="" class="wp-image-57" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":56,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product04.png" alt="" class="wp-image-56" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":55,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product05.png" alt="" class="wp-image-55" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"static-product","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-column is-vertically-aligned-center static-product"><!-- wp:image {"id":54,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"6px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/product06.png" alt="" class="wp-image-54" style="border-radius:6px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","style":{"color":{"text":"#050e12"},"elements":{"link":{"color":{"text":"#050e12"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
<h2 class="wp-block-heading has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size" style="color:#050e12;font-style:normal;font-weight:600">'. esc_html__('Book Name Here','books-library') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#8d8da9"},"elements":{"link":{"color":{"text":"#8d8da9"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
<p class="has-text-align-left has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="color:#8d8da9;font-style:normal;font-weight:600">'. esc_html__('Book Categories','books-library') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->',
    );
}