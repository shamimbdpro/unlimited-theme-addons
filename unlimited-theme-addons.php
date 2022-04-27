<?php
/**
* Plugin Name: Unlimited Theme Addons
* Plugin URI: https://codepopular.com/unlimited-theme-addons
* Description: Unlimited theme addons is very useful plugin to get amazing features for your website . if you Looking to add extra functionality to the Elementor page builder then this plugin will be help for you.
* Version: 1.1.8
* Author: codepopular
* Author URI: https://www.codepopular.com
* Text Domain: unlimited-theme-addons
* License: GPL/GNU.
* Domain Path: /languages
* WP Requirement & Test
* Requires at least: 4.0
* Tested up to: 5.9
* Requires PHP: 5.6
*/

define('UTA_PLUGIN_FILE', __FILE__);
define('UTA_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('UTA_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('UTA_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));
define('UTA_PLUGIN_VERSION', '1.1.8');

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

/**
 * Freemius Tracker.
 */
if ( ! function_exists( 'unlimited_theme_addons' ) ) {
    // Create a helper function for easy SDK access.
    function unlimited_theme_addons() {
        global $unlimited_theme_addons;

        if ( ! isset( $unlimited_theme_addons ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $unlimited_theme_addons = fs_dynamic_init( array(
                'id'                  => '9997',
                'slug'                => 'unlimited-theme-addons',
                'premium_slug'        => 'unlimited-theme-addons-pro',
                'type'                => 'plugin',
                'public_key'          => 'pk_093e9c67117c5c04b81a9a8118da5',
                'is_premium'          => false,
                'premium_suffix'      => 'Unlimited Theme Addons Pro',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'unlimited-theme-addons',
                    'first-path'     => 'admin.php?page=unlimited-theme-addons',
                    'contact'        => false,
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_7RBwq?s.W8&D.zMcnSv2k.(:sTJ4V',
            ) );
        }

        return $unlimited_theme_addons;
    }

    // Init Freemius.
    unlimited_theme_addons();
    // Signal that SDK was initiated.
    do_action( 'unlimited_theme_addons_loaded' );
}