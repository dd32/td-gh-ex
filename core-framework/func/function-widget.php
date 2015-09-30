<?php
/*-----------------------------------------------
 * Footer widgets
 -----------------------------------------------*/
function base_wp_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'base-wp' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

// Area footer 1, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'base-wp' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'base-wp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

// Area footer 2, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'base-wp' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'base-wp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

// Area footer 3, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'base-wp' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'base-wp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

// Area footer 4, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Fourth Footer Widget Area', 'base-wp' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The fourth footer widget area', 'base-wp' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
// Area footer 4, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Sidebar shop', 'base-wp' ),
        'id'            => 'sidebar-shop',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'base_wp_widgets_init');
