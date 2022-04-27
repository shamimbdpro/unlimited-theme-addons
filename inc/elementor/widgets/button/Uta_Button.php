<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Button
class Uta_Button extends Widget_Base
{

  public function get_name() {
    return 'uta-button';
  }

  public function get_title() {
    return esc_html__('UTA Button', 'unlimited-theme-addons');
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
    $scripts = [];

    return $scripts;
  }


  public function get_keywords() {
    return [
		'button',
		'uta button',
		'uta',
		'button widget',
		'widget',
		'buttons',
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
      'button_section',
      [
		  'label' => esc_html__('Button', 'unlimited-theme-addons'),
		  'type'  => Controls_Manager::SECTION,
      ]
    );

    $this->add_responsive_control(
      'uta_button_style',
      [
		  'label'   => esc_html__('Button Style', 'unlimited-theme-addons'),
		  'type'    => \Elementor\Controls_Manager::SELECT,
		  'options' => [
			  'style-default' => esc_html__('Default', 'unlimited-theme-addons'),
			  'style-1'       => esc_html__('Style-1', 'unlimited-theme-addons'),
			  'style-2'       => esc_html__('Style-2', 'unlimited-theme-addons'),
			  'style-3'       => esc_html__('Style-3', 'unlimited-theme-addons'),
			  'style-4'       => esc_html__('Style-4', 'unlimited-theme-addons'),
			  'style-5'       => esc_html__('Style-5', 'unlimited-theme-addons'),
			  'style-6'       => esc_html__('Style-6', 'unlimited-theme-addons'),
			  'style-7'       => esc_html__('Style-7', 'unlimited-theme-addons'),
			  'style-8'       => esc_html__('Style-8', 'unlimited-theme-addons'),
			// 'style-9' => esc_html__('Style-9', 'unlimited-theme-addons'),
		  ],
		  'default' => 'style-default',
      ]
    );

    $this->add_control(
      'button_text',
      [
		  'label'   => __('Button Text', 'unlimited-theme-addons'),
		  'type'    => \Elementor\Controls_Manager::TEXT,
		  'default' => __('Raed More', 'unlimited-theme-addons'),
      ]
    );

    $this->add_control(
      'button_icon',
      [
		  'label'        => __('Icon', 'unlimited-theme-addons'),
		  'type'         => \Elementor\Controls_Manager::SWITCHER,
		  'label_on'     => __('Yes', 'unlimited-theme-addons'),
		  'label_off'    => __('No', 'unlimited-theme-addons'),
		  'return_value' => 'yes',
		  'default'      => 'no',
      ]
    );

    $this->add_control(
      'icon',
      [
		  'label'     => __('Icon', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::ICONS,
		  'default'   => [
			  'value'   => 'fas fa-star',
			  'library' => 'solid',
		  ],
		  'condition' => [ 'button_icon' => 'yes' ],
      ]
    );

    $this->add_control(
      'button_url',
      [
		  'label'   => __('Button URL', 'unlimited-theme-addons'),
		  'type'    => \Elementor\Controls_Manager::TEXT,
		  'default' => '#',
      ]
    );

    $this->add_control(
      'popup',
      [
		  'label'        => __('Popup Video', 'unlimited-theme-addons'),
		  'type'         => \Elementor\Controls_Manager::SWITCHER,
		  'label_on'     => __('Yes', 'unlimited-theme-addons'),
		  'label_off'    => __('No', 'unlimited-theme-addons'),
		  'return_value' => 'yes',
		  'default'      => 'no',
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

    $this->add_control(
      'drop_shadow',
      [
		  'label'        => __('Drop Shadow', 'unlimited-theme-addons'),
		  'type'         => \Elementor\Controls_Manager::SWITCHER,
		  'label_on'     => __('Show', 'unlimited-theme-addons'),
		  'label_off'    => __('Hide', 'unlimited-theme-addons'),
		  'return_value' => 'yes',
		  'default'      => 'yes',
      ]
    );

    $this->end_controls_section();

    // Button Style
    $this->start_controls_section(
      'button_default_style',
      array(
		  'label' => __('Button', 'unlimited-theme-addons'),
		  'tab'   => Controls_Manager::TAB_STYLE,
      )
    );
    /*
         * Padding 
        */
    $this->add_responsive_control(
      'uta_button_padding',
      [
		  'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
		  'type'       => \Elementor\Controls_Manager::DIMENSIONS,
		  'size_units' => [ 'px', '%', 'em' ],
		  'selectors'  => [
			  '{{WRAPPER}} .uta-btn'      => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-8' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			  '{{WRAPPER}} .uta-button-9' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		  ],
      ]
    );

    // Button Typography Default
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-btn',
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      ]
    );
    // Button Typography 1
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_1_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-1',
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      ]
    );
    // Button Typography 3
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_2_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-2',
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      ]
    );
    // Button Typography 3
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_3_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-3',
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      ]
    );
    // Button Typography 4
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_4_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-4',
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      ]
    );
    // Button Typography 5
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_5_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-5',
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      ]
    );
    // Button Typography 6
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_6_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-6',
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      ]
    );
    // Button Typography 7
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_7_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-7',
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      ]
    );
    // Button Typography 8
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_8_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-8',
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      ]
    );
    // Button Typography 9
    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
		  'name'      => 'uta_button_9_typography',
		  'label'     => __('Typography', 'unlimited-theme-addons'),
		  'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
		  'selector'  => '{{WRAPPER}} .uta-button-9',
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      ]
    );

    /*
         * Tab 
        */
    $this->start_controls_tabs(
      'uta_button_style_tabs'
    );
    /*
         * Default Color
        */
    $this->start_controls_tab(
      'uta_button_open_tab',
      [
		  'label' => esc_html__('Default', 'unlimited-theme-addons'),
      ]
    );
    // button default
    // color
    $this->add_control(
      'uta_button_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-btn' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-btn' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-btn',
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      ]
    );


    // button 1
    // color
    $this->add_control(
      'uta_button1_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-1' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button1_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .btn-bg-two::before' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item1_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-1',
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      ]
    );


    // button 2
    // color
    $this->add_control(
      'uta_button2_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-2' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button2_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-2' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item2_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-2',
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      ]
    );



    // button 2
    // color
    $this->add_control(
      'uta_button3_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-3' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button3_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-3' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item3_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-3',
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      ]
    );


    // button 4
    // color
    $this->add_control(
      'uta_button4_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-4' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button4_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-4' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item4_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-4',
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      ]
    );

    // button 5
    // color
    $this->add_control(
      'uta_button5_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-5' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button5_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-5' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item5_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-5',
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      ]
    );


    // button 6
    // color
    $this->add_control(
      'uta_button6_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-6' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button6_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-6' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item6_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-6',
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      ]
    );

    // button 7
    // color
    $this->add_control(
      'uta_button7_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-7' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button7_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-7' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item7_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-7',
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      ]
    );

    // button 2
    // color
    $this->add_control(
      'uta_button8_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-8' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button8_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-8' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item8_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-8',
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      ]
    );

    // button 2
    // color
    $this->add_control(
      'uta_button9_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-9' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button9_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-9' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item9_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-9',
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      ]
    );


    $this->end_controls_tab();

    $this->start_controls_tab(
      'uta_button_hover_tab',
      [
		  'label' => esc_html__('Hover', 'unlimited-theme-addons'),
      ]
    );

    // button default
    // color
    $this->add_control(
      'uta_button_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-btn:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-btn:hover' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button__hover_item_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-btn:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-default' ],
		  ],
      ]
    );


    // button 1
    // color
    $this->add_control(
      'uta_button1_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-1:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button1hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-1' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item1hover_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-1:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-1' ],
		  ],
      ]
    );


    // button 2
    // color
    $this->add_control(
      'uta_button2hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-2:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button2_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-2::after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_buttonhover_item2_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-2:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-2' ],
		  ],
      ]
    );



    // button 2
    // color
    $this->add_control(
      'uta_button3_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-3:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button3_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-3:after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item3_hover_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-3:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-3' ],
		  ],
      ]
    );


    // button 4
    // color
    $this->add_control(
      'uta_button4_Hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-4:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button4_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-4:after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_hover_item4_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-4:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-4' ],
		  ],
      ]
    );

    // button 5
    // color
    $this->add_control(
      'uta_button5_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-5:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button5__hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-5:after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_hover_item5_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-5:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-5' ],
		  ],
      ]
    );


    // button 6
    // color
    $this->add_control(
      'uta_button6_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-6' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button6_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-6::before, .uta-button-6::after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-6' ],
		  ],
      )
    );

    // button 7
    // color
    $this->add_control(
      'uta_button7_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-7:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button7_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-7::before, .uta-button-7::after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_hover_item7_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-7:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-7' ],
		  ],
      ]
    );

    // button 2
    // color
    $this->add_control(
      'uta_button8_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-8:hover' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button8_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-8:after' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_hover_item8_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-8:hover',
		  'condition' => [
			  'uta_button_style' => [ 'style-8' ],
		  ],
      ]
    );

    // button 2
    // color
    $this->add_control(
      'uta_button9_hover_color',
      array(
		  'label'     => __('Color', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-9' => 'color: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      )
    );
    // bg
    $this->add_control(
      'uta_button9_hover_bakcground',
      array(
		  'label'     => __('Background', 'unlimited-theme-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			  '{{WRAPPER}} .uta-button-9' => 'background: {{VALUE}};',
		  ],
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      )
    );
    /*
         * Border 
        */
    $this->add_group_control(
      \Elementor\Group_Control_Border::get_type(),
      [
		  'name'      => 'uta_button_item9_hover_border',
		  'label'     => esc_html__('Border', 'unlimited-theme-addons'),
		  'selector'  => '{{WRAPPER}} .uta-button-9',
		  'condition' => [
			  'uta_button_style' => [ 'style-9' ],
		  ],
      ]
    );


    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->end_controls_section();
  }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();

      //Inline Editing
      $this->add_inline_editing_attributes( 'button_text', 'basic' );
      ?>
      <div class="uta-btn-center" style="text-align: <?php echo esc_attr( $settings['align'] ) ?>">
      <?php
      if ( 'style-default' === $settings['uta_button_style'] ) {
        ?>
          <div>
           <a class="uta-btn  elementor-inline-editing  <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" <?php echo $this->get_render_attribute_string( 'button_text' ); ?> href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?></a>
       </div>

        <?php
      }

      if ( 'style-1' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-1 btn-bg-two <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-2' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-2 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-3' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-3 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-4' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-4 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-5' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-5 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-6' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-6 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-7' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-7 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-8' === $settings['uta_button_style'] ) {
      ?>
        <a class="uta-button-8 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></a>
      <?php
      }
      if ( 'style-9' === $settings['uta_button_style'] ) {
      ?>
        <div class="button-area-9">
            <a class="uta-button-9 <?php if ( 'yes' == $settings['popup'] ) { echo'uta-popup-url'; } ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>"><span><?php echo esc_html( $settings['button_text'] ); //phpcs:ignore ?> <?php if ( 'yes' == $settings['button_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?></span></a>
          </div>
      <?php
      }

      ?>
      </div>
       

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Button() );