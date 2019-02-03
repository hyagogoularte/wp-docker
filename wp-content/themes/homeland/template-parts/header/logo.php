<?php
	$homeland_logo = get_option( 'homeland_logo' ); 
	$homeland_blog_name = get_bloginfo( 'name' ); 
	$homeland_logo_path = get_template_directory_uri() . "/assets/img/logo.png";
	$homeland_logo_image = empty( $homeland_logo ) ? $homeland_logo_path : esc_url( $homeland_logo );
?>

<div class="logo">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( $homeland_logo_image ); ?>" alt="<?php echo esc_html( $homeland_blog_name ); ?>" title="<?php echo esc_html( $homeland_blog_name ); ?>" />
	</a>
</div>