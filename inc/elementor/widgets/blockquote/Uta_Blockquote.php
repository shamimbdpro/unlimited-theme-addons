<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Uta_Blockquote extends Widget_Base
{

    /**
     * Register widget name.
     *
     * @return string
     */
    public function get_name()
    {
        return 'uta-blockquote';
    }

    /**
     * Get widget title.
     *
     * @return string
     */
    public function get_title()
    {
        return esc_html__('UTA Blockquote', 'unlimited-theme-addons');
    }

    public function get_icon()
    {
        return 'eicon-blockquote';
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
    public function get_script_depends()
    {
        $scripts = [];

        return $scripts;
    }

    /**
     * Get widget keywords.
     *
     * @return array|string[]
     */
    public function get_keywords()
    {
        return [
            'quote box',
            'uta quote',
            'blockquote',
            'blockquote widget',
            'quote',
            'get quote',
            'unlimited theme addons',
        ];
    }

    /**
     * Widget category.
     *
     * @return array|string[]
     */
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

    /**
     * Register widget controls.
     *
     * @return string|array
     */
    protected function _register_controls()
    {

        // Register content controls.
        $this->uta_blockquote_controls();

        // Register style controls.
        $this->uta_blockquote_style();

    }


    /**
     * Widget controls.
     *
     * @return string|array
     */
    public function uta_blockquote_controls()
    {
        $this->start_controls_section(
            'uta_quote_section',
            [
                'label' => esc_html__('Block Quote', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::SECTION,
            ]
        );
        $this->add_responsive_control(
            'layouts',
            [
                'label' => esc_html__('Layouts', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-default' => esc_html__('Default', 'unlimited-theme-addons'),
                    'style-1' => esc_html__('Style-1', 'unlimited-theme-addons'),
                    'style-2' => esc_html__('Style-2', 'unlimited-theme-addons'),
                ],

                'default' => 'style-default',
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-quote-left',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'unlimited-theme-addons'),
                'label_block' => true,
                'condition' => [
                    'layouts' => ['style-1', 'style-2'],
                ],
            ]
        );

        $this->add_control(
            'quote_text',
            [
                'label' => __('Quote Text', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We release a new feature on an almost weekly basis, but it\'s always thrilling to read the positive feedback from our users. What do you think of our Blockquote widget?', 'unlimited-theme-addons'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'quote_speaker_name',
            [
                'label' => __('Quote Speaker Name', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Shamim Hasan', 'unlimited-theme-addons'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();
    }


    /**
     * Widget style controls.
     *
     * @return string|mixed
     */
    public function uta_blockquote_style()
    {
        $this->start_controls_section(
            'uta_blockquote_option_style',
            [
                'label' => __('Blockquote Style', 'unlimited-theme-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'unlimited-theme-addons' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .uta-blockquote',
            ]
        );



        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __('Typography', 'unlimited-theme-addons'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .uta-blockquote p',
            ]
        );
        $this->add_responsive_control(
            'uta_flip_num_padding',
            [
                'label' => __('Padding', 'unlimited-theme-addons-pro'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .uta-blockquote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'uta_flip_num_margin',
            [
                'label' => __('Margin', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .uta-blockquote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-blockquote',
            ]
        );

        $this->end_controls_section();
    }


    protected function render($instance = [])
    {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();
        //Inline Editing
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_inline_editing_attributes('icon', 'basic');
        $this->add_inline_editing_attributes('quote_text', 'basic');
        $this->add_inline_editing_attributes('quote_speaker_name', 'basic');

        if ('style-default' === $settings['layouts']) {
            require (__DIR__) . '/template/style-default.php';
        }

        if ('style-1' === $settings['layouts']) {
            require (__DIR__) . '/template/style-1.php';
        }

        if ('style-2' === $settings['layouts']) {
            require (__DIR__) . '/template/style-2.php';
        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Blockquote());
