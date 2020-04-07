<?php
/**
 * Custom template tags for this theme
 *
 * @package Fmi
 */

if (!function_exists('vs_posts_navigation')) {
  function vs_posts_navigation() {
    the_posts_navigation(array(
      'prev_text' => '<i class="vs-icon vs-icon-caret-left"></i> '.esc_html__('Older posts','fmi'),
      'next_text'  => esc_html__('Newer posts','fmi').' <i class="vs-icon vs-icon-caret-right"></i>'      
    ));
  }
}

if (!function_exists('vs_comments_navigation')) {
  function vs_comments_navigation(){
    the_comments_navigation(array(
      'prev_text' => '<i class="vs-icon vs-icon-caret-left"></i> '.esc_html__( 'Older comments' ,'fmi'),
      'next_text' => esc_html__( 'Newer comments' ,'fmi').' <i class="vs-icon vs-icon-caret-right"></i>'
    ));
  }
}

if (!function_exists('vs_posts_pagination')) {
  function vs_posts_pagination(){
    the_posts_pagination(array(
      'prev_text' => '<i class="vs-icon vs-icon-caret-left"></i>',
      'next_text' => '<i class="vs-icon vs-icon-caret-right"></i>'
    ));
  }
}
