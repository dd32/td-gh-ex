<?php
/**
 * The functions and definitions
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

/**
 * Set the contents width
 */
if(!isset($content_width )){
  $content_width = 768;
}

/**
 * Enqueue scripts and styles
 */
function base_for_original_scripts(){
  // Load theme stylesheet
  wp_enqueue_style('style',get_stylesheet_uri());

  // Load Japanese font when the browser language is Japanese
  if(strtoupper(get_locale()) == 'JA'){
    wp_enqueue_style('base_for_original_ja', get_template_directory_uri().'/css/ja.css');
  }

  // Load common script
  wp_enqueue_script('base_for_original_common', get_template_directory_uri().'/js/common.js', array('jquery'), '', false);

  // Load the html5 shiv
  wp_enqueue_script('html5', get_theme_file_uri('/js/html5shiv.min.js' ), array(), '');
  wp_script_add_data('html5', 'conditional', 'lt IE 9');

  //Load comment script
  if(is_singular() && comments_open() && get_option('thread_comments')){
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'base_for_original_scripts');

/**
 * Setup theme defaults and registers
 */
function base_for_original_setup(){

  // Load the language file
  load_theme_textdomain('base-for-original', get_template_directory().'/languages');

  // Output title tag
  add_theme_support('title-tag');

  // Support post thumbnails
  add_theme_support('post-thumbnails');

  // Set feed.
  add_theme_support('automatic-feed-links');

  // The visual editor stylesheet
  add_editor_style('css/editor-style.css');

}
add_action('after_setup_theme','base_for_original_setup');

/**
 * Register widget area
 */
function base_for_original_widgets_init(){
  register_sidebar( array(
    'name'          => __('Widget Area', 'base-for-original'),
    'id'            => 'sidebar-common',
    'description'   => __('Add widgets here to appear in your sidebar on all pages.', 'base-for-original' ),
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
}
add_action('widgets_init', 'base_for_original_widgets_init');

/**
 * Change title tag delimiter
 */
function base_for_original_title_separator($sep){
  return '|';
}
add_filter('document_title_separator', 'base_for_original_title_separator' );

/**
 * Output page slag to class of body tag
 */
function base_for_original_body_pagename_class($classes = ''){
  global $post;

  if(is_page()){
    $page = get_page(get_the_ID());
    $classes[] = 'page-'.$page->post_name;

    if($post->ancestors){
      foreach ($post->ancestors as $post_anc_id){
        $post_id = $post_anc_id;
      }
    }else{
      $post_id = $post->ID;
    }
    $ancestor_post = get_page($post_id);
    $ancestor_slug = 'page-'.$ancestor_post->post_name;
    $classes[] = $ancestor_slug;
  }
  return $classes;
}
add_filter('body_class', 'base_for_original_body_pagename_class');

?>
