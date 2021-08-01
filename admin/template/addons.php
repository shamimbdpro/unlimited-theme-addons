<?php

$get_addons_list = get_option('unlimited_theme_addons_active_addons') == ! '' ? get_option('unlimited_theme_addons_active_addons') : array();

$uta_addon_lists = array(

    // 1. Hide Admin Bar.
    array(
        'title'       => __('Hide Admin Bar in Frontend', 'unlimited-theme-addons'),
        'description' => __('Hide admin bar in frontend while login user.'),
        'name'        => 'hide-admin-bar',
        'default'     => array_key_exists('hide-admin-bar', $get_addons_list) && 'off' == $get_addons_list['hide-admin-bar'] ||  empty($get_addons_list['hide-admin-bar']) ? 'off' : 'on',
        'is_free'     => 1,
    ),

);


?>


<div class="uta-widget-list">
    <form action="" id="saveAddons" method="post">
    <button type="button" class="btn btn-primary uta-action-btn">Save Changes</button>
        <button class="btn btn-primary uta-action-btn-loading" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Savings...
        </button>
        <div class="row">
            <?php foreach ( $uta_addon_lists as $addon_list ) { ?>
                <div class="col-md-4">
                    <div class="uta-single-widget">
                        <?php if ( 0 == $addon_list['is_free'] ) { ?><span class="badge bg-primary">Upgrade Pro</span> <?php  } ?>
                        <div class="widget-label">
                            <h5><?php echo esc_html($addon_list['title']) //ignore:phpcs ;?></h5>
                            <span><?php echo esc_html($addon_list['description']); //ignore:phpcs ?></span>
                        </div>
                        <div class="widget-witch">
                            <div class="onoffswitch">
                                <input type="checkbox" name="<?php echo esc_html( $addon_list['name'] ); ?>" class="onoffswitch-checkbox" id="<?php echo esc_html( $addon_list['name'] ); ?>" tabindex="0" <?php echo 'on' == $addon_list['default'] && 1 == $addon_list['is_free'] ? 'checked' : ''; ?> <?php echo 0 == $addon_list['is_free'] ? 'disabled' : ''; ?>>
                                <label class="onoffswitch-label" for="<?php echo esc_html( $addon_list['name'] ); ?>">
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
