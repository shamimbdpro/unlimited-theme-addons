<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Unlimited_Theme_Addons
 */
//Elementor init

class Unlimited_Theme_Addons {

   private static $instance = null;
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self();
      return self::$instance;
   }
   public function init(){
      $this->register_hooks();
   }

    public function uta_add_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'uta-elements',
            [
                'title' => esc_html__( 'uta Elements', 'unlimited-theme-addons' ),
                'icon'  => 'fa fa-plug',
            ]
        );

    }

    public function register_hooks() {
        add_action( 'elementor/elements/categories_registered', array( $this, 'uta_add_elementor_widget_categories' ) );
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_css_and_js' ) );
        if ( is_admin() ) {
            if ( ! empty($_REQUEST['action']) && 'elementor' === $_REQUEST['action'] ) {
                add_action('init', [ $this, 'load_wc_hooks' ], 5);
            }
        }
    }

    public function load_css_and_js(){

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

          // Blog.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/blog/Uta_Blog.php');

         // Button.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/button/Uta_Button.php');

        // Product grid.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/Trait/Uta_theme_helper.php');
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/product-grid/template/Product_Grid.php');
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/product-grid/Uta_Product_Gird.php');

         // Product list.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/product-list/template/Uta_Product_List_Display.php');
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/product-list/Uta_Product_list.php');

        // Pricing.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/pricing/Uta_Pricing.php');

        // Infobox.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/infobox/Uta_Infobox.php');

        // Image comparison.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/twentytwenty/Uta_Twentytwenty.php');

        // Blog.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/team/Uta_Team.php');

        // Testimonial.
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/testimonials/Uta_Testimonials.php');

        // Title
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/title/Uta_title.php');

        // Video
         include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/video/Uta_Video.php');

         // Client Logo.
//        include_once( UTA_PLUGIN_PATH .'inc/elementor/widgets/client-logo/Uta_client_logo.php');

      }
	}

    public function load_wc_hooks() {
        if ( class_exists('WooCommerce') ) {
            wc()->frontend_includes();
        }
    }
}

Unlimited_Theme_Addons::get_instance()->init();