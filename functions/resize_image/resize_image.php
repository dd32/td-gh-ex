<?php //wp_die();
 if ( function_exists( 'add_image_size' ) ) { 

	
	 //normal post type 
	 add_image_size('recent-blog-thumb',80,80,false);
	 
	 //slider post type
	 //add_image_size('index-slider-thumb',366,155,false);
	

	 
	
}


//code for normal post types
add_filter( 'intermediate_image_sizes', 'busiprof_size');
function busiprof_size($sizes){

//wp_die();
  if(isset($_REQUEST['post_id'])){
    $type = get_post_type($_REQUEST['post_id']);
	}
    foreach($sizes as $key => $value){
        if($type=='post' && $value!='recent-blog-thumb'){
            unset($sizes[$key]);
        }
		else if($type=='page'  &&  $value != 'page-image'){
            unset($sizes[$key]);
        }
	
	
    }
    return $sizes;
}
?>