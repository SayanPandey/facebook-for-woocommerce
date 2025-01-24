<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage books-library
 * @since books-library 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since books-library 1.0
	 *
	 * @return void
	 */
	function books_library_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'books-library-border',
				'label' => esc_html__( 'Borders', 'books-library' ),
			)
		);

		
	}
	add_action( 'init', 'books_library_register_block_styles' );
}