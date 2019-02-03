<?php
	/**
	 * Property Type Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */
	
	class homeland_Widget_Property_Category extends WP_Widget {
		
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-property-categories', 
				'description' => esc_html__( 'Custom widget for property type', 'homeland' )
			);	
			parent::__construct( 'PropertyType', esc_html__( 'Homeland - Search By Type', 'homeland' ), $widget_ops );
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
				<?php
					global $homeland_advance_search_page_url;
					
					$args_type = array( 
						'taxonomy' => 'homeland_property_type', 
						'hierarchical' => 1, 
						'hide_empty' => 0,
						'order' => 'ASC', 
						'orderby' => 'title',
						'pad_counts' => true,
						'number' => $instance[ 'homeland_posts_limit' ]
					);		
					$homeland_type = get_categories( $args_type );						
				  	
			  	foreach( $homeland_type as $homeland_category ) :
			  		echo '<li><a href="' . esc_url( $homeland_advance_search_page_url ) . '?type='. $homeland_category->slug . '" title="' . sprintf( esc_html__( 'View all posts in %s', 'homeland' ), $homeland_category->name ) . '" ' . '>'. $homeland_category->name .'</a>&nbsp;('. $homeland_category->count .')</li>';
			  	endforeach;
				?>
			</ul><?php
			echo wp_kses_post( $args['after_widget'] );							
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form($instance) {				
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
					<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>"><?php esc_html_e( 'Number of property type to show:', 'homeland' ); ?>
					</label>
					<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_posts_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $homeland_posts_limit ); ?>" />
				</p>
				<p>	
					<small><i><?php esc_html_e( 'Property Type will automatically display', 'homeland' ); ?></i></small>	
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
			$instance['homeland_posts_limit'] = ( ! empty( $new_instance['homeland_posts_limit'] ) ) ? sanitize_text_field( $new_instance['homeland_posts_limit'] ) : '';	

			return $instance;				
		}
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_property_category() {			
		register_widget( 'homeland_Widget_Property_Category' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_property_category' );
?>