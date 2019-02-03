<div class="property-info-agent post-bottom clearfix">
	<?php if ( !empty( $post->homeland_area ) ) : ?>
		<span><i class="fas fa-expand"></i><strong><?php esc_html_e( 'Lot Area:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_area ) . "&nbsp;" . esc_html( $post->homeland_area_unit ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_floor_area ) ) : ?>
		<span><i class="fas fa-expand-arrows-alt"></i><strong><?php esc_html_e( 'Floor Area:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_floor_area ) . "&nbsp;" . esc_html( $post->homeland_floor_area_unit ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_room ) ) : ?>
		<span><i class="fas fa-home"></i><strong><?php esc_html_e( 'Rooms:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_room ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_bedroom ) ) : ?>
		<span><i class="fas fa-bed"></i><strong><?php esc_html_e( 'Bedrooms:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_bedroom ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_bathroom ) ) : ?>
		<span><i class="fas fa-bath"></i><strong><?php esc_html_e( 'Bathrooms:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_bathroom ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_garage ) ) : ?>
		<span><i class="fas fa-car"></i><strong><?php esc_html_e( 'Garage:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_garage ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_year_built ) ) : ?>
		<span><i class="far fa-calendar-alt"></i><strong><?php esc_html_e( 'Year Built:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_year_built ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_stories ) ) : ?>
		<span><i class="far fa-building"></i><strong><?php esc_html_e( 'Stories:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_stories ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_basement ) ) : ?>
		<span><i class="fas fa-cubes"></i><strong><?php esc_html_e( 'Basement:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_basement ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_structure_type ) ) : ?>
		<span><i class="fas fa-sitemap"></i><strong><?php esc_html_e( 'Structure Type:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_structure_type ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_roofing ) ) : ?>
		<span><i class="fas fa-sort-up"></i><strong><?php esc_html_e( 'Roofing:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_roofing ); ?></span>
	<?php endif; ?>

	<?php if( !empty( $post->homeland_zip ) ) : ?>
		<span><i class="fas fa-map-marker-alt"></i><strong><?php esc_html_e( 'Zip Code:', 'homeland' ); ?></strong> <?php echo esc_html( $post->homeland_zip ); ?></span>
	<?php endif; ?>
</div>