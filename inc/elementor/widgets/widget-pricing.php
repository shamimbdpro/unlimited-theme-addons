<<<<<<< HEAD
<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly

// Pricing
class uta_Widget_Pricing extends Widget_Base
{

    public function get_name() {
        return 'pricing';
    }

    public function get_title() {
        return esc_html__('UTA Pricing', 'unlimited-theme-addons');
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'uta-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'pricing_section',
            [
                'label' => esc_html__('Pricing', 'unlimited-theme-addons'),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('title', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Standard Plan',
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Price', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '70',
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __('Currency', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$', 'unlimited-theme-addons'),
            ]
        );

        $this->add_control(
            'package',
            [
                'label' => __('Package', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Yealry',
                'options' => [
                    'Daily' => __('Daily', 'unlimited-theme-addons'),
                    'Weekly' => __('Weekly', 'unlimited-theme-addons'),
                    'Monthly' => __('Monthly', 'unlimited-theme-addons'),
                    'Yealry' => __('Yealry', 'unlimited-theme-addons'),
                    'none' => __('None', 'unlimited-theme-addons'),
                ],
            ]
        );

        $feature = new \Elementor\Repeater();

        $feature->add_control(
            'feature',
            [
                'label' => __('Feature', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('10 Free Domain Names', 'unlimited-theme-addons'),
            ]
        );

        $this->add_control(
            'feature_list',
            [
                'label' => __('Feature List', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature->get_controls(),
                'default' => [
                    [
                        'feature' => __('5GB Storage Space', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('20GB Monthly Bandwidth', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('My SQL Databases', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('100 Email Account', 'unlimited-theme-addons'),
                    ],
                    [
                        'feature' => __('10 Free Domain Names', 'unlimited-theme-addons'),
                    ],
                ],
                'title_field' => '{{{ feature }}}',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => __('button text', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Select Plan',
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label' => __('button URL', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'recommended',
            [
                'label' => __('Recommended', 'unlimited-theme-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('On', 'unlimited-theme-addons'),
                'label_off' => __('Off', 'unlimited-theme-addons'),
                'return_value' => 'on',
                'default' => 'off',
            ]
        );

        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        // get our input from the widget settings.

        $settings = $this->get_settings_for_display();

        //Inline Editing
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_inline_editing_attributes('price', 'basic');
        $this->add_inline_editing_attributes('package', 'basic');
        $this->add_inline_editing_attributes('btn_text', 'basic');
        ?>

        <div class="uta-pricing-table <?php if ( 'on' == $settings['recommended'] ) {
            echo "recommended";
        } ?>">
            <h6 class="type elementor-inline-editing" <?php echo $this->get_render_attribute_string('title'); ?>><?php echo esc_html($settings['title']); ?></h6>
            <h1 class="uta-price elementor-inline-editing" <?php echo $this->get_render_attribute_string('price'); ?>>
                <span class="uta-currency"><?php echo $settings['currency']; ?></span><?php echo esc_html($settings['price']); ?>
            </h1>

            <?php if ( 'none' !== $settings['package'] ) : ?>
                <span <?php echo esc_html($this->get_render_attribute_string('package')); ?>><?php echo esc_html($settings['package']); ?></span>
            <?php endif ?>

            <ul>
                <?php
                foreach ( $settings['feature_list'] as $index => $feature ) {
                    $feature_inline = $this->get_repeater_setting_key('feature', 'feature_list', $index);
                    $this->add_inline_editing_attributes($feature_inline, 'basic');
                    ?>
                    <li <?php echo esc_html($this->get_render_attribute_string($feature_inline)); ?>><?php echo esc_html($feature['feature']) ?></li>
                    <?php
                } ?>
            </ul>
            <a class="elementor-inline-editing uta-buy-button"
               href="<?php echo esc_url($settings['btn_url']) ?>" <?php echo $this->get_render_attribute_string('btn_text'); ?>><?php echo esc_html($settings['btn_text']) ?></a>
        </div>

        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new uta_Widget_Pricing());
=======
<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class uta_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'UTA Pricing', 'unlimited-theme-addons' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'uta-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
			 'label' => esc_html__( 'Pricing', 'unlimited-theme-addons' ),
			 'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
			 'label' => __( 'title', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => 'Standard Plan',
         ]
      );

      $this->add_control(
         'price',
         [
			 'label' => __( 'Price', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => '70',
         ]
      );
      
      $this->add_control(
         'currency',
         [
			 'label' => __( 'Currency', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => __( '$', 'unlimited-theme-addons' ),
         ]
      );
      
      $this->add_control(
         'package',
         [
			 'label' => __( 'Package', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SELECT,
			 'default' => 'Yealry',
			 'options' => [
				 'Daily'  => __( 'Daily', 'unlimited-theme-addons' ),
				 'Weekly'  => __( 'Weekly', 'unlimited-theme-addons' ),
				 'Monthly' => __( 'Monthly', 'unlimited-theme-addons' ),
				 'Yealry' => __( 'Yealry', 'unlimited-theme-addons' ),
				 'none' => __( 'None', 'unlimited-theme-addons' ),
			 ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
			 'label' => __( 'Feature', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXTAREA,
			 'default' => __( '10 Free Domain Names', 'unlimited-theme-addons' ),
         ]
      );

      $this->add_control(
         'feature_list',
         [
			 'label' => __( 'Feature List', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::REPEATER,
			 'fields' => $feature->get_controls(),
			 'default' => [
				 [
					 'feature' => __( '5GB Storage Space', 'unlimited-theme-addons' ),
				 ],
				 [
					 'feature' => __( '20GB Monthly Bandwidth', 'unlimited-theme-addons' ),
				 ],
				 [
					 'feature' => __( 'My SQL Databases', 'unlimited-theme-addons' ),
				 ],
				 [
					 'feature' => __( '100 Email Account', 'unlimited-theme-addons' ),
				 ],
				 [
					 'feature' => __( '10 Free Domain Names', 'unlimited-theme-addons' ),
				 ],
			 ],
			 'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
			 'label' => __( 'button text', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => 'Select Plan',
         ]
      );

      $this->add_control(
         'btn_url',
         [
			 'label' => __( 'button URL', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::TEXT,
			 'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
			 'label' => __( 'Recommended', 'unlimited-theme-addons' ),
			 'type' => \Elementor\Controls_Manager::SWITCHER,
			 'label_on' => __( 'On', 'unlimited-theme-addons' ),
			 'label_off' => __( 'Off', 'unlimited-theme-addons' ),
			 'return_value' => 'on',
			 'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'price', 'basic' );
      $this->add_inline_editing_attributes( 'package', 'basic' );
      $this->add_inline_editing_attributes( 'btn_text', 'basic' );
      ?>

      <div class="uta-pricing-table <?php if ( 'on' == $settings['recommended'] ) { echo"recommended"; }?>">
         <h6 class="type elementor-inline-editing" <?php echo esc_html( $this->get_render_attribute_string( 'title' ) ); ?>><?php echo esc_html( $settings['title'] ); ?></h6>
         <h1 class="uta-price elementor-inline-editing" <?php echo esc_html( $this->get_render_attribute_string( 'price' ) ); ?>><span class="uta-currency"><?php echo esc_html( $settings['currency'] ) ?></span><?php echo esc_html( $settings['price'] ); ?>
         </h1>

         <?php if ( 'none' !== $settings['package'] ) : ?>
            <span <?php echo esc_html( $this->get_render_attribute_string( 'package' ) ); ?>><?php echo esc_html( $settings['package'] ); ?></span>
         <?php endif ?>
         
         <ul>
            <?php 
               foreach ( $settings['feature_list'] as $index => $feature ) { 
               $feature_inline = $this->get_repeater_setting_key( 'feature','feature_list',$index);
               $this->add_inline_editing_attributes( $feature_inline, 'basic' );
            ?>
               <li <?php echo esc_html( $this->get_render_attribute_string( $feature_inline ) ); ?>><?php echo esc_html( $feature['feature'] ) ?></li>
            <?php
            } ?>
         </ul>
         <a class="elementor-inline-editing uta-buy-button" href="<?php echo esc_url( $settings['btn_url'] ) ?>" <?php echo esc_html( $this->get_render_attribute_string( 'btn_text' ) ); ?>><?php echo esc_html( $settings['btn_text'] ) ?></a>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new uta_Widget_Pricing() );
>>>>>>> 21df55c1f3f9d85439dc0b25aa6e1f5b240af475
