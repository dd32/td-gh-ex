<?php

New theme_functions();
Class theme_functions {
  
  Function theme_functions(){
    // Hooks
    
  }
  
  Function get_featured_posts($limit = -1){
    $limit = IntVal ($limit);
    If ( Get_Theme_Setting('featured_cat_id') != '' &&
         ($feat_query = get_posts(Array( 'cat' => Get_Theme_Setting('featured_cat_id'),
                                         'showposts' => $limit,
                                         'numberposts' => -1,
                                         'orderby' => 'rand' ))) &&
         !Empty($feat_query) ){
      return $feat_query;
    }
    Else {
      return False;
    }
  }
  
  Function get_selected_date ($format){
    $day   = get_query_var('day') ? get_query_var('day') : 1 ;
    $month = get_query_var('monthnum') ? get_query_var('monthnum') : 1 ;
    $year  = get_query_var('year') ? get_query_var('year') : IntVal(Date('Y')) ;
    
    $timestamp = MkTime(0, 0, 0, $month, $day, $year);
    
    return Date ($format, $timestamp); 
  }
  
  Function get_selected_author (){
    Global $wp_query;
    return $wp_query->get_queried_object();
  }
  
  Function get_related_posts($post_id = Null, $limit = -1){
  	Global $post;
  	
  	$limit = IntVal ($limit);
  
  	If( $post_id == Null && IsSet($post->ID) )
      $post_id = $post->ID;
    Else
      return False;
  	
    If( !$arr_tag = wp_get_post_tags($post_id) ) return False;
    
    $arr_tag_id = Array();
    Foreach( $arr_tag as $tag ) $arr_tag_id[] = $tag->term_id;
    
    $query = get_posts (Array( 'tag__in' => $arr_tag_id,
                               'post__not_in' => Array($post_id),
                               'showposts' => $limit ));

    If (!Empty($query))
      return $query;
    Else
      return False;    
  }
  
  Function get_random_posts($limit = -1){
    $limit = IntVal ($limit);
    $rand_posts =& get_posts (Array( 'orderby' => 'rand',
                                     'showposts' => $limit,
                                     'post__not_in' => get_option('sticky_posts'),
                                     'caller_get_posts' => 1 ));
    If ($rand_posts)
      return $rand_posts;
    Else
      return False;
  }
  
  Function show_widget ($sidebar_id, $widget_class_name, $instance = Array(), $widget_args = Array()){
  	Global $wp_registered_sidebars, $wp_widget_factory;
  	
  	If ( is_string($instance) ) parse_str($instance, $instance);
  	If ( is_string($widget_args) ) parse_str($widget_args, $widget_args);
  	
    $defaults = array(
  		'before_widget' => '<li id="%1$s" class="widget %2$s">',
  		'after_widget'  => "</li>\n",
  		'before_title'  => '<h2 class="widgettitle">',
  		'after_title'   => "</h2>\n",
  	);  
  	$args = Array_Merge($defaults, $wp_registered_sidebars[$sidebar_id], (array) $widget_args);
    
    $args['before_widget'] = SPrintF ( $args['before_widget'],
                                       $wp_widget_factory->widgets[$widget_class_name]->id,
                                       $wp_widget_factory->widgets[$widget_class_name]->widget_options['classname'] );
    
    the_widget($widget_class_name, $instance, $args);  
  }
  
  Function _show_widgets (){
    /* Shows all registred Widgets */
    Global $wp_widget_factory;
    Echo '<pre>'; Print_R ($wp_widget_factory->widgets); Echo '</pre>';
  }
  
  Function the_excerpt(){
    Echo apply_filters( 'the_excerpt', self::get_the_excerpt() );
  }
  
  Function get_the_excerpt($post_id = Null){
    If ($post_id == Null) $post_id = get_the_ID();
    
    // Get the post
    $post = &get_post ($post_id);
    
    // check if for the post is a password required
    If ( post_password_required($post) ){
      $excerpt = __('There is no excerpt because this is a protected post.'); // translation in the core text domain
      return $excerpt;
    }
    
    If ($post->post_excerpt != ''){
      // get the users excerpt
      $excerpt = $post->post_excerpt;
    }
    Else {
      // Create the excerpt
      $excerpt = $post->post_content;
      $excerpt = strip_shortcodes( $excerpt );
      $excerpt = apply_filters('the_content', $excerpt);
  		$excerpt = str_replace(']]>', ']]&gt;', $excerpt);
  		$excerpt = strip_tags($excerpt);
  		$excerpt_length = apply_filters('excerpt_length', 55);
  		$excerpt_more = apply_filters('excerpt_more', '[...]');
  		$words = explode(' ', $excerpt, $excerpt_length + 1);
  		If ( Count($words) > $excerpt_length ){
  			Array_Pop($words);
  			Array_Push($words, $excerpt_more);
  			$excerpt = Implode(' ', $words);
  		}
		}
		
		// Run filters
		$excerpt = apply_filters('get_the_excerpt', $excerpt);
				
		return $excerpt;
  }
  
  Function get_page_path($post_id = Null){
    If ($post_id == Null){
      Global $post;
      $post_id = $post->ID;
    }
    
    $post_parent = get_post($post_id);
    $arr_path = Array();
    $arr_path[] = $post_parent->post_title;
    
    While ($post_parent->post_parent != 0){
      $post_parent_id = $post_parent->post_parent;
      $post_parent =& get_post($post_parent_id);
      
      // Add the post title to the array
      $arr_path[] = '<a href="'.get_permalink($post_parent->ID).'">'.$post_parent->post_title.'</a>';
    }
    
    // Inverse the path elements to get the right result
    $arr_path = Array_Reverse ($arr_path);
    
    return $arr_path;
    
  }
  
  Function get_post_preview_image($post_id = Null, $number = 1, $orderby = 'rand', $image_size = 'thumbnail'){
    If ($post_id == Null) $post_id = get_the_id();
    $number = IntVal ($number);
    $arr_attachment = get_posts (Array( 'post_parent'    => $post_id,
                                        'post_type'      => 'attachment',
                                        'numberposts'    => $number,
                                        'post_mime_type' => 'image',
                                        'orderby'        => $orderby ));
    
    // Check if there are attachments
    If (Empty($arr_attachment)) return False;
    
    // Convert the attachment objects to urls
    ForEach ($arr_attachment AS $index => $attachment){
      $arr_attachment[$index] = wp_get_attachment_image_src ($attachment->ID, $image_size);
      /* Return Values
           An array containing:
             $image[0] => url
             $image[1] => width
             $image[2] => height
      */
    }
    
    return $arr_attachment;
                                        
    #$attachment = wp_get_attachment_image ($attachment->ID, 'thumbnail');
  }

}
/* End of File */