<?php
if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}

// Add max width property for vc_row_inner
$args = array(
	'type' => 'dropdown',
	'heading' => esc_html__( "Content Maximum Width", 'gymedge' ),
	'param_name' => 'rtmaxwidth',
	"value" => array( 
		esc_html__( 'Default', 'gymedge' ) => '',
		esc_html__( '500 px', 'gymedge' )  => '500',
		esc_html__( '550 px', 'gymedge' )  => '550',
		esc_html__( '600 px', 'gymedge' )  => '600',
		esc_html__( '650 px', 'gymedge' )  => '650',
		esc_html__( '700 px', 'gymedge' )  => '700',
		esc_html__( '750 px', 'gymedge' )  => '750',
		esc_html__( '800 px', 'gymedge' )  => '800',
		esc_html__( '850 px', 'gymedge' )  => '850',
		esc_html__( '900 px', 'gymedge' )  => '900',
		esc_html__( '950 px', 'gymedge' )  => '950',
		esc_html__( '1000 px', 'gymedge' ) => '1000',
		esc_html__( '1050 px', 'gymedge' ) => '1050',
		esc_html__( '1100 px', 'gymedge' ) => '1100',
		esc_html__( '1150 px', 'gymedge' ) => '1150',
		esc_html__( '1200 px', 'gymedge' ) => '1200',
	),
);
vc_add_param( 'vc_row_inner', $args );

// Render class name based on max width property on vc_row_inner
add_filter('vc_shortcodes_css_class', 'gymedge_change_element_class_name', 10, 3 );
if ( !function_exists( 'gymedge_change_element_class_name' ) ) {
	function gymedge_change_element_class_name( $class_string, $tag, $atts ) {
		if ( $tag == 'vc_row_inner' ) {
			if ( !empty( $atts['rtmaxwidth'] ) ) {
				$class_string .= ' vc-m-auto vc-mw-'. $atts['rtmaxwidth'];
			}
		}
		return $class_string;
	}
}

// Disable layerslider_vc from search result page to fix js mess up
add_filter( 'vc_shortcode_output', 'rdtheme_layerslider_vc_output', 10 , 3 );
function rdtheme_layerslider_vc_output( $output, $class, $atts ){
	$shortcode = $class->getShortcode();

	if ( $shortcode == 'layerslider_vc' && is_search() ) {
		return '';
	}

	return $output;
}