<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered',     array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/editor/after_enqueue_styles',    array( $this, 'editor_style' ) );
	}

	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .rdtheme-el-custom{content: url('.$img.');width: 28px;}' );
        wp_add_inline_style( 'elementor-editor', '.elementor-panel .select2-container {min-width: 100px !important; min-height: 30px !important;}' );
	}

	public function init() {
		require_once __DIR__ . '/base.php';

		// Widgets -- dirname=>classname /@dev
		$widgets = array(
			'title'                 => 'Title',
			'rt-slider'       		=> 'RT_Slider',
			'about-fitness'         => 'About_Fitness',
			'intro'                 => 'Intro',
			'info-text'             => 'Info_Text',
			'pricing-box'           => 'Pricing_Box',
			'trainer-grid'          => 'Trainer_Grid',
			'trainer-slider'        => 'Trainer_Slider',
			'trainer-single'        => 'Trainer_Single',
			'post-grid'             => 'Post_Grid',
			'post-list'             => 'Post_List',
			'post-slider'           => 'Post_Slider',
			'testimonial-slider'    => 'Testimonial_Slider',
			'testimonial-grid'      => 'Testimonial_Grid',
			'bmi-calculator'        => 'BMI_Calculator',
			'class-grid'            => 'Class_Grid',
			'class-slider'          => 'Class_Slider',
			'class-upcoming'        => 'Class_Upcoming',
			'schedule'              => 'Schedule',
			'routine'               => 'Routine',
			'skills'                => 'Skills',
			'cta'                   => 'CTA',
			'counter'               => 'Counter',
			'button'                => 'Button',
			'experiences'           => 'Experience',
			'gallery'               => 'Gallery',
			'image-carousel'  		=> 'RT_Image_Carousel',
		);

		if ( class_exists( 'WooCommerce' ) ) {
			$widgets['product-slider'] = 'Product_Slider';
		}

		foreach ( $widgets as $dirname => $class ) {
			$template_name = '/elementor-custom/' . $dirname . '/class.php';
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/' . $dirname . '/class.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname );
		}
}

	public function widget_categoty( $class ) {
		$id         = GYMEDGE_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'RadiusTheme Elements', 'gymedge-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
}

new Custom_Widget_Init();