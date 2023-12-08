<?php

use Elementor\Plugin;

if ( ! function_exists( 'gymedge_fonts_url' ) ) {
	function gymedge_fonts_url() {
		$fonts_url = '';
		if ( 'off' !== _x( 'on', 'Google fonts - Open Sans and Roboto : on or off', 'gymedge' ) ) {
			$fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:400,400i,600|Roboto:400,500,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		}

		return $fonts_url;
	}
}

add_action( 'wp_enqueue_scripts', 'gymedge_register_scripts', 12 );
if ( ! function_exists( 'gymedge_register_scripts' ) ) {
	function gymedge_register_scripts() {
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel', GYMEDGE_CSS_URL . 'owl.carousel.min.css', [], GYMEDGE_THEME_VERSION );
		wp_register_style( 'owl-theme-default', GYMEDGE_CSS_URL . 'owl.theme.default.min.css', [], GYMEDGE_THEME_VERSION );
		// magnific popup
		wp_register_style( 'magnific-popup', GymEdge_Helper::maybe_rtl( 'magnific-popup.min.css' ), [], GYMEDGE_THEME_VERSION );

		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel', GYMEDGE_JS_URL . 'owl.carousel.min.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// isotope
		wp_register_script( 'isotope-pkgd', GYMEDGE_JS_URL . 'isotope.pkgd.min.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// magnific popup
		wp_register_script( 'jquery-magnific-popup', GYMEDGE_JS_URL . 'jquery.magnific-popup.min.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// vc gallery js
		wp_register_script( 'gym-vc-gallery', GYMEDGE_JS_URL . 'vc-gallery.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
	}
}

// Dequeue and Deregister Script
add_action( 'wp_enqueue_scripts', 'rt_dequeue_styles', 14 );
if ( ! function_exists( 'rt_dequeue_styles' ) ) {
	function rt_dequeue_styles() {
		// FontAwesome
		wp_dequeue_style( 'yith-wcwl-font-awesome' );
		wp_deregister_style( 'yith-wcwl-font-awesome' );
	}
}

add_action( 'wp_enqueue_scripts', 'gymedge_enqueue_scripts', 15 );
if ( ! function_exists( 'gymedge_enqueue_scripts' ) ) {
	function gymedge_enqueue_scripts() {
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'gymedge-gfonts', gymedge_fonts_url(), [], GYMEDGE_THEME_VERSION );
		// Bootstrap CSS
		wp_enqueue_style( 'bootstrap', GymEdge_Helper::maybe_rtl( 'bootstrap.min.css' ), [], GYMEDGE_THEME_VERSION );
		// font-awesome CSS
		wp_deregister_style('font-awesome');
		wp_dequeue_style('font-awesome');
		wp_enqueue_style( 'font-awesome', GYMEDGE_CSS_URL . 'font-awesome.min.css', [], GYMEDGE_THEME_VERSION );
		// main CSS
		wp_enqueue_style( 'gymedge-default', GymEdge_Helper::maybe_rtl( 'default.css' ), [], GYMEDGE_THEME_VERSION );
		// vc modules css
		wp_enqueue_style( 'gymedge-vc', GymEdge_Helper::maybe_rtl( 'vc.css' ), [], GYMEDGE_THEME_VERSION );
		// style CSS
		wp_enqueue_style( 'gymedge-style', GymEdge_Helper::maybe_rtl( 'style.css' ), [], GYMEDGE_THEME_VERSION );
		// responsive CSS
		wp_enqueue_style( 'gymedge-responsive', GymEdge_Helper::maybe_rtl( 'responsive.css' ), [], GYMEDGE_THEME_VERSION );
		// RTL
		if ( is_rtl() ) {
			wp_enqueue_style( 'gymedge-rtl', GYMEDGE_CSS_URL . 'rtl.css', [], GYMEDGE_THEME_VERSION );
		}
		// variable style CSS
		ob_start();
		include GYMEDGE_INC_DIR . 'variable-style.php';
		include GYMEDGE_INC_DIR . 'variable-style-vc.php';
		$variable_css = ob_get_clean();
		$variable_css .= GymEdge::$options['custom_css']; // custom css
		wp_add_inline_style( 'gymedge-responsive', $variable_css );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap', GYMEDGE_JS_URL . 'bootstrap.min.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// Nav smooth scroll
		wp_enqueue_script( 'navpoints', GYMEDGE_JS_URL . 'jquery.navpoints.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );

		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Cookie js
		wp_enqueue_script( 'js-cookie', GYMEDGE_JS_URL . 'js.cookie.min.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// main js
		wp_enqueue_script( 'gymedge-main', GYMEDGE_JS_URL . 'main.js', [ 'jquery' ], GYMEDGE_THEME_VERSION, true );
		// Elementor
		gymedge_elementor_scripts();
		// localize script
		$vc_rtl = 'no';
		if ( defined( 'WPB_VC_VERSION' ) && is_rtl() ) {
			$vc_rtl = version_compare( WPB_VC_VERSION, '5.0', '<' ) ? 'yes' : 'no';
		}

		$gym_localize_data = [
			'ajaxurl'           => admin_url( 'admin-ajax.php' ),
			'baseurl'           => get_bloginfo( 'url' ),
			'stickyMenu'        => GymEdge::$options['sticky_menu'],
			'meanWidth'         => GymEdge::$options['resmenu_width'],
			'siteLogo'          => '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '"><img class="logo-small" src="'
			                       . esc_url( GymEdge::$options['logo']['url'] ) . '" /></a>',
			'extraOffset'       => GymEdge::$options['sticky_menu'] ? 67 : 0,
			'extraOffsetMobile' => GymEdge::$options['sticky_menu'] ? 52 : 0,
			'rtl'               => is_rtl() ? 'yes' : 'no',
			'stickyOld'         => apply_filters( 'gymedge_keep_old_style_stickymenu', false ),
			'vcRtl'             => $vc_rtl, //@rtl
		];
		wp_localize_script( 'gymedge-main', 'gymEdgeObj', $gym_localize_data );
	}
}

// Admin Scripts
add_action( 'admin_enqueue_scripts', 'gymedge_admin_scripts', 12 );
if ( ! function_exists( 'gymedge_admin_scripts' ) ) {
	function gymedge_admin_scripts() {
		global $pagenow, $typenow;

		wp_enqueue_style( 'gymedge-admin', GymEdge_Helper::maybe_rtl( 'admin.css' ), [], GYMEDGE_THEME_VERSION );

		wp_enqueue_style( 'font-awesome', GYMEDGE_CSS_URL . 'font-awesome.min.css', [], GYMEDGE_THEME_VERSION );

		if ( ! in_array( $pagenow, [ 'post.php', 'post-new.php', 'edit.php' ] ) ) {
			return;
		}

		if ( $typenow == 'wlshowcasesc' ) {
			wp_enqueue_style( 'gymedge-logo-showcase', GYMEDGE_CSS_URL . 'admin-logo-showcase.css', [], GYMEDGE_THEME_VERSION );
		}
	}
}

add_action( 'enqueue_block_editor_assets', 'gymedge_gutenberg_scripts' );
function gymedge_gutenberg_scripts() {
	wp_enqueue_style( 'gymedge-gfonts', gymedge_fonts_url(), [], GYMEDGE_THEME_VERSION );
	wp_enqueue_style( 'gymedge-gutenberg', GymEdge_Helper::maybe_rtl( 'gutenberg.css' ), [], GYMEDGE_THEME_VERSION );
	ob_start();
	include GYMEDGE_INC_DIR . 'variable-style-gutenberg.php';
	$dynamic_css = ob_get_clean();
	$css         = gymedge_add_prefix_to_css( $dynamic_css, '.wp-block.editor-block-list__block' );
	$css         = str_replace( 'gtnbg_root', '', $css );
	wp_add_inline_style( 'gymedge-gutenberg', $css );
}

function gymedge_add_prefix_to_css( $css, $prefix ) {
	$parts = explode( '}', $css );
	foreach ( $parts as &$part ) {
		if ( empty( $part ) ) {
			continue;
		}

		$firstPart = substr( $part, 0, strpos( $part, '{' ) + 1 );
		$lastPart  = substr( $part, strpos( $part, '{' ) + 2 );
		$subParts  = explode( ',', $firstPart );
		foreach ( $subParts as &$subPart ) {
			$subPart = str_replace( "\n", '', $subPart );
			$subPart = $prefix . ' ' . trim( $subPart );
		}

		$part = implode( ', ', $subParts ) . $lastPart;
	}

	$prefixedCSS = implode( "}\n", $parts );

	return $prefixedCSS;
}

function gymedge_elementor_scripts() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}
	if ( Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_style( 'magnific-popup' );

		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'jquery-magnific-popup' );
		wp_enqueue_script( 'gym-vc-gallery' );
	}
}