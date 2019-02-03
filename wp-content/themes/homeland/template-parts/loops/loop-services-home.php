<?php 
	$homeland_services_excerpt = get_option( 'homeland_services_excerpt' );
	$homeland_services_link_target = get_option( 'homeland_services_link_target' );
?>

<div id="post-<?php the_ID(); ?>" <?php sanitize_html_class( post_class( 'post-col-4 post-bottom textcenter' ) ); ?>>
	<?php if( !empty( $post->homeland_custom_link ) ) : ?>
		<a href="<?php echo esc_url( $post->homeland_custom_link ); ?>" target="<?php echo esc_html( $homeland_services_link_target ); ?>">
	<?php else : ?>
		<a href="<?php the_permalink(); ?>">
	<?php endif; ?>
		<span class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
			<?php if( !empty( $post->homeland_icon ) ) : ?>
				<i class="hi-icon <?php echo esc_html( $post->homeland_icon ); ?>"></i>
			<?php else : ?>
				<i class="hi-icon"><?php echo the_post_thumbnail( array( 50, 50 ) ); ?></i>
			<?php endif; ?>
		</span>
	</a>
	<div class="services-desc">
		<?php 
			the_title( '<h5>', '</h5>' ); 
			if( empty( $homeland_services_excerpt ) ) : the_excerpt(); endif;

			if( !empty( $post->homeland_custom_link ) ) :
				echo "<a href=". esc_url( $post->homeland_custom_link ) ." target=". esc_html( $homeland_services_link_target ) ." class='more'>";
			else : 
				echo "<a href='". esc_url( get_permalink() ) ."' class='more'>";
			endif;
			echo homeland_option( 'homeland_services_button', esc_html__( 'More Details', 'homeland' ) );
		?>
		</a>
	</div>
</div>