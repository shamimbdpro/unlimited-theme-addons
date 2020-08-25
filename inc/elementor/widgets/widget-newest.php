<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Newest Item
class cpthelper_Widget_Newest extends Widget_Base {
 
   public function get_name() {
      return 'newest';
   }
 
   public function get_title() {
      return esc_html__( 'Newest', 'cpthelper' );
   }
 
   public function get_icon() { 
        return 'eicon-apps';
   }
 
   public function get_categories() {
      return [ 'cpthelper-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'newest_section',
         [
            'label' => esc_html__( 'Newest', 'cpthelper' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Number of Items', 'cpthelper' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
               'no' => [
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
               ],
            ],
            'default' => [
               'size' => 40,
            ]
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="container">
         <div class="newest-filter">
            <ul class="list-inline">
               <li class="select-cat list-inline-item" data-filter="*"><?php echo esc_html__( 'All Items', 'cpthelper' ) ?></li>
               <?php $newest_menu_terms = get_terms( array(
                   'taxonomy' => 'download_category',
                   'hide_empty' => false,  
               ) ); 
               
               foreach ( $newest_menu_terms as $newest_menu_term ) { ?>
               <li class="list-inline-item" data-filter=".<?php echo esc_attr( $newest_menu_term->slug ) ?>"><?php echo esc_html( $newest_menu_term->name ) ?></li>
               <?php } ?>
            </ul>
         </div>
         <div class="newest_items">
            <?php

            $download = new \WP_Query( array( 
               'post_type' => 'download',
               'posts_per_page' => $settings['ppp']['size']
            ));

            /* Start the Loop */
            while ( $download->have_posts() ) : $download->the_post(); 

              $download_terms = get_the_terms( get_the_ID() , 'download_category' );
              $thumbnail = get_post_meta( get_the_ID(), 'product_item_thumbnail', 1 ); ?>
              
               <!-- Item -->
               <div class="dm-col-10 <?php foreach ( $download_terms as $download_term ) { echo esc_attr( $download_term->slug ).' '; } ?>">

                  <a class="sit-preview" href="<?php the_permalink(); ?>">
                     <img src="<?php if ( $thumbnail ) { echo esc_url( $thumbnail ); } else { the_post_thumbnail_url( 'cpthelper-80x80' ); } ?>" data-preview-url="<?php the_post_thumbnail_url(); ?>" data-item-cost="<?php if ( edd_get_download_price( get_the_ID() ) == 0 ){ echo esc_html__( 'Free', 'cpthelper' ); } else { echo edd_currency_filter().edd_get_download_price(get_the_ID() ); } ?>" data-item-category="<?php foreach ( $download_terms as $download_term ) { echo esc_attr( $download_term->name ); } ?>" data-item-author="<?php the_author(); ?>" alt="<?php the_title_attribute(); if ( get_post_meta( get_the_ID(), 'subheading', true ) ) { echo " - "; echo get_post_meta( get_the_ID(), 'subheading', true ); } ?>" >
                  </a>
               </div>

            <?php 
            endwhile; 
         wp_reset_postdata();
         ?>
         </div>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new cpthelper_Widget_Newest );