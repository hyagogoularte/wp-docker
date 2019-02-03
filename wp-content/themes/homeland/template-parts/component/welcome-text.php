<?php 
	$homeland_welcome_header = get_option( 'homeland_welcome_header' );
	$homeland_welcome_text = get_option( 'homeland_welcome_text' );
	$homeland_welcome_link = get_option( 'homeland_welcome_link' );
	$homeland_welcome_overlay = get_option( 'homeland_welcome_overlay' );
?>
	<section class="welcome-block post-bottom-5em" data-paroller-factor="0.3">
		<?php if( !empty( $homeland_welcome_overlay ) ) : ?>
			<div class="overlay">&nbsp;</div>
		<?php endif; ?>
		<div class="inside">
			<div class="post-col-12">
				
				<?php if( !empty( $homeland_welcome_header ) ) : ?>
					<h2><?php echo esc_html( $homeland_welcome_header ); ?></h2>
				<?php endif; ?>

				<label><?php echo wp_kses_post( $homeland_welcome_text ); ?></label>
				<?php if( !empty( $homeland_welcome_link ) ) : ?>
					<a href="<?php echo esc_url( $homeland_welcome_link ); ?>" class="view-property"><?php echo homeland_option( 'homeland_welcome_button', esc_html__( 'View Properties', 'homeland' ) ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</section>