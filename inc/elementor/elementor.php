<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// get posts dropdown
function digitalshop_get_portfolio_dropdown_array($args = [], $key = 'ID', $value = 'post_title') {
  $options = [];
  $posts = get_posts($args);
  foreach ((array) $posts as $term) {
    $options[$term->{$key}] = $term->{$value};
  }
  return $options;
}

function digitalshop_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'digitalshop-elements',
		[
			'title' => esc_html__( 'digitalshop Elements', 'digitalshop' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'digitalshop_add_elementor_widget_categories' );

   function load_css_and_js(){
    wp_enqueue_style( 'digitalshop-product-gird', plugin_dir_url( __FILE__ ) . '/assets/frontend/product-grid.css' );
   }

   add_action( 'wp_enqueue_scripts', 'load_css_and_js' );

//Elementor init

class digitalshop_ElementorCustomElement {
 
   private static $instance = null;
 
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }
 
   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {
 
    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){      
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
 
digitalshop_ElementorCustomElement::get_instance()->init();