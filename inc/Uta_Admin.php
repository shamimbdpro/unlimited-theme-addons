<?php

/**
 * Class Uta_helpers
 */
class Uta_Admin{

    private static $instance = null;
    public static function get_instance() {
        if ( ! self::$instance )
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Initialize global hooks.
     */
    public function init(){
        add_action( 'admin_menu', [ $this, 'register_admin_menu_callback' ]);
    }

    /**
     * @param $html
     * @param $rating
     * @param $count
     * @return string
     */
    public function register_admin_menu_callback() {
       add_menu_page('Unlimited Theme Addons', 'Unlimited Theme Addons', 'manage_options', 'unlimited-theme-addons', [ $this, 'uta_admin_page_callback' ], '', 25);
    }


    public function uta_admin_page_callback(){
        echo "Test";
    }

}

Uta_Admin::get_instance()->init();


