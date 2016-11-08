<?php
/**
 * The template for dispalying the sidebar.
 *
 * @package WordPress
 * @subpackage asterion
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div class="col-md-4 mz-sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>