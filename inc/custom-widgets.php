<?php
/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! function_exists( 'apex_business_widgets_init' ) ) :

function apex_business_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Post Sidebar', 'apex-business' ),
        'id'            => 'apex-business-main-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your single post sidebar area.', 'apex-business' ),
        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widgetarea widgetarea">',
        'after_widget'  => '</div><!-- /.sidebar-widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'apex-business' ),
        'id'            => 'apex-business-page-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your single page sidebar area.', 'apex-business' ),
        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widgetarea widgetarea">',
        'after_widget'  => '</div><!-- /.sidebar-widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Left', 'apex-business' ),
        'id'            => 'apex-business-footer-left',
        'description'   => esc_html__( 'Add widgets here to appear on your left footer section.', 'apex-business' ),
        'before_widget' => '<div id="%1$s" class="%2$s ct-widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Middle', 'apex-business' ),
        'id'            => 'apex-business-footer-middle',
        'description'   => esc_html__( 'Add widgets here to appear on your middle footer section.', 'apex-business' ),
        'before_widget' => '<div id="%1$s" class="%2$s ct-widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Right', 'apex-business' ),
        'id'            => 'apex-business-footer-right',
        'description'   => esc_html__( 'Add widgets here to appear on your right footer section.', 'apex-business' ),
        'before_widget' => '<div id="%1$s" class="%2$s ct-widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

endif;

add_action( 'widgets_init', 'apex_business_widgets_init' );
