<div class="cat-toogles post-bottom">
	<ul class="cat-list clearfix">
		<?php
			$args = array( 
				'taxonomy' => 'homeland_portfolio_category', 
				'style' => 'list', 
				'title_li' => '', 
				'hierarchical' => false, 
				'order' => 'ASC', 
				'orderby' => 'title' 
			);
			wp_list_categories ( $args );
		?>	
	</ul>
</div>