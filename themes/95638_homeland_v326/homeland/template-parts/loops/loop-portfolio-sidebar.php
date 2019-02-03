<?php 
	$homeland_portfolio_excerpt = get_option( 'homeland_portfolio_excerpt' ); 

	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url( 
			get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
		'sizes' => '(max-width: 568px) 100vw, 
			(max-width: 736px) 90vw, 
			(max-width: 768px) 30vw, 
			(max-width: 1024px) 26vw, 245px' 
	);
?>

<div id="post-<?php the_ID(); ?>" class="post-col-4 post-bottom">
	<div class="property-cols">
		<div class="property-mask">
			<?php if ( post_password_required() ) : ?>
				<div class="password-protect-thumb password-4cols">
					<i class="fas fa-lock fa-2x"></i>
				</div>
			<?php	else : ?>
				<figure class="pimage">
					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ) : 
								the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr ); 
							else : ?>
								<label class="no-image-fallback image-portfolio">
									<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
								</label><?php
							endif; 
						?>
					</a>
					<figcaption>
						<a href="<?php the_permalink(); ?>"><i class="fas fa-link fa-lg"></i></a>
					</figcaption>
				</figure>
			<?php endif; ?>			
		</div>
		<div class="property-desc portfolio-desc">
			<?php 
				the_title( sprintf( '<h4><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); 
				if( empty( $homeland_portfolio_excerpt ) ) : the_excerpt(); endif;
			?>	
		</div>	
	</div>
</div>