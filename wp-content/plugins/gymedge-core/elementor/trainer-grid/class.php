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

class Trainer_Grid extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Trainer Grid', 'gymedge-core' );
        $this->rt_base  = 'rt-trainer-grid';
        parent::__construct( $data, $args );
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
                    'style4'   => __( 'Style 4', 'gymedge-core'),
                ),
                'default'   => 'style1',
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
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'pagination_display',
                'label'       => esc_html__( 'Pagination Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'no',
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
                'label'   => __( 'Name Color', 'gymedge-core' ),
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
                    '{{WRAPPER}} .rt-team-grid-1 .vc-meta' => 'background-color: {{VALUE}}',
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
                'id'      => 'pagination_bg',
                'label'   => __( 'Pagination Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}}  .pagination-area ul li a' => 'background-color: {{VALUE}} !important',
                ),
                'condition'   => array( 'pagination_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'pagination_color',
                'label'   => __( 'Pagination Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}}  .pagination-area ul li a' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'pagination_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'pagination_hover_bg',
                'label'   => __( 'Pagination Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}}  .pagination-area ul li a:hover' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}}  .pagination-area ul li a.active' => 'background-color: {{VALUE}} !important',
                ),
                'condition'   => array( 'pagination_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'pagination_hover_color',
                'label'   => __( 'Pagination Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}}  .pagination-area ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .pagination-area ul li a.active' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'pagination_display' => array( 'yes' ) ),
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
                $template = 'view-1';
        }

        return $this->rt_template( $template, $data );
    }

}
