<?php
	$homeland_agent_limit = get_option( 'homeland_agent_limit' ); 
	$homeland_agent_order =  get_option( 'homeland_agent_order' );
	$homeland_agent_orderby = get_option( 'homeland_agent_orderby' );
	$homeland_all_agents = get_option( 'homeland_all_agents' );

	if( empty( $homeland_all_agents ) ) : ?>	
		<div class="agent-block">
			<h3>
				<span><?php echo homeland_option( 'homeland_agents_header', esc_html__( 'Agents', 'homeland' ) ); ?></span>
			</h3>
			<ul>
				<?php
					$args = array( 
						'role' => 'contributor', 
						'order' => $homeland_agent_order, 
						'orderby' => $homeland_agent_orderby, 
						'number' => $homeland_agent_limit 
					);
				   $homeland_agents = new WP_User_Query( $args );

				   if (!empty( $homeland_agents->results )) :
						foreach ($homeland_agents->results as $homeland_user) :
							global $wpdb;

							$homeland_post_author = $homeland_user->ID;
							$homeland_agent_name = $homeland_user->display_name;
							$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $homeland_post_author );
							$homeland_agent_url = get_author_posts_url( $homeland_post_author );

							$homeland_count = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'homeland_properties' AND post_status = 'publish' AND post_author = %d", $homeland_post_author ) );
							?>
								<li class="clearfix">
									<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
										<?php if(!empty($homeland_custom_avatar)) : ?>
			    						<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" class="avatar" style="width:70px; height:70px;" />
				    				<?php else : ?>
		    							<?php echo get_avatar( $homeland_post_author, 70 ); ?>
		    						<?php endif; ?>
									</a>
									<h4>
										<a href="<?php echo esc_url( $homeland_agent_url ); ?>">
											<?php echo esc_html( $homeland_agent_name ); ?>
										</a>
									</h4>
									<label>
										<?php esc_html_e( 'Listed:', 'homeland' ); ?>
										<span>
											<?php 
					    					printf( esc_html( _n( '%d Property', '%d Properties', esc_html( $homeland_count ), 'homeland'  ) ), $homeland_count ); 
					    				?>
										</span>
									</label>
								</li>	
							<?php
						endforeach;
					else : esc_html_e( 'No Agents found!', 'homeland' );
					endif;
				?>
			</ul>
		</div><?php	
	endif;
?>