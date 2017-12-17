<?php
/**
 * appsetter functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package appsetter
 */

if ( ! function_exists( 'appsetter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function appsetter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on appsetter, use a find and replace
	 * to change 'appsetter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'appsetter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'appsetter-postview-large', 1560, 715, true);
	add_image_size( 'appsetter-frontpage-featured', 731, 508, true ); 
	add_image_size( 'appsetter-frontpage-list', 446, 256, true );
	add_image_size( 'appsetter-frontpage-mini', 351, 240, true );
	add_image_size( 'appsetter-sidebar-wide', 311, 140, true );	
	add_image_size( 'appsetter-thumb-square', 140, 140, array( 'center', 'center' ));
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'appsetter' ),
	) );
	register_nav_menus( array(
		'canvas2' => esc_html__( 'Canvas2', 'appsetter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'appsetter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'appsetter_setup' );

if ( ! function_exists( 'appsetter_custom_excerpt_length' ) ) :
	function appsetter_custom_excerpt_length( $length ) {
		return 24;
	}
	add_filter( 'excerpt_length', 'appsetter_custom_excerpt_length', 999 );
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function appsetter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'appsetter_content_width', 640 );
}
add_action( 'after_setup_theme', 'appsetter_content_width', 0 );

function appsetter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'appsetter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'appsetter' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer1', 'appsetter' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer2', 'appsetter' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer3', 'appsetter' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer4', 'appsetter' ),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Add widgets here.', 'appsetter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'appsetter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function appsetter_scripts() {
	
	wp_enqueue_style( 'appsetter-skeleton', get_template_directory_uri() . '/css/bootstrap.css');
	
	wp_enqueue_style( 'appsetter-slidebars', get_template_directory_uri() . '/css/slidebars.css');	

	wp_enqueue_style( 'appsetter-awesome', get_template_directory_uri() . '/css/font-awesome.css' );		
	
	wp_enqueue_style( 'appsetter-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'work-sans-font', get_template_directory_uri() . '/css/google.fonts.css' );

	wp_enqueue_script( 'appsetter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

		
	wp_enqueue_script( 'appsetter-skeleton-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'appsetter-slidebars', get_template_directory_uri() . '/js/slidebars.js', array(), '20151215', true );	
	
	wp_enqueue_script( 'appsetter-slidebars-init', get_template_directory_uri() . '/js/slidebars-init.js', array(), '20151215', true );					

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'appsetter_scripts' );
/**
 * Custom footer credits
 */
require get_template_directory() . '/inc/footer-credits.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'appsetter_posted_on_name' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function appsetter_posted_on_name() {
	
	global $post;
	$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
	$user_description = get_the_author_meta( 'user_description', $post->post_author );
	$user_mail = get_the_author_meta('user_email', $post->post_author);
	$user_link = get_the_author_meta('url', $post->post_author);

	$byline = sprintf(
		'<footer class="author_bio_section"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><p class="author_name">' . esc_html( get_the_author() ) . '</p></a></span><p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p><p><a href="' . $user_link .'" target="_blank" rel="external">Website</a></p></footer>'
	);

	echo '<span class="author-name">' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'appsetter_author_meta' ) ) :

	function appsetter_author_meta( $content ) {
		global $post;

		if ( is_single() && isset( $post->post_author ) ) {
			$display_name = get_the_author_meta( 'display_name', $post->post_author );

		if ( empty( $display_name ) )
			$display_name = get_the_author_meta( 'nickname', $post->post_author );
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			$user_website = get_the_author_meta('url', $post->post_author);
			$user_mailadd = get_the_author_meta('user_email', $post->post_author);
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
	 
		if ( ! empty( $display_name ) )
			$author_details = '<p class="author_name">' . $display_name . '</p>';

		if ( ! empty( $user_description ) )
			$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';
			$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';  

		if ( ! empty( $user_website ) ) {
			$author_details .= ' | <a href="mailto:' . $user_mailadd .' ">Contact</a> | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';

		} else { 
			$author_details .= '</p>';
		}
			$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
		}
		return $content;
	}
	
endif;

function appsetter_new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'appsetter_new_excerpt_more');

function appsetter_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'appsetter_theme_add_editor_styles' );

function appsetter_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

} 