<?php
/**
* Plugin Name: Unlimited Theme Addons
* Plugin URI: https://codepopular.com/unlimited-theme-addons
* Description: Unlimited theme addons is very useful plugin to get amazing features for your website . if you Looking to add extra functionality to the Elementor page builder then this plugin will be help for you.
* Version: 1.1.0
* Author: codepopular
* Author URI: https://www.codepopular.com
* Text Domain: unlimited-theme-addons
* License: GPL/GNU.
* Domain Path: /languages
* WP Requirement & Test
* Requires at least: 4.0
* Tested up to: 5.8
* Requires PHP: 5.6
*/

define('UTA_PLUGIN_FILE', __FILE__);
define('UTA_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('UTA_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('UTA_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));
define('UTA_PLUGIN_VERSION', '1.1.0');

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
