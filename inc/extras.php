<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bellini
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bellini_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bellini_body_classes' );

/**
 * Including class for sidebar widget css class
 */

function bellini_sidebar_content_class(){
	if ( is_singular() && is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ){
		echo 'col-md-6';
	}elseif( is_singular() && is_active_sidebar( 'sidebar-left' ) ){
		echo 'col-md-9';
	}elseif( is_singular() &&  is_active_sidebar( 'sidebar-right' ) ){
		echo 'col-md-9';
	}elseif( is_home() && is_active_sidebar( 'sidebar-blog' ) ){
		echo 'content__sidebar--blog';
	}elseif( is_page_template( 'template-blog.php') && ! is_active_sidebar( 'sidebar-blog' )  ){
		echo 'col-md-12';
	}elseif( is_category()  && is_active_sidebar( 'sidebar-blog' ) ){
		echo 'col-md-9';
	}elseif( is_tag()  && is_active_sidebar( 'sidebar-blog' ) ){
		echo 'col-md-9';
	}elseif( is_archive()  && is_active_sidebar( 'sidebar-blog' ) ){
		echo 'col-md-9';
	}else{
		echo 'col-md-12';
	}
}

function bellini_sidebar_widget_class(){
	if ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ){
		echo 'widget-area--both';
	}else{
		echo 'default';
	}
}
?>
