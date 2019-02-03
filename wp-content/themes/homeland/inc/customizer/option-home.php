<?php
	// Homepage Panel
	$wp_customize->add_panel( 'homeland_home_panel', array(
		'title' => esc_html__( 'Homepage', 'homeland' ),
		'priority' => 128
	));

	  // Main Section
		$wp_customize->add_section('homeland_home_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Top Elements
			$wp_customize->add_setting( 'homeland_top_element_display', array(
				'type' => 'option',
				'default' => 'slider',
				'sanitize_callback' => 'homeland_option_top_elements',
			) );
			$wp_customize->add_control( 'homeland_top_element_display', array(
				'label' => esc_html__( 'First Top Content', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_home_main_section',
				'description' => esc_html__('Select a top element content for homepage only', 'homeland'),
				'choices' => array(
					'slider' => esc_html__( 'Slider', 'homeland' ),
					'thumb-slider' => esc_html__( 'Thumb Slider', 'homeland' ),
					'revslider' => esc_html__( 'Revolution Slider', 'homeland' ),
					'static-image' => esc_html__( 'Static Image', 'homeland' ),
					'google-map' => esc_html__( 'Google Map', 'homeland' ),
					'video' => esc_html__( 'Video', 'homeland' ),
				)
			) );

			// Video URL
			$wp_customize->add_setting('homeland_video_url', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_video_url', array(
			 	'label' => esc_html__('Video URL', 'homeland'),
			 	'description' => esc_html__('Note: You can only use this if you select video in your first top content or use the homepage video page template.', 'homeland'),
			 	'section' => 'homeland_home_main_section',
			 	'type' => 'url',
			));

			// Hide Advance Search
			$wp_customize->add_setting( 'homeland_hide_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_home_main_section',
				'description' => esc_html__('This will hide advance search box in homepage only', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide Columns
			$wp_customize->add_setting( 'homeland_hide_bottom_cols', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_bottom_cols', array(
				'label' => esc_html__( 'Hide Columns?', 'homeland' ),
				'description' => esc_html__( 'Select yes to hide the 2 or 3 columns below', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_home_main_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Columns Homepage Type
			$wp_customize->add_setting( 'homeland_property_home_cols_type', array(
				'type' => 'option',
				'default' => 'three-cols',
				'sanitize_callback' => 'homeland_property_home_cols_option',
			) );
			$wp_customize->add_control( 'homeland_property_home_cols_type', array(
				'label' => esc_html__( 'Display Columns', 'homeland' ),
				'description' => esc_html__( 'Select your columns display type', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_home_main_section',
				'choices' => array(
					'three-cols' => esc_html__( '3 Columns', 'homeland' ),
					'two-cols' => esc_html__( '2 Columns', 'homeland' ),
				)
			) );


		// Static Image Section
		$wp_customize->add_section('homeland_static_image_section', array(
			'title' => esc_html__('Static Image', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Brief Description
			$wp_customize->add_setting('homeland_static_image_desc', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_static_image_desc', array(
			 	'label' => esc_html__('Description', 'homeland'),
			 	'section' => 'homeland_static_image_section',
			 	'type' => 'textarea',
			));

			// Static Image
			$wp_customize->add_setting( 'homeland_static_image', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_static_image',
					array(
						'label' => esc_html__( 'Static Image', 'homeland' ),
						'description' => esc_html__( 'Fill this field if you select static image for your homepage', 'homeland' ),
						'section' => 'homeland_static_image_section',
					)
				)
			);

			// Overlay Color
			$wp_customize->add_setting( 'homeland_static_image_overlay', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_static_image_overlay',
					array(
						'label' => esc_html__( 'Overlay Color', 'homeland' ),
						'section' => 'homeland_static_image_section',
					)
				)
			);


		// Slider Section
		$wp_customize->add_section('homeland_slider_section', array(
			'title' => esc_html__('Slider', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Limit
			$wp_customize->add_setting('homeland_slider_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_slider_limit', array(
				'label' => esc_html__( 'Limit', 'homeland' ),
			 	'description' => esc_html__('Number of item slider to be display', 'homeland'),
			 	'section' => 'homeland_slider_section',
			 	'type' => 'number',
			));

			// Display Data
			$wp_customize->add_setting( 'homeland_slider_display_list', array(
				'type' => 'option',
				'default' => 'Featured Properties',
				'sanitize_callback' => 'homeland_option_slider_display',
			) );
			$wp_customize->add_control( 'homeland_slider_display_list', array(
				'label' => esc_html__( 'Post Type', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_slider_section',
				'description' => esc_html__('Select post type data you want to display in your slider', 'homeland'),
				'choices' => array(
					'Properties' => esc_html__( 'Properties', 'homeland' ),
					'Featured Properties' => esc_html__( 'Featured Properties', 'homeland' ),
					'Blog' => esc_html__( 'Blog', 'homeland' ),
					'Portfolio' => esc_html__( 'Portfolio', 'homeland' ),
				)
			) );

			// Order
			$wp_customize->add_setting( 'homeland_slider_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_slider_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_slider_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_slider_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_property_sortby',
			) );
			$wp_customize->add_control( 'homeland_slider_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_slider_section',
				'choices' => array(
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
				)
			) );

			// Hide Slider
			$wp_customize->add_setting( 'homeland_hide_properties_details', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_properties_details', array(
				'label' => esc_html__( 'Hide', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_slider_section',
				'description' => esc_html__('This will hide your slider details', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Slider Details Position
			$wp_customize->add_setting( 'homeland_slider_details_position', array(
				'type' => 'option',
				'default' => 'bottom',
				'sanitize_callback' => 'homeland_option_arrangement',
			) );
			$wp_customize->add_control( 'homeland_slider_details_position', array(
				'label' => esc_html__( 'Position', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_slider_section',
				'description' => esc_html__( 'Select your slider details position', 'homeland' ),
				'choices' => array(
					'top' => esc_html__( 'Top', 'homeland' ),
					'bottom' => esc_html__( 'Bottom', 'homeland' ),
					'right' => esc_html__( 'Right', 'homeland' ),
					'left' => esc_html__( 'Left', 'homeland' ),
				)
			) );

			// Slider Button Label
			$wp_customize->add_setting('homeland_slider_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_slider_button', array(
			 	'label' => esc_html__('Slider Button Label', 'homeland'),
			 	'section' => 'homeland_slider_section',
			 	'type' => 'text',
			));


		// Welcome Section
		$wp_customize->add_section('homeland_welcome_section', array(
			'title' => esc_html__('Welcome', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Hide Welcome
			$wp_customize->add_setting( 'homeland_hide_welcome', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_welcome', array(
				'label' => esc_html__( 'Hide Welcome Text?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_welcome_section',
				'description' => esc_html__('This will hide welcome box in homepage only', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Welcome Header Title
			$wp_customize->add_setting('homeland_welcome_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_welcome_header', array(
			 	'label' => esc_html__('Welcome Header', 'homeland'),
			 	'section' => 'homeland_welcome_section',
			 	'type' => 'text',
			));

			// Welcome Description
			$wp_customize->add_setting('homeland_welcome_text', array(
				'type' => 'option',
				'sanitize_callback' => 'homeland_with_html',
			));

			$wp_customize->add_control('homeland_welcome_text', array(
			 	'label' => esc_html__('Welcome Description', 'homeland'),
			 	'section' => 'homeland_welcome_section',
			 	'type' => 'textarea',
			));

			// Button Label
			$wp_customize->add_setting('homeland_welcome_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_welcome_button', array(
			 	'label' => esc_html__('Welcome Button Label', 'homeland'),
			 	'section' => 'homeland_welcome_section',
			 	'type' => 'text',
			));

			// Button URL
			$wp_customize->add_setting('homeland_welcome_link', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_welcome_link', array(
			 	'label' => esc_html__('Welcome Button Link', 'homeland'),
			 	'section' => 'homeland_welcome_section',
			 	'type' => 'url',
			));

			// Background Image
			$wp_customize->add_setting( 'homeland_welcome_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_welcome_bgimage',
					array(
						'label' => esc_html__( 'Background Image', 'homeland' ),
						'section' => 'homeland_welcome_section',
						'description' => esc_html__('Upload background image for welcome in homepage', 'homeland')
					)
				)
			);

			// Overlay Color
			$wp_customize->add_setting( 'homeland_welcome_overlay', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_welcome_overlay',
					array(
						'label' => esc_html__( 'Overlay Color', 'homeland' ),
						'section' => 'homeland_welcome_section',
					)
				)
			);


		// Callout Section
		$wp_customize->add_section('homeland_cta_section', array(
			'title' => esc_html__('Callout Text', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Hide CTA
			$wp_customize->add_setting( 'homeland_hide_cta', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_cta', array(
				'label' => esc_html__( 'Hide Callout Text?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_cta_section',
				'description' => esc_html__('This will hide call to action box in homepage only', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// CTA Text
			$wp_customize->add_setting('homeland_cta_text', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_cta_text', array(
			 	'label' => esc_html__('Description', 'homeland'),
			 	'description' => esc_html__('Add a brief description for your callout.', 'homeland'),
			 	'section' => 'homeland_cta_section',
			 	'type' => 'textarea',
			));

			// CTA Button Label
			$wp_customize->add_setting('homeland_cta_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_cta_button', array(
			 	'label' => esc_html__('Button Label', 'homeland'),
			 	'section' => 'homeland_cta_section',
			 	'type' => 'text',
			));

			// CTA Button URL
			$wp_customize->add_setting('homeland_cta_button_link', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));

			$wp_customize->add_control('homeland_cta_button_link', array(
			 	'label' => esc_html__('Button Link', 'homeland'),
			 	'description' => esc_html__('Do not forget to add http:// if you added a link', 'homeland'),
			 	'section' => 'homeland_cta_section',
			 	'type' => 'url',
			));

			// CTA Link Target
			$wp_customize->add_setting( 'homeland_cta_link_target', array(
				'type' => 'option',
				'default' => '_self',
				'sanitize_callback' => 'homeland_option_link_target',
			) );
			$wp_customize->add_control( 'homeland_cta_link_target', array(
				'label' => esc_html__( 'Link Target', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_cta_section',
				'description' => esc_html__('Select your callout link target option.', 'homeland'),
				'choices' => array(
					'_self' => esc_html__( 'Self', 'homeland' ),
					'_blank' => esc_html__( 'Blank', 'homeland' ),
					'_parent' => esc_html__( 'Parent', 'homeland' ),
					'_top' => esc_html__( 'Top', 'homeland' ),
				)
			) );

			// CTA Background Image
			$wp_customize->add_setting( 'homeland_cta_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_cta_bgimage',
					array(
						'label' => esc_html__( 'Background Image', 'homeland' ),
						'section' => 'homeland_cta_section',
						'description' => esc_html__('Upload background image for callout in homepage', 'homeland')
					)
				)
			);

			// CTA Overlay Color
			$wp_customize->add_setting( 'homeland_cta_overlay', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_cta_overlay',
					array(
						'label' => esc_html__( 'Overlay Color', 'homeland' ),
						'section' => 'homeland_cta_section',
					)
				)
			);


		// Properties Section
		if ( function_exists( 'codeex_cpt' ) ) :
			$wp_customize->add_section('homeland_property_section', array(
				'title' => esc_html__('Properties', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Hide Property
				$wp_customize->add_setting( 'homeland_hide_properties', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'homeland_option_yes_no',
				) );
				$wp_customize->add_control( 'homeland_hide_properties', array(
					'label' => esc_html__( 'Hide Properties?', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_property_section',
					'description' => esc_html__('This will hide property box in homepage only', 'homeland'),
					'choices' => array(
						'true' => esc_html__( 'Yes', 'homeland' ),
						'' => esc_html__( 'No', 'homeland' ),
					)
				) );

				// Limit
				$wp_customize->add_setting('homeland_property_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_property_limit', array(
				 	'label' => esc_html__('Number of properties display', 'homeland'),
				 	'section' => 'homeland_property_section',
				 	'type' => 'number',
				));

				// Property Header Title
				$wp_customize->add_setting('homeland_property_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_property_header', array(
				 	'label' => esc_html__('Property Header', 'homeland'),
				 	'section' => 'homeland_property_section',
				 	'type' => 'text',
				));

				// Order
				$wp_customize->add_setting( 'homeland_album_order', array(
					'type' => 'option',
					'default' => 'DESC',
					'sanitize_callback' => 'homeland_option_order',
				) );
				$wp_customize->add_control( 'homeland_album_order', array(
					'label' => esc_html__( 'Ordering', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_property_section',
					'choices' => array(
						'ASC' => esc_html__( 'Ascending', 'homeland' ),
						'DESC' => esc_html__( 'Descending', 'homeland' ),
					)
				) );

				// Sort
				$wp_customize->add_setting( 'homeland_album_orderby', array(
					'type' => 'option',
					'default' => 'ID',
					'sanitize_callback' => 'homeland_option_sortby',
				) );
				$wp_customize->add_control( 'homeland_album_orderby', array(
					'label' => esc_html__( 'Sorting', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_property_section',
					'choices' => array(
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
					)
				) );

				// Featured Limit
				$wp_customize->add_setting('homeland_featured_property_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_featured_property_limit', array(
				 	'label' => esc_html__('Number of featured properties display', 'homeland'),
				 	'section' => 'homeland_property_section',
				 	'type' => 'number',
				));

				// Property Featured Header Title
				$wp_customize->add_setting('homeland_featured_property_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_featured_property_header', array(
				 	'label' => esc_html__('Featured Property Header', 'homeland'),
				 	'section' => 'homeland_property_section',
				 	'type' => 'text',
				));


			// Portfolio Section
			$wp_customize->add_section('homeland_portfolio_section', array(
				'title' => esc_html__('Portfolio', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Hide Portfolio
				$wp_customize->add_setting( 'homeland_hide_portfolio', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'homeland_option_yes_no',
				) );
				$wp_customize->add_control( 'homeland_hide_portfolio', array(
					'label' => esc_html__( 'Hide Portfolio?', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_portfolio_section',
					'description' => esc_html__('This will hide portfolio box in homepage only', 'homeland'),
					'choices' => array(
						'true' => esc_html__( 'Yes', 'homeland' ),
						'' => esc_html__( 'No', 'homeland' ),
					)
				) );

				// Limit
				$wp_customize->add_setting('homeland_portfolio_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_portfolio_limit', array(
				 	'label' => esc_html__('Number of portfolio display', 'homeland'),
				 	'section' => 'homeland_portfolio_section',
				 	'type' => 'number',
				));

				// Portfolio Header Title
				$wp_customize->add_setting('homeland_portfolio_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_portfolio_header', array(
				 	'label' => esc_html__('Portfolio Header', 'homeland'),
				 	'section' => 'homeland_portfolio_section',
				 	'type' => 'text',
				));

				// Order
				$wp_customize->add_setting( 'homeland_portfolio_home_order', array(
					'type' => 'option',
					'default' => 'DESC',
					'sanitize_callback' => 'homeland_option_order',
				) );
				$wp_customize->add_control( 'homeland_portfolio_home_order', array(
					'label' => esc_html__( 'Ordering', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_portfolio_section',
					'choices' => array(
						'ASC' => esc_html__( 'Ascending', 'homeland' ),
						'DESC' => esc_html__( 'Descending', 'homeland' ),
					)
				) );

				// Sort
				$wp_customize->add_setting( 'homeland_portfolio_home_orderby', array(
					'type' => 'option',
					'default' => 'ID',
					'sanitize_callback' => 'homeland_option_sortby',
				) );
				$wp_customize->add_control( 'homeland_portfolio_home_orderby', array(
					'label' => esc_html__( 'Sorting', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_portfolio_section',
					'choices' => array(
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
					)
				) );
		endif;

		// Blog Section
		$wp_customize->add_section('homeland_blog_section', array(
			'title' => esc_html__('Blog', 'homeland'),
			'panel' => 'homeland_home_panel',
		));

			// Limit
			$wp_customize->add_setting('homeland_blog_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_blog_limit', array(
			 	'label' => esc_html__('Number of blog display', 'homeland'),
			 	'section' => 'homeland_blog_section',
			 	'type' => 'number',
			));

			// Blog Header Title
			$wp_customize->add_setting('homeland_blog_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_blog_header', array(
			 	'label' => esc_html__('Blog Header', 'homeland'),
			 	'section' => 'homeland_blog_section',
			 	'type' => 'text',
			));

			// Blog Categories
			$wp_customize->add_setting( 'homeland_blog_category', array(
				'type' => 'option',
				'default' => '',
			) );
			$wp_customize->add_control( 'homeland_blog_category', array(
				'label' => esc_html__( 'Blog Category', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_section',
				'choices' => homeland_categories_select()
			) );

			// Category List
			function homeland_categories_select() {
			  $args = array( 'hide_empty' => 0, 'orderby' => 'name' );
				$homeland_categories = get_categories( $args );
				$homeland_blog_category = array();
				
				foreach ($homeland_categories as $homeland_category_list ) {
					$homeland_blog_category[$homeland_category_list->slug] = $homeland_category_list->name;
				}
				array_unshift( $homeland_blog_category, esc_html__( 'Choose a category', 'homeland' ) );

				return $homeland_blog_category;
			}


		// Services Section
		if ( function_exists( 'codeex_cpt' ) ) :
			$wp_customize->add_section('homeland_services_section', array(
				'title' => esc_html__('Services', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Hide Services
				$wp_customize->add_setting( 'homeland_hide_services', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'homeland_option_yes_no',
				) );
				$wp_customize->add_control( 'homeland_hide_services', array(
					'label' => esc_html__( 'Hide Services?', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_services_section',
					'description' => esc_html__('This will hide services box in homepage only', 'homeland'),
					'choices' => array(
						'true' => esc_html__( 'Yes', 'homeland' ),
						'' => esc_html__( 'No', 'homeland' ),
					)
				) );

				// Limit
				$wp_customize->add_setting('homeland_services_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_services_limit', array(
				 	'label' => esc_html__('Number of services display', 'homeland'),
				 	'section' => 'homeland_services_section',
				 	'type' => 'number',
				));

				// Background Image
				$wp_customize->add_setting( 'homeland_services_bgimage', array(
					'type' => 'option',
					'sanitize_callback' => 'esc_url_raw',
				) );
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'homeland_services_bgimage',
						array(
							'label' => esc_html__( 'Background Image', 'homeland' ),
							'section' => 'homeland_services_section',
							'description' => esc_html__('Upload background image for services in homepage', 'homeland')
						)
					)
				);

				// Overlay Color
				$wp_customize->add_setting( 'homeland_services_overlay', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'sanitize_hex_color',
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
						$wp_customize,
						'homeland_services_overlay',
						array(
							'label' => esc_html__( 'Overlay Color', 'homeland' ),
							'section' => 'homeland_services_section',
						)
					)
				);


			// Partners Section
			$wp_customize->add_section('homeland_partners_section', array(
				'title' => esc_html__('Partners', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Hide Partners
				$wp_customize->add_setting( 'homeland_hide_partners', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'homeland_option_yes_no',
				) );
				$wp_customize->add_control( 'homeland_hide_partners', array(
					'label' => esc_html__( 'Hide Partners?', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_partners_section',
					'description' => esc_html__('This will hide partners box in homepage only', 'homeland'),
					'choices' => array(
						'true' => esc_html__( 'Yes', 'homeland' ),
						'' => esc_html__( 'No', 'homeland' ),
					)
				) );

				// layout style
				$wp_customize->add_setting( 'homeland_partners_layout', array(
					'type' => 'option',
					'default' => 'default',
					'sanitize_callback' => 'homeland_option_partner_layout',
				) );
				$wp_customize->add_control( 'homeland_partners_layout', array(
					'label' => esc_html__( 'Layout', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_partners_section',
					'description' => esc_html__( 'Please select the type of layout you want', 'homeland' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'homeland' ),
						'grid' => esc_html__( 'Grid', 'homeland' ),
					)
				) );

				// Limit
				$wp_customize->add_setting('homeland_partners_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_partners_limit', array(
				 	'label' => esc_html__('Number of partners display', 'homeland'),
				 	'section' => 'homeland_partners_section',
				 	'type' => 'number',
				));

				// Partners Header Title
				$wp_customize->add_setting('homeland_partners_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_partners_header', array(
				 	'label' => esc_html__('Partners Header', 'homeland'),
				 	'section' => 'homeland_partners_section',
				 	'type' => 'text',
				));

				// Order
				$wp_customize->add_setting( 'homeland_partner_order', array(
					'type' => 'option',
					'default' => 'DESC',
					'sanitize_callback' => 'homeland_option_order',
				) );
				$wp_customize->add_control( 'homeland_partner_order', array(
					'label' => esc_html__( 'Ordering', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_partners_section',
					'choices' => array(
						'ASC' => esc_html__( 'Ascending', 'homeland' ),
						'DESC' => esc_html__( 'Descending', 'homeland' ),
					)
				) );

				// Sort
				$wp_customize->add_setting( 'homeland_partner_orderby', array(
					'type' => 'option',
					'default' => 'ID',
					'sanitize_callback' => 'homeland_option_sortby',
				) );
				$wp_customize->add_control( 'homeland_partner_orderby', array(
					'label' => esc_html__( 'Sorting', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_partners_section',
					'choices' => array(
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
					)
				) );

				// Background Image
				$wp_customize->add_setting( 'homeland_partners_bgimage', array(
					'type' => 'option',
					'sanitize_callback' => 'esc_url_raw',
				) );
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'homeland_partners_bgimage',
						array(
							'label' => esc_html__( 'Background Image', 'homeland' ),
							'section' => 'homeland_partners_section',
							'description' => esc_html__('Upload background image for partners in homepage', 'homeland')
						)
					)
				);

				// Overlay Color
				$wp_customize->add_setting( 'homeland_partners_overlay', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'sanitize_hex_color',
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
						$wp_customize,
						'homeland_partners_overlay',
						array(
							'label' => esc_html__( 'Overlay Color', 'homeland' ),
							'section' => 'homeland_partners_section',
						)
					)
				);
		endif;


		// Agent Section
		if ( function_exists( 'codeex_cpt' ) ) :
			$wp_customize->add_section('homeland_agent_section', array(
				'title' => esc_html__('Agent', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Limit
				$wp_customize->add_setting('homeland_agent_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_agent_limit', array(
				 	'label' => esc_html__('Limit', 'homeland'),
				 	'description' => esc_html__('Add number of agents displayed in homepage', 'homeland'),
				 	'section' => 'homeland_agent_section',
				 	'type' => 'number',
				));

				// Agent Header Title
				$wp_customize->add_setting('homeland_agents_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_agents_header', array(
				 	'label' => esc_html__('Header', 'homeland'),
				 	'section' => 'homeland_agent_section',
				 	'type' => 'text',
				));

				// Order
				$wp_customize->add_setting( 'homeland_agent_order', array(
					'type' => 'option',
					'default' => 'DESC',
					'sanitize_callback' => 'homeland_option_order',
				) );
				$wp_customize->add_control( 'homeland_agent_order', array(
					'label' => esc_html__( 'Ordering', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_agent_section',
					'choices' => array(
						'ASC' => esc_html__( 'Ascending', 'homeland' ),
						'DESC' => esc_html__( 'Descending', 'homeland' ),
					)
				) );

				// Sort
				$wp_customize->add_setting( 'homeland_agent_orderby', array(
					'type' => 'option',
					'default' => 'ID',
					'sanitize_callback' => 'homeland_option_agent_sortby',
				) );
				$wp_customize->add_control( 'homeland_agent_orderby', array(
					'label' => esc_html__( 'Sorting', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_agent_section',
					'choices' => array(
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
					)
				) );


			// Testimonials Section
			$wp_customize->add_section('homeland_testimonials_section', array(
				'title' => esc_html__('Testimonials', 'homeland'),
				'panel' => 'homeland_home_panel',
			));

				// Hide Testimonials
				$wp_customize->add_setting( 'homeland_hide_testimonials', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'homeland_option_yes_no',
				) );
				$wp_customize->add_control( 'homeland_hide_testimonials', array(
					'label' => esc_html__( 'Hide', 'homeland' ),
					'type' => 'select',
					'section' => 'homeland_testimonials_section',
					'description' => esc_html__('Hide testimonials in homepage', 'homeland'),
					'choices' => array(
						'true' => esc_html__( 'Yes', 'homeland' ),
						'' => esc_html__( 'No', 'homeland' ),
					)
				) );

				// Limit
				$wp_customize->add_setting('homeland_testi_limit', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_testi_limit', array(
				 	'label' => esc_html__('Limit', 'homeland'),
				 	'description' => esc_html__('Add number of testimonials displayed per page', 'homeland'),
				 	'section' => 'homeland_testimonials_section',
				 	'type' => 'number',
				));

				// Welcome Header Title
				$wp_customize->add_setting('homeland_testi_header', array(
					'type' => 'option',
					'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('homeland_testi_header', array(
				 	'label' => esc_html__('Header', 'homeland'),
				 	'section' => 'homeland_testimonials_section',
				 	'type' => 'text',
				));

				// Background Image
				$wp_customize->add_setting( 'homeland_testimonials_bgimage', array(
					'type' => 'option',
					'sanitize_callback' => 'esc_url_raw',
				) );
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'homeland_testimonials_bgimage',
						array(
							'label' => esc_html__( 'Background Image', 'homeland' ),
							'section' => 'homeland_testimonials_section',
							'description' => esc_html__('Upload background image for testimonials in homepage', 'homeland')
						)
					)
				);

				// Overlay Color
				$wp_customize->add_setting( 'homeland_testi_overlay', array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'sanitize_hex_color',
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
						$wp_customize,
						'homeland_testi_overlay',
						array(
							'label' => esc_html__( 'Overlay Color', 'homeland' ),
							'section' => 'homeland_testimonials_section',
						)
					)
				);
		endif;
?>