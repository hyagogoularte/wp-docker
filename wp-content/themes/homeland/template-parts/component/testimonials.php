<?php
	$homeland_testi_limit = get_option( 'homeland_testi_limit' );
	$homeland_testi_overlay = get_option( 'homeland_testi_overlay' );
							
	$args = array( 
		'post_type' => 'homeland_testimonial', 
		'posts_per_page' => $homeland_testi_limit 
	);
	$wp_query = new WP_Query( $args ); 
?>

<section class="testimonial-block" data-paroller-factor="0.3">
	<?php if( !empty( $homeland_testi_overlay ) ) : ?> 
		<div class="overlay">&nbsp;</div>
	<?php endif; ?>		
	<div class="inside">
		<div class="post-col-12">
			<h3><?php echo homeland_option( 'homeland_testi_header', esc_html__( 'Our Customer Says', 'homeland' ) ); ?></h3>
			<div class="testimonial-flexslider">	
				<ul class="slides">
					<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<li id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class() ); ?>>
							<?php 
								the_content();
								if ( has_post_thumbnail() ) : 
									the_post_thumbnail( array( 100, 100 ) ); 
								endif;
								the_title( '<h4>', '</h4>' ); 
							?>	
							<h5><?php echo esc_html( $post->homeland_position ); ?></h5>
						</li>
					<?php	endwhile;	?>
				</ul>	
			</div>
		</div>
	</div>
</section>