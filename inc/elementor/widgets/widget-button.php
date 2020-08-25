<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Button
class cpthelper_Widget_Button extends Widget_Base {
 
   public function get_name() {
      return 'button';
   }
 
   public function get_title() {
      return esc_html__( 'Button', 'cpthelper' );
   }
 
   public function get_icon() { 
        return 'eicon-button';
   }
 
   public function get_categories() {
      return [ 'cpthelper-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'button_section',
         [
            'label' => esc_html__( 'Button', 'cpthelper' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Raed More', 'cpthelper' )
         ]
      );

      $this->add_control(
         'button_icon',
         [
            'label' => __( 'Icon', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'cpthelper' ),
            'label_off' => __( 'No', 'cpthelper' ),
            'return_value' => 'yes',
            'default' => 'no'
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'Choose Icon', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-play',
            'condition' => ['button_icon' => 'yes']
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );      

      $this->add_control(
         'popup',
         [
            'label' => __( 'Popup Video', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'cpthelper' ),
            'label_off' => __( 'No', 'cpthelper' ),
            'return_value' => 'yes',
            'default' => 'no'
         ]
      );

      $this->add_control(
         'align',
         [
            'label' => __( 'Alignment', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
               'left' => [
                  'title' => __( 'Left', 'cpthelper' ),
                  'icon' => 'fa fa-align-left',
               ],
               'center' => [
                  'title' => __( 'Center', 'cpthelper' ),
                  'icon' => 'fa fa-align-center',
               ],
               'right' => [
                  'title' => __( 'Right', 'cpthelper' ),
                  'icon' => 'fa fa-align-right',
               ],
            ],
            'default' => 'left',
            'toggle' => true
         ]
      );

       $this->add_control(
         'drop_shadow',
         [
            'label' => __( 'Drop Shadow', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'cpthelper' ),
            'label_off' => __( 'Hide', 'cpthelper' ),
            'return_value' => 'yes',
            'default' => 'yes'
         ]
      );

      $this->add_control(
         'bordered',
         [
            'label' => __( 'Bordered', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'cpthelper' ),
            'label_off' => __( 'No', 'cpthelper' ),
            'return_value' => 'yes',
            'default' => 'no'
         ]
      );

      $this->add_control(
         'button_radius',
         [
            'label' => __( 'Button Radius', 'cpthelper' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
               'px' => [
                  'min' => 0,
                  'max' => 50,
                  'step' => 1,
               ]
            ],
            'default' => [
               'unit' => 'px',
               'size' => 0,
            ]
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
         <a class="cpthelper-btn <?php if( 'yes' == $settings['bordered'] ){ echo'bordered'; } ?> elementor-inline-editing <?php if( 'yes' == $settings['drop_shadow'] ){ echo'shadow'; } ?> <?php if( 'yes' == $settings['popup'] ){ echo'cpthelper-popup-url'; } ?>" style="border-radius: <?php echo esc_attr( $settings['button_radius']['size'] ) ?>px;" <?php echo $this->get_render_attribute_string( 'button_text' ); ?> href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php if ( 'yes' == $settings['button_icon'] ) { echo '<i class="'.$settings['icon'].'"></i>'; } ?><?php echo esc_html( $settings['button_text'] ); ?></a>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new cpthelper_Widget_Button );