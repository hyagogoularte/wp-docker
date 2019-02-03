<?php 
	get_header(); 

	$homeland_services_archive_layout = get_option( 'homeland_services_archive_layout' );
	$homeland_services_order = get_option( 'homeland_services_order' );
	$homeland_services_orderby = get_option( 'homeland_services_orderby' );
	$homeland_num_services = get_option( 'homeland_num_services' );
	$homeland_hide_services_archive_advance_search = get_option( 'homeland_hide_services_archive_advance_search' );

	if( 'Left Sidebar' === $homeland_services_archive_layout ) :
		$homeland_services_archive_class = "post-col-9 left-container right";
		$homeland_services_loop = "services";
		$homeland_services_container = "row services-container";
	elseif( 'Fullwidth' === $homeland_services_archive_layout ) :
		$homeland_services_archive_class = "post-col-12 theme-fullwidth";
		$homeland_services_loop = "services";
		$homeland_services_container = "row services-container";
	elseif( 'Grid Fullwidth' === $homeland_services_archive_layout ) :
		$homeland_services_archive_class = "theme-fullwidth";
		$homeland_services_loop = "services-home-two";
		$homeland_services_container = "services-block-two services-grid-fullwidth clearfix";
	else :
		$homeland_services_archive_class = "post-col-9 left-container";
		$homeland_services_loop = "services";
		$homeland_services_container = "row services-container";
	endif;

	if( empty( $homeland_hide_services_archive_advance_search ) ) : 
		homeland_advance_search(); 
	endif;

	$args_wp = array( 
		'post_type' => 'homeland_services', 
		'orderby' => $homeland_services_orderby, 
		'order' => $homeland_services_order, 
		'posts_per_page' => $homeland_num_services, 
		'paged' => $paged 
	);
	$wp_query = new WP_Query( $args_wp );
?>

	<section class="theme-pages">
		<div class="inside clearfix">

			<div class="<?php echo esc_attr( $homeland_services_archive_class ); ?>">
				<div class="<?php echo esc_attr( $homeland_services_container ); ?>">
					<?php
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
							get_template_part( 'template-parts/loops/loop', $homeland_services_loop );
						endwhile;	
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<?php if( 'Default' === $homeland_services_archive_layout || 'Left Sidebar' === $homeland_services_archive_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>

		</div>
	</section>

<?php get_footer(); ?>