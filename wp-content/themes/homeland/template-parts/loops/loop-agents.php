<?php 
	global $homeland_count; 

	$homeland_agent_id = $homeland_user->ID;
	$homeland_agent_name = $homeland_user->display_name;
	$homeland_agent_facebook = $homeland_user->homeland_facebook;
 	$homeland_agent_gplus = $homeland_user->homeland_gplus;
 	$homeland_agent_linkedin = $homeland_user->homeland_linkedin;
 	$homeland_agent_twitter = $homeland_user->homeland_twitter;
 	$homeland_agent_email = $homeland_user->user_email;
 	$homeland_agent_designation = $homeland_user->homeland_designation;
 	$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $homeland_agent_id );
?>
<div class="agent-list <?php if( $list_counter % 3 == 0 ) : echo "last"; endif; ?>">
	<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>">
		<?php if( !empty( $homeland_custom_avatar ) ) : ?>
			<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" srcset="<?php echo esc_url( $homeland_custom_avatar ); ?> 600w" sizes="(max-width: 568px) 100vw, (max-width: 736px) 90vw, (max-width: 768px) 40vw, (max-width: 1024px) 30vw, 245px">
		<?php else : 
				echo get_avatar( $homeland_agent_id, 600 ); 
			endif; 
		?>
	</a>
	<h4>
		<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>">
			<?php echo esc_html( $homeland_agent_name ); ?>
		</a>
	</h4>
	<?php if( !empty( $homeland_agent_designation ) ) : ?>
		<h5><?php echo esc_html( $homeland_agent_designation ); ?></h5>
	<?php endif; ?>
	<span class="agent-count">
		<?php printf( esc_html( _n( '%d Property', '%d Properties', $homeland_count, 'homeland'  ) ), $homeland_count ); ?>
	</span>
	<ul class="clearfix">
		<?php
			if(!empty($homeland_agent_facebook)) : 
				echo '<li><a href="'. esc_url( $homeland_agent_facebook ) .'" target="_blank">
						<i class="fab fa-facebook-f fa-lg"></i></a></li>';
			endif;
			if(!empty($homeland_agent_gplus)) : 
				echo '<li><a href="'. esc_url( $homeland_agent_gplus ) .'" target="_blank">
						<i class="fab fa-google-plus-g fa-lg"></i></a></li>';
			endif;
			if(!empty($homeland_agent_linkedin)) : 
				echo '<li><a href="'. esc_url( $homeland_agent_linkedin ) .'" target="_blank">
						<i class="fab fa-linkedin-in fa-lg"></i></a></li>';
			endif;
			if(!empty($homeland_agent_twitter)) : 
				echo '<li><a href="'. esc_url( $homeland_agent_twitter ) .'" target="_blank">
						<i class="fab fa-twitter fa-lg"></i></a></li>';
			endif;
			if(!empty($homeland_agent_email)) : 
				echo '<li class="last">
						<a href="mailto:'. is_email( $homeland_agent_email ) .'" target="_blank">
						<i class="far fa-envelope fa-lg"></i></a></li>';
			endif; 
		?>
	</ul>
</div>