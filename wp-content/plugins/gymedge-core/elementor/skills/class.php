<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Skills extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Skills', 'gymedge-core' );
		$this->rt_base = 'rt-skills';
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
                'type'          => Controls_Manager::REPEATER,
                'id'            => 'skills',
                'label'         => esc_html__( 'Add as many skills as you want', 'gymedge-core' ),
                'fields'  => array(
                    array(
                        'type'  => Controls_Manager::TEXT,
                        'name'  => 'title',
                        'label' => esc_html__( 'Title', 'gymedge-core' ),
                    ),
                    array(
                        'type'  => Controls_Manager::TEXT,
                        'name'  => 'number',
                        'label' => esc_html__( 'Percentage', 'gymedge-core' ),
                    ),
                ),
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
                'selector' => '{{WRAPPER}} .rtin-title',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'percentage_typo',
                'label'    => __( 'Percentage', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-number',
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
                'selectors' => array( '{{WRAPPER}} .rtin-title' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'percentage_color',
                'label'   => __( 'Percentage Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-number' => 'color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'bar_bg',
                'label'   => __( 'Bar Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-skills .progress' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'bar_highlighted_bg',
                'label'   => __( 'Bar Highlighted Background', 'gymedge-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-vc-skills .progress .progress-bar' => 'background-color: {{VALUE}}',
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