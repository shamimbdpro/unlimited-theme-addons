<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class Uta_Tab extends Widget_Base {
	/*
	 * Tab
	*/
	public function get_name() {
      	return 'uta-tab';
   	}
   		/*
	 * Addons Name
   	*/
   	public function get_title() {
      	return esc_html__( 'Tab', 'unlimited-theme-addons' );
   	}
 	/*
 	 * Addons Icon
 	*/
   	public function get_icon() { 
        return 'fas fa-outdent';
   	}
   	/*
 	 * Addons Keywords
   	*/
    public function get_keywords() {
        return [
            'tab',
            'uta tab',
            'uta',
            'tab widget',
            'widget',
            'addons',
            'tab addons',
            'unlimited theme addons',
        ];
    }
 	/*
	 * Addons Category
 	*/
   	public function get_categories() {
      	return [ 'uta-elements' ];
   	}
   	/*
 	 * Addons Controls
   	*/
   	protected function _register_controls(){
		// Controls Section Register
		$this->start_controls_section(
			'Tab',
			array(
				'label'		=> esc_html__('Tab','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'codexunictheme-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'tab-style-1'  => esc_html__( 'Tab Style 1', 'unlimited-theme-addons' ),
					'tab-style-2' => esc_html__( 'Tab Style 2', 'unlimited-theme-addons' ),
				],
				'default'   => 'tab-style-1',
			]
		);
		$this->add_control(
			'Tab_list',
			array(
				'label'		=> __('Tab Item','unlimited-theme-addons'),
				'type' 		=> Controls_Manager::REPEATER,
				'fields'	=> array(
					array(
						'name'			=> 'title',
						'label'			=> __('Tab Title','unlimited-theme-addons'),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> 'Title',
						'label_block'	=> true,
					),
					array(
						'name'			=> 'description',
						'label'			=> __('Description','unlimited-theme-addons'),
						'type' 			=> Controls_Manager::WYSIWYG,
						'default' 		=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
						'label_block'	=> true,
					),
				),
				'title_field' => '{{{ title }}}',	
			)
		);
		$this->add_control(
			'text_align',
			[
				'label' 	=> __( 'Alignment', 'unlimited-theme-addons' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'unlimited-theme-addons' ),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

        $this->add_control(
			'custom_css',
			[
				'label' => __( 'Custom CSS', 'unlimited-theme-addons' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 20,
			]
		);
		$this->end_controls_section();
		// Start Controls Style Sections
		// Tab Style
		$this->start_controls_section(
			'tab_style',
			array(
				'label'		=> __('Ttile','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'unlimited-theme-addons' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .Uta-tab-menu ul li span.tab-a'
			]
		);
		$this->add_responsive_control(
            'uta_title_padding',
            [
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .Uta-tab-menu ul li span.tab-a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'uta_title_margin',
            [
                'label' => esc_html__( 'Margin', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .Uta-tab-menu ul li span.tab-a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'uta_title_item_border',
                'label' => esc_html__( 'Border', 'unlimited-theme-addons' ),
                'selector' => '{{WRAPPER}} .Uta-tab-menu ul li span.tab-a',
            ]
        );
        $this->add_control(
            'uta_tab_title_border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .Uta-tab-menu ul li span.tab-a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
 		 * Tab Color
        */
        $this->start_controls_tabs(
            'uta_tab_title_style_tabs'
        );
        /*
 		 * Default Color
        */
        $this->start_controls_tab(
            'title_open_tab',
            [
                'label' => esc_html__( 'Default', 'unlimited-theme-addons' ),
            ]
        );
        $this->add_control(
			'title_color',
			array(
				'label'		=> __('Title Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_title_background',
			array(
				'label'		=> __('Title Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'uta_tab_title_hover_tab',
            [
                'label' => esc_html__( 'Active', 'unlimited-theme-addons' ),
            ]
        );
        $this->add_control(
			'title__active_color',
			array(
				'label'		=> __('Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_title_active_background',
			array(
				'label'		=> __('Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
			'title_text_align',
			[
				'label' 	=> __( 'Alignment', 'unlimited-theme-addons' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'unlimited-theme-addons' ),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
			]
		);
        $this->end_controls_section();

        // Tab Content Style
		$this->start_controls_section(
			'tab_style_content',
			array(
				'label'		=> __('Content','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography',
				'label' 	=> __( 'Typography', 'unlimited-theme-addons' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .uta-tab-item.uta-tab-item-content'
			]
		);
		$this->add_responsive_control(
            'uta_content_padding',
            [
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uta-tab-item.uta-tab-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'uta_content_margin',
            [
                'label' => esc_html__( 'Margin', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uta-tab-item.uta-tab-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'uta_content_item_border',
                'label' => esc_html__( 'Border', 'unlimited-theme-addons' ),
                'selector' => '{{WRAPPER}} .uta-tab-item.uta-tab-item-content',
            ]
        );
        $this->add_control(
            'uta_tab_content_border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uta-tab-item.uta-tab-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'content__active_color',
			array(
				'label'		=> __('Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_content_active_background',
			array(
				'label'		=> __('Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);

        $this->add_control(
			'content_text_align',
			[
				'label' 	=> __( 'Alignment', 'unlimited-theme-addons' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'unlimited-theme-addons' ),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
			]
		);
        $this->end_controls_section();
	}
	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);
		$title = $settings['title'];
		$description = $settings['description'];
		$text_align = $settings['text_align'];
		$title_color = $settings['title_color'];
		$uta_title_background = $settings['uta_title_background'];
		$title__active_color = $settings['title__active_color'];
		$uta_title_active_background = $settings['uta_title_active_background'];
		$title_text_align = $settings['title_text_align'];
		$content__active_color = $settings['content__active_color'];
		$uta_content_active_background = $settings['uta_content_active_background'];
		$content_text_align = $settings['content_text_align'];
		$custom_css = $settings['custom_css'];
		?>
		<!-- 
		/**
		 *
		 * Dynamic Style
		*/
		 -->
		<style>
		 	.Uta-tab-container{
		 		text-align: <?php echo $text_align; ?>;
		 	}
		 	.Uta-tab-menu {
			    text-align: <?php echo $title_text_align; ?>;
			}
			.Uta-tab-item-full {
			    text-align: <?php echo $content_text_align; ?>;
			}
			.Uta-tab-menu ul li span{
				color: <?php echo $title_color; ?>;
				background: <?php echo $uta_title_background; ?>;
			}
			.Uta-tab-menu ul li span.active-a{
				color: <?php echo $title__active_color; ?>;
				background: <?php echo $uta_title_active_background; ?>;
			}
			.uta-tab-item.uta-tab-item-content{
				color: <?php echo $content__active_color; ?>;
				background: <?php echo $uta_content_active_background; ?>;
			}
		 	<?php echo $custom_css; ?>
		</style>
		<div class="Uta-tab-container">
			<div class="Uta-tab-menu">
				<?php if ( $settings['Tab_list'] ) { ?>
	      		<ul><?php $counter = 1; ?>
	      			<?php foreach ( $settings['Tab_list'] as  $key => $item ) : ?>
	      				<?php 
						$tab_active = ($key == 0 ) ? 'active-a' : '';
						?>
						<?php 
						$tab_active_c = ($key == 0 ) ? 'tab-active' : '';
						?>
	         		<li><span  class="tab-a <?php print $tab_active; ?>" data-id="<?php echo $item['title'].$counter; ?>"><?php echo $item['title']; ?></span></li>
	         		<?php
	         		$counter++;
	         		 endforeach; ?>
	      		</ul>
	      		<?php } ?>

	   		</div><!--end of tab-menu-->
	   		<?php if ( $settings['Tab_list'] ) { ?>
	   		<div class="Uta-tab-item-full">
	   			<?php $counterd = 1; ?>
	   			<?php foreach ( $settings['Tab_list'] as  $key => $item ) : 
	   				$tab_pane_active = ($key == 0 ) ? 'tab-active' : '';
	   				?>
	   				
		   		<div  class="uta-tab-item uta-tab-item-content <?php print $tab_pane_active; ?>" data-id="<?php echo $item['title'].$counterd; ?>">
		         	<?php echo $item['description']; ?>
		   		</div><!--end of tab one--> 

		   		<?php 
		   		$counterd++;
		   	endforeach; ?>
	   		</div>
	   		<?php } ?>
		</div><!--end of container-->
		<script>
		(function($) {
    		"use strict";
    		$('.tab-a').click(function(){  
		      	$(".uta-tab-item").removeClass('tab-active');
		      	$(".uta-tab-item[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
		      	$(".tab-a").removeClass('active-a');
		      	$(this).parent().find(".tab-a").addClass('active-a');
		    });
    	})(jQuery);
		</script>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Uta_Tab() );