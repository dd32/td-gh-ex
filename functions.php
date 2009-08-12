<?php
load_theme_textdomain('rcg-forest');

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function widget_my_links($args) {
  global $wp_db_version;
  extract($args, EXTR_SKIP);
  if ( $wp_db_version < 3582 ) {
    // This ONLY works with li/h2 sidebars.
    get_links_list();
  } else {
    $before_widget = preg_replace('/id="[^"]*"/','id="%id"', $before_widget);
    wp_list_bookmarks(array(
      'title_before' => $before_title, 'title_after' => $after_title,
      'category_before' => $before_widget, 'category_after' => $after_widget,
      'show_images' => true, 'class' => 'linkcat widget'
    ));
  }
}
        
if ( function_exists('register_sidebar_widget') )
  register_sidebar_widget(__('My Links'), 'widget_my_links');
?>
