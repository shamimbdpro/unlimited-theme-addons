<?php
if ( ! defined('ABSPATH')) exit;
/**
 * Class Unlimited_Theme_Addons
 */
//Elementor init

class Unlimited_Theme_Addons
{

    private static $instance = null;
    public static function get_instance() {
        if ( ! self::$instance)
            self::$instance = new self();
        return self::$instance;
    }
    public function init() {
        $this->register_hooks();
    }

    public function uta_add_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'uta-elements',
            [
                'title' => esc_html__('uta Elements', 'unlimited-theme-addons'),
                'icon'  => 'fa fa-plug',
            ]
        );
    }

    public function register_hooks() {
        add_action('elementor/elements/categories_registered', array( $this, 'uta_add_elementor_widget_categories' ));
        add_action('elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ));
        add_action('wp_enqueue_scripts', array( $this, 'load_css_and_js' ));
        if ( is_admin() ) {
            if ( ! empty($_REQUEST['action']) && 'elementor' === $_REQUEST['action'] ) {
                add_action('init', [ $this, 'load_wc_hooks' ], 5);
            }
        }
    }

    public function load_css_and_js() {

        // load css
        wp_enqueue_style(
            'uta-library',
            UTA_PLUGIN_URL . 'assets/frontend/css/css-library.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        wp_enqueue_style(
            'uta-style',
            UTA_PLUGIN_URL . 'assets/frontend/css/uta-style.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Load Js
        wp_enqueue_script(
            'uta-magnific-popup',
            UTA_PLUGIN_URL . 'assets/frontend/js/magnific-popup.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            'uta-slick',
            UTA_PLUGIN_URL . 'assets/frontend/js/slick.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            'uta-jquery-event-move',
            UTA_PLUGIN_URL . 'assets/frontend/js/jquery.event.move.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            'uta-twentytwenty',
            UTA_PLUGIN_URL . 'assets/frontend/js/jquery.twentytwenty.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            'uta-skip-link-focus-fix',
            UTA_PLUGIN_URL . 'assets/frontend/js/skip-link-focus-fix.js',
            array(),
            UTA_PLUGIN_VERSION,
            true
        );
        wp_enqueue_script(
            'uta-main',
            UTA_PLUGIN_URL . 'assets/frontend/js/main.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );
    }

    public function widgets_registered() {

        // We check if the Elementor plugin has been installed / activated.
        if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {

            $widget_list = get_option('unlimited_theme_addons_active_widgets') == ! '' ? get_option('unlimited_theme_addons_active_widgets') : array();

            // Blog.
            if ( array_key_exists('blog', $widget_list) && 'off' !== $widget_list['blog'] || empty($widget_list['blog']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/blog/Uta_Blog.php');
            }

            // Button.
            if ( array_key_exists('button', $widget_list) && 'off' !== $widget_list['button'] || empty($widget_list['button']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/button/Uta_Button.php');
            }

            // Product grid.
            if ( array_key_exists('woocommerce-product-grid', $widget_list) && 'off' !== $widget_list['woocommerce-product-grid'] || empty($widget_list['woocommerce-product-grid']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/Trait/Uta_theme_helper.php');
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/product-grid/template/Product_Grid.php');
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/product-grid/Uta_Product_Gird.php');
            }

            // Product list.
            if ( array_key_exists('woocommerce-product-list', $widget_list) && 'off' !== $widget_list['woocommerce-product-list'] || empty($widget_list['woocommerce-product-list']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/product-list/template/Uta_Product_List_Display.php');
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/product-list/Uta_Product_List.php');
            }

            // Search.
            if ( array_key_exists('woocommerce-product-search', $widget_list) && 'off' !== $widget_list['woocommerce-product-search'] || empty($widget_list['woocommerce-product-search']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/search/Uta_Search.php');
            }

            // Pricing.
            if ( array_key_exists('pricing', $widget_list) && 'off' !== $widget_list['pricing'] || empty($widget_list['pricing']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/pricing/Uta_Pricing.php');
            }

            // Infobox.
            if ( array_key_exists('infobox', $widget_list) && 'off' !== $widget_list['infobox'] || empty($widget_list['infobox']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/infobox/Uta_Infobox.php');
            }

            // Image comparison.
            if ( array_key_exists('image-comparison', $widget_list) && 'off' !== $widget_list['image-comparison'] || empty($widget_list['image-comparison']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/twentytwenty/Uta_Twentytwenty.php');
            }

            // Team.
            if ( array_key_exists('team', $widget_list) && 'off' !== $widget_list['team'] || empty($widget_list['team']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/team/Uta_Team.php');
            }

            // Testimonial.
            if ( array_key_exists('testimonial', $widget_list) && 'off' !== $widget_list['testimonial'] || empty($widget_list['testimonial']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/testimonials/Uta_Testimonials.php');
            }

            // Title
            if ( array_key_exists('section-title', $widget_list) && 'off' !== $widget_list['section-title'] || empty($widget_list['section-title']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/title/Uta_Title.php');
            }

            // Video
            if ( array_key_exists('video', $widget_list) && 'off' !== $widget_list['video'] || empty($widget_list['video']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/video/Uta_Video.php');
            }


            // Client Logo.
            if ( array_key_exists('company-logo', $widget_list) && 'off' !== $widget_list['company-logo'] || empty($widget_list['company-logo']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/client-logo/Uta_Client_Logo.php');
            }

            // Counter Up
            if ( array_key_exists('counter', $widget_list) && 'off' !== $widget_list['counter'] || empty($widget_list['counter']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/counterup/Uta_counterup.php');
            }
        }
    }

    public function load_wc_hooks() {
        if ( class_exists('WooCommerce') ) {
            wc()->frontend_includes();
        }
    }
}

Unlimited_Theme_Addons::get_instance()->init();
