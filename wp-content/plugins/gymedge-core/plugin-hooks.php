<?php
class GymEdge_Core_Plugin_Hooks  {

	protected static $instance = null;

	private function __construct() {
		$this->vc_init();
		$this->layerslider_init();
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function vc_init() {
		if ( function_exists('vc_updater') ) {
			remove_filter( 'upgrader_pre_download', array( vc_updater(), 'preUpgradeFilter' ), 10 );
			remove_filter( 'pre_set_site_transient_update_plugins', array( vc_updater()->updateManager(), 'check_update' ) );
		}
	}

	public function layerslider_init() {

		if( function_exists( 'layerslider_set_as_theme' ) ) {
			layerslider_set_as_theme();
		}

		if( function_exists( 'layerslider_hide_promotions' ) ) {
			layerslider_hide_promotions();
		}

		add_filter( 'option_ls-latest-version', '__return_false' ); // Disable LayerSlider update notice

		add_action( 'admin_init', array( $this, 'layerslider_disable_plugin_notice' ) ); // Remove LayerSlider purchase notice from plugins page

		$this->fix_layerslider_tgm_compability(); // Fix issue of Layerslider update via TGM
	}

	public function layerslider_disable_plugin_notice() {
		if ( defined( 'LS_PLUGIN_BASE' ) ) {
			remove_action( 'after_plugin_row_' . LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice', 10, 3 );
		}
	}

	public function fix_layerslider_tgm_compability(){
		if ( !is_admin() || !apply_filters( 'gymedge_disable_layerslider_autoupdate', true ) || get_option( 'layerslider-authorized-site' ) ) return;

		global $LS_AutoUpdate;
		if ( isset( $LS_AutoUpdate ) && defined( 'LS_ROOT_FILE' ) ) {
			remove_filter( 'pre_set_site_transient_update_plugins', array( $LS_AutoUpdate, 'set_update_transient' ) );
			remove_filter( 'plugins_api', array( $LS_AutoUpdate, 'set_updates_api_results'), 10, 3 );
			remove_filter( 'upgrader_pre_download', array( $LS_AutoUpdate, 'pre_download_filter' ), 10, 4 );
			remove_filter( 'in_plugin_update_message-'.plugin_basename( LS_ROOT_FILE ), array( $LS_AutoUpdate, 'update_message' ) );
			remove_filter( 'wp_ajax_layerslider_authorize_site', array( $LS_AutoUpdate, 'handleActivation' ) );
			remove_filter( 'wp_ajax_layerslider_deauthorize_site', array( $LS_AutoUpdate, 'handleDeactivation' ) );
		}
	}
}

GymEdge_Core_Plugin_Hooks::instance();