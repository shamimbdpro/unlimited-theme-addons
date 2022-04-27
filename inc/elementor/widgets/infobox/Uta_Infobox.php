<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly
class Uta_Infobox extends Widget_Base
{

    public function get_name() {
        return 'uta-info-box';
    }

    public function get_title() {
        return esc_html__('UTA Infobox', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-facebook-comments';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-infobox'];

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


    public function get_keywords() {
        return [
            'info box',
            'uta info',
            'uta',
            'infobox widget',
            'widget',
            'infobox',
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
            'service_section',
            [
                'label' => esc_html__('Service Item', 'unlimited-theme-addons'),
                'type'  => \Elementor\Controls_Manager::SECTION,
            ]
        );
        $this->add_responsive_control(
            'uta_infobox_style',
            [
                'label'   => esc_html__('Layouts', 'unlimited-theme-addons'),
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
                    'style-9'       => esc_html__('Style-9', 'unlimited-theme-addons'),
                    'style-10'      => esc_html__('Style-10', 'unlimited-theme-addons'),
                    'style-11'      => esc_html__('Style-11', 'unlimited-theme-addons'),
                    'style-12'      => esc_html__('Style-12', 'unlimited-theme-addons'),
                ],

                'default' => 'style-default',
            ]
        );
        $this->add_control(
            'icon',
            [
                'label'   => __('Icon', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Design', 'unlimited-theme-addons'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'text',
            [
                'label'   => __('Text', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dummy text in print and website industry are usually use in these section', 'unlimited-theme-addons'),
            ]
        );

        $this->end_controls_section();




        // InfoBox Style
        $this->start_controls_section(
            'infobox_style',
            array(
                'label' => __('Info Box', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_info_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item, 
                    {{WRAPPER}} .uta-infobox-item.style-04, 
                    {{WRAPPER}} .uta-infobox-item.style-06' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_info_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item, 
                    {{WRAPPER}} .uta-infobox-item.style-04, 
                    {{WRAPPER}} .uta-infobox-item.style-06' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_info_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => 
                    '{{WRAPPER}} .uta-infobox-item, 
                     {{WRAPPER}} .uta-infobox-item.style-04, 
                     {{WRAPPER}} .uta-infobox-item.style-06',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_info_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item, 
                    {{WRAPPER}} .uta-infobox-item.style-04, 
                    {{WRAPPER}} .uta-infobox-item.style-06' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_info_box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => 
                    '{{WRAPPER}} .uta-infobox-item, 
                    {{WRAPPER}} .uta-infobox-item.style-04, 
                    {{WRAPPER}} .uta-infobox-item.style-06',
            ]
        );

        $this->add_control(
            'uta_info_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item, 
                    {{WRAPPER}} .uta-infobox-item.style-04, 
                    {{WRAPPER}} .uta-infobox-item.style-06' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_hover_background',
            array(
                'label'     => __('Hover Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item:hover, 
                    {{WRAPPER}} .uta-infobox-item.style-04:hover, 
                    {{WRAPPER}} .uta-infobox-item.style-06:hover, 
                    {{WRAPPER}} .uta-infobox-item.style-02:after' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();



        // Icon Style
        $this->start_controls_section(
            'icon_style',
            array(
                'label' => __('Icon Box', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_icon_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item i, 
                     {{WRAPPER}} .uta-infobox-item.style-01 .icon, 
                     {{WRAPPER}} .uta-infobox-item.style-02 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-03 .icon, 
                     {{WRAPPER}} .uta-infobox-item.style-04 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-05 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-06 .icon, 
                     {{WRAPPER}} .uta-infobox-item.style-07 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-08 .icon, 
                     {{WRAPPER}} .uta-infobox-item.style-09 .icon, 
                     {{WRAPPER}} .uta-infobox-item.style-10 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-11 .icon,
                     {{WRAPPER}} .uta-infobox-item.style-12 .icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'uta_info_icon_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item i, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-09 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .icon i' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_icon_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item i, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-09 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .icon i' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_icon_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item:hover i, 
                    {{WRAPPER}} .uta-infobox-item.style-01:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .icon:hover i, 
                    {{WRAPPER}} .uta-infobox-item.style-03:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-04:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-05:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-06:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-07:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-09:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-10:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-11:hover .icon i, 
                    {{WRAPPER}} .uta-infobox-item.style-12:hover .icon i' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_icon_hover_background',
            array(
                'label'     => __('Hover Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item:hover i, 
                    {{WRAPPER}} .uta-infobox-item.style-01:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-02:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-03:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-04:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-05:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-06:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-07:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-09:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-10:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-11:hover .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-12:hover .icon i' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_info_icon_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item i, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-09 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .icon, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'info_title_style',
            array(
                'label' => __('Title', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_info_title_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item h4, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'info_title_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => 
                    '{{WRAPPER}} .uta-infobox-item h4, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content h4',
            ]
        );
        $this->add_control(
            'uta_info_title_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item h4, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content h4' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_title_color_hover',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item h4:hover, 
                    {{WRAPPER}} .uta-infobox-item.style-01:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-02:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-03:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-04:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-05:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-06:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-07:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-10:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-11:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-12:hover .content h4' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Content Style
        $this->start_controls_section(
            'info_content_style',
            array(
                'label' => __('Content', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_info_content_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-infobox-item p, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'info_content_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => 
                    '{{WRAPPER}} .uta-infobox-item p, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content p',
            ]
        );
        $this->add_control(
            'uta_info_content_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item p, 
                    {{WRAPPER}} .uta-infobox-item.style-01 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-02 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-03 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-04 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-05 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-06 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-07 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-10 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-11 .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-12 .content p' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_info_content_color_hover',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-infobox-item p:hover, 
                    {{WRAPPER}} .uta-infobox-item.style-01:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-02:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-03:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-04:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-05:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-06:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-07:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .content h4, 
                    {{WRAPPER}} .uta-infobox-item.style-08:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-10:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-11:hover .content p, 
                    {{WRAPPER}} .uta-infobox-item.style-12:hover .content p' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }


    protected function render( $instance = [] ) {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();
        //Inline Editing
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_inline_editing_attributes('text', 'basic');
        $this->add_inline_editing_attributes('icon', 'basic');

        if ( 'style-default' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-default.php';
        }

        if ( 'style-1' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-1.php';
        }

        if ( 'style-2' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-2.php';
        }
        if ( 'style-3' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-3.php';
        }
        if ( 'style-4' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-4.php';
        }
        if ( 'style-5' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-5.php';
        }
        if ( 'style-6' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-6.php';
        }
        if ( 'style-7' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-7.php';
        }
        if ( 'style-8' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-8.php';
        }
        if ( 'style-9' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-9.php';
        }
        if ( 'style-10' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-10.php';
        }
        if ( 'style-11' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-11.php';
        }
        if ( 'style-12' === $settings['uta_infobox_style'] ) {
            require (__DIR__) . '/template/style-12.php';
        }
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Uta_Infobox());
