<?php 
	get_header(); 

	$homeland_single_blog_layout = get_option( 'homeland_single_blog_layout' );
	$homeland_blog_author_hide = get_option( 'homeland_blog_author_hide' );

	if( 'Fullwidth' === $homeland_single_blog_layout ) :
		$homeland_single_layout_class = "post-col-12 theme-fullwidth";
	elseif( 'Left Sidebar' === $homeland_single_blog_layout ) :
		$homeland_single_layout_class = "post-col-9 left-container right";
	else :
		$homeland_single_layout_class = "post-col-9 left-container";
	endif;

	if( empty( $post->homeland_advance_search ) ) : 
		homeland_advance_search(); 
	endif;	
?>

	<!-- blog single page -->
	<section class="theme-pages">
		<div class="inside clearfix">

			<!-- left container -->	
			<div class="<?php echo esc_attr( $homeland_single_layout_class ); ?>">				
				<div class="blog-list single-blog clearfix">
					<?php if ( post_password_required() ) : ?>
						<div class="password-protect-content textcenter">
							<?php the_content(); ?>
						</div>
					<?php
						else :
							while( have_posts() ) : the_post(); 
								$homeland_author_desc = get_the_author_meta( 'description' ); 
								$homeland_custom_avatar = get_the_author_meta( 'homeland_custom_avatar', $wp_query->ID ); 
								?>
								<article id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'blist' ) ); ?>>
									<div class="blog-image">
										<?php 
											if ( has_post_format( 'video' )) : 
												get_template_part( 'inc/post-format/format', 'video' );
											elseif ( has_post_format( 'gallery' )) :
												get_template_part( 'inc/post-format/format', 'gallery' );
											elseif ( has_post_format( 'audio' )) :
												get_template_part( 'inc/post-format/format', 'audio' );
											else :
												get_template_part( 'inc/post-format/format', 'image' );
											endif;										
										?>				
									</div>
									
									<div class="blog-list-desc clearfix">
										<div class="blog-action">
											<ul class="clearfix">
												<li><i class="far fa-calendar-alt"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
												<li><i class="far fa-folder"></i><?php the_category(', ') ?></li>
												<li><i class="far fa-comment-alt"></i>
													<a href="<?php the_permalink(); ?>#comments">
														<?php 
															comments_number( 
																esc_html__( 'No Comments', 'homeland' ), 
																esc_html__( 'One Comment', 'homeland' ), 
																esc_html__( '% Comments', 'homeland' ) 
															); 
														?>
													</a>
												</li>				
											</ul>	
										</div>		
									</div>
									<?php the_content(); ?>
								</article><?php 

								the_tags( 
									'<ul class="blog-tags clearfix"><li><span>Tags</span></li><li>', 
									'</li><li>', '</li></ul>' 
								);
								
								get_template_part( 'template-parts/component/social-share' );
							endwhile;
						endif;

						if( empty( $homeland_blog_author_hide ) ) :
							if ( post_password_required() ) :
							else : ?>
								<!-- author profile -->
								<div class="author-block clearfix">
									<?php if( !empty( $homeland_custom_avatar ) ) : ?>
										<img src="<?php echo esc_url( $homeland_custom_avatar ); ?>" class="avatar" />
									<?php else : 
										echo get_avatar( get_the_author_meta( 'ID' ), 100 );
									endif;
									?>
									<h3><?php the_author_meta( 'user_firstname' ); echo "&nbsp;"; the_author_meta( 'user_lastname' ); ?></h3>
									<?php echo wpautop ( $homeland_author_desc ); ?>
								</div><?php
							endif;
						endif;

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						get_template_part( 'template-parts/component/blog-prev-next' );
					?>	
				</div>
			</div>

			<?php if( 'Fullwidth' !== $homeland_single_blog_layout ) : ?>
				<div class="post-col-3">
					<div class="sidebar"><?php get_sidebar(); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>