<?php

/*==================================== THEME SETUP ====================================*/

// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'rubine_setup' );

function rubine_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 675;
		
	// init Localization
	load_theme_textdomain('rubine-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'f0f0f0'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1320,
		'height' => 240,
		'flex-height' => true));
		
	// Add theme support for Jetpack Featured Content
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'rubine_get_featured_content',
		'max_posts'  => 8
		)
	);

	// Register Navigation Menus
	register_nav_menus( array(
		'primary'   => __('Main Navigation', 'rubine-lite'),
		'secondary' => __('Top Navigation', 'rubine-lite'),
		'social' => __('Social Icons', 'rubine-lite'),
		) 
	);

}


// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'rubine_enqueue_scripts');

function rubine_enqueue_scripts() {

	// Register and Enqueue Stylesheet
	wp_enqueue_style('rubine-lite-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('rubine-lite-genericons', get_template_directory_uri() . '/css/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('rubine-lite-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// Passing Parameters to Navigation.js Javascript
	wp_localize_script( 'rubine-lite-jquery-navigation', 'rubine_navigation_params', array('menuTitle' => __('Menu', 'rubine-lite')) );
	
	// Register and Enqueue Font
	wp_enqueue_style('rubine-lite-default-font', '//fonts.googleapis.com/css?family=Carme');
	wp_enqueue_style('rubine-lite-default-title-font', '//fonts.googleapis.com/css?family=Francois+One');

}


// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'rubine_enqueue_comment_reply' );

function rubine_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


// Add custom Image Sizes
add_action( 'after_setup_theme', 'rubine_add_image_sizes' );

function rubine_add_image_sizes() {

	// Add Custom Header Image Size
	add_image_size( 'featured-header-image', 1320, 240, true);

	// Add Featured Image Size
	add_image_size( 'post-thumbnail', 375, 210, true);

	// Add Featured Image Size
	add_image_size( 'featured-content', 460, 220, true);

}


// Register Sidebars
add_action( 'widgets_init', 'rubine_register_sidebars' );

function rubine_register_sidebars() {

	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Sidebar', 'rubine-lite' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except front page and fullwidth template.', 'rubine-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

}


/*==================================== THEME FUNCTIONS ====================================*/

// Creates a better title element text for output in the head section
add_filter( 'wp_title', 'rubine_wp_title', 10, 2 );

function rubine_wp_title( $title, $sep = '' ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'rubine-lite' ), max( $paged, $page ) );

	return $title;
}


// Add Default Menu Fallback Function
function rubine_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function rubine_get_featured_content() {
	return apply_filters( 'rubine_get_featured_content', false );
}


// Check if featured posts exists
function rubine_has_featured_content() {
	return ! is_paged() && (bool) rubine_get_featured_content();
}


// Display Credit Link Function
function rubine_credit_link() {
	
	printf(__( 'Powered by %1$s and %2$s.', 'rubine-lite' ), 
			sprintf( '<a href="http://wordpress.org" title="WordPress">%s</a>', __( 'WordPress', 'rubine-lite' ) ),
			sprintf( '<a href="http://themezee.com/themes/rubine/" title="Rubine WordPress Theme">%s</a>', __( 'Rubine Theme', 'rubine-lite' ) )
		);

}


// Change Excerpt Length
add_filter('excerpt_length', 'rubine_excerpt_length');
function rubine_excerpt_length($length) {
    return 80;
}


// Slideshow Excerpt Length
function rubine_featured_content_excerpt_length($length) {
    return 15;
}


// Change Excerpt More
add_filter('excerpt_more', 'rubine_excerpt_more');
function rubine_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = rubine_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'rubine_list_comments' ) ) :
	
	function rubine_list_comments($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<div class="comment-body">
					<?php _e( 'Pingback:', 'rubine-lite' ); ?> <?php comment_author_link(); ?>
					<?php edit_comment_link( __( '(Edit)', 'rubine-lite' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

		<?php else : ?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

				<div class="comment-body clearfix">
				
					<div class="comment-meta clearfix">

						<div class="comment-author vcard">
							<?php echo get_avatar( $comment, 75 ); ?>
							<?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?>
						</div>
						
						<div class="commentmetadata">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date(); ?></a>
							<p><?php echo get_comment_time(); ?></p>
							<?php edit_comment_link(__('(Edit)', 'rubine-lite'),'  ','') ?>
						</div>
					
					</div>
				
					<div class="comment-content">

						<div class="comment-entry clearfix">
							<?php comment_text(); ?>
							
							<?php if ($comment->comment_approved == '0') : ?>
								<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'rubine-lite' ); ?></p>
							<?php endif; ?>
							
							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>

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

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// Include Featured Content class in case it does not exist yet (e.g. user has not Jetpack installed)
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

?>