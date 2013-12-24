<?php
/**
* @Theme Name	:	rambo
* @file         :	resize_image.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/ 
	//Blog Images
	add_image_size('blog1_section_img',270,260,true);
	add_image_size('blog2_section_img',770,300,true);
	// code for home slider post types 
add_filter( 'intermediate_image_sizes', 'rambo_image_presets');

function rambo_image_presets($sizes){
   $type = get_post_type($_REQUEST['post_id']);	
    foreach($sizes as $key => $value){
    	
		 if($type=='post'  && $value != 'blog1_section_img' && $value != 'blog2_section_img')
		 {    unset($sizes[$key]);      }
    }
    return $sizes;
	 
}
?>