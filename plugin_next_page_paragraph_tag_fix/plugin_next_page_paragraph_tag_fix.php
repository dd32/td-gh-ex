<?php

/*
Plugin Name: NextPage paragraph tag fix
Description: Fixes the invalid open and closing paragraph tags in multipiple-page articles.
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

New plugin_next_page_paragraph_tag_fix();
Class plugin_next_page_paragraph_tag_fix {
  
  Function plugin_next_page_paragraph_tag_fix(){
    Add_Filter('the_content', Array($this, 'CleanTags'));
  }
  
  Function CleanTags ($content){
    $content = Trim ($content);
    
    // Remove closing p-tag at the beginning
    If ( SubStr ($content, 0, 4) == '</p>' )
      $content = SubStr ($content, 4);

    // Remove opening p-tag at the end
    If ( SubStr ($content, -3) == '<p>' )
      $content = SubStr ($content, 0, -3);
      
    return $content;
  }

}

/* End of File */