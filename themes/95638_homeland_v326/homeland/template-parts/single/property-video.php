<?php if( !empty( $post->homeland_property_video ) ) : ?>
	<h4>
		<?php 
			echo homeland_option( 'homeland_property_video_header', esc_html__( 'Property Video', 'homeland' ) );
		?>
	</h4>
	<?php echo wp_oembed_get( $post->homeland_property_video, array() );
	endif;
?>