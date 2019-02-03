<?php 
	get_header(); 
	
	$homeland_media_type = get_post_mime_type( $post->ID );
	$homeland_media_url = wp_get_attachment_url( $post->ID );
	$homeland_media_alt_text = get_post_meta( $post->ID, '_wp_attachment_image_alt', true );
	$homeland_media_excerpt = $post->post_excerpt;
	$homeland_media_content = $post->post_content;
?>

	<!-- attachment page -->
	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-12 theme-fullwidth attachment-page">
				<?php 
					switch ( $homeland_media_type ) {
						// documents
						case 'application/pdf':
						case 'application/rtf': ?>
							<iframe src="http://docs.google.com/viewer?url=<?php echo esc_url( $homeland_media_url ); ?>&amp;embedded=true" width="100%" height="500" style="border: none;"></iframe><?php 
						break;
						
						// audio
						case 'audio/mpeg': ?>
							<audio>
								<source src="<?php echo esc_url( $homeland_media_url ); ?>" type="audio/mpeg" />
							</audio><?php 
						break;
						
						// video
						case 'video/mp4': ?>
							<video controls>
								<source src="<?php echo esc_url( $homeland_media_url ); ?>" type='video/mp4' />
							</video><?php 
						break;

						default: 
							echo wp_get_attachment_image( get_the_ID(), 'full' );
					} 

					if ( !empty( $homeland_media_alt_text ) ) : ?>
						<h3><?php echo esc_html( $homeland_media_alt_text ); ?></h3><?php 
					endif;

					if ( !empty( $homeland_media_excerpt ) ) : ?>
						<span><?php echo esc_html( $homeland_media_excerpt ); ?></span><?php 
					endif; 

					if ( !empty( $homeland_media_content ) ) : ?>
						<p><?php echo esc_html( $homeland_media_content ); ?></p><?php
					endif;
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>