<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */
?>
<div id="primary-sidebar" class="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'primary-sidebar' ); ?>
	<?php else : ?>
	<?php
	/*
	* This content shows up if there are no widgets defined in the backend.
	*/
	?>
	<div class="no-widgets">
		<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
	</div>
	<?php endif; ?>
</div>
