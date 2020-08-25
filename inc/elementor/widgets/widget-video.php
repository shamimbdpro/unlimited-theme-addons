<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Call to Action
class cpthelper_Widget_Video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'Video', 'cpthelper' );
   }
 
   public function get_icon() { 
        return 'eicon-play';
   }
 
   public function get_categories() {
      return [ 'cpthelper-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video Image', 'cpthelper' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'overlay',
         [
            'label' => __( 'Overlay', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#',
         ]
      );

      $this->add_control(
         'play_button',
         [
            'label' => __( 'Play Button URL', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="cpthelper-video-popup" style="background-image: url( <?php echo esc_url( $settings['image']['url'] ); ?> );">
         <div class="cpthelper-video-popup-overlay" style="background: <?php echo esc_attr( $settings['overlay'] ); ?>;">
            <a class="cpthelper-popup-video" href="<?php echo esc_url( $settings['play_button'] ); ?>">
               <span class="cpthelper-popup-icon"><i class="fa fa-play"></i></span>
            </a>
         </div>
      </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new cpthelper_Widget_Video );