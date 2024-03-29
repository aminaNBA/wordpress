<?php
/**
 * oceanic functions and definitions
 *
 * @package oceanic
 */
define( 'OCEANIC_THEME_VERSION' , '1.0.27' );

if ( ! function_exists( 'oceanic_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oceanic_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}
	
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' );
	add_editor_style( $font_url );

	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300' );
	add_editor_style( $font_url );
	
	add_editor_style('editor-style.css');

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on oceanic, use a find and replace
	 * to change 'oceanic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oceanic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'oceanic_blog_img_side', 352, 230, true );
    }

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oceanic' ),
        'footer' => __( 'Footer Menu', 'oceanic' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}	
	
	// The custom header is used if no slider is enabled
	add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/headers/default.jpg',
		'width'         => 1663,
		'height'        => 709,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oceanic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    add_theme_support( 'title-tag' );
	
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'oceanic-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}
	
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );		
}
endif; // oceanic_theme_setup
add_action( 'after_setup_theme', 'oceanic_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function oceanic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'oceanic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Oceanic Footer', 'oceanic' ),
		'id' => 'oceanic-site-footer',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'oceanic' )
	));
}
add_action( 'widgets_init', 'oceanic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oceanic_theme_scripts() {
    wp_enqueue_style( 'oceanic-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), OCEANIC_THEME_VERSION );
    wp_enqueue_style( 'oceanic-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), OCEANIC_THEME_VERSION );
    
	wp_enqueue_style( 'oceanic-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.2.0' );
	wp_enqueue_style( 'oceanic-style', get_stylesheet_uri(), array(), OCEANIC_THEME_VERSION );
	
	if ( oceanic_is_woocommerce_activated() ) {	
		wp_enqueue_style( 'oceanic-woocommerce-style', get_template_directory_uri().'/templates/css/oceanic-woocommerce-style.css', array(), OCEANIC_THEME_VERSION );
	}
	
	if ( get_theme_mod( 'oceanic-header-layout', false ) == 'oceanic-header-layout-centered' ) {
		wp_enqueue_style( 'oceanic-header-centered-style', get_template_directory_uri().'/templates/css/oceanic-header-centered.css', array(), OCEANIC_THEME_VERSION );
	} else {
		wp_enqueue_style( 'oceanic-header-standard-style', get_template_directory_uri().'/templates/css/oceanic-header-standard.css', array(), OCEANIC_THEME_VERSION );
	}

	wp_enqueue_script( 'oceanic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), OCEANIC_THEME_VERSION, true );
	wp_enqueue_script( 'oceanic-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), OCEANIC_THEME_VERSION, true );
	
	wp_enqueue_script( 'oceanic-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), OCEANIC_THEME_VERSION, true );

	wp_enqueue_script( 'oceanic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), OCEANIC_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oceanic_theme_scripts' );

function oceanic_admin_scripts( $hook ) {
	wp_enqueue_style( 'oceanic-admin', get_template_directory_uri().'/templates/css/admin.css', array(), OCEANIC_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'oceanic_admin_scripts' );

function oceanic_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Oceanic! I hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/oceanic/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'oceanic_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?oceanic-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_oceanic_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'oceanic_review_notice' );
}

function oceanic_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['oceanic-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'oceanic_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'oceanic_review_notice_dismissed' );

/**
 * Load Gutenberg stylesheet.
*/
function oceanic_gutenberg_assets() {
	wp_enqueue_style( 'oceanic-gutenberg-editor', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), false, OCEANIC_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/includes/inc/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'oceanic_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/inc/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

/**
 * Enqueue oceanic custom customizer styling.
 */
function oceanic_load_customizer_script() {
    wp_enqueue_script( 'oceanic-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), OCEANIC_THEME_VERSION, true );
    
    wp_enqueue_style( 'oceanic-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}    
add_action( 'customize_controls_enqueue_scripts', 'oceanic_load_customizer_script' );

function oceanic_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'      => __( 'Super Simple Slider', 'oceanic' ),
			'slug'      => 'super-simple-slider',
			'required'  => false
		),
		array(
			'name'      => __( 'You can quote me on that', 'oceanic' ),
			'slug'      => 'you-can-quote-me-on-that',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'oceanic' ),
			'slug'      => 'woocommerce',
			'required'  => false
		),
		array(
			'name'      => __( 'Page Builder by SiteOrigin', 'oceanic' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'oceanic' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'oceanic' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'Contact Form 7', 'oceanic' ),
			'slug'      => 'contact-form-7',
			'required'  => false
		),
		array(
			'name'      => __( 'Recent Posts Widget Extended', 'oceanic' ),
			'slug'      => 'recent-posts-widget-extended',
			'required'  => false
		),
		array(
			'name'      => __( 'Beam me up Scotty', 'oceanic' ),
			'slug'      => 'beam-me-up-scotty',
			'required'  => false
		),
		array(
			'name'      => __( 'Same but Different - Related Posts by Taxonomy', 'oceanic' ),
			'slug'      => 'same-but-different',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'oceanic',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => get_stylesheet_directory() .'/library/plugins/', // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                    // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'oceanic_register_required_plugins' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'oceanic_is_woocommerce_activated' ) ) :
    
function oceanic_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // oceanic_is_woocommerce_activated

if ( oceanic_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-inc.php';
}

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '<div class="hiddenUntilLoadedImageContainer loading">';
	}
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'oceanic-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '</div>';
	}
}, 11 );

// Set the number or products per page
function oceanic_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = get_theme_mod( 'oceanic-woocommerce-products-per-page' );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'oceanic_loop_shop_per_page', 20 );

if (!function_exists('oceanic_woocommerce_product_thumbnails_columns')) {
	function oceanic_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'oceanic_woocommerce_product_thumbnails_columns' );

/**
 * Replace Read more buttons for out of stock items
 */
// Display an Out of Stock label on out of stock products
add_action( 'woocommerce_after_shop_loop_item_title', 'oceanic_out_of_stock_notice', 10 );
function oceanic_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo __( 'Out of Stock', 'oceanic' );
		echo '</p>';
    }
}

// Add CSS class to body by filter
function oceanic_add_body_class( $classes ) {
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	
	if ( oceanic_is_woocommerce_activated() && is_shop() && get_theme_mod( 'oceanic-layout-woocommerce-shop-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'oceanic-shop-full-width';
	}

	if ( oceanic_is_woocommerce_activated() && is_product() && get_theme_mod( 'oceanic-layout-woocommerce-product-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'oceanic-product-full-width';
	}
	
	if ( oceanic_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'oceanic-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'oceanic-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'oceanic-shop-full-width';
	}
	
	if ( oceanic_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

	return $classes;
}
add_filter( 'body_class', 'oceanic_add_body_class' );

function oceanic_admin_notice() {
	$user_id = get_current_user_id();
	
	$message = array (
		'id' => 1,
		'text' => 'The latest <strong>Oceanic</strong> update has <strong>custom logo</strong> support so the Header Image theme setting has been changed to be used as an actual header image on the homepage.<br />
			If your logo has disappeared you can set it again by navigating to <strong>Appearance</strong> > <strong>Customize</strong> > <strong>Site Identity</strong><br />
			If your logo is being displayed as a header image on your homepage you can disable it by navigating to <strong>Appearance</strong> > <strong>Customize</strong> > <strong>Header Image</strong>'
	);
	
	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'oceanic_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice freelancelot-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><div class="container"><img src="https://www.freelancelot.co.za/wp-content/uploads/2020/08/freelancelot-logo.png" class="logo" /><p>%2$s <a href="?oceanic-admin-notice-dismissed&oceanic-admin-notice-id=%3$s" class="dismiss">Dismiss this notice</a></p></div></div>', esc_attr( $class ), $message['text'], $message['id'] );
	}
}

add_action( 'admin_notices', 'oceanic_admin_notice' );

function oceanic_admin_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['oceanic-admin-notice-dismissed'] ) ) {
    	$oceanic_admin_notice_id = $_GET['oceanic-admin-notice-id'];
		add_user_meta( $user_id, 'oceanic_admin_notice_' .$oceanic_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'oceanic_admin_notice_dismissed' );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

function oceanic_excerpt_length( $length ) {
	if ( is_admin() || ( !is_home() && !is_category() && !is_tag() && !is_search() ) ) {
		return $length;
	} else {
		return intval( get_theme_mod( 'oceanic-blog-excerpt-length', customizer_library_get_default( 'oceanic-blog-excerpt-length' ) ) );
	}
}
add_filter( 'excerpt_length', 'oceanic_excerpt_length', 999 );

function oceanic_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	} else {
		return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( pll__( get_theme_mod( 'oceanic-blog-read-more-text', customizer_library_get_default( 'oceanic-blog-read-more-text' ) ) ) ) . '</a>';
	}
}
add_filter( 'excerpt_more', 'oceanic_excerpt_more' );

/**
 * Adjust is_home query if oceanic-slider-cats is set
 */
function oceanic_set_blog_queries( $query ) {
    
    $slider_cats = get_theme_mod( 'oceanic-slider-cats', '' );
    
	if ( $slider_cats != '' ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();

		$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
		
		if ( count($slider_cats) > 0 ) {
		    for ($i=0; $i<count($slider_cats); ++$i) {
		    	$cat_id = get_cat_ID( $slider_cats[$i] );
		    	if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		    }
		    
		    if ( count($slider_cat_ids) > 0) {
		        // do not alter the query on wp-admin pages and only alter it if it's the main query
		        if ( !is_admin() && !$is_front_page || $is_front_page && $query->get('id') != 'slider' ){
	                $query->set( 'category__not_in', $slider_cat_ids );
		        }
		    }
		}
	}
	    
}
add_action( 'pre_get_posts', 'oceanic_set_blog_queries' );

function filter_recent_posts_widget_parameters( $params ) {

	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );

	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
		 
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
		 
		if ( count($slider_cat_ids) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_cat_ids;
		}
	}
	
	return $params;
}
add_filter('widget_posts_args','filter_recent_posts_widget_parameters');

/**
 * Adjust the widget categories query if oceanic-slider-cats is set
 */
function oceanic_set_widget_categories_args($args){
	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );
	
	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
		 
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
		 
		if ( count($slider_cat_ids) > 0) {
			$exclude = implode(',', $slider_cat_ids);
			$args['exclude'] = $exclude;
		}
	}

	return $args;
}
add_filter('widget_categories_args', 'oceanic_set_widget_categories_args');

function oceanic_set_widget_categories_dropdown_arg($args){
	$slider_cats = get_theme_mod( 'oceanic-slider-cats', false );
	
	if ( $slider_cats ) {
		$slider_cats = explode(',', esc_html( $slider_cats ));
		$slider_cat_ids = array();
			
		for ($i=0; $i<count($slider_cats); ++$i) {
			$cat_id = get_cat_ID( $slider_cats[$i] );
			if ($cat_id > 0) $slider_cat_ids[$i] = $cat_id;
		}
			
		if ( count($slider_cat_ids) > 0) {
			$exclude = implode(',', $slider_cat_ids);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter('widget_categories_dropdown_args', 'oceanic_set_widget_categories_dropdown_arg');

/**
* Display the upgrade to Premium page & load styles.
*
* @action admin_menu
*/
function oceanic_premium_admin_menu() {
	global $oceanic_upgrade_page;
	$oceanic_upgrade_page = add_theme_page(
		__( 'Oceanic Premium', 'oceanic' ),
		'<span class="premium-link" style="color: #00b9eb;">' . __( 'Oceanic Premium', 'oceanic' ) . '</span>',
		'edit_theme_options',
		'premium_upgrade',
		'oceanic_upgrade_page_render'
	);
}

add_action( 'admin_menu', 'oceanic_premium_admin_menu' );

/**
* Render the theme upgrade page
*/
function oceanic_upgrade_page_render() {
   locate_template( 'upgrade/freelancelot-upgrade-page.php', true, false );
}

/**
* Enqueue Oceanic admin stylesheet only on upgrade page.
*/
function oceanic_load_admin_style($hook) {
   global $oceanic_upgrade_page;

   if( $hook != $oceanic_upgrade_page )
       return;
   
   wp_enqueue_style( 'oceanic-upgrade-css', get_template_directory_uri() . '/upgrade/css/freelancelot-admin.css' );
}    
add_action( 'admin_enqueue_scripts', 'oceanic_load_admin_style' );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function oceanic_pll_register_string() {
		// Header
		pll_register_string( 'oceanic-header-info-text', get_theme_mod( 'oceanic-header-info-text', customizer_library_get_default( 'oceanic-header-info-text' ) ), 'oceanic', false );
		
		// Header media
		pll_register_string( 'oceanic-header-image-text', get_theme_mod( 'oceanic-header-image-text', customizer_library_get_default( 'oceanic-header-image-text' ) ), 'oceanic', true );
		
		// 404
		pll_register_string( 'oceanic-website-error-head', get_theme_mod( 'oceanic-website-error-head', customizer_library_get_default( 'oceanic-website-error-head' ) ), 'oceanic', false );
		pll_register_string( 'oceanic-website-error-msg', get_theme_mod( 'oceanic-website-error-msg', customizer_library_get_default( 'oceanic-website-error-msg' ) ), 'oceanic', true );
	}
	add_action( 'admin_init', 'oceanic_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}
