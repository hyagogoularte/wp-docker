<?php
/*
	Template Name: Blog Grid - Left Sidebar
*/

	get_header();
	homeland_get_home_pagination();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">		
			<div class="post-col-9 left-container right">		
				<?php get_template_part( 'template-parts/component/default-content' ); ?>	
				<div class="blog-grid clearfix">
					<div class="row grid-cols">
						<?php
							$args = array( 'post_type' => 'post', 'paged' => $paged );		
							$wp_query = new WP_Query( $args );	

							while ($wp_query->have_posts()) : $wp_query->the_post(); 					
								get_template_part( 'template-parts/loops/loop', 'entry-grid' );
							endwhile;						
						?>
					</div>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>	
			</div>

			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>