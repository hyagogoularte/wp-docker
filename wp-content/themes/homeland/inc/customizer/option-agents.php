<?php
	// Agents Panel
	$wp_customize->add_panel( 'homeland_agent_panel', array(
		'title' => esc_html__( 'Agents', 'homeland' ),
		'priority' => 126
	));

	  // Main Section
		$wp_customize->add_section('homeland_agent_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_agent_panel',
		));

			// Hide Agents
			$wp_customize->add_setting( 'homeland_all_agents', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_all_agents', array(
				'label' => esc_html__( 'Hide Agents?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_agent_main_section',
				'description' => esc_html__('Note: this will hide all agents in your site including widgets.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Limit
			$wp_customize->add_setting('homeland_agent_page_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_page_limit', array(
			 	'label' => esc_html__('Number of agents per page', 'homeland'),
			 	'description' => esc_html__('This will work on agents page only.', 'homeland'),
			 	'section' => 'homeland_agent_main_section',
			 	'type' => 'number',
			));

			// Order
			$wp_customize->add_setting( 'homeland_agent_page_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_agent_page_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_agent_main_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_agent_page_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_agent_sortby',
			) );
			$wp_customize->add_control( 'homeland_agent_page_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_agent_main_section',
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

			// Agent Button
			$wp_customize->add_setting('homeland_agent_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_button', array(
			 	'label' => esc_html__('Agent Button Label', 'homeland'),
			 	'section' => 'homeland_agent_main_section',
			 	'type' => 'text',
			));


		// Profile Section
		$wp_customize->add_section('homeland_profile_section', array(
			'title' => esc_html__('Profile Page', 'homeland'),
			'panel' => 'homeland_agent_panel',
		));

			// Layout
			$wp_customize->add_setting( 'homeland_agent_profile_layout', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_agent_layout',
			) );
			$wp_customize->add_control( 'homeland_agent_profile_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_profile_section',
				'choices' => array(
					'Default' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				)
			) );

			// Header
			$wp_customize->add_setting('homeland_agent_profile_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_profile_header', array(
			 	'label' => esc_html__('Header', 'homeland'),
			 	'section' => 'homeland_profile_section',
			 	'type' => 'text',
			));

			// Subtitle
			$wp_customize->add_setting('homeland_agent_profile_subtitle', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_profile_subtitle', array(
			 	'label' => esc_html__('Subtitle', 'homeland'),
			 	'section' => 'homeland_profile_section',
			 	'type' => 'text',
			));

			// Hide Property
			$wp_customize->add_setting( 'homeland_agent_hide_property', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_agent_hide_property', array(
				'label' => esc_html__( 'Hide Properties?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_profile_section',
				'description' => esc_html__('This will hide all properties in agent profile page', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Property List Header
			$wp_customize->add_setting('homeland_agent_list_header', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_agent_list_header', array(
			 	'label' => esc_html__('Property List Header', 'homeland'),
			 	'section' => 'homeland_profile_section',
			 	'type' => 'text',
			));

			// Property Limit
			$wp_customize->add_setting('homeland_agent_property_limit', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => '',
			));

			$wp_customize->add_control('homeland_agent_property_limit', array(
			 	'label' => esc_html__('Property Limit', 'homeland'),
			 	'section' => 'homeland_profile_section',
			 	'type' => 'number',
			));

			// Order
			$wp_customize->add_setting( 'homeland_agent_property_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_agent_property_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_profile_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Sort
			$wp_customize->add_setting( 'homeland_agent_property_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_agent_property_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_profile_section',
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
?>