<?php

// get layout
$ashe_sid = ashe_page_layout();

// check if available
if ( ! is_active_sidebar( 'sidebar-left' ) || ( strpos( $ashe_sid, 'lsidebar' ) === false && strpos( $ashe_sid, 'lrsidebar' ) === false ) ) {
	return;
} 

?>

<div class="sidebar-left-wrap">
	<aside class="sidebar-left">
		<?php dynamic_sidebar( 'sidebar-left' ); ?>
	</aside>
</div>