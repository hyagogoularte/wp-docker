<?php 
	$homeland_hide_map = get_option( 'homeland_hide_map' ); 
	$homeland_show_street_view = get_option( 'homeland_show_street_view' );

	if( empty( $post->homeland_property_hide_map ) ) : 
		if( empty( $homeland_hide_map ) ) : ?>
			<h4>
				<?php 
					echo homeland_option( 'homeland_property_map_header', esc_html__( 'Property Map', 'homeland' ) );
				?>
			</h4>
			<section id="map-property"></section>
			<?php if( !empty( $homeland_show_street_view ) ) : ?>
				<section id="map-property-street"></section>
			<?php endif; 
		endif;
	endif; 
?>