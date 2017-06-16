<?php

// Register parent style

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// Register new page widget
add_action( 'widgets_init', 'child_twentysixteen_widgets_init' );
function child_twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

// Remove class of no-sidebar
add_filter( 'body_class', 'child_twentysixteen_body_classes' , 30 );
    function child_twentysixteen_body_classes( $classes ) {
        
    if (is_single() || is_archive() ){
		 // Adds a class of no-sidebar without active sidebar on archive and single post.
	   if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		    $classes[] = 'no-sidebar-1';
	    }
    }
    
    if ( is_front_page() && is_home() ) {
		 // Adds a class of no-sidebar without active sidebar if blog is set as homepage.
	   if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		    $classes[] = 'no-sidebar-1';
	    }
    }

    if (is_page_template() || is_page() ){
	    // Adds a class of no-sidebar  without active sidebar if page does not have a sidebar.
	   if ( ! is_active_sidebar( 'sidebar-4' ) ) {
		    $classes[] = 'no-sidebar-2';
	    }
    }

         if (in_array('no-sidebar', $classes) ) {
            unset( $classes[array_search('no-sidebar', $classes)] );
        }

	return $classes;
}

// Add credit to footer

add_action( 'twentysixteen_credits', 'twentysixteen_clean_design_credits_handler' );
    function twentysixteen_clean_design_credits_handler() {
        ?>
            Theme by <a href="https://www.websitehelper.co.uk" target="_blank">Websitehelper.co.uk</a> |
        <?php
    }

// Twenty Sixteen Child Theme functions and definitions

require_once dirname(__FILE__ ) . '/inc/include-kirki.php';
require_once dirname(__FILE__ ) . '/inc/class-twentysixteen-child-kirki.php';
require_once dirname(__FILE__ ) . '/inc/customizer.php';