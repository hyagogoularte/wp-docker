<?php
	$homeland_hide_login = get_option( 'homeland_hide_login' );
	$homeland_login_link = get_option( 'homeland_login_link' );
	$homeland_hide_register = get_option( 'homeland_hide_register' );
	$homeland_register_link = get_option( 'homeland_register_link' );
	$homeland_phone_number = get_option( 'homeland_phone_number' ); 

	if( !empty( $homeland_login_link ) ) : 
		$homeland_btn_login_link = $homeland_login_link;
		$homeland_btn_login_class = "login";
	else : 
		$homeland_btn_login_link = "#login";
		$homeland_btn_login_class = "login modal-popup";
	endif;

	if( !empty( $homeland_register_link ) ) : 
		$homeland_btn_reg_link = $homeland_register_link;
		$homeland_btn_reg_class = "register login";
	else : 
		$homeland_btn_reg_link = "#register";
		$homeland_btn_reg_class = "register login modal-popup";
	endif;
?>
<div class="call-info floatright clearfix">
	<?php if( !empty( $homeland_phone_number ) ) : ?>
		<span class="call-us">
			<i class="fas fa-phone"></i>
			<?php echo homeland_option( 'homeland_call_us_label', esc_html__( 'Call us', 'homeland' ) ) . ": " . esc_html( $homeland_phone_number ); ?>
		</span>
	<?php endif; ?> 
	
	<?php
		if( empty( $homeland_hide_register ) ) : 
			if( ! is_user_logged_in() ) :
				if( get_option( 'users_can_register' ) ) : ?>
					<a href="<?php echo esc_url( $homeland_btn_reg_link ); ?>" class="<?php echo esc_attr( $homeland_btn_reg_class ); ?>" target="_blank">
						<i class="fas fa-user-plus"></i>
						<?php echo homeland_option( 'homeland_register_label', esc_html__( 'Register', 'homeland' ) ); ?>
					</a><?php
				endif;
			else :
				$homeland_current_user = wp_get_current_user(); ?>
				<a href="<?php echo get_edit_user_link(); ?>" class="register login" target="_blank"><i class="fas fa-user"></i>
					<?php echo sprintf( esc_html__( 'Hi, %s', 'homeland' ), esc_html( $homeland_current_user->user_firstname ) ); ?>
				</a><?php
			endif;
		endif;

		if( empty( $homeland_hide_login ) ) : 
			if ( ! is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( $homeland_btn_login_link ) ?>" class="<?php echo esc_attr( $homeland_btn_login_class ); ?>" target="_blank">
					<i class="fas fa-sign-in-alt"></i>
					<?php echo homeland_option( 'homeland_login_label', esc_html__( 'Login', 'homeland' ) ); ?>
				</a><?php
			else : ?>
				<a href="<?php echo wp_logout_url( home_url( '/' ) ); ?>" class="login"><i class="fas fa-sign-out-alt"></i><?php echo homeland_option( 'homeland_logout_label', esc_html__( 'Logout', 'homeland' ) ); ?></a><?php
			endif;
		endif;

		if( !empty( $homeland_hide_login ) ) : 
			if ( is_user_logged_in() ) : ?>
				<a href="<?php echo wp_logout_url( home_url( '/' ) ); ?>" class="login"><i class="fas fa-sign-out-alt"></i><?php echo homeland_option( 'homeland_logout_label', esc_html__( 'Logout', 'homeland' ) ); ?></a><?php
			endif;
		endif;
	?>
</div>

<?php if( ! is_user_logged_in() ) : ?>
	<div id="login" class="zoom-anim-dialog mfp-hide">
		<?php get_template_part( 'template-parts/header/login-form' ); ?>
	</div>

	<div id="register" class="zoom-anim-dialog mfp-hide">
		<?php 
			if ( get_option( 'users_can_register' ) ) : 
				get_template_part( 'template-parts/header/register-form' );
			endif; 
		?>
	</div>

	<div id="lost-password" class="zoom-anim-dialog mfp-hide">
		<?php get_template_part( 'template-parts/header/lost-password-form' ); ?>
	</div>
<?php endif; ?>