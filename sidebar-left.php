<?php
/*
 * The left sidebar for displaying widgets.
 */
?>

<?php if ( is_active_sidebar( 'primary' ) ) {?>
	<div id="sidebar-left">
		<?php dynamic_sidebar( 'primary' ); ?>
	</div>
<?php } ?>