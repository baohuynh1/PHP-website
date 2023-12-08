<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class BMI_Calculator extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'BMI Calculator', 'gymedge-core' );
		$this->rt_base = 'rt-bmi-calculator';
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
				'id'      => 'theme',
				'label'   => __( 'Theme', 'gymedge-core' ),
				'options' => array(
					'light' => __( 'Light (No Background)', 'gymedge-core' ),
					'dark' => __( 'Dark (Requires Dark Background)', 'gymedge-core' ),
				),
				'default' => 'light',
			),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title',
                'label'   => __( 'Title', 'gymedge-core' ),
                'default' => 'CALCULATE YOUR BMI',
            ),
            array(
                'type'    => Controls_Manager::WYSIWYG,
                'id'      => 'content',
                'label'   => __( 'Content', 'gymedge-core' ),
                'default' => 'Lorem ipsum dolor sit amet, consectet ad elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaLorem ipsum dolor sit amet',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'unit_default',
                'label'   => __( 'Default Calculation Unit', 'gymedge-core' ),
                'options' => array(
                    'metric' => __( 'Metric', 'gymedge-core' ),
                    'imperial' => __( 'Imperial', 'gymedge-core' ),
                ),
                'default' => 'metric',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'unit_display',
                'label'       => esc_html__( 'Allow users to change between Calculation Units', 'gymedge-core' ),
                'label_on'    => esc_html__( 'On', 'gymedge-core' ),
                'label_off'   => esc_html__( 'Off', 'gymedge-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Calculation Units. Default: On', 'gymedge-core' ),
            ),
            array(
                'type'        => Controls_Manager::TEXT,
                'id'          => 'btn_text',
                'label'       => esc_html__( 'Button Text', 'gymedge-core' ),
                'default' 	  => esc_html__('CALCULATE', 'gymedge-core' ),
            ),
            array(
                'mode' => 'section_end',
            ),

			// Style Tab

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
                'selector' => '{{WRAPPER}} .rt-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'content_typo',
                'label'    => __( 'Content', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-subtitle p',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'table_heading_typo',
                'label'    => __( 'Table Heading', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-bmi-calculator .bmi-chart th',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'table_data_typo',
                'label'    => __( 'Table Data', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-bmi-calculator .bmi-chart td',
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
				'id'      => 'title_color',
				'label'   => __( 'Title Color', 'gymedge-core' ),
				'selectors' => array(
				    '{{WRAPPER}} .rt-title' => 'color: {{VALUE}}',
                ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-subtitle p' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'input_color',
                'label'   => __( 'Input Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-calculator .rt-bmi-radio' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .rt-bmi-calculator .rt-bmi-fields input' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'input_border_color',
                'label'   => __( 'Input Border Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-calculator .rt-bmi-fields input' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'table_bg',
                'label'   => __( 'Table Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-calculator .bmi-chart th' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .rt-bmi-calculator .bmi-chart td' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'table_border_color',
                'label'   => __( 'Table Border Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-bmi-calculator .bmi-chart' => 'background-color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'table_heading_color',
                'label'   => __( 'Table Heading Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-calculator .bmi-chart th' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'table_data_color',
                'label'   => __( 'Table Data Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-bmi-calculator .bmi-chart td' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg',
                'label'   => __( 'Button Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-submit' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_color',
                'label'   => __( 'Button Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-submit' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_hover_bg',
                'label'   => __( 'Button Hover Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-submit:hover' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn__hover_color',
                'label'   => __( 'Button Hover Color', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-bmi-submit:hover' => 'color: {{VALUE}}',
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