<?php

$get_addons_list = get_option('unlimited_theme_addons_active_addons') == ! '' ? get_option('unlimited_theme_addons_active_addons') : array();

$uta_addon_lists = array(

    // Enable Shortcode.
    array(
        'title' => __('Enable Template Kit', 'unlimited-theme-addons'),
        'name' => 'uta-template-shortcode',
        'default' => array_key_exists('uta-template-shortcode', $get_addons_list) && 'off' == $get_addons_list['uta-template-shortcode'] || empty($get_addons_list['uta-template-shortcode']) ? 'off' : 'on',
        'is_free' => 1,
        'display' => true,
    ),

    // Hide Admin Bar.
    array(
        'title' => __('Hide Admin Bar in Frontend', 'unlimited-theme-addons'),
        'name' => 'hide-admin-bar',
        'default' => array_key_exists('hide-admin-bar', $get_addons_list) && 'off' == $get_addons_list['hide-admin-bar'] || empty($get_addons_list['hide-admin-bar']) ? 'off' : 'on',
        'is_free' => 1,
        'display' => true,
    ),

    // Hide WooCommerce Price.
    array(
        'title' => __('Hide WooCommerce Price', 'unlimited-theme-addons'),
        'name' => 'hide-wc-price',
        'default' => array_key_exists('hide-wc-price', $get_addons_list) && 'off' == $get_addons_list['hide-wc-price'] || empty($get_addons_list['hide-wc-price']) ? 'off' : 'on',
        'is_free' => 1,
        'display' => Uta_helpers::get_instance()->is_wc_install(),
    ),


    // Hide Add To Cart.
	//    array(
	//        'title' => __('Hide Add to Cart for WooCommerce', 'unlimited-theme-addons'),
	//        'name' => 'wc-hide-add-to-cart',
	//        'default' => array_key_exists('wc-hide-add-to-cart', $get_addons_list) && 'off' == $get_addons_list['wc-hide-add-to-cart'] || empty($get_addons_list['wc-hide-add-to-cart']) ? 'off' : 'on',
	//        'is_free' => 1,
	//        'display' => Uta_helpers::get_instance()->is_wc_install(),
	//    ),


    // Hide WooCommerce Price.
    array(
        'title' => __('WooCommerce Direct Checkout', 'unlimited-theme-addons'),
        'name' => 'wc-direct-checkout',
        'default' => array_key_exists('wc-direct-checkout', $get_addons_list) && 'off' == $get_addons_list['wc-direct-checkout'] || empty($get_addons_list['wc-direct-checkout']) ? 'off' : 'on',
        'is_free' => 1,
        'display' => Uta_helpers::get_instance()->is_wc_install(),
    ),


    // Hide WooCommerce Related Products.
    array(
        'title' => __('WC Hide Related Product', 'unlimited-theme-addons'),
        'name' => 'wc-hide-related-product',
        'default' => array_key_exists('wc-hide-related-product', $get_addons_list) && 'off' == $get_addons_list['wc-hide-related-product'] || empty($get_addons_list['wc-hide-related-product']) ? 'off' : 'on',
        'is_free' => 1,
        'display' => Uta_helpers::get_instance()->is_wc_install(),
    ),


	// Disable Gutenberg.
	  array(
		  'title' => __('Disable Gutenberg', 'unlimited-theme-addons'),
		  'name' => 'disable-gutenberg',
		  'default' => array_key_exists('disable-gutenberg', $get_addons_list) && 'off' == $get_addons_list['disable-gutenberg'] || empty($get_addons_list['disable-gutenberg']) ? 'off' : 'on',
		  'is_free' => 1,
		  'display' => true,
	  ),




);

?>


<div class="uta-widget-list">
	<form action="" id="saveAddons" method="post">
		<div class="uta-form-toolbar">
			<div class="uta-form-toolbar__text">
				<h2 class="uta-form-toolbar__title"><?php esc_html_e( 'Addons', 'unlimited-theme-addons' ); ?></h2>
				<p class="uta-form-toolbar__desc"><?php esc_html_e( 'Optional site-wide features: templates, WooCommerce helpers, editor tweaks, and more.', 'unlimited-theme-addons' ); ?></p>
			</div>
			<div class="uta-form-toolbar__actions">
				<button type="button" class="btn btn-primary uta-action-btn"><?php esc_html_e( 'Save changes', 'unlimited-theme-addons' ); ?></button>
				<button class="btn btn-primary uta-action-btn-loading" type="button" disabled>
					<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					<?php esc_html_e( 'Saving…', 'unlimited-theme-addons' ); ?>
				</button>
			</div>
		</div>
		<div class="row">
			<?php foreach ( $uta_addon_lists as $addon_list ) { ?>
				<?php if ( true === $addon_list['display'] ) { ?>
					<div class="col-md-3">
						<div class="uta-single-widget">
							<?php if ( 0 === (int) $addon_list['is_free'] ) { ?>
								<span class="badge bg-primary"><?php esc_html_e( 'Upgrade Pro', 'unlimited-theme-addons' ); ?></span>
							<?php } ?>
							<div class="widget-label">
								<h5><?php echo esc_html( $addon_list['title'] ); ?></h5>
							</div>
							<div class="uta-widget-switch-row">
								<div class="onoffswitch">
									<input type="checkbox" name="<?php echo esc_attr( $addon_list['name'] ); ?>"
										class="onoffswitch-checkbox"
										id="<?php echo esc_attr( $addon_list['name'] ); ?>"
										tabindex="0" <?php echo ( 'on' === $addon_list['default'] && 1 === (int) $addon_list['is_free'] ) ? 'checked' : ''; ?> <?php echo 0 === (int) $addon_list['is_free'] ? 'disabled' : ''; ?>>
									<label class="onoffswitch-label" for="<?php echo esc_attr( $addon_list['name'] ); ?>">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</form>
</div>
