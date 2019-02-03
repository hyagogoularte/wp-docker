<?php 
	get_header();
	global $homeland_print_page_url;

	$homeland_single_property_layout = get_option( 'homeland_single_property_layout' );
	$homeland_hide_property_comments = get_option( 'homeland_hide_property_comments' );

	if( 'Fullwidth' === $homeland_single_property_layout ) :
		$homeland_single_layout_class = "post-col-12 theme-fullwidth";
	elseif( 'Left Sidebar' === $homeland_single_property_layout ) :
		$homeland_single_layout_class = "post-col-9 left-container right";
	else :
		$homeland_single_layout_class = "post-col-9 left-container";
	endif;

	if( empty( $post->homeland_property_asearch ) ) : 
		homeland_advance_search(); 
	endif;
?>

	<!-- property single page -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_single_layout_class ); ?>">				
				<div class="property-list-page single-property clearfix">
					<?php if ( post_password_required() ) : ?>
						<div class="password-protect-content"><?php the_content(); ?></div>
					<?php 
						else :
							while( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" class="plist">
									<?php 
										get_template_part( 'template-parts/single/property-info' ); 
										get_template_part( 'template-parts/single/property-attachments' );
										get_template_part( 'template-parts/single/property-price' ); 
										get_template_part( 'template-parts/single/property-more-info' );
									?>
									
									<!-- open house schedule -->
									<?php if( 'Fullwidth' === $homeland_single_property_layout ) : ?>
										<div class="fullwidth-open-house post-bottom">
											<?php get_template_part( 'template-parts/single/open-house' ); ?>
										</div>
									<?php endif; ?>

									<?php
										the_content(); 
										get_template_part( 'template-parts/single/property-amenities' );
										get_template_part( 'template-parts/single/property-video' );
										get_template_part( 'template-parts/single/property-map' );
										get_template_part( 'template-parts/single/property-virtual-tour' );
									?>
								</article><?php 
								get_template_part( 'template-parts/component/social-share' );
							endwhile; 

							get_template_part( 'template-parts/single/property-agent-info' );
							get_template_part( 'template-parts/single/other-properties' );

							if( empty( $homeland_hide_property_comments ) ) : 
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endif;

							get_template_part( 'template-parts/component/property-prev-next' );
						endif;
					?>	
				</div>
			</div>

			<?php if( 'Fullwidth' !== $homeland_single_property_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar">
						<?php 
							get_template_part( 'template-parts/single/open-house' );
							get_sidebar(); 
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>