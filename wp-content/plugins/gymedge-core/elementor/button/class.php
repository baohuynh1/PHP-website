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

class Button extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Button', 'gymedge-core' );
        $this->rt_base  = 'rt-button';
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
                'type'    => Controls_Manager::TEXT,
                'id'      => 'buttontext',
                'label'   => esc_html__( 'Button Text', 'gymedge-core' ),
                'default' => 'Get It Now',
            ),
            array(
                'type'  => Controls_Manager::URL,
                'id'    => 'buttonurl',
                'label' => esc_html__( 'Button Link', 'gymedge-core' ),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'placeholder' => __('https://example.com', 'gymedge-core'),
            ),
            array(
                'mode'      => 'responsive',
                'id'        => 'btn_align',
                'label'     => __( 'Alignment', 'gymedge-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'  => [
                        'title'     => __( 'Left', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title'     => __( 'Center', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title'     => __( 'Right', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-right',
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .gymedge-rt-button' => 'text-align: {{VALUE}};',
                ],
            ),
            array(
                'id'       => 'border_width',
                'label'    => __( 'Border Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1' => 'border: {{SIZE}}{{UNIT}} solid #ddd;',
                ),
            ),
            array(
                'id'            => 'btn_padding',
                'label'         => __( 'Button Padding', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-vc-button-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'  => 'section_end'
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_typography_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Typography', 'gymedge-core' ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'btn_typo',
                'label'   => esc_html__( 'Button', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-button-1',
            ),
            array(
                'mode'  => 'section_end'
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_color_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Color', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_border_color',
                'label'   => __( 'Button Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1' => 'border-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1:hover' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_border_color',
                'label'   => __( 'Button Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1:hover' => 'border-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-button-1:hover' => 'color: {{VALUE}} !important',
                ),
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
