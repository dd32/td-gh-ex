<?php

// get layout
$ashe_sid = ashe_page_layout();

// check if available
if ( ! is_active_sidebar( 'sidebar-right' ) || ( strpos( $ashe_sid, 'rsidebar' ) === false && strpos( $ashe_sid, 'lrsidebar' ) === false ) ) {
	return;
}

?>

<div class="sidebar-right-wrap">
	<aside class="sidebar-right">
		<?php dynamic_sidebar( 'sidebar-right' ); ?>
	</aside>
</div>