<?php

// ==================================================================
// Theme stylesheets
// ==================================================================
function ace_theme_styles() { 

  wp_register_style( 'stylesheet', get_template_directory_uri() . '/stylesheet.css', date('l jS \of F Y h:i:s A'), array(), 'all' );
  wp_enqueue_style( 'stylesheet' );

  wp_register_style( 'print', get_template_directory_uri() . '/styles/print.css', date('l jS \of F Y h:i:s A'), array(), 'print' );
  wp_enqueue_style( 'print' );

  wp_register_style( 'google-webfont', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Oswald:400,700', '', 'all' );
  wp_enqueue_style( 'google-webfont' );

}
add_action('wp_enqueue_scripts', 'ace_theme_styles');

// ==================================================================
// Theme scripts
// ==================================================================
function ace_theme_scripts(){

  wp_register_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), '1.0.1', true );
  wp_enqueue_script( 'respond' );

  wp_register_script( 'jquery-tweet', get_template_directory_uri() . '/js/jquery.tweet.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'jquery-tweet' );

  wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '1.4.8', true );
  wp_enqueue_script( 'superfish');

  wp_register_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.min.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'fitvids');

  wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'scripts');

}
add_action('wp_footer', 'ace_theme_scripts');

// ==================================================================
// Add "Theme Options" on admin bar
// ==================================================================
function adelle_theme_admin_bar_menu() {

  global $wp_admin_bar;

  $home_url = get_home_url();
	if ( !is_super_admin() || !is_admin_bar_showing() )
  return;

	$wp_admin_bar->add_menu( array(
    'parent'  => 'appearance',
    'title'   => __( 'Theme Options','adelle-theme'),
    'href'    => ''.$home_url.'/wp-admin/themes.php?page=ace_options.php',
    'id'      => 'theme_options'
    ) );

}
add_action('admin_bar_menu', 'adelle_theme_admin_bar_menu', 100);

// ==================================================================
// Custom header
// ==================================================================
if( function_exists('get_custom_header') ) {

  add_theme_support( 'custom-header', array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 400,
	'height'                 => 100,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
  ));

}

// ==================================================================
// Custom background
// ==================================================================
if( function_exists('get_custom_header') ) {

  add_theme_support('custom-background');

}

// ==================================================================
// Menu location
// ==================================================================
register_nav_menu( 'top_menu', __('Top Menu','adelle-theme') );

// ==================================================================
// Language
// ==================================================================
load_theme_textdomain('adelle-theme', get_template_directory() . '/languages');

// ==================================================================
// Post thumbnail
// ==================================================================
add_theme_support('post-thumbnails');

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'post_thumb', 300, 200, true );
}

// ==================================================================
// Add default posts and comments RSS feed links to head
// ==================================================================
add_theme_support( 'automatic-feed-links' );

// ==================================================================
// Content width
// ==================================================================
if ( ! isset( $content_width ) ) $content_width = 640;

// ==================================================================
// Visual editor stylesheet
// ==================================================================
add_editor_style('editor.css');

// ==================================================================
// Shortcode in excerpt
// ==================================================================
add_filter('the_excerpt', 'do_shortcode');

// ==================================================================
// Shortcode in widget
// ==================================================================
add_filter('widget_text', 'do_shortcode');

// ==================================================================
// Clickable link in content
// ==================================================================
add_filter('the_content', 'make_clickable');

// ==================================================================
// Remove version generator
// ==================================================================
remove_action('wp_head', 'wp_generator');

// ==================================================================
// Add "Home" in menu
// ==================================================================
function adelle_theme_home_page_menu( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'adelle_theme_home_page_menu' );

// ==================================================================
// Comment spam, prevention
// ==================================================================
function adelle_theme_check_referrer() {
  if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
    wp_die( __('Please enable referrers in your browser.','adelle-theme') );
  }
}
add_action('check_comment_flood', 'adelle_theme_check_referrer');

// ==================================================================
// Comment time
// ==================================================================
function adelle_theme_time_ago( $type = 'comment' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago','adelle-theme');
}

// ==================================================================
// Custom comment style
// ==================================================================
function adelle_theme_comment_style($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?>>
  <article class="comment-content" id="comment-<?php comment_ID(); ?>">
    <div class="comment-meta">
    <?php echo get_avatar($comment, $size = '32'); ?>
    <?php printf(__('<h6>%s</h6>','adelle-theme'), get_comment_author_link()) ?>
    <small><?php printf( __('%1$s at %2$s','adelle-theme'), get_comment_date(), get_comment_time()) ?> (<?php printf( __('%s','adelle-theme'), adelle_theme_time_ago() ) ?>)</small>
    </div>
  <?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.','adelle-theme') ?></em><br /><?php endif; ?>
  <?php comment_text() ?>
  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
  </article>
<?php }

// ==================================================================
// Header title
// ==================================================================
function adelle_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ace' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'adelle_theme_wp_title', 10, 2 );

// ==================================================================
// Add internal lightbox
// ==================================================================
function adelle_theme_add_themescript(){
if(!is_admin()){
  wp_enqueue_script('jquery');
  wp_enqueue_script('thickbox',null,array('jquery'));
  }
}

function adelle_theme_wp_thickbox_script() {
$url = get_template_directory_uri();
?>
<script type="text/javascript">
if ( typeof tb_pathToImage != 'string' )
  {
    var tb_pathToImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
  }
if ( typeof tb_closeImage != 'string' )
  {
    var tb_closeImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/tb-close.png";
  }
</script>
<?php
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
}

add_action('init','adelle_theme_add_themescript');
add_action('wp_head', 'adelle_theme_wp_thickbox_script');

// ==================================================================
// Add slimbox
// ==================================================================
define("IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true);

function adelle_theme_slimbox_css() {
$url = get_template_directory_uri();
?>
<link href="<?php echo $url; ?>/js/lightbox/css/slimbox2.css" rel="stylesheet" type="text/css" media="screen" />
<?php }

function adelle_theme_slimbox_script() {
$url = get_template_directory_uri();
?>
<script type="text/javascript" src="<?php echo $url; ?>/js/lightbox/lightbox.js"></script>
<?php }

function adelle_theme_slimbox_replace($string) {
$pattern = '/(<a(.*?)href="([^"]*.)'.IMAGE_FILETYPE.'"(.*?)><img)/ie';
$replacement = 'stripslashes(strstr("\2\5","rel=") ? "\1" : "<a\2href=\"\3\4\"\5 rel=\"slimbox\"><img")';
return preg_replace($pattern, $replacement, $string);
}

function adelle_theme_add_slimbox_rel( $attachment_link ) {
$attachment_link = str_replace( 'a href' , 'a rel="slimbox-cats" href' , $attachment_link );
return $attachment_link;
}

add_action('wp_head', 'adelle_theme_slimbox_css');
add_action('wp_footer', 'adelle_theme_slimbox_script');
add_filter('the_content', 'adelle_theme_slimbox_replace');
add_filter('wp_get_attachment_link' , 'adelle_theme_add_slimbox_rel');

// ==================================================================
// Post/page pagination
// ==================================================================
function adelle_theme_get_link_pages() {

  wp_link_pages(
    array(
    'before'           => '<p class="page-pagination"><span class="page-pagination-title">' . __('Pages:','adelle-theme') . '</span>',
    'after'            => '</p>',
    'link_before'      => '<span class="page-pagination-number">',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'nextpagelink'     => __('Next page','adelle-theme'),
    'previouspagelink' => __('Previous page','adelle-theme'),
    'pagelink'         => '%',
    'echo'             => 1
    )
  );

}

// ==================================================================
// Pagination (WordPress)
// ==================================================================
function adelle_theme_pagination_links() {
  global $wp_query;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  $big = 999999999;
  return paginate_links( array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '?paged=%#%',
    'current' => $current,
    'total' => $wp_query->max_num_pages,
    'prev_next'    => true,
    'prev_text'    => __('Previous','adelle-theme'),
    'next_text'    => __('Next','adelle-theme'),
  ) );
}