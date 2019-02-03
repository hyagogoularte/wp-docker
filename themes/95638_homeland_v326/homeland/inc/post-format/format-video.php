<?php
	$homeland_large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'homeland_theme_large');

	if( !empty( $post->homeland_video ) ) : 
		if( !empty( $post->homeland_video_host ) ) : ?>
			<video id="videojs_blog" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="100%" height="500" poster="<?php echo esc_url( $homeland_large_image_url[0] ); ?>" data-setup="{}">
				<source src="<?php echo esc_url( $post->homeland_video ); ?>" type='video/mp4' />
			  <source src="<?php echo esc_url( $post->homeland_video ); ?>" type='video/webm' />
			  <source src="<?php echo esc_url( $post->homeland_video ); ?>" type='video/ogg' />
			</video><?php
		else : 
			echo wp_oembed_get( $post->homeland_video, array() );
		endif;
	endif;
?>