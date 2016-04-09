<?php
 if ( function_exists( 'add_image_size' ) ) 
 { 	
	//Blog Images
	add_image_size('becorp-home-blog-thumb',199,128,true);

}
// code for home slider post types 
add_filter( 'intermediate_image_sizes', 'becorp_image_presets');

function becorp_image_presets($sizes){
   $type = get_post_type($_REQUEST['post_id']);	
    foreach($sizes as $key => $value){
		   if($type=='post' &&  $value != 'becorp-home-blog-thumb')
		 { unset($sizes[$key]); }
    }
    return $sizes;
	 
}
?>