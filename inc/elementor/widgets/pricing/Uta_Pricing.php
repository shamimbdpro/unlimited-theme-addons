<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Pricing
class Uta_Pricing extends Widget_Base
{

    public function get_name() {
        return 'uta-pricing';
    }

    public function get_title() {
        return esc_html__('UTA Pricing', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-pricing'];

    //     return $styles;
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
            'uta_pricing_section',
            [
                'label' => esc_html__('Pricing', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::SECTION,
            ]
        );
        $this->add_responsive_control(
            'uta_pricing_style',
            [
                'label'   => esc_html__('Pricing Style', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-default' => esc_html__('Default', 'unlimited-theme-addons'),
                    'style-1'       => esc_html__('Style-1', 'unlimited-theme-addons'),
                    'style-2'       => esc_html__('Style-2', 'unlimited-theme-addons'),
                ],

                'default' => 'style-default',
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Standard Plan',
            ]
        );

        $this->add_control(
            'price',
            [
                'label'   => __('Price', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '70',
            ]
        );

        $this->add_control(
            'currency',
            [
                'label'   => __('Currency', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('$', 'unlimited-theme-addons'),
            ]
        );

        $this->add_control(
            'package',
            [
                'label'   => __('Package', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'Yealry',
                'options' => [
                    'Daily'   => __('Daily', 'unlimited-theme-addons'),
                    'Weekly'  => __('Weekly', 'unlimited-theme-addons'),
                    'Monthly' => __('Monthly', 'unlimited-theme-addons'),
                    'Yealry'  => __('Yealry', 'unlimited-theme-addons'),
                    'none'    => __('None', 'unlimited-theme-addons'),
                ],
            ]
        );

        $feature = new \Elementor\Repeater();

        $feature->add_control(
            'feature',
            [
                'label'   => __('Feature', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('10 Free Domain Names', 'unlimited-theme-addons'),
            ]
        );

        $this->add_control(
            'feature_list',
            [
                'label'       => __('Feature List', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $feature->get_controls(),
                'default'     => [
                    [
                        'feature' => __('5GB Storage Space', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('20GB Monthly Bandwidth', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('My SQL Databases', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('100 Email Account', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('10 Free Domain Names', 'unlimited-theme-addons'),
                    ],
                ],
                'title_field' => '{{{ feature }}}',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => __('button text', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Select Plan',
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label'   => __('button URL', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'show_pricing_badge',
            [
                'label'        => __('Active Table', 'unlimited-theme-addons'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('On', 'unlimited-theme-addons'),
                'label_off'    => __('Off', 'unlimited-theme-addons'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'active_title',
            [
                'label'   => __('Active Title', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Popular',
            ]
        );

        $this->end_controls_section();


        // Pricing Style
        $this->start_controls_section(
            'pricing_style',
            array(
                'label' => __('Pricing Box', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_pricing_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_pricing_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_pricing_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_pricing_box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5',
            ]
        );

        $this->add_control(
            'uta_pricing_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-table, .pricing-item-1, .pricing-item-2, .pricing-item-3, .pricing-item-4, .pricing-item-5' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Pricing Title Style
        $this->start_controls_section(
            'uta_pricing_title_style',
            array(
                'label' => __('Title', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_title_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table h6, .uta-pricing-item h4, .uta-pricing-item.pricing-item-4 h5, .uta-pricing-item.pricing-item-5 .pricing-single-head h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_title_pricing_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table h6, .uta-pricing-item h4, .uta-pricing-item.pricing-item-4 h5, .uta-pricing-item.pricing-item-5 .pricing-single-head h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-table h6, .uta-pricing-item h4, .uta-pricing-item.pricing-item-4 h5, .uta-pricing-item.pricing-item-5 .pricing-single-head h4',
            ]
        );
        $this->add_control(
            'uta_title_pricing_background',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-table h6, .uta-pricing-item h4, .uta-pricing-item.pricing-item-4 h5, .uta-pricing-item.pricing-item-5 .pricing-single-head h4' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_title_box_pricing_background',
            array(
                'label'     => __('Title Box', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'uta_pricing_style' => [ 'pricing-style-2' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-item.pricing-item-2.active .title' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Pricing Price Style
        $this->start_controls_section(
            'uta_pricing_price_style',
            array(
                'label' => __('Price', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_price_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table .uta-price, .uta-pricing-item h2, .uta-pricing-item.pricing-item-4 h2, .uta-pricing-item.pricing-item-5 .pricing-single-head h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'price_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-table .uta-price, .uta-pricing-item h2, .uta-pricing-item.pricing-item-4 h2, .uta-pricing-item.pricing-item-5 .pricing-single-head h2',
            ]
        );
        $this->add_control(
            'uta_price_pricing_background',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-table .uta-price, .uta-pricing-item h2, .uta-pricing-item.pricing-item-4 h2, .uta-pricing-item.pricing-item-5 .pricing-single-head h2' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();



        // Pricing Currency Style
        $this->start_controls_section(
            'uta_pricing_currency_style',
            array(
                'label' => __('Currency', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_currency_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table .uta-currency, .uta-pricing-item h2 sup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'currency_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-table .uta-currency, .uta-pricing-item h2 sup',
            ]
        );
        $this->add_control(
            'uta_currency_pricing_background',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-table .uta-currency, .uta-pricing-item h2 sup' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();



        // Pricing Package Style
        $this->start_controls_section(
            'uta_pricing_Package_style',
            array(
                'label' => __('Package', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_package_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table>span, .uta-pricing-item.pricing-item-1 small, .uta-pricing-item.pricing-item-2 small, .uta-pricing-item.pricing-item-3 small, .uta-pricing-item.pricing-item-4 h2 small, .uta-pricing-item.pricing-item-5 .pricing-single-head h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'package_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-table>span, .uta-pricing-item.pricing-item-1 small, .uta-pricing-item.pricing-item-2 small, .uta-pricing-item.pricing-item-3 small, .uta-pricing-item.pricing-item-4 h2 small, .uta-pricing-item.pricing-item-5 .pricing-single-head h2 span',
            ]
        );
        $this->add_control(
            'uta_package_pricing_background',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-package' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Pricing Active Style
        $this->start_controls_section(
            'uta_pricing_badge_style',
            array(
                'label' => __('Active Badge Style', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_pricing_badge_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table.recommended, .pricing-item-1 span, .pricing-item-2.active span, .uta-pricing-item.pricing-item-4 h5 label.badge, .uta-pricing-item.pricing-item-5 .pricing-single-head small' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_pricing_badge_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_pricing_badge_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-badge',
            ]
        );
        $this->add_control(
            'uta_pricing_badge_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-badge' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_pricing_bade_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-badge' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_pricing_item_border_active',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-pricing-badge',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_pricing_badge_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_pricing_badge_box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-pricing-badge',
            ]
        );
        $this->end_controls_section();




        // Pricing Feature Style
        $this->start_controls_section(
            'uta_pricing_Feature_list_style',
            array(
                'label' => __('Feature List Style', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_feature_list_pricing_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-pricing-table ul li, .uta-pricing-item ul li, .uta-pricing-item.pricing-item-5 .pricing-single-content ul li, .uta-pricing-item.pricing-item-4 ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'Feature_list_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-pricing-table ul li, .uta-pricing-item ul li, .uta-pricing-item.pricing-item-5 .pricing-single-content ul li, .uta-pricing-item.pricing-item-4 ul li',
            ]
        );
        $this->add_control(
            'uta_feature_list_pricing_background',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-table ul li, .uta-pricing-item ul li, .uta-pricing-item.pricing-item-5 .pricing-single-content ul li, .uta-pricing-item.pricing-item-4 ul li' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_feature_list_pricing_border_color',
            array(
                'label'     => __('Border Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-pricing-item ul li, .uta-pricing-item.pricing-item-5 .pricing-single-content ul li' => 'border-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Pricing Button Style
        $this->start_controls_section(
            'pricing_button_style',
            array(
                'label' => __('Button Style', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs(
            'pricing_button_tabs'
        );

        /**
         * Pricing button normal tab.
         */
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => __('Normal', 'unlimited-theme-addons'),
            ]
        );

        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_pricing_button_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        /*
         * Margins 
        */
        $this->add_responsive_control(
            'uta_pricing_button_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        /**
         * Pricing button typography.
         */
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .pricing-btn a',
            ]
        );


        /*
         * Default Color
        */

        $this->add_control(
            'uta_pricing_button_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btn a' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /**
         * Pricing button color.
         */

        $this->add_control(
            'uta_pricing_button_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btn a' => 'color: {{VALUE}};',
                ],
            )
        );

        /*
         * Pricing button Border 
        */

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_pricing_button_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .pricing-btn a',
            ]
        );

        /*
         * Pricing buttton Border Radious
        */

        $this->add_control(
            'uta_pricing_button_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        /**
         * Pricing button hover.
         */

        $this->start_controls_tab(
            'uta_pricing_button_hover_tab',
            [
                'label' => __('Hover', 'unlimited-theme-addons'),
            ]
        );

        /**
         * Pricing button hover background.
         */
        $this->add_control(
            'uta_pricing_button_hover_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btn a:hover' => 'background-color: {{VALUE}};',
                ],
            )
        );

        /**
         * Pricing button hover color.
         */
        $this->add_control(
            'uta_pricing_button_hover_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btn a:hover' => 'color: {{VALUE}};',
                ],
            )
        );

        /*
         * Pricing button hover Border  
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_pricing_button_hover_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .pricing-btn a:hover',
            ]
        );
        /*
         * Pricing buttton hover Border Radious
        */
        $this->add_control(
            'uta_pricing_button_hover_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_inline_editing_attributes('price', 'basic');
        $this->add_inline_editing_attributes('package', 'basic');
        $this->add_inline_editing_attributes('btn_text', 'basic');
        $show_pricing_active = $settings['show_pricing_badge'];
        $pricing_title = $settings['title'];
        $badge_title = $settings['active_title'];
        $price = $settings['price'];
        $currency = $settings['currency']; ?>

        <div class="uta-pricing-table">

    <?php
        if ( 'style-default' === $settings['uta_pricing_style'] ) {
            require (__DIR__) . '/template/style-default.php';
        }
        if ( 'style-1' === $settings['uta_pricing_style'] ) {
            require (__DIR__) . '/template/style-1.php';
        }
        if ( 'style-2' === $settings['uta_pricing_style'] ) {
            require (__DIR__) . '/template/style-2.php';
        }

        echo '</div>';
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Pricing());
