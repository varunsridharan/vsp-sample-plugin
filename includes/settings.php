<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 27-11-2018
 * Time: 06:31 PM
 */

use WPO\Container;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'VSP_Sample_Settings' ) ) {
	/**
	 * Class VSP_Sample_Settings
	 */
	final class VSP_Sample_Settings extends \VSP\Core\Abstracts\Plugin_Settings {

		/**
		 * Add Pages To WPOnion Settings.
		 *
		 * @param array|\WPO\Builder $builder
		 */
		public function options( $builder ) {
			$container  = WPO\Container::create( 'page1', 'Page 1', 'dashicons dashicons-admin-generic' );
			$container2 = WPO\Container::create( 'page2', 'Page 2', 'dashicons dashicons-admin-generic' );
			$container->text( 'textfield', __( 'Textfield' ) );
			$container2->container( 'section1', __( 'Section 1' ), 'dashicons dashicons-admin-generic' )
				->text( 'section1_textfield', __( 'Section1 Texfield' ) );
			$container2->container( 'section2', __( 'Section 2' ), 'dashicons dashicons-admin-generic' )
				->text( 'section2_textfield', __( 'Section2 Texfield' ) );

			$builder->container( $container );
			$builder->container( $container2 );
		}

	}
}
