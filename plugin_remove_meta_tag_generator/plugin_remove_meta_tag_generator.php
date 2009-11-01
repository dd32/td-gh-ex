<?php

/*
Plugin Name: Remove Meta Generator Tag
Description: Removes the WordPress meta information 'generator'.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

New Plugin_Remove_Meta_Tag_Generator();
If (Class_Exists('Plugin_Remove_Meta_Tag_Generator')) return False;
Class Plugin_Remove_Meta_Tag_Generator {

  Function Plugin_Remove_Meta_Tag_Generator(){
    Add_Action('init', Array($this, 'Remove'));
  }
  
  Function Remove() {
    // Remove the WP hook:
    Remove_Action ('wp_head', 'wp_generator');
  }
}

/* End of File */