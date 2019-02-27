<?php
//get actions
require dirname( __FILE__ ) . '/download-actions.php';

/*----------------------------------------------------------------------
# EDD BODY CLASSES
------------------------------------------------------------------------*/
function igthemes_edd_body_classes( $classes ) {
    
    // If our shop sidebar doesn't contain widgets, adjust the layout to be full-width.
	if ( ! is_active_sidebar( 'sidebar-shop' ) && is_post_type_archive( 'download' ) || ! is_active_sidebar( 'sidebar-shop' ) && is_tax( 'download_category' ) || ! is_active_sidebar( 'sidebar-shop' ) && is_tax( 'download_tag' )  ) {
		$classes[] = 'full-width';
	}

    return $classes;
}
add_filter( 'body_class', 'igthemes_edd_body_classes' );

/*----------------------------------------------------------------------
# EDD CUSTOM TEMPLATE
------------------------------------------------------------------------*/
add_filter( 'template_include', 'igthemes_edd_template', 99 );

function igthemes_edd_template( $template ) {

	if ( is_singular( 'download' )  ) {
		$new_template = locate_template( array( 'inc/plugins/edd/templates/single-download.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}
    elseif (is_post_type_archive( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' )  ) {
		$new_template = locate_template( array( 'inc/plugins/edd/templates/archive-download.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

/*----------------------------------------------------------------------
# EDD ITEMS PER PAGE
------------------------------------------------------------------------*/
//change number of products showed
function igthemes_edd_products_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( is_post_type_archive('download') || is_tax( 'download_category' ) ||  is_tax( 'download_tag' ) ) {
        $query->set( 'posts_per_page', intval(apply_filters( 'igthemes_products_number', $number = '24' )) );
        return;
    }
}
add_action( 'pre_get_posts', 'igthemes_edd_products_per_page', 10 );


// remove the standard button that shows after the download's content
if ( is_active_widget(false, false, 'edd_product_details', true) ) {
    remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );
}