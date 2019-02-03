<?php
/*
	Template Name: Services - Grid Fullwidth
*/
 
	get_header(); 

	$homeland_services_order = get_option( 'homeland_services_order' );
	$homeland_services_orderby = get_option( 'homeland_services_orderby' );
	$homeland_num_services = get_option( 'homeland_num_services' );

	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="theme-fullwidth">
				<?php get_template_part( 'template-parts/component/default-content' ); ?>
				<div class="services-block-two services-grid-fullwidth clearfix">
					<?php
						$args = array( 
							'post_type' => 'homeland_services', 
							'orderby' => $homeland_services_orderby, 
							'order' => $homeland_services_order, 
							'posts_per_page' => $homeland_num_services, 
							'paged' => $paged 
						);
						$wp_query = new WP_Query( $args );	

						while ( $wp_query->have_posts() ) : $wp_query->the_post();								
							get_template_part( 'template-parts/loops/loop', 'services-home-two' );
						endwhile;	
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>