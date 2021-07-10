<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
// team
class Uta_Team extends Widget_Base
{

    public function get_name()
    {
        return 'uta-team';
    }

    public function get_title()
    {
        return esc_html__('UTA Team', 'unlimited-theme-addons');
    }
    public function get_icon()
    {
        return 'eicon-person';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-team'];

    //     return $styles;
    // }

    /**
     * Widget script.
     * 
     * @return string
     */
    public function get_script_depends()
    {
        $scripts = [];

        return $scripts;
    }


    public function get_keywords()
    {
        return [
            'team',
            'uta team',
            'uta',
            'team widget',
            'widget',
            'addons',
            'team addons',
            'uta team member',
        ];
    }

    public function get_categories()
    {
        return ['uta-elements'];
    }


    /**
     * Retrieve Widget Support URL.
     *
     * @access public
     *
     * @return string support URL.
     */
    public function get_custom_help_url()
    {
        return 'https://codepopular.com/contact/';
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'team_section',
            [
                'label' => esc_html__('team', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => esc_html__('Choose photo', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'uta_team_style',
            [
                'label'   => esc_html__('Team Style', 'unlimited-theme-addons'),
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
                    'style-13'      => esc_html__('Style-13', 'unlimited-theme-addons'),
                    'style-14'      => esc_html__('Style-14', 'unlimited-theme-addons'),
                ],

                'default' => 'style-default',
            ]
        );

        $this->add_control(
            'name',
            [
                'label'       => esc_html__('Name', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('John Doe', 'unlimited-theme-addons'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'designation',
            [
                'label'       => esc_html__('Designation', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('App Developer', 'unlimited-theme-addons'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description_team_mebmber',
            [
                'label'       => esc_html__('Description', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'unlimited-theme-addons'),
                'label_block' => true,
                'condition'   => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            ]
        );

        $social = new \Elementor\Repeater();

        $social->add_control(
            'social_icon',
            [
                'label'   => esc_html__('Social Icon', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );

        $social->add_control(
            'social_url',
            [
                'label'   => esc_html__('Socia URL', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'social_media',
            [
                'label'       => __('social profile', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $social->get_controls(),
                'title_field' => esc_html__('Social Item', 'unlimited-theme-addons'),
                'default'     => [
                    [
                        'social_icon' => [
                            'value'   => 'fab fa-facebook-f',
                            'library' => 'fa-brands',
                        ],
                        'social_url'  => '#',
                    ],
                    [
                        'social_icon' => [
                            'value'   => 'fab fa-linkedin-in',
                            'library' => 'fa-brands',
                        ],
                        'social_url'  => '#',
                    ],
                    [
                        'social_icon' => [
                            'value'   => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                        'social_url'  => '#',
                    ],

                ],
                'title_field' => '{{{ social_icon.value }}}',
            ]
        );
        $this->add_control(
            'text_align',
            [
                'label'     => __('Alignment', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
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
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content, .team-overly, .team-overly, .team-style-2-overly, .team-style-5' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'custom_css',
            [
                'label'    => __('Custom CSS', 'unlimited-theme-addons'),
                'type'     => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
                'rows'     => 20,
            ]
        );
        $this->end_controls_section();
        // Start Controls Style Sections
        // Tab Style
        $this->start_controls_section(
            'team_default_style',
            array(
                'label' => __('Team', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_team_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default, .team-style-1, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-12, .team-style-13, .team-style-14' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_team_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default, .team-style-1, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-12, .team-style-13, .team-style-14' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .team-style-default, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-13, .team-style-14',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_team_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-13, .team-style-14' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Tab 
        */
        $this->start_controls_tabs(
            'uta_tram_style_tabs'
        );
        /*
         * Default Color
        */
        $this->start_controls_tab(
            'team_open_tab',
            [
                'label' => esc_html__('Default', 'unlimited-theme-addons'),
            ]
        );
        $this->add_control(
            'uta_team_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-13, .team-style-14' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .team-style-default, .team-style-2, .team-style-3, .team-style-4, .team-style-5, .team-style-6, .team-style-7, .team-style-8, .team-style-9, .team-style-10, .team-style-11, .team-style-13, .team-style-14',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'uta_tam_hover_tab',
            [
                'label' => esc_html__('Hover', 'unlimited-theme-addons'),
            ]
        );
        $this->add_control(
            'uta_tam_active_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default:hover, .team-style-12-content:hover, .team-content:hover, .team-style-2:hover, .team-style-3:hover, .team-style-4:hover, .team-style-5:hover, .team-style-6:hover, .team-style-7:hover, .team-style-8:hover, .team-style-9:hover, .team-style-10:hover, .team-style-11:hover, .team-style-13:hover, .team-style-14:hover' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box__hover_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .team-style-default:hover, .team-style-2:hover, .team-style-3:hover, .team-style-4:hover, .team-style-5:hover, .team-style-6:hover, .team-style-7:hover, .team-style-8:hover, .team-style-9:hover, .team-style-10:hover, .team-style-11:hover, .team-style-13:hover, .team-style-14:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /*
         * Tab Name Style
        */
        $this->start_controls_section(
            'name_style',
            array(
                'label' => __('Name', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-style-default-content h3, .team-content h3, .team-style-2-overly-full h3, .team-style-3-content h3, .team-style-3-content h3, .team-style-4-overly-full h3, .team-style-5 h3, .team-style-6-overly-full h3, .team-style-7-content h3, .team-style-8-content h3, .team-style-9 h3, .team-style-10-content h3, .team-single-info-11 .member-info-content h3, .team-style-12-content h3, .team-style-13-overly-top-full h3, .team-style-14-content h3',
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_team_name_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h3, .team-content h3, .team-style-2-overly-full h3, .team-style-3-content h3, .team-style-3-content h3, .team-style-4-overly-full h3, .team-style-5 h3, .team-style-6-overly-full h3, .team-style-7-content h3, .team-style-8-content h3, .team-style-9 h3, .team-style-10-content h3, .team-single-info-11 .member-info-content h3, .team-style-12-content h3, .team-style-13-overly-top-full h3, .team-style-14-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_team_name_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h3, .team-content h3, .team-style-2-overly-full h3, .team-style-3-content h3, .team-style-3-content h3, .team-style-4-overly-full h3, .team-style-5 h3, .team-style-6-overly-full h3, .team-style-7-content h3, .team-style-8-content h3, .team-style-9 h3, .team-style-10-content h3, .team-single-info-11 .member-info-content h3, .team-style-12-content h3, .team-style-13-overly-top-full h3, .team-style-14-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Color 
        */
        $this->add_control(
            'uta_team_name_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h3, .team-content h3, .team-content h4, .team-style-2-overly-full h3, .team-style-3-content h3, .team-style-3-content h3, .team-style-4-overly-full h3, .team-style-5 h3, .team-style-6-overly-full h3, .team-style-7-content h3, .team-style-8-content h3, .team-style-9 h3, .team-style-10-content h3, .team-single-info-11 .member-info-content h3, .team-style-12-content h3, .team-style-13-overly-top-full h3, .team-style-14-content h3' => 'color: {{VALUE}};',
                ],
            )
        );
        /*
         * Hover Color
        */
        $this->add_control(
            'uta_team_name_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h3:hover, .team-content h3:hover, .team-content h4:hover, .team-style-2-overly-full h3:hover, .team-style-3-content h3:hover, .team-style-3-content h3:hover, .team-style-4-overly-full h3:hover, .team-style-5 h3:hover, .team-style-6-overly-full h3:hover, .team-style-7-content h3:hover, .team-style-8-content h3:hover, .team-style-9 h3:hover, .team-style-10-content h3:hover, .team-single-info-11 .member-info-content h3:hover, .team-style-12-content h3:hover, .team-style-13-overly-top-full h3:hover, .team-style-14-content h3:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        /*
         * Tab Designation Style
        */
        $this->start_controls_section(
            'Designation_style',
            array(
                'label' => __('Designation', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'designation_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-style-default-content h5, .team-content p, .team-style-2-overly-full p, .team-style-3-content h5, .team-style-4-overly-full h5, .team-style-5 h5, .team-style-6-overly-full h5, .team-style-7-content h5, .team-style-8-content h5, .team-style-9 h5, .team-style-10-content h5, .team-single-info-11 .member-info-content h5, .team-style-12-content h5, .team-style-13-overly-top-full h5, .team-style-14-content h5',
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_team_designation_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h5, .team-content p, .team-style-2-overly-full p, .team-style-3-content h5, .team-style-4-overly-full h5, .team-style-5 h5, .team-style-6-overly-full h5, .team-style-7-content h5, .team-style-8-content h5, .team-style-9 h5, .team-style-10-content h5, .team-single-info-11 .member-info-content h5, .team-style-12-content h5, .team-style-13-overly-top-full h5, .team-style-14-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_team_designation_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h5, .team-content p, .team-style-2-overly-full p, .team-style-3-content h5, .team-style-4-overly-full h5, .team-style-5 h5, .team-style-6-overly-full h5, .team-style-7-content h5, .team-style-8-content h5, .team-style-9 h5, .team-style-10-content h5, .team-single-info-11 .member-info-content h5, .team-style-12-content h5, .team-style-13-overly-top-full h5, .team-style-14-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Color 
        */
        $this->add_control(
            'uta_team_designation_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h5, .team-content p, .team-style-2-overly-full p, .team-style-3-content h5, .team-style-4-overly-full h5, .team-style-5 h5, .team-style-6-overly-full h5, .team-style-7-content h5, .team-style-8-content h5, .team-style-9 h5, .team-style-10-content h5, .team-single-info-11 .member-info-content h5, .team-style-12-content h5, .team-style-13-overly-top-full h5, .team-style-14-content h5' => 'color: {{VALUE}};',
                ],
            )
        );
        /*
         * Hover Color
        */
        $this->add_control(
            'uta_team_designation_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h5:hover, .team-content p:hover, .team-style-2-overly-full p:hover, .team-style-3-content h5:hover, .team-style-4-overly-full h5:hover, .team-style-5 h5:hover, .team-style-6-overly-full h5:hover, .team-style-7-content h5:hover, .team-style-8-content h5:hover, .team-style-9 h5:hover, .team-style-10-content h5:hover, .team-single-info-11 .member-info-content h5:hover, .team-style-12-content h5:hover, .team-style-13-overly-top-full h5:hover, .team-style-14-content h5:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        /*
         * Tab Description Style
        */
        $this->start_controls_section(
            'Description',
            array(
                'label'     => __('Description', 'unlimited-theme-addons'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'description_typography',
                'label'     => __('Typography', 'unlimited-theme-addons'),
                'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector'  => '{{WRAPPER}} .team-style-3-content p, .team-style-5 p, .team-style-7-content p, .team-style-12-content p, .team-style-13-overly-top-full p',
                'condition' => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_team_description_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-3-content p, .team-style-5 p, .team-style-7-content p, .team-style-12-content p, .team-style-13-overly-top-full p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
                'condition'  => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            ]
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_team_description_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-3-content p, .team-style-5 p, .team-style-7-content p, .team-style-12-content p, .team-style-13-overly-top-full p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            ]
        );
        /*
         * Color 
        */
        $this->add_control(
            'uta_team_description_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-3-content p, .team-style-5 p, .team-style-7-content p, .team-style-12-content p, .team-style-13-overly-top-full p' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            )
        );
        /*
         * Hover Color
        */
        $this->add_control(
            'uta_team_description_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-3-content p:hover, .team-style-5 p:hover, .team-style-7-content p:hover, .team-style-12-content p:hover, .team-style-13-overly-top-full p:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'uta_team_style' => ['style-3', 'style-5', 'style-7', 'style-12', 'style-13'],
                ],
            )
        );
        $this->end_controls_section();

        /*
         * Tab Team Social Style
        */
        $this->start_controls_section(
            'team_social',
            array(
                'label' => __('Social', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_team_social_icon_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_team_social_icon_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'uta_team_icon_width',
            array(
                'label'      => __('Width', 'unlimited-theme-addons'),
                'type'       => Controls_Manager::NUMBER,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'width: {{VALUE}}px;',
                ],
            )
        );
        $this->add_control(
            'uta_team_icon_height',
            array(
                'label'     => __('Height', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'height: {{VALUE}}px;',
                ],
            )
        );
        /*
         * Social  Color
        */
        $this->start_controls_tabs(
            'uta_social_style_tabs'
        );
        /*
         * Default Color
        */
        $this->start_controls_tab(
            'social_open_tab',
            [
                'label' => esc_html__('Default', 'unlimited-theme-addons'),
            ]
        );
        $this->add_control(
            'social_icon_color',
            array(
                'label'     => __('Icon Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_social_icon_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_social_icon_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_team_social_icon_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'uta_social_team_hover_tab',
            [
                'label' => esc_html__('Hover', 'unlimited-theme-addons'),
            ]
        );
        $this->add_control(
            'social_hover_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i:hover, .team-overly .team-social ul, .team-social ul li a i:hover, .team-style-2-overly-full .social ul li a i:hover, .team-style-3-content .social ul li a i:hover, .team-style-4-overly-full .social ul li a i:hover, .team-style-5 .social ul li a i:hover, .team-style-6-overly-full .social ul li a i:hover, .team-style-7-overly ul li a i:hover, .team-style-8-social ul li a:hover, .team-style-9-img .social ul li a i:hover, .team-style-10-content .social ul li a i:hover, .team-single-info-11 .team-member-icon ul li a i:hover, .team-style-12-content .social ul li a i:hover, .team-style-13-overly-top-full .social-top ul li a i:hover, .team-style-14-img-overly .social ul li a i:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_team_social_hover_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i:hover, .team-overly .team-social ul, .team-social ul li a i:hover, .team-style-2-overly-full .social ul li a i:hover, .team-style-3-content .social ul li a i:hover, .team-style-4-overly-full .social ul li a i:hover, .team-style-5 .social ul li a i:hover, .team-style-6-overly-full .social ul li a i:hover, .team-style-7-overly ul li a i:hover, .team-style-8-social ul li a:hover, .team-style-9-img .social ul li a i:hover, .team-style-10-content .social ul li a i:hover, .team-single-info-11 .team-member-icon ul li a i:hover, .team-style-12-content .social ul li a i:hover, .team-style-13-overly-top-full .social-top ul li a i:hover, .team-style-14-img-overly .social ul li a i:hover' => 'background-color: {{VALUE}};',
                ],
            )
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_social_icon_hover_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_team_social_icon_border_hover_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i, .team-overly .team-social ul, .team-social ul li a i, .team-style-2-overly-full .social ul li a i, .team-style-3-content .social ul li a i, .team-style-4-overly-full .social ul li a i, .team-style-5 .social ul li a i, .team-style-6-overly-full .social ul li a i, .team-style-7-overly ul li a i, .team-style-8-social ul li a, .team-style-9-img .social ul li a i, .team-style-10-content .social ul li a i, .team-single-info-11 .team-member-icon ul li a i, .team-style-12-content .social ul li a i, .team-style-13-overly-top-full .social-top ul li a i, .team-style-14-img-overly .social ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /*
         * Team OVerly Background
        */
        $this->start_controls_section(
            'team_overly_background',
            array(
                'label' => __('Team Overly', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_control(
            'uta_team_overly__background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-overly .team-social ul, .team-style-2-overly, .team-style-4:after, .team-style-4:before, .team-style-6-overly, .team-style-7-overly, .team-style-9-img .social, .team-style-10-img::after, .team-style-11:hover .team-single-info-11, .team-style-13-overly-top, .team-style-14-img-overly' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }
    protected function render($instance = [])
    {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();
        $custom_css = $settings['custom_css'];
?>
        <style>
            <?php echo $custom_css; //PHPCS:IGNORE 
            ?>
        </style>
        <?php

        //Inline Editing
        $this->add_inline_editing_attributes('name', 'basic');
        $this->add_inline_editing_attributes('designation', 'basic');
        $this->add_inline_editing_attributes('description_team_mebmber', 'basic');

        ?>
        <div class="uta-team">
    <?php

        if ('style-default' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-default.php';
        }

        if ('style-1' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-01.php';
        }

        if ('style-2' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-02.php';
        }


        if ('style-3' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-03.php';
        }

        if ('style-4' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-04.php';
        }

        if ('style-5' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-05.php';
        }

        if ('style-6' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-06.php';
        }

        if ('style-7' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-07.php';
        }

        if ('style-8' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-08.php';
        }

        if ('style-9' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-09.php';
        }

        if ('style-10' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-10.php';
        }

        if ('style-11' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-11.php';
        }

        if ('style-12' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-12.php';
        }

        if ('style-13' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-13.php';
        }

        if ('style-14' === $settings['uta_team_style']) {

            require (__DIR__) . '/template/style-14.php';
        }

        echo "</div>";
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Uta_Team());
