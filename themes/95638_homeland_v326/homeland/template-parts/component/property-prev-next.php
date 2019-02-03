<?php 
	$homeland_hide_property_prevnext = get_option( 'homeland_hide_property_prevnext' );
?>

<?php if( empty( $homeland_hide_property_prevnext ) ) : ?>
	<div class="post-link-blog clearfix">
		<span class="prev">
			<?php 
				previous_post_link( 
					'%link', '&larr;&nbsp;' . esc_html__( 'Previous Property', 'homeland' ), '' 
				); 
			?>
		</span>
		<span class="next">
			<?php next_post_link( '%link', esc_html__( 'Next Property', 'homeland' ) . '&nbsp;&rarr;', '' ); ?>
		</span>
	</div>
<?php endif; ?>