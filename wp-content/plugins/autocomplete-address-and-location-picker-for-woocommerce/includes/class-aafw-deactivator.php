<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://powerfulwp.com/
 * @since      1.0.0
 *
 * @package    Aafw
 * @subpackage Aafw/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Aafw
 * @subpackage Aafw/includes
 * @author     powerfulwp <apowerfulwp@gmail.com>
 */
class Aafw_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option( 'aafw_activation_date' );
	}

}
