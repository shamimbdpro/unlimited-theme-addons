<?php 
namespace Elementor;

trait Codepopular_theme_helper
{
    
    /**
     *   Woocommece product category
    */
  
    public function cpthelper_woocommerce_product_categories()
    {
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }

   /**
     * Load More Button Style
     *
     */
    protected function cpthelper_load_more_button_style()
    {
        $this->start_controls_section(
            'cpthelper_section_load_more_btn',
            [
                'label' => __('Load More Button Style', 'cpthelper'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_load_more' => ['yes', '1', 'true'],
                ],
            ]
        );

        $this->add_responsive_control(
            'cpthelper_post_grid_load_more_btn_padding',
            [
                'label' => esc_html__('Padding', 'cpthelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cpthelper_post_grid_load_more_btn_margin',
            [
                'label' => esc_html__('Margin', 'cpthelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cpthelper_post_grid_load_more_btn_typography',
                'selector' => '{{WRAPPER}} .cpthelper-load-more-button',
            ]
        );

        $this->start_controls_tabs('cpthelper_post_grid_load_more_btn_tabs');

        // Normal State Tab
        $this->start_controls_tab('cpthelper_post_grid_load_more_btn_normal', ['label' => esc_html__('Normal', 'cpthelper')]);

        $this->add_control(
            'cpthelper_post_grid_load_more_btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'cpthelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_cta_btn_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'cpthelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#29d8d8',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cpthelper_post_grid_load_more_btn_normal_border',
                'label' => esc_html__('Border', 'cpthelper'),
                'selector' => '{{WRAPPER}} .cpthelper-load-more-button',
            ]
        );

        $this->add_control(
            'cpthelper_post_grid_load_more_btn_border_radius',
            [
                'label' => esc_html__('Border Radius', 'cpthelper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cpthelper_post_grid_load_more_btn_shadow',
                'selector' => '{{WRAPPER}} .cpthelper-load-more-button',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab('cpthelper_post_grid_load_more_btn_hover', ['label' => esc_html__('Hover', 'cpthelper')]);

        $this->add_control(
            'cpthelper_post_grid_load_more_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'cpthelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_post_grid_load_more_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'cpthelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#27bdbd',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cpthelper_post_grid_load_more_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'cpthelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]

        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cpthelper_post_grid_load_more_btn_hover_shadow',
                'selector' => '{{WRAPPER}} .cpthelper-load-more-button:hover',
                'separator' => 'before',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'cpthelper_post_grid_loadmore_button_alignment',
            [
                'label' => __('Button Alignment', 'cpthelper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'cpthelper'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'cpthelper'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'cpthelper'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cpthelper-load-more-button-wrap' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }







}




 ?>