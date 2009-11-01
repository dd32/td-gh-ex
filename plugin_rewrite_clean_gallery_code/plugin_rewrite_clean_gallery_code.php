<?php

/*
Plugin Name: Rewrite clean gallery code
Plugin URI: http://DennisHoppe.de/?s=wordpress+gallery+plugin
Description: Replaces the WP internal gallery code width a valid version of it.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

New plugin_rewrite_clean_gallery_code();
If ( Class_Exists('plugin_rewrite_clean_gallery_code') ) return False;
Class plugin_rewrite_clean_gallery_code {
  var $base_url;

  Function plugin_rewrite_clean_gallery_code(){
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));
    
    Add_Filter ('post_gallery', Array($this, 'Filter'), 10, 2 );
    Add_Action ('admin_head', Array($this, 'AddAdminStyleSheet'));
  }
  
  Function Filter ($_, $attr){
    GLOBAL $post;

  	$attachments = get_children(Array(
      'post_parent' => $post->ID,
      'post_status' => 'inherit',
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'order' => 'ASC',
      'orderby' => 'menu_order' ));

  	$code = '<div class="gallery" id="gallery_'.$post->ID.'">';
  	
    ForEach ($attachments AS $id => $attachment)
      $code .= wp_get_attachment_link($attachment->ID, 'thumbnail' );
      
    $code .= '</div>';
    
  	return $code;
  }
  
  Function AddAdminStyleSheet(){
    Echo '<link rel="stylesheet" type="text/css" href="'.$this->base_url.'/admin.css" />';
  }
}

/* End of File */