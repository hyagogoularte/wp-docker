<?php 
	get_header(); 

	$homeland_term = $wp_query->queried_object;
	$homeland_num_portfolio = get_option( 'homeland_num_portfolio' );
	$homeland_portfolio_order = get_option( 'homeland_portfolio_order' );
	$homeland_portfolio_orderby = get_option( 'homeland_portfolio_orderby' );
	$homeland_portfolio_tax_layout = get_option( 'homeland_portfolio_tax_layout' );
	$homeland_hide_portfolio_archive_advance_search = get_option( 'homeland_hide_portfolio_archive_advance_search' );

	if( 'Right Sidebar' === $homeland_portfolio_tax_layout ) :
		$homeland_portfolio_main_class = "post-col-9 left-container";
		$homeland_portfolio_inside_class = "property-list property-four-cols property-grid-sidebar portfolio-sidebar";
		$homeland_portfolio_tax_template = "portfolio-sidebar";
		$homeland_portfolio_row_class = "row grid cs-style-3 clearfix";
	elseif( 'Left Sidebar' === $homeland_portfolio_tax_layout ) :
		$homeland_portfolio_main_class = "post-col-9 left-container right";
		$homeland_portfolio_inside_class = "property-list property-four-cols property-grid-sidebar portfolio-sidebar";
		$homeland_portfolio_tax_template = "portfolio-sidebar";
		$homeland_portfolio_row_class = "row grid cs-style-3 clearfix";
	elseif( 'Grid' === $homeland_portfolio_tax_layout ) :
		$homeland_portfolio_main_class = "post-col-12 theme-fullwidth";
		$homeland_portfolio_inside_class = "property-three-cols portfolio-grid";
		$homeland_portfolio_tax_template = "portfolio-grid";
		$homeland_portfolio_row_class = "grid cs-style-3 clearfix";
	else :
		$homeland_portfolio_main_class = "post-col-12 theme-fullwidth";
		$homeland_portfolio_inside_class = "property-three-cols portfolio-grid";
		$homeland_portfolio_tax_template = "portfolio";
		$homeland_portfolio_row_class = "row grid cs-style-3 clearfix";
	endif;

	if( empty( $homeland_hide_portfolio_archive_advance_search ) ) : 
		homeland_advance_search(); 
	endif;
	
	$args_wp = array( 
		'post_type' => 'homeland_portfolio', 
		'taxonomy' => 'homeland_portfolio_category',
		'orderby' => $homeland_portfolio_orderby, 
		'order' => $homeland_portfolio_order, 
		'posts_per_page' => $homeland_num_portfolio, 
		'term' => $homeland_term->slug,
		'paged' => $paged 
	);
	$wp_query = new WP_Query( $args_wp );
?>

	<section class="theme-pages">
		<div class="inside clearfix">

			<div class="<?php echo esc_attr( $homeland_portfolio_main_class ); ?>">
				<?php get_template_part( 'template-parts/component/portfolio-category' ); ?>
				<div class="<?php echo esc_attr( $homeland_portfolio_inside_class ); ?>">
					<?php echo term_description(); ?>
					<div class="<?php echo esc_attr( $homeland_portfolio_row_class ); ?>">	
						<?php
							while ( $wp_query->have_posts() ) : $wp_query->the_post();
								get_template_part( 'template-parts/loops/loop', $homeland_portfolio_tax_template );
							endwhile;
						?>
					</div>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<?php if( 'Right Sidebar' === $homeland_portfolio_tax_layout || 'Left Sidebar' === $homeland_portfolio_tax_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>

		</div>
	</section>

<?php get_footer(); ?>