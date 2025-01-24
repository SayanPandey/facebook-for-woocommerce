<?php
/**
 * Banner Section
 * 
 * slug: books-library/banner
 * title: Banner
 * categories: books-library
 */

 $books_library_plugins_list = get_option( 'active_plugins' );
 $books_library_plugin = 'woocommerce/woocommerce.php';
 $books_library_results = in_array( $books_library_plugin , $books_library_plugins_list);
 if ( $books_library_results )  {

    return array(
        'title'      =>__( 'Banner', 'books-library' ),
        'categories' => array( 'books-library' ),
        'content'    => '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"width":"90%","className":"banner-left"} -->
        <div class="wp-block-column banner-left" style="flex-basis:90%"><!-- wp:cover {"overlayColor":"background","isUserOverlayColor":true,"minHeight":600,"isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
        <div class="wp-block-cover is-light" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"0"}}}} -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%"></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"verticalAlignment":"center","width":"90%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:90%"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","className":"banner-content"} -->
        <div class="wp-block-column is-vertically-aligned-center banner-content"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"capitalize"}},"textColor":"accent","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
        <p class="has-accent-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600;text-transform:capitalize">'. esc_html__('welcome to Library WordPress Theme','books-library') .'</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"className":"banner-heading","style":{"color":{"text":"#2f2f33"},"elements":{"link":{"color":{"text":"#2f2f33"}}},"typography":{"fontStyle":"normal","fontWeight":"900","fontSize":"40px"}},"fontFamily":"lexend_deca"} -->
        <h2 class="wp-block-heading banner-heading has-text-color has-link-color has-lexend-deca-font-family" style="color:#2f2f33;font-size:40px;font-style:normal;font-weight:900">'. esc_html__('Encourages escapism and imagination.','books-library') .'</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":1.6}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
        <p class="has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:300;line-height:1.6">'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,','books-library') .'</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:buttons -->
        <div class="wp-block-buttons"><!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
        <div class="wp-block-button has-custom-font-size has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:700"><a class="wp-block-button__link has-background-color has-text-color has-link-color wp-element-button">'. esc_html__('EXPLORE MORE ','books-library') .'<span class="dashicons dashicons-arrow-right-alt"></span></a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"verticalAlignment":"center","width":"%","className":"banner-product","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center banner-product"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|20"}}}} -->
        <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"60%","className":"banner-product01"} -->
        <div class="wp-block-column banner-product01" style="flex-basis:60%"><!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true},"tagName":"div","displayLayout":{"type":"list","columns":2,"shrinkColumns":true},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."}} -->
        <div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template -->
        <!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
        
        <!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->
        
        <!-- wp:post-terms {"term":"product_cat","style":{"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"tiny","fontFamily":"lexend_deca"} /-->
        
        <!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"7px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium","fontFamily":"lexend_deca","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
        
        <!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"style":{"color":{"text":"#ffae00"},"elements":{"link":{"color":{"text":"#ffae00"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
        <!-- /wp:woocommerce/product-template --></div>
        <!-- /wp:woocommerce/product-collection --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"verticalAlignment":"center","width":"40%","className":"banner-product02"} -->
        <div class="wp-block-column is-vertically-aligned-center banner-product02" style="flex-basis:40%"><!-- wp:woocommerce/product-collection {"queryId":1,"query":{"perPage":1,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{"product_cat":[]},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true},"tagName":"div","displayLayout":{"type":"list","columns":2,"shrinkColumns":true},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."}} -->
        <div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template -->
        <!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
        
        <!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->
        
        <!-- wp:post-terms {"term":"product_cat","style":{"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"tiny","fontFamily":"lexend_deca"} /-->
        
        <!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"7px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium","fontFamily":"lexend_deca","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
        
        <!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"style":{"color":{"text":"#ffae00"},"elements":{"link":{"color":{"text":"#ffae00"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
        <!-- /wp:woocommerce/product-template --></div>
        <!-- /wp:woocommerce/product-collection --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div></div>
        <!-- /wp:cover -->
        
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns" style="padding-top:0;padding-bottom:0"><!-- wp:column {"width":"50%","className":"advertisment-left","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"secaccent"} -->
        <div class="wp-block-column advertisment-left has-secaccent-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40px"><!-- wp:image {"id":136,"width":"40px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/warenty.png" alt="" class="wp-image-136" style="object-fit:contain;width:40px;height:40px"/></figure>
        <!-- /wp:image --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}}} -->
        <div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#b5b5c2"}}},"color":{"text":"#b5b5c2"},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
        <p class="has-text-color has-link-color has-lexend-deca-font-family has-small-font-size" style="color:#b5b5c2;font-style:normal;font-weight:600;text-transform:uppercase">'. esc_html__('Waranty','books-library') .'</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"lexend_deca"} -->
        <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-lexend-deca-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase">'. esc_html__('Good Quanlity','books-library') .'</h2>
        <!-- /wp:heading --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
        <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40px"><!-- wp:image {"id":137,"width":"40px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/payment.png" alt="" class="wp-image-137" style="object-fit:contain;width:40px;height:40px"/></figure>
        <!-- /wp:image --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}}} -->
        <div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#b5b5c2"}}},"color":{"text":"#b5b5c2"},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
        <p class="has-text-color has-link-color has-lexend-deca-font-family has-small-font-size" style="color:#b5b5c2;font-style:normal;font-weight:600;text-transform:uppercase">'. esc_html__('PAYMENT','books-library') .'</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"lexend_deca"} -->
        <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-lexend-deca-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase">'. esc_html__('EASY & SAVE','books-library') .'</h2>
        <!-- /wp:heading --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"width":"50%","className":"advertisment-right","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"accent"} -->
        <div class="wp-block-column advertisment-right has-accent-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium","fontFamily":"lexend_deca"} -->
        <h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size">'. esc_html__('Meet Our Books Store Staff','books-library') .'</h2>
        <!-- /wp:heading --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:image {"id":145,"width":"168px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/staff.png" alt="" class="wp-image-145" style="width:168px;height:auto"/></figure>
        <!-- /wp:image --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:column -->
        
        <!-- wp:column {"width":"10%","className":"banner-right","backgroundColor":"accent"} -->
        <div class="wp-block-column banner-right has-accent-background-color has-background" style="flex-basis:10%"><!-- wp:buttons {"className":"register-button","layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons register-button"><!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textDecoration":"underline","fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"},"spacing":{"padding":{"left":"var:preset|spacing|20","right":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontSize":"small","fontFamily":"lexend_deca"} -->
        <div class="wp-block-button has-custom-font-size has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:600;text-decoration:underline;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-text-color has-link-color wp-element-button" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">'. esc_html__('register','books-library') .'</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons -->
        
        <!-- wp:columns {"verticalAlignment":"center","className":"account-button"} -->
        <div class="wp-block-columns are-vertically-aligned-center account-button"><!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/customer-account {"displayStyle":"text_only","iconClass":"wc-block-customer-account__account-icon","className":"account-button","textColor":"background","fontFamily":"lexend_deca","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} /--></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->
        
        <!-- wp:columns {"verticalAlignment":"center","className":"cart-button","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center cart-button" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|20"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:woocommerce/mini-cart /--></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->
        
    <!-- wp:columns {"className":"product-search"} -->
<div class="wp-block-columns product-search"><!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:image {"id":163,"width":"20px","height":"auto","scale":"contain","sizeSlug":"full","linkDestination":"attachment","align":"center","className":"is-style-default"} -->
    <figure class="wp-block-image aligncenter size-full is-resized is-style-default"><a href="#"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/search.png" alt="" class="wp-image-163" style="object-fit:contain;width:20px;height:auto"/></a></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->',
    );

} else {

    return array(
        'title'      =>__( 'Banner', 'books-library' ),
        'categories' => array( 'books-library' ),
        'content'    => '<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"90%","className":"banner-left"} -->
   <div class="wp-block-column banner-left" style="flex-basis:90%"><!-- wp:cover {"overlayColor":"background","isUserOverlayColor":true,"minHeight":600,"isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
   <div class="wp-block-cover is-light" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"0"}}}} -->
   <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%"></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"verticalAlignment":"center","width":"90%"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:90%"><!-- wp:columns -->
   <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","className":"banner-content"} -->
   <div class="wp-block-column is-vertically-aligned-center banner-content"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"capitalize"}},"textColor":"accent","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-accent-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600;text-transform:capitalize">'. esc_html__('welcome to Library WordPress Theme','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:heading {"className":"banner-heading","style":{"color":{"text":"#2f2f33"},"elements":{"link":{"color":{"text":"#2f2f33"}}},"typography":{"fontStyle":"normal","fontWeight":"900","fontSize":"40px"}},"fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading banner-heading has-text-color has-link-color has-lexend-deca-font-family" style="color:#2f2f33;font-size:40px;font-style:normal;font-weight:900">'. esc_html__('Encourages escapism and imagination.','books-library') .'</h2>
   <!-- /wp:heading -->
   
   <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":1.6}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:300;line-height:1.6">'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:buttons -->
   <div class="wp-block-buttons"><!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <div class="wp-block-button has-custom-font-size has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:700"><a class="wp-block-button__link has-background-color has-text-color has-link-color wp-element-button">'. esc_html__('EXPLORE MORE ','books-library') .'<span class="dashicons dashicons-arrow-right-alt"></span></a></div>
   <!-- /wp:button --></div>
   <!-- /wp:buttons --></div>
   <!-- /wp:column -->
   
 <!-- wp:column {"verticalAlignment":"center","width":"%","className":"banner-product","layout":{"type":"default"}} -->
 <div class="wp-block-column is-vertically-aligned-center banner-product"><!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|20"}}}} -->
   <div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"60%","className":"static-banner-product01","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
   <div class="wp-block-column static-banner-product01" style="flex-basis:60%"><!-- wp:image {"id":48,"sizeSlug":"full","linkDestination":"none"} -->
   <figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-product01.png" alt="" class="wp-image-48"/></figure>
   <!-- /wp:image -->
   
   <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-primary-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Education','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium","fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading has-lexend-deca-font-family has-medium-font-size" style="font-style:normal;font-weight:700">'. esc_html__('English Grammar','books-library') .'</h2>
   <!-- /wp:heading -->
   
   <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-primary-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600"><img class="wp-image-181" style="width: 90px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="">  '. esc_html__('(4.0)','books-library') .'</p>
   <!-- /wp:paragraph --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"verticalAlignment":"center","width":"40%","className":"static-banner-product02","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
   <div class="wp-block-column is-vertically-aligned-center static-banner-product02" style="flex-basis:40%"><!-- wp:image {"id":184,"sizeSlug":"full","linkDestination":"none"} -->
   <figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-product02.png" alt="" class="wp-image-184"/></figure>
   <!-- /wp:image -->
   
   <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-primary-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600"> '. esc_html__('Education','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:700">'. esc_html__('Natural Vibe','books-library') .'</h2>
   <!-- /wp:heading -->
   
   <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"extra-small","fontFamily":"lexend_deca"} -->
   <p class="has-primary-color has-text-color has-link-color has-lexend-deca-font-family has-extra-small-font-size" style="font-style:normal;font-weight:600"><img class="wp-image-181" style="width: 90px;" src="'.esc_url(get_template_directory_uri()) .'/assets/images/rating.png" alt="">  '. esc_html__('(4.0)','books-library') .'</p>
   <!-- /wp:paragraph --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div></div>
   <!-- /wp:cover -->
   
   <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
   <div class="wp-block-columns" style="padding-top:0;padding-bottom:0"><!-- wp:column {"width":"50%","className":"advertisment-left","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"secaccent"} -->
   <div class="wp-block-column advertisment-left has-secaccent-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
   <div class="wp-block-columns are-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center"} -->
   <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
   <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40px"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40px"><!-- wp:image {"id":136,"width":"40px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
   <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/warenty.png" alt="" class="wp-image-136" style="object-fit:contain;width:40px;height:40px"/></figure>
   <!-- /wp:image --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}}} -->
   <div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#b5b5c2"}}},"color":{"text":"#b5b5c2"},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
   <p class="has-text-color has-link-color has-lexend-deca-font-family has-small-font-size" style="color:#b5b5c2;font-style:normal;font-weight:600;text-transform:uppercase">'. esc_html__('Waranty','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-lexend-deca-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase">'. esc_html__('Good Quanlity','books-library') .'</h2>
   <!-- /wp:heading --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"verticalAlignment":"center"} -->
   <div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns -->
   <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40px"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40px"><!-- wp:image {"id":137,"width":"40px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
   <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/payment.png" alt="" class="wp-image-137" style="object-fit:contain;width:40px;height:40px"/></figure>
   <!-- /wp:image --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}}} -->
   <div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#b5b5c2"}}},"color":{"text":"#b5b5c2"},"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
   <p class="has-text-color has-link-color has-lexend-deca-font-family has-small-font-size" style="color:#b5b5c2;font-style:normal;font-weight:600;text-transform:uppercase">'. esc_html__('PAYMENT','books-library') .'</p>
   <!-- /wp:paragraph -->
   
   <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"background","fontSize":"upper-heading","fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-lexend-deca-font-family has-upper-heading-font-size" style="font-style:normal;font-weight:700;text-transform:uppercase">'. esc_html__('EASY & SAVE','books-library') .'</h2>
   <!-- /wp:heading --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"width":"50%","className":"advertisment-right","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"accent"} -->
   <div class="wp-block-column advertisment-right has-accent-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
   <div class="wp-block-columns are-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium","fontFamily":"lexend_deca"} -->
   <h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-lexend-deca-font-family has-medium-font-size">'. esc_html__('Meet Our Books Store Staff','books-library') .'</h2>
   <!-- /wp:heading --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
   <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:image {"id":145,"width":"168px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
   <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/staff.png" alt="" class="wp-image-145" style="width:168px;height:auto"/></figure>
   <!-- /wp:image --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns --></div>
   <!-- /wp:column -->
   
   <!-- wp:column {"width":"10%","className":"banner-right","backgroundColor":"accent"} -->
   <div class="wp-block-column banner-right has-accent-background-color has-background" style="flex-basis:10%"><!-- wp:buttons {"className":"register-button","layout":{"type":"flex","justifyContent":"center"}} -->
   <div class="wp-block-buttons register-button"><!-- wp:button {"textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"textDecoration":"underline","fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"},"spacing":{"padding":{"left":"var:preset|spacing|20","right":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontSize":"small","fontFamily":"lexend_deca"} -->
   <div class="wp-block-button has-custom-font-size has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:600;text-decoration:underline;text-transform:uppercase"><a class="wp-block-button__link has-background-color has-text-color has-link-color wp-element-button" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">'. esc_html__('register','books-library') .'</a></div>
   <!-- /wp:button --></div>
   <!-- /wp:buttons -->
   
   <!-- wp:columns {"verticalAlignment":"center","className":"account-button"} -->
   <div class="wp-block-columns are-vertically-aligned-center account-button"><!-- wp:column {"verticalAlignment":"center"} -->
   <div class="wp-block-column is-vertically-aligned-center"><!-- wp:woocommerce/customer-account {"displayStyle":"text_only","iconClass":"wc-block-customer-account__account-icon","className":"account-button","textColor":"background","fontFamily":"lexend_deca","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} /--></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns -->
   
   <!-- wp:columns {"verticalAlignment":"center","className":"cart-button","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
   <div class="wp-block-columns are-vertically-aligned-center cart-button" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|20"}}}} -->
   <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:woocommerce/mini-cart /--></div>
   <!-- /wp:column --></div>
   <!-- /wp:columns -->
   
<!-- wp:columns {"className":"product-search"} -->
<div class="wp-block-columns product-search"><!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:image {"id":163,"width":"20px","height":"auto","scale":"contain","sizeSlug":"full","linkDestination":"attachment","align":"center","className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><a href="#"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/search.png" alt="" class="wp-image-163" style="object-fit:contain;width:20px;height:auto"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
    );
}