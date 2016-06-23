<?php
/**
 * beka functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beka
 */

if ( ! function_exists( 'beka_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beka_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on beka, use a find and replace
	 * to change 'beka' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beka', get_template_directory() . '/languages' );

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
    add_image_size( 'beka-featured', 750, 490, true );
    add_image_size( 'beka-grid', 360, 260, true );
    add_image_size( 'beka-author', 262, 274, true );
    add_image_size( 'beka-widget', 108, 78, true );
    add_image_size( 'beka-slider', 878, 635, true );
    add_image_size( 'beka-sliderfull', 1140, 635, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'beka' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

     /*
  * Enable support for custom logo.
  *
  *  @since Fresh Recipes 1.1
  */
    add_theme_support( 'custom-logo', array(
       'height'      => 60,
       'width'       => 175,
       'flex-width' => true,
    ) );
    
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beka_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'beka_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beka_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beka_content_width', 750 );
}
add_action( 'after_setup_theme', 'beka_content_width', 0 );

/**
 * Load Google Web Fonts.
 *
 */
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Playfair+Display:400,700|Caveat:400,700|Signika:400,300,600,700', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beka_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'beka' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'beka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'beka_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beka_scripts() {
	wp_enqueue_style( 'beka-style', get_stylesheet_uri() );
    
	wp_enqueue_style( 'beka-fonts', get_stylesheet_directory_uri() . '/themify-icons.css' );
    
	wp_enqueue_style( 'beka-responsive', get_stylesheet_directory_uri() . '/responsive.css' );

	wp_enqueue_script( 'beka-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'beka-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beka_scripts' );

/**
 * Add Span tag Around Categories and Archives Post Count.
 */
if(!function_exists('ft_cat_count')){ 
	function ft_cat_count($links) {
		return str_replace(array('</a> (',')'), array('<span class="cat-count">(',')</span></a>'), $links);
	}
}
add_filter('wp_list_categories', 'ft_cat_count');

if(!function_exists('ft_archive_count')){ 
	function ft_archive_count($links) {
	  	return str_replace(array('</a>&nbsp;(',')'), array('<span class="cat-count">(',')</span></a>'), $links);
	}
}
add_filter('get_archives_link', 'ft_archive_count');

/**
 * Exceprt Length and Filter.
 */
// Limit the Length of Excerpt
function ft_excerpt_length( $length ) {
	if ( get_theme_mod( 'ft_excerpt_length' ) ) {
		$excerpt_length = get_theme_mod( 'ft_excerpt_length', '42' );
	} else {
		$excerpt_length = '42';
	}
	
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'ft_excerpt_length', 999 );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Remove […] string
function ft_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'ft_excerpt_more');

// Add Shortcodes in Excerpt Field
add_filter( 'get_the_excerpt', 'do_shortcode');

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

/**
 * Load Widgets
 */
// Theme Functions
include("inc/widget-about.php"); // About Us Widget
include("inc/widget-recent-posts.php"); // Recent Posts Widget
include("inc/widget-260.php"); //  Ad Widget

function beka_custom_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    }
    else {
        if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
        endif;

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
        <?php
        endif;
    }
}

/**
 * Comments Callback
 */
function ft_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
    ?>
	<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-author vcard" >
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment->comment_author_email, 107 ); ?>
        </div>
        <div class="commentBody">
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __(' Reply','beka')))) ?>
            </div>
            
            <span class="comment-meta">
                <?php printf(__('<span class="fn"><span>%s</span></span>','beka'), get_comment_author_link()) ?>
                <time itemprop="commentTime" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>">
                <?php
                    printf( __('%1$s at %2$s','beka'), get_comment_date(),  get_comment_time())
                ?>
                </time>
                <?php edit_comment_link(__('(Edit)','beka'),'  ','' );?>
            </span>

            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','beka') ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-content">
                <?php comment_text() ?>
            </div>
        </div><!--.commentBody-->
	</div>
    <?php
}
//Post Navigation
if ( ! function_exists( 'beka_post_nav' ) ) :
/**
* Display navigation to next/previous post when applicable.
*/
function beka_post_nav() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );    if ( ! $next && ! $previous ) {
        return;
    }    ?>
    <nav class="navigation post-navigation textcenter clearfix" role="navigation">
        <?php
        if ( is_attachment() ) :
            next_post_link('<div class=" post-nav-links prev-link-wrapper"><div class="next-link"><span class="uppercase">'. __("Published In","beka") .'</span> %link'."</div></div>");
        else :            
            $prev_post = get_previous_post();
            
            $next_post = get_next_post();
            previous_post_link('<div class="post-nav-links prev-link-wrapper"><div class="post-nav-link-bg"></div><div class="prev-link"><span class="uppercase"><span class="ti-arrow-circle-left"></span> &nbsp;'. __("Previous Article","beka").'</span><div class="nav-title"> %link</div>'."</div></div>");
            next_post_link('<div class="post-nav-links next-link-wrapper"><div class="post-nav-link-bg"></div><div class="next-link"><span class="uppercase">'. __("Next Article","beka") .' &nbsp;<span class="ti-arrow-circle-right"></span></span> <div class="nav-title"> %link</div>'."</div></div>");
        endif;
        ?>
    </nav><!-- .navigation -->
    <?php
}
endif;