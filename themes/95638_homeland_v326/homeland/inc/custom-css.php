<?php
	/**
	 * Custom Theme Stylesheets
	 */
	if ( ! function_exists( 'homeland_theme_custom_styles' ) ) :
		function homeland_theme_custom_styles() {
			global $post;

			$homeland_bg_type = get_option( 'homeland_bg_type' );
			$homeland_pattern = get_option( 'homeland_pattern' );
			$homeland_bg_color = get_option( 'homeland_bg_color' );
			$homeland_theme_font = get_option( 'homeland_theme_font' );
			$homeland_theme_color_global = get_option( 'homeland_global_color' );
			$homeland_rgb_theme_color = homeland_hex2rgba( $homeland_theme_color_global );
			$homeland_rgba_theme_color = homeland_hex2rgba( $homeland_theme_color_global, 0.8 );
			$homeland_top_header_bg_color = get_option( 'homeland_top_header_bg_color' );
			$homeland_menu_bg_color = get_option( 'homeland_menu_bg_color' );
			$homeland_menu_text_color = get_option( 'homeland_menu_text_color' );
			$homeland_menu_text_color_active = get_option( 'homeland_menu_text_color_active' );
			$homeland_header_text_color = get_option( 'homeland_header_text_color' );
			$homeland_sidebar_text_color = get_option( 'homeland_sidebar_text_color' );
			$homeland_button_bg_color = get_option( 'homeland_button_bg_color' );
			$homeland_button_bg_hover_color = get_option( 'homeland_button_bg_hover_color' );
			$homeland_button_text_color = get_option( 'homeland_button_text_color' );
			$homeland_footer_bg_color = get_option( 'homeland_footer_bg_color' );
			$homeland_footer_title_color = get_option( 'homeland_footer_title_color' );
			$homeland_footer_text_color = get_option( 'homeland_footer_text_color' );
			$homeland_footer_link_color = get_option( 'homeland_footer_link_color' );
			$homeland_footer_link_hover_color = get_option( 'homeland_footer_link_hover_color' );
			$homeland_slide_top_bg_color = get_option( 'homeland_slide_top_bg_color' );
			$homeland_mobile_bg_color = get_option( 'homeland_mobile_bg_color' );
			$homeland_mobile_hover_color = get_option( 'homeland_mobile_hover_color' );
			$homeland_mobile_text_curr_color = get_option( 'homeland_mobile_text_current_color' );
			$homeland_mobile_bg_curr_color = get_option( 'homeland_mobile_bg_current_color' );
			$homeland_welcome_overlay = get_option( 'homeland_welcome_overlay' );
			$homeland_services_overlay = get_option( 'homeland_services_overlay' );
			$homeland_testi_overlay = get_option( 'homeland_testi_overlay' );
			$homeland_partners_overlay = get_option( 'homeland_partners_overlay' );
			$homeland_header_overlay = get_option( 'homeland_header_overlay' );
			$homeland_static_image_overlay = get_option( 'homeland_static_image_overlay' );
			$homeland_cta_overlay = get_option( 'homeland_cta_overlay' );
			$homeland_hide_header_image = get_option( 'homeland_hide_header_image' );
			$homeland_preloader_icon = get_option( 'homeland_preloader_icon' );
			$homeland_slide_bar_position = get_option( 'homeland_slide_bar_position' );

			// background images
			$homeland_welcome_bgimage = get_option( 'homeland_welcome_bgimage' );
			$homeland_services_bgimage = get_option( 'homeland_services_bgimage' );
			$homeland_testimonials_bgimage = get_option( 'homeland_testimonials_bgimage' );
			$homeland_partners_bgimage = get_option( 'homeland_partners_bgimage' );
			$homeland_contact_alt_bgimage = get_option( 'homeland_contact_alt_bgimage' );
			$homeland_attachment_bgimage = get_option( 'homeland_attachment_bgimage' );
			$homeland_static_image = get_option( 'homeland_static_image' );
			$homeland_footer_bgimage = get_option( 'homeland_footer_bgimage' );
			$homeland_cta_bgimage = get_option( 'homeland_cta_bgimage' );
			
			// header images
			$homeland_archive_hdimage = get_option( 'homeland_archive_hdimage' );
			$homeland_search_hdimage = get_option( 'homeland_search_hdimage' );
			$homeland_notfound_hdimage = get_option( 'homeland_notfound_hdimage' );
			$homeland_agent_hdimage = get_option( 'homeland_agent_hdimage' );
			$homeland_attachment_hdimage = get_option( 'homeland_attachment_hdimage' );
			$homeland_taxonomy_hdimage = get_option( 'homeland_taxonomy_hdimage' );
			$homeland_default_hdimage = get_option( 'homeland_default_hdimage' );
			$homeland_forum_hdimage = get_option( 'homeland_forum_hdimage' );
			$homeland_forum_single_hdimage = get_option( 'homeland_forum_single_hdimage' );
			$homeland_forum_single_topic_hdimage = get_option( 'homeland_forum_single_topic_hdimage' );
			$homeland_forum_topic_edit_hdimage = get_option( 'homeland_forum_topic_edit_hdimage' );
			$homeland_forum_search_hdimage = get_option( 'homeland_forum_search_hdimage' );
			$homeland_user_profile_hdimage = get_option( 'homeland_user_profile_hdimage' );

			// font sizes
			$homeland_body_font_size = get_option( 'homeland_body_font_size' );
			$homeland_body_line_height = get_option( 'homeland_body_line_height' );
			$homeland_homepage_header_font_size = get_option( 'homeland_homepage_header_font_size' );
			$homeland_page_top_header_font_size = get_option( 'homeland_page_top_header_font_size' );
			$homeland_page_top_subtitle_font_size = get_option( 'homeland_page_top_subtitle_font_size');
			$homeland_page_content_header_font_size = get_option( 'homeland_page_content_header_font_size' );
			$homeland_sidebar_header_font_size = get_option( 'homeland_sidebar_header_font_size');
			$homeland_footer_font_size = get_option( 'homeland_footer_font_size' );

			$homeland_directory_uri = get_theme_file_uri( '/assets/img/patterns' );

			wp_enqueue_style( 'homeland-custom-style', get_theme_file_uri( '/assets/css/admin.min.css' ) );

			$homeland_custom_styles = "";

			if( !empty( $homeland_body_font_size ) ) :
				$homeland_custom_styles .= "
					body { 
						font-size: ". esc_html( $homeland_body_font_size ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_body_line_height ) ) :
				$homeland_custom_styles .= "
					body { 
						line-height: ". esc_html( $homeland_body_line_height ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_homepage_header_font_size ) ) :
				$homeland_custom_styles .= "
					.property-list-box h2, 
					.agent-block h3, 
					.featured-block h3, 
					.featured-block-two-cols h3, 
					.blog-block h3, 
					.partners-block h3 { 
						font-size: ". esc_html( $homeland_homepage_header_font_size ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_page_top_header_font_size ) ) :
				$homeland_custom_styles .= "
					.ptitle { font-size: ". esc_html( $homeland_page_top_header_font_size ) ."px !important; }
				";
			endif;

			if( !empty( $homeland_page_top_subtitle_font_size ) ) :
				$homeland_custom_styles .= "
					.subtitle label { 
						font-size: ". esc_html( $homeland_page_top_subtitle_font_size ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_page_content_header_font_size ) ) :
				$homeland_custom_styles .= "
					.left-container h3 { 
						font-size: ". esc_html( $homeland_page_content_header_font_size ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_sidebar_header_font_size ) ) :
				$homeland_custom_styles .= "
					.sidebar h5 { 
						font-size: ". esc_html( $homeland_sidebar_header_font_size ) ."px !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_font_size ) ) :
				$homeland_custom_styles .= "
					footer .widget h5 { 
						font-size: ". esc_html( $homeland_footer_font_size ) ."px !important; 
					}
				";
			endif;


			// Patterns
			if( 'Pattern' === $homeland_bg_type ) :
				if( 'Gray Lines' === $homeland_pattern ) : 
					$homeland_pattern_name = "gray_lines.png";
				elseif( 'Noise Lines' === $homeland_pattern ) : 
					$homeland_pattern_name = "noise_lines.png";
				elseif( 'Tiny Grid' === $homeland_pattern ) : 
					$homeland_pattern_name = "tiny_grid.png";
				elseif( 'Bullseye' === $homeland_pattern ) : 
					$homeland_pattern_name = "strange_bullseyes.png";
				elseif( 'Gray Paper' === $homeland_pattern ) : $homeland_pattern_name = "gray_paper.png";
				elseif( 'Norwegian Rose' === $homeland_pattern ) : $homeland_pattern_name = "norwegian_rose.png";
				elseif( 'Subtle Net' === $homeland_pattern ) : $homeland_pattern_name = "subtlenet.png";
				elseif( 'Polyester Lite' === $homeland_pattern ) : $homeland_pattern_name = "polyester_lite.png";
				elseif( 'Absurdity' === $homeland_pattern ) : $homeland_pattern_name = "absurdidad.png";
				elseif( 'White Bed Sheet' === $homeland_pattern ) : $homeland_pattern_name = "white_bed_sheet.png";
				elseif( 'Subtle Stripes' === $homeland_pattern ) : $homeland_pattern_name = "subtle_stripes.png";
				elseif( 'Light Mesh' === $homeland_pattern ) : $homeland_pattern_name = "lghtmesh.png";
				elseif( 'Rough Diagonal' === $homeland_pattern ) : $homeland_pattern_name = "rough_diagonal.png";
				elseif( 'Arabesque' === $homeland_pattern ) : $homeland_pattern_name = "arab_tile.png";
				elseif( 'Stack Circles' === $homeland_pattern ) : $homeland_pattern_name = "stacked_circles.png";
				elseif( 'Hexellence' === $homeland_pattern ) : $homeland_pattern_name = "hexellence.png";
				elseif( 'White Texture' === $homeland_pattern ) : $homeland_pattern_name = "white_texture.png";
				elseif( 'Concrete Wall' === $homeland_pattern ) : $homeland_pattern_name = "concrete_wall.png";
				elseif( 'Brush Aluminum' === $homeland_pattern ) : $homeland_pattern_name = "brushed_alu.png";
				elseif( 'Groovepaper' === $homeland_pattern ) : $homeland_pattern_name = "groovepaper.png";
				elseif( 'Diagonal Noise' === $homeland_pattern ) : $homeland_pattern_name = "diagonal_noise.png";
				elseif( 'Rocky Wall' === $homeland_pattern ) : $homeland_pattern_name = "rockywall.png";
				elseif( 'Whitey' === $homeland_pattern ) : $homeland_pattern_name = "whitey.png";
				elseif( 'Bright Squares' === $homeland_pattern ) : $homeland_pattern_name = "bright_squares.png";
				elseif( 'Freckles' === $homeland_pattern ) : $homeland_pattern_name = "freckles.png";
				elseif( 'Wallpaper' === $homeland_pattern ) : $homeland_pattern_name = "wallpaper.png";
				elseif( 'Project Paper' === $homeland_pattern ) : $homeland_pattern_name = "project_papper.png";
				elseif( 'Cubes' === $homeland_pattern ) : $homeland_pattern_name = "cubes.png";
				elseif( 'Washi' === $homeland_pattern ) : $homeland_pattern_name = "washi.png";
				elseif( 'Dot Noise' === $homeland_pattern ) : $homeland_pattern_name = "dotnoise.png";
				elseif( 'xv' === $homeland_pattern ) : $homeland_pattern_name = "xv.png";
				elseif( 'Little Plaid' === $homeland_pattern ) : $homeland_pattern_name = "plaid.png";
				elseif( 'Old Wall' === $homeland_pattern ) : $homeland_pattern_name = "old_wall.png";
				elseif( 'Connect' === $homeland_pattern ) : $homeland_pattern_name = "connect.png";
				elseif( 'Ravenna' === $homeland_pattern ) : $homeland_pattern_name = "ravenna.png";
				elseif( 'Smooth Wall' === $homeland_pattern ) : $homeland_pattern_name = "smooth_wall.png";
				elseif( 'Tapestry' === $homeland_pattern ) : $homeland_pattern_name = "tapestry.png";
				elseif( 'Psychedelic' === $homeland_pattern ) : $homeland_pattern_name = "psychedelic.png";
				elseif( 'Scribble Light' === $homeland_pattern ) : $homeland_pattern_name = "scribble_light.png";
				elseif( 'GPlay' === $homeland_pattern ) : $homeland_pattern_name = "gplay.png";
				elseif( 'Lil Fiber' === $homeland_pattern ) : $homeland_pattern_name = "lil_fiber.png";
				elseif( 'First Aid' === $homeland_pattern ) : $homeland_pattern_name = "first_aid.png";
				elseif( 'Frenchstucco' === $homeland_pattern ) : $homeland_pattern_name = "frenchstucco.png";
				elseif( 'Light Wool' === $homeland_pattern ) : $homeland_pattern_name = "light_wool.png";
				elseif( 'Gradient Squares' === $homeland_pattern ) : $homeland_pattern_name = "gradient_squares.png";
				elseif( 'Escheresque' === $homeland_pattern ) : $homeland_pattern_name = "escheresque.png";
				elseif( 'Climpek' === $homeland_pattern ) : $homeland_pattern_name = "climpek.png";
				elseif( 'Lyonnette' === $homeland_pattern ) : $homeland_pattern_name = "lyonnette.png";
				elseif( 'Gray Floral' === $homeland_pattern ) : $homeland_pattern_name = "greyfloral.png";
				elseif( 'Reticular Tissue' === $homeland_pattern ) : $homeland_pattern_name = "reticular_tissue.png";
				elseif( 'Halftone' === $homeland_pattern ) : $homeland_pattern_name = "halftone.png";
				elseif( 'Pentagon' === $homeland_pattern ) : $homeland_pattern_name = "congruent_pentagon.png";
				elseif( 'Giftly' === $homeland_pattern ) : $homeland_pattern_name = "giftly.png";
				elseif( 'Skulls' === $homeland_pattern ) : $homeland_pattern_name = "skulls.png";
				elseif( 'Food' === $homeland_pattern ) : $homeland_pattern_name = "food.png";
				elseif( 'Sprinkles' === $homeland_pattern ) : $homeland_pattern_name = "sprinkles.png";
				elseif( 'Geometry' === $homeland_pattern ) : $homeland_pattern_name = "geometry.png";
				elseif( 'Dimension' === $homeland_pattern ) : $homeland_pattern_name = "dimension.png";
				elseif( 'Pixel Weave' === $homeland_pattern ) : $homeland_pattern_name = "pixel_weave.png";
				elseif( 'Hoffman' === $homeland_pattern ) : $homeland_pattern_name = "hoffman.png";
				elseif( 'Mini Waves' === $homeland_pattern ) : $homeland_pattern_name = "mini_waves.png";
				elseif( 'Swirl' === $homeland_pattern ) : $homeland_pattern_name = "swirl.png";
				elseif( 'Eight Horns' === $homeland_pattern ) : $homeland_pattern_name = "eight_horns.png";
				elseif( 'Contemporary China' === $homeland_pattern ) : $homeland_pattern_name = "contemporary_china.png";
				elseif( 'Symphony' === $homeland_pattern ) : $homeland_pattern_name = "symphony.png";
				elseif( 'Confectionary' === $homeland_pattern ) : $homeland_pattern_name = "confectionary.png";
				elseif( 'Dark Sharp Edges' === $homeland_pattern ) : $homeland_pattern_name = "footer_lodyas.png";
				elseif( 'Subtle White Feathers' === $homeland_pattern ) : $homeland_pattern_name = "subtle_white_feathers.png";
				elseif( 'Tileable Wood' === $homeland_pattern ) : $homeland_pattern_name = "tileable_wood_texture.png";
				elseif( 'Pineapple Cut' === $homeland_pattern ) : $homeland_pattern_name = "pineapplecut.png";
				elseif( 'Japanese Sayagata' === $homeland_pattern ) : $homeland_pattern_name = "sayagata.png";
				elseif( 'Seigaiha' === $homeland_pattern ) : $homeland_pattern_name = "seigaiha.png";
				elseif( 'Topography' === $homeland_pattern ) : $homeland_pattern_name = "topography.png";
				elseif( 'Circles and Roundabouts' === $homeland_pattern ) : $homeland_pattern_name = "circles_roundabouts.png";
				elseif( 'POW Star' === $homeland_pattern ) : $homeland_pattern_name = "pow_star.png";
				elseif( 'Doodles' === $homeland_pattern ) : $homeland_pattern_name = "doodles.png";
				elseif( 'Hyponotize' === $homeland_pattern ) : $homeland_pattern_name = "hypnotize.png";
				elseif( 'Regal' === $homeland_pattern ) : $homeland_pattern_name = "regal.png";
				elseif( 'Right Round' === $homeland_pattern ) : $homeland_pattern_name = "round.png";
				elseif( 'Intersection' === $homeland_pattern ) : $homeland_pattern_name = "intersection.png";
				elseif( 'Curls' === $homeland_pattern ) : $homeland_pattern_name = "curls.png";
				else : $homeland_pattern_name = "";
				endif;

				$homeland_custom_styles .= "
					body { 
						background-image: url('". esc_url( $homeland_directory_uri ) ."/". $homeland_pattern_name ."') !important; 
						background-repeat: repeat;
						background-position: top;
						background-attachment: fixed !important;
					}
				";

			elseif( 'Color' === $homeland_bg_type ) :
				$homeland_custom_styles .= "
					body { background-color: ". esc_html( $homeland_bg_color ) ." !important; }
				";
			endif;


			// Background Images
			if( !empty( $homeland_welcome_bgimage ) ) :
				$homeland_custom_styles .= "
					.welcome-block { 
						background-image: url('". esc_url( $homeland_welcome_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_services_bgimage ) ) :
				$homeland_custom_styles .= "
					.services-block-bg { 
						background-image: url('". esc_url( $homeland_services_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_attachment_bgimage ) ) :
				$homeland_custom_styles .= "
					.attachment-block-bg { 
						background-image: url('". esc_url( $homeland_attachment_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_testimonials_bgimage ) ) :
				$homeland_custom_styles .= "
					.testimonial-block { 
						background-image: url('". esc_url( $homeland_testimonials_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_partners_bgimage ) ) :
				$homeland_custom_styles .= "
					.partners-block { 
						background-image: url('". esc_url( $homeland_partners_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_static_image ) ) :
				$homeland_custom_styles .= "
					.homepage-static-image { 
						background-image: url('". esc_url( $homeland_static_image ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_bgimage ) ) :
				$homeland_custom_styles .= "
					footer { 
						background-image: url('". esc_url( $homeland_footer_bgimage ) ."') !important; 
						background-size: cover; 
					}
				";
			endif;

			if( !empty( $homeland_cta_bgimage ) ) :
				$homeland_custom_styles .= "
					.homepage-call-to-action { 
						background-image: url('". esc_url( $homeland_cta_bgimage ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_preloader_icon ) ) :
				$homeland_custom_styles .= "
					#status { 
						background-image: url('". esc_url( $homeland_preloader_icon ) ."') !important; 
					}
				";
			endif;

			if( !empty( $homeland_contact_alt_bgimage ) ) :
				$homeland_custom_styles .= "
					.contact-alt-background { 
						background-image: url('". esc_url( $homeland_contact_alt_bgimage ) ."') !important; 
						background-size: cover; 
					}
				";
			endif;

			if( !empty( $homeland_slide_bar_position ) ) :
				$homeland_slide_bar_class = $homeland_slide_bar_position == 'fixed' ? 'fixed' : 'absolute';
				$homeland_custom_styles .= "
					.sliding-bar { 
						position: ". esc_html( $homeland_slide_bar_position ) ." !important; 
					}
					a.slide-toggle { 
						position: ". esc_html( $homeland_slide_bar_class ) ." !important; 
					}
				";
			endif;


			// Theme Colors
			if( !empty( $homeland_theme_color_global ) ) :
				$homeland_custom_styles .= "
					.search-title span, .selectBox-dropdown .selectBox-arrow, 
					.home-flexslider .flex-direction-nav li .flex-next:hover, 
					.home-flexslider .flex-direction-nav li .flex-prev:hover, 
					.properties-flexslider .flex-direction-nav li .flex-next:hover, 
					.properties-flexslider .flex-direction-nav li .flex-prev:hover,
					.blog-flexslider .flex-direction-nav li .flex-next:hover, 
					.blog-flexslider .flex-direction-nav li .flex-prev:hover, 
					.portfolio-flexslider .flex-direction-nav li .flex-next:hover, 
					.portfolio-flexslider .flex-direction-nav li .flex-prev:hover, 
					.services-block a.more, 
					.services-block-bg a.more, 
					.services-pb-block a.more, 
					.cat-price,
					.pimage figcaption i, 
					.feat-thumb figcaption i, 
					.feat-medium figcaption i,
					.nsu-submit, a#toTop, 
					.pactions a:link, 
					.pactions a:visited, 
					.theme-menu ul li.current-menu-item a, 
					.theme-menu ul li.current-menu-ancestor a, 
					.theme-menu ul li.current-menu-parent a, 
					.theme-menu ul li.current_page_item a,
					.theme-menu ul li a:hover, 
					.cat-toogles ul li.current-cat a, 
					.cat-toogles ul li a:hover, 
					.page-numbers li a:hover, 
					.alignleft a:hover, 
					.alignright a:hover, 
					.post-link-blog .prev a:hover, 
					.post-link-blog .next a:hover, 
					span.current, 
					a.continue, 
					.wpcf7-submit, #submit,
					.page-template-template-homepage2-php .hi-icon-effect-1 .hi-icon,
					.services-pb-block .hi-icon-effect-1 .hi-icon,
					.advance-search-widget ul li input[type='submit'], 
					.dsidx-widget.dsidx-search-widget 
					.dsidx-search-button input[type='submit'], 
					#dsidx-price,
					#dsidx.dsidx-details .dsidx-contact-form table input[type='button'],
					.property-four-cols .view-details a, 
					.agent-form ul li input[type='submit'], 
					a.view-gmap:link, a.view-gmap:visited,
					#bbp_search_submit, 
					.bbp-submit-wrapper button, 
					#bbp_user_edit_submit, 
					#homeland-loginform .login-submit input[type='submit'],
					#homeland-registerform .login-submit input[type='submit'],
					#homeland-lostpassword .login-submit input[type='submit'],
					.blog-tags li span, 
					.portfolio-tags span, 
					a.live-demo:link, 
					a.live-demo:visited,
					a.slide-more:link, 
					a.slide-more:visited, 
					a.slide-toggle, 
					.blog-timeline .blog-icon,
					.wpdevbk button.btn, 
					.wpdevbk input.btn[type='submit'],
					a.print-now:hover,
					.select2-container--default .select2-selection--single .select2-selection__arrow,
					.homepage-call-to-action a,
					.property-price,
					.theme-menu .sf-menu li.sfHover a, 
					.theme-menu .sf-menu li.sfHover a:after,
					.theme-menu .sfHover ul li.sfHover a.sf-with-ul, 
					.sfHover ul li.sfHover a.sf-with-ul, 
					a.back-home:link, 
					a.back-home:visited,
					#site-offcanvas,
					.share ul li a:hover,
					.mc4wp-form-fields input[type='submit'],
					.advance-search-block input[type='submit']:hover,
					.homeland_widget-property-advance-search input[type='submit'],
					.sticky-post {
						background: ". esc_html( $homeland_theme_color_global ) ." !important; 
					}
					.theme-menu .sfHover ul li.sfHover a.sf-with-ul { color: #FFF !important; }
					.hi-icon, 
					.no-touch .hi-icon-effect-1a .hi-icon:hover, 
					.property-desc h4 a:hover, 
					a.view-property:hover,
					.agent-block label span, 
					.homeland_widget-agents label span, 
					.agent-block h4 a:hover, 
					.feat-desc span.price,
					.sf-menu li.sfHover ul li a:hover, 
					.widget ul li a:hover, 
					.widget ul li:hover:before, 
					.copyright a, 
					.agent-block h4 a:hover, 
					.agent-desc h4 a:hover, 
					.agent-social ul li a:hover, 
					.sidebar .pp-desc a:hover, 
					.services-page-desc h5 a:hover, 
					.agent-about-list .agent-image h4 a:hover, 
					.blog-list-desc h4 a:hover, 
					.blog-action ul li a:hover,
					.comment-details h5 a:hover, 
					.property-desc-slide span, 
					.agent-info label,
					.property-three-cols .property-desc span.price, 
					.property-four-cols .view-details a, 
					.agent-desc label.listed span, 
					.contact-info label, 
					.feat-desc h5 a:hover, 
					.bdesc h5 a:hover,
					#dsidx-listings .dsidx-price, 
					.featured-listing .price, 
					.dsidx-prop-title, 
					a.dsidx-actions-button:hover, 
					#dsidx a:hover, 
					.featured-listing h4 a:hover, 
					div.dsidx-results-widget .dsidx-controls a:hover, 
					.marker-window h5, 
					.sitemap a:hover, 
					.property-page-id span,
					.property-page-type a:hover, 
					.property-page-status a:hover, 
					.countdown-section, 
					.countdown-amount, 
					a.property-print:hover,
					.bbp-breadcrumb a:link, 
					.bbp-breadcrumb a:visited,
					a.bbp-forum-title:hover, 
					a.bbp-topic-permalink:link, 
					a.bbp-topic-permalink:visited, 
					.bbp-topic-title h3 a, 
					.bbp-topic-title-meta a, 
					.bbp-forum-title h3 a,
					.bbp-forum-freshness a:link, 
					.bbp-forum-freshness a:visited, 
					.bbp-topic-freshness a:link, 
					.bbp-topic-freshness a:visited, 
					.bbp-author-name:link, 
					.bbp-author-name:visited,
					#bbp-user-navigation ul li a:hover, 
					a.bbp-forum-title, 
					.contact-info label a, 
					.contact-info-alt a, 
					.contact-alternate-main label,
					.contact-alternate-main label a,
					.slide-bottom-title i, 
					.slide-bottom-actions i, 
					.slide-right i,
					.footer-menu ul li a:hover, 
					.property-amenities a:hover, 
					.blog-timeline-content label a,
					.blog-timeline-content h4 a:hover,
					.print-property-price h3,
					.agent-count,
					a.author-link,
					.theme-menu ul li ul.sub-menu li a:hover,
					.homeland_widget-popular-posts a:hover,
					.blog-text h4 a:hover,
					.agent-list h4 a:hover,
					.agent-list li a:hover { 
						color: ". esc_html( $homeland_theme_color_global ) ." !important; 
					} 
					.page-template-template-homepage2-php .hi-icon, 
					.services-pb-block .hi-icon-effect-1 .hi-icon,
					.property-four-cols .view-details a,
					.featured-flexslider ul li .pimage a i,
					.homeland_widget-get-in-touch ul li a:hover { color: #FFF !important; }
					.hi-icon { 
						border-color: ". esc_html( $homeland_theme_color_global ) ." !important; 
					}
					.advance-search-block.advance-search-block-page, 
					.property-page-price {
						background: ". esc_html( $homeland_rgba_theme_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_top_header_bg_color ) ) :
				$homeland_custom_styles .= "
					header { 
						background: ". esc_html( $homeland_top_header_bg_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_menu_text_color ) ) :
				$homeland_custom_styles .= "
					.theme-menu ul li a { 
						color: ". esc_html( $homeland_menu_text_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_menu_text_color_active ) ) :
				$homeland_custom_styles .= "
					.theme-menu ul li.current_page_item a,
					.theme-menu ul li.current-menu-item a, 
					.theme-menu ul li.current-menu-ancestor a, 
					.theme-menu ul li.current-menu-parent a, 
					.theme-menu ul li a:hover { 
						color: ". esc_html( $homeland_menu_text_color_active ) ." !important; 
					}
					.theme-menu ul li.current-menu-parent ul.sub-menu li a,
					.theme-menu ul li.current-menu-ancestor ul.sub-menu li a { 
						color: #777 !important; 
					}
				";
			endif;

			if( !empty( $homeland_menu_bg_color ) ) :
				$homeland_custom_styles .= "
					.theme-menu ul li.current_page_item a,
					.theme-menu ul li.current-menu-item a, 
					.theme-menu ul li.current-menu-ancestor a, 
					.theme-menu ul li.current-menu-parent a, 
					.theme-menu ul li a:hover,
					.sf-menu li.sfHover a, 
					.sf-menu li.sfHover a:after,
					.sfHover ul li.sfHover a.sf-with-ul { 
						background: ". esc_html( $homeland_menu_bg_color ) ." !important; 
					}
					.theme-menu ul li.current-menu-parent ul.sub-menu li a,
					.theme-menu ul li.current-menu-ancestor ul.sub-menu li a,
					.theme-menu ul li ul.sub-menu li a { color: #777 !important; background: #f2f2f2 !important; }
					.theme-menu ul li.current-menu-parent ul.sub-menu li a:hover,
					.theme-menu ul li.current-menu-ancestor ul.sub-menu li a:hover,
					.theme-menu ul li ul.sub-menu li a:hover {
						color: ". esc_html( $homeland_menu_bg_color ) ." !important;
						background: #FFF !important;
					}
				";
			endif;

			if( !empty( $homeland_header_text_color ) ) :
				$homeland_custom_styles .= "
					.ptitle, 
					.widget h5, 
					.property-list-box h2, 
					.agent-block h3, 
					.featured-block h3, 
					.blog-block h3,
					.services-desc h5, 
					.partners-block h3, 
					.featured-block-two-cols h3 { 
						color: ". esc_html( $homeland_header_text_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_sidebar_text_color ) ) :
				$homeland_custom_styles .= "
					.sidebar .widget h5 { 
						color: ". esc_html( $homeland_sidebar_text_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_button_bg_color ) ) :
				$homeland_custom_styles .= "
					.contact-form input[type='submit'], 
					#respond input[type='submit'],
					.services-block a.more, 
					.services-block-bg a.more, 
					.services-pb-block a.more, 
					.pactions a i, 
					.feat-thumb figcaption a i, 
					.feat-medium figcaption a i, 
					.pimage figcaption a i, 
					a#toTop, 
					.nsu-submit, 
					.advance-search-block input[type='submit'], 
					a.back-home:link, 
					a.back-home:visited, 
					a.continue, 
					.advance-search-widget ul li input[type='submit'], 
					.dsidx-widget.dsidx-search-widget .dsidx-search-button input[type='submit'],
					#dsidx.dsidx-details .dsidx-contact-form table input[type='button'],
					.property-four-cols .view-details a, 
					.agent-form ul li input[type='submit'],
					a.live-demo:link, 
					a.live-demo:visited, 
					.wpcf7-submit,
					a.slide-more:link, 
					a.slide-more:visited, 
					a.view-gmap:link, 
					a.view-gmap:visited,
					a.slide-toggle, 
					span.current, 
					.login-submit input[type='submit'],
					.login-actions a:link, 
					.login-actions a:visited,
					.wpdevbk button.btn, 
					.wpdevbk input.btn[type='submit'],
					.homepage-call-to-action a,
					.mc4wp-form-fields input[type='submit'] { 
						background-color: ". esc_html( $homeland_button_bg_color ) ." !important;
					}
				";
			endif;

			if( !empty( $homeland_button_bg_hover_color ) ) :
				$homeland_custom_styles .= "
					.contact-form input[type='submit']:hover, 
					#respond input[type='submit']:hover,
					.services-block a.more:hover, 
					.services-block-bg a.more:hover, 
					.services-pb-block a.more:hover, 
					.pactions a i:hover, 
					.feat-thumb figcaption a i:hover, 
					.feat-medium figcaption a i:hover, 
					.pimage figcaption a i:hover,
					a#toTop:hover, 
					.nsu-submit:hover, 
					.advance-search-block input[type='submit']:hover, 
					a.back-home:hover, 
					a.continue:hover, 
					.advance-search-widget ul li input[type='submit']:hover, 
					.dsidx-widget.dsidx-search-widget .dsidx-search-button input[type='submit']:hover,
					#dsidx.dsidx-details .dsidx-contact-form table input[type='button']:hover,
					.property-four-cols .view-details a:hover, 
					.agent-form ul li input[type='submit']:hover,
					.marker-window a.view-gmap:hover, 
					#bbp_search_submit:hover, 
					#bbp_reply_submit:hover, 
					.wpcf7-submit:hover, 
					.login-submit input[type='submit']:hover,
					a.live-demo:hover, 
					.page-numbers li a:hover, 
					.alignleft a:hover, 
					.alignright a:hover, 
					.post-link-blog .prev a:hover, 
					.post-link-blog .next a:hover,
					a.slide-more:hover, 
					a.view-gmap:hover, 
					a.slide-toggle:hover,
					.login-actions a:hover, 
					.wpdevbk button.btn:hover, 
					.wpdevbk input.btn[type='submit']:hover,
					.homepage-call-to-action a:hover,
					.mc4wp-form-fields input[type='submit']:hover { 
						background-color: ". esc_html( $homeland_button_bg_hover_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_button_text_color ) ) :
				$homeland_custom_styles .= "
					.contact-form input[type='submit'], 
					#respond input[type='submit'],
					.services-block a.more, 
					.pactions a i, 
					.feat-thumb figcaption a i, 
					.feat-medium figcaption a i, 
					.pimage figcaption a i, 
					a#toTop, 
					a.continue,
					a.live-demo:link, 
					a.live-demo:visited,
					a.slide-more:link, 
					a.slide-more:visited,
					a.view-gmap:link, 
					a.view-gmap:visited,
					.homepage-call-to-action a,
					.mc4wp-form-fields input[type='submit'] { 
						color: ". esc_html( $homeland_button_text_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_bg_color ) ) :
				$homeland_custom_styles .= "
					footer { 
						background-color: ". esc_html( $homeland_footer_bg_color ) ." !important;
					}
				";
			endif;

			if( !empty( $homeland_footer_title_color ) ) :
				$homeland_custom_styles .= "
					.widget-column h5 { 
						color: ". esc_html( $homeland_footer_title_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_text_color ) ) :
				$homeland_custom_styles .= "
					.widget-column,
					.homeland_widget-working-hours ul li,
					.homeland_widget-working-hours ul li span,
					.homeland_widget-contact-info ul li i { 
						color: ". esc_html( $homeland_footer_text_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_link_color ) ) :
				$homeland_custom_styles .= "
					.widget-column a:link,
					.widget-column a:visited,
					footer .widget a:link,
					footer .widget a:visited,
					footer .widget ul li:before,
					.copyright a { 
						color: ". esc_html( $homeland_footer_link_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_footer_link_hover_color ) ) :
				$homeland_custom_styles .= "
					.widget-column a:hover,
					footer .widget ul li a:hover,
					footer .widget ul li:hover:before,
					.copyright a:hover,
					.social ul li a:hover,
					#menu-footer-menu li a:hover { 
						color: ". esc_html( $homeland_footer_link_hover_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_slide_top_bg_color ) ) :
				$homeland_custom_styles .= "
					.sliding-bar, 
					a.slide-toggle { 
						color: #FFF; 
						background-color: ". esc_html( $homeland_slide_top_bg_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_mobile_bg_color ) ) :
				$homeland_custom_styles .= "
					#site-offcanvas { 
						background-color: ". esc_html( $homeland_mobile_bg_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_mobile_hover_color ) ) :
				$homeland_custom_styles .= "
					#site-offcanvas .theme-menu ul li a {
						color: #FFF !important;
					}
					#site-offcanvas ul.sub-menu li a:hover { 
						background: ". esc_html( $homeland_mobile_hover_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_mobile_text_curr_color ) ) :
				$homeland_custom_styles .= "
					#site-offcanvas .theme-menu ul li.current-menu-ancestor > a,
					#site-offcanvas .theme-menu ul li.current-menu-parent > a { 
						color: ". esc_html( $homeland_mobile_text_curr_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_mobile_bg_curr_color ) ) :
				$homeland_custom_styles .= "
					#site-offcanvas .theme-menu ul li.current-menu-ancestor > a,
					#site-offcanvas .theme-menu ul li.current-menu-parent > a { 
						background: ". esc_html( $homeland_mobile_bg_curr_color ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_welcome_overlay ) ) :
				$homeland_custom_styles .= "
					.welcome-block .overlay { 
						background-color: ". esc_html( $homeland_welcome_overlay ) ." !important;
					}
				";
			endif;

			if( !empty( $homeland_services_overlay ) ) :
				$homeland_custom_styles .= "
					.services-block-bg .overlay { 
						background-color: ". esc_html( $homeland_services_overlay ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_testi_overlay ) ) :
				$homeland_custom_styles .= "
					.testimonial-block .overlay { 
						background-color: ". esc_html( $homeland_testi_overlay ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_partners_overlay ) ) :
				$homeland_custom_styles .= "
					.partners-block .overlay { 
						background-color: ". esc_html( $homeland_partners_overlay ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_header_overlay ) ) :
				$homeland_custom_styles .= "
					.header-bg .overlay { 
						background-color: ". esc_html( $homeland_header_overlay ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_static_image_overlay ) ) :
				$homeland_custom_styles .= "
					.homepage-static-image .overlay { 
						background-color: ". esc_html( $homeland_static_image_overlay ) ." !important; 
					}
				";
			endif;

			if( !empty( $homeland_cta_overlay ) ) :
				$homeland_custom_styles .= "
					.homepage-call-to-action .overlay { 
						background-color: ". esc_html( $homeland_cta_overlay ) ." !important; 
					}
				";
			endif;

			// header images
			if( empty( $homeland_hide_header_image ) ) :
				$homeland_default_hdimage_value = 'https://qbootstrap.com/wp/Homeland/wp-content/uploads/2013/12/View-over-the-lake_www.LuxuryWallpapers.net_-1920x300.jpg'; 

				$homeland_default_hdbanner = !empty( $homeland_default_hdimage ) ? $homeland_default_hdimage : esc_url( $homeland_default_hdimage_value );

				if( function_exists( 'is_bbpress' ) ) :
					if( bbp_is_single_forum() ) :
						if( !empty( $homeland_forum_single_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-forum-single { 
									background-image: url('". esc_url( $homeland_forum_single_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( bbp_is_single_topic() ) :
						if( !empty( $homeland_forum_single_topic_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-topic-single { 
									background-image: url('". esc_url( $homeland_forum_single_topic_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( bbp_is_topic_edit() ) :
						if( !empty( $homeland_forum_topic_edit_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-topic-edit { 
									background-image: url('". esc_url( $homeland_forum_topic_edit_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( bbp_is_search() ) :
						if( !empty( $homeland_forum_search_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-forum-search { 
									background-image: url('". esc_url( $homeland_forum_search_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( bbp_is_single_user() ) :
						if(!empty($homeland_user_profile_hdimage)) :
							$homeland_custom_styles .= "
								.page-title-block-user-profile { 
									background-image: url('". esc_url( $homeland_user_profile_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( is_bbpress() ) :
						if( !empty( $homeland_forum_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-forum { 
									background-image: url('". esc_url( $homeland_forum_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					endif;
				endif;

				if( is_archive() ) : 
					if( is_author() ) : 
						if( !empty( $homeland_agent_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-agent { 
									background-image: url('". esc_url( $homeland_agent_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( is_tax() ) : 
						if( !empty( $homeland_taxonomy_hdimage ) ) :
							$homeland_custom_styles .= "
								.page-title-block-taxonomy { 
									background-image: url('". esc_url( $homeland_taxonomy_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					elseif( function_exists( 'is_bbpress' ) ) :
						if( bbp_is_forum_archive() ) :
							if( !empty( $homeland_forum_hdimage ) ) : 
								$homeland_custom_styles .= "
									.page-title-block-forum { 
										background-image: url('". esc_url( $homeland_forum_hdimage ) ."'); 
									}
								";
							else :
								$homeland_custom_styles .= "
									.page-title-block-default { 
										background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
									}
								";
							endif;
						else :
							if( !empty( $homeland_archive_hdimage ) ) :
								$homeland_custom_styles .= "
									.page-title-block-archive { 
										background-image: url('". esc_url( $homeland_archive_hdimage ) ."'); 
									}
								";
							else :
								$homeland_custom_styles .= "
									.page-title-block-default { 
										background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
									}
								";
							endif;
						endif;
					else : 
						if( !empty( $homeland_archive_hdimage ) ) : 
							$homeland_custom_styles .= "
								.page-title-block-archive { 
									background-image: url('". esc_url( $homeland_archive_hdimage ) ."'); 
								}
							";
						else :
							$homeland_custom_styles .= "
								.page-title-block-default { 
									background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
								}
							";
						endif;
					endif;
				elseif( is_search() ) : 
					if( !empty( $homeland_search_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-search { 
								background-image: url('". esc_url( $homeland_search_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_attachment() ) :
					if( !empty( $homeland_attachment_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-attachment { 
								background-image: url('". esc_url( $homeland_attachment_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_404() ) : 
					if( !empty( $homeland_notfound_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-error { 
								background-image: url('". esc_url( $homeland_notfound_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_singular( 'homeland_portfolio' ) ) : 
					if( !empty( $post->homeland_portfolio_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-portfolio { 
								background-image: url('". esc_url( $post->homeland_portfolio_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_singular( 'homeland_properties' ) ) : 
					if( !empty( $post->homeland_property_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-property { 
								background-image: url('". esc_url( $post->homeland_property_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_singular( 'homeland_services' ) ) : 
					if( !empty( $post->homeland_services_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-services { 
								background-image: url('". esc_url( $post->homeland_services_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				elseif( is_singular( 'post' ) ) : 
					if( !empty( $post->homeland_post_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block-blog { 
								background-image: url('". esc_url( $post->homeland_post_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				else :
					if( !empty( $post->homeland_page_hdimage ) ) : 
						$homeland_custom_styles .= "
							.page-title-block { 
								background-image: url('". esc_url( $post->homeland_page_hdimage ) ."'); 
							}
						";
					else :
						$homeland_custom_styles .= "
							.page-title-block-default { 
								background-image: url('". esc_url( $homeland_default_hdbanner ) ."'); 
							}
						";
					endif;
				endif;
			endif;

			wp_add_inline_style( 'homeland-custom-style', $homeland_custom_styles );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_theme_custom_styles' );


	/**
	 * Custom Fonts from Google Web Font
	 */
	if ( ! function_exists( 'homeland_custom_font_family' ) ) :
		function homeland_custom_font_family() {
			$homeland_theme_font = esc_attr( get_option('homeland_theme_font') );
			$homeland_custom_styles = "";

			if( 'Open Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Open Sans";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' );
			elseif( 'Droid Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Droid Sans";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
			elseif( 'Lato' === $homeland_theme_font ) : 
				$homeland_font_name = "Lato";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' );
			elseif( 'Raleway' === $homeland_theme_font ) : 
				$homeland_font_name = "Raleway";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' );
			elseif( 'PT Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "PT Sans";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Noto Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Noto Sans";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' );
			elseif( 'Oxygen' === $homeland_theme_font ) : 
				$homeland_font_name = "Oxygen";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Oxygen:400,300,700&subset=latin,latin-ext' );
			elseif( 'Source Sans Pro' === $homeland_theme_font ) :
				$homeland_font_name = "Source Sans Pro"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic&subset=latin,vietnamese,latin-ext' );
			elseif( 'Muli' === $homeland_theme_font ) : 
				$homeland_font_name = "Muli";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic' );
			elseif( 'Istok Web' === $homeland_theme_font ) : 
				$homeland_font_name = "Istok Web";
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Puritan' === $homeland_theme_font ) :
				$homeland_font_name = "Puritan"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Puritan:400,700,400italic,700italic' );
			elseif( 'Gafata' === $homeland_theme_font ) : 
				$homeland_font_name = "Gafata"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Gafata&subset=latin,latin-ext' );
			elseif( 'Cambo' === $homeland_theme_font ) : 
				$homeland_font_name = "Cambo"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Cambo' );
			elseif( 'Voces' === $homeland_theme_font ) : 
				$homeland_font_name = "Voces"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Voces&subset=latin,latin-ext' );
			elseif( 'Duru Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Duru Sans"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Duru+Sans&subset=latin,latin-ext' );
			elseif( 'Sintony' === $homeland_theme_font ) : 
				$homeland_font_name = "Sintony"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin,latin-ext' );
			elseif( 'Carrois Gothic' === $homeland_theme_font ) : 
				$homeland_font_name = "Carrois Gothic"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Carrois+Gothic' );
			elseif( 'Alegreya Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Alegreya Sans"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Alegreya+Sans:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic&subset=latin,vietnamese,latin-ext' );
			elseif( 'News Cycle' === $homeland_theme_font ) : 
				$homeland_font_name = "News Cycle"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=News+Cycle:400,700&subset=latin,latin-ext' );
			elseif( 'Dosis' === $homeland_theme_font ) : 
				$homeland_font_name = "Dosis"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&subset=latin,latin-ext' );
			elseif( 'Abel' === $homeland_theme_font ) : 
				$homeland_font_name = "Abel"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Abel' );
			elseif( 'Didact Gothic' === $homeland_theme_font ) :
				$homeland_font_name = "Didact Gothic"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,greek-ext,greek,latin-ext,cyrillic,cyrillic-ext' ); 
			elseif( 'Arimo' === $homeland_theme_font ) : 
				$homeland_font_name = "Arimo"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic&subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext' ); 
			elseif( 'Titillium Web' === $homeland_theme_font ) : 
				$homeland_font_name = "Titillium Web"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext' ); 
			elseif( 'Archivo Narrow' === $homeland_theme_font ) : 
				$homeland_font_name = "Archivo Narrow"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic&subset=latin,latin-ext' ); 
			elseif( 'Josefin Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Josefin Sans"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' );
			elseif( 'Asap' === $homeland_theme_font ) : 
				$homeland_font_name = "Asap"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic&subset=latin,latin-ext' );
			elseif( 'Questrial' === $homeland_theme_font ) : 
				$homeland_font_name = "Questrial"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Questrial' );
			elseif( 'Pontano Sans' === $homeland_theme_font ) :
				$homeland_font_name = "Pontano Sans"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' );
			elseif( 'Slabo' === $homeland_theme_font ) : 
				$homeland_font_name = "Slabo"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Slabo+27px&subset=latin,latin-ext' );
			elseif( 'Oswald' === $homeland_theme_font ) : 
				$homeland_font_name = "Oswald"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' );
			elseif( 'Montserrat' === $homeland_theme_font ) : 
				$homeland_font_name = "Montserrat"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
			elseif( 'Ubuntu' === $homeland_theme_font ) : 
				$homeland_font_name = "Ubuntu"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic&subset=latin,cyrillic-ext,greek-ext,greek,latin-ext,cyrillic' );
			elseif( 'Merriweather' === $homeland_theme_font ) : 
				$homeland_font_name = "Merriweather"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext' );
			elseif( 'Cabin' === $homeland_theme_font ) : 
				$homeland_font_name = "Cabin"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' );
			elseif( 'Hind' === $homeland_theme_font ) : 
				$homeland_font_name = "Hind"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700&subset=latin,devanagari,latin-ext' );
			elseif( 'Gudea' === $homeland_theme_font ) : 
				$homeland_font_name = "Gudea"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Gudea:400,700,400italic&subset=latin,latin-ext' );
			elseif( 'Noticia Text' === $homeland_theme_font ) : 
				$homeland_font_name = "Noticia Text"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic&subset=latin,vietnamese,latin-ext' );
			elseif( 'Nobile' === $homeland_theme_font ) : 
				$homeland_font_name = "Nobile"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic' );
			elseif( 'Lora' === $homeland_theme_font ) : 
				$homeland_font_name = "Lora"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin,latin-ext,cyrillic' );
			elseif( 'Inconsolata' === $homeland_theme_font ) :
				$homeland_font_name = "Inconsolata";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext' );
			elseif( 'Quicksand' === $homeland_theme_font ) : 
				$homeland_font_name = "Quicksand";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Quicksand:300,400,700' );
			elseif( 'Karla' === $homeland_theme_font ) : 
				$homeland_font_name = "Karla";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic&subset=latin,latin-ext' );
			elseif( 'Monda' === $homeland_theme_font ) : 
				$homeland_font_name = "Monda";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Monda:400,700&subset=latin,latin-ext' );
			elseif( 'Crimson Text' === $homeland_theme_font ) : 
				$homeland_font_name = "Crimson Text";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Crimson+Text:700italic,600,600italic,400,700,400italic' );
			elseif( 'Exo' === $homeland_theme_font ) : 
				$homeland_font_name = "Exo";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic&subset=latin,latin-ext' );
			elseif( 'EB Garamond' === $homeland_theme_font ) : 
				$homeland_font_name = "EB Garamond";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=EB+Garamond&subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Armata' === $homeland_theme_font ) : 
				$homeland_font_name = "Armata";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Armata&subset=latin,latin-ext' );
			elseif( 'Glegoo' === $homeland_theme_font ) : 
				$homeland_font_name = "Glegoo";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Glegoo:400,700&subset=latin,devanagari,latin-ext' );
			elseif( 'Poppins' === $homeland_theme_font ) : 
				$homeland_font_name = "Poppins";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Poppins:400,700,600,500,300&subset=latin,devanagari,latin-ext' );
			elseif( 'PT Serif' === $homeland_theme_font ) : 
				$homeland_font_name = "PT Serif";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Nixie One' === $homeland_theme_font ) : 
				$homeland_font_name = "Nixie One";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Nixie+One' );
			elseif( 'Fira Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Fira Sans";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Fira+Sans:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Quattrocento Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Quattrocento Sans";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic&subset=latin,latin-ext' );
			elseif( 'Kreon' === $homeland_theme_font ) : 
				$homeland_font_name = "Kreon";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Kreon:400,300,700' );
			elseif( 'Varela Round' === $homeland_theme_font ) : 
				$homeland_font_name = "Varela Round";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Varela+Round' );
			elseif( 'Bitter' === $homeland_theme_font ) : 
				$homeland_font_name = "Bitter";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Bitter:400,400italic,700&subset=latin,latin-ext' );
			elseif( 'Catamaran' === $homeland_theme_font ) : 
				$homeland_font_name = "Catamaran";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Catamaran:400,100,200,300,500,600,700,800,900&subset=latin,tamil,latin-ext' );
			elseif( 'Ruda' === $homeland_theme_font ) : 
				$homeland_font_name = "Ruda";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Ruda:400,700,900&subset=latin,latin-ext' );
			elseif( 'Cambay' === $homeland_theme_font ) : 
				$homeland_font_name = "Cambay";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Cambay:400,400italic,700,700italic&subset=latin,latin-ext,devanagari' );
			elseif( 'Rajdhani' === $homeland_theme_font ) :
				$homeland_font_name = "Rajdhani";   
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Rajdhani:400,300,500,600,700&subset=latin,latin-ext,devanagari' );
			elseif( 'Comfortaa' === $homeland_theme_font ) : 
				$homeland_font_name = "Comfortaa";   
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Comfortaa:400,300,700&subset=latin,greek,cyrillic-ext,latin-ext,cyrillic' );
			elseif( 'Poiret One' === $homeland_theme_font ) : 
				$homeland_font_name = "Poiret One";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' );
			elseif( 'Work Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Work Sans";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Work+Sans:400,100,300,200,500,600,700,800,900&subset=latin,latin-ext' );
			elseif( 'Actor' === $homeland_theme_font ) : 
				$homeland_font_name = "Actor";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Actor' );
			elseif( 'Rambla' === $homeland_theme_font ) : 
				$homeland_font_name = "Rambla";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Rambla:400,400italic,700,700italic&subset=latin,latin-ext' );
			elseif( 'Khula' === $homeland_theme_font ) : 
				$homeland_font_name = "Khula";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Khula:400,600,700,800,300&subset=latin,devanagari,latin-ext' );
			elseif( 'Share' === $homeland_theme_font ) : 
				$homeland_font_name = "Share";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Share:400,400italic,700,700italic&subset=latin,latin-ext' );
			elseif( 'Carme' === $homeland_theme_font ) : 
				$homeland_font_name = "Carme";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Carme' );
			elseif( 'Rubik' === $homeland_theme_font ) : 
				$homeland_font_name = "Rubik";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,hebrew,latin-ext' );
			elseif( 'Gentium Basic' === $homeland_theme_font ) : 
				$homeland_font_name = "Gentium Basic";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Gentium+Basic:400,400i,700,700i&amp;subset=latin-ext' );
			elseif( 'Sanchez' === $homeland_theme_font ) : 
				$homeland_font_name = "Sanchez";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Sanchez:400,400i&amp;subset=latin-ext' );
			elseif( 'Hind Madurai' === $homeland_theme_font ) : 
				$homeland_font_name = "Hind Madurai";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Hind+Madurai:300,400,500,600,700&amp;subset=latin-ext,tamil' );
			elseif( 'Jaldi' === $homeland_theme_font ) : 
				$homeland_font_name = "Jaldi";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Jaldi:400,700&amp;subset=devanagari,latin-ext' );
			elseif( 'Yantramanav' === $homeland_theme_font ) : 
				$homeland_font_name = "Yantramanav";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900' );
			elseif( 'Telex' === $homeland_theme_font ) : 
				$homeland_font_name = "Telex";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Telex' );
			elseif( 'Nunito Sans' === $homeland_theme_font ) : 
				$homeland_font_name = "Nunito Sans";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' );
			elseif( 'Padauk' === $homeland_theme_font ) : 
				$homeland_font_name = "Padauk";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Padauk:400,700' );
			elseif( 'Mako' === $homeland_theme_font ) : 
				$homeland_font_name = "Mako";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Mako' );
			elseif( 'Libre Franklin' === $homeland_theme_font ) : 
				$homeland_font_name = "Libre Franklin";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Libre+Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext' );
			elseif( 'Vollkorn' === $homeland_theme_font ) : 
				$homeland_font_name = "Vollkorn";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Vollkorn:400,400i,700,700i' );
			elseif( 'Arvo' === $homeland_theme_font ) : 
				$homeland_font_name = "Arvo";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i' );
			elseif( 'Old Standard TT' === $homeland_theme_font ) : 
				$homeland_font_name = "Old Standard TT";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Old+Standard+TT:400,400i,700&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese' );
			elseif( 'Chivo' === $homeland_theme_font ) : 
				$homeland_font_name = "Chivo";  
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Chivo:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext' );
			elseif( 'Domine' === $homeland_theme_font ) : 
				$homeland_font_name = "Domine"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Domine:400,700&amp;subset=latin-ext' );
			else :
				$homeland_font_name = "Roboto"; 
				$homeland_font_link = esc_url( 'https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' );
			endif;

			$homeland_custom_styles .= "
				body, h1, h2, h3, h4, h5, h6, 
				input, textarea, select, 
				.widget_revslider .tp-caption { 
					font-family: ". esc_html( $homeland_font_name ) .", sans-serif !important; 
				}
			";

			wp_add_inline_style( 'homeland-custom-style', $homeland_custom_styles );
			wp_enqueue_style( 'homeland-custom-font', $homeland_font_link );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_custom_font_family' );
?>