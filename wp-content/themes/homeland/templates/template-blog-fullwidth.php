<?php
/*
	Template Name: Blog Fullwidth
*/
 
	get_header(); 
	homeland_get_home_pagination();
	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">	
			<div class="post-col-12 theme-fullwidth">		
				<?php get_template_part( 'template-parts/component/default-content' ); ?>
				<div class="row blog-list clearfix">
					<?php
						$args = array( 'post_type' => 'post', 'paged' => $paged );		
						$wp_query = new WP_Query( $args );	

						while ($wp_query->have_posts()) : $wp_query->the_post(); 					
							get_template_part( 'template-parts/loops/loop', 'entry-fullwidth' );
						endwhile;				
					?>
				</div>
				<?php get_template_part( 'template-parts/component/paging' ); ?>	
			</div>
		</div>
	</section>

<?php get_footer(); ?>