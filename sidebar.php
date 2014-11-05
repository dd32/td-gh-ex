<?php
/*
 * The sidebar for displaying widgets in footer.
 */
?>

<?php if ( is_active_sidebar( 'footer-right' ) || is_active_sidebar( 'footer-left' ) ) { ?>
<div id="sidebar">

	<div class="footer-right"> 
		<?php dynamic_sidebar( 'footer-right' ); ?>
	</div>

	<div class="footer-left"> 
		<?php dynamic_sidebar( 'footer-left' ); ?>
	</div>

</div>
<?php } ?>
