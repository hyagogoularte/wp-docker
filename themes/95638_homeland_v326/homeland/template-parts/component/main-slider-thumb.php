<?php
	$homeland_slider_order = get_option( 'homeland_slider_order' );
	$homeland_slider_orderby = get_option( 'homeland_slider_orderby' );
	$homeland_slider_limit = get_option( 'homeland_slider_limit' );
	$homeland_slider_display_list = get_option( 'homeland_slider_display_list' );

	if( 'Properties' === $homeland_slider_display_list ) :
		if( 'price' === $homeland_slider_orderby ) :
			$args = array( 
				'post_type' => 'homeland_properties', 
				'orderby' => 'meta_value_num', 
				'order' => $homeland_slider_order, 
				'posts_per_page' => $homeland_slider_limit,
				'meta_query' => array( 'relation' => 'OR',
	        array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
	        array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' )
		    )
			);	
		else :
			$args = array( 
				'post_type' => 'homeland_properties', 
				'orderby' => $homeland_slider_orderby, 
				'order' => $homeland_slider_order, 
				'posts_per_page' => $homeland_slider_limit
			);
		endif;
	elseif( 'Blog' === $homeland_slider_display_list ) :
		$args = array( 
			'post_type' => 'post', 
			'orderby' => $homeland_slider_orderby, 
			'order' => $homeland_slider_order, 
			'posts_per_page' => $homeland_slider_limit
		);
	elseif( 'Portfolio' === $homeland_slider_display_list ) :
		$args = array( 
			'post_type' => 'homeland_portfolio', 
			'orderby' => $homeland_slider_orderby, 
			'order' => $homeland_slider_order, 
			'posts_per_page' => $homeland_slider_limit
		);
	else :
		if( 'price' === $homeland_slider_orderby ) :
			$args = array( 
				'post_type' => 'homeland_properties', 
				'meta_key' => 'homeland_price',
				'orderby' => 'meta_value_num', 
				'order' => $homeland_slider_order, 
				'posts_per_page' => $homeland_slider_limit, 
				'meta_query' => array( 
	 				'relation' => 'AND',
	 				array( 
		 				'key' => 'homeland_featured', 
		 				'value' => 'on', 
		 				'compare' => '==' 
		 			),
		 			array(
						'key' => 'homeland_property_sold',
						'value' => 'on', 
		 				'compare' => 'NOT EXISTS' 
					),
			 	) 
			);	
		else :
			$args = array( 
				'post_type' => 'homeland_properties', 
				'orderby' => $homeland_slider_orderby, 
				'order' => $homeland_slider_order, 
				'posts_per_page' => $homeland_slider_limit, 
				'meta_query' => array( 
	 				'relation' => 'AND',
	 				array( 
		 				'key' => 'homeland_featured', 
		 				'value' => 'on', 
		 				'compare' => '==' 
		 			),
		 			array(
						'key' => 'homeland_property_sold',
						'value' => 'on', 
		 				'compare' => 'NOT EXISTS' 
					),
			 	) 
			);	
		endif;
	endif;	
	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) : ?>
		<section class="slider-block-thumb">
			<div class="inside">
				<div class="post-col-12">
					<div class="home-flexslider flex-loading">
						<ul class="slides">
							<?php
								while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
									get_template_part( 'template-parts/loops/loop', 'slider-small' );
								endwhile;
							?>
						</ul>	
					</div>
				</div>
			</div>
		</section><?php 
	endif;	
	wp_reset_query();
?>