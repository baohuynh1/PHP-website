<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use GymEdge;

if ( ! defined('ABSPATH' ) ) exit;

class Class_Upcoming extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Class Upcoming', 'gymedge-core' );
        $this->rt_base  = 'rt-class-upcoming';
        parent::__construct( $data, $args );
    }

    private function rt_load_scripts(){
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'owl-theme-default' );
        wp_enqueue_script( 'owl-carousel' );
    }

    public function sort_by_time( $a, $b ) {
        return $a['timestamp'] - $b['timestamp'];
    }

    public function get_schedule( $number ) {
        $weeknames = gymedge_weeknames_large();

        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'gym_class',
            'suppress_filters' => false
        );
        $classes = get_posts( $args );

        $schedule = array();

        $time = current_time( 'timestamp' );

        foreach ( $classes as $class ) {
            $metas = get_post_meta( $class->ID, 'gym_class_schedule', true );
            $metas = ( $metas != '' ) ? $metas : array();

            foreach ( $metas as $meta ) {
                if ( empty( $meta['week'] ) || empty( $meta['start_time'] ) ) {
                    continue;
                }

                $timestamp = $meta['week'] . ' ' . $meta['start_time'];
                $timestamp = strtotime( $timestamp);

                if ( $timestamp < $time ) {
                    $timestamp = $timestamp + $time;
                }

                $start_time = strtotime( $meta['start_time'] );
                $end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

                if ( GymEdge::$options['class_time_format'] == '24' ) {
                    $start_time = date( "H:i", $start_time );
                    $end_time   = $end_time ? date( "H:i", $end_time ) : '';
                }
                else {
                    $start_time = date( "g:ia", $start_time );
                    $end_time   = $end_time ? date( "g:ia", $end_time ) : '';
                }

                $schedule[] = array(
                    'class'      => $class->post_title,
                    'week'       => $meta['week'],
                    'weekname'   => $weeknames[$meta['week']],
                    'start_time' => $start_time,
                    'end_time'   => $end_time,
                    'timestamp'  => $timestamp,
                );
            }
        }

        usort( $schedule, array( $this, 'sort_by_time' ) );

        return array_slice( $schedule, 0, $number );
    }

    public function rt_fields() {

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'gymedge-core' )
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Section Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => 'FEATURED CLASSES',
            ),
            array(
                'id'        => 'item_no',
                'label'     => __( 'Total number of items', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5,
                'description' => __( 'Write -1 to show all', 'gymedge-core' ),
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
                'default' => '4',
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
                'default' => '3',
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
                'default' => '3',
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
                'default' => '2',
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
                'id'    => 'section_title_typo',
                'label'   => esc_html__( 'Section Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-heading-left',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'title_typo',
                'label'   => esc_html__( 'Class Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'time_typo',
                'label'   => esc_html__( 'Time', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-meta',
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
                'id'      => 'section_title_bg',
                'label'   => __( 'Section Title Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-heading-left' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'section_title_color',
                'label'   => __( 'Section Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-heading-left' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_box_bg',
                'label'   => __( 'Class Title Box Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-upcoming-1 .rt-item.rt-odd' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Class Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-title' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'time_color',
                'label'   => __( 'Time Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-meta' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'time_icon_color',
                'label'   => __( 'Time Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-meta .fa' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'navigation_bg',
                'label'   => __( 'Navigation Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-arrow' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'navigation_color',
                'label'   => __( 'Navigation Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-arrow .fa' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'navigation_hover_bg',
                'label'   => __( 'Navigation Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-arrow:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-arrow.rt-arrow-2' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'navigation_hover_color',
                'label'   => __( 'Navigation Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-arrow:hover .fa' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-arrow.rt-arrow-2 .fa' => 'color: {{VALUE}}',
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
            'dots'               => false,
            'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
            'autoplayTimeout'    => $data['slider_interval'],
            'autoplaySpeed'      => $data['slider_autoplay_speed'],
            'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
            'loop'               => $data['slider_loop'] == 'yes' ? true : false,
            'margin'             => 0,
            'responsive'         => array(
                '0'    => array( 'items' => intval($data['col_mobile']) ),
                '480'  => array( 'items' => intval($data['col_xs']) ),
                '768'  => array( 'items' => intval($data['col_sm']) ),
                '992'  => array( 'items' => intval($data['col_md']) ),
                '1200' => array( 'items' => intval($data['col_lg']) ),
            )
        );

        $data['owl_data'] = json_encode( $owl_data );

        $template = 'view';

        return $this->rt_template( $template, $data );
    }

}
