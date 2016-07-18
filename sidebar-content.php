<?php
	if ( ! is_active_sidebar( 'sidebar-6' ) )
		return;
?>
	<div id="footer-widgets" class="footer-content">
	<?php
		if ( is_active_sidebar( 'sidebar-6' ) ) :
			echo '<div class="footer-widget">';
			dynamic_sidebar( 'sidebar-6' );
			echo '</div> <!-- end .content-header -->';
		endif;
	?>
	</div> <!-- #footer-widgets -->
