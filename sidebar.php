<?php
/*
 * Main Sidebar File.
 */
?>
<div class="col-md-3 col-sm-4 <?php if(!is_page_template('page-templates/left-sidebar.php')){ echo "col-md-offset-1"; } ?>">	
 <div class="sidebar a1-sidebar">
   <?php if ( is_active_sidebar( 'sidebar-1' ) ) : dynamic_sidebar( 'sidebar-1' ); endif; ?>
 </div> 
</div>