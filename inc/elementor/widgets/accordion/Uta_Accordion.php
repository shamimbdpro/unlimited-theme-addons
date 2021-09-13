<?php

namespace Elementor;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

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

    /**
     * Accordion widget controls.
     *
     * @access protected.
     *
     * @return void.
     */
  protected function _register_controls() {
       /*----- Widget Controls -------*/
        $this->uta_accordion_controls();

        /*---- Widget Style ---------*/
       $this->section_acc_style();
       $this->section_acc_title_style();
       $this->section_acc_icon_style();
       $this->section_acc_content_style();

  }

    /**
     * Register accordion controls.
     *
     * @access protected.
     *
     * @return mixed.
     */
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

    /**
     * Register accordion style.
     *
     * @access protected.
     *
     * @return array|mixed
     */
  protected function section_acc_style(){

      $this->start_controls_section(
          'section_acc_style',
          [
              'label' => esc_html__( 'Accordion', 'elementor' ),
              'tab' => Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_control(
          'border_width',
          [
              'label' => esc_html__( 'Item Specing', 'elementor' ),
              'type' => Controls_Manager::SLIDER,
              'range' => [
                  'px' => [
                      'min' => 0,
                      'max' => 150,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} ul.uta-accordion li' => 'margin: {{SIZE}}{{UNIT}} auto;',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
              'name'     => 'accordion_border',
              'label'    => esc_html__('Border', 'unlimited-theme-addons'),
              'selector' => '{{WRAPPER}} ul.uta-accordion li',
          ]
      );


      $this->add_control(
          'accordion_border_radius',
          [
              'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
              'type'       => \Elementor\Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em' ],
              'selectors'  => [
                  '{{WRAPPER}} ul.uta-accordion li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );



      $this->end_controls_section();


  }


    /**
     * Section accordion title style.
     *
     * @access protected.
     */
    protected function section_acc_title_style(){
        $this->start_controls_section(
            'acc_toggle_style_title',
            [
                'label' => esc_html__( 'Title', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_background',
            [
                'label' => esc_html__( 'Background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_active_background',
            [
                'label' => esc_html__( 'Active Background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading svg' => 'fill: {{VALUE}};',
                ],
                'default' => '#fff',
            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => esc_html__( 'Active Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li.active h3 svg' => 'fill: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_ACCENT,
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} ul.uta-accordion li h3',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

        /*
        * Border
       */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'title_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} ul.uta-accordion li .accordion-heading',
            ]
        );

        /*
         * Border radius.
        */
        $this->add_control(
            'title_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} ul.uta-accordion li .accordion-heading',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Section accordion icon style.
     *
     * @access protected.
     */
    protected function section_acc_icon_style(){
        $this->start_controls_section(
            'section_acc_icon_style',
            [
                'label' => esc_html__( 'Icon', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'uta_acc_selected_icon[value]!' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon-left' => [
                        'title' => esc_html__( 'Start', 'elementor' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon-right' => [
                        'title' => esc_html__( 'End', 'elementor' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => is_rtl() ? 'icon-right' : 'icon-left',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li h3 i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li h3 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_active_color',
            [
                'label' => esc_html__( 'Active Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active h3 i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li.active h3 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_space',
            [
                'label' => esc_html__( 'Spacing', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-heading.icon-right h3 .accordion-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .accordion-heading.icon-left h3 .accordion-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Section accordion icon style.
     *
     * @access protected.
     *
     * @return void.
     */
    protected function section_acc_content_style(){
        $this->start_controls_section(
            'section_acc_content_style',
            [
                'label' => esc_html__( 'Content', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__( 'Background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-accordion .accordion-body' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-accordion .accordion-body' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' =>
                    '{{WRAPPER}} .uta-accordion .accordion-body p',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'content_shadow',
                'selector' => '{{WRAPPER}} .uta-accordion .accordion-body',
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .uta-accordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * @param array $instance
     */
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