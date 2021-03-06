<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 27-11-2018
 * Time: 06:17 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'VSP_Sample' ) ) {
	/**
	 * Class VSP_Sample
	 */
	final class VSP_Sample extends \VSP\Framework {
		/**
		 * VSP_Sample constructor.
		 */
		public function __construct() {
			$this->file      = VSP_SAMPLE_FILE;
			$this->name      = VSP_SAMPLE_NAME;
			$this->slug      = 'vsp-sample';
			$this->db_slug   = 'vsp_sample';
			$this->version   = VSP_SAMPLE_VERSION;
			$this->hook_slug = 'vsaple';
			$config          = array();

			/**
			 * Plugin's Addon Module Configuration.
			 * Config Options
			 * array(
			 *    'base_path'               => '',
			 *    'base_url'                => '',
			 *    'addon_listing_tab_name'  => 'addons',
			 *    'addon_listing_tab_title' => 'Addons',
			 *    'addon_listing_tab_icon'  => 'fa fa-plus',
			 *    'file_headers'            => array(),
			 *    'show_category_count'     => true,
			 * )
			 */
			$config['addons'] = array(
				'base_path' => $this->plugin_path( 'addons/' ),
				'base_url'  => $this->plugin_url( 'addons/' ),
			);

			/**
			 * Settings Page Configuration.
			 * Below arguments are related to WPOnion.
			 * basic required ars
			 * array(
			 *    'option_name' => '',
			 *    'theme' => 'modern', #modern|fresh|your-theme
			 * )
			 *
			 */
			$config['settings_page'] = array(
				'option_name'     => '_wponion_demo_settings',
				'framework_title' => __( 'Simple Demo' ),
				'framework_desc'  => __( 'Demo Page' ),
				'theme'           => 'wp_modern',
				'ajax'            => true,
				'search'          => true,
				'is_single_page'  => true,
				'menu'            => array(
					'menu_title' => __( 'WPOnion Settings Demo' ),
					'menu_slug'  => 'wponion-settings-demo',
				),
			);

			/**
			 * Config for system tools.
			 * Possible Values : true / false / array()
			 * array(
			 *    'system_tools_menu' => true, # true/false/array of values
			 *    'menu'              => true, # true/false
			 *    'logging'           => true, #true/false/array of values
			 * )
			 *
			 * system_status /logging / system_tool_menu array data can be like below
			 * array(
			 *    'name' => '',
			 *    'title' => '',
			 *    'icon'=>''
			 * )
			 * The above array is related to WPOnion Page Argument.
			 *
			 * $config['system_tools'] = true;
			 * $config['system_tools'] = false;
			 * $config['system_tools'] = array(
			 *    'menu' => array(
			 *        'title' => __( 'Sys Tools' ),
			 *    ),
			 * );
			 *
			 */
			$config['system_tools'] = true;

			/**
			 * Config to enable logging option.
			 * if set to true. then it create a custom logger instance and saves it.
			 */
			$config['logging'] = true;

			/**
			 * Config To enable Autoloader PHP Lib
			 *
			 * @uses \Varunsridharan\PHP\Autoloader https://github.com/varunsridharan/php-autoloader
			 *
			 * array(
			 *    'namespace' => 'somename',
			 *    'base_path' => __DIR__.'/includes/',
			 *    'options' =>  array(
			 *        'exclude' => false,
			 *        'mapping' => array(),
			 *        'debug'   => false,
			 *     ),
			 *    'prepend'=> false,
			 * )
			 */
			$config['autoloader'] = array(
				'namespace' => '\MyPlugin\Admin',
				'base_path' => __DIR__ . '/includes/',
			);

			parent::__construct( $config );
		}

		public function load_files() {
			$this->load_file( 'includes/class-*' );
			$this->action( 'comeonloaded' );
		}

		/**
		 * Hooked Function to load our settings fields and other stuff.
		 */
		public function settings_init_before() {
			$this->load_file( 'includes/settings.php' );
			new VSP_Sample_Settings( $this->slug( 'hook' ) );
		}

		public function plugin_init() {
		}

		public function admin_init() {
		}

		public function register_hooks() {
		}

		/**
		 * below function fires after wponion is loaded.
		 */
		public function wponion_loaded() {
			if ( is_admin() && false !== wponion_settings( 'vsp_sample_settings' ) ) {
				wponion_admin_page( array(
					'assets'     => array( 'vsp_load_core_assets', 'wponion_load_core_assets' ),
					'page_title' => __( 'Custom Submenu' ),
					'menu_title' => __( 'Custom Menu' ),
					'render'     => array( 'VSP_Sample_Custom_Page', 'render' ),
					'submenu'    => wponion_settings( 'vsp_sample_settings' )->menu_instance,
					'menu_slug'  => 'custom-page2',
				) );
			}
		}
	}
}