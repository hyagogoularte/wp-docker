<?php
/*
	Template Name: Properties - Grid with Sidebar
*/
 
	get_header();
	homeland_get_home_pagination();

	$homeland_hide_map_list = get_option( 'homeland_hide_map_list' );
	$homeland_num_properties = get_option( 'homeland_num_properties' );
	$homeland_filter_ordering = get_option( 'homeland_filter_order' );
	$homeland_filter_default = get_option( 'homeland_filter_default' );
	
	$homeland_filter_order_result = $homeland_filter_ordering == "ASC" ? 'ASC' : 'DESC';

	if( 'title' === $homeland_filter_default ) : 
		$homeland_filter_option_args = 'title';
	elseif( 'rand' === $homeland_filter_default ) : 
		$homeland_filter_option_args = 'rand';
	else : 
		$homeland_filter_option_args = 'date';
	endif;

	if( 'price' === $homeland_filter_default ) :
		$args_wp = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => 'meta_value_num', 
			'order' => $homeland_filter_order_result, 
			'posts_per_page' => $homeland_num_properties, 
			'paged' => $paged,
			'meta_query' => array( 'relation' => 'OR',
        array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
        array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' )
	    )
		);
	else :
		$args_wp = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => $homeland_filter_option_args, 
			'order' => $homeland_filter_order_result, 
			'posts_per_page' => $homeland_num_properties, 
			'paged' => $paged
		);
	endif;

	get_template_part( 'template-parts/component/display-search' );
?>

	<!-- Property List -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-9 left-container">
				<?php get_template_part( 'template-parts/component/property-filter' ); ?>
				<div class="property-list property-two-cols property-grid-sidebar clearfix">
					<?php
						get_template_part( 'template-parts/component/default-content' );
						
						if( empty( $homeland_hide_map_list ) ) : 
							echo "<section id='map-homepage'></section>"; 
						endif;

						$args = apply_filters( 'homeland_properties_parameters', $args_wp );
						$wp_query = new WP_Query( $args );
					?>

					<div class="search-count">
    				<?php echo sprintf( esc_html__( '%d Properties Found', 'homeland' ), $wp_query->found_posts ); ?>
    			</div>

					<div class="row grid cs-style-3">	
						<div class="grid-cols">
							<?php
								while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
									get_template_part( 'template-parts/loops/loop', 'property-sidebar' );
						    endwhile; 
							?>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<div class="post-col-3">
				<div class="sidebar"><?php get_sidebar(); ?></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>