<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace RadiusTheme\GymEdge\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class About_Fitness extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'About Fitness', 'gymedge-core' );
		$this->rt_base = 'rt-about-fitness';
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
                'id'      => 'image',
                'type'    => Controls_Manager::MEDIA,
                'label'   => __( 'Image', 'gymedge-core' ),
                'description' => __( 'Recommended image size is 542x429 px.', 'gymedge-core' ),
            ),
			array(
                'id'      => 'content',
				'type'    => Controls_Manager::WYSIWYG,
				'label'   => __( 'Title', 'gymedge-core' ),
				'default' => 'All <span style="font-weight: 600;">About</span><br/>Fitness',
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
                'selector' => '{{WRAPPER}} .rt-fitness-wrap .rt-fitness p',
            ),
            array(
                'mode'     => 'group',
                'type'     => \Elementor\Group_Control_Typography::get_type(),
                'id'       => 'highlight_typo',
                'label'    => __( 'Highlight', 'gymedge-core' ),
                'selector' => '{{WRAPPER}} .rt-fitness-wrap .rt-fitness p span',
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
				'selectors' => array( '{{WRAPPER}} .rt-fitness-wrap .rt-fitness' => 'color: {{VALUE}}' ),
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_highlight_color',
                'label'   => __( 'Highlight Color', 'gymedge-core' ),
                'selectors' => array( '{{WRAPPER}} .rt-fitness-wrap .rt-fitness span' => 'color: {{VALUE}}' ),
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