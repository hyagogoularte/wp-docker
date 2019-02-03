<?php 
	$homeland_other_properties = get_option( 'homeland_other_properties' );
	$homeland_other_property_limit = get_option( 'homeland_other_property_limit' );
	$homeland_single_property_layout = get_option( 'homeland_single_property_layout' );

	if( 'Fullwidth' === $homeland_single_property_layout ) :
		$homeland_loop_class = "property-4cols";
		$homeland_cols_class = "property-four-cols";
	else :
		$homeland_loop_class = "property-2cols";
		$homeland_cols_class = "property-two-cols";
	endif;
	
	if( empty( $homeland_other_properties ) ) : ?>
		<div class="property-list clearfix">
			<h4>
				<?php 
					echo homeland_option( 'homeland_other_properties_header', esc_html__( 'Other Properties', 'homeland' ) );
				?>
			</h4>
			<div class="<?php echo esc_attr( $homeland_cols_class ); ?>">
				<?php
					$args = array( 
						'post_type' => 'homeland_properties', 
						'orderby' => 'rand', 
						'post__not_in' => array( $post->ID ), 
						'posts_per_page' => $homeland_other_property_limit,
						'meta_query' => array( array( 
							'key' => 'homeland_property_sold', 
							'value'   => '',
							'compare' => 'NOT EXISTS',
						)) 
					);
					query_posts( $args );
				?>

				<div class="row grid cs-style-3 clearfix">
					<div class="grid-cols">
						<?php
							while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
								get_template_part( 'template-parts/loops/loop', $homeland_loop_class );
				    	endwhile; 
						?>
					</div>
				</div>

				<?php wp_reset_query();	?>
			</div>
		</div><?php
	endif;
?>