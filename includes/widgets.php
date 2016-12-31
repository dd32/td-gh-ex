<?php
/**
 * Register sidebars and widgets
 */
function abaya_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'abaya'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div class="widget clearfix"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => ' <h6 class="widget_title">',
    'after_title'   => '</h6>',
  ));
  
  // Product Page Sidebars
  register_sidebar(array(
    'name'          => __('Product Page Sidebar', 'abaya'),
    'id'            => 'product_page_sidebar',
    'before_widget' => '<div class="widget"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => ' <h6 class="widget_title">',
    'after_title'   => '</h6>',
  ));
  
  // Front Page Widget Top
  register_sidebar(array(
    'name'          => __('Front Page Widget Top', 'abaya'),
    'id'            => 'front_page_widget_top',
    'before_widget' => '<div class="featured"><aside id="%1$s" class="widget voffset3">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<h6 class="page_title">',
    'after_title'   => '</h6>',
  ));
  
  // Front Page Widget Middle
  register_sidebar(array(
    'name'          => __('Front Page Widget Middle', 'abaya'),
    'id'            => 'front_page_widget_middle',
    'before_widget' => '<div class="featured"><aside id="%1$s" class="widget">',
    'after_widget'  => '</aside></div>',
    'before_title'  => '<h6 class="page_title">',
    'after_title'   => '</h6>',
  ));
  
  // Footer
  
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'abaya'),
        'id' => 'footer_1',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'abaya'),
        'id' => 'footer_2',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Three', 'abaya'),
        'id' => 'footer_3',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Four', 'abaya'),
        'id' => 'footer_4',
        'before_widget' => '<div class="ftr_widget widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h6 class="widget_title">',
        'after_title' => '</h6>',
      )
    );
  }
  // Widgets
add_action('widgets_init', 'abaya_widgets_init');