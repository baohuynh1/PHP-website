<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Intro extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Intro', 'gymedge-core' );
		$this->rt_base = 'rt-intro';
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
				'id'      => 'style',
				'label'   => __( 'Style', 'gymedge-core' ),
				'options' => array(
					'light' => __( 'Light (No Background)', 'gymedge-core' ),
					'dark' => __( 'Dark (Requires Dark Background)', 'gymedge-core' ),
				),
				'default' => 'light',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'before_title',
				'label'   => __( 'Before Title', 'gymedge-core' ),
				'default' => 'Hello, I\'m',
			),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title',
                'label'   => __( 'Title', 'gymedge-core' ),
                'default' => 'John Doe',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'after_title',
                'label'   => __( 'After Title', 'gymedge-core' ),
                'default' => 'Fitness and Body Specialist',
            ),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => __( 'Description', 'gymedge-core' ),
				'default' => 'Lorem Ipsum has been standard daand scrambled. Rimply dummy text of the printing and typesetting industry',
			),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'btn_display',
                'label'       => esc_html__( 'Button Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Button. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::TEXT,
                'id'          => 'btn_text',
                'label'       => esc_html__( 'Button Text', 'gymedge-core' ),
                'default' 	  => esc_html__('JOIN NOW', 'gymedge-core' ),
                'condition'   => array( 'btn_display' => array( 'yes' ) ),
            ),
            array(
                'type'        => Controls_Manager::URL,
                'id'          => 'btn_url',
                'label'       => esc_html__( 'Button URL', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'btn_display' => array( 'yes' ) ),
            ),
            array(
                'mode' => 'section_end',
            ),
            // Socials
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_social',
                'label'   => __( 'Social Profile', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'social_display',
                'label'       => esc_html__( 'Social Profile Display', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Button. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'social_facebook',
                'label'   => __( 'Facebook', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'social_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'social_twitter',
                'label'   => __( 'Twitter', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'social_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'social_linkedin',
                'label'   => __( 'Linkedin', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'social_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'social_instagram',
                'label'   => __( 'Instagram', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'social_display' => array( 'yes' ) ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'social_youtube',
                'label'   => __( 'Youtube', 'gymedge-core' ),
                'placeholder' => 'https://your-link.com',
                'condition'   => array( 'social_display' => array( 'yes' ) ),
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
                    '{{WRAPPER}} .rt-vc-intro .rtin-content' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .rt-vc-intro .rtin-title-area:after' => 'width: {{SIZE}}{{UNIT}};',
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
                'id'       => 'before_title_typo',
                'label'    => __( 'Before Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-before-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'title_typo',
                'label'    => __( 'Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'after_title_typo',
                'label'    => __( 'After Title', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-after-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'content_typo',
                'label'    => __( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-intro .rtin-content p',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'btn_typo',
                'label'    => __( 'Button', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-vc-intro .rtin-btn',
            ),
            array(
                'mode' => 'section_end',
            ),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Style', 'gymedge-core' ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_before_color',
                'label'   => __( 'Before Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-before-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_after_color',
                'label'   => __( 'After Title Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-intro .rtin-title-area .rtin-after-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_line_color',
                'label'   => __( 'Title Line Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-intro .rtin-title-area:after' => 'background-color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-content p' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color',
                'label'   => __( 'Button Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn' => 'border-color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn:hover' => 'background-color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_border_color',
                'label'   => __( 'Button Hover Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn:hover' => 'border-color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-intro .rtin-btn:hover' => 'color: {{VALUE}}',
                ),
                'condition' => array(
                    'btn_display'    => array( 'yes' ),
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

        $template = 'view';

		return $this->rt_template( $template, $data );
	}
}