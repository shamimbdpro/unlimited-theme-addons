<?php
/**
* Plugin Name: Unlimited Theme Addons
* Plugin URI: https://codepopular.com/demo/unlimited-theme-addons
* Description: Unlimited theme addons is very useful plugin to get amazing features for your website . if you Looking to add extra functionality to the Elementor page builder then this plugin will be help for you.
* Version: 1.0.4
* Author: codepopular
* Author URI: https://www.codepopular.com
* Text Domain: unlimited-theme-addons
* License: GPL/GNU.
* Domain Path: /languages
*/

define('UTA_PLUGIN_FILE', __FILE__);
define('UTA_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('UTA_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('UTA_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));
define('UTA_PLUGIN_VERSION', '1.0.4');

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/  

include_once(dirname( __FILE__ ). '/inc/elementor/elementor.php');
 
