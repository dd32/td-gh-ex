<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
include_once('baztro.php');

function optimize_scripts() {
	wp_enqueue_style( 'optimize-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'optimize_scripts' );


	
 function optimize_googlemeta() {
       	if (of_get_option('optimize_headad') != '') {
            echo '' . of_get_option('optimize_headad') . '' . "\n";
        } 
    }
add_action('wp_head', 'optimize_googlemeta');
	
	
function optimize_post_meta_data() {
	printf( __( '%2$s  %4$s', 'optimize' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<span itemprop="datePublished" class="timestamp updated">%3$s</span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard" itemprop="author" itemtype="http://schema.org/Person"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'optimize' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}
	
function optimize_theme_setup() { 

		add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
		set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails, 200 pixels wide by 200 pixels tall, hard crop mode
	
	    load_theme_textdomain('optimize', get_template_directory() . '/languages');
			 
        add_editor_style();
		
        add_theme_support('automatic-feed-links');
		
		register_nav_menu( 'primary', __( 'Navigation Menu', 'optimize' ) );
	$args = array(
	'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $args );
	/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ){
	$content_width = 770;}

	
	/* Excerpt ********************************************/

    function optimize_excerptlength_teaser($length) {
    return 10;
    }
    function optimize_excerptlength_index($length) {
    return 45;
    }
    function optimize_excerptmore($more) {
    return '...';
    }
    
    
    function optimize_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);
 
    add_filter('excerpt_more', $more_callback);
   
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = ''.$output.'';
    echo $output;    }
	
	}
add_action( 'after_setup_theme', 'optimize_theme_setup' );
	



	

/* Widgets ********************************************/

    function optimize_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));	
}
add_action('widgets_init', 'optimize_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//
 
function optimize_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '&#171; Prev';
  $args['next_text'] = 'Next &raquo;';
 
  if ($max > 1) echo '<div class="wp-pagenavi">';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Optimize 1.6
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function optimize_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'optimize' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'optimize_wp_title', 10, 2 );

?>