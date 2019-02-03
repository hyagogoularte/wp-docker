<?php
	// Services Panel
	$wp_customize->add_panel( 'homeland_services_panel', array(
		'title' => esc_html__( 'Services', 'homeland' ),
		'priority' => 132
	));

		// Main Section
		$wp_customize->add_section('homeland_services_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_services_panel',
		));

			// Limit
			$wp_customize->add_setting('homeland_num_services', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_num_services', array(
			 	'label' => esc_html__('Number of services items per page', 'homeland'),
			 	'section' => 'homeland_services_main_section',
			 	'type' => 'number',
			));

			// Hide Excerpt
			$wp_customize->add_setting( 'homeland_services_excerpt', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_services_excerpt', array(
				'label' => esc_html__( 'Hide Excerpt?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_main_section',
				'description' => esc_html__('This will hide services excerpt', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Excerpt Length
			$wp_customize->add_setting('homeland_excerpt_length_services', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => '30',
			));

			$wp_customize->add_control('homeland_excerpt_length_services', array(
			 	'label' => esc_html__('Excerpt Length', 'homeland'),
			 	'section' => 'homeland_services_main_section',
			 	'description' => esc_html__('This will control the number of words in the excerpts for services page templates, services archive pages and services in homepage. Default value is 30', 'homeland'),
			 	'type' => 'number',
			));

			// Services Order
			$wp_customize->add_setting( 'homeland_services_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_services_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_main_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Services Sort
			$wp_customize->add_setting( 'homeland_services_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_services_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_main_section',
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

			// Button Label
			$wp_customize->add_setting('homeland_services_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_services_button', array(
			 	'label' => esc_html__('Services Button Label', 'homeland'),
			 	'section' => 'homeland_services_main_section',
			 	'type' => 'text',
			));

			// Link Target
			$wp_customize->add_setting( 'homeland_services_link_target', array(
				'type' => 'option',
				'default' => '_blank',
				'sanitize_callback' => 'homeland_option_link_target',
			) );
			$wp_customize->add_control( 'homeland_services_link_target', array(
				'label' => esc_html__( 'Link Target', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_main_section',
				'description' => esc_html__('Select your services link target option for services custom link', 'homeland'),
				'choices' => array(
					'_self' => esc_html__( 'Self', 'homeland' ),
					'_blank' => esc_html__( 'Blank', 'homeland' ),
					'_parent' => esc_html__( 'Parent', 'homeland' ),
					'_top' => esc_html__( 'Top', 'homeland' ),
				)
			) );

			// Services Slug
			$wp_customize->add_setting('homeland_services_slug', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_services_slug', array(
			 	'label' => esc_html__('Services Slug', 'homeland'),
			 	'section' => 'homeland_services_main_section',
			 	'description' => esc_html__('The slug name cannot be the same name as your services page or else the layout breaks. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks structure.', 'homeland'),
			 	'type' => 'text',
			));


		// Single Post Section
		$wp_customize->add_section('homeland_services_single_section', array(
			'title' => esc_html__('Single Post', 'homeland'),
			'panel' => 'homeland_services_panel',
		));

			// Layout
			$wp_customize->add_setting( 'homeland_services_single_layout', array(
				'type' => 'option',
				'default' => 'Right Sidebar',
				'sanitize_callback' => 'homeland_option_single_property_layout',
			) );
			$wp_customize->add_control( 'homeland_services_single_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_single_section',
				'description' => esc_html__('Select your desire layout for services single page', 'homeland'),
				'choices' => array(
					'Right Sidebar' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				)
			) );


		// Archive Section
		$wp_customize->add_section('homeland_services_archive_section', array(
			'title' => esc_html__('Archive', 'homeland'),
			'panel' => 'homeland_services_panel',
		));

			// Hide Advance Search
			$wp_customize->add_setting( 'homeland_hide_services_archive_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_services_archive_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_archive_section',
				'description' => esc_html__('This will hide advance search in archive page for services list.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Layout
			$wp_customize->add_setting( 'homeland_services_archive_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_services_archive_layout',
			) );
			$wp_customize->add_control( 'homeland_services_archive_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_services_archive_section',
				'description' => esc_html__('Select your desire layout for archive page', 'homeland'),
				'choices' => array(
					'Default' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
					'Grid Fullwidth' => esc_html__( 'Grid Fullwidth', 'homeland' ),
				)
			) );
?>