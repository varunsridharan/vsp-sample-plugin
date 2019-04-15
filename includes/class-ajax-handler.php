<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 27-11-2018
 * Time: 07:40 PM
 */

class VSP_Sample_Ajax_Handler extends \Varunsridharan\WordPress\Ajaxer {
	/**
	 * Action Name
	 * provide value if all ajax requests runs in a single action key.
	 *
	 * @var string
	 */
	protected $action = 'vsp-sample';

	/**
	 * Array of ajax actions
	 *
	 * @example array('ajax_action_1' => true,'ajax_action_2' => false)
	 *          if value set to true then it runs for both loggedout / logged in users
	 *          if value set to false then it runs only for the logged in user
	 *
	 * @example array('ajax_action_1' => array('auth' => false,'callback' => array(CLASSNAME,METHODNAME)))
	 *          if auth value set to true then it runs for both loggedout / logged in users
	 *          if auth value set to false then it runs only for the logged in user
	 *          callback can either be a string,array or a actual dynamic function.
	 *
	 * @var array
	 */
	protected $actions = array(
		'js-ajax-sample' => false,
	);

	/**
	 * Set to true if plugin's ajax runs in a single action
	 *
	 * @example Single Ajax Action
	 *          admin-ajax.php?action=plugin-slug&plugin-slug-action=ajax-action&param1=value1&param2=value=2
	 *          Multiple Ajax Actions
	 *          admin-ajax.php?action=plugin-slug-ajax-action1&param1=value1=param2=value2
	 *
	 * @var bool
	 */
	protected $is_single = true;

	public function js_ajax_sample() {
		$rand = rand( 1, 3 );
		$html = wponion_add_element( array(
			'type'    => 'wp_success_notice',
			'alt'     => true,
			'large'   => true,
			'content' => '<strong>Lorem Ipsum </strong>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
		) );
		switch ( $rand ) {
			case 1:
				vsp_send_json_callback( true, array(
					'add_response' => "jQuery('div.ajax-response').html('" . $html . "')",
				) );
				break;
			case 2:
				vsp_send_json_callback( true, array(
					'add_response' => "jQuery('div.ajax-response').html('')",
					'normal_alert' => 'alert("HELLO World");',
				) );
				break;
			case 3:
				vsp_send_json_callback( true, array(
					'add_response' => "jQuery('div.ajax-response').html('" . $html . "')",
					'normal_alert' => swal2_question( 'Whats your anme?' ),
				) );
				break;
		}
	}
}

return new VSP_Sample_Ajax_Handler();