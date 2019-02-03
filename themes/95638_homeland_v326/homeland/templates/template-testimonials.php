<?php
/*
	Template Name: Testimonials
*/

	get_header(); 
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">		
			<div class="post-col-9 left-container">
				<?php get_template_part( 'template-parts/component/default-content' ); ?>
				<div class="services-container">
					<?php
						$args = array( 
							'post_type' => 'homeland_testimonial', 
							'posts_per_page' => 10, 
							'paged' => $paged 
						);
						$wp_query = new WP_Query( $args );	

						while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'testi-page-list post-bottom clearfix' ) ); ?>>
								<?php 
									if ( has_post_thumbnail() ) : 
										the_post_thumbnail( array( 100, 100 ) ); 
									endif; 
								?>	
								<div class="testi-desc">
									<?php the_title( '<h4>', '</h4>' ); ?>
									<h5><?php echo esc_html( $post->homeland_position ); ?></h5>
									<?php the_content(); ?>
								</div>
							</div><?php
						endwhile;	
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<!-- sidebar -->
			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>