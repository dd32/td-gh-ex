<?php
/** Sponsor Sidebar 1 */
function chip_life_sponsor_sidebar1_init() {
	
	if( is_active_sidebar( 'sponsor-sidebar1' ) ):
	?>

	<div id="sponsor-sidebar1">
      <div id="sponsor-sidebar1-data">    
        <?php dynamic_sidebar( 'sponsor-sidebar1' ); ?>
      </div> <!-- end #sponsor-sidebar1-data -->
    </div> <!-- end #sponsor-sidebar1 -->	

<?php    
	endif;
}

/** Sponsor Sidebar 2 */
function chip_life_sponsor_sidebar2_init() {
	
	if( is_active_sidebar( 'sponsor-sidebar2' ) ):
	?>
    
    <div id="sponsor-sidebar2">
      <div id="sponsor-sidebar2-data">    
        <?php dynamic_sidebar( 'sponsor-sidebar2' ); ?>
      </div> <!-- end #sponsor-sidebar2-data -->
    </div> <!-- end #sponsor-sidebar2 -->

<?php
	endif;
}
?>