<?php
/*
	Template Name: Contact 3
*/

	get_header();

	$homeland_hide_gmap = get_option( 'homeland_hide_gmap' );

	if( empty( $homeland_hide_gmap ) ) : 
		echo "<section id='map'></section>";
	else : 
		echo "<div class='empty-div'>&nbsp;</div>";
	endif;
?>

	<section class="theme-pages">
		<div class="inside">
			<div class="post-col-12 textcenter post-bottom-4em contact-info">
				<?php
					if(!empty( $post->homeland_ptitle )) : 
						echo '<h2>' . esc_html( $post->homeland_ptitle ) . '</h2>';
					else : the_title('<h2>', '</h2>'); endif; 

					if( !empty( $post->homeland_subtitle ) ) : 
						echo '<p>' . stripslashes ( $post->homeland_subtitle ) . '</p>';
					endif;
				?>
			</div>

			<div class="contact-alternate-two post-bottom-3em clearfix">
				<div class="post-col-4 contact-alternate-main">
					<?php get_template_part( 'template-parts/component/contact-info' ); ?>
				</div>

				<div class="post-col-8 contact-form">
					<?php get_template_part( 'template-parts/component/default-content' ); ?>
				</div>

			</div>
		</div>
	</section>

<?php get_footer(); ?>