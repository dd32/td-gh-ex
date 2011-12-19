<?php

// DEFAULT OPTIONS ARRAY

$mantra_defaults = array(

"mantra_side" => "Right",
"mantra_sidewidth" => 800,
"mantra_sidebar" => 250,
"mantra_colpad" => "10px",
"mantra_hheight" => "120px",

"mantra_fontsize" => "15px",
"mantra_headfontsize" => "Default",
"mantra_sidefontsize" => "Default",
"mantra_fontfamily" => '"Segoe UI", Arial, sans-serif',
"mantra_textalign" => "Default",
"mantra_parindent" => "0px",
"mantra_lineheight" => "Default",
"mantra_wordspace" => "Default",
"mantra_letterspace" => "Default",

"mantra_backcolor" => "#444444",
"mantra_headercolor" => "#333333",
"mantra_prefootercolor" => "#222222",
"mantra_footercolor" => "#171717",
"mantra_titlecolor" => "#0D85CC",
"mantra_descriptioncolor" => "#999999",
"mantra_contentcolor" => "#333333",
"mantra_linkscolor" => "#0D85CC",
"mantra_hovercolor" => "#333333",
"mantra_headtextcolor" => "#333333",
"mantra_headtexthover" => "#000000",
"mantra_sideheadbackcolor" => "#444444",
"mantra_sideheadtextcolor" => "#2EA5FD",

"mantra_footerheader" => "#0C85CD",
"mantra_footertext" => "#666666",
"mantra_footerhover" => "#888888",

"mantra_caption" => "Light",
"mantra_image" => "Seven",
"mantra_pin" => "Pin2",
"mantra_sidebullet" => "arrow_white",
"mantra_contentlist" => "Show",
"mantra_title" => "Show",
"mantra_pagetitle" => "Show",
"mantra_categtitle" => "Show",
"mantra_tables" => "Disable",
"mantra_backtop" => "Enable",
"mantra_comtext" => "Show",
"mantra_copyright" => "",

"mantra_postdate" => "Show",
"mantra_posttime" => "Hide",
"mantra_postauthor" => "Show",
"mantra_postcateg" => "Show",
"mantra_postbook" => "Show",

"mantra_excerpthome" => "Full Post",
"mantra_excerptarchive" => "Full Post",
"mantra_excerptasides" => "Yes",
"mantra_excerptwords" => "50",
"mantra_excerptdots" => " &hellip;",
"mantra_excerptcont" => " Continue reading",

"mantra_fpost" => "Disable",
"mantra_fauto" => "Disable",
"mantra_fpost" => "Left",
"mantra_fwidth" => "250",
"mantra_fheight" => "150",
"mantra_fheader" => "Disable",

"mantra_facebook" => "",
"mantra_tweeter" => "",
"mantra_rss" => "");


// Getting the theme options and making sure defaults are used if no values are set

function mantra_get_theme_options() {
	global $mantra_defaults;
	$optionsMantra = get_option( 'ma_options', $mantra_defaults );
	$optionsMantra = array_merge($mantra_defaults, $optionsMantra);
return $optionsMantra;
}

$options= mantra_get_theme_options();
foreach ($options as $key => $value) {
     ${"$key"} = $value ;

}

 $totalSize = $mantra_sidebar + $mantra_sidewidth+50;

// Scripts loading and hook into wp_enque_scripts

function mantra_scripts_method() {
global $options;
foreach ($options as $key => $value) {
    							 ${"$key"} = $value ;
									}



	if ( !is_admin() ) {
		wp_register_script('menu',get_template_directory_uri() . '/js/menu.js', array('jquery') );
		wp_enqueue_script('menu');
		add_action('wp_print_styles', 'mantra_style' );
		add_action('wp_head', 'mantra_custom_styles' );
		if($mantra_backtop!="Disable") {
							wp_register_script('top',get_template_directory_uri() . '/js/top.js', array('jquery'));
							wp_enqueue_script('top');}	
  									}

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}    
 
add_action('wp_enqueue_scripts', 'mantra_scripts_method');

// Loading the mantra admin functions if admin section

if( is_admin() ) {
require_once(dirname(__FILE__) . "/mantra-admin-functions.php");
}

function mantra_style() {
	wp_register_style( 'mantras', get_stylesheet_uri() );
	wp_enqueue_style( 'mantras');
}


function mantra_custom_styles() {

/* This  retrieves  admin options. */
$options= mantra_get_theme_options();
foreach ($options as $key => $value) {	
     ${"$key"} = esc_attr($value) ;
}
$totalwidth= $mantra_sidewidth+$mantra_sidebar+50;

?>

<style>
.single-attachment #content,#wrapper, #access, #colophon, #branding, #main,  .attachment img { width:<?php echo ($totalwidth) ?>px !important;} 
#access .menu-header, div.menu {width:<?php echo ($totalwidth-12) ?>px !important;}<?php 
 if ($mantra_side == "Disable") { ?>#content {width:<?php echo ($totalwidth-50) ?>px !important;margin:20px;} #primary, #secondary {display:none;} <?php }
?><?php
if ($mantra_side == "Right") { ?>
#container {margin-right:<?php echo (-$mantra_sidebar-$mantra_colpad-30) ?>px;}
#content { width:<?php echo ($mantra_sidewidth- $mantra_colpad) ?>px;}
#primary,#secondary {width:<?php echo ($mantra_sidebar  ) ?>px;}
#content img {	max-width:<?php echo ($mantra_sidewidth-40) ?>px;}
#content .wp-caption{	max-width:<?php echo ($mantra_sidewidth-30) ?>px;} <?php }
?><?php if ($mantra_side == "Left") { ?>
#container {margin:0 0 0 <?php echo (-$mantra_sidebar-$mantra_colpad-30) ?>px;float:right;}
#content { width:<?php echo ($mantra_sidewidth - $mantra_colpad) ?>px;float:right;margin:0 20px 0 0;}
#primary,#secondary {width:<?php echo ($mantra_sidebar ) ?>px;float:left;padding-left:0px;clear:left;border:none;border-right:1px dashed #EEE;padding-right:20px;}
.widget-title { -moz-border-radius-topleft:0px; -webkit-border-radius:0px;border-radius-topleft:0px ; -moz-border-radius-topright:10px ;border-radius-topright:10px ;	border-top-right-radius:10px;
	-webkit-border-top-right-radius:10px;text-align:right;padding-right:5%;width:100%;}
#content img {	max-width:<?php echo ($mantra_sidewidth-40) ?>px;}
#content .wp-caption{	max-width:<?php echo ($mantra_sidewidth-30) ?>px;} <?php } ?>

#content p, #content ul, #content ol {
font-size:<?php echo $mantra_fontsize ?>;
<?php if ($mantra_lineheight != "Default") { ?>line-height:<?php echo $mantra_lineheight ?>; <?php }
?><?php if ($mantra_wordspace != "Default") { ?>word-spacing:<?php echo $mantra_wordspace ?>;<?php }
?><?php if ($mantra_letterspace != "Default") { ?>letter-spacing:<?php echo $mantra_letterspace ?>;<?php }
?><?php if ($mantra_textalign != "Default") { ?>text-align:<?php echo $mantra_textalign;  ?> ; <?php } ?>}
<?php if (stripslashes($mantra_fontfamily) != '"Segoe UI", Arial, sans-serif') { ?>
* {font-family:<?php echo stripslashes($mantra_fontfamily);  ?> !important; }<?php }
?><?php if ($mantra_caption != "Light") { ?> #content .wp-caption { <?php }
?><?php if ($mantra_caption == "White") { ?> background-color:#FFF;}
 <?php } else if ($mantra_caption == "Light Gray") {?> background-color:#EEE; }
 <?php } else if ($mantra_caption == "Gray") {?> background-color:#CCC;}
 <?php } else if ($mantra_caption == "Dark Gray") {?> background-color:#444;color:#CCC;}
 <?php } else if ($mantra_caption == "Black") {?> background-color:#000;color:#CCC;}
<?php }
?><?php if ($mantra_contentlist == "Hide") { ?> #content ul li { background-image:none ; padding-left:0;} <?php }
?><?php if ($mantra_title == "Hide") { ?> #site-title, #site-description { visibility:hidden;} <?php }
?><?php if ($mantra_comtext == "Hide") { ?> #respond .form-allowed-tags { display:none;} <?php }
?><?php if ($mantra_tables == "Enable") { ?> #content table {border:none;} #content tr {background:none;} #content table {border:none;} #content tr th,
#content thead th {background:none;} #content tr td {border:none;}<?php }

?><?php if ($mantra_headfontsize != "Default") { ?> h2.entry-title { font-size:<?php echo $mantra_headfontsize; ?> !important ;}<?php }
?><?php if ($mantra_sidefontsize != "Default") { ?> .widget-area a:link, .widget-area a:visited { font-size:<?php echo $mantra_sidefontsize; ?> ;}<?php }

?><?php if ($mantra_backcolor != "444444") { ?> body { background-color:<?php echo $mantra_backcolor; ?> !important ;}<?php }
?><?php if ($mantra_headercolor != "333333") { ?> #header { background-color:<?php echo $mantra_headercolor; ?> !important ;}<?php }
?><?php if ($mantra_prefootercolor != "222222") { ?> #footer { background-color:<?php echo $mantra_prefootercolor; ?> !important ;}<?php }
?><?php if ($mantra_footercolor != "171717") { ?> #footer2 { background-color:<?php echo $mantra_footercolor; ?> !important ;}<?php }
?><?php if ($mantra_titlecolor != "0D85CC") { ?> #site-title span a { color:<?php echo $mantra_titlecolor; ?> !important ;}<?php }
?><?php if ($mantra_descriptioncolor != "0D85CC") { ?> #site-description { color:<?php echo $mantra_descriptioncolor; ?> !important ;}<?php }
?><?php if ($mantra_contentcolor != "333333") { ?> #content p, #content ul, #content ol { color:<?php echo $mantra_contentcolor; ?> !important ;}<?php }
?><?php if ($mantra_linkscolor != "0D85CC") { ?> a, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6,#searchform #s:hover , #container #s:hover, #site-title a:hover, #access a:hover { color:<?php echo $mantra_linkscolor; ?> !important ;}<?php }
?><?php if ($mantra_hovercolor != "333333") { ?> a:hover { color:<?php echo $mantra_hovercolor; ?> !important ;}<?php }
?><?php if ($mantra_headtextcolor != "333333") { ?> #content .entry-title a { color:<?php echo $mantra_headtextcolor; ?> !important ;}<?php }
?><?php if ($mantra_headtexthover != "000000") { ?> #content .entry-title a:hover { color:<?php echo $mantra_headtexthover; ?> !important ;}<?php }
?><?php if ($mantra_sideheadbackcolor != "444444") { ?> .widget-title { background-color:<?php echo $mantra_sideheadbackcolor; ?> !important ;}<?php }
?><?php if ($mantra_sideheadtextcolor != "2EA5FD") { ?> .widget-title { color:<?php echo $mantra_sideheadtextcolor; ?> !important ;}<?php }

?><?php if (1) { ?> #footer-widget-area .widget-title { color:<?php echo $mantra_footerheader; ?> !important ;}<?php }
?><?php if (1) { ?> #footer-widget-area a { color:<?php echo $mantra_footertext; ?> !important ;}<?php }
?><?php if (1) { ?> #footer-widget-area a:hover { color:<?php echo $mantra_footerhover; ?> !important ;}<?php }

?><?php if ($mantra_pin != "Pin2") { ?> #content .wp-caption { background-image:url(<?php echo get_template_directory_uri()."/images/pins/".$mantra_pin; ?>.png) !important ;} <?php }
?><?php if ($mantra_sidebullet != "arrow_white") { ?>.widget-area ul ul li{ background-image:url(<?php echo get_template_directory_uri()."/images/bullets/".$mantra_sidebullet; ?>.png) !important;
<?php if($mantra_sidebullet == "folder_black" || $mantra_sidebullet == "folder_light") {?> padding-top:5px;padding-left:20px; } <?php } ?><?php }

?><?php if ($mantra_pagetitle == "Hide") { ?> .page h1.entry-title { display:none;} <?php }
?><?php if ($mantra_categtitle == "Hide") { ?> h1.page-title { display:none;} <?php }
?><?php if (($mantra_postdate == "Hide" && $mantra_postcateg == "Hide") || ($mantra_postauthor == "Hide" && $mantra_postcateg == "Hide") ) { ?>.bl_sep {display:none;} <?php }
?><?php if ($mantra_postdate == "Hide") { ?> span.entry-date, span.onDate {display:none;} <?php }
?><?php if ($mantra_postauthor == "Hide") { ?> .author {display:none;} <?php }
?><?php if ($mantra_postcateg == "Hide") { ?> span.bl_categ {display:none;} <?php }
?><?php if ($mantra_postbook == "Hide") { ?>  span.bl_bookmark {display:none;} <?php }
?><?php if ($mantra_parindent != "0px") { ?>  p {text-indent:<?php echo $mantra_parindent;?> ;} <?php }
?><?php if ($mantra_posttime == "Hide") { ?>  .entry-time {display:none;} <?php } ?>
</style>

<?php  }

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



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'mantra' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to mantra_header_image_width and mantra_header_image_height to change these values.
	global $mantra_hheight;
	$mantra_hheight=(int)$mantra_hheight;
	global $totalSize;
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'mantra_header_image_width', $totalSize ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'mantra_header_image_height', $mantra_hheight) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the same size as the header.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See mantra_admin_header_style(), below.
	add_custom_image_header( '', 'mantra_admin_header_style' );

	// ... and thus ends the changeable header business.

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
 * @since Twenty Ten 1.0
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
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
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
		'name' => __( 'Primary Widget Area', 'mantra' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'mantra' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'mantra' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'mantra' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'mantra' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'mantra' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
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
		$posted_in =  '<span class="bl_posted">'.__( 'Tagged','mantra').' %2$s.</span><span class="bl_bookmark">'.__('Bookmark the ','mantra').' <a href="%3$s" title="Permalink to %4$s" rel="bookmark"> '.__('permalink','mantra').'</a>.</span>';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = '<span class="bl_bookmark">'.__( 'Bookmark the ','mantra'). ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">'.__('permalink','mantra').'</a>.</span>';
	} else {
		$posted_in = '<span class="bl_bookmark">'.__( 'Bookmark the ','mantra'). ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">'.__('permalink','mantra').'</a>.</span>';
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

function get_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = "/images/default.jpg";
}
return $first_img;
}

