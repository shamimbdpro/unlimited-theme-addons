<?php

$widget_list = get_option('unlimited_theme_addons_active_widgets') == ! '' ? get_option('unlimited_theme_addons_active_widgets') : array();
$uta_widget_lists = array(

    // 1. Woocommerce product grid.
    array(
        'title'       => __('Woocommerce Product Grid', 'unlimited-theme-addons'),
        'description' => __('Enable Woocommerce Product Grid. Please ensure that you need to install Woocoomerce plugin first.', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-grid',
        'default'     => array_key_exists('woocommerce-product-grid', $widget_list) && 'off' == $widget_list['woocommerce-product-grid'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 2. Woocommerce Product List.
    array(
        'title'       => __('Woocommerce Product List', 'unlimited-theme-addons'),
        'description' => __('Make Prodcut list with elementor. You should to install woocommerce before working this addons.', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-list',
        'default'     => array_key_exists('woocommerce-product-list', $widget_list) && 'off' == $widget_list['woocommerce-product-list'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 3. Woocommerce Product Search.
    array(
        'title'       => __('Woocommerce Product Search', 'unlimited-theme-addons'),
        'description' => __('Add Woocommerce product search with category. You can change style from option panel.', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-search',
        'default'     => array_key_exists('woocommerce-product-search', $widget_list) && 'off' == $widget_list['woocommerce-product-search'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 4. Section Title.
    array(
        'title'       => __('Section Title', 'unlimited-theme-addons'),
        'description' => __('Get beautify section title. No codeing skill required to work on this addons.', 'unlimited-theme-addons'),
        'name'        => 'section-title',
        'default'     => array_key_exists('section-title', $widget_list) && 'off' == $widget_list['section-title'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 5. Team.
    array(
        'title'       => __('Team', 'unlimited-theme-addons'),
        'description' => __('There has huge number of team style in free. Just make the best design and enjoy with it.', 'unlimited-theme-addons'),
        'name'        => 'team',
        'default'     => array_key_exists('team', $widget_list) && 'off' == $widget_list['team'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 6. Testimonial.
    array(
        'title'       => __('Testimonial', 'unlimited-theme-addons'),
        'description' => __('Build up outstanding testimonial design with Elementor. Multiple option panel to manage it.', 'unlimited-theme-addons'),
        'name'        => 'testimonial',
        'default'     => array_key_exists('testimonial', $widget_list) && 'off' == $widget_list['testimonial'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 7. Video.
    array(
        'title'       => __('Video', 'unlimited-theme-addons'),
        'description' => __('Make popup video box. You can show any youtube video on here.', 'unlimited-theme-addons'),
        'name'        => 'video',
        'default'     => array_key_exists('video', $widget_list) && 'off' == $widget_list['video'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 8. Image Comparison.
    array(
        'title'       => __('Image Comparison', 'unlimited-theme-addons'),
        'description' => __('Make image comparing design vertically and horizontally. Allow to customize label.', 'unlimited-theme-addons'),
        'name'        => 'image-comparison',
        'default'     => array_key_exists('image-comparison', $widget_list) && 'off' == $widget_list['image-comparison'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 9. Button.
    array(
        'title'       => __('Button', 'unlimited-theme-addons'),
        'description' => __('Setup the multiple style button for your webpage. Just add it to your page and select style.', 'unlimited-theme-addons'),
        'name'        => 'button',
        'default'     => array_key_exists('button', $widget_list) && 'off' == $widget_list['button'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 10. Infobox.
    array(
        'title'       => __('Infobox', 'unlimited-theme-addons'),
        'description' => __('Many pre-build infobox design for you. After add this addons just select your choosen style.', 'unlimited-theme-addons'),
        'name'        => 'infobox',
        'default'     => array_key_exists('infobox', $widget_list) && 'off' == $widget_list['infobox'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 11. Blog.
    array(
        'title'       => __('Blog', 'unlimited-theme-addons'),
        'description' => __('Make awesome blog grid for your website. Choose ASC/DESC order according to your need.', 'unlimited-theme-addons'),
        'name'        => 'blog',
        'default'     => array_key_exists('blog', $widget_list) && 'off' == $widget_list['blog'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 12. Company Logo.
    array(
        'title'       => __('Company Logo', 'unlimited-theme-addons'),
        'description' => __('We have added a huge number of company logo style in free. Just choose your style.', 'unlimited-theme-addons'),
        'name'        => 'company-logo',
        'default'     => array_key_exists('company-logo', $widget_list) && 'off' == $widget_list['company-logo'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 13. Pricing.
    array(
        'title'       => __('Pricing', 'unlimited-theme-addons'),
        'description' => __('Three type of pricing table added for your. Now make flexible pricing plan for customer.', 'unlimited-theme-addons'),
        'name'        => 'pricing',
        'default'     => array_key_exists('pricing', $widget_list) && 'off' == $widget_list['pricing'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

    // 14. Counter Up.
    array(
        'title'       => __('Counter Up', 'unlimited-theme-addons'),
        'description' => __('Responsive counter up option to show up your business statistics. ', 'unlimited-theme-addons'),
        'name'        => 'counter',
        'default'     => array_key_exists('counter', $widget_list) && 'off' == $widget_list['counter'] ? 'off' : 'on',
        'is_free'     => 1,
    ),

	// 15. Woocommerce Product Carousel.
    array(
        'title'       => __('Countdown Pro', 'unlimited-theme-addons'),
        'description' => __('Get unlimited countdown prebuild layout.', 'unlimited-theme-addons'),
        'name'        => 'woocommerce-product-carousel',
        'default'     => array_key_exists('counter', $widget_list) && 'off' == $widget_list['counter'] ? 'off' : 'on',
        'is_free'     => 0,
    ),

);


?>


<div class="uta-widget-list">
    <form action="" id="formData" method="post">
        <button type="button" class="btn btn-primary uta-action-btn">Save Changes</button>
        <button class="btn btn-primary uta-action-btn-loading" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Savings...
        </button>
        <div class="row">
            <?php foreach ( $uta_widget_lists as $widget ) { ?>
                <div class="col-md-4">
                    <div class="uta-single-widget">
                        <?php if ( 0 == $widget['is_free'] ) { ?><span class="badge bg-primary">Upgrade Pro</span> <?php  } ?>
                        <div class="widget-label">
                            <h5><?php echo esc_html($widget['title']) //ignore:phpcs ;?></h5>
                            <span><?php echo esc_html($widget['description']); //ignore:phpcs ?></span>
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