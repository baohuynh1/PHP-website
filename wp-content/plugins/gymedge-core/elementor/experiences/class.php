<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Experience extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'Experience', 'gymedge-core' );
		$this->rt_base = 'rt-experience';
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
                'id'            => 'experience',
                'label'         => esc_html__( 'Add as many skills as you want', 'gymedge-core' ),
                'fields'  => array(
                    array(
                        'type'  => Controls_Manager::TEXT,
                        'name'  => 'title',
                        'label' => esc_html__( 'Title', 'gymedge-core' ),
                    ),
                    array(
                        'type'  => Controls_Manager::TEXTAREA,
                        'name'  => 'desc',
                        'label' => esc_html__( 'Description', 'gymedge-core' ),
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
                'id'       => 'desc_typo',
                'label'    => __( 'Description', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rtin-description',
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
                'id'      => 'title_border_color',
                'label'   => __( 'Border Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-vc-experience .rtin-item' => 'border-color: {{VALUE}}' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'desc_color',
                'label'   => __( 'Description Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rtin-description' => 'color: {{VALUE}}' ),
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