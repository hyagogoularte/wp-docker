<?php 
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

<article id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'blist clearfix' ) ); ?>>
	<div class="post-col-6 post-col-no-margin blog-timeline-image">
		<?php 
			if ( post_password_required() ) : ?>
				<div class="password-protect-thumb password-blog-timeline">
					<i class="fas fa-lock fa-2x"></i>
				</div><?php
			else :
				get_template_part( 'inc/post-format/format', 'image' );
			endif;
		?>
	</div>
	<div class="post-col-6 post-col-no-margin blog-timeline-content">
		<?php the_title( sprintf( '<h4><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
		<label>
			<?php the_time( get_option( 'date_format' ) ); ?> / <?php the_author_meta( 'display_name' ); ?> / <?php the_category(', ') ?> / <a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__( 'No Comments', 'homeland' ), esc_html__( 'One Comment', 'homeland' ), esc_html__( '% Comments', 'homeland' ) ); ?></a>
		</label>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="continue">
			<?php echo homeland_option( 'homeland_blog_button', esc_html__( 'Learn More', 'homeland' ) ); ?> &rarr;
		</a>	
		<div class="blog-icon"><i class="<?php echo esc_html( $homeland_format_icon ); ?> fa-lg"></i></div>
	</div>
</article>