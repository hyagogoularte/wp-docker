<?php
/*
	Template Name: Portfolio
*/

	get_header(); 
	homeland_get_home_pagination();

	$homeland_num_portfolio = get_option( 'homeland_num_portfolio' );
	$homeland_portfolio_order = get_option( 'homeland_portfolio_order' );
	$homeland_portfolio_orderby = get_option( 'homeland_portfolio_orderby' );

	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-12 theme-fullwidth">
				<?php get_template_part( 'template-parts/component/portfolio-category' ); ?>
				<div class="property-three-cols portfolio-grid">
					<div class="row grid cs-style-3 clearfix">	
						<?php
							get_template_part( 'template-parts/component/default-content' );
							
							$args_wp = array( 
								'post_type' => 'homeland_portfolio', 
								'orderby' => $homeland_portfolio_orderby, 
								'order' => $homeland_portfolio_order, 
								'posts_per_page' => $homeland_num_portfolio, 
								'paged' => $paged
							);
							$wp_query = new WP_Query( $args_wp );

							while ( $wp_query->have_posts() ) : $wp_query->the_post();
								get_template_part( 'template-parts/loops/loop', 'portfolio' );
							endwhile;
						?>
					</div>	
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>