<?php 
	get_header(); 
	get_template_part( 'template-parts/component/display-search' );
?>

	<!-- search results -->
	<section class="theme-pages">
		<div class="inside clearfix">

			<!-- left container -->		
			<div class="post-col-9 left-container">
				<div class="blog-list clearfix">
					<?php
						if( have_posts() ) : 
							while( have_posts() ) : the_post(); 					
								get_template_part( 'template-parts/loops/loop', 'entry' );
							endwhile;	
						else :
							esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'homeland' );
						endif;					
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