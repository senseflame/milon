<?php
if ( ! function_exists( 'milon_theme_assets' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Milon 1.0
	 *
	 * @return void
	 */
	function milon_theme_assets() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version && !WP_DEBUG ) ? $theme_version : time();
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $version_string );
		wp_register_style( 'milon-style', get_template_directory_uri() . '/style.css', array('bootstrap'), $version_string );

		// Add styles inline.
		wp_add_inline_style( 'milon-style', milon_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'milon-style' );


        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), $version_string );


	}

endif;

add_action( 'wp_enqueue_scripts', 'milon_theme_assets' );

if ( ! function_exists( 'milon_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Milon 1.0
	 *
	 * @return void
	 */
	function milon_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'milon_preload_webfonts' );