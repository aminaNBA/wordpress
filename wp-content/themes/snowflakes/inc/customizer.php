<?php
/**
 * Snowflakes Theme Customizer
 *
 * @package Snowflakes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function snowflakes_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'upgrade_button' );
	$wp_customize->remove_section( 'Fotografie_Important_Links' );

	$wp_customize->get_setting( 'header_image' )->transport = 'refresh';

	$wp_customize->add_setting( 'snowflakes_header_media_title', array(
		'default'			=> esc_html__( 'Happy Holidays', 'snowflakes' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'snowflakes_header_media_title', array(
		'label'		=> esc_html__( 'Header Media Title', 'snowflakes' ),
		'section'   => 'header_image',
        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'snowflakes_header_media_text', array(
		'default'			=> esc_html__( 'And a Joyful New Year', 'snowflakes' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'snowflakes_header_media_text', array(
		'label'    => esc_html__( 'Header Media Text', 'snowflakes' ),
		'section'  => 'header_image',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'snowflakes_header_media_button_text', array(
		'default'			=> esc_html__( 'Continue Reading', 'snowflakes' ),
		'sanitize_callback' => 'wp_kses_data',
	) );

	$wp_customize->add_control( 'snowflakes_header_media_button_text', array(
		'label'		=> esc_html__( 'Header Media Link Text', 'snowflakes' ),
		'section'   => 'header_image',
        'type'	  	=> 'url',
	) );

	$wp_customize->add_setting( 'snowflakes_header_media_button_url', array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'snowflakes_header_media_button_url', array(
		'label'    => esc_html__( 'Header Media Link URL', 'snowflakes' ),
		'section'  => 'header_image',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'snowflakes_header_media_button_base', array(
		'sanitize_callback' => 'fotografie_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'snowflakes_header_media_button_base', array(
		'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'snowflakes' ),
		'section'  	=> 'header_image',
		'type'     	=> 'checkbox',
	) );

	// Important Links.
	class Snowflakes_Important_Links extends WP_Customize_Control {
		public $type = 'important-links';

		public function render_content() {
			// Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links.
			$important_links = array(
				'theme_instructions' => array(
					'link'  => esc_url( 'https://catchthemes.com/theme-instructions/snowflakes/' ),
					'text'  => esc_html__( 'Theme Instructions', 'snowflakes' ),
					),
				'support' => array(
					'link'  => esc_url( 'https://catchthemes.com/support/' ),
					'text'  => esc_html__( 'Support', 'snowflakes' ),
					),
				'changelog' => array(
					'link'  => esc_url( 'https://catchthemes.com/changelogs/snowflakes-theme/' ),
					'text'  => esc_html__( 'Changelog', 'snowflakes' ),
					),
				'facebook' => array(
					'link'  => esc_url( 'https://www.facebook.com/catchthemes/' ),
					'text'  => esc_html__( 'Facebook', 'snowflakes' ),
					),
				'twitter' => array(
					'link'  => esc_url( 'https://twitter.com/catchthemes/' ),
					'text'  => esc_html__( 'Twitter', 'snowflakes' ),
					),
				'gplus' => array(
					'link'  => esc_url( 'https://plus.google.com/+Catchthemes/' ),
					'text'  => esc_html__( 'Google+', 'snowflakes' ),
					),
				'pinterest' => array(
					'link'  => esc_url( 'http://www.pinterest.com/catchthemes/' ),
					'text'  => esc_html__( 'Pinterest', 'snowflakes' ),
					),
			);

			foreach ( $important_links as $important_link ) {
				echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . $important_link['text'] . ' </a></p>'; // WPCS: XSS OK.
			}
		}
	}

	$wp_customize->add_section( 'snowflakes_important_links', array(
		'priority'      => 999,
		'title'         => esc_html__( 'Important Links', 'snowflakes' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'snowflakes_important_links', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Snowflakes_Important_Links( $wp_customize, 'snowflakes_important_links', array(
		'label'     => esc_html__( 'Important Links', 'snowflakes' ),
		'section'   => 'snowflakes_important_links',
	) ) );
}
add_action( 'customize_register', 'snowflakes_customize_register', 100 );
