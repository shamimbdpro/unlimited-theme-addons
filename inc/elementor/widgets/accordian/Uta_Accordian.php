<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class Uta_Accordian extends Widget_Base {
	public function get_name() {
      	return 'uta-accordian';
   	}
 
   	public function get_title() {
      	return esc_html__( 'UTA Accordain', 'unlimited-theme-addons' );
   	}
 
   	public function get_icon() { 
        return 'fas fa-plus';
   	}

    public function get_keywords() {
        return [
            'accordion',
            'uta accordion',
            'uta',
            'accordion widget',
            'widget',
            'addons',
            'accordion addons',
            'unlimited theme addons',
        ];
    }
 
   	public function get_categories() {
      	return [ 'uta-elements' ];
   	}

   	protected function _register_controls(){
		// Controls Section Register
		$this->start_controls_section(
			'According',
			array(
				'label'		=> esc_html__('According','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'default_accordion_active',
			[
				'label' => __( 'Default Accordion Active', 'unlimited-theme-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'unlimited-theme-addons' ),
				'label_off' => __( 'No', 'unlimited-theme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'According_list',
			array(
				'label'		=> __('Accordian Item','unlimited-theme-addons'),
				'type' 		=> Controls_Manager::REPEATER,
				'fields'	=> array(
					array(
						'name'			=> 'title',
						'label'			=> __('Accordian Title','unlimited-theme-addons'),
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
		// Accordion Style
		$this->start_controls_section(
			'accordion_style',
			array(
				'label'		=> __('Accordion','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'uta_ac_item_border',
                'label' => esc_html__( 'Border', 'unlimited-theme-addons' ),
                'selector' => '{{WRAPPER}} .accordion__item',
            ]
        );
        $this->add_responsive_control(
            'uta_title_padding',
            [
                'label' => esc_html__( 'Margin', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion__item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
		// Title Style
		$this->start_controls_section(
			'Title_style',
			array(
				'label'		=> __('Title','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'unlimited-theme-addons' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .accordion-header'
			]
		);
		$this->add_responsive_control(
            'uta_title_padding',
            [
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'uta_ac_title_border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
 		 * Tab Color
        */
        $this->start_controls_tabs(
            'uta_ac_title_style_tabs'
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
            'uta_ac_title_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'unlimited-theme-addons' ),
            ]
        );
        $this->add_control(
			'title__hover_color',
			array(
				'label'		=> __('Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_title_hover_background',
			array(
				'label'		=> __('Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->end_controls_section();
		/*
 		 * Coontent Style
		*/
		$this->start_controls_section(
			'content_style',
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
				'selector' 	=> '{{WRAPPER}} .accordion-body__contents'
			]
		);
		$this->add_responsive_control(
            'uta_content_padding',
            [
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-body__contents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'uta_ac_content_border_radious',
            [
                'label' => esc_html__( 'Border Radius', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-body__contents' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        /*
 		 * Tab Color
        */
        $this->start_controls_tabs(
            'uta_ac_content_style_tabs'
        );
        /*
 		 * Default Color
        */
        $this->start_controls_tab(
            'content_open_tab',
            [
                'label' => esc_html__( 'Default', 'unlimited-theme-addons' ),
            ]
        );
        $this->add_control(
			'content_color',
			array(
				'label'		=> __('Title Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_content_background',
			array(
				'label'		=> __('Title Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'uta_ac_content_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'unlimited-theme-addons' ),
            ]
        );
        $this->add_control(
			'content__hover_color',
			array(
				'label'		=> __('Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'uta_content_hover_background',
			array(
				'label'		=> __('Background','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
		/*
		 * Start Icon Control Section
		*/
		$this->start_controls_section(
			'icon_style',
			array(
				'label'		=> __('Icon','unlimited-theme-addons'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
            'uta_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'unlimited-theme-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .accordion__item>.accordion-header:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'uta_icon_color',
			array(
				'label'		=> __('Color','unlimited-theme-addons'),
				'type'		=> Controls_Manager::COLOR,
			)
		);
		$this->add_control(
			'icon_align',
			[
				'label' 	=> __( 'Alignment', 'unlimited-theme-addons' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'unlimited-theme-addons' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'unlimited-theme-addons' ),
						'icon' 	=> 'fa fa-align-right',
					],
				],
				'default' => 'right',
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
		$custom_css = $settings['custom_css'];
		$icon_align = $settings['icon_align'];
		$icon_size = $settings['icon_size'];
		$title_color = $settings['title_color'];
		$uta_title_background = $settings['uta_title_background'];
		$title__hover_color = $settings['title__hover_color'];
		$uta_title_hover_background = $settings['uta_title_hover_background'];
		$content_color = $settings['content_color'];
		$uta_content_background = $settings['uta_content_background'];
		$content__hover_color = $settings['content__hover_color'];
		$uta_content_hover_background = $settings['uta_content_hover_background'];
		$uta_icon_color = $settings['uta_icon_color'];
		$default_accordion_active = $settings['default_accordion_active'];
		?>
		<!-- 
		/**
		 *
		 * Dynamic Style
		*/
		 -->
		<style>
			.accordion-header{
				text-align: <?php echo $text_align; ?>;
				color: <?php echo $title_color; ?>;
				background: <?php echo $uta_title_background; ?>;
			}
			.accordion-header:hover{
				color: <?php echo $title__hover_color; ?>;
				background: <?php echo $uta_title_hover_background; ?>;
			}
			.accordion__item.active .accordion-header{
				text-align: <?php echo $text_align; ?>;
				color: <?php echo $title_color; ?>;
				background: <?php echo $uta_title_background; ?>;
			}
			.accordion__item.active .accordion-header:hover{
				color: <?php echo $title__hover_color; ?>;
				background: <?php echo $uta_title_hover_background; ?>;
			}
			.accordion-body{
				text-align: <?php echo $text_align; ?>;
				color: <?php echo $content__hover_color; ?>;
				background: <?php echo $uta_content_background; ?>;
			}
			.accordion-body:hover{
				color: <?php echo $content_color; ?>;
				background: <?php echo $uta_content_hover_background; ?>;
			}
			.accordion__item>.accordion-header:after{
				float: <?php echo $icon_align; ?> !important;
				font-size: <?php echo $icon_size ?>px !important;
				color: <?php echo $uta_icon_color; ?>
			}
			<?php echo $custom_css; ?>
		</style>
		<div class='Uta-accordian-full'>
			<?php if ( $settings['According_list'] ) { ?>
			<div class="accordion js-accordion">
				<?php foreach (  $settings['According_list'] as $item ) { ?>
	            <div class="accordion__item js-accordion-item <?php if ( 'yes' === $settings['default_accordion_active'] ) { echo 'active'; } ?>">
	                <div class="accordion-header js-accordion-header"><?php echo $item['title']; ?></div>
	                <div class="accordion-body js-accordion-body">
	                    <div class="accordion-body__contents">
	                       <?php echo $item['description']; ?>
	                    </div>
	                </div>
	            </div>
	            <?php } ?>
	        </div>
	    	<?php } ?>
		</div>
		<script>
		(function($) {
    		"use strict";
    		var accordion = (function(){
  
		      var $accordion = $('.js-accordion');
		      var $accordion_header = $accordion.find('.js-accordion-header');
		      var $accordion_item = $('.js-accordion-item');
		     
		      // default settings 
		      var settings = {
		        // animation speed
		        speed: 400,
		        
		        // close all other accordion items if true
		        oneOpen: false
		      };
		        
		      return {
		        // pass configurable object literal
		        init: function($settings) {
		          $accordion_header.on('click', function() {
		            accordion.toggle($(this));
		            
		            setTimeout(() => {
		              $('body, html').animate({
		                scrollTop: $(this).offset().top
		               }, 500)
		            }, 400)
		          });
		          
		          $.extend(settings, $settings); 
		          
		          // ensure only one accordion is active if oneOpen is true
		          if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
		            $('.js-accordion-item.active:not(:first)').removeClass('active');
		          }
		          
		          // reveal the active accordion bodies
		          $('.js-accordion-item.active').find('> .js-accordion-body').show();
		        },
		        toggle: function($this) {
		                
		          if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
		            $this.closest('.js-accordion')
		                   .find('> .js-accordion-item') 
		                   .removeClass('active')
		                   .find('.js-accordion-body')
		                   .slideUp()
		          }
		          
		          // show/hide the clicked accordion item
		          $this.closest('.js-accordion-item').toggleClass('active');
		          $this.next().stop().slideToggle(settings.speed);
		        }
		      }
		    })();

		    $(document).ready(function(){
		      accordion.init({ speed: 300, oneOpen: true });
		    });
    	})(jQuery);
		</script>
		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Uta_Accordian() );