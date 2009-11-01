<?php
/*
Plugin Name: Author Infos
Description: You can add this widget to sidebars on author relevant sections, i.e. pages, posts or author archives.
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/


New widget_theme_author_info();
Class widget_theme_author_info Extends WP_Widget {
  var $base_url;
  var $arr_icon;
  
  Function widget_theme_author_info(){
    $this->WP_Widget ( False, __('Author Info', 'theme'),
                       Array('description' => __('You can add this widget to sidebars on author relevant sections, i.e. pages, posts or author archives.', 'theme')));
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));

    // Register as Widget
    Add_Action ('widgets_init', Array($this, 'Register'));
  }
  
  Function Register(){
    Register_Widget('widget_theme_author_info');
    Add_Action('wp_head', Array($this, 'Include_CSS'));
  }
  
  Function Include_CSS(){
    Echo '<link rel="stylesheet" href="'.$this->base_url.'/widget_theme_author_info.css" type="text/css" media="screen" />';
  }
 
  Function widget ($args, $settings){
    If ($settings['title'] == '') $settings['title'] = __('About the author', 'theme');
    
    If ( is_author() ){
      Global $wp_query;
      $obj_author = $wp_query->get_queried_object();
    }
    ElseIf ( is_singular() ) {
      Global $post;
      $obj_author = get_userdata( $post->post_author );
    }
    Else {
      return False;
    }
    
    Echo $args['before_widget'];
          
      Echo $args['before_title'] . $settings['title'] . $args['after_title'];
      
      Echo '<p>'.sprintf(_c('Author: <b>%s</b>', 'theme'), $obj_author->display_name).'</p>';
      
      // Show gravatar
      If ($settings['show_avatar'] && IsSet ($obj_author->user_email))
        Echo get_avatar($obj_author->user_email, 70);
      
      // Show the profile text
      If (IsSet ($obj_author->description))
        Echo '<p class="author-description">'.$obj_author->description.'</p>';
      
      // Show contact links
      $contact_p = '';
      
      If (IsSet($settings['show_website']) && $settings['show_website'] == 'yes' && $obj_author->user_url != '')
        $contact_p .= '<span class="author-meta website"><a href="'.$obj_author->user_url.'"><img src="'.$this->base_url.'/website.gif" alt="Website" /></a></span>';
      
      If (IsSet($settings['show_jabber']) && $settings['show_jabber'] == 'yes' && IsSet ($obj_author->jabber))
        $contact_p .= '<span class="author-meta jabber"><a href="xmpp:'.$obj_author->jabber.'"><img src="'.$this->base_url.'/jabber.gif" alt="Jabber" /></a></span>';

      If (IsSet($settings['show_aim']) && $settings['show_aim'] == 'yes' && IsSet ($obj_author->aim))
        $contact_p .= '<span class="author-meta aim"><a href="aim:AddBuddy?ScreenName='.UrlEncode($obj_author->aim).'"><img src="'.$this->base_url.'/aim.gif" alt="AIM" /></a></span>';
      
      If (IsSet($settings['show_yim']) && $settings['show_yim'] == 'yes' && IsSet ($obj_author->yim))
        $contact_p .= '<span class="author-meta yim"><a href="http://profiles.yahoo.com/'.$obj_author->yim.'"><img src="'.$this->base_url.'/yim.gif" alt="Yahoo!" /></a></span>';
      
      If ($contact_p != '') Echo '<p class="author-contact">'.$contact_p.'</p>';
      
      // Show link to the authors posts
      $posts_link_caption = SPrintF(__('All posts by %s', 'theme'), $obj_author->display_name);
      Echo '<p class="author-posts-link"><a href="'.get_author_posts_url($obj_author->ID).'" title="'.$posts_link_caption.'">'.$posts_link_caption.'</a></p>';
      

    Echo $args['after_widget'];
  }
 
  Function form ($settings){
    // Show Form:
    Echo __('Title', 'theme').': <input type="text" name="'.$this->get_field_name('title').'" value="'.$settings['title'].'" /><br />';
    Echo '<input type="checkbox" name="'.$this->get_field_name('show_avatar').'" value="yes" '.($settings['show_avatar'] == 'yes' ? 'checked="checked" ' : '').' /> '.__('Show the authors avatar' , 'theme').'<br />';
    Echo '<input type="checkbox" name="'.$this->get_field_name('show_website').'" value="yes" '.($settings['show_website'] == 'yes' ? 'checked="checked" ' : '').' /> '.__('Show the authors url link' , 'theme').'<br />';
    Echo '<input type="checkbox" name="'.$this->get_field_name('show_jabber').'" value="yes" '.($settings['show_jabber'] == 'yes' ? 'checked="checked" ' : '').' /> '.__('Show the authors jabber name' , 'theme').'<br />';
    Echo '<input type="checkbox" name="'.$this->get_field_name('show_aim').'" value="yes" '.($settings['show_aim'] == 'yes' ? 'checked="checked" ' : '').' /> '.__('Show the authors AIM name' , 'theme').'<br />';
    Echo '<input type="checkbox" name="'.$this->get_field_name('show_yim').'" value="yes" '.($settings['show_yim'] == 'yes' ? 'checked="checked" ' : '').' /> '.__('Show the authors YIM name' , 'theme').'<br />';
  }
 
  Function update ($new_settings, $old_settings){
    return $new_settings;
  }
}

/* End of File */