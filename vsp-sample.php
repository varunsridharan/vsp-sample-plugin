<?php
/**
 * Plugin Name: VSP Framework Sample
 * Version: 1.0
 * Description: This is a sample plugin to provide an idea on how VSP-Framework Works.
 * Author:Varun Sridharan
 * Author URI: http://varunsridharan.in
 * Plugin URI: https://github.com/varunsridharan/vsp-sample-plugin
 *
 * Created by PhpStorm.
 * User: varun
 * Date: 27-11-2018
 * Time: 06:05 PM
 */

defined( 'VSP_SAMPLE_PATH' ) || define( 'VSP_SAMPLE_PATH', plugin_dir_path( __FILE__ ) );
defined( 'VSP_SAMPLE_VERSION' ) || define( 'VSP_SAMPLE_VERSION', '1.0' );
defined( 'VSP_SAMPLE_NAME' ) || define( 'VSP_SAMPLE_NAME', __( 'VSP Sample' ) );
defined( 'VSP_SAMPLE_FILE' ) || define( 'VSP_SAMPLE_FILE', __FILE__ );

require_once __DIR__ . '/vsp-framework/vsp-init.php';

if ( function_exists( 'vsp_maybe_load' ) ) {
	vsp_maybe_load( 'vsp_sample_init' );
}

register_activation_hook( __FILE__, 'vsp_sample_on_active' );

if ( ! function_exists( 'vsp_sample_on_active' ) ) {
	function vsp_sample_on_active() {
	}
}

if ( ! function_exists( 'vsp_sample_init' ) ) {
	function vsp_sample_init() {
		require_once __DIR__ . '/includes/functions.php';
		require_once __DIR__ . '/bootstrap.php';
		require_once __DIR__ . '/../wp-localizer/src/Localizer.php';

		vsp_sample();
	}
}

if ( ! function_exists( 'vsp_sample' ) ) {
	function vsp_sample() {
		return VSP_Sample::instance();
	}
}
