<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Download
class digitalshop_Widget_download extends Widget_Base {
 
   public function get_name() {
      return 'download';
   }
 
   public function get_title() {
      return esc_html__( 'Download', 'digitalshop' );
   }
 
   public function get_icon() { 
        return 'eicon-gallery-masonry';
   }
 
   public function get_categories() {
      return [ 'digitalshop-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'download_section',
         [
            'label' => esc_html__( 'Download', 'digitalshop' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Number of Items', 'digitalshop' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
               'no' => [
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
               ],
            ],
            'default' => [
               'size' => 9,
            ]
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => __( 'order', 'digitalshop' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'digitalshop' ),
               'DESC' => __( 'Descending', 'digitalshop' )
            ],
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="container">
         <div class="download-filter">
            <ul class="list-inline">
               <li class="select-cat list-inline-item" data-filter="*"><?php echo esc_html__( 'All Items', 'digitalshop' ) ?></li>
               <?php  $download_menu_terms = get_terms( array(
                   'taxonomy' => 'download_category',
                   'hide_empty' => false,  
               ) ); 
               
               foreach ( $download_menu_terms as $download_menu_term ) { ?>
               <li class="list-inline-item" data-filter=".<?php echo esc_attr( $download_menu_term->slug ) ?>"><?php echo esc_html( $download_menu_term->name ) ?></li>
               <?php } ?>
            </ul>
         </div>
         <div class="download_items row">
            <?php

            $download = new \WP_Query( array( 
               'post_type' => 'download',
               'posts_per_page' => $settings['ppp']['size'],
               'order' => $settings['order'],
            ));

            /* Start the Loop */
            while ( $download->have_posts() ) : $download->the_post(); 

            global $digitalshop_opt;

            $digitalshop_product_hover_button = !empty( $digitalshop_opt['digitalshop_product_hover_button'] ) ? $digitalshop_opt['digitalshop_product_hover_button'] : '';

            $download_terms = get_the_terms( get_the_ID() , 'download_category' );
            $download_tag = get_post_meta( get_the_ID(), 'download_tag', true )

            ?>
               <!-- Item -->
               <div class="col-md-4 col-sm-4 col-xs-6 <?php foreach ( $download_terms as $download_term ) { echo esc_attr( $download_term->slug ).' '; } ?>">
                  <div class="download-item">
                     <div class="download-item-image">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <span class="download-item-tag" <?php 
                        if ( $download_tag == 'Sale' ) { 
                           echo 'style="background: #4caf50;"'; 
                        } elseif ( $download_tag == 'Featured' ) {
                            echo 'style="background: #ffc000;"'; 
                        }  elseif ( $download_tag == 'New' ) {
                            echo 'style="background: #c00;"'; 
                        } elseif ( $download_tag == 'Pro' ) { 
                           echo 'style="background: #f44336;"'; 
                        } elseif ( $download_tag == 'Free' ) { 
                           echo 'style="background: #3f51b5;"';
                        } ?>><?php echo esc_html( $download_tag ) ?></span>
                     </div>
                     <div class="download-item-content">
                        <a href="<?php the_permalink(); ?>">
                           <?php the_title( '<h5>', '</h5>' ) ?>
                        </a>
                        <p><?php echo get_post_meta( get_the_ID(), 'subheading', true ) ?></p>

                        <?php foreach ( $download_terms as $download_term ) { ?>
                           <a href="<?php echo esc_attr( get_term_link( $download_term->slug, 'download_category' ) ); ?>" class="download-category"><?php echo esc_html( $download_term->name ); ?></a>
                        <?php } ?>

                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <b>
                                 <?php if ( edd_get_download_price( get_the_ID() ) == 0 ){ ?>
                                    <span><?php echo esc_html__( 'Free', 'digitalshop' ) ?></span>
                                 <?php } else { ?>
                                    <span><?php echo edd_currency_filter().edd_get_download_price(get_the_ID() ); ?></span>
                              <?php } ?>
                              </b>
                           </li>
                           <?php if ( class_exists( 'EDD_Reviews' ) ): ?>
                              <li class="list-inline-item float-right"><?php digitalshop_edd_rating() ?></li>
                           <?php endif ?>
                        </ul>
                        <?php if ( true == $digitalshop_product_hover_button ): ?>
                        <ul class="list-inline text-center download-item-button">
                           <li class="list-inline-item">
                              <a href="<?php the_permalink(); ?>"><i class="fa fa-info-circle"></i><?php echo esc_html__( 'Details' , 'digitalshop' ) ?></a>
                           </li>
                           <?php if ( get_post_meta( get_the_ID(), 'type', true ) == 'theme' ): ?>
                           <li class="list-inline-item">
                              <a href="<?php echo get_post_meta( get_the_ID(), 'preview_url', true ); ?>"><i class="fa fa-eye"></i><?php echo esc_html__( 'Demo' , 'digitalshop' ) ?></a>
                           </li>
                           <?php endif ?>                           
                           <li class="list-inline-item">
                              <a href="<?php echo esc_url( home_url( '/' ) ); ?>checkout?edd_action=add_to_cart&download_id=<?php echo get_the_ID(); ?>"><i class="fa fa-shopping-cart"></i><?php echo esc_html__( 'Download' , 'digitalshop' ) ?></a>
                           </li>
                        </ul>
                        <?php endif ?>
                     </div>
                  </div>
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

Plugin::instance()->widgets_manager->register_widget_type( new digitalshop_Widget_download );