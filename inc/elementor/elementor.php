<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// get posts dropdown
function cpthelper_get_portfolio_dropdown_array( $args = [], $key = 'ID', $value = 'post_title' ) {
  $options = [];
  $posts = get_posts($args);
  foreach ( (array) $posts as $term ) {
    $options[ $term->{$key} ] = $term->{$value};
  }
  return $options;
}

function cpthelper_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'cpthelper-elements',
		[
			'title' => esc_html__( 'cpthelper Elements', 'unlimited-theme-addons' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'cpthelper_add_elementor_widget_categories' );

   function load_css_and_js(){
   $plugin_dir_url = plugin_dir_url( __FILE__ );

    // load css
    wp_enqueue_style( 'uta-magnific-popup',  $plugin_dir_url . '/assets/frontend/css/magnific-popup.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-imagetooltip', $plugin_dir_url . '/assets/frontend/css/imagetooltip.min.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-slick', $plugin_dir_url . '/assets/frontend/css/slick.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-slick-theme', $plugin_dir_url . '/assets/frontend/css/slick-theme.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_enqueue_style( 'uta-product-gird', $plugin_dir_url . '/assets/frontend/css/product-grid.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-load-more', $plugin_dir_url . '/assets/frontend/css/load-more.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-blog', $plugin_dir_url . '/assets/frontend/css/post.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'uta-testimonial', $plugin_dir_url . '/assets/frontend/css/testimonial.css', array(), wp_get_theme()->get( 'Version' ) );
   


    // Load Js
    wp_enqueue_script( 'uta-counter', $plugin_dir_url . '/assets/frontend/js/counterup.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-magnific-popup', $plugin_dir_url . '/assets/frontend/js/magnific-popup.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-imagetooltip', $plugin_dir_url . '/assets/frontend/js/imagetooltip.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-waypoints', $plugin_dir_url . '/assets/frontend/js/waypoints.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-isotope', $plugin_dir_url . '/assets/frontend/js/isotope.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-slick', $plugin_dir_url . '/assets/frontend/js/slick.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-skip-link-focus-fix', $plugin_dir_url . '/assets/frontend/js/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'uta-themeplace-main', $plugin_dir_url . '/assets/frontend/js/main.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

   }

   add_action( 'wp_enqueue_scripts', 'load_css_and_js' );

//Elementor init

class Uta_ElementorCustomElement {
 
   private static $instance = null;
 
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self();
      return self::$instance;
   }
 
   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {
 
    // We check if the Elementor plugin has been installed / activated.
    if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {      
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-accordion.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-banner.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-blog.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-button.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-download.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-newest.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/Trait/Codepopular_theme_helper.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/template/Product_Grid.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-product-gird.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-pricing.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-service.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-team.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-testimonials.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-title.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-video.php');
      }
	}

}
 
Uta_ElementorCustomElement::get_instance()->init();