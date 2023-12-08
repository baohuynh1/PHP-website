<?php
if ( !class_exists( 'Redux' ) ) {
	return;
}

$opt_name = "gymedge";

$theme = wp_get_theme();
$args  = array(
    // TYPICAL -> Change these values as you need/desire
	'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
	'disable_tracking' => true,
	'display_name' => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
	'display_version' => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
	'menu_type' => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
	'menu_title' => esc_html__( 'GymEdge Options', 'gymedge' ),
	'page_title' => esc_html__( 'GymEdge Options', 'gymedge' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
	'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar' => true,
    // Show the panel pages on the admin bar
	'admin_bar_icon' => 'dashicons-menu',
    // Choose an icon for the admin bar menu
	'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
	'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
	'dev_mode' => false,
	'forced_dev_mode_off' => false,
    // Show the time the page took to load, etc
	'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
	'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
	'menu_icon' => '',
    // Specify a custom URL to an icon
	'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
	'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
	'page_slug' => 'gymedge-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
	'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
	'default_show' => true,
    // If true, shows the default value next to each field that is not the default value.
	'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
	'transient_time' => 60 * MINUTE_IN_SECONDS,
	'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn' => true 
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

$args = apply_filters( 'rdtheme_redux_args', $args );

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'General', 'gymedge' ),
	'id' => 'general_section',
	'heading' => '',
	'icon' => 'el el-network',
	'fields' => array(
		array(
			'id' => 'primary_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Primary Color', 'gymedge' ),
			'default' => '#fb5b21' 
		),
		array(
			'id' => 'secondery_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Secondery/Hover Color', 'gymedge' ),
			'default' => '#b0360a' 
		),
		array(
			'id'       => 'preloader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Preloader', 'gymedge' ),
			'on'       => esc_html__( 'Enabled', 'gymedge' ),
			'off'      => esc_html__( 'Disabled', 'gymedge' ),
			'default'  => false,
		),
		array(
			'id'       => 'preloader_image',
			'type'     => 'media',
			'title'    => esc_html__( 'Preloader Image', 'gymedge' ),
			'subtitle' => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'gymedge' ),
			'default'  => array(
				'url'=> GYMEDGE_IMG_URL . 'preloader.gif'
			),
		),
		array(
			'id' => 'back_to_top',
			'type' => 'switch',
			'title' => esc_html__( 'Back to Top Arrow', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'class_slug',
			'type' => 'text',
			'title' => esc_html__( 'Class Slug', 'gymedge' ),
			'default' => 'class' 
		),
		array(
			'id' => 'class_cat_slug',
			'type' => 'text',
			'title' => esc_html__( 'Class Category Slug', 'gymedge' ),
			'default' => 'class_cat' 
		),
		array(
			'id' => 'trainer_slug',
			'type' => 'text',
			'title' => esc_html__( 'Trainer Slug', 'gymedge' ),
			'default' => 'trainer' 
		),
		array(
			'id' => 'trainer_cat_slug',
			'type' => 'text',
			'title' => esc_html__( 'Trainer Category Slug', 'gymedge' ),
			'default' => 'trainer_cat' 
		),
	) 
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Contact & Socials', 'gymedge' ),
	'id' => 'socials_section',
	'heading' => '',
	'desc'    => esc_html__( 'In case you want to hide any field, just keep that field empty', 'gymedge' ),
	'icon' => 'el el-twitter',
	'fields' => array(
		array(
			'id' => 'top_phone',
			'type' => 'text',
			'title' => esc_html__( 'Phone', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'top_email',
			'type' => 'text',
			'title' => esc_html__( 'Email', 'gymedge' ),
			'validate' => 'email' ,
			'default' => ''
		),
		array(
			'id' => 'social_facebook',
			'type' => 'text',
			'title' => esc_html__( 'Facebook', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_twitter',
			'type' => 'text',
			'title' => esc_html__( 'Twitter', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_gplus',
			'type' => 'text',
			'title' => esc_html__( 'Google Plus', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_linkedin',
			'type' => 'text',
			'title' => esc_html__( 'Linkedin', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_youtube',
			'type' => 'text',
			'title' => esc_html__( 'Youtube', 'gymedge' ),
			'default' => '' 
		),
		array(
			'id' => 'social_pinterest',
			'type' => 'text',
			'title' => esc_html__( 'Pinterest', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_instagram',
			'type' => 'text',
			'title' => esc_html__( 'Instagram', 'gymedge' ),
			'default' => ''
		),
		array(
			'id' => 'social_skype',
			'type' => 'text',
			'title' => esc_html__( 'Skype', 'gymedge' ),
			'default' => ''
		)
	) 
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Header', 'gymedge' ),
	'id' => 'header_section',
	'heading' => '',
	'icon' => 'el el-caret-up',
	'fields' => array(
		array(
			'id' => 'logo',
			'type' => 'media',
			'title' => esc_html__( 'Main Logo (Dark)', 'gymedge' ),
			'default' => array(
				'url' => GYMEDGE_IMG_URL . 'logo.png' 
			) 
		),
		array(
			'id' => 'logo_light',
			'type' => 'media',
			'title' => esc_html__( 'Light Logo', 'gymedge' ),
			'default' => array(
				'url' => GYMEDGE_IMG_URL . 'logo2.png' 
			),
			'subtitle' => esc_html__( 'Mainly used in 2nd Header Style', 'gymedge' ) 
		),
		array(
			'id' => 'logo_width',
			'type' => 'select',
			'title' => esc_html__( 'Logo Area Width', 'gymedge' ),
			'subtitle' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, navigation menu width will be decreased with the increase of logo width', 'gymedge' ),
			'options' => array(
				'1' => esc_html__( '1 Column', 'gymedge' ),
				'2' => esc_html__( '2 Column', 'gymedge' ),
				'3' => esc_html__( '3 Column', 'gymedge' ),
				'4' => esc_html__( '4 Column', 'gymedge' ) 
			),
			'default' => '2' 
		),
		array(
			'id' => 'logo_fixed_height',
			'type' => 'switch',
			'title' => esc_html__( 'Fixed Height Logo', 'gymedge' ),
			'subtitle' => esc_html__( "Disable only if you want to display the same logo size you uploaded. If you are going to disable it, it's recommended that you upload a logo which height is less than 60px", 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'logo_fixed_height_sticky',
			'type' => 'switch',
			'title' => esc_html__( 'Fixed Height Logo (in sticky menu)', 'gymedge' ),
			'subtitle' => esc_html__( "Disable only if you want to display the same logo size you uploaded. If you are going to disable it, it's recommended that you upload a logo which height is less than 60px", 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'search_icon',
			'type' => 'switch',
			'title' => esc_html__( 'Search Icon', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'cart_icon',
			'type' => 'switch',
			'title' => esc_html__( 'Cart Icon', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'section-topbar',
			'type' => 'section',
			'title' => esc_html__( 'Top Bar Section', 'gymedge' ),
			'indent' => true,
			'subtitle' => esc_html__( 'If you want to hide any field simply keep it empty', 'gymedge' ) 
		),
		array(
			'id' => 'top_bar',
			'type' => 'switch',
			'title' => esc_html__( 'Display on Top', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => false 
		),
		array(
			'id' => 'top_bar_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Background Color', 'gymedge' ),
			'default' => '#222222' 
		),
		array(
			'id' => 'top_bar_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Text Color', 'gymedge' ),
			'default' => '#ffffff' 
		)
	) 
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Main Menu', 'gymedge' ),
	'id' => 'menu_section',
	'heading' => '',
	'icon' => 'el el-book',
	'fields' => array(
		array(
			'id' => 'sticky_menu',
			'type' => 'switch',
			'title' => esc_html__( 'Sticky Menu', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		),
        array(
            'id' => 'onepage_nav_menu',
            'type' => 'switch',
            'title' => esc_html__( 'Onepage Navigation', 'gymedge' ),
            'on' => esc_html__( 'On', 'gymedge' ),
            'off' => esc_html__( 'Off', 'gymedge' ),
            'default' => true
        ),
		array(
			'id' => 'menu_typo',
			'type' => 'typography',
			'title' => esc_html__( 'Menu Font', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Open Sans',
				'google' => true,
				'font-size' => '15px',
				'font-weight' => '600',
				'line-height' => '21px' 
			) 
		),
		array(
			'id' => 'menu_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Menu Color', 'gymedge' ),
			'default' => '#333333' 
		),
		array(
			'id' => 'menu_hover_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Menu Hover Color', 'gymedge' ),
			'default' => '#fb5b21' 
		),
		array(
			'id' => 'submenu_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Submenu Color', 'gymedge' ),
			'default' => '#ffffff' 
		),
		array(
			'id' => 'submenu_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Submenu Background Color', 'gymedge' ),
			'default' => '#fb5b21' 
		),
		array(
			'id' => 'submenu_hover_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Submenu Hover Background Color', 'gymedge' ),
			'default' => '#b0360a' 
		),
        array(
            'id'       => 'resmenu_width',
            'type'     => 'slider',
            'title'    => esc_html__( 'Screen width in which mobile menu activated', 'gymedge' ),
            'subtitle' => esc_html__( 'Recommended value is: 992', 'gymedge' ),
            'default'  => 992,
            'min'      => 0,
            'step'     => 1,
            'max'      => 2000,
        ),

		array(
			'id' => 'stikcy_menu_colors_sec',
			'type' => 'section',
			'title' => esc_html__( 'Sticky Menu Colors', 'gymedge' ),
			'indent' => true 
		),
		array(
			'id'     => 'stikcy_menu_color_set',
			'type'   => 'button_set',
			'title'  => esc_html__( 'Color Set', 'gymedge' ),
            'options'  => array(
                'default' => esc_html__( 'Default', 'gymedge' ),
                'custom'  => esc_html__( 'Custom', 'gymedge' ),
            ),
            'default'  => 'default'
		),
		array(
			'id' => 'stikcy_menu_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Background Color', 'gymedge' ),
			'default' => '#ffffff',
			'required' => array( 'stikcy_menu_color_set', 'equals', 'custom' ) 
		),
		array(
			'id' => 'stikcy_menu_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Menu Color', 'gymedge' ),
			'default' => '#333333',
			'required' => array( 'stikcy_menu_color_set', 'equals', 'custom' ) 
		),
		array(
			'id' => 'stikcy_menu_hover_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Menu Hover Color', 'gymedge' ),
			'default' => '#fb5b21',
			'required' => array( 'stikcy_menu_color_set', 'equals', 'custom' ) 
		),
	) 
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Footer', 'gymedge' ),
	'id' => 'footer_section',
	'heading' => '',
	'icon' => 'el el-caret-down',
	'fields' => array(
		array(
			'id' => 'footer_style',
			'type' => 'button_set',
			'title' => esc_html__( 'Layout', 'gymedge' ),
			'options' => array(
				'style1' => esc_html__( 'Style 1', 'gymedge' ),
				'style2' => esc_html__( 'Style 2', 'gymedge' ) 
			),
			'default' => 'style1'
		),
		array(
			'id' => 'footer_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Footer Background Color', 'gymedge' ),
			'default' => '#121212',
			'required' => array(
				'footer_style',
				'equals',
				'style1' 
			) 
		),
		array(
			'id' => 'footer_title_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Footer Title Text Color', 'gymedge' ),
			'default' => '#ffffff',
			'required' => array(
				'footer_style',
				'equals',
				'style1' 
			) 
		),
		array(
			'id' => 'footer_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Footer Body Text Color', 'gymedge' ),
			'default' => '#b3b3b3',
			'required' => array(
				'footer_style',
				'equals',
				'style1' 
			) 
		),
		array(
			'id' => 'footer2_bgtype',
			'type' => 'button_set',
			'title' => esc_html__( 'Footer Background Type', 'gymedge' ),
			'options' => array(
				'bgcolor' => esc_html__( 'Background Color', 'gymedge' ),
				'bgimg' => esc_html__( 'Background Image', 'gymedge' ),
			),
			'default' => 'bgcolor',
			'required' => array(
				'footer_style',
				'equals',
				'style2'
			) 
		),
		array(
			'id' => 'footer2_bgcolor',
			'type' => 'color',
			'title' => esc_html__( 'Background Color', 'gymedge' ),
			'validate' => 'color',
			'transparent' => false,
			'default' => '#161616',
			'required' => array(
				'footer2_bgtype',
				'equals',
				'bgcolor' 
			) 
		),
		array(
			'id' => 'footer2_bgimg',
			'type' => 'media',
			'title' => esc_html__( 'Background Image', 'gymedge' ),
			'required' => array(
				'footer2_bgtype',
				'equals',
				'bgimg' 
			) 
		),
		array(
			'id' => 'footer2_logo',
			'type' => 'media',
			'title' => esc_html__( 'Footer Logo', 'gymedge' ),
			'required' => array(
				'footer_style',
				'equals',
				'style2'
			) 
		),
		array(
			'id' => 'footer2_content',
			'type' => 'textarea',
			'title' => esc_html__( 'Content', 'gymedge' ),
			'default' => '',
			'required' => array(
				'footer_style',
				'equals',
				'style2' 
			)
		),
		array(
			'id' => 'copyright_text',
			'type' => 'textarea',
			'title' => esc_html__( 'Copyright Text', 'gymedge' ),
			'default' => '&copy; Copyright GymEdge 2019. All Right Reserved. Designed and Developed by <a target="_blank" href="' . GYMEDGE_THEME_AUTHOR_URI . '">RadiusTheme</a>' 
		),
		array(
			'id' => 'copyright_color',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Copyright Text Color', 'gymedge' ),
			'default' => '#ffffff',
		),
		array(
			'id' => 'copyright_bgcolor',
			'type' => 'color',
			'transparent' => false,
			'title' => esc_html__( 'Copyright Background Color', 'gymedge' ),
			'default' => '#000000',
		),
	) 
) );

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Typography', 'gymedge' ),
	'id' => 'typo_section',
	'icon' => 'el el-text-width',
	'fields' => array(
		array(
			'id' => 'typo_body',
			'type' => 'typography',
			'title' => esc_html__( 'Body', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Open Sans',
				'google' => true,
				'font-size' => '15px',
				'line-height' => '26px' 
			) 
		),
		array(
			'id' => 'typo_h1',
			'type' => 'typography',
			'title' => esc_html__( 'Header h1', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '40px',
				'line-height' => '44px' 
			) 
		),
		array(
			'id' => 'typo_h2',
			'type' => 'typography',
			'title' => esc_html__( 'Header h2', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '28px',
				'line-height' => '31px' 
			) 
		),
		array(
			'id' => 'typo_h3',
			'type' => 'typography',
			'title' => esc_html__( 'Header h3', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '20px',
				'line-height' => '26px' 
			) 
		),
		array(
			'id' => 'typo_h4',
			'type' => 'typography',
			'title' => esc_html__( 'Header h4', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '16px',
				'line-height' => '18px' 
			) 
		),
		array(
			'id' => 'typo_h5',
			'type' => 'typography',
			'title' => esc_html__( 'Header h5', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '14px',
				'line-height' => '16px' 
			) 
		),
		array(
			'id' => 'typo_h6',
			'type' => 'typography',
			'title' => esc_html__( 'Header h6', 'gymedge' ),
			'google' => true,
			'subsets' => false,
			'text-align' => false,
			'font-style' => false,
			'font-weight' => false,
			'color' => false,
			'default' => array(
				'font-family' => 'Roboto',
				'google' => true,
				'font-size' => '12px',
				'line-height' => '14px' 
			) 
		) 
	) 
) );

// Generate Common post type fields
function gym_redux_post_type_fields( $prefix )
{
	return array(
		array(
			'id' => $prefix . '_layout',
			'type' => 'button_set',
			'title' => esc_html__( 'Layout', 'gymedge' ),
			'options' => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gymedge' ),
				'full-width' => esc_html__( 'Full Width', 'gymedge' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gymedge' ) 
			),
			'default' => 'right-sidebar' 
		),
		array(
			'id' => $prefix . '_header',
			'type' => 'image_select',
			'title' => esc_html__( 'Header Style', 'gymedge' ),
			'default' => 'st1',
			'options' => array(
				'st1' => array(
					'title' => '<b>' . esc_html__( 'Style 1', 'gymedge' ) . '</b>',
					'img' => GYMEDGE_IMG_URL . 'header1.jpg' 
				),
				'st2' => array(
					'title' => '<b>' . esc_html__( 'Style 2', 'gymedge' ) . '</b>',
					'img' => GYMEDGE_IMG_URL . 'header2.jpg' 
				),
				'st3' => array(
					'title' => '<b>' . esc_html__( 'Style 3', 'gymedge' ) . '</b>',
					'img' => GYMEDGE_IMG_URL . 'header3.jpg' 
				) 
			) 
		),
		array(
			'id' => $prefix . '_padding_top',
			'type' => 'text',
			'title' => esc_html__( 'Content Padding Top', 'gymedge' ),
			'validate' => 'numeric',
			'default' => '80' 
		),
		array(
			'id' => $prefix . '_padding_bottom',
			'type' => 'text',
			'title' => esc_html__( 'Content Padding Bottom', 'gymedge' ),
			'validate' => 'numeric',
			'default' => '80' 
		),
		array(
			'id' => $prefix . '_banner',
			'type' => 'switch',
			'title' => esc_html__( 'Banner', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => $prefix . '_breadcrumb',
			'type' => 'switch',
			'title' => esc_html__( 'Breadcrumb', 'gymedge' ),
			'on' => esc_html__( 'Enabled', 'gymedge' ),
			'off' => esc_html__( 'Disabled', 'gymedge' ),
			'default' => true,
			'required' => array(
				$prefix . '_banner',
				'equals',
				true 
			) 
		),
		array(
			'id' => $prefix . '_bgtype',
			'type' => 'button_set',
			'title' => esc_html__( 'Banner Background Type', 'gymedge' ),
			'options' => array(
				'bgimg' => esc_html__( 'Background Image', 'gymedge' ),
				'bgcolor' => esc_html__( 'Background Color', 'gymedge' ) 
			),
			'default' => 'bgimg',
			'required' => array(
				$prefix . '_banner',
				'equals',
				true 
			) 
		),
		array(
			'id' => $prefix . '_bgimg',
			'type' => 'media',
			'title' => esc_html__( 'Banner Background Image', 'gymedge' ),
			'required' => array(
				$prefix . '_bgtype',
				'equals',
				'bgimg' 
			) 
		),
		array(
			'id' => $prefix . '_bgcolor',
			'type' => 'color',
			'title' => esc_html__( 'Banner Background Color', 'gymedge' ),
			'validate' => 'color',
			'transparent' => false,
			'default' => '#606060',
			'required' => array(
				$prefix . '_bgtype',
				'equals',
				'bgcolor' 
			) 
		) 
	);
}

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Layout Defaults', 'gymedge' ),
	'id' => 'layout_defaults',
	'icon' => 'el el-th' 
) );

// Page
$gym_page_fields                   = gym_redux_post_type_fields( 'page' );
$gym_page_fields[ 0 ][ 'default' ] = 'full-width';
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Page', 'gymedge' ),
	'id' => 'pages_section',
	'subsection' => true,
	'fields' => $gym_page_fields 
) );


//Post Archive
$gym_post_archive_fields = gym_redux_post_type_fields( 'blog' );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Blog / Archive', 'gymedge' ),
	'id' => 'blog_section',
	'subsection' => true,
	'fields' => $gym_post_archive_fields 
) );


// Single Post
$gym_single_post_fields = gym_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Post Single', 'gymedge' ),
	'id' => 'single_post_section',
	'subsection' => true,
	'fields' => $gym_single_post_fields 
) );


// Trainer Single
$gym_fields2                   = gym_redux_post_type_fields( 'trainer' );
$gym_fields2[ 0 ][ 'default' ] = 'full-width';
$gym_trainer_fields            = $gym_fields2;

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Trainer Single', 'gymedge' ),
	'id' => 'trainer_section',
	'subsection' => true,
	'fields' => $gym_trainer_fields 
) );


// Class Single
$gym_fields1        = array(
	array(
		'id' => 'class_time_format',
		'type' => 'radio',
		'title' => esc_html__( 'Schedule Time Format', 'gymedge' ),
		'options' => array(
			'12' => esc_html__( '12-hour', 'gymedge' ),
			'24' => esc_html__( '24-hour', 'gymedge' ) 
		),
		'default' => '12' 
	) 
);
$gym_fields2        = gym_redux_post_type_fields( 'class' );
$gym_service_fields = array_merge( $gym_fields1, $gym_fields2 );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Class Single', 'gymedge' ),
	'id' => 'class_section',
	'subsection' => true,
	'fields' => $gym_service_fields 
) );

// Search
$gym_search_fields = gym_redux_post_type_fields( 'search' );
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Search Layout', 'gymedge' ),
	'id' => 'search_section',
	'heading' => '',
	'subsection' => true,
	'fields' => $gym_search_fields 
) );

// Error 404 Layout
$gym_search_fields                   = gym_redux_post_type_fields( 'error' );
$gym_search_fields[ 0 ][ 'default' ] = 'full-width';
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Error 404 Layout', 'gymedge' ),
	'id' => 'error_section',
	'heading' => '',
	'subsection' => true,
	'fields' => $gym_search_fields 
) );

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Shop Archive
	$gym_shop_archive_fields = gym_redux_post_type_fields( 'shop' );
	Redux::setSection( $opt_name, array(
		'title' => esc_html__( 'Shop Archive', 'gymedge' ),
		'id' => 'shop_section',
		'subsection' => true,
		'fields' => $gym_shop_archive_fields 
	) );

    // Woocommerce Product
	$gym_product_fields = gym_redux_post_type_fields( 'product' );
	$gym_product_fields[ 0 ][ 'default' ] = 'full-width';
	Redux::setSection( $opt_name, array(
		'title' => esc_html__( 'Product Single', 'gymedge' ),
		'id' => 'product_section',
		'subsection' => true,
		'fields' => $gym_product_fields 
	) );
}

// Error
$gym_fields2 = array(
	array(
		'id' => 'error_title',
		'type' => 'text',
		'title' => esc_html__( 'Page Title', 'gymedge' ),
		'default' => esc_html__( 'Error 404', 'gymedge' ) 
	),
	array(
		'id' => 'error_bodybg',
		'type' => 'media',
		'title' => esc_html__( 'Body Background Image', 'gymedge' ),
		'default' => array(
			'url' => GYMEDGE_IMG_URL . 'error.jpg' 
		) 
	),
	array(
		'id' => 'error_text1',
		'type' => 'text',
		'title' => esc_html__( 'Body Text 1', 'gymedge' ),
		'default' => esc_html__( '404', 'gymedge' ) 
	),
	array(
		'id' => 'error_text2',
		'type' => 'text',
		'title' => esc_html__( 'Body Text 2', 'gymedge' ),
		'default' => esc_html__( 'Page not Found', 'gymedge' ) 
	),
	array(
		'id' => 'error_text3',
		'type' => 'text',
		'title' => esc_html__( 'Body Text 3', 'gymedge' ),
		'default' => esc_html__( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'gymedge' ) 
	),
	array(
		'id' => 'error_text12_color',
		'type' => 'color',
		'transparent' => false,
		'title' => esc_html__( 'Body Text 1,2 Color', 'gymedge' ),
		'default' => '#ffffff' 
	),
	array(
		'id' => 'error_buttontext',
		'type' => 'text',
		'title' => esc_html__( 'Button Text', 'gymedge' ),
		'default' => esc_html__( 'Go to Home Page', 'gymedge' ) 
	) 
);
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Error Page Settings', 'gymedge' ),
	'id' => 'error_srttings_section',
	'heading' => '',
	'icon' => 'el el-error-alt',
	'fields' => $gym_fields2 
) );

// Post Settings
Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Post Settings', 'gymedge' ),
	'id' => 'post_settings_section',
	'icon' => 'el el-file-edit',
	'heading' => '',
	'fields' => array(
		array(
			'id' => 'post_date',
			'type' => 'switch',
			'title' => esc_html__( 'Show Post Date', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'post_author_name',
			'type' => 'switch',
			'title' => esc_html__( 'Show Author Name', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'post_cats',
			'type' => 'switch',
			'title' => esc_html__( 'Show Categories', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'post_comment_num',
			'type' => 'switch',
			'title' => esc_html__( 'Show Comment Number', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		),
		array(
			'id' => 'post_tags',
			'type' => 'switch',
			'title' => esc_html__( 'Show Tags', 'gymedge' ),
			'on' => esc_html__( 'On', 'gymedge' ),
			'off' => esc_html__( 'Off', 'gymedge' ),
			'default' => true 
		) 
	) 
) );

do_action('rt_after_redux_options_loaded', 'gymedge');

if ( class_exists( 'WooCommerce' ) ) {
    // Woocommerce Settings
	Redux::setSection( $opt_name, array(
		'title' => esc_html__( 'WooCommerce', 'gymedge' ),
		'id' => 'woo_Settings_section',
		'heading' => '',
		'icon' => 'el el-shopping-cart',
		'fields' => array(
			array(
				'id' => 'wc_sec_general',
				'type' => 'section',
				'title' => esc_html__( 'General', 'gymedge' ),
				'indent' => true 
			),
			array(
				'id' => 'wc_num_product',
				'type' => 'text',
				'title' => esc_html__( 'Number of Products Per Page', 'gymedge' ),
				'default' => '9' 
			),
			array(
				'id' => 'wc_product_hover',
				'type' => 'switch',
				'title' => esc_html__( 'Product Hover Effect', 'gymedge' ),
				'on' => esc_html__( 'Enabled', 'gymedge' ),
				'off' => esc_html__( 'Disabled', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_wishlist_icon',
				'type' => 'switch',
				'title' => esc_html__( 'Product Add to Wishlist Icon', 'gymedge' ),
				'on' => esc_html__( 'Enabled', 'gymedge' ),
				'off' => esc_html__( 'Disabled', 'gymedge' ),
				'default' => true,
				'required' => array(
					'wc_product_hover',
					'equals',
					true 
				) 
			),
			array(
				'id' => 'wc_quickview_icon',
				'type' => 'switch',
				'title' => esc_html__( 'Product Quickview Icon', 'gymedge' ),
				'on' => esc_html__( 'Enabled', 'gymedge' ),
				'off' => esc_html__( 'Disabled', 'gymedge' ),
				'default' => true,
				'required' => array(
					'wc_product_hover',
					'equals',
					true 
				) 
			),
			array(
				'id' => 'wc_sec_product',
				'type' => 'section',
				'title' => esc_html__( 'Product Single Page', 'gymedge' ),
				'indent' => true 
			),
			array(
				'id' => 'wc_show_excerpt',
				'type' => 'switch',
				'title' => esc_html__( "Show excerpt when short description doesn't exist", 'gymedge' ),
				'on' => esc_html__( 'Enabled', 'gymedge' ),
				'off' => esc_html__( 'Disabled', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_related',
				'type' => 'switch',
				'title' => esc_html__( 'Related Products', 'gymedge' ),
				'on' => esc_html__( 'Show', 'gymedge' ),
				'off' => esc_html__( 'Hide', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_description',
				'type' => 'switch',
				'title' => esc_html__( 'Description Tab', 'gymedge' ),
				'on' => esc_html__( 'Show', 'gymedge' ),
				'off' => esc_html__( 'Hide', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_reviews',
				'type' => 'switch',
				'title' => esc_html__( 'Reviews Tab', 'gymedge' ),
				'on' => esc_html__( 'Show', 'gymedge' ),
				'off' => esc_html__( 'Hide', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_additional_info',
				'type' => 'switch',
				'title' => esc_html__( 'Additional Information Tab', 'gymedge' ),
				'on' => esc_html__( 'Show', 'gymedge' ),
				'off' => esc_html__( 'Hide', 'gymedge' ),
				'default' => true 
			),
			array(
				'id' => 'wc_sec_cart',
				'type' => 'section',
				'title' => esc_html__( 'Cart Page', 'gymedge' ),
				'indent' => true 
			),
			array(
				'id' => 'wc_cross_sell',
				'type' => 'switch',
				'title' => esc_html__( 'Cross Sell Products', 'gymedge' ),
				'on' => esc_html__( 'Show', 'gymedge' ),
				'off' => esc_html__( 'Hide', 'gymedge' ),
				'default' => true 
			) 
		) 
	) );
}

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Advanced', 'gymedge' ),
	'id' => 'advanced_section',
	'heading' => '',
	'icon' => 'el el-css',
	'fields' => array(
		array(
			'id' => 'custom_css',
			'type' => 'ace_editor',
			'title' => esc_html__( 'Custom CSS', 'gymedge' ),
			'subtitle' => esc_html__( 'Paste your CSS code here.', 'gymedge' ),
			'mode' => 'css',
			'theme' => 'chrome',
			'default' => "body{\n   margin: 0 auto;\n}",
			'options' => array(
				'minLines' => 30 
			) 
		) 
	) 
) );

// -> END Fields