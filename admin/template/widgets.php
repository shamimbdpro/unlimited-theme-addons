<?php

$widget_list = get_option('unlimited_theme_addons_active_widgets') == ! '' ? get_option('unlimited_theme_addons_active_widgets') : array();

$uta_widget_lists = array(

    // Woocommerce product grid.
    array(
        'title'       => __('WooCommerce Product Grid', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-grid',
        'default'     => array_key_exists('woocommerce-product-grid', $widget_list) && 'off' == $widget_list['woocommerce-product-grid'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Woocommerce Product List.
    array(
        'title'       => __('WooCommerce Product List', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-list',
        'default'     => array_key_exists('woocommerce-product-list', $widget_list) && 'off' == $widget_list['woocommerce-product-list'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Woocommerce Product Search.
    array(
        'title'       => __('WooCommerce Product Search', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-search',
        'default'     => array_key_exists('woocommerce-product-search', $widget_list) && 'off' == $widget_list['woocommerce-product-search'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Section Title.
    array(
        'title'       => __('Section Title', 'unlimited-theme-addons'),
        'name'        => 'section-title',
        'default'     => array_key_exists('section-title', $widget_list) && 'off' == $widget_list['section-title'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Team.
    array(
        'title'       => __('Team', 'unlimited-theme-addons'),
        'name'        => 'team',
        'default'     => array_key_exists('team', $widget_list) && 'off' == $widget_list['team'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Team Member Carousel.
    array(
        'title'       => __('Team Member Carousel', 'unlimited-theme-addons'),
        'name'        => 'team-member-carousel',
        'default'     => array_key_exists('team-member-carousel', $widget_list) && 'off' == $widget_list['team'] ? 'off' : 'on',
        'is_free'     => Uta_helpers::is_uta_pro_installed(),
    ),

    // Testimonial.
    array(
        'title'       => __('Testimonial', 'unlimited-theme-addons'),
        'name'        => 'testimonial',
        'default'     => array_key_exists('testimonial', $widget_list) && 'off' == $widget_list['testimonial'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Video.
    array(
        'title'       => __('Video', 'unlimited-theme-addons'),
        'name'        => 'video',
        'default'     => array_key_exists('video', $widget_list) && 'off' == $widget_list['video'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Image Comparison.
    array(
        'title'       => __('Image Comparison', 'unlimited-theme-addons'),
        'name'        => 'image-comparison',
        'default'     => array_key_exists('image-comparison', $widget_list) && 'off' == $widget_list['image-comparison'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Button.
    array(
        'title'       => __('Button', 'unlimited-theme-addons'),
        'name'        => 'button',
        'default'     => array_key_exists('button', $widget_list) && 'off' == $widget_list['button'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Infobox.
    array(
        'title'       => __('Infobox', 'unlimited-theme-addons'),
        'name'        => 'infobox',
        'default'     => array_key_exists('infobox', $widget_list) && 'off' == $widget_list['infobox'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Blog.
    array(
        'title'       => __('Blog', 'unlimited-theme-addons'),
        'name'        => 'blog',
        'default'     => array_key_exists('blog', $widget_list) && 'off' == $widget_list['blog'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Company Logo.
    array(
        'title'       => __('Company Logo', 'unlimited-theme-addons'),
        'name'        => 'company-logo',
        'default'     => array_key_exists('company-logo', $widget_list) && 'off' == $widget_list['company-logo'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Pricing.
    array(
        'title'       => __('Pricing', 'unlimited-theme-addons'),
        'name'        => 'pricing',
        'default'     => array_key_exists('pricing', $widget_list) && 'off' == $widget_list['pricing'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Counter Up.
    array(
        'title'       => __('Counter Up', 'unlimited-theme-addons'),
        'name'        => 'counter',
        'default'     => array_key_exists('counter', $widget_list) && 'off' == $widget_list['counter'] ? 'off' : 'on',
        'is_free'     => true,
    ),

    // Block Quote.
    array(
        'title'       => __('Blockquote', 'unlimited-theme-addons'),
        'name'        => 'blockquote',
        'default'     => array_key_exists('blockquote', $widget_list) && 'off' == $widget_list['blockquote'] ? 'off' : 'on',
        'is_free'     => true,
    ),

	// Woocommerce Product Carousel.
    array(
        'title'       => __('Countdown', 'unlimited-theme-addons'),
        'name'        => 'countdown',
        'default'     => array_key_exists('countdown', $widget_list) && 'off' == $widget_list['countdown'] ? 'off' : 'on',
        'is_free'     => Uta_helpers::is_uta_pro_installed(),
    ),

    // Accordion.
    array(
        'title'       => __('Accordion', 'unlimited-theme-addons'),
        'name'        => 'accordion',
        'default'     => array_key_exists('accordion', $widget_list) && 'off' == $widget_list['accordion'] ? 'off' : 'on',
        'is_free'     => true,
    ),

);


?>


<div class="uta-widget-list">
    <form action="" id="saveWidget" method="post">
        <button type="button" class="btn btn-primary uta-action-btn">Save Changes</button>
        <button class="btn btn-primary uta-action-btn-loading" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Savings...
        </button>
        <div class="row">
            <?php foreach ( $uta_widget_lists as $widget ) { ?>
                <div class="col-md-3">
                    <div class="uta-single-widget">
                        <?php if ( false == $widget['is_free'] ) { ?><span class="badge bg-primary">Upgrade Pro</span> <?php  } ?>
                        <div class="widget-label">
                            <h5><?php echo esc_html($widget['title']) //ignore:phpcs ;?></h5>
                        </div>
                        <div class="widget-witch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="<?php echo esc_html( $widget['name'] ); ?>" class="onoffswitch-checkbox" id="<?php echo esc_html( $widget['name'] ); ?>" tabindex="0" <?php echo 'on' == $widget['default'] && 1 == $widget['is_free'] ? 'checked' : ''; ?> <?php echo 0 == $widget['is_free'] ? 'disabled' : ''; ?>>
                                <label class="onoffswitch-label" for="<?php echo esc_html( $widget['name'] ); ?>">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </form>
</div>
