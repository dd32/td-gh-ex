<?php

/*
Plugin Name: Post-Page-Associator
Plugin URI: http://DennisHoppe.de/
Description: Associates post categories and pages.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

New plugin_associate_posts_and_pages();
Class plugin_associate_posts_and_pages {
  var $base_url;

  Function plugin_associate_posts_and_pages(){
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));
    
    Add_Action( 'admin_menu', Array($this, 'Add_Meta_Box') );
    Add_Action( 'save_post', Array($this, 'Save_Meta_Box_Inputs') );
  }
  
  Function Add_Meta_Box(){
    Add_Meta_Box( 'category-association',
                  __('Associate posts with this page', 'theme'),
                  Array($this, 'print_meta_box'),
                  'page',
                  'advanced',
                  'high' );
  }
  
  Function Print_Meta_Box(){
    Global $post;
    $association_settings = get_post_meta($post->ID, '_association_settings', True);
      
    ?>
    <p><?php _e('Please choose a category which contains posts you want to associate with this page.', 'theme') ?></p>
    
    <p><?php _e ('Please choose a category:', 'theme') ?> <select name="association_settings[associated_cat_id]">
    <option value=""><?php _e ('Please choose a category', 'theme') ?></option>
    <?php ForEach (get_categories() AS $cat) : ?>
      <option value="<?php Echo $cat->cat_ID ?>"
      <?php Echo ($cat->cat_ID == $association_settings['associated_cat_id']) ? 'selected="selected" ' : '' ?>>
        <?php Echo HTMLSpecialChars($cat->name) ?>
      </option>
      <?php EndForEach; ?>
    </select></p>
    
    <p><?php _e ('How much posts should be shown?', 'theme') ?> <input type="text" name="association_settings[post_limit]" value="<?php Echo $association_settings['post_limit'] ?>" /> (<?php _e ('Leave blank to show all.', 'theme') ?>)</p>
    <?php
  
  }
  
  Function Save_Meta_Box_Inputs($post_id){
    // If this is an autosave we dont care
    If ( Defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
    
    // if there are no values of our form we dont care
    If (!IsSet ($_REQUEST['association_settings'])) return $post_id;
    
    // Check the inputs
    $settings = $_REQUEST['association_settings'];
        
    // Save as meta data in the post
    If ($settings) update_post_meta ($post_id, '_association_settings', $settings);
    
    // regardless what to return...
    return $post_id;
  }
  
}

/* End of File */