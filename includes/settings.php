<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 27-11-2018
 * Time: 06:31 PM
 */
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
		 * @param array $pages
		 *
		 * @return array|mixed
		 */
		public function add_pages( $pages = array() ) {
			$pages['page1'] = array(
				'title' => __( 'Page 1' ),
				'name'  => 'page1',
				'icon'  => 'dashicons dashicons-admin-generic',
			);
			$pages['page2'] = array(
				'title' => __( 'Page 2' ),
				'name'  => 'page2',
				'icon'  => 'dashicons dashicons-admin-generic',
			);
			return $pages;
		}

		/**
		 * Add Sections To WPOnion Settings.
		 *
		 * @param array $sections
		 *
		 * @return array|mixed
		 */
		public function add_sections( $sections = array() ) {
			$sections['page2/section1'] = array(
				'title' => __( 'Section 1' ),
				'name'  => 'section1',
				'icon'  => 'dashicons dashicons-admin-generic',
			);
			$sections['page2/section2'] = array(
				'title' => __( 'Section 2' ),
				'name'  => 'section2',
				'icon'  => 'dashicons dashicons-admin-generic',
			);
			return $sections;
		}

		/**
		 * Add Fields To WPOnion Settings.
		 *
		 * @param array $fields
		 *
		 * @return array|mixed
		 */
		public function add_fields( $fields = array() ) {
			$fields['page1']          = array(
				array(
					'title' => __( 'Textfield' ),
					'id'    => 'textfield',
					'type'  => 'text',
				),
			);
			$fields['page2/section1'] = array(
				array(
					'title' => __( 'Section1 Textfield' ),
					'id'    => 'section1_textfield',
					'type'  => 'textarea',
				),
			);
			$fields['page2/section2'] = array(
				array(
					'title' => __( 'Section2 Textfield' ),
					'id'    => 'section2_textfield',
					'type'  => 'text',
				),
			);
			return $fields;
		}

	}
}