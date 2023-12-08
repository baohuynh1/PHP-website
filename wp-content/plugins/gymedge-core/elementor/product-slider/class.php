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

class Product_Slider extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Product Slider', 'gymedge-core' );
        $this->rt_base  = 'rt-woo-product-slider';
        parent::__construct( $data, $args );
    }

    public function rt_load_scripts(){
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'owl-theme-default' );
        wp_enqueue_script( 'owl-carousel' );
    }

    public function rt_fields() {

        $terms = get_terms( array('taxonomy' => 'product_cat' ) );
        $category_dropdown = array( '0' => __( 'All Categories', 'gymedge-core' ) );
        foreach ( $terms as $category ) {
            $category_dropdown[$category->term_id] = $category->name;
        }

        $column = array(
            '1' => __('1 Column', 'gymedge-core'),
            '2' => __('2 Column', 'gymedge-core'),
            '3' => __('3 Column', 'gymedge-core'),
            '4' => __('4 Column', 'gymedge-core'),
            '5' => __('5 Column', 'gymedge-core'),
            '6' => __('6 Column', 'gymedge-core'),
        );

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
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title',
                'label'   => esc_html__( 'Title', 'gymedge-core' ),
                'default' => 'FEATURED PRODUCTS',
                'condition'   => array( 'style' => 'style1' ),
            ),
            array(
                'id'        => 'cat',
                'label'     => __( 'Categories', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $category_dropdown,
                'default'   => '0',
            ),
            array(
                'id'            => 'item_no',
                'label'         => __( 'Total number of items', 'gymedge-core' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 5,
                'description'   => __( 'Write -1 to show all', 'gymedge-core' ),
            ),
            array(
                'mode'  => 'section_end'
            ),

            // Grid Column

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_grid',
                'label'   => __( 'Grid Column', 'gymedge-core' ),
            ),
            array(
                'id'        => 'col_lg',
                'label'     => __( 'Columns ( Desktops > 1199px )', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $column,
                'default'   => '4',
            ),
            array(
                'id'        => 'col_md',
                'label'     => __( 'Columns ( Desktops > 991px )', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $column,
                'default'   => '4',
            ),
            array(
                'id'        => 'col_sm',
                'label'     => __( 'Columns ( Tablets > 767px )', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $column,
                'default'   => '3',
            ),
            array(
                'id'        => 'col_xs',
                'label'     => __( 'Columns ( Phones < 768px )', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $column,
                'default'   => '2',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_mobile',
                'label'   => __( 'Small Phones: < 480px', 'gymedge-core' ),
                'options' => $column,
                'default' => '1',
            ),
            array(
                'mode'  => 'section_end'
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
                'default'     => 'yes',
                'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_nav',
                'label'       => esc_html__( 'Navigation Arrow', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Enable or disable slider navigation. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'slider_dot',
                'label'       => esc_html__( 'Navigation Dots', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'no',
                'description' => esc_html__( 'Enable or disable slider navigation. Default: On', 'gymedge-core' ),
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

            // Style Tab

            array(
                'mode'      => 'section_start',
                'id'        => 'sec_general_style',
                'tab'       => Controls_Manager::TAB_STYLE,
                'label'     => __( 'Typography', 'gymedge-core' ),
            ),
            array (
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'id'        => 'section_title_typo',
                'label'     => esc_html__( 'Section Title', 'gymedge-core' ),
                'selector'  => '{{WRAPPER}} .owl-custom-nav-title',
                'condition'   => array( 'style' => 'style1' ),
            ),
            array (
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'id'        => 'title_typo',
                'label'     => esc_html__( 'Product Title', 'gymedge-core' ),
                'selector'  => '{{WRAPPER}} ul.products li.product h3 a',
            ),
            array (
                'mode'      => 'group',
                'type'      => Group_Control_Typography::get_type(),
                'id'        => 'price_typo',
                'label'     => esc_html__( 'Price', 'gymedge-core' ),
                'selector'  => '{{WRAPPER}} ul.products li.product .price',
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
                'id'      => 'section_title_color',
                'label'   => __( 'Section Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-custom-nav-title' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'style' => 'style1' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.products li.product h3 a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_color',
                'label'   => __( 'Title Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} ul.products li.product h3 a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'rating_color',
                'label'   => __( 'Rating Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .star-rating' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'price_color',
                'label'   => __( 'Price Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce ul.products li.product .price' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'overlay_color',
                'label'   => __( 'Overlay Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .product-thumb-area .overlay' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_bg',
                'label'   => __( 'Icon Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .product-thumb-area .product-info ul li a' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_color',
                'label'   => __( 'Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .product-thumb-area .product-info ul li a .fa' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_hover_bg',
                'label'   => __( 'Icon Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .product-thumb-area .product-info ul li a:hover' => 'background: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_hover_color',
                'label'   => __( 'Icon Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce .product-thumb-area .product-info ul li a:hover .fa' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} a.button' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .woocommerce span.onsale' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} a.button' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} a.button:hover' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} a.button:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'arrow_bg',
                'label'   => __( 'Arrow Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-prev' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-next' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'arrow_color',
                'label'   => __( 'Arrow Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-prev' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-next' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'arrow_hover_bg',
                'label'   => __( 'Arrow Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-prev:hover' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-next:hover' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'arrow_hover_color',
                'label'   => __( 'Arrow Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .owl-prev:hover' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .owl-next:hover' => 'color: {{VALUE}} !important',
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
