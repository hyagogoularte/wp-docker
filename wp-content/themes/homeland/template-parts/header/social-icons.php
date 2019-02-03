<?php
	$homeland_brand_color = get_option( 'homeland_brand_color' );
	$homeland_twitter = get_option( 'homeland_twitter' );
	$homeland_facebook = get_option( 'homeland_facebook' );
	$homeland_pinterest = get_option( 'homeland_pinterest' );
	$homeland_dribbble = get_option( 'homeland_dribbble' );
	$homeland_instagram = get_option( 'homeland_instagram' );
	$homeland_rss = get_option( 'homeland_rss' );
	$homeland_youtube = get_option( 'homeland_youtube' );
	$homeland_gplus = get_option( 'homeland_gplus' );
	$homeland_linkedin = get_option( 'homeland_linkedin' );

	$homeland_brand_share_class = !empty( $homeland_brand_color ) ? "social-colors social floatleft" : "social floatleft";
?>

<div class="<?php echo esc_attr( $homeland_brand_share_class ); ?>">
	<ul class="clearfix">
		<?php 	
			if(!empty( $homeland_twitter )) :
				echo "<li class='twitter'><a href='http://twitter.com/" . esc_html( $homeland_twitter ) . "' target='_blank'><i class='fab fa-twitter'></i></a></li>";
			endif; 
			if(!empty( $homeland_facebook )) : 
				echo "<li class='facebook'><a href='http://facebook.com/" . esc_html( $homeland_facebook ) ."' target='_blank'><i class='fab fa-facebook-f'></i></a></li>";
			endif; 
			if(!empty( $homeland_youtube )) :
				echo "<li class='youtube'><a href='" . esc_url( $homeland_youtube ) . "' target='_blank'><i class='fab fa-youtube'></i></a></li>";
			endif; 
			if(!empty( $homeland_linkedin )) : 
				echo "<li class='linkedin'><a href='" . esc_url( $homeland_linkedin ) . "' target='_blank'><i class='fab fa-linkedin-in'></i></a></li>"; 
			endif; 
			if(!empty( $homeland_pinterest )) : 
				echo "<li class='pinterest'><a href='http://pinterest.com/" . esc_html( $homeland_pinterest ) . "' target='_blank'><i class='fab fa-pinterest'></i></a></li>";
			endif; 
			if(!empty( $homeland_dribbble )) : 
				echo "<li class='dribbble'><a href='http://dribbble.com/" . esc_html( $homeland_dribbble ) . "' target='_blank'><i class='fab fa-dribbble'></i></a></li>";
			endif; 
			if(!empty( $homeland_gplus )) : 	
				echo "<li class='gplus'><a href='" . esc_url( $homeland_gplus ) . "' target='_blank'><i class='fab fa-google-plus-g'></i></a></li>"; 
			endif;
			if(!empty( $homeland_instagram )) : 
				echo "<li class='instagram'><a href='http://instagram.com/" . esc_html( $homeland_instagram ) . "' target='_blank'><i class='fab fa-instagram'></i></a></li>"; 
			endif; 
			if(!empty( $homeland_rss )) : 
				echo "<li class='rss'><a href='" . esc_url( $homeland_rss ) . "' target='_blank'><i class='fas fa-rss'></i></a></li>";
			endif;  
		?>	
	</ul>
</div>