<?php
/*
	Template Name: Agents - List Fullwidth
*/

	get_header();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-12 theme-fullwidth list-fullwidth">
				<?php 
					get_template_part( 'template-parts/component/default-content' ); 
					get_template_part( 'template-parts/agents/agent-page' ); 
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>