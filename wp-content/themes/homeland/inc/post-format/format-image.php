<?php 
	$homeland_single_blog_layout = get_option( 'homeland_single_blog_layout' );

	if( 'Fullwidth' === $homeland_single_blog_layout ) :
		$homeland_img_attr = array( 
			'srcset' => wp_get_attachment_image_url( 
				get_post_thumbnail_id(), 'homeland_bigger_image' ) .' 1200w',
			'sizes' => '(max-width: 568px) 100vw, 
				(max-width: 736px) 80vw, 
				(max-width: 768px) 90vw, 
				(max-width: 1024px) 96vw, 1070px' 
		);
	else :
		$homeland_img_attr = array( 
			'srcset' => wp_get_attachment_image_url( 
				get_post_thumbnail_id(), 'homeland_bigger_image' ) .' 1200w',
			'sizes' => '(max-width: 568px) 100vw, 
				(max-width: 736px) 80vw, 
				(max-width: 768px) 60vw, 
				(max-width: 1024px) 70vw, 795px' 
		);
	endif;
?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="blog-image">
		<div class="blog-large-image">
			<?php if ( is_sticky() ) : ?>
				<div class="sticky-post"><?php esc_html_e( 'Sticky Post', 'homeland' ); ?></div>
			<?php endif; ?>
			<?php the_post_thumbnail( 'homeland_bigger_image', $homeland_img_attr ); ?>
		</div>
	</div>
<?php else : ?>
	<label class="no-image-fallback">
		<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
	</label>
<?php endif; ?>