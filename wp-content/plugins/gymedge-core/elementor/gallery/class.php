<?php
namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined('ABSPATH' ) ) exit;

class Gallery extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Gallery', 'gymedge-core' );
        $this->rt_base  = 'rt-gallery';
        parent::__construct( $data, $args );
    }

    public function rt_load_scripts(){
        wp_enqueue_style( 'magnific-popup' );
        wp_enqueue_script( 'isotope-pkgd' );
        wp_enqueue_script( 'jquery-magnific-popup' );
        wp_enqueue_script( 'gym-vc-gallery' );
    }

    public function rt_fields() {

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
                ),
                'default'   => 'style1',
            ),
            array(
                'id'        => 'orderby',
                'label'     => __( 'Order by', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $orderby,
                'default'   => 'date',
            ),
            array(
                'id'        => 'title',
                'label'     => __( 'Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'OUR GALLERY',
                'condition' => array(
                    'style' => array('style1'),
                ),
            ),
            array(
                'id'        => 'all',
                'label'     => __( 'All Items Title', 'gymedge-core' ),
                'type'      => Controls_Manager::TEXT,
                'default'     => 'All',
            ),
            array(
                'mode'  => 'section_end'
            ),

            // Style Tab

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Typography', 'gymedge-core' ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'title_typo',
                'label'   => esc_html__( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-section-title',
                'condition' => array(
                    'style' => array('style1'),
                ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'button_typo',
                'label'   => esc_html__( 'Button', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-gallery-tab a',
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
                    '{{WRAPPER}} .rt-section-title' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style' => array('style1'),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_border_color',
                'label'   => __( 'Button Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a' => 'border-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a:hover' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .rt-gallery-tab .current' => 'background-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a:hover' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .rt-gallery-tab .current' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'button_hover_border_color',
                'label'   => __( 'Button Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-tab a:hover' => 'border-color: {{VALUE}} !important',
                    '{{WRAPPER}} .rt-gallery-tab .current' => 'border-color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_hover_overlay',
                'label'   => __( 'Overlay Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-1 .rt-gallery-box:before' => 'background: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'zoom_icon_bg',
                'label'   => __( 'Zoom Icon Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-1-zoom' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'zoom_icon_color',
                'label'   => __( 'Zoom Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-1-zoom i' => 'color: {{VALUE}} !important',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'zoom_icon_hover_bg',
                'label'   => __( 'Zoom Icon Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-1-zoom:hover' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'zoom_icon_hover_color',
                'label'   => __( 'Zoom Icon Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-gallery-1-zoom:hover i' => 'color: {{VALUE}} !important',
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

        $template = 'view';

        return $this->rt_template( $template, $data );
    }

}
