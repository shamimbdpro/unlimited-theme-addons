<?php 
 $addons_list = get_option('unlimited_theme_addons_active_addons') == ! '' ? get_option('unlimited_theme_addons_active_addons') : array();

// Product list.
 if ( array_key_exists('hide-admin-bar', $addons_list) && 'off' !== $addons_list['hide-admin-bar']) {

    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-admin-bar/hide-admin-bar.php');
 }

?>