<?php
	/**
	 * Follow Us Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_GetTouch extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-get-in-touch', 
				'description' => esc_html__( 'Custom widget for connect with us', 'homeland' )
			);	
			parent::__construct( 'GetTouch', esc_html__( 'Homeland - Connect with us', 'homeland' ), $widget_ops );		
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

			$homeland_twitter = get_option( 'homeland_twitter' );
			$homeland_facebook = get_option( 'homeland_facebook' );
			$homeland_pinterest = get_option( 'homeland_pinterest' );
			$homeland_dribbble = get_option( 'homeland_dribbble' );
			$homeland_instagram = get_option( 'homeland_instagram' );
			$homeland_rss = get_option( 'homeland_rss' );
			$homeland_youtube = get_option( 'homeland_youtube' );
			$homeland_gplus = get_option( 'homeland_gplus' );
			$homeland_linkedin = get_option( 'homeland_linkedin' );

			$homeland_brand_color = ( empty( $instance[ 'homeland_bcolor' ] ) ) ? "social-colors" : "social";
			?>	

			<div class="<?php echo esc_attr( $homeland_brand_color ); ?>">
				<ul class="clearfix">
					<?php if( !empty( $homeland_twitter ) ) : ?>	
						<li class="twitter"><a href="http://twitter.com/<?php echo esc_html( $homeland_twitter ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php endif; ?>

					<?php if( !empty( $homeland_facebook ) ) : ?>	
						<li class="facebook"><a href="http://facebook.com/<?php echo esc_html( $homeland_facebook ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php endif; ?>

					<?php if( !empty( $homeland_youtube ) ) : ?>	
						<li class="youtube"><a href="<?php echo esc_url( $homeland_youtube ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_linkedin )) : ?>	
						<li class="linkedin"><a href="<?php echo esc_url( $homeland_linkedin ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_pinterest )) : ?>	
						<li class="pinterest"><a href="http://pinterest.com/<?php echo esc_html( $homeland_pinterest ); ?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_dribbble )) : ?>	
						<li class="dribbble"><a href="http://dribbble.com/<?php echo esc_html( $homeland_dribbble ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_gplus )) : ?>	
						<li class="gplus"><a href="<?php echo esc_url( $homeland_gplus ); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_instagram )) : ?>	
						<li class="instagram"><a href="http://instagram.com/<?php echo esc_html( $homeland_instagram ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<?php endif; ?>

					<?php if(!empty( $homeland_rss )) : ?>	
						<li class="rss"><a href="<?php echo esc_url( $homeland_rss ); ?>" target="_blank"><i class="fas fa-rss"></i></a></li>
					<?php endif; ?>	
				</ul>
			</div><?php
			echo wp_kses_post( $args['after_widget'] );							
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {			
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_bcolor = !empty( $instance['homeland_bcolor'] ) ? $instance['homeland_bcolor'] : '';	
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>
				<p>
	        <input class="checkbox" type="checkbox" <?php checked( $homeland_bcolor, 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'homeland_bcolor' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_bcolor' ) ); ?>" /> 
	        <label for="<?php echo esc_attr( $this->get_field_id( 'homeland_bcolor' ) ); ?>"><?php esc_html_e( 'Disable Brand Color', 'homeland' ); ?></label>
	    	</p>
				<p>	
					<small><i><?php esc_html_e( 'Social links will automatically display, set id and name in Theme Options', 'homeland' ); ?></i></small>	
				</p>
			<?php
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
			$instance['homeland_bcolor'] = ( ! empty( $new_instance['homeland_bcolor'] ) ) ? sanitize_text_field( $new_instance['homeland_bcolor'] ) : '';	

			return $instance;				
		}	
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_gettouch() {			
		register_widget( 'homeland_Widget_GetTouch' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_gettouch' );
?>