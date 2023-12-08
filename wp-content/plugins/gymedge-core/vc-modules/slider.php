<?php

class GymEdge_VC_Slider extends RDTheme_VC_Modules {

	public function __construct() {
		$this->name = __( "GymEdge: Slider", 'gymedge-core' );
		$this->base = 'gymedge-vc-slider';
		parent::__construct();
	}

	public function fields() {
		$fields = [
			[
				'type'       => 'param_group',
				'value'      => '',
				'param_name' => 'slide_items',
				"heading"    => __( "Add slide", 'gymedge-core' ),
				'params'     => [
					[
						"type"       => "attach_image",
						"heading"    => __( "Slider Image", 'gymedge-core' ),
						"param_name" => "slider_image",
					],
					[
						"type"       => "textfield",
						"heading"    => __( "Title", 'gymedge-core' ),
						"param_name" => "title",
						"value"      => __( 'BUILD <span>YOUR</span> BODY <span>STRONG</span>', 'gymedge-core' ),
					],

					[
						"type"       => "textfield",
						"heading"    => __( "Sub Title", 'gymedge-core' ),
						"param_name" => "subtitle",
						"value"      => __( 'Trust The Grounds Guys professionals to take care of your <br> commercial or residential grounds', 'gymedge-core' ),
					],
					[
						"type"       => "vc_link",
						"heading"    => __( "Slider Link", 'gymedge-core' ),
						"param_name" => "slider_link",
					],

					// Title Animation
					[
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Title Animation', 'gymedge-core' ),
						'param_name'       => 'title_animation_heading',
						'edit_field_class' => 'vc_col-xs-12 hidden-element',
					],

					[
						"type"             => "textfield",
						"heading"          => __( "Title X Axix", 'gymedge-core' ),
						"param_name"       => "title_x_paralax",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Title Y Axix", 'gymedge-core' ),
						"param_name"       => "title_y_paralax",
						"value"            => "-200",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Animation Delay", 'gymedge-core' ),
						"param_name"       => "title_paralax_delay",
						"value"            => "300",
						'edit_field_class' => 'vc_col-xs-4',
					],

					// SubTitle Animation
					[
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Sub Title Animation', 'gymedge-core' ),
						'param_name'       => 'subtitle_animation_heading',
						'edit_field_class' => 'vc_col-xs-12 hidden-element',
					],

					[
						"type"             => "textfield",
						"heading"          => __( "Subtitle X Axix", 'gymedge-core' ),
						"param_name"       => "subtitle_x_paralax",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Subtitle Y Axix", 'gymedge-core' ),
						"param_name"       => "subtitle_y_paralax",
						"value"            => "-200",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Animation Delay", 'gymedge-core' ),
						"param_name"       => "subtitle_paralax_delay",
						"value"            => "500",
						'edit_field_class' => 'vc_col-xs-4',
					],

					// Button Animation
					[
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Sub Title Animation', 'gymedge-core' ),
						'param_name'       => 'btn_animation_heading',
						'edit_field_class' => 'vc_col-xs-12 hidden-element',
					],

					[
						"type"             => "textfield",
						"heading"          => __( "Button X Axix", 'gymedge-core' ),
						"param_name"       => "btn_x_paralax",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Button Y Axix", 'gymedge-core' ),
						"param_name"       => "btn_y_paralax",
						"value"            => "-200",
						'edit_field_class' => 'vc_col-xs-4',
					],
					[
						"type"             => "textfield",
						"heading"          => __( "Button Delay", 'gymedge-core' ),
						"param_name"       => "btn_paralax_delay",
						"value"            => "700",
						'edit_field_class' => 'vc_col-xs-4',
					],


				],
			],

			[
				"type"       => "dropdown",
				"heading"    => __( "Navigation", 'gymedge-core' ),
				"param_name" => "slider_navigation",
				"value"      => [
					__( '--Select--', 'gymedge-core' )     => '',
					__( 'Arrow and Dots', 'gymedge-core' ) => 'both',
					__( 'Arrows', 'gymedge-core' )         => 'arrows',
					__( 'Dots', 'gymedge-core' )           => 'dots',
					__( 'None', 'gymedge-core' )           => 'none',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "textfield",
				"heading"    => __( "Slider Height", 'gymedge-core' ),
				"param_name" => "slider_height",
				"value"      => "650",
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Effect", 'gymedge-core' ),
				"param_name" => "effect",
				"value"      => [
					__( '--Select--', 'gymedge-core' ) => '',
					__( 'Slide', 'gymedge-core' )      => 'slide',
					__( 'Fade', 'gymedge-core' )       => 'fade',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Autoplay", 'gymedge-core' ),
				"param_name" => "autoplay",
				"value"      => [
					__( '--Select--', 'gymedge-core' ) => '',
					__( 'Enable', 'gymedge-core' )     => 'enable',
					__( 'Disable', 'gymedge-core' )    => 'disable',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Infinite Loop", 'gymedge-core' ),
				"param_name" => "loop",
				"value"      => [
					__( '--Select--', 'gymedge-core' ) => '',
					__( 'Enable', 'gymedge-core' )     => 'enable',
					__( 'Disable', 'gymedge-core' )    => 'disable',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Slider BG Animation", 'gymedge-core' ),
				"param_name" => "slider_bg_animation",
				"value"      => [
					__( '--Select--', 'gymedge-core' ) => '',
					__( 'Zoom In', 'gymedge-core' )    => 'zoom-in',
					__( 'Zoom Out', 'gymedge-core' )   => 'zoom-out',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Arrow Visibility", 'gymedge-core' ),
				"param_name" => "arrow_visibility",
				"value"      => [
					__( '--Select--', 'gymedge-core' )       => '',
					__( 'Always Visible', 'gymedge-core' )   => 'allways-visible',
					__( 'Visible on hover', 'gymedge-core' ) => 'visible-on-hover',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"heading"    => __( "Animation Overflow", 'gymedge-core' ),
				"param_name" => "overflow",
				"value"      => [
					__( 'None', 'gymedge-core' )   => 'none',
					__( 'Hidden', 'gymedge-core' ) => 'hidden',
				],
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],

			[
				"type"       => "textfield",
				"heading"    => __( "Button Text", 'gymedge-core' ),
				"param_name" => "button_text",
				"value"      => "Join with us",
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],

			[
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Slider Theme Color', 'gymedge-core' ),
				'param_name' => 'slider_color',
				'group'      => __( 'Slider options', 'gymedge-core' ),
			],

			[
				'type'       => 'css_editor',
				'heading'    => __( 'Css', 'gymedge-core' ),
				'param_name' => 'css',
				'group'      => __( 'Design options', 'gymedge-core' ),
			],
		];

		return $fields;
	}

	public function shortcode( $atts, $content = '' ) {
		extract( shortcode_atts( [
			'slide_items'         => '',
			'effect'              => 'fade',
			'loop'                => 'enable',
			'autoplay'            => 'enable',
			'slider_height'       => '650',
			'slider_navigation'   => 'both',
			'arrow_visibility'    => 'visible-on-hover',
			'slider_bg_animation' => 'zoom-in',
			'overflow'            => 'none',
			'slider_link'         => '',
			'button_text'         => 'Join with us',
			'css'                 => '',

			'title_animation_heading' => '',
			'title_x_paralax'         => '',
			'title_y_paralax'         => '-200',
			'title_paralax_delay'     => '300',

			'subtitle_animation_heading' => '',
			'subtitle_x_paralax'         => '',
			'subtitle_y_paralax'         => '-200',
			'subtitle_paralax_delay'     => '500',

			'btn_animation_heading' => '',
			'btn_x_paralax'         => '',
			'btn_y_paralax'         => '-200',
			'btn_paralax_delay'     => '700',
			'slider_color'          => '',

		], $atts ) );

		$swipper_data = [
			'effect'              => $effect,
			'fadeEffect'          => [ 'crossFade' => true ],
			//			'direction' => $data['direction'],
			'loop'                => $loop == 'enable' ? true : false,
			'speed'               => 1000,
			'slidesPerView'       => 1,
			'spaceBetween'        => 0,
			'slideToClickedSlide' => true,
			'allowTouchMove'      => true,
			'parallax'            => true,
			'loopedSlides'        => 50,
			'navigation'          => [
				'nextEl' => '.elementor-swiper-button-prev',
				'prevEl' => '.elementor-swiper-button-next',
			],
			'pagination'          => [
				'el'        => '.swiper-pagination',
				'clickable' => true,
				'type'      => 'bullets',
			],
		];

		if ( 'enable' == $autoplay ) {
			$swipper_data['autoplay'] = [
				'delay'             => 3000,
				'pauseOnMouseEnter' => true,
			];
		}

		$template = 'slider';

		return $this->template( $template, get_defined_vars() );
	}

}

new GymEdge_VC_Slider;