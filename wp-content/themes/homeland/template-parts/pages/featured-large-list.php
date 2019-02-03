<?php
	$homeland_property_order = get_option( 'homeland_property_order' );
	$homeland_property_orderby = get_option( 'homeland_property_orderby' );
	$homeland_featured_property_limit = get_option( 'homeland_featured_property_limit' );
	$homeland_preferred_size = get_option( 'homeland_preferred_size' ); 
?>
<div class="featured-block-two-cols clearfix">
	<h3>
		<span><?php echo homeland_option( 'homeland_featured_property_header', esc_html__( 'Featured Property', 'homeland' ) ); ?></span>
	</h3>
	<?php
		$args = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => $homeland_property_orderby, 
			'order' => $homeland_property_order, 
			'posts_per_page' => $homeland_featured_property_limit, 
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
		$wp_query = new WP_Query( $args );

		if( $wp_query->have_posts() ) : ?>
			<div class="grid cs-style-3">	
				<div class="row clearfix">
					<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div id="post-<?php the_ID(); ?>" class="post-col-4 post-col-no-rmargin post-bottom">
							<?php if ( post_password_required() ) : ?>
								<div class="password-protect-thumb featured-pass-thumb">
									<i class="fas fa-lock fa-2x"></i>
								</div>
							<?php	else : ?>
								<figure class="feat-medium">
									<a href="<?php the_permalink(); ?>">
										<?php 
											if ( has_post_thumbnail() ) : 
												the_post_thumbnail( 'homeland_property_medium' );
											else : ?>
												<div class="no-image textcenter"><?php esc_html_e( 'No Image', 'homeland' ); ?></div><?php
											endif; 
										?>
									</a>
									<figcaption>
										<a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a>
									</figcaption>
								</figure>
							<?php	endif; ?>
							<div class="feat-desc">
								<?php 
									the_title( sprintf( '<h5><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' );
								?>
								<span>
									<?php 
										if( 'Floor Area' === $homeland_preferred_size ) :
											if( !empty( $post->homeland_floor_area ) ) :
												echo esc_html( $post->homeland_floor_area ) . "&nbsp;" . esc_html( $post->homeland_floor_area_unit ) . ", "; 
											endif;
										else :
											if( !empty( $post->homeland_area ) ) :
												echo esc_html( $post->homeland_area ) . "&nbsp;" . esc_html( $post->homeland_area_unit ) . ", "; 
											endif;
										endif;
										if( !empty( $post->homeland_bedroom ) ) :
											printf( esc_html( _n( '%d Bedroom', '%d Bedrooms', esc_html( $post->homeland_bedroom ), 'homeland'  ) ), esc_html( $post->homeland_bedroom ) );
											echo ", "; 
										endif;
										if( !empty( $post->homeland_bathroom ) ) :
											printf( esc_html( _n( '%d Bathroom', '%d Bathrooms', esc_html( $post->homeland_bathroom ), 'homeland'  ) ), esc_html( $post->homeland_bathroom ) );
											echo ", "; 
										endif;
										if( !empty( $post->homeland_garage ) ) :
											printf( esc_html( _n( '%d Garage', '%d Garages', esc_html( $post->homeland_garage ), 'homeland'  ) ), esc_html( $post->homeland_garage ) );
										endif;
									?>
								</span>
								<?php 
									if( !empty( $post->homeland_price ) ) : ?>
										<span class="price"><?php homeland_property_price_format(); ?></span><?php
									endif; 

									if( !empty( $post->homeland_property_open_house ) ) : ?>
										<div class="property-sold">
											<span><?php esc_html_e( 'Open House', 'homeland' ); ?></span>
										</div><?php 
									endif;

									if( !empty( $post->homeland_property_sold ) ) : ?>
										<div class="property-sold">
											<span><?php esc_html_e( 'Sold', 'homeland' ); ?></span>
										</div><?php 
									endif;
								?>
							</div>
						</div>
					<?php endwhile; ?>							
				</div>
			</div><?php
		endif;
	?>
</div>