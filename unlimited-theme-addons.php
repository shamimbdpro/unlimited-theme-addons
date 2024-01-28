<?php
/**
* Plugin Name: Unlimited Theme Addons
* Plugin URI: https://codepopular.com/unlimited-theme-addons
* Description: Unlimited theme addons is very useful plugin to get amazing features for your website . if you are Looking to add extra functionality to the Elementor page builder then this plugin will be help for you.
* Version: 1.2.0
* Author: codepopular
* Author URI: https://www.codepopular.com
* Text Domain: unlimited-theme-addons
* License: GPL/GNU.
* Domain Path: /languages
* WP Requirement & Test
* Requires at least: 4.0
* Tested up to: 6.4
* Requires PHP: 5.6
*/

define('UTA_PLUGIN_FILE', __FILE__);
define('UTA_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('UTA_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('UTA_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));
define('UTA_PLUGIN_VERSION', '1.2.0');

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/

/**
 *
 */
include_once(dirname( __FILE__ ). '/inc/Uta_Loader.php');

if ( function_exists( 'unlimited_theme_addons_run' ) ) {
    unlimited_theme_addons_run();
}

//Appsero Tracker
require __DIR__ . '/vendor/autoload.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_unlimited_theme_addons() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
        require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( '24144baa-67c4-4dd9-9528-3ad0aa7f33f7', 'Unlimited Theme Addon For Elementor and WooCommerce', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_unlimited_theme_addons();
