<?php

// Register parent style
add_action( 'wp_enqueue_scripts', 'vcready_2016_enqueue_parent_styles' );
    function vcready_2016_enqueue_parent_styles() {
    wp_enqueue_style( 'vcready_2016_enqueue_parent_styles', get_template_directory_uri().'/style.css' );
}

// Register new page widget
add_action( 'widgets_init', 'vcready_2016_widgets_init' );
function vcready_2016_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', '2016-vcready' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Add widgets here to appear in your sidebar.', '2016-vcready' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

// Remove class of no-sidebar
add_filter( 'body_class', 'vcready_2016_body_classes' , 30 );
    function vcready_2016_body_classes( $classes ) {
        
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

// Allow user to change blog archive layout from customizer
add_action( 'wp_head', 'vcready_2016_switch_layout' );
function vcready_2016_switch_layout() {
?>
<?php if ( true == get_theme_mod( 'switch_layout', true ) ) : ?>
	 
<?php else : ?>
	<style type="text/css">
		.entry-content-home {
    		background: #fff!important;
    		position: relative;
    		width: 85%!important;
    		margin: auto;
    		padding: 40px 20px 30px 30px;
    		margin-top: -119px;
}	 
		@media screen and (max-width: 770px) {
			.entry-content-home {
    			padding: 25px 20px 30px 30px!important;
    			margin-top: -25px!important;
			}
			.custom-button-container {
    			float: none;
    			text-align: center;
			}
		}
	 </style>
<?php endif; ?>
	
<?php
} 

// 2016 VCReady Child Theme functions and definitions
require_once( get_stylesheet_directory() . '/inc/include-kirki.php' );
require_once( get_stylesheet_directory() . '/inc/class-2016-vcready-child-kirki.php' );
require_once( get_stylesheet_directory() . '/inc/customizer.php' );