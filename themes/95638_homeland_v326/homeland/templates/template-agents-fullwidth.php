<?php
/*
	Template Name: Agents - Grid Fullwidth
*/

	get_header();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="agent-about-list agent-fullwidth theme-fullwidth clearfix">
				<div class="post-col-12 agent-contents">
					<?php
						get_template_part( 'template-parts/component/default-content' );
						get_template_part( 'template-parts/agents/agent-page-fullwidth' );
					?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>