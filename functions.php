<?php
/**
 * Milon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Milon
 * @since Milon 1.0
 */
if ( ! function_exists( 'milon_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Milon 1.0
	 *
	 * @return void
	 */
	function milon_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'milon_support' );

require get_template_directory() . '/vendor/autoload.php';