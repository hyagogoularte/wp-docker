<?php
/*
	Template Name: Contact
*/

	get_header();

	$homeland_hide_gmap = get_option( 'homeland_hide_gmap' );
	$homeland_phone_number = get_option( 'homeland_phone_number' );
	$homeland_fax = get_option( 'homeland_fax' );
	$homeland_contact_address = get_option( 'homeland_contact_address' );
	$homeland_email_address = get_option( 'homeland_email_address' );
	$homeland_working_hours = get_option( 'homeland_working_hours' );

	if( empty( $homeland_hide_gmap ) ) : 
		echo "<section id='map'></section>";
	else : 
		echo "<div class='empty-div'>&nbsp;</div>";
	endif;
?>

	<section class="theme-pages">
		<div class="inside">
			<div class="post-col-12">
				
				<div class="contact-info textcenter post-bottom-3em clearfix">
					<?php
						if( !empty( $post->homeland_ptitle ) ) : 
							echo '<h2>' . esc_html( $post->homeland_ptitle ) . '</h2>';
						else : the_title('<h2>', '</h2>'); endif; 

						if( !empty( $post->homeland_subtitle ) ) : 
							echo '<p>' . stripslashes ( $post->homeland_subtitle ) . '</p>';
						endif;

						get_template_part( 'template-parts/component/contact-info' );
					?>
				</div>

				<div class="contact-form post-bottom-3em">
					<?php get_template_part( 'template-parts/component/default-content' ); ?>
				</div>

			</div>
		</div>
	</section>

<?php get_footer(); ?>