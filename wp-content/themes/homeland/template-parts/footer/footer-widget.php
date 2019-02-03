<?php 
	$homeland_hide_widgets = get_option( 'homeland_hide_widgets' );

	if( empty( $homeland_hide_widgets ) ) : ?>
		<section class="footer-widgets post-bottom-3em">
			<div class="inside clearfix">
				<?php 
					if ( is_active_sidebar( 'homeland_footer_one' ) ) : 
						echo "<div class='post-col-3 widget-column'>";
							dynamic_sidebar( 'homeland_footer_one' );
						echo "</div>";
					endif;

					if ( is_active_sidebar( 'homeland_footer_two' ) ) : 
						echo "<div class='post-col-3 widget-column'>";
							dynamic_sidebar( 'homeland_footer_two' );
						echo "</div>";
					endif;

					if ( is_active_sidebar( 'homeland_footer_three' ) ) : 
						echo "<div class='post-col-3 widget-column'>";
							dynamic_sidebar( 'homeland_footer_three' );
						echo "</div>";
					endif;

					if ( is_active_sidebar( 'homeland_footer_four' ) ) : 
						echo "<div class='post-col-3 widget-column last'>";
							dynamic_sidebar( 'homeland_footer_four' );
						echo "</div>";
					endif;
				?>
			</div>
		</section><?php						
	endif;
?>