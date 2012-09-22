<!-- The Sidebar, obviously -->

<div id="sidebar" >
	<?php if ( is_active_sidebar( 'sidebar_widgets' ) ) : ?>
		<div id="sidebar-widgets-wrap">
			<?php dynamic_sidebar( 'sidebar_widgets' ); ?>
		</div>
	<?php endif; ?>
	<div class="clear"><!-- --></div>
</div>