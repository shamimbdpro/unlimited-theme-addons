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
    $scripts = [ 'uta-main' ];

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
  protected function register_controls() {
       /*----- Widget Controls -------*/
        $this->uta_accordion_controls();

        /*---- Widget Style ---------*/
       $this->uta_accordion_style__global();
       $this->uta_accordion_style__title();
       $this->uta_accordion_style__icon();
       $this->uta_accordion_style__content();

  }

    /**-----------------------------------------------------
    /*  Register Accordion Controls.
    /*-----------------------------------------------------
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
          'accordion__layouts',
          [
              'label'   => esc_html__('Layouts', 'unlimited-theme-addons'),
              'type'    => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  'layout-default' => esc_html__('Default', 'unlimited-theme-addons'),
              ],
              'default' => 'layout-default',
          ]
      );

      $uta_accordion_repeater = new Repeater();

      $uta_accordion_repeater->add_control(
          'accordion__title',
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
          'content_type',
          [
              'label'                 => esc_html__( 'Content Type', 'unlimited-theme-addons' ),
              'type'                  => Controls_Manager::SELECT,
              'label_block'           => false,
              'options'               => [
                  'content'   => __( 'Content', 'unlimited-theme-addons' ),
                  'image'     => __( 'Image', 'unlimited-theme-addons' ),
//                  'section'   => __( 'Saved Section', 'unlimited-theme-addons' ),
//                  'widget'    => __( 'Saved Widget', 'unlimited-theme-addons' ),
//                  'template'  => __( 'Saved Page Template', 'unlimited-theme-addons' ),
              ],
              'default'               => 'content',
          ]
      );

      $uta_accordion_repeater->add_control(
          'accordion__content',
          [
              'label' => esc_html__( 'Content', 'unlimited-theme-addons' ),
              'type' => Controls_Manager::WYSIWYG,
              'default' => esc_html__( 'Accordion content', 'unlimited-theme-addons' ),
              'show_label' => false,
              'condition'             => [
                  'content_type'  => 'content',
              ],
          ]
      );

      $uta_accordion_repeater->add_control(
          'saved_widget',
          [
              'label'                 => __( 'Choose Widget', 'unlimited-theme-addons' ),
              'type'                  => 'uta-query',
              'label_block'           => false,
              'multiple'              => false,
              'query_type'            => 'templates-widget',
              'conditions'        => [
                  'terms' => [
                      [
                          'name'      => 'content_type',
                          'operator'  => '==',
                          'value'     => 'widget',
                      ],
                  ],
              ],
          ]
      );

      $uta_accordion_repeater->add_control(
          'saved_section',
          [
              'label'                 => __( 'Choose Section', 'unlimited-theme-addons' ),
              'type'                  => 'uta-query',
              'label_block'           => false,
              'multiple'              => false,
              'query_type'            => 'templates-section',
              'conditions'        => [
                  'terms' => [
                      [
                          'name'      => 'content_type',
                          'operator'  => '==',
                          'value'     => 'section',
                      ],
                  ],
              ],
          ]
      );

      $uta_accordion_repeater->add_control(
          'templates',
          [
              'label'                 => __( 'Choose Template', 'unlimited-theme-addons' ),
              'type'                  => 'uta-query',
              'label_block'           => false,
              'multiple'              => false,
              'query_type'            => 'templates-page',
              'conditions'        => [
                  'terms' => [
                      [
                          'name'      => 'content_type',
                          'operator'  => '==',
                          'value'     => 'template',
                      ],
                  ],
              ],
          ]
      );

      $uta_accordion_repeater->add_control(
          'image',
          [
              'label'                 => __( 'Image', 'unlimited-theme-addons' ),
              'type'                  => Controls_Manager::MEDIA,
              'dynamic'               => [
                  'active'   => true,
              ],
              'default'               => [
                  'url' => Utils::get_placeholder_image_src(),
              ],
              'conditions'            => [
                  'terms' => [
                      [
                          'name'      => 'content_type',
                          'operator'  => '==',
                          'value'     => 'image',
                      ],
                  ],
              ],
          ]
      );

      $this->add_control(
          'accordion__tabs',
          [
              'label' => esc_html__( 'Accordion Items', 'unlimited-theme-addons' ),
              'type' => Controls_Manager::REPEATER,
              'fields' => $uta_accordion_repeater->get_controls(),
              'default' => [
                  [
                      'accordion__title' => esc_html__( 'How much does a website cost?', 'unlimited-theme-addons' ),
                      'accordion__content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'unlimited-theme-addons' ),
                  ],
                  [
                      'accordion__title' => esc_html__( 'How to use Unlimited Theme Addon?', 'unlimited-theme-addons' ),
                      'accordion__content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'unlimited-theme-addons' ),
                  ],
              ],
              'title_field' => '{{{ accordion__title }}}',

          ]
      );


      $this->add_control(
          'accordion__selected_icon',
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
          'accordion__selected_active_icon',
          [
              'label' => esc_html__( 'Active Icon', 'unlimited-theme-addons' ),
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
                  'accordion__selected_icon[value]!' => '',
              ],
          ]
      );

      $this->add_control(
          'toggle_speed',
          [
              'label'                 => esc_html__( 'Toggle Speed (ms)', 'unlimited-theme-addons' ),
              'type'                  => Controls_Manager::NUMBER,
              'label_block'           => false,
              'default'               => 300,
              'frontend_available'    => true,
          ]
      );

      $this->add_control(
          'active_first_child',
          [
              'label'        => __('Open First Item by Default', 'unlimited-theme-addons'),
              'type'         => Controls_Manager::SWITCHER,
              'label_on'     => __('Yes', 'unlimited-theme-addons'),
              'label_off'    => __('No', 'unlimited-theme-addons'),
              'return_value' => 'yes',
              'default'      => 'yes',
          ]
      );


      $this->end_controls_section();
  }

    /**-----------------------------------------------------
    /*  Accordion Style
    /*-----------------------------------------------------
     *
     * @access protected.
     *
     * @return array|mixed
     */
  protected function uta_accordion_style__global() {

      $this->start_controls_section(
          'uta_accordion_style__global',
          [
              'label' => esc_html__( 'Accordion', 'unlimited-theme-addons' ),
              'tab' => Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_control(
          'border_width',
          [
              'label' => esc_html__( 'Item Spacing', 'unlimited-theme-addons' ),
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
          'border_radius',
          [
              'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
              'type'       => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em' ],
              'selectors'  => [
                  '{{WRAPPER}} ul.uta-accordion li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );



      $this->end_controls_section();


  }


    /**-----------------------------------------------------
    /*  Accordion Style For -- Title
    /*-----------------------------------------------------
     *
     * @access protected.
     */
    protected function uta_accordion_style__title(){
        $this->start_controls_section(
            'uta_accordion_style__title',
            [
                'label' => esc_html__( 'Title', 'unlimited-theme-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_background',
            [
                'label' => esc_html__( 'Background', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_active_background',
            [
                'label' => esc_html__( 'Active Background', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading h3 svg' => 'fill: {{VALUE}};',
                ],
                'default' => '#fff',
            ]
        );

        $this->add_control(
            'title_active_color',
            [
                'label' => esc_html__( 'Active Color', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading h3 svg' => 'fill: {{VALUE}};',
                ],
                'default' => '#fff',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} ul.uta-accordion li .accordion-heading h3',
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
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**-----------------------------------------------------
    /*  Accordion Style For -- Icon
    /*-----------------------------------------------------
     *
     * @access protected.
     */
    protected function uta_accordion_style__icon(){
        $this->start_controls_section(
            'uta_accordion_style__icon',
            [
                'label' => esc_html__( 'Icon', 'unlimited-theme-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'accordion__selected_icon[value]!' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__( 'Alignment', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'icon-left' => [
                        'title' => esc_html__( 'Start', 'unlimited-theme-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'icon-right' => [
                        'title' => esc_html__( 'End', 'unlimited-theme-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'icon-right',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Color', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading h3 i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li .accordion-heading h3 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_active_color',
            [
                'label' => esc_html__( 'Active Color', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading h3 i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ul.uta-accordion li.active .accordion-heading h3 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_space',
            [
                'label' => esc_html__( 'Spacing', 'unlimited-theme-addons' ),
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


    /**-----------------------------------------------------
    /*  Accordion Style For -- Content
    /*-----------------------------------------------------
     *
     * @access protected.
     *
     * @return void.
     *
     */
    protected function uta_accordion_style__content(){
        $this->start_controls_section(
            'uta_accordion_style__content',
            [
                'label' => esc_html__( 'Content', 'unlimited-theme-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__( 'Background', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-accordion .accordion-body' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'unlimited-theme-addons' ),
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
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
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
     * Render accordion content.
     *
     * @since 1.1.0
     */
    protected function uta_accordion_contents( $acc_tab ) {
        $settings     = $this->get_settings_for_display();
        $content_type = $acc_tab['content_type'];
        $output       = '';

        switch ( $content_type ) {
            case 'content':
                $output = do_shortcode( $acc_tab['accordion__content'] );
                break;

            case 'image':
              //  $image_url = Group_Control_Image_Size::get_attachment_image_src( $acc_tab['image']['id'], null, $acc_tab );

              //  if ( ! $image_url ) {
                    $image_url = $acc_tab['image']['url'];
              //  }

                $image_html = '<div class="uta-accordion-image">';

                $image_html .= '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( Control_Media::get_image_alt( $acc_tab['image'] ) ) . '">';

                $image_html .= '</div>';

                $output = $image_html;
                break;

            case 'section':
                $output = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $acc_tab['saved_section'] );
                break;

            case 'template':
                $output = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $acc_tab['templates'] );
                break;

            case 'widget':
                $output = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $acc_tab['saved_widget'] );
                break;

            default:
                return;
        }

        return $output;
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
       if ( 'layout-default' === $settings['accordion__layouts'] ) {
           require (__DIR__) . '/template/layout-default.php';
       }

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Accordion() );