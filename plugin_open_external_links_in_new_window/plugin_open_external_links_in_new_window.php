<?php
/*
Plugin Name: External Link Popup Plugin
Plugin URI: http://DennisHoppe.de
Description: Open automaticly external links in a new window 
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

New Plugin_OpenLinksInNewWindow();

If (Class_Exists('Plugin_OpenLinksInNewWindow')) return False;
Class Plugin_OpenLinksInNewWindow {
  var $base_url;

  Function Plugin_OpenLinksInNewWindow(){
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));
    
    Add_Action('wp_head', Array($this, 'PrintHeader'));
    wp_enqueue_script('jquery');
  }
  
  Function PrintHeader(){
    Echo '<script type="text/javascript" src="'.$this->base_url.'/plugin_open_external_links_in_new_window.js"></script>';
  }
}

/* End of File */