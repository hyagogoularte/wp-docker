<?php 
	global $homeland_print_page_url;
	$homeland_property_type = get_the_term_list( $post->ID, 'homeland_property_type', ' ', ', ', '' ); 
	$homeland_property_status = get_the_term_list( $post->ID, 'homeland_property_status', ' ', ', ', '');
?>
<div class="property-page-info clearfix">
	<?php
		if( !empty( $post->homeland_property_id ) ) : ?>
			<div class="property-page-id">
				<?php esc_html_e( 'Property ID : ', 'homeland' ); ?>
				<span><?php echo esc_html( $post->homeland_property_id ); ?></span>
			</div><?php
		endif;
		if( !empty( $homeland_property_type ) ) : ?>
			<div class="property-page-type"><?php echo wp_kses_post( $homeland_property_type ); ?></div><?php
		endif;		
		if( !empty( $post->homeland_property_sold ) ) : ?>
			<div class="property-page-status property-sold">
				<span><?php esc_html_e( 'Sold', 'homeland' ); ?></span>
			</div><?php
		else :
			if( !empty( $homeland_property_status ) ) : ?>
				<div class="property-page-status">
					<span><?php echo wp_kses_post( $homeland_property_status ); ?></span>
				</div><?php
			endif; 
		endif;
	?>	
	<div class="print-property inquiry-icon">
		<a href="#agent-form" title="<?php esc_html_e( 'Inquiry', 'homeland' ); ?>"><i class="far fa-question-circle"></i></a>
		<a href="<?php echo esc_url( $homeland_print_page_url ); ?>?printid=<?php echo esc_html( $post->ID ); ?>" title="<?php esc_html_e( 'Print', 'homeland' ); ?>" target="_blank"><i class="fas fa-print"></i></a>
	</div>
</div>