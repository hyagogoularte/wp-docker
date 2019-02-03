<?php 
	$homeland_property_status = get_the_terms ( $post->ID, 'homeland_property_status' );

	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url( 
			get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
		'sizes' => '(max-width: 568px) 100vw, 
			(max-width: 736px) 90vw, 
			(max-width: 768px) 30vw, 
			(max-width: 1024px) 26vw, 245px' 
	);
?>

<div id="post-<?php the_ID(); ?>" class="post-col-3 post-bottom">
	<div class="property-mask">
		<?php if( !empty( $post->homeland_featured ) ) : ?>
			<div class="featured-ribbon">
				<i class="fas fa-star" title="<?php esc_html_e( 'Featured', 'homeland' ); ?>"></i>
			</div>
		<?php endif; ?>

		<?php if ( post_password_required() ) : ?>
			<div class="password-protect-thumb password-4cols"><i class="fas fa-lock fa-2x"></i></div>
		<?php	else : ?>
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
				<figcaption>
					<a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a>
				</figcaption>
				<?php
					if( !empty( $post->homeland_property_sold ) ) :
						echo "<h4 class='property-sold'>". esc_html__( 'Sold', 'homeland' ) ."</h4>";
					else : 
						if( !empty( $homeland_property_status ) ) : ?>
							<h4>
								<?php if( !empty( $post->homeland_property_open_house ) ) : ?>
									<span class="property-open-house">
										<?php esc_html_e( 'Open House', 'homeland' ); ?>
									</span>
								<?php endif; ?>
								<?php foreach( $homeland_property_status as $homeland_sterm ) : ?>
									<span class="<?php echo esc_attr( $homeland_sterm->slug ); ?>">
										<?php echo esc_html( $homeland_sterm->name ); ?>
									</span>
								<?php endforeach; ?>
							</h4><?php
						endif;
					endif;
				?>						
			</figure>
		<?php endif; ?>			
	</div>
	<div class="property-desc">
		<?php the_title( sprintf( '<h4><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>	
		<h5><?php echo esc_html( $post->homeland_address ); ?></h5>
		<ul class="pinfo clearfix">
			<?php
				if( !empty( $post->homeland_floor_area ) ) : ?>
					<li>
						<?php esc_html_e( 'Floor Area', 'homeland' ); ?>
						<span><?php echo esc_html( $post->homeland_floor_area ); echo "&nbsp;" . esc_html( $post->homeland_floor_area_unit ); ?></span>
					</li><?php
				endif;
				if( !empty( $post->homeland_area ) ) : ?>
					<li>
						<?php esc_html_e( 'Lot Area', 'homeland' ); ?>
						<span><?php echo esc_html( $post->homeland_area ); echo "&nbsp;" . esc_html( $post->homeland_area_unit ); ?></span>
					</li><?php
				endif;
				if( !empty( $post->homeland_bedroom ) ) : ?>
					<li>
						<?php esc_html_e( 'Bedrooms', 'homeland' ); ?>
						<span><?php echo esc_html( $post->homeland_bedroom ); ?></span>
					</li><?php
				endif;
				if( !empty( $post->homeland_bathroom ) ) : ?>
					<li>
						<?php esc_html_e( 'Bathrooms', 'homeland' ); ?>
						<span><?php echo esc_html( $post->homeland_bathroom ); ?></span>
					</li><?php
				endif;
			?>
		</ul>
				
		<?php if( !empty( $post->homeland_contact_price ) ) : ?>
			<span class="price">
				<?php esc_html_e( 'Contact us for Price', 'homeland' ); ?>
			</span>
		<?php 
			else :
				if( !empty( $post->homeland_price ) ) : ?>
					<span class="price"><?php homeland_property_price_format(); ?></span><?php 
				endif; 
			endif;
		?>

		<span class="view-details">
			<a href="<?php the_permalink(); ?>">
				<?php 
					echo homeland_option( 'homeland_property_button', esc_html__( 'View More Details', 'homeland' ) );
				?>
			</a>
		</span>
	</div>	
</div>