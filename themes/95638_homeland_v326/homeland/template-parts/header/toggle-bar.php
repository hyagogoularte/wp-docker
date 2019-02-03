<?php 
	$homeland_enable_slide_bar = get_option( 'homeland_enable_slide_bar' );
	$homeland_theme_layout = get_option( 'homeland_theme_layout' );
	$homeland_top_slide_class = "";

	if( 'Boxed Left' === $homeland_theme_layout ) :
		$homeland_top_slide_class = "sliding-bar-left";
	endif;
?>

<?php if( !empty( $homeland_enable_slide_bar ) ) : ?>
	<div class="top-toggle">
		<div class="sliding-bar <?php echo esc_attr( $homeland_top_slide_class ); ?>">
			<div class="inside">
				<div class="header-widgets clearfix">
					<?php
						if ( is_active_sidebar( 'homeland_sliding_bar' ) ) : 
							dynamic_sidebar( 'homeland_sliding_bar' );
						else : esc_html_e( 'Please add sliding bar widget here!', 'homeland' );
						endif;
					?>	
				</div>
			</div>
		</div>
		<a href="#" class="slide-toggle">&nbsp;</a>
	</div>
<?php endif; ?>