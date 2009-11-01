<?php
/*
Plugin Name: Featured posts
Description: Shows featured posts in your sidebar.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/


New widget_theme_featured_posts();
Class widget_theme_featured_posts Extends WP_Widget {
  var $base_url;
  var $arr_icon;
  
  Function widget_theme_featured_posts(){
    $this->WP_Widget ( False, __('Featured posts', 'theme'),
                       Array('description' => __('Shows featured posts in your sidebar.', 'theme')));
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));

    // Register as Widget
    Add_Action ('widgets_init', Array($this, 'Register'));
  }
  
  Function Register(){
    Register_Widget('widget_theme_featured_posts');
    Add_Action('wp_head', Array($this, 'Include_CSS'));
  }
  
  Function Include_CSS(){
    Echo '<link rel="stylesheet" href="'.$this->base_url.'/widget_theme_featured_posts.css" type="text/css" media="screen" />';
  }
 
  Function widget ($args, $settings){
    If ($settings['title'] == '') $settings['title'] = __('Featured posts', 'theme');
    If ($settings['limit'] == '') $settings['limit'] = 5;
    
    // Get posts
    $arr_feat = theme_functions::Get_Featured_Posts($settings['limit']);
    
    If (Empty($arr_feat)) return False;
    
    // print html to sidebar
    Echo $args['before_widget'];
          
      Echo $args['before_title'].$settings['title'].$args['after_title'];
      
      #Echo '<pre>'; Print_R ($arr_feat); Echo '</pre>';
      
      Echo '<ul class="featured-posts">';
      
      ForEach ($arr_feat AS $post)
        Echo '<li><a href="'.get_permalink($post->ID).'" title="'.HTMLSpecialChars($post->post_title).'">'.$post->post_title.'</a></li>';
        
      Echo '</ul>';

    Echo $args['after_widget'];
  }
 
  Function form ($settings){
    // Show Form:
    Echo __('Title', 'theme').': <input type="text" name="'.$this->get_field_name('title').'" value="'.$settings['title'].'" /><br />';
    Echo __('Number of posts', 'theme').': <input type="text" name="'.$this->get_field_name('limit').'" value="'.$settings['limit'].'" size="4" /><br />';
  }
 
  Function update ($new_settings, $old_settings){
    return $new_settings;
  }
}

/* End of File */