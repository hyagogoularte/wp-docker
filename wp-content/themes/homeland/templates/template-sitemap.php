<?php
/*
	Template Name: Sitemap
*/

	get_header(); 

	$homeland_all_agents = get_option( 'homeland_all_agents' );

	get_template_part( 'template-parts/component/display-search' );
?>

	<section class="theme-pages">
		<div class="inside clearfix">
			<div class="post-col-12 theme-fullwidth">
				<?php get_template_part( 'template-parts/component/default-content' ); ?>

				<div class="row clearfix">
					<div class="post-col-3 post-bottom sitemap">
						<h3><?php esc_html_e( 'Pages', 'homeland' ); ?></h3>
						<?php
							$args_pages = array(
								'authors'      => '',
								'child_of'     => 0,
								'date_format'  => get_option( 'date_format' ),
								'depth'        => 0,
								'echo'         => 1,
								'exclude'      => '',
								'link_after'   => '',
								'link_before'  => '',
								'post_type'    => 'page',
								'post_status'  => 'publish',
								'show_date'    => '',
								'sort_column'  => 'menu_order, post_title',
								'title_li'     => '', 
								'walker'       => ''
							);
						?>
						<ul><?php wp_list_pages( $args_pages ); ?></ul>
					</div>

					<div class="post-col-3 post-bottom sitemap">
						<h3><?php esc_html_e( 'Properties', 'homeland' ); ?></h3>
						<?php
							$args_property = array( 'post_type' => 'homeland_properties' );
							$wp_query_property = new WP_Query( $args_property ); 
						?>
						<ul>
							<?php 
								while( $wp_query_property->have_posts() ) : $wp_query_property->the_post();
									the_title( '<li><a href="'. esc_url( get_permalink() ) .'">', '</a></li>' );			
						    endwhile; 
							?>
						</ul>
						
						<h3><?php esc_html_e( 'Property Type', 'homeland' ); ?></h3>
						<?php
							$args_ptype = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'hierarchical'       => 1,
								'title_li'           => '',
								'show_option_none'   => esc_html__( 'No property types', 'homeland' ),
								'number'             => null,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'homeland_property_type',
								'walker'             => null
								);
						?>
						<ul><?php wp_list_categories( $args_ptype ); ?></ul>

						<h3><?php esc_html_e( 'Property Status', 'homeland' ); ?></h3>
						<?php
							$args_pstatus = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'hierarchical'       => 1,
								'title_li'           => '',
								'show_option_none'   => esc_html__( 'No property status', 'homeland' ),
								'number'             => null,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'homeland_property_status',
								'walker'             => null
							);
						?>
						<ul><?php wp_list_categories( $args_pstatus ); ?></ul>

						<h3><?php esc_html_e( 'Property Location', 'homeland' ); ?></h3>
						<?php
							$args_plocation = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'hierarchical'       => 1,
								'title_li'           => '',
								'show_option_none'   => esc_html__( 'No property location', 'homeland' ),
								'number'             => null,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'homeland_property_location',
								'walker'             => null
							);
						?>
						<ul><?php wp_list_categories( $args_plocation ); ?></ul>
					</div>

					<div class="post-col-3 post-bottom sitemap">
						<h3><?php esc_html_e( 'Blog Post', 'homeland' ); ?></h3>
						<?php
							$args_blog = array( 'post_type' => 'post' );
							$wp_query_blog = new WP_Query( $args_blog ); 

							echo "<ul>";
								while( $wp_query_blog->have_posts() ) : $wp_query_blog->the_post();
									the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
						    endwhile; 
					    echo "</ul>";
					  ?>

						<h3><?php esc_html_e( 'Archives', 'homeland' ); ?></h3>
						<?php
							$args_archives = array(
								'type'            => 'monthly',
								'limit'           => '',
								'format'          => 'html', 
								'before'          => '',
								'after'           => '',
								'show_post_count' => false,
								'echo'            => 1,
								'order'           => 'DESC'
							);
						?>
						<ul><?php wp_get_archives( $args_archives ); ?></ul>

						<h3><?php esc_html_e( 'Blog Categories', 'homeland' ); ?></h3>
						<?php
							$args_blog_cat = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'hierarchical'       => 1,
								'title_li'           => '',
								'show_option_none'   => esc_html__( 'No categories', 'homeland' ),
								'number'             => null,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'category',
								'walker'             => null
							);
						?>
						<ul><?php wp_list_categories( $args_blog_cat ); ?></ul>
					</div>

					<div class="post-col-3 post-bottom sitemap">
						<?php if( empty( $homeland_all_agents ) ) : ?>
							<h3><?php esc_html_e( 'Agents', 'homeland' ); ?></h3>
							<?php
								$args_agents = array(
									'orderby' => 'post_count', 
									'order' => 'DESC', 
									'role' => 'contributor' 
								);
						    $homeland_agents = get_users( $args_agents ); 
						  ?>
				    	<ul>
				    		<?php
						    	foreach ($homeland_agents as $homeland_user) :
							    	global $wpdb;
										$homeland_post_author = $homeland_user->ID;
										$homeland_agent_name = $homeland_user->display_name;

										$homeland_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = $homeland_post_author AND post_type IN ('homeland_properties') and post_status = 'publish'" ); ?>
										<li>
											<a href="<?php echo esc_url( get_author_posts_url( $homeland_post_author ) ); ?>">
												<?php echo esc_html( $homeland_agent_name ); ?>
											</a>
										</li><?php
									endforeach;	
								?>
				    	</ul>
					   <?php endif; ?>

					  <h3><?php esc_html_e( 'Services', 'homeland' ); ?></h3>
						<?php
							$args_services = array( 'post_type' => 'homeland_services' );
							$wp_query_services = new WP_Query( $args_services ); 
						?>
						<ul>
							<?php 
								while( $wp_query_services->have_posts() ) : $wp_query_services->the_post();
									the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
						    endwhile; 
							?>
						</ul>
					</div>
				</div>					
			</div>
		</div>
	</section>

<?php get_footer(); ?>