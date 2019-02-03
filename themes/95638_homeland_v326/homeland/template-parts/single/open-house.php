<div class="open-house-list textcenter post-bottom">
	<?php 
		if( !empty ( $post->homeland_property_open_house ) ) : 
			if( !empty( $post->homeland_property_oh_one ) ) : ?>
				<h2><?php esc_html_e( 'Open House', 'homeland' ); ?></h2>
				<div class="open-house-sched">
					<h3><?php echo esc_html( $post->homeland_property_oh_one ); ?></h3>
				</div><?php 
			endif; 

			if( !empty( $post->homeland_property_oh_two ) ) : ?>
				<div class="open-house-sched">
					<h3><?php echo esc_html( $post->homeland_property_oh_two ); ?></h3>
				</div><?php 
			endif; 

			if( !empty( $post->homeland_property_oh_three ) ) : ?>
				<div class="open-house-sched">
					<h3><?php echo esc_html( $post->homeland_property_oh_three ); ?></h3>
				</div><?php 
			endif; 

			if( !empty( $post->homeland_property_oh_four ) ) : ?>
				<div class="open-house-sched">
					<h3><?php echo esc_html( $post->homeland_property_oh_four ); ?></h3>
				</div><?php 
			endif; 

			if( !empty( $post->homeland_property_oh_five ) ) : ?>
				<div class="open-house-sched">
					<h3><?php echo esc_html( $post->homeland_property_oh_five ); ?></h3>
				</div><?php 
			endif; 
		endif;
	?>
</div>