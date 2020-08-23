<?php
namespace Elementor;

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly



class Elementor_Widget_Test extends Widget_Base
{
    use Digitalshop_Helper, Product_Grid;

    public function get_name()
    {
        return 'digitalshop-product';
    }

    public function get_title()
    {
        return __('Digitalshop Product', 'digitalshop');
    }

    public function get_icon()
    {
        return 'fa fa-th';
    }

    public function get_categories()
    {
        return ['digitalshop-elements'];
    }

    protected function _register_controls()
    {

        // Content Controls
        $this->start_controls_section(
            'digitalshop_section_product_grid_settings',
            [
                'label' => esc_html__('Product Settings', 'digitalshop'),
            ]
        );

       if ( ! class_exists( 'WooCommerce' ) ) {
            $this->add_control(
                'ea_product_grid_woo_required',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => __('<strong>WooCommerce</strong> is not installed/activated on your site. Please install and activate <a href="plugin-install.php?s=woocommerce&tab=search&type=term" target="_blank">WooCommerce</a> first.', 'digitalshop'),
                    'content_classes' => 'digitalshop-warning',
                ]
            );
        }

        $this->add_control(
            'digitalshop_product_grid_product_filter',
            [
                'label'   => esc_html__('Filter By', 'digitalshop'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'recent-products',
                'options' => [
                    'recent-products'       => esc_html__('Recent Products', 'digitalshop'),
                    'featured-products'     => esc_html__('Featured Products', 'digitalshop'),
                    'best-selling-products' => esc_html__('Best Selling Products', 'digitalshop'),
                    'sale-products'         => esc_html__('Sale Products', 'digitalshop'),
                    'top-products'          => esc_html__('Top Rated Products', 'digitalshop'),
                ],
            ]
        );

        $this->add_responsive_control(
            'digitalshop_product_grid_column',
            [
                'label'        => esc_html__('Columns', 'digitalshop'),
                'type'         => Controls_Manager::SELECT,
                'default'      => '4',
                'options'      => [
                    '1' => esc_html__('1', 'digitalshop'),
                    '2' => esc_html__('2', 'digitalshop'),
                    '3' => esc_html__('3', 'digitalshop'),
                    '4' => esc_html__('4', 'digitalshop'),
                    '5' => esc_html__('5', 'digitalshop'),
                    '6' => esc_html__('6', 'digitalshop'),
                ],
                'toggle'       => true,
                'prefix_class' => 'digitalshop-product-grid-column%s-',
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_products_count',
            [
                'label'   => __('Products Count', 'digitalshop'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
            ]
        );


        $this->add_control(
            'digitalshop_product_grid_categories',
            [
                'label'       => esc_html__( 'Product Categories', 'digitalshop' ),
                'type'        => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => $this->digitalshop_woocommerce_product_categories(),
            ]
        );

        $this->add_control(
            'product_offset',
            [
                'label'   => __('Offset', 'digitalshop'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_style_preset',
            [
                'label'   => esc_html__('Style Preset', 'digitalshop'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'digitalshop-product-simple',
                'options' => [
                    'digitalshop-product-default' => esc_html__('Default', 'digitalshop'),
                    'digitalshop-product-simple'  => esc_html__('Simple Style', 'digitalshop'),
                    'digitalshop-product-reveal'  => esc_html__('Reveal Style', 'digitalshop'),
                    'digitalshop-product-overlay' => esc_html__('Overlay Style', 'digitalshop'),
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_rating',
            [
                'label'        => esc_html__('Show Product Rating?', 'digitalshop'),
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
            'digitalshop_product_grid_load_more_section',
            [
                'label' => esc_html__('Load More', 'digitalshop'),
            ]
        );

        $this->add_control(
            'show_load_more',
            [
                'label'        => __('Show Load More', 'digitalshop'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'digitalshop'),
                'label_off'    => __('Hide', 'digitalshop'),
                'return_value' => 'true',
                'default'      => '',
            ]
        );

        $this->add_control(
            'show_load_more_text',
            [
                'label'       => esc_html__('Label Text', 'digitalshop'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false,
                'default'     => esc_html__('Load More', 'digitalshop'),
                'condition'   => [
                    'show_load_more' => 'true',
                ],
            ]
        );

        $this->end_controls_section(); # end of section 'Load More'

        $this->start_controls_section(
            'digitalshop_product_grid_styles',
            [
                'label' => esc_html__('Products Styles', 'digitalshop'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_background_color',
            [
                'label'     => esc_html__('Content Background Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'           => 'digitalshop_peoduct_grid_border',
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
                'selector'       => '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product',
                'condition'      => [
                    'digitalshop_product_grid_style_preset' => ['digitalshop-product-default', 'digitalshop-product-simple', 'digitalshop-product-overlay'],
                ],
            ]
        );

        $this->add_control(
            'digitalshop_peoduct_grid_border_radius',
            [
                'label'     => esc_html__('Border Radius', 'digitalshop'),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'digitalshop_section_product_grid_typography',
            [
                'label' => esc_html__('Color &amp; Typography', 'digitalshop'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_title_heading',
            [
                'label' => __('Product Title', 'digitalshop'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_title_color',
            [
                'label'     => esc_html__('Product Title Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'digitalshop_product_grid_product_title_typography',
                'selector' => '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title',
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_price_heading',
            [
                'label' => __('Product Price', 'digitalshop'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_price_color',
            [
                'label'     => esc_html__('Product Price Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#272727',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'digitalshop_product_grid_product_price_typography',
                'selector' => '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .price',
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_rating_heading',
            [
                'label' => __('Star Rating', 'digitalshop'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_product_rating_color',
            [
                'label'     => esc_html__('Rating Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f2b01e',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce .star-rating::before'      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce .star-rating span::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'digitalshop_product_grid_product_rating_typography',
                'selector' => '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .star-rating',
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_sale_badge_heading',
            [
                'label' => __('Sale Badge', 'digitalshop'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_sale_badge_color',
            [
                'label'     => esc_html__('Sale Badge Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_sale_badge_background',
            [
                'label'     => esc_html__('Sale Badge Background', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff2a13',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .onsale'                              => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce ul.products li.product .price ins' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'digitalshop_product_grid_sale_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .onsale',
            ]
        );
        // stock out badge
        $this->add_control(
            'digitalshop_product_grid_stock_out_badge_heading',
            [
                'label' => __('Stock Out Badge', 'digitalshop'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_stock_out_badge_color',
            [
                'label'     => esc_html__('Stock Out Badge Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_stock_out_badge_background',
            [
                'label'     => esc_html__('Stock Out Badge Background', 'digitalshop'),
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
                'name'     => 'digitalshop_product_grid_stock_out_badge_typography',
                'selector' => '{{WRAPPER}} .woocommerce ul.products li.product .outofstock-badge',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'digitalshop_section_product_grid_add_to_cart_styles',
            [
                'label' => esc_html__('Add to Cart Button Styles', 'digitalshop'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('digitalshop_product_grid_add_to_cart_style_tabs');

        $this->start_controls_tab('normal', ['label' => esc_html__('Normal', 'digitalshop')]);

        $this->add_control(
            'digitalshop_product_grid_add_to_cart_color',
            [
                'label'     => esc_html__('Button Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button'                                      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_add_to_cart_background',
            [
                'label'     => esc_html__('Button Background Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button'                                      => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link'  => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'digitalshop_product_grid_add_to_cart_border',
                'selector' => '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button, {{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link, {{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'digitalshop_product_grid_add_to_cart_typography',
                'selector'  => '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button',
                'condition' => [
                    'digitalshop_product_grid_style_preset' => ['digitalshop-product-default', 'digitalshop-product-simple'],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('digitalshop_product_grid_add_to_cart_hover_styles', ['label' => esc_html__('Hover', 'digitalshop')]);

        $this->add_control(
            'digitalshop_product_grid_add_to_cart_hover_color',
            [
                'label'     => esc_html__('Button Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_add_to_cart_hover_background',
            [
                'label'     => esc_html__('Button Background Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'digitalshop_product_grid_add_to_cart_hover_border_color',
            [
                'label'     => esc_html__('Border Color', 'digitalshop'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .digitalshop-product-grid .woocommerce li.product .button.add_to_cart_button:hover'                                      => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .product-link:hover'  => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .digitalshop-product-grid.digitalshop-product-overlay .woocommerce ul.products li.product .overlay .added_to_cart:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

       if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => $settings['digitalshop_product_grid_products_count'] ?: 4,
            'order'          => 'DESC',
            'offset'         => $settings['product_offset'],
        ];

        if (!empty($settings['digitalshop_product_grid_categories'])) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['digitalshop_product_grid_categories'],
                    'operator' => 'IN',
                ],
            ];
        }

        if ($settings['digitalshop_product_grid_product_filter'] == 'featured-products') {
            $args['tax_query'] = [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ],
            ];

            if ($settings['digitalshop_product_grid_categories']) {
                $args['tax_query'][] = [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['digitalshop_product_grid_categories'],
                ];
            }

        } else if ($settings['digitalshop_product_grid_product_filter'] == 'best-selling-products') {
            $args['meta_key'] = 'total_sales';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
        } else if ($settings['digitalshop_product_grid_product_filter'] == 'sale-products') {
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
        } else if ($settings['digitalshop_product_grid_product_filter'] == 'top-products') {
            $args['meta_key'] = '_wc_average_rating';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
        }

        $settings = [
            'digitalshop_product_grid_style_preset' => $settings['digitalshop_product_grid_style_preset'],
            'digitalshop_product_grid_rating'       => $settings['digitalshop_product_grid_rating'],
            'digitalshop_product_grid_column'       => $settings['digitalshop_product_grid_column'],
            'show_load_more'                 => $settings['show_load_more'],
            'show_load_more_text'            => $settings['show_load_more_text'],
        ];

        $html = '<div class="digitalshop-product-grid d-flex' . $settings['digitalshop_product_grid_style_preset'] . '">';
        $html .= '<div class="woocommerce">';

        $html .= '<ul class="products">
                    ' . self::render_template($args, $settings) . '
                </ul>';

        if ('true' == $settings['show_load_more']) {
            if ($args['posts_per_page'] != '-1') {
                $html .= '<div class="digitalshop-load-more-button-wrap">
                            <button class="digitalshop-load-more-button" id="digitalshop-load-more-btn-' . $this->get_id() . '" data-widget="' . $this->get_id() . '" data-class="' . get_class($this) . '" data-args="' . http_build_query($args) . '" data-settings="' . http_build_query($settings) . '" data-layout="masonry" data-page="1">
                                <div class="digitalshop-btn-loader button__loader"></div>
                                <span>' . esc_html__($settings['show_load_more_text'], 'digitalshop') . '</span>
                            </button>
                        </div>';
            }
        }

        $html .= '</div>
        </div>';

        echo $html;
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Elementor_Widget_Test);
