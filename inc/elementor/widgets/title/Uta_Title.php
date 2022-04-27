<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Title
class Uta_Title extends Widget_Base
{

   public function get_name() {
      return 'uta-title';
   }

   public function get_title() {
      return esc_html__('UTA Title', 'unlimited-theme-addons');
   }

   public function get_icon() {
      return 'eicon-site-title';
   }

   /**
    * Widget CSS.
    * 
    * @return string
    */
   // public function get_style_depends()
   // {
   //    $styles = ['uta-title'];

   //    return $styles;
   // }

   /**
    * Widget script.
    * 
    * @return string
    */
   public function get_script_depends() {
      $scripts = [];

      return $scripts;
   }


   public function get_keywords() {
      return [
		  'title',
		  'uta title',
		  'uta',
		  'title widget',
		  'widget',
		  'addons',
		  'title addons',
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
         'title_section',
         [
			 'label' => esc_html__('Title', 'unlimited-theme-addons'),
			 'type'  => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
			 'label'   => __('Title', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::TEXT,
			 'default' => __('Latest portfolio', 'unlimited-theme-addons'),
         ]
      );


      $this->add_control(
         'sub-title',
         [
			 'label'   => __('Sub Title', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::TEXTAREA,
			 'default' => __('Nemo enim ipsam voluptatem quia voluptas aspernatur', 'unlimited-theme-addons'),
         ]
      );

      $this->add_control(
         'align',
         [
			 'label'   => __('Alignment', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::CHOOSE,
			 'options' => [
				 'left'   => [
					 'title' => __('Left', 'unlimited-theme-addons'),
					 'icon'  => 'fa fa-align-left',
				 ],
				 'center' => [
					 'title' => __('Center', 'unlimited-theme-addons'),
					 'icon'  => 'fa fa-align-center',
				 ],
				 'right'  => [
					 'title' => __('Right', 'unlimited-theme-addons'),
					 'icon'  => 'fa fa-align-right',
				 ],
			 ],
			 'default' => 'left',
			 'toggle'  => true,
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

      $settings = $this->get_settings_for_display();

      //Inline Editing
      $this->add_inline_editing_attributes('title', 'basic');
      $this->add_inline_editing_attributes('sub-title', 'basic');
?>
      <div class="section-title" style="text-align: <?php echo esc_attr($settings['align']); ?>">
         <h1 <?php echo esc_html($this->get_render_attribute_string('title')); ?>><?php echo esc_html($settings['title']); ?></h1>
         <?php if ( $settings['sub-title'] ) : ?>
            <p <?php echo esc_html($this->get_render_attribute_string('sub-title')); ?>><?php echo esc_html($settings['sub-title']); ?></p>
         <?php endif ?>
      </div>
<?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Title());
