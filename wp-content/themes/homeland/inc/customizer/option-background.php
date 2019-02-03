<?php
	// Background Panel
	$wp_customize->add_panel( 'homeland_background_panel', array(
		'title' => esc_html__( 'Background', 'homeland' ),
		'priority' => 123
	));

	  // Main Section
		$wp_customize->add_section('homeland_background_main_section', array(
			'title' => esc_html__('Main', 'homeland'),
			'panel' => 'homeland_background_panel',
		));

			// Background Type
			$wp_customize->add_setting( 'homeland_bg_type', array(
				'type' => 'option',
				'default' => 'Color',
				'sanitize_callback' => 'homeland_option_bg_type',
			) );
			$wp_customize->add_control( 'homeland_bg_type', array(
				'label' => esc_html__( 'Background Type', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__( 'Select the background type you want to use', 'homeland' ),
				'section' => 'homeland_background_main_section',
				'choices' => array(
					'Color' => esc_html__( 'Color', 'homeland' ),
					'Pattern' => esc_html__( 'Pattern', 'homeland' ),
					'Image' => esc_html__( 'Image', 'homeland' ),
				)
			) );

			// Background Color
			$wp_customize->add_setting( 'homeland_bg_color', array(
				'type' => 'option',
				'default' => 'FFF',
				'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'homeland_bg_color',
					array(
						'label' => esc_html__( 'Background Color', 'homeland' ),
						'description' => esc_html__('Fill this field if you select color for your background type', 'homeland'),
						'section' => 'homeland_background_main_section',
					)
				)
			);

			// Theme Pattern
			$wp_customize->add_setting( 'homeland_pattern', array(
				'type' => 'option',
				'default' => 'Select Pattern',
				'sanitize_callback' => 'homeland_option_pattern',
			) );
			$wp_customize->add_control( 'homeland_pattern', array(
				'label' => esc_html__( 'Background Pattern', 'homeland' ),
				'type' => 'select',
				'description' => esc_html__('Select background pattern for your background type', 'homeland'),
				'section' => 'homeland_background_main_section',
				'choices' => array(
					'Default' => esc_html__( 'Select Pattern', 'homeland' ),
					'Symphony' => esc_html__( 'Symphony', 'homeland' ),
					'Contemporary China' => esc_html__( 'Contemporary China', 'homeland' ),
					'Eight Horns' => esc_html__( 'Eight Horns', 'homeland' ),
					'Swirl' => esc_html__( 'Swirl', 'homeland' ),
					'Mini Waves' => esc_html__( 'Mini Waves', 'homeland' ),
					'Skulls' => esc_html__( 'Skulls', 'homeland' ),
					'Pentagon' => esc_html__( 'Pentagon', 'homeland' ),
					'Halftone' => esc_html__( 'Halftone', 'homeland' ),
					'Giftly' => esc_html__( 'Giftly', 'homeland' ),
					'Food' => esc_html__( 'Food', 'homeland' ),
					'Sprinkles' => esc_html__( 'Sprinkles', 'homeland' ),
					'Geometry' => esc_html__( 'Geometry', 'homeland' ),
					'Dimension' => esc_html__( 'Dimension', 'homeland' ),
					'Pixel Weave' => esc_html__( 'Pixel Weave', 'homeland' ),
					'Hoffman' => esc_html__( 'Hoffman', 'homeland' ),
					'Gray Lines' => esc_html__( 'Gray Lines', 'homeland' ),
					'Noise Lines' => esc_html__( 'Noise Lines', 'homeland' ),
					'Tiny Grid' => esc_html__( 'Tiny Grid', 'homeland' ),
					'Bullseye' => esc_html__( 'Bullseye', 'homeland' ),
					'Gray Paper' => esc_html__( 'Gray Paper', 'homeland' ),
					'Norwegian Rose' => esc_html__( 'Norwegian Rose', 'homeland' ),
					'Subtle Net' => esc_html__( 'Subtle Net', 'homeland' ),
					'Polyester Lite' => esc_html__( 'Polyester Lite', 'homeland' ),
					'Absurdity' => esc_html__( 'Absurdity', 'homeland' ),
					'White Bed Sheet' => esc_html__( 'White Bed Sheet', 'homeland' ),
					'Subtle Stripes' => esc_html__( 'Subtle Stripes', 'homeland' ),
					'Light Mesh' => esc_html__( 'Light Mesh', 'homeland' ),
					'Rough Diagonal' => esc_html__( 'Rough Diagonal', 'homeland' ),
					'Arabesque' => esc_html__( 'Arabesque', 'homeland' ),
					'Stack Circles' => esc_html__( 'Stack Circles', 'homeland' ),
					'Hexellence' => esc_html__( 'Hexellence', 'homeland' ),
					'White Texture' => esc_html__( 'White Texture', 'homeland' ),
					'Concrete Wall' => esc_html__( 'Concrete Wall', 'homeland' ),
					'Brush Aluminum' => esc_html__( 'Brush Aluminum', 'homeland' ),
					'Groovepaper' => esc_html__( 'Groovepaper', 'homeland' ),
					'Diagonal Noise' => esc_html__( 'Diagonal Noise', 'homeland' ),
					'Rocky Wall' => esc_html__( 'Rocky Wall', 'homeland' ),
					'Whitey' => esc_html__( 'Whitey', 'homeland' ),
					'Bright Squares' => esc_html__( 'Bright Squares', 'homeland' ),
					'Freckles' => esc_html__( 'Freckles', 'homeland' ),
					'Wallpaper' => esc_html__( 'Wallpaper', 'homeland' ),
					'Project Paper' => esc_html__( 'Project Paper', 'homeland' ),
					'Cubes' => esc_html__( 'Cubes', 'homeland' ),
					'Washi' => esc_html__( 'Washi', 'homeland' ),
					'Dot Noise' => esc_html__( 'Dot Noise', 'homeland' ),
					'xv' => esc_html__( 'xv', 'homeland' ),
					'Little Plaid' => esc_html__( 'Little Plaid', 'homeland' ),
					'Old Wall' => esc_html__( 'Old Wall', 'homeland' ),
					'Connect' => esc_html__( 'Connect', 'homeland' ),
					'Ravenna' => esc_html__( 'Ravenna', 'homeland' ),
					'Smooth Wall' => esc_html__( 'Smooth Wall', 'homeland' ),
					'Tapestry' => esc_html__( 'Tapestry', 'homeland' ),
					'Psychedelic' => esc_html__( 'Psychedelic', 'homeland' ),
					'Scribble Light' => esc_html__( 'Scribble Light', 'homeland' ),
					'GPlay' => esc_html__( 'GPlay', 'homeland' ),
					'Lil Fiber' => esc_html__( 'Lil Fiber', 'homeland' ),
					'First Aid' => esc_html__( 'First Aid', 'homeland' ),
					'Frenchstucco' => esc_html__( 'Frenchstucco', 'homeland' ),
					'Light Wool' => esc_html__( 'Light Wool', 'homeland' ),
					'Gradient Squares' => esc_html__( 'Gradient Squares', 'homeland' ),
					'Escheresque' => esc_html__( 'Escheresque', 'homeland' ),
					'Climpek' => esc_html__( 'Climpek', 'homeland' ),
					'Lyonnette' => esc_html__( 'Lyonnette', 'homeland' ),
					'Gray Floral' => esc_html__( 'Gray Floral', 'homeland' ),
					'Reticular Tissue' => esc_html__( 'Reticular Tissue', 'homeland' ),
					'Confectionary' => esc_html__( 'Confectionary', 'homeland' ),
					'Dark Sharp Edges' => esc_html__( 'Dark Sharp Edges', 'homeland' ),
					'Subtle White Feathers' => esc_html__( 'Subtle White Feathers', 'homeland' ),
					'Tileable Wood' => esc_html__( 'Tileable Wood', 'homeland' ),
					'Pineapple Cut' => esc_html__( 'Pineapple Cut', 'homeland' ),
					'Japanese Sayagata' => esc_html__( 'Japanese Sayagata', 'homeland' ),
					'Seigaiha' => esc_html__( 'Seigaiha', 'homeland' ),
					'Topography' => esc_html__( 'Topography', 'homeland' ),
					'Circles and Roundabouts' => esc_html__( 'Circles and Roundabouts', 'homeland' ),
					'POW Star' => esc_html__( 'POW Star', 'homeland' ),
					'Doodles' => esc_html__( 'Doodles', 'homeland' ),
					'Hyponotize' => esc_html__( 'Hyponotize', 'homeland' ),
					'Regal' => esc_html__( 'Regal', 'homeland' ),
					'Right Round' => esc_html__( 'Right Round', 'homeland' ),
					'Intersection' => esc_html__( 'Intersection', 'homeland' ),
					'Curls' => esc_html__( 'Curls', 'homeland' ),
				)
			) );

			// Background Image
			$wp_customize->add_setting( 'homeland_default_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_default_bgimage',
					array(
						'label' => esc_html__( 'Background Image', 'homeland' ),
						'description' => esc_html__( 'Fill this field if you select image for your background type', 'homeland' ),
						'section' => 'homeland_background_main_section',
					)
				)
			);


		// Images Section
		$wp_customize->add_section('homeland_background_image_section', array(
			'title' => esc_html__('Images', 'homeland'),
			'panel' => 'homeland_background_panel',
			'description' => esc_html__('Add your background images here', 'homeland')
		));

			// Archive Image
			$wp_customize->add_setting( 'homeland_archive_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_archive_bgimage',
					array(
						'label' => esc_html__( 'Archive Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for archive page', 'homeland')
					)
				)
			);

			// Taxonomy Image
			$wp_customize->add_setting( 'homeland_taxonomy_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_taxonomy_bgimage',
					array(
						'label' => esc_html__( 'Taxonomy Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for taxonomy page', 'homeland')
					)
				)
			);

			// Agent Image
			$wp_customize->add_setting( 'homeland_agent_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_agent_bgimage',
					array(
						'label' => esc_html__( 'Agent Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for agent single page', 'homeland')
					)
				)
			);

			// Search Image
			$wp_customize->add_setting( 'homeland_search_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_search_bgimage',
					array(
						'label' => esc_html__( 'Search Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for search page', 'homeland')
					)
				)
			);

			// Attachment Image
			$wp_customize->add_setting( 'homeland_attachment_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_attachment_bgimage',
					array(
						'label' => esc_html__( 'Attachment Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for attachment page', 'homeland')
					)
				)
			);

			// Page not found Image
			$wp_customize->add_setting( 'homeland_notfound_bgimage', array(
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			) );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'homeland_notfound_bgimage',
					array(
						'label' => esc_html__( 'Page not found Image', 'homeland' ),
						'section' => 'homeland_background_image_section',
						'description' => esc_html__('Upload background image for 404 page', 'homeland')
					)
				)
			);
?>