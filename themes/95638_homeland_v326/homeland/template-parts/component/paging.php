<?php 
	$homeland_page_nav = get_option( 'homeland_pnav' );
	
	if( 'Next Previous Link' === $homeland_page_nav ) : 
		homeland_next_previous();
	else : 
		homeland_pagination(); 
	endif; 
?>