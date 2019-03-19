<?php
/**
 * FFV
 *
 * Customize Theme for FFV.
 *
 * @package Starter Theme
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'da_localization_setup' );
function da_localization_setup(){
	load_child_theme_textdomain( 'da', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Add Custom shortcode
include_once( get_stylesheet_directory() . '/inc/da-shortcode.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Destino Argentina' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'da_enqueue_scripts_styles' );
function da_enqueue_scripts_styles() {

	// CSS
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
	wp_enqueue_style( 'sl1', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/ajax-loader.gif' );
	wp_enqueue_style( 'sl2', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/fonts/slick.eot' );
	wp_enqueue_style( 'sl3', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/fonts/slick.svg' );
	wp_enqueue_style( 'sl4', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/fonts/slick.ttf' );
	wp_enqueue_style( 'sl5', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/fonts/slick.woff' );
	wp_enqueue_style( 'sl6', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' );
	wp_enqueue_style( 'sl7', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' );
  	wp_enqueue_style( 'child', get_stylesheet_directory_uri() . '/child.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'lity', '//cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css' );
	wp_enqueue_style( 'star', '//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css' );
  
  // JS
  //wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), "1.12.1" ); // sample
  wp_enqueue_script( 'star', '//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'lity-js', '//cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'sl1', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'child-js', get_stylesheet_directory_uri() . '/js/child.js', array( 'jquery' ), CHILD_THEME_VERSION );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'da-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'da-responsive-menu',
		'genesis_responsive_menu',
		da_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function da_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'da' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'da' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}


/** CHANGE ADMIN CSS **/
/** http://www.code-slap.com/4-space-tabs-in-textarea-editors/ **/
if ( !function_exists('base_admin_css') ) {
	function base_admin_css()
	{
		wp_enqueue_style('base-admin-css', get_stylesheet_directory_uri() .'/admin.css', false, '1.0', 'all');
	}
	add_action( 'admin_print_styles', 'base_admin_css' );
}


// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'da' ), 'secondary' => __( 'Footer Menu', 'da' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'da_secondary_menu_args' );
function da_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'da_author_box_gravatar' );
function da_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'da_comments_gravatar' );
function da_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}


add_action( 'get_header', 'da_remove_titles_all_single_pages' );
function da_remove_titles_all_single_pages() {
    if ( is_singular() ) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
        remove_action( 'genesis_after_post_content', 'genesis_post_meta', 12 );
        remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
    }
}
//add_filter('wpcf7_autop_or_not', '__return_false'); 
