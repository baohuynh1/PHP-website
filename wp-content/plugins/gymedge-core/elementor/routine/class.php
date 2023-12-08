<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Routine extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ) {
		$this->rt_name = __( 'Routine', 'gymedge-core' );
		$this->rt_base = 'rt-routine';
		parent::__construct( $data, $args );
	}

	public function sort_by_time_as_key( $a, $b ) {
		return ( strtotime( $a ) > strtotime( $b ) );
	}

	public function sort_by_end_time( $a, $b ) {
		return ( strtotime( $a['end_time'] ) > strtotime( $b['end_time'] ) );
	}

	public function print_routine( $routine, $link, $trainer ) {
		usort( $routine, [ $this, 'sort_by_end_time' ] );
		$tag = ( $trainer == 'yes' );
		?>
		<?php foreach ( $routine as $each_routine ): ?>
			<?php
			$class = 'rt-item tab-pane fade show rt-routine-id-' . $each_routine['id'];
			if ( $link == 'yes' ) {
				$permalink = get_the_permalink( $each_routine['id'] );
				$start_tag = '<a href="' . $permalink . '" class="' . $class . '">';
				$end_tag   = '</a>';
			} else {
				$start_tag = '<div class="' . $class . '">';
				$end_tag   = '</div>';
			}
			?>
			<?php echo $start_tag; ?>
            <div class="rt-item-title"><?php echo esc_html( $each_routine['class'] ); ?></div>
            <div class="rt-item-time">
                <span><?php echo esc_html( $each_routine['start_time'] ); ?></span>
				<?php if ( ! empty( $each_routine['end_time'] ) ): ?>
                    <span>- <?php echo esc_html( $each_routine['end_time'] ); ?></span>
				<?php endif; ?>
            </div>
			<?php if ( $trainer == 'yes' ): ?>
                <div class="rt-item-trainer"><?php echo esc_html( $each_routine['trainer'] ); ?></div>
			<?php endif; ?>
			<?php echo $end_tag; ?>
		<?php endforeach; ?>
		<?php
	}

	public function print_routine2( $routine, $link, $trainer ) {
		usort( $routine, [ $this, 'sort_by_end_time' ] );
		$tag = ( $trainer == 'yes' );
		?>
		<?php foreach ( $routine as $each_routine ): ?>
			<?php
			$class = 'rt-item tab-pane fade show rt-routine-id-' . $each_routine['id'];
			$style = $each_routine['color'] ? ' style="background-color:' . esc_attr( $each_routine['color'] ) . ';"' : '';
			if ( $link == 'yes' ) {
				$permalink = get_the_permalink( $each_routine['id'] );
				$start_tag = '<a href="' . $permalink . '" class="' . $class . '"' . $style . '>';
				$end_tag   = '</a>';
			} else {
				$start_tag = '<div class="' . $class . '"' . $style . '>';
				$end_tag   = '</div>';
			}
			?>
			<?php echo $start_tag; ?>
            <div class="rt-item-title"><?php echo esc_html( $each_routine['class'] ); ?></div>
            <div class="rt-item-time">
                <span><?php echo esc_html( $each_routine['start_time'] ); ?></span>
				<?php if ( ! empty( $each_routine['end_time'] ) ): ?>
                    <span>- <?php echo esc_html( $each_routine['end_time'] ); ?></span>
				<?php endif; ?>
            </div>
			<?php if ( $trainer == 'yes' ): ?>
                <div class="rt-item-trainer"><?php echo esc_html( $each_routine['trainer'] ); ?></div>
			<?php endif; ?>
			<?php echo $end_tag; ?>
		<?php endforeach; ?>
		<?php
	}

	public function rt_fields() {

		$terms = get_terms( [ 'taxonomy' => 'gym_class_category' ] );
		//$category_dropdown = array( '0' => __( 'All Categories', 'gymedge-core' ) );
		$category_dropdown = [];
		foreach ( $terms as $category ) {
			$category_dropdown[ $category->term_id ] = $category->name;
		}

		$fields = [
			[
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => __( 'General', 'gymedge-core' ),
			],
			[
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => __( 'Style', 'gymedge-core' ),
				'options' => [
					'style1' => __( 'Style 1', 'gymedge-core' ),
					'style2' => __( 'Style 2', 'gymedge-core' ),
				],
				'default' => 'style1',
			],
			[
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'theme',
				'label'     => __( 'Theme', 'gymedge-core' ),
				'options'   => [
					'light' => __( 'Light (No Background)', 'gymedge-core' ),
					'dark'  => __( 'Dark (Requires Dark Background)', 'gymedge-core' ),
				],
				'default'   => 'light',
				'condition' => [
					'style' => [ 'style1' ],
				],
			],
			[
				'id'          => 'category',
				'label'       => __( 'Class Categories', 'gymedge-core' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => true,
				'options'     => $category_dropdown,
				'default'     => '0',
			],
			[
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'link',
				'label'       => esc_html__( 'Linkable', 'gymedge-core' ),
				'label_on'    => esc_html__( 'On', 'gymedge-core' ),
				'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Linked to class page or not', 'gymedge-core' ),
			],
			[
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'trainer',
				'label'       => esc_html__( 'Trainer Display', 'gymedge-core' ),
				'label_on'    => esc_html__( 'On', 'gymedge-core' ),
				'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Trainer Name', 'gymedge-core' ),
			],
			[
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'nav',
				'label'       => esc_html__( 'Navigation Menu Display', 'gymedge-core' ),
				'label_on'    => esc_html__( 'On', 'gymedge-core' ),
				'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Navigation Menu', 'gymedge-core' ),
				'condition'   => [
					'style' => [ 'style1' ],
				],
			],
			[
				'mode' => 'section_end',
			],

			// Style Tab

			[
				'mode'  => 'section_start',
				'id'    => 'sec_typography',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Typography', 'gymedge-core' ),
			],
			[
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'row_heading_typo',
				'label'    => __( 'Row Heading', 'gymedge-core' ),
				'selector' => '{{WRAPPER}} .rt-row-title',
			],
			[
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'col_heading_typo',
				'label'    => __( 'Column Heading', 'gymedge-core' ),
				'selector' => '{{WRAPPER}} .rt-col-title',
			],
			[
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Title', 'gymedge-core' ),
				'selector' => '{{WRAPPER}} .rt-item-title',
			],
			[
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'time_typo',
				'label'    => __( 'Time', 'gymedge-core' ),
				'selector' => '{{WRAPPER}} .rt-item-time',
			],
			[
				'mode'      => 'group',
				'type'      => \Elementor\Group_Control_Typography::get_type(),
				'id'        => 'trainer_typo',
				'label'     => __( 'Trainer', 'gymedge-core' ),
				'selector'  => '{{WRAPPER}} .rt-item-trainer',
				'condition' => [
					'trainer' => [ 'yes' ],
				],
			],
			[
				'mode' => 'section_end',
			],
			[
				'mode'  => 'section_start',
				'id'    => 'sec_style',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Color', 'gymedge-core' ),
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'box_bg',
				'label'     => __( 'Content Box Background', 'gymedge-core' ),
				'selectors' => [ '{{WRAPPER}} .rt-item' => 'background-color: {{VALUE}}' ],
				'condition' => [
					'style' => [ 'style1' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'day_heading_bg',
				'label'     => __( 'Day Heading Background', 'gymedge-core' ),
				'selectors' => [ '{{WRAPPER}} .rt-routine .rt-col-title > div' => 'background-color: {{VALUE}}' ],
				'condition' => [
					'style' => [ 'style1' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'day_heading_color',
				'label'     => __( 'Day Heading Color', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-col-title > div' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-col-title'       => 'color: {{VALUE}}',
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'time_heading_color',
				'label'     => __( 'Time Heading Color', 'gymedge-core' ),
				'selectors' => [ '{{WRAPPER}} .rt-row-title' => 'color: {{VALUE}}' ],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => __( 'Title Color', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-item-title' => 'color: {{VALUE}}',
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'time_color',
				'label'     => __( 'Time Color', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} .rt-item-time' => 'color: {{VALUE}}',
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'trainer_color',
				'label'     => __( 'Trainer Color', 'gymedge-core' ),
				'selectors' => [ '{{WRAPPER}} .rt-item-trainer' => 'color: {{VALUE}}' ],
				'condition' => [
					'trainer' => [ 'yes' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'tab_btn_bg',
				'label'     => __( 'Navigation Background', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} ul.nav-tabs li a' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => [ 'style1' ],
					'nav'   => [ 'yes' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'tab_btn_color',
				'label'     => __( 'Navigation Color', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} ul.nav-tabs li a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => [ 'style1' ],
					'nav'   => [ 'yes' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'tab_btn_hover_bg',
				'label'     => __( 'Navigation Hover Background', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} ul.nav-tabs li a:hover'  => 'background-color: {{VALUE}}',
					'{{WRAPPER}} ul.nav-tabs li.active a' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'style' => [ 'style1' ],
					'nav'   => [ 'yes' ],
				],
			],
			[
				'type'      => Controls_Manager::COLOR,
				'id'        => 'tab_btn_hover_color',
				'label'     => __( 'Navigation Hover Color', 'gymedge-core' ),
				'selectors' => [
					'{{WRAPPER}} ul.nav-tabs li a:hover'  => 'color: {{VALUE}}',
					'{{WRAPPER}} ul.nav-tabs li.active a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => [ 'style1' ],
					'nav'   => [ 'yes' ],
				],
			],
			[
				'mode' => 'section_end',
			],
		];

		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style2':
				$template = 'view-2';
				break;
			default:
				$template = 'view-1';
		}

		return $this->rt_template( $template, $data );
	}
}