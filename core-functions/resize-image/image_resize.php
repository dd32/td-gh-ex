<?php
 if ( function_exists( 'add_image_size' ) ) 
 { 
	add_image_size('home_slide',1600,550,true);	
	
	//Blog Images
	add_image_size('blog1_section_img',740,400,true);
	add_image_size('home-blog-thumb',199,128,true);	
	add_image_size('blog_sidbar_image_recent',60,60,true);
	add_image_size('portfolio-thumb',550,370,true);
	add_image_size('port-3-col-thumb',360,240,true);
	add_image_size('port-4-col-thumb',263,175,true);
	//testimonial
	add_image_size('becorp-testimonial',80,80,true);

}
// code for home slider post types 
add_filter( 'intermediate_image_sizes', 'becorp_image_presets');

function becorp_image_presets($sizes){
   $type = get_post_type($_REQUEST['post_id']);	
    foreach($sizes as $key => $value){
    	if($type=='becorp_slider'  &&  $value != 'home_slide' )
		 {  unset($sizes[$key]); }
		  else if($type=='post' &&  $value != 'home-blog-thumb' && $value !='blog1_section_img' && $value != 'blog_sidbar_image_recent')
		 { unset($sizes[$key]); }
		 else if($type=='becorp_portfolio'  &&  $value != 'portfolio-thumb' && $value!= 'port-3-col-thumb' && $value= 'port-4-col-thumb' )
		 { unset($sizes[$key]); }
		
    }
    return $sizes;
	 
}
?>