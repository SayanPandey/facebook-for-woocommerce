<?php
/**
 * Books Library functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package books-library
 * @since books-library 1.0
 */

if ( ! function_exists( 'books_library_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since books-library 1.0
	 *
	 * @return void
	 */
	function books_library_support() {

		load_theme_textdomain( 'books-library', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}

endif;

add_action( 'after_setup_theme', 'books_library_support' );

if ( ! function_exists( 'books_library_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since books-library 1.0
	 *
	 * @return void
	 */
	function books_library_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'books-library-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'books-library-style' );

		wp_style_add_data( 'books-library-style', 'rtl', 'replace' );

		wp_enqueue_style( 'dashicons' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'books_library_styles' );

/* Enqueue Custom Js */
function books_library_scripts() {

	wp_enqueue_script( 
		'books-library-company-custom', esc_url(get_template_directory_uri()) . '/assets/js/custom.js', 
		array() 
	);
	wp_enqueue_script(
        'books-library-scroll-to-top',
        esc_url(get_template_directory_uri()) . '/assets/js/scroll-to-top.js',
        array(), 
        null, 
        true // Load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'books_library_scripts' );

// Add block patterns
require get_template_directory() . '/inc/block-pattern.php';

// Add block Style
require get_template_directory() . '/inc/block-style.php';

// TGM
require get_template_directory() . '/inc/tgm/plugin-activation.php';