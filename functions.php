<?php
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'editor-style', get_stylesheet_uri() );
  if(get_option('thread_comments')) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* commodore baw hack wp title for home */
add_filter( 'wp_title', 'commodore_baw_hack_wp_title_for_home' );
function commodore_baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    get_bloginfo( 'name','commodore' )  . ' | ' . get_bloginfo( 'description','commodore' );
  }
  return $title;
}

/* commodore register sidebars */
function commodore_register_sidebars() {
	register_sidebar(
		array(
			'name' => __('Sidebar','commodore'),
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<header><h3 class="widgettitle">',
			'after_title' => '</h3></header>'
		)
	);
}
add_action( 'widgets_init', 'commodore_register_sidebars' );

/* Sets up theme defaults and registers support for various WordPress features */
if ( ! function_exists( 'commodore_setup' ) ) :
	function commodore_setup() {
		load_theme_textdomain( 'commodore', get_template_directory() . '/languages' );
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background');
		add_theme_support('custom-header');
		add_theme_support('title-tag');
		add_editor_style(); // hack to add a class to the body tag when the sidebar is active
		register_nav_menus( array(
  			'header-menu' => esc_html__( 'Header Menu','commodore' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'commodore_setup' );




if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
}

/* commodore terminally has sidebar */
function commodore_terminally_has_sidebar($classes) {	if (is_active_sidebar('sidebar')) {		// add 'class-name' to the $classes array
$classes[] = 'has_sidebar';			}	// return the $classes array
return $classes;}
add_filter('body_class','commodore_terminally_has_sidebar');

function commodore_scripts() {
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/flipcursor.js', array ( 'jquery' ), 1.1, true);
}
add_action('wp_enqueue_scripts','commodore_scripts');

function filter_search($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');


/* commodore search form */

/* Enqueue scripts */

if ( ! isset( $content_width ) ) $content_width = 550;

?>
