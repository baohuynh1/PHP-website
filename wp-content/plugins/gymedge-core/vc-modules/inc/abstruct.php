<?php
if ( ! class_exists( 'RDTheme_VC_Modules' ) ) {

	abstract class RDTheme_VC_Modules {

		public $name;
		public $base;
		public $translate;

		public function __construct() {
			add_action( 'init', array( $this, 'vc_map' ) );
			add_shortcode( $this->base, array( $this, 'shortcode' ) );
			add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
		}

		function admin_scripts() {
			wp_enqueue_style( 'select2', GYMEDGE_CORE_BASE_URL . "assets/css/select2.min.css", array(), GYMEDGE_CORE_VERSION );
			wp_enqueue_script( 'select2', GYMEDGE_CORE_BASE_URL . "assets/js/select2.min.js", array( 'jquery' ), GYMEDGE_CORE_VERSION, true );
			wp_enqueue_script( 'gym-admin', GYMEDGE_CORE_BASE_URL . "vc-modules/assets/admin.js", array( 'select2' ), GYMEDGE_CORE_VERSION, true );
		}

		abstract public function fields();

		abstract public function shortcode( $atts, $content );

		public function template( $template, $vars ) {
			extract( $vars );

			$template_name = "/vc-custom-addons/{$template}-view.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			} elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			} else {
				$file = plugin_dir_path( __DIR__ ) . "views/{$template}.php";
			}

			ob_start();
			include $file;

			return ob_get_clean();
		}

		public function vc_map() {

			vc_add_shortcode_param( 'dropdown_multi', [ $this, 'gymedge_dropdown_multi_settings_field' ] );
			vc_add_shortcode_param('dropdown_multi', [ $this, 'gymedge_dropdown_multi_settings_field' ], GYMEDGE_CORE_BASE_URL . "vc-modules/assets/admin.js");

			$fields = $this->fields();
			vc_map(
				array(
					"name"              => $this->name,
					"base"              => $this->base,
					"class"             => "",
					"icon"              => plugins_url( 'assets/vc-icon.png', dirname( __FILE__ ) ),
					"admin_enqueue_css" => plugins_url( 'assets/vc.css', dirname( __FILE__ ) ),
					"front_enqueue_css" => plugins_url( 'assets/vc.css', dirname( __FILE__ ) ),
					"controls"          => "full",
					"category"          => __( 'GymEdge', 'gymedge-core' ),
					"params"            => $fields,
				)
			);
		}

		function gymedge_dropdown_multi_settings_field( $param, $value ) {
			$param_line = '';
			$param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="gymedge_multi_select wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
			foreach ( $param['value'] as $text_val => $val ) {
				if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
					$text_val = $val;
				}
				$text_val = __($text_val, "js_composer");
				$selected = '';

				if(!is_array($value)) {
					$param_value_arr = explode(',',$value);
				} else {
					$param_value_arr = $value;
				}

				if ($value!=='' && in_array($val, $param_value_arr)) {
					$selected = ' selected="selected"';
				}
				$param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
			}
			$param_line .= '</select>';

			return  $param_line;
		}


		//Get all thumbnail size
		public function rt_get_all_image_sizes() {
			global $_wp_additional_image_sizes;
			$image_sizes   = [];
			$image_sizes[] = array(
				'value' => '0',
				'label' => __( 'Default Image Size', 'gymedge-core' )
			);
			foreach ( $_wp_additional_image_sizes as $index => $item ) {
				$image_sizes[] = array(
					'value' => $index,
					'label' => __( ucwords( $index . ' - ' . $item['width'] . 'x' . $item['height'] ), 'gymedge-core' )
				);
			}
			$image_sizes[] = array(
				'value' => 'full',
				'label' => __( 'Full Size', 'gymedge-core' )
			);

			return $image_sizes;
		}

	}
}