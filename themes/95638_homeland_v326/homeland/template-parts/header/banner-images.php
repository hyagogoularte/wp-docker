<?php
	$homeland_agent_hdimage = get_option( 'homeland_agent_hdimage' );
	$homeland_attachment_hdimage = get_option( 'homeland_attachment_hdimage' );
	$homeland_taxonomy_hdimage = get_option( 'homeland_taxonomy_hdimage' );
	$homeland_forum_hdimage = get_option( 'homeland_forum_hdimage' );
	$homeland_archive_hdimage = get_option( 'homeland_archive_hdimage' );
	$homeland_search_hdimage = get_option( 'homeland_search_hdimage' );
	$homeland_notfound_hdimage = get_option( 'homeland_notfound_hdimage' );
	$homeland_forum_single_hdimage = get_option( 'homeland_forum_single_hdimage' );
	$homeland_forum_single_topic_hdimage = get_option( 'homeland_forum_single_topic_hdimage' );
	$homeland_forum_topic_edit_hdimage = get_option( 'homeland_forum_topic_edit_hdimage' );
	$homeland_forum_search_hdimage = get_option( 'homeland_forum_search_hdimage' );
	$homeland_user_profile_hdimage = get_option( 'homeland_user_profile_hdimage' );
	$homeland_header_overlay = get_option( 'homeland_header_overlay' );
	$homeland_hide_ptitle_stitle = get_option( 'homeland_hide_ptitle_stitle' );

	// agent
	$homeland_title_block_agent = ( !empty( $homeland_agent_hdimage ) ) ? 'page-title-block-agent' : 'page-title-block-default';

	// Attachment
	$homeland_title_block_attachment = !empty( $homeland_attachment_hdimage ) ? 'page-title-block-attachment' : 'page-title-block-default';

	// Taxonomy
	$homeland_title_block_taxonomy = !empty( $homeland_taxonomy_hdimage ) ? 'page-title-block-taxonomy' : 'page-title-block-default';

	// Forum
	$homeland_title_block_forum = !empty( $homeland_forum_hdimage ) ? 'page-title-block-forum' : 'page-title-block-default';

	// Archive
	$homeland_title_block_archive = !empty( $homeland_archive_hdimage ) ? 'page-title-block-archive' : 'page-title-block-default';

	// Search
	$homeland_title_block_search = !empty( $homeland_search_hdimage ) ? 'page-title-block-search' : 'page-title-block-default';

	// 404
	$homeland_title_block_notfound = !empty( $homeland_notfound_hdimage ) ? 'page-title-block-error' : 'page-title-block-default';

	// page
	$homeland_title_block = !empty( $post->homeland_page_hdimage ) ? 'page-title-block' : 'page-title-block-default';

	// post
	$homeland_title_block_blog = !empty( $post->homeland_post_hdimage ) ? 'page-title-block-blog' : 'page-title-block-default';

	// portfolio 
	$homeland_title_block_portfolio = !empty( $post->homeland_portfolio_hdimage ) ? 'page-title-block-portfolio' : 'page-title-block-default';

	// property 
	$homeland_title_block_property = !empty( $post->homeland_property_hdimage ) ? 'page-title-block-property' : 'page-title-block-default';

	// services 
	$homeland_title_block_services = !empty( $post->homeland_services_hdimage ) ? 'page-title-block-services' : 'page-title-block-default';

	// Forum Single
	$homeland_title_block_forum_single = !empty( $homeland_forum_single_hdimage ) ? 'page-title-block-forum-single' : 'page-title-block-default';

	// Forum Single Topic
	$homeland_title_block_forum_single_topic = !empty( $homeland_forum_single_topic_hdimage ) ? 'page-title-block-topic-single' : 'page-title-block-default';

	// Forum Topic Edit
	$homeland_title_block_forum_topic_edit = !empty( $homeland_forum_topic_edit_hdimage ) ? 'page-title-block-topic-edit' : 'page-title-block-default';

	// Forum Search
	$homeland_title_block_forum_search = !empty( $homeland_forum_search_hdimage ) ? 'page-title-block-forum-search' : 'page-title-block-default';

	// Forum Single User
	$homeland_title_block_forum_single_user = !empty( $homeland_user_profile_hdimage ) ? 'page-title-block-user-profile' : 'page-title-block-default';
	
	if( is_page_template( 'templates/template-homepage.php' ) || is_page_template( 'templates/template-homepage2.php' ) || is_page_template( 'templates/template-homepage3.php' ) || is_page_template( 'templates/template-homepage4.php' ) || is_page_template( 'templates/template-homepage-video.php' ) || is_page_template( 'templates/template-homepage-revslider.php' ) || is_page_template( 'templates/template-homepage-gmap.php' ) || is_page_template( 'templates/template-homepage-gmap-large.php' ) || is_page_template( 'templates/template-page-builder.php' ) ) :  
	else :
		if( is_archive() ) :
			if( is_author() ) : 
				$homeland_header_image_class = esc_html( $homeland_title_block_agent );
			elseif( is_tax() ) : 
				$homeland_header_image_class = esc_html( $homeland_title_block_taxonomy );
			elseif( function_exists( 'is_bbpress' ) ) :
				$homeland_header_image_class = ( bbp_is_forum_archive() ) ? $homeland_title_block_forum : $homeland_title_block_archive ;
			else : 
				$homeland_header_image_class = esc_html( $homeland_title_block_archive );
			endif;
		elseif( is_search() ) : 
			$homeland_header_image_class = esc_html( $homeland_title_block_search );
		elseif( is_attachment() ) : 
			$homeland_header_image_class = esc_html( $homeland_title_block_attachment );
		elseif( is_404() ) : 
			$homeland_header_image_class = esc_html( $homeland_title_block_notfound );
		elseif( is_page_template( 'templates/template-contact.php' ) ) : 
			$homeland_header_image_class = esc_html( $homeland_title_block );
		elseif( is_singular( 'homeland_portfolio' ) ) :
			$homeland_header_image_class = esc_html( $homeland_title_block_portfolio );
		elseif( is_singular( 'homeland_properties' ) ) :
			$homeland_header_image_class = esc_html( $homeland_title_block_property );
		elseif( is_singular( 'homeland_services' ) ) :
			$homeland_header_image_class = esc_html( $homeland_title_block_services );
		elseif( is_singular( 'post' ) ) :
			$homeland_header_image_class = esc_html( $homeland_title_block_blog );
		else : 
			if( function_exists( 'is_bbpress' ) ) :
				if( bbp_is_single_forum() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum_single );
				elseif( bbp_is_single_topic() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum_single_topic );
				elseif( bbp_is_topic_edit() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum_topic_edit );
				elseif( bbp_is_search() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum_search );
				elseif( bbp_is_single_user() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum_single_user );
				elseif( is_bbpress() ) : 
					$homeland_header_image_class = esc_html( $homeland_title_block_forum );
				else : 
					$homeland_header_image_class = esc_html( $homeland_title_block );
				endif;
			else : 
				$homeland_header_image_class = esc_html( $homeland_title_block );
			endif;
		endif; 
		?>
		<section class="<?php echo esc_attr( $homeland_header_image_class ); ?> header-bg" data-paroller-factor="0.3">
			<?php if( !empty( $homeland_header_overlay ) ) : ?>
				<div class="overlay">&nbsp;</div>
			<?php endif; ?>
			<div class="inside">
				<?php 
					if( empty( $homeland_hide_ptitle_stitle ) ) : 
						get_template_part( 'template-parts/header/page-title' );
					endif; 
				?>
			</div>
		</section><?php 
	endif; 
?>