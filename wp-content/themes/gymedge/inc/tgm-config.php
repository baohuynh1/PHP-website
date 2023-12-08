<?php

add_action( 'tgmpa_register', 'gymedge_register_required_plugins' );
if ( ! function_exists( 'gymedge_register_required_plugins' ) ) {
	function gymedge_register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'         => 'GymEdge Core',
				'slug'         => 'gymedge-core',
				'source'       => 'gymedge-core.zip',
				'required'     => true,
				'external_url' => 'http://radiustheme.com',
				'version'      => '3.3.4',
			],
			[
				'name'         => 'RT Demo Importer',
				'slug'         => 'rt-demo-importer',
				'source'       => 'rt-demo-importer.zip',
				'required'     => true,
				'external_url' => 'http://radiustheme.com',
				'version'      => '4.3.1',
			],
			[
				'name'         => 'WPBakery Page Builder',
				'slug'         => 'js_composer',
				'source'       => 'js_composer.zip',
				'required'     => false,
				'external_url' => 'http://vc.wpbakery.com',
				'version'      => '6.10.0',
			],
			[
				'name'         => 'LayerSlider WP',
				'slug'         => 'LayerSlider',
				'source'       => 'LayerSlider.zip',
				'required'     => false,
				'external_url' => 'https://layerslider.kreaturamedia.com',
				'version'      => '7.6.7',
			],
			[
				'name'         => 'WP Logo Showcase',
				'slug'         => 'wp-logo-showcase',
				'source'       => 'wp-logo-showcase.zip',
				'required'     => false,
				'external_url' => 'https://radiustheme.com/',
				'version'      => '2.5.6',
			],

			[
				'name'         => 'Review Schema Pro',
				'slug'         => 'review-schema-pro',
				'source'       => 'review-schema-pro.zip',
				'required'     => false,
				'version'      => '1.1.2',
				'external_url' => 'http://radiustheme.com',
			],

			// Repository
			[
				'name'     => 'Easy Twitter Feed Widget',
				'slug'     => 'easy-twitter-feed-widget',
				'required' => false,
			],
			[
				'name'     => 'Redux Framework',
				'slug'     => 'redux-framework',
				'required' => true,
			],
			[
				'name'     => 'Contact Form 7',
				'slug'     => 'contact-form-7',
				'required' => false,
			],
			[
				'name'     => 'Meks Simple Flickr Widget',
				'slug'     => 'meks-simple-flickr-widget',
				'required' => false,
			],
			[
				'name'     => 'Elementor Page Builder',
				'slug'     => 'elementor',
				'required' => false,
			],
			[
				'name'     => 'WP Retina 2x',
				'slug'     => 'wp-retina-2x',
				'required' => false,
			],
			[
				'name'     => 'WooCommerce',
				'slug'     => 'woocommerce',
				'required' => false,
			],
			[
				'name'     => 'YITH WooCommerce Quick View',
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false,
			],
			[
				'name'     => 'YITH WooCommerce Wishlist',
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			],
			[
				'name'     => 'Review Schema',
				'slug'     => 'review-schema',
				'required' => false,
			],

		];

		$config = [
			'id'           => 'gymedge',             // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => GYMEDGE_PLUGINS_DIR,   // Default absolute path to bundled plugins.
			'menu'         => 'gymedge-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		];

		tgmpa( $plugins, $config );
	}
}