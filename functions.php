<?php

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-customizer.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/define_template.php';

/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

register_nav_menu('custom_menu', 'Main Menu');

function yogesh_wp_enqueue_styles() {
    wp_enqueue_style( 'bfront-font-Monda', '//fonts.googleapis.com/css?family=Monda:400,700');
    wp_enqueue_style('bfront-Reset-css', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style('bfront-flexslider-css', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('bfront-font-awesome-css', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('bfront-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('bfront-superfish-css', get_template_directory_uri() . '/css/superfish.css');
	wp_enqueue_style('bfront-animate-css', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );	        
}
add_action('wp_enqueue_scripts', 'yogesh_wp_enqueue_styles');
        
function yogesh_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('bfront-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'));
        wp_enqueue_script('bfront-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));
        wp_enqueue_script('bfront-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
        wp_enqueue_script('bfront-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
        wp_enqueue_script('bfront-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'));
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action('wp_enqueue_scripts', 'yogesh_wp_enqueue_scripts');

/* ----------------------------------------------------------------------------------- */
/* Custom Jqueries Enqueue */
/* ----------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-logo' );
load_theme_textdomain('bfront', get_template_directory() . '/languages');

function bfront_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => 'My First Widget',
        'id' => 'primary-widget-area',
        'description' => 'My First Widget',
        'before_widget' => '<div class="sidebar_widget wow flipInY">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => 'My Second Widget',
        'id' => 'secondary-widget-area',
        'description' => 'My second widget',
        'before_widget' => '<div class="sidebar_widget wow flipInY">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => BFRONT_FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => BFRONT_THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => BFRONT_SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => BFRONT_THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => BFRONT_THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => BFRONT_THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => BFRONT_FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => BFRONT_THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

/** Register sidebars by running bfront_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'bfront_widgets_init');


//Menu for desktop view
function bfront_nav() {
    if (function_exists('wp_nav_menu')){
        wp_nav_menu(array('theme_location' => 'custom_menu', 'menu_class' => 'sf-menu snip1155', 'menu_id' => 'menu', 'fallback_cb' => 'bfront_nav_fallback'));
    }else{
        bfront_nav_fallback();
    }
}

function bfront_nav_fallback() {
    ?>

    <ul class="sf-menu snip1155" id="menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

//Menu for mobile view
function bfront_mobile_nav() {
    if (function_exists('wp_nav_menu')){
        wp_nav_menu(array('theme_location' => 'custom_menu', 'menu_class' => '', 'menu_id' => '', 'fallback_cb' => 'bfront_mobile_nav_fallback'));
    }else{
        bfront_nav_fallback();
    }
}

function bfront_mobile_nav_fallback() {
    ?>

    <ul>
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}


/**
 * Pagination for blog page
 *
 */
function bfront_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&#8592</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&#8594</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


if ( ! isset( $content_width ) ) $content_width = 900;

if ( is_singular() ) wp_enqueue_script( "comment-reply" );

function custom_css(){
    $custom_css = esc_attr( get_theme_mod('custom_css') );
    echo '<style type="text/css">'.$custom_css.'</style>';
}
add_action('wp_head', 'custom_css');
