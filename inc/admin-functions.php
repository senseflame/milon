<?php
if ( ! function_exists( 'milon_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Milon 1.0
	 *
	 * @return void
	 */
	function milon_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', milon_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'milon_editor_styles' );


if ( ! function_exists( 'milon_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions milon_styles() and milon_editor_styles() above.
	 *
	 * @since Milon 1.0
	 *
	 * @return string
	 */
	function milon_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;


if ( ! function_exists( 'milon_widgets_init' ) ) :
    function milon_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Primary Sidebar', 'milon' ),
            'id'            => 'sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar', 'milon' ),
            'id'            => 'sidebar-2',
            'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li></ul>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
endif;
add_action( 'widgets_init', 'milon_widgets_init' );

if ( ! function_exists( 'milon_register_my_menus' ) ) :
    function milon_register_my_menus() {
        register_nav_menus(
            array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
            )
        );
    }
endif;
add_action( 'init', 'milon_register_my_menus' );