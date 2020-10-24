<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Button
class uta_Widget_Button extends Widget_Base {

   public function get_name() {
      return 'button';
   }
 
   public function get_title() {
      return esc_html__( 'UTA Button', 'unlimited-theme-addons' );
   }
 
   public function get_icon() { 
        return 'eicon-button';
   }
 
   public function get_categories() {
      return [ 'uta-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'button_section',
         [
			 'label' => esc_html__( 'Button', 'unlimited-theme-addons' ),
			 'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'button_text', [
			 'label' => __( 'Button Text', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => __( 'Raed More', 'unlimited-theme-addons' ),
         ]
      );

      $this->add_control(
         'button_icon',
         [
			 'label' => __( 'Show Icon', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SWITCHER,
			 'label_on' => __( 'Yes', 'unlimited-theme-addons' ),
			 'label_off' => __( 'No', 'unlimited-theme-addons' ),
			 'return_value' => 'yes',
			 'default' => 'no',
         ]
      );

      $this->add_control(
         'icon',
         [
             'label' => __( 'Icon', 'text-domain' ),
             'type' => \Elementor\Controls_Manager::ICONS,
             'default' => [
                 'value' => 'fas fa-star',
                 'library' => 'solid',
             ],
             'condition' => [ 'button_icon' => 'yes' ],
         ]
      );

      $this->add_control(
         'button_url', [
			 'label' => __( 'Button URL', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => '#',
         ]
      );      

      $this->add_control(
         'popup',
         [
			 'label' => __( 'Popup Video', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SWITCHER,
			 'label_on' => __( 'Yes', 'unlimited-theme-addons' ),
			 'label_off' => __( 'No', 'unlimited-theme-addons' ),
			 'return_value' => 'yes',
			 'default' => 'no',
         ]
      );

      $this->add_control(
         'align',
         [
			 'label' => __( 'Alignment', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::CHOOSE,
			 'options' => [
				 'left' => [
					 'title' => __( 'Left', 'unlimited-theme-addons' ),
					 'icon' => 'fa fa-align-left',
				 ],
				 'center' => [
					 'title' => __( 'Center', 'unlimited-theme-addons' ),
					 'icon' => 'fa fa-align-center',
				 ],
				 'right' => [
					 'title' => __( 'Right', 'unlimited-theme-addons' ),
					 'icon' => 'fa fa-align-right',
				 ],
			 ],
			 'default' => 'left',
			 'toggle' => true,
         ]
      );

       $this->add_control(
         'drop_shadow',
         [
			 'label' => __( 'Drop Shadow', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SWITCHER,
			 'label_on' => __( 'Show', 'unlimited-theme-addons' ),
			 'label_off' => __( 'Hide', 'unlimited-theme-addons' ),
			 'return_value' => 'yes',
			 'default' => 'yes',
         ]
      );

      $this->add_control(
         'bordered',
         [
			 'label' => __( 'Bordered', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SWITCHER,
			 'label_on' => __( 'Yes', 'unlimited-theme-addons' ),
			 'label_off' => __( 'No', 'unlimited-theme-addons' ),
			 'return_value' => 'yes',
			 'default' => 'no',
         ]
      );

      $this->add_control(
         'button_radius',
         [
			 'label' => __( 'Button Radius', 'unlimited-theme-addons' ),
			 'type' => Controls_Manager::SLIDER,
			 'size_units' => [ 'px', '%' ],
			 'range' => [
				 'px' => [
					 'min' => 0,
					 'max' => 50,
					 'step' => 1,
				 ],
			 ],
			 'default' => [
				 'unit' => 'px',
				 'size' => 0,
			 ],
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();

      //Inline Editing
      $this->add_inline_editing_attributes( 'button_text', 'basic' );
      ?>

      <div style="text-align: <?php echo esc_attr( $settings['align'] ) ?>">
         <a class="uta-btn <?php if ( 'yes' == $settings['bordered'] ) { echo'bordered'; } ?> elementor-inline-editing <?php if ( 'yes' == $settings['drop_shadow'] ) { echo'shadow'; } ?> <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" style="border-radius: <?php echo esc_attr( $settings['button_radius']['size'] ) ?>px;" <?php echo  $this->get_render_attribute_string( 'button_text' ); ?> href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?><?php echo esc_html( $settings['button_text'] ); ?></a>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new uta_Widget_Button() );