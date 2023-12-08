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

class Pricing_Box extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Pricing Box', 'gymedge-core' );
        $this->rt_base  = 'rt-pricing-box';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => esc_html__( 'General', 'gymedge-core' )
            ),
            array(
                'id'    => 'style',
                'label' => esc_html__( 'Style', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    'style1'   => esc_html__( 'Style 1', 'gymedge-core' ),
                    'style2'   => esc_html__( 'Style 2', 'gymedge-core'),
                ),
                'default'   => 'style1',
            ),
            array(
                'id'        => 'title',
                'label'     => esc_html__( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'STANDARD',
            ),
            array(
                'id'        => 'price',
                'label'     => esc_html__( 'Price', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => '$29',
            ),
            array(
                'id'        => 'unit',
                'label'     => esc_html__( 'Unit', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'mo',
                'description'   => esc_html__('eg. month or year. Keep empty if you don\'t want to show unit', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::TEXTAREA,
                'id'      => 'features',
                'label'   => esc_html__( 'Features', 'gymedge-core' ),
                'default' => 'One line per feature',
                'description' => esc_html__( "One line per feature. Put BLANK keyword if you want blank line. eg.<br/>Investment Plan</br>Education Loan</br>Tax Planning</br>BLANK", 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'buttontext',
                'label'   => esc_html__( 'Button Text', 'gymedge-core' ),
                'default' => 'Buy Now',
                'condition'   => array( 'style' => array( 'style1' ) ),
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
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'mode'  => 'section_end'
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'gymedge-core' ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'title_typo',
                'label'   => esc_html__( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .price-box-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'price_typo',
                'label'   => esc_html__( 'Price Style', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .pricing-box-price',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'content_typo',
                'label'   => esc_html__( 'Content Style', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .pricing-box-content',
            ),
            array(
                'id'       => 'content_width',
                'label'    => __( 'Content Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
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
                'selectors' => [
                    '{{WRAPPER}} .pricing-box-content' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_icon_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Color', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_bg',
                'label'   => __( 'Box Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-pricing-box-1' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-vc-pricing-box-2' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_text_color',
                'label'   => __( 'Box Text Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-features' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rtin-features' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rtin-title' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-btn a' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-btn a' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_border_color',
                'label'   => __( 'Button Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-btn a' => 'border-color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-btn a:hover' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-btn a:hover' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'price_bg',
                'label'   => __( 'Price Background', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-pricing-box-2 .rtin-right' => 'background: {{VALUE}}' ),
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'price_color',
                'label'   => __( 'Price Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rtin-price' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'unit_color',
                'label'   => __( 'Unit Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-price span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rtin-price span' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'mode' => 'section_end',
            ),
        );

        return $fields;

    }

    private function validate( $str ){
        $str = trim( $str );
        // replace BLANK keyword
        if ( strtolower( $str ) == 'blank'  ) {
            return '&nbsp;';
        }
        return $str;
    }

    protected function render() {
        $data = $this->get_settings();

        if ($data['style'] != 'style2') {
            $features = strip_tags( $data['features'] ); // remove tags
            $features = explode( "\n", $features ); // string to array
            $features = array_map( array( $this, 'validate' ),  $features ); // validate
            $data['features'] = $features;
        }

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
