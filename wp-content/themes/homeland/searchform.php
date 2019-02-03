<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="searchform">
	<input type="text" id="<?php echo esc_attr( $unique_id ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e( 'Type and Hit Enter', 'homeland' ); ?>" />
	<span><i class="fas fa-search"></i></span>
</form>