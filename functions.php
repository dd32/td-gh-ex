<?php

// Loading Admin files
require_once(dirname(__FILE__) . "/admin/main.php"); 


// Getting the theme options and making sure defaults are used if no values are set

function mantra_get_theme_options() {
	global $mantra_defaults;
	$optionsMantra = get_option( 'ma_options', $mantra_defaults );
	$optionsMantra = array_merge($mantra_defaults, $optionsMantra);
return $optionsMantra;
}

$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {
     ${"$key"} = $value ;

}

// Bringing up Mantra Settings page after install

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	wp_redirect( 'themes.php?page=mantra-page' );
 
}

// Header hook

function mantra_header() {
    do_action('mantra_header');
}
// Adding the viewport meta if the mobile view has been enabled
add_action('wp_head', 'mantra_mobile_meta');

function mantra_mobile_meta() {
global $mantra_options;
foreach ($mantra_options as $key => $value) {
    							 ${"$key"} = $value ;
									}
if($mantra_mobile=="Enable") echo '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">';
}


// Loading mantra css style

function mantra_style() {
global $mantra_options;
foreach ($mantra_options as $key => $value) {
    							 ${"$key"} = $value ;
									}
// Loading the style.css
	wp_register_style( 'mantras', get_stylesheet_uri() );
	wp_enqueue_style( 'mantras');
// Loading the style-mobile.css if the mobile view is enabled
if($mantra_mobile=="Enable") {	wp_register_style( 'mantra-mobile', get_template_directory_uri() . '/style-mobile.css' );
	wp_enqueue_style( 'mantra-mobile');}
}


// Loading google font styles
function mantra_google_styles() {
global $mantra_options;
foreach ($mantra_options as $key => $value) {
    							 ${"$key"} = $value ;
									}
	wp_register_style( 'mantra_googlefont', $mantra_googlefont2 );
	wp_register_style( 'mantra_googlefonttitle', $mantra_googlefonttitle2 );
	wp_register_style( 'mantra_googlefontside', $mantra_googlefontside2 );
	wp_register_style( 'mantra_googlefontsubheader', $mantra_googlefontsubheader2 );
	wp_enqueue_style( 'mantra_googlefont');
	wp_enqueue_style( 'mantra_googlefonttitle');
	wp_enqueue_style( 'mantra_googlefontside');
	wp_enqueue_style( 'mantra_googlefontsubheader');

}

// CSS loading and hook into wp_enque_scripts

		add_action('wp_print_styles', 'mantra_style',1 );
		add_action('wp_head', 'mantra_custom_styles' ,8);
		add_action('wp_head', 'mantra_customcss',9);
		add_action('wp_head', 'mantra_google_styles');
		

 $mantra_totalSize = $mantra_sidebar + $mantra_sidewidth+50;

// Scripts loading and hook into wp_enque_scripts

function mantra_scripts_method() {
global $mantra_options;
foreach ($mantra_options as $key => $value) {
    							 ${"$key"} = $value ;
									}

// If frontend - load the js for the menu and the social icons animations
	if ( !is_admin() ) {
		wp_register_script('menu',get_template_directory_uri() . '/js/menu.js', array('jquery') );
		wp_enqueue_script('menu');
		// If the back to top button is enabled - load it's js
			if($mantra_backtop =="Enable") {
							wp_register_script('top',get_template_directory_uri() . '/js/top.js', array('jquery'));
							wp_enqueue_script('top');}
  		// If mantra from page is enabled and the current page is home page - load the nivo slider js							
		if($mantra_frontpage =="Enable" && is_home()) {
							wp_register_script('nivoSlider',get_template_directory_uri() . '/js/nivo-slider.js', array('jquery'));
							wp_enqueue_script('nivoSlider');}
  									}

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}

add_action('wp_enqueue_scripts', 'mantra_scripts_method');



/**

 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = $mantra_sidewidth;

/** Tell WordPress to run mantra_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'mantra_setup' );

if ( ! function_exists( 'mantra_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override mantra_setup() in a child theme, add your own mantra_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since mantra 0.5
 */
function mantra_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions (cropped)

	// Add default posts and comments RSS feed links to head

	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status'));

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'mantra', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );



	// This theme uses wp_nav_menu() in 3 locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'mantra' ),
		'top' => __( 'Top Navigation', 'mantra' ),
		'footer' => __( 'Footer Navigation', 'mantra' ),
	) );

	// This theme allows users to set a custom background
	add_theme_support( 'custom-background' );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the same size as the header.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	global $mantra_hheight;
	$mantra_hheight=(int)$mantra_hheight;
	global $mantra_totalSize;
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'mantra_header_image_width', $mantra_totalSize ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'mantra_header_image_height', $mantra_hheight) );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See mantra_admin_header_style(), below.
	define( 'NO_HEADER_TEXT', true );
	add_theme_support( 'custom-header' );

	// ... and thus ends the changeable header business.


// Backwards compatibility with pre 3.4 versions for custom background and header 

	if ( ! function_exists( 'get_custom_header' ) ) {
		define( 'HEADER_TEXTCOLOR', '' );
		define( 'HEADER_IMAGE', '' );
		add_custom_image_header( '', 'mantra_admin_header_style' );
		add_custom_background();
	}




	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(


		'mantra' => array(
			'url' => '%s/images/headers/mantra.png',
			'thumbnail_url' => '%s/images/headers/mantra-thumbnail.png',
			// translators: header image description
			'description' => __( 'mantra', 'mantra' )
		),


	) );
}
endif;

if ( ! function_exists( 'mantra_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in mantra_setup().
 *
 * @since mantra 0.5
 */
function mantra_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since mantra 0.5
 */
function mantra_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'mantra_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Mantra 1.0
 * @return int
 */
function mantra_excerpt_length( $length ) {
	global $mantra_excerptwords;
	return $mantra_excerptwords;
}
add_filter( 'excerpt_length', 'mantra_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since mantra 0.5
 * @return string "Continue Reading" link
 */
function mantra_continue_reading_link() {
	global $mantra_excerptcont;
	return ' <a href="'. get_permalink() . '">' .$mantra_excerptcont.' <span class="meta-nav">&rarr; </span>' . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and mantra_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since mantra 0.5
 * @return string An ellipsis
 */
function mantra_auto_excerpt_more( $more ) {
	global $mantra_excerptdots;
	return $mantra_excerptdots. mantra_continue_reading_link();
}
add_filter( 'excerpt_more', 'mantra_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since mantra 0.5
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function mantra_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= mantra_continue_reading_link();
	}
	return $output;
}

add_filter( 'get_the_excerpt', 'mantra_custom_excerpt_more' );

/**
 * Allows post excerpts to contain HTML tags
 * @since mantra 1.8.7
 * @return string Excerpt with most HTML tags intact
 */

function mantra_trim_excerpt($text) {
global $mantra_excerptwords;
global $mantra_excerptcont;
global $mantra_excerptdots;
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content.
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content.
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
 
    $allowed_tags = '<a>,<img>,<b>,<strong>,<ul>,<li>,<i>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<pre>,<code>,<em>,<u>,<br>,<p>';
    $text = strip_tags($text, $allowed_tags);
 
    $words = preg_split("/[\n\r\t ]+/", $text, $mantra_excerptwords + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $mantra_excerptwords ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text .' '.$mantra_excerptdots. ' <a href="'. get_permalink() . '">' .$mantra_excerptcont.' <span class="meta-nav">&rarr; </span>' . '</a>';
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
if ($mantra_excerpttags=='Enable') {
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mantra_trim_excerpt');
}


/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Mantra's style.css.
 *
 * @since mantra 0.5
 * @return string The gallery style filter, with the styles themselves removed.
 */
function mantra_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'mantra_remove_gallery_css' );

if ( ! function_exists( 'mantra_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own mantra_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since mantra 0.5
 */
function mantra_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 );
		?><?php printf(  '%s <span class="says">'.__('says:', 'mantra' ).'</span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>



		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'mantra' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf(  '%1$s '.__('at', 'mantra' ).' %2$s', get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'mantra' ), ' ' );
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
		<p><?php _e( 'Pingback: ', 'mantra' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'mantra'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override mantra_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since mantra 0.5
 * @uses register_sidebar
 */
function mantra_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area - Sidebar 1', 'mantra' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Primary widget area - Sidebar 1', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area - Sidebar 1', 'mantra' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Secondary widget area - Sidebar 1', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3 for the second sidebar. Empty be default
	register_sidebar( array(
		'name' => __( 'Third Widget Area - Sidebar 2', 'mantra' ),
		'id' => 'third-widget-area',
		'description' => __( 'Third widget area - Sidebar 2', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located below the Third Widget Area in the second sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Widget Area - Sidebar 2', 'mantra' ),
		'id' => 'fourth-widget-area',
		'description' => __( 'Fourth widget area  - Sidebar 2', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'mantra' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'First footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'mantra' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Second footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 7, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'mantra' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 8, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'mantra' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running mantra_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'mantra_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since mantra 0.5
 */
function mantra_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'mantra_remove_recent_comments_style' );

if ( ! function_exists( 'mantra_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since mantra 0.5
 */
function mantra_posted_on() {

	printf( '&nbsp; %4$s <span class="onDate"> %3$s <span class="bl_sep">|</span> </span>  <span class="bl_categ"> %2$s </span>  ',
		'meta-prep meta-prep-author',
		get_the_category_list( ', ' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span> <span class="entry-time"> - %2$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard" >'.__( 'By ','mantra'). ' <a class="url fn n" href="%1$s" title="%2$s">%3$s</a> <span class="bl_sep">|</span></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'mantra' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

function mantra_comments_on() {

printf ( comments_popup_link( __( 'Leave a comment', 'mantra' ), __( '<b>1</b> Comment', 'mantra' ), __( '<b>%</b> Comments', 'mantra' ) ));

}


if ( ! function_exists( 'mantra_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since mantra 0.5
 */
function mantra_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in =  '<span class="bl_posted">'.__( 'Tagged','mantra').' %2$s.</span><span class="bl_bookmark">'.__(' Bookmark the ','mantra').' <a href="%3$s" title="'.__('Permalink to','mantra').' %4$s" rel="bookmark"> '.__('permalink','mantra').'</a>.</span>';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = '<span class="bl_bookmark">'.__( 'Bookmark the ','mantra'). ' <a href="%3$s" title="'.__('Permalink to','mantra').' %4$s" rel="bookmark">'.__('permalink','mantra').'</a>. </span>';
	} else {
		$posted_in = '<span class="bl_bookmark">'.__( 'Bookmark the ','mantra'). ' <a href="%3$s" title="'.__('Permalink to','mantra').' %4$s" rel="bookmark">'.__('permalink','mantra').'</a>. </span>';
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( ! function_exists( 'mantra_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function mantra_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'mantra' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'mantra' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // mantra_content_nav

// Custom image size for use with post thumbnails
if($mantra_fcrop)
add_image_size( 'custom', $mantra_fwidth, $mantra_fheight, true ); 
else
add_image_size( 'custom', $mantra_fwidth, $mantra_fheight ); 


function echo_first_image ($postID)
{				
	$args = array(
	'numberposts' => 1,
	'order'=> 'ASC',
	'post_mime_type' => 'image',
	'post_parent' => $postID,
	'post_status' => 'any',
	'post_type' => 'any'
	);
	
	$attachments = get_children( $args );
	//print_r($attachments);
	
	if ($attachments) {
		foreach($attachments as $attachment) {
			$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' )  ? wp_get_attachment_image_src( $attachment->ID, 'full' ) : wp_get_attachment_image_src( $attachment->ID, 'full' );
				
			return $image_attributes[0];
			
		}
	}
}


/**
 * Adds a post thumbnail and if one doesn't exist the first image from the post is used.
 */

function mantra_set_featured_thumb() {
	global $mantra_options;
	foreach ($mantra_options as $key => $value) {
     ${"$key"} = $value ;
}
global $post;
$image_src = echo_first_image($post->ID);

	 if ( function_exists("has_post_thumbnail") && has_post_thumbnail() && $mantra_fpost=='Enable') 
			the_post_thumbnail( 'custom', array("class" => "align".strtolower($mantra_falign)." post_thumbnail" ) ); 

	else if ($mantra_fpost=='Enable' && $mantra_fauto=="Enable" && $image_src && ($mantra_excerptarchive != "Full Post" || $mantra_excerpthome != "Full Post")) 
			echo '<a title="'.the_title_attribute('echo=0').'" href="'.get_permalink().'" ><img   width='.$mantra_fwidth.' height='.$mantra_fheight.' title="" alt="" class="align'.strtolower($mantra_falign).' post_thumbnail" src="'.$image_src.'"></a>' ;
							
	}

add_filter( 'post_thumbnail_html', 'mantra_thumbnail_link', 10, 3 );	

/**
 * The thumbnail gets a link to the post's page
 */

function mantra_thumbnail_link( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '" alt="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;

}

/**
 * Creates different class names for footer widgets depending on their number.
 * This way they can fit the footer area.
 */

function mantra_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'first-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'second-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'third-footer-widget-area' ) )
		$count++;

	if ( is_active_sidebar( 'fourth-footer-widget-area' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="footer' . $class . '"';
}

/**
 * Creates breadcrumns with page sublevels and category sublevels.
 */

function mantra_breadcrumbs() {
global $post;
echo '<div class="breadcrumbs">';
if (is_page() && !is_front_page() || is_single() || is_category() || is_archive()) {
        echo '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').' &raquo; </a>';
 
        if (is_page()) {
            $ancestors = get_post_ancestors($post);
 
            if ($ancestors) {
                $ancestors = array_reverse($ancestors);
 
                foreach ($ancestors as $crumb) {
                    echo '<a href="'.get_permalink($crumb).'">'.get_the_title($crumb).' &raquo; </a>';
                }
            }
        }
 
        if (is_single()) {
       if(has_category())    { $category = get_the_category();
            echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.' &raquo; </a>';
								}
        }
 
        if (is_category()) {
            $category = get_the_category();
            echo ''.$category[0]->cat_name.'';
        }


 
        // Current page
        if (is_page() || is_single()) {
            echo ''.get_the_title().'';
        }
        echo '';
    } elseif (is_front_page()) {
        // Front page
        /*echo '';
        echo '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> ';
        echo ' Home Page';
        echo '';*/
    }
echo '</div>';
}

/**
 * Creates pagination for blog pages.
 */

function mantra_pagination($pages = '', $range = 1)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<nav class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</nav>\n";
     }
}

/**
 * Filter for page meta title.
 */

function mantra_filter_wp_title( $title ) {
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend name
    $filtered_title = $site_name .' | '. $title;
	// Get the Site Description
 	$site_description = get_bloginfo( 'description' );
    // If site front page, append description
    if ( (is_home() || is_front_page()) && $site_description ) {       
        // Append Site Description to title
        $filtered_title =$site_name. " | ".$site_description;
    }
	// Add pagination if that's the case
	global $page, $paged;
	if ( $paged >= 2 || $page >= 2 )
	$filtered_title .=	 ' | ' . sprintf( __( 'Page %s', 'mantra' ), max( $paged, $page ) );

    // Return the modified title
    return $filtered_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'mantra_filter_wp_title' );

/**
 * Show the social icons in case they are enabled.
 */

function mantra_set_social_icons() {
	global $mantra_options;
	foreach ($mantra_options as $key => $value) {
     ${"$key"} = $value ;

}
if ($mantra_social1 && $mantra_social2) {  ?><a target="_blank" href="<?php echo $mantra_social2; ?>" class="socialicons" id="<?php echo $mantra_social1; ?>" title="<?php echo $mantra_social1; ?>"><img alt="<?php echo $mantra_social1; ?>" src="<?php echo get_template_directory_uri().'/images/socials/'.$mantra_social1.'.png'; ?>" /></a><?php }
?><?php if ($mantra_social3 && $mantra_social4) {  ?><a target="_blank" href="<?php echo $mantra_social4 ?>" class="socialicons" id="<?php echo $mantra_social3 ?>" title="<?php echo $mantra_social3 ?>"><img alt="<?php echo $mantra_social3; ?>" src="<?php echo get_template_directory_uri().'/images/socials/'.$mantra_social3.'.png'; ?>" /></a><?php }
?><?php if ($mantra_social5 && $mantra_social6) {  ?> <a target="_blank" href="<?php echo $mantra_social6 ?>" class="socialicons" id="<?php echo $mantra_social5 ?>" title="<?php echo $mantra_social5 ?>"><img alt="<?php echo $mantra_social5; ?>" src="<?php echo get_template_directory_uri().'/images/socials/'.$mantra_social5.'.png'; ?>" /></a> <?php }
?><?php if ($mantra_social7 && $mantra_social8) {  ?> <a target="_blank" href="<?php echo $mantra_social8 ?>" class="socialicons" id="<?php echo $mantra_social7 ?>" title="<?php echo $mantra_social7 ?>"><img alt="<?php echo $mantra_social7; ?>" src="<?php echo get_template_directory_uri().'/images/socials/'.$mantra_social7.'.png'; ?>" /></a> <?php }
?><?php if ($mantra_social9 && $mantra_social10) {  ?> <a target="_blank" href="<?php echo $mantra_social10 ?>" class="socialicons" id="<?php echo $mantra_social9 ?>" title="<?php echo $mantra_social9 ?>"><img alt="<?php echo $mantra_social9; ?>" src="<?php echo get_template_directory_uri().'/images/socials/'.$mantra_social9.'.png'; ?>" /></a> <?php }
 
						}

// Get any existing copy of our transient data
if ( false === ( $theme_info = get_transient( 'theme_info' ) ) ) {
    // It wasn't there, so regenerate the data and save the transient
 if ( ! function_exists( 'get_custom_header' ) ) {  $theme_info = get_theme_data( get_theme_root() . '/mantra/style.css' ); }
else { $theme_info = wp_get_theme( );}

     set_transient( 'theme_info',  $theme_info ,60*60);
}


add_action('wp_ajax_nopriv_do_ajax', 'mantrra_ajax_function');
add_action('wp_ajax_do_ajax', 'mantra_ajax_function');

function mantra_ajax_function(){
ob_clean();
 
   // the first part is a SWTICHBOARD that fires specific functions
   // according to the value of Query Var 'fn'
 
     switch($_REQUEST['fn']){
          case 'get_latest_posts':
               $output = mantra_ajax_get_latest_posts($_REQUEST['count'],$_REQUEST['categName']);
          break;
          default:
              $output = 'No function specified, check your jQuery.ajax() call';
          break;
 
     }
 
   // at this point, $output contains some sort of valuable data!
   // Now, convert $output to JSON and echo it to the browser
   // That way, we can recapture it with jQuery and run our success function
 
          $output=json_encode($output);
         if(is_array($output)){
        print_r($output);
         }
         else{
        echo $output;
         }
         die;
 
}

function mantra_ajax_get_latest_posts($count,$categName){
 $testVar='';
// The Query
query_posts( 'category_name='.$categName);
// The Loop
if ( have_posts() ) : while ( have_posts() ) : the_post();
$testVar .=the_title("<option>","</option>",0);
endwhile; else: endif;

// Reset Query
wp_reset_query();

return $testVar;
}

/**
 * Export Mantra settings to file
 */

function mantra_export_options(){

    ob_clean();
	
	/* Check authorisation */
	$authorised = true;
	// Check nonce
	if ( ! wp_verify_nonce( $_POST['mantra-export'], 'mantra-export' ) ) { 
		$authorised = false;
	}
	// Check permissions
	if ( ! current_user_can( 'edit_theme_options' ) ){
		$authorised = false;
	}

	if ( $authorised) {
global $mantra_options;
/*date_default_timezone_set('UTC');
$today = date("YmdGis");
$name = 'mantra-settings'.$today.'.txt';*/
		$name = 'mantra-settings.txt';
		$data = $mantra_options;
		$data = json_encode( $data );
		$size = strlen( $data );
	
		header( 'Content-Type: text/plain' );
		header( 'Content-Disposition: attachment; filename="'.$name.'"' );
		header( "Content-Transfer-Encoding: binary" );
		header( 'Accept-Ranges: bytes' );
	
		/* The three lines below basically make the download non-cacheable */
		header( "Cache-control: private" );
		header( 'Pragma: private' );
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
	
		header( "Content-Length: " . $size);
		print( $data );
}
die();
}

if ( isset( $_POST['mantra_export'] ) ){
	add_action( 'init', 'mantra_export_options' );
}

/**
 * This file manages the theme settings uploading and import operations.
 * Uses the theme page to create a new form for uplaoding the settings
 * Uses WP_Filesystem
*/
function mantra_import_form(){            
    
    $bytes = apply_filters( 'import_upload_size_limit', wp_max_upload_size() );
    $size = wp_convert_bytes_to_hr( $bytes );
    $upload_dir = wp_upload_dir();
    if ( ! empty( $upload_dir['error'] ) ) :
        ?><div class="error"><p><?php _e('Before you can upload your import file, you will need to fix the following error:', 'mantra'); ?></p>
            <p><strong><?php echo $upload_dir['error']; ?></strong></p></div><?php
    else :
    ?>

    <div class="wrap">
		<div style="width:400px;display:block;margin-left:30px;">
        <div id="icon-tools" class="icon32"><br></div>
        <h2><?php echo __( 'Import Mantra Theme Options', 'mantra' );?></h2>    
        <form enctype="multipart/form-data" id="import-upload-form" method="post" action="">
        	<p><?php _e('Hi! This is where you import the  Mantra settings.<i> Please remember that this is still an experimental feature.</i>', 'mantra'); ?></p>
            <p>
                <label for="upload"><strong><?php _e('Just choose a file from your computer:', 'mantra'); ?> </strong><i>(mantra-settings.txt)</i></label> 
		       <input type="file" id="upload" name="import" size="25"  />
				<span style="font-size:10px;">(<?php  printf( __( 'Maximum size: %s', 'mantra' ), $size ); ?> )</span>
                <input type="hidden" name="action" value="save" />
                <input type="hidden" name="max_file_size" value="<?php echo $bytes; ?>" />
                <?php wp_nonce_field('mantra-import', 'mantra-import'); ?>
                <input type="hidden" name="mantra_import_confirmed" value="true" />
            </p>
            <input type="submit" class="button" value="<?php _e('And import!', 'mantra'); ?>" />            
        </form>
	</div>
    </div> <!-- end wrap -->
    <?php
    endif;
} // Closes the mantra_import_form() function definition 


/**
 * This actual import of the options from the file to the settings array.
*/
function mantra_import_file() {
    global $mantra_options;
    
    /* Check authorisation */
    $authorised = true;
    // Check nonce
    if (!wp_verify_nonce($_POST['mantra-import'], 'mantra-import')) {$authorised = false;}
    // Check permissions
    if (!current_user_can('edit_theme_options')){ $authorised = false; }
    
    // If the user is authorised, import the theme's options to the database
    if ($authorised) {?>
        <?php
        // make sure there is an import file uploaded
        if ( (isset($_FILES["import"]["size"]) &&  ($_FILES["import"]["size"] > 0) ) ) {

			$form_fields = array('import');
			$method = '';
			
			$url = wp_nonce_url('themes.php?page=mantra-page', 'mantra-import');
			
			// Get file writing credentials
			if (false === ($creds = request_filesystem_credentials($url, $method, false, false, $form_fields) ) ) {
				return true;
			}
			
			if ( ! WP_Filesystem($creds) ) {
				// our credentials were no good, ask the user for them again
				request_filesystem_credentials($url, $method, true, false, $form_fields);
				return true;
			}
			
			// Write the file if credentials are good
			$upload_dir = wp_upload_dir();
			$filename = trailingslashit($upload_dir['path']).'mantra_options.txt';
				 
			// by this point, the $wp_filesystem global should be working, so let's use it to create a file
			global $wp_filesystem;
			if ( ! $wp_filesystem->move($_FILES['import']['tmp_name'], $filename, true) ) {
				echo 'Error saving file!';
				return;
			}
			
			$file = $_FILES['import'];
			
			if ($file['type'] == 'text/plain') {
				$data = $wp_filesystem->get_contents($filename);
				// try to read the file
				if ($data !== FALSE){
					$settings = json_decode($data, true);
					// try to read the settings array
					if (isset($settings['mantra_db'])){ ?>
        <div class="wrap">
        <div id="icon-tools" class="icon32"><br></div>
        <h2><?php echo __( 'Import Mantra Theme Options ', 'mantra' );?></h2> <?php 
						$settings = array_merge($mantra_options, $settings);
						update_option('ma_options', $settings);
						echo '<div class="updated fade"><p>'. __('Great! The options have been imported!', 'mantra').'<br />';
						echo '<a href="themes.php?page=mantra-page">'.__('Go back to the Mantra options page and check them out!', 'mantra').'<a></p></div>';
					} 
					else { // else: try to read the settings array
						echo '<div class="error"><p><strong>'.__('Oops, there\'s a small problem.', 'mantra').'</strong><br />';
						echo __('The uploaded file does not contain valid Mantra options. Make sure the file is exported from the Mantra Options page.', 'mantra').'</p></div>';
						mantra_import_form();
					}                    
				} 
				else { // else: try to read the file
					echo '<div class="error"><p><strong>'.__('Oops, there\'s a small problem.', 'mantra').'</strong><br />';
					echo __('The uploaded file could not be read.', 'mantra').'</p></div>';
					mantra_import_form();
				} 
			}
			else { // else: make sure the file uploaded was a plain text file
				echo '<div class="error"><p><strong>'.__('Oops, there\'s a small problem.', 'mantra').'</strong><br />';
				echo __('The uploaded file is not supported. Make sure the file was exported from the Mantra page and that it is a text file.', 'mantra').'</p></div>';
				mantra_import_form();
			}
			
			// Delete the file after we're done
			$wp_filesystem->delete($filename);
			
        }
        else { // else: make sure there is an import file uploaded           
            echo '<div class="error"><p>'.__( 'Oops! The file is empty or there was no file. This error could also be caused by uploads being disabled in your php.ini or by post_max_size being defined as smaller than upload_max_filesize in php.ini.', 'mantra' ).'</p></div>';
			mantra_import_form();        
        }
        echo '</div> <!-- end wrap -->';
    }
    else {
        wp_die(__('ERROR: You are not authorised to perform that operation', 'mantra'));            
    }           
} // Closes the mantra_import_file() function definition 

// Truncate function for use in the Admin RSS feed 
function mantra_truncate_words($string,$words=20, $ellipsis=' ...') {
 $new = preg_replace('/((\w+\W+\'*){'.($words-1).'}(\w+))(.*)/', '${1}', $string);
 return $new.$ellipsis;
}

// Front page generator
function mantra_frontpage_generator() {
$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {
     ${"$key"} = $value ;
}
?>

<script type="text/javascript">

	// Flash animation for columns
	function flash(id){
             jQuery(id)
             .animate({opacity: 0.5}, 100) 
             .fadeOut(100)
			 .fadeIn(100)
             .animate({opacity: 1}, 100)
					}

    jQuery(window).load(function() {
	// Slider creation
        jQuery('#slider').nivoSlider({

			effect: '<?php  echo $mantra_fpslideranim; ?>',
       		animSpeed: <?php echo $mantra_fpslidertime ?>,
			<?php	if($mantra_fpsliderarrows=="Hidden") { ?> directionNav: false, <?php }
   			if($mantra_fpsliderarrows=="Always Visible") { ?>  directionNavHide: false, <?php } ?>
			pauseTime: <?php echo $mantra_fpsliderpause ?>
	
						});

    jQuery('#front-columns > div img').mouseover(function(e) { flash(this); })

		});	
	</script>

<style>

<?php if ($mantra_fronthideheader) {?> #branding {display:none;} <?php }
	  if ($mantra_fronthidemenu) {?> #access {display:none;} <?php }
  	  if ($mantra_fronthidewidget) {?> #colophon {display:none;} <?php }
	  if ($mantra_fronthidefooter) {?> #footer2 {display:none;} <?php }
      if ($mantra_fronthideback) {?> #main {background:none;} <?php } ?>


#slider{ 
	width:<?php echo $mantra_fpsliderwidth ?>px ;
	height:<?php echo $mantra_fpsliderheight ?>px !important;
	margin:30px auto;
	display:block;
	border:10px solid #eee;
}

#front-text1 h1 , #front-text2 h1{
	display:block;
	float:none;
	margin:30px auto;
	text-align:center;
	font-size:32px;
	clear:both;
	line-height:32px;
	font-style:italic;
	font-weight:bold;
	color:<?php echo $mantra_fronttitlecolor; ?>;
}

 #front-text2 h1{
	font-size:28px;
	line-height:28px;
	margin-top:40px;
	margin-bottom:15px;
}

#frontpage blockquote {
	width:88% ;
	max-width:88% !important;
	margin-bottom:20px;
	font-size:16px;
	line-height:22px;
	color:#444;
}

#frontpage #front-text4 blockquote {
	font-size:14px;
	line-height:18px;
	color:#666;
}

#frontpage blockquote:before, #frontpage blockquote:after {
	content:none;
}

#front-columns > div {
display:block;
width:<?php
switch ($mantra_nrcolumns) {
    case 0:
        break;
	case 1:
        echo "95";
		break;
    case 2:
        echo "45";
		break;
    case 3:
        echo "29";
        break;
    case 4:
        echo "21";
        break;
} ?>%;
height:auto;
margin-left:2%;margin-right:2%;
margin-top:20px;
margin-bottom:20px;
float:left;
}

.column-image {
	height:<?php echo $mantra_colimageheight ?>px;
	border:3px solid #eee;
}

.theme-default .nivo-controlNav {margin-left:-<?php echo $mantra_slideNumber*11; ?>px}

<?php if ($mantra_fpslidernav!="Bullets") { 
	if ($mantra_fpslidernav=="Numbers") {?>

.theme-default .nivo-controlNav {bottom:-40px;}
.theme-default .nivo-controlNav a {
    background: none;
	text-decoration:underline;
	margin-right:5px;
    display: block;
    float: left;
	text-align:center;
    height: 16px;
    text-indent:0;
    width: 16px;
}
<?php } else if ($mantra_fpslidernav=="None") {?>
.theme-default .nivo-controlNav {display:none;}

<?php } } ?>
</style>

<div id="frontpage">
<?php  

// First FrontPage Title
if($mantra_fronttext1) {?><div id="front-text1"> <h1><?php echo $mantra_fronttext1 ?> </h1></div><?php }

// When a post query has been selected from the Slider type in the admin area
if ($mantra_slideType != 'Custom Slides') { 
global $post;
// Initiating query
$custom_query = new WP_query();

// Switch for Query type
switch ($mantra_slideType) {

 case 'Latest Posts' :
$custom_query->query('showposts='.$mantra_slideNumber.'&ignore_sticky_posts=1');
break;

 case 'Random Posts' :
$custom_query->query('showposts='.$mantra_slideNumber.'&orderby=rand&ignore_sticky_posts=1');
break;

 case 'Latest Posts from Category' :
$custom_query->query('showposts='.$mantra_slideNumber.'&category_name='.$mantra_slideCateg.'&ignore_sticky_posts=1');
break;

 case 'Random Posts from Category' :
$custom_query->query('showposts='.$mantra_slideNumber.'&category_name='.$mantra_slideCateg.'&orderby=rand&ignore_sticky_posts=1');
break;

 case 'Sticky Posts' :
$custom_query->query(array('post__in'  => get_option( 'sticky_posts' ), 'showposts' =>$mantra_slideNumber,'ignore_sticky_posts' => 1));
break;

 case 'Specific Posts' :
 // Transofm string separated by commas into array
$pieces_array = explode(",", $mantra_slideSpecific);
$custom_query->query(array( 'post__in' => $pieces_array,'ignore_sticky_posts' => 1 ));
break;

}
 // Variables i and j for matching slider number with caption number
$i=0;	$j=0;?>
 <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
  <div id="slider" class="nivoSlider">

	<?php 
	 // Loop for creating the slides
	if ( $custom_query->have_posts() ) while ( $custom_query->have_posts()) : $custom_query->the_post();  

 		 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),array($mantra_fpsliderwidth,$mantra_fpsliderheight)); 
		 $i++; ?>
         <a href="<?php the_permalink(); ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $image[0]; ?>"  alt="" <?php if ($mantra_slidertitle1 || $mantra_slidertext1 ) { ?> title="#caption<?php echo $i;?>" <?php }?> /></a> 

	<?php endwhile; // end of the loop.   
?> 
</div>
	<?php 
	// Loop for creating the captions
	if ($custom_query->have_posts() ) while ( $custom_query->have_posts() ) : $custom_query->the_post();  
					$j++; ?>
					
            <div id="caption<?php echo $j;?>" class="nivo-html-caption">
                <?php the_title("<h2>","</h2>");the_excerpt(); ?>
            </div>
 
	<?php endwhile; // end of the loop. ?>        
            
        </div>

<?php } else { 

// If Custom Slides have been selected
?>
 <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
             <?php  if($mantra_sliderimg1) {?>    <a href="<?php echo $mantra_sliderlink1 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg1 ?>" id="slider1" alt="" <?php if ($mantra_slidertitle1 || $mantra_slidertext1 ) { ?>title="#caption1" <?php }?> /></a><?php } 
           			if($mantra_sliderimg2) {?>    <a href="<?php echo $mantra_sliderlink2 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg2 ?>" id="slider2" alt="" <?php if ($mantra_slidertitle2 || $mantra_slidertext2 ) { ?>title="#caption2" <?php }?> /></a><?php } 
 					if($mantra_sliderimg3) {?>    <a href="<?php echo $mantra_sliderlink3 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg3 ?>" id="slider3" alt="" <?php if ($mantra_slidertitle3 || $mantra_slidertext3 ) { ?>title="#caption3" <?php }?> /></a><?php } 
 		    		if($mantra_sliderimg4) {?>    <a href="<?php echo $mantra_sliderlink4 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg4 ?>" id="slider4" alt="" <?php if ($mantra_slidertitle4 || $mantra_slidertext4 ) { ?>title="#caption4" <?php }?> /></a><?php } 
			 		if($mantra_sliderimg5) {?>    <a href="<?php echo $mantra_sliderlink5 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg5 ?>" id="slider5" alt="" <?php if ($mantra_slidertitle5 || $mantra_slidertext5 ) { ?>title="#caption5" <?php }?> /></a><?php } ?>
              
            </div>
            <div id="caption1" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle1.'</h2>'.$mantra_slidertext1 ?>
            </div>
            <div id="caption2" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle2.'</h2>'.$mantra_slidertext2 ?>
            </div>
            <div id="caption3" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle3.'</h2>'.$mantra_slidertext3 ?>
            </div>
            <div id="caption4" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle4.'</h2>'.$mantra_slidertext4 ?>
            </div>

            <div id="caption5" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle5.'</h2>'.$mantra_slidertext5 ?>
            </div>
        </div>
<?php } 

// Second FrontPage title
 if($mantra_fronttext2) {?><div id="front-text2"> <h1><?php echo $mantra_fronttext2 ?> </h1></div><?php } 
 
// Frontpage columns
  if($mantra_nrcolumns) { ?>
<div id="front-columns"> 
	<div id="column1">
	<a  href="<?php echo $mantra_columnlink1 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg1 ?>" id="columnImage1" alt="" /> </div> <h3><?php echo $mantra_columntitle1 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext1 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink1 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns != '1') { ?>
	<div id="column2">
		<a  href="<?php echo $mantra_columnlink2 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg2 ?>" id="columnImage2" alt="" /> </div> <h3><?php echo $mantra_columntitle2 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext2 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink2 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns != '2') { ?>
	<div id="column3">
		<a  href="<?php echo $mantra_columnlink3 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg3 ?>" id="columnImage3" alt="" /> </div> <h3><?php echo $mantra_columntitle3 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext3 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink3 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns == '4') { ?>
	<div id="column4">
		<a  href="<?php echo $mantra_columnlink4 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg4 ?>" id="columnImage4" alt="" /> </div> <h3><?php echo $mantra_columntitle4 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext4 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink4 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php } } }?>
</div>
<?php } 

 // Frontpage text areas
  if($mantra_fronttext3) {?><div id="front-text3"> <blockquote><?php echo $mantra_fronttext3 ?> </blockquote></div><?php } 
  if($mantra_fronttext4) {?><div id="front-text4"> <blockquote><?php echo $mantra_fronttext4 ?> </blockquote></div><?php } 

 ?>
</div> <!-- frontpage -->

 <?php  } // End of mantra_frontpage_generator

?>