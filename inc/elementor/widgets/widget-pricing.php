<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class digitalshop_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'digitalshop' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'digitalshop-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'digitalshop' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->add_control(
         'currency',
         [
            'label' => __( 'Currency', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '$', 'digitalshop' ),
         ]
      );
      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'digitalshop' ),
               'Weekly'  => __( 'Weekly', 'digitalshop' ),
               'Monthly' => __( 'Monthly', 'digitalshop' ),
               'Yealry' => __( 'Yealry', 'digitalshop' ),
               'none' => __( 'None', 'digitalshop' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'digitalshop' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'digitalshop' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'digitalshop' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'digitalshop' )
               ],
               [
                  'feature' => __( '100 Email Account', 'digitalshop' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'digitalshop' )
               ]
            ],
            'title_field' => '{{{ feature }}}'
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Select Plan'
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'digitalshop' ),
            'label_off' => __( 'Off', 'digitalshop' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'price', 'basic' );
      $this->add_inline_editing_attributes( 'package', 'basic' );
      $this->add_inline_editing_attributes( 'btn_text', 'basic' );
      ?>

      <div class="digitalshop-pricing-table <?php if ( 'on' == $settings['recommended'] ){ echo"recommended"; }?>">
         <h6 class="type elementor-inline-editing" <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html( $settings['title'] ); ?></h6>
         <h1 class="digitalshop-price elementor-inline-editing" <?php echo $this->get_render_attribute_string( 'price' ); ?>><span class="digitalshop-currency"><?php echo esc_html( $settings['currency'] ) ?></span><?php echo esc_html( $settings['price'] ); ?>
         </h1>

         <?php if ( 'none' !== $settings['package'] ): ?>
            <span <?php echo $this->get_render_attribute_string( 'package' ); ?>><?php echo esc_html( $settings['package'] ); ?></span>
         <?php endif ?>
         
         <ul>
            <?php 
               foreach (  $settings['feature_list'] as $index => $feature ) { 
               $feature_inline = $this->get_repeater_setting_key( 'feature','feature_list',$index);
               $this->add_inline_editing_attributes( $feature_inline, 'basic' );
            ?>
               <li <?php echo $this->get_render_attribute_string( $feature_inline ); ?>><?php echo esc_html( $feature['feature'] ) ?></li>
            <?php
            } ?>
         </ul>
         <a class="elementor-inline-editing digitalshop-buy-button" href="<?php echo esc_url( $settings['btn_url'] ) ?>" <?php echo $this->get_render_attribute_string( 'btn_text' ); ?>><?php echo esc_html( $settings['btn_text'] ) ?></a>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new digitalshop_Widget_Pricing );