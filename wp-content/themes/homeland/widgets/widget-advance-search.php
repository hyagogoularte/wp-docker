<?php
	/**
	 * Property Advance Search Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */

	class homeland_Widget_Property_Advance_Search extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-property-advance-search', 
				'description' => esc_html__( 'Custom widget for property advance search', 'homeland' )
			);	
			parent::__construct( 'AdvanceSearch', esc_html__( 'Homeland - Advance Search Property', 'homeland' ), $widget_ops );		
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
				<div class="advance-search-widget">
					<?php get_template_part( 'template-parts/component/advance-search-form' ); ?>
				</div><?php	

			echo wp_kses_post( $args['after_widget'] );
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {			
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
				 	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>
				<p>	
					<small><i><?php esc_html_e( 'Property Advance Search will automatically display', 'homeland' ); ?></i></small>	
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

			return $instance;
		}		

	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_property_advance_search() {			
		register_widget( 'homeland_Widget_Property_Advance_Search' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_property_advance_search' );
?>