<?php
/*
	Template Name: Login
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body class="login-page">

	<!-- Login Form -->
	<section class="coming-soon login">
		<div class="inside clearfix">
			<?php 
				get_template_part( 'template-parts/header/logo' );

				if ( ! is_user_logged_in() ) :
					if( !empty( $post->homeland_ptitle ) ) : 
						echo '<h2><span>' . esc_html( $post->homeland_ptitle ) . '</span></h2>';
					else : 
						the_title('<h2><span>', '</span></h2>'); 
					endif; 

					if( !empty( $post->homeland_subtitle ) ) : 
						echo '<h3>'. esc_html( stripslashes ( $post->homeland_subtitle ) ) .'</h3>';
					else : 
						echo '<h3>'. esc_html__( 'Already a member? Please login here', 'homeland' ) .'</h3>';
					endif;

					$args = array(
						'echo'           => true,
						'remember'       => true,
						'redirect'       => home_url( add_query_arg( array(), $wp->request ) ),
						'form_id' 		   => 'homeland-loginform',
						'id_username'    => 'user_login',
						'id_password'    => 'user_pass',
						'id_remember'    => 'rememberme',
						'id_submit'      => 'wp-submit',
						'label_username' => esc_html__( 'Username', 'homeland' ),
						'label_password' => esc_html__( 'Password', 'homeland' ),
						'label_remember' => esc_html__( 'Remember Me', 'homeland' ),
						'label_log_in'   => esc_html__( 'Log In', 'homeland' ),
						'value_username' => '',
						'value_remember' => false
					);

					wp_login_form( $args ); ?>

					<div class="login-links">
						<a href="<?php echo wp_registration_url(); ?>"><?php esc_html_e( 'Register', 'homeland' ); ?></a> | <a href="<?php echo wp_lostpassword_url(); ?>" title="<?php esc_html_e( 'Lost Password', 'homeland' ); ?>"><?php esc_html_e( 'Lost your Password?', 'homeland' ); ?></a>
					</div><?php
				else :
					$homeland_current_user = wp_get_current_user(); ?>
					<h2>
						<span><?php echo sprintf( esc_html__( 'Howdy, %s', 'homeland' ), $homeland_current_user->user_firstname ); ?></span>
					</h2>
					<div class="login-actions">
						<a href="<?php echo get_edit_user_link(); ?>" target="_blank"><?php esc_html_e( 'View Profile', 'homeland' ); ?></a>
						<a href="<?php echo get_author_posts_url( $homeland_current_user->ID ); ?>" target="_blank"><?php esc_html_e( 'View Properties', 'homeland' ); ?></a>
						<a href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e( 'Logout', 'homeland' ); ?></a>
					</div><?php
				endif;
			?>
		</div>
	</section>

<?php wp_footer(); ?>

</body>
</html>