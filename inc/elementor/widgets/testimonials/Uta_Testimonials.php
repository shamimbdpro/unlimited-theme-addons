<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class Uta_Testimonials extends Widget_Base {

   public function get_name() {
      return 'uta-testimonials';
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
			 'type'  => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
			 'label'   => __( 'Choose Photo', 'unlimited-theme-addons' ),
			 'type'    => \Elementor\Controls_Manager::MEDIA,
			 'default' => [
				 'url' => \Elementor\Utils::get_placeholder_image_src(),
			 ],
         ]
      );

      $repeater->add_control(
         'name',
         [
			 'label' => __( 'Name', 'unlimited-theme-addons' ),
			 'type'  => \Elementor\Controls_Manager::TEXT,

         ]
      );

      $repeater->add_control(
         'designation',
         [
			 'label' => __( 'Designation', 'unlimited-theme-addons' ),
			 'type'  => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $repeater->add_control(
         'feedback',
         [
			 'label' => __( 'Testimonial', 'unlimited-theme-addons' ),
			 'type'  => \Elementor\Controls_Manager::TEXTAREA,
         ]
      );

      $this->add_control(
         'testimonial_count',
         [
			 'label'       => __( 'Testimonial List', 'unlimited-theme-addons' ),
			 'type'        => \Elementor\Controls_Manager::REPEATER,
			 'fields'      => $repeater->get_controls(),
			 'title_field' => '{{{name}}}',

         ]
      );

       $this->add_control(
           'uta-testimonial-ratings',
           [
               'label'        => __('Show Ratings', 'unlimited-theme-addons'),
               'type'         => \Elementor\Controls_Manager::SWITCHER,
               'label_on'     => __('On', 'unlimited-theme-addons'),
               'label_off'    => __('Off', 'unlimited-theme-addons'),
               'return_value' => 'on',
               'default'      => 'on',
           ]
       );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

      $settings = $this->get_settings_for_display(); ?>

      <div class="uta-testimonials">
         <?php foreach ( $settings['testimonial_count'] as $index => $testimonial ) :
         $testimonialText = $this->get_repeater_setting_key( 'feedback' , 'testimonial_count' , $index );
         $name = $this->get_repeater_setting_key( 'name' , 'testimonial_count' , $index );
         $designation = $this->get_repeater_setting_key( 'designation' , 'testimonial_count' , $index );
         $this->add_inline_editing_attributes( $testimonialText , 'basic' );
         $this->add_inline_editing_attributes( $name , 'basic' );
         $this->add_inline_editing_attributes( $designation , 'basic' ); ?>
         <div class="uta-testimonial-item">
            <div class="row justify-content-center">
               <div class="col-sm-9 text-center">
                  <img src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
                  <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>><?php echo esc_html( $testimonial['feedback'] ); ?></p>
                <?php if( 'on' == $settings['uta-testimonial-ratings'] ){?>
                   <ul>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                   </ul>
               <?php }?>
                  <h5 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h5>
                  <span <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></span>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
      </div>

   <?php }

}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Testimonials() );