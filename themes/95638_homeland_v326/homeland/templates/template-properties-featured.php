<?php
/*
	Template Name: Featured Properties
*/

	get_header();
	homeland_get_home_pagination(); 

	$homeland_hide_map_list = get_option( 'homeland_hide_map_list' );
	$homeland_num_properties = get_option( 'homeland_num_properties' );
	$homeland_filter_ordering = get_option( 'homeland_filter_order' );
	$homeland_filter_default = get_option( 'homeland_filter_default' );

	$homeland_filter_order_result = $homeland_filter_ordering == "ASC" ? 'ASC' : 'DESC';

	if( 'price' === $homeland_filter_default ) :
		$homeland_featured_order_value = "meta_value_num";
		$homeland_featured_meta_key = "homeland_price";
	elseif( 'title' === $homeland_filter_default ) :
		$homeland_featured_order_value = "title";
		$homeland_featured_meta_key = "";
	elseif( 'rand' === $homeland_filter_default ) :
		$homeland_featured_order_value = "rand";
		$homeland_featured_meta_key = "";
	else :
		$homeland_featured_order_value = "date";
		$homeland_featured_meta_key = "";
	endif;

	get_template_part( 'template-parts/component/display-search' );
?>

	<!-- Property List -->
	<section class="theme-pages">
		<div class="inside clearfix">

			<div class="post-col-9 left-container">		
				<?php get_template_part( 'template-parts/component/property-filter' ); ?>
				<div class="agent-properties property-list clearfix">
					<?php
						get_template_part( 'template-parts/component/default-content' );
						
						if( empty( $homeland_hide_map_list ) ) : 
							echo "<section id='map-homepage'></section>"; 
						endif;

						$args_wp = array( 
							'post_type' => 'homeland_properties', 
							'meta_key' => $homeland_featured_meta_key,
							'orderby' => $homeland_featured_order_value, 
							'order' => $homeland_filter_order_result, 
							'posts_per_page' => $homeland_num_properties, 
							'paged' => $paged,
							'meta_query' => array( 
								array( 
									'key' => 'homeland_featured', 
									'value' => 'on', 
									'compare' => '==' 
								),
							) 
						);
						
						$args = apply_filters('homeland_properties_parameters', $args_wp);
						$wp_query = new WP_Query( $args );	
					?>

					<div class="search-count">
    				<?php echo sprintf( esc_html__( '%d Properties Found', 'homeland' ), $wp_query->found_posts ); ?>
    			</div>

        	<div class="row grid cs-style-3">
						<?php
							while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
								get_template_part( 'template-parts/loops/loop', 'properties' );
				    	endwhile; 
				    ?>
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