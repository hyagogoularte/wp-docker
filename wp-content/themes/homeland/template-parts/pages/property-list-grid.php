<?php
	$homeland_album_order = get_option( 'homeland_album_order' );
	$homeland_album_orderby = get_option( 'homeland_album_orderby' );
	$homeland_property_limit = get_option( 'homeland_property_limit' );
	
	$args = array( 
		'post_type' => 'homeland_properties', 
		'orderby' => $homeland_album_orderby, 
		'order' => $homeland_album_order, 
		'posts_per_page' => $homeland_property_limit 
	);
	$wp_query = new WP_Query( $args );	

	if ($wp_query->have_posts()) : ?>
		<section class="property-block post-bottom">
			<div class="inside property-list-box clearfix">
				<div class="post-col-12">
					<h2>
						<span><?php echo homeland_option( 'homeland_property_header', esc_html__( 'Latest Property', 'homeland' ) ); ?></span>
					</h2>
				</div>
				<div class="grid cs-style-3 grid-cols">	
					<?php
						while ($wp_query->have_posts()) : $wp_query->the_post();
							get_template_part( 'template-parts/loops/loop', 'property-home' );
						endwhile;		
					?>
				</div>		
			</div>
		</section><?php	
	endif;
?>