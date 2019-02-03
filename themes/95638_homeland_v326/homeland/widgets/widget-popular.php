<?php
	/**
	 * Popular Post Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_Popular_Posts extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-popular-posts', 
				'description' => esc_html__( 'Custom widget for popular posts', 'homeland' )
			);	
			parent::__construct( 'Popular', esc_html__( 'Homeland - Popular Posts', 'homeland' ), $widget_ops );		
		}
		
		/**
		 * Outputs the content of the widget
		 * @param  array $args
		 * @param  array $instance
		 */
		public function widget( $args, $instance ) {		
			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) :
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
			endif;

			$args_wp = array( 
				'post_type' => 'post', 
				'orderby' => 'comment_count', 
				'ignore_sticky_posts' => true,
				'posts_per_page' => $instance[ 'homeland_posts_limit' ]
			);
			$wp_query = new WP_Query( $args_wp );

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				$homeland_img_attr = array( 
					'srcset' => wp_get_attachment_image_url(
						get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
					'sizes' => '(max-width: 568px) 50vw, 
						(max-width: 736px) 40vw, 
						(max-width: 768px) 30vw, 
						(max-width: 1024px) 16vw, 140px' 
				); ?>
				<div class="post-bottom clearfix">
					<div class="post-col-5 post-col-no-margin">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr ); ?>
							</a>
						<?php else : ?>
							<label class="no-image-fallback image-blog">
								<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
							</label>
						<?php endif; ?>
					</div>
					<div class="post-col-7 post-col-no-rmargin">
						<?php 
							the_title( sprintf( '<a href="%s">', esc_url( get_permalink() ) ), '</a>' );
						?>
						<span><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
				</div><?php
			endwhile;	
			wp_reset_query();	
			echo wp_kses_post( $args['after_widget'] );					
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {			
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_posts_limit = !empty( $instance['homeland_posts_limit'] ) ? $instance['homeland_posts_limit'] : '';	
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_html_e( 'Title', 'homeland' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
			</p>					
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>"><?php esc_html_e( 'Number of popular post to show:', 'homeland' ); ?>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_posts_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $homeland_posts_limit ); ?>" />
			</p>			
			<p>
				<small><i><?php esc_html_e( 'Popular Posts are automatically displayed from blog posts', 'homeland' ); ?></i></small>
			</p><?php
		}			

		/**
		 * Processing widget options on save
		 * @param  array $new_instance The new options
		 * @param  array $old_instance The previous options
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {				
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_posts_limit'] = ( ! empty( $new_instance['homeland_posts_limit'] ) ) ? sanitize_text_field( $new_instance['homeland_posts_limit'] ) : '';	

			return $instance;				
		}
	}
		
	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_popular_posts() {			
		register_widget( 'homeland_Widget_Popular_Posts' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_popular_posts' );
?>