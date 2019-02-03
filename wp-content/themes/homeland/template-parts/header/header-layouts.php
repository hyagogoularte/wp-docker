<?php 
	$homeland_theme_header = get_option( 'homeland_theme_header' );
	$homeland_sticky_header = get_option( 'homeland_sticky_header' );
	$homeland_theme_layout = get_option( 'homeland_theme_layout' );
	$homeland_contact_address = get_option( 'homeland_contact_address' );
	$homeland_hide_header_image = get_option( 'homeland_hide_header_image' );

	$homeland_theme_class_header = "";
	$homeland_theme_class_header_container = "";
	$homeland_theme_class_hide_header_image = "";

	if( !empty( $homeland_sticky_header ) ) : 
		$homeland_theme_class_header_container = "sticky-header";
		
		$homeland_theme_class_header = ( 'Header 2' === $homeland_theme_header ) ? 'sticky-header2-container' : 'sticky-header-container';

		$homeland_theme_class_header = ( 'Header 6' === $homeland_theme_header ) ? 'sticky-header-container sticky-header-six' : '';

		$homeland_theme_class_header = ( 'Header 9' === $homeland_theme_header ) ? 'sticky-header-container sticky-header-nine' : '';

		$homeland_theme_class_header = ( 'Header 10' === $homeland_theme_header ) ? 'sticky-header-container sticky-header-ten' : '';
	endif;

	if( 'Header 4' === $homeland_theme_header ) : 
		$homeland_theme_class_header = "transparent-header";
		$homeland_theme_class_header_container = "sticky-header";
	elseif( 'Header 7' === $homeland_theme_header ) : 
		$homeland_theme_class_header_container = "sticky-header header-seven";
	endif;

	if( 'Boxed' === $homeland_theme_layout ) : 
		$homeland_theme_class_main = "container-boxed";
	elseif( 'Boxed Left' === $homeland_theme_layout ) :
		$homeland_theme_class_main = "container-boxed-left";
	else :
		$homeland_theme_class_main = "container";
	endif;

	$homeland_theme_class_hide_header_image = ( !empty( $homeland_hide_header_image ) ) ? 'hidden-header-image' : '';
?>

<div id="<?php echo esc_attr( $homeland_theme_class_main ); ?>" class="<?php echo esc_attr( $homeland_theme_class_header ); ?>">
	<header class="<?php echo esc_attr( $homeland_theme_class_header_container ) .' '. esc_attr( $homeland_theme_class_hide_header_image ); ?>">		
		<?php if( 'Header 2' === $homeland_theme_header ) : ?>					
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php 
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' );
					?>	
				</div>			
			</div>
		<?php	elseif( 'Header 3' === $homeland_theme_header ) : ?>					
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php 
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>	
				</div>			
			</div>
			<section class="header-block header-three">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<?php 
							get_template_part( 'template-parts/header/social-icons' );
							get_template_part( 'template-parts/header/call-info' );
						?>	
					</div>							
				</div>
			</section>
		<?php	elseif( 'Header 4' === $homeland_theme_header ) : ?>
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>	
				</div>			
			</div>
		<?php	elseif( 'Header 5' === $homeland_theme_header ) : ?>			
			<section class="header-block header-five">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<?php
							get_template_part( 'template-parts/header/call-info' );
							get_template_part( 'template-parts/header/social-icons' );
						?>	
					</div>							
				</div>
			</section>		
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php 
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>	
				</div>			
			</div>
		<?php	elseif( 'Header 6' === $homeland_theme_header ) : ?>
			<div class="header-six">
				<section class="header-block">
					<div class="inside">
						<div class="post-col-12 clearfix">
							<?php 
								get_template_part( 'template-parts/header/call-info' ); 
								get_template_part( 'template-parts/header/social-icons' );
							?>	
						</div>							
					</div>
				</section>
				<?php 
					get_template_part( 'template-parts/header/logo' );
					get_template_part( 'template-parts/header/menu' ); 
				?>
			</div>
		<?php	elseif( 'Header 7' === $homeland_theme_header ) : ?>
			<section class="header-block">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<span class="add-email"><i class="fas fa-map-pin"></i>
							<?php echo wp_kses_post( $homeland_contact_address ); ?>
						</span>
						<?php get_template_part( 'template-parts/header/call-info' ); ?>	
					</div>							
				</div>
			</section>
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php 
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>
				</div>
			</div>
		<?php elseif( 'Header 8' === $homeland_theme_header ) : ?>					
			<div class="header-block inside-fullwidth">
				<div class="post-col-12 clearfix">
					<?php
						get_template_part( 'template-parts/header/social-icons' );
						get_template_part( 'template-parts/header/call-info' );
					?>	
				</div>
			</div>
			<div class="inside-fullwidth">
				<div class="post-col-12 clearfix">
					<?php
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>	
				</div>			
			</div>
		<?php	elseif( 'Header 9' === $homeland_theme_header ) : ?>
			<div class="header-nine">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<?php 
							get_template_part( 'template-parts/header/logo' );
							get_template_part( 'template-parts/header/menu' ); 
						?>
					</div>
				</div>
			</div>
		<?php	elseif( 'Header 10' === $homeland_theme_header ) : ?>
			<div class="header-ten">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<?php 
							get_template_part( 'template-parts/header/logo' );
							get_template_part( 'template-parts/header/contact-info' );
						?>
					</div>
				</div>
				<div class="inside">
					<div class="post-col-12">
						<?php get_template_part( 'template-parts/header/menu' ); ?>
					</div>
				</div>
			</div>
		<?php	else : ?>
			<section class="header-block">
				<div class="inside">
					<div class="post-col-12 clearfix">
						<?php
							get_template_part( 'template-parts/header/social-icons' );
							get_template_part( 'template-parts/header/call-info' );
						?>	
					</div>							
				</div>
			</section>
			<div class="inside">
				<div class="post-col-12 clearfix">
					<?php
						get_template_part( 'template-parts/header/logo' );
						get_template_part( 'template-parts/header/menu' ); 
					?>
				</div>				
			</div>
		<?php	endif; ?>
	</header>

	<?php
		if( empty( $homeland_hide_header_image ) ) : 
			get_template_part( 'template-parts/header/banner-images' );
		else : 
			if( is_home() || is_front_page() || is_page_template( 'templates/template-homepage.php' ) || is_page_template( 'templates/template-homepage2.php' ) || is_page_template( 'templates/template-homepage3.php' ) || is_page_template( 'templates/template-homepage4.php' ) || is_page_template( 'templates/template-homepage-gmap-large.php' ) || is_page_template( 'templates/template-homepage-gmap.php' ) || is_page_template( 'templates/template-homepage-revslider.php' ) || is_page_template( 'templates/template-homepage-video.php' ) || is_page_template( 'templates/template-page-builder.php' ) ) : 
			else : ?>
				<section class="plain-header-title">
					<div class="inside">
						<?php get_template_part( 'template-parts/header/page-title' ); ?>
					</div>
				</section><?php
			endif;
		endif; 
	?>