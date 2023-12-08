<?php
add_action( 'after_setup_theme', 'gymedge_core_load_demo_importer', 20 );
function gymedge_core_load_demo_importer(){
	add_filter( 'plugin_action_links_rt-demo-importer/rt-demo-importer.php', 'gymedge_importer_add_action_links' );
	add_filter( 'rt_demo_installer_warning', 'gymedge_core_importer_warning' );
	add_filter( 'fw:ext:backups-demo:demos', 'gymedge_importer_backups_demos' );
	add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', 'gymedge_importer_after_demo_install' );
	//add_filter( 'fw:ext:backups:add-restore-task:image-sizes-restore', '__return_false' ); // Enable it to skip image restore step
}

function gymedge_importer_add_action_links( $links ) {
	$mylinks = array(
		'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'gymedge-core' ).'</a>',
	);
	return array_merge( $links, $mylinks );
}

function gymedge_core_importer_warning( $links ) {
	$html  = '<div style="color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
	$html .= sprintf( __( 'Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website. For existing website please use XML data import method which is described in the documentation <a %s>here</a>', 'gymedge-core'), 'href="https://radiustheme.com/demo/wordpress/gymedge/docs/#demo" target="_blank" style="color:red;"' );
	$html .= '</div>';
    $html .= '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
    $html .= __( 'Import your desired demo contents between WPBakery and Elementor page builder. Please, install and activate plugin before import demo.', 'gymedge-core');
    $html .= '</div>';
	return $html;
}

function gymedge_importer_backups_demos( $demos ) {
	$demos_array = array(
		'demo1' => array(
			'title' => __( 'Home 1 / Gym Fitness (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/',
		),
		'demo2' => array(
			'title' => __( 'Home 2 / Gym Fitness (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2/',
		),
		'demo3' => array(
			'title' => __( 'Home 3 / Yoga (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3/',
		),
		'demo4' => array(
			'title' => __( 'Home 4 / Personal Trainer (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-4/',
		),
		'demo9' => array(
			'title' => __( 'Home 5 / Gym Fitness (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5/',
		),
		'demo11' => array(
			'title' => __( 'Home 6 / Personal Trainer (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-6/',
		),
		'demo5' => array(
			'title' => __( 'Home 1 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-1-onepage/',
		),
		'demo6' => array(
			'title' => __( 'Home 2 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-2-onepage/',
		),
		'demo7' => array(
			'title' => __( 'Home 3 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-3-onepage/',
		),
		'demo8' => array(
			'title' => __( 'Home 4 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-4-onepage/',
		),
		'demo10' => array(
			'title' => __( 'Home 5 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-5-onepage/',
		),
		'demo12' => array(
			'title' => __( 'Home 6 Onepage (WPBakery)', 'gymedge-core' ),
			'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
			'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge/home-6-onepage/',
		),
        'elementor1' => array(
            'title' => __( 'Home 1 / Gym Fitness (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/',
        ),
        'elementor2' => array(
            'title' => __( 'Home 2 / Gym Fitness (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-2/',
        ),
        'elementor3' => array(
            'title' => __( 'Home 3 / Yoga (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-3/',
        ),
        'elementor4' => array(
            'title' => __( 'Home 4 / Personal Trainer (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-4/',
        ),
        'elementor5' => array(
            'title' => __( 'Home 5 / Gym Fitness (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot9.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-5/',
        ),
        'elementor6' => array(
            'title' => __( 'Home 6 / Personal Trainer (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-6/',
        ),
        'elementor7' => array(
            'title' => __( 'Home 1 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-1-onepage/',
        ),
        'elementor8' => array(
            'title' => __( 'Home 2 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot6.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-2-onepage/',
        ),
        'elementor9' => array(
            'title' => __( 'Home 3 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot7.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-3-onepage/',
        ),
        'elementor10' => array(
            'title' => __( 'Home 4 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot8.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-4-onepage/',
        ),
        'elementor11' => array(
            'title' => __( 'Home 5 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot10.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-5-onepage/',
        ),
        'elementor12' => array(
            'title' => __( 'Home 6 Onepage (Elementor)', 'gymedge-core' ),
            'screenshot' => plugins_url( 'screenshots/screenshot11.jpg', __FILE__ ),
            'preview_link' => 'http://radiustheme.com/demo/wordpress/gymedge-elementor/home-6-onepage/',
        ),
	);

	$download_url = 'http://demo.radiustheme.com/wordpress/demo-content/gymedge/';

	foreach ($demos_array as $id => $data) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title($data['title']);
		$demo->set_screenshot($data['screenshot']);
		$demo->set_preview_link($data['preview_link']);

		$demos[ $demo->get_id() ] = $demo;

		unset($demo);
	}

	return $demos;
}

// Run after demo install
function gymedge_importer_after_demo_install( $collection ){
	// Update front page id
	$demos = array(
		'demo1'  => 1873,
		'demo2'  => 1857,
		'demo3'  => 12,
		'demo4'  => 1997,
		'demo5'  => 2182,
		'demo6'  => 2287,
		'demo7'  => 2329,
		'demo8'  => 2330,
		'demo9'  => 2476,
		'demo10' => 2601,
		'demo11' => 2765,
		'demo12' => 2767,
		'elementor1' => 2853,
		'elementor2' => 2928,
		'elementor3' => 2930,
		'elementor4' => 3000,
		'elementor5' => 3005,
		'elementor6' => 3041,
		'elementor7' => 3160,
		'elementor8' => 3577,
		'elementor9' => 3171,
		'elementor10' => 3573,
		'elementor11' => 3568,
		'elementor12' => 3562,
	);

	$data = $collection->to_array();

	foreach( $data['tasks'] as $task ) {
		if( $task['id'] == 'demo:demo-download' ){
			$demo_id = $task['args']['demo_id'];
			$page_id = $demos[$demo_id];

			// Set front page
			update_option( 'page_on_front', $page_id );
			flush_rewrite_rules();

			// Set footer style
			if ( $demo_id == 'demo11' || $demo_id == 'demo12' || $demo_id == 'elementor6' || $demo_id == 'elementor12' ) {
				$options = get_option( 'gymedge' );
				$options['footer_style'] = 'style2';
				update_option( 'gymedge', $options );
			}
			break;
		}
	}

	// Update contact form 7 email
	$cf7id = 1929;
	$mail = get_post_meta( $cf7id, '_mail', true );
	$mail['recipient'] = get_option( 'admin_email' );
	if ( class_exists( 'WPCF7_ContactFormTemplate' ) ) {
		$pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
		$replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
		$mail['sender'] = preg_replace( $pattern, $replacement, $mail['sender'] );
	}
	update_post_meta( $cf7id, '_mail', $mail );

	// Update WooCommerce emails
	$admin_email = get_option( 'admin_email' );
	update_option( 'woocommerce_email_from_address', $admin_email );
	update_option( 'woocommerce_stock_email_recipient', $admin_email );

	// Update post author id
	global $wpdb;
	$id = get_current_user_id();
	if ( $id && $id != 1 ) {
		$query = "UPDATE $wpdb->posts SET post_author = $id";
		$wpdb->query($query);		
	}
}