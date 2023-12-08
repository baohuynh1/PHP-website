<?php
$gym_theme_data = wp_get_theme( get_template() );

if ( function_exists( 'vc_is_inline' ) && vc_is_inline() ) {
	define( 'GYMEDGE_THEME_VERSION', time() );
} else {
	define( 'GYMEDGE_THEME_VERSION', ( WP_DEBUG ) ? time() : $gym_theme_data->get( 'Version' ) );
}
define( 'GYMEDGE_THEME_AUTHOR_URI', $gym_theme_data->get( 'AuthorURI' ) );

// DIR
define( 'GYMEDGE_BASE_DIR', get_template_directory() . '/' );
define( 'GYMEDGE_INC_DIR', GYMEDGE_BASE_DIR . 'inc/' );
define( 'GYMEDGE_LIB_DIR', GYMEDGE_BASE_DIR . 'lib/' );
define( 'GYMEDGE_WID_DIR', GYMEDGE_INC_DIR . 'widgets/' );
define( 'GYMEDGE_PLUGINS_DIR', GYMEDGE_INC_DIR . 'plugins/' );
define( 'GYMEDGE_JS_DIR', GYMEDGE_BASE_DIR . 'assets/js/' );

// URL
define( 'GYMEDGE_BASE_URL', get_template_directory_uri() . '/' );
define( 'GYMEDGE_ASSETS_URL', GYMEDGE_BASE_URL . 'assets/' );
define( 'GYMEDGE_CSS_URL', GYMEDGE_ASSETS_URL . 'css/' );
define( 'GYMEDGE_RTL_URL', GYMEDGE_ASSETS_URL . 'css-rtl/' );
define( 'GYMEDGE_JS_URL', GYMEDGE_ASSETS_URL . 'js/' );
define( 'GYMEDGE_IMG_URL', GYMEDGE_ASSETS_URL . 'img/' );

// Includes
require_once GYMEDGE_INC_DIR . 'redux-config.php';
require_once GYMEDGE_INC_DIR . 'gymedge.php';
require_once GYMEDGE_INC_DIR . 'helper-functions.php';
require_once GYMEDGE_INC_DIR . 'general.php';
require_once GYMEDGE_INC_DIR . 'scripts.php';
require_once GYMEDGE_INC_DIR . 'template-vars.php';
require_once GYMEDGE_INC_DIR . 'woo-hooks.php';
require_once GYMEDGE_INC_DIR . 'vc-settings.php';
require_once GYMEDGE_INC_DIR . 'update-1.php';
require_once GYMEDGE_INC_DIR . 'utility/helper.php';
require_once GYMEDGE_INC_DIR . 'utility/utility.php';

// TGM Plugin Activation
require_once GYMEDGE_LIB_DIR . 'class-tgm-plugin-activation.php';
require_once GYMEDGE_INC_DIR . 'tgm-config.php';

// Notices
if ( function_exists( 'gymedge_core_load_textdomain' ) ) {
	$notice = false;

	if ( defined( 'GYMEDGE_CORE_VERSION' ) ) {
		if ( version_compare( GYMEDGE_CORE_VERSION, '2.14', '<' ) ) {
			$notice = true;
		}
	} else {
		$notice = true;
	}

	if ( $notice ) {
		add_action( 'admin_notices', 'gymedge_widgets_fallback_notice', 3 );
	}
}

function gymedge_widgets_fallback_notice() {
	$notice = '<div class="error"><p>' . sprintf( __( "Please update plugin <b><i>GymEdge Core</b></i> to the latest version otherwise some functionalities will not work properly. You can update it from <a href='%s'>here</a>", 'gymedge' ), menu_page_url( 'gymedge-install-plugins', false ) ) . '</p></div>';
	echo wp_kses_post( $notice );
}

