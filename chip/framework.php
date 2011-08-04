<?php
/** Chip Life Skeleton */
add_action( 'chip_life', 'chip_life_init' );
function chip_life_init() {
	get_header();	
	do_action( 'chip_life_stage_before' );
	?>
    <div id="stage">
      <div id="stage-data">
      
        <?php do_action( 'chip_life_content_before' ); ?>
        <div id="content">
          <div id="content-data">
            <?php do_action( 'chip_life_content' ); ?>
          <div class="clear"></div>
          </div> <!-- end #content-data --> 
        </div> <!-- end #content -->
	    <?php 
		do_action( 'chip_life_content_after' );
		get_sidebar();
		?>        	  
      
      <div class="clear"></div>
      </div> <!-- end #stage-data -->  
    </div> <!-- end #stage --> 
    <?php
	do_action( 'chip_life_stage_after' );	
	get_footer();
}
?>