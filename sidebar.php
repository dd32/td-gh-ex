<?php /* Sidebar Template */ ?>

<?php
if (is_page_template('page-templates/left-sidebar.php')) {
    $offset = "";
  
} else {
    $offset = "col-md-offset-1";
   
}
?>			 	 

<div class="col-md-3 col-sm-4 <?php echo $offset; ?> main-sidebar">
    <?php
    if (is_active_sidebar('sidebar-1')) {
        dynamic_sidebar('sidebar-1');
    }
    ?>

</div>

