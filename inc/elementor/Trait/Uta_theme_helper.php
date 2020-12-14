<?php
namespace Elementor;

trait Uta_theme_helper
{

    /**
     *   Woocommece product category
     */

    public function uta_woocommerce_product_categories() {
        $terms = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
        ));

        if ( ! empty($terms) && ! is_wp_error($terms) ) {
            foreach ( $terms as $term ) {
                $options[ $term->slug ] = $term->name;
            }
            return $options;
        }
    }

    /**
     * Load More Button Style
     *
     */
    protected function uta_load_more_button_style() {
        $this->start_controls_section(
            'uta_section_load_more_btn',
            [
                'label'     => __('Load More Button Style', 'unlimited-theme-addons'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_load_more' => [ 'yes', '1', 'true' ],
                ],
            ]
        );

        $this->add_responsive_control(
            'uta_post_grid_load_more_btn_padding',
            [
                'label'      => esc_html__('Padding', 'unlimited-theme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-load-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'uta_post_grid_load_more_btn_margin',
            [
                'label'      => esc_html__('Margin', 'unlimited-theme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .uta-load-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'uta_post_grid_load_more_btn_typography',
                'selector' => '{{WRAPPER}} .uta-load-more-button',
            ]
        );

        $this->start_controls_tabs('uta_post_grid_load_more_btn_tabs');

        // Normal State Tab
        $this->start_controls_tab('uta_post_grid_load_more_btn_normal', [ 'label' => esc_html__('Normal', 'unlimited-theme-addons') ]);

        $this->add_control(
            'uta_post_grid_load_more_btn_normal_text_color',
            [
                'label'     => esc_html__('Text Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_cta_btn_normal_bg_color',
            [
                'label'     => esc_html__('Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#29d8d8',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'uta_post_grid_load_more_btn_normal_border',
                'label'    => esc_html__('Border', 'unlimited-theme-addons'),
                'selector' => '{{WRAPPER}} .uta-load-more-button',
            ]
        );

        $this->add_control(
            'uta_post_grid_load_more_btn_border_radius',
            [
                'label'     => esc_html__('Border Radius', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'uta_post_grid_load_more_btn_shadow',
                'selector'  => '{{WRAPPER}} .uta-load-more-button',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('uta_post_grid_load_more_btn_hover', [ 'label' => esc_html__('Hover', 'unlimited-theme-addons') ]);

        $this->add_control(
            'uta_post_grid_load_more_btn_hover_text_color',
            [
                'label'     => esc_html__('Text Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_post_grid_load_more_btn_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#27bdbd',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'uta_post_grid_load_more_btn_hover_border_color',
            [
                'label'     => esc_html__('Border Color', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]

        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'uta_post_grid_load_more_btn_hover_shadow',
                'selector'  => '{{WRAPPER}} .uta-load-more-button:hover',
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'uta_post_grid_loadmore_button_alignment',
            [
                'label'     => __('Button Alignment', 'unlimited-theme-addons'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => __('Left', 'unlimited-theme-addons'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title' => __('Center', 'unlimited-theme-addons'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'   => [
                        'title' => __('Right', 'unlimited-theme-addons'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .uta-load-more-button-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }







}




 
