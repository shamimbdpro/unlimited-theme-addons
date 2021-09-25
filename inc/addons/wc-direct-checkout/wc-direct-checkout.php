<?php

add_filter('woocommerce_add_to_cart_redirect', 'lw_add_to_cart_redirect');
function lw_add_to_cart_redirect() {
    return wc_get_checkout_url();
}


