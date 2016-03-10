<?php 
// This Function Check whether Sidebar active or Not
if(!function_exists( 'corpbiz_post_layout_class' )) :

function corpbiz_post_layout_class(){
	if(is_active_sidebar('sidebar-primary'))
		{ echo 'col-md-8'; } 
	else 
		{ echo 'col-md-12'; }  
 
} endif;


// this functions accepts one parameters for image class
if(!function_exists( 'corpbiz_image_thumbnail')) : 					
		function corpbiz_image_thumbnail($preset,$class){
		if(has_post_thumbnail()){  $defalt_arg =array('class' => $class);
					the_post_thumbnail($preset, $defalt_arg); } } endif;
		
// this functions accepts one parameters for image class
		if(!function_exists( 'corpbiz_image_thumbnail')) : 					
		function corpbiz_image_thumbnail($preset,$class){
		if(has_post_thumbnail()){  $defalt_arg =array('class' => $class);
					the_post_thumbnail($preset, $defalt_arg); } } endif; 
 
?>