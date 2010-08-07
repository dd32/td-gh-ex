<?php
/**
 * Graphene functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, graphene_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *  
 *     remove_filter('filter_hook', 'callback_function' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Graphene
 * @since Graphene 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset( $content_width ) )
	$content_width = 500;


/** Tell WordPress to run graphene_setup() when the 'after_setup_theme' hook is run. */
add_action('after_setup_theme', 'graphene_setup' );

if (!function_exists( 'graphene_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override graphene_setup() in a child theme, add your own graphene_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Graphene 1.0
 */
function graphene_setup() {

	// Add support for editor syling
	add_editor_style();
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'graphene', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header Menu' => __( 'Header Menu', 'graphene' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define('HEADER_TEXTCOLOR', '000000');
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define('HEADER_IMAGE', '%s/images/headers/flow.jpg');

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to graphene_header_image_width and graphene_header_image_height to change these values.
	define('HEADER_IMAGE_WIDTH', apply_filters('graphene_header_image_width', 900));
	define('HEADER_IMAGE_HEIGHT', apply_filters('graphene_header_image_height', 198));

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size(HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true);

	// Don't support text inside the header image.
	define('NO_HEADER_TEXT', false);

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See graphene_admin_header_style(), below.
	add_custom_image_header('graphene_header_style', 'graphene_admin_header_style');

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		/* Permission from image athor has not yet been obtained for this image 
		'Blue Wave' => array(
			'url' => '%s/images/headers/bluewave.jpg',
			'thumbnail_url' => '%s/images/headers/bluewave-thumb.jpg',
			// translators: header image description 
			'description' => __('Default Graphene theme header', 'graphene')
		),
		*/
		'Schematic' => array(
			'url' => '%s/images/headers/schematic.jpg',
			'thumbnail_url' => '%s/images/headers/schematic-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image by Syahir Hakim', 'graphene')
		),
		'Flow' => array(
			'url' => '%s/images/headers/flow.jpg',
			'thumbnail_url' => '%s/images/headers/flow-thumb.jpg',
			/* translators: header image description */
			'description' => __('This is the default Graphene theme header image, cropped from image by Quantin Houyoux at sxc.hu', 'graphene')
		),
		'Fluid' => array(
			'url' => '%s/images/headers/fluid.jpg',
			'thumbnail_url' => '%s/images/headers/fluid-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image cropped from image by Ilco at sxc.hu', 'graphene')
		),
		'Techno' => array(
			'url' => '%s/images/headers/techno.jpg',
			'thumbnail_url' => '%s/images/headers/techno-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image cropped from image by Ilco at sxc.hu', 'graphene')
		),
		'Fireworks' => array(
			'url' => '%s/images/headers/fireworks.jpg',
			'thumbnail_url' => '%s/images/headers/fireworks-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image cropped from image by Ilco at sxc.hu', 'graphene')
		),
		'Nebula' => array(
			'url' => '%s/images/headers/nebula.jpg',
			'thumbnail_url' => '%s/images/headers/nebula-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image cropped from image by Ilco at sxc.hu', 'graphene')
		),
		'Sparkle' => array(
			'url' => '%s/images/headers/sparkle.jpg',
			'thumbnail_url' => '%s/images/headers/sparkle-thumb.jpg',
			/* translators: header image description */
			'description' => __('Header image cropped from image by Ilco at sxc.hu', 'graphene')
		),
		/* Permission from image athor has not yet been obtained for this image 
		'Green Eye' => array(
			'url' => '%s/images/headers/greeneye.jpg',
			'thumbnail_url' => '%s/images/headers/greeneye-thumb.jpg',
			// translators: header image description 
			'description' => __('Header image cropped from image by Susan Coffey at deviantart.com', 'graphene')
		),
		*/
	) );
}
endif;


if (!function_exists('graphene_admin_header_style')) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in graphene_setup().
 *
 * @since graphene 1.0
 */
function graphene_admin_header_style() {
?>
<style type="text/css">
#headimg #name{
position:relative;
top:65px;
left:38px;
width:852px;
font:bold 28px "Trebuchet MS";
text-decoration:none;
}
#headimg #desc{
	color:#000;
	border-bottom:none;
	position:relative;
	top:50px;
	width:852px;
	left:38px;
	font:18px arial;
	}
</style>
<?php
}
endif;


if (!function_exists('graphene_header_style')) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in graphene_setup().
 *
 * @since graphene 1.0
 */
function graphene_header_style() {
?>
<style type="text/css">
#header{
background-color:#ffffff;
background-repeat:no-repeat;
height:198px;
margin-left:16px;
width:900px;
}
#header h1{
position:relative;
top:80px;
left:38px;
width:852px;
font:bold 28px "Trebuchet MS";
}
#header h1 a, #header h1 a:visited{
	text-decoration:none;
	}
#header h2{
	color:#000;
	border-bottom:none;
	position:relative;
	top:80px;
	width:852px;
	left:38px;
	}
</style>
<?php
}
endif;

/**
 * Define the callback menu, if there is no custom menu.
 * This menu automatically lists all Pages as menu items, including their direct
 * direct descendant, which will only be displayed for the current parent.
*/

if (!function_exists('graphene_default_menu')) :

	function graphene_default_menu(){ ?>
		<ul id="menu" class="clearfix">
            <li <?php if ( is_single() || is_home()) { echo 'class="current_page_item"'; } ?>><a href="<?php echo bloginfo('url'); ?>"><?php _e('Home','graphene'); ?></a></li>
            <?php wp_list_pages('echo=1&sort_column=menu_order&depth=3&title_li='); ?>
        </ul>
<?php      		
	} 
	
endif;

/**
 * Defines the callback function for use with wp_list_comments(). This function controls
 * how comments are displayed.
*/

if (!function_exists('graphene_comment')) :

	function graphene_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
			<li id="comment-<?php comment_ID() ?>" <?php comment_class('clearfix'); ?>>
				<?php echo get_avatar($comment,$size='40'); ?>
					<div class="comment-wrap clearfix">
						<h5><cite><?php comment_author_link() ?></cite><?php _e(' says:','graphene'); ?></h5>
						<div class="comment-meta">
							<p class="commentmetadata">
								<?php printf(__('%1$s at %2$s', 'ksv3'), get_comment_date(), get_comment_time()); ?>
								<?php echo '(UTC '.get_option('gmt_offset').')'; ?>
								<?php edit_comment_link(__('Edit comment','graphene'),' | ',''); ?></p>
							<p class="comment-reply-link"><?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('Reply', 'ksv3'))); ?></p>
						</div>
						<div class="comment-entry">
							<?php if ($comment->comment_approved == '0') : ?>
							   <p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
							<?php endif; ?>
							<?php comment_text() ?>
						</div>
					</div>
	<?php
	}

endif;
		
/**
 * Function to display ads from adsense
*/

if (!function_exists('graphene_adsense')) :

	function graphene_adsense(){
		
		if (get_option('graphene_show_adsense')) :
		?>
		<div id="adsense_single" class="post" style="text-align:right;">
			<?php echo stripslashes(get_option('graphene_adsense_code')); ?>
		</div>
		
		<?php
		
		endif;
		
}

endif;

/**
 * Function to display the AddThis social sharing button
*/

if (!function_exists('graphene_addthis')) :
	
	function graphene_addthis(){
		if (get_option('graphene_show_addthis')) {
			echo '<div class="add-this-right">';
			echo stripslashes(get_option('graphene_addthis_code'));
			echo '</div>';
		}
	}

endif;


/**
 * Register widgetized areas
 *
 * To override graphene_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Graphene 1.0
 * @uses register_sidebar
 */
function graphene_widgets_init() {
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name' => __('Primary Widget Area', 'graphene'),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'graphene' ),
			'before_widget' => '',
			'after_widget' => '</div>',
			'before_title' => "<h3>",
			'after_title' => "</h3>\n<div class=\"sidebar-wrap clearfix\">",
		));
}
/** Register sidebars by running graphene_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'graphene_widgets_init');


/**
 * Register custom Twitter widgets.
*/
$twitter_username = '';
$twitter_tweetcount = 1;

class Graphene_Widget_Twitter extends WP_Widget{
	
	function Graphene_Widget_Twitter(){
		// Widget settings
		$widget_ops = array('classname' => 'Graphene Twitter', 'description' => 'Display the latest Twitter status updates.');
		
		// Widget control settings
		$control_ops = array('id_base' => 'graphene-twitter');
		
		// Create the widget
		$this->WP_Widget('graphene-twitter', 'Graphene Twitter', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance){		// This function displays the widget
		extract($args);
		
		
		// User selected settings
		global $twitter_username;
		global $twitter_tweetcount;
		$twitter_title = $instance['twitter_title'];
		$twitter_username = $instance['twitter_username'];
		$twitter_tweetcount = $instance['twitter_tweetcount'];
		
		echo $args['before_widget'].$args['before_title'].$twitter_title.$args['after_title'];
		?>
        	<ul id="twitter_update_list">
            	<li>&nbsp;</li>
            </ul>
            <p id="tweetfollow" class="sidebar_ablock"><a href="http://twitter.com/<?php echo $twitter_username; ?>"><?php _e('Follow me on Twitter', 'graphene') ?></a></p>
        <?php echo $args['after_widget']; ?>
        
        <?php 
		
		//echo $twitter_script;
        
        function graphene_add_twitter_script() {
			global $twitter_username;
			global $twitter_tweetcount;
			echo '
			<!-- BEGIN Twitter Updates script -->
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$twitter_username.'.json?callback=twitterCallback2&amp;count='.$twitter_tweetcount.'"></script>
			<!-- END Twitter Updates script -->
			';
			}
		// ksv3_add_twitter_script();	
		add_action('wp_footer', 'graphene_add_twitter_script');
	}
	
	function update($new_instance, $old_instance){	// This function processes and updates the settings
		$instance = $old_instance;
		
		// Strip tags (if needed) and update the widget settings
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);
		$instance['twitter_tweetcount'] = strip_tags($new_instance['twitter_tweetcount']);
		$instance['twitter_title'] = strip_tags($new_instance['twitter_title']);
		
		return $instance;
	}
	
	function form($instance){		// This function sets up the settings form
		
		// Set up default widget settings
		$defaults = array(
						'twitter_username' => 'username',
						'twitter_tweetcount' => 5,
						'twitter_title' => __('Latest tweets', 'graphene'),
						);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
        <p>
        	<label for="<?php echo $this->get_field_id('twitter_title'); ?>"><?php _e('Title:', 'graphene'); ?></label>
			<input id="<?php echo $this->get_field_id('twitter_title'); ?>" type="text" name="<?php echo $this->get_field_name('twitter_title'); ?>" value="<?php echo $instance['twitter_title']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('twitter_username'); ?>"><?php _e('Twitter Username:', 'graphene'); ?></label>
			<input id="<?php echo $this->get_field_id('twitter_username'); ?>" type="text" name="<?php echo $this->get_field_name('twitter_username'); ?>" value="<?php echo $instance['twitter_username']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('twitter_tweetcount'); ?>"><?php _e('Number of tweets to display:', 'graphene'); ?></label>
			<input id="<?php echo $this->get_field_id('twitter_tweetcount'); ?>" type="text" name="<?php echo $this->get_field_name('twitter_tweetcount'); ?>" value="<?php echo $instance['twitter_tweetcount']; ?>" size="1" />
        </p>
        <?php
	}
}

/**
 * Register the custom widget by passing the graphene_load_widgets() function to widgets_init
 * action hook.
 * To override in a child theme, remove the action hook and add your own
*/ 
function graphene_load_widgets(){
	register_widget('Graphene_Widget_Twitter');
}
add_action('widgets_init', 'graphene_load_widgets');


/**
 * The function to get the current page url, for automatic link to W3C validator
 * for the page that is currently being viewed
*/
if (!function_exists('graphene_get_url')) :
	function graphene_get_url(){
			 $pageURL = 'http';
			 // if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
			  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			 } else {
			  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			 }
			 return $pageURL;
		}
endif;


/** 
 * Adds the theme options page
*/
function graphene_options_init() {
	add_submenu_page('themes.php', __('Graphene Options', 'graphene'), __('Graphene Options', 'graphene'), 'manage_options', 'graphene_options', 'graphene_options');
}
add_action('admin_menu', 'graphene_options_init');

// Includes the file where our theme options are defined
include('admin/options.php');


/**
 * Customise the comment form
*/

// Starting with the default fields
function graphene_comment_form_fields(){
	$fields =  array(
		'author' => '<p class="comment-form-author">'.'<label for="author">'.__('Name:','graphene').'</label><input id="author" name="author" type="text" /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __('Email:','graphene').'</label><input id="email" name="email" type="text" /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">'.__('Website:','graphene').'</label><input id="url" name="url" type="text" /></p>',
	);
	return $fields;
}

// The comment field textarea
function graphene_comment_textarea(){
	echo '<p><label>'.__('Message:','graphene').'</label><textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea></p>';
}

// Add all the filters we defined
add_filter('comment_form_default_fields', 'graphene_comment_form_fields');
add_filter('comment_form_field_comment', 'graphene_comment_textarea');

?>