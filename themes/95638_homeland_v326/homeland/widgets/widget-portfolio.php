<?php
	/**
	 * Portfolio Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_Portfolio extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-portfolio', 
				'description' => esc_html__( 'Custom widget for portfolio', 'homeland' )
			);	
			parent::__construct( 'Portfolio', esc_html__( 'Homeland - Portfolio', 'homeland' ), $widget_ops );		
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
			?>	
				
			<ul class="clearfix">
				<?php
					$args_portfolio = array( 
						'post_type' => 'homeland_portfolio', 
						'orderby' => 'DATE', 
						'posts_per_page' => $instance[ 'homeland_posts_limit' ]
					);
					query_posts( $args_portfolio );
					while( have_posts() ) : the_post();	
					?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php 
									if( has_post_thumbnail() ) : 
										the_post_thumbnail( array( 70, 70 ) ); 
									else : ?>
										<label class="no-image-fallback image-portfolio">
											<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
										</label><?php
									endif; 
								?>
							</a>
						</li><?php
					endwhile;	
					wp_reset_query();	
				?>		
			</ul><?php
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>"><?php esc_html_e( 'Number of portfolio to show:', 'homeland' ); ?>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_posts_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $homeland_posts_limit ); ?>" />
			</p>
			<p>
				<small><i><?php esc_html_e( 'Portfolio are automatically displayed', 'homeland' ); ?></i></small>
			</p><?php
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
			$instance['homeland_posts_limit'] = ( ! empty( $new_instance['homeland_posts_limit'] ) ) ? sanitize_text_field( $new_instance['homeland_posts_limit'] ) : '';	

			return $instance;				
		}			
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_portfolio() {			
		register_widget( 'homeland_Widget_Portfolio' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_portfolio' );
?>