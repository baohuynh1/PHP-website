<?php
/*
Plugin Name: GymEdge Core
Plugin URI: http://radiustheme.com
Description: GymEdge Core Plugin for GymEdge Theme
Version: 3.3.4
Author: Radius Theme
Author URI: http://radiustheme.com
*/

define( 'GYMEDGE_CORE_VERSION', '3.3.4' );
define( 'GYMEDGE_CORE_AUTHOR', 'Radius Theme' );
define( 'GYMEDGE_CORE_NAME', 'GymEdge Core' );
define( 'GYMEDGE_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );
define( 'GYMEDGE_CORE_BASE_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'GYMEDGE_CORE_THEME_PREFIX', 'gymedge' );

// Text Domain
add_action( 'plugins_loaded', 'gymedge_core_load_textdomain' );
function gymedge_core_load_textdomain() {
	load_plugin_textdomain( 'gymedge-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	//PHP version check
	if ( version_compare( phpversion(), '7.2', '<' ) ) {
		add_action( 'admin_notices', 'php_version_message' );
	}

	if ( version_compare( phpversion(), '7.2', '>' ) ) {
		// Includes
		require_once GYMEDGE_CORE_BASE_DIR . 'optimization/__init__.php';
	}
}

function php_version_message() {

	$class = 'notice notice-warning settings-error';
	/* translators: %s: html tags */
	$message = sprintf( __( 'The %1$sGymEdge Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'metro-core' ), '<strong>', '</strong>' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $message ) );

}


add_action( 'after_setup_theme', 'gymedge_core_includes', 3 );
function gymedge_core_includes() {
	if ( ! defined( 'GYMEDGE_THEME_VERSION' ) ) {
		return;
	}

	// Plugin Hooks
	require_once GYMEDGE_CORE_BASE_DIR . 'plugin-hooks.php';

	// Widgets
	require_once GYMEDGE_CORE_BASE_DIR . 'widgets/init.php';

	// Demo Importer settings
	require_once GYMEDGE_CORE_BASE_DIR . 'demo-importer.php';
	require_once GYMEDGE_CORE_BASE_DIR . 'demo-importer-ocdi.php';
}


// Post types
add_action( 'after_setup_theme', 'gymedge_core_post_types', 12 );
function gymedge_core_post_types() {
	if ( ! defined( 'GYMEDGE_THEME_VERSION' ) ) {
		return;
	}
	require_once GYMEDGE_CORE_BASE_DIR . 'radius-posts/rt-posts.php';
	require_once GYMEDGE_CORE_BASE_DIR . 'radius-posts/rt-postmeta.php';
	require_once GYMEDGE_CORE_BASE_DIR . 'post-types.php';
	require_once GYMEDGE_CORE_BASE_DIR . 'post-meta.php';
}

// Include Elementor
add_action( 'after_setup_theme', 'elementor_widgets', 12 );
function elementor_widgets() {
	if ( did_action( 'elementor/loaded' ) ) {
		require_once GYMEDGE_CORE_BASE_DIR . 'elementor/init.php'; // Elementor
	}
}

add_action( 'wp_enqueue_scripts', 'gymedge_core_scripts' );
function gymedge_core_scripts() {
	wp_register_style( 'swiper', GYMEDGE_CORE_BASE_URL . '/assets/css/swiper.min.css', [], GYMEDGE_CORE_VERSION );
	wp_register_script( 'swiper', GYMEDGE_CORE_BASE_URL . '/assets/js/swiper.min.js', [ 'jquery' ], GYMEDGE_CORE_VERSION, true );
}

function gymedge_vc_admin_styles() {
	wp_enqueue_style( 'gymedge_vc_admin_style', GYMEDGE_CORE_BASE_URL . 'assets/css/vc-element-style.css', [], GYMEDGE_CORE_VERSION, 'all' );
}

add_action( 'admin_enqueue_scripts', 'gymedge_vc_admin_styles' );

// Visual composer
add_action( 'after_setup_theme', 'gymedge_core_vc_modules', 13 );
function gymedge_core_vc_modules() {
	if ( ! defined( 'GYMEDGE_THEME_VERSION' ) || ! defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	$modules = [ 'inc/abstruct', 'title', 'post-slider', 'post-list', 'post-grid', 'bmi-calculator', 'trainer', 'class', 'class-upcoming', 'schedule', 'routine', 'testimonial', 'info-text', 'intro', 'about', 'pricing-box', 'button', 'counter', 'experience', 'skill', 'gallery', 'cta', 'cta-signup', 'cta-discount', 'about-fitness', 'slider' ];

	if ( class_exists( 'WooCommerce' ) ) {
		array_push( $modules, 'product-slider' );
	}

	$modules = apply_filters( 'gymedge_vc_addons_list', $modules );

	foreach ( $modules as $module ) {
		$template_name = "/vc-custom-addons/{$module}-class.php";
		if ( file_exists( STYLESHEETPATH . $template_name ) ) {
			$file = STYLESHEETPATH . $template_name;
		} else if ( file_exists( TEMPLATEPATH . $template_name ) ) {
			$file = TEMPLATEPATH . $template_name;
		} else {
			$file = GYMEDGE_CORE_BASE_DIR . 'vc-modules/' . $module . '.php';
		}

		require_once $file;
	}
}

// Custom Functions
function rt_vc_pagination() {
	if ( ! defined( 'GYMEDGE_THEME_VERSION' ) ) {
		return;
	}

	return GymEdge_Helper::pagination();
}

// Create multi dropdown param type