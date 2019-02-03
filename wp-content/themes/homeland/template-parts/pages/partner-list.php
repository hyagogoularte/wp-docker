<?php
	$homeland_partners_limit = get_option( 'homeland_partners_limit' );
	$homeland_partner_order = get_option( 'homeland_partner_order' );
	$homeland_partner_orderby = get_option( 'homeland_partner_orderby' );
	$homeland_partners_overlay = get_option( 'homeland_partners_overlay' );
	$homeland_partners_layout = get_option( 'homeland_partners_layout' );
							
	$args = array( 
		'post_type' => 'homeland_partners', 
		'order' => $homeland_partner_order,
		'orderby' => $homeland_partner_orderby,
		'posts_per_page' => $homeland_partners_limit 
	);
	$wp_query = new WP_Query( $args );	

	if( $wp_query->have_posts() ) : ?>
		<section class="partners-block">
			<?php if( !empty( $homeland_partners_overlay ) ) : ?>
				<div class="overlay">&nbsp;</div>
			<?php endif; ?>	
			<div class="inside">
				<div class="post-col-12">
					<h3><?php echo homeland_option( 'homeland_partners_header', esc_html__( 'Our Trusted Partners', 'homeland' ) ); ?></h3>
				</div>
				<?php if( 'grid' === $homeland_partners_layout ) : ?>
					<div class="partners-grid clearfix">
						<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" class="post-col-3 post-col-no-margin partners-post textcenter">
								<a href="<?php echo esc_url( $post->homeland_url ); ?>" target="_blank">
									<?php 
										if ( has_post_thumbnail() ) : 
											the_post_thumbnail( 'full' ); 
										endif; 
									?>
								</a>
							</div>
						<?php	endwhile;	?>
					</div>
				<?php else : ?>
					<div class="partners-flexslider clearfix">	
						<ul class="slides">
							<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
								<li id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'textcenter' ) ); ?>>
									<a href="<?php echo esc_url( $post->homeland_url ); ?>" target="_blank">
										<?php 
											if ( has_post_thumbnail() ) : 
												the_post_thumbnail( 'full' ); 
											endif; 
										?>
									</a>
								</li>
							<?php	endwhile;	?>
						</ul>	
					</div>
				<?php endif; ?>
			</div>
		</section><?php
	endif;
?>