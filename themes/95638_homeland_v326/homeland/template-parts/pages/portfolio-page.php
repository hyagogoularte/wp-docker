<div class="row grid cs-style-3 clearfix">	
	<?php
		$homeland_num_portfolio = get_option( 'homeland_num_portfolio' );
		$homeland_portfolio_order = get_option( 'homeland_portfolio_order' );
		$homeland_portfolio_orderby = get_option( 'homeland_portfolio_orderby' );

		$args_wp = array( 
			'post_type' => 'homeland_portfolio', 
			'orderby' => $homeland_portfolio_orderby, 
			'order' => $homeland_portfolio_order, 
			'posts_per_page' => $homeland_num_portfolio, 
			'paged' => $paged
		);
		$wp_query = new WP_Query( $args_wp );

		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			get_template_part( 'template-parts/loops/loop', 'portfolio-sidebar' );
		endwhile;
	?>
</div>