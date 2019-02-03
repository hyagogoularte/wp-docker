<?php 
	global $homeland_max_num_pages;

	$homeland_agent_page_order = get_option( 'homeland_agent_page_order' );
	$homeland_agent_page_orderby = get_option( 'homeland_agent_page_orderby' );
	$homeland_agent_page_limit = get_option( 'homeland_agent_page_limit' );

	$homeland_agent_page_limit_value = empty( $homeland_agent_page_limit ) ? '10' : $homeland_agent_page_limit;
?>

<div class="agent-container post-bottom-4em">
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
		    global $wpdb;
				$homeland_post_author = $homeland_user->ID;
				$homeland_count = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'homeland_properties' AND post_status = 'publish' AND post_author = %d", $homeland_post_author ) );

				$homeland_agent_id = $homeland_user->ID;
		   	$homeland_agent_name = $homeland_user->display_name;
		   	$homeland_agent_desc = $homeland_user->user_description;
				$homeland_agent_facebook = $homeland_user->homeland_facebook;
		   	$homeland_agent_gplus = $homeland_user->homeland_gplus;
		   	$homeland_agent_linkedin = $homeland_user->homeland_linkedin;
		   	$homeland_agent_twitter = $homeland_user->homeland_twitter;
		   	$homeland_agent_email = $homeland_user->user_email;
		   	$homeland_agent_telno = $homeland_user->homeland_telno;
				$homeland_agent_mobile = $homeland_user->homeland_mobile;
				$homeland_agent_fax = $homeland_user->homeland_fax;
				$homeland_agent_designation = $homeland_user->homeland_designation;
				$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $homeland_agent_id );
				$homeland_agent_desc_trim = wp_trim_words( $homeland_agent_desc, $homeland_num_words = 60, $homeland_more = null );
				$homeland_agent_url = get_author_posts_url( $homeland_agent_id ); ?>

	    	<div class="row agent-list post-bottom clearfix">
	    		<div class="post-col-4 agent-image">
	    			<div class="grid cs-style-3">	
	    				<figure class="pimage">
	    					<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
		    					<?php if( !empty( $homeland_custom_avatar ) ) : ?>
										<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" srcset="<?php echo esc_url( $homeland_custom_avatar ); ?> 600w" sizes="(max-width: 568px) 100vw, (max-width: 736px) 90vw, (max-width: 768px) 50vw, (max-width: 1024px) 30vw, 340px">
									<?php else : 
		    							echo get_avatar( $homeland_agent_id, 600 );
		    						endif;
		    					?>
	    					</a>
	    					<figcaption>
	    						<a href="<?php echo esc_url( $homeland_agent_url ); ?>"><i class="fa fa-link fa-lg"></i></a>
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
	    		</div>

	    		<!-- Agent Descriptions -->
	    		<div class="post-col-8">
	    			<div class="agent-desc">
	    				<h4>
		    				<a href="<?php echo esc_url( $homeland_agent_url ); ?>"><?php echo esc_html( $homeland_agent_name ); ?></a>
		    			</h4>
		    			<?php 
		    				if( !empty( $homeland_agent_designation ) ) :
		    					echo "<h5>" . esc_html( $homeland_agent_designation ) . "</h5>";
		    				endif;
		    				echo wpautop( $homeland_agent_desc_trim ); 
		    			?>
		    			<label class="more-info">
		    				<?php
		    					if( !empty( $homeland_agent_telno ) ) : ?>
		    						<span>
		    							<strong><?php esc_html_e( 'Tel no', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $homeland_agent_telno ); ?>
		    						</span><?php
		    					endif;
		    					if( !empty( $homeland_agent_mobile ) ) : ?>
		    						<span>
		    							<strong><?php esc_html_e( 'Mobile', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $homeland_agent_mobile ); ?>
		    						</span><?php
		    					endif;
		    					if( !empty( $homeland_agent_fax ) ) : ?>
		    						<span>
		    							<strong><?php esc_html_e( 'Fax', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $homeland_agent_fax ); ?>
		    						</span><?php
		    					endif;
			    			?>
		    			</label>
		    			<label class="listed">
			    			<?php esc_html_e( 'Listed', 'homeland' ); echo ":"; ?>
			    			<span>
			    				<?php printf( esc_html( _n( '%d Property', '%d Properties', esc_html( $homeland_count ), 'homeland'  ) ), esc_html( $homeland_count ) ); ?>
			    			</span>
			    		</label>
		    		</div>
	    		</div>	
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