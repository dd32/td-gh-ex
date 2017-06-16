<?php

// Register parent style

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// Register new page widget
add_action('widgets_init','wpb_init_widgets_custom');
    function wpb_init_widgets_custom($id) {
        register_sidebar(array(
            'name' => 'Page Sidebar',
            'id'   => 'pagesidebar-1',
            'description' => 'Sidebar for pages.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
    ));
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