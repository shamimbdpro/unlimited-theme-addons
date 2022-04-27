<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly
// Call to Action
class Uta_Video extends Widget_Base
{

   public function get_name() {
      return 'uta-video';
   }

   public function get_title() {
      return esc_html__('UTA Video', 'unlimited-theme-addons');
   }

   public function get_icon() {
      return 'eicon-play';
   }

   /**
    * Widget CSS.
    * 
    * @return string
    */
   // public function get_style_depends()
   // {
   //    $styles = ['magnific-popup','uta-video'];

   //    return $styles;
   // }

   /**
    * Widget script.
    * 
    * @return string
    */
   public function get_script_depends() {
      $scripts = [ 'uta-magnific-popup', 'uta-main' ];

      return $scripts;
   }


   public function get_keywords() {
      return [
		  'video',
		  'uta video',
		  'uta',
		  'video widget',
		  'widget',
		  'addons',
		  'video addons',
		  'unlimited theme addons',
      ];
   }

   public function get_categories() {
      return [ 'uta-elements' ];
   }

   /**
    * Retrieve Widget Support URL.
    *
    * @access public
    *
    * @return string support URL.
    */
   public function get_custom_help_url() {
      return 'https://codepopular.com/contact/';
   }

   protected function register_controls() {

      $this->start_controls_section(
         'video_section',
         [
			 'label' => esc_html__('Video Image', 'unlimited-theme-addons'),
			 'type'  => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'image',
         [
			 'label'   => __('Choose Photo', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::MEDIA,
			 'default' => [
				 'url' => \Elementor\Utils::get_placeholder_image_src(),
			 ],
         ]
      );

      $this->add_control(
         'overlay',
         [
			 'label'   => __('Overlay', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::COLOR,
			 'default' => '#',
         ]
      );

      $this->add_control(
         'play_button',
         [
			 'label' => __('Play Button URL', 'unlimited-theme-addons'),
			 'type'  => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {

      // get our input from the widget settings.

      $settings = $this->get_settings_for_display(); ?>

      <div class="uta-video-popup" style="background-image: url( <?php echo esc_url($settings['image']['url']); ?> );">
         <div class="uta-video-popup-overlay" style="background: <?php echo esc_attr($settings['overlay']); ?>;">
            <a class="uta-popup-video" href="<?php echo esc_url($settings['play_button']); ?>">
               <span class="uta-popup-icon"><i class="fa fa-play"></i></span>
            </a>
         </div>
      </div>
<?php
   }
}
Plugin::instance()->widgets_manager->register_widget_type(new Uta_Video());
