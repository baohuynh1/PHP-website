<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Info_Text extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Info Text', 'gymedge-core' );
		$this->rt_base = 'rt-info-text';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => __( 'General', 'gymedge-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => __( 'Style', 'gymedge-core' ),
				'options' => array(
					'layout1' => __( 'Style 1', 'gymedge-core' ),
					'layout2' => __( 'Style 2', 'gymedge-core' ),
					'layout3' => __( 'Style 3', 'gymedge-core' ),
				),
				'default' => 'layout1',
			),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title',
                'label'   => __( 'Title', 'gymedge-core' ),
                'default' => 'Lorem Ipsum',
            ),
            array(
                'type'        => Controls_Manager::URL,
                'id'          => 'title_url',
                'label'       => esc_html__( 'Title Link (Optional)', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
            ),
            array(
                'type'    => Controls_Manager::TEXTAREA,
                'id'      => 'content',
                'label'   => __( 'Content', 'gymedge-core' ),
                'default' => 'Lorem Ipsum has been standard daand scrambled. Rimply dummy text of the printing and typesetting industry',
            ),
            array(
                'id'        => 'content_align',
                'label'     => __( 'Alignment', 'gymedge-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'alignleft'  => [
                        'title'     => __( 'Left', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-left',
                    ],
                    'aligncenter' => [
                        'title'     => __( 'Center', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-center',
                    ],
                    'alignright' => [
                        'title'     => __( 'Right', 'gymedge-core' ),
                        'icon'      => 'fa fa-align-right',
                    ],
                ],
                'default' => 'aligncenter',
                'toggle' => true,
                'condition'   => array(
                    'layout' => array( 'layout3' )
                ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'separator_display',
                'label'       => esc_html__( 'Separator', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Separator. Default: On', 'gymedge-core' ),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_icon',
                'label'   => __( 'Icon', 'gymedge-core' ),
            ),
            array(
                'id'    => 'icon_type',
                'label' => __( 'Icon Type', 'gymedge-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    'icon'  => __( 'Icon', 'gymedge-core' ),
                    'image' => __( 'Custom Image', 'gymedge-core'),
                ),
                'default'   => 'icon',
            ),
            array(
                'type'    => Controls_Manager::ICON,
                'id'      => 'icon',
                'label'   => __( 'Icon', 'gymedge-core' ),
                'default' => 'fa fa-rocket',
                'condition'   => array( 'icon_type' => array( 'icon' ) ),
            ),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image',
                'label'   => __( 'Image', 'gymedge-core' ),
                'description' => __( 'Recommended image size is 160x160 px.<br/>You can upload SVG format as well, to get SVG images click here: <a target="_blank" href="https://www.flaticon.com/">flaticon.com</a>', 'gymedge-core' ),
                'condition'   => array( 'icon_type' => array( 'image' ) ),
            ),
            array(
                'type'    => Controls_Manager::SELECT,
                'id'      => 'image_style',
                'label'   => __( 'Image Style', 'gymedge-core' ),
                'options'   => array(
                    'default' => __( 'Default', 'gymedge-core'),
                    'rounded'  => __( 'Rounded', 'gymedge-core' ),
                ),
                'default'   => 'default',
                'condition' => array(
                    'icon_type' => array( 'image' ),
                ),
            ),
			array(
				'mode' => 'section_end',
			),

			// Style Tab
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'gymedge-core' ),
            ),
            array(
                'id'       => 'content_width',
                'label'    => __( 'Content Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-info-text-1' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-info-text-2' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-info-text-3' => 'max-width: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'       => 'title_line_width',
                'label'    => __( 'Title Line Width', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-separator' => 'width: {{SIZE}}{{UNIT}};',
                ),
            ),
            array(
                'id'            => 'subtitle_margin',
                'label'         => __( 'Seperator Margin', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => array(
                    'layout'   => array( 'layout1', 'layout2' ),
                ),
            ),
            array(
                'id'            => 'seperator_style3_margin',
                'label'         => __( 'Seperator Margin', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-separator' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto;',
                ],
                'condition' => array(
                    'layout'   => array( 'layout3' ),
                ),
            ),
            array(
                'id'            => 'icon_padding',
                'label'         => __( 'Icon Padding', 'gymedge-core' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .pull-left i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => array(
                  'layout'   => array( 'layout2' ),
                ),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_typography',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Typography', 'gymedge-core' ),
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'title_typo',
                'label'    => __( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .media-heading',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'subtitle_typo',
                'label'    => __( 'Subtitle', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .media-body p',
            ),
            array(
                'id'       => 'icon_size',
                'label'    => __( 'Icon Size', 'gymedge-core' ),
                'type'     => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 34,
                ],
                'selectors' => array(
                    '{{WRAPPER}} .rt-info-text-1 i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-info-text-2 i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .rt-info-text-3 i' => 'font-size: {{SIZE}}{{UNIT}};',
                ),
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
				    '{{WRAPPER}} .media-heading' => 'color: {{VALUE}}',
				    '{{WRAPPER}} .media-heading a' => 'color: {{VALUE}}',
                ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_color',
                'label'   => __( 'Title Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .media-heading:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .media-heading a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_line_color',
                'label'   => __( 'Seperator Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-separator' => 'background-color: {{VALUE}}' ),
            ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'subtitle_color',
				'label'   => __( 'Subtitle Color', 'gymedge-core' ),
				'selectors' => array( '{{WRAPPER}} .media-body p' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

        switch ( $data['layout'] ) {
            case 'layout2':
                $template = 'view-2';
                break;
            case 'layout3':
                $template = 'view-3';
                break;
            default:
                $template = 'view-1';
        }

		return $this->rt_template( $template, $data );
	}
}