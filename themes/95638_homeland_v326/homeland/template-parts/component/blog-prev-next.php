<?php
	$homeland_hide_blog_prevnext = get_option( 'homeland_hide_blog_prevnext' );
		
	if( empty( $homeland_hide_blog_prevnext ) ): ?>
		<div class="post-link-blog clearfix">
			<span class="prev">
				<?php 
					previous_post_link( '%link', '&larr;&nbsp;' . esc_html__( 'Previous Post', 'homeland' ), '' ); 
				?>
			</span>
			<span class="next">
				<?php 
					next_post_link( '%link', esc_html__( 'Next Post', 'homeland' ) . '&nbsp;&rarr;', '' ); 
				?>
			</span>
		</div><?php
	endif;
?>