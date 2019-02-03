<?php 
	$homeland_all_agents = get_option( 'homeland_all_agents' );
	$homeland_agent_info = get_option( 'homeland_agent_info' );
	$homeland_single_property_layout = get_option( 'homeland_single_property_layout' );

	$homeland_agent_mobile = get_the_author_meta( 'homeland_mobile' );
	$homeland_agent_telno = get_the_author_meta( 'homeland_telno' );
	$homeland_agent_fax = get_the_author_meta( 'homeland_fax' );
	$homeland_agent_desc = get_the_author_meta( 'description' );
	$homeland_agent_fname = get_the_author_meta( 'user_firstname' );
	$homeland_agent_lname = get_the_author_meta( 'user_lastname' ); 
	$homeland_agent_id = get_the_author_meta( 'ID' );
	$homeland_agent_facebook = get_the_author_meta( 'homeland_facebook' );
	$homeland_agent_gplus = get_the_author_meta( 'homeland_gplus' );
	$homeland_agent_linkedin= get_the_author_meta( 'homeland_linkedin' );
	$homeland_agent_twitter = get_the_author_meta( 'homeland_twitter' );
	$homeland_agent_email = get_the_author_meta( 'user_email' );
	$homeland_agent_designation = get_the_author_meta( 'homeland_designation' );
	$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $wp_query->ID );
	$homeland_agent_desc_trim = wp_trim_words( $homeland_agent_desc, $homeland_num_words = 60, $homeland_more = null );

	if( 'Fullwidth' === $homeland_single_property_layout ) :
		$homeland_agent_list_class = "post-col-9 agent-list";
		$homeland_agent_form_class = "post-col-3 agent-form";
		$homeland_agent_image_class = "post-col-4 agent-image";
		$homeland_agent_desc_class = "post-col-8 agent-desc";
	else :
		$homeland_agent_list_class = "post-col-8 agent-list";
		$homeland_agent_form_class = "post-col-4 agent-form";
		$homeland_agent_image_class = "post-col-6 agent-image";
		$homeland_agent_desc_class = "post-col-6 agent-desc";
	endif;

	if( empty( $homeland_all_agents ) ) :
		if( empty( $homeland_agent_info ) ) : ?>
			<div class="row clearfix">	

				<div class="<?php echo esc_attr( $homeland_agent_list_class ); ?>">
					<div class="row post-bottom-3em clearfix">
						<div class="<?php echo esc_attr( $homeland_agent_image_class ); ?>">
		    			<div class="grid cs-style-3">	
		    				<figure class="pimage">
		    					<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>">
		    						<?php if( !empty( $homeland_custom_avatar ) ) : ?>
		    							<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" srcset="<?php echo esc_url( $homeland_custom_avatar ); ?> 600w" sizes="(max-width: 568px) 100vw, (max-width: 736px) 80vw, (max-width: 768px) 30vw, (max-width: 1024px) 26vw, 245px">
		    						<?php else : 
		    								echo get_avatar( $homeland_agent_id, 600 );
										endif;
									?>
		    					</a>
		    					<figcaption>
		    						<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>"><i class="fas fa-link fa-lg"></i></a>
		    					</figcaption>
		    				</figure>
		    			</div>
		    			<div class="agent-social">
		    				<ul class="clearfix">
		    					<?php
		    						if( !empty( $homeland_agent_facebook ) ) : ?>
		    							<li><a href="<?php echo esc_url( $homeland_agent_facebook ); ?>" target="_blank"><i class="fab fa-facebook-f fa-lg"></i></a></li><?php
		    						endif;
		    						if( !empty( $homeland_agent_gplus ) ) : ?>
		    							<li><a href="<?php echo esc_url( $homeland_agent_gplus ); ?>" target="_blank"><i class="fab fa-google-plus-g fa-lg"></i></a></li><?php
		    						endif;
		    						if( !empty( $homeland_agent_linkedin ) ) : ?>
		    							<li><a href="<?php echo esc_url( $homeland_agent_linkedin ); ?>" target="_blank"><i class="fab fa-linkedin-in fa-lg"></i></a></li><?php
		    						endif;
		    						if( !empty( $homeland_agent_twitter ) ) : ?>
		    							<li><a href="<?php echo esc_url( $homeland_agent_twitter ); ?>" target="_blank"><i class="fab fa-twitter fa-lg"></i></a></li><?php
		    						endif;
		    						if( !empty( $homeland_agent_email ) ) : ?>
		    							<li class="last"><a href="mailto:<?php echo is_email( $homeland_agent_email ); ?>" target="_blank"><i class="far fa-envelope fa-lg"></i></a></li><?php
		    						endif;
		    					?>
		    				</ul>
		    			</div>
		    		</div>

		    		<!-- Agent Descriptions -->
		    		<div class="<?php echo esc_attr( $homeland_agent_desc_class ); ?>">
		    			<h4>
		    				<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>"><?php echo esc_html( $homeland_agent_fname ) . "&nbsp;" . esc_html( $homeland_agent_lname ); ?></a>
		    			</h4>
		    			<?php
		    				if( !empty( $homeland_agent_designation ) ) :
		    					echo "<h5>". esc_html( $homeland_agent_designation ) ."</h5>";
		    				endif;
		    				echo wpautop ( $homeland_agent_desc_trim ); 
		    			?>
		    			<label class="more-info">
		    				<?php
		    					if( !empty( $homeland_agent_telno ) ) : ?>
		    						<span><i class="fas fa-phone"></i><strong><?php esc_html_e( 'Tel no', 'homeland' ); echo ":"; ?></strong>
		    							<?php echo esc_html( $homeland_agent_telno ); ?></span><?php
		    					endif;
		    					if( !empty( $homeland_agent_mobile ) ) : ?>
		    						<span><i class="fas fa-mobile-alt"></i><strong><?php esc_html_e( 'Mobile', 'homeland' ); echo ":"; ?></strong>
		    							<?php echo esc_html( $homeland_agent_mobile ); ?></span><?php
		    					endif;
		    					if( !empty( $homeland_agent_fax ) ) : ?>
		    						<span><i class="fas fa-fax"></i><strong><?php esc_html_e( 'Fax', 'homeland' ); echo ":"; ?></strong>
		    							<?php echo esc_html( $homeland_agent_fax ); ?></span><?php
		    					endif;
		    				?>
		    			</label>
			    		<a href="<?php echo esc_url( get_author_posts_url( $homeland_agent_id ) ); ?>" class="view-profile">
			    			<?php 
			    				echo homeland_option( 'homeland_agent_button', esc_html__( 'View Profile', 'homeland' ) );
			    			?>
			    		</a>
		    		</div>
					</div>
		    </div>

	    	<!-- Agent Form -->
	    	<div class="<?php echo esc_attr( $homeland_agent_form_class ); ?>" id="agent-form">
	    		<h4><?php echo homeland_option( 'homeland_agent_form', esc_html__( 'Inquiry', 'homeland' ) ); ?></h4>
	    		<?php echo do_shortcode( get_option( 'homeland_agent_form_shortcode' ) ); ?>
	    	</div>
			</div><?php
		endif;
	endif;
?>