<?php	
	$homeland_video_url = get_option( 'homeland_video_url' );

	echo '<section class="home-video-block">';
		//echo wp_oembed_get( esc_url( $homeland_video_url ), array() );
		echo do_shortcode( '[video src="'. esc_url( $homeland_video_url ) .'"]' );
	echo '</section>';
?>