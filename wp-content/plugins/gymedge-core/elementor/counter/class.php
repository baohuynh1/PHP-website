<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined('ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Counter', 'gymedge-core' );
        $this->rt_base  = 'rt-counter';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'gymedge-core' )
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
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => '500+',
            ),
            array(
                'id'        => 'subtitle',
                'label'     => __( 'Subtitle', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => 'Subscribers',
            ),
            array(
                'type'    => Controls_Manager::ICON,
                'id'      => 'icon',
                'label'   => __( 'Icon', 'gymedge-core' ),
                'default' => 'fa fa-rocket',
            ),
            array(
                'mode'  => 'section_end'
            ),

            // Style Tab

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'gymedge-core' ),
            ),
            array(
                'id'       => 'counter_width',
                'label'    => __( 'Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 5,
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
                    '{{WRAPPER}} .rt-counter-1' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-counter-2' => 'max-width: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'       => 'icon_size',
                'label'    => __( 'Icon Size', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-counter-1 .rt-left .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-counter-2 .rt-icon .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'            => 'icon_padding',
                'label'         => __( 'Icon Padding', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-counter-1 .rt-left .fa' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .rt-counter-2 .rt-icon .fa' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_typo_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Typography', 'gymedge-core' ),
            ),
            array (
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'id'        => 'title_typo',
                'label'     => esc_html__( 'Title', 'gymedge-core' ),
                'selector'  => '{{WRAPPER}} .rt-title',
            ),
            array (
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'id'        => 'subtitle_typo',
                'label'     => esc_html__( 'Subtitle', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-subtitle',
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
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-title' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'subtitle_color',
                'label'   => __( 'Subtitle Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-subtitle' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'border_color',
                'label'   => __( 'Box Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-counter-1' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-counter-2' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_bg',
                'label'   => __( 'Icon Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-counter-1 .rt-left .fa' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-counter-2 .rt-icon .fa' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_color',
                'label'   => __( 'Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-counter-1 .rt-left .fa' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-counter-2 .rt-icon .fa' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'mode'  => 'section_end'
            ),
        );

        return $fields;

    }

    protected function render() {
        $data = $this->get_settings();

        $template = ($data['style'] == 'style1') ? 'view-1' : 'view-2';

        return $this->rt_template( $template, $data );
    }

}
