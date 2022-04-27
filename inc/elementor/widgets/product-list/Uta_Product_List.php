<?php

namespace Elementor;

if ( ! defined('ABSPATH') ) {
    exit;
}

// Exit if accessed directly

class Uta_Product_List extends Widget_Base
{
    use Uta_theme_helper, Uta_Product_List_Display;

    public function get_name() {
        return 'uta-product-list';
    }

    public function get_title() {
        return __('UTA Product List', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    /**
     * Widget CSS.
     * 
     * @return string
     */
    // public function get_style_depends()
    // {
    //     $styles = ['uta-product-list'];

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
            'product',
            'product list',
            'uta',
            'woocommerce product',
            'widget',
            'product list',
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

        // Content Controls
        $this->start_controls_section(
            'uta_section_product_list_settings',
            [
                'label' => esc_html__('Product Settings', 'unlimited-theme-addons'),
            ]
        );

        if ( ! class_exists('WooCommerce') ) {
            $this->add_control(
                'uta_product_list_woo_required',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => __('<strong>WooCommerce</strong> is not installed/activated on your site. Please install and activate <a href="plugin-install.php?s=woocommerce&tab=search&type=term" target="_blank">WooCommerce</a> first.', 'unlimited-theme-addons'),
                    'content_classes' => 'uta-warning',
                ]
            );
        }

        $this->add_control(
            'uta_product_list_product_filter',
            [
                'label'   => esc_html__('Filter By', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'recent-products',
                'options' => [
                    'recent-products'       => esc_html__('Recent Products', 'unlimited-theme-addons'),
                    'featured-products'     => esc_html__('Featured Products', 'unlimited-theme-addons'),
                    'best-selling-products' => esc_html__('Best Selling Products', 'unlimited-theme-addons'),
                    'sale-products'         => esc_html__('Sale Products', 'unlimited-theme-addons'),
                    'top-products'          => esc_html__('Top Rated Products', 'unlimited-theme-addons'),
                ],
            ]
        );

        $this->add_responsive_control(
            'uta_product_list_column',
            [
                'label'        => esc_html__('Columns', 'unlimited-theme-addons'),
                'type'         => Controls_Manager::SELECT,
                'default'      => '2',
                'options'      => [
                    '1' => esc_html__('1', 'unlimited-theme-addons'),
                    '2' => esc_html__('2', 'unlimited-theme-addons'),
                ],
                'toggle'       => true,
                'prefix_class' => 'uta-product-list-column%s-',
            ]
        );

        $this->add_control(
            'uta_product_list_products_count',
            [
                'label'   => __('Products Count', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
            ]
        );


        $this->add_control(
            'uta_product_list_categories',
            [
                'label'       => esc_html__('Product Categories', 'unlimited-theme-addons'),
                'type'        => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => $this->uta_woocommerce_product_categories(),
            ]
        );

        $this->add_control(
            'product_offset',
            [
                'label'   => __('Offset', 'unlimited-theme-addons'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );

        $this->add_control(
            'uta_product_list_order',
            [
                'label'   => __('Order', 'unlimited-theme-addons'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => __('Ascending', 'unlimited-theme-addons'),
                    'DESC' => __('Descending', 'unlimited-theme-addons'),
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_show_excerpt',
            [
                'label'        => esc_html__('Show Product Excerpt?', 'unlimited-theme-addons'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'uta_product_list_excerpt_word_limit',
            [
                'label'     => __('Excerpt Word Limit', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 10,
                'condition' => [ 'uta_product_list_show_excerpt' => 'yes' ],
            ]
        );

        $this->add_control(
            'uta_product_list_style_preset',
            [
                'label'        => esc_html__('Style Preset', 'unlimited-theme-addons'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'uta-product-simple',
                'options'      => [
                    'uta-product-default' => esc_html__('Default', 'unlimited-theme-addons'),
                    'uta-product-simple'  => esc_html__('Simple Style', 'unlimited-theme-addons'),
                ],
                'prefix_class' => '',
            ]
        );

        $this->add_control(
            'uta_product_list_rating',
            [
                'label'        => esc_html__('Show Product Rating?', 'unlimited-theme-addons'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'uta_product_list_styles',
            [
                'label' => esc_html__('Products Styles', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'uta_product_list_background_color',
            [
                'label'     => esc_html__('Content Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'           => 'uta_product_list_border',
                'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width'  => [
                        'default' => [
                            'top'      => '1',
                            'right'    => '1',
                            'bottom'   => '1',
                            'left'     => '1',
                            'isLinked' => false,
                        ],
                    ],
                    'color'  => [
                        'default' => '#eee',
                    ],
                ],
                'selector'       => '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product',
                'condition'      => [
                    'uta_product_list_style_preset' => [ 'uta-product-default', 'uta-product-simple', 'uta-product-overlay' ],
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_border_radius',
            [
                'label'     => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'uta_section_product_list_typography',
            [
                'label' => esc_html__('Color &amp; Typography', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        /*----- Product title style. ------*/
        $this->add_control(
            'uta_product_list_product_title_heading',
            [
                'label' => __('Product Title', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_product_title_color',
            [
                'label'     => esc_html__('Product Title Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_product_title_typography',
                'selector' => '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .woocommerce-loop-product__title',
            ]
        );

        /*----- Product content style. ------*/
        $this->add_control(
            'uta_product_list_product_content',
            [
                'label' => __('Product Content', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_product_content_color',
            [
                'label'     => esc_html__('Product Content Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .uta-product-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_product_content_typography',
                'selector' => '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .uta-product-content p',
            ]
        );

        /*----- Product price style. ------*/
        $this->add_control(
            'uta_product_list_product_price_heading',
            [
                'label' => __('Product Price', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_product_price_color',
            [
                'label'     => esc_html__('Product Price Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_product_price_typography',
                'selector' => '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .price',
            ]
        );

        /*----- Product ratings style. ------*/

        $this->add_control(
            'uta_product_list_product_rating_heading',
            [
                'label' => __('Star Rating', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_product_rating_color',
            [
                'label'     => esc_html__('Rating Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f2b01e',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce .star-rating::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list .woocommerce .star-rating span::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_product_rating_typography',
                'selector' => '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .star-rating',
            ]
        );

        /*----- Product badge style. ------*/

        $this->add_control(
            'uta_product_list_sale_badge_heading',
            [
                'label' => __('Sale Badge', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_sale_badge_color',
            [
                'label'     => esc_html__('Sale Badge Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_sale_badge_background',
            [
                'label'     => esc_html__('Sale Badge Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff2a13',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .price ins' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_sale_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
            ]
        );
        // stock out badge
        $this->add_control(
            'uta_product_list_stock_out_badge_heading',
            [
                'label' => __('Stock Out Badge', 'unlimited-theme-addons'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'uta_product_list_stock_out_badge_color',
            [
                'label'     => esc_html__('Stock Out Badge Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce ul.products li.product .outofstock-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_stock_out_badge_background',
            [
                'label'     => esc_html__('Stock Out Badge Background', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff2a13',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_product_list_stock_out_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge',
            ]
        );

        $this->end_controls_section();

        /*----- Product add to cart style. ------*/

        $this->start_controls_section(
            'uta_section_product_list_add_to_cart_styles',
            [
                'label' => esc_html__('Add to Cart Button Styles', 'unlimited-theme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('uta_product_list_add_to_cart_style_tabs');

        $this->start_controls_tab('normal', [ 'label' => esc_html__('Normal', 'unlimited-theme-addons') ]);

        $this->add_control(
            'uta_product_list_add_to_cart_color',
            [
                'label'     => esc_html__('Button Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_add_to_cart_background',
            [
                'label'     => esc_html__('Button Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .product-link' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'uta_product_list_add_to_cart_border',
                'selector' => '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button, {{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .product-link, {{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'uta_product_list_add_to_cart_typography',
                'selector'  => '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button',
                'condition' => [
                    'uta_product_list_style_preset' => [ 'uta-product-default', 'uta-product-simple' ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('uta_product_list_add_to_cart_hover_styles', [ 'label' => esc_html__('Hover', 'unlimited-theme-addons') ]);

        $this->add_control(
            'uta_product_list_add_to_cart_hover_color',
            [
                'label'     => esc_html__('Button Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_add_to_cart_hover_background',
            [
                'label'     => esc_html__('Button Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_product_list_add_to_cart_hover_border_color',
            [
                'label'     => esc_html__('Border Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .uta-product-list .woocommerce li.product .button.add_to_cart_button:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .uta-product-list.uta-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( ! class_exists('WooCommerce') ) {
            return;
        }

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => '' != $settings['uta_product_list_products_count'] ? $settings['uta_product_list_products_count'] : 4,
            'order'          => $settings['uta_product_list_order'],
            'offset'         => $settings['product_offset'],
        ];

        if ( ! empty($settings['uta_product_list_categories']) ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['uta_product_list_categories'],
                    'operator' => 'IN',
                ],
            ];
        }

        if ( 'featured-products' == $settings['uta_product_list_product_filter'] ) {
            $args['tax_query'] = [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ],
            ];

            if ( $settings['uta_product_list_categories'] ) {
                $args['tax_query'][] = [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['uta_product_list_categories'],
                ];
            }
        } elseif ( 'best-selling-products' == $settings['uta_product_list_product_filter'] ) {
            $args['meta_key'] = 'total_sales';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        } elseif ( 'sale-products' == $settings['uta_product_list_product_filter'] ) {
            $args['meta_query'] = [
                'relation' => 'OR',
                [
                    'key'     => '_sale_price',
                    'value'   => 0,
                    'compare' => '>',
                    'type'    => 'numeric',
                ],
                [
                    'key'     => '_min_variation_sale_price',
                    'value'   => 0,
                    'compare' => '>',
                    'type'    => 'numeric',
                ],
            ];
        } elseif ( 'top-products' == $settings['uta_product_list_product_filter'] ) {
            $args['meta_key'] = '_wc_average_rating';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
        }

        $settings = [
            'uta_product_list_style_preset'       => $settings['uta_product_list_style_preset'],
            'uta_product_list_show_excerpt'       => $settings['uta_product_list_show_excerpt'],
            'uta_product_list_excerpt_word_limit' => $settings['uta_product_list_excerpt_word_limit'],
            'uta_product_list_rating'             => $settings['uta_product_list_rating'],
            'uta_product_list_column'             => $settings['uta_product_list_column'],
        ];

        $html = '<div class="uta-product-list ' . $settings['uta_product_list_style_preset'] . '">';
        $html .= '<div class="woocommerce">';

        $html .= '<ul class="products">
                    ' . self::render_template($args, $settings) . '
                </ul>';

        $html .= '</div>
        </div>';

        echo $html; //phpcs:ignore
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Uta_Product_List());
