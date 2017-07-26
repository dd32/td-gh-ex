<?php


function arix_scripts() {
	// load main stylesheet
	wp_enqueue_style( 'arix-style', get_stylesheet_uri() );

	// load scripts and styles for comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// load google fonts
	wp_enqueue_style( 'arix-fonts', arix_google_fonts(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'arix_scripts' );



function arix_functions() {
	// add <title> in <head>
	add_theme_support( 'title-tag' );

	// add RSS feed links in <head>
	add_theme_support( 'automatic-feed-links' );

	// featured image support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 1000 );

	// enable html5 features
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'gallery',
		'caption',
	) );

	// custom background image support
	add_theme_support( 'custom-background' , array(
		'default-image'       => get_template_directory_uri() . '/images/arix-background.jpg',
		'default-repeat'      => 'no-repeat',
		'default-position-x'  => 'center',
		'default-position-y'  => 'center',
		'default-attachment'  => 'fixed',
	) );

	// custom logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 360,
		'width'       => 460,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// navigation menu
	register_nav_menus( array(
	    'main_menu' => __( 'Main Menu', 'arix' )
	) );

	// visual editor styles and fonts
	add_editor_style( array( 'editor-style.css', arix_google_fonts() ) );
}
add_action( 'after_setup_theme', 'arix_functions' );



// widget areas
function arix_widgets() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'arix' ),
		'id'            => 'sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'arix' ),
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="widget one-third %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'arix_widgets' );



// set content width
function arix_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'arix_content_width', 1000 );
}
add_action( 'after_setup_theme', 'arix_content_width', 0 );



// numeric page nav
function arix_page_nav() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'list',
		'end_size'  => 3,
		'mid_size'  => 3,
	) );
	echo '</nav>';
}



// register google fonts
if ( ! function_exists( 'arix_google_fonts' ) ) :

function arix_google_fonts() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'arix' ) ) {
		$fonts[] = 'Dosis:300,500';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;



// recent comments
function arix_recent_comments( $no_comments = 3, $comment_len = 130 ) {
	$comments_query = new WP_Comment_Query();
	$comments = $comments_query->query( array( 'number' => $no_comments ) );
	$comm = '';
	if ( $comments ) : foreach ( $comments as $comment ) :
		$comm .= '<li><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
		$comm .= get_comment_author( $comment->comment_ID ) . ':</a> ';
		$comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></li>';
	endforeach; else :
		$comm .= 'No comments.';
	endif;
	return wp_kses_post( $comm );
}



// YouTube embed wrapper
add_filter( 'oembed_dataparse', 'oembed_youtube_add_wrapper', 10, 3 );
function oembed_youtube_add_wrapper( $return, $data, $url ) {
	if ( $data->provider_name == 'YouTube' ) {
			return "<div class='video-wrap'><div class='video-container'>{$return}</div></div>";
	} else {
			return $return;
	}
}


?>