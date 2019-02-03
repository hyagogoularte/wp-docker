<?php
	/**
	 * Working Hours Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_Working_Hours extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-working-hours', 
				'description' => esc_html__( 'Custom widget for working hours', 'homeland' )
			);	
			parent::__construct( 'WorkingHours', esc_html__( 'Homeland - Working Hours', 'homeland' ), $widget_ops );
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

			<ul>
				<li>
					<?php esc_html_e( 'Monday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_monday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Tuesday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_tuesday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Wednesday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_wednesday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Thursday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_thursday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Friday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_friday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Saturday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_saturday' ] ); ?></span>
				</li>
				<li>
					<?php esc_html_e( 'Sunday', 'homeland' ); ?>
					<span><?php echo esc_html( $instance[ 'homeland_working_sunday' ] ); ?></span>
				</li>
			</ul><?php
			echo wp_kses_post( $args['after_widget'] );							
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {		
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_working_monday = !empty( $instance['homeland_working_monday'] ) ? $instance['homeland_working_monday'] : '';										
			$homeland_working_tuesday = !empty( $instance['homeland_working_tuesday'] ) ? $instance['homeland_working_tuesday'] : '';										
			$homeland_working_wednesday = !empty( $instance['homeland_working_wednesday'] ) ? $instance['homeland_working_wednesday'] : '';										
			$homeland_working_thursday = !empty( $instance['homeland_working_thursday'] ) ? $instance['homeland_working_thursday'] : '';										
			$homeland_working_friday = !empty( $instance['homeland_working_friday'] ) ? $instance['homeland_working_friday'] : '';										
			$homeland_working_saturday = !empty( $instance['homeland_working_saturday'] ) ? $instance['homeland_working_saturday'] : '';										
			$homeland_working_sunday = !empty( $instance['homeland_working_sunday'] ) ? $instance['homeland_working_sunday'] : '';										
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_monday' ) ); ?>">
						<?php esc_html_e( 'Monday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_monday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_monday' ) ); ?>" value="<?php echo esc_html( $homeland_working_monday ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_tuesday' ) ); ?>">
						<?php esc_html_e( 'Tuesday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_tuesday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_tuesday' ) ); ?>" value="<?php echo esc_html( $homeland_working_tuesday ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_wednesday' ) ); ?>">
						<?php esc_html_e( 'Wednesday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_wednesday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_wednesday' ) ); ?>" value="<?php echo esc_html( $homeland_working_wednesday ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_thursday' ) ); ?>">
						<?php esc_html_e( 'Thursday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_thursday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_thursday' ) ); ?>" value="<?php echo esc_html( $homeland_working_thursday ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_friday' ) ); ?>">
						<?php esc_html_e( 'Friday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_friday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_friday' ) ); ?>" value="<?php echo esc_html( $homeland_working_friday ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_saturday' ) ); ?>">
						<?php esc_html_e( 'Saturday', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_saturday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_saturday' ) ); ?>" value="<?php echo esc_html( $homeland_working_saturday ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_working_sunday' ) ); ?>">
						<?php esc_html_e('Sunday', 'homeland'); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_working_sunday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_working_sunday' ) ); ?>" value="<?php echo esc_html( $homeland_working_sunday ); ?>">
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
			$homeland_working_monday = $new_instance[ 'homeland_working_monday' ];
			$homeland_working_tuesday = $new_instance[ 'homeland_working_tuesday' ];
			$homeland_working_wednesday = $new_instance[ 'homeland_working_wednesday' ];
			$homeland_working_thursday = $new_instance[ 'homeland_working_thursday' ];
			$homeland_working_friday = $new_instance[ 'homeland_working_friday' ];
			$homeland_working_saturday = $new_instance[ 'homeland_working_saturday' ];
			$homeland_working_sunday = $new_instance[ 'homeland_working_sunday' ];

			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_working_monday'] = ( ! empty( $homeland_working_monday ) ) ? sanitize_text_field( $homeland_working_monday ) : '';
			$instance['homeland_working_tuesday'] = ( ! empty( $homeland_working_tuesday ) ) ? sanitize_text_field( $homeland_working_tuesday ) : '';
			$instance['homeland_working_wednesday'] = ( ! empty( $homeland_working_wednesday ) ) ? sanitize_text_field( $homeland_working_wednesday ) : '';
			$instance['homeland_working_thursday'] = ( ! empty( $homeland_working_thursday ) ) ? sanitize_text_field( $homeland_working_thursday ) : '';
			$instance['homeland_working_friday'] = ( ! empty( $homeland_working_friday ) ) ? sanitize_text_field( $homeland_working_friday ) : '';
			$instance['homeland_working_saturday'] = ( ! empty( $homeland_working_saturday ) ) ? sanitize_text_field( $homeland_working_saturday ) : '';
			$instance['homeland_working_sunday'] = ( ! empty( $homeland_working_sunday ) ) ? sanitize_text_field( $homeland_working_sunday ) : '';

			return $instance;				
		}
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_working_hours() {			
		register_widget( 'homeland_Widget_Working_Hours' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_working_hours' );
?>