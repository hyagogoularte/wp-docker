<?php	
	/**
	 * Twitter Feed Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_TwitterFeed extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-twitter', 
				'description' => esc_html__( 'Custom widget for twitter feed', 'homeland' )
			);	
			parent::__construct( 'Twitter', esc_html__( 'Homeland - Twitter Feed', 'homeland' ), $widget_ops );		
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
				
			<div class="tweet">
				<a class="twitter-timeline" data-theme="<?php echo esc_html( $instance[ 'homeland_twitter_theme' ] ); ?>" href="https://twitter.com/<?php echo esc_html( $instance[ 'homeland_twitter_id' ] ); ?>"><?php echo sprintf( esc_html__( 'Tweets by %s', 'homeland' ), $instance[ 'homeland_twitter_id' ] ); ?></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div><?php
			echo wp_kses_post( $args['after_widget'] );						
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form($instance) {	
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_twitter_id = !empty( $instance['homeland_twitter_id'] ) ? $instance['homeland_twitter_id'] : '';	
			$homeland_twitter_theme = !empty( $instance['homeland_twitter_theme'] ) ? $instance['homeland_twitter_theme'] : '';	
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>					
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_twitter_id' ) ); ?>">
						<?php esc_html_e( 'ID', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_twitter_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_twitter_id' ) ); ?>" value="<?php echo esc_html( $homeland_twitter_id ); ?>">		
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_twitter_theme' ) ); ?>">
						<?php esc_html_e( 'Theme', 'homeland' ); ?>
					</label>
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'homeland_twitter_theme' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_twitter_theme' ) ); ?>">
	          <option value="light" <?php if( $homeland_twitter_theme == 'light' ) : echo 'selected'; endif; ?>><?php esc_html_e( 'Light', 'homeland' ); ?></option>
	          <option value="dark" <?php if( $homeland_twitter_theme == 'dark' ) : echo 'selected'; endif; ?>><?php esc_html_e( 'Dark', 'homeland' ); ?></option>
	        </select> 
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
			$homeland_twitter_id = $new_instance[ 'homeland_twitter_id' ];
			$homeland_twitter_theme = $new_instance[ 'homeland_twitter_theme' ];

			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_twitter_id'] = ( ! empty( $homeland_twitter_id ) ) ? sanitize_text_field( $homeland_twitter_id ) : '';
			$instance['homeland_twitter_theme'] = ( ! empty( $homeland_twitter_theme ) ) ? sanitize_text_field( $homeland_twitter_theme ) : '';

			return $instance;				
		}	
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_twitterfeed() {			
		register_widget( 'homeland_Widget_TwitterFeed' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_twitterfeed' );
?>