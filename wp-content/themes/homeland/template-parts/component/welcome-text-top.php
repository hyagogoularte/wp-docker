<?php
	$homeland_welcome_header = get_option( 'homeland_welcome_header' );
	$homeland_welcome_text = get_option( 'homeland_welcome_text' );
	$homeland_welcome_link = get_option( 'homeland_welcome_link' );
?>
<section class="welcome-block-top post-bottom-5em">
	<div class="inside">
		<div class="post-col-12">
			<h2><?php echo esc_html( $homeland_welcome_header ); ?></h2>
			<label><?php echo wp_kses_post( $homeland_welcome_text ); ?></label>
			<?php if( !empty( $homeland_welcome_link ) ) : ?>
				<a href="<?php echo esc_url( $homeland_welcome_link ); ?>" class="view-property"><?php echo homeland_option( 'homeland_welcome_button', esc_html__( 'View Properties', 'homeland' ) ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>