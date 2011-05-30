<?php get_header(); ?>
<!-- Begin Content -->
<div id="content">
  <div id="contentdata">    
	
	<!-- Begin Content (Left) -->
    <div id="contentleft">
      <div id="contentleftdata">    
        
		<?php
        if ( ! have_posts() ):	
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-notfound.php' ), true, false );		
		else:		
			locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-single.php' ), true, false );		
		endif;		
		?>
           
      </div>
    </div>
    <!-- End Content (Left) -->
    
    <!-- Begin Sidebar -->
	<?php get_sidebar(); ?>
    <!-- End Sidebar -->    
    
    <br class="clear" />    
  </div>  
</div>
<!-- End Content -->
<?php get_footer(); ?>