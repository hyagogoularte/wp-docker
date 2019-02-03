<?php
/*
	Template Name: Advance Search
*/

	get_header(); 

	$homeland_search_property_limit = get_option( 'homeland_search_property_limit' );
	$homeland_gmap_search = get_option( 'homeland_gmap_search' );
	$homeland_advance_search_layout = get_option( 'homeland_advance_search_layout' );
	$homeland_filter_ordering = get_option( 'homeland_filter_order' );
	$homeland_filter_default = get_option( 'homeland_filter_default' );

	// Search Dynamic Classes
	if( 'Left Sidebar' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-9 left-container right";
		$homeland_property_search_class_container = "agent-properties property-list clearfix";
		$homeland_layout_value = "properties";
		$homeland_row_class = "row grid cs-style-3";
	elseif( '1 Column' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-12 theme-fullwidth";
		$homeland_property_search_class_container = "property-list property-one-cols clearfix";
		$homeland_layout_value = "property-1col";
		$homeland_row_class = "grid cs-style-3";
	elseif( '2 Columns' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-12 theme-fullwidth";
		$homeland_property_search_class_container = "property-list property-two-cols clearfix";
		$homeland_layout_value = "property-2cols";
		$homeland_row_class = "row grid cs-style-3";
	elseif( '3 Columns' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-12 theme-fullwidth";
		$homeland_property_search_class_container = "property-list property-three-cols clearfix";
		$homeland_layout_value = "property-3cols";
		$homeland_row_class = "row grid cs-style-3";
	elseif( '4 Columns' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-12 theme-fullwidth";
		$homeland_property_search_class_container = "property-list property-four-cols clearfix";
		$homeland_layout_value = "property-4cols";
		$homeland_row_class = "row grid cs-style-3";
	elseif( 'Grid Sidebar' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-9 left-container";
		$homeland_property_search_class_container = "property-list property-grid-sidebar property-two-cols clearfix";
		$homeland_layout_value = "property-2cols";
		$homeland_row_class = "row grid cs-style-3";
	elseif( 'Grid Left Sidebar' === $homeland_advance_search_layout ) :
		$homeland_property_search_class_main = "post-col-9 left-container right";
		$homeland_property_search_class_container = "property-list property-grid-sidebar property-two-cols clearfix";
		$homeland_layout_value = "property-2cols";
		$homeland_row_class = "row grid cs-style-3";
	else :
		$homeland_property_search_class_main = "post-col-9 left-container";
		$homeland_property_search_class_container = "agent-properties property-list clearfix";
		$homeland_layout_value = "properties";
		$homeland_row_class = "row grid cs-style-3";
	endif;

	$homeland_filter_order_result = $homeland_filter_ordering == "ASC" ? 'ASC' : 'DESC';

	if( 'title' === $homeland_filter_default ) : $homeland_filter_option_args = 'title';
	elseif( 'rand' === $homeland_filter_default ) : $homeland_filter_option_args = 'rand';
	else : $homeland_filter_option_args = 'date';
	endif;

	if( 'price' === $homeland_filter_default ) :
		$args_wp = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => 'meta_value_num', 
			'order' => $homeland_filter_order_result, 
			'posts_per_page' => $homeland_search_property_limit, 
			'paged' => $paged,
			'meta_query' => array( 'relation' => 'OR',
	      array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
	      array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' ),
	    ) 
		);
	else :
		$args_wp = array( 
			'post_type' => 'homeland_properties', 
			'orderby' => $homeland_filter_option_args,
			'order' => $homeland_filter_order_result,
			'posts_per_page' => $homeland_search_property_limit, 
			'paged' => $paged
		);
	endif;

	get_template_part( 'template-parts/component/display-search' );
?>

	<!-- Property List -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_property_search_class_main ); ?>">	
				<?php get_template_part( 'template-parts/component/property-filter' ); ?>	
				<div class="<?php echo esc_attr( $homeland_property_search_class_container ); ?>">
					<?php
						get_template_part( 'template-parts/component/default-content' );

						if( empty( $homeland_gmap_search ) ) : 
							homeland_google_map_search();
							echo "<section id='map-property-search'></section>";
						endif;

						$args = apply_filters('homeland_advance_search_parameters', $args_wp);
		        $wp_query = new WP_Query( $args );

            if ( $wp_query->have_posts() ) : ?>
            	
							<div class="search-count">
        				<?php echo sprintf( esc_html__( '%d Properties Found', 'homeland' ), $wp_query->found_posts ); ?>
        			</div>

        			<div class="<?php echo esc_attr( $homeland_row_class ); ?>">
            		<div class="grid-cols">
            			<?php
										while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
											get_template_part( 'template-parts/loops/loop', $homeland_layout_value );
								    endwhile; 
	                ?>
            		</div>
              </div><?php
           	else: ?>
							<div class="search-count search-error">
								<?php esc_html_e( 'Your search query returned 0 results!', 'homeland' ); ?>
		          </div><?php
            endif;
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>
			
			<?php if( '1 Column' !== $homeland_advance_search_layout && '2 Columns' !== $homeland_advance_search_layout && '3 Columns' !== $homeland_advance_search_layout && '4 Columns' !== $homeland_advance_search_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>