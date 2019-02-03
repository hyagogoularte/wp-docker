<?php
	$homeland_portfolio_home_order = get_option( 'homeland_portfolio_home_order' );
	$homeland_portfolio_home_orderby = get_option( 'homeland_portfolio_home_orderby' );
	$homeland_portfolio_limit = get_option( 'homeland_portfolio_limit' );
	
	$args = array( 
		'post_type' => 'homeland_portfolio', 
		'orderby' => $homeland_portfolio_home_orderby, 
		'order' => $homeland_portfolio_home_order, 
		'posts_per_page' => $homeland_portfolio_limit 
	);
	$wp_query = new WP_Query( $args );	

	if ($wp_query->have_posts()) : ?>
		<section class="property-block portfolio-block post-bottom-3em">
			<div class="inside property-list-box clearfix">
				<div class="post-col-12">
					<h2><span><?php echo homeland_option( 'homeland_portfolio_header', esc_html__( 'Our Works', 'homeland' ) ); ?></span></h2>
				</div>
				<div class="grid cs-style-3 clearfix">	
					<?php
						while ($wp_query->have_posts()) : $wp_query->the_post(); 					
							get_template_part( 'template-parts/loops/loop', 'portfolio' );		
						endwhile;	
					?>
				</div>		
			</div>
		</section><?php	
	endif;
?>