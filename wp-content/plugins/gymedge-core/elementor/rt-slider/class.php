<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit;
}

class RT_Slider extends Widget_Base
{

	public function get_name()
	{
		return 'rt-main-slider';
	}

	public function get_title()
	{
		return __('RT Slider', 'gymedge-core');
	}

	public function get_icon()
	{
		return 'rdtheme-el-custom';
	}

	public function get_keywords()
	{
		return ['image', 'photo', 'visual', 'carousel', 'slider'];
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section_rt_slider',
			[
				'label' => __('RT Slider', 'gymedge-core'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slider_image',
			[
				'label' => __('Slider Image', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'slider_title',
			[
				'label' => __('Title', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'BUILD <span>YOUR</span> BODY <span>STRONG</span>',
				'label_block' => true,
				'rows' => 2,
			]
		);

		$repeater->add_control(
			'slider_subtitle',
			[
				'label' => __('Subtitle', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Trust The Grounds Guys professionals to take care of your <br> commercial or residential grounds', 'gymedge-core'),
				'label_block' => true,
				'rows' => 4,
			]
		);

		$repeater->add_control(
			'slider_link',
			[
				'label' => __('Slider Link', 'gymedge-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'gymedge-core'),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'slider_animation',
			[
				'label' => __('Additional Settings', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'slider_bg_animation',
			[
				'label' => __('Background Animation', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'zoom-in',
				'options' => [
					'zoom-in' => __('Zoom In', 'gymedge-core'),
					'zoom-out' => __('Zoom Out', 'gymedge-core'),
				],
			]
		);

		// Title Animation

		$repeater->add_control(
			'slider_title_popover_toggle',
			[
				'label' => __('Title Animation', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __('Default', 'gymedge-core'),
				'label_on' => __('Custom', 'gymedge-core'),
				'return_value' => 'yes',
			]
		);
		$repeater->start_popover();

		$repeater->add_control(
			'title_x_paralax',
			[
				'label' => __('Title Paralax X Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'title_y_paralax',
			[
				'label' => __('Title Paralax Y Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -200,
				],
			]
		);

		$repeater->add_control(
			'title_paralax_scale',
			[
				'label' => __('Title Paralax Scale', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
			]
		);

		$repeater->add_control(
			'title_paralax_opacity',
			[
				'label' => __('Title Paralax Opcaity', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'title_paralax_duration',
			[
				'label' => __('Title Paralax Duration', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 800,
				],
			]
		);

		$repeater->add_control(
			'title_paralax_delay',
			[
				'label' => __('Title Paralax Delay', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 2000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
			]
		);

		$repeater->end_popover();

		//SubTitle Animation

		$repeater->add_control(
			'slider_subtitle_popover_toggle',
			[
				'label' => __('Subtitle Animation', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __('Default', 'gymedge-core'),
				'label_on' => __('Custom', 'gymedge-core'),
				'return_value' => 'yes',
			]
		);
		$repeater->start_popover();

		$repeater->add_control(
			'subtitle_x_paralax',
			[
				'label' => __('Sub Title Paralax X Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -200,
				],
			]
		);

		$repeater->add_control(
			'subtitle_y_paralax',
			[
				'label' => __('Title Paralax Y Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'subtitle_paralax_scale',
			[
				'label' => __('Title Paralax Scale', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
			]
		);

		$repeater->add_control(
			'subtitle_paralax_opacity',
			[
				'label' => __('Title Paralax Opcaity', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'subtitle_paralax_duration',
			[
				'label' => __('Title Paralax Duration', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 800,
				],
			]
		);

		$repeater->add_control(
			'subtitle_paralax_delay',
			[
				'label' => __('Sub Title Paralax Delay', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
			]
		);

		$repeater->end_popover();

		// Button Animation
		$repeater->add_control(
			'slider_button_popover_toggle',
			[
				'label' => __('Button Animation', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __('Default', 'gymedge-core'),
				'label_on' => __('Custom', 'gymedge-core'),
				'return_value' => 'yes',
			]
		);
		$repeater->start_popover();

		$repeater->add_control(
			'btn_x_paralax',
			[
				'label' => __('Title Paralax X Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'btn_y_paralax',
			[
				'label' => __('Title Paralax Y Axix', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -300,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
			]
		);

		$repeater->add_control(
			'btn_paralax_scale',
			[
				'label' => __('Title Paralax Scale', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
			]
		);

		$repeater->add_control(
			'btn_paralax_opacity',
			[
				'label' => __('Title Paralax Opcaity', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
			]
		);

		$repeater->add_control(
			'btn_paralax_duration',
			[
				'label' => __('Title Paralax Duration', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 800,
				],
			]
		);

		$repeater->add_control(
			'btn_paralax_delay',
			[
				'label' => __('Button Paralax Delay', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 5000,
						'step' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 700,
				],
			]
		);

		$repeater->end_popover();

		$repeater->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater->add_control(
			'text_align',
			[
				'label' => __('Alignment', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'gymedge-core'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'gymedge-core'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'gymedge-core'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slider-inner-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'overlay_bg',
				'label' => __('Overlay', 'gymedge-core'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .slider-inner-wrapper .bg::before',
			]
		);

		$this->add_control(
			'sliders',
			[
				'label' => __('Slider Items', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slider_title' => 'BUILD <span>YOUR</span> BODY <span>STRONG</span>',
						'slider_subtitle' => __('Ready to change your physique, but can\'t work out in the gym?', 'gymedge-core'),
					],
					[
						'slider_title' => 'YOUR <span>BODY</span> YOUR <span>PRIDE</span>',
						'slider_subtitle' => __('Ready to change your physique, but can\'t work out in the gym?', 'gymedge-core'),
					],
				],
				'title_field' => '{{{ slider_title }}}',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
				'separator' => 'before',
				'exclude' => [
					'custom',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __('Additional Options', 'gymedge-core'),
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __('Navigation', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrows',
				'options' => [
					'both' => __('Arrows and Dots', 'gymedge-core'),
					'arrows' => __('Arrows', 'gymedge-core'),
					'dots' => __('Dots', 'gymedge-core'),
					'none' => __('None', 'gymedge-core'),
				],
			]
		);

		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __('Slider Height', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'vh'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .rt-swiper-slider .swiper-slide' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slider_padding',
			[
				'label' => __('Slider Padding', 'gymedge-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-inner-wrapper .container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __('Effect', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __('Slide', 'gymedge-core'),
					'fade' => __('Fade', 'gymedge-core'),
				],
			]
		);

		$this->add_control(
			'direction',
			[
				'label' => __('Direction', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => __('Horizontal', 'gymedge-core'),
					'vertical' => __('Vertical', 'gymedge-core'),
				],
				'condition' => [
					'effect' => 'slide',
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __('Autoplay', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __('Yes', 'gymedge-core'),
					'no' => __('No', 'gymedge-core'),
				],

			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __('Pause on Hover', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __('Yes', 'gymedge-core'),
					'no' => __('No', 'gymedge-core'),
				],
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
			]
		);

		$this->add_control(
			'pause_on_interaction',
			[
				'label' => __('Pause on Interaction', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __('Yes', 'gymedge-core'),
					'no' => __('No', 'gymedge-core'),
				],
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __('Autoplay Speed', 'gymedge-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
			]
		);

		// Loop requires a re-render so no 'render_type = none'
		$this->add_control(
			'infinite',
			[
				'label' => __('Infinite Loop', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __('Yes', 'gymedge-core'),
					'no' => __('No', 'gymedge-core'),
				],
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __('Animation Speed', 'gymedge-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'render_type' => 'none',
			]
		);

		$this->add_control(
			'animation_overflow',
			[
				'label' => __('Animation Overflow', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'hidden',
				'options' => [
					'hidden' => __('Hidden', 'gymedge-core'),
					'none' => __('None', 'gymedge-core'),
				],
			]
		);

		$this->end_controls_section();

		// Title Settings
		//============================================

		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __('Title Settings', 'gymedge-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .rt-slider-wrapper .slider-title-wrap h2',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_2',
			[
				'label' => __('Title Color - 2', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'default' => \GymEdge::$options['primary_color'],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-title-wrap h2 span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_margin_bottom',
			[
				'label' => __('Margin Bottom', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-title-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Subtitle Settings
		//============================================
		$this->start_controls_section(
			'section_style_subtitle',
			[
				'label' => __('Sub Title Settings', 'gymedge-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __('Typography', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .rt-slider-wrapper .slider-subtitle-wrap h4',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => __('Sub Title Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-subtitle-wrap h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_margin_bottom',
			[
				'label' => __('Margin Bottom', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .slider-subtitle-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Read More Settings
		//==============================================================
		$this->start_controls_section(
			'slider_button_settings',
			[
				'label' => esc_html__('Button Settings', 'gymedge-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('JOIN WITH US', 'gymedge-core'),
			]
		);

		//Start button Style Tab
		$this->start_controls_tabs(
			'btn_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __('Normal', 'gymedge-core'),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'gymedge-core'),
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'btn_bg',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Background', 'gymedge-core'),
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => __('Border', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .slider-dark-button',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => __('Hover', 'gymedge-core'),
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Color Hover', 'gymedge-core'),
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button:hover, {{WRAPPER}} .slider-dark-button:before' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'btn_bg_hover',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__('Background on Hover', 'gymedge-core'),
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_hover',
				'label' => __('Border', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .slider-dark-button:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End btn Style Tab

		$this->add_control(
			'readmore_border_radius',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Border Radius', 'gymedge-core'),
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_btn_typography',
				'label' => esc_html__('Typography', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .slider-dark-button',
			]
		);

		$this->add_responsive_control(
			'readmore_padding_spacing',
			[
				'label' => __('Read More Padding', 'gymedge-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .slider-dark-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Carousel Settings
		// ========================================

		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => __('Carousel Settings', 'gymedge-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => ['arrows', 'dots', 'both'],
				],
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => __('Arrows', 'gymedge-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_control(
			'arrow_visibility',
			[
				'label' => __('Arrow Visibility', 'gymedge-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'' => __('Always Visible', 'gymedge-core'),
					'visible-on-hover' => __('Visible on hover', 'gymedge-core'),
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_responsive_control(
			'arrow_position',
			[
				'label' => __('Arrow Position', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 300,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'tablet_default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_responsive_control(
			'arrows_size',
			[
				'label' => __('Font Size', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 15,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_responsive_control(
			'arrows_width_height',
			[
				'label' => __('Width / Height', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_responsive_control(
			'arrows_radius',
			[
				'label' => __('Border Radius', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->start_controls_tabs(
			'arrow_style_tabs'
		);

		$this->start_controls_tab(
			'arrow_style_normal_tab',
			[
				'label' => __('Normal', 'gymedge-core'),
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __('Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_control(
			'arrows_bg_color',
			[
				'label' => __('Background Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Arrow Border', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button',
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'arrow_style_hover_tab',
			[
				'label' => __('Hover', 'gymedge-core'),
			]
		);

		$this->add_control(
			'arrows_color_hover',
			[
				'label' => __('Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_control(
			'arrows_bg_color_hover',
			[
				'label' => __('Background Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Arrow Border', 'gymedge-core'),
				'selector' => '{{WRAPPER}} .rt-slider-wrapper .elementor-swiper-button:hover',
				'condition' => [
					'navigation' => ['arrows', 'both'],
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __('Dots', 'gymedge-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => ['dots', 'both'],
				],
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => __('Position', 'gymedge-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => __('Outside', 'gymedge-core'),
					'inside' => __('Inside', 'gymedge-core'),
				],
				'prefix_class' => 'elementor-pagination-position-',
				'condition' => [
					'navigation' => ['dots', 'both'],
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __('Size', 'gymedge-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 25,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => ['dots', 'both'],
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __('Color', 'gymedge-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'background: {{VALUE}};',
				],
				'condition' => [
					'navigation' => ['dots', 'both'],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$data = $this->get_settings();
		$data['swiper_data'] = [
			'effect' => $data['effect'], //'slide' | 'fade' | 'cube' | 'coverflow' | 'flip'
			'fadeEffect' => ['crossFade' => true],
			'direction' => $data['direction'],
			'loop' => $data['infinite'] == 'yes' ? true : false,
			'speed' => $data['speed'],
			'slidesPerView' => 1,
			'spaceBetween' => 0,
			'slideToClickedSlide' => true,
			'allowTouchMove' => true,
			'parallax' => true,
			'loopedSlides' => 50,
			'navigation' => [
				'nextEl' => '.elementor-swiper-button-prev',
				'prevEl' => '.elementor-swiper-button-next',
			],
			'pagination' => [
				'el' => '.swiper-pagination',
				'clickable' => true,
				'type' => 'bullets',
			],
		];

		if ('yes' == $data['autoplay']) {
			$data['swiper_data']['autoplay'] = [
				'delay' => $data['autoplay_speed'],
				'pauseOnMouseEnter' => $data['pause_on_hover'] == 'yes' ? true : false,
				// 'disableOnInteraction' => $data['pause_on_interaction'] == 'yes' ? true : false,
			];
		}

		$show_dots = (in_array($data['navigation'], ['dots', 'both']));
		$show_arrows = (in_array($data['navigation'], ['arrows', 'both']));

		$slides_count = count($data['sliders']);
		$slider_option = json_encode($data['swiper_data']);
		$animation_overflow = '';
		if ('hidden' == $data['animation_overflow']) {
			$animation_overflow = "overflow:hidden;";
		}

?>
		<div class="rt-main-slider-wrapper">
			<div class="rt-slider-wrapper swiper-container rt-swiper-slider <?php echo esc_attr($data['arrow_visibility']) ?>" data-option="<?php echo esc_js($slider_option); ?>">
				<div class="rt-slider swiper-wrapper">
					<?php if ($data['sliders']) :
						foreach ($data['sliders'] as $slide) :
							$image = wp_get_attachment_image_url($slide['slider_image']['id'], $data['thumbnail_size']);
							if (!$image) {
								$image = $slide['slider_image']['url'];
							}

							$target = $slide['slider_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $slide['slider_link']['nofollow'] ? ' rel="nofollow"' : '';
							$btn_link = $slide['slider_link']['url'] ? $slide['slider_link']['url'] : '#';

							// Title Animatin
							$title_x_paralax = $slide["title_x_paralax"]["size"] ? ' data-swiper-parallax-x="' . $slide["title_x_paralax"]["size"] . '"' : '';
							$title_y_paralax = $slide["title_y_paralax"]["size"] ? ' data-swiper-parallax-y="' . $slide["title_y_paralax"]["size"] . '"' : '';
							$title_paralax_scale = $slide["title_paralax_scale"]["size"] ? ' data-swiper-parallax-scale="' . $slide["title_paralax_scale"]["size"] . '"' : '';
							$title_paralax_opacity = ' data-swiper-parallax-opacity="' . $slide["title_paralax_opacity"]["size"] . '"';
							$title_paralax_duration = $slide["title_paralax_duration"]["size"] ? ' data-swiper-parallax-duration="' . $slide["title_paralax_duration"]["size"] . '"' : '';
							$title_paralax_delay = $slide["title_paralax_delay"]["size"] ? 'transition-delay:' . $slide["title_paralax_delay"]["size"] . 'ms' : '';

							// Subtitle Animatin
							$subtitle_x_paralax = $slide["subtitle_x_paralax"]["size"] ? ' data-swiper-parallax-x="' . $slide["subtitle_x_paralax"]["size"] . '"' : '';
							$subtitle_y_paralax = $slide["subtitle_y_paralax"]["size"] ? ' data-swiper-parallax-y="' . $slide["subtitle_y_paralax"]["size"] . '"' : '';
							$subtitle_paralax_scale = $slide["subtitle_paralax_scale"]["size"] ? ' data-swiper-parallax-scale="' . $slide["subtitle_paralax_scale"]["size"] . '"' : '';
							$subtitle_paralax_opacity = ' data-swiper-parallax-opacity="' . $slide["subtitle_paralax_opacity"]["size"] . '"';
							$subtitle_paralax_duration = $slide["subtitle_paralax_duration"]["size"] ? ' data-swiper-parallax-duration="' . $slide["subtitle_paralax_duration"]["size"]
								. '"' : '';
							$subtitle_paralax_delay = $slide["subtitle_paralax_delay"]["size"] ? 'transition-delay:' . $slide["subtitle_paralax_delay"]["size"] . 'ms' : '';

							// Button Animatin
							$btn_x_paralax = $slide["btn_x_paralax"]["size"] ? ' data-swiper-parallax-x="' . $slide["btn_x_paralax"]["size"] . '"' : '';
							$btn_y_paralax = $slide["btn_y_paralax"]["size"] ? ' data-swiper-parallax-y="' . $slide["btn_y_paralax"]["size"] . '"' : '';
							$btn_paralax_scale = $slide["btn_paralax_scale"]["size"] ? ' data-swiper-parallax-scale="' . $slide["btn_paralax_scale"]["size"] . '"' : '';
							$btn_paralax_opacity = ' data-swiper-parallax-opacity="' . $slide["btn_paralax_opacity"]["size"] . '"';
							$btn_paralax_duration = $slide["btn_paralax_duration"]["size"] ? ' data-swiper-parallax-duration="' . $slide["btn_paralax_duration"]["size"] . '"' : '';
							$btn_paralax_delay = $slide["btn_paralax_delay"]["size"] ? 'transition-delay:' . $slide["btn_paralax_delay"]["size"] . 'ms' : '';

							// BG Animation
							$slider_zoomin = $slider_zoomout = '';
							if ($slide['slider_bg_animation'] == 'zoom-in') {
								$slider_zoomin = 'data-swiper-parallax-scale="1.1" data-swiper-parallax-duration="1500"';
							} elseif ($slide['slider_bg_animation'] == 'zoom-out') {
								$slider_zoomout = 'zoom-out';
							}

					?>
							<div class="swiper-slide elementor-repeater-item-<?php echo esc_attr($slide['_id']) ?>">

								<div class="slider-inner-wrapper">
									<div class="bg <?php echo esc_attr($slider_zoomout); ?>" <?php echo $slider_zoomin ?> style="background-image:url(<?php echo esc_url($image) ?>)"></div>

									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<?php if ($slide['slider_title']) : ?>
													<div class="slider-title-wrap rt-slider-content-wrap" style="<?php echo esc_attr($animation_overflow); ?>">
														<h2 style="<?php echo esc_attr($title_paralax_delay) ?>" <?php echo ($title_x_paralax . $title_y_paralax . $title_paralax_scale
																														. $title_paralax_opacity . $title_paralax_duration) ?>>
															<?php echo $slide['slider_title'] ?>
														</h2>
													</div>
												<?php endif; ?>

												<?php if ($slide['slider_subtitle']) : ?>
													<div class="slider-subtitle-wrap rt-slider-content-wrap" style="<?php echo esc_attr($animation_overflow); ?>">
														<h4 style="<?php echo esc_attr($subtitle_paralax_delay) ?>" <?php echo ($subtitle_x_paralax . $subtitle_y_paralax
																														. $subtitle_paralax_scale . $subtitle_paralax_opacity
																														. $subtitle_paralax_duration) ?>><?php echo $slide['slider_subtitle'] ?></h4>
													</div>
												<?php endif; ?>

												<?php if ($data['button_text']) : ?>
													<div class="slider-button rt-slider-content-wrap" style="<?php echo esc_attr($animation_overflow); ?>">
														<div class="slider-btn" style="<?php echo esc_attr($btn_paralax_delay) ?>" <?php echo ($btn_x_paralax . $btn_y_paralax
																																		. $btn_paralax_scale . $btn_paralax_opacity
																																		. $btn_paralax_duration) ?>>
															<a href="<?php echo esc_url($btn_link) ?>" class="slider-dark-button" <?php echo $target
																																		. $nofollow; ?>><span><?php echo esc_html($data['button_text']) ?></span></a>
														</div>
													</div>
												<?php endif; ?>
											</div>
										</div>

									</div>

								</div>

							</div>
					<?php endforeach;
					endif; ?>
				</div>

				<?php if (1 < $slides_count) : ?>
					<?php if ($show_dots) : ?>
						<div class="swiper-pagination"></div>
					<?php endif; ?>
					<?php if ($show_arrows) : ?>
						<div class="elementor-swiper-button elementor-swiper-button-prev rt-prev">
							<i class="eicon-chevron-left" aria-hidden="true"></i>
							<span class="elementor-screen-only"><?php _e('Previous', 'elementor'); ?></span>
						</div>
						<div class="elementor-swiper-button elementor-swiper-button-next rt-next">
							<i class="eicon-chevron-right" aria-hidden="true"></i>
							<span class="elementor-screen-only"><?php _e('Next', 'elementor'); ?></span>
						</div>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</div>
<?php
	}
}
