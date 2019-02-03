<?php
	$homeland_album_order = get_option( 'homeland_album_order' );
	$homeland_album_orderby = get_option( 'homeland_album_orderby' );
	$homeland_featured_property_limit = get_option( 'homeland_featured_property_limit' );
	$homeland_preferred_size = get_option( 'homeland_preferred_size' ); 
?>
<div class="featured-block">
	<h3>
		<span><?php echo homeland_option( 'homeland_featured_property_header', esc_html__( 'Featured Property', 'homeland' ) ); ?></span>
	</h3>
	<?php
		$args = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => $homeland_album_orderby, 
			'order' => $homeland_album_order, 
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
				<?php
					while( $wp_query->have_posts() ) : $wp_query->the_post(); 
						$homeland_property_status = get_the_terms ( $post->ID, 'homeland_property_status' );
						?>
						<div id="post-<?php the_ID(); ?>" class="row post-bottom featured-list clearfix">
							<?php if ( post_password_required() ) : ?>
								<div class="password-protect-thumb featured-pass-thumb">
									<i class="fas fa-lock fa-2x"></i>
								</div>
							<?php else : ?>
								<div class="post-col-6">
									<figure class="feat-thumb">
										<a href="<?php the_permalink(); ?>">
											<?php 
												$homeland_img_attr = array( 
													'srcset' => wp_get_attachment_image_url(
														get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
													'sizes' => '(max-width: 568px) 50vw, 
														(max-width: 736px) 40vw, 
														(max-width: 768px) 30vw, 
														(max-width: 1024px) 20vw, 153px' 
												);
												if ( has_post_thumbnail() ) : 
													the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr );
												else : ?>
													<div class="no-image textcenter"><?php esc_html_e( 'No Image', 'homeland' ); ?></div><?php
												endif; 
											?>
										</a>
										<figcaption>
											<a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a>
										</figcaption>
										<?php if( !empty( $post->homeland_property_sold ) ) : ?>
											<h4 class="property-sold"><?php esc_html_e( 'Sold', 'homeland' ); ?></h4>
										<?php else : ?>
											<?php if( !empty( $homeland_property_status ) ) : ?>
												<h4>
													<?php 
														foreach( $homeland_property_status as $homeland_sterm ) : ?>
														<span class="<?php echo esc_attr( $homeland_sterm->slug ); ?>"><?php echo esc_html( $homeland_sterm->name ); ?></span>
													<?php endforeach; ?>
												</h4>
											<?php endif; ?> 
										<?php endif; ?>	
									</figure>
								</div>
							<?php	endif; ?>
							
							<div class="post-col-6">
								<div class="feat-desc">
									<?php 
										the_title( sprintf( '<h5><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' );
									?>
									<span>
										<?php 
											if( 'Floor Area' === $homeland_preferred_size ) :
												if(!empty( $post->homeland_floor_area )) :
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
											
									<?php if( !empty( $post->homeland_contact_price ) ) : ?>
										<span class="price"><?php esc_html_e( 'Contact us for Price', 'homeland' ); ?></span><?php
										else :
											if( !empty( $post->homeland_price ) ) : ?>
												<span class="price">
													<?php homeland_property_price_format(); ?>
												</span><?php 
											endif; 
										endif;
									?>

									<?php if( !empty( $post->homeland_property_open_house ) ) : ?>
										<span class="property-open-house">
											<?php esc_html_e( 'Open House', 'homeland' ); ?>
										</span>
									<?php endif; ?>
								</div>
							</div>

						</div><?php
					endwhile;
				?>	
			</div><?php
		endif;
	?>
</div>