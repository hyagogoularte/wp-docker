<?php
	$homeland_property_static_image = get_option( 'homeland_property_static_image' );
	$homeland_attachment_order = get_option( 'homeland_attachment_order' );
	$homeland_attachment_orderby = get_option( 'homeland_attachment_orderby' );
	$homeland_single_property_layout = get_option( 'homeland_single_property_layout' );
	$homeland_properties_thumb_slider = get_option( 'homeland_properties_thumb_slider' );

	$homeland_thumb_id = get_post_thumbnail_id( get_the_ID() );
	$homeland_himage_value = attachment_url_to_postid( $post->homeland_property_hdimage );
	$homeland_bimage_value = attachment_url_to_postid( $post->homeland_property_bgimage );
	$homeland_feature_image_caption = get_post( get_post_thumbnail_id())->post_excerpt;
	$homeland_featured_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');

	$homeland_thumb_id_value = !empty( $homeland_properties_thumb_slider ) ? $homeland_thumb_id : '0';
	$homeland_property_static_class = !empty( $homeland_property_static_image ) ? 'property-static-images' : 'properties-flexslider flex-loading';

	$args = array( 
		'post_type' => 'attachment', 
		'post_mime_type' =>'image',
		'numberposts' => -1, 
		'order' => $homeland_attachment_order, 
		'orderby' => $homeland_attachment_orderby, 
		'post_status' => null, 
		'post_parent' => $post->ID, 
		'exclude' => array( 
			$homeland_thumb_id_value, 
			$homeland_himage_value, 
			$homeland_bimage_value 
		)
	);
	$homeland_attachments = get_posts( $args );

	if( shortcode_exists("rev_slider") && !empty( $post->homeland_rev_slider ) ) : 
		echo(do_shortcode('[rev_slider '.$post->homeland_rev_slider.']'));
	else : ?>
		<div class="<?php echo esc_attr( $homeland_property_static_class ); ?>">
			<?php if( !empty( $post->homeland_featured ) ) : ?>
				<div class="featured-ribbon">
					<i class="fas fa-star" title="<?php esc_html_e( 'Featured', 'homeland' ); ?>"></i>
				</div>
			<?php endif; ?>

			<ul class="slides">
				<?php
					if ( $homeland_attachments ) :
						foreach ( $homeland_attachments as $homeland_attachment ) :
							$homeland_attachment_id = $homeland_attachment->ID;
							$homeland_attachment_caption = $homeland_attachment->post_excerpt;
							$homeland_large_image_url = wp_get_attachment_image_src( $homeland_attachment_id, 'homeland_bigger_image' ); 

							if( 'Right Sidebar' === $homeland_single_property_layout || 'Left Sidebar' === $homeland_single_property_layout ) :
									$homeland_img_attr = array( 
										'srcset' => wp_get_attachment_image_url( 
											$homeland_attachment_id, 'homeland_bigger_image' ) .' 1200w',
										'sizes' => '(max-width: 568px) 100vw, 
											(max-width: 736px) 80vw, 
											(max-width: 768px) 60vw, 
											(max-width: 1024px) 70vw, 795px' 
									);
								else :
									$homeland_img_attr = array( 
										'srcset' => wp_get_attachment_image_url( 
											$homeland_attachment_id, 'homeland_bigger_image' ) .' 1200w',
										'sizes' => '(max-width: 568px) 100vw, 
											(max-width: 736px) 80vw, 
											(max-width: 768px) 90vw, 
											(max-width: 1024px) 96vw, 1070px' 
									);
								endif;
							?>
							<li>
								<a href="<?php echo esc_url( $homeland_large_image_url[0] ); ?>" title="<?php echo esc_html( $homeland_attachment_caption ); ?>" class="large-image-popup">
									<?php 
										echo wp_get_attachment_image( $homeland_attachment_id, 'homeland_bigger_image', '', $homeland_img_attr ); 
									?>
								</a>
								<?php if( !empty( $homeland_attachment_caption ) ) : ?>
									<span class="flex-caption"><?php echo esc_html( $homeland_attachment_caption ); ?></span>
								<?php endif; ?>
							</li><?php	
						endforeach;
					else :
						if ( has_post_thumbnail() ) : ?>
							<li>
								<a href="<?php echo esc_url( $homeland_featured_img_url[0]); ?>" title="<?php echo esc_html( $homeland_feature_image_caption ); ?>" class="large-image-popup"><?php the_post_thumbnail( 'homeland_bigger_image', $homeland_img_attr ); ?></a>
							</li><?php
						endif;
					endif; 
				?>
			</ul>	
		</div>

		<?php if( empty( $post->homeland_thumbnails ) && empty( $homeland_property_static_image ) ) : ?>
			<div id="carousel-flex" class="properties-flexslider">
				<ul class="slides">
					<?php
						if ( $homeland_attachments ) :						
							foreach ( $homeland_attachments as $homeland_attachment ): ?>
								<li>
									<?php 
										echo wp_get_attachment_image( $homeland_attachment->ID, array( 153, 153 ) ); 
									?>
								</li><?php
							endforeach;
						else :
							if ( has_post_thumbnail() ) : ?>
								<li><?php the_post_thumbnail( array( 153, 153 ) ); ?></li><?php
							endif;
						endif;
					?>		
				</ul>
			</div><?php
		endif;
	endif;
?>