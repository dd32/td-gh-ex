<?php /* Sidebar Template */ ?>

<?php
if (is_page_template('page-templates/left-sidebar.php')) {
    $avocation_offset = "";
  
} else {
    $avocation_offset = "col-md-offset-1";
   
}
?>			 	 

<div class="col-md-3 col-sm-4 <?php echo $avocation_offset; ?> main-sidebar">
    <?php
    if (is_active_sidebar('sidebar-1')) {
        dynamic_sidebar('sidebar-1');
    }
    ?>

</div>

