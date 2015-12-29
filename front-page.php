<?php $becorp_options=theme_default_data(); 
$current_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
if ($current_options['front_page_enabled']=="1" && is_front_page()) {
	
		 get_header(); 
 /*==== end header ====*/
  get_template_part('index','slider');
 
 get_template_part('index','collout');	  
	  	  
/*==== Services Section ====*/
 get_template_part('index','service'); 

/*==== Project & Portfolio Section ====*/
 get_template_part('index','portfolio');
	 
/*==== Blog ====*/		
 
  get_template_part('index','blog');
    
/*==== Client Section ====*/
  get_template_part('client','slide');
 
/*==== Footer ====*/
 get_footer(); 
 }  else {
		if(is_page())
		{ get_template_part('page'); } 
		else { get_template_part('index'); } }?>
</div> <!-- /main-wrapper -->
