<?php
	$homeland_all_agents = get_option( 'homeland_all_agents' );
	$homeland_property_excerpt = get_option( 'homeland_property_excerpt' );
	$homeland_preferred_size = get_option( 'homeland_preferred_size' );
	$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $wp_query->ID );
	$homeland_agent_link = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
	$homeland_property_status = get_the_terms ( $post->ID, 'homeland_property_status' );

	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url( 
			get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
		'sizes' => '(max-width: 568px) 100vw, 
			(max-width: 736px) 80vw, 
			(max-width: 768px) 60vw, 
			(max-width: 1024px) 30vw, 315px' 
	);
?>

<div id="post-<?php the_ID(); ?>" class="post-bottom-3em clearfix">
	<div class="post-col-5">
		<div class="property-mask property-image">
			<?php if( !empty( $post->homeland_featured ) ) : ?>
				<div class="featured-ribbon">
					<i class="fas fa-star" title="<?php esc_html_e( 'Featured', 'homeland' ); ?>"></i>
				</div>
			<?php endif; ?>

			<?php if ( post_password_required() ) : ?>
				<div class="password-protect-thumb"><i class="fas fa-lock fa-2x"></i></div>
			<?php else : ?>
				<figure class="pimage">
					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ) : 
								the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr ); 
							else : ?>
								<label class="no-image-fallback image-properties">
									<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
								</label><?php
							endif; 
						?>
					</a>
					<figcaption><a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a></figcaption>
					<?php
						if( !empty( $post->homeland_property_sold ) ) : ?>
							<h4 class="property-sold"><?php esc_html_e( 'Sold', 'homeland' ); ?></h4><?php
						else : 
							if( !empty( $homeland_property_status ) ) : ?>
								<h4>
									<?php if( !empty( $post->homeland_property_open_house ) ) : ?>
										<span class="property-open-house">
											<?php esc_html_e( 'Open House', 'homeland' ); ?>
										</span>
									<?php endif; ?>
									<?php foreach($homeland_property_status as $homeland_sterm) : ?>
										<span class="<?php echo esc_attr( $homeland_sterm->slug ); ?>">
											<?php echo esc_html( $homeland_sterm->name ); ?>
										</span>
									<?php endforeach; ?>
								</h4><?php
							endif; 
						endif;
						
						if( !empty( $post->homeland_contact_price ) ) : ?>
							<div class="property-price">
								<?php esc_html_e( 'Contact us for Price', 'homeland' ); ?>
							</div><?php
						else :
							if( !empty( $post->homeland_price ) ) : ?>
								<div class="property-price">
									<?php homeland_property_price_format(); ?>
								</div><?php
							endif;
						endif;
					?>	
				</figure>
			<?php endif; ?>
		</div>			
	</div>
	<div class="post-col-7">
		<div class="agent-property-desc">
			<div class="property-desc">
				<?php the_title( sprintf( '<h4><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				<label><?php echo esc_html( $post->homeland_address ); ?></label>
				<?php if( empty( $homeland_property_excerpt ) ) : the_excerpt(); endif; ?>	
			</div>
			<div class="property-info-agent post-bottom">
				<?php
					if( 'Floor Area' === $homeland_preferred_size ) :
						if(!empty( $post->homeland_floor_area )) : ?>
							<span><i class="fas fa-expand-arrows-alt"></i><?php echo esc_html( $post->homeland_floor_area ); echo "&nbsp;" . esc_html( $post->homeland_floor_area_unit ); ?></span><?php
						endif;
					else:
						if(!empty( $post->homeland_area )) : ?>
							<span><i class="fas fa-expand"></i><?php echo esc_html( $post->homeland_area ); echo "&nbsp;" . esc_html( $post->homeland_area_unit ); ?></span><?php
						endif;
					endif;
					
					if(!empty( $post->homeland_bedroom )) : ?>
						<span><i class="fas fa-bed"></i><?php printf( esc_html( _n( '%d Bedroom', '%d Bedrooms', $post->homeland_bedroom, 'homeland'  ) ), $post->homeland_bedroom ); ?></span><?php
					endif;

					if(!empty( $post->homeland_bathroom )) : ?>
						<span><i class="fas fa-bath"></i><?php printf( esc_html( _n( '%d Bathroom', '%d Bathrooms', $post->homeland_bathroom, 'homeland'  ) ), $post->homeland_bathroom ); ?></span><?php
					endif;

					if(!empty( $post->homeland_garage )) : ?>
						<span><i class="fas fa-car"></i><?php echo sprintf( __( '%d Garage', 'homeland' ), $post->homeland_garage ); ?></span><?php
					endif;
				?>
			</div>

			<?php if( empty( $homeland_all_agents ) ) : ?>
				<div class="agent-info">
					<a href="<?php echo esc_url( $homeland_agent_link ); ?>">
						<?php 
							if( !empty( $homeland_custom_avatar ) ) : 
								echo '<img src="'. esc_url( $homeland_custom_avatar ) .'" class="avatar" style="width:24px; height:24px;" />';
							else : echo get_avatar( get_the_author_meta( 'ID' ), 24 );
							endif; 
						?>
					</a>
					<label>
						<a href="<?php echo esc_url( $homeland_agent_link ); ?>" class="author-link"><?php the_author_meta( 'display_name' ); ?></a>
					</label>
				</div>
			<?php else : ?>
				<div class='agent-info'>&nbsp;</div>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" class="view-profile read-more-property">
				<?php echo homeland_option( 'homeland_property_button', esc_html__( 'View More Details', 'homeland' ) ); ?>
			</a>
		</div>
	</div>
</div>