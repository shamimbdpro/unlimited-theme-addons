<?php

/**
 * Class Uta_Admin
 */
class Uta_Admin
{

    private static $instance = null;

    /**
     * Make instance of the admin class.
     */
    public static function get_instance()
    {
        if (!self::$instance)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Initialize global hooks.
     */
    public function init()
    {
        // Create admin menu.
        add_action('admin_menu', [$this, 'register_admin_menu_callback']);

        // Load css and js.
        add_action('admin_enqueue_scripts', array($this, 'uta_admin_script_callback'));
    }

    /**
     * @param $html
     * @param $rating
     * @param $count
     * @return string
     */
    public function register_admin_menu_callback()
    {
        add_menu_page(
            esc_html__('Unlimited Theme Addons', 'unlimited-theme-addons'),
            esc_html__('Theme Addons', 'unlimited-theme-addons'),
            'manage_options',
            'unlimited-theme-addons',
            array($this, 'uta_admin_page_callback'),
            'dashicons-insert',
            25
        );

        add_action('admin_head', [$this, 'uta_remove_admin_action']);
    }


    /**
     * Admin menu page callback.
     * 
     * @return mixed
     */
    public function uta_admin_page_callback()
    {
      wp_enqueue_style('uta-bootstrap');
      wp_enqueue_script('uta-bootstrap-script');
      include_once(UTA_PLUGIN_PATH . 'admin/uta-admin-display.php');
    }

    /**
     * Remove admin notices in admin page.
     * 
     * @return array|mixed.
     */
    public function uta_remove_admin_action(){
        remove_all_actions('user_admin_notices');
        remove_all_actions('admin_notices');
    }

    /**
     * load admin style and script.
     * 
     * @return string.
     */
    public function uta_admin_script_callback(){
        wp_register_style('uta-bootstrap', UTA_PLUGIN_URL . '/assets/admin/css/bootstrap.min.css', array(), UTA_PLUGIN_VERSION);
        wp_register_script('uta-bootstrap-script', UTA_PLUGIN_URL . '/assets/admin/js/bootstrap.bundle.min.js', array('jquery'), UTA_PLUGIN_VERSION, true);
    }
}


Uta_Admin::get_instance()->init();
