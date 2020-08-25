<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner
class cpthelper_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'cpthelper' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'cpthelper-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'cpthelper' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'search',
         [
            'label' => __( 'Search', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'cpthelper' ),
            'label_off' => __( 'Off', 'cpthelper' ),
            'return_value' => 'on',
            'default' => 'on',
         ]
      );

      $this->add_control(
         'searchtext',
         [
            'label' => __( 'Search Text', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Search Product','cpthelper' ),
            'condition' => ['search' => 'on' ]
         ]
      );

      $this->add_control(
         'products',
         [
            'label' => __( 'Products', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'cpthelper' ),
            'label_off' => __( 'Off', 'cpthelper' ),
            'return_value' => 'on',
            'default' => 'on',
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'cpthelper' ),
            'label_off' => __( 'Off', 'cpthelper' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->add_control(
         'experience',
         [
            'label' => __( 'Years of experience', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 2014,
            'condition' => ['counter' => 'on' ]
         ]
      );


      $this->add_control(
         'button_display',
         [
            'label' => __( 'Button', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'cpthelper' ),
            'label_off' => __( 'Off', 'cpthelper' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $button = new \Elementor\Repeater();

      $button->add_control(
         'button',
         [
            'label' => __( 'Button Text', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Learn More', 'cpthelper' )
         ]
      );

      $button->add_control(
         'button_url',
         [
            'label' => __( 'Button URL', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'button_list',
         [
            'label' => __( 'Button List', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $button->get_controls(),
            'default' => [
               [
                  'button' => __( 'Shop Now', 'cpthelper' ),
                  'button_url' => '#',
               ],
               [
                  'button' => __( 'Learn More', 'cpthelper' ),
                  'button_url' => '#',
               ],
            ],
            'title_field' => '{{{ button }}}',
            'condition' => [
               'button_display' => 'on'
            ]
         ]
      );

      $this->add_control(
        'text_color',
        [
          'label' => __( 'Text Color', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'default' => '#2e3d62',
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'selectors' => [
            '{{WRAPPER}} h1, {{WRAPPER}} h5, {{WRAPPER}} p, {{WRAPPER}} span, {{WRAPPER}} .cpthelper-product-search-form select, {{WRAPPER}} .cpthelper-product-search-form input[type="text"], {{WRAPPER}} .cpthelper-search-btn,
            {{WRAPPER}} input[type="submit"], {{WRAPPER}} .cpthelper-search-btn:after, {{WRAPPER}} ::placeholder' => 'color: {{VALUE}}',
          ]
        ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();

      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'description', 'basic' );
      ?>

      <section class="banner">
        <div class="container text-center">
            <div class="row">
              <div class="col-lg-12">
                <div class="banner-content">
                  <h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
                  <p <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo esc_html( $settings['description'] ); ?></p>  
                  <?php if ( true == $settings['search'] ): ?>
                  <div class="cpthelper-product-search-form">
                    <form method="GET" action="<?php echo home_url(); ?>">
                      <div class="cpthelper-download-cat-filter">
                        <?php wp_dropdown_categories( array(
                          'show_option_all' => esc_html__('All Categories','cpthelper'),
                          'orderby' => 'name',
                          'order' => 'ASC',
                          'echo' => 1,
                          'hide_empty' => 1,
                          'show_count' => 1,
                          'selected' => get_query_var( 'download_cat' ),
                          'name' => 'download_cat',
                          'hierarchical'  => 1,
                          'value_field' => 'name',
                          'class' => 'cpthelper-download-cat-filter',
                          'taxonomy' => 'download_category'
                        ) ); ?>
                      </div>
                      <div class="cpthelper-search-fields">
                        <input name="s" value="<?php echo ( isset($_GET['s']) ) ? $_GET['s']: null; ?>" type="text" placeholder="<?php echo esc_attr( $settings['searchtext'] ); ?>">
                        <input type="hidden" name="post_type" value="download">
                        <span class="cpthelper-search-btn"><input type="submit"></span>
                      </div>
                    </form>
                  </div>
                  <?php endif ?>                  
                  
                </div>
              </div>
            </div>
              
            <?php if ( 'on' == $settings['counter'] ){ ?> 
            <div class="row banner-counter">
              <div class="col-sm-3">
                <div class="counter-item">
                  <span class="counter">
                    <?php 
                    $customer = new \EDD_DB_Customers;
                    echo esc_html( $customer->count() );
                    ?>
                  </span>
                  <h5><?php echo esc_html__( 'Customers' , 'cpthelper' ) ?></h5>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="counter-item">
                  <span class="counter">
                    <?php echo wp_count_posts( 'download' )->publish; ?>
                    </span>
                  <h5><?php echo esc_html__( 'Items' , 'cpthelper' ) ?></h5>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="counter-item">
                  <span class="counter">
                    <?php echo cpthelper_edd_count_total('sale'); ?>
                    </span>
                  <h5><?php echo esc_html__( 'Sales' , 'cpthelper' ) ?></h5>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="counter-item">
                  <span class="counter"><?php echo date("Y") - esc_html( $settings['experience'] ); ?></span>
                  <h5><?php echo esc_html__( 'Years of experience' , 'cpthelper' ) ?></h5>
                </div>
              </div>
            </div>
            <?php } ?>
            
            <?php if ( 'on' == $settings['button_display'] ): ?>
              <ul class="list-inline banner-button">
                <?php 
                   foreach (  $settings['button_list'] as $index => $button ) { 
                   $button_inline = $this->get_repeater_setting_key( 'button','button_list',$index);
                   $this->add_inline_editing_attributes( $button_inline, 'basic' );
                ?>
                <li  class="list-inline-item" <?php echo esc_attr( $this->get_render_attribute_string( $button_inline ) ); ?>>
                  <a href="<?php echo esc_url( $button['button_url'] ) ?>"><?php echo esc_html( $button['button'] ) ?></a>           
                </li>
                <?php 
                } ?>
             </ul>
            <?php endif ?>

            <?php if (  'on' == $settings['products'] ): ?>

            <ul class="banner-products">
              <?php

              $download = new \WP_Query( array( 
                 'post_type' => 'download',
                 'posts_per_page' => 7
              ));

              /* Start the Loop */
              while ( $download->have_posts() ) : $download->the_post(); ?>

                <li>
                    <a href="<?php the_permalink(); ?>">
                      <img src="<?php echo esc_url( get_post_meta( get_the_ID(), 'product_item_thumbnail', 1 ) ) ?>" alt="<?php the_title_attribute(); ?>">
                    </a>
                </li>
               <?php endwhile; wp_reset_postdata(); ?>
            </ul>
              
            <?php endif ?>
            
        </div>
      </section>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new cpthelper_Widget_Banner );