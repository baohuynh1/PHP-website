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

class Post_List extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Post List', 'gymedge-core' );
        $this->rt_base  = 'rt-post-list';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $terms = get_terms( array( 'taxonomy' => 'category' ) );
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
                'id'        => 'item_no',
                'label'     => __( 'Total number of items', 'gymedge-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3,
                'description' => __( 'Write -1 to show all', 'gymedge-core' ),
            ),
            array(
                'id'    => 'category',
                'label' => __( 'Category', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT,
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
                'label'   => esc_html__( 'Post Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-item .rtin-title',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'date_typo',
                'label'   => esc_html__( 'Date', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-item .rtin-date',
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
                    '{{WRAPPER}} .rtin-item .rtin-title a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_color',
                'label'   => __( 'Title Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-item .rtin-title a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'date_color',
                'label'   => __( 'Date Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rtin-item .rtin-date' => 'color: {{VALUE}}',
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

        $template = 'view';

        return $this->rt_template( $template, $data );
    }

}
