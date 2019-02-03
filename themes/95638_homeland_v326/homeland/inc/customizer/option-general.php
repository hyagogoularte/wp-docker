<?php
	// Logo
	$wp_customize->add_setting( 'homeland_logo', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'homeland_logo', array(
		'label' => esc_html__( 'Logo', 'homeland' ),
		'section' => 'title_tagline',  
		'settings' => 'homeland_logo',
		'priority' => 1,
	) ) );

	// Retina Logo
	$wp_customize->add_setting( 'homeland_logo_retina', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'homeland_logo_retina', array(
		'label' => esc_html__( 'Retina Logo', 'homeland' ),
		'section' => 'title_tagline',  
		'settings' => 'homeland_logo_retina',
		'description' => esc_html__('Note: you need to upload image with @2x in your filename like this image@2x.jpg', 'homeland'),
		'priority' => 2,
	) ) );


	// General Panel
	$wp_customize->add_panel( 'homeland_general_panel', array(
		'title' => esc_html__( 'General', 'homeland' ),
		'priority' => 121
	));

	  // Main Section
		$wp_customize->add_section('homeland_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_general_panel',
		));

			// Layout Style
			$wp_customize->add_setting('homeland_theme_layout', array(
				'type' => 'option',
				'default' => 'Fullwidth',
				'sanitize_callback' => 'homeland_option_site_layout',
			));

			$wp_customize->add_control('homeland_theme_layout', array(
			 	'label' => esc_html__('Theme Layout', 'homeland'),
			 	'section' => 'homeland_main_section',
			 	'type' => 'select',
			 	'description' => esc_html__( 'Select the theme layout you want to use in your website', 'homeland' ),
			 	'choices' => array(
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
					'Boxed' => esc_html__( 'Boxed', 'homeland' ),
					'Boxed Left' => esc_html__( 'Boxed Left', 'homeland' )
				)
			));

			// Paging Style
			$wp_customize->add_setting('homeland_pnav', array(
				'type' => 'option',
				'default' => 'Pagination',
				'sanitize_callback' => 'homeland_option_paging',
			));

			$wp_customize->add_control('homeland_pnav', array(
			 	'label' => esc_html__('Paging Style', 'homeland'),
			 	'section' => 'homeland_main_section',
			 	'description' => esc_html__( 'Select your paging style for your posts', 'homeland' ),
			 	'type' => 'select',
			 	'choices' => array(
					'Pagination' => esc_html__( 'Pagination', 'homeland' ),
					'Next Previous Link' => esc_html__( 'Next Previous Link', 'homeland' )
				)
			));

			// Disable Preloader
			$wp_customize->add_setting( 'homeland_disable_preloader', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_disable_preloader', array(
				'label' => esc_html__( 'Preloader', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select yes if you want to disable preloader', 'homeland' ),
				'section' => 'homeland_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Preloader Icon
			$wp_customize->add_setting( 'homeland_preloader_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_preloader_icon',
					array(
						'label' => esc_html__( 'Preloader Icon', 'homeland' ),
						"description" => esc_html__( 'Upload your preloader icon use when your site is still loading, please upload only .gif extension', 'homeland' ),
						'section' => 'homeland_main_section',
					)
				)
			);

			// Use Floating Share Icons
			$wp_customize->add_setting( 'homeland_floating_share', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_floating_share', array(
				'label' => esc_html__( 'Floating Share', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select yes if you want to use a floating share icons in your property and blog single page', 'homeland' ),
				'section' => 'homeland_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Parallax
			$wp_customize->add_setting( 'homeland_parallax', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_parallax', array(
				'label' => esc_html__( 'Parallax', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select yes if you want to use a parallax effect for background image', 'homeland' ),
				'section' => 'homeland_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// Map Section
		$wp_customize->add_section('homeland_gmap_section', array(
			'title' => esc_html__('Google Map', 'homeland'),
			'panel' => 'homeland_general_panel',
			'description' => __('Please use this site <a href="http://www.latlong.net/" target="_blank">latlong.net</a> to get your latitude and longitude values.', 'homeland')
		));	

			// API Key 
			$wp_customize->add_setting('homeland_map_api', array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_map_api', array(
			 	'label' => esc_html__('Google Map API Key', 'homeland'),
			 	'section' => 'homeland_gmap_section',
			 	'description' => __('Get your google map API key <a href="https://console.developers.google.com/apis/credentials?project=massive-oasis-135623" target="_blank">here</a>.', 'homeland'),
			 	'type' => 'text',
			));

			// Latitude 
			$wp_customize->add_setting('homeland_home_map_lat', array(
				'default' => '37.0625',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_home_map_lat', array(
			 	'label' => esc_html__('Map Latitude', 'homeland'),
			 	'section' => 'homeland_gmap_section',
			 	'type' => 'text',
			));

			// Longitude 
			$wp_customize->add_setting('homeland_home_map_lng', array(
				'default' => '-95.677068',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_home_map_lng', array(
				'label' => esc_html__('Map Longitude', 'homeland'),
				'section' => 'homeland_gmap_section',
				'type' => 'text',
			));

			// Map Zoom Value 
			$wp_customize->add_setting('homeland_home_map_zoom', array(
				'default' => '10',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_home_map_zoom', array(
			 	'label' => esc_html__('Map Zoom Level', 'homeland'),
			 	'section' => 'homeland_gmap_section',
			 	'description' => esc_html__('Add map zoom level value from 1-20', 'homeland'),
			 	'type' => 'number',
			 	'input_attrs' => array( 'min' => 1, 'max' => 20, 'step'  => 1 )
			));

			// Map Pin
			$wp_customize->add_setting( 'homeland_map_pointer_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_map_pointer_icon',
					array(
						'label' => esc_html__( 'Map Pin Icon', 'homeland' ),
						'description' => esc_html__( 'Upload your google map pin icon', 'homeland' ),
						'section' => 'homeland_gmap_section',
					)
				)
			);

			// Map Marker Clusterer
			$wp_customize->add_setting( 'homeland_map_pointer_clusterer_icon', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_map_pointer_clusterer_icon',
					array(
						'label' => esc_html__( 'Map Marker Clusterer Icon', 'homeland' ),
						'description' => esc_html__( 'Upload your google map marker clusterer icon', 'homeland' ),
						'section' => 'homeland_gmap_section',
					)
				)
			);

			// Google Map Styles 
			$wp_customize->add_setting('homeland_map_styles', array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'homeland_textarea',
			));

			$wp_customize->add_control('homeland_map_styles', array(
				'label' => esc_html__('Map Styles', 'homeland'),
				'description' => __( 'Add your google map styles from <a href="https://snazzymaps.com/" target="_blank">SnazzyMaps</a>', 'homeland' ),
				'section' => 'homeland_gmap_section',
				'type' => 'textarea',
			));


		// About Section
		$wp_customize->add_section('homeland_other_about_section', array(
			'title' => esc_html__('About Page', 'homeland'),
			'panel' => 'homeland_general_panel',
		));

			// About Header
			$wp_customize->add_setting('homeland_team_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_team_header', array(
			 	'label' => esc_html__( 'Header', 'homeland' ),
			 	'description' => esc_html__( 'Add your header title for about page', 'homeland' ),
			 	'section' => 'homeland_other_about_section',
			 	'type' => 'text',
			));

			// Hide Agents
			$wp_customize->add_setting( 'homeland_about_agents', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_about_agents', array(
				'label' => esc_html__( 'Hide Agents?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_other_about_section',
				'description' => esc_html__('This will hide agent list in about page', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// 404 Page Section
		$wp_customize->add_section('homeland_other_404_section', array(
			'title' => esc_html__('404 Page', 'homeland'),
			'panel' => 'homeland_general_panel',
		));

			// 404 Hide Advance Search
			$wp_customize->add_setting( 'homeland_disable_advance_search_404', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_disable_advance_search_404', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_other_404_section',
				'description' => esc_html__('This will hide advance search in 404 page', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// 404 Redirect
			$wp_customize->add_setting( 'homeland_redirect_404', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_redirect_404', array(
				'label' => esc_html__( 'Redirect?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_other_404_section',
				'description' => esc_html__( 'Select yes if you want 404 page to redirect in homepage. If yes, all the other options will be ignored', 'homeland' ),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// 404 Header
			$wp_customize->add_setting('homeland_not_found_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_not_found_header', array(
			 	'label' => esc_html__('404 Header Title', 'homeland'),
			 	'section' => 'homeland_other_404_section',
			 	'type' => 'text',
			));

			// 404 Subtitle
			$wp_customize->add_setting('homeland_not_found_subtitle', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_not_found_subtitle', array(
			 	'label' => esc_html__('404 Subtitle', 'homeland'),
			 	'section' => 'homeland_other_404_section',
			 	'type' => 'text',
			));

			// 404 Content Header
			$wp_customize->add_setting('homeland_not_found_large_text', array(
				'type' => 'option',
				'sanitize_callback' => 'homeland_with_html',
			));

			$wp_customize->add_control('homeland_not_found_large_text', array(
			 	'label' => esc_html__('Content Header Title', 'homeland'),
			 	'section' => 'homeland_other_404_section',
			 	'type' => 'text',
			));

			// 404 Content Subtitle
			$wp_customize->add_setting('homeland_not_found_small_text', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_not_found_small_text', array(
			 	'label' => esc_html__('Content Subtitle', 'homeland'),
			 	'section' => 'homeland_other_404_section',
			 	'type' => 'text',
			));

			// 404 Button Label
			$wp_customize->add_setting('homeland_not_found_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_not_found_button', array(
			 	'label' => esc_html__('Button Label', 'homeland'),
			 	'section' => 'homeland_other_404_section',
			 	'type' => 'text',
			));


		// Coming Soon Page Section
		$wp_customize->add_section('homeland_coming_soon_section', array(
			'title' => esc_html__('Coming Soon Page', 'homeland'),
			'panel' => 'homeland_general_panel',
		));

			// Header
			$wp_customize->add_setting('homeland_coming_soon_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_coming_soon_header', array(
			 	'label' => esc_html__('Header', 'homeland'),
			 	'section' => 'homeland_coming_soon_section',
			 	'type' => 'text',
			));

			// Description
			$wp_customize->add_setting('homeland_coming_soon_text', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_coming_soon_text', array(
			 	'label' => esc_html__('Description', 'homeland'),
			 	'section' => 'homeland_coming_soon_section',
			 	'type' => 'textarea',
			));

			// Sub Header
			$wp_customize->add_setting('homeland_coming_soon_sheader', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_coming_soon_sheader', array(
			 	'label' => esc_html__('Sub Header', 'homeland'),
			 	'description' => esc_html__('Add your time header in this field.', 'homeland'),
			 	'section' => 'homeland_coming_soon_section',
			 	'type' => 'text',
			));

			// New Date
			$wp_customize->add_setting( 'homeland_new_date', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_new_date', array(
			 	'label' => esc_html__( 'Date', 'homeland' ),
			 	'description' => esc_html__( 'Add your new date for launching your site. Format should be (YEAR, MONTH-1, DAY)', 'homeland' ),
			 	'section' => 'homeland_coming_soon_section',
			 	'type' => 'text',
			) );
?>