<?php
	// portfolio panel
	$wp_customize->add_panel( 'homeland_portfolio_panel', array(
		'title' => esc_html__( 'Portfolio', 'homeland' ),
		'priority' => 131
	));

		// main section
		$wp_customize->add_section('homeland_portfolio_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_portfolio_panel',
		));

			// limit
			$wp_customize->add_setting('homeland_num_portfolio', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_num_portfolio', array(
			 	'label' => esc_html__('Number of portfolio items per page', 'homeland'),
			 	'section' => 'homeland_portfolio_main_section',
			 	'type' => 'number',
			));

			// hide excerpt
			$wp_customize->add_setting( 'homeland_portfolio_excerpt', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_portfolio_excerpt', array(
				'label' => esc_html__( 'Hide Excerpt?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_main_section',
				'description' => esc_html__('This will hide portfolio excerpt', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// excerpt length
			$wp_customize->add_setting('homeland_excerpt_length_portfolio', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'default' => '30',
			));

			$wp_customize->add_control('homeland_excerpt_length_portfolio', array(
			 	'label' => esc_html__('Excerpt Length', 'homeland'),
			 	'section' => 'homeland_portfolio_main_section',
			 	'description' => esc_html__('This will control the number of words in the excerpts for portfolio page templates and portfolio archive pages. Default value is 30', 'homeland'),
			 	'type' => 'number',
			));

			// portfolio order
			$wp_customize->add_setting( 'homeland_portfolio_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_portfolio_order', array(
				'label' => esc_html__( 'Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_main_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// portfolio sort
			$wp_customize->add_setting( 'homeland_portfolio_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_portfolio_orderby', array(
				'label' => esc_html__( 'Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_main_section',
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

			// portfolio slug
			$wp_customize->add_setting('homeland_portfolio_slug', array(
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_portfolio_slug', array(
			 	'label' => esc_html__('Portfolio Slug', 'homeland'),
			 	'section' => 'homeland_portfolio_main_section',
			 	'description' => esc_html__('The slug name cannot be the same name as your portfolio page or else the layout breaks. This option changes the permalink when you use the permalink type as %postname%. Make sure to regenerate permalinks structure.', 'homeland'),
			 	'type' => 'text',
			));


		// single post section
		$wp_customize->add_section('homeland_portfolio_single_section', array(
			'title' => esc_html__('Single Post', 'homeland'),
			'panel' => 'homeland_portfolio_panel',
		));

			// layout
			$wp_customize->add_setting( 'homeland_single_portfolio_layout', array(
				'type' => 'option',
				'default' => 'Fullwidth',
				'sanitize_callback' => 'homeland_option_portfolio_layout',
			) );
			$wp_customize->add_control( 'homeland_single_portfolio_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_single_section',
				'description' => esc_html__('Select your desire layout for portfolio single page', 'homeland'),
				'choices' => array(
					'Fullwidth' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Right Sidebar' => esc_html__( 'Right Sidebar', 'homeland' ),
				)
			) );

			// static images
			$wp_customize->add_setting( 'homeland_portfolio_static_image', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_portfolio_static_image', array(
				'label' => esc_html__( 'Use static image for portfolio?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_single_section',
				'description' => esc_html__('Note: If you select yes it will display portfolio images without a slider', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// attachment order
			$wp_customize->add_setting( 'homeland_portfolio_attachment_order', array(
				'type' => 'option',
				'default' => 'DESC',
				'sanitize_callback' => 'homeland_option_order',
			) );
			$wp_customize->add_control( 'homeland_portfolio_attachment_order', array(
				'label' => esc_html__( 'Attachment Ordering', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_single_section',
				'choices' => array(
					'ASC' => esc_html__( 'Ascending', 'homeland' ),
					'DESC' => esc_html__( 'Descending', 'homeland' ),
				)
			) );

			// attachment sort
			$wp_customize->add_setting( 'homeland_portfolio_attachment_orderby', array(
				'type' => 'option',
				'default' => 'ID',
				'sanitize_callback' => 'homeland_option_sortby',
			) );
			$wp_customize->add_control( 'homeland_portfolio_attachment_orderby', array(
				'label' => esc_html__( 'Attachment Sorting', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_single_section',
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

			// hide previous and next button
			$wp_customize->add_setting( 'homeland_hide_portfolio_prevnext', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_portfolio_prevnext', array(
				'label' => esc_html__( 'Hide Previous and Next Buttons?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_single_section',
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );


		// archive section
		$wp_customize->add_section('homeland_portfolio_archive_section', array(
			'title' => esc_html__('Archive and Taxonomy', 'homeland'),
			'panel' => 'homeland_portfolio_panel',
		));

			// hide advance search
			$wp_customize->add_setting( 'homeland_hide_portfolio_archive_advance_search', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'homeland_option_yes_no',
			) );
			$wp_customize->add_control( 'homeland_hide_portfolio_archive_advance_search', array(
				'label' => esc_html__( 'Hide Advance Search?', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_archive_section',
				'description' => esc_html__('This will hide advance search in archive, category and taxonomy pages for portfolio list.', 'homeland'),
				'choices' => array(
					'true' => esc_html__( 'Yes', 'homeland' ),
					'' => esc_html__( 'No', 'homeland' ),
				)
			) );

			// layout
			$wp_customize->add_setting( 'homeland_portfolio_tax_layout', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_portfolio_layout',
			) );
			$wp_customize->add_control( 'homeland_portfolio_tax_layout', array(
				'label' => esc_html__( 'Layout', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_portfolio_archive_section',
				'description' => esc_html__('Select your desire layout for taxonomy and archive page', 'homeland'),
				'choices' => array(
					'Fullwidth' => esc_html__( 'Default', 'homeland' ),
					'Left Sidebar' => esc_html__( 'Left Sidebar', 'homeland' ),
					'Right Sidebar' => esc_html__( 'Right Sidebar', 'homeland' ),
					'Grid' => esc_html__( 'Grid No Space', 'homeland' ),
				)
			) );
?>