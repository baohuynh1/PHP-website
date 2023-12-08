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

class Testimonial_Slider extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Testimonial Slider', 'gymedge-core' );
        $this->rt_base  = 'rt-testimonial-slider';
        parent::__construct( $data, $args );
    }

    private function rt_load_scripts(){
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'owl-theme-default' );
        wp_enqueue_script( 'owl-carousel' );
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

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'gymedge-core' )
            ),
            array(
                'id'    => 'style',
                'label' => __( 'Style', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    'style1'   => __( 'Style 1', 'gymedge-core' ),
                    'style2'   => __( 'Style 2', 'gymedge-core'),
                    'style3'   => __( 'Style 3', 'gymedge-core'),
                ),
                'default'   => 'style1',
            ),
            array(
                'id'    => 'theme',
                'label' => __( 'Theme', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    'light'   => __( 'Light (No Background)', 'gymedge-core' ),
                    'dark'   => __( 'Dark (Requires Dark Background)', 'gymedge-core'),
                ),
                'default'   => 'light',
                'condition'   => array( 'style' => array( 'style3' ) ),
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'WHAT CLIENT\'S SAY',
                'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
            ),
            array(
                'id'        => 'subtitle',
                'label'     => __( 'Subtitle', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => 'Lorem ipsum dolor sit amet, consectet ad elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaLorem ipsum dolor sit amet',
                'condition'   => array( 'style' => array( 'style3' ) ),
            ),
            array(
                'id'        => 'item_no',
                'label'     => __( 'Total number of items', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3,
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

            // Responsive Columns

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_responsive',
                'label'   => __( 'Number of Responsive Columns', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_lg',
                'label'   => __( 'Desktops: > 1199px', 'gymedge-core' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'default' => '2',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_md',
                'label'   => __( 'Desktops: > 991px', 'gymedge-core' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'default' => '2',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_sm',
                'label'   => __( 'Tablets: > 767px', 'gymedge-core' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'default' => '2',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_xs',
                'label'   => __( 'Phones: < 768px', 'gymedge-core' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'default' => '1',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_mobile',
                'label'   => __( 'Small Phones: < 480px', 'gymedge-core' ),
                'options' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'default' => '1',
            ),
            array(
                'mode' => 'section_end',
            ),

            // Slider options

            array(
                'mode'        => 'section_start',
                'id'          => 'sec_slider',
                'label'       => esc_html__( 'Slider Options', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_autoplay',
                'label'       => esc_html__( 'Autoplay', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => '',
                'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_stop_on_hover',
                'label'       => esc_html__( 'Stop on Hover', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'gymedge-core' ),
                'condition'   => array( 'slider_autoplay' => 'yes' ),
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'slider_interval',
                'label'   => esc_html__( 'Autoplay Interval', 'gymedge-core' ),
                'options' => array(
                    '5000' => esc_html__( '5 Seconds', 'gymedge-core' ),
                    '4000' => esc_html__( '4 Seconds', 'gymedge-core' ),
                    '3000' => esc_html__( '3 Seconds', 'gymedge-core' ),
                    '2000' => esc_html__( '2 Seconds', 'gymedge-core' ),
                    '1000' => esc_html__( '1 Second',  'gymedge-core' ),
                ),
                'default' => '5000',
                'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'gymedge-core' ),
                'condition'   => array( 'slider_autoplay' => 'yes' ),
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'slider_autoplay_speed',
                'label'   => esc_html__( 'Autoplay Slide Speed', 'gymedge-core' ),
                'default' => 200,
                'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'gymedge-core' ),
                'condition'   => array( 'slider_autoplay' => 'yes' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_loop',
                'label'       => esc_html__( 'Loop', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Loop to first item. Default: On', 'gymedge-core' ),
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
                'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'subtitle_typo',
                'label'   => esc_html__( 'Subtitle', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-subtitle',
                'condition'   => array( 'style' => array( 'style3' ) ),
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
                'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'subtitle_color',
                'label'   => __( 'Subtitle Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-subtitle' => 'color: {{VALUE}}' ),
                'condition'   => array( 'style' => array( 'style3' ) ),
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
                    '{{WRAPPER}} .rt-vc-testimonial-3 .rtin-content .rtin-icon i' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'line_color',
                'label'   => __( 'Line Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-testimonial-1 .rt-vc-item .rt-vc-content h3:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-vc-testimonial-3 .rtin-title::after' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'dot_bg',
                'label'   => __( 'Navigation Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-dots .owl-dot span' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'dot_active_bg',
                'label'   => __( 'Active Navigation Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-dots .owl-dot.active span' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .owl-theme .owl-dots .owl-dot span:hover' => 'background: {{VALUE}}',
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

        $this->rt_load_scripts();

        $owl_data = array(
            'nav'                => false,
            'dots'               => true,
            'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
            'autoplayTimeout'    => $data['slider_interval'],
            'autoplaySpeed'      => $data['slider_autoplay_speed'],
            'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
            'loop'               => $data['slider_loop'] == 'yes' ? true : false,
            'margin'             => 20,
            'responsive'         => array(
                '0'    => array( 'items' => intval($data['col_mobile']) ),
                '480'  => array( 'items' => intval($data['col_xs']) ),
                '768'  => array( 'items' => intval($data['col_sm']) ),
                '992'  => array( 'items' => intval($data['col_md']) ),
                '1200' => array( 'items' => intval($data['col_lg']) ),
            )
        );

        switch ( $data['style'] ) {
            case 'style3':
                $template = 'view-3';
                break;
            case 'style2':
                $template = 'view-2';
                break;
            default:
                $template = 'view-1';
        }

        $data['owl_data'] = json_encode( $owl_data );

        return $this->rt_template( $template, $data );
    }

}
