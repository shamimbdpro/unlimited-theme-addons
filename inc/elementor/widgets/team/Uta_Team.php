<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Uta_Team
 */
class Uta_Team extends Widget_Base
{

    /**
     * Widget Name.
     * 
     * @access public
     *
     * @return string
     */
    public function get_name() {
        return 'uta-team';
    }

    /**
     * Get Widget Title
     * 
     * @access public
     *
     * @return string
     */
    public function get_title() {
        return esc_html__('UTA Team', 'unlimited-theme-addons');
    }

    /**
     * Get Widget Icon
     * 
     * @access public
     *
     * @return void
     */
    public function get_icon() {
        return 'eicon-person';
    }

    /**
     * Widget script.
     * 
     * @access public
     * 
     * @return string
     */
    public function get_script_depends() {
        $scripts = [];

        return $scripts;
    }


    /**
     * Get Widget Search Keyword.
     * 
     * @access public
     *
     * @return void
     */
    public function get_keywords() {
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

    /**
     * Widget Category.
     * 
     * @access public
     *
     * @return void
     */
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
     * Register Widget Controls.
     * 
     * @access protected
     *
     * @return void
     */
    protected function register_controls() {


        $this->uta_team_controls();

        $this->uta_team_stlye();
        $this->uta_team_content_stlye();
        $this->uta_team_name_style();
        $this->uta_team_position_style();
        $this->uta_team_description_style();
        $this->uta_team_email_style();
        $this->uta_team_phone_style();
        $this->uta_team_social_style();
        $this->uta_team_overlay_style();
    }



    /**
     * Register Team Controls.
     * 
     * @access protected
     *
     * @return void
     */
    protected function uta_team_controls() {
        $this->start_controls_section(
            'team_section',
            [
                'label' => esc_html__('Team', 'unlimited-theme-addons'),
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
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            ]
        );


        $this->add_control(
            'uta_team_email',
            [
                'label'       => esc_html__('Email', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('info@team.com', 'unlimited-theme-addons'),
                'label_block' => true,
                'condition'   => [
                    'uta_team_style' => [ 'style-10' ],
                ],
            ]
        );


        $this->add_control(
            'uta_team_phone',
            [
                'label'       => esc_html__('Phone', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('+11 01485 988', 'unlimited-theme-addons'),
                'label_block' => true,
                'condition'   => [
                    'uta_team_style' => [ 'style-10' ],
                ],
            ]
        );


        $this->add_control(
            'uta_team_overlay_animation',
            [
                'label'   => esc_html__('Team Style', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,

                'condition'  => [
                    'uta_team_style' => [ 'style-6' ],
                ],

                'options' => [
                    'fade-in-left' => esc_html__('Fade In Left', 'unlimited-theme-addons'),
                    'fade-in-right' => esc_html__('Fade In Right', 'unlimited-theme-addons'),
                    'fade-in-up' => esc_html__('Fade In Up', 'unlimited-theme-addons'),
                    'fade-in-down' => esc_html__('Fade In Down', 'unlimited-theme-addons'),
                ],

                'default' => 'fade-in-left',
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
                'type'    => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'unlimited-theme-addons' ),
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
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

                'condition'   => [

                    'uta_team_style' => [ 'style-default', 'style-11' ],

                ],

                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content,
                    {{WRAPPER}} .team-style-11-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Widget Team Style
     * 
     * @access protected
     *
     * @return void
     */
    protected function uta_team_stlye() {

        // Tab Style
        $this->start_controls_section(
            'team_default_style',
            array(
                'label' => __('Team', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        // Team Style Padding 

        $this->add_responsive_control(
            'uta_team_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default,
                    {{WRAPPER}} .team-style-1,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-3, 
                    {{WRAPPER}} .team-style-4, 
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7, 
                    {{WRAPPER}} .team-style-8, 
                    {{WRAPPER}} .team-style-9, 
                    {{WRAPPER}} .team-style-10, 
                    {{WRAPPER}} .team-style-11' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Style Margin 

        $this->add_responsive_control(
            'uta_team_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default,
                    {{WRAPPER}} .team-style-1,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-3,
                    {{WRAPPER}} .team-style-4,
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7,
                    {{WRAPPER}} .team-style-8,
                    {{WRAPPER}} .team-style-9,
                    {{WRAPPER}} .team-style-10,
                    {{WRAPPER}} .team-style-11' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Style Border

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_item_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '
                    {{WRAPPER}} .team-style-default,
                    {{WRAPPER}} .team-style-1-content,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-3, 
                    {{WRAPPER}} .team-style-4,
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7,
                    {{WRAPPER}} .team-style-8,
                    {{WRAPPER}} .team-style-9,
                    {{WRAPPER}} .team-style-10,
                    {{WRAPPER}} .team-style-11',
            ]
        );
        /*
         * Team Style Border Radious
        */
        $this->add_control(
            'uta_team_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default,
                    {{WRAPPER}} .team-style-1-content,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-3,
                    {{WRAPPER}} .team-style-4,
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7,
                    {{WRAPPER}} .team-style-8,
                    {{WRAPPER}} .team-style-9,
                    {{WRAPPER}} .team-style-10,
                    {{WRAPPER}} .team-style-11' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // Animate Border 

        $this->add_control(
            'uta_team_animate_border_color',
            [
                'label'      => esc_html__('Animated Border', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'condition'  => [
                    'uta_team_style' => [ 'style-default' ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default:after' => 'background: {{VALUE}};',
                ],
            ]
        );


        // Animate Border Height 

        $this->add_control(
            'uta_team_animate_border_animated_height',
            [
                'label'      => esc_html__('Animated Border Height', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5,
                'condition'  => [
                    'uta_team_style' => [ 'style-default' ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default:after' => 'height: {{VALUE}}px;',
                ],
            ]
        );


        // Tab 

        $this->start_controls_tabs(
            'uta_tram_style_tabs'
        );

        // Default Color

        $this->start_controls_tab(
            'team_open_tab',
            [
                'label' => esc_html__('Default', 'unlimited-theme-addons'),
            ]
        );

        // Team Style Background 

        $this->add_control(
            'uta_team_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'condition'  => [
                    'uta_team_style' => [ 'style-default', 'style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8', 'style-9', 'style-10', 'style-11' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content,
                    {{WRAPPER}} .team-style-1-content,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-2-social-bottom,
                    {{WRAPPER}} .team-style-3,
                    {{WRAPPER}} .team-style-4,
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7,
                    {{WRAPPER}} .team-style-8,
                    {{WRAPPER}} .team-style-9,
                    {{WRAPPER}} .team-style-10,
                    {{WRAPPER}} .team-style-11' => 'background-color: {{VALUE}};',
                ],
            )
        );

        // Team Style Box Shadow

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '
                    {{WRAPPER}} .team-style-default,
                    {{WRAPPER}} .team-style-1-content,
                    {{WRAPPER}} .team-style-2,
                    {{WRAPPER}} .team-style-3,
                    {{WRAPPER}} .team-style-4,
                    {{WRAPPER}} .team-style-5,
                    {{WRAPPER}} .team-style-6,
                    {{WRAPPER}} .team-style-7,
                    {{WRAPPER}} .team-style-8,
                    {{WRAPPER}} .team-style-9,
                    {{WRAPPER}} .team-style-10,
                    {{WRAPPER}} .team-style-11',
            ]
        );


        $this->end_controls_tab();



        $this->start_controls_tab(
            'uta_tam_hover_tab',
            [
                'label' => esc_html__('Hover', 'unlimited-theme-addons'),
            ]
        );

        // Team Hover Background 

        $this->add_control(
            'uta_tam_active_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content:hover,
                    {{WRAPPER}} .team-style-1-content:hover,
                    {{WRAPPER}} .team-style-2:hover,
                    {{WRAPPER}} .team-style-3:hover,
                    {{WRAPPER}} .team-style-4:hover,
                    {{WRAPPER}} .team-style-5:hover,
                    {{WRAPPER}} .team-style-6:hover,
                    {{WRAPPER}} .team-style-7:hover,
                    {{WRAPPER}} .team-style-8:hover,
                    {{WRAPPER}} .team-style-9:hover,
                    {{WRAPPER}} .team-style-10:hover,
                    {{WRAPPER}} .team-style-11:hover' => 'background-color: {{VALUE}};',
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
                'selector' => '
                    {{WRAPPER}} .team-style-default:hover,
                    {{WRAPPER}} .team-style-1-content:hover,
                    {{WRAPPER}} .team-style-2:hover,
                    {{WRAPPER}} .team-style-3:hover,
                    {{WRAPPER}} .team-style-4:hover,
                    {{WRAPPER}} .team-style-5:hover,
                    {{WRAPPER}} .team-style-6:hover,
                    {{WRAPPER}} .team-style-7:hover,
                    {{WRAPPER}} .team-style-8:hover,
                    {{WRAPPER}} .team-style-9:hover,
                    {{WRAPPER}} .team-style-10:hover,
                    {{WRAPPER}} .team-style-11:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }


    /**
     * Team Content Style
     * 
     * @access protected
     *
     * @return void
     */
    protected function uta_team_content_stlye() {

        // Tab Style
        $this->start_controls_section(
            'team_content_style',
            array(
                'label' => __('Content', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'  => [
                    'uta_team_style' => [ 'style-5', 'style-8' ],
                ],
            )
        );

        // Team Style Padding 

        $this->add_responsive_control(
            'uta_team_content_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-5-content,
                    {{WRAPPER}} .team-style-8-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Style Margin 

        $this->add_responsive_control(
            'uta_team_content_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-5-content,
                    {{WRAPPER}} .team-style-8-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Style Border

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_content_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '
                    {{WRAPPER}} .team-style-5-content,
                    {{WRAPPER}} .team-style-8-content',
            ]
        );
        /*
         * Team Style Border Radious
        */
        $this->add_control(
            'uta_team_content_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-5-content,
                    {{WRAPPER}} .team-style-8-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     


        // Tab 

        $this->start_controls_tabs(
            'uta_content_style_tabs'
        );

        // Default Color

        $this->start_controls_tab(
            'team_content_tab',
            [
                'label' => esc_html__('Default', 'unlimited-theme-addons'),
            ]
        );

        // Team Style Background 

        $this->add_control(
            'uta_team_content_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-5-content,
                    {{WRAPPER}} .team-style-8-content' => 'background-color: {{VALUE}};',
                ],
            )
        );

    
        $this->end_controls_tab();



        $this->start_controls_tab(
            'uta_team_content_hover_tab',
            [
                'label' => esc_html__('Hover', 'unlimited-theme-addons'),
            ]
        );

        // Team Content Hover Background 

        $this->add_control(
            'uta_team_content_hover_bg',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-5-content:before,
                    {{WRAPPER}} .team-style-8-content:hover' => 'background-color: {{VALUE}};',
                ],
            )
        );
      
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }


    /**
     * Widget Name Style.
     * 
     * @access protected
     *
     * @return void
     */
    public function uta_team_name_style() {

        // Tab Name Style 

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
                'selector' => '
                    {{WRAPPER}} .team-style-default-content h3,
                    {{WRAPPER}} .team-style-1-content h4,
                    {{WRAPPER}} .team-style-2-overly-top-full h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-4-content h3,
                    {{WRAPPER}} .team-style-5-content h3,
                    {{WRAPPER}} .team-style-6-content .team-name,
                    {{WRAPPER}} .team-style-7-content h3,
                    {{WRAPPER}} .team-style-8-content h3,
                    {{WRAPPER}} .team-style-9 h3,
                    {{WRAPPER}} .team-style-10-content h3,
                    {{WRAPPER}} .team-style-11-content h3',
            ]
        );

        // Team Name Margin 

        $this->add_responsive_control(
            'uta_team_name_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h3,
                    {{WRAPPER}} .team-style-1-content h4,
                    {{WRAPPER}} .team-style-2-overly-top-full h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-4-content h3,
                    {{WRAPPER}} .team-style-5-content h3,
                    {{WRAPPER}} .team-style-6-content .team-name,
                    {{WRAPPER}} .team-style-7-content h3,
                    {{WRAPPER}} .team-style-8-content h3,
                    {{WRAPPER}} .team-style-9 h3,
                    {{WRAPPER}} .team-style-10-content h3,
                    {{WRAPPER}} .team-style-11-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Name Padding 

        $this->add_responsive_control(
            'uta_team_name_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h3,
                    {{WRAPPER}} .team-style-1-content h4,
                    {{WRAPPER}} .team-style-2-overly-top-full h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-4-content h3,
                    {{WRAPPER}} .team-style-5-content h3,
                    {{WRAPPER}} .team-style-6-content .team-name,
                    {{WRAPPER}} .team-style-7-content h3,
                    {{WRAPPER}} .team-style-8-content h3,
                    {{WRAPPER}} .team-style-9 h3,
                    {{WRAPPER}} .team-style-10-content h3,
                    {{WRAPPER}} .team-style-11-content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Name Color 

        $this->add_control(
            'uta_team_name_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h3,
                    {{WRAPPER}} .team-style-1-content h4,
                    {{WRAPPER}} .team-style-2-overly-top-full h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-3-content h3,
                    {{WRAPPER}} .team-style-4-content h3,
                    {{WRAPPER}} .team-style-5-content h3,
                    {{WRAPPER}} .team-style-6-content .team-name,
                    {{WRAPPER}} .team-style-7-content h3,
                    {{WRAPPER}} .team-style-8-content h3,
                    {{WRAPPER}} .team-style-9 h3,
                    {{WRAPPER}} .team-style-10-content h3,
                    {{WRAPPER}} .team-style-11-content h3' => 'color: {{VALUE}};',
                ],
            )
        );

        // Team Name Hover Color 

        $this->add_control(
            'uta_team_name_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h3:hover,
                    {{WRAPPER}} .team-style-1-content h4:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full h3:hover,
                    {{WRAPPER}} .team-style-3-content h3:hover,
                    {{WRAPPER}} .team-style-3-content h3:hover,
                    {{WRAPPER}} .team-style-4-content h3:hover,
                    {{WRAPPER}} .team-style-5-content h3:hover,
                    {{WRAPPER}} .team-style-6-content .team-name:hover,
                    {{WRAPPER}} .team-style-7-content h3:hover,
                    {{WRAPPER}} .team-style-8-content h3:hover,
                    {{WRAPPER}} .team-style-9 h3:hover,
                    {{WRAPPER}} .team-style-10-content h3:hover,
                    {{WRAPPER}} .team-style-11-content h3:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }


    /**
     * Team Position Style.
     * 
     * @access protected
     *
     * @return void
     */
    protected function uta_team_position_style() {

        $this->start_controls_section(
            'team_position_style',
            array(
                'label' => __('Position', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        // Team Position Typography 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'team_position_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .team-style-default-content h5,
                    {{WRAPPER}} .team-style-1-content p,
                    {{WRAPPER}} .team-style-2-overly-top-full h5,
                    {{WRAPPER}} .team-style-3-content h5,
                    {{WRAPPER}} .team-style-4-content span,
                    {{WRAPPER}} .team-style-5-content span,
                    {{WRAPPER}} .team-style-6-content .team-position,
                    {{WRAPPER}} .team-style-7-content h5,
                    {{WRAPPER}} .team-style-8-content h5,
                    {{WRAPPER}} .team-style-9 h5,
                    {{WRAPPER}} .team-style-10-content p,
                    {{WRAPPER}} .team-style-11-content h5',
            ],
        );

        // Team Designation Margin 

        $this->add_responsive_control(
            'uta_team_position_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h5,
                    {{WRAPPER}} .team-style-1-content p,
                    {{WRAPPER}} .team-style-2-overly-top-full h5,
                    {{WRAPPER}} .team-style-3-content h5,
                    {{WRAPPER}} .team-style-4-content span,
                    {{WRAPPER}} .team-style-5-content span,
                    {{WRAPPER}} .team-style-6-content .team-position,
                    {{WRAPPER}} .team-style-7-content h5,
                    {{WRAPPER}} .team-style-8-content h5,
                    {{WRAPPER}} .team-style-9 h5,
                    {{WRAPPER}} .team-style-10-content p,
                    {{WRAPPER}} .team-style-11-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Designation Padding 

        $this->add_responsive_control(
            'uta_team_position_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content h5,
                    {{WRAPPER}} .team-style-1-content p,
                    {{WRAPPER}} .team-style-2-overly-top-full h5,
                    {{WRAPPER}} .team-style-3-content h5,
                    {{WRAPPER}} .team-style-4-content span,
                    {{WRAPPER}} .team-style-5-content span,
                    {{WRAPPER}} .team-style-6-content .team-position,
                    {{WRAPPER}} .team-style-7-content h5,
                    {{WRAPPER}} .team-style-8-content h5,
                    {{WRAPPER}} .team-style-9 h5,
                    {{WRAPPER}} .team-style-10-content p,
                    {{WRAPPER}} .team-style-11-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Designation Color 

        $this->add_control(
            'uta_team_position_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h5,
                    {{WRAPPER}} .team-style-1-content p,
                    {{WRAPPER}} .team-style-2-overly-top-full h5,
                    {{WRAPPER}} .team-style-3-content h5,
                    {{WRAPPER}} .team-style-4-content span,
                    {{WRAPPER}} .team-style-5-content span,
                    {{WRAPPER}} .team-style-6-content .team-position,
                    {{WRAPPER}} .team-style-7-content h5,
                    {{WRAPPER}} .team-style-8-content h5,
                    {{WRAPPER}} .team-style-9 h5,
                    {{WRAPPER}} .team-style-10-content p,
                    {{WRAPPER}} .team-style-11-content h5' => 'color: {{VALUE}};',
                ],
            )
        );

        // Team Designation Hover Color 

        $this->add_control(
            'uta_team_position_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content h5:hover,
                    {{WRAPPER}} .team-style-1-content p:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full h5:hover,
                    {{WRAPPER}} .team-style-3-content h5:hover,
                    {{WRAPPER}} .team-style-4-content span:hover,
                    {{WRAPPER}} .team-style-5-content span:hover,
                    {{WRAPPER}} .team-style-6-content .team-position:hover,
                    {{WRAPPER}} .team-style-7-content h5:hover,
                    {{WRAPPER}} .team-style-8-content h5:hover,
                    {{WRAPPER}} .team-style-9 h5:hover,
                    {{WRAPPER}} .team-style-10-content p:hover,
                    {{WRAPPER}} .team-style-11-content h5:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }


    /**
     * Team Style Description
     *
     * @return void
     */
    public function uta_team_description_style() {
        /*
         * Tab Description Style
        */

        $this->start_controls_section(
            'uta_team_desc_style',
            array(
                'label'     => __('Description', 'unlimited-theme-addons'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            )
        );

        // Team Description Typography 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'team_desc_typography',
                'label'     => __('Typography', 'unlimited-theme-addons'),
                'scheme'    => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector'  => '
                    {{WRAPPER}} .team-style-3-content p,
                    {{WRAPPER}} .team-style-7-content p,
                    {{WRAPPER}} .team-style-2-overly-top-full p',
                'condition' => [
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            ]
        );

        // Team Description Margin 

        $this->add_responsive_control(
            'uta_team_desc_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-3-content p,
                    {{WRAPPER}} .team-style-5 p,
                    {{WRAPPER}} .team-style-7-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
                'condition'  => [
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            ]
        );

        // Team Description Margin 

        $this->add_responsive_control(
            'uta_team_desc_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-3-content p,
                    {{WRAPPER}} .team-style-5 p,
                    {{WRAPPER}} .team-style-7-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            ]
        );

        // Team Description color 

        $this->add_control(
            'uta_team_desc_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-3-content p,
                    {{WRAPPER}} .team-style-5 p,
                    {{WRAPPER}} .team-style-7-content p' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'uta_team_style' => [ 'style-7', 'style-2' ],
                ],
            )
        );

        // Team Description Hover Color 

        $this->add_control(
            'uta_team_desc_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-3-content p:hover,
                    {{WRAPPER}} .team-style-5 p:hover,
                    {{WRAPPER}} .team-style-7-content p:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'uta_team_style' => [ 'style-3', 'style-7' ],
                ],
            )
        );
        $this->end_controls_section();
    }



    /**
     * Team Email Style.
     * 
     * @access protected 
     *
     * @return void
     */
    protected function uta_team_email_style() {

        $this->start_controls_section(
            'uta_team_email_style',
            array(
                'label' => __('Email', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'  => [
                    'uta_team_style' => [ 'style-10' ],
                ],
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_team_email_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-style-10-content .team-email',
            ]
        );

        // Team Name Margin 

        $this->add_responsive_control(
            'uta_team_email_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-10-content .team-email' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Name Padding 

        $this->add_responsive_control(
            'uta_team_email_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-10-content .team-email' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Email Color 

        $this->add_control(
            'uta_team_email_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-10-content .team-email' => 'color: {{VALUE}};',
                ],
            )
        );

        // Team Name Hover Color 

        $this->add_control(
            'uta_team_email_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-10-content .team-email:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }




    /**
     * Team Phone.
     * 
     * @access protected 
     *
     * @return void
     */
    protected function uta_team_phone_style() {

        $this->start_controls_section(
            'uta_team_phone_style',
            array(
                'label' => __('Phone', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'uta_team_style' => [ 'style-10' ],
                ],
            )
        );

        // Team Phone Typography

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_team_phone_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-style-10-content .team-phone',
            ]
        );

        // Team Phone Margin 

        $this->add_responsive_control(
            'uta_team_phone_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
					'{{WRAPPER}} .team-style-10-content .team-phone' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
        );

        // Team Phone Padding 

        $this->add_responsive_control(
            'uta_team_phone_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-10-content .team-phone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Phone Color 

        $this->add_control(
            'uta_team_phone_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .team-style-10-content .team-phone' => 'color: {{VALUE}};',
				],
            )
        );

        // Team Phone Hover Color 

        $this->add_control(
            'uta_team_phone_hover_color',
            array(
                'label'     => __('Hover Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-10-content .team-phone:hover' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }


    /**
     * Team Social Style.
     * 
     * @access protected
     *
     * @return void
     */
    public function uta_team_social_style() {
        /*
         * Tab Team Social Style
        */
        $this->start_controls_section(
            'uta_team_social',
            array(
                'label' => __('Social', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        // Team Social Icon Margin 

        $this->add_responsive_control(
            'uta_team_social_icon_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul,
                    {{WRAPPER}} .team-style-1-social ul li a i,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        // Team Social Icon Padding 

        $this->add_responsive_control(
            'uta_team_social_icon_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Team Social Icon Width 

        $this->add_control(
            'uta_team_icon_width',
            array(
                'label'      => __('Width', 'unlimited-theme-addons'),
                'type'       => Controls_Manager::NUMBER,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'width: {{VALUE}}px;',
                ],
            )
        );

        // Team Social Icon Height 

        $this->add_control(
            'uta_team_icon_height',
            array(
                'label'     => __('Height', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'height: {{VALUE}}px;',
                ],
            )
        );

        // Team Social Icon Color 

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
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul li a i,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'color: {{VALUE}};',
                ],
            )
        );


        // Social Icon Area Background 

        $this->add_control(
            'uta_social_area_background',
            array(
                'label'     => __('Social Area Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'condition'   => [

                    'uta_team_style' => [ 'style-1', 'style-4', 'style-10' ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .team-style-4-social,
                     {{WRAPPER}} .team-style-1-social ul,
                     {{WRAPPER}} .team-style-10-social,
                     {{WRAPPER}} .team-style-4-img:after' => 'background-color: {{VALUE}};',

                ],
            )
        );



        // Social Icon Background Color 

        $this->add_control(
            'uta_social_icon_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul li a i,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i' => 'background-color: {{VALUE}};',
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
                'selector' => '
                    {{WRAPPER}} .team-style-default-content .social ul li a i,
                    {{WRAPPER}} .team-style-1-social ul li a i,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                    {{WRAPPER}} .team-style-3-content .social ul li a i,
                    {{WRAPPER}} .team-style-4-social li a i,
                    {{WRAPPER}} .team-style-5-social li a,
                    {{WRAPPER}} .team-style-6-social li a i,
                    {{WRAPPER}} .team-style-7-social ul li a i,
                    {{WRAPPER}} .team-style-8-social ul li a,
                    {{WRAPPER}} .team-style-9-img .social ul li a i,
                    {{WRAPPER}} .team-style-10-social li a i,
                    {{WRAPPER}} .team-style-11-icon ul li a i',
            ]
        );

        // Social Icon Border Radious

        $this->add_control(
            'uta_team_social_icon_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i,
                     {{WRAPPER}} .team-style-1-social ul li a i,
                     {{WRAPPER}} .team-style-2-overly-top-full ul li a i,
                     {{WRAPPER}} .team-style-2-social-bottom ul li a i,
                     {{WRAPPER}} .team-style-3-content .social ul li a i,
                     {{WRAPPER}} .team-style-4-social li a i,
                     {{WRAPPER}} .team-style-5-social li a,
                     {{WRAPPER}} .team-style-6-social li a i,
                     {{WRAPPER}} .team-style-7-social ul li a i,
                     {{WRAPPER}} .team-style-8-social ul li a,
                     {{WRAPPER}} .team-style-9-img .social ul li a i,
                     {{WRAPPER}} .team-style-10-social li a i,
                     {{WRAPPER}} .team-style-11-icon ul li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Social Hover Tab 

        $this->start_controls_tab(
            'uta_social_team_hover_tab',
            [
                'label' => esc_html__('Hover', 'unlimited-theme-addons'),
            ]
        );

        // Team Social Hover Color 

        $this->add_control(
            'social_hover_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-1-social ul li a i:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i:hover,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i:hover,
                    {{WRAPPER}} .team-style-3-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-4-social li a i:hover,
                    {{WRAPPER}} .team-style-5-social li a:hover,
                    {{WRAPPER}} .team-style-6-social li a i:hover,
                    {{WRAPPER}} .team-style-7-social ul li a i:hover,
                    {{WRAPPER}} .team-style-8-social ul li a:hover,
                    {{WRAPPER}} .team-style-9-img .social ul li a i:hover,
                    {{WRAPPER}} .team-style-10-social li a i:hover,
                    {{WRAPPER}} .team-style-11-icon ul li a i:hover' => 'color: {{VALUE}};',
                ],
            )
        );



        $this->add_control(
            'uta_team_social_hover_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-default-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-1-social ul li a i:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i:hover,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i:hover,
                    {{WRAPPER}} .team-style-3-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-4-social li a i:hover,
                    {{WRAPPER}} .team-style-5-social li a:hover,
                    {{WRAPPER}} .team-style-6-social li a i:hover,
                    {{WRAPPER}} .team-style-7-social ul li a i:hover,
                    {{WRAPPER}} .team-style-8-social ul li a:hover,
                    {{WRAPPER}} .team-style-9-img .social ul li a i:hover,
                    {{WRAPPER}} .team-style-10-social li a i:hover,
                    {{WRAPPER}} .team-style-11-icon ul li a i:hover' => 'background-color: {{VALUE}};',
                ],
            )
        );

        // Team Hover Border 

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_team_social_icon_hover_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '
                    {{WRAPPER}} .team-style-default-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-1-social ul li a i:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i:hover,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i:hover,
                    {{WRAPPER}} .team-style-3-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-4-social li a i:hover,
                    {{WRAPPER}} .team-style-5-social li a:hover,
                    {{WRAPPER}} .team-style-6-social li a i:hover,
                    {{WRAPPER}} .team-style-7-social ul li a i:hover,
                    {{WRAPPER}} .team-style-8-social ul li a:hover,
                    {{WRAPPER}} .team-style-9-img .social ul li a i:hover,
                    {{WRAPPER}} .team-style-10-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-11-icon ul li a i:hover',
            ]
        );

        // Team Hover Border Radious

        $this->add_control(
            'uta_team_social_icon_border_hover_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '
                    {{WRAPPER}} .team-style-default-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-1-social ul li a i:hover,
                    {{WRAPPER}} .team-style-2-overly-top-full ul li a i:hover,
                    {{WRAPPER}} .team-style-2-social-bottom ul li a i:hover,
                    {{WRAPPER}} .team-style-3-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-4-social li a i:hover,
                    {{WRAPPER}} .team-style-5-social li a:hover,
                    {{WRAPPER}} .team-style-6-social li a i:hover,
                    {{WRAPPER}} .team-style-7-social ul li a i:hover,
                    {{WRAPPER}} .team-style-8-social ul li a:hover,
                    {{WRAPPER}} .team-style-9-img .social ul li a i:hover,
                    {{WRAPPER}} .team-style-10-content .social ul li a i:hover,
                    {{WRAPPER}} .team-style-11-icon ul li a i:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }



    /**
     * Team Overlay Style.
     * 
     * @access protected
     *
     * @return void
     */
    public function uta_team_overlay_style() {

        // Team Overlay Background 

        $this->start_controls_section(
            'team_overly_background',
            array(
                'label' => __('Team Overly', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'  => [
                    'uta_team_style' => [ 'style-2', 'style-4', 'style-5', 'style-6', 'style-7', 'style-9', 'style-11' ],
                ],
            )
        );
        $this->add_control(
            'uta_team_overly_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-style-1-social ul,
                    {{WRAPPER}} .team-style-2-overly-top,
                    {{WRAPPER}} .team-style-4-img:before,
                    {{WRAPPER}} .team-style-4:before,
                    {{WRAPPER}} .team-style-5-img:before,
                    {{WRAPPER}} .team-style-6-content,
                    {{WRAPPER}} .team-style-7-social,
                    {{WRAPPER}} .team-style-9-img:before,
                    {{WRAPPER}} .team-style-10-img::after,
                    {{WRAPPER}} .team-style-11:hover .team-single-info-11' => 'background-color: {{VALUE}};',
                ],
            )
        );


        $this->end_controls_section();
    }



    /**
     * Widget Render Elements.
     *
     * @param array $instance
     * @return void
     */
    protected function render( $instance = [] ) {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();

        //Inline Editing
        $this->add_inline_editing_attributes('name', 'basic');
        $this->add_inline_editing_attributes('designation', 'basic');
        $this->add_inline_editing_attributes('description_team_mebmber', 'basic');
        $this->add_inline_editing_attributes('uta_team_email', 'basic');
        $this->add_inline_editing_attributes('uta_team_phone', 'basic');

?>
        <div class="uta-team">
    <?php

        if ( 'style-default' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-default.php';
        }

        if ( 'style-1' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-01.php';
        }

        if ( 'style-2' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-02.php';
        }


        if ( 'style-3' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-03.php';
        }

        if ( 'style-4' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-04.php';
        }

        if ( 'style-5' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-05.php';
        }

        if ( 'style-6' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-06.php';
        }

        if ( 'style-7' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-07.php';
        }

        if ( 'style-8' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-08.php';
        }

        if ( 'style-9' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-09.php';
        }

        if ( 'style-10' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-10.php';
        }

        if ( 'style-11' === $settings['uta_team_style'] ) {

            require (__DIR__) . '/template/style-11.php';
        }

        echo "</div>";
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Uta_Team());
