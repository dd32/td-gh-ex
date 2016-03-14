<?php $becorp_options=becorp_theme_default_data(); 
$current_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
if ($current_options['front_page_enabled']=="1" && is_front_page()) {
	
	get_template_part('index');

 }   
		else { 		 get_header(); 
 /*==== end header ====*/
  get_template_part('index','slider');
 
 get_template_part('index','collout');	  
	  	  
/*==== Services Section ====*/
 get_template_part('index','service'); 

/*==== Project & Portfolio Section ====*/
 get_template_part('index','portfolio');
	 
/*==== Blog ====*/		
 
  get_template_part('index','blog');
 
/*==== Footer ====*/
 get_footer();  } ?>
</div> <!-- /main-wrapper -->
