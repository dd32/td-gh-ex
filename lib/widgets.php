<?php
/* Register sidebars and widgets */
function backyard_widgets_init() {
  //Topbar 
  // Sidebars
  register_sidebar(array(
    'name'=> __('Primary Sidebar', 'backyard'),
    'id'=> 'primary-sidebar',
    'before_widget'=> '<aside id="%1$s" class="widget voffset3 text-center">',
    'after_widget'=> '</aside>',
    'before_title'=> '<h4 class="title3">',
    'after_title'=> '</h4>',
  ));
  
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column One', 'backyard'),
        'id' => 'footer_1',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Two', 'backyard'),
        'id' => 'footer_2',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Three', 'backyard'),
        'id' => 'footer_3',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column Four', 'backyard'),
        'id' => 'footer_4',
        'before_widget' => '<div class="ftr-widget"><aside id="%1$s" class="%2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="title3">',
        'after_title' => '</h4>',
      )
    );
  // Widgets
 
}
add_action('widgets_init', 'backyard_widgets_init');
?>