<?php
/**
* The default sidebar template for our theme.
* This template is used to display the sidebar on pages.
*
* @package Swell
* @since Swell 1.0
*
*/
?>

<?php if ( is_active_sidebar( 'default-sidebar' ) ) { ?>

	<div class="sidebar">
		<?php dynamic_sidebar( 'default-sidebar' ); ?>
	</div>

<?php } ?>