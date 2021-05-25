<?php

//$google_fonts_enabled = get_theme_mod( 'oceanic-google-fonts-enabled', customizer_library_get_default( 'oceanic-google-fonts-enabled') );

$fonts = array();

/*
// Heading Font
$heading_font_type = get_theme_mod( 'oceanic-heading-font-type', customizer_library_get_default( 'oceanic-heading-font-type') );

if ( $heading_font_type == 'theme-font' ) {
	if ( $google_fonts_enabled ) {
		$font = 'oceanic-heading-font';
	} else {
		$font = 'oceanic-heading-web-safe-font';
	}
	
	$fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
	    
	if ( $google_fonts_enabled ) {
		$fontstack = customizer_library_get_font_stack( $fontmod );
	} else {
		$fontstack = $fontmod;
	}
	    
} else {
	$fontstack = get_theme_mod( 'oceanic-heading-custom-font', customizer_library_get_default( 'oceanic-heading-custom-font') );
}
*/

$font = 'oceanic-heading-font';
$fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
$fontstack = customizer_library_get_font_stack( $fontmod );

//if ( $fontmod != customizer_library_get_default( $font ) || $heading_font_type == 'custom-font' ) {
if ( $fontmod != customizer_library_get_default( $font ) ) {

    Customizer_Library_Styles()->add( array(
    	'selectors' => array(
    		'.editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor .editor-block-list__block h1.mce-content-body'
    	),
    	'declarations' => array(
    		'font-family' => $fontstack
    	)
    ) );

}

// Heading Font Color
$fontcolor = 'oceanic-heading-font-color';
$fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );

if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {
    
	$sanfontcolor = esc_html( $fontcolormod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor .editor-block-list__block h1.mce-content-body,
			.edit-post-visual-editor .editor-block-list__block h2.mce-content-body,
			.edit-post-visual-editor .editor-block-list__block h3.mce-content-body,
			.edit-post-visual-editor .editor-block-list__block h4.mce-content-body,
			.edit-post-visual-editor .editor-block-list__block h5.mce-content-body,
			.edit-post-visual-editor .editor-block-list__block h6.mce-content-body'
		),
    	'declarations' => array(
    		'color' => $sanfontcolor
    	)
    ) );

}

/*
// Heading Font Size
$fontsize = 'oceanic-h1-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
	$sanfontsize = intval( $fontsizemod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor .editor-block-list__block h1.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
	) );
}      

$fontsize = 'oceanic-h2-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
	$sanfontsize = intval( $fontsizemod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block h2.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
	) );
}      

$fontsize = 'oceanic-h3-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
	$sanfontsize = intval( $fontsizemod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block h3.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
    ) );
}      

$fontsize = 'oceanic-h4-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
	$sanfontsize = intval( $fontsizemod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block h4.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
    	)
    ) );
}      

$fontsize = 'oceanic-h5-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );

if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {

	$sanfontsize = intval( $fontsizemod );

	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block h5.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
	) );
}      

$fontsize = 'oceanic-h6-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );

if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {

	$sanfontsize = intval( $fontsizemod );

	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block h6.mce-content-body'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
	) );
}      
*/

/*
// Body Font
$body_font_type = get_theme_mod( 'oceanic-body-font-type', customizer_library_get_default( 'oceanic-body-font-type') );
    
if ( $body_font_type == 'theme-font' ) {
	if ( $google_fonts_enabled ) {
		$font = 'oceanic-body-font';
	} else {
		$font = 'oceanic-body-web-safe-font';
	}

	$fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
	    
	if ( $google_fonts_enabled ) {
		$fontstack = customizer_library_get_font_stack( $fontmod );
	} else {
		$fontstack = $fontmod;
	}
    	    
} else {
	$fontstack = get_theme_mod( 'oceanic-body-custom-font', customizer_library_get_default( 'oceanic-body-custom-font') );
}
*/

$font = 'oceanic-body-font';
$fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
$fontstack = customizer_library_get_font_stack( $fontmod );

if ( $fontmod != customizer_library_get_default( $font ) ) {

	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block-edit,
			.edit-post-visual-editor,
			.editor-styles-wrapper div.wp-block,
			.editor-styles-wrapper div.wp-block p,
			.editor-styles-wrapper ul.wp-block'
		),
		'declarations' => array(
			'font-family' => $fontstack
		)
	) );

}

/*
// Body Font Weight
$fontweight = 'oceanic-body-font-weight';
$fontweightmod = get_theme_mod( $fontweight, customizer_library_get_default( $fontweight ) );

if ( $fontweightmod != customizer_library_get_default( $fontweight ) ) {

	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block-edit,
			.edit-post-visual-editor,
			.editor-styles-wrapper div.wp-block,
			.editor-styles-wrapper div.wp-block p,
			.editor-styles-wrapper ul.wp-block'
		),
		'declarations' => array(
			'font-weight' => $fontweightmod
		)
	) );

}
*/

// Body Font Color
$fontcolor = 'oceanic-body-font-color';
$fontcolormod = get_theme_mod( $fontcolor, customizer_library_get_default( $fontcolor ) );

if ( $fontcolormod !== customizer_library_get_default( $fontcolor ) ) {

	$sanfontcolor = esc_html( $fontcolormod );
	$sanfontcolor_rgb = customizer_library_hex_to_rgb( $sanfontcolor );

	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block-edit,
			.edit-post-visual-editor,
			.editor-styles-wrapper div.wp-block,
			.editor-styles-wrapper div.wp-block p,
			.editor-styles-wrapper ul.wp-block'
		),
		'declarations' => array(
			'color' => $sanfontcolor
		)
	) );

}

/*
// Body Font Size
$fontsize = 'oceanic-body-font-size';
$fontsizemod = get_theme_mod( $fontsize, customizer_library_get_default( $fontsize ) );
    
if ( $fontsizemod !== customizer_library_get_default( $fontsize ) ) {
    
	$sanfontsize = intval( $fontsizemod );
    
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.edit-post-visual-editor .editor-block-list__block-edit,
			.edit-post-visual-editor,
			.editor-styles-wrapper div.wp-block,
			.editor-styles-wrapper div.wp-block p,
			.editor-styles-wrapper ul.wp-block'
		),
		'declarations' => array(
			'font-size' => $sanfontsize. 'px'
		)
	) );
}  
*/

/**
 * Enqueue Google Fonts for the Gutenberg editor
 */
//if ( $google_fonts_enabled ) {
	$fonts = array(
		get_theme_mod( 'oceanic-body-font', customizer_library_get_default( 'oceanic-body-font' ) ),
		get_theme_mod( 'oceanic-heading-font', customizer_library_get_default( 'oceanic-heading-font' ) )
	);
	
	$font_uri = customizer_library_get_google_font_uri( $fonts );
	
	wp_enqueue_style( 'oceanic_gutenberg_editor_fonts', $font_uri, array(), null, 'screen' );
//}


if ( ! function_exists( 'oceanic_gutenberg_editor_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function oceanic_gutenberg_editor_styles() {

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Gutenberg Editor Custom CSS -->\n<style type=\"text/css\" id=\"out-the-box-gutenberg-editor-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'admin_head', 'oceanic_gutenberg_editor_styles', 11 );    
