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
    public static function get_instance() {
        if ( ! self::$instance)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Initialize global hooks.
     */
    public function init() {
        // Create admin menu.
        add_action('admin_menu', [ $this, 'register_admin_menu_callback' ]);

        // Load css and js.
        add_action('admin_enqueue_scripts', array( $this, 'uta_admin_script_callback' ));

        // Handle widget form submission.
        add_action('wp_ajax_uta_admin_widgets_save', array( $this, 'uta_admin_widgets_save_callback' ));

        // Handle addons form submission.
        add_action('wp_ajax_uta_admin_addons_save', array( $this, 'uta_admin_addons_save_callback' ));
    }

    /**
     * @param $html
     * @param $rating
     * @param $count
     * @return string
     */
    public function register_admin_menu_callback() {
        add_menu_page(
            esc_html__('Unlimited Theme Addons', 'unlimited-theme-addons'),
            esc_html__('Theme Addons', 'unlimited-theme-addons'),
            'manage_options',
            'unlimited-theme-addons',
            array( $this, 'uta_admin_page_callback' ),
            'dashicons-insert',
            25
        );

        add_action('admin_head', [ $this, 'uta_remove_admin_action' ]);
    }


    /**
     * Admin menu page callback.
     * 
     * @return mixed
     */
    public function uta_admin_page_callback() {
        wp_enqueue_style('uta-bootstrap');
        wp_enqueue_style('uta-admin-style');
        wp_enqueue_script('uta-bootstrap-script');
        wp_enqueue_script('uta-admin-js');
        include_once(UTA_PLUGIN_PATH . 'admin/uta-admin-display.php');
    }

    /**
     * Remove admin notices in admin page.
     * 
     * @return array|mixed.
     */
    public function uta_remove_admin_action() {
        remove_all_actions('user_admin_notices');
        remove_all_actions('admin_notices');
    }

    /**
     * load admin style and script.
     * 
     * @return string.
     */
    public function uta_admin_script_callback() {

        // Load bootstrap library CSS.
        wp_register_style('uta-bootstrap', UTA_PLUGIN_URL . '/assets/admin/css/bootstrap.min.css', array(), UTA_PLUGIN_VERSION);

        // Load admin CSS
        wp_register_style('uta-admin-style', UTA_PLUGIN_URL . '/assets/frontend/css/admin-style.min.css', array(), UTA_PLUGIN_VERSION);

        // Load bootstrap JS.
        wp_register_script('uta-bootstrap-script', UTA_PLUGIN_URL . '/assets/admin/js/bootstrap.bundle.min.js', array( 'jquery' ), UTA_PLUGIN_VERSION, true);

        // Load admin JS.
        wp_register_script('uta-admin-js', UTA_PLUGIN_URL . '/assets/frontend/js/admin-script.js', array( 'jquery' ), UTA_PLUGIN_VERSION, true);

        // Ajax admin localization.
        $uta_admin_nonce = wp_create_nonce('uta-admin-js');
        wp_localize_script(
            'uta-admin-js',
            'uta_admin_ajax_object',
            array(
                'uta_admin_ajax_url' => admin_url('admin-ajax.php'),
                'nonce'              => $uta_admin_nonce,
            )
        );
    }

    /**
     * Handle admin ajax submission.
     * 
     * @return array
     */
    function uta_admin_widgets_save_callback() {

        $widget_lists = isset($_POST['widget_lists']) ? sanitize_text_field(wp_unslash($_POST['widget_lists'])) : array();
        if ( $widget_lists ) {
            
            // Check valid request form user.
            check_ajax_referer('uta-admin-js');

            parse_str($widget_lists, $get_widget_lists);

            foreach ( $get_widget_lists as $key => $value ) {
                $data[ $key ] = $value;
            }
            update_option('unlimited_theme_addons_active_widgets', $data);

            $response['message'] = 'sucess';
            wp_send_json_success($response);
        }

        wp_die();
    }



    /**
     * Hanle ajax form submission for adodns setitngs.
     * 
     * @return array
     */
    function uta_admin_addons_save_callback() {

        $addon_lists = isset($_POST['addon_lists']) ? sanitize_text_field(wp_unslash($_POST['addon_lists'])) : array();
        if ( $addon_lists ) {
            
            // Check valid request form user.
            check_ajax_referer('uta-admin-js');

            parse_str($addon_lists, $get_addon_lists);

            foreach ( $get_addon_lists as $key => $value ) {
                $data[ $key ] = $value;
            }
            update_option('unlimited_theme_addons_active_addons', $data);

            $response['message'] = 'success';
            wp_send_json_success($response);
        }

        wp_die();
    }


}


Uta_Admin::get_instance()->init();
