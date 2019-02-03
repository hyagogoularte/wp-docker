<?php 
	$homeland_clickable_amenities = get_option( 'homeland_clickable_amenities' );
	$homeland_property_amenities = get_the_term_list( $post->ID, 'homeland_property_amenities', '<li>', '</li><li>', '</li>' );
	$homeland_terms = get_the_terms( $post->ID, 'homeland_property_amenities' );
	$homeland_count = count( $homeland_terms );
?>

<?php if( !empty( $homeland_property_amenities ) ) : ?>
	<div class="property-amenities post-bottom">
		<h4>
			<?php 
				echo homeland_option( 'homeland_property_amenities_header', esc_html__( 'Amenities', 'homeland' ) );
			?>
		</h4>
		<ul class="clearfix">
			<?php 
				if( empty( $homeland_clickable_amenities ) ) : 
					if ( $homeland_count > 0 ) :
						foreach ( $homeland_terms as $homeland_term ) : 
							echo "<li>". esc_html( $homeland_term->name ) ."</li>";
					  endforeach;
					endif; 
				else : 
					echo wp_kses_post( $homeland_property_amenities ); 
				endif;
			?>
		</ul>
	</div>
<?php endif; ?>