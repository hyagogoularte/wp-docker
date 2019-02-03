<?php 
	$homeland_hide_properties_details = get_option( 'homeland_hide_properties_details' );
	$homeland_theme_header = get_option( 'homeland_theme_header' );
	$homeland_slider_details_position = get_option( 'homeland_slider_details_position' );
	$homeland_slider = "homeland_slider";

	$homeland_slider_image = $homeland_theme_header == 'Header 4' ? 'full' : $homeland_slider;

	if( 'top' === $homeland_slider_details_position ) :
		$homeland_slide_pos_class = "slide-top";
		$homeland_slide_pos_grid_one_class = "post-col-7 slide-bottom-title";
		$homeland_slide_pos_grid_two_class = "post-col-5 slide-bottom-actions textright";
	elseif( 'right' === $homeland_slider_details_position ) :
		$homeland_slide_pos_class = "slide-right";
		$homeland_slide_pos_grid_one_class = "post-col-12 slide-bottom-title post-bottom";
		$homeland_slide_pos_grid_two_class = "post-col-12 slide-bottom-actions";
	elseif( 'left' === $homeland_slider_details_position ) :
		$homeland_slide_pos_class = "slide-left";
		$homeland_slide_pos_grid_one_class = "post-col-12 slide-bottom-title post-bottom";
		$homeland_slide_pos_grid_two_class = "post-col-12 slide-bottom-actions";
	else :
		$homeland_slide_pos_class = "slide-bottom";
		$homeland_slide_pos_grid_one_class = "post-col-7 slide-bottom-title";
		$homeland_slide_pos_grid_two_class = "post-col-5 slide-bottom-actions textright";
	endif;
?>

<li id="post-<?php the_ID(); ?>">
	<div class="slide-image">
		<?php 
			if ( has_post_thumbnail() ) : 
				the_post_thumbnail( $homeland_slider_image ); 
			else : ?>
				<label class="no-image-fallback image-portfolio no-image-slider">
					<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
				</label><?php
			endif; 
		?>
	</div>
	<?php if( empty( $homeland_hide_properties_details ) ) : ?>
		<div class="<?php echo esc_attr( $homeland_slide_pos_class ); ?>">
			<div class="inside clearfix">
				<div class="<?php echo esc_attr( $homeland_slide_pos_grid_one_class ); ?>">
					<?php 
						the_title( '<h2>', '</h2>' ); 
						if( !empty( $post->homeland_address ) ) :
							echo "<h4><i class='fas fa-map-marker-alt'></i>" . esc_html( $post->homeland_address ) . "</h4>";
						endif;
					?>
				</div>	
				<div class="<?php echo esc_attr( $homeland_slide_pos_grid_two_class ); ?>">
					<?php if( !empty( $post->homeland_contact_price ) ) : ?>
						<span class="slide-price"><?php esc_html_e( 'Contact us for Price', 'homeland' ); ?></span><?php
						else : 
							if( !empty( $post->homeland_price ) ) : ?>
								<span class="slide-price">
									<?php homeland_property_price_format(); ?>
								</span><?php 
							endif; 
						endif;
					?>

					<?php if( !empty( $post->homeland_property_open_house ) ) : ?>
						<span class="property-sold-slide">
							<?php esc_html_e( 'Open House', 'homeland' ); ?>
						</span>
					<?php endif; ?>

					<?php if( !empty( $post->homeland_property_sold ) ) : ?>
						<span class="property-sold-slide">
							<?php esc_html_e( 'Sold', 'homeland' ); ?>
						</span>
					<?php endif; ?>

					<a href="<?php the_permalink(); ?>" class="slide-more">
						<?php 
							echo homeland_option( 'homeland_slider_button', esc_html__( 'More Details', 'homeland' ) );
						?>
					</a>
				</div>
			</div>
		</div>
	<?php endif; ?>
</li>