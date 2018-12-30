<?php
/**
 * Widget areas
 *
 * @package Bidnis
 * @since  1.0.0
 */

function bidnis_widgets_init() {

  register_sidebar( array(
    'name'          => __('Above content', 'bidnis'),
    'id'            => 'above-content-widget-area',
    'description'   => __('Widget area above the content', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Left Sidebar', 'bidnis'),
    'id'            => 'sidebar-left-widget-area',
    'description'   => __('Widget area at the left side of the content', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Right Sidebar', 'bidnis'),
    'id'            => 'sidebar-right-widget-area',
    'description'   => __('Widget area at the right side of the content', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer Top', 'bidnis'),
    'id'            => 'footer-top-widget-area',
    'description'   => __('Widget area in the footer', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer One', 'bidnis'),
    'id'            => 'footer-one-widget-area',
    'description'   => __('Widget area in the footer', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer Two', 'bidnis'),
    'id'            => 'footer-two-widget-area',
    'description'   => __('Widget area in the footer', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer Three', 'bidnis'),
    'id'            => 'footer-three-widget-area',
    'description'   => __('Widget area in the footer', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __('Footer Four', 'bidnis'),
    'id'            => 'footer-four-widget-area',
    'description'   => __('Widget area in the footer', 'bidnis'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'bidnis_widgets_init' );