<?php 
	$homeland_disable_preloader = get_option( 'homeland_disable_preloader' );
?>
<?php if( empty( $homeland_disable_preloader ) ) : ?>
	<div id="preloader"><div id="status">&nbsp;</div></div>
<?php endif; ?>