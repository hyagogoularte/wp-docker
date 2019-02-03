<?php
	$homeland_working_hours = get_option( 'homeland_working_hours' );
	$homeland_contact_address = get_option( 'homeland_contact_address' );
?>			

<div class="header-contact-info clearfix">
	<?php if( !empty( $homeland_working_hours ) ) : ?>
		<div class="info-list">
			<i class="far fa-clock fa-2x"></i>
			<label><?php esc_html_e( 'Working Hours', 'homeland' ); ?></label>
			<span><?php echo esc_html( $homeland_working_hours ); ?></span>
		</div>
	<?php endif; ?>

	<?php if( !empty( $homeland_contact_address ) ) : ?>
		<div class="info-list company-address">
			<i class="fas fa-map-marker-alt fa-2x"></i>
			<label><?php esc_html_e( 'Company Address', 'homeland' ); ?></label>
			<span><?php echo wp_kses_post( $homeland_contact_address ); ?></span>
		</div>
	<?php endif; ?>
</div>