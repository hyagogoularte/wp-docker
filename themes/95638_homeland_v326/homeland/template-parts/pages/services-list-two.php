<?php
	$homeland_services_order = get_option( 'homeland_services_order' );
	$homeland_services_orderby = get_option( 'homeland_services_orderby' );
	$homeland_services_limit = get_option( 'homeland_services_limit' );
	
	$args = array( 
		'post_type' => 'homeland_services', 
		'orderby' => $homeland_services_orderby, 
		'order' => $homeland_services_order, 
		'posts_per_page' => $homeland_services_limit 
	);
	$wp_query = new WP_Query( $args );	

	if( $wp_query->have_posts() ) : ?>
		<section class="services-block-two post-bottom-3em">
			<div class="inside services-list-box clearfix">
				<?php
					while( $wp_query->have_posts() ) : $wp_query->the_post(); 					
						get_template_part( 'template-parts/loops/loop', 'services-home-two' );
					endwhile;	
				?>				
			</div>
		</section><?php
	endif;
?>