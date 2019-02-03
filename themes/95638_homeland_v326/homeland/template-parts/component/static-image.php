<?php 
	$homeland_static_image_desc = get_option( 'homeland_static_image_desc' );
?>

<div class="homepage-static-image">
	<div class="overlay">&nbsp;</div>
	<?php if( !empty( $homeland_static_image_desc ) ) : ?>
		<div class="static-image-desc">
			<div class="inside">
				<div class="post-col-12">
					<h4><?php echo esc_html( $homeland_static_image_desc ); ?></h4>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>