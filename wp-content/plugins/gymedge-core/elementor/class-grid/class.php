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

class Class_Grid extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Class Grid', 'gymedge-core' );
        $this->rt_base  = 'rt-class-grid';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $terms = get_terms( array('taxonomy' => 'gym_class_category' ) );
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
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'pagination_display',
                'label'       => esc_html__( 'Pagination Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
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
	            'type'    => Controls_Manager::SELECT,
	            'id'      => 'thumbnail_size',
	            'label'   => __( 'Image Size', 'gymedge-core' ),
	            'options' => $this->rt_get_all_image_sizes(),
	            'default' => '0',
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
                'default'   => '6',
            ),
            array(
                'id'        => 'col_xs',
                'label'     => __( 'Columns ( Phones < 768px )', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $column,
                'default'   => '12',
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
                'selector' => '{{WRAPPER}} .rtin-class-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'time_typo',
                'label'   => esc_html__( 'Time', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} ul.rtin-class-time li',
                'condition' => array(
                    'style' => array('style1', 'style3'),
                ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'content_typo',
                'label'   => esc_html__( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-class-content',
                'condition' => array(
                    'style' => array('style2'),
                ),
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
                'id'      => 'title_bg',
                'label'   => __( 'Title Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-class-title' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-class-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rtin-class-title a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_bg',
                'label'   => __( 'Title Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-class-title:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .vc-item:hover .rtin-class-title' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_color',
                'label'   => __( 'Title Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-class-title:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .vc-item:hover .rtin-class-title' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'line_color',
                'label'   => __( 'Line Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-nopag-2 .rtin-content h3::after' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'time_bg',
                'label'   => __( 'Time Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-1 .vc-item .vc-overly .vc-grid-ul-child li:last-child' => 'background-color: {{VALUE}}'
                ),
                'condition' => array(
                    'style'    => array( 'style1' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'time_color',
                'label'   => __( 'Time Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-nopag-2 .rtin-content ul' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-1 .vc-item .vc-overly .vc-grid-ul-child li:last-child' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'day_bg',
                'label'   => __( 'Day Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-1 .vc-item .vc-overly .vc-grid-ul-child li:first-child' => 'background-color: {{VALUE}}'
                ),
                'condition' => array(
                    'style'    => array( 'style1' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'day_color',
                'label'   => __( 'Day Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-1 .vc-item .vc-overly .vc-grid-ul-child li:first-child' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'overlay_color',
                'label'   => __( 'Overlay Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .single-item-content::after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-1 .vc-item .vc-overly' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style1', 'style2' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-class-content' => 'color: {{VALUE}}' ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color',
                'label'   => __( 'Button Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a' => 'border-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a:hover' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_border_color',
                'label'   => __( 'Button Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a:hover' => 'border-color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-btn a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-class-grid-2 .single-item .details a:hover' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'style'    => array( 'style2', 'style3' ),
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

        return $this->rt_template( $template, $data );
    }

}
