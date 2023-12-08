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

class Testimonial_Grid extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Testimonial Grid', 'gymedge-core' );
        $this->rt_base  = 'rt-testimonial-grid';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $terms = get_terms( array('taxonomy' => 'gym_testimonial_category' ) );
        $category_dropdown = array( '0' => __( 'All Categories', 'gymedge-core' ) );
        foreach ( $terms as $category ) {
            $category_dropdown[$category->term_id] = $category->name;
        }

        $orderby = array(
            'date'          => __( 'Date (Recents comes first)', 'gymedge-core' ),
            'title'         =>  __( 'Title', 'gymedge-core' ),
            'menu_order'    => __( 'Custom Order (Available via Order field inside Post Attributes box)', 'gymedge-core' ),
        );

        $sortby = array(
            'ASC'       => __( 'Ascending', 'gymedge-core' ),
            'DESC'      =>  __( 'Descending', 'gymedge-core' ),
        );

        $column = array(
            '3' => __('4 Column', 'gymedge-core'),
            '4' => __('3 Column', 'gymedge-core'),
            '6' => __('2 Column', 'gymedge-core'),
            '12' => __('1 Column', 'gymedge-core'),
        );

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'gymedge-core' )
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'WHAT CLIENT\'S SAY',
            ),
            array(
                'id'        => 'item_no',
                'label'     => __( 'Total number of items', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 2,
                'description' => __( 'Write -1 to show all', 'gymedge-core' ),
            ),
            array(
                'id'        => 'cat',
                'label'     => __( 'Categories', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $category_dropdown,
                'default'   => '0',
            ),
            array(
                'id'        => 'orderby',
                'label'     => __( 'Order by', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $orderby,
                'default'   => 'date',
            ),
            array(
                'id'        => 'sortby',
                'label'     => __( 'Sort by', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $sortby,
                'default'   => 'DESC',
            ),
            array(
                'mode'  => 'section_end'
            ),

            // Typography

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
                'selector' => '{{WRAPPER}} .testimonial-section-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'name_typo',
                'label'   => esc_html__( 'Name', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-client-name',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'designation_typo',
                'label'   => esc_html__( 'Designation', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-client-designation',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'content_typo',
                'label'   => esc_html__( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-client-info p',
            ),
            array(
                'mode'  => 'section_end'
            ),

            // Color

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_color_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Color', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .testimonial-section-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'name_color',
                'label'   => __( 'Nmae Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-client-name' => 'color: {{VALUE}} !important' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'designation_color',
                'label'   => __( 'Designation Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-client-designation' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-client-info p' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'blockquote_color',
                'label'   => __( 'Blockquote Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-testimonial-1 .rt-vc-item .rt-vc-content h3:before' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'line_color',
                'label'   => __( 'Line Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-testimonial-1 .rt-vc-item .rt-vc-content h3:after' => 'background-color: {{VALUE}}',
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
