<?php
require_once get_template_directory() . '/theme-option/ariniothemes.php';
/**
 * Set up the content width value based on the theme's design.
 */
 


 


/* avnii Theme Starts */
if ( ! function_exists( 'avnii_setup' ) ) :
function avnii_setup() {
	/*
	 * Make avnii theme available for translation.
	 *
	 */
	load_theme_textdomain( 'avnii', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style();
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails, and declare two sizes.
	 global $content_width;
if ( ! isset( $content_width ) )
     $content_width = 900; /* pixels */
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 798, 398, true );
	add_image_size( 'avnii-full-width', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'avnii' ),
		'secondary' => __( 'Secondary menu  for footer menu', 'avnii' ),		
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	
	/*
	 * Enable support for Post Formats.
	 */
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'avnii_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'avnii_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // avnii_setup
add_action( 'after_setup_theme', 'avnii_setup' );




function avnii_of_head_css() {
$options = get_option( 'arinio_theme_options' ); 
    $output = '';
    $custom_css = esc_attr($options['customcss']);
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'avnii_of_head_css');






// Adding breadcrumbs
function avnii_breadcrumbs() {
 echo '<li><a href="';
 //echo get_option('home');
 echo home_url(); 
 echo '">'. __('Home','avnii');
 echo "</a></li>";
 
if (is_attachment()) {
           echo "<li class='active'>". __('attachment:','avnii');
    
    
   
   echo "</li>";
        }
 
  if (is_category() || is_single()) {
   if(is_category())
   {
   echo "<li class='active'>". __('Category By:','avnii');
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
            echo "<li class='active'>". __('Search Results for...','avnii');
   echo '"<em>';
   echo the_search_query();
   echo '</em>"';
   echo "</li>";
        } elseif (is_tag()) { echo "<li class='active'>"; single_tag_title(); echo "</li>";}
		 elseif (is_day()) {echo"<li class='active'>". __('Archive for ','avnii'); the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='active'>". __('Archive for ','avnii'); the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='active'>". __('Archive for ','avnii'); the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='active'>". __('Author Archive for ','avnii'); printf(__(' %s', 'avnii'), "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); echo'</li>';}
	elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . '<li class="active">'. __('Search Results for "','avnii').'' . get_search_query() . '"' . $after; echo "</li>";
    }
    }
//fetch title
function avnii_title() {
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

 
/**
 * Filter the page title.
 **/
function avnii_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'avnii' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'avnii_wp_title', 10, 2 );

if ( ! function_exists( 'avnii_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 **/
function avnii_entry_meta() {

	$category_list = get_the_category_list( __( ', ', 'avnii' ) );

	$tag_list = get_the_tag_list( '', __( ', ', 'avnii' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'avnii' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $tag_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'avnii' );
	} elseif ( $category_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'avnii' );
	} else {
		$utility_text = __( '<div class="post-category"> Posted on : %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'avnii' );
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
function avnii_special_nav_class( $classes, $item )
{
   
        $classes[] = 'special-class';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'avnii_special_nav_class', 10, 2 );
/**
 * Register avnii widget areas.
 *
 */
function avnii_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'avnii' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'avnii' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'avnii' ),
		'id' => 'footer-sidebar',
		'description' => __( 'Appears on footer side', 'avnii' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 footer-separator %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'avnii_widgets_init' );
/* avnii Theme End */
/*
 * Add Active class to Wp-Nav-Menu
*/ 
 function avnii_active_nav_class($classes, $item){
     if( in_array('page_item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'avnii_active_nav_class' , 10 , 2);
 
 
function avnii_add_nav_class($output) {
	
    $output= preg_replace('/<ul/', '<ul class="list-unstyled widget-list"', $output);
    return $output;
}
add_filter('wp_list_categories', 'avnii_add_nav_class');
/*
 * Replace Excerpt [...] with Read More
**/
function avnii_read_more( ) {
return ' ... <p class="moree"><a class="arbtnn arbtnn-small arbtnnsrborder" href="'. get_permalink( get_the_ID() ) . '">'.__('Read more','avnii').' <i class="fa fa-arrow-circle-right"></i></a></p>';
 }
add_filter( 'excerpt_more', 'avnii_read_more' ); 
/**
 * Enqueues scripts and styles for front-end.
 */
function avnii_scripts_styles() {
	 wp_enqueue_style('bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.css');
          wp_enqueue_style( 'avnii-basic-style', get_stylesheet_uri() );
		  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/styles/font-awesome.css');
		  wp_enqueue_style('normalize', get_template_directory_uri() . '/styles/normalize.css');
		 wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/scripts/modernizr.js',array('jquery'),false,true);
		  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.js',array('jquery'),false,true);
		  wp_enqueue_script( 'custom', get_template_directory_uri() . '/scripts/custom.js',array('jquery'),false,true);
		  
	  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'avnii_scripts_styles' );















 
// placeholder to textarea
function avnii_comment_textarea_field($comment_field) {
 
    $comment_field = 
         '<div class="col-md-12">
            <textarea class="form-control" required placeholder="'. __( 'Enter Your Comments', 'avnii' ).'" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
 
    return $comment_field;
}
add_filter('comment_form_field_comment','avnii_comment_textarea_field');
//comment text
function avnii_wrap_comment_text($content) {
    return "<div class=\"comment-text\"><a class='commenttext-arrow'></a>". $content ."</div>";
}
add_filter('comment_text', 'avnii_wrap_comment_text');















/**
 * Add default menu style if menu is not set from the backend.
 */
function avnii_add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);

$toreplace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right"', $new_markup);
return $new_markup; }

add_filter('wp_page_menu', 'avnii_add_menuid');






if ( ! function_exists( 'avnii_ie_js_header' ) ) {
	function avnii_ie_js_header () {
		echo '<!--[if lt IE 9]>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/html5.js' ) . '"></script>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/selectivizr.js' ) . '"></script>'. "\n";
		echo '<![endif]-->'. "\n";
	}
	
}
add_action( 'wp_head', 'avnii_ie_js_header' );
/*  IE js footer
/* ------------------------------------ */
if ( ! function_exists( 'avnii_ie_js_footer' ) ) {
	function avnii_ie_js_footer () {
		echo '<!--[if lt IE 9]>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/respond.js' ) . '"></script>'. "\n";
		echo '<![endif]-->'. "\n";
	}
	
}
add_action( 'wp_footer', 'avnii_ie_js_footer', 20 );
