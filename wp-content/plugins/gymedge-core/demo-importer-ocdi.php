<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class GymEdge_Core_Demo_Importer_OCDI {

	public function __construct() {
		add_filter( 'pt-ocdi/import_files', array( $this, 'demo_config' ) );
		add_filter( 'pt-ocdi/after_import', array( $this, 'after_import' ) );
		add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_filter( 'pt-ocdi/plugin_intro_text', array($this, 'gymedge_one_click_importer_notice') );
	}

	public function demo_config() {

		$demos_array = array(
			'demo1' => array(
				'title' => __( 'Home 1 / Gym Fitness (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo2' => array(
				'title' => __( 'Home 2 / Gym Fitness (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 2', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo3' => array(
				'title' => __( 'Home 3 / Yoga (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 3', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo4' => array(
				'title' => __( 'Home 4 / Personal Trainer (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 4', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'hhttp://radiustheme.com/demo/wordpress/gymedge/home-4/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo9' => array(
				'title' => __( 'Home 5 / Gym Fitness (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 5', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo11' => array(
				'title' => __( 'Home 6 / Personal Trainer (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 6', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-6/',
                'categories'    	=> 'WPBakery Page Builder',
			),

			'demo5' => array(
				'title' => __( 'Home 1 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 1 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-1-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo6' => array(
				'title' => __( 'Home 2 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 2 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo7' => array(
				'title' => __( 'Home 3 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 3 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo8' => array(
				'title' => __( 'Home 4 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 4 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-4-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo10' => array(
				'title' => __( 'Home 5 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 5 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
			'demo12' => array(
				'title' => __( 'Home 6 Onepage (WPBakery)', 'gymedge-core' ),
				'page'  => __( 'Home 6 (Onepage)', 'gymedge-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
				'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-6-onepage/',
                'categories'    	=> 'WPBakery Page Builder',
			),
            'demo21' => array(
                'title' => __( 'Home 1 / Gym Fitness (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 1', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo22' => array(
                'title' => __( 'Home 2 / Gym Fitness (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 2', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-2/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo23' => array(
                'title' => __( 'Home 3 / Yoga (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 3', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-3/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo24' => array(
                'title' => __( 'Home 4 / Personal Trainer (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 4', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
                'preview_link' => 'hhttp://radiustheme.com/demo/wordpress/gymedge-elementor/home-4/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo25' => array(
                'title' => __( 'Home 5 / Gym Fitness (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 5', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-5/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo26' => array(
                'title' => __( 'Home 6 / Personal Trainer (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 6', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-6/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo31' => array(
                'title' => __( 'Home 1 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 1 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-1-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo32' => array(
                'title' => __( 'Home 2 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 2 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-2-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo33' => array(
                'title' => __( 'Home 3 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 3 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-3-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo34' => array(
                'title' => __( 'Home 4 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 4 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-4-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo35' => array(
                'title' => __( 'Home 5 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 5 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-5-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
            'demo36' => array(
                'title' => __( 'Home 6 Onepage (Elementor)', 'gymedge-core' ),
                'page'  => __( 'Home 6 (Onepage)', 'gymedge-core' ),
                'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
                'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-6-onepage/',
                'categories'    	=> 'Elementor Page Builder',
            ),
		);

		$config = array();
        $vc_path  = trailingslashit( get_template_directory() ) . 'sample-data/visualcomposer/';
        $elementor_path  = trailingslashit( get_template_directory() ) . 'sample-data/elementor/';
		$redux_option = 'gymedge';

		foreach ( $demos_array as $key => $demo ) {
            $path = ( $demo['categories'] == 'Elementor Page Builder' ) ? $elementor_path : $vc_path;
			$config[] = array(
				'import_file_id'               => $key,
                'categories'                   => array($demo['categories']),
				'import_page_name'             => $demo['page'],
				'import_file_name'             => $demo['title'],
				'local_import_file'            => $path . 'contents.xml',
				'local_import_widget_file'     => $path . 'widgets.wie',
				'local_import_customizer_file' => $path . 'customizer.dat',
				'local_import_redux'           => array(
					array(
						'file_path'   => $path . 'options.json',
						'option_name' => $redux_option,
					),
				),
				'import_preview_image_url'   => $demo['screenshot'],
				'preview_url'                => $demo['preview_link'],
			);
		}

		return $config;
	}

	public function after_import( $selected_import ) {
		$this->assign_menu( $selected_import['import_file_id'] );
		$this->assign_frontpage( $selected_import );
		$this->update_contact_form_email();
	}

	private function assign_menu( $demo ) {
		if ( $demo == 'demo5' or $demo == 'demo31' ) {
			$primary = get_term_by( 'name', 'Home 1 Onepage', 'nav_menu' );
		}
		elseif( $demo == 'demo6' or $demo == 'demo32' ) {
			$primary = get_term_by( 'name', 'Home 2 Onepage', 'nav_menu' );
		}
		elseif( $demo == 'demo7' or $demo == 'demo33' ) {
			$primary = get_term_by( 'name', 'Home 3 Onepage', 'nav_menu' );
		}
		elseif( $demo == 'demo8' or $demo == 'demo34' ) {
			$primary = get_term_by( 'name', 'Home 4 Onepage', 'nav_menu' );
		}
		elseif( $demo == 'demo10' or $demo == 'demo35' ) {
			$primary = get_term_by( 'name', 'Home 5 Onepage', 'nav_menu' );
		}
		elseif( $demo == 'demo12' or $demo == 'demo36' ) {
			$primary = get_term_by( 'name', 'Home 6 Onepage', 'nav_menu' );
		}
		else {
			$primary  = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		}

		$top = get_term_by( 'name', 'Top Header', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
			'primary' => $primary->term_id,
			'top'     => $top->term_id,
		));
	}

	private function assign_frontpage( $selected_import ) {
		$blog_page  = get_page_by_title( 'Blog' );
		$front_page = get_page_by_title( $selected_import['import_page_name'] );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front',  $front_page->ID );
		update_option( 'page_for_posts', $blog_page->ID );
	}

	private function update_contact_form_email() {
		$form1 = get_page_by_title( 'Contact form 1', OBJECT, 'wpcf7_contact_form' );

		$forms = array( $form1 );
		foreach ( $forms as $form ) {
			if ( !$form ) {
				continue;
			}
			$cf7id = $form->ID;
			$mail  = get_post_meta( $cf7id, '_mail', true );
			$mail['recipient'] = get_option( 'admin_email' );
			if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
				$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
				$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
				$mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
			}
			update_post_meta( $cf7id, '_mail', $mail );		
		}
	}

    public function gymedge_one_click_importer_notice( $html ) {
        $html .= '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
        $html .= __( 'Import your desired demo contents between WPBakery and Elementor page builder. Please, install and activate plugin before import demo.', 'gymedge-core');
        $html .= '</div>';
        return $html;
    }
}

new GymEdge_Core_Demo_Importer_OCDI;