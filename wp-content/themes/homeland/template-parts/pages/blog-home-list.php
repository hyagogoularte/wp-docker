<?php
	$homeland_blog_limit = get_option( 'homeland_blog_limit' );
	$homeland_blog_category = get_option( 'homeland_blog_category' );

	if( $homeland_blog_category == esc_html__( 'Choose a category', 'homeland' ) ) :
		$args = array( 
			'post_type' => 'post', 
			'posts_per_page' => $homeland_blog_limit,
			'ignore_sticky_posts' => true 
		);
	else :
		$args = array( 
			'post_type' => 'post', 
			'posts_per_page' => $homeland_blog_limit, 
			'category_name' => $homeland_blog_category,
			'ignore_sticky_posts' => true
		);
	endif;		
	$wp_query = new WP_Query( $args );	

	if( $wp_query->have_posts() ) : ?>
		<div class="blog-block">
			<h3>
				<span><?php echo homeland_option( 'homeland_blog_header', esc_html__( 'Latest News', 'homeland' ) ); ?></span>
			</h3>
			<?php 
				while( $wp_query->have_posts() ) : $wp_query->the_post(); 
					get_template_part( 'template-parts/loops/loop', 'entry-home' );
				endwhile; 
			?>
		</div><?php
	endif;
?>