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

class Trainer_Single extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'Trainer Single', 'gymedge-core' );
        $this->rt_base  = 'rt-trainer-single';
        parent::__construct( $data, $args );
    }

    public function rt_fields() {

        $args = array(
            'posts_per_page'   => -1,
            'orderby'          => 'title',
            'order'            => 'ASC',
            'suppress_filters' => false,
            'post_type'        => 'gym_trainer',
            'post_status'      => 'publish'
        );

        $posts = get_posts( $args );
        $posts_dropdown = array();
        foreach ( $posts as $post ) {
            $posts_dropdown[$post->ID] = $post->post_title;
        }
        reset($posts_dropdown);
        $default_trainer = key( $posts_dropdown );

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'gymedge-core' )
            ),
            array(
                'id'        => 'item',
                'label'     => __( 'Select Trainer', 'gymedge-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $posts_dropdown,
                'default'   => $default_trainer,
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
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'skill_display',
                'label'       => esc_html__( 'Skills Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'info_display',
                'label'       => esc_html__( 'Information Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'social_icon_display',
                'label'       => esc_html__( 'Social Profile Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
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
                'selector' => '{{WRAPPER}} .detail-heading h2',
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'designation_typo',
                'label'   => esc_html__( 'Designation', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .detail-heading .degination',
                'condition'   => array( 'designation_display' => array( 'yes' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'content_typo',
                'label'   => esc_html__( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .description',
                'condition'   => array( 'content_display' => array( 'yes' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'skill_typo',
                'label'   => esc_html__( 'Skill Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .progress .lead',
                'condition'   => array( 'skill_display' => array( 'yes' ) ),
            ),
            array (
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'id'    => 'info_typo',
                'label'   => esc_html__( 'Information Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .trainer-info p span',
                'condition'   => array( 'info_display' => array( 'yes' ) ),
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
                'id'      => 'name_color',
                'label'   => __( 'Name Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .detail-heading h2' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'designation_color',
                'label'   => __( 'Designation Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .detail-heading .degination' => 'color: {{VALUE}}' ),
                'condition'   => array( 'designation_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .description' => 'color: {{VALUE}}' ),
                'condition'   => array( 'content_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'skill_title_color',
                'label'   => __( 'Skill Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .progress .lead' => 'color: {{VALUE}}' ),
                'condition'   => array( 'skill_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'skill_bar_color',
                'label'   => __( 'Skill Bar Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .progress .progress-bar' => 'background-color: {{VALUE}}' ),
                'condition'   => array( 'skill_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'info_title_color',
                'label'   => __( 'Information Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .trainer-detail-content p span' => 'color: {{VALUE}}' ),
                'condition'   => array( 'info_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'info_color',
                'label'   => __( 'Information Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-detail-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .trainer-detail-content p a' => 'color: {{VALUE}}',
                ),
                'condition'   => array( 'info_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_bg',
                'label'   => __( 'Social Icon Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_bg',
                'label'   => __( 'Social Icon Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a:hover' => 'background: {{VALUE}}',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_color',
                'label'   => __( 'Social Icon Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a .fa' => 'color: {{VALUE}} !important',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_color',
                'label'   => __( 'Social Icon Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a:hover i' => 'color: {{VALUE}} !important',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_border_color',
                'label'   => __( 'Social Icon Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a' => 'border-color: {{VALUE}}',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'social_icon_hover_border_color',
                'label'   => __( 'Social Icon Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .trainer-info ul li a:hover' => 'border-color: {{VALUE}}',
                ),
                'condition'   => array( 'social_icon_display' => array( 'yes' ) ),
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
