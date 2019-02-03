<?php 
	$homeland_redirect_404 = get_option( 'homeland_redirect_404' );
	$homeland_not_found_large_text = get_option( 'homeland_not_found_large_text' );
	$homeland_disable_advance_search_404 = get_option( 'homeland_disable_advance_search_404' );

	if( 'true' === $homeland_redirect_404 ) :
		header( 'HTTP/1.1 301 Moved Permanently' );
		header( 'Location:'. home_url( '/' ) );
		exit();
	else : 
		get_header();

		if( empty( $homeland_disable_advance_search_404 ) ) : 
			homeland_advance_search(); 
		endif;
		?>
		<section class="page-block">
			<div class="inside">
				<div class="post-col-12">
					<div class="page-not-found">
						<h2>
							<?php
								if( !empty( $homeland_not_found_large_text ) ) : 
									echo wp_kses_post( $homeland_not_found_large_text );
								else :
									esc_html_e( 'Error', 'homeland' ); 
									echo '&nbsp;<span>'. esc_html__( '404', 'homeland' ) .'</span>';
								endif;
							?>
						</h2>
						<h5>
							<?php 
								echo homeland_option( 'homeland_not_found_small_text', esc_html__( 'Looks like the file you are looking for is no longer available', 'homeland' ) );
							?>
						</h5>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-home">
							<?php echo homeland_option( 'homeland_not_found_button', esc_html__( 'Back to Homepage', 'homeland' ) ); ?>
						</a>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	
<?php get_footer(); ?>