<?php

/** Tell WordPress to run antmagazine_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'antmagazine_setup' );

if ( ! function_exists( 'antmagazine_setup' ) ):

function antmagazine_setup() {

	 global $content_width;
	 
     if (!isset($content_width))
            $content_width = 620;

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );	
	
	// Add support for custom backgrounds
	$args = array(
	'default-color' => 'E6E6E6',
	'wp-head-callback' => '_custom_background_cb'
);
add_theme_support( 'custom-background', $args );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'antmagazine', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'top' => __( 'Top Navigation', 'antmagazine' ),
	) );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'antmagazine' ),
	) );

}
endif;
?>
<?php
function antmagazine_list_pings($comment, $args, $depth) { 
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'antmagazine_comment_count', 0);
function antmagazine_comment_count( $count ) {
	if ( ! is_admin() ) {
	global $id;
	$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
	return count($comments_by_type['comment']);
} else {
return $count;
}
}
?>
<?php
if ( ! function_exists( 'antmagazine_comment_callback' ) ) :
function antmagazine_comment_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'antmagazine' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'antmagazine' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'antmagazine' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'antmagazine' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'antmagazine' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'antmagazine'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override antmagazine_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 */
function antmagazine_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'antmagazine' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'antmagazine' ),
		'before_widget' => '<div id="%1$s" class="widget-container-primary %2$s">',
		'after_widget' => '</div><div class="widget-shadow"></div>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
	
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'antmagazine' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'antmagazine' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'antmagazine' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'antmagazine' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'antmagazine' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'antmagazine' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
if ( ! function_exists( 'antmagazine_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function antmagazine_posted_on() {
	printf( __( '%2$s <span class="meta-sep">by</span> %3$s', 'antmagazine' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'antmagazine' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;
/** Register sidebars by running antmagazine_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'antmagazine_widgets_init' );

/** Excerpt */
function antmagazine_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'antmagazine_excerpt_length' );

function antmagazine_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'antmagazine_auto_excerpt_more' );


/** filter function for wp_title */
function antmagazine_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'antmagazine_filter_wp_title', 10, 3 );

// custom function
function antmagazine_of_analytics(){
$googleanalytics= antmagazine_get_option('go_code');
echo stripslashes($googleanalytics);
}
add_action( 'wp_footer', 'antmagazine_of_analytics' );

function antmagazine_date_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s', 'antmagazine' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}

function antmagazine_of_register_js() {
	if (!is_admin()) {
		
		wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery', '1.0', TRUE);
		wp_register_script('antmagazine_custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery', '1.0', TRUE);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', TRUE);
		wp_register_script('selectnav', get_template_directory_uri() . '/js/selectnav.js', 'jquery', '0.1', TRUE);
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', 'jquery', '2.1', TRUE);
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', 'jquery', '2.6.1', false);
		wp_register_script('responsive', get_template_directory_uri() . '/js/responsive-scripts.js', 'jquery', '1.2.1', TRUE);
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('superfish');
		wp_enqueue_script('antmagazine_custom');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('flexslider');		
		wp_enqueue_script('selectnav');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('responsive');
	}
}
add_action('init', 'antmagazine_of_register_js');

function antmagazine_of_single_scripts() {
	if(is_singular()) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments 
}
add_action('wp_print_scripts', 'antmagazine_of_single_scripts');

function antmagazine_of_styles() {
		wp_register_style( 'superfish', get_template_directory_uri() . '/css/superfish.css' );
		wp_register_style( 'superfish2', get_template_directory_uri() . '/css/superfish2.css' );
		wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
		wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );

		
		wp_enqueue_style( 'superfish' );
		wp_enqueue_style( 'superfish2' );
		wp_enqueue_style( 'flexslider' );		
		wp_enqueue_style( 'foundation' );		
		
}
add_action('wp_print_styles', 'antmagazine_of_styles');

/** redirect */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=options-framework');

// include panel file.
if ( !function_exists( 'optionsframework_init' ) ) {

	/*-----------------------------------------------------------------------------------*/
	/* Options Framework Theme
	/*-----------------------------------------------------------------------------------*/

	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

	if ( get_stylesheet_directory() == get_template_directory_uri() ) {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	}

	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}