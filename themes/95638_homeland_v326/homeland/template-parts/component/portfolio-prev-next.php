<?php
	$homeland_hide_portfolio_prevnext = get_option( 'homeland_hide_portfolio_prevnext' );
		
	if( empty( $homeland_hide_portfolio_prevnext ) ) : ?>
		<div class="post-link-blog clearfix">
			<span class="prev">
				<?php previous_post_link( '%link', '&larr;&nbsp;' . esc_html__( 'Previous Portfolio', 'homeland' ), '' ); ?>
			</span>
			<span class="next">
				<?php next_post_link( '%link', esc_html__( 'Next Portfolio', 'homeland' ) . '&nbsp;&rarr;', '' ); ?>
			</span>
		</div><?php
	endif; 
?>