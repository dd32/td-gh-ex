<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.0
 */

?>
<div class="container">
	<div class="widget-area row">
		<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
		<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
		<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	</div>
</div>