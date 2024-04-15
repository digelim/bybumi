<?php
/**
 * Plugin Name: MultiStep Checkout for WooCommerce
 * Description: MultiStep Checkout for WooCommerce plugin breaks up the usual WooCommerce checkout form into multiple steps for a friendlier user experience.
 * Version:     2.2.0
 * Author:      ThemeHigh
 * Author URI:  https://www.themehigh.com
 *
 * Text Domain: woo-multistep-checkout
 * Domain Path: /languages
 *
 * WC requires at least: 4.0.0
 * WC tested up to: 7.3
*/

if(!defined( 'ABSPATH' )) exit;

if (!function_exists('is_woocommerce_active')){
	function is_woocommerce_active(){
	    $active_plugins = (array) get_option('active_plugins', array());
	    if(is_multisite()){
		   $active_plugins = array_merge($active_plugins, get_site_option('active_sitewide_plugins', array()));
	    }
	    return in_array('woocommerce/woocommerce.php', $active_plugins) || array_key_exists('woocommerce/woocommerce.php', $active_plugins);
	}
}

if(is_woocommerce_active()) {
	
	if(!class_exists('THWMSCF_Multistep_Checkout')){	
		class THWMSCF_Multistep_Checkout {	
			public function __construct(){
				add_action('init', array($this, 'init'));
			}

			public function init() {		
				$this->load_plugin_textdomain();

				define('THWMSCF_VERSION', '2.2.0');
				!defined('THWMSCF_BASE_NAME') && define('THWMSCF_BASE_NAME', plugin_basename( __FILE__ ));
				!defined('THWMSCF_PATH') && define('THWMSCF_PATH', plugin_dir_path( __FILE__ ));
				!defined('THWMSCF_URL') && define('THWMSCF_URL', plugins_url( '/', __FILE__ ));
				!defined('THWMSCF_ASSETS_URL') && define('THWMSCF_ASSETS_URL', THWMSCF_URL .'assets/');
				!defined('THWMSCF_TEMPLATE_PATH') && define('THWMSCF_TEMPLATE_PATH', THWMSCF_PATH . 'templates/');

				require_once( THWMSCF_PATH . 'classes/class-thwmscf-settings.php' );   

				THWMSCF_Settings::instance();	 
			}

			public function load_plugin_textdomain(){							
				load_plugin_textdomain('woo-multistep-checkout', FALSE, dirname(plugin_basename( __FILE__ )) . '/languages/');
			}
		}
	}
	new THWMSCF_Multistep_Checkout();
}