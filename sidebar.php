<?php
$chip_life_layout = get_chip_life_layout();
if( $chip_life_layout != 'content' ):
do_action( 'chip_life_sidebar_before' );
?>
<div id="sidebar">
  <div id="sidebar-data">    
    <?php do_action( 'chip_life_sidebar' ); ?>       
  </div> <!-- end #sidebar-data --> 
</div> <!-- end #sidebar -->
<?php 
do_action( 'chip_life_sidebar_after' );
endif;
?>