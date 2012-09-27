<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>
<?php

// Global Content Width, Kind of a Joke with this theme, lol
	if (!isset($content_width))
		$content_width = 1100;
			
// Ladies, Gentalmen, boys and girls let's start our engines
add_action('after_setup_theme', 'semperfi_setup');

if (!function_exists('semperfi_setup')):

    function semperfi_setup() {

        global $content_width; 
			
        // Add Callback for Custom TinyMCE editor stylesheets. (editor-style.css)
        add_editor_style();

        // This feature enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');

        // This feature enables post-thumbnail support for a theme
		add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
			add_image_size( 'page-thumbnail', 460, 259, true );
			add_image_size( 'big-thumbnail', 610, 355, true );
			add_image_size( 'tall-thumbnail', 300, 355, true );
			add_image_size( 'small-thumbnail', 300, 173, true );

        // This feature enables custom-menus support for a theme
        register_nav_menus(array(
			'bar' => __('The Menu Bar', 'semperfi' ) ) );

        // WordPress 3.4+
		if ( function_exists('get_custom_header')) {
        	add_theme_support('custom-background'); }
		
	}

endif;

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
function semperfi_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args; }

add_filter( 'wp_page_menu_args', 'semperfi_page_menu_args' );

/**
 * Filter 'get_comments_number'
 * 
 * Filter 'get_comments_number' to display correct 
 * number of comments (count only comments, not 
 * trackbacks/pingbacks)
 *
 * Courtesy of Chip Bennett
 */
function semperfi_comment_count( $count ) {  
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']); }
	else {
		return $count; } }

add_filter('get_comments_number', 'semperfi_comment_count', 0);

/**
 * wp_list_comments() Pings Callback
 * 
 * wp_list_comments() Callback function for 
 * Pings (Trackbacks/Pingbacks)
 */
function semperfi_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

// Sets the post excerpt length to 250 characters
function semperfi_excerpt_length($length) {
    return 250; }

add_filter('excerpt_length', 'semperfi_excerpt_length');

// This function adds in code specifically for IE6 to IE9
function semperfi_ie_css() {
	echo "\n" . '<!-- IE 6 to 9 CSS Hacking -->' . "\n";
	echo '<!--[if lte IE 9]><style type="text/css">#header h1 i{bottom:.6em;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 8]><style type="text/css">#center{width:1000px;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 7]><style type="text/css">#header{padding:0 auto;}#header ul {padding-left:1.5em;}#header ul li{float:left;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 6]><style type="text/css">#header.small h1{display: none;}#center{width:800px;}#banner{background:none;}.overlay{display:none;}.browsing li {width:47%;margin:1%;}#footer{background-color:#111);}</style><![endif]-->' . "\n";
	echo "\n";
}

add_action('wp_head', 'semperfi_ie_css');

// This function removes inline styles set by WordPress gallery
function semperfi_remove_gallery_css($css) {
    return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css); }

add_filter('gallery_style', 'semperfi_remove_gallery_css');

// This function removes default styles set by WordPress recent comments widget
function semperfi_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) ); }

add_action( 'widgets_init', 'semperfi_remove_recent_comments_style' );

// A comment reply
function semperfi_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) 
            wp_enqueue_script('comment-reply'); }

add_action( 'wp_enqueue_scripts', 'semperfi_enqueue_comment_reply' );

//	A safe way of adding javascripts to a WordPress generated page
if (!is_admin())
	add_action('wp_enqueue_scripts', 'semperfi_js');

if (!function_exists('semperfi_js')) {
	function semperfi_js() {
			// JS at the bottom for fast page loading
			wp_enqueue_script('semperfi-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '1.3', true);
            wp_enqueue_script('semperfi-menu-scrolling', get_template_directory_uri() . '/js/jquery.menu.scrolling.js', array('jquery'), '1', true);
			wp_enqueue_script('semperfi-scripts', get_template_directory_uri() . '/js/jquery.fittext.js', array('jquery'), '1.0', true);
			wp_enqueue_script('semperfi-fittext', get_template_directory_uri() . '/js/jquery.fittext.sizing.js', array('jquery'), '1', true);  } }
		
// Add link to theme options in Admin bar
function semperfi_admin_link() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array( 'id' => 'Semper_Fi', 'title' => 'Semper Fi Theme Options', 'href' => admin_url( 'themes.php?page=theme_options' ) )); }

	add_action( 'admin_bar_menu', 'SemperFi_admin_link', 113 );

// Enable the Theme Options Page
require ( get_template_directory() . '/theme-options.php' );
require ( get_template_directory() . '/hooks.php' );

// Redirect to the theme options Page after theme is activated
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=theme_options' ); 

// WordPress Widgets start right here.
function semperfi_widgets_init() {

	register_sidebars(3, array(
		'name'=>'footer widget%d',
		'id' => 'widget',
		'description' => 'Widgets in this area will be shown below the the content of every page.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>', )); }
	
add_action('widgets_init', 'semperfi_widgets_init');

// Checks if the Widgets are active
function semperfi_is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) {
		return true; }
		return false; }

?>