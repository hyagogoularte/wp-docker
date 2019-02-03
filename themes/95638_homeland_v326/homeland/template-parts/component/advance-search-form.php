<?php
		global $homeland_advance_search_page_url;

		$homeland_currency = get_option( 'homeland_property_currency' ); 
		$homeland_property_currency_sign = get_option( 'homeland_property_currency_sign' ); 
		$homeland_hide_city = get_option( 'homeland_hide_city' );
		$homeland_hide_city_empty = get_option( 'homeland_hide_city_empty' );
		$homeland_hide_pid = get_option( 'homeland_hide_pid' );
		$homeland_hide_status = get_option( 'homeland_hide_status' );
		$homeland_hide_status_empty = get_option( 'homeland_hide_status_empty' );
		$homeland_hide_property_type = get_option( 'homeland_hide_property_type' );
		$homeland_hide_property_type_empty = get_option( 'homeland_hide_property_type_empty' );
		$homeland_hide_bed = get_option( 'homeland_hide_bed' );
		$homeland_hide_bath = get_option( 'homeland_hide_bath' );
		$homeland_hide_min_price = get_option( 'homeland_hide_min_price' );
		$homeland_hide_max_price = get_option( 'homeland_hide_max_price' );
		$homeland_property_city_order = get_option( 'homeland_property_city_order' );
		$homeland_property_city_orderby = get_option( 'homeland_property_city_orderby' );
		$homeland_property_status_order = get_option( 'homeland_property_status_order' );
		$homeland_property_status_orderby = get_option( 'homeland_property_status_orderby' );
		$homeland_property_type_order = get_option('homeland_property_type_order' );
		$homeland_property_type_orderby = get_option( 'homeland_property_type_orderby' );
		$homeland_price_format = get_option( 'homeland_price_format' );
		$homeland_property_decimal = get_option( 'homeland_property_decimal' );

		$homeland_property_decimal = !empty( $homeland_property_decimal ) ? $homeland_property_decimal : 0;
		$homeland_prefix = "-- ";
		$homeland_search_term = '';
		$homeland_property_currency_after = "";
		$homeland_property_currency_before = ""; 
?>

<div class="clearfix">
	<form action="<?php echo esc_url( $homeland_advance_search_page_url ); ?>" method="get" id="advance-search-form" class="advance-search-form">
		<?php 
			// property id
			if( empty( $homeland_hide_pid ) ) : 
				$homeland_search_term = ( isset( $_GET['pid'] ) ) ? $_GET['pid'] : ''; ?>
				<div class="post-col-3 post-bottom-20px">
					<input type="text" name="pid" class="property-id" value="<?php echo esc_html( $homeland_search_term ); ?>" placeholder="<?php echo homeland_option( 'homeland_pid_label', esc_html__( 'Property ID', 'homeland' ) ); ?>">
				</div><?php
			endif;

			// property city 
			if( empty( $homeland_hide_city ) ) : 
				$homeland_search_term = ( isset( $_GET['city'] ) ) ? $_GET['city'] : '';
				$homeland_empty_city_value = ( !empty( $homeland_hide_city_empty ) ) ? '1' : '0';
				?>
				<div class="post-col-3 post-bottom-20px">
					<select name="city">
						<option value=""><?php echo homeland_option( 'homeland_city_label', esc_html__( 'City', 'homeland' ) ); ?></option>
						<?php
							$args = array(
								'hide_empty' => $homeland_empty_city_value, 
								'hierarchical' => 0, 
								'parent' => 0, 
								'orderby' => $homeland_property_city_orderby, 
								'order' => $homeland_property_city_order
						  );
						  $homeland_terms = get_terms( 'homeland_property_location', $args );

						  foreach( $homeland_terms as $homeland_pcity ) : 
								$homeland_pcity_slug = $homeland_pcity->slug;
								$homeland_pcity_name = $homeland_pcity->name;
								$homeland_pcity_term_id = $homeland_pcity->term_id;

								$homeland_search_term_class = ( $homeland_search_term == $homeland_pcity_slug ) ? 'selected=selected' : '';

								echo "<option value='". esc_html( $homeland_pcity_slug ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_pcity_name ) ."</option>";

								$args_child = array( 
									'hide_empty' => $homeland_empty_city_value, 
									'hierarchical' => 0, 
									'parent' => $homeland_pcity_term_id,
									'orderby' => $homeland_property_city_orderby, 
									'order' => $homeland_property_city_order
								);
								$homeland_terms_child = get_terms( 'homeland_property_location', $args_child );

								foreach( $homeland_terms_child as $homeland_pcity_child ) : 
									$homeland_pcity_child_slug = $homeland_pcity_child->slug;
									$homeland_pcity_child_name = $homeland_pcity_child->name;

									$homeland_search_term_child_class = ( $homeland_search_term == $homeland_pcity_child_slug ) ? 'selected=selected' : '';

									echo "<option value='". esc_html( $homeland_pcity_child_slug ) ."'". esc_html( $homeland_search_term_child_class ) .">". $homeland_prefix . esc_html( $homeland_pcity_child_name ) ."</option>";	
								endforeach;
							endforeach;
						?>
					</select>
				</div><?php
			endif;

			// property type 
			if( empty( $homeland_hide_property_type ) ) :
				$homeland_search_term = isset($_GET['type']) ? $_GET['type'] : '';
				$homeland_empty_type_value = !empty( $homeland_hide_property_type_empty ) ? '1' : '0'; ?>

				<div class="post-col-3 post-bottom-20px">
					<select name="type">
						<option value=""><?php echo homeland_option( 'homeland_property_type_label', esc_html__( 'Type', 'homeland' ) ); ?></option>
						<?php
							$args = array(
								'hide_empty' => $homeland_empty_type_value, 
								'hierarchical' => 0, 
								'parent' => 0, 
								'orderby' => $homeland_property_type_orderby, 
								'order' => $homeland_property_type_order
						  );
						  $homeland_terms = get_terms( 'homeland_property_type', $args );

						  foreach ($homeland_terms as $homeland_ptype) : 
								$homeland_ptype_slug = $homeland_ptype->slug;
								$homeland_ptype_name = $homeland_ptype->name;
								$homeland_ptype_term_id = $homeland_ptype->term_id;

								$homeland_search_term_class = ( $homeland_search_term == $homeland_ptype_slug ) ? 'selected=selected' : '';

								echo "<option value='". esc_html( $homeland_ptype_slug ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_ptype_name ) ."</option>";

								$args_child = array( 
									'hide_empty' => $homeland_empty_type_value, 
									'hierarchical' => 1, 
									'parent' => $homeland_ptype_term_id,
									'orderby' => $homeland_property_type_orderby, 
									'order' => $homeland_property_type_order
								);
								$homeland_terms_child = get_terms( 'homeland_property_type', $args_child );

								foreach ($homeland_terms_child as $homeland_ptype_child) : 
									$homeland_ptype_child_slug = $homeland_ptype_child->slug;
									$homeland_ptype_child_name = $homeland_ptype_child->name;

									$homeland_search_term_child_class = $homeland_search_term == $homeland_ptype_child_slug ? 'selected=selected' : '';

									echo "<option value='". esc_html( $homeland_ptype_child_slug ) ."'". esc_html( $homeland_search_term_child_class ) .">". $homeland_prefix . esc_html( $homeland_ptype_child_name ) ."</option>";	
								endforeach;
							endforeach;
						?>
					</select>
				</div><?php
			endif;

			// property status 
			if( empty( $homeland_hide_status ) ) :
				$homeland_search_term = isset($_GET['status']) ? $_GET['status'] : '';
				$homeland_empty_status_value = !empty( $homeland_hide_property_status_empty ) ? '1' : '0'; ?>

				<div class="post-col-3 post-bottom-20px">
					<select name="status">
						<option value=""><?php echo homeland_option( 'homeland_status_label', esc_html__( 'Status', 'homeland' ) ); ?></option>
						<?php
							$args = array(
								'hide_empty' => $homeland_empty_status_value, 
								'hierarchical' => 0, 
								'parent' => 0, 
								'orderby' => $homeland_property_status_orderby, 
								'order' => $homeland_property_status_order
						  );
						  $homeland_terms = get_terms( 'homeland_property_status', $args );

						  foreach ($homeland_terms as $homeland_pstatus) : 
								$homeland_pstatus_slug = $homeland_pstatus->slug;
								$homeland_pstatus_name = $homeland_pstatus->name;
								$homeland_pstatus_term_id = $homeland_pstatus->term_id;

								$homeland_search_term_class = $homeland_search_term == $homeland_pstatus_slug ? 'selected=selected' : '';

								echo "<option value='". esc_html( $homeland_pstatus_slug ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_pstatus_name ) ."</option>";

								$args_child = array( 
									'hide_empty' => $homeland_empty_status_value, 
									'hierarchical' => 0, 
									'parent' => $homeland_pstatus_term_id,
									'orderby' => $homeland_property_status_orderby, 
									'order' => $homeland_property_status_order
								);
								$homeland_terms_child = get_terms( 'homeland_property_status', $args_child );

								foreach ($homeland_terms_child as $homeland_pstatus_child) : 
									$homeland_pstatus_child_slug = $homeland_pstatus_child->slug;
									$homeland_pstatus_child_name = $homeland_pstatus_child->name;

									$homeland_search_term_child_class = $homeland_search_term == $homeland_pstatus_child_slug ? 'selected=selected' : '';

									echo "<option value='". esc_html( $homeland_pstatus_child_slug ) ."'". esc_html( $homeland_search_term_child_class ) .">". $homeland_prefix . esc_html( $homeland_pstatus_child_name ) ."</option>";	
								endforeach;
							endforeach;
						?>
					</select>
				</div><?php
			endif;

			// property bedrooms 
			if( empty( $homeland_hide_bed ) ) : 
				$homeland_search_term = isset($_GET['bed']) ? $_GET['bed'] : '';
				$homeland_bed_number = get_option( 'homeland_bed_number' );
				$homeland_array = explode( ", ", esc_html( $homeland_bed_number ) ); ?>

				<div class="post-col-3 post-bottom-20px">
					<select name="bed">
						<option value=""><?php echo homeland_option( 'homeland_bed_label', esc_html__( 'Bedrooms', 'homeland' ) ); ?></option>
						<?php
							foreach($homeland_array as $homeland_number_option) : 
								$homeland_search_term_class = $homeland_search_term == $homeland_number_option ? 'selected=selected' : '';

								if( !empty( $homeland_bed_number ) ) :
									echo "<option value='". esc_html( $homeland_number_option ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_number_option ) ."</option>";
								endif;
							endforeach;
						?>
					</select>
				</div><?php
			endif;

			// property bathrooms 
			if( empty( $homeland_hide_bath ) ) : 
				$homeland_search_term = isset($_GET['bath']) ? $_GET['bath'] : '';
				$homeland_bath_number = get_option( 'homeland_bath_number' );
				$homeland_array = explode( ", ", esc_html( $homeland_bath_number ) ); ?>

				<div class="post-col-3 post-bottom-20px">
					<select name="bath">
						<option value=""><?php echo homeland_option( 'homeland_bath_label', esc_html__( 'Bathrooms', 'homeland' ) ); ?></option>
						<?php
							foreach( $homeland_array as $homeland_number_option ) : 
								$homeland_search_term_class = $homeland_search_term == $homeland_number_option ? 'selected=selected' : '';

								if( !empty( $homeland_bath_number ) ) :
									echo "<option value='". esc_html( $homeland_number_option ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_number_option ) ."</option>";
								endif;
							endforeach;
						?>
					</select>
				</div><?php
			endif;

			// minimum price
			if( empty( $homeland_hide_min_price ) ) : 
				$homeland_search_term = isset($_GET['min-price']) ? $_GET['min-price'] : '';
				$homeland_min_price_value = get_option( 'homeland_min_price_value' );
				$homeland_array = explode( ", ", esc_html( $homeland_min_price_value ) ); ?>

				<div class="post-col-2 post-bottom-20px">
					<select name="min-price" class="min-price">
						<option value=""><?php echo homeland_option( 'homeland_min_price_label', esc_html__( 'Minimum Price', 'homeland' ) ); ?></option>
						<?php
							foreach( $homeland_array as $homeland_number_option ) : 
								if( 'After' === $homeland_property_currency_sign ) : 
									$homeland_property_currency_after = $homeland_currency; 
								else : 
									$homeland_property_currency_before = $homeland_currency; 
								endif;

								if( 'Dot' === $homeland_price_format ) :
									$homeland_price_format_result = number_format ( $homeland_number_option, $homeland_property_decimal, ".", "." );
								elseif( 'Comma' === $homeland_price_format ) : 
									$homeland_price_format_result = number_format ( $homeland_number_option, $homeland_property_decimal );
								elseif( 'Brazil' === $homeland_price_format || 'Europe' === $homeland_price_format ) :
									$homeland_price_format_result = number_format( $homeland_number_option, $homeland_property_decimal, ",", "." );
								else : 
									$homeland_price_format_result = $homeland_number_option;
								endif;

								$homeland_search_term_class = $homeland_search_term == $homeland_number_option ? 'selected=selected' : '';

								if( !empty( $homeland_min_price_value ) ) :
									echo "<option value='". esc_html( $homeland_number_option ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_property_currency_before ) . esc_html( $homeland_price_format_result ) . esc_html( $homeland_property_currency_after ) ."</option>";
								endif;
							endforeach;
						?>
					</select>
				</div><?php
			endif;	

			// maximum price
			if( empty( $homeland_hide_max_price ) ) : 
				$homeland_search_term = isset($_GET['max-price']) ? $_GET['max-price'] : '';
				$homeland_max_price_value = get_option( 'homeland_max_price_value' );
				$homeland_array = explode( ", ", esc_html( $homeland_max_price_value ) ); ?>

				<div class="post-col-2 post-bottom-20px">
					<select name="max-price" class="max-price">
						<option value=""><?php echo homeland_option( 'homeland_max_price_label', esc_html__( 'Minimum Price', 'homeland' ) ); ?></option>
						<?php
							foreach( $homeland_array as $homeland_number_option ) : 
								if( 'After' === $homeland_property_currency_sign ) : 
									$homeland_property_currency_after = $homeland_currency; 
								else : 
									$homeland_property_currency_before = $homeland_currency; 
								endif;

								if( 'Dot' === $homeland_price_format ) :
									$homeland_price_format_result = number_format ( $homeland_number_option, $homeland_property_decimal, ".", "." );
								elseif( 'Comma' === $homeland_price_format ) : 
									$homeland_price_format_result = number_format ( $homeland_number_option, $homeland_property_decimal );
								elseif( 'Brazil' === $homeland_price_format || 'Europe' === $homeland_price_format ) :
									$homeland_price_format_result = number_format( $homeland_number_option, $homeland_property_decimal, ",", "." );
								else : 
									$homeland_price_format_result = $homeland_number_option;
								endif;

								$homeland_search_term_class = $homeland_search_term == $homeland_number_option ? 'selected=selected' : '';

								if( !empty( $homeland_max_price_value ) ) :
									echo "<option value='". esc_html( $homeland_number_option ) ."'". esc_html( $homeland_search_term_class ) .">". esc_html( $homeland_property_currency_before ) . esc_html( $homeland_price_format_result ) . esc_html( $homeland_property_currency_after ) ."</option>";
								endif;
							endforeach;
						?>
					</select>
				</div><?php
			endif; 
		?>

		<div class="post-col-2 post-bottom-20px">
			<input type="submit" value="<?php echo homeland_option( 'homeland_search_button_label', esc_html__( 'Search', 'homeland' ) ); ?>">
		</div>
		<!-- <input type="hidden" name="lang" value="<?php //echo(ICL_LANGUAGE_CODE); ?>"/> -->
	</form>
</div>