<?php
	/**
	 * Testimonials Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_Testimonials extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-testimonials', 
				'description' => esc_html__( 'Custom widget for testimonials', 'homeland' )
			);	
			parent::__construct( 'Testimonials', esc_html__( 'Homeland - Testimonials', 'homeland' ), $widget_ops );
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

		 	global $post;
	 		$args_testi = array( 
				'post_type' => 'homeland_testimonial', 
				'posts_per_page' => $instance[ 'homeland_testi_limit' ] 
			);	

			query_posts( $args_testi );
			?>
			<div class="testimonial-flexslider">	
				<ul class="slides">
					<?php while( have_posts() ) : the_post(); ?>
						<li id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class() ); ?>>
							<?php 
								the_content();
								if ( has_post_thumbnail() ) : 
									the_post_thumbnail( array( 100, 100 ) ); 
								endif;
								the_title( '<h4>', '</h4>' ); 
								echo "<span>". esc_html( $post->homeland_position ) ."</span>";
							?>	 
						</li>
					<?php	endwhile;	?>
				</ul>	
			</div><?php
			wp_reset_query();
			echo wp_kses_post( $args['after_widget'] );			
		}
			
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form($instance) {				
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_testi_limit = !empty( $instance['homeland_testi_limit'] ) ? $instance['homeland_testi_limit'] : '';	
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_testi_limit' ) ); ?>"><?php esc_html_e( 'Number of testimonials to show:', 'homeland' ); ?>
					</label>
					<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_testi_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_testi_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $homeland_testi_limit ); ?>" />
				</p>
			<?php
		}			

		/**
		 * Processing widget options on save
		 * @param  array $new_instance The new options
		 * @param  array $old_instance The previous options
		 * @return array
		 */
		public function update($new_instance, $old_instance) {				
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_testi_limit'] = ( ! empty( $new_instance['homeland_testi_limit'] ) ) ? sanitize_text_field( $new_instance['homeland_testi_limit'] ) : '';	
			
			return $instance;				
		}
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widget_testimonials() {			
		register_widget( 'homeland_Widget_Testimonials' );			
	}
	add_action( 'widgets_init', 'homeland_widget_testimonials' );
?>