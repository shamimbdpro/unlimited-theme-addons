<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class Uta_Twentytwenty extends Widget_Base {
 
   public function get_name() {
      return 'uta-twentytwenty';
   }
 
   public function get_title() {
      return esc_html__( 'UTA Image Comparison', 'unlimited-theme-addons' );
   }
 
   public function get_icon() { 
        return 'eicon-image-before-after';
   }

   public function get_keywords() {
        return [
            'title',
            'uta image before after',
            'uta',
            'title widget',
            'widget',
            'addons',
            'before after addons',
            'unlimited theme addons',
        ];
    }
 
   public function get_categories() {
      return [ 'uta-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'uta_title_section',
         [
			 'label' => esc_html__( 'Before After Slider', 'unlimited-theme-addons' ),
			 'type'  => Controls_Manager::SECTION,
         ]
      );

       $this->add_control(
           'uta_before_image',
           [
               'label'   => esc_html( 'Before Image', 'elementor-before-after-image-slider' ),
               'type'    => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
           ]
       );

       $this->add_control(
           'uta_after_image',
           [
               'label'   => esc_html( 'After Image', 'elementor-before-after-image-slider' ),
               'type'    => \Elementor\Controls_Manager::MEDIA,
               'default' => [
                   'url' => \Elementor\Utils::get_placeholder_image_src(),
               ],
           ]
       );

       $this->add_group_control(
           \Elementor\Group_Control_Image_Size::get_type(),
           [
               'name'    => 'thumbnail',
               'default' => 'full',
           ]
       );
      
      $this->end_controls_section();

   }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $element_id = $this->get_id();
        ?>
        <div class="uta-twentytwenty twentytwenty-container" data-orientation="horizontal" id="uta_before_after_<?php echo esc_attr($element_id); ?>">
            <span class='before_text'><?php echo esc_html_e('Before', 'unlimited-theme-addons'); ?></span>
            <span class='after_text'><?php echo esc_html_e('After', 'unlimited-theme-addons'); ?></span>
            <?php
            echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'uta_before_image' ); //phpcs:ignore
            echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'uta_after_image' ); //phpcs:ignore

            ?>
        </div>
        <style>
            #uta_before_after_<?php echo esc_attr($element_id); ?>{
                max-width: auto;
            }
        </style>
        <?php
    }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Twentytwenty() );