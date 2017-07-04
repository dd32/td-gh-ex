<?php

// check if available
if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
} 

?>

<div class="sidebar-left-wrap">
	<aside class="sidebar-left">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</aside>
</div>