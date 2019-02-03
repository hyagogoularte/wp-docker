<?php 
	get_header(); 
	
	$homeland_num_properties = get_option( 'homeland_num_properties' );
	$homeland_tax_layout = get_option( 'homeland_tax_layout' );
	$homeland_hide_map_list = get_option( 'homeland_hide_map_list' );
	$homeland_page_nav = get_option( 'homeland_pnav' );
	$homeland_filter_ordering = get_option( 'homeland_filter_order' );
	$homeland_filter_default = get_option( 'homeland_filter_default' );
	$homeland_hide_property_archive_advance_search = get_option( 'homeland_hide_property_archive_advance_search' );

	// taxonomy classes
	if( 'Left Sidebar' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-9 left-container right";
		$homeland_tax_class_container = "agent-properties property-list clearfix";
		$homeland_layout_value = "properties";
	elseif( '1 Column' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-12 theme-fullwidth";
		$homeland_tax_class_container = "property-list property-one-cols clearfix";
		$homeland_layout_value = "property-1col";
	elseif( '2 Columns' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-12 theme-fullwidth";
		$homeland_tax_class_container = "property-list property-two-cols clearfix";
		$homeland_layout_value = "property-2cols";
	elseif( '3 Columns' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-12 theme-fullwidth";
		$homeland_tax_class_container = "property-list property-three-cols clearfix";
		$homeland_layout_value = "property-3cols";
	elseif( '4 Columns' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-12 theme-fullwidth";
		$homeland_tax_class_container = "property-list property-four-cols clearfix";
		$homeland_layout_value = "property-4cols";
	elseif( 'Grid Sidebar' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-9 left-container";
		$homeland_tax_class_container = "property-list property-four-cols property-grid-sidebar clearfix";
		$homeland_layout_value = "property-sidebar";
	elseif( 'Grid Left Sidebar' === $homeland_tax_layout ) :
		$homeland_tax_class_main = "post-col-9 left-container right";
		$homeland_tax_class_container = "property-list property-four-cols property-grid-sidebar clearfix";
		$homeland_layout_value = "property-sidebar";
	else :
		$homeland_tax_class_main = "post-col-9 left-container";
		$homeland_tax_class_container = "agent-properties property-list clearfix";
		$homeland_layout_value = "properties";
	endif;

	if( empty( $homeland_hide_property_archive_advance_search ) ) : 
		homeland_advance_search(); 
	endif;
	$homeland_filter_order_result = $homeland_filter_ordering == "ASC" ? 'ASC' : 'DESC';

	// filter options
	if( 'Name' === $homeland_filter_default ) : 
		$homeland_filter_option_args = 'title';
	elseif( 'Random' === $homeland_filter_default ) : 
		$homeland_filter_option_args = 'rand';
	else : 
		$homeland_filter_option_args = 'date';
	endif;

	if( 'Price' === $homeland_filter_default ) :
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
			
	$args = apply_filters( 'homeland_properties_parameters', $args_wp );
	$wp_query = new WP_Query( $args );
?>

	<!-- property archive -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_tax_class_main ); ?>">	
				<?php get_template_part( 'template-parts/component/property-filter' ); ?>
				<div class="<?php echo esc_attr( $homeland_tax_class_container ); ?>">
					<?php
		        if( empty( $homeland_hide_map_list ) ) : 
		        	echo "<section id='map-homepage'></section>"; 
		        endif;

						if ( $wp_query->have_posts() ) : ?>
							<div class="search-count">
								<?php echo sprintf( __( '%d Properties Found', 'homeland' ), $wp_query->found_posts ); ?>
							</div>

            	<div class="grid-cols grid cs-style-3">
								<?php
									while ( $wp_query->have_posts() ) : $wp_query->the_post();
										get_template_part( 'template-parts/loops/loop', $homeland_layout_value );
									endwhile;
							  ?>
					    </div><?php
					  endif;		
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<?php if( '1 Column' !== $homeland_tax_layout && '2 Columns' !== $homeland_tax_layout && '3 Columns' !== $homeland_tax_layout && '4 Columns' !== $homeland_tax_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>