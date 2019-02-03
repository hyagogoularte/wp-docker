<?php 
	$homeland_services_link_target = get_option( 'homeland_services_link_target' );
	$homeland_services_excerpt = get_option( 'homeland_services_excerpt' );
?>

<div id="post-<?php the_ID(); ?>" class="services-page-list post-bottom clearfix">
	<div class="post-col-3">
		<div class="services-page-icon">
			<?php if( !empty( $post->homeland_icon ) ) : ?>
				<i class="<?php echo esc_html( $post->homeland_icon ); ?> fa-5x"></i>
			<?php else : ?>
				<?php echo the_post_thumbnail( array( 100,100 ) ); ?>
			<?php endif; ?>
		</div>
	</div>						
	<div class="post-col-9 services-page-desc">
		<?php 
			if( !empty( $post->homeland_custom_link ) ) : 
				the_title( '<h5><a href="' . esc_url( $post->homeland_custom_link ) . '" target="'. esc_html( $homeland_services_link_target ) .'">', '</a></h5>' );
			else : 
				the_title( sprintf( '<h5><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' );
			endif;

			if( empty( $homeland_services_excerpt ) ) : the_excerpt(); endif;

			if( !empty( $post->homeland_custom_link ) ) :
				echo "<a href=". esc_url( $post->homeland_custom_link ) ." target=". esc_html( $homeland_services_link_target ) ." class='read-more'>";
			else : ?>
				<a href="<?php the_permalink(); ?>" class="read-more"><?php
			endif;
			echo homeland_option( 'homeland_services_button', esc_html__( 'More Details', 'homeland' ) );
		?>
		</a>
	</div>
</div>