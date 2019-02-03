<?php 
	get_header(); 

	$homeland_archive_layout = get_option( 'homeland_archive_layout' );
	$homeland_hide_blog_archive_advance_search = get_option( 'homeland_hide_blog_archive_advance_search' );

	if( 'Timeline' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-12 theme-fullwidth";
		$homeland_archive_class_container = "blog-list blog-timeline clearfix";
		$homeland_layout_value = "entry-timeline";
	elseif( 'Fullwidth' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-12 theme-fullwidth";
		$homeland_archive_class_container = "row blog-list clearfix";
		$homeland_layout_value = "entry-fullwidth";
	elseif( '2 Columns' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-12 theme-fullwidth";
		$homeland_archive_class_container = "row grid-cols blog-fullwidth clearfix";
		$homeland_layout_value = "entry-2cols";
	elseif( '3 Columns' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-12 theme-fullwidth";
		$homeland_archive_class_container = "row grid-cols blog-fullwidth clearfix";
		$homeland_layout_value = "entry-3cols";
	elseif( '4 Columns' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-12 theme-fullwidth";
		$homeland_archive_class_container = "row grid-cols blog-fullwidth clearfix";
		$homeland_layout_value = "entry-4cols";
	elseif( 'Grid' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-9 left-container";
		$homeland_archive_class_container = "row grid-cols blog-grid clearfix";
		$homeland_layout_value = "entry-grid";
	elseif( 'Grid Left Sidebar' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-9 left-container right";
		$homeland_archive_class_container = "row grid-cols blog-grid clearfix";
		$homeland_layout_value = "entry-grid";
	elseif( 'List Alternate' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-9 left-container";
		$homeland_archive_class_container = "blog-list-alternate clearfix";
		$homeland_layout_value = "entry-alternate";
	elseif( 'Left Sidebar' === $homeland_archive_layout ) :
		$homeland_archive_class_main = "post-col-9 left-container right";
		$homeland_archive_class_container = "blog-list clearfix";
		$homeland_layout_value = "entry";
	else :
		$homeland_archive_class_main = "post-col-9 left-container";
		$homeland_archive_class_container = "blog-list clearfix";
		$homeland_layout_value = "entry";
	endif;

	if( empty( $homeland_hide_blog_archive_advance_search ) ) : 
		homeland_advance_search(); 
	endif;
?>

	<!-- blog archive -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_archive_class_main ); ?>">	
				<?php the_archive_description(); ?>
				<div class="<?php echo esc_attr( $homeland_archive_class_container ); ?>">
					<?php
						while ($wp_query->have_posts()) : $wp_query->the_post(); 					
							get_template_part( 'template-parts/loops/loop', $homeland_layout_value );
						endwhile;		
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>
			</div>

			<?php if( 'Timeline' !== $homeland_archive_layout && 'Fullwidth' !== $homeland_archive_layout && '2 Columns' !== $homeland_archive_layout && '3 Columns' !== $homeland_archive_layout && '4 Columns' !== $homeland_archive_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>