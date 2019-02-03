<?php
	// Header Panel
	$wp_customize->add_panel( 'homeland_header_panel', array(
		'title' => esc_html__( 'Header', 'homeland' ),
		'priority' => 124
	));

	  // Main Section
		$wp_customize->add_section('homeland_header_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_header_panel',
		));

			// Header Layout
			$wp_customize->add_setting( 'homeland_theme_header', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_header_layout',
			) );
			$wp_customize->add_control( 'homeland_theme_header', array(
				'label' => esc_html__( 'Select Header Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_main_section',
				'choices' => array(
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
				)
			) );

			// Sticky Header
			$wp_customize->add_setting( 'homeland_sticky_header', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_sticky_header', array(
				'label' => esc_html__( 'Enable Sticky Header?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Sliding Bar
			$wp_customize->add_setting( 'homeland_enable_slide_bar', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_enable_slide_bar', array(
				'label' => esc_html__( 'Enable Sliding Bar at the top?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Sliding Bar Position
			$wp_customize->add_setting( 'homeland_slide_bar_position', array(
				'type' => 'option',
				'default' => 'fixed',
				'sanitize_callback' => 'homeland_option_position',
			) );
			$wp_customize->add_control( 'homeland_slide_bar_position', array(
				'label' => esc_html__( 'Sliding Bar Position', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_main_section',
				'choices' => array(
					'relative' => esc_html__( 'Relative', 'homeland' ),
					'fixed' => esc_html__( 'Fixed', 'homeland' ),
				)
			) );

			// Call us label
			$wp_customize->add_setting('homeland_call_us_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_call_us_label', array(
			 	'label' => esc_html__('Call us label', 'homeland'),
			 	'section' => 'homeland_header_main_section',
			 	'type' => 'text',
			));

			// Hide Page Title and Subtitle
			$wp_customize->add_setting( 'homeland_hide_ptitle_stitle', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_ptitle_stitle', array(
				'label' => esc_html__( 'Hide Page Title and Subtitle?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// Login and Register Section
		$wp_customize->add_section('homeland_header_button_section', array(
			'title' => esc_html__('Login and Register', 'homeland'),
			'panel' => 'homeland_header_panel',
		));

			// Hide Login
			$wp_customize->add_setting( 'homeland_hide_login', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_login', array(
				'label' => esc_html__( 'Hide Login?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_button_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Login Label
			$wp_customize->add_setting('homeland_login_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_login_label', array(
			 	'label' => esc_html__('Login Label', 'homeland'),
			 	'section' => 'homeland_header_button_section',
			 	'type' => 'text',
			));

			// Login Link
			$wp_customize->add_setting('homeland_login_link', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_login_link', array(
			 	'label' => esc_html__('Login Link', 'homeland'),
			 	'section' => 'homeland_header_button_section',
			 	'description' => esc_html__('Add your custom login link here, do not forget adding http://', 'homeland'),
			 	'type' => 'url',
			));

			// Logout Label
			$wp_customize->add_setting('homeland_logout_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_logout_label', array(
			 	'label' => esc_html__('Logout Label', 'homeland'),
			 	'section' => 'homeland_header_button_section',
			 	'type' => 'text',
			));

			// Hide Register
			$wp_customize->add_setting( 'homeland_hide_register', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_register', array(
				'label' => esc_html__( 'Hide Register?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_button_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Register Label
			$wp_customize->add_setting( 'homeland_register_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( 'homeland_register_label', array(
				'label' => esc_html__( 'Register Label', 'homeland' ),
				'type' => 'text',
				'section' => 'homeland_header_button_section',
			) );

			// Register Link
			$wp_customize->add_setting('homeland_register_link', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_register_link', array(
			 	'label' => esc_html__('Register Link', 'homeland'),
			 	'section' => 'homeland_header_button_section',
			 	'description' => esc_html__('Add your custom register link here, do not forget adding http://', 'homeland'),
			 	'type' => 'url',
			));


		// Social Media Section
		$wp_customize->add_section('homeland_social_media_section', array(
			'title' => esc_html__('Social Media', 'homeland'),
			'panel' => 'homeland_header_panel',
		));

			// Brand Icon Color
			$wp_customize->add_setting( 'homeland_brand_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_brand_color', array(
				'label' => esc_html__( 'Use Social Media Brand Color?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_social_media_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// RSS Feed link
			$wp_customize->add_setting('homeland_rss', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_rss', array(
			 	'label' => esc_html__('RSS Feed Link', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'url',
			));

			// Twitter ID
			$wp_customize->add_setting('homeland_twitter', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_twitter', array(
			 	'label' => esc_html__('Twitter ID', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'text',
			));

			// Facebook ID
			$wp_customize->add_setting('homeland_facebook', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_facebook', array(
			 	'label' => esc_html__('Facebook ID', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'text',
			));

			// Youtube link
			$wp_customize->add_setting('homeland_youtube', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_youtube', array(
			 	'label' => esc_html__('Youtube URL', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'url',
			));

			// Pinterest ID
			$wp_customize->add_setting('homeland_pinterest', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_pinterest', array(
			 	'label' => esc_html__('Pinterest ID', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'text',
			));

			// LinkedIn link
			$wp_customize->add_setting('homeland_linkedin', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_linkedin', array(
			 	'label' => esc_html__('LinkedIn URL', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'url',
			));

			// Dribbble ID
			$wp_customize->add_setting('homeland_dribbble', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_dribbble', array(
			 	'label' => esc_html__('Dribbble ID', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'text',
			));

			// Instagram ID
			$wp_customize->add_setting('homeland_instagram', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_instagram', array(
			 	'label' => esc_html__('Instagram ID', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'text',
			));

			// Google Plus link
			$wp_customize->add_setting('homeland_gplus', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_gplus', array(
			 	'label' => esc_html__('Google Plus URL', 'homeland'),
			 	'section' => 'homeland_social_media_section',
			 	'type' => 'url',
			));


		// Images Section
		$wp_customize->add_section('homeland_header_image_section', array(
			'title' => esc_html__('Images', 'homeland'),
			'panel' => 'homeland_header_panel',
			'description' => esc_html__('Add your header images here, images should have 300px height', 'homeland')
		));

			// Hide Images
			$wp_customize->add_setting( 'homeland_hide_header_image', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_header_image', array(
				'label' => esc_html__( 'Hide Header Image?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_header_image_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Overlay Header Background Color
			$wp_customize->add_setting( 'homeland_header_overlay', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_header_overlay',
					array(
						'label' => esc_html__( 'Overlay Background Color', 'homeland' ),
						'section' => 'homeland_header_image_section',
					)
				)
			);

			// Default Image
			$wp_customize->add_setting( 'homeland_default_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_default_hdimage',
					array(
						'label' => esc_html__( 'Default Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload default header image for entire site', 'homeland')
					)
				)
			);

			// Archive Image
			$wp_customize->add_setting( 'homeland_archive_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_archive_hdimage',
					array(
						'label' => esc_html__( 'Archive Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for archive page', 'homeland')
					)
				)
			);

			// Taxonomy Image
			$wp_customize->add_setting( 'homeland_taxonomy_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_taxonomy_hdimage',
					array(
						'label' => esc_html__( 'Taxonomy Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for taxonomy page', 'homeland')
					)
				)
			);

			// Agent Image
			$wp_customize->add_setting( 'homeland_agent_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_agent_hdimage',
					array(
						'label' => esc_html__( 'Agent Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for agent single page', 'homeland')
					)
				)
			);

			// Search Image
			$wp_customize->add_setting( 'homeland_search_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_search_hdimage',
					array(
						'label' => esc_html__( 'Search Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for search page', 'homeland')
					)
				)
			);

			// Attachment Image
			$wp_customize->add_setting( 'homeland_attachment_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_attachment_hdimage',
					array(
						'label' => esc_html__( 'Attachment Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for attachment page', 'homeland')
					)
				)
			);

			// Page not found Image
			$wp_customize->add_setting( 'homeland_notfound_hdimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_notfound_hdimage',
					array(
						'label' => esc_html__( 'Page not found Image', 'homeland' ),
						'section' => 'homeland_header_image_section',
						'description' => esc_html__('Upload header image for 404 page', 'homeland')
					)
				)
			);
?>