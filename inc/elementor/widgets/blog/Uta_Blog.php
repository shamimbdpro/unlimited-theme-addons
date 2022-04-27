<?php

namespace Elementor;

if ( ! defined('ABSPATH')) exit; // Exit if accessed directly
// blog
class Uta_Blog extends Widget_Base
{

   public function get_name() {
      return 'uta-blog';
   }

   public function get_title() {
      return esc_html__('UTA Blog', 'unlimited-theme-addons');
   }

   public function get_icon() {
      return 'eicon-posts-carousel';
   }

   /**
    * Widget CSS.
    * 
    * @return string
    */
   // public function get_style_depends()
   // {
   //    $styles = ['uta-blog'];

   //    return $styles;
   // }

   /**
    * Widget script.
    * 
    * @return string
    */
   public function get_script_depends() {
      $scripts = [];

      return $scripts;
   }


   public function get_keywords() {
      return [
		  'team',
		  'uta team',
		  'uta',
		  'team widget',
		  'widget',
		  'addons',
		  'team addons',
		  'unlimited theme addons',
      ];
   }

   public function get_categories() {
      return [ 'uta-elements' ];
   }


   /**
    * Retrieve Widget Support URL.
    *
    * @access public
    *
    * @return string support URL.
    */
   public function get_custom_help_url() {
      return 'https://codepopular.com/contact/';
   }

   protected function register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
			 'label' => esc_html__('Blog', 'unlimited-theme-addons'),
			 'type'  => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
			 'label'   => __('Order', 'unlimited-theme-addons'),
			 'type'    => \Elementor\Controls_Manager::SELECT,
			 'default' => 'ASC',
			 'options' => [
				 'ASC'  => __('Ascending', 'unlimited-theme-addons'),
				 'DESC' => __('Descending', 'unlimited-theme-addons'),
			 ],
         ]
      );

      $this->add_responsive_control(
         'uta_blog_grid_column',
         [
			 'label'        => esc_html__('Columns', 'unlimited-theme-addons'),
			 'type'         => Controls_Manager::SELECT,
			 'default'      => '3',
			 'options'      => [
				 '1' => esc_html__('1', 'unlimited-theme-addons'),
				 '2' => esc_html__('2', 'unlimited-theme-addons'),
				 '3' => esc_html__('3', 'unlimited-theme-addons'),
				 '4' => esc_html__('4', 'unlimited-theme-addons'),
				 '5' => esc_html__('5', 'unlimited-theme-addons'),
				 '6' => esc_html__('6', 'unlimited-theme-addons'),
			 ],
			 'toggle'       => true,
			 'prefix_class' => 'uta-post-grid-column%s-',
         ]
      );

      $this->add_control(
         'uta_blog_grid_per_page',
         [
			 'label'   => __('Post Count', 'unlimited-theme-addons'),
			 'type'    => Controls_Manager::NUMBER,
			 'default' => 3,
			 'min'     => 1,
			 'max'     => 1000,
			 'step'    => 1,
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

      $settings = $this->get_settings_for_display(); ?>

      <div class="uta-blog">
         <?php
         $blog = new \WP_Query(array(
			 'post_type'           => 'post',
			 'posts_per_page'      => '' != $settings['uta_blog_grid_per_page'] ? $settings['uta_blog_grid_per_page'] : 3,
			 'ignore_sticky_posts' => true,
			 'order'               => $settings['order'],
         ));
         /* Start the Loop */
         while ( $blog->have_posts() ) : $blog->the_post(); ?>
            <!-- blog -->
            <div class="uta-blog-item">
               <div class="uta-blog-item-img">
                  <?php if ( has_post_thumbnail() ) : ?>
                     <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'uta-360-200')); ?>" alt="<?php the_title() ?>">
                     </a>
                     <span><?php the_category(',') ?></span>
                  <?php endif ?>
               </div>

               <div class="uta-blog-item-content">
                  <a href="<?php the_permalink() ?>">
                     <h4><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></h4>
                  </a>
                  <ul class="uta-blog-item-meta">
                     <li class="blog-meta-info">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename'))); ?>"><?php echo get_avatar(get_the_author_meta('ID'), 32); ?><?php the_author(); ?></a>
                     </li>
                     <li class="blog-item-date">
                        <?php echo get_the_date(); ?>
                     </li>
                  </ul>
               </div>
            </div>
         <?php
         endwhile;
         wp_reset_postdata();
         ?>
      </div>

<?php
   }
}
Plugin::instance()->widgets_manager->register_widget_type(new Uta_Blog());
