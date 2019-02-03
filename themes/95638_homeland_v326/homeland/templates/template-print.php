<?php
/*
	Template Name: Print
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body class="print-page">

	<!-- Print Page -->
	<section class="print-preview">
		<div class="logo-print inside">
			<div class="post-col-12 clearfix">
				<?php get_template_part( 'template-parts/header/logo' ); ?>
				<a href="javascript:window.print()" class="print-now floatright"><i class="fas fa-print fa-3x"></i></a>
			</div>
		</div>
		
		<div class="inside">
			<?php
				$print_id = $_GET['printid'];
				$print_id_array = array( $print_id );

				$args_wp = array( 
					'post_type' => 'homeland_properties', 
					'post__in' => $print_id_array
				);
				$wp_query = new WP_Query( $args_wp );

				if ($wp_query->have_posts()) : 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); 	
						$homeland_property_status = get_the_term_list ( $post->ID, 'homeland_property_status', ' ', ', ', '' );
						$homeland_property_type = get_the_term_list ( $post->ID, 'homeland_property_type', ' ', ', ', '' );
						$homeland_property_amenities = get_the_term_list( $post->ID, 'homeland_property_amenities', ' ', ' ', '' );
						$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $wp_query->ID );
						$homeland_agent_id = get_the_author_meta( 'ID' );
						$homeland_agent_fname = get_the_author_meta( 'user_firstname' );
						$homeland_agent_lname = get_the_author_meta( 'user_lastname' );
						$homeland_agent_email = get_the_author_meta( 'user_email' );
						$homeland_agent_mobile = get_the_author_meta( 'homeland_mobile' );
						$homeland_agent_telno = get_the_author_meta( 'homeland_telno' );
						$homeland_agent_fax = get_the_author_meta( 'homeland_fax' );
						$homeland_agent_url = get_the_author_meta( 'url' );
						?>
						<div class="print-title-price clearfix">	
							<div class="post-col-6 print-title">
								<?php the_title( '<h2>', '</h2>' ); ?>
								<h4><?php echo esc_html( $post->homeland_address ); ?></h4>
							</div>
							
							<div class="post-col-6 print-property-price textright floatright">
								<?php
									if(!empty( $post->homeland_property_sold )) : ?>
										<h3 style="color: #FF0000;"><?php esc_html_e( 'Sold', 'homeland' ); ?></h3><?php
									else :
										if(!empty( $post->homeland_price )) : ?>
											<h3><?php homeland_property_price_format(); ?></h3><?php
										endif;
									endif;
								?>
							</div>
						</div>

						<div class="print-image-details clearfix">
							<div class="post-col-6 print-image">
								<?php 
									if ( has_post_thumbnail() ) : 
										the_post_thumbnail('homeland_property_2cols'); 
									else : ?>
										<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span><?php
									endif; 
								?>
							</div>

							<!-- Image Attachments -->
							<div class="post-col-6 print-image-attachments">
								<div class="row clearfix">
									<?php
										$args = array( 
											'post_type' => 'attachment', 
											'numberposts' => 4, 
											'post_status' => null, 
											'post_parent' => $post->ID,
											'orderby' => 'menu_order',
											'order' => 'DESC',
											'exclude' => get_post_thumbnail_id( get_the_ID() )
										);
										$homeland_attachments = get_posts( $args );

										if ( $homeland_attachments ) :								
											foreach ( $homeland_attachments as $homeland_attachment ) :
												$homeland_attachment_id = $homeland_attachment->ID;
												echo "<div class='print-thumbs post-col-6 post-bottom'>";
												echo wp_get_attachment_image( $homeland_attachment_id, 'homeland_property_medium' );
												echo "</div>";
											endforeach;
										endif;			
									?>
								</div>
							</div>
						</div>

						<div class="info-features clearfix">
							<div class="post-col-6 print-property-details">
								<h3><?php esc_html_e( 'Property Information', 'homeland' ); ?></h3>
								<ul>
									<?php
										if(!empty( $post->homeland_property_id )) : ?>
											<li>
												<span><?php esc_html_e( 'Property ID', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_property_id ); ?>
											</li><?php
										endif;

										if(!empty($homeland_property_type)) : ?>
											<li>
												<span><?php esc_html_e( 'Type', 'homeland' ); echo ":"; ?></span>
												<?php echo strip_tags( $homeland_property_type ); ?>
											</li><?php
										endif;

										if(!empty($homeland_property_status)) : ?>
											<li>
												<span><?php esc_html_e( 'Status', 'homeland' ); echo ":"; ?></span>
												<?php echo strip_tags( $homeland_property_status ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_area )) : ?>
											<li>
												<span><?php esc_html_e( 'Lot Area', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_area ) . "&nbsp;"; echo esc_html( $post->homeland_area_unit ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_floor_area )) : ?>
											<li>
												<span><?php esc_html_e( 'Floor Area', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_floor_area ) . "&nbsp;"; echo esc_html( $post->homeland_floor_area_unit ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_room )) : ?>
											<li>
												<span><?php esc_html_e( 'Rooms', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_room ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_bedroom )) : ?>
											<li>
												<span><?php esc_html_e( 'Bedrooms', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_bedroom ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_bathroom )) : ?>
											<li>
												<span><?php esc_html_e( 'Bathrooms', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_bathroom ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_garage )) : ?>
											<li>
												<span><?php esc_html_e( 'Garage', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_garage ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_year_built )) : ?>
											<li>
												<span><?php esc_html_e( 'Year Built', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_year_built ); ?>
											</li><?php
										endif;
									?>
								</ul>
								<ul>
									<?php
										if(!empty( $post->homeland_stories )) : ?>
											<li>
												<span><?php esc_html_e( 'Stories', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_stories ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_basement )) : ?>
											<li>
												<span><?php esc_html_e( 'Basement', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_basement ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_structure_type )) : ?>
											<li>
												<span><?php esc_html_e( 'Structure Type', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_structure_type ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_roofing )) : ?>
											<li>
												<span><?php esc_html_e( 'Roofing', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_roofing ); ?>
											</li><?php
										endif;

										if(!empty( $post->homeland_zip )) : ?>
											<li>
												<span><?php esc_html_e( 'Zip', 'homeland' ); echo ":"; ?></span>
												<?php echo esc_html( $post->homeland_zip ); ?>
											</li><?php
										endif;
									?>
								</ul>
							</div>
							
							<?php if( !empty( $homeland_property_amenities ) ) : ?>
								<div class="post-col-6 print-features">
									<h3><?php esc_html_e( 'Features', 'homeland' ); ?></h3>
									<ul class="clearfix">
										<?php
											$homeland_terms = get_the_terms($post->ID, 'homeland_property_amenities');
											$homeland_count = count($homeland_terms); 
											if ( $homeland_count > 0 ) :
												foreach ( $homeland_terms as $homeland_term ) : 
													?><li><?php echo esc_html( $homeland_term->name ); ?></li><?php
												endforeach;
											endif;
										?>
									</ul>
								</div>
							<?php endif; ?>
						</div>

						<div class="print-excerpt">
							<div class="post-col-12"><?php the_excerpt(); ?></div>
						</div>

						<div class="print-agents">
							<div class="post-col-12">
								<h3><?php esc_html_e('Agent', 'homeland'); ?></h3>
								<?php if(!empty($homeland_custom_avatar)) : ?>
	    							<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" />
	    					<?php else : 
	    							echo get_avatar( $homeland_agent_id, 80 );
									endif;
								?>
								<h5><?php echo esc_html( $homeland_agent_fname ) . "&nbsp;" . esc_html( $homeland_agent_lname ); ?></h5>
								<span>
									<?php
										if(!empty($homeland_agent_url)) : ?>
											<strong><?php esc_html_e( 'Website', 'homeland' ); echo ":"; ?></strong> <?php 
											echo esc_url( $homeland_agent_url ); 
										endif;	

										if(!empty($homeland_agent_email)) : ?>
											<strong><?php esc_html_e( 'Email', 'homeland' ); echo ":"; ?></strong> <?php 
											echo is_email( $homeland_agent_email ); 
										endif;	
									?>
								</span>
								<span>
									<?php 
										if(!empty($homeland_agent_telno)) : ?>
											<strong><?php esc_html_e('Telephone', 'homeland'); echo ":"; ?></strong> <?php 
											echo esc_html( $homeland_agent_telno ) . "&nbsp;/&nbsp;"; 
										endif;	

										if(!empty($homeland_agent_mobile)) : ?>
											<strong><?php esc_html_e('Mobile', 'homeland'); echo ":"; ?></strong> <?php 
											echo esc_html( $homeland_agent_mobile ) . "&nbsp;/&nbsp;"; 
										endif;	

										if(!empty($homeland_agent_fax)) : ?>
											<strong><?php esc_html_e('Fax', 'homeland'); echo ":"; ?></strong> <?php 
											echo esc_html( $homeland_agent_fax ); 
										endif;	
									?>
								</span>
							</div>
						</div>

						<div class="site-footer">
							<div class="post-col-12">
								<?php echo sprintf( esc_html__( '%s - Copyright %d', 'homeland' ), bloginfo('name'), date('Y') ); ?>
							</div>
						</div><?php
					endwhile;
				endif;
			?>
		</div>
	</section>

<?php wp_footer(); ?>

</body>
</html>