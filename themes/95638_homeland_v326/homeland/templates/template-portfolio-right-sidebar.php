<?php
/*
	Template Name: Portfolio - Right Sidebar
*/

	get_header(); 
	homeland_get_home_pagination();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-9 left-container">
				<?php get_template_part( 'template-parts/component/portfolio-category' ); ?>
				<div class="property-list property-four-cols property-grid-sidebar portfolio-sidebar">
					<?php
						get_template_part( 'template-parts/component/default-content' );
						get_template_part( 'template-parts/pages/portfolio-page' );
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