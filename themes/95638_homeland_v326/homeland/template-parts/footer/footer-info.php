<?php 
	$homeland_copyright_text = get_option( 'homeland_copyright_text' );
	$homeland_footer_layout = get_option( 'homeland_footer_layout' );

	if( 'Layout 2' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-two";
	elseif( 'Layout 3' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-three";
	elseif( 'Layout 4' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-four";
	elseif( 'Layout 5' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-five";
	elseif( 'Layout 6' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-six";
	elseif( 'Layout 7' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-seven";
	elseif( 'Layout 8' === $homeland_footer_layout ) :
		$homeland_footer_layout_class = "footer-main footer-layout-eight";
	else :
		$homeland_footer_layout_class = "footer-main";
	endif;	
?>

<section class="<?php echo esc_attr( $homeland_footer_layout_class ); ?>">
	<div class="inside clearfix">
		<div class="post-col-12">
			<div class="footer-inside clearfix">
				<label class="copyright">
					<?php 
						if( 'Layout 7' === $homeland_footer_layout ) :
							esc_html_e( 'Created with', 'homeland' ); echo "&nbsp;<i class='fas fa-heart'></i></i>";
						endif;
					?>
					<a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_attr( bloginfo('name') ); ?></a>
					<?php 
						echo "&copy;&nbsp;" . date('Y') . "&nbsp;";
						echo "&dash;&nbsp;";
						echo wp_kses_post( $homeland_copyright_text ); echo "&nbsp;"; 
					?>
				</label>
				<?php
					if( 'Layout 2' === $homeland_footer_layout || 'Layout 3' === $homeland_footer_layout || 'Layout 4' === $homeland_footer_layout || 'Layout 5' === $homeland_footer_layout ) : 
						wp_nav_menu( array( 
							'theme_location' => 'footer-menu',
							'container_class' => 'footer-menu', 
							'fallback_cb' => 'homeland_footer_menu_fallback', 
							'container_id' => '', 
							'menu_id' => '', 
							'menu_class' => 'clearfix' 
						) );
					elseif( 'Layout 6' === $homeland_footer_layout || 'Layout 8' === $homeland_footer_layout ) :
						get_template_part( 'template-parts/header/social-icons' );
					endif;
				?>
				<a href="#" id="toTop"><i class="fas fa-angle-up"></i></a>
			</div>	
		</div>
	</div>
</section>	