<?php
require_once GYMEDGE_CORE_BASE_DIR . 'widgets/rt-widget-fields.php';
require_once GYMEDGE_CORE_BASE_DIR . 'widgets/address-widget.php';
require_once GYMEDGE_CORE_BASE_DIR . 'widgets/about-widget.php';

add_action( 'widgets_init', 'gymedge_core_register_widgets' );
function gymedge_core_register_widgets() {
	register_widget( 'GymEdge_About_Widget' );
	register_widget( 'GymEdge_Address_Widget' );
}