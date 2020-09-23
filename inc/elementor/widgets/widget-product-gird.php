<?php
namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly



class Elementor_Widget_Product_Grid extends Widget_Base
{
    use Codepopular_theme_helper, Product_Grid;

    public function get_name()
    {
        return 'cpthelper-product';
    }

    public function get_title()
    {
        return __('UTA Prodduct', 'cpthelper');
    }

    public function get_icon()
    {
        return 'fa fa-th';
    }

    public function get_categories()
    {
        return ['cpthelper-elements'];
    }

    protected function _register_controls()
    {

        // Content Controls
        $this->start_controls_section(
            'cpthelper_section_product_grid_settings',
            [
                'label' => esc_html__('Product Settings', 'cpthelper'),
            ]
        );

       if ( ! class_exists( 'WooCommerce' ) ) {
            $this->add_control(
                'cpthelper_product_grid_woo_required',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => __('<strong>WooCommerce</strong> is not installed/activated on your site. Please install and activate <a href="plugin-install.php?s=woocommerce&tab=search&type=term" target="_blank">WooCommerce</a> first.', 'cpthelper'),
                    'content_classes' => 'cpthelper-warning',
                ]
            );
        }

        $this->add_control(
            'cpthelper_product_grid_product_filter',
            [
                'label'   => esc_html__('Filter By', 'cpthelper'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'recent-products',
                'options' => [
                    'recent-products'       => esc_html__('Recent Products', 'cpthelper'),
                    'featured-products'     => esc_html__('Featured Products', 'cpthelper'),
                    'best-selling-products' => esc_html__('Best Selling Products', 'cpthelper'),
                    'sale-products'         => esc_html__('Sale Products', 'cpthelper'),
                    'top-products'          => esc_html__('Top Rated Products', 'cpthelper'),
                ],
            ]
        );

        $this->add_responsive_control(
            'cpthelper_product_grid_column',
            [
                'label'        => esc_html__('Columns', 'cpthelper'),
                'type'         => Controls_Manager::SELECT,
                'default'      => '4',
                'options'      => [
                    '1' => esc_html__('1', 'cpthelper'),
                    '2' => esc_html__('2', 'cpthelper'),
                    '3' => esc_html__('3', 'cpthelper'),
                    '4' => esc_html__('4', 'cpthelper'),
                    '5' => esc_html__('5', 'cpthelper'),
                    '6' => esc_html__('6', 'cpthelper'),
                ],
                'toggle'       => true,
                'prefix_class' => 'cpthelper-product-grid-column%s-',
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_products_count',
            [
                'label'   => __('Products Count', 'cpthelper'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
            ]
        );


        $this->add_control(
            'cpthelper_product_grid_categories',
            [
                'label'       => esc_html__( 'Product Categories', 'cpthelper' ),
                'type'        => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => $this->cpthelper_woocommerce_product_categories(),
            ]
        );

        $this->add_control(
            'product_offset',
            [
                'label'   => __('Offset', 'cpthelper'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_style_preset',
            [
                'label'   => esc_html__('Style Preset', 'cpthelper'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'cpthelper-product-simple',
                'options' => [
                    'cpthelper-product-default' => esc_html__('Default', 'cpthelper'),
                    'cpthelper-product-simple'  => esc_html__('Simple Style', 'cpthelper'),
                    'cpthelper-product-reveal'  => esc_html__('Reveal Style', 'cpthelper'),
                    'cpthelper-product-overlay' => esc_html__('Overlay Style', 'cpthelper'),
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_rating',
            [
                'label'        => esc_html__('Show Product Rating?', 'cpthelper'),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------
         *  Section => Load More
         * -------------------------------
         */
        $this->start_controls_section(
            'cpthelper_product_grid_load_more_section',
            [
                'label' => esc_html__('Load More', 'cpthelper'),
            ]
        );

        $this->add_control(
            'show_load_more',
            [
                'label'        => __('Show Load More', 'cpthelper'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'cpthelper'),
                'label_off'    => __('Hide', 'cpthelper'),
                'return_value' => 'true',
                'default'      => '',
            ]
        );

        $this->add_control(
            'show_load_more_text',
            [
                'label'       => esc_html__('Label Text', 'cpthelper'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false,
                'default'     => esc_html__('Load More', 'cpthelper'),
                'condition'   => [
                    'show_load_more' => 'true',
                ],
            ]
        );

        $this->end_controls_section(); # end of section 'Load More'

        $this->start_controls_section(
            'cpthelper_product_grid_styles',
            [
                'label' => esc_html__('Products Styles', 'cpthelper'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_background_color',
            [
                'label'     => esc_html__('Content Background Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'           => 'cpthelper_peoduct_grid_border',
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
                'selector'       => '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product',
                'condition'      => [
                    'cpthelper_product_grid_style_preset' => ['cpthelper-product-default', 'cpthelper-product-simple', 'cpthelper-product-overlay'],
                ],
            ]
        );

        $this->add_control(
            'cpthelper_peoduct_grid_border_radius',
            [
                'label'     => esc_html__('Border Radius', 'cpthelper'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cpthelper_section_product_grid_typography',
            [
                'label' => esc_html__('Color &amp; Typography', 'cpthelper'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_title_heading',
            [
                'label' => __('Product Title', 'cpthelper'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_title_color',
            [
                'label'     => esc_html__('Product Title Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cpthelper_product_grid_product_title_typography',
                'selector' => '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title',
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_price_heading',
            [
                'label' => __('Product Price', 'cpthelper'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_price_color',
            [
                'label'     => esc_html__('Product Price Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cpthelper_product_grid_product_price_typography',
                'selector' => '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .price',
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_rating_heading',
            [
                'label' => __('Star Rating', 'cpthelper'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_product_rating_color',
            [
                'label'     => esc_html__('Rating Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f2b01e',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce .star-rating::before'      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce .star-rating span::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cpthelper_product_grid_product_rating_typography',
                'selector' => '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .star-rating',
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_sale_badge_heading',
            [
                'label' => __('Sale Badge', 'cpthelper'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_sale_badge_color',
            [
                'label'     => esc_html__('Sale Badge Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_sale_badge_background',
            [
                'label'     => esc_html__('Sale Badge Background', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff2a13',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale'                              => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce ul.products li.product .price ins' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'cpthelper_product_grid_sale_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
            ]
        );
        // stock out badge
        $this->add_control(
            'cpthelper_product_grid_stock_out_badge_heading',
            [
                'label' => __('Stock Out Badge', 'cpthelper'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_stock_out_badge_color',
            [
                'label'     => esc_html__('Stock Out Badge Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_stock_out_badge_background',
            [
                'label'     => esc_html__('Stock Out Badge Background', 'cpthelper'),
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
                'name'     => 'cpthelper_product_grid_stock_out_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'cpthelper_section_product_grid_add_to_cart_styles',
            [
                'label' => esc_html__('Add to Cart Button Styles', 'cpthelper'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('cpthelper_product_grid_add_to_cart_style_tabs');

        $this->start_controls_tab('normal', ['label' => esc_html__('Normal', 'cpthelper')]);

        $this->add_control(
            'cpthelper_product_grid_add_to_cart_color',
            [
                'label'     => esc_html__('Button Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button'                                      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_add_to_cart_background',
            [
                'label'     => esc_html__('Button Background Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button'                                      => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link'  => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'cpthelper_product_grid_add_to_cart_border',
                'selector' => '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button, {{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link, {{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'cpthelper_product_grid_add_to_cart_typography',
                'selector'  => '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button',
                'condition' => [
                    'cpthelper_product_grid_style_preset' => ['cpthelper-product-default', 'cpthelper-product-simple'],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('cpthelper_product_grid_add_to_cart_hover_styles', ['label' => esc_html__('Hover', 'cpthelper')]);

        $this->add_control(
            'cpthelper_product_grid_add_to_cart_hover_color',
            [
                'label'     => esc_html__('Button Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_add_to_cart_hover_background',
            [
                'label'     => esc_html__('Button Background Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_product_grid_add_to_cart_hover_border_color',
            [
                'label'     => esc_html__('Border Color', 'cpthelper'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .cpthelper-product-grid.cpthelper-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

           /**
         * Load More Button Style Controls!
         */
        // $this->cpthelper_load_more_button_style();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

       if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => $settings['cpthelper_product_grid_products_count'] ?: 4,
            'order'          => 'DESC',
            'offset'         => $settings['product_offset'],
        ];

        if (!empty($settings['cpthelper_product_grid_categories'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['cpthelper_product_grid_categories'],
                    'operator' => 'IN',
                ],
            ];
        }

        if ($settings['cpthelper_product_grid_product_filter'] == 'featured-products') {
            $args['tax_query'] = [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ],
            ];

            if ($settings['cpthelper_product_grid_categories']) {
                $args['tax_query'][] = [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['cpthelper_product_grid_categories'],
                ];
            }

        } else if ($settings['cpthelper_product_grid_product_filter'] == 'best-selling-products') {
            $args['meta_key'] = 'total_sales';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
        } else if ($settings['cpthelper_product_grid_product_filter'] == 'sale-products') {
            $args['meta_query'] = [
                'relation' => 'OR',
                [
                    'key'     => '_sale_price',
                    'value'   => 0,
                    'compare' => '>',
                    'type'    => 'numeric',
                ], [
                    'key'     => '_min_variation_sale_price',
                    'value'   => 0,
                    'compare' => '>',
                    'type'    => 'numeric',
                ],
            ];
        } else if ($settings['cpthelper_product_grid_product_filter'] == 'top-products') {
            $args['meta_key'] = '_wc_average_rating';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
        }

        $settings = [
            'cpthelper_product_grid_style_preset' => $settings['cpthelper_product_grid_style_preset'],
            'cpthelper_product_grid_rating'       => $settings['cpthelper_product_grid_rating'],
            'cpthelper_product_grid_column'       => $settings['cpthelper_product_grid_column'],
            'show_load_more'                 => $settings['show_load_more'],
            'show_load_more_text'            => $settings['show_load_more_text'],
        ];

        $html = '<div class="cpthelper-product-grid d-flex' . $settings['cpthelper_product_grid_style_preset'] . '">';
        $html .= '<div class="woocommerce">';

        $html .= '<ul class="products">
                    ' . self::render_template($args, $settings) . '
                </ul>';

        if ('true' == $settings['show_load_more']) {
            if ($args['posts_per_page'] != '-1') {
                $html .= '<div class="cpthelper-load-more-button-wrap">
                            <button class="cpthelper-load-more-button" id="cpthelper-load-more-btn-' . $this->get_id() . '" data-widget="' . $this->get_id() . '" data-class="' . get_class($this) . '" data-args="' . http_build_query($args) . '" data-settings="' . http_build_query($settings) . '" data-layout="masonry" data-page="1">
                                <div class="cpthelper-btn-loader button__loader"></div>
                                <span>' . esc_html__($settings['show_load_more_text'], 'cpthelper') . '</span>
                            </button>
                        </div>';
            }
        }

        $html .= '</div>
        </div>';

        echo $html;
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Elementor_Widget_Product_Grid);
