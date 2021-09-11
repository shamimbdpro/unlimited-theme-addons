<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Button
class Uta_Accordion extends Widget_Base
{

  public function get_name() {
    return 'uta-accordion';
  }

  public function get_title() {
    return esc_html__('UTA Accordion', 'unlimited-theme-addons');
  }

  public function get_icon() {
    return 'eicon-button';
  }

  /**
   * Widget CSS.
   * 
   * @return string
   */
  // public function get_style_depends()
  // {
  //   $styles = ['uta-button'];

  //   return $styles;
  // }

  /**
   * Widget script.
   * 
   * @return string
   */
  public function get_script_depends() {
    $scripts = ['uta-main'];

    return $scripts;
  }


  public function get_keywords() {
    return [
		'accordion',
		'uta accordion',
		'uta',
		'accordion widget',
		'widget',
		'elementor accordion',
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

  protected function _register_controls() {
        $this->uta_accordion_controls();

  }

  protected function uta_accordion_controls(){
      $this->start_controls_section(
          'uta_acc_control_section',
          [
              'label' => esc_html__('Accordion', 'unlimited-theme-addons'),
              'type'  => Controls_Manager::SECTION,
          ]
      );

      $this->add_responsive_control(
          'uta_acc_layouts',
          [
              'label'   => esc_html__('Layouts', 'unlimited-theme-addons'),
              'type'    => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  'layout-default' => esc_html__('Default', 'unlimited-theme-addons'),
                  'layout-1' => esc_html__('Layout 1', 'unlimited-theme-addons'),
              ],
              'default' => 'layout-default',
          ]
      );

      $uta_accordion_repeater = new Repeater();

      $uta_accordion_repeater->add_control(
          'uta_acc_title',
          [
              'label' => esc_html__( 'Title & Description', 'unlimited-theme-addons' ),
              'type' => Controls_Manager::TEXT,
              'default' => esc_html__( 'Accordion Title.', 'unlimited-theme-addons' ),
              'dynamic' => [
                  'active' => true,
              ],
              'label_block' => true,
          ]
      );

      $uta_accordion_repeater->add_control(
          'uta_acc_content',
          [
              'label' => esc_html__( 'Content', 'unlimited-theme-addons' ),
              'type' => Controls_Manager::WYSIWYG,
              'default' => esc_html__( 'Accordion content', 'unlimited-theme-addons' ),
              'show_label' => false,
          ]
      );

      $this->add_control(
          'uta_acc_tabs',
          [
              'label' => esc_html__( 'Accordion Items', 'elementor' ),
              'type' => Controls_Manager::REPEATER,
              'fields' => $uta_accordion_repeater->get_controls(),
              'default' => [
                  [
                      'uta_acc_title' => esc_html__( 'How much does a website cost?', 'unlimited-theme-addons' ),
                      'uta_acc_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'unlimited-theme-addons' ),
                  ],
                  [
                      'uta_acc_title' => esc_html__( 'How to use Unlimited Theme Addon?', 'unlimited-theme-addons' ),
                      'uta_acc_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'unlimited-theme-addons' ),
                  ],
              ],
              'title_field' => '{{{ uta_acc_title }}}',
          ]
      );


      $this->add_control(
          'uta_acc_selected_icon',
          [
              'label' => esc_html__( 'Icon', 'unlimited-theme-addons' ),
              'type' => Controls_Manager::ICONS,
              'separator' => 'before',
              'fa4compatibility' => 'icon',
              'default' => [
                  'value' => 'fas fa-plus',
                  'library' => 'fa-solid',
              ],
              'recommended' => [
                  'fa-solid' => [
                      'chevron-down',
                      'angle-down',
                      'angle-double-down',
                      'caret-down',
                      'caret-square-down',
                  ],
                  'fa-regular' => [
                      'caret-square-down',
                  ],
              ],
              'skin' => 'inline',
              'label_block' => false,
          ]
      );

      $this->add_control(
          'uta_acc_selected_active_icon',
          [
              'label' => esc_html__( 'Active Icon', 'elementor' ),
              'type' => Controls_Manager::ICONS,
              'fa4compatibility' => 'icon_active',
              'default' => [
                  'value' => 'fas fa-minus',
                  'library' => 'fa-solid',
              ],
              'recommended' => [
                  'fa-solid' => [
                      'chevron-up',
                      'angle-up',
                      'angle-double-up',
                      'caret-up',
                      'caret-square-up',
                  ],
                  'fa-regular' => [
                      'caret-square-up',
                  ],
              ],
              'skin' => 'inline',
              'label_block' => false,
              'condition' => [
                  'uta_acc_selected_icon[value]!' => '',
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


       // Counter Up style 1.
       if ( 'layout-default' === $settings['uta_acc_layouts'] ) {
           require (__DIR__) . '/template/layout-default.php';
       }

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Accordion() );