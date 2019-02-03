<form method="post" action="<?php echo esc_url( home_url( '/wp-login.php?action=lostpassword' ) ); ?>" id="homeland-lostpassword" name="homeland-lostpassword">
	<p>
		<label for="user_login"><?php esc_html_e( 'Username or Email', 'homeland' ); ?></label>
		<input type="text" size="20" value="" class="input required" id="user_login" name="user_login">
	</p>
	<p>
		<?php esc_html_e( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'homeland' ); ?>
	</p>
	<p class="login-submit">
		<input type="submit" value="<?php esc_html_e( 'Get New Password', 'homeland' ); ?>" class="button-primary" id="wp-submit" name="wp-submit">
		<input type="hidden" value="" name="redirect_to">
	</p>
</form>
<div class="login-links textcenter">
	<?php if ( get_option( 'users_can_register' ) ) : ?>
		<a href="#register" class="modal-popup"><?php esc_html_e( 'Register', 'homeland' ); ?></a> | 
	<?php endif; ?>
	<a href="#login" class="modal-popup"><?php esc_html_e( 'Login', 'homeland' ); ?></a>
</div>