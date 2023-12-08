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

class CTA extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Call to Action', 'gymedge-core' );
        $this->rt_base  = 'rt-cta';
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
                    'default' => __( 'Default', 'gymedge-core' ),
                    'light' => __( 'Light', 'gymedge-core' ),
                    'dark' => __( 'Dark', 'gymedge-core' ),
                ),
                'default' => 'default',
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'Ready To Change Your Physique, But Can\'t Work Out?'
            ),
            array(
                'id'        => 'subtitle',
                'label'     => __( 'Subtitle', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => 'Contact us for exclusive offers'
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
                'id'    => 'title_typo',
                'label'   => esc_html__( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-cta-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'subtitle_typo',
                'label'   => esc_html__( 'Subtitle', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-cta-subtitle',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'btn_typo',
                'label'   => esc_html__( 'Button', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-cta-button a',
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
                'id'      => 'box_bg',
                'label'   => __( 'CTA Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-cta-1' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-cta-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'subtitle_color',
                'label'   => __( 'Subtitle Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-cta-subtitle' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-cta-button a' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-cta-button a' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-cta-button a:hover' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-cta-button a:hover' => 'color: {{VALUE}} !important',
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
