<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function acmeblog_widget_init(){
    register_sidebar(array(
        'name' => __('Main sidebar area', 'acmeblog'),
        'id'   => 'acmeblog-sidebar',
        'description' => 'Displays items on sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Left sidebar area', 'acmeblog'),
        'id'   => 'acmeblog-sidebar-left',
        'description' => 'Displays items on left sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column One', 'acmeblog'),
        'id' => 'footer-col-one',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column Two', 'acmeblog'),
        'id' => 'footer-col-two',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column Three', 'acmeblog'),
        'id' => 'footer-col-three',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action('widgets_init', 'acmeblog_widget_init');