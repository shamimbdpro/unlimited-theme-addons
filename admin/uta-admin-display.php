<div class="uta-admin-wrapper wrap">
    <h1>Unlimited Theme Addon</h1>

    <div class="uta-admin-content card-body mw-100">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> <span class="dashicons dashicons-admin-home"></span> Home</button>
            </li> -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#widgets" type="button" role="tab" aria-controls="profile" aria-selected="false"> <span class="dashicons dashicons-tagcloud"></span> Widgets</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="addons-tab" data-bs-toggle="tab" data-bs-target="#addons" type="button" role="tab" aria-controls="contact" aria-selected="false"> <span class="dashicons dashicons-book"></span> Addons</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <span class="dashicons dashicons-pets"></span> Support</button>
            </li>

            <?php if ( Uta_helpers::is_uta_pro_installed() == false ) {?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premium" type="button" role="tab" aria-controls="premium" aria-selected="false"> <span class="dashicons dashicons-money-alt"></span> Try Pro with $29.79</button>
            </li>
            <?php } ?>
        
        </ul>
        <ul>
        </ul>
        <div class="tab-content bg-white" id="myTabContent">

            <div class="tab-pane fade show active" id="widgets" role="tabpanel" aria-labelledby="profile-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/widgets.php'); ?>
            </div>

            <div class="tab-pane fade" id="addons" role="tabpanel" aria-labelledby="addons-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/addons.php'); ?>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/support.php'); ?>
            </div>

            <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="premium-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/premium.php'); ?>
            </div>

        </div>
    </div>
</div>