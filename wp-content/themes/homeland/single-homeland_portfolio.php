<?php 
	get_header(); 

	$homeland_single_portfolio_layout = get_option( 'homeland_single_portfolio_layout' );
	
	if( 'Right Sidebar' === $homeland_single_portfolio_layout ) :
		$homeland_single_layout_class = "post-col-9 left-container";
	elseif( 'Left Sidebar' === $homeland_single_portfolio_layout ) :
		$homeland_single_layout_class = "post-col-9 left-container right";
	else :
		$homeland_single_layout_class = "post-col-12 theme-fullwidth";
	endif;

	if( empty( $post->homeland_portfolio_asearch ) ) : 
		homeland_advance_search(); 
	endif;
?>

	<section class="theme-pages">
		<div class="inside clearfix">

			<div class="<?php echo esc_attr( $homeland_single_layout_class ); ?>">
				<?php if ( post_password_required() ) : ?>
					<div class="password-protect-content"><?php the_content(); ?></div>
				<?php
					else :
						while( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>">
								<?php 
									get_template_part( 'template-parts/single/portfolio-attachment' );
									get_template_part( 'template-parts/single/portfolio-details' );
								?>
							</article><?php 
						endwhile;
					endif;
					get_template_part( 'template-parts/component/portfolio-prev-next' );
				?>	
			</div>

			<?php if( 'Right Sidebar' === $homeland_single_portfolio_layout || 'Left Sidebar' === $homeland_single_portfolio_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>

		</div>
	</section>

<?php get_footer(); ?>