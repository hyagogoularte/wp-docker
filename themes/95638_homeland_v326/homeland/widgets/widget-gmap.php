<?php
	/**
	 * Google Map Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_GMap extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-gmap', 
				'description' => esc_html__( 'Custom widget for google map', 'homeland' )
			);	
			parent::__construct( 'GoogleMap', esc_html__( 'Homeland - Google Map', 'homeland' ), $widget_ops );	
		}
		
		/**
		 * Outputs the content of the widget
		 * @param  array $args
		 * @param  array $instance
		 */
		public function widget($args, $instance) {		
			if ( is_active_widget( false, false, $this->id_base, true ) ) :
				wp_register_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key='. get_option( 'homeland_map_api' ) .'&libraries=geometry' );
				wp_register_script( 'google-map', get_theme_file_uri( '/assets/js/gmaps.min.js' ) );
				wp_enqueue_script( 'google-map-api' );
				wp_enqueue_script( 'google-map' );	
   		endif;	

			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) :
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
			endif;

			$homeland_home_map_icon = get_option( 'homeland_map_pointer_icon' );
			$homeland_map_styles = strip_tags( get_option( 'homeland_map_styles' ) );
			$homeland_map_styles_value = ( !empty( $homeland_map_styles ) ) ? $homeland_map_styles : "";

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '' );

			$homeland_custom_js = "(function($) {
				'use strict'; 
				var map;
		  	
		   	$(document).ready(function(){
		    	map = new GMaps({
		        div: '#wgmap',
		        scrollwheel: false,
			      lat: " . esc_html( $instance[ 'homeland_map_lat' ] ) . ",
						lng: " . esc_html( $instance[ 'homeland_map_lng' ] ) . ",
						zoom: " . esc_html( $instance[ 'homeland_map_zoom' ] ) . ",
						styles : " . wp_kses_post( $homeland_map_styles_value ) . ",
		      });
		    	var image = '" . esc_url( $homeland_home_map_icon ) . "';	
	      	map.addMarker({
	        	lat: " . esc_html( $instance[ 'homeland_map_lat' ] ) . ",
						lng: " . esc_html( $instance[ 'homeland_map_lng' ] ) . ",
	        	title: '',
	        	icon: image,
	        	infoWindow: { content: '" . wp_kses_post( $instance[ 'homeland_map_address' ] ) . "' }
	      	});
					google.maps.event.trigger(map.markers[0], 'click');
		   	});
			})(jQuery);";
			wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js ); 
			?>	
			<div id="wgmap">&nbsp;</div><?php
			echo wp_kses_post( $args['after_widget'] );								
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {				
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_map_lat = !empty( $instance['homeland_map_lat'] ) ? $instance['homeland_map_lat'] : '';	
			$homeland_map_lng = !empty( $instance['homeland_map_lng'] ) ? $instance['homeland_map_lng'] : '';	
			$homeland_map_zoom = !empty( $instance['homeland_map_zoom'] ) ? $instance['homeland_map_zoom'] : '';	
			$homeland_map_address = !empty( $instance['homeland_map_address'] ) ? $instance['homeland_map_address'] : '';	
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>					
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_map_lat' ) ); ?>">
						<?php esc_html_e( 'Latitude', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_map_lat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_map_lat' ) ); ?>" value="<?php echo esc_html( $homeland_map_lat ); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_map_lng' ) ); ?>">
						<?php esc_html_e( 'Longitude', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_map_lng' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_map_lng' ) ); ?>" value="<?php echo esc_html( $homeland_map_lng ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_map_address' ) ); ?>">
						<?php esc_html_e( 'Address', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_map_address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_map_address' ) ); ?>" value="<?php echo esc_html( $homeland_map_address ); ?>">
				</p>	
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_map_zoom' ) ); ?>">
						<?php esc_html_e( 'Zoom', 'homeland' ); ?>
					</label>
					<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_map_zoom' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_map_zoom' ) ); ?>" value="<?php echo esc_html( $homeland_map_zoom ); ?>">
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
			$homeland_map_lat = $new_instance[ 'homeland_map_lat' ];
			$homeland_map_lng = $new_instance[ 'homeland_map_lng' ];
			$homeland_map_zoom = $new_instance[ 'homeland_map_zoom' ];
			$homeland_map_address = $new_instance[ 'homeland_map_address' ];

			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';	
			$instance['homeland_map_lat'] = ( ! empty( $homeland_map_lat ) ) ? sanitize_text_field( $homeland_map_lat ) : '';	
			$instance['homeland_map_lng'] = ( ! empty( $homeland_map_lng ) ) ? sanitize_text_field( $homeland_map_lng ) : '';	
			$instance['homeland_map_zoom'] = ( ! empty( $homeland_map_zoom ) ) ? sanitize_text_field( $homeland_map_zoom ) : '';	
			$instance['homeland_map_address'] = ( ! empty( $homeland_map_address ) ) ? sanitize_text_field( $homeland_map_address ) : '';	

			return $instance;						
		}
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_Widget_gmap() {			
		register_widget( 'homeland_Widget_GMap' );			
	}
	add_action( 'widgets_init', 'homeland_Widget_gmap' );
?>