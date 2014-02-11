<?php
ob_start();
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
include_once('baztro.php');
function promax_scripts() {
	wp_enqueue_style( 'promax-style', get_stylesheet_uri() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'promax_scripts' );

if ( ! isset( $content_width ) )
	$content_width = 770;


	/*
	* Home Icon for Menu
	*/
	
function promax_hdmenu() {	
		echo '<ul>';
		if ('page' != get_option('show_on_front')) {
		if (is_front_page())
$class = 'class="current_page_item home-icon"';
else
$class = 'class="home-icon"';
			echo '<li ' . $class . ' ><a href="'.esc_url(home_url()) . '/"><img src="'. get_template_directory_uri() . '/images/home.jpg" width="26" height="24" alt="Home"/></a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}

add_filter( 'wp_nav_menu_items', 'promax_home_link', 10, 2 );
function promax_home_link($items, $args) {
if (is_front_page() && $args->theme_location == 'primary')
$class = 'class="current_page_item home-icon"';
else
$class = 'class="home-icon"';
$homeMenuItem =
'<li ' . $class . '>' .
$args->before .
'<a href="' .esc_url(home_url( '/' )) . '" title="Home">' .
$args->link_before . '<img src="'. get_template_directory_uri() . '/images/home.jpg" width="26" height="24" alt="Home"/>' . $args->link_after .
'</a>' .
$args->after .
'</li>';
$items = $homeMenuItem . $items;
return $items;
}

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}

function promax_post_meta_data() {
	printf( __( '%2$s  %4$s', 'promax' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<span itemprop="datePublished" class="timestamp updated">%3$s</span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard" itemprop="author" itemtype="http://schema.org/Person"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'promax' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}

	
function promax_theme_setup() { 
		if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
	}	
		add_image_size( 'defaultthumb', 240, 190 );
		add_image_size( 'popularpost', 340, 135 );


	    load_theme_textdomain('promax', get_template_directory() . '/languages');
        add_editor_style();
        add_theme_support('automatic-feed-links');
		}
		register_nav_menus(
			array(
 				'promax-navigation' => __('Navigation', 'promax'),
 				'primary' => __('Primary', 'promax'),
				)		
		);
	$args = array( 'default-color' => 'ffffff', 
		); 
		add_theme_support( 'custom-background', $args ); 
	add_action( 'after_setup_theme', 'promax_theme_setup' );
	

/* Excerpt ********************************************/

    function promax_excerptlength_teaser($length) {
    return 10;
    }
    function promax_excerptlength_index($length) {
    return 25;
    }
    function promax_excerptmore($more) {
    return '...';
    }
    
    
    function promax_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);
 
    add_filter('excerpt_more', $more_callback);
   
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = ''.$output.'';
    echo $output;
    }

	

/* Widgets ********************************************/

    function promax_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'promax' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Bottom Menu 1', 'promax' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Bottom Menu 2', 'promax' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Bottom Menu 4', 'promax' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	
}
add_action('widgets_init', 'promax_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//
 
function promax_pagenavi() {
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
 if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since ProMax 1.6
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function promax_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'promax' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'promax_wp_title', 10, 2 );

ob_clean();
?>