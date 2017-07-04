<?php

// check if available
if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}

?>

<div class="sidebar-right-wrap">
	<aside class="sidebar-right">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</aside>
</div>