<?php 
	$homeland_portfolio_category = get_the_term_list( $post->ID, 'homeland_portfolio_category', ' ', ', ', '' );
	$homeland_portfolio_tag = get_the_term_list( $post->ID, 'homeland_portfolio_tag', ' ', ' ', '' );
?>
<div class="portfolio-list-desc">
	<div class="row post-bottom clearfix">
		<div class="post-col-9">
			<?php the_title( '<h4>', '</h4>' ); ?>
			<span class="portfolio-category">
				<?php echo wp_kses_post( $homeland_portfolio_category ); ?>
			</span>
		</div>
		<div class="post-col-3">
			<?php if( !empty( $post->homeland_website ) ) : ?>
				<a href="<?php echo esc_url( $post->homeland_website ); ?>" class="live-demo" target="_blank"><i class="fas fa-external-link-square-alt"></i><?php esc_html_e( 'Live Demo', 'homeland' ); ?></a>
			<?php endif; ?>
		</div>
	</div>

	<?php
		the_content(); 
		
		if( !empty( $homeland_portfolio_tag ) ) : ?>
			<label class="portfolio-tags">
				<span><?php esc_html_e( 'Tags', 'homeland' ); ?></span>
				<?php echo wp_kses_post( $homeland_portfolio_tag ); ?>
			</label><?php
		endif;
	?>
</div>