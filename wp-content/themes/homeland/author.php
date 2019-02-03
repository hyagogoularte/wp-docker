<?php 
	get_header(); 
	homeland_advance_search(); 

	$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ): get_userdata( intval( $author ) );
	$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $curauth->ID );

	$homeland_agent_profile_layout = get_option( 'homeland_agent_profile_layout' );
	$homeland_agent_hide_property = get_option( 'homeland_agent_hide_property' );

	if( 'Fullwidth' === $homeland_agent_profile_layout ) :
		$homeland_agent_profile_class = "post-col-12 theme-fullwidth list-fullwidth";
		$homeland_agent_list_class = "property-three-cols clearfix";
		$homeland_agent_post_class = "post-col-9 agent-desc";
		$homeland_agent_image_class = "post-col-3 agent-image";
		$homeland_agent_part = "property-3cols";
	elseif( 'Left Sidebar' === $homeland_agent_profile_layout ) :
		$homeland_agent_profile_class = "post-col-9 left-container right";
		$homeland_agent_list_class = "agent-properties";
		$homeland_agent_post_class = "post-col-8 agent-desc";
		$homeland_agent_image_class = "post-col-4 agent-image";
		$homeland_agent_part = "properties";
	else :
		$homeland_agent_profile_class = "post-col-9 left-container";
		$homeland_agent_list_class = "agent-properties";
		$homeland_agent_post_class = "post-col-8 agent-desc";
		$homeland_agent_image_class = "post-col-4 agent-image";
		$homeland_agent_part = "properties";
	endif;
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="<?php echo esc_attr( $homeland_agent_profile_class ); ?>">
				<div class="agent-container">
					<div class="row agent-list post-bottom clearfix">

		    		<!-- agent image and social icons -->
		    		<div class="<?php echo esc_attr( $homeland_agent_image_class ); ?>">
		    			<?php if( !empty( $homeland_custom_avatar ) ) : ?>
    						<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" srcset="<?php echo esc_url( $homeland_custom_avatar ); ?> 600w" sizes="(max-width: 568px) 100vw, (max-width: 736px) 80vw, (max-width: 768px) 60vw, (max-width: 1024px) 26vw, 245px">
    					<?php	else : 
    							echo get_avatar( $curauth->ID, 600 );
    						endif;
    					?>
		    			<div class="agent-social">
		    				<ul class="clearfix">
		    					<?php if( !empty( $curauth->homeland_facebook ) ) : ?>
		    						<li><a href="<?php echo esc_url( $curauth->homeland_facebook ); ?>" target="_blank"><i class="fab fa-facebook-f fa-lg"></i></a></li>
		    					<?php endif; ?>

		    					<?php if( !empty( $curauth->homeland_gplus ) ) : ?>
		    						<li><a href="<?php echo esc_url( $curauth->homeland_gplus ); ?>" target="_blank"><i class="fab fa-google-plus-g fa-lg"></i></a></li>
		    					<?php endif; ?>

		    					<?php if( !empty( $curauth->homeland_linkedin ) ) : ?>
		    						<li><a href="<?php echo esc_url( $curauth->homeland_linkedin ); ?>" target="_blank"><i class="fab fa-linkedin-in fa-lg"></i></a></li>
		    					<?php endif; ?>

		    					<?php if( !empty( $curauth->homeland_twitter ) ) : ?>
		    						<li><a href="<?php echo esc_url( $curauth->homeland_twitter ); ?>" target="_blank"><i class="fab fa-twitter fa-lg"></i></a></li>
		    					<?php endif; ?>

		    					<?php if( !empty( $curauth->user_email ) ) : ?>
		    						<li class="last"><a href="mailto:<?php echo is_email( $curauth->user_email ); ?>" target="_blank"><i class="far fa-envelope fa-lg"></i></a></li>
		    					<?php endif; ?>
		    				</ul>
		    			</div>
		    		</div>

		    		<!-- agent description -->
		    		<div class="<?php echo esc_attr( $homeland_agent_post_class ); ?>">
		    			<h4><?php echo esc_html( $curauth->display_name ); ?></h4>
		    			<?php
		    				if( !empty( $curauth->homeland_designation ) ) :
		    					echo "<h5>". esc_html( $curauth->homeland_designation ) ."</h5>";
		    				endif;
		    				echo do_shortcode( wpautop( $curauth->user_description ) );
		    			?>
		    			<label class="more-info">
		    				<?php 
		    					if( !empty( $curauth->homeland_telno ) ) : ?>
		    						<span><strong><?php esc_html_e( 'Tel no', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $curauth->homeland_telno ); ?></span><?php
		    					endif;
		    					if( !empty( $curauth->homeland_mobile ) ) : ?>
		    						<span><strong><?php esc_html_e( 'Mobile', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $curauth->homeland_mobile ); ?></span><?php
		    					endif;
		    					if( !empty( $curauth->homeland_fax ) ) : ?>
		    						<span><strong><?php esc_html_e( 'Fax', 'homeland' ); echo ":"; ?></strong> <?php echo esc_html( $curauth->homeland_fax ); ?></span><?php
		    					endif;
			    			?>
		    			</label>
		    		</div>
			    </div>
					
					<!-- displays property -->
					<?php if( empty( $homeland_agent_hide_property ) ) : ?>
			    	<div class="<?php echo esc_attr( $homeland_agent_list_class ); ?>">
	            <?php
								global $wpdb;
								$homeland_post_author = $curauth->ID;
								$homeland_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = $homeland_post_author AND post_type IN ('homeland_properties') and post_status = 'publish'" );
								
								if( $homeland_count != 0 ) : ?>
									<h3>
										<?php 
											echo intval( $homeland_count ). "&nbsp;";
											echo homeland_option( 'homeland_agent_list_header', esc_html__( 'Listed Properties', 'homeland' ) );
										?>
									</h3><?php 
								endif; 
							?>

							<div class="row grid cs-style-3 clearfix">
                <?php
                	while ( have_posts() ) : the_post(); 
                 		get_template_part( 'template-parts/loops/loop', $homeland_agent_part );
                 	endwhile; 
                ?>
              </div>    
			    	</div>
			    	<?php get_template_part( 'template-parts/component/paging' ); ?>
			    <?php endif; ?>
				</div>
			</div>

			<?php if( 'Fullwidth' !== $homeland_agent_profile_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>