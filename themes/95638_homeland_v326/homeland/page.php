<?php 
	get_header(); 
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">

			<!-- left container -->	
			<div class="post-col-9 left-container">
				<?php
					get_template_part( 'template-parts/component/default-content' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'homeland' ),
						'after'  => '</div>',
					) );
				?>
			</div>

			<!-- sidebar -->
			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>