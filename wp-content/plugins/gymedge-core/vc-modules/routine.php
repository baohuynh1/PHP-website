<?php
class GymEdge_VC_Routine extends RDTheme_VC_Modules {

	public function __construct(){
		$this->name = __( "GymEdge: Routine", 'gymedge-core' );
		$this->base = 'gymedge-vc-routine';
		parent::__construct();
	}

	public function sort_by_time_as_key( $a, $b ) {
		return ( strtotime( $a ) > strtotime( $b ) );
	}

	public function sort_by_end_time( $a, $b ) {
		return ( strtotime( $a['end_time'] ) > strtotime( $b['end_time'] ) );
	}

	public function print_routine( $routine, $link, $trainer ) {
		usort( $routine, array( $this, 'sort_by_end_time' ) );
		$tag = ( $trainer == 'true' );
		?>
		<?php foreach ( $routine as $each_routine ): ?>
			<?php
			$class ='rt-item tab-pane fade show rt-routine-id-' . $each_routine['id'];
			if ( $link == 'true' ) {
				$permalink = get_the_permalink( $each_routine['id'] );
				$start_tag = '<a href="'.$permalink.'" class="'.$class.'">';
				$end_tag   = '</a>';
			}
			else {
				$start_tag = '<div class="'.$class.'">';
				$end_tag   = '</div>';
			}
			?>
			<?php echo $start_tag;?>
			<div class="rt-item-title"><?php echo esc_html( $each_routine['class'] );?></div>
			<div class="rt-item-time">
				<span><?php echo esc_html( $each_routine['start_time'] );?></span>
				<?php if ( !empty( $each_routine['end_time'] ) ): ?>
					<span>- <?php echo esc_html( $each_routine['end_time'] );?></span>
				<?php endif;?>
			</div>
			<?php if ( $trainer == 'true' ): ?>
				<div class="rt-item-trainer"><?php echo esc_html( $each_routine['trainer'] );?></div>
			<?php endif;?>
			<?php echo $end_tag;?>
		<?php endforeach; ?>
		<?php
	}

	public function print_routine2( $routine, $link, $trainer ) {
		usort( $routine, array( $this, 'sort_by_end_time' ) );
		$tag = ( $trainer == 'true' );
		?>
		<?php foreach ( $routine as $each_routine ): ?>
			<?php
			$class ='rt-item tab-pane fade show rt-routine-id-' . $each_routine['id'];
			$style = $each_routine['color'] ? ' style="background-color:'.esc_attr( $each_routine['color'] ).';"' : '';
			if ( $link == 'true' ) {
				$permalink = get_the_permalink( $each_routine['id'] );
				$start_tag = '<a href="'.$permalink.'" class="'.$class.'"'.$style.'>';
				$end_tag   = '</a>';
			}
			else {
				$start_tag = '<div class="'.$class.'"'.$style.'>';
				$end_tag   = '</div>';
			}
			?>
			<?php echo $start_tag;?>
			<div class="rt-item-title"><?php echo esc_html( $each_routine['class'] );?></div>
			<div class="rt-item-time">
				<span><?php echo esc_html( $each_routine['start_time'] );?></span>
				<?php if ( !empty( $each_routine['end_time'] ) ): ?>
					<span>- <?php echo esc_html( $each_routine['end_time'] );?></span>
				<?php endif;?>
			</div>
			<?php if ( $trainer == 'true' ): ?>
				<div class="rt-item-trainer"><?php echo esc_html( $each_routine['trainer'] );?></div>
			<?php endif;?>
			<?php echo $end_tag;?>
		<?php endforeach; ?>
		<?php
	}

	public function fields(){
		$terms = get_terms( array('taxonomy' => 'gym_class_category') );
		$category_dropdown = array( __( 'All Categories', 'gymedge-core' ) => '0' );

		foreach ( $terms as $category ) {
			$category_dropdown[$category->name] = $category->term_id;
		}

		$fields = array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", 'gymedge-core' ),
				"param_name" => "style",
				"value" => array( 
					__( "Style 1", 'gymedge-core' ) => 'style1',
					__( "Style 2", 'gymedge-core' ) => 'style2',
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Theme", 'gymedge-core' ),
				"param_name" => "theme",
				"value" => array(
					__( 'Light (No Background)', 'gymedge-core' ) => 'light',
					__( 'Dark (Requires Dark Background)', 'gymedge-core' ) => 'dark',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Class Categories", 'gymedge-core' ),
				"param_name" => "cat",
				'value' => $category_dropdown,
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Linkable", 'gymedge-core' ),
				"param_name" => "link",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
				'description' => __( 'Linked to class page or not', 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Trainer Display", 'gymedge-core' ),
				"param_name" => "trainer",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
				'description' => __( 'Show or Hide Trainer Name', 'gymedge-core' ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Navigation Menu Display", 'gymedge-core' ),
				"param_name" => "nav",
				"value" => array(
					__( 'Disabled', 'gymedge-core' ) => 'false',
					__( 'Enabled', 'gymedge-core' )  => 'true',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'style1' ),
				),
				'description' => __( 'Show or Hide Navigation Menu', 'gymedge-core' ),
			),
		);
		return $fields;
	}

	public function shortcode( $atts, $content = '' ){
		extract( shortcode_atts( array(
			'style'   => 'style1',
			'theme'   => 'light',
			'cat'     => '',
			'link'    => 'false',
			'trainer' => 'false',
			'nav'     => 'false',
		), $atts ) );

		// week names array
		$weeknames = gymedge_weeknames_large();

		// class post types array
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'gym_class',
			'suppress_filters' => false,
			'orderby'          => 'title',
			'order'            => 'ASC',
		);
		
		if ( !empty( $cat ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'gym_class_category',
					'field' => 'term_id',
					'terms' => $cat,
				)
			);
		}

		$classes = get_posts( $args );

		switch ( $style ) {
			case 'style1':
				$template = 'routine';
				break;
			case 'style2':
				$template = 'routine-2';
				break;
			default:
				$template = 'routine';
				break;
		}

		return $this->template( $template, get_defined_vars() );
	}
}

new GymEdge_VC_Routine;