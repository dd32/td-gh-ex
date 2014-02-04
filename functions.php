<?php
require_once('theme-option/fasterthemes.php');
/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

// Adding breadcrumbs
function RedPro_breadcrumbs() {
 echo '<li><a href="';
 //echo get_option('home');
 echo home_url(); 
 echo '">Home';
 echo "</a></li>";
  if (is_category() || is_single()) {
   if(is_category())
   {
    echo "<li class='active'>";
   the_category(' &bull; ');
   echo "</li>";
   }
   
    if (is_single()) {
   echo "<li>";
   $category = get_the_category();
   echo '<a rel="category" title="View all posts in '.$category[0]->cat_name.'" href="'.site_url().'/?cat='.$category[0]->term_id.'">'.$category[0]->cat_name.'</a>';
   echo "</li>";
     echo "<li class='active'>";
     the_title();
     echo "</li>";
    }
        } elseif (is_page()) {
            echo "<li class='active'>";
            echo the_title();
   echo "</li>";
  } elseif (is_search()) {
            echo "<li class='active'>Search Results for... ";
   echo '"<em>';
   echo the_search_query();
   echo '</em>"';
   echo "</li>";
        }
    }


//fetch title
function RedPro_title() {
	  if (is_category() || is_single())
	  {
	   if(is_category())
		  the_category();
	   if (is_single())
		 the_title();
	   }
	   elseif (is_page()) 
		  the_title();
	   elseif (is_search())
		   echo the_search_query();
    }
/* RedPro Theme Starts */

if ( ! function_exists( 'RedPro_setup' ) ) :
function RedPro_setup() {

	/*
	 * Make RedPro theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'RedPro', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', RedPro_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'RedPro-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'RedPro' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'RedPro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list') );

	/*
	 * Enable support for Post Formats.
	 */
	//add_theme_support( 'post-formats', array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'RedPro_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'RedPro_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'RedPro_setup' );

// Implement Custom Header features.
require get_template_directory() . '/functions/custom-header.php';


/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function RedPro_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'RedPro' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**********************************/

function my_special_nav_class1( $classes, $item )
{
    /*if( is_single() && $item->title == 'Blog' )
    {*/
        $classes[] = 'special-class';
    //}
    return $classes;
}
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );

function my_special_nav_class( $classes, $item )
{
    /*if( is_single() && $item->title == 'Blog' )
    {*/
        $classes[] = 'special-class';
    //}
    return $classes;
}
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );

/**
 * Register RedPro widget areas.
 *
 */
function RedPro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'RedPro' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'RedPro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'RedPro' ),
		'id' => 'footer-sidebar',
		'description' => __( 'Appears on footer side', 'RedPro' ),
		'before_widget' => '<aside id="%1$s" class="col-md-3 footer-separator %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	) );
}
add_action( 'widgets_init', 'RedPro_widgets_init' );


/* RedPro Theme End */

/*
 * Add Active class to Wp-Nav-Menu
*/ 
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


function add_nav_class($output) {
	
    $output= preg_replace('/<ul/', '<ul class="list-unstyled widget-list"', $output);
    return $output;
}
add_filter('wp_list_categories', 'add_nav_class');


/*
 * Replace Excerpt [...] with Read More
**/

function new_excerpt_more( ) {
return ' ... <a class="more" href="'. get_permalink( get_the_ID() ) . '">Read more</a>';
 }
add_filter( 'excerpt_more', 'new_excerpt_more' ); 

/**
 * Enqueues scripts and styles for front-end.
 */
function RedPro_scripts_styles() {
	
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery-1.10.2.min.js', get_template_directory_uri() . '/js/jquery-1.10.2.min.js', '', '1.10.2', 0);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', 0);
	wp_enqueue_script( 'function', get_template_directory_uri() . '/js/function.js', '', '', 0);
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', '', '1.0');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '3.0.3');
	wp_enqueue_script('RedPro', get_template_directory_uri() . '/js/RedPro.js', '', '1.0');
}
add_action( 'wp_enqueue_scripts', 'RedPro_scripts_styles' );

if ( ! function_exists( 'RedPro_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own RedPro_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function RedPro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'RedPro' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'RedPro' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
</li>
<?php
			break;
		default :
		// Proceed with normal comments.
		if($comment->comment_approved==1)
		{
		global $post;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment col-md-12 margin-top-bottom">
    <figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
    <div class="txt-holder">
      <?php
                            printf( '<b class="fn">%1$s',
                                get_comment_author_link(),
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author ', 'RedPro' ) . '</span>' : ''
                            );
						?>
      <?php
                            
                            echo ' '.get_comment_date().'</b>';
							echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'RedPro' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</a>';
							
                        ?>
      <div class="comment-content comment">
        <?php comment_text(); ?>
      </div>
      <!-- .comment-content --> 
    </div>
    <!-- .txt-holder --> 
  </article>
  <!-- #comment-## -->
  <?php
		}
		break;
	endswitch; // end comment_type check
}
endif;


/**
 * Add default menu style if menu is not set from the backend.
 */
function add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
$divclass = $matches[1];
$toreplace = array('<div class="'.$divclass.'">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right"', $new_markup);
return $new_markup; }

add_filter('wp_page_menu', 'add_menuid');

/**
 * Disable the Admin Bar from front end. 
 */
add_filter( 'show_admin_bar', '__return_false' );
function RedPro_hide_admin_bar_settings() {
?>
  <style type="text/css">
		.show-admin-bar {
			display: none;
		}
	</style>
  <?php
}

function RedPro_disable_admin_bar() {
    add_filter( 'show_admin_bar', '__return_false' );
    add_action( 'admin_print_scripts-profile.php', 
         'RedPro_hide_admin_bar_settings' );
}
add_action( 'init', 'RedPro_disable_admin_bar' , 9 );

/**
 * RedPro custom pagination for posts 
 */
function RedPro_paginate_links( $args = '' ) {
	$defaults = array(
		'base' => '%_%', // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
		'format' => '?page=%#%', // ?page=%#% : %#% is replaced by the page number
		'total' => 1,
		'current' => 0,
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => __('&laquo; Previous','RedPro'),
		'next_text' => __('Next &raquo;','RedPro'),
		'end_size' => 1,
		'mid_size' => 2,
		'type' => 'plain',
		'add_args' => false, // array of query args to add
		'add_fragment' => ''
	);

	$args = wp_parse_args( $args, $defaults );
	extract($args, EXTR_SKIP);

	// Who knows what else people pass in $args
	$total = (int) $total;
	if ( $total < 2 )
		return;
	$current  = (int) $current;
	$end_size = 0  < (int) $end_size ? (int) $end_size : 1; // Out of bounds?  Make it the default.
	$mid_size = 0 <= (int) $mid_size ? (int) $mid_size : 2;
	$add_args = is_array($add_args) ? $add_args : false;
	$r = '';
	$page_links = array();
	$n = 0;
	$dots = false;

	if ( $prev_next && $current && 1 < $current ) :
		$link = str_replace('%_%', 2 == $current ? '' : $format, $base);
		$link = str_replace('%#%', $current - 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<li class="prev_page"><a class="prev page-numbers custom_page_link" href="' . esc_url( apply_filters( 'RedPro_paginate_links', $link ) ) . '">' . $prev_text . '</a></li>';
	endif;
	for ( $n = 1; $n <= $total; $n++ ) :
		$n_display = number_format_i18n($n);
		if ( $n == $current ) :
			$page_links[] = "<li><a class='active-page-pick'>".$n_display."</a></li>";
			$dots = true;
		else :
			if ( $show_all || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
				$link = str_replace('%_%', 1 == $n ? '' : $format, $base);
				$link = str_replace('%#%', $n, $link);
				if ( $add_args )
					$link = add_query_arg( $add_args, $link );
				$link .= $add_fragment;
				$page_links[] = "<li><a class='page-numbers custom_page_link' href='" . esc_url( apply_filters( 'RedPro_paginate_links', $link ) ) . "'>$n_display</a></li>";
				$dots = true;
			elseif ( $dots && !$show_all ) :
				$page_links[] = '<li><span class="page-numbers dots custom_page_link">' . __e( '&hellip;','RedPro' ) . '</span><li>';
				$dots = false;
			endif;
		endif;
	endfor;
	if ( $prev_next && $current && ( $current < $total || -1 == $total ) ) :
		$link = str_replace('%_%', $format, $base);
		$link = str_replace('%#%', $current + 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<li class="next_page"><a class="next page-numbers custom_page_link" href="' . esc_url( apply_filters( 'RedPro_paginate_links', $link ) ) . '">' . $next_text . '</a></li>';
	endif;
	switch ( $type ) :
		case 'array' :
			return $page_links;
			break;
		case 'list' :
			$r .= "<ul class='page-numbers'>\n\t<li>";
			$r .= join("</li>\n\t<li>", $page_links);
			$r .= "</li>\n</ul>\n";
			break;
		default :
			$r = join("\n", $page_links);
			break;
	endswitch;
	return $r;
}
