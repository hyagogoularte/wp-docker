<?php
	$homeland_footer_layout = get_option( 'homeland_footer_layout' );
	$homeland_footer_bgimage = get_option( 'homeland_footer_bgimage' );

	if( 'Layout 2' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-two";
	elseif( 'Layout 3' === $homeland_footer_layout ) :
	$homeland_footer_layout_id = "footer-id-three";
	elseif( 'Layout 4' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-four";
	elseif( 'Layout 5' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-five";
	elseif( 'Layout 6' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-six";
	elseif( 'Layout 7' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-seven";
	elseif( 'Layout 8' === $homeland_footer_layout ) :
		$homeland_footer_layout_id = "footer-id-eight";
	else :
		$homeland_footer_layout_id = "footer-id-default";
	endif;	
?>
	<footer id="<?php echo esc_attr( $homeland_footer_layout_id ); ?>">	
		<?php
			if( !empty( $homeland_footer_bgimage ) ) : 
				echo "<div class='overlay'>&nbsp;</div>"; 
			endif;

			get_template_part( 'template-parts/footer/footer-widget' );
			get_template_part( 'template-parts/footer/footer-info' );
		?>	
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>