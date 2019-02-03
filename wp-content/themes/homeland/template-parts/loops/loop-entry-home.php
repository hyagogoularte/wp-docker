<?php 
	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url(
			get_post_thumbnail_id(), 'homeland_large_thumb' ) .' 600w',
		'sizes' => '(max-width: 568px) 50vw, 
			(max-width: 736px) 40vw, 
			(max-width: 768px) 30vw, 
			(max-width: 1024px) 20vw, 153px' 
	);
?>
<div id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'row post-bottom clearfix' ) ); ?>>
	<div class="post-col-6">
		<div class="bimage">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'homeland_large_thumb', $homeland_img_attr ); ?>
				</a>
			<?php else : ?>
				<label class="no-image-fallback image-blog">
					<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
				</label>
			<?php endif; ?>
		</div>
	</div>
	<div class="post-col-6">
		<div class="bdesc">
			<?php	
				the_title( sprintf( '<h5><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' );  
			?>
			<label>
				<?php echo sprintf( esc_html__( 'Posted by: %1s | %2s', 'homeland' ), get_the_author_meta( 'user_firstname' ), get_the_time( get_option( 'date_format' ) ) ); ?>
			</label>
		</div>
	</div>
</div>