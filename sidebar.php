<?php
/**
 * Sidebar template
 *
 * @package Bexley
 */

?>
<div class="col-sidebar">
<?php
	do_action( 'before_sidebar' );
	dynamic_sidebar( 'sidebar-1' );
?>
</div>
