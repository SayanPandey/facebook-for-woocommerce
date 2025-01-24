<?php
/**
 * Header Default
 * 
 * slug: books-library/header-default
 * title: Header Default
 * categories: books-library
 */

return array(
    'title'      =>__( 'Header Default', 'books-library' ),
    'categories' => array( 'books-library' ),
    'content'    => '<!-- wp:group {"className":"header-box-upper","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group header-box-upper" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"width":"10%"} -->
    <div class="wp-block-column" style="flex-basis:10%"></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"width":"80%","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);flex-basis:80%"><!-- wp:columns {"className":"menu-group","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|20"}},"border":{"radius":{"bottomLeft":"10px","bottomRight":"10px","topLeft":"10px","topRight":"10px"}}}} -->
    <div class="wp-block-columns menu-group" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-logo","style":{"spacing":{"padding":{"left":"var:preset|spacing|40","right":"var:preset|spacing|40","top":"0px","bottom":"0px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
    <div class="wp-block-column is-vertically-aligned-center header-logo has-primary-color has-text-color has-link-color" style="padding-top:0px;padding-right:var(--wp--preset--spacing--40);padding-bottom:0px;padding-left:var(--wp--preset--spacing--40);flex-basis:20%"><!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontFamily":"lexend_deca"} /--></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"60%","className":"header-inner-menu"} -->
    <div class="wp-block-column is-vertically-aligned-center header-inner-menu" style="flex-basis:60%"><!-- wp:navigation {"textColor":"primary","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"is-head-menu","style":{"typography":{"textTransform":"capitalize"}},"fontSize":"small","fontFamily":"lexend_deca","layout":{"type":"flex","justifyContent":"center"}} -->
    <!-- wp:navigation-link {"label":"HOME","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"ABOUT US","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"BOOKS","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"PAGES","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"BLOG","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
    <!-- /wp:navigation --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-btn","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-column is-vertically-aligned-center header-btn" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:20%"><!-- wp:buttons {"className":"header-button","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons header-button" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textAlign":"center","backgroundColor":"secaccent","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
    <div class="wp-block-button has-custom-font-size has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:700"><a class="wp-block-button__link has-background-color has-secaccent-background-color has-text-color has-background has-link-color has-text-align-center wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50)"> '. esc_html__('Download APP','books-library') .'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"width":"10%","className":"toggler_icon_col","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"accent"} -->
    <div class="wp-block-column toggler_icon_col has-accent-background-color has-background" style="padding-right:0;padding-left:0;flex-basis:10%"><!-- wp:image {"id":12,"width":"30px","height":"30px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","className":"toggler_icon"} -->
    <figure class="wp-block-image aligncenter size-full is-resized toggler_icon"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/toggle.png" alt="" class="wp-image-12" style="object-fit:contain;width:30px;height:30px"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->
    
    <!-- wp:columns {"className":"library_toggler_body"} -->
    <div class="wp-block-columns library_toggler_body"><!-- wp:column {"width":"65%"} -->
    <div class="wp-block-column" style="flex-basis:65%"></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"width":"35%","className":"toggler_content_col","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"background"} -->
    <div class="wp-block-column toggler_content_col has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:35%"><!-- wp:image {"id":20,"width":"30px","height":"30px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"toggler_close"} -->
    <figure class="wp-block-image size-full is-resized toggler_close"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/cross.png" alt="" class="wp-image-20" style="object-fit:contain;width:30px;height:30px"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"fontFamily":"lexend_deca"} -->
    <h2 class="wp-block-heading has-lexend-deca-font-family">'. esc_html__('Phone','books-library') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
    <p class="has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:400"><a href="tel:+123 324 456 78">'. esc_html__('+123 324 456 78','books-library') .'</a></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"fontFamily":"lexend_deca"} -->
    <h2 class="wp-block-heading has-lexend-deca-font-family">'. esc_html__('Email','books-library') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
    <p class="has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:400"><a href="mailto:blocklibrary@example.com">'. esc_html__('blocklibrary@example.com','books-library') .'</a></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"fontFamily":"lexend_deca"} -->
    <h2 class="wp-block-heading has-lexend-deca-font-family">'. esc_html__('Address','books-library') .'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small","fontFamily":"lexend_deca"} -->
    <p class="has-lexend-deca-font-family has-small-font-size" style="font-style:normal;font-weight:400"><a href="#">'. esc_html__('123 Glassford Street New York, USA','books-library') .'</a></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:social-links {"openInNewTab":true,"className":"header-social-icon","style":{"spacing":{"margin":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":{"left":"var:preset|spacing|20"}}}} -->
    <ul class="wp-block-social-links header-social-icon" style="margin-top:var(--wp--preset--spacing--60);margin-right:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--60);margin-left:var(--wp--preset--spacing--30)"><!-- wp:social-link {"url":"www.facebook.com","service":"facebook"} /-->
    
    <!-- wp:social-link {"url":"www.instagram.com","service":"instagram"} /-->
    
    <!-- wp:social-link {"url":"www.twitter.com","service":"x"} /-->
    
    <!-- wp:social-link {"url":"www.youtube.com","service":"youtube"} /--></ul>
    <!-- /wp:social-links --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->',
);