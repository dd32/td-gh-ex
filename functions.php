<?php
require_once('theme-option/fasterthemes.php');
/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}
// Adding breadcrumbs
function redpro_breadcrumbs() {
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
function redpro_title() {
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
/* redpro Theme Starts */
if ( ! function_exists( 'redpro_setup' ) ) :
function redpro_setup() {
	/*
	 * Make redpro theme available for translation.
	 *
	 */
	load_theme_textdomain( 'redpro', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', redpro_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'redpro-full-width', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'redpro' ),		
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list') );
	/*
	 * Enable support for Post Formats.
	 */
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'redpro_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'redpro_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // redpro_setup
add_action( 'after_setup_theme', 'redpro_setup' );
// Implement Custom Header features.
require get_template_directory() . '/functions/custom-header.php';
/**
 * Register Lato Google font for redpro.
 *
 */
function redpro_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'redpro' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}

/**
 * Filter the page title.
 **/
function redpro_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'redpro' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'redpro_wp_title', 10, 2 );

if ( ! function_exists( 'redpro_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 **/
function redpro_entry_meta() {

	$category_list = get_the_category_list( __( ', ', 'redpro' ) );

	$tag_list = get_the_tag_list( '', __( ', ', 'redpro' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'redpro' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $tag_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'redpro' );
	} elseif ( $category_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'redpro' );
	} else {
		$utility_text = __( '<div class="post-category"> Posted on : %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'redpro' );
	}

	printf(
		$utility_text,
		$category_list,
		$tag_list,
		$date,
		$author
	);
}

endif;

/**********************************/
function redpro_special_nav_class( $classes, $item )
{
   
        $classes[] = 'special-class';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'redpro_special_nav_class', 10, 2 );
/**
 * Register redpro widget areas.
 *
 */
function redpro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'redpro' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'redpro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'redpro' ),
		'id' => 'footer-sidebar',
		'description' => __( 'Appears on footer side', 'redpro' ),
		'before_widget' => '<aside id="%1$s" class="col-md-3 footer-separator %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	) );
}
add_action( 'widgets_init', 'redpro_widgets_init' );
/* redpro Theme End */
/*
 * Add Active class to Wp-Nav-Menu
*/ 
function redpro_active_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'redpro_active_nav_class' , 10 , 2);
function redpro_add_nav_class($output) {
	
    $output= preg_replace('/<ul/', '<ul class="list-unstyled widget-list"', $output);
    return $output;
}
add_filter('wp_list_categories', 'redpro_add_nav_class');
/*
 * Replace Excerpt [...] with Read More
**/
function redpro_read_more( ) {
return ' ... <a class="more" href="'. get_permalink( get_the_ID() ) . '">Read more</a>';
 }
add_filter( 'excerpt_more', 'redpro_read_more' ); 
/**
 * Enqueues scripts and styles for front-end.
 */
function redpro_scripts_styles() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.0.1');
	wp_enqueue_script( 'function', get_template_directory_uri() . '/js/function.js', array('jquery'), '1.0.0');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'redpro_scripts_styles' );
if ( ! function_exists( 'redpro_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own redpro_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function redpro_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'redpro' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'redpro' ), '<span class="edit-link">', '</span>' ); ?>
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
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author ', 'redpro' ) . '</span>' : ''
                            );
						?>
      <?php
                            
                            echo ' '.get_comment_date().'</b>';
							echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'redpro' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</a>';
							
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
function redpro_add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
$divclass = $matches[1];
$toreplace = array('<div class="'.$divclass.'">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right"', $new_markup);
return $new_markup; }
add_filter('wp_page_menu', 'redpro_add_menuid');
/**
 * redpro custom pagination for posts 
 */
function redpro_paginate($pages = '', $range = 1)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='pagination-previous-all'><a href='".get_pagenum_link(1)."'><span class='sprite previous-all-icon'><<</span></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li class='pagination-previous'><a href='".get_pagenum_link($paged - 1)."'><span class='sprite previous-icon'><</span></a></li>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li class='pagination-next'><a href='".get_pagenum_link($paged + 1)."'><span class='sprite next-icon'>></span></a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='pagination-next-all'><a href='".get_pagenum_link($pages)."'><span class='sprite next-all-icon'>>></span></a></li>";
         echo "</div>\n";
     }
}