<?php 
 $addons_list = get_option('unlimited_theme_addons_active_addons') == ! '' ? get_option('unlimited_theme_addons_active_addons') : array();

// 1. Hide Admin Bar
 if ( array_key_exists('hide-admin-bar', $addons_list) && 'off' !== $addons_list['hide-admin-bar']) {

    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-admin-bar/hide-admin-bar.php');
 }

// 1. Hide Admin Bar
if ( array_key_exists('hide-wc-price', $addons_list) && 'off' !== $addons_list['hide-wc-price']) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-wc-price/hide-wc-price.php');
}

?>