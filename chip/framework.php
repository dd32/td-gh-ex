<?php
/** Chip Life Skeleton */
add_action( 'chip_life', 'chip_life_init' );
function chip_life_init() {
	get_header();	
	do_action( 'chip_life_stage_before' );
	?>
    <div id="stage">
      <div id="stage-data">      
        
        <div id="content-wrap">          
          
          <?php do_action( 'chip_life_content_wrap_before' ); ?>
          
          <div id="content">
            <div id="content-data">
			  <?php do_action( 'chip_life_content_before' ); ?>
			  <?php do_action( 'chip_life_content' ); ?>
              <?php do_action( 'chip_life_content_after' ); ?>              
            <div class="clear"></div>
            </div> <!-- end #content-data --> 
          </div> <!-- end #content -->	              
          
          <?php do_action( 'chip_life_content_wrap_after' ); ?>
          
        </div> <!-- end #content-wrap -->
		
		<?php get_sidebar(); ?>        	  
      
      <div class="clear"></div>
      </div> <!-- end #stage-data -->  
    </div> <!-- end #stage --> 
    <?php
	do_action( 'chip_life_stage_after' );	
	get_footer();
}
?>