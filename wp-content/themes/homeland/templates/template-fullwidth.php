<?php
/*
	Template Name: Fullwidth
*/
 
	get_header(); 
	get_template_part( 'template-parts/component/display-search' );
?>

	<!-- fullwidth -->
	<section class="theme-pages">
		<div class="inside">
			<div class="post-col-12 theme-fullwidth">
				<?php get_template_part( 'template-parts/component/default-content' ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>