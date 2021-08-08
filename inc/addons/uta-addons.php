<?php

$addons_list = get_option('unlimited_theme_addons_active_addons') == !'' ? get_option('unlimited_theme_addons_active_addons') : array();

// 1. Hide Admin Bar
if (array_key_exists('hide-admin-bar', $addons_list) && 'off' !== $addons_list['hide-admin-bar']) {

    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-admin-bar/hide-admin-bar.php');
}

// 2. WC hide price.
if (array_key_exists('hide-wc-price', $addons_list) && 'off' !== $addons_list['hide-wc-price']) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-wc-price/hide-wc-price.php');
}

// 3. WC hide add to cart.
//if (array_key_exists('wc-hide-add-to-cart', $addons_list) && 'off' !== $addons_list['wc-hide-add-to-cart']) {
//    include_once(UTA_PLUGIN_PATH . 'inc/addons/wc-hide-add-to-cart/wc-hide-add-to-cart.php');
//}
// 4. WC direct checkout.
if (array_key_exists('wc-direct-checkout', $addons_list) && 'off' !== $addons_list['wc-direct-checkout']) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/wc-direct-checkout/wc-direct-checkout.php');
}

?>