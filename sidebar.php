<?php
$chip_life_layout = get_chip_life_layout();
if( $chip_life_layout != 'content' ):
?>
<div id="sidebar">
  <div id="sidebar-data">    
    <?php do_action( 'chip_life_sidebar_before' ); ?>
	<?php do_action( 'chip_life_sidebar' ); ?>
    <?php do_action( 'chip_life_sidebar_after' ); ?>       
  </div> <!-- end #sidebar-data --> 
</div> <!-- end #sidebar -->
<?php 
endif;
?>