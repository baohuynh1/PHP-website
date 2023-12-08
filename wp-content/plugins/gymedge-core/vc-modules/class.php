<?php

class GymEdge_VC_Class extends RDTheme_VC_Modules {

	public function __construct() {
		$this->name      = __( "GymEdge: Class", 'gymedge-core' );
		$this->base      = 'gymedge-vc-class';
		$this->translate = [
			'title' => __( "FEATURED CLASSES", 'gymedge-core' ),
			'cols'  => [
				__( '1 col', 'gymedge-core' ) => '12',
				__( '2 col', 'gymedge-core' ) => '6',
				__( '3 col', 'gymedge-core' ) => '4',
				__( '4 col', 'gymedge-core' ) => '3',
				__( '6 col', 'gymedge-core' ) => '2',
			],
		];
		parent::__construct();
	}

	public function load_scripts() {
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function fields() {
		$terms             = get_terms( [ 'taxonomy' => 'gym_class_category' ] );
		$category_dropdown = [ __( 'All Categories', 'gymedge-core' ) => '0' ];

		foreach ( $terms as $category ) {
			$category_dropdown[ $category->name ] = $category->term_id;
		}

		$fields = [
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Layout", 'gymedge-core' ),
				"param_name" => "layout",
				'value'      => [
					__( "Slider", 'gymedge-core' )                  => 'slider',
					__( "Grid", 'gymedge-core' )                    => 'grid',
					__( "Grid Without Pagination", 'gymedge-core' ) => 'grid_nopag',
				],
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Slider Style", 'gymedge-core' ),
				"param_name" => "slider_style",
				"value"      => [
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
				],
				'dependency' => [
					'element' => 'layout',
					'value'   => [ 'slider' ],
				],
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Grid Style", 'gymedge-core' ),
				"param_name" => "grid_style",
				"value"      => [
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
				],
				'dependency' => [
					'element' => 'layout',
					'value'   => [ 'grid_nopag' ],
				],
			],
			[
				"type"       => "textfield",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Title", 'gymedge-core' ),
				"param_name" => "title",
				"value"      => $this->translate['title'],
				'dependency' => [
					'element' => 'slider_style',
					'value'   => [ 'style1' ],
				],
			],
			[
				"type"             => "dropdown",
				"holder"           => "div",
				"class"            => "",
				"edit_field_class" => "gymedge-class-cat-field vc_col-xs-12",
				"heading"          => __( "Categories", 'gymedge-core' ),
				"param_name"       => "cat",
				'value'            => $category_dropdown,
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Order By", 'gymedge-core' ),
				"param_name" => "orderby",
				"value"      => [
					__( 'Date (Recents comes first)', 'gymedge-core' )                                          => 'date',
					__( 'Title', 'gymedge-core' )                                                               => 'title',
					__( 'Custom Order (Available via Order field inside Page Attributes box)', 'gymedge-core' ) => 'menu_order',
				],
			],
			[
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Total number of items", 'gymedge-core' ),
				"param_name"  => "slider_item_number",
				"value"       => 6,
				'dependency'  => [
					'element' => 'layout',
					'value'   => [ 'slider' ],
				],
				'description' => __( 'Write -1 to show all', 'gymedge-core' ),
			],
			[
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Items Per Page", 'gymedge-core' ),
				"param_name"  => "grid_item_number",
				"value"       => 9,
				'dependency'  => [
					'element' => 'layout',
					'value'   => [ 'grid', 'grid_nopag' ],
				],
				'description' => __( 'Write -1 to show all', 'gymedge-core' ),
			],
			// Responsive Columns
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Choose Image Size", 'gymedge-core' ),
				"param_name" => "image_size",
				"value"      => $this->rt_get_all_image_sizes(),
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],

			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Number of columns ( Desktops > 1199px )", 'gymedge-core' ),
				"param_name" => "col_lg",
				"value"      => $this->translate['cols'],
				"std"        => "4",
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Number of columns ( Desktops > 991px )", 'gymedge-core' ),
				"param_name" => "col_md",
				"value"      => $this->translate['cols'],
				"std"        => "4",
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Number of columns ( Tablets > 767px )", 'gymedge-core' ),
				"param_name" => "col_sm",
				"value"      => $this->translate['cols'],
				"std"        => "4",
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Number of columns ( Phones < 768px )", 'gymedge-core' ),
				"param_name" => "col_xs",
				"value"      => $this->translate['cols'],
				"std"        => "6",
				'dependency' => [
					'element' => 'layout',
					'value'   => [ 'slider', 'grid_nopag' ],
				],
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],
			[
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Number of columns ( Small Phones < 480px )", 'gymedge-core' ),
				"param_name" => "col_mobile",
				"value"      => $this->translate['cols'],
				"std"        => "12",
				'dependency' => [
					'element' => 'layout',
					'value'   => [ 'slider' ],
				],
				"group"      => __( "Responsive Columns", 'gymedge-core' ),
			],
			// Slider options
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Navigation Arrow", 'gymedge-core' ),
				"param_name"  => "slider_nav",
				"value"       => [
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				],
				"description" => __( "Enable or disable navigation arrow. Default: Enable", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Navigation Dots", 'gymedge-core' ),
				"param_name"  => "slider_dots",
				"value"       => [
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				],
				"description" => __( "Enable or disable navigation dots. Default: Disable", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Autoplay", 'gymedge-core' ),
				"param_name"  => "slider_autoplay",
				"value"       => [
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				],
				"description" => __( "Enable or disable autoplay. Default: Enable", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Stop on Hover", 'gymedge-core' ),
				"param_name"  => "slider_stop_on_hover",
				"value"       => [
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				],
				'dependency'  => [
					'element' => 'slider_autoplay',
					'value'   => [ 'true' ],
				],
				"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Autoplay Interval", 'gymedge-core' ),
				"param_name"  => "slider_interval",
				"value"       => [
					__( '5 Seconds', 'gymedge-core' ) => '5000',
					__( '4 Seconds', 'gymedge-core' ) => '4000',
					__( '3 Seconds', 'gymedge-core' ) => '3000',
					__( '2 Seconds', 'gymedge-core' ) => '4000',
					__( '1 Second', 'gymedge-core' )  => '1000',
				],
				'dependency'  => [
					'element' => 'slider_autoplay',
					'value'   => [ 'true' ],
				],
				"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Autoplay Slide Speed", 'gymedge-core' ),
				"param_name"  => "slider_autoplay_speed",
				"value"       => 200,
				'dependency'  => [
					'element' => 'slider_autoplay',
					'value'   => [ 'true' ],
				],
				"description" => __( "Slide speed in milliseconds. Default: 200", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
			[
				"type"        => "dropdown",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Loop", 'gymedge-core' ),
				"param_name"  => "slider_loop",
				"value"       => [
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				],
				"description" => __( "Loop to first item. Default: Enable", 'gymedge-core' ),
				"group"       => __( "Slider Options", 'gymedge-core' ),
			],
		];

		return $fields;
	}

	public function shortcode( $atts, $content = '' ) {
		extract( shortcode_atts( [
			'layout'                => 'slider',
			'slider_style'          => 'style1',
			'grid_style'            => 'style1',
			'title'                 => $this->translate['title'],
			'cat'                   => '',
			'orderby'               => 'date',
			'slider_item_number'    => '6',
			'grid_item_number'      => '9',
			// responsive
			'image_size'            => '0',
			'col_lg'                => '4',
			'col_md'                => '4',
			'col_sm'                => '4',
			'col_xs'                => '6',
			'col_mobile'            => '12',
			// slider
			'slider_nav'            => 'true',
			'slider_dots'           => 'false',
			'slider_autoplay'       => 'true',
			'slider_stop_on_hover'  => 'true',
			'slider_interval'       => '5000',
			'slider_autoplay_speed' => '200',
			'slider_loop'           => 'true',
		], $atts ) );

		// validation
		$slider_item_number = intval( $slider_item_number );
		$grid_item_number   = intval( $grid_item_number );
		$col_lg             = esc_attr( $col_lg );
		$col_md             = esc_attr( $col_md );
		$col_sm             = esc_attr( $col_sm );
		$col_xs             = esc_attr( $col_xs );
		$col_mobile         = esc_attr( $col_mobile );

		$owl_data = [
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => [ "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ],
			'dots'               => ( $slider_dots === 'true' ) ? true : false,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 20,
			'responsive'         => [
				'0'    => [ 'items' => 12 / $col_mobile ],
				'480'  => [ 'items' => 12 / $col_xs ],
				'768'  => [ 'items' => 12 / $col_sm ],
				'992'  => [ 'items' => 12 / $col_md ],
				'1200' => [ 'items' => 12 / $col_lg ],
			]
		];

		$weeknames = gymedge_weeknames_short();

		switch ( $layout ) {
			case 'grid':
				$template = 'class-grid';
				break;
			case 'grid_nopag':
				switch ( $grid_style ) {
					case 'style2':
						$template = 'class-grid-nopag-2';
						break;
					default:
						$template = 'class-grid-nopag';
						break;
				}
				break;
			default:
				switch ( $slider_style ) {
					case 'style2':
						$template = 'class-slider-2';
						break;
					default:
						$owl_data['nav'] = false;
						$template        = 'class-slider-1';
						break;
				}
				$this->load_scripts();
				break;
		}

		$owl_data = json_encode( $owl_data );

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Class;