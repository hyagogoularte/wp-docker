<?php 
	$homeland_portfolio_attachment_order = get_option( 'homeland_portfolio_attachment_order' );
	$homeland_portfolio_attachment_orderby = get_option( 'homeland_portfolio_attachment_orderby' );
	$homeland_portfolio_static_image = get_option( 'homeland_portfolio_static_image' );
	$homeland_single_portfolio_layout = get_option( 'homeland_single_portfolio_layout' );

	$homeland_large_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	$homeland_himage_value = attachment_url_to_postid( $post->homeland_portfolio_hdimage );
	$homeland_bimage_value = attachment_url_to_postid( $post->homeland_portfolio_bgimage );

	$homeland_portfolio_slider_class = !empty( $homeland_portfolio_static_image ) ? 'portfolio-static-images' : 'portfolio-flexslider post-bottom';
?>
<div class="portfolio-image">
	<?php 
		if( shortcode_exists("rev_slider") && !empty( $post->homeland_rev_slider ) ) : 
			echo( do_shortcode('[rev_slider '. $post->homeland_rev_slider. ']') );
		else : ?>
			<div class="<?php echo esc_attr( $homeland_portfolio_slider_class ); ?>">
				<ul class="slides">
					<?php
						$args = array( 
							'post_type' => 'attachment', 
							'numberposts' => -1, 
							'order' => $homeland_portfolio_attachment_order, 
							'orderby' => $homeland_portfolio_attachment_orderby, 
							'post_status' => null, 
							'post_parent' => $post->ID,
							'exclude' => array( 
								$homeland_himage_value, 
								$homeland_bimage_value 
							)
						);
						$homeland_attachments = get_posts( $args );

						if ( $homeland_attachments ) :								
							foreach ( $homeland_attachments as $homeland_attachment ) :
								$homeland_attachment_id = $homeland_attachment->ID;
								$homeland_attachment_caption = $homeland_attachment->post_excerpt;
								$homeland_large_image_url = wp_get_attachment_image_src( $homeland_attachment_id, 'homeland_bigger_image' ); 

								if( 'Right Sidebar' === $homeland_single_portfolio_layout || 'Left Sidebar' === $homeland_single_portfolio_layout ) :
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
								endif; ?>
								<li class="post-bottom">
									<a href="<?php echo esc_url( $homeland_large_image_url[0] ); ?>" title="<?php echo esc_html( $homeland_attachment_caption ); ?>" class="large-image-popup">
										<?php
											echo wp_get_attachment_image( $homeland_attachment->ID, 'homeland_bigger_image', '', $homeland_img_attr );
										?>
									</a>
								</li><?php	
							endforeach;
						else : ?>
							<li>
								<a href="<?php echo esc_url( $homeland_large_featured_image_url[0] ); ?>" class="large-image-popup">
									<?php 
										if ( has_post_thumbnail() ) : 
											the_post_thumbnail( 'homeland_bigger_image', $homeland_img_attr ); 
										endif; 
									?>
								</a>
							</li><?php
						endif;			
					?>
				</ul>
			</div><?php
		endif;											
	?>				
</div>