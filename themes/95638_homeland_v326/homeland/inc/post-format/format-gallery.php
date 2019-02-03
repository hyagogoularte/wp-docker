<?php
	$homeland_blog_attachment_order = get_option('homeland_blog_attachment_order' );
	$homeland_blog_attachment_orderby = get_option('homeland_blog_attachment_orderby' );
	$homeland_blog_thumb_slider = get_option('homeland_blog_thumb_slider' );
	$homeland_single_blog_layout = get_option('homeland_single_blog_layout' );

	$homeland_thumb_id = get_post_thumbnail_id( get_the_ID() );
	$homeland_blog_thumb_slider_exclude = empty( $homeland_blog_thumb_slider ) ? '0' : $homeland_thumb_id;

	if( shortcode_exists("rev_slider") && !empty( $post->homeland_rev_slider ) ) : 
		echo( do_shortcode( '[rev_slider '. $post->homeland_rev_slider .']' ) );
	else : ?>
		<div class="blog-flexslider flex-loading">
			<ul class="slides">
				<?php
					$args = array( 
						'post_type' => 'attachment', 
						'numberposts' => -1, 
						'order' => $homeland_blog_attachment_order, 
						'orderby' => $homeland_blog_attachment_orderby, 
						'post_status' => null, 
						'post_parent' => $post->ID, 
						'exclude' => $homeland_blog_thumb_slider_exclude 
					);

					$homeland_attachments = get_posts( $args );
					if ( $homeland_attachments ) :								
						foreach ( $homeland_attachments as $homeland_attachment ) :
							$homeland_attachment_id = $homeland_attachment->ID;
							$homeland_attachment_url = wp_get_attachment_url( $homeland_attachment_id );
							$homeland_type = get_post_mime_type( $homeland_attachment_id ); 

							$homeland_attachment_img = wp_get_attachment_image( $homeland_attachment_id, 'homeland_portfolio_large' );

							switch ( $homeland_type ) {
								case 'video/mp4': ?>
									<li>
										<video controls controlsList="nodownload" width="100%">
											<source src="<?php echo esc_url( $homeland_attachment_url ); ?>" type="video/mp4" />
										</video>
									</li><?php
								break;
								default: 
									echo "<li>". $homeland_attachment_img ."</li>";
								break;
							}
						endforeach;
					endif;			
				?>
			</ul>
		</div><?php
	endif;
?>