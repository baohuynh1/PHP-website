<?php
// Search form template
add_filter( 'get_search_form', 'gymedge_search_form' );
if ( !function_exists( 'gymedge_search_form' ) ) {
	function gymedge_search_form(){
		$output =  '
		<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="custom-search-input">
				<div class="input-group">
				    <input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search here ...', 'gymedge' ) . '" value="' . get_search_query() . '" name="s" />
					<span class="input-group-prepend">
						<button class="btn btn-danger" type="submit">
							<span class="fa fa-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
		';
		return $output;
	}
}

// Register Sidebars
add_action( 'widgets_init', 'gymedge_widgets_init' );
if ( !function_exists( 'gymedge_widgets_init' ) ) {
	function gymedge_widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'gymedge' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s single-sidebar padding-bottom1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'gymedge' ),
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );
	}
}

// Footer Widget Count
add_action( 'init', 'gymedge_set_footer_widget_count' );
if ( !function_exists( 'gymedge_set_footer_widget_count' ) ) {
	function gymedge_set_footer_widget_count(){
		global $wp_registered_widgets;

		$sidebars_widgets = wp_get_sidebars_widgets();
		$sidebars_widgets = isset( $sidebars_widgets['footer'] ) ? $sidebars_widgets['footer'] : array();

		// In case of WPML
		if ( defined( 'ICL_LANGUAGE_CODE' ) && function_exists( 'WPML_Widgets' ) ) {
			foreach ( (array) $sidebars_widgets as $id ) {

				if ( !isset($wp_registered_widgets[$id]) ) continue;

				$widget_class = $wp_registered_widgets[$id]['callback'][0];
				$widget_settings = $widget_class->get_settings();

				if ( !empty( $widget_settings ) ) {
					foreach ( $widget_settings as $widget_setting ) {
						if ( isset( $widget_setting['wpml_language'] ) ) {
							if ( $widget_setting['wpml_language'] == ICL_LANGUAGE_CODE || $widget_setting['wpml_language'] == 'all' ) {
								GymEdge::$footer_count++;
							}
						}
					}
				}
			}		
		}
		else {
			GymEdge::$footer_count = empty( $sidebars_widgets ) ? 4 : count( $sidebars_widgets );
		}
	}	
}

// Footer Widget Class
add_filter( 'dynamic_sidebar_params', 'gymedge_set_footer_widget_class' );
if ( !function_exists( 'gymedge_set_footer_widget_class' ) ) {
	function gymedge_set_footer_widget_class( $params ) {
		if ( $params[0]['id'] == 'footer' ) {
			switch ( GymEdge::$footer_count ) {
				case '1':
				$footer_class = 'col-sm-12 col-12';
				break;
				case '2':
				$footer_class = 'col-sm-6 col-12';
				break;
				case '3':
				$footer_class = 'col-sm-4 col-12';
				break;		
				default:
				$footer_class = 'col-lg-3 col-md-6 col-12';
				break;
			}
			$params[0]['before_widget'] = '<div class="'.$footer_class.'">' . $params[0]['before_widget'];
			$params[0]['after_widget']  = '</div></div>';
		}

		return $params;
	}	
}

// Post per page limit for class/trainer archive
add_action( 'pre_get_posts', 'gymedge_item_per_page' );
if( !function_exists( 'gymedge_item_per_page' ) ) {
	function gymedge_item_per_page( $query ) {
		if ( is_admin() || ! $query->is_main_query() ){
			return;
		}

		if ( is_post_type_archive( array( 'gym_class', 'gym_trainer' ) ) ) {
			$query->set( 'posts_per_page', 9 );
			return;
		}
	}	
}