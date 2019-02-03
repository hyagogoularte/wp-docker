<?php 
  global $homeland_max_num_pages;

	$homeland_agent_page_order = get_option( 'homeland_agent_page_order' );
	$homeland_agent_page_orderby = get_option( 'homeland_agent_page_orderby' );
	$homeland_agent_page_limit = get_option( 'homeland_agent_page_limit' );
	
	$homeland_agent_page_limit_value = empty( $homeland_agent_page_limit ) ? '10' : $homeland_agent_page_limit;
?>

<div class="row grid-cols agents-fullwidth post-bottom-2em clearfix">
	<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		if( $paged==1 ) : $offset=0;  
		else : $offset= ( $paged-1 )*$homeland_agent_page_limit_value;
		endif;

		$args = array( 
			'role' => 'contributor', 
			'order' => $homeland_agent_page_order, 
			'orderby' => $homeland_agent_page_orderby,
			'number' => $homeland_agent_page_limit_value, 
			'offset' => $offset
		);
	  $homeland_agents = new WP_User_Query( $args );		   

		if( !empty( $homeland_agents->results ) ) :
		  foreach( $homeland_agents->results as $homeland_user ) :
			$homeland_agent_id = $homeland_user->ID;
			$homeland_agent_name = $homeland_user->display_name;
			$homeland_agent_designation = $homeland_user->homeland_designation;
			$homeland_agent_facebook = $homeland_user->homeland_facebook;
			$homeland_agent_gplus = $homeland_user->homeland_gplus;
			$homeland_agent_linkedin = $homeland_user->homeland_linkedin;
			$homeland_agent_twitter = $homeland_user->homeland_twitter;
			$homeland_agent_email = $homeland_user->user_email;
			$homeland_agent_desc = $homeland_user->user_description;
			$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $homeland_agent_id );
			$homeland_agent_desc_trim = wp_trim_words( $homeland_agent_desc, $homeland_num_words = 60, $homeland_more = null );
			$homeland_agent_url = get_author_posts_url( $homeland_agent_id ); ?>

			<div class="post-col-3 agent-image">
				<div class="grid cs-style-3">	
					<figure class="pimage">
						<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
							<?php if( !empty( $homeland_custom_avatar ) ) : ?>
				  <img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" srcset="<?php echo esc_url( $homeland_custom_avatar ); ?> 600w" sizes="(max-width: 568px) 100vw, (max-width: 736px) 90vw, (max-width: 768px) 30vw, (max-width: 1024px) 26vw, 245px">
				<?php else : 
									echo get_avatar( $homeland_agent_id, 600 );
								endif;
							?>
						</a>
						<figcaption>
							<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
								<i class="fas fa-link fa-lg"></i>
							</a>
						</figcaption>
					</figure>
				</div>
				<div class="agent-social">
					<ul class="clearfix">
						<?php
							if( !empty( $homeland_agent_facebook ) ) : 
								echo '<li><a href="'. esc_url( $homeland_agent_facebook ) .'" target="_blank">
										<i class="fab fa-facebook-f fa-lg"></i></a></li>';
							endif;
							if( !empty( $homeland_agent_gplus ) ) : 
								echo '<li><a href="'. esc_url( $homeland_agent_gplus ) .'" target="_blank">
										<i class="fab fa-google-plus-g fa-lg"></i></a></li>';
							endif;
							if( !empty( $homeland_agent_linkedin ) ) : 
								echo '<li><a href="'. esc_url( $homeland_agent_linkedin ) .'" target="_blank">
										<i class="fab fa-linkedin-in fa-lg"></i></a></li>';
							endif;
							if( !empty( $homeland_agent_twitter ) ) : 
								echo '<li><a href="'. esc_url( $homeland_agent_twitter ) .'" target="_blank">
										<i class="fab fa-twitter fa-lg"></i></a></li>';
							endif;
							if( !empty( $homeland_agent_email ) ) : 
								echo '<li class="last">
										<a href="mailto:'. is_email( $homeland_agent_email ) .'" target="_blank">
										<i class="far fa-envelope fa-lg"></i></a></li>';
							endif; 
						?>
					</ul>
				</div>
				<h4>
					<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
						<?php echo esc_html( $homeland_agent_name ); ?>
					</a>
				</h4>
				<h5><?php echo esc_html( $homeland_agent_designation ); ?></h5>
				<?php echo wpautop( $homeland_agent_desc_trim ); ?>
			</div><?php
		  endforeach;
		else : 
			esc_html_e( 'No Agents found!', 'homeland' );
		endif;
	?>
</div>

<?php 	
	$homeland_total_user = $homeland_agents->total_users;  
  $homeland_max_num_pages = ceil( $homeland_total_user/$homeland_agent_page_limit_value );

	get_template_part( 'template-parts/component/paging' );
?>