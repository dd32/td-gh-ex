<?php //Retrieve Theme Options Data
global $options;
$options = get_option('p2h_theme_options'); 

$functions_path = TEMPLATEPATH . '/functions/';
//Theme Options
require_once ($functions_path . 'theme-options.php'); 


// Sets content and images width

if ( !isset($content_width) ) $content_width = 600;

// Add default posts and comments RSS feed links to head

if ( function_exists('add_theme_support') ) {
	add_theme_support('automatic-feed-links');
}

//Header Customization -- Remove Auto Feed URL
if ( isset ($options['feedurl']) &&  ($options['feedurl']!="") ) {
	remove_action( 'wp_head', 'feed_links', 2);
}

// Remove the links to the extra feeds such as category feeds
if ( isset ($options['cleanfeedurls']) &&  ($options['cleanfeedurls']!="") ) {
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 
}

// Enables the navigation menu ability

if ( function_exists('register_nav_menus')) {

	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(
		'primary-menu' => __( 'Header Navigation', 'jenny' ),
		'footer-menu' => __( 'Footer Navigation', 'jenny' ),

	) );
	}

// Enables post-thumbnail support
if ( function_exists('add_theme_support') ){
add_theme_support('post-thumbnails');
}

// Adds callback for custom TinyMCE editor stylesheets 
if ( function_exists('add_editor_style') ) add_editor_style();

// This theme allows users to set a custom background
add_custom_background();

// Support for custom headers
define('HEADER_TEXTCOLOR', '000000');
define('HEADER_IMAGE', ''); 
define('HEADER_IMAGE_WIDTH', 900);
define('HEADER_IMAGE_HEIGHT', 100);

function p2h_header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
		<?php if ( 'blank' == get_header_textcolor() ) { ?>
		#header #site-title, #header #site-description{
		    display: none;
		}
		<?php } else { ?>
		#header #site-title a{
		color: #<?php header_textcolor(); ?>;
		}
		<?php } ?>
    </style><?php
}

function p2h_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: 900px !important;
            height: 85px !important;
			margin: 0;
			padding: 10px 0 5px 0;
			border: 0 none !important;
        }
		#headimg h1 {
			margin: 0;
			font-family: "Trebuchet MS", Arial, Helvetica, san-serif;
			font-size: 4.8em;
			font-weight: normal;
			line-height: normal;
		}
		#headimg a {
			color: #000;
			text-decoration: none;
		}
		#desc {
		
		}
    </style><?php 
}

if ( function_exists('add_custom_image_header') ) add_custom_image_header('p2h_header_style', 'p2h_admin_header_style');

// Registers a widgetized sidebar and replaces default WordPress HTML code with a better HTML
if ( function_exists('register_sidebar') )
    // Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Top Sidebar Widgets', 'jenny' ),
		'id' => 'top-sidebar-widgets',
		'description' => __( 'The primary sidebar widget area. Leave blank to use default widgets. Use Secondary Sidebar Widgets.', 'jenny' ),
		'before_widget' => '<div id="%1$s" class="section widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );


// Sets the post excerpt length to 55 characters.
function p2h_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'p2h_excerpt_length' );


// returns TRUE if more than one page exists. Useful for not echoing .post-navigation HTML when there aren't posts to page
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

/**
 * Remove inline styles printed when the gallery shortcode is used.
 * Galleries are styled by the theme in style.css.
 */
function p2h_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'p2h_remove_gallery_css' );


// Removes ugly inline CSS style for Recent Comments widget
function p2h_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'p2h_remove_recent_comments_style' );


//Enque scripts in header
function p2h_init_js() {

if ( !is_admin() ) { // instruction to only load if it is not the admin area
   // enqueue the script
   wp_enqueue_script('jquery'); 
}

} 
add_action('init', 'p2h_init_js');


// Remove the links to feed
//remove_action( 'wp_head', 'feed_links', 2);
// Remove the links to the extra feeds such as category feeds
//remove_action( 'wp_head', 'feed_links_extra', 3 ); 

//Redirect to theme options page on activation
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" )
	wp_redirect( 'admin.php?page=theme-options.php' );

/**
 * Template for comments and pingbacks.
 */
function p2h_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case '' :
	?>
	<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
      <div class="comment-avatar">
         <?php echo get_avatar($comment,$size='54'); ?>
      </div>

 	  <div class="comment-body">
			<p class="comment-meta"><span class="comment-author"><?php comment_author_link(); ?></span><?php _e(' on ','jenny'); ?><?php comment_date() ?><?php _e(' at ','jenny'); ?><?php comment_time() ?>.</p>			
		 	<?php if ($comment->comment_approved == '0') : ?>
			<p><strong><?php _e('Your comment is awaiting moderation.','jenny'); ?></strong></p>
			<?php endif; ?>
			
			<?php comment_text(); ?>
			
			<p class="comment-reply-meta"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
	  </div>
	  
  
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	  <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="post pingback">
		<p><?php _e( 'Pingback:', 'jenny' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'jenny'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
?>