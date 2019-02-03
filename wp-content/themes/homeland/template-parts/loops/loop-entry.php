<?php 
	$homeland_blog_excerpt = get_option( 'homeland_blog_excerpt' ); 

	$homeland_img_attr = array( 
		'srcset' => wp_get_attachment_image_url( 
			get_post_thumbnail_id(), 'homeland_bigger_image' ) .' 1200w',
		'sizes' => '(max-width: 568px) 100vw, 
			(max-width: 736px) 80vw, 
			(max-width: 768px) 60vw, 
			(max-width: 1024px) 70vw, 795px' 
	);

	if ( has_post_format( 'video' )) : 
		$homeland_format_icon = "fas fa-video";
	elseif ( has_post_format( 'gallery' )) :
		$homeland_format_icon = "far fa-clone"; 
	elseif ( has_post_format( 'audio' )) :
		$homeland_format_icon = "fas fa-music";
	else :
		$homeland_format_icon = "far fa-image";	
	endif;	
?>

<article id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'blist post-bottom' ) ); ?>>
	<div class="blog-mask">
		<?php 
			if( post_password_required() ) : ?>
				<div class="password-protect-thumb password-blog">
					<i class="fa fa-lock fa-2x"></i>
				</div><?php
			else :
				if ( has_post_thumbnail() ) : ?>
					<div class="blog-image">
						<div class="blog-large-image">
							<?php get_template_part( 'template-parts/component/sticky-post' ); ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'homeland_bigger_image', $homeland_img_attr ); ?>
							</a>
							<a href="<?php the_permalink(); ?>" class="continue">
								<?php echo homeland_option( 'homeland_blog_button', esc_html__( 'Learn More', 'homeland' ) ); ?> &rarr;
							</a>
						</div>
					</div>
				<?php else : ?>
					<label class="no-image-fallback">
						<span><?php esc_html_e( 'No Image Available', 'homeland' ); ?></span>
					</label><?php 
				endif; 
			endif;
		?>		
	</div>
	<div class="blog-list-desc clearfix">
		<div class="blog-text">
			<?php 
				the_title( sprintf( '<h4><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' );
				if( !empty( $homeland_blog_excerpt ) ) : the_excerpt(); endif;
			?>	
			<div class="blog-icon"><i class="<?php echo esc_html( $homeland_format_icon ); ?> fa-lg"></i></div>
		</div>
		<div class="blog-action">
			<ul class="clearfix">
				<li><i class="far fa-calendar-alt"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
				<li><i class="fas fa-user"></i><?php the_author_meta( 'display_name' ); ?></li>
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
</article>