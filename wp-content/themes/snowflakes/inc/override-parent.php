<?php
/**
 * Override parent functions
 *
 * @package Snowflakes
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * Overwriting parent theme custom header
 */
function fotografie_custom_header_setup() {
	$args = array(
		'default-image'      => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
		'default-text-color' => 'ffffff',
		'width'              => 1920,
		'height'             => 980,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'fotografie_header_style',
		'video'              => true,
	);

	$default_headers_args = array(
		'christmas' => array(
			'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header-thumb.jpg',
			'url'           => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
			'description'   => esc_html__( 'Christmas', 'snowflakes' ),
		),
	);

	if ( 'boxed' === get_theme_mod( 'fotografie_layout_type' ) ) {
		$args['default-image'] = get_stylesheet_directory_uri() . '/assets/images/header-boxed.jpg';
		$args['width']         = 1500;
		$args['height']        = 766;

		$default_headers_args['christmas']['url'] =  get_stylesheet_directory_uri() . '/assets/images/header-boxed.jpg';
	}

	add_theme_support( 'custom-header', apply_filters( 'fotografie_custom_header_args', $args ) );

	register_default_headers( $default_headers_args );
}

/**
 * Register Google fonts for Snowflakes.
 *
 * Overwriting fotografie_fonts_url() function in a child theme.
 */
function fotografie_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Dancing Script font: on or off', 'snowflakes' ) ) {
		$fonts[] = 'Dancing Script:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'EB Garamond font: on or off', 'snowflakes' ) ) {
		$fonts[] = 'EB Garamond:400,700,400italic,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url( $fonts_url );
}
