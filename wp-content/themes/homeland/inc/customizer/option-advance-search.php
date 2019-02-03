<?php
	// Advance Search Panel
	$wp_customize->add_panel( 'homeland_advance_search_panel', array(
		'title' => esc_html__( 'Advance Search', 'homeland' ),
		'priority' => 125
	));

	  // Main Section
		$wp_customize->add_section( 'homeland_search_main_section', array(
			'title' => esc_html__( 'Main', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide Advance Search
			$wp_customize->add_setting( 'homeland_disable_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_disable_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_search_main_section',
				'description' => esc_html__( 'This will hide advance search in all pages except in homepage', 'homeland' ),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Search Button
			$wp_customize->add_setting( 'homeland_search_button_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_search_button_label', array(
			 	'label' => esc_html__( 'Search Button label', 'homeland' ),
			 	'section' => 'homeland_search_main_section',
			 	'type' => 'text',
			) );


		// Search Page Section
		$wp_customize->add_section( 'homeland_search_page_section', array(
			'title' => esc_html__( 'Search Page', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Layout
			$wp_customize->add_setting( 'homeland_advance_search_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_page_layout',
			) );
			$wp_customize->add_control( 'homeland_advance_search_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_search_page_section',
				'description' => esc_html__( 'Select your advance search layout style', 'homeland' ),
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

			// Limit
			$wp_customize->add_setting( 'homeland_search_property_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_search_property_limit', array(
			 	'label' => esc_html__( 'Limit', 'homeland' ),
			 	'description' => esc_html__( 'Add number of results displayed per page', 'homeland' ),
			 	'section' => 'homeland_search_page_section',
			 	'type' => 'number',
			) );

			// Search Header
			$wp_customize->add_setting( 'homeland_search_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_search_header', array(
			 	'label' => esc_html__( 'Header', 'homeland' ),
			 	'section' => 'homeland_search_page_section',
			 	'type' => 'text',
			) );

			// Search Subtitle
			$wp_customize->add_setting( 'homeland_search_subtitle', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_search_subtitle', array(
			 	'label' => esc_html__( 'Subtitle', 'homeland' ),
			 	'section' => 'homeland_search_page_section',
			 	'type' => 'text',
			) );

			// Hide Map
			$wp_customize->add_setting( 'homeland_gmap_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_gmap_search', array(
				'label' => esc_html__( 'Hide Google Map?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_search_page_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// Property ID Section
		$wp_customize->add_section( 'homeland_search_id_section', array(
			'title' => esc_html__( 'Property ID', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide ID
			$wp_customize->add_setting( 'homeland_hide_pid', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_pid', array(
				'label' => esc_html__( 'Hide Property ID Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_search_id_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// ID Label
			$wp_customize->add_setting( 'homeland_pid_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_pid_label', array(
			 	'label' => esc_html__( 'Property ID Label', 'homeland' ),
			 	'section' => 'homeland_search_id_section',
			 	'type' => 'text',
			) );


		// City Section
		$wp_customize->add_section( 'homeland_city_section', array(
			'title' => esc_html__('Property City', 'homeland'),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide City
			$wp_customize->add_setting( 'homeland_hide_city', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_city', array(
				'label' => esc_html__( 'Hide City Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_city_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide City when empty
			$wp_customize->add_setting( 'homeland_hide_city_empty', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_city_empty', array(
				'label' => esc_html__( 'Hide City when Empty?', 'homeland' ),
				'description' => esc_html__( 'Select yes if you dont want to display city if empty', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_city_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// City Label
			$wp_customize->add_setting( 'homeland_city_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_city_label', array(
			 	'label' => esc_html__( 'Property City Label', 'homeland' ),
			 	'section' => 'homeland_city_section',
			 	'type' => 'text',
			) );

			// Order
			$wp_customize->add_setting( 'homeland_property_city_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_property_city_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_city_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_property_city_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_city_sortby',
			) );
			$wp_customize->add_control( 'homeland_property_city_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_city_section',
				'choices' => array(
					'id' => esc_html__( 'ID', 'homeland' ),
					'count' => esc_html__( 'Count', 'homeland' ),
					'name' => esc_html__( 'Name', 'homeland' ),
					'slug' => esc_html__( 'Slug', 'homeland' ),
					'none' => esc_html__( 'None', 'homeland' ),
				)
			) );


		// Type Section
		$wp_customize->add_section( 'homeland_type_section', array(
			'title' => esc_html__( 'Property Type', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide type
			$wp_customize->add_setting( 'homeland_hide_property_type', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_property_type', array(
				'label' => esc_html__( 'Hide Type Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_type_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide type when empty
			$wp_customize->add_setting( 'homeland_hide_property_type_empty', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_property_type_empty', array(
				'label' => esc_html__( 'Hide Type when Empty?', 'homeland' ),
				'description' => esc_html__( 'Select yes if you dont want to display property type if empty', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_type_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Type Label
			$wp_customize->add_setting( 'homeland_property_type_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_property_type_label', array(
			 	'label' => esc_html__( 'Property Type Label', 'homeland' ),
			 	'section' => 'homeland_type_section',
			 	'type' => 'text',
			) );

			// Order
			$wp_customize->add_setting( 'homeland_property_type_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_property_type_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_type_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_property_type_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_city_sortby',
			) );
			$wp_customize->add_control( 'homeland_property_type_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_type_section',
				'choices' => array(
					'id' => esc_html__( 'ID', 'homeland' ),
					'count' => esc_html__( 'Count', 'homeland' ),
					'name' => esc_html__( 'Name', 'homeland' ),
					'slug' => esc_html__( 'Slug', 'homeland' ),
					'none' => esc_html__( 'None', 'homeland' ),
				)
			) );


		// Status Section
		$wp_customize->add_section( 'homeland_status_section', array(
			'title' => esc_html__('Property Status', 'homeland'),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide status
			$wp_customize->add_setting( 'homeland_hide_status', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_status', array(
				'label' => esc_html__( 'Hide Status Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_status_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide status when empty
			$wp_customize->add_setting( 'homeland_hide_status_empty', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_status_empty', array(
				'label' => esc_html__( 'Hide Status when Empty?', 'homeland' ),
				'description' => esc_html__( 'Select yes if you dont want to display status if empty', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_status_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Status Label
			$wp_customize->add_setting( 'homeland_status_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_status_label', array(
			 	'label' => esc_html__( 'Property Status Label', 'homeland' ),
			 	'section' => 'homeland_status_section',
			 	'type' => 'text',
			) );

			// Order
			$wp_customize->add_setting( 'homeland_property_status_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_property_status_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_status_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_property_status_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_city_sortby',
			) );
			$wp_customize->add_control( 'homeland_property_status_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_status_section',
				'choices' => array(
					'id' => esc_html__( 'ID', 'homeland' ),
					'count' => esc_html__( 'Count', 'homeland' ),
					'name' => esc_html__( 'Name', 'homeland' ),
					'slug' => esc_html__( 'Slug', 'homeland' ),
					'none' => esc_html__( 'None', 'homeland' ),
				)
			) );


		// Bedrooms Section
		$wp_customize->add_section( 'homeland_bed_section', array(
			'title' => esc_html__( 'Property Bedrooms', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide bedrooms
			$wp_customize->add_setting( 'homeland_hide_bed', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_bed', array(
				'label' => esc_html__( 'Hide Bedrooms Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_bed_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Bedroom Label
			$wp_customize->add_setting( 'homeland_bed_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_bed_label', array(
			 	'label' => esc_html__( 'Property Bedroom Label', 'homeland' ),
			 	'section' => 'homeland_bed_section',
			 	'type' => 'text',
			) );

			// Bedroom Selections
			$wp_customize->add_setting( 'homeland_bed_number', array(
				'default' => '1, 2, 3',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_bed_number', array(
			 	'label' => esc_html__( 'Selection of how many bedrooms', 'homeland' ),
			 	'section' => 'homeland_bed_section',
			 	'description' => esc_html__( 'Example of data to be added is something like this 1, 2, 3, 4', 'homeland' ),
			 	'type' => 'text',
			) );


		// Bathrooms Section
		$wp_customize->add_section( 'homeland_bath_section', array(
			'title' => esc_html__( 'Property Bathrooms', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide bathrooms
			$wp_customize->add_setting( 'homeland_hide_bath', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_bath', array(
				'label' => esc_html__( 'Hide Bathroom Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_bath_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Bathroom Label
			$wp_customize->add_setting( 'homeland_bath_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_bath_label', array(
			 	'label' => esc_html__('Property Bathroom Label', 'homeland'),
			 	'section' => 'homeland_bath_section',
			 	'type' => 'text',
			) );

			// Bathroom Selections
			$wp_customize->add_setting( 'homeland_bath_number', array(
				'default' => '1, 2, 3',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_bath_number', array(
			 	'label' => esc_html__( 'Selection of how many bathrooms', 'homeland'),
			 	'section' => 'homeland_bath_section',
			 	'description' => esc_html__( 'Example of data to be added is something like this 1, 2, 3, 4', 'homeland' ),
			 	'type' => 'text',
			) );


		// Minimum Price Section
		$wp_customize->add_section( 'homeland_min_price_section', array(
			'title' => esc_html__( 'Property Minimum Price', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide minimum price
			$wp_customize->add_setting( 'homeland_hide_min_price', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_min_price', array(
				'label' => esc_html__( 'Hide Minimum Price Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_min_price_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Minimum Price Label
			$wp_customize->add_setting( 'homeland_min_price_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_min_price_label', array(
			 	'label' => esc_html__( 'Property Minimum Price Label', 'homeland' ),
			 	'section' => 'homeland_min_price_section',
			 	'type' => 'text',
			) );

			// Minimum Price Range
			$wp_customize->add_setting( 'homeland_min_price_value', array(
				'default' => '5000, 10000, 50000, 100000, 200000, 300000, 400000, 500000, 600000, 700000, 800000, 900000, 1000000, 1500000, 2000000, 2500000, 5000000',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_min_price_value', array(
			 	'label' => esc_html__( 'Property Minimum Price Range', 'homeland' ),
			 	'section' => 'homeland_min_price_section',
			 	'description' => esc_html__( 'Example of data to be added is something like this 5000, 10000, 50000, 100000', 'homeland'),
			 	'type' => 'textarea',
			) );


		// Maximum Price Section
		$wp_customize->add_section( 'homeland_max_price_section', array(
			'title' => esc_html__( 'Property Maximum Price', 'homeland' ),
			'panel' => 'homeland_advance_search_panel',
		) );

			// Hide maximum price
			$wp_customize->add_setting( 'homeland_hide_max_price', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_max_price', array(
				'label' => esc_html__( 'Hide Maximum Price Field?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_max_price_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Maximum Price Label
			$wp_customize->add_setting( 'homeland_max_price_label', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_max_price_label', array(
			 	'label' => esc_html__( 'Property Maximum Price Label', 'homeland' ),
			 	'section' => 'homeland_max_price_section',
			 	'type' => 'text',
			) );

			// Maximum Price Range
			$wp_customize->add_setting( 'homeland_max_price_value', array(
				'default' => '10000, 50000, 100000, 200000, 300000, 400000, 500000, 600000, 700000, 800000, 900000, 1000000, 1500000, 2000000, 2500000, 5000000, 10000000, 20000000',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'homeland_max_price_value', array(
			 	'label' => esc_html__( 'Property Maximum Price Range', 'homeland' ),
			 	'section' => 'homeland_max_price_section',
			 	'description' => esc_html__( 'Example of data to be added is something like this 10000, 50000, 100000', 'homeland' ),
			 	'type' => 'textarea',
			) );
?>