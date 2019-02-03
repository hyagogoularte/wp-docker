<?php
	// General Panel
	$wp_customize->add_panel( 'homeland_typography_panel', array(
		'title' => esc_html__( 'Typography', 'homeland' ),
		'priority' => 122
	));

	  // Main Section
		$wp_customize->add_section('homeland_typo_main_section', array(
			'title' => esc_html__('Font Family and Sizes', 'homeland'),
			'panel' => 'homeland_typography_panel',
		));

			// Font Family
			$wp_customize->add_setting( 'homeland_theme_font', array(
				'type' => 'option',
				'default' => 'Default',
				'sanitize_callback' => 'homeland_option_fonts',
			) );
			$wp_customize->add_control( 'homeland_theme_font', array(
				'label' => esc_html__( 'Font Family', 'homeland' ),
				'type' => 'select',
				'section' => 'homeland_typo_main_section',
				'choices' => array(
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
				)
			) );

			// Body Font Size 
			$wp_customize->add_setting('homeland_body_font_size', array(
				'default' => '12',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_body_font_size', array(
			 	'label' => esc_html__('Body Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Line Height
			$wp_customize->add_setting('homeland_body_line_height', array(
				'default' => '24',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_body_line_height', array(
			 	'label' => esc_html__('Line Height', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Homepage Header
			$wp_customize->add_setting('homeland_homepage_header_font_size', array(
				'default' => '24',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_homepage_header_font_size', array(
			 	'label' => esc_html__('Homepage Header Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Page Top Header
			$wp_customize->add_setting('homeland_page_top_header_font_size', array(
				'default' => '36',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_page_top_header_font_size', array(
			 	'label' => esc_html__('Page Top Header Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Page Top Subtitle Header
			$wp_customize->add_setting('homeland_page_top_subtitle_font_size', array(
				'default' => '12',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_page_top_subtitle_font_size', array(
			 	'label' => esc_html__('Page Top Subtitle Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Page Content Header
			$wp_customize->add_setting('homeland_page_content_header_font_size', array(
				'default' => '22',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_page_content_header_font_size', array(
			 	'label' => esc_html__('Page Content Header Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Sidebar Header
			$wp_customize->add_setting('homeland_sidebar_header_font_size', array(
				'default' => '16',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_sidebar_header_font_size', array(
			 	'label' => esc_html__('Sidebar Header Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));

			// Footer Header
			$wp_customize->add_setting('homeland_footer_font_size', array(
				'default' => '20',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			));

			$wp_customize->add_control('homeland_footer_font_size', array(
			 	'label' => esc_html__('Footer Header Font Size', 'homeland'),
			 	'section' => 'homeland_typo_main_section',
			 	'type' => 'number',
			));


		// Color Scheme Section
		$wp_customize->add_section('homeland_color_scheme_section', array(
			'title' => esc_html__('Color Schemes', 'homeland'),
			'panel' => 'homeland_typography_panel',
		));

			// Global Theme Color
			$wp_customize->add_setting( 'homeland_global_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_global_color',
					array(
						'label' => esc_html__( 'Global Theme Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Top Header Background Color
			$wp_customize->add_setting( 'homeland_top_header_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_top_header_bg_color',
					array(
						'label' => esc_html__( 'Top Header Background Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Menu Text Color
			$wp_customize->add_setting( 'homeland_menu_text_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_menu_text_color',
					array(
						'label' => esc_html__( 'Menu Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Menu Text Current Color
			$wp_customize->add_setting( 'homeland_menu_text_color_active', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_menu_text_color_active',
					array(
						'label' => esc_html__( 'Menu Text Current Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Menu Background Color
			$wp_customize->add_setting( 'homeland_menu_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_menu_bg_color',
					array(
						'label' => esc_html__( 'Menu Background Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Header Text Color
			$wp_customize->add_setting( 'homeland_header_text_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_header_text_color',
					array(
						'label' => esc_html__( 'Header Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Sidebar Header Text Color
			$wp_customize->add_setting( 'homeland_sidebar_text_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_sidebar_text_color',
					array(
						'label' => esc_html__( 'Sidebar Header Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Button Text Color
			$wp_customize->add_setting( 'homeland_button_text_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_button_text_color',
					array(
						'label' => esc_html__( 'Button Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Button Background Color
			$wp_customize->add_setting( 'homeland_button_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_button_bg_color',
					array(
						'label' => esc_html__( 'Button Background Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Button Hover Color
			$wp_customize->add_setting( 'homeland_button_bg_hover_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_button_bg_hover_color',
					array(
						'label' => esc_html__( 'Button Hover Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Footer Header Text Color
			$wp_customize->add_setting( 'homeland_footer_title_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_footer_title_color',
					array(
						'label' => esc_html__( 'Footer Header Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Footer Text Color
			$wp_customize->add_setting( 'homeland_footer_text_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_footer_text_color',
					array(
						'label' => esc_html__( 'Footer Text Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Footer Link Color
			$wp_customize->add_setting( 'homeland_footer_link_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_footer_link_color',
					array(
						'label' => esc_html__( 'Footer Link Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Footer Link Hover Color
			$wp_customize->add_setting( 'homeland_footer_link_hover_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_footer_link_hover_color',
					array(
						'label' => esc_html__( 'Footer Hover Link Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Footer Background Color
			$wp_customize->add_setting( 'homeland_footer_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_footer_bg_color',
					array(
						'label' => esc_html__( 'Footer Background Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// Sliding Bar Background Color
			$wp_customize->add_setting( 'homeland_slide_top_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_slide_top_bg_color',
					array(
						'label' => esc_html__( 'Sliding Bar Background Color', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// mobile menu background color
			$wp_customize->add_setting( 'homeland_mobile_bg_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_mobile_bg_color',
					array(
						'label' => esc_html__( 'Mobile Background Color', 'homeland' ),
						'description' => esc_html__( 'Add background color for mobile bar', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// mobile menu text current color
			$wp_customize->add_setting( 'homeland_mobile_text_current_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_mobile_text_current_color',
					array(
						'label' => esc_html__( 'Mobile Text Current Color', 'homeland' ),
						'description' => esc_html__( 'Add current text color for mobile menu', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// mobile menu background current color
			$wp_customize->add_setting( 'homeland_mobile_bg_current_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_mobile_bg_current_color',
					array(
						'label' => esc_html__( 'Mobile Background Current Color', 'homeland' ),
						'description' => esc_html__( 'Add current background color for mobile menu', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);

			// mobile menu hover color
			$wp_customize->add_setting( 'homeland_mobile_hover_color', array(
				'type' => 'option',
				'default' => '',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_mobile_hover_color',
					array(
						'label' => esc_html__( 'Mobile Hover Color', 'homeland' ),
						'description' => esc_html__( 'Add hover color for mobile menu', 'homeland' ),
						'section' => 'homeland_color_scheme_section',
					)
				)
			);
?>