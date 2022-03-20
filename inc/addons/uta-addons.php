<?php

$addons_list = get_option('unlimited_theme_addons_active_addons') == ! '' ? get_option('unlimited_theme_addons_active_addons') : array();

// 1. Hide Admin Bar
if ( array_key_exists('uta-template-shortcode', $addons_list) && 'off' !== $addons_list['uta-template-shortcode'] ) {

    include_once(UTA_PLUGIN_PATH . 'inc/addons/uta-template-shortcode/uta-template-shortcode.php');
}

// 2. Hide Admin Bar
if ( array_key_exists('hide-admin-bar', $addons_list) && 'off' !== $addons_list['hide-admin-bar'] ) {

    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-admin-bar/hide-admin-bar.php');
}

// 3. WC hide price.
if ( array_key_exists('hide-wc-price', $addons_list) && 'off' !== $addons_list['hide-wc-price'] ) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/hide-wc-price/hide-wc-price.php');
}

// 4. WC hide add to cart.
//if (array_key_exists('wc-hide-add-to-cart', $addons_list) && 'off' !== $addons_list['wc-hide-add-to-cart']) {
//    include_once(UTA_PLUGIN_PATH . 'inc/addons/wc-hide-add-to-cart/wc-hide-add-to-cart.php');
//}

// 5. WC direct checkout.
if ( array_key_exists('wc-direct-checkout', $addons_list) && 'off' !== $addons_list['wc-direct-checkout'] ) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/wc-direct-checkout/wc-direct-checkout.php');
}

// 6. WC hide related product.
if ( array_key_exists('wc-hide-related-product', $addons_list) && 'off' !== $addons_list['wc-hide-related-product'] ) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/wc-hide-related-product/wc-hide-related-product.php');
}


// 7. Disable Gutenberg.
if ( array_key_exists('disable-gutenberg', $addons_list) && 'off' !== $addons_list['disable-gutenberg'] ) {
    include_once(UTA_PLUGIN_PATH . 'inc/addons/disable-gutenberg/disable-gutenberg.php');
}


