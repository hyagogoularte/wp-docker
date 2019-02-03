<?php
	$homeland_all_agents = get_option( 'homeland_all_agents' );

	require get_theme_file_path( '/widgets/widget-follow-us.php' );
	require get_theme_file_path( '/widgets/widget-contact.php' );
	require get_theme_file_path( '/widgets/widget-popular.php' );
	require get_theme_file_path( '/widgets/widget-twitter.php' );
	require get_theme_file_path( '/widgets/widget-facebook-like.php' );
	require get_theme_file_path( '/widgets/widget-gmap.php' );
	require get_theme_file_path( '/widgets/widget-working-hours.php' );

	if( function_exists( 'codeex_cpt' ) ) :
		if( empty( $homeland_all_agents ) ) : 
			require get_theme_file_path( '/widgets/widget-agent.php' );
		endif;
		require get_theme_file_path( '/widgets/widget-featured-properties.php' );
		require get_theme_file_path( '/widgets/widget-search-type.php' );
		require get_theme_file_path( '/widgets/widget-search-location.php' );
		require get_theme_file_path( '/widgets/widget-search-status.php' );
		require get_theme_file_path( '/widgets/widget-search-amenities.php' );
		require get_theme_file_path( '/widgets/widget-advance-search.php' );
		require get_theme_file_path( '/widgets/widget-portfolio.php' );
		require get_theme_file_path( '/widgets/widget-testimonials.php' );
	endif;


	// Sidebar Widgets

	if ( ! function_exists( 'homeland_sidebar_widgets_init' ) ) :
		function homeland_sidebar_widgets_init() {
		
			register_sidebar( array(
				'name' => esc_html__( 'Page Sidebar', 'homeland' ),
				'id' => 'homeland_sidebar',
				'description' => esc_html__( 'Main widgets of the theme', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Sliding Bar', 'homeland' ),
				'id' => 'homeland_sliding_bar',
				'description' => esc_html__( 'Sliding Bar widgets of the theme located at the top of the website', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-col-3 post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Top Slider', 'homeland' ),
				'id' => 'homeland_top_slider',
				'description' => esc_html__('Top slider widgets of the theme for revolution slider', 'homeland'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Search Type', 'homeland' ),
				'id' => 'homeland_search_type',
				'description' => esc_html__( 'Search Type widgets of the theme for IDX listing search. Leave it empty if you want to use the default Advance Search', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Dual Sidebar', 'homeland' ),
				'id' => 'homeland_dual_sidebar',
				'description' => esc_html__( 'This widgets of the theme is for dual sidebar, this is displayed in left sidebar', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Footer One', 'homeland' ),
				'id' => 'homeland_footer_one',
				'description' => esc_html__( 'Footer column widget of the theme', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Footer Two', 'homeland' ),
				'id' => 'homeland_footer_two',
				'description' => esc_html__( 'Footer column widget of the theme', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Footer Three', 'homeland' ),
				'id' => 'homeland_footer_three',
				'description' => esc_html__( 'Footer column widget of the theme', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );

			register_sidebar( array(
				'name' => esc_html__( 'Footer Four', 'homeland' ),
				'id' => 'homeland_footer_four',
				'description' => esc_html__( 'Footer column widget of the theme', 'homeland' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s post-bottom">',
				'after_widget' => "</div>",
				'before_title' => '<h5>',
				'after_title' => '</h5>',
			) );
			
		}
	endif;
	add_action( 'widgets_init', 'homeland_sidebar_widgets_init' );
?>