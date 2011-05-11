<?php get_header(); ?>
<!-- Begin Content -->
<div id="content">
  <div id="contentdata">    
	
	<!-- Begin Content (Left) -->
    <div id="contentleft">
      <div id="contentleftdata">    
        
		<div class="chipboxm1 chipstyle3 margin10b">
          <div class="chipboxm1data"><h2 class="blue margin0">Category Archives: <?php echo single_cat_title( '', false ); ?></h2></div>
        </div>
		
		<?php
        locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-loop.php' ), true, false );
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'pager.php' ), true, false );
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