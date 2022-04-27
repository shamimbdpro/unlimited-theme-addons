<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Title
class Uta_Testimonials extends Widget_Base
{

    public function get_name() {
        return 'uta-testimonial';
    }

    public function get_title() {
        return esc_html__('UTA Testimonials', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'uta-elements' ];
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['slick-theme', 'slick', 'uta-testimonial'];

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
            'testimonials_section',
            [
                'label' => esc_html__('Testimonials', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::SECTION,
            ]
        );

        $this->add_responsive_control(
            'uta_testimonial_style',
            [
                'label'   => esc_html__('Testimonial Style', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-default' => esc_html__('Default', 'unlimited-theme-addons'),
                    'style-1'       => esc_html__('Style-1', 'unlimited-theme-addons'),
                    'style-2'       => esc_html__('Style-2', 'unlimited-theme-addons'),
                    'style-3'       => esc_html__('Style-3', 'unlimited-theme-addons'),
                    'style-4'       => esc_html__('Style-4', 'unlimited-theme-addons'),
                    'style-5'       => esc_html__('Style-5', 'unlimited-theme-addons'),
                ],

                'default' => 'style-default',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => __('Choose Photo', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'unlimited-theme-addons'),
                'type'  => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $repeater->add_control(
            'designation',
            [
                'label' => __('Designation', 'unlimited-theme-addons'),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'feedback',
            [
                'label' => __('Testimonial', 'unlimited-theme-addons'),
                'type'  => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'testimonial_count',
            [
                'label'       => __('Testimonial List', 'unlimited-theme-addons'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{name}}}',

            ]
        );

        $this->add_control(
            'uta-testimonial-ratings',
            [
                'label'        => __('Show Ratings', 'unlimited-theme-addons'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('On', 'unlimited-theme-addons'),
                'label_off'    => __('Off', 'unlimited-theme-addons'),
                'return_value' => 'on',
                'default'      => 'on',
            ]
        );

        $this->add_control(
            'uta_testimonial_slide_show',
            [
                'label'   => __('Slide Show', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'max'     => 3,
                'min'     => 1,
            ]
        );

        $this->add_control(
            'uta_testimonial_dots',
            [
                'label'        => __('Show Dots', 'unlimited-theme-addons'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'unlimited-theme-addons'),
                'label_off'    => __('Hide', 'unlimited-theme-addons'),
                'return_value' => 'true',
                'default'      => 'false',
            ]
        );

        $this->end_controls_section();



        // Testimonial Style
        $this->start_controls_section(
            'testimonial_style',
            array(
                'label' => __('Testimonial', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_testimonial_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_testimonial_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_testimonial_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_testimonial_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_testimonial_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5',
            ]
        );
        $this->add_control(
            'uta_testimonial_background_color',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-default, .testimonial-item1, .testimonial-item2, .testimonial-item3, .testimonial-item4, .testimonial-item5' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();

        // Testimonial Content Box
        $this->start_controls_section(
            'testimonial_content_box_style',
            array(
                'label'     => __('Content Box', 'unlimited-theme-addons'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'uta_testimonial_style' => [ 'style-3', 'style-2', 'style-1', 'style-5' ],
                ],
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_testimonial_content_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_testimonial_content_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_testimonial_content_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_testimonial_content_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_testimonial_content_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content',
            ]
        );
        $this->add_control(
            'uta_testimonial__content_Box_background_color',
            array(
                'label'     => __('Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item1 .content, .testimonial-item2 .content, .testimonial-item3 .content, .testimonial-item5 .content, .testimonial-item1 .content, .testimonial-item5 .content::after, .testimonial-item3 .content:after, .testimonial-item2 .content::after' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->add_control(
            'uta_testimonial__content_image_Box_background_color',
            array(
                'label'     => __('Bootom Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'condition' => [
                    'uta_testimonial_style' => [ 'style-5' ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item5 .thumbnail' => 'background-color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Testimonial Image Style
        $this->start_controls_section(
            'testimonial_image_style',
            array(
                'label' => __('Image', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Margin 
        */
        $this->add_responsive_control(
            'uta_testimonial_image_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default img, .testimonial-item1 .thumbnail, .testimonial-item2 .thumbnail, .testimonial-item3 .thumbnail img, .testimonial-item4 .content .thumbnail, .testimonial-item5 .thumbnail img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Border 
        */
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'uta_testimonial_image_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-style-default img, .testimonial-item1 .thumbnail img, .testimonial-item2 .thumbnail img, .testimonial-item3 .thumbnail img, .testimonial-item4 .content .thumbnail img, .testimonial-item5 .thumbnail img',
            ]
        );
        /*
         * Border Radious
        */
        $this->add_control(
            'uta_testimonial_image_radious',
            [
                'label'      => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default img, .testimonial-item1 .thumbnail img, .testimonial-item2 .thumbnail img, .testimonial-item3 .thumbnail img, .testimonial-item4 .content .thumbnail img, .testimonial-item5 .thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
         * Box Shadow
        */
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'uta_testimonial_image_shadow',
                'label'    => __('Box Shadow', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .testimonial-style-default img, .testimonial-item1 .thumbnail img, .testimonial-item2 .thumbnail img, .testimonial-item3 .thumbnail img, .testimonial-item4 .content .thumbnail img, .testimonial-item5 .thumbnail img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name'    => 'thumbnail',
                'default' => 'full',
            ]
        );

        $this->end_controls_section();




        // Content Style
        $this->start_controls_section(
            'testimonial_content_style',
            array(
                'label' => __('Content', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_testimonial_p_content_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default p, .testimonial-item1 .content p, .testimonial-item2 .content p, .testimonial-item3 .content p, .testimonial-item4 .content p, .testimonial-item5 .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_content_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial-style-default p, .testimonial-item1 .content p, .testimonial-item2 .content p, .testimonial-item3 .content p, .testimonial-item4 .content p, .testimonial-item5 .content p',
            ]
        );
        $this->add_control(
            'uta_testimonial_content_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-default p, .testimonial-item1 .content p, .testimonial-item2 .content p, .testimonial-item3 .content p, .testimonial-item4 .content p, .testimonial-item5 .content p' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // Name Style
        $this->start_controls_section(
            'testimonial_name_style',
            array(
                'label' => __('Name', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_testimonial_name_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default h5, .testimonial-item1 .content h2, .testimonial-item2 .thumbnail h2, .testimonial-item3 .thumbnail h2, .testimonial-item4 .content h2, .testimonial-item5 .thumbnail h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_name_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial-style-default h5, .testimonial-item1 .content h2, .testimonial-item2 .thumbnail h2, .testimonial-item3 .thumbnail h2, .testimonial-item4 .content h2, .testimonial-item5 .thumbnail h2',
            ]
        );
        $this->add_control(
            'uta_testimonial_name_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-default h5, .testimonial-item1 .content h2, .testimonial-item2 .thumbnail h2, .testimonial-item3 .thumbnail h2, .testimonial-item4 .content h2, .testimonial-item5 .thumbnail h2' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();


        // designation Style
        $this->start_controls_section(
            'testimonial_designation_style',
            array(
                'label' => __('Designation', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );
        /*
         * Padding 
        */
        $this->add_responsive_control(
            'uta_testimonial_designation_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-style-default span, .testimonial-item5 .thumbnail h5, .testimonial-item4 .content h5, .testimonial-item3 .thumbnail h5, .testimonial-item2 .thumbnail h5, .testimonial-item1 .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_designation_typography',
                'label'    => __('Typography', 'unlimited-theme-addons'),
                'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .testimonial-style-default span, .testimonial-item5 .thumbnail h5, .testimonial-item4 .content h5, .testimonial-item3 .thumbnail h5, .testimonial-item2 .thumbnail h5, .testimonial-item1 .content h5',
            ]
        );
        $this->add_control(
            'uta_testimonial_designation_color',
            array(
                'label'     => __('Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-style-default span, .testimonial-item5 .thumbnail h5, .testimonial-item4 .content h5, .testimonial-item3 .thumbnail h5, .testimonial-item2 .thumbnail h5, .testimonial-item1 .content h5' => 'color: {{VALUE}};',
                ],
            )
        );
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();
        $uta_testimonial_slide_show = $settings['uta_testimonial_slide_show'];
        $uta_testimonial_dots = $settings['uta_testimonial_dots'] ? $settings['uta_testimonial_dots'] : 'false';
?>



        <div class="uta-testimonials" data-slick='{"slidesToShow": <?php echo esc_html($uta_testimonial_slide_show); ?>,  "dots":<?php echo esc_html($uta_testimonial_dots); ?>}'>
            <?php foreach ( $settings['testimonial_count'] as $index => $testimonial ) :
                $testimonialText = $this->get_repeater_setting_key('feedback', 'testimonial_count', $index);
                $name = $this->get_repeater_setting_key('name', 'testimonial_count', $index);
                $designation = $this->get_repeater_setting_key('designation', 'testimonial_count', $index);
                $this->add_inline_editing_attributes($testimonialText, 'basic');
                $this->add_inline_editing_attributes($name, 'basic');
                $this->add_inline_editing_attributes($designation, 'basic');
                if ( 'style-default' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-default.php';
                }

                if ( 'style-1' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-1.php';
                }

                if ( 'style-2' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-2.php';
                }

                if ( 'style-3' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-3.php';
                }

                if ( 'style-4' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-4.php';
                }

                if ( 'style-5' === $settings['uta_testimonial_style'] ) {
                    require (__DIR__) . '/template/style-5.php';
                }


            endforeach; ?>
        </div>

<?php }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Testimonials());
