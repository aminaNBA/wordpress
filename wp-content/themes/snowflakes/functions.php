<?php
/**
 * Components functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Snowflakes
 */

/**
 * Loads the child theme textdomain and update notifier.
 */
function snowflakes_setup() {
    load_child_theme_textdomain( 'snowflakes', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'snowflakes_setup' );

/**
 * Enqueue scripts and styles.
 */
function snowflakes_scripts() {
	/* If using a child theme, auto-load the parent theme style. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'fotografie-style', trailingslashit( esc_url( get_template_directory_uri() ) ) . 'style.css' );
	}

	/* Always load active theme's style.css. */
	wp_enqueue_style( 'snowflakes-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'snowflakes_scripts' );


if ( ! function_exists( 'snowflakes_header_media_text' ) ) :
	/**
	 * Display Header Media Text
	 * @return void
	 */
	function snowflakes_header_media_text() {
		$title    = get_theme_mod( 'snowflakes_header_media_title', esc_html__( 'Happy Holidays', 'snowflakes' ) );
		$text     = get_theme_mod( 'snowflakes_header_media_text', esc_html__( 'And a Joyful New Year', 'snowflakes' ) );
		$url      = get_theme_mod( 'snowflakes_header_media_button_url', '#' );
		$url_text = get_theme_mod( 'snowflakes_header_media_button_text', esc_html__( 'Continue Reading', 'snowflakes' ) );
		$base     = get_theme_mod( 'snowflakes_header_media_button_base' );
		$target   = '_self';

		if ( '' != $url ) {
			//support for qtranslate custom link
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$url = qtrans_convertURL( $url );
			}

			//Checking Link Target
			if ( $base ) {
				$target = '_blank';
			}
		}

		if ( '' !== $title || '' !== $text || '' !== $url ) : ?>
			<div class="custom-header-content section header-media-section">
				<div class="custom-header-content-wrapper">
					<?php if ( '' !== $title ) : ?>
						<h2 class="entry-title section-title"><?php echo wp_kses_post( $title ); ?></h2>
					<?php endif; ?>

					<p class="site-header-text"><?php echo wp_kses_post( $text ); ?>

					<span class="header-button"><a href="<?php echo esc_url( $url ); ?>" target="<?php echo $target; ?>" class="button"><?php echo wp_kses_data( $url_text ); ?><span class="screen-reader-text"><?php echo wp_kses_post( $title ); ?></span></a></span>
				</div><!-- .custom-header-content-wrapper -->
			</div>
		<?php endif;
	}
endif; // snowflakes_header_media_text().

/**
 * Change Custom background parameters
 * @param  array $params parent theme Custom Background parameters
 * @return array Modified child theme Custom Background Parameters
 */
function snowflakes_custom_background_parameters( $params ) {
	$params['default-color']      = 'e4e1e2';
	$params['default-attachment'] = 'cover';
	$params['default-repeat']     = 'no-repeat';
	$params['default-image']      = get_stylesheet_directory_uri() . '/assets/images/background.jpg';

	return $params;
}
add_filter( 'fotografie_custom_background_args', 'snowflakes_custom_background_parameters' );

/**
 * Load Customizer Options
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer.php';

/**
 * Load Upgrade to pro button
 */
require trailingslashit( get_stylesheet_directory() ) . 'class-customize.php';

/**
 * Parent theme override functions
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/override-parent.php';
