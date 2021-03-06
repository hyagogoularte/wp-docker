<?php
/*
	Template Name: Left Sidebar
*/

	get_header(); 
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">		
			
			<!-- left container -->
			<div class="post-col-9 left-container right">
				<?php get_template_part( 'template-parts/component/default-content' ); ?>	
			</div>

			<!-- sidebar -->
			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>