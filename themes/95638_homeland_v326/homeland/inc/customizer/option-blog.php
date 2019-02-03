<?php
	// Blog Panel
	$wp_customize->add_panel( 'homeland_blog_panel', array(
		'title' => esc_html__( 'Blog', 'homeland' ),
		'priority' => 130
	));

		// Main Section
		$wp_customize->add_section('homeland_blog_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_blog_panel',
		));

			// Show Excerpt
			$wp_customize->add_setting( 'homeland_blog_excerpt', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_blog_excerpt', array(
				'label' => esc_html__( 'Display Blog Excerpt?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_main_section',
				'description' => esc_html__('This will show all excerpt for blog templates except on blog timeline where excerpt always shown.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Excerpt Length
			$wp_customize->add_setting('homeland_excerpt_length_blog', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => '30',
			));

			$wp_customize->add_control('homeland_excerpt_length_blog', array(
			 	'label' => esc_html__('Excerpt Length', 'homeland'),
			 	'section' => 'homeland_blog_main_section',
			 	'description' => esc_html__('This will control the number of words in the excerpts for blog page templates and blog archive pages. Default value is 30', 'homeland'),
			 	'type' => 'number',
			));

			// Button Label
			$wp_customize->add_setting('homeland_blog_button', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_blog_button', array(
			 	'label' => esc_html__('Blog Button Label', 'homeland'),
			 	'section' => 'homeland_blog_main_section',
			 	'type' => 'text',
			));


		// Single Post Section
		$wp_customize->add_section('homeland_blog_single_section', array(
			'title' => esc_html__('Single Post', 'homeland'),
			'panel' => 'homeland_blog_panel',
		));

			// Layout
			$wp_customize->add_setting( 'homeland_single_blog_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_agent_layout',
			) );
			$wp_customize->add_control( 'homeland_single_blog_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
				'description' => esc_html__('Select your desire layout for blog single page', 'homeland'),
				'choices' => array(
					'Default' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Fullwidth' => esc_html__( 'Fullwidth', 'homeland' ),
				)
			) );

			// Hide Featured Image
			$wp_customize->add_setting( 'homeland_blog_thumb_slider', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_blog_thumb_slider', array(
				'label' => esc_html__( 'Exclude Featured Image?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Attachment Order
			$wp_customize->add_setting( 'homeland_blog_attachment_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_blog_attachment_order', array(
				'label' => esc_html__( 'Attachment Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// Attachment Sort
			$wp_customize->add_setting( 'homeland_blog_attachment_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_blog_attachment_orderby', array(
				'label' => esc_html__( 'Attachment Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
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

			// Hide Author Details
			$wp_customize->add_setting( 'homeland_blog_author_hide', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_blog_author_hide', array(
				'label' => esc_html__( 'Hide Author Details?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Hide Previous and Next Buttons
			$wp_customize->add_setting( 'homeland_hide_blog_prevnext', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_blog_prevnext', array(
				'label' => esc_html__( 'Hide Previous and Next Buttons?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// Archive Section
		$wp_customize->add_section('homeland_blog_archive_section', array(
			'title' => esc_html__('Archive', 'homeland'),
			'panel' => 'homeland_blog_panel',
		));

			// Hide Advance Search
			$wp_customize->add_setting( 'homeland_hide_blog_archive_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_blog_archive_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_archive_section',
				'description' => esc_html__('This will hide advance search in archive, category and taxonomy pages for blog list.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// Archive Layout
			$wp_customize->add_setting( 'homeland_archive_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_blog_layout',
			) );
			$wp_customize->add_control( 'homeland_archive_layout', array(
				'label' => esc_html__( 'Archive Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_blog_archive_section',
				'description' => esc_html__('Select your desire layout for blog archive page', 'homeland'),
				'choices' => array(
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
				)
			) );
?>