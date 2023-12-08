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

class Trainer_Slider extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Trainer Slider', 'gymedge-core' );
        $this->rt_base  = 'rt-trainer-slider';
        parent::__construct( $data, $args );
    }

    private function rt_load_scripts(){
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'owl-theme-default' );
        wp_enqueue_script( 'owl-carousel' );
    }

    public function rt_fields() {

        $terms = get_terms( array('taxonomy' => 'gym_team_category' ) );
        $category_dropdown = array( '0' => __( 'All Categories', 'gymedge-core' ) );
        foreach ( $terms as $category ) {
            $category_dropdown[$category->term_id] = $category->name;
        }

        $orderby = array(
            'date'          => __( 'Date (Recents comes first)', 'gymedge-core' ),
            'title'         =>  __( 'Title', 'gymedge-core' ),
            'menu_order'    => __( 'Custom Order (Available via Order field inside Post Attributes box)', 'gymedge-core' ),
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
                    'style4'   => __( 'Style 4', 'gymedge-core'),
                ),
                'default'   => 'style1',
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'EXPERT TRAINERS',
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'id'        => 'item_no',
                'label'     => __( 'Items Per Page', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 9,
                'description' => __( 'Write -1 to show all', 'gymedge-core' ),
            ),
            array(
                'id'        => 'orderby',
                'label'     => __( 'Order by', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $orderby,
                'default'   => 'date',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'designation_display',
                'label'       => esc_html__( 'Designation Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'content_display',
                'label'       => esc_html__( 'Content Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'id'        => 'length',
                'label'     => __( 'Excerpt Length', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 35,
                'description' => __( 'Maximum number of words', 'gymedge-core' ),
                'condition'   => array(
                    'style' => array( 'style2' ),
                    'content_display' => array( 'yes' ),
                ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'social_icon_display',
                'label'       => esc_html__( 'Social Profile Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'condition'   => array(
                    'style' => array( 'style1', 'style2', 'style3' ),
                ),
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
                'default' => '4',
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
                'id'          => 'slider_nav',
                'label'       => esc_html__( 'Navigation Arrow', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Enable or disable autoplay. Default: Off', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_dot',
                'label'       => esc_html__( 'Navigation Dots', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'no',
                'description' => esc_html__( 'Enable or disable autoplay. Default: Off', 'gymedge-core' ),
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
                'selector' => '{{WRAPPER}} .owl-custom-nav-title',
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'name_typo',
                'label'   => esc_html__( 'Name', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-trainer-name a',
                'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'name_style4_typo',
                'label'   => esc_html__( 'Name', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-trainer-name',
                'condition'   => array( 'style' => array( 'style2', 'style4' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'designation_typo',
                'label'   => esc_html__( 'Designation', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-trainer-designation',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'content_typo',
                'label'   => esc_html__( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .description',
                'condition'   => array( 'style' => array( 'style2' ) ),
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
                'id'      => 'section_title_color',
                'label'   => __( 'Section Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-custom-nav-title' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'name_bg',
                'label'   => __( 'Name Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-team-2 .vc-team-meta .name' => 'background-color: {{VALUE}} !important',
                ),
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'name_color',
                'label'   => __( 'Nmae Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-trainer-name a' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .rtin-trainer-name' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'designation_bg',
                'label'   => __( 'Designation Background', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-owl-team-2 .vc-team-meta .designation' => 'background-color: {{VALUE}}' ),
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'designation_color',
                'label'   => __( 'Designation Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-trainer-designation' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .description' => 'color: {{VALUE}}' ),
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_bg',
                'label'   => __( 'Box Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-owl-team-1 .vc-team-meta' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-owl-team-4 .vc-item:hover .vc-team-meta' => 'background-color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array( 'style1', 'style4' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'overlay_color',
                'label'   => __( 'Overlay Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-item .vc-overly' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_bg',
                'label'   => __( 'Social Icon Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_bg',
                'label'   => __( 'Social Icon Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a:hover' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_color',
                'label'   => __( 'Social Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a .fa' => 'color: {{VALUE}} !important',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_color',
                'label'   => __( 'Social Icon Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a:hover i' => 'color: {{VALUE}} !important',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_border_color',
                'label'   => __( 'Social Icon Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a' => 'border-color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_border_color',
                'label'   => __( 'Social Icon Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .vc-overly ul li a:hover' => 'border-color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => array('style1', 'style2', 'style3' )),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'nav_bg',
                'label'   => __( 'Navigation Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-nav > div' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-custom-nav > div' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'nav_color',
                'label'   => __( 'Navigation Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-nav > div' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .owl-custom-nav > div' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'nav_hover_bg',
                'label'   => __( 'Navigation Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-nav > div:hover' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-custom-nav > div:hover' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'nav_hover_color',
                'label'   => __( 'Navigation Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-theme .owl-nav > div:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .owl-custom-nav > div:hover' => 'color: {{VALUE}}',
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
            'nav'                => $data['slider_nav'] == 'yes' ? true : false,
            'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
            'dots'               => $data['slider_dot'] == 'yes' ? true : false,
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
            case 'style4':
                $template = 'view-4';
                break;
            case 'style3':
                $template = 'view-3';
                break;
            case 'style2':
                $template = 'view-2';
                break;
            default:
                $owl_data['nav'] = false;
                $template = 'view-1';
        }

        $data['owl_data'] = json_encode( $owl_data );

        return $this->rt_template( $template, $data );
    }

}
