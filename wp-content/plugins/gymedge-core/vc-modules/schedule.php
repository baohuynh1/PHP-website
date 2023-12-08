<?php

class GymEdge_VC_Schedule extends RDTheme_VC_Modules {

	public function __construct() {
		$this->name = __( "GymEdge: Schedule", 'gymedge-core' );
		$this->base = 'gymedge-vc-schedule';
		parent::__construct();
	}

	public function fields() {
		$terms             = get_terms( array( 'taxonomy' => 'gym_class_category' ) );
		$category_dropdown = [ '' => __( "Select Category", 'gymedge-core' ) ];
		foreach ( $terms as $category ) {
			$category_dropdown[ $category->name ] = $category->term_id;
		}

		$fields = array(
			array(
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Schedule By", 'gymedge-core' ),
				"param_name" => "schedule_by",
				"value"      => array(
					__( 'Weekday', 'gymedge-core' ) => 'weekday',
					__( 'Class', 'gymedge-core' )   => 'class',
				),
			),
			array(
				"type"       => "dropdown_multi",
				"heading"    => esc_html__( "Class Categories", 'gymedge-core' ),
				"param_name" => "cat",
				"value"      => $category_dropdown,
			),
			array(
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Background", 'gymedge-core' ),
				"param_name" => "schedule_background",
				"value"      => array(
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
			),
			array(
				"type"       => "dropdown",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Button", 'gymedge-core' ),
				"param_name" => "schedule_button",
				"value"      => array(
					__( 'Enabled', 'gymedge-core' )  => 'true',
					__( 'Disabled', 'gymedge-core' ) => 'false',
				),
			),
		);

		return $fields;
	}

	public function sort_by_time( $a, $b ) {
		return ( strtotime( $a['start_time'] ) > strtotime( $b['start_time'] ) );
	}

	public function shortcode( $atts, $content = '' ) {
		extract( shortcode_atts( array(
			'schedule_background' => 'false',
			'cat'                 => '',
			'schedule_button'     => 'true',
			'schedule_by'         => 'weekday',
		), $atts ) );

		// css classes
		$schedule_class = '';
		$schedule_class .= ( $schedule_background == 'false' ) ? ' schedule-no-background' : ' schedule-has-background';
		$schedule_class .= ( $schedule_button == 'false' ) ? ' schedule-no-button' : ' schedule-has-button';

		// week names array
		$weeknames = gymedge_weeknames_large();

		// class post types array
		$args = array(
			'posts_per_page'   => - 1,
			'post_type'        => 'gym_class',
			'suppress_filters' => false,
		);

		if ( ! empty( $cat ) ) {
			$categories        = explode( ',', $cat );
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'gym_class_category',
					'field'    => 'term_id',
					'terms'    => $categories,
				)
			);
		}

		$classes = get_posts( apply_filters( 'gymedge_schedule_args', $args ) );
		$uniqid  = (int) rand();

		switch ( $schedule_by ) {
			case 'weekday':
				$template = 'schedule-by-week';
				break;
			default:
				$template = 'schedule-by-class';
				break;
		}

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Schedule;