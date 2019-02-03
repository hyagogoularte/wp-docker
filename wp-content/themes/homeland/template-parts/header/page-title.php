<?php 
	$homeland_forum_header = get_option( 'homeland_forum_header' );
	$homeland_forum_subtitle = get_option( 'homeland_forum_subtitle' );
?>

<div class="post-col-12">
	<?php
		if( is_post_type_archive( 'homeland_properties' ) || is_post_type_archive( 'homeland_portfolio' ) || is_post_type_archive( 'homeland_services' ) ) : 
			echo '<h2 class="ptitle">'. post_type_archive_title( '', false ) .'</h2>'; 
		elseif( is_archive() ) : 
			echo '<h2 class="ptitle">';
				if( is_category() ) : 
					single_cat_title();
				elseif( is_tag() ) : 
					printf( esc_html_e( 'Posts Tagged: ', 'homeland' ), single_tag_title() ); 
				elseif( is_day() ) : 
					printf( esc_html__( 'Daily Archives: %s', 'homeland' ), get_the_date()); 
				elseif( is_month() ) : 
					printf( esc_html__( 'Monthly Archives: %s', 'homeland' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'homeland' ) ) ); 
				elseif( is_year() ) : 
					printf( esc_html__( 'Yearly Archives: %s', 'homeland' ), get_the_date( _x( 'Y', 'yearly archives date format', 'homeland' ) ) ); 
				elseif( is_tax() ) : 
					echo get_queried_object()->name;
				elseif( is_author() ) : 
					echo homeland_option( 'homeland_agent_profile_header', esc_html__( 'Agent Profile', 'homeland' ) );
				elseif( function_exists( 'is_bbpress' ) ) :
					if ( bbp_is_forum_archive() ) :
						if( !empty( $homeland_forum_header ) ) : 
							echo esc_html( $homeland_forum_header );
						else : 
							the_title(); 
						endif; 
					endif;
				endif;
			echo '</h2>';

			if( is_author() ) : ?>
				<h4 class="subtitle"><label><?php echo homeland_option( 'homeland_agent_profile_subtitle', esc_html__( 'This is your agent subtitle here', 'homeland' ) );?></label></h4><?php
			elseif( is_category() ) : 
				$homeland_category_id = get_query_var('cat'); 
				$homeland_category_data = get_option( "category_$homeland_category_id" ); 
				
				if( !empty( $homeland_category_data[ 'homeland_subtitle' ] ) ) : ?>
					<h4 class="subtitle"><label><?php echo esc_html( $homeland_category_data[ 'homeland_subtitle' ] ); ?></label></h4><?php
				endif;
			elseif( is_tax() ) : 
				$homeland_term = $wp_query->queried_object;
				$homeland_category_data = get_option( "category_$homeland_term->term_id" ); 
				
				if( !empty( $homeland_category_data[ 'homeland_subtitle' ] ) ) : ?>
					<h4 class="subtitle"><label><?php echo esc_html( $homeland_category_data[ 'homeland_subtitle' ] ); ?></label></h4><?php
				endif;
			elseif( function_exists( 'is_bbpress' ) ) :	
				if ( bbp_is_forum_archive() ) :
					if( !empty( $homeland_forum_subtitle ) ) : ?>
						<h4 class="subtitle"><label><?php echo esc_html( $homeland_forum_subtitle ); ?></label></h4><?php
					endif;	
				endif;	
			endif; 

		elseif( is_search() ) : ?>
			<h2 class="ptitle"><?php echo homeland_option( 'homeland_search_header', esc_html__( 'Search Results', 'homeland' ) ); ?></h2>
			<h4 class="subtitle"><label><?php echo homeland_option( 'homeland_search_subtitle', esc_html__( 'This is your search subtitle description', 'homeland' ) ); ?></label></h4><?php
		elseif ( is_singular( 'homeland_services' ) ) : 
			the_title( '<h2 class="ptitle">', '</h2>' );
		elseif ( is_singular( 'homeland_properties' ) ) : 
			the_title( '<h2 class="ptitle">', '</h2>' );
			if( !empty( $post->homeland_address ) ) : ?>
				<h4 class="subtitle"><label><i class="fas fa-map-marker-alt"></i><?php echo esc_html( $post->homeland_address ); ?></label></h4><?php
			endif;
		elseif( is_singular( 'homeland_portfolio' )) : 
			the_title( '<h2 class="ptitle">', '</h2>' );
		elseif( is_single() || is_home() ) : 
			if( function_exists( 'is_bbpress' ) ) :
				if( bbp_is_single_forum() || bbp_is_single_topic() || bbp_is_topic_edit() ) : 
					the_title( '<h2 class="ptitle">', '</h2>' ); 
				else : 
					the_title( '<h2 class="ptitle">', '</h2>' );
				endif;
			else : 
				the_title( '<h2 class="ptitle">', '</h2>' );
			endif;
		elseif ( is_404() ) :	?>
			<h2 class="ptitle"><?php echo homeland_option( 'homeland_not_found_header', esc_html__( '404 Page', 'homeland' ) ); ?></h2>
			<h4 class="subtitle"><label><?php echo homeland_option( 'homeland_not_found_subtitle', esc_html__( 'This is your 404 not found subtitle here', 'homeland' ) ); ?></label></h4><?php
		else :
			if( !empty( $post->homeland_ptitle ) ) : ?>
				<h2 class="ptitle"><?php echo esc_html( $post->homeland_ptitle ); ?></h2><?php
			else : 
				the_title( '<h2 class="ptitle">', '</h2>' ); 
			endif; 

			if( !empty( $post->homeland_subtitle ) ) : ?>
				<h4 class="subtitle"><label><?php echo wp_kses_post ( $post->homeland_subtitle ); ?></label></h4><?php
			endif;
		endif;	
	?>
</div>