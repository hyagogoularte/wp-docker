<?php 
	$homeland_services_link_target = get_option( 'homeland_services_link_target' );
?>

<div id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'post-col-4 post-bottom' ) ); ?>>
	<div class="services-icon">
		<?php if( !empty( $post->homeland_icon ) ) : ?>
			<i class="<?php echo esc_html( $post->homeland_icon ); ?> fa-4x"></i>
		<?php else : ?>
			<?php echo the_post_thumbnail( array( 50, 50 ) ); ?>
		<?php endif; ?>
	</div>
	<div class="services-desc">
		<?php 
			the_title( '<h5>', '</h5>' ); 
			the_excerpt();

			if( !empty( $post->homeland_custom_link ) ) : 
				echo "<a href=". esc_url( $post->homeland_custom_link ) ." target=". esc_html( $homeland_services_link_target ) ." class='more'>";
			else : 
				echo "<a href='". esc_url( get_permalink() ) ."' class='more'>";
			endif;
			echo homeland_option( 'homeland_services_button', esc_html__( 'More Details', 'homeland' ) );
		?></a>
	</div>
</div>