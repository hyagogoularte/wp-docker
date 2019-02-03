<?php
	/**
	 * Facebook Like Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */

	class homeland_Widget_Facebook_Like extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-facebook-like', 
				'description' => esc_html__( 'Custom widget for facebook like box', 'homeland' )
			);	
			parent::__construct( 'FacebookLikeBox', esc_html__( 'Homeland - Facebook Like Box', 'homeland' ), $widget_ops );	
		}

		/**
		 * Outputs the content of the widget
		 * @param  array $args
		 * @param  array $instance
		 */
		public function widget( $args, $instance ) {		
			if ( is_active_widget( false, false, $this->id_base, true ) ) :
				echo "<div id='fb-root'></div>";
				$homeland_custom_js = "(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=1292594560867565&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));";

				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
   		endif;	

			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) :
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
			endif;

			?>
			<div class="fb-page" data-href="<?php echo esc_url( $instance[ 'homeland_page_url' ] ); ?>" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo esc_url( $instance[ 'homeland_page_url' ] ); ?>" class="fb-xfbml-parse-ignore"></blockquote></div><?php
			echo wp_kses_post( $args['after_widget'] );			
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {		
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$homeland_page_url = !empty( $instance['homeland_page_url'] ) ? $instance['homeland_page_url'] : '';	
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_page_url' ) ); ?>"><?php esc_html_e( 'Facebook Page URL', 'homeland' ); ?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_page_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_page_url' ) ); ?>" value="<?php echo esc_url( $homeland_page_url ); ?>">
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
			$instance['homeland_page_url'] = ( ! empty( $new_instance['homeland_page_url'] ) ) ? sanitize_text_field( $new_instance['homeland_page_url'] ) : '';	

			return $instance;				
		}	
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_facebook_like() {			
		register_widget( 'homeland_Widget_Facebook_Like' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_facebook_like' );
?>