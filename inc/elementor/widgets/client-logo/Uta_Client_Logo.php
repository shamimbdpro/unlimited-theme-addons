<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Uta_Company_Logo
 * @package Elementor
 */
class Uta_Company_Logo extends Widget_Base
{

    /**
     * Widget name.
     * @return string
     */
    public function get_name() {
        return 'uta-company-logo';
    }

    /**
     * Widget title.
     * @return string
     */
    public function get_title() {
        return esc_html__( 'UTA Company Logo', 'unlimited-theme-addons' );
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
    // public function get_style_depends() {
    //     $styles = ['slick-theme', 'slick', 'uta-company-logo'];
      
    //     return $styles;
    // }
      
    /**
     * Widget script.
     * 
     * @return string
    */ 
    public function get_script_depends() {
        $scripts = [ 'uta-slick', 'uta-main' ];
        return $scripts;
    }

    /**
     * Widget keywords.
     * @return array|string[]
     */
    public function get_keywords() {
        return [
            'uta company logo',
            'uta company logo',
            'logo',
            'uta',
            'logo widget',
            'widget',
            'client logo',
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
     * Start widget control.
     * @return mixed
     */
    protected function register_controls() {

        /**
         * Start logo section.
         * @return string.
         */
        $this->start_controls_section(
            'uta_company_logo_section',
            [
                'label' => esc_html__( 'Logo', 'unlimited-theme-addons' ),
            ]
        );

        // Company logo style.
        $this->add_control(
            'uta_company_logo_style',
            [
                'label'   => esc_html__( 'Slide Style ', 'unlimited-theme-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style-default',
                'options' => [
                    'style-default' => esc_html__( 'Style Default', 'unlimited-theme-addons' ),
                    'style-1'       => esc_html__( 'Style 1', 'unlimited-theme-addons' ),
                    'style-2'       => esc_html__( 'Style 2', 'unlimited-theme-addons' ),
                    'style-3'       => esc_html__( 'Style 3', 'unlimited-theme-addons' ),
                    'style-4'       => esc_html__( 'Style 4', 'unlimited-theme-addons' ),
                    'style-5'       => esc_html__( 'Style 5', 'unlimited-theme-addons' ),
                    'style-6'       => esc_html__( 'Style 6', 'unlimited-theme-addons' ),
                    'style-7'       => esc_html__( 'Style 7', 'unlimited-theme-addons' ),
                    'style-8'       => esc_html__( 'Style 8', 'unlimited-theme-addons' ),
                    'style-9'       => esc_html__( 'Style 9', 'unlimited-theme-addons' ),
                    'style-10'      => esc_html__( 'Style 10', 'unlimited-theme-addons' ),
                ],
            ]
        );

        // Start repeater loop.
        $repeater = new Repeater();

        // Company name.
        $repeater->add_control(
            'uta_company_logo_list_title', [
                'label'       => esc_html__( 'Company Name', 'unlimited-theme-addons' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'List Title' , 'unlimited-theme-addons' ),
                'label_block' => true,
            ]
        );

        // Company logo image.
        $repeater->add_control(
            'uta_company_logo_image_normal',
            [
                'label'   => esc_html__( 'Company Logo', 'unlimited-theme-addons' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Company logo hover Enable/Disable switcher.
        $repeater->add_control(
            'uta_company_logo_enable_hover_logo',
            [
                'label'        => esc_html__( 'Enable Hover Logo', 'unlimited-theme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => 'yes',
                'default'      => '',
            ]
        );

        // Company logo hover image.
        $repeater->add_control(
            'uta_company_logo_image_hover',
            [
                'label'     => esc_html__( 'Hover Logo', 'unlimited-theme-addons' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'uta_company_logo_enable_hover_logo' => 'yes',
                ],
            ]
        );

        // Company link Enable/Disable switcher.
        $repeater->add_control(
            'uta_company_logo_enable_link',
            [
                'label'        => esc_html__( 'Enable Link', 'unlimited-theme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => 'yes',
            ]
        );

        // Company logo website link.
        $repeater->add_control(
            'uta_company_logo_website_link',
            [
                'label'         => esc_html__( 'Link', 'unlimited-theme-addons' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'unlimited-theme-addons' ),
                'show_external' => true,
                'condition'     => [
                    'uta_company_logo_enable_link' => 'yes',
                ],
            ]
        );


        // Company logo repeater.
        $this->add_control(
            'uta_company_logo_repeater',
            [
                'label'       => esc_html__( 'Repeater List', 'unlimited-theme-addons' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'uta_company_logo_list_title' => esc_html__( 'Title #1', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_company_logo_list_title' => esc_html__( 'Title #2', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_company_logo_list_title' => esc_html__( 'Title #3', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_company_logo_list_title' => esc_html__( 'Title #4', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_company_logo_list_title' => esc_html__( 'Title #5', 'unlimited-theme-addons' ),
                    ],
                ],
                'title_field' => '{{{ uta_company_logo_list_title }}}',
            ]
        );

        $this->end_controls_section();

        /**------------------------------------
           Logo Settings.
        --------------------------------------*/
       $this->start_controls_section(
       'uta_client_logo_settings',
           [
			   'label' => esc_html__('Settings', 'unlimited-theme-addons'),
           ]
       );

       //---- Slide Show -----//

       $this->add_control(
          'uta_company_logo_slideshow',
           [
               'label'   => esc_html__( 'Slide Show', 'unlimited-theme-addons' ),
               'type'    => Controls_Manager::NUMBER,
               'default' => '5',
           ]
       );

     //---- Arrow Enable/Disable -----//

       $this->add_control(
          'uta_company_logo_show_arrow',
           [
               'label'        => esc_html__( 'Display Arrow', 'unlimited-theme-addons' ),
               'type'         => Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
               'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
               'return_value' => true,
           ]
       );

        //---- Arrow Enable/Disable -----//

        $this->add_control(
            'uta_company_logo_show_dots',
            [
                'label'        => esc_html__( 'Slide Dots', 'unlimited-theme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => true,
            ]
        );

        //---- Auto Play -----//

        $this->add_control(
            'uta_company_logo_autoplay',
            [
                'label'        => esc_html__( 'Auto Play', 'unlimited-theme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => true,
                'default'      => true,
            ]
        );

        //---- Auto Play Speed -----//

        $this->add_control(
            'uta_company_logo_speed',
            [
                'label'   => esc_html__( 'Auto Play Speed', 'unlimited-theme-addons' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1000,
            ]
        );

        //---- Infinite Scroll -----//

        $this->add_control(
            'uta_company_logo_infinite_scroll',
            [
                'label'        => esc_html__( 'Infinite Scroll', 'unlimited-theme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off'    => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => true,
                'default'      => true,
            ]
        );

       $this->end_controls_section();




        // Client Logo Style
        $this->start_controls_section(
            'company_logo_style',
            array(
                'label' => __('Style','unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_control(
            'uta_client_logo_padding',
            [
                'label'      => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2,.uta-company-logo-style-3, .uta-company-logo-style-4, .uta-company-logo-style-5, .uta-company-logo-style-6, .uta-company-logo-style-7, .uta-company-logo-style-8, .uta-company-logo-style-9, .uta-company-logo-style-10' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_control(
            'uta_client_logo_margin',
            [
                'label'      => esc_html__( 'Margin', 'unlimited-theme-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2 .uta-company-logo-single-full, .uta-company-logo-style-3 .uta-company-logo-single-full, .uta-company-logo-style-4 .uta-company-logo-single, .uta-company-logo-style-5 .uta-company-logo-single-full, .uta-company-logo-style-6 .uta-company-logo-single-full, .uta-company-logo-style-7 .uta-company-logo-single-full, .uta-company-logo-style-8 .uta-company-logo-single-full, .uta-company-logo-style-9 .uta-company-logo-single-full, .uta-company-logo-style-10 .uta-company-logo-single-full' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_client_logo_border',
                'label'    => esc_html__( 'Border', 'unlimited-theme-addons' ),
                'selector' => '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2 .uta-company-logo-single-full, .uta-company-logo-style-3 .uta-company-logo-single-full, .uta-company-logo-style-4 .uta-company-logo-single, .uta-company-logo-style-5 .uta-company-logo-single-full, .uta-company-logo-style-6 .uta-company-logo-single-full, .uta-company-logo-style-7 .uta-company-logo-single-full, .uta-company-logo-style-8 .uta-company-logo-single-full, .uta-company-logo-style-9 .uta-company-logo-single-full, .uta-company-logo-style-10 .uta-company-logo-single-full',
            ]
        );
        /*
         * Border Hover
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'uta_client_logo_hover_border',
                'label'     => esc_html__( 'Hover Border', 'unlimited-theme-addons' ),
                'selector'  => '{{WRAPPER}} .uta-company-logo-style-9 .uta-company-logo-single-full:hover',
                'condition' => [
                    'uta_company_logo_style' => [ 'style-9' ],
                ],
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_client_logo_border_radious',
            [
                'label'      => esc_html__( 'Border Radius', 'unlimited-theme-addons' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2 .uta-company-logo-single-full, .uta-company-logo-style-3 .uta-company-logo-single-full, .uta-company-logo-style-4 .uta-company-logo-single, .uta-company-logo-style-5 .uta-company-logo-single-full, .uta-company-logo-style-6 .uta-company-logo-single-full, .uta-company-logo-style-7 .uta-company-logo-single-full, .uta-company-logo-style-8 .uta-company-logo-single-full, .uta-company-logo-style-9 .uta-company-logo-single-full, .uta-company-logo-style-10 .uta-company-logo-single-full' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
          /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_client_logo_shadow',
                'label'    => __( 'Box Shadow', 'unlimited-theme-addons' ),
                'selector' => '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2 .uta-company-logo-single-full, .uta-company-logo-style-3 .uta-company-logo-single-full, .uta-company-logo-style-4 .uta-company-logo-single, .uta-company-logo-style-5 .uta-company-logo-single-full, .uta-company-logo-style-6 .uta-company-logo-single-full, .uta-company-logo-style-7 .uta-company-logo-single-full, .uta-company-logo-style-8 .uta-company-logo-single-full, .uta-company-logo-style-9 .uta-company-logo-single-full, .uta-company-logo-style-10 .uta-company-logo-single-full',
            ]
        );

        $this->add_control(
            'uta_client_logo_background',
            array(
                'label'     => __('Background','unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-company-logo-style-default .uta-company-logo-item-single, .uta-company-logo-style-1 .uta-company-logo-item-single, .uta-company-logo-style-2 .uta-company-logo-single-full, .uta-company-logo-style-3 .uta-company-logo-single-full, .uta-company-logo-style-4 .uta-company-logo-single, .uta-company-logo-style-5 .uta-company-logo-single-full, .uta-company-logo-style-6 .uta-company-logo-single-full, .uta-company-logo-style-7 .uta-company-logo-single-full, .uta-company-logo-style-8 .uta-company-logo-single-full, .uta-company-logo-style-9 .uta-company-logo-single-full, .uta-company-logo-style-10 .uta-company-logo-single-full' => 'background-color: {{VALUE}};',
                ],
            )
        );

        $this->add_control(
            'uta_client_logo_background_hover',
            array(
                'label'     => __('Background Hover ','unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-company-logo-style-3 .uta-company-logo-single-full:hover, .uta-company-logo-style-4 .uta-company-logo-single::after, .uta-company-logo-style-5 .uta-company-logo-single-full::after, .uta-company-logo-style-6 .uta-company-logo-single-full .overly, .uta-company-logo-style-7 .uta-company-logo-single-full .uta-partner-overly, .uta-company-logo-style-8 .uta-company-logo-single-full .uta-partner-overly' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'uta_company_logo_style' => [ 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8' ],
                ],
            )
        );
        $this->add_control(
            'image_width',
            [
                'label'      => __( 'Width', 'unlimited-theme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'unit' => '%',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-company-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
       $this->end_controls_section();
    }

    protected function render( ) {
        $this->render_callback();
    }
    protected function render_callback( ) {


        $settings = $this->get_settings_for_display();
        ?>
        <style>
            .uta-company-logo-item-single{
                box-sizing: border-box;
                overflow: hidden;
            }
            .uta-company-logo-single-full {
                overflow: hidden;
            }
        </style>
        <?php

        $logos = $settings['uta_company_logo_repeater'];

        // Config
        $config = [
            'arrows'        => ! empty($settings['uta_company_logo_show_arrow']),
            'dots'          => ! empty($settings['uta_company_logo_show_dots']),
            'autoplay'      => ! empty($settings['uta_company_logo_autoplay']),
            'autoplaySpeed' => ! empty($settings['uta_company_logo_speed']) ? $settings['uta_company_logo_speed'] : 1000,
            'infinite'      => ! empty($settings['uta_company_logo_infinite_scroll']) ? $settings['uta_company_logo_infinite_scroll'] : true,
            'slidesToShow'  => ! empty($settings['uta_company_logo_slideshow']) ? $settings['uta_company_logo_slideshow'] : 5,
        ];

        $this->add_render_attribute( 'wrapper', 'class', 'uta-company-logo');

        $this->add_render_attribute( 'wrapper', 'class', 'uta-company-logo-'. $settings['uta_company_logo_style']);

        $this->add_render_attribute( 'wrapper', 'data-slick', wp_json_encode($config) );
        $this->add_inline_editing_attributes( 'uta_company_logo_list_title', 'basic' );

        ?>

        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); //phpcs:ignore ?>>

            <?php

            foreach ( $logos as $logo ) :

             // Normal Image.
            $uta_company_logo_url = ! empty($logo['uta_company_logo_website_link']['url']) ? $logo['uta_company_logo_website_link']['url'] : '';
            $uta_company_logo_alt = \Elementor\Control_Media::get_image_alt($logo['uta_company_logo_image_normal']);

            // Hover Image.
            $uta_company_logo_hover_img = ! empty($logo['uta_company_logo_image_hover']['url']) ? $logo['uta_company_logo_image_hover']['url'] : '';
            $uta_company_logo_hover_alt = \Elementor\Control_Media::get_image_alt($logo['uta_company_logo_image_hover']);

            $uta_company_logo_url_is_external = ! empty($logo['uta_company_logo_website_link']['is_external']) && 'on' === $logo['uta_company_logo_website_link']['is_external'] ? '_blank' : '';

             // Company logo style default.
            if ( 'style-default' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-default.php';
            }

            // Company logo style 1.
            if ( 'style-1' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-1.php';
            }

            // Company logo style 2.
            if ( 'style-2' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-2.php';
            }

            // Company logo style 3.
            if ( 'style-3' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-3.php';
            }

            // Company logo style 4.
            if ( 'style-4' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-4.php';
            }

            // Company logo style 5.
            if ( 'style-5' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-5.php';
            }

            // Company logo style 6.
            if ( 'style-6' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-6.php';
            }

            // Company logo style 7.
            if ( 'style-7' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-7.php';
            }

            // Company logo style 8.
            if ( 'style-8' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-8.php';
            }


            // Company logo style 9.
            if ( 'style-9' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-9.php';
            }

            // Company logo style 10.
            if ( 'style-10' === $settings['uta_company_logo_style'] ) {
                require (__DIR__) . '/template/style-10.php';
            }

            endforeach;  ?>


        </div><!-- .uta-company-slider END -->

        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Company_Logo() );
