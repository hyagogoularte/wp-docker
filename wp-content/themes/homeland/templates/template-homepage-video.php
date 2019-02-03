<?php
/*
	Template Name: Homepage + Video
*/

	get_header(); 

	$homeland_hide_bottom_cols = get_option( 'homeland_hide_bottom_cols' );	
	$homeland_hide_welcome = get_option( 'homeland_hide_welcome' );	
	$homeland_hide_properties = get_option( 'homeland_hide_properties' );	
	$homeland_hide_services = get_option( 'homeland_hide_services' );	
	$homeland_hide_testimonials = get_option( 'homeland_hide_testimonials' );	
	$homeland_hide_partners = get_option( 'homeland_hide_partners' );	
	$homeland_hide_portfolio = get_option( 'homeland_hide_portfolio' );	
	$homeland_hide_cta = get_option( 'homeland_hide_cta' );	
	$homeland_property_home_cols_type = get_option( 'homeland_property_home_cols_type' );	
	$homeland_property_home_display_type = get_option( 'homeland_property_home_display_type' );	

	// video
	get_template_part( 'template-parts/component/home-video' );

	// advance search
	get_template_part( 'template-parts/component/display-search' );

	// services
	if( empty( $homeland_hide_services ) ) :
		get_template_part( 'template-parts/pages/services-list' );
	endif;

	// call to action
	if( empty( $homeland_hide_cta ) ) :
		get_template_part( 'template-parts/component/call-to-action' );
	endif; 

	// properties
	if( empty( $homeland_hide_properties ) ) : 
		get_template_part( 'template-parts/pages/property-list-grid' );
	endif;

	// portfolio
	if( empty( $homeland_hide_portfolio ) ) : 
		get_template_part( 'template-parts/pages/portfolio-list-grid' );
	endif;

	// testimonials
	if( empty( $homeland_hide_testimonials ) ) : 
		get_template_part( 'template-parts/component/testimonials' );
	endif; 

	// bottom columns
	if( empty( $homeland_hide_bottom_cols ) ) : ?>
		<section class="three-columns-block post-bottom-2em">
			<div class="inside clearfix">
				<?php if( 'two-cols' === $homeland_property_home_cols_type ) : ?>
					<div class="post-col-8 post-bottom">
						<?php get_template_part( 'template-parts/pages/featured-large-list' ); ?>
					</div>
					<div class="post-col-4 post-bottom">
						<?php get_template_part( 'template-parts/pages/blog-home-list' ); ?>
					</div>
				<?php else : ?>
					<div class="post-col-4 post-bottom">
						<?php get_template_part( 'template-parts/pages/agent-list' ); ?>
					</div>
					<div class="post-col-4 post-bottom">
						<?php get_template_part( 'template-parts/pages/featured-list' ); ?>
					</div>
					<div class="post-col-4 post-bottom">
						<?php get_template_part( 'template-parts/pages/blog-home-list' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</section><?php
	endif;

	// partners
	if( empty( $homeland_hide_partners ) ) : 
		get_template_part( 'template-parts/pages/partner-list' );
	endif;

	get_footer(); 
?>