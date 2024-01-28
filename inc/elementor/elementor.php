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

    public function register_controls() {

        // Include Controls
        require UTA_PLUGIN_PATH . 'inc/elementor/query.php';

        // Register Controls
        \Elementor\Plugin::instance()->controls_manager->register_control( 'uta-query', new Control_Query() );
    }

    public function register_hooks() {
        add_action('elementor/elements/categories_registered', array( $this, 'uta_add_elementor_widget_categories' ));
        add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
        add_action('elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ));
        add_action('wp_enqueue_scripts', array( $this, 'load_css_and_js' ));
        if ( is_admin() ) {
            if ( ! empty($_REQUEST['action']) && 'elementor' === $_REQUEST['action'] ) {
                add_action('init', [ $this, 'load_wc_hooks' ], 5);
            }
        }
    }

    public function load_css_and_js() {

        //----------- Load Library CSS ---------------//
        // Fonts Awesome.
        wp_register_style(
            'font-awesome',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/font-awesome.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Magnific Popup.
        wp_register_style(
            'magnific-popup',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/magnific-popup.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Slick Theme.
        wp_register_style(
            'slick-theme',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/slick-theme.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Slick Slider.
        wp_register_style(
            'slick',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/slick.min.css',
            array( 'slick-theme' ),
            UTA_PLUGIN_VERSION
        );

        // Twentytwenty Image comparison.
        wp_register_style(
            'twentytwenty',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/twentytwenty.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );


        //----------- Load Widget CSS ---------------//

        // Accordion.
        wp_register_style(
            'uta-blockquote',
            UTA_PLUGIN_URL . 'assets/frontend/css/blockquote.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Accordion. 
        wp_register_style(
            'uta-accordion',
            UTA_PLUGIN_URL . 'assets/frontend/css/accordion.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Button.
        wp_register_style(
            'uta-button',
            UTA_PLUGIN_URL . 'assets/frontend/css/button.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Company Logo.
        wp_register_style(
            'uta-company-logo',
            UTA_PLUGIN_URL . 'assets/frontend/css/company-logo.min.css',
            array( 'slick' ),
            UTA_PLUGIN_VERSION
        );


        // Counter Up. 
        wp_register_style(
            'uta-odometer',
            UTA_PLUGIN_URL . 'assets/frontend/css/library/odometer.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );


        // Counter Up. 
        wp_register_style(
            'uta-counter-up',
            UTA_PLUGIN_URL . 'assets/frontend/css/counterup.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

       

        // Infobox. 
        wp_register_style(
            'uta-infobox',
            UTA_PLUGIN_URL . 'assets/frontend/css/infobox.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Post. 
        wp_register_style(
            'uta-blog',
            UTA_PLUGIN_URL . 'assets/frontend/css/post.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Pricing. 
        wp_register_style(
            'uta-pricing',
            UTA_PLUGIN_URL . 'assets/frontend/css/pricing.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Product Grid. 
        wp_register_style(
            'uta-product-grid',
            UTA_PLUGIN_URL . 'assets/frontend/css/product-grid.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Product List. 
        wp_register_style(
            'uta-product-list',
            UTA_PLUGIN_URL . 'assets/frontend/css/product-list.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Search. 
        wp_register_style(
            'uta-product-search',
            UTA_PLUGIN_URL . 'assets/frontend/css/search.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Tab. 
        wp_register_style(
            'uta-tab',
            UTA_PLUGIN_URL . 'assets/frontend/css/tab.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Team. 
        wp_register_style(
            'uta-team',
            UTA_PLUGIN_URL . 'assets/frontend/css/team.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Testimonial. 
        wp_register_style(
            'uta-testimonial',
            UTA_PLUGIN_URL . 'assets/frontend/css/testimonial.min.css',
            array( 'slick' ),
            UTA_PLUGIN_VERSION
        );

        // Section Title. 
        wp_register_style(
            'uta-title',
            UTA_PLUGIN_URL . 'assets/frontend/css/title.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );

        // Video. 
        wp_register_style(
            'uta-video',
            UTA_PLUGIN_URL . 'assets/frontend/css/video.min.css',
            array(),
            UTA_PLUGIN_VERSION
        );




        //----------- Load JS ---------------//

        // video Popup.
        wp_register_script(
            'uta-magnific-popup',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/magnific-popup/magnific-popup.min.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Slick Slider.
        wp_register_script(
            'uta-slick',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/slick/slick.min.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Image Comparison Slider.
        wp_register_script(
            'uta-jquery-event-move',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/twentytwenty/jquery.event.move.min.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Counter
        wp_register_script(
            'uta-jquery-appear',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/counterup/jquery.appear.min.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Counter
        wp_register_script(
            'uta-odometer',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/counterup/odometer.min.js',
            array( 'jquery', 'uta-jquery-appear' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Image Comparison Slider.
        wp_register_script(
            'uta-twentytwenty',
            UTA_PLUGIN_URL . 'assets/frontend/js/library/twentytwenty/jquery.twentytwenty.min.js',
            array( 'jquery' ),
            UTA_PLUGIN_VERSION,
            true
        );

        // Unlimited Theme Addons Main JS.
        wp_register_script(
            'uta-main',
            UTA_PLUGIN_URL . 'assets/frontend/js/main.js',
            array( 'jquery', 'uta-magnific-popup', 'uta-slick', 'uta-jquery-event-move', 'uta-twentytwenty', 'uta-jquery-appear', 'uta-odometer' ),
            UTA_PLUGIN_VERSION,
            true
        );

        $widget_list = get_option('unlimited_theme_addons_active_widgets') == ! '' ? get_option('unlimited_theme_addons_active_widgets') : array();

        if ( array_key_exists('accordion', $widget_list) && 'off' !== $widget_list['accordion'] || empty($widget_list['accordion']) ) {
            wp_enqueue_style('uta-accordion');
        }

        if ( array_key_exists('blockquote', $widget_list) && 'off' !== $widget_list['blockquote'] || empty($widget_list['blockquote']) ) {
            wp_enqueue_style('uta-blockquote');
        }

        if ( array_key_exists('blog', $widget_list) && 'off' !== $widget_list['blog'] || empty($widget_list['blog']) ) {
            wp_enqueue_style('uta-blog');
        }

        if ( array_key_exists('button', $widget_list) && 'off' !== $widget_list['button'] || empty($widget_list['button']) ) {
            wp_enqueue_style('magnific-popup');
            wp_enqueue_style('uta-button');
        }

        if ( array_key_exists('woocommerce-product-grid', $widget_list) && 'off' !== $widget_list['woocommerce-product-grid'] || empty($widget_list['woocommerce-product-grid']) ) {
            wp_enqueue_style('uta-product-grid');
        }

        if ( array_key_exists('woocommerce-product-list', $widget_list) && 'off' !== $widget_list['woocommerce-product-list'] || empty($widget_list['woocommerce-product-list']) ) {
            wp_enqueue_style('uta-product-list');
        }

        if ( array_key_exists('woocommerce-product-search', $widget_list) && 'off' !== $widget_list['woocommerce-product-search'] || empty($widget_list['woocommerce-product-search']) ) {
            wp_enqueue_style('uta-product-search');
        }

        if ( array_key_exists('pricing', $widget_list) && 'off' !== $widget_list['pricing'] || empty($widget_list['pricing']) ) {
            wp_enqueue_style('uta-pricing');
        }

        if ( array_key_exists('infobox', $widget_list) && 'off' !== $widget_list['infobox'] || empty($widget_list['infobox']) ) {
            wp_enqueue_style('font-awesome');
            wp_enqueue_style('uta-infobox');
        }

        if ( array_key_exists('image-comparison', $widget_list) && 'off' !== $widget_list['image-comparison'] || empty($widget_list['image-comparison']) ) {
            wp_enqueue_style('twentytwenty');
        }

        if ( array_key_exists('team', $widget_list) && 'off' !== $widget_list['team'] || empty($widget_list['team']) ) {
            wp_enqueue_style('uta-team');
        }

        if ( array_key_exists('testimonial', $widget_list) && 'off' !== $widget_list['testimonial'] || empty($widget_list['testimonial']) ) {
            wp_enqueue_style('slick-theme');
            wp_enqueue_style('slick');
            wp_enqueue_style('uta-testimonial');
        }

        if ( array_key_exists('section-title', $widget_list) && 'off' !== $widget_list['section-title'] || empty($widget_list['section-title']) ) {
            wp_enqueue_style('uta-title');
        }


        if ( array_key_exists('video', $widget_list) && 'off' !== $widget_list['video'] || empty($widget_list['video']) ) {
            wp_enqueue_style('magnific-popup');
            wp_enqueue_style('uta-video');
        }

        if ( array_key_exists('company-logo', $widget_list) && 'off' !== $widget_list['company-logo'] || empty($widget_list['company-logo']) ) {
            wp_enqueue_style('slick-theme');
            wp_enqueue_style('slick');
            wp_enqueue_style('uta-company-logo');
        }

        if ( array_key_exists('counter', $widget_list) && 'off' !== $widget_list['counter'] || empty($widget_list['counter']) ) {
            wp_enqueue_style('uta-odometer');
            wp_enqueue_style('uta-counter-up');
        }



    }

    public function widgets_registered() {

        // We check if the Elementor plugin has been installed / activated.
        if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
            $widget_list = get_option('unlimited_theme_addons_active_widgets') == ! '' ? get_option('unlimited_theme_addons_active_widgets') : array();

            // Accordion.
            if ( array_key_exists('accordion', $widget_list) && 'off' !== $widget_list['accordion'] || empty($widget_list['accordion']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/accordion/Uta_Accordion.php');
            }


            // Blog.
            if ( array_key_exists('blog', $widget_list) && 'off' !== $widget_list['blog'] || empty($widget_list['blog']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/blog/Uta_Blog.php');
            }

            // Button.
            if ( array_key_exists('button', $widget_list) && 'off' !== $widget_list['button'] || empty($widget_list['button']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/button/Uta_Button.php');
            }

            include_once(UTA_PLUGIN_PATH . 'inc/elementor/Trait/Uta_theme_helper.php');

            // Product grid.
            if ( array_key_exists('woocommerce-product-grid', $widget_list) && 'off' !== $widget_list['woocommerce-product-grid'] || empty($widget_list['woocommerce-product-grid']) ) {

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

            // Counter Up
            if ( array_key_exists('blockquote', $widget_list) && 'off' !== $widget_list['blockquote'] || empty($widget_list['blockquote']) ) {
                include_once(UTA_PLUGIN_PATH . 'inc/elementor/widgets/blockquote/Uta_Blockquote.php');
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
