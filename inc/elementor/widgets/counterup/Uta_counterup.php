<?php

namespace Elementor;

use \Elementor\Core\Schemes\Typography;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Class Uta_CounterUP
 * @package Elementor
 */
class Uta_CounterUP extends Widget_Base
{

    /**
     * Widget name.
     * @return string
     */
    public function get_name() {
        return 'uta-counter-up';
    }

    /**
     * Widget title.
     * @return string
     */
    public function get_title() {
        return esc_html__('UTA Counter Up', 'unlimited-theme-addons');
    }

    /**
     * Widget icon.
     * @return string
     */
    public function get_icon() {
        return 'eicon-logo';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-odometer', 'uta-counter-up'];

    //     return $styles;
    // }

    /**
     * Widget script.
     * 
     * @return string
     */
    public function get_script_depends() {
        $scripts = [ 'uta-jquery-appear', 'uta-odometer', 'uta-main' ];

        return $scripts;
    }


    /**
     * Widget keywords.
     * @return array|string[]
     */
    public function get_keywords() {
        return [
            'uta counter up',
            'uta counter up',
            'counter up',
            'uta',
            'counter up widget',
            'widget',
            'counter up',
            'unlimited theme addons',
        ];
    }

    /**
     * Widget Category.
     * @return array|string[]
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
     * Start widget control.
     * @return mixed
     */
    protected function register_controls() {

        /**
         * Start logo section.
         * @return string.
         */
        $this->start_controls_section(
            'uta_counter_up_section',
            [
                'label' => esc_html__('Counter Up', 'unlimited-theme-addons'),
            ]
        );

        // Chooses Style
        $this->add_responsive_control(
            'uta_counter_up_style',
            [
                'label'   => esc_html__('Countr Up Style', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-default' => esc_html__('Default', 'unlimited-theme-addons'),
                    'style-1'       => esc_html__('Style-1', 'unlimited-theme-addons'),
                    'style-2'       => esc_html__('Style-2', 'unlimited-theme-addons'),
                    'style-3'       => esc_html__('Style-3', 'unlimited-theme-addons'),
                ],
                'default' => 'style-default',
            ]
        );

        // Counter Up Start Number
        $this->add_control(
            'uta_counter_up_start_number',
            [
                'label'   => esc_html__('Starting Number', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );

        // Counter Up Ends Number
        $this->add_control(
            'uta_counter_up_ends_number',
            [
                'label'   => esc_html__('Ends Number', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::NUMBER,
                'default' => '299',
            ]
        );

        // Counter Up Number Suffix
        $this->add_control(
            'uta_counter_up_suffix_number',
            [
                'label'   => esc_html__('Number Suffix', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::TEXT,
                'default' => '+',
            ]
        );

        // Counter Up Animation Duration
        // $this->add_control(
        //     'uta_counter_up_animation',
        //     [
        //         'label'        => esc_html__('Animation Duration', 'unlimited-theme-addons'),
        //         'type'         => Controls_Manager::NUMBER,
        //         'default'      => '3000',
        //     ]
        // );

        // Counter Up Title
        $this->add_control(
            'uta_counter_up_title',
            [
                'label'   => esc_html__('Title', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Happy Customers',
            ]
        );

        // Counter Up Icon
        $this->add_control(
            'counter_up_icon',
            [
                'label'        => __('Icon', 'unlimited-theme-addons'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'unlimited-theme-addons'),
                'label_off'    => __('No', 'unlimited-theme-addons'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'icon',
            [
                'label'     => __('Icon', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'   => 'fas fa-heart',
                    'library' => 'solid',
                ],
                'condition' => [ 'counter_up_icon' => 'yes' ],
            ]
        );

        $this->end_controls_section();


        // Counter Up Style
        $this->start_controls_section(
            'counterup_box_style',
            array(
                'label' => __('Counter Up Box', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_counterup_box_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_counterup_box_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Background
        $this->add_control(
            'uta_counterup_box_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item' => 'background: {{VALUE}};',
                ],
            )
        );


        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_counter_up_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-counter-item',
            ]
        );

        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_counter_up_box_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-counter-item',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_counter_up_border_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Counter Up Icon
        $this->start_controls_section(
            'counterup_icon_style',
            array(
                'label' => __('Icon', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        // Counter Up Icon Width
        $this->add_control(
            'uta_counter_up_icon_width',
            [
                'label'     => esc_html__('Box Width', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'width: {{VALUE}}px;',
                ],
            ]
        );
        // Counter Up Icon Height
        $this->add_control(
            'uta_counter_up_icon_height',
            [
                'label'     => esc_html__('Box Height', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'height: {{VALUE}}px;',
                ],
            ]
        );
        // Background
        $this->add_control(
            'uta_counterup_box_icon_background',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'background: {{VALUE}};',
                ],
            )
        );
        // Color
        $this->add_control(
            'uta_counterup_box_icon_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'color: {{VALUE}};',
                ],
            )
        );
        // Background
        $this->add_control(
            'uta_counterup_box_icon_font_size',
            array(
                'label'     => __('Font Size', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'font-size: {{VALUE}}px;',
                ],
            )
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_counterup_box_icon_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Counter Up Title
        $this->start_controls_section(
            'counterup_title_style',
            array(
                'label' => __('NUMBER', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'counterup_title_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .uta-counter-item h2',
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_counterup_box_title_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Color
        $this->add_control(
            'uta_counterup_box_title_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item h2' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();

        // Counter Up Title
        $this->start_controls_section(
            'counterup_content_style',
            array(
                'label' => __('Title', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'counterup_cont_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .uta-counter-item p',
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_counterup_box_content_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-counter-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Color
        $this->add_control(
            'uta_counterup_box_content_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-counter-item p' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }


    protected function render() {
        $this->render_callback();
    }
    protected function render_callback() {
        $settings = $this->get_settings_for_display();
        $uta_counter_up_start_number = $settings['uta_counter_up_start_number'];
        $uta_counter_up_ends_number = $settings['uta_counter_up_ends_number'];
        $uta_counter_up_suffix_number = $settings['uta_counter_up_suffix_number'];
        // $uta_counter_up_animation = $settings['uta_counter_up_animation'];
        $uta_counter_up_title = $settings['uta_counter_up_title'];
        $icon = $settings['icon'];
?>
        <style>
            .uta-counter-item {
                margin: 20px;
            }
        </style>
        <?php
        // Counter Up style default.
        if ( 'style-default' === $settings['uta_counter_up_style'] ) {
            require (__DIR__) . '/template/default.php';
        }

        // Counter Up style 1.
        if ( 'style-1' === $settings['uta_counter_up_style'] ) {
            require (__DIR__) . '/template/style1.php';
        }

        // Counter Up style 2.
        if ( 'style-2' === $settings['uta_counter_up_style'] ) {
            require (__DIR__) . '/template/style2.php';
        }

        // Counter Up style 3.
        if ( 'style-3' === $settings['uta_counter_up_style'] ) {
            require (__DIR__) . '/template/style3.php';
        }

        ?>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_CounterUP());
