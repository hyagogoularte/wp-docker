<?php
	// Property Panel
	$wp_customize->add_panel( 'homeland_property_panel', array(
		'title' => esc_html__( 'Properties', 'homeland' ),
		'priority' => 129
	));

		// Currency Section
		$wp_customize->add_section('homeland_currency_section', array(
			'title' => esc_html__('Currency', 'homeland'),
			'panel' => 'homeland_property_panel',
		));

			// Currency Sign
			$wp_customize->add_setting('homeland_property_currency', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_currency', array(
			 	'label' => esc_html__('Currency Sign', 'homeland'),
			 	'section' => 'homeland_currency_section',
			 	'type' => 'text',
			));

			// Price Format
			$wp_customize->add_setting( 'homeland_price_format', array(
				'type' => 'option',
				'default' => 'Comma',
				'sanitize_callback' => 'homeland_option_price_format',
			) );
			$wp_customize->add_control( 'homeland_price_format', array(
				'label' => esc_html__( 'Price Format', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_currency_section',
				'choices' => array(
					'Comma' => esc_html__( 'Comma', 'homeland' ),
					'Dot' => esc_html__( 'Dot', 'homeland' ),
					'Europe' => esc_html__( 'Europe', 'homeland' ),
					'Brazil' => esc_html__( 'Brazil', 'homeland' ),
					'None' => esc_html__( 'None', 'homeland' ),
				)
			) );

			// Position of currency sign
			$wp_customize->add_setting( 'homeland_property_currency_sign', array(
				'type' => 'option',
				'default' => 'Before',
				'sanitize_callback' => 'homeland_option_price_position',
			) );
			$wp_customize->add_control( 'homeland_property_currency_sign', array(
				'label' => esc_html__( 'Position of currency sign', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_currency_section',
				'choices' => array(
					'Before' => esc_html__( 'Before', 'homeland' ),
					'After' => esc_html__( 'After', 'homeland' ),
				)
			) );

			// Decimal Places
			$wp_customize->add_setting('homeland_property_decimal', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_decimal', array(
			 	'label' => esc_html__('Decimal', 'homeland'),
			 	'description' => esc_html__('Enter how many decimal number you want to add for your property price', 'homeland'),
			 	'section' => 'homeland_currency_section',
			 	'type' => 'number',
			));


		// Main Section
		$wp_customize->add_section('homeland_property_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_property_panel',
		));

			// Hide Map
			$wp_customize->add_setting( 'homeland_hide_map_list', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_map_list', array(
				'label' => esc_html__( 'Hide Google Map?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_main_section',
				'description' => esc_html__('This will hide google map in property page only', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Limit
			$wp_customize->add_setting('homeland_num_properties', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_num_properties', array(
			 	'label' => esc_html__('Number of property item per page', 'homeland'),
			 	'section' => 'homeland_property_main_section',
			 	'type' => 'number',
			));

			// Ordering
			$wp_customize->add_setting( 'homeland_filter_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_filter_order', array(
				'label' => esc_html__( 'Filter Ordering', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select your default filter ordering value', 'homeland' ),
				'section' => 'homeland_property_main_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sorting
			$wp_customize->add_setting( 'homeland_filter_default', array(
				'type' => 'option',
				'default' => 'price',
				'sanitize_callback' => 'homeland_option_property_sorting',
			) );
			$wp_customize->add_control( 'homeland_filter_default', array(
				'label' => esc_html__( 'Filter Sorting', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select your default filter sorting value', 'homeland' ),
				'section' => 'homeland_property_main_section',
				'choices' => array(
					'date' => esc_html__( 'Date', 'homeland' ),
					'title' => esc_html__( 'Name', 'homeland' ),
					'price' => esc_html__( 'Price', 'homeland' ),
					'rand' => esc_html__( 'Random', 'homeland' ),
				)
			) );

			// Hide Excerpt
			$wp_customize->add_setting( 'homeland_property_excerpt', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_property_excerpt', array(
				'label' => esc_html__( 'Hide Excerpt?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_main_section',
				'description' => esc_html__('This will hide property excerpt', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Excerpt Length
			$wp_customize->add_setting('homeland_excerpt_length_properties', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => '30',
			));

			$wp_customize->add_control('homeland_excerpt_length_properties', array(
			 	'label' => esc_html__('Excerpt Length', 'homeland'),
			 	'section' => 'homeland_property_main_section',
			 	'description' => esc_html__('This will control the number of words in excerpts for property page templates and property archive pages. Default value is 30', 'homeland'),
			 	'type' => 'number',
			));

			// Button Label
			$wp_customize->add_setting('homeland_property_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_button', array(
			 	'label' => esc_html__('Property Button Label', 'homeland'),
			 	'section' => 'homeland_property_main_section',
			 	'type' => 'text',
			));

			// Preferred Size
			$wp_customize->add_setting( 'homeland_preferred_size', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_preferred_size',
			) );
			$wp_customize->add_control( 'homeland_preferred_size', array(
				'label' => esc_html__( 'Preferred Size?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_main_section',
				'choices' => array(
					'Lot Area' => esc_html__( 'Lot Area', 'homeland' ),
					'Floor Area' => esc_html__( 'Floor Area', 'homeland' ),
				)
			) );

			// Property Slug
			$wp_customize->add_setting('homeland_property_slug', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_slug', array(
			 	'label' => esc_html__('Property Slug', 'homeland'),
			 	'section' => 'homeland_property_main_section',
			 	'description' => esc_html__('The slug name cannot be the same name as your property page or else the layout breaks. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks structure.', 'homeland'),
			 	'type' => 'text',
			));


		// Single Post Section
		$wp_customize->add_section('homeland_property_single_section', array(
			'title' => esc_html__('Single Post', 'homeland'),
			'panel' => 'homeland_property_panel',
		));

			// Layout
			$wp_customize->add_setting( 'homeland_single_property_layout', array(
				'type' => 'option',
				'default' => 'Right Sidebar',
				'sanitize_callback' => 'homeland_option_single_property_layout',
			) );
			$wp_customize->add_control( 'homeland_single_property_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'description' => esc_html__('Select your layout for property single page', 'homeland'),
				'choices' => array(
					'Right Sidebar' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				)
			) );

			// Featured Image
			$wp_customize->add_setting( 'homeland_properties_thumb_slider', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_properties_thumb_slider', array(
				'label' => esc_html__( 'Exclude Featured Image?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Static Images
			$wp_customize->add_setting( 'homeland_property_static_image', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_property_static_image', array(
				'label' => esc_html__( 'Use static image for properties?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'description' => esc_html__('Note: If you select yes it will display property images without a slider', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Attachment Order
			$wp_customize->add_setting( 'homeland_attachment_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_attachment_order', array(
				'label' => esc_html__( 'Attachment Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Attachment Sort
			$wp_customize->add_setting( 'homeland_attachment_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_attachment_orderby', array(
				'label' => esc_html__( 'Attachment Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
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

			// Video Header
			$wp_customize->add_setting('homeland_property_video_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_video_header', array(
			 	'label' => esc_html__('Video Header', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Virtual Tour Header
			$wp_customize->add_setting('homeland_property_virtual_tour_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_virtual_tour_header', array(
			 	'label' => esc_html__('Virtual Tour Header', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Amenities Header
			$wp_customize->add_setting('homeland_property_amenities_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_amenities_header', array(
			 	'label' => esc_html__('Amenities Header', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Clickable Amenities
			$wp_customize->add_setting( 'homeland_clickable_amenities', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_clickable_amenities', array(
				'label' => esc_html__( 'Clickable Amenities List?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide Map
			$wp_customize->add_setting( 'homeland_hide_map', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_map', array(
				'label' => esc_html__( 'Hide Google Map?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Display Street View Map
			$wp_customize->add_setting( 'homeland_show_street_view', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_show_street_view', array(
				'label' => esc_html__( 'Display Map Street View?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Map Header
			$wp_customize->add_setting('homeland_property_map_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_property_map_header', array(
			 	'label' => esc_html__('Map Header', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Hide Agent Details
			$wp_customize->add_setting( 'homeland_agent_info', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_agent_info', array(
				'label' => esc_html__( 'Hide Agent Details?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Agent Form Header
			$wp_customize->add_setting('homeland_agent_form', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_form', array(
			 	'label' => esc_html__('Agent Form Header', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Agent Form Shortcode
			$wp_customize->add_setting( 'homeland_agent_form_shortcode', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_agent_form_shortcode', array(
			 	'label' => esc_html__( 'Agent Form Shortcode', 'homeland' ),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			) );

			// Hide Other Properties
			$wp_customize->add_setting( 'homeland_other_properties', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_other_properties', array(
				'label' => esc_html__( 'Hide Other Properties?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Limit Other Properties
			$wp_customize->add_setting('homeland_other_property_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_other_property_limit', array(
			 	'label' => esc_html__('Number of other properties display', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'number',
			));

			// Other Properties Header
			$wp_customize->add_setting('homeland_other_properties_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_other_properties_header', array(
			 	'label' => esc_html__('Other Property Header Title', 'homeland'),
			 	'section' => 'homeland_property_single_section',
			 	'type' => 'text',
			));

			// Hide Comments
			$wp_customize->add_setting( 'homeland_hide_property_comments', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_property_comments', array(
				'label' => esc_html__( 'Hide Comments?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide Previous and Next Buttons
			$wp_customize->add_setting( 'homeland_hide_property_prevnext', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_property_prevnext', array(
				'label' => esc_html__( 'Hide Buttons?', 'homeland' ),
				'description' => esc_html__('This will hide your next and previous and buttons', 'homeland'),
				'type' => 'select',
				'section' => 'homeland_property_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// Archive Section
		$wp_customize->add_section('homeland_property_archive_section', array(
			'title' => esc_html__('Archive and Taxonomy', 'homeland'),
			'panel' => 'homeland_property_panel',
		));

			// Hide Advance Search
			$wp_customize->add_setting( 'homeland_hide_property_archive_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_property_archive_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_archive_section',
				'description' => esc_html__('This will hide advance search in archive, category and taxonomy pages for property list.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Layout
			$wp_customize->add_setting( 'homeland_tax_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_page_layout',
			) );
			$wp_customize->add_control( 'homeland_tax_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_property_archive_section',
				'description' => esc_html__('Select your desire layout for taxonomy and archive page', 'homeland'),
				'choices' => array(
					'Default' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'1 Column' => esc_html__( '1 Column', 'homeland' ),
					'2 Columns' => esc_html__( '2 Columns', 'homeland' ),
					'3 Columns' => esc_html__( '3 Columns', 'homeland' ),
					'4 Columns' => esc_html__( '4 Columns', 'homeland' ),
					'Grid Sidebar' => esc_html__( 'Grid Sidebar', 'homeland' ),
					'Grid Left Sidebar' => esc_html__( 'Grid Left Sidebar', 'homeland' ),
				)
			) );
?>