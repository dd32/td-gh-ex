<?php
// Template Name: Home-page

 get_header();
 
 /*==== end header ====*/
  get_template_part('index','slider');
  
/*==== Services Section ====*/
 get_template_part('index','service'); 

/*==== Project & Portfolio Section ====*/
 get_template_part('index','portfolio');
	 
/*==== Blog ====*/		
 
 get_template_part('index','blog');
 
/*==== Footer ====*/
 get_footer();  ?>
</div> <!-- /main-wrapper -->
