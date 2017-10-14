<?php
/**
 * Print the stylesheets
*/
function graphene_enqueue_scripts(){
	global $graphene_settings;

	/* Enqueue scripts */
	wp_enqueue_script( 'bootstrap', GRAPHENE_ROOTURI . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap-hover-dropdown', GRAPHENE_ROOTURI . '/js/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js', array( 'jquery', 'bootstrap' ) );
	wp_enqueue_script( 'bootstrap-submenu', GRAPHENE_ROOTURI . '/js/bootstrap-submenu/bootstrap-submenu.min.js', array( 'jquery', 'bootstrap' ) );
	wp_enqueue_script( 'html5shiv', GRAPHENE_ROOTURI . '/js/html5shiv/html5shiv.min.js' );
	wp_enqueue_script( 'respond', GRAPHENE_ROOTURI . '/js/respond.js/respond.min.js' );
	wp_enqueue_script( 'infinite-scroll', GRAPHENE_ROOTURI . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'graphene', GRAPHENE_ROOTURI . '/js/graphene.js', array( 'bootstrap', 'comment-reply', 'infinite-scroll' ), '', false );

	/* Enqueue styles */
	wp_enqueue_style( 'graphene-google-fonts', graphene_google_fonts_uri(), array() );
	wp_enqueue_style( 'bootstrap', GRAPHENE_ROOTURI . '/bootstrap/css/bootstrap.min.css' );
	if ( is_rtl() ) wp_enqueue_style( 'bootstrap-rtl', GRAPHENE_ROOTURI . '/bootstrap-rtl/bootstrap-rtl.min.css', array( 'bootstrap' ) );
	wp_enqueue_style( 'font-awesome', GRAPHENE_ROOTURI . '/fonts/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'graphene', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ), false, 'screen' );
	wp_enqueue_style( 'graphene-responsive', GRAPHENE_ROOTURI . '/responsive.css', array( 'bootstrap', 'font-awesome', 'graphene' ) );
	if ( is_rtl() ) {
		wp_enqueue_style( 'graphene-responsive-rtl', GRAPHENE_ROOTURI . '/responsive-rtl.css', array( 'bootstrap-rtl', 'graphene' ), false, 'screen' );
	}
	if ( class_exists( 'bbPress' ) ) wp_enqueue_style( 'graphene-bbpress', GRAPHENE_ROOTURI . '/style-bbpress.css', array( 'graphene' ), false, 'screen' );
	if ( is_singular() && $graphene_settings['print_css'] ) wp_enqueue_style( 'graphene-print', GRAPHENE_ROOTURI . '/style-print.css', array( 'graphene' ), false, 'print' );

}
add_action( 'wp_enqueue_scripts', 'graphene_enqueue_scripts' );


/**
 * Localize scripts and add JavaScript data
 *
 * @package Graphene
 * @since 1.9
 */
function graphene_localize_scripts(){
	global $graphene_settings, $wp_query;
	$posts_per_page = $wp_query->get( 'posts_per_page' );
	$comments_per_page = get_option( 'comments_per_page' );
	
	$js_object = array(
		/* General */
		'templateUrl'			=> GRAPHENE_ROOTURI,
		'isSingular'			=> is_singular(),
		
		/* Comments */
		'shouldShowComments'	=> graphene_should_show_comments(),
		'commentsOrder'			=> get_option( 'default_comments_page' ),
		
		/* Slider */
		'sliderDisable'			=> $graphene_settings['slider_disable'],
		'sliderInterval'		=> $graphene_settings['slider_speed'],
		
		/* Infinite Scroll */
		'infScrollBtnLbl'		=> __( 'Load more', 'graphene' ),
		'infScrollOn'			=> $graphene_settings['inf_scroll_enable'],
		'infScrollCommentsOn'	=> $graphene_settings['inf_scroll_comments'],
		'totalPosts'			=> $wp_query->found_posts,
		'postsPerPage'			=> $posts_per_page,
		'isPageNavi'			=> function_exists( 'wp_pagenavi' ),
		'infScrollMsgText'		=> sprintf( 
										__( 'Fetching %1$s of %2$s items left ...', 'graphene' ),
										'window.grapheneInfScrollItemsPerPage', 
										'window.grapheneInfScrollItemsLeft' ),
		'infScrollMsgTextPlural'=> sprintf( 
										_n( 'Fetching %1$s of %2$s item left ...', 
											'Fetching %1$s of %2$s items left ...', 
											$posts_per_page, 'graphene' ), 
										'window.grapheneInfScrollItemsPerPage', 
										'window.grapheneInfScrollItemsLeft' ),
		'infScrollFinishedText'	=> __( 'All loaded!', 'graphene' ),
		'commentsPerPage'		=> $comments_per_page,
		'totalComments'			=> graphene_get_comment_count( 'comments', true, true ),
		'infScrollCommentsMsg'	=> sprintf( 
										__( 'Fetching %1$s of %2$s comments left ...', 'graphene' ), 
										'window.grapheneInfScrollCommentsPerPage', 
										'window.grapheneInfScrollCommentsLeft' ),
		'infScrollCommentsMsgPlural'=> sprintf( 
										_n( 'Fetching %1$s of %2$s comments left ...', 
											'Fetching %1$s of %2$s comments left ...', 
											$comments_per_page, 'graphene' ), 
										'window.grapheneInfScrollCommentsPerPage', 
										'window.grapheneInfScrollCommentsLeft' ),
		'infScrollCommentsFinishedMsg'	=> __( 'All comments loaded!', 'graphene' ),
	);
	wp_localize_script( 'graphene', 'grapheneJS', apply_filters( 'graphene_js_object', $js_object ) );
}
add_action( 'wp_enqueue_scripts', 'graphene_localize_scripts' );


/**
 * Generate the stylesheet link for Google Fonts
 */
function graphene_google_fonts_uri(){
	$query_args = array(
		'family' => 'Lato:400,400i,700,700i',
		'subset' => 'latin',
	);
	return add_query_arg( apply_filters( 'graphene_google_fonts', $query_args ), "//fonts.googleapis.com/css" );
}