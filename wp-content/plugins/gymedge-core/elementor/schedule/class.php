<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Schedule extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Schedule', 'gymedge-core' );
		$this->rt_base = 'rt-schedule';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

        $terms = get_terms( array( 'taxonomy' => 'gym_class_category' ) );
        $category_dropdown = array( '0' => __( 'All Categories', 'gymedge-core' ) );
        foreach ( $terms as $category ) {
            $category_dropdown[$category->term_id] = $category->name;
        }

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'gymedge-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'schedule_by',
				'label'   => __( 'Schedule By', 'gymedge-core' ),
				'options' => array(
					'weekday'   => __( 'Weekday', 'gymedge-core' ),
					'class'     => __( 'Class', 'gymedge-core' ),
				),
				'default' => 'weekday',
			),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'schedule_background',
                'label'       => esc_html__( 'Background', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'no',
                'description' => esc_html__( 'Show or Hide Background. Default: Off', 'gymedge-core' ),
            ),
            array(
                'id'    => 'category',
                'label' => __( 'Category', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT2,
                'multiple'    => true,
                'label_block' => true,
                'options'   => $category_dropdown,
                'default'   => '0',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'btn_display',
                'label'       => esc_html__( 'Display Button', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Button. Default: On', 'gymedge-core' ),
            ),
            array(
                'mode' => 'section_end',
            ),

			// Style Tab

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_typography',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Typography', 'gymedge-core' ),
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'title_typo',
                'label'    => __( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-class-name',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'time_typo',
                'label'    => __( 'Time', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-class-time',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'trainer_typo',
                'label'    => __( 'Trainer', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-class-trainer',
            ),
            array(
                'mode' => 'section_end',
            ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Color', 'gymedge-core' ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_bg',
                'label'   => __( 'Box Background', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .schedule-has-background' => 'background-color: {{VALUE}}' ),
                'condition' => array(
                    'schedule_background'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'per_row_bg',
                'label'   => __( 'Row Background', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .tab-content .tab-pane > ul' => 'background-color: {{VALUE}}' ),
            ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => __( 'Title Color', 'gymedge-core' ),
				'selectors' => array(
				    '{{WRAPPER}} .rtin-class-name' => 'color: {{VALUE}}',
                ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'time_color',
                'label'   => __( 'Time Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-class-time' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'trainer_color',
                'label'   => __( 'Trainer Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-class-trainer' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a:hover' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'tab_btn_bg',
                'label'   => __( 'Navigation Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.nav-tabs li a' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'tab_btn_color',
                'label'   => __( 'Navigation Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.nav-tabs li a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'tab_btn_hover_bg',
                'label'   => __( 'Navigation Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.nav-tabs li a:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} ul.nav-tabs li a.active' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'tab_btn_hover_color',
                'label'   => __( 'Navigation Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.nav-tabs li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} ul.nav-tabs li a.active' => 'color: {{VALUE}}',
                ),
            ),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

    public function sort_by_time( $a, $b ) {
        return ( strtotime( $a['start_time'] ) > strtotime( $b['start_time'] ) );
    }

	protected function render() {
		$data = $this->get_settings();

        switch ( $data['schedule_by'] ) {
            case 'class':
                $template = 'view-2';
                break;
            default:
                $template = 'view-1';
        }

		return $this->rt_template( $template, $data );
	}
}