<?php

//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////

if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}



//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////

if ( ! function_exists( 'aster_theme_setup' ) ) :

function aster_theme_setup() {

	// Localization support
	load_theme_textdomain( 'aster', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Title Tag
	add_theme_support( 'title-tag' );

	// Register navigation menu
	register_nav_menus( 
		array(
			'main-menu' 		=> __( 'Primary Menu','aster' )
		) );


	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aster_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Post Formats
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumbnails', 750, 450, TRUE );
	add_image_size('recent-post', 110, 80, TRUE);

}
endif; // aster_theme_setup

add_action( 'after_setup_theme', 'aster_theme_setup' );



// SoundCloud
add_filter('oembed_fetch_url', 'aster_soundcloud_no_width', 10, 3);
function aster_soundcloud_no_width($provider, $url, $args) {
	if ( 'soundcloud.com' == parse_url( $url, PHP_URL_HOST ) ) {
		$provider = remove_query_arg( 'maxwidth', $provider );
	}
	return $provider;
}


//////////////////////////////////////////////////////////////////
// Register widget
//////////////////////////////////////////////////////////////////

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'aster' ),
		'id'            => 'blog-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title text-uppercase">',
		'after_title'   => '</h1>',
	) );
}



//////////////////////////////////////////////////////////////////
// Enqueue scripts and styles.
//////////////////////////////////////////////////////////////////

function aster_all_scripts_and_css() {
	
	// CSS File
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6', 'all');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.4.0', 'all');
	wp_enqueue_style('slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.css', array(), NULL);
	wp_enqueue_style( 'aster-stylesheet', get_stylesheet_uri() );
	wp_enqueue_style('aster-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), NULL);

	// Google Fonts
	wp_enqueue_style( 'google-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), NULL );

	// JS Files
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.6', TRUE );
	wp_enqueue_script( 'jquery-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), '0.9.9', TRUE );
	wp_enqueue_script( 'jquery-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), NULL, TRUE );
	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '1.1', TRUE );
	wp_enqueue_script( 'jquery-masonry', get_template_directory_uri() . '/assets/js/masonry.min.js', array('jquery'), '3.3.2', TRUE );
	wp_enqueue_script( 'aster-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), NULL, TRUE );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aster_all_scripts_and_css' );



//////////////////////////////////////////////////////////////////
// Woocommerce support
//////////////////////////////////////////////////////////////////

add_action( 'after_setup_theme', 'aster_woocommerce_support' );
function aster_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}



//////////////////////////////////////////////////////////////////
// Widget categories post counter
//////////////////////////////////////////////////////////////////

function aster_categories_post_count_filter ($cat_post_count) {
	$cat_post_count = str_replace('(', '<span class="post_count pull-right"> (', $cat_post_count);
	$cat_post_count = str_replace(')', ' )</span>', $cat_post_count);
	return $cat_post_count;
}
add_filter('wp_list_categories','aster_categories_post_count_filter');


//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
function aster_custom_excerpt_length( $length ) {
	return 46;
}
add_filter( 'excerpt_length', 'aster_custom_excerpt_length', 999 );

function aster_new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'aster_new_excerpt_more' );



//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

if(!function_exists('aster_comment')):

	function aster_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e('Pingback:', 'aster'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'aster' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body media">
				
					<div class="comment-avartar pull-left">
						<?php
							echo get_avatar( $comment, $args['avatar_size'] );
						?>
					</div>
					<div class="comment-context media-body">
						<div class="comment-head">
							<?php
								printf( '<h3 class="comment-author">%1$s</h3>',
									get_comment_author_link());
							?>
							<span class="comment-date"><?php echo get_comment_date() ?></span>
						</div>

						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.',
								'aster' ); ?></p>
						<?php endif; ?>

						<div class="comment-content">
							<?php comment_text(); ?>
						</div>

						<?php edit_comment_link( __( 'Edit', 'aster' ), '<span class="edit-link">', '</span>' ); ?>
						<span class="comment-reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'aster'
							), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span>

					</div>
				
			</div>
		<?php
			break;
		endswitch; 
	}

endif;



//////////////////////////////////////////////////////////////////
// Add Extra Fields In User Profile
//////////////////////////////////////////////////////////////////

function aster_modify_user_contact_profile($profile_fields) {

	// Add new fields
	$profile_fields['facebook'] = __('Facebook URL', 'aster');
	$profile_fields['twitter'] = __('Twitter URL', 'aster');
	$profile_fields['gplus'] = __('Google+ URL', 'aster');
	$profile_fields['linkedin'] = __('Linkedin URL', 'aster');
	$profile_fields['tumblr'] = __('Tumblr URL', 'aster');
	$profile_fields['pinterest'] = __('Pinterest URL', 'aster');

	return $profile_fields;
}
add_filter('user_contactmethods', 'aster_modify_user_contact_profile');



//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Customizer
include('inc/customizer/customizer_settings.php');
include('inc/customizer/color_customize.php');


//Custom Widgets 
require_once get_template_directory()  . '/inc/widgets/blog-posts.php';
require_once get_template_directory()  . '/inc/widgets/social-icons.php';
require_once get_template_directory()  . '/inc/widgets/about_widget.php';

// Custom template tags for this theme.
require_once get_template_directory() . '/inc/template-tags.php';



