<?php
function accesspresslite_create_carsoul() {
    $labels = array(
        'name'               => _x( 'Logos', 'post type general name' , 'accesspresslite'),
        'singular_name'      => _x( 'Logo', 'post type singular name' , 'accesspresslite'),
        'add_new'            => _x( 'Add New', 'Logo' , 'accesspresslite'),
        'add_new_item'       => __( 'Add New Logo' , 'accesspresslite'),
        'edit_item'          => __( 'Edit Logo' , 'accesspresslite' ),
        'new_item'           => __( 'New Logo' , 'accesspresslite' ),
        'all_items'          => __( 'All Logo' , 'accesspresslite' ),
        'view_item'          => __( 'View Logo' , 'accesspresslite' ),
        'search_items'       => __( 'Search Logo' , 'accesspresslite' ),
        'not_found'          => __( 'No Logo found' , 'accesspresslite' ),
        'not_found_in_trash' => __( 'No Logo found in the Trash' , 'accesspresslite' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Clients Logo'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Logos and Logo specific data',
        'public'        => true,
        'exclude_from_search' => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail' ),
        'has_archive'   => false,
        'menu_icon' => 'dashicons-images-alt2'
    );
    register_post_type( 'logo', $args );    
}

add_action( 'init', 'accesspresslite_create_carsoul' );

function accesspresslite_create_events() {
    $labels = array(
        'name'               => _x( 'Events', 'post type general name' , 'accesspresslite' ),
        'singular_name'      => _x( 'Event', 'post type singular name' , 'accesspresslite' ),
        'add_new'            => _x( 'Add New', 'Event' , 'accesspresslite' ),
        'add_new_item'       => __( 'Add New Event' , 'accesspresslite' ),
        'edit_item'          => __( 'Edit Event' , 'accesspresslite' ),
        'new_item'           => __( 'New Event' , 'accesspresslite' ),
        'all_items'          => __( 'All Event' , 'accesspresslite' ),
        'view_item'          => __( 'View Event' , 'accesspresslite' ),
        'search_items'       => __( 'Search Event' , 'accesspresslite' ),
        'not_found'          => __( 'No Event found' , 'accesspresslite' ),
        'not_found_in_trash' => __( 'No Event found in the Trash' , 'accesspresslite' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Event'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Posts and Post specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail','thumbnail'),
        'has_archive'   => false,
        'menu_icon' => 'dashicons-calendar'
    );
    register_post_type( 'events', $args );    
}

add_action( 'init', 'accesspresslite_create_events' );

function accesspresslite_create_faqs() {
    $labels = array(
        'name'               => _x( 'FAQ', 'post type general name' , 'accesspresslite' ),
        'singular_name'      => _x( 'FAQ', 'post type singular name' , 'accesspresslite' ),
        'add_new'            => _x( 'Add New', 'FAQ' , 'accesspresslite' ),
        'add_new_item'       => __( 'Add New FAQ' , 'accesspresslite' ),
        'edit_item'          => __( 'Edit FAQ' , 'accesspresslite' ),
        'new_item'           => __( 'New FAQ' , 'accesspresslite' ),
        'all_items'          => __( 'All FAQ' , 'accesspresslite' ),
        'view_item'          => __( 'View FAQ' , 'accesspresslite' ),
        'search_items'       => __( 'Search FAQ' , 'accesspresslite' ),
        'not_found'          => __( 'No FAQ found' , 'accesspresslite' ),
        'not_found_in_trash' => __( 'No FAQ found in the Trash'  , 'accesspresslite'),
        'parent_item_colon'  => '',
        'menu_name'          => 'FAQ'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our FAQs and FAQ specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor'),
        'has_archive'   => false,
        'menu_icon' => 'dashicons-megaphone'
    );
    register_post_type( 'faqs', $args );    
}

add_action( 'init', 'accesspresslite_create_faqs' );

/*function accesspresslite_create_testimonial() {
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name' , 'accesspresslite' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name' , 'accesspresslite' ),
        'add_new'            => _x( 'Add New', 'Testimonial' , 'accesspresslite' ),
        'add_new_item'       => __( 'Add New Testimonial' , 'accesspresslite' ),
        'edit_item'          => __( 'Edit Testimonial'  , 'accesspresslite'),
        'new_item'           => __( 'New Testimonial' , 'accesspresslite' ),
        'all_items'          => __( 'All Testimonial' , 'accesspresslite' ),
        'view_item'          => __( 'View Testimonial' , 'accesspresslite' ),
        'search_items'       => __( 'Search Testimonial' , 'accesspresslite' ),
        'not_found'          => __( 'No Testimonial found' , 'accesspresslite' ),
        'not_found_in_trash' => __( 'No Testimonial found in the Trash' , 'accesspresslite' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Testimonial'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Testimonials and Testimonial specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail'),
        'has_archive'   => true,
        'menu_icon' => 'dashicons-edit'
    );
    register_post_type( 'testimonial', $args );    
}

add_action( 'init', 'accesspresslite_create_testimonial' );
*/
function accesspresslite_create_portfolio() {
    $labels = array(
        'name'               => _x( 'Portfolios', 'post type general name' , 'accesspresslite' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name' , 'accesspresslite' ),
        'add_new'            => _x( 'Add New', 'Portfolio' , 'accesspresslite' ),
        'add_new_item'       => __( 'Add New Portfolio' , 'accesspresslite' ),
        'edit_item'          => __( 'Edit Portfolio' , 'accesspresslite' ),
        'new_item'           => __( 'New Portfolio' , 'accesspresslite' ),
        'all_items'          => __( 'All Portfolio' , 'accesspresslite'),
        'view_item'          => __( 'View Portfolio' , 'accesspresslite'),
        'search_items'       => __( 'Search Portfolio' , 'accesspresslite'),
        'not_found'          => __( 'No Portfolio found' , 'accesspresslite'),
        'not_found_in_trash' => __( 'No Portfolio found in the Trash' , 'accesspresslite'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Portfolio'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Testimonials and Portfolio specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail'),
        'has_archive'   => false,
        'menu_icon' => 'dashicons-portfolio',
    );
    register_post_type( 'portfolio', $args );    
}

add_action( 'init', 'accesspresslite_create_portfolio' );

function create_portfolio_category() {
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'accesspresslite' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'accesspresslite' ),
        'search_items'      => __( 'Search Portfolio Categories', 'accesspresslite' ),
        'all_items'         => __( 'All Portfolio Categories', 'accesspresslite' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'accesspresslite' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', 'accesspresslite' ),
        'edit_item'         => __( 'Edit Portfolio Category', 'accesspresslite' ),
        'update_item'       => __( 'Update Portfolio Category', 'accesspresslite' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'accesspresslite' ),
        'new_item_name'     => __( 'New Portfolio Category', 'accesspresslite' ),
        'menu_name'         => __( 'Portfolio Categories', 'accesspresslite' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolio-category', 'portfolio', $args );
}
add_action( 'init', 'create_portfolio_category', 0 );

