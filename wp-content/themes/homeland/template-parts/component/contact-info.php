<?php 
	$homeland_phone_number = get_option( 'homeland_phone_number' );
	$homeland_fax = get_option( 'homeland_fax' );
	$homeland_contact_address = get_option( 'homeland_contact_address' );
	$homeland_email_address = get_option( 'homeland_email_address' );
	$homeland_working_hours = get_option( 'homeland_working_hours' );

	if( !empty( $homeland_contact_address ) ) : ?>
		<label class="contact-address"><span><?php esc_html_e( 'Address', 'homeland' ); echo ":"; ?></span> <?php echo wp_kses_post( $homeland_contact_address ); ?></label><?php
	endif;
	if( !empty( $homeland_working_hours ) ) : ?>
		<label class="working-hours"><span><?php esc_html_e( 'Working Hours', 'homeland' ); echo ":"; ?></span> <?php echo esc_html( $homeland_working_hours ); ?></label><?php
	endif;
	if( !empty( $homeland_phone_number ) ) : ?>
		<label class="phone-number"><span><?php esc_html_e( 'Phone', 'homeland' ); echo ":"; ?></span> <?php echo esc_html( $homeland_phone_number ); ?></label><?php
	endif;
	if( !empty( $homeland_email_address ) ) : ?>
		<label class="email-address"><span><?php esc_html_e( 'Email', 'homeland' ); echo ":"; ?></span> <a href="mailto:<?php echo is_email( $homeland_email_address ); ?>"><?php echo is_email( $homeland_email_address ); ?></a></label><?php
	endif;
	if( !empty( $homeland_fax ) ) : ?>
		<label class="contact-fax"><span><?php esc_html_e( 'Fax', 'homeland' ); echo ":"; ?></span> <?php echo esc_html( $homeland_fax ); ?></label><?php
	endif;
?>