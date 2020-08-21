<?php
/**
 * Adds Recent post Widget.
 * @package digitalshop
 */
if( !class_exists('digitalshop_Recent_Post') ){
	class digitalshop_Recent_Post extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){

			$widget_options = array(
				'description' 					=> esc_html__('Digitalshop blog recent post here', 'digitalshop'), 
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('digitalshop_Recent_Post', esc_html__( 'Digitalshop : Recent Post', 'digitalshop'), $widget_options );

		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){

			if ( ! isset( $args['widget_id'] ) ) {

			$args['widget_id'] = $this->id;

		}
		
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts','digitalshop' );
		
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$show_item = ( ! empty( $instance['show_item'] ) ) ? absint( $instance['show_item'] ) : 3;


			echo $args['before_widget']; 
			if ( $title ): 
		    echo $args['before_title'];  
			echo esc_attr( $title );  
		 	echo $args['after_title']; 
			endif;

				$posts = new WP_Query(array(
					'post_type'      => 'post',
					'posts_per_page' => $show_item,
					'ignore_sticky_posts' => true,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                                'operator' => 'NOT IN'
                            )
                        )
				));

				?>
				<div class="recent-post-widget">
					<div class="row">
						<?php

						while($posts->have_posts()) : $posts->the_post();  ?>
					<!-- 	<a href="<?php the_permalink(); ?>">
							<div class="row<?php if ( !has_post_thumbnail() ) { echo' no-thumbnail'; } ?>">
								<?php if (has_post_thumbnail()): ?>
								<div class="col-lg-4">
									<?php the_post_thumbnail( 'digitalshop-80x80' ); ?>
								</div>
								<?php endif ?>
								<div class="col-lg-<?php if ( has_post_thumbnail() ) { echo'8'; } else { echo'12'; } ?>">
									<p><?php the_title( ); ?></p>
									<span>
									<i class="fa fa-calendar-check-o"></i><?php echo get_the_date(); ?>
									</span>
								</div>
							</div>
						</a>
 -->

						<div class="col-xl-4 col-md-6">
			               <div class="blog-item">
			               	<?php if (has_post_thumbnail()): ?>
			                  <div class="blog-thumb">
			                     <a href="<?php the_permalink(); ?>">
			                        <?php the_post_thumbnail( 'digitalshop-360x260' ); ?>
			                     </a>
			                  </div>
			                <?php endif ?>
			                   
			                  <div class="blog-content">
			                     <div class="blog-meta">
			                        <a href="https://themebing.com/wp/tijarah/blog/author/"></a>
			                        <span> - <?php echo get_the_date(); ?></span>
			                     </div>
			                     <h4><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h4>
			                  </div>
			               </div>
			            </div>





						<?php endwhile; ?>
					</div>
				</div>

			<?php echo $args['after_widget']; ?>
			
			<?php wp_reset_postdata();
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['show_item'] = (int) $new_instance['show_item'];
			return $instance;
		}

	 	/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$show_item    = isset( $instance['show_item'] ) ? absint( $instance['show_item'] ) : 5; ?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:','digitalshop' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_item' )); ?>"><?php echo esc_html__( 'No. of Item of posts to show:','digitalshop' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'show_item' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_item' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($show_item); ?>" size="3" />
		</p>

	<?php
		}
	}
}



// register Contact  Widget widget
function digitalshop_Recent_Post(){
	register_widget('digitalshop_Recent_Post');
}
add_action('widgets_init','digitalshop_Recent_Post');
