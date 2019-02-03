<?php
	function homeland_theme_customizer( $wp_customize ) {
		include get_template_directory() . '/inc/customizer/option-general.php';
		include get_template_directory() . '/inc/customizer/option-typography.php';
		include get_template_directory() . '/inc/customizer/option-background.php';
		include get_template_directory() . '/inc/customizer/option-header.php';
		include get_template_directory() . '/inc/customizer/option-footer.php';
		include get_template_directory() . '/inc/customizer/option-home.php';
		include get_template_directory() . '/inc/customizer/option-blog.php';
		include get_template_directory() . '/inc/customizer/option-contact.php';

		if ( function_exists( 'codeex_cpt' ) ) :
			include get_template_directory() . '/inc/customizer/option-agents.php';
			include get_template_directory() . '/inc/customizer/option-advance-search.php';
			include get_template_directory() . '/inc/customizer/option-properties.php';
			include get_template_directory() . '/inc/customizer/option-portfolio.php';
			include get_template_directory() . '/inc/customizer/option-services.php';
		endif;
		
		if ( function_exists( 'bbpress' ) ) :
			include get_template_directory() . '/inc/customizer/option-forum.php';
		endif;
	}

	add_action( 'customize_register', 'homeland_theme_customizer' );


	/* Sanitize callback for yes-no option */
	if ( ! function_exists( 'homeland_option_yes_no' ) ) :
		function homeland_option_yes_no( $homeland_input ) {
			$homeland_valid = array(
				'true' => esc_html__( 'Yes', 'homeland' ), 
				'' => esc_html__( 'No', 'homeland' ), 
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for paging option */
	if ( ! function_exists( 'homeland_option_paging' ) ) :
		function homeland_option_paging( $homeland_input ) {
			$homeland_valid = array(
				'Pagination' => esc_html__( 'Pagination', 'homeland' ),
				'Next Previous Link' => esc_html__( 'Next Previous Link', 'homeland' )
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for order option */
	if ( ! function_exists( 'homeland_option_order' ) ) :
		function homeland_option_order( $homeland_input ) {
			$homeland_valid = array(
				'ASC' => esc_html__( 'Ascending', 'homeland' ),
				'DESC' => esc_html__( 'Descending', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for sort author option */
	if ( ! function_exists( 'homeland_option_sortby' ) ) :
		function homeland_option_sortby( $homeland_input ) {
			$homeland_valid = array(
				'ID' => esc_html__( 'ID', 'homeland' ),
				'author' => esc_html__( 'Author', 'homeland' ),
				'title' => esc_html__( 'Title', 'homeland' ),
				'name' => esc_html__( 'Name', 'homeland' ),
				'date' => esc_html__( 'Date', 'homeland' ),
				'modified' => esc_html__( 'Modified', 'homeland' ),
				'parent' => esc_html__( 'Parent', 'homeland' ),
				'rand' => esc_html__( 'Random', 'homeland' ),
				'comment_count' => esc_html__( 'Comment Count', 'homeland' ),
				'menu_order' => esc_html__( 'Menu Order', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for sortby agent option */
	if ( ! function_exists( 'homeland_option_agent_sortby' ) ) :
		function homeland_option_agent_sortby( $homeland_input ) {
			$homeland_valid = array(
				'ID' => esc_html__( 'ID', 'homeland' ),
				'display_name' => esc_html__( 'Display Name', 'homeland' ),
				'name' => esc_html__( 'Name', 'homeland' ),
				'login' => esc_html__( 'Login', 'homeland' ),
				'nicename' => esc_html__( 'Nicename', 'homeland' ),
				'email' => esc_html__( 'Email', 'homeland' ),
				'url' => esc_html__( 'URL', 'homeland' ),
				'registered' => esc_html__( 'Registered', 'homeland' ),
				'post_count' => esc_html__( 'Post Count', 'homeland' ),
				'meta_value' => esc_html__( 'Meta Value', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for sort city option */
	if ( ! function_exists( 'homeland_option_city_sortby' ) ) :
		function homeland_option_city_sortby( $homeland_input ) {
			$homeland_valid = array(
				'id' => esc_html__( 'ID', 'homeland' ),
				'count' => esc_html__( 'Count', 'homeland' ),
				'name' => esc_html__( 'Name', 'homeland' ),
				'slug' => esc_html__( 'Slug', 'homeland' ),
				'none' => esc_html__( 'None', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for agent layout option */
	if ( ! function_exists( 'homeland_option_agent_layout' ) ) :
		function homeland_option_agent_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for partners layout option */
	if ( ! function_exists( 'homeland_option_partner_layout' ) ) :
		function homeland_option_partner_layout( $homeland_input ) {
			$homeland_valid = array(
				'default' => esc_html__( 'Default', 'homeland' ),
				'grid' => esc_html__( 'Grid', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for page layout option */
	if ( ! function_exists( 'homeland_page_layout' ) ) :
		function homeland_page_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'1 Column' => esc_html__( '1 Column', 'homeland' ),
				'2 Columns' => esc_html__( '2 Columns', 'homeland' ),
				'3 Columns' => esc_html__( '3 Columns', 'homeland' ),
				'4 Columns' => esc_html__( '4 Columns', 'homeland' ),
				'Grid Sidebar' => esc_html__( 'Grid Sidebar', 'homeland' ),
				'Grid Left Sidebar' => esc_html__( 'Grid Left Sidebar', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for background type option */
	if ( ! function_exists( 'homeland_option_bg_type' ) ) :
		function homeland_option_bg_type( $homeland_input ) {
			$homeland_valid = array(
				'Color' => esc_html__( 'Color', 'homeland' ),
				'Pattern' => esc_html__( 'Pattern', 'homeland' ),
				'Image' => esc_html__( 'Image', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for background pattern option */
	if ( ! function_exists( 'homeland_option_pattern' ) ) :
		function homeland_option_pattern( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Select Pattern', 'homeland' ),
				'Symphony' => esc_html__( 'Symphony', 'homeland' ),
				'Contemporary China' => esc_html__( 'Contemporary China', 'homeland' ),
				'Eight Horns' => esc_html__( 'Eight Horns', 'homeland' ),
				'Swirl' => esc_html__( 'Swirl', 'homeland' ),
				'Mini Waves' => esc_html__( 'Mini Waves', 'homeland' ),
				'Skulls' => esc_html__( 'Skulls', 'homeland' ),
				'Pentagon' => esc_html__( 'Pentagon', 'homeland' ),
				'Halftone' => esc_html__( 'Halftone', 'homeland' ),
				'Giftly' => esc_html__( 'Giftly', 'homeland' ),
				'Food' => esc_html__( 'Food', 'homeland' ),
				'Sprinkles' => esc_html__( 'Sprinkles', 'homeland' ),
				'Geometry' => esc_html__( 'Geometry', 'homeland' ),
				'Dimension' => esc_html__( 'Dimension', 'homeland' ),
				'Pixel Weave' => esc_html__( 'Pixel Weave', 'homeland' ),
				'Hoffman' => esc_html__( 'Hoffman', 'homeland' ),
				'Gray Lines' => esc_html__( 'Gray Lines', 'homeland' ),
				'Noise Lines' => esc_html__( 'Noise Lines', 'homeland' ),
				'Tiny Grid' => esc_html__( 'Tiny Grid', 'homeland' ),
				'Bullseye' => esc_html__( 'Bullseye', 'homeland' ),
				'Gray Paper' => esc_html__( 'Gray Paper', 'homeland' ),
				'Norwegian Rose' => esc_html__( 'Norwegian Rose', 'homeland' ),
				'Subtle Net' => esc_html__( 'Subtle Net', 'homeland' ),
				'Polyester Lite' => esc_html__( 'Polyester Lite', 'homeland' ),
				'Absurdity' => esc_html__( 'Absurdity', 'homeland' ),
				'White Bed Sheet' => esc_html__( 'White Bed Sheet', 'homeland' ),
				'Subtle Stripes' => esc_html__( 'Subtle Stripes', 'homeland' ),
				'Light Mesh' => esc_html__( 'Light Mesh', 'homeland' ),
				'Rough Diagonal' => esc_html__( 'Rough Diagonal', 'homeland' ),
				'Arabesque' => esc_html__( 'Arabesque', 'homeland' ),
				'Stack Circles' => esc_html__( 'Stack Circles', 'homeland' ),
				'Hexellence' => esc_html__( 'Hexellence', 'homeland' ),
				'White Texture' => esc_html__( 'White Texture', 'homeland' ),
				'Concrete Wall' => esc_html__( 'Concrete Wall', 'homeland' ),
				'Brush Aluminum' => esc_html__( 'Brush Aluminum', 'homeland' ),
				'Groovepaper' => esc_html__( 'Groovepaper', 'homeland' ),
				'Diagonal Noise' => esc_html__( 'Diagonal Noise', 'homeland' ),
				'Rocky Wall' => esc_html__( 'Rocky Wall', 'homeland' ),
				'Whitey' => esc_html__( 'Whitey', 'homeland' ),
				'Bright Squares' => esc_html__( 'Bright Squares', 'homeland' ),
				'Freckles' => esc_html__( 'Freckles', 'homeland' ),
				'Wallpaper' => esc_html__( 'Wallpaper', 'homeland' ),
				'Project Paper' => esc_html__( 'Project Paper', 'homeland' ),
				'Cubes' => esc_html__( 'Cubes', 'homeland' ),
				'Washi' => esc_html__( 'Washi', 'homeland' ),
				'Dot Noise' => esc_html__( 'Dot Noise', 'homeland' ),
				'xv' => esc_html__( 'xv', 'homeland' ),
				'Little Plaid' => esc_html__( 'Little Plaid', 'homeland' ),
				'Old Wall' => esc_html__( 'Old Wall', 'homeland' ),
				'Connect' => esc_html__( 'Connect', 'homeland' ),
				'Ravenna' => esc_html__( 'Ravenna', 'homeland' ),
				'Smooth Wall' => esc_html__( 'Smooth Wall', 'homeland' ),
				'Tapestry' => esc_html__( 'Tapestry', 'homeland' ),
				'Psychedelic' => esc_html__( 'Psychedelic', 'homeland' ),
				'Scribble Light' => esc_html__( 'Scribble Light', 'homeland' ),
				'GPlay' => esc_html__( 'GPlay', 'homeland' ),
				'Lil Fiber' => esc_html__( 'Lil Fiber', 'homeland' ),
				'First Aid' => esc_html__( 'First Aid', 'homeland' ),
				'Frenchstucco' => esc_html__( 'Frenchstucco', 'homeland' ),
				'Light Wool' => esc_html__( 'Light Wool', 'homeland' ),
				'Gradient Squares' => esc_html__( 'Gradient Squares', 'homeland' ),
				'Escheresque' => esc_html__( 'Escheresque', 'homeland' ),
				'Climpek' => esc_html__( 'Climpek', 'homeland' ),
				'Lyonnette' => esc_html__( 'Lyonnette', 'homeland' ),
				'Gray Floral' => esc_html__( 'Gray Floral', 'homeland' ),
				'Reticular Tissue' => esc_html__( 'Reticular Tissue', 'homeland' ),
				'Confectionary' => esc_html__( 'Confectionary', 'homeland' ),
				'Dark Sharp Edges' => esc_html__( 'Dark Sharp Edges', 'homeland' ),
				'Subtle White Feathers' => esc_html__( 'Subtle White Feathers', 'homeland' ),
				'Tileable Wood' => esc_html__( 'Tileable Wood', 'homeland' ),
				'Pineapple Cut' => esc_html__( 'Pineapple Cut', 'homeland' ),
				'Japanese Sayagata' => esc_html__( 'Japanese Sayagata', 'homeland' ),
				'Seigaiha' => esc_html__( 'Seigaiha', 'homeland' ),
				'Topography' => esc_html__( 'Topography', 'homeland' ),
				'Circles and Roundabouts' => esc_html__( 'Circles and Roundabouts', 'homeland' ),
				'POW Star' => esc_html__( 'POW Star', 'homeland' ),
				'Doodles' => esc_html__( 'Doodles', 'homeland' ),
				'Hyponotize' => esc_html__( 'Hyponotize', 'homeland' ),
				'Regal' => esc_html__( 'Regal', 'homeland' ),
				'Right Round' => esc_html__( 'Right Round', 'homeland' ),
				'Intersection' => esc_html__( 'Intersection', 'homeland' ),
				'Curls' => esc_html__( 'Curls', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for blog layout option */
	if ( ! function_exists( 'homeland_option_blog_layout' ) ) :
		function homeland_option_blog_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'List Alternate' => esc_html__( 'List Alternate', 'homeland' ),
				'Grid' => esc_html__( 'Grid', 'homeland' ),
				'Grid Left Sidebar' => esc_html__( 'Grid Left Sidebar', 'homeland' ),
				'2 Columns' => esc_html__( '2 Columns', 'homeland' ),
				'3 Columns' => esc_html__( '3 Columns', 'homeland' ),
				'4 Columns' => esc_html__( '4 Columns', 'homeland' ),
				'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				'Timeline' => esc_html__( 'Timeline', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for footer layout option */
	if ( ! function_exists( 'homeland_option_footer_layout' ) ) :
		function homeland_option_footer_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Layout 2' => esc_html__( 'Layout 2', 'homeland' ),
				'Layout 3' => esc_html__( 'Layout 3', 'homeland' ),
				'Layout 4' => esc_html__( 'Layout 4', 'homeland' ),
				'Layout 5' => esc_html__( 'Layout 5', 'homeland' ),
				'Layout 6' => esc_html__( 'Layout 6', 'homeland' ),
				'Layout 7' => esc_html__( 'Layout 7', 'homeland' ),
				'Layout 8' => esc_html__( 'Layout 8', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for site layout option */
	if ( ! function_exists( 'homeland_option_site_layout' ) ) :
		function homeland_option_site_layout( $homeland_input ) {
			$homeland_valid = array(
				'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				'Boxed' => esc_html__( 'Boxed', 'homeland' ),
				'Boxed Left' => esc_html__( 'Boxed Left', 'homeland' )
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for position option */
	if ( ! function_exists( 'homeland_option_position' ) ) :
		function homeland_option_position( $homeland_input ) {
			$homeland_valid = array(
				'relative' => esc_html__( 'Relative', 'homeland' ),
				'fixed' => esc_html__( 'Fixed', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for arrangement */
	if ( ! function_exists( 'homeland_option_arrangement' ) ) :
		function homeland_option_arrangement( $homeland_input ) {
			$homeland_valid = array(
				'top' => esc_html__( 'Top', 'homeland' ),
				'bottom' => esc_html__( 'Bottom', 'homeland' ),
				'right' => esc_html__( 'Right', 'homeland' ),
				'left' => esc_html__( 'Left', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for header layout option */
	if ( ! function_exists( 'homeland_option_header_layout' ) ) :
		function homeland_option_header_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Header 2' => esc_html__( 'Header 2', 'homeland' ),
				'Header 3' => esc_html__( 'Header 3', 'homeland' ),
				'Header 4' => esc_html__( 'Header 4', 'homeland' ),
				'Header 5' => esc_html__( 'Header 5', 'homeland' ),
				'Header 6' => esc_html__( 'Header 6', 'homeland' ),
				'Header 7' => esc_html__( 'Header 7', 'homeland' ),
				'Header 8' => esc_html__( 'Header 8', 'homeland' ),
				'Header 9' => esc_html__( 'Header 9', 'homeland' ),
				'Header 10' => esc_html__( 'Header 10', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for top elements option */
	if ( ! function_exists( 'homeland_option_top_elements' ) ) :
		function homeland_option_top_elements( $homeland_input ) {
			$homeland_valid = array(
				'slider' => esc_html__( 'Slider', 'homeland' ),
				'thumb-slider' => esc_html__( 'Thumb Slider', 'homeland' ),
				'revslider' => esc_html__( 'Revolution Slider', 'homeland' ),
				'static-image' => esc_html__( 'Static Image', 'homeland' ),
				'google-map' => esc_html__( 'Google Map', 'homeland' ),
				'video' => esc_html__( 'Video', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for slider display option */
	if ( ! function_exists( 'homeland_option_slider_display' ) ) :
		function homeland_option_slider_display( $homeland_input ) {
			$homeland_valid = array(
				'Properties' => esc_html__( 'Properties', 'homeland' ),
				'Featured Properties' => esc_html__( 'Featured Properties', 'homeland' ),
				'Blog' => esc_html__( 'Blog', 'homeland' ),
				'Portfolio' => esc_html__( 'Portfolio', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for sort property option */
	if ( ! function_exists( 'homeland_option_property_sortby' ) ) :
		function homeland_option_property_sortby( $homeland_input ) {
			$homeland_valid = array(
				'ID' => esc_html__( 'ID', 'homeland' ),
				'author' => esc_html__( 'Author', 'homeland' ),
				'title' => esc_html__( 'Title', 'homeland' ),
				'name' => esc_html__( 'Name', 'homeland' ),
				'date' => esc_html__( 'Date', 'homeland' ),
				'modified' => esc_html__( 'Modified', 'homeland' ),
				'parent' => esc_html__( 'Parent', 'homeland' ),
				'rand' => esc_html__( 'Random', 'homeland' ),
				'comment_count' => esc_html__( 'Comment Count', 'homeland' ),
				'menu_order' => esc_html__( 'Menu Order', 'homeland' ),
				'price' => esc_html__( 'Price', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for link target option */
	if ( ! function_exists( 'homeland_option_link_target' ) ) :
		function homeland_option_link_target( $homeland_input ) {
			$homeland_valid = array(
				'_self' => esc_html__( 'Self', 'homeland' ),
				'_blank' => esc_html__( 'Blank', 'homeland' ),
				'_parent' => esc_html__( 'Parent', 'homeland' ),
				'_top' => esc_html__( 'Top', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;

	
	/* Sanitize callback for portfolio layout option */
	if ( ! function_exists( 'homeland_option_portfolio_layout' ) ) :
		function homeland_option_portfolio_layout( $homeland_input ) {
			$homeland_valid = array(
				'Fullwidth' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'Right Sidebar' => esc_html__( 'Right Sidebar', 'homeland' ),
				'Grid' => esc_html__( 'Grid No Space', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for price format option */
	if ( ! function_exists( 'homeland_option_price_format' ) ) :
		function homeland_option_price_format( $homeland_input ) {
			$homeland_valid = array(
				'Comma' => esc_html__( 'Comma', 'homeland' ),
				'Dot' => esc_html__( 'Dot', 'homeland' ),
				'Europe' => esc_html__( 'Europe', 'homeland' ),
				'Brazil' => esc_html__( 'Brazil', 'homeland' ),
				'None' => esc_html__( 'None', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for price position option */
	if ( ! function_exists( 'homeland_option_price_position' ) ) :
		function homeland_option_price_position( $homeland_input ) {
			$homeland_valid = array(
				'Before' => esc_html__( 'Before', 'homeland' ),
				'After' => esc_html__( 'After', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for columns display option */
	if ( ! function_exists( 'homeland_property_home_cols_option' ) ) :
		function homeland_property_home_cols_option( $homeland_input ) {
			$homeland_valid = array(
				'three-cols' => esc_html__( '3 Columns', 'homeland' ),
				'two-cols' => esc_html__( '2 Columns', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for price position option */
	if ( ! function_exists( 'homeland_option_property_sorting' ) ) :
		function homeland_option_property_sorting( $homeland_input ) {
			$homeland_valid = array(
				'date' => esc_html__( 'Date', 'homeland' ),
				'title' => esc_html__( 'Name', 'homeland' ),
				'price' => esc_html__( 'Price', 'homeland' ),
				'rand' => esc_html__( 'Random', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for preferred size option */
	if ( ! function_exists( 'homeland_option_preferred_size' ) ) :
		function homeland_option_preferred_size( $homeland_input ) {
			$homeland_valid = array(
				'Lot Area' => esc_html__( 'Lot Area', 'homeland' ),
				'Floor Area' => esc_html__( 'Floor Area', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for single property layout option */
	if ( ! function_exists( 'homeland_option_single_property_layout' ) ) :
		function homeland_option_single_property_layout( $homeland_input ) {
			$homeland_valid = array(
				'Right Sidebar' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for services archive layout option */
	if ( ! function_exists( 'homeland_option_services_archive_layout' ) ) :
		function homeland_option_services_archive_layout( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
				'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				'Grid Fullwidth' => esc_html__( 'Grid Fullwidth', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;

	/* Sanitize callback for theme fonts option */
	if ( ! function_exists( 'homeland_option_fonts' ) ) :
		function homeland_option_fonts( $homeland_input ) {
			$homeland_valid = array(
				'Default' => esc_html__( 'Default', 'homeland' ),
				'Abel' => esc_html__( 'Abel', 'homeland' ),
				'Actor' => esc_html__( 'Actor', 'homeland' ),
				'Alegreya Sans' => esc_html__( 'Alegreya Sans', 'homeland' ),
				'Archivo Narrow' => esc_html__( 'Archivo Narrow', 'homeland' ),
				'Arimo' => esc_html__( 'Arimo', 'homeland' ),
				'Armata' => esc_html__( 'Armata', 'homeland' ),
				'Arvo' => esc_html__( 'Arvo', 'homeland' ),
				'Asap' => esc_html__( 'Asap', 'homeland' ),
				'Bitter' => esc_html__( 'Bitter', 'homeland' ),
				'Cabin' => esc_html__( 'Cabin', 'homeland' ),
				'Cambay' => esc_html__( 'Cambay', 'homeland' ),
				'Cambo' => esc_html__( 'Cambo', 'homeland' ),
				'Carme' => esc_html__( 'Carme', 'homeland' ),
				'Carrois Gothic' => esc_html__( 'Carrois Gothic', 'homeland' ),
				'Catamaran' => esc_html__( 'Catamaran', 'homeland' ),
				'Chivo' => esc_html__( 'Chivo', 'homeland' ),
				'Comfortaa' => esc_html__( 'Comfortaa', 'homeland' ),
				'Crimson Text' => esc_html__( 'Crimson Text', 'homeland' ),
				'Didact Gothic' => esc_html__( 'Didact Gothic', 'homeland' ),
				'Domine' => esc_html__( 'Domine', 'homeland' ),
				'Dosis' => esc_html__( 'Dosis', 'homeland' ),
				'Droid Sans' => esc_html__( 'Droid Sans', 'homeland' ),
				'Duru Sans' => esc_html__( 'Duru Sans', 'homeland' ),
				'EB Garamond' => esc_html__( 'EB Garamond', 'homeland' ),
				'Exo' => esc_html__( 'Exo', 'homeland' ),
				'Fira Sans' => esc_html__( 'Fira Sans', 'homeland' ),
				'Gafata' => esc_html__( 'Gafata', 'homeland' ),
				'Gentium Basic' => esc_html__( 'Gentium Basic', 'homeland' ),
				'Gudea' => esc_html__( 'Gudea', 'homeland' ),
				'Glegoo' => esc_html__( 'Glegoo', 'homeland' ),
				'Hind' => esc_html__( 'Hind', 'homeland' ),
				'Hind Madurai' => esc_html__( 'Hind Madurai', 'homeland' ),
				'Inconsolata' => esc_html__( 'Inconsolata', 'homeland' ),
				'Istok Web' => esc_html__( 'Istok Web', 'homeland' ),
				'Jaldi' => esc_html__( 'Jaldi', 'homeland' ),
				'Josefin Sans' => esc_html__( 'Josefin Sans', 'homeland' ),
				'Karla' => esc_html__( 'Karla', 'homeland' ),
				'Khula' => esc_html__( 'Khula', 'homeland' ),
				'Kreon' => esc_html__( 'Kreon', 'homeland' ),
				'Lato' => esc_html__( 'Lato', 'homeland' ),
				'Libre Franklin' => esc_html__( 'Libre Franklin', 'homeland' ),
				'Lora' => esc_html__( 'Lora', 'homeland' ),
				'Mako' => esc_html__( 'Mako', 'homeland' ),
				'Merriweather' => esc_html__( 'Merriweather', 'homeland' ),
				'Monda' => esc_html__( 'Monda', 'homeland' ),
				'Montserrat' => esc_html__( 'Montserrat', 'homeland' ),
				'Muli' => esc_html__( 'Muli', 'homeland' ),
				'News Cycle' => esc_html__( 'News Cycle', 'homeland' ),
				'Nixie One' => esc_html__( 'Nixie One', 'homeland' ),
				'Nobile' => esc_html__( 'Nobile', 'homeland' ),
				'Noticia Text' => esc_html__( 'Noticia Text', 'homeland' ),
				'Noto Sans' => esc_html__( 'Noto Sans', 'homeland' ),
				'Nunito Sans' => esc_html__( 'Nunito Sans', 'homeland' ),
				'Old Standard TT' => esc_html__( 'Old Standard TT', 'homeland' ),
				'Open Sans' => esc_html__( 'Open Sans', 'homeland' ),
				'Oswald' => esc_html__( 'Oswald', 'homeland' ),
				'Oxygen' => esc_html__( 'Oxygen', 'homeland' ),
				'Padauk' => esc_html__( 'Padauk', 'homeland' ),
				'Poiret One' => esc_html__( 'Poiret One', 'homeland' ),
				'Pontano Sans' => esc_html__( 'Pontano Sans', 'homeland' ),
				'Poppins' => esc_html__( 'Poppins', 'homeland' ),
				'PT Sans' => esc_html__( 'PT Sans', 'homeland' ),
				'PT Serif' => esc_html__( 'PT Serif', 'homeland' ),
				'Puritan' => esc_html__( 'Puritan', 'homeland' ),
				'Quattrocento Sans' => esc_html__( 'Quattrocento Sans', 'homeland' ),
				'Questrial' => esc_html__( 'Questrial', 'homeland' ),
				'Quicksand' => esc_html__( 'Quicksand', 'homeland' ),
				'Rajdhani' => esc_html__( 'Rajdhani', 'homeland' ),
				'Raleway' => esc_html__( 'Raleway', 'homeland' ),
				'Rambla' => esc_html__( 'Rambla', 'homeland' ),
				'Rubik' => esc_html__( 'Rubik', 'homeland' ),
				'Ruda' => esc_html__( 'Ruda', 'homeland' ),
				'Sanchez' => esc_html__( 'Sanchez', 'homeland' ),
				'Share' => esc_html__( 'Share', 'homeland' ),
				'Source Sans Pro' => esc_html__( 'Source Sans Pro', 'homeland' ),
				'Sintony' => esc_html__( 'Sintony', 'homeland' ),
				'Slabo' => esc_html__( 'Slabo', 'homeland' ),
				'Telex' => esc_html__( 'Telex', 'homeland' ),
				'Titillium Web' => esc_html__( 'Titillium Web', 'homeland' ),
				'Ubuntu' => esc_html__( 'Ubuntu', 'homeland' ),
				'Varela Round' => esc_html__( 'Varela Round', 'homeland' ),
				'Voces' => esc_html__( 'Voces', 'homeland' ),
				'Vollkorn' => esc_html__( 'Vollkorn', 'homeland' ),
				'Work Sans' => esc_html__( 'Work Sans', 'homeland' ),
				'Yantramanav' => esc_html__( 'Yantramanav', 'homeland' ),
			);
			if ( array_key_exists( $homeland_input, $homeland_valid ) ) :
				return $homeland_input;
			else :
				return '';
			endif;
		}
	endif;


	/* Sanitize callback for textarea */
	if ( ! function_exists( 'homeland_textarea' ) ) :
		function homeland_textarea( $homeland_text ) {
	    return $homeland_text;
		}
	endif;

	if ( ! function_exists( 'homeland_with_html' ) ) :
		function homeland_with_html( $homeland_text ) {
	    return $homeland_text;
		}
	endif;
?>