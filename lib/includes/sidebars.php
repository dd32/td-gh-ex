<?php

function ad_mag_lite_register_sidebar(){

    $args = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title style2">',
        'after_title'   => '</h3>');

    $sidebars = array(
        array(
            'name' => __( 'Left Sidebar', 'ad_mag_lite' ),
            'id'   => 'left-sidebar'),
        array(
            'name' => __( 'Center Sidebar', 'ad_mag_lite' ),
            'id'   => 'center-sidebar'),
        array(
            'name' => __( 'Right Sidebar', 'ad_mag_lite' ),
            'id'   => 'right-sidebar'),
        array(
            'name' => __('Footer 1st', 'ad_mag_lite'),
            'id'   => 'footer-1-sidebar'),     
        array(
            'name' => __('Footer 2nd', 'ad_mag_lite'),
            'id'   => 'footer-2-sidebar'),     
        array(
            'name' => __('Footer 3rd', 'ad_mag_lite'),
            'id'   => 'footer-3-sidebar'),     
        array(
            'name' => __('Footer 4th', 'ad_mag_lite'),
            'id'   => 'footer-4-sidebar')        
        );

foreach($sidebars as $sidebar){
    $sidebar = array_merge($sidebar, $args);
    register_sidebar($sidebar);
}       
}