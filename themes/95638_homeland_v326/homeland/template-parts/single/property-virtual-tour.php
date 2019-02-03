<?php if( !empty( $post->homeland_property_virtual_tour ) ) : ?>
	<h4>
		<?php 
			echo homeland_option( 'homeland_property_virtual_tour_header', esc_html__( 'Virtual Tour', 'homeland' ) );
		?>
	</h4>
	<?php echo wp_kses_post( $post->homeland_property_virtual_tour );
	endif;
?>