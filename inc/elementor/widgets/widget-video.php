<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Call to Action
class digitalshop_Widget_Video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'Video', 'digitalshop' );
   }
 
   public function get_icon() { 
        return 'eicon-play';
   }
 
   public function get_categories() {
      return [ 'digitalshop-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video Image', 'digitalshop' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'overlay',
         [
            'label' => __( 'Overlay', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#',
         ]
      );

      $this->add_control(
         'play_button',
         [
            'label' => __( 'Play Button URL', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="digitalshop-video-popup" style="background-image: url( <?php echo esc_url( $settings['image']['url'] ); ?> );">
         <div class="digitalshop-video-popup-overlay" style="background: <?php echo esc_attr( $settings['overlay'] ); ?>;">
            <a class="digitalshop-popup-video" href="<?php echo esc_url( $settings['play_button'] ); ?>">
               <span class="digitalshop-popup-icon"><i class="fa fa-play"></i></span>
            </a>
         </div>
      </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new digitalshop_Widget_Video );