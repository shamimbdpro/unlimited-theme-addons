<?php
$uta_widget_lists = array(

    // 1. Woocommerce product grid.
    array(
        'title' => __('Woocommerce Product List', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-product-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Woocommerce Product List', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-product-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Woocommerce Product Search', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prodduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Section Title', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-profduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Team', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prod2uct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Testimonial', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prroduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Video', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prweroduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Image Comparison', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-preroduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Button', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prortduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Infobox', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prodrtuct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Blog', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prroduct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Company Logo', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-prodguct-grid',
        'default' => 1,
        'is_free' => 1,
    ),

    // 1. Woocommerce product grid.
    array(
        'title' => __('Pricing', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-product-grid2',
        'default' => 1,
        'is_free' => 0,
    ),

      // 1. Woocommerce product grid.
      array(
        'title' => __('Couter Up', 'unlimited-theme-addons'),
        'description' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
        'name'  => 'woocommerce-product-grid2',
        'default' => 1,
        'is_free' => 1,
    ),

)
?>


<div class="uta-widget-list">
    <div class="row">
        <?php foreach ($uta_widget_lists as $widget) { ?>
            <div class="col-md-4">
                <div class="uta-single-widget">
                    <?php if (0 == $widget['is_free']) { ?><span class="badge bg-primary">Upgrade Pro</span> <?php  } ?>
                    <div class="widget-label">
                        <h5><?php echo $widget['title']; ?></h5>
                        <span><?php echo $widget['description']; ?></span>
                    </div>
                    <div class="widget-witch">
                        <div class="onoffswitch">
                            <input type="checkbox" name="<?php echo $widget['name']; ?>" class="onoffswitch-checkbox" id="<?php echo $widget['name']; ?>" tabindex="0" <?php echo 1 == $widget['default'] && 1 == $widget['is_free'] ? 'checked' : ''; ?> <?php echo 0 == $widget['is_free'] ? 'disabled' : '';?>>
                            <label class="onoffswitch-label" for="<?php echo $widget['name']; ?>">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>