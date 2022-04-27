<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Title
class Uta_Twentytwenty extends Widget_Base
{

    public function get_name() {
        return 'uta-twentytwenty';
    }

    public function get_title() {
        return esc_html__('UTA Image Comparison', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-image-before-after';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['twentytwenty', 'uta-counterup-style'];

    //     return $styles;
    // }

    /**
     * Widget script.
     * 
     * @return string
     */
    public function get_script_depends() {
        $scripts = [ 'uta-jquery-event-move', 'uta-twentytwenty', 'uta-main' ];

        return $scripts;
    }


    public function get_keywords() {
        return [
            'title',
            'uta image before after',
            'uta',
            'title widget',
            'widget',
            'addons',
            'before after addons',
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
            'uta_title_section',
            [
                'label' => esc_html__('Before After Slider', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'uta_before_image',
            [
                'label'   => esc_html('Before Image', 'elementor-before-after-image-slider'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'uta_after_image',
            [
                'label'   => esc_html('After Image', 'elementor-before-after-image-slider'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name'    => 'thumbnail',
                'default' => 'full',
            ]
        );

        $this->add_control(
            'uta_twentytwenty_direction',
            [
                'label'   => __('Direction', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __('Horizontal', 'unlimited-theme-addons'),
                    'vertical'   => __('Vertical', 'unlimited-theme-addons'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'uta_before_label_section',
            [
                'label' => esc_html('Before Label', 'unlimited-theme-addons'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'uta_before_label_title',
            [
                'label'   => __('Before Label', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Before', 'unlimited-theme-addons'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'uta_after_label_section',
            [
                'label' => esc_html('After Label', 'unlimited-theme-addons'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'uta_after_label_title',
            [
                'label'   => __('After Label', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('After', 'unlimited-theme-addons'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $element_id = $this->get_id();
        $direction = $settings['uta_twentytwenty_direction'];
        $before_label_title = $settings['uta_before_label_title'];
        $after_label_title = $settings['uta_after_label_title'];
?>
        <div class="uta-twentytwenty twentytwenty-container" data-orientation="<?php echo esc_attr($direction); ?>" id="uta_before_after_<?php echo esc_attr($element_id); ?>">
            <span class='before_text'><?php echo esc_html_e($before_label_title, 'unlimited-theme-addons'); //phpcs:ignore 
                                        ?></span>
            <span class='after_text'><?php echo esc_html_e($after_label_title, 'unlimited-theme-addons'); //phpcs:ignore 
                                        ?></span>
            <?php
            echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'uta_before_image'); //phpcs:ignore
            echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'uta_after_image'); //phpcs:ignore

            ?>
        </div>
        <style>
            #uta_before_after_<?php echo esc_attr($element_id); ?> {
                max-width: auto;
            }
        </style>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Twentytwenty());
