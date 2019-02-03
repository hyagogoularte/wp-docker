<?php
	$homeland_filter_order = get_option( 'homeland_filter_order' );
	$homeland_filter_sort = get_option( 'homeland_filter_default' );
	$homeland_filter_link = home_url( add_query_arg( array(), $wp->request ) );
?>

<div class="row clearfix">
	<div class="post-col-5 filter-sort-order">
		<form action="<?php echo esc_url( $homeland_filter_link ); ?>" method="get" class="form-sorting-order">
			<div class="row clearfix">
				<?php 
					if( is_page_template( 'templates/template-property-search.php' ) ) : 
						if( isset( $_GET['pid'] ) != "" ) : ?>
							<input type="hidden" name="pid" value="<?php echo esc_html( $_GET['pid'] ); ?>"><?php
						endif;
						if( isset( $_GET['city'] ) != "" ) : ?>
							<input type="hidden" name="city" value="<?php echo esc_html( $_GET['city'] ); ?>"><?php
						endif;
						if( isset( $_GET['status'] ) != "" ) : ?>
							<input type="hidden" name="status" value="<?php echo esc_html( $_GET['status'] ); ?>"><?php
						endif;
						if( isset( $_GET['type'] ) != "" ) : ?>
							<input type="hidden" name="type" value="<?php echo esc_html( $_GET['type'] ); ?>"><?php
						endif;
						if( isset( $_GET['bed'] ) != "" ) : ?>
							<input type="hidden" name="bed" value="<?php echo esc_html( $_GET['bed'] ); ?>"><?php
						endif;
						if( isset( $_GET['bath'] ) != "") : ?>
							<input type="hidden" name="bath" value="<?php echo esc_html( $_GET['bath'] ); ?>"><?php
						endif;
						if( isset( $_GET['min-price'] ) != "") : ?>
							<input type="hidden" name="min-price" value="<?php echo esc_html( $_GET['min-price'] ); ?>"><?php
						endif;
						if( isset( $_GET['max-price'] ) != "") : ?>
							<input type="hidden" name="max-price" value="<?php echo esc_html( $_GET['max-price'] ); ?>"><?php
						endif;
					endif;
				?>
				<div class="post-col-6">
				 	<select name="order" id="input_order">
			      <?php
			      	$homeland_array = array( 
								'DESC' => esc_html__( 'Descending', 'homeland' ),
								'ASC' => esc_html__( 'Ascending', 'homeland' )
							);

							foreach( $homeland_array as $homeland_order_option_value => $homeland_order_option ) : 
								if( !empty( isset( $_GET['order'] ) ) ) :
									$homeland_filter_property_order = ( $_GET['order'] == $homeland_order_option_value ) ? 'selected=selected' : '';
								else :
									$homeland_filter_property_order = ( $homeland_filter_order == $homeland_order_option_value ) ? 'selected=selected' : '';
								endif; ?> 
									<option value="<?php echo esc_html( $homeland_order_option_value ); ?>" <?php echo esc_html( $homeland_filter_property_order ); ?>><?php echo esc_html( $homeland_order_option ); ?></option><?php
	            endforeach;
						?>		
			    </select>
				</div>
		    <div class="post-col-6">
			    <select name="sortby" id="input_sort">
						<?php
							$homeland_array = array( 
								'date' => esc_html__( 'Date', 'homeland' ), 
								'title' => esc_html__( 'Name', 'homeland' ), 
								'price' => esc_html__( 'Price', 'homeland' ), 
								'rand' => esc_html__( 'Random', 'homeland' ), 
							);
							
							foreach ( $homeland_array as $homeland_sort_option_value => $homeland_sort_option ) : 
								if ( !empty( isset( $_GET['sortby'] ) ) ) :
									$homeland_filter_property_sort = ( $_GET['sortby'] == $homeland_sort_option_value ) ? 'selected=selected' : '';
								else :
									$homeland_filter_property_sort = ( $homeland_filter_sort == $homeland_sort_option_value ) ? 'selected=selected' : '';
								endif; ?>
									<option value="<?php echo esc_html( $homeland_sort_option_value ); ?>" <?php echo esc_html( $homeland_filter_property_sort ); ?>><?php echo esc_html( $homeland_sort_option ); ?></option><?php
	            endforeach;
						?>		
					</select> 
				</div>
			</div>   
	   </form>	
	</div>
</div>