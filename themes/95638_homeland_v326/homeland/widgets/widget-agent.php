<?php	
	/**
	 * Agent Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */

	class homeland_Widget_Agents extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-agents', 
				'description' => esc_html__( 'Custom widget for agents', 'homeland' )
			);	
			parent::__construct( 'Agents', esc_html__( 'Homeland - Agents', 'homeland' ), $widget_ops );		
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

			$homeland_agent_order = get_option( 'homeland_agent_order' );
			$homeland_agent_orderby = get_option( 'homeland_agent_orderby' );

			?>	
				<ul>
					<?php
						$args_agent = array( 
							'role' => 'contributor', 
							'order' => $homeland_agent_order, 
							'orderby' => $homeland_agent_orderby, 
							'number' => $instance[ 'homeland_posts_limit' ],
						);
					  $homeland_agents = new WP_User_Query( $args_agent );

					  if( !empty( $homeland_agents->results ) ) :
							foreach ( $homeland_agents->results as $homeland_user ) :
						    global $wpdb;

								$homeland_post_author = $homeland_user->ID;
								$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $homeland_post_author );
								
								$homeland_count = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'homeland_properties' AND post_status = 'publish' AND post_author = %d", $homeland_post_author ) );
						        ?>
						    	<li class="clearfix">
						    		<a href="<?php echo esc_url( get_author_posts_url( $homeland_post_author ) ); ?>">
						    			<?php 
			    							if( !empty( $homeland_custom_avatar ) ) : 
			    								echo '<img src="'. esc_url( $homeland_custom_avatar ) .'" class="avatar" style="width:60px; height:60px;" />';
				    						else : echo get_avatar( $homeland_post_author, 60 );
				    						endif;
			    						?>
						    		</a>
						    		<h4>
						    			<a href="<?php echo esc_url( get_author_posts_url( $homeland_post_author ) ); ?>">
						    				<?php echo esc_html( $homeland_user->display_name ); ?>
						    			</a>
						    		</h4>
						    		<label>
						    			<span>
						    				<?php 
						    					printf( esc_html( _n( '%d Property', '%d Properties', $homeland_count, 'homeland' ) ), $homeland_count ); 
						    				?>
						    			</span>
						    		</label>
						    	</li><?php
						   endforeach;
						else : 
							esc_html_e( 'No Agents found!', 'homeland' );
						endif;
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>"><?php esc_html_e( 'Number of agents to show:', 'homeland' ); ?>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'homeland_posts_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'homeland_posts_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $homeland_posts_limit ); ?>" />
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
			$instance['homeland_posts_limit'] = ( ! empty( $new_instance['homeland_posts_limit'] ) ) ? sanitize_text_field( $new_instance['homeland_posts_limit'] ) : '';	

			return $instance;				
		}		
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widgets_agents() {			
		register_widget( 'homeland_Widget_Agents' );			
	}
	add_action( 'widgets_init', 'homeland_widgets_agents' );
?>