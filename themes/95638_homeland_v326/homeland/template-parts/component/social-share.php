<?php
	global $post;

	$homeland_share_url = urlencode( get_permalink() );
	$homeland_share_title = str_replace( ' ', '%20', get_the_title());
	$homeland_share_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	$homeland_twitter_url = 'https://twitter.com/intent/tweet?text='. $homeland_share_title .'&amp;url='. $homeland_share_url;
	$homeland_facebook_url = 'https://facebook.com/sharer/sharer.php?u='. $homeland_share_url;
	$homeland_pinterest_url = 'https://pinterest.com/pin/create/button/?url='. $homeland_share_url .'&amp;media='. $homeland_share_thumb[0] .'&amp;description='. $homeland_share_title;
	$homeland_gplus_url = 'https://plus.google.com/share?url={'. $homeland_share_url .'}&amp;title='. $homeland_share_title; 
	$homeland_linkedin_url = 'http://linkedin.com/shareArticle?mini=true&amp;url='. $homeland_share_url .'&amp;title='. $homeland_share_title; 

	$homeland_floating_share = get_option( 'homeland_floating_share' );
	$homeland_floating_share_class = !empty( $homeland_floating_share ) ? "floating-share" : "share post-bottom clearfix";
?>

<div class="<?php echo esc_attr( $homeland_floating_share_class ); ?>">
	<span><?php esc_html_e( 'Share', 'homeland' ); ?><i class="fas fa-share-square fa-lg"></i></i></span>
	<ul class="clearfix">	
		<li class="facebook"><a href="<?php echo esc_url( $homeland_facebook_url ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;" target="_blank" title="Facebook"><i class="fab fa-facebook-f fa-lg"></i></a></li>
		<li class="twitter"><a href="<?php echo esc_url( $homeland_twitter_url ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;" target="_blank" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a></li>
		<li class="gplus"><a href="<?php echo esc_url( $homeland_gplus_url ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;" target="_blank" title="Google+"><i class="fab fa-google-plus-g fa-lg"></i></a></li>
		<li class="pinterest"><a href="<?php echo esc_url( $homeland_pinterest_url ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=1600');return false;" target="_blank" title="Pinterest"><i class="fab fa-pinterest fa-lg"></i></a></li>
		<li class="linkedin"><a href="<?php echo esc_url( $homeland_linkedin_url ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in fa-lg"></i></a></li>
	</ul>
</div>