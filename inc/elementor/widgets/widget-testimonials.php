<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class uta_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'UTA Testimonials', 'unlimited-theme-addons' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'uta-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonials_section',
         [
			 'label' => esc_html__( 'Testimonials', 'unlimited-theme-addons' ),
			 'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
			 'label' => __( 'Choose Photo', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::MEDIA,
			 'default' => [
				 'url' => \Elementor\Utils::get_placeholder_image_src(),
			 ],
         ]
      );
      
      $repeater->add_control(
         'name',
         [
			 'label' => __( 'Name', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
			 'label' => __( 'Designation', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
			 'label' => __( 'Testimonial', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXTAREA,
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
			 'label' => __( 'Testimonial List', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::REPEATER,
			 'fields' => $repeater->get_controls(),
			 'title_field' => '{{{name}}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      
      <div class="testimonials">
         <?php foreach ( $settings['testimonial_list'] as $index => $testimonial ) :
         $testimonialText = $this->get_repeater_setting_key( 'testimonial' , 'testimonial_list' , $index );
         $name = $this->get_repeater_setting_key( 'name' , 'testimonial_list' , $index );         
         $designation = $this->get_repeater_setting_key( 'designation' , 'testimonial_list' , $index );
         $this->add_inline_editing_attributes( $testimonialText , 'basic' );
         $this->add_inline_editing_attributes( $name , 'basic' );         
         $this->add_inline_editing_attributes( $designation , 'basic' ); ?>
         <div class="testimonial-item">
            <div class="row justify-content-center">
               <div class="col-sm-9 text-center">
                  <img src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
                  <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>><?php echo esc_html( $testimonial['testimonial'] ); ?></p>
                  <h5 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h5>
                  <span <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></span>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
      </div>

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new uta_Widget_Testimonials() );