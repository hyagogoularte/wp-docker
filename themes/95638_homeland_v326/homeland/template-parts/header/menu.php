<nav class="clearfix">
	<?php
		wp_nav_menu( array( 
			'theme_location' => 'primary-menu', 
			'fallback_cb' => 'homeland_menu_fallback', 
			'container_class' => 'theme-menu', 
			'container_id' => 'dropdown', 
			'menu_id' => 'main-menu', 
			'menu_class' => 'sf-menu' 
		) );
	?>
</nav>	