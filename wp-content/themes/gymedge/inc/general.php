<?php
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

add_action( 'after_setup_theme', 'gymedge_setup' );
function gymedge_setup() {
	// Language
	load_theme_textdomain( 'gymedge', GYMEDGE_BASE_DIR . 'languages' );

	// Theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ] );
	add_theme_support( 'woocommerce', [
		'gallery_thumbnail_image_width' => 200,
	] );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'wp-block-styles' );

	add_post_type_support( 'post', 'page-attributes' );

	// Image sizes
	add_image_size( 'gymedge-size1', 1200, 600, true ); // post large
	add_image_size( 'gymedge-size2', 410, 200, true ); // post small, class slider
	add_image_size( 'gymedge-size3', 360, 460, true ); // trainer
	add_image_size( 'gymedge-size4', 360, 360, [ 'center', 'top' ] ); // trainer square
	add_image_size( 'gymedge-size5', 360, 300, true ); // class grid
	add_image_size( 'gymedge-size6', 800, 600, true ); // gallery large
	add_image_size( 'gymedge-size7', 400, 270, true ); // gallery small

	// Register menus
	register_nav_menus( [
		'primary' => esc_html__( 'Primary', 'gymedge' ),
		'top'     => esc_html__( 'Header Top', 'gymedge' ),
	] );
}

// Hide preloader if js is disabled
add_action( 'wp_head', 'gymedge_noscript_hide_preloader', 1 );
function gymedge_noscript_hide_preloader() {
	echo '<noscript><style>#preloader{display:none;}</style></noscript>';
}

// Pingback
add_action( 'wp_head', 'gymedge_pingback' );
function gymedge_pingback() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

/*---------------------------------------------------------
#. LayerSlider and YITH compatibility fix
-----------------------------------------------------------*/
add_action( 'current_screen', 'rdtheme_remove_yith_script_from_ls' );
function rdtheme_remove_yith_script_from_ls() {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! class_exists( 'YIT_Assets' ) ) {
		return;
	}

	$ls_screens = [
		'toplevel_page_layerslider',
		'layerslider-wp_page_layerslider-options',
		'layerslider-wp_page_layerslider-addons'
	];

	$current_screen = get_current_screen();

	if ( in_array( $current_screen->id, $ls_screens ) ) {
		remove_action( 'admin_enqueue_scripts', [ YIT_Assets::instance(), 'register_styles_and_scripts' ] );
		remove_action( 'admin_notices', 'yith_plugin_fw_promo_notices', 15 );
	}
}

/**
 * Get all days name
 * @return mixed|null
 */
if ( ! function_exists( 'gymedge_weeknames_large' ) ) {
	function gymedge_weeknames_large() {
		return apply_filters( 'gym_weeknames', [
			'mon' => __( 'Monday', 'gymedge-core' ),
			'tue' => __( 'Tuesday', 'gymedge-core' ),
			'wed' => __( 'Wednesday', 'gymedge-core' ),
			'thu' => __( 'Thursday', 'gymedge-core' ),
			'fri' => __( 'Friday', 'gymedge-core' ),
			'sat' => __( 'Saturday', 'gymedge-core' ),
			'sun' => __( 'Sunday', 'gymedge-core' ),
		] );
	}
}

/**
 * Get all days name in shorthand
 * @return mixed|null
 */
if ( ! function_exists( 'gymedge_weeknames_short' ) ) {
	function gymedge_weeknames_short() {
		return apply_filters( 'gym_weeknames_short', [
			'mon' => __( 'Mon', 'gymedge-core' ),
			'tue' => __( 'Tue', 'gymedge-core' ),
			'wed' => __( 'Wed', 'gymedge-core' ),
			'thu' => __( 'Thu', 'gymedge-core' ),
			'fri' => __( 'Fri', 'gymedge-core' ),
			'sat' => __( 'Sat', 'gymedge-core' ),
			'sun' => __( 'Sun', 'gymedge-core' ),
		] );
	}
}