<?php 
	get_header();

	$homeland_services_single_layout = get_option( 'homeland_services_single_layout' );

	if( 'Fullwidth' === $homeland_services_single_layout ) :
		$homeland_services_class_main = "post-col-12 theme-fullwidth";
	elseif( 'Left Sidebar' === $homeland_services_single_layout ) :
		$homeland_services_class_main = "post-col-9 left-container right";
	else :
		$homeland_services_class_main = "post-col-9 left-container";
	endif;

	if( empty( $post->homeland_services_asearch ) ) : 
		homeland_advance_search(); 
	endif;
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_services_class_main ); ?>">	
				<div class="services-container">
					<?php while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" class="row clearfix">
							<div class="post-col-3">
								<div class="services-page-icon">
									<?php if( !empty( $post->homeland_icon ) ) : ?>
										<i class="<?php echo esc_html( $post->homeland_icon ); ?> fa-4x"></i>
									<?php else : ?>
										<?php echo the_post_thumbnail( array( 100,100 ) ); ?>
									<?php endif; ?>
								</div>
							</div>						
							<div class="post-col-9 services-page-desc"><?php the_content(); ?></div>
						</div>
					<?php endwhile;	?>
				</div>
			</div>

			<?php if( 'Fullwidth' !== $homeland_services_single_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>

		</div>
	</section>

<?php get_footer(); ?>