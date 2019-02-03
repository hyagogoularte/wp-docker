<?php
	/**
	 * The template for displaying comments
	 *
	 * This is the template that displays the area of the page that contains both the current comments
	 * and the comment form.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package WordPress
	 * @subpackage Homeland
	 * @since 1.0
	 */

	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() ) :
		return;
	endif;
?>

<!-- Comments Area -->
<div class="comments" id="comments">
	<?php if ( have_comments() ) : ?>
		<h3>
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) :
					/* translators: %s: post title */
					printf( _x( 'One Comment', 'comments title', 'homeland' ), get_the_title() );
				else :
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Comment',
							'%1$s Comments',
							$comments_number,
							'comments title',
							'homeland'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				endif;
			?>
		</h3>
		<ul class="comment-list">
	 		<?php 
	 			$args = array (
	 				'type' => 'all', 
	 				'callback' => 'homeland_theme_comment',
	 				'short_ping'  => true,
	 				'reply_text'  => esc_html__( 'Reply', 'homeland' ),
	 			);
				wp_list_comments( $args ); 		
	 		?>
	 	</ul>

	 	<div class="pagination comments-paging clearfix">
	 		<?php 
	 			paginate_comments_links( array(
	 				'prev_text' => esc_html__( '&laquo;', 'homeland' ),
	    		'next_text' => esc_html__( '&raquo;', 'homeland' ),
	 				'type' => 'list'
	 			)); 
	 		?> 
	 	</div>
	
	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed', 'homeland' ); ?></p>
	<?php endif; ?>


	<!-- Comment Form -->
	<?php 
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields = array(
			'author' => '<p><input type="text" id="author" placeholder="'. esc_html__( 'Name', 'homeland' ) .'" name="author" ' . $aria_req . ' value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" /></p>',
			'email' => '<p><input type="text" id="email" placeholder="'. esc_html__( 'Email Address', 'homeland' ) .'" name="email" ' . $aria_req . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" tabindex="2" /></p>',
			'URL' => '<p><input type="text" id="url" placeholder="' . esc_html__( 'Website', 'homeland' ) . '" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" tabindex="3" /></p>'
		);

		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'submit',
			'name_submit'       => 'submit',
			'title_reply'       => esc_html__( 'Leave a Comment', 'homeland' ),
			'title_reply_to'    => esc_html__( 'Leave a Comment to %s', 'homeland' ),
			'cancel_reply_link' => esc_html__( 'Cancel Reply', 'homeland' ),
			'label_submit'      => esc_html__( 'Post a Message', 'homeland' ),
			'format'            => 'xhtml',
			'comment_field' => '<p><textarea id="comment" placeholder="'. esc_html__( 'Message', 'homeland' ) .'" name="comment" ' . $aria_req . ' tabindex="4" rows="0" cols="0"></textarea></p>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields),
		);

		comment_form($args); 
	?>
</div>