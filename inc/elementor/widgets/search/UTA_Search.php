<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Title
class Uta_Search extends Widget_Base
{

    public function get_name() {
        return 'uta-product-search';
    }

    public function get_title() {
        return esc_html__('UTA Product Search', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-search';
    }


    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-product-search'];

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
            'product_search_section',
            [
                'label' => esc_html__('Product Search Settings', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'product_search_placeholder',
            [
                'label'   => __('Placeholder Text', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Search Product Here...', 'unlimited-theme-addons'),
            ]
        );

        $this->add_responsive_control(
            'uta_product_cat_width',
            [
                'label'           => __('Category Width', 'unlimited-theme-addons'),
                'type'            => Controls_Manager::SLIDER,
                'size_units'      => [ '%' ],
                'range'           => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices'         => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'unit' => '%',
                    'size' => 20,
                ],

                'tablet_default'  => [
                    'unit' => '%',
                    'size' => 100,
                ],

                'mobile_default'  => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .uta-product-category' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'uta_product_search_bar_width',
            [
                'label'           => __('Search Bar Width', 'unlimited-theme-addons'),
                'type'            => Controls_Manager::SLIDER,
                'size_units'      => [ '%' ],
                'range'           => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices'         => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'unit' => '%',
                    'size' => 80,
                ],

                'tablet_default'  => [
                    'unit' => '%',
                    'size' => 100,
                ],

                'mobile_default'  => [
                    'unit' => '%',
                    'size' => 100,
                ],

                'selectors'       => [
                    '{{WRAPPER}} .uta-product-search-form' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();


        // Start Search Style.
        $this->start_controls_section(
            'uta_search_style',
            [
                'label' => esc_html__('Search Style', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'uta_search_button_background_color',
            [
                'label'     => esc_html__('Button Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .uta-product-search-button button' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // End Search Style.


    }

    protected function render( $instance = [] ) {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display(); ?>

        <form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
            <?php if ( class_exists('WooCommerce') ) { ?>
                <?php
                if ( isset($_REQUEST['product_cat']) && ! empty($_REQUEST['product_cat']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['product_cat']))) ) {
                    $select_cat = wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['product_cat'])));
                } else {
                    $select_cat = 0;
                }
                $args = array(
                    'show_option_all' => esc_html__('All Categories', 'unlimited-theme-addons'),
                    'hierarchical'    => 1,
                    'class'           => 'cat',
                    'echo'            => 1,
                    'value_field'     => 'slug',
                    'selected'        => $select_cat,
                );
                $args['taxonomy'] = 'product_cat';
                $args['name'] = 'product_cat';
                $args['class'] = 'cate-dropdown hidden-xs'; ?>

                <div class="uta-product-search">
                    <div class="uta-product-category">
                        <?php wp_dropdown_categories($args); ?>
                    </div>
                    <div class="uta-product-search-form">
                        <input type="text" name="s" maxlength="128" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e($settings['product_search_placeholder'], 'unlimited-theme-addons'); //phpcs:ignore 
                                                                                                                            ?>">
                        <input type="hidden" value="product" name="post_type">
                        <div class="uta-product-search-button">
                            <button type="submit" title="<?php esc_attr_e('Search', 'unlimited-theme-addons'); ?>"><span><?php esc_attr_e('Search', 'unlimited-theme-addons'); ?></span></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </form>

<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Search());
