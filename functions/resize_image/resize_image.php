<?php
 if ( function_exists( 'add_image_size' ) ) { 

	//for service custom post type
	/* add_image_size( 'service-about-thumb',260, 160,false );
	add_image_size( 'service-one-thumb', 245, 240,false );
	add_image_size( 'service-two-thumb', 150, 150,false ); */
	
	 //add_image_size('service-home-thumb',270,157,false);
       //add_image_size( 'service-about-thumb',260, 152,false );
       //add_image_size( 'service-one-thumb', 150, 87,false );
       //add_image_size( 'service-two-thumb', 150, 87,false );
	//for product post type
	 //add_image_size('product-home-image',232,236,false);
	 //add_image_size('product-widget-thumb',67,39,false);
	 //normal post type 
	 add_image_size('blog-left-thumb',150,87,false);
	 add_image_size('blog-widget-thumb',67,39,false);
	 
	 //slider post type
	 add_image_size('index-slider-thumb',366,155,false);
	 //post tyepe our team 
	 //add_image_size('aboutus-team-thumb',180,180,false);
	 //post type page
	 add_image_size('page-image',1170,800,false);
	 
	
}
// code for services post types 
/* add_filter( 'intermediate_image_sizes', function($sizes)
{
   // $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='spa_services'  &&  $value != 'service-home-thumb'  &&  $value != 'service-two-thumb' &&  $value != 'service-one-thumb'&&  $value != 'service-about-thumb' ){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
});

//code for slider post types
add_filter( 'intermediate_image_sizes', function($sizes){
    $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='spa_slider' && $value != 'index-slider-thumb' ){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
});

//code for products 
add_filter( 'intermediate_image_sizes', function($sizes){


  
    $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='spa_products'  &&    $value != 'product-home-image' && $value != 'product-widget-thumb' ){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
}); */

//code for normal post types
add_filter( 'intermediate_image_sizes', function($sizes){


  
    $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='post'  && $value != 'blog-left-thumb' && $value != 'blog-widget-thumb'  ){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
});
//code for about us  team images 
/* add_filter( 'intermediate_image_sizes', function($sizes){


  
    $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='spa_team' && $value != 'aboutus-team-thumb' ){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
}); */

//for single page tempaltes
add_filter( 'intermediate_image_sizes', function($sizes)
{
    $type = get_post_type($_REQUEST['post_id']);
	
    foreach($sizes as $key => $value){
        if($type=='page'  &&  $value != 'page-image'){
            unset($sizes[$key]);
        }
	
    }
    return $sizes;
});


?>