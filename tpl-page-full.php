<?php
/*
Template Name: Full Width
*/

get_header();

?>
<!-- Begin Content -->
<div id="content">
  <div id="contentdata">    
	
	<!-- Begin Content (Left) -->
    <div id="contentleftfull">
      <div id="contentleftfulldata">    
        
		<?php
        if ( ! have_posts() ):	
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-notfound.php' ), true, false );		
		else:		
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'page-content-full.php' ), true, false );		
		endif;		
		?>
        
           
      </div>
    </div>
    <!-- End Content (Left) -->    
    
    <br class="clear" />    
  </div>  
</div>
<!-- End Content -->
<?php get_footer(); ?>