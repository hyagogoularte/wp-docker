<?php
	/**
	 * Featured Property Widget
	 * @link https://codex.wordpress.org/Widgets_API
	 */

	class homeland_Widget_Featured_Properties extends WP_Widget {

		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {		
			$widget_ops = array(
				'classname' => 'homeland_widget-featured-properties', 
				'description' => esc_html__( 'Custom widget for featured properties', 'homeland' )
			);	
			parent::__construct( 'FeaturedProperties', esc_html__( 'Homeland - Featured Properties', 'homeland' ), $widget_ops );		
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

	 		$args_property = array( 
	 			'post_type' => 'homeland_properties', 
	 			'posts_per_page' => $instance[ 'property_limit' ], 
	 			'meta_query' => array( 
	 				'relation' => 'AND',
	 				array( 
		 				'key' => 'homeland_featured', 
		 				'value' => 'on', 
		 				'compare' => '==' 
		 			),
		 			array(
						'key' => 'homeland_property_sold',
						'value' => 'on', 
		 				'compare' => 'NOT EXISTS' 
					),
		 		) 
	 		);		
			query_posts( $args_property );				
			?>
				<div class="featured-flexslider grid cs-style-3">
					<ul class="slides">
						<?php while( have_posts() ) : the_post(); ?>
							<li>
								<figure class="pimage">
									<a href="<?php the_permalink(); ?>">
										<?php 
											$homeland_img_attr = array( 
												'srcset' => wp_get_attachment_image_url(
													get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
												'sizes' => '(max-width: 568px) 86vw, 
													(max-width: 736px) 70vw, 
													(max-width: 768px) 30vw, 
													(max-width: 1024px) 20vw, 205px' 
											);
											
											if ( has_post_thumbnail() ) : 
												the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr ); 
											else : ?>
												<div class="no-image textcenter"><?php esc_html_e( 'No Image', 'homeland' ); ?></div><?php
											endif; 
										?>
									</a>
									<figcaption><a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a></figcaption>
									<div class="property-desc-slide">
										<?php 
											the_title( '<h3>', '</h3>' );

											if( !empty( $post->homeland_price ) ) : ?>
												<span class="price"><?php homeland_property_price_format(); ?></span><?php
											endif;

											if( !empty( $post->homeland_property_sold ) ) : ?>
												<span style="color: #FF0000; text-transform: uppercase; float: right;">
													<?php esc_html_e( 'Sold', 'homeland' ); ?>
												</span><?php
											endif;
										?>
									</div>
								</figure>
							</li>
						<?php endwhile;	?>
					</ul>
				</div>						
			<?php
			wp_reset_query();
			echo wp_kses_post( $args['after_widget'] );			
		}
		
		/**
		 * Outputs the options form on admin
		 * @param  array $instance The widget options
		 */
		public function form( $instance ) {		
			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$property_limit = !empty( $instance['property_limit'] ) ? $instance['property_limit'] : '';	
			?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
						<?php esc_html_e( 'Title', 'homeland' ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
				</p>					
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'property_limit' ) ); ?>"><?php esc_html_e( 'Number of property to show:', 'homeland' ); ?>
					</label>
					<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'property_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'property_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $property_limit ); ?>" />
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
			$instance['property_limit'] = ( ! empty( $new_instance['property_limit'] ) ) ? sanitize_text_field( $new_instance['property_limit'] ) : '';	

			return $instance;				
		}
	}

	/**
	 * register theme widget
	 * @link https://codex.wordpress.org/Function_Reference/register_widget
	 */
	function homeland_widget_featured_properties() {			
		register_widget( 'homeland_Widget_Featured_Properties' );			
	}
	add_action( 'widgets_init', 'homeland_widget_featured_properties' );
?>