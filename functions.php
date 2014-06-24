<?php

// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 860;

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'airballoon_enqueue_scripts');

if ( ! function_exists( 'airballoon_enqueue_scripts' ) ):
function airballoon_enqueue_scripts() {

	// Get Theme Options from Database
	$theme_options = airballoon_theme_options();
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style('airballoon-lite-stylesheet', get_stylesheet_uri());

	// Register Genericons
	wp_enqueue_style('airballoon-lite-genericons', get_template_directory_uri() . '/css/genericons.css');

	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( isset($theme_options['slider_activated']) and $theme_options['slider_activated'] == true ) :

		// FlexSlider CSS
		wp_enqueue_style('airballoon-lite-flexslider', get_template_directory_uri() . '/css/flexslider.css');

		// FlexSlider JS
		wp_enqueue_script('airballoon-lite-jquery-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'));

		// Register and enqueue slider.js
		wp_enqueue_script('airballoon-lite-jquery-frontpage_slider', get_template_directory_uri() .'/js/slider.js', array('airballoon-lite-jquery-flexslider'));

	endif;

	// Register and enqueue navigation.js
	wp_enqueue_script('airballoon-lite-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// Register and Enqueue default fonts
	wp_enqueue_style('airballoon-lite-default-font', '//fonts.googleapis.com/css?family=Muli');
	wp_enqueue_style('airballoon-lite-title-font', '//fonts.googleapis.com/css?family=Istok+Web');
	
}
endif;

// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'airballoon_enqueue_comment_reply' );

function airballoon_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'airballoon_setup' );

if ( ! function_exists( 'airballoon_setup' ) ):
function airballoon_setup() {

	// init Localization
	load_theme_textdomain('airballoon-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'eeeeee'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1260,
		'height' => 250,
		'flex-height' => true));

	// Register Navigation Menus
	register_nav_menu( 'primary', __('Main Navigation', 'airballoon-lite') );
	register_nav_menu( 'footer', __('Footer Navigation', 'airballoon-lite') );
	
	// Register Social Icons Menu
	register_nav_menu( 'social', __('Social Icons', 'airballoon-lite') );
	
	// Add Support for Excerpts on static pages
	add_post_type_support( 'page', 'excerpt' );

}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'airballoon_add_image_sizes' );

if ( ! function_exists( 'airballoon_add_image_sizes' ) ):
function airballoon_add_image_sizes() {

	// Add Custom Header Image Size
	add_image_size( 'custom_header_image', 1260, 250, true);

	// Add Featured Image Size
	add_image_size( 'featured_image', 300, 200, true);

	// Add Slider Image Size
	add_image_size( 'frontpage_slider_image', 1260, 380, true);
	
	// Add Slider Image Size
	add_image_size( 'frontpage_posts_image', 425, 240, true);
	
	// Add Widget Post Thumbnail Size
	add_image_size( 'widget_post_thumb', 75, 75, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'airballoon_register_sidebars' );

if ( ! function_exists( 'airballoon_register_sidebars' ) ):
function airballoon_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Sidebar', 'airballoon-lite' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except front page and fullwidth template.', 'airballoon-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	// Register Frontpage Template Widgets
	register_sidebar( array(
		'name' => __( 'Front Page First Row', 'airballoon-lite' ),
		'id' => 'frontpage-widgets-first',
		'description' => __( 'First three column horizontal widget area on front page template.', 'airballoon-lite' ),
		'before_widget' => '<div class="widget-col"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Front Page Second Row', 'airballoon-lite' ),
		'id' => 'frontpage-widgets-second',
		'description' => __( 'Second three column horizontal widget area on front page template.', 'airballoon-lite' ),
		'before_widget' => '<div class="widget-col"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
}
endif;


/*==================================== THEME FUNCTIONS ====================================*/

// Creates a better title element text for output in the head section
add_filter( 'wp_title', 'airballoon_wp_title', 10, 2 );

function airballoon_wp_title( $title, $sep = '' ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'airballoon-lite' ), max( $paged, $page ) );

	return $title;
}


// Add Default Menu Fallback Function
function airballoon_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Display Credit Link Function
function airballoon_credit_link() {
	
	printf(__( 'Powered by %1$s and %2$s.', 'airballoon-lite' ), 
			sprintf( '<a href="http://wordpress.org" title="WordPress">%s</a>', __( 'WordPress', 'airballoon-lite' ) ),
			sprintf( '<a href="http://themezee.com/themes/air-balloon/" title="Air Balloon WordPress Theme">%s</a>', __( 'Air Balloon Theme', 'airballoon-lite' ) )
		);
}


// Change Excerpt Length
add_filter('excerpt_length', 'airballoon_excerpt_length');
function airballoon_excerpt_length($length) {
    return 58;
}


// Slideshow Excerpt Length
function airballoon_slideshow_excerpt_length($length) {
    return 8;
}


// Frontpage Posts Excerpt Length
function airballoon_frontpage_posts_excerpt_length($length) {
    return 20;
}


// Change Excerpt More
add_filter('excerpt_more', 'airballoon_excerpt_more');
function airballoon_excerpt_more($more) {
    return '';
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'airballoon_list_comments' ) ):
function airballoon_list_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'airballoon-lite' ); ?> <?php comment_author_link(); ?>
			<?php edit_comment_link( __( '(Edit)', 'airballoon-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</p>

	<?php else : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 56 ); ?>
					<?php printf(__('<span class="fn">%s</span>', 'airballoon-lite'), get_comment_author_link()) ?>
				</div>

		<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'airballoon-lite' ); ?></p>
		<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'airballoon-lite'), get_comment_date(),  get_comment_time()) ?></a>
					<?php edit_comment_link(__('(Edit)', 'airballoon-lite'),'  ','') ?>
				</div>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

			</div>
<?php
	endif;

}
endif;


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );
require( get_template_directory() . '/inc/customizer/frontend/custom-jscript.php' );

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-frontpage-services.php' );

?>