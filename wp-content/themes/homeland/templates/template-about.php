<?php
/*
	Template Name: About
*/

	get_header();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-9 left-container">
				<?php
					get_template_part( 'template-parts/agents/agent-about' );
					get_template_part( 'template-parts/component/default-content' );
				?>	
			</div>

			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>