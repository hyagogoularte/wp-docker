<?php
/*
	Template Name: Coming Soon
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body class="coming-soon-page">
	<section class="coming-soon">
		<div class="inside clearfix">
			<div class="post-col-12">
				<?php get_template_part( 'template-parts/header/logo' ); ?>
				<h2><span><?php echo homeland_option( 'homeland_coming_soon_header', esc_html__( 'Our Site is Almost Ready', 'homeland' ) ); ?></span></h2>
				<h5><?php echo homeland_option( 'homeland_coming_soon_text', esc_html__( 'Hello! Nice to meet you. We will be back soon once were done building this site.', 'homeland' ) ); ?></h5>
				<h3><?php echo homeland_option( 'homeland_coming_soon_sheader', esc_html__( 'Time left until launching', 'homeland' ) ); ?></h3>
			</div>
			<div id="defaultCountdown"></div>
			<div class="post-col-12 clearfix">
				<?php get_template_part( 'template-parts/header/social-icons' ); ?>
			</div>
		</div>
	</section>

<?php wp_footer(); ?>
</body>
</html>