<?php

// check if available
if ( ashe_options( 'main_nav_show_sidebar' ) === false ) {
	return;
}

?>

<div class="sidebar-alt-wrap">
	<div class="sidebar-alt-close image-overlay"></div>
	<aside class="sidebar-alt">

		<div class="sidebar-alt-close-btn">
			<span></span>
			<span></span>
		</div>

		<?php

		if ( ashe_is_preview() ) {
			ashe_preview_alt_sidebar();
		} else {
			dynamic_sidebar( 'sidebar-alt' );
		}

		?>
		
	</aside>
</div>