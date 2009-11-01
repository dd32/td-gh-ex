<?php
/*
Plugin Name: FeedLink
Description: Enables you to add a RSS Badget to your sidebar
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/


New widget_theme_feed_link();
If (Class_Exists('widget_theme_feed_link')) return False;
Class widget_theme_feed_link Extends WP_Widget {
  var $base_url;
  var $arr_icon;
  
  Function widget_theme_feed_link(){
    $this->WP_Widget ( False, __('Feed Link', 'theme'));
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));

    // Read alle .pngs
    $this->arr_icon = Array();
    $handle = OpenDir(DirName(__FILE__));
    While ($file = ReadDir ($handle)){
      If (StrToLower(SubStr($file, -4)) == '.png') $this->arr_icon[] = $file;
    }
    CloseDir($handle);
    Sort ($this->arr_icon);
    
    // Register as Widget
    Add_Action ('widgets_init', Array($this, 'Register'));
  }
  
  Function Register(){
    Register_Widget('widget_theme_feed_link');
  }
 
  Function widget ($args, $settings){
    If ($settings['file'] == '') $settings['file'] = $this->arr_icon[Array_Rand($this->arr_icon)];
    $img_url = $this->base_url.'/'.$settings['file'];
    If ($settings['title'] == '') $settings['title'] = __('RSS 2.0 Feed', 'theme');
    
    Echo $args['before_widget'];
      Echo $args['before_title'].$settings['title'].$args['after_title'];
      Echo '<a href="'.Get_BlogInfo('rss2_url').'" style="display:block;text-align:center;" ><img src="'.$img_url.'" class="noborder" alt="RSS 2.0" /></a>';
    Echo $args['after_widget'];
  }
 
  Function form ($settings){
    // Show Form:
    Echo __('Title', 'theme').': <input type="text" name="'.$this->get_field_name('title').'" value="'.$settings['title'].'" /><br />';
    Echo __('Choose an icon', 'theme').':<br />';
    Echo '<table>';
    ForEach ($this->arr_icon AS $icon){
      Echo '<tr><td><input type="radio" name="'.$this->get_field_name('file').'" value="'.$icon.'" '.($icon == $settings['file'] ? 'checked="checked" ' : '').' /></td><td><img src="'.$this->base_url.'/'.$icon.'" alt="RSS Icon" height="64" /></td></tr>';
    }
    Echo '<tr><td><input type="radio" name="'.$this->get_field_name('file').'" value="" '.($settings['file'] == '' ? 'checked="checked" ' : '').' /></td><td>'.__('Random RSS Icon' , 'theme').'</tr>';
    Echo '</table>';
  }
 
  Function update ($new_settings, $old_settings){
    return $new_settings;
  }
}

/* End of File */