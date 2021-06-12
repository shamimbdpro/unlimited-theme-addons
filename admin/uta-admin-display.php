<div class="uta-admin-wrapper wrap">
    <h1>Unlimited Theme Addons</h1>

    <div class="uta-admin-content card-body mw-100">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> <span class="dashicons dashicons-admin-home"></span> Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#widgets" type="button" role="tab" aria-controls="profile" aria-selected="false"> <span class="dashicons dashicons-tagcloud"></span> Widgets</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"> <span class="dashicons dashicons-pets"></span> Support</button>
            </li>
        </ul>
        <div class="tab-content bg-white" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/home.php'); ?>
            </div>


            <div class="tab-pane fade" id="widgets" role="tabpanel" aria-labelledby="profile-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/widgets.php'); ?>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php include_once(UTA_PLUGIN_PATH . 'admin/template/support.php'); ?>
            </div>
        </div>
    </div>
</div>


<style>
    .uta-admin-content {
        background: #f9f9f9;
        margin-top: 20px;
    }

    .uta-single-widget {
        display: flex;
        justify-content: space-around;
        background: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px;
        align-items: center;
        position: relative;
        box-shadow: 0px -1px 17px 4px #eee;
        border-radius: 15px;
    }

    .uta-single-widget .badge {
        position: absolute;
        top: -10px;
        right: 20px;
    }


    input[type=checkbox]:disabled{
        opacity: 0;
    }
    .onoffswitch {
        position: relative;
        width: 90px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #796EFF;
        border-radius: 20px;
    }

    .onoffswitch-inner {
        display: block;
        width: 200%;
        margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }

    .onoffswitch-inner:before,
    .onoffswitch-inner:after {
        display: block;
        float: left;
        width: 50%;
        height: 29px;
        padding: 0;
        line-height: 29px;
        font-size: 14px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        box-sizing: border-box;
    }

    .onoffswitch-inner:before {
        content: "ON";
        padding-left: 10px;
        background-color: #796EFF;
        color: #FFFFFF;
    }

    .onoffswitch-inner:after {
        content: "OFF";
        padding-right: 10px;
        background-color: #EEEEEE;
        color: #796EFF;
        text-align: right;
    }

    .onoffswitch-switch {
        display: block;
        width: 18px;
        margin: 5.5px;
        background: #FFFFFF;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 57px;
        border: 2px solid #796EFF;
        border-radius: 20px;
        transition: all 0.3s ease-in 0s;
    }

    .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-switch {
        right: 0px;
    }
</style>