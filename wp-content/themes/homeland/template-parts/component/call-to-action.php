<?php
	$homeland_cta_button_link = get_option( 'homeland_cta_button_link' );
	$homeland_cta_link_target = get_option( 'homeland_cta_link_target' );
?>

<section class="homepage-call-to-action post-bottom-5em" data-paroller-factor="0.3">
	<div class="overlay">&nbsp;</div>
	<div class="inside clearfix">
		<div class="post-col-9">
			<h4>
				<?php echo homeland_option( 'homeland_cta_text', esc_html__( 'Add your call to action text description here.', 'homeland' ) ); ?>
			</h4>
		</div>
		<div class="post-col-3 textcenter">
			<?php if( !empty( $homeland_cta_button_link ) ) : ?>
				<a href="<?php echo esc_url( $homeland_cta_button_link ); ?>" target="<?php echo esc_html( $homeland_cta_link_target ); ?>">
					<?php echo homeland_option( 'homeland_cta_button', esc_html__( 'Contact Us', 'homeland' ) );?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>