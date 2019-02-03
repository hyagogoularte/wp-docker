<form novalidate="novalidate" method="post" action="<?php echo esc_url( home_url( '/wp-login.php?action=register' ) ); ?>" id="homeland-registerform" name="homeland-registerform">
	<p class="login-username">
		<label for="user_login"><?php esc_html_e( 'Username', 'homeland' ); ?></label>
		<input type="text" size="20" value="" class="input required" id="user_login" name="user_login">
	</p>
	<p>
		<label for="user_email"><?php esc_html_e( 'Email', 'homeland' ); ?></label>
		<input type="text" size="25" value="" class="input required email" id="user_email" name="user_email">
	</p>
	<p id="reg_passmail">
		<?php esc_html_e( 'Registration confirmation will be emailed to you.', 'homeland' ); ?>
	</p>
	<p class="login-submit">
		<input type="submit" value="<?php esc_html_e( 'Register', 'homeland' ); ?>" class="button-primary" id="wp-submit" name="wp-submit">
		<input type="hidden" value="" name="redirect_to">
	</p>
</form>
<div class="login-links textcenter">
	<a href="#login" class="modal-popup"><?php esc_html_e( 'Login', 'homeland' ); ?></a> | <a href="#lost-password" class="modal-popup"><?php esc_html_e( 'Lost your Password?', 'homeland' ); ?></a>
</div>