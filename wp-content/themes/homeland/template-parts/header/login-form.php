<form method="post" action="<?php echo esc_url( home_url( '/wp-login.php' ) ); ?>" id="homeland-loginform" name="homeland-loginform">
	<p class="login-username">
		<label for="user_login"><?php esc_html_e( 'Username', 'homeland' ); ?></label>
		<input type="text" size="20" value="" class="input required" id="user_login" name="log">
	</p>
	<p class="login-password">
		<label for="user_pass"><?php esc_html_e( 'Password', 'homeland' ); ?></label>
		<input type="password" size="20" value="" class="input required" id="user_pass" name="pwd">
	</p>
	<p class="login-remember"><label><input type="checkbox" value="forever" id="rememberme" name="rememberme"> <?php esc_html_e( 'Remember Me', 'homeland' ); ?></label></p>
	<p class="login-submit">
		<input type="submit" value="<?php esc_html_e( 'Log In', 'homeland' ); ?>" class="button-primary" id="wp-submit" name="wp-submit">
		<input type="hidden" value="<?php echo esc_url( home_url( '/' ) ); ?>" name="redirect_to">
	</p>
</form>
<div class="login-links textcenter">
	<?php if( get_option( 'users_can_register' ) ) : ?>
		<a href="#register" class="modal-popup"><?php esc_html_e( 'Register', 'homeland' ); ?></a> | 
	<?php endif; ?>
	<a href="#lost-password" class="modal-popup">
		<?php esc_html_e( 'Lost your Password?', 'homeland' ); ?>
	</a>
</div>