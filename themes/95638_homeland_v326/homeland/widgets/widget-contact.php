<?php
	/**
	 * Contact Info Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */

	class homeland_Widget_Contact extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {			
			$widget_ops = array(
				'classname' => 'homeland_widget-contact-info', 
				'description' => esc_html__( 'Custom widget for contact information', 'homeland' )
			);	
			parent::__construct( 'Contact', esc_html__( 'Homeland - Contact Information', 'homeland' ), $widget_ops );
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

			$homeland_contact_address = $instance[ 'homeland_contact_address' ];
			$homeland_contact_phone = $instance[ 'homeland_contact_phone' ];
			$homeland_contact_email = $instance[ 'homeland_contact_email' ];
			$homeland_contact_website = $instance[ 'homeland_contact_website' ];

			?>
				<ul>
					<?php if( !empty( $homeland_contact_address ) ) : ?>
						<li><i class="fas fa-map-marker-alt"></i>
							<label><?php echo wp_kses_post( $homeland_contact_address ); ?></label>
						</li>
					<?php endif; ?>

					<?php if( !empty( $homeland_contact_phone ) ) : ?>
						<li><i class="fas fa-phone"></i>
							<label><?php echo esc_html( $homeland_contact_phone ); ?></label>
						</li>
					<?php endif; ?>

					<?php if( !empty( $homeland_contact_email ) ) : ?>
						<li><i class="far fa-envelope"></i>
							<label>
								<a href="mailto:<?php echo is_email( $homeland_contact_email ); ?>"><?php echo is_email( $homeland_contact_email ); ?></a>
							</label>
						</li>
					<?php endif; ?>

					<?php if( !empty( $homeland_contact_website ) ) : ?>
						<li><i class="fas fa-laptop"></i>
							<label>
								<a href="<?php echo esc_url( $homeland_contact_website ); ?>" target="_blank"><?php echo esc_url( $homeland_contact_website ); ?></a>
							</label>
						</li>
					<?php endif; ?>
				</ul><?php
			
			echo wp_kses_post( $args['after_widget'] );		
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {			
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_contact_address = !empty( $instance['homeland_contact_address'] ) ? $instance['homeland_contact_address'] : '';			
			$homeland_contact_phone = !empty( $instance['homeland_contact_phone'] ) ? $instance['homeland_contact_phone'] : '';			
			$homeland_contact_email = !empty( $instance['homeland_contact_email'] ) ? $instance['homeland_contact_email'] : '';			
			$homeland_contact_website = !empty( $instance['homeland_contact_website'] ) ? $instance['homeland_contact_website'] : '';			
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_html_e( 'Title', 'homeland' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_address' ) ); ?>">
					<?php esc_html_e( 'Address', 'homeland' ); ?>
				</label>
				<textarea class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_contact_address' ) ); ?>"><?php echo esc_html( $homeland_contact_address ); ?></textarea>
			</p>	
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_phone' ) ); ?>">
					<?php esc_html_e( 'Phone', 'homeland' ); ?>
				</label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_contact_phone' ) ); ?>" value="<?php echo esc_html( $homeland_contact_phone ); ?>">		
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_email' ) ); ?>">
					<?php esc_html_e( 'Email', 'homeland' ); ?>
				</label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_contact_email' ) ); ?>" value="<?php echo esc_html( $homeland_contact_email ); ?>">		
			</p>			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_website' ) ); ?>">
					<?php esc_html_e( 'Website', 'homeland' ); ?>
				</label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_contact_website' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_contact_website' ) ); ?>" value="<?php echo esc_url( $homeland_contact_website ); ?>">		
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
			$homeland_contact_address = $new_instance[ 'homeland_contact_address' ];
			$homeland_contact_phone = $new_instance[ 'homeland_contact_phone' ];
			$homeland_contact_email = $new_instance[ 'homeland_contact_email' ];
			$homeland_contact_website = $new_instance[ 'homeland_contact_website' ];

			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_contact_address'] = ( ! empty( $homeland_contact_address ) ) ? sanitize_text_field( $homeland_contact_address ) : '';	
			$instance['homeland_contact_phone'] = ( ! empty( $homeland_contact_phone ) ) ? sanitize_text_field( $homeland_contact_phone ) : '';	
			$instance['homeland_contact_email'] = ( ! empty( $homeland_contact_email ) ) ? sanitize_text_field( $homeland_contact_email ) : '';	
			$instance['homeland_contact_website'] = ( ! empty( $homeland_contact_website ) ) ? sanitize_text_field( $homeland_contact_website ) : '';	

			return $instance;			
		}	
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_contact() {			
		register_widget( 'homeland_Widget_Contact' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_contact' );
?>