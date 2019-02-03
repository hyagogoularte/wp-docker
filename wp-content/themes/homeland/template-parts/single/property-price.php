<?php 
	if( !empty( $post->homeland_contact_price ) ) : ?>
		<span class="property-page-price">
			<?php esc_html_e( 'Contact us for Price', 'homeland' ); ?>
		</span><?php
	else :
		if( !empty( $post->homeland_price ) ) : ?>
			<span class="property-page-price">
				<?php homeland_property_price_format(); ?>
			</span><?php
		endif;	
	endif;
?>