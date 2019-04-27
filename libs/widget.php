<?php
/**
 *  Sidebar and Widgets
 */

//  
//	=================================================================

    function bnw_theme_widgets_init() {

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Primary Widget', "bnw-theme" ),
            'id'            => 'primary-widget',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
        
        //
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar left', "bnw-theme" ),
            'id'            => 'sidebar-left',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Right', "bnw-theme" ),
            'id'            => 'sidebar-right',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar Blog', "bnw-theme" ),
            'id'            => 'sidebar-blog',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Footer One', "bnw-theme" ),
            'id'            => 'footer-one',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Two', "bnw-theme" ),
            'id'            => 'footer-two',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Three', "bnw-theme" ),
            'id'            => 'footer-three',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Four', "bnw-theme" ),
            'id'            => 'footer-four',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        //
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', "bnw-theme" ),
            'id'            => 'sidebar-shop',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
    add_action( 'widgets_init', 'bnw_theme_widgets_init' );