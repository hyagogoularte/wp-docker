<?php 
	$homeland_hide_properties_details = get_option( 'homeland_hide_properties_details' );

	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url(
			get_post_thumbnail_id(), 'homeland_bigger_image' ) .' 1200w',
		'sizes' => '(max-width: 568px) 90vw, 
			(max-width: 736px) 80vw, 
			(max-width: 768px) 90vw, 
			(max-width: 1024px) 91vw, 1080px' 
	);
?>

<li id="post-<?php the_ID(); ?>">
	<div class="slide-image">
		<?php 
			if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'homeland_bigger_image', $homeland_img_attr ); 
			else : ?>
				<label class="no-image-fallback image-portfolio no-image-slider">
					<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
				</label><?php
			endif; 
		?>
	</div>
	<?php if( empty( $homeland_hide_properties_details ) ) : ?>
		<div class="slide-bottom clearfix">
			<div class="slide-bottom-title post-col-7">
				<?php 
					the_title( '<h2>', '</h2>' ); 
					if( !empty( $post->homeland_address ) ) :
						echo "<h4><i class='fas fa-map-marker-alt'></i>" . esc_html( $post->homeland_address ) . "</h4>";
					endif;
				?>
			</div>	
			<div class="slide-bottom-actions post-col-5 textright">
				<?php if( !empty( $post->homeland_contact_price ) ) : ?>
					<span class="slide-price"><?php esc_html_e( 'Contact us for Price', 'homeland' ); ?></span><?php
					else : 
						if( !empty( $post->homeland_price ) ) : ?>
							<span class="slide-price">
								<?php homeland_property_price_format(); ?>
							</span><?php 
						endif; 
					endif;
				?>

				<?php if( !empty( $post->homeland_property_open_house ) ) : ?>
					<span class="property-sold-slide">
						<?php esc_html_e( 'Open House', 'homeland' ); ?>
					</span>
				<?php endif; ?>

				<?php if( !empty( $post->homeland_property_sold ) ) : ?>
					<span class="property-sold-slide">
						<?php esc_html_e( 'Sold', 'homeland' ); ?>
					</span>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>" class="slide-more">
					<?php 
						echo homeland_option( 'homeland_slider_button', esc_html__( 'More Details', 'homeland' ) );
					?>
				</a>
			</div>
		</div>
	<?php endif; ?>
</li>