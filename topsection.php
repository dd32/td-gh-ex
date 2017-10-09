<?php
/**
 * The Custom background.
 *
 *
 * @package Adagio Lite
 */
?>

<div id="headerbg">
  	<?php if ( has_header_image() ) { ?>
  		<div id="headerimage" class="animated fadeIn" style="background-image: url(<?php header_image(); ?>);"></div>
  	<?php } ?>
  	<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
  		<div id="topwidget" class="animated fadeIn">
    		<?php dynamic_sidebar( 'sidebar-2' ); ?>
  		</div>
  <?php endif ?>
</div>
