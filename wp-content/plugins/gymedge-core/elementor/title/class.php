<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Title extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Section Title', 'gymedge-core' );
		$this->rt_base = 'rt-title';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'gymedge-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => __( 'Style', 'gymedge-core' ),
				'options' => array(
					'style1' => __( 'Style 1', 'gymedge-core' ),
					'style2' => __( 'Style 2', 'gymedge-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => __( 'Title', 'gymedge-core' ),
				'default' => 'Lorem Ipsum',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'gymedge-core' ),
				'default' => 'Lorem Ipsum has been standard daand scrambled. Rimply dummy text of the printing and typesetting industry',
			),
			array(
				'mode' => 'section_end',
			),

			// Style Tab
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'gymedge-core' ),
            ),
            array(
                'id'       => 'content_width',
                'label'    => __( 'Content Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-title-1 .section-title' => 'max-width: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'       => 'title_line_width',
                'label'    => __( 'Title Line Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-title:after' => 'width: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'            => 'subtitle_margin',
                'label'         => __( 'Subtitle Margin', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'section_end',
            ),
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
                'selector' => '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'subtitle_typo',
                'label'    => __( 'Subtitle', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-description',
            ),
            array(
                'mode' => 'section_end',
            ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Style', 'gymedge-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => __( 'Title Color', 'gymedge-core' ),
				'selectors' => array( '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-title' => 'color: {{VALUE}}' ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_line_color',
                'label'   => __( 'Title Line Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-title:after' => 'background-color: {{VALUE}}' ),
            ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'subtitle_color',
				'label'   => __( 'Subtitle Color', 'gymedge-core' ),
				'selectors' => array( '{{WRAPPER}} .rt-owl-title-1 .section-title .owl-description' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

        $template = 'view';

		return $this->rt_template( $template, $data );
	}
}