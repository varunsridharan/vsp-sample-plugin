<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 28-11-2018
 * Time: 05:34 AM
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'VSP_Sample_Pointers' ) ) {

	class VSP_Sample_Pointers {
		/**
		 * @var \PointerPlus
		 */
		public static $pointer = false;

		/**
		 * Inits PointerPlus Class.
		 */
		public static function init() {
			self::$pointer = new \PointerPlus( array(
				'prefix' => 'your-pointer-domain',
			) );
			add_filter( 'your-pointer-domain-pointerplus_list', array( __CLASS__, 'pointers' ), 10, 2 );
		}

		/**
		 * @param $pointers
		 * @param $prefix
		 *
		 * @return array
		 */
		public static function pointers( $pointers, $prefix ) {
			$pointers = array(
				$prefix . '_posts'          => array(
					'selector'   => '#menu-posts',
					'title'      => __( 'PointerPlus for Posts', 'your-pointer-domain' ),
					'text'       => __( 'One more pointer.', 'your-pointer-domain' ),
					'post_type'  => array( 'post' ),
					'icon_class' => 'dashicons-admin-post',
					'width'      => 350,
				),
				$prefix . '_pages'          => array(
					'selector'   => '#menu-pages',
					'title'      => __( 'PointerPlus Pages', 'your-pointer-domain' ),
					'text'       => __( 'A pointer for pages.', 'your-pointer-domain' ),
					'post_type'  => array( 'page' ),
					'icon_class' => 'dashicons-admin-post',
				),
				$prefix . '_users'          => array(
					'selector'   => '#menu-users',
					'title'      => __( 'PointerPlus Users', 'your-pointer-domain' ),
					'text'       => __( 'A pointer for users.', 'your-pointer-domain' ),
					'pages'      => array( 'users.php' ),
					'icon_class' => 'dashicons-admin-users',
				),
				$prefix . '_settings_tab'   => array(
					'selector'   => '#show-settings-link',
					'title'      => __( 'PointerPlus Help', 'your-pointer-domain' ),
					'text'       => __( 'A pointer with action.', 'your-pointer-domain' ),
					'edge'       => 'top',
					'align'      => 'right',
					'icon_class' => 'dashicons-welcome-learn-more',
					'next'       => $prefix . '_contextual_tab',
				),
				$prefix . '_contextual_tab' => array(
					'selector'   => '#contextual-help-link',
					'title'      => __( 'PointerPlus Help', 'your-pointer-domain' ),
					'text'       => __( 'A pointer for help tab.<br>Go to Posts, Pages or Users for other pointers.', 'your-pointer-domain' ),
					'edge'       => 'top',
					'align'      => 'right',
					'icon_class' => 'dashicons-welcome-learn-more',
					'show'       => 'close',
				),
				$prefix . '_settings'       => array(
					'selector'   => '#menu-settings',
					'title'      => __( 'PointerPlus Test', 'your-pointer-domain' ),
					'text'       => __( 'The plugin is active and ready to start working.', 'your-pointer-domain' ),
					'width'      => 260,
					'icon_class' => 'dashicons-admin-settings',
					'jsnext'     => "button = jQuery('<a id=\"pointer-close\" class=\"button action thickbox\" href=\"#TB_inline?width=700&height=500&inlineId=menu-popup\">" . __( 'Open Popup' ) . "</a>');
                    button.bind('click.pointer', function () {
                        t.element.pointer('close');
                    });
                    return button;",
					'phpcode'    => array( __CLASS__, 'custom_phpcode_thickbox' ),
				),
			);
			return $pointers;
		}

		public static function custom_phpcode_thickbox() {
			add_thickbox();
			echo '<div id="menu-popup" style="display:none;">
			<p style="text-align: center;">
				 This is my hidden content! It will appear in ThickBox when the link is clicked.
				 <iframe width="560" height="315" src="https://www.youtube.com/embed/EaWfDuXQfo0" frameborder="0" allowfullscreen></iframe>
			</p>
		</div>';
		}

	}
}

VSP_Sample_Pointers::init();