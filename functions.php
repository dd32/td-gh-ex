<?php
 
 
 
/* aripop Theme Starts */
if ( ! function_exists( 'aripop_setup' ) ) :
function aripop_setup() {
	/*
	 * Make aripop theme available for translation.
	 *
	 */
	load_theme_textdomain( 'aripop', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style();
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	 	global $content_width;
if ( ! isset( $content_width ) )
     $content_width = 900; /* pixels */
	 add_theme_support( "title-tag" );
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 798, 398, true );
	add_image_size( 'aripop-full-width', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'aripop' ),
		'secondary' => __( 'Secondary menu  for footer menu', 'aripop' ),		
	) );
	 
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'aripop_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'aripop_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // aripop_setup
add_action( 'after_setup_theme', 'aripop_setup' );
 
 
 
 
 
 


 
 
 
 
 

// Adding breadcrumbs
function aripop_breadcrumbs() {
 echo '<li><a href="';
 //echo get_option('home');
 echo home_url(); 
 echo '">'. __('Home','aripop');
 echo "</a></li>";
 
if (is_attachment()) {
           echo "<li class='active'>". __('attachment:','aripop');
    
    
   
   echo "</li>";
        }
 
  if (is_category() || is_single()) {
   if(is_category())
   {
   echo "<li class='active'>". __('Category By:','aripop');
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
            echo "<li class='active'>". __('Search Results for...','aripop');
   echo '"<em>';
   echo the_search_query();
   echo '</em>"';
   echo "</li>";
        } elseif (is_tag()) { echo "<li class='active'>"; single_tag_title(); echo "</li>";}
		 elseif (is_day()) {echo"<li class='active'>". __('Archive for ','aripop'); the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='active'>". __('Archive for ','aripop'); the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='active'>". __('Archive for ','aripop'); the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='active'>". __('Author Archive for ','aripop'); printf(__(' %s', 'aripop'), "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); echo'</li>';}
	elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo '<li class="active">'. __('Search Results for "','aripop').'' . get_search_query() . '"' ; echo "</li>";
    }
    }
 

if ( ! function_exists( 'aripop_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 **/
function aripop_entry_meta() {

	$category_list = get_the_category_list( __( ', ', 'aripop' ) );

	$tag_list = get_the_tag_list( '', __( ', ', 'aripop' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'aripop' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $tag_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'aripop' );
	} elseif ( $category_list ) {
		$utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'aripop' );
	} else {
		$utility_text = __( '<div class="post-category"> Posted on : %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: <a href="#">'.get_comments_number().'</a>.</div>', 'aripop' );
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
function aripop_special_nav_class( $classes, $item )
{
   
        $classes[] = 'special-class';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'aripop_special_nav_class', 10, 2 );
/**
 * Register aripop widget areas.
 *
 */
function aripop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'aripop' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'aripop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	 
}
add_action( 'widgets_init', 'aripop_widgets_init' );
/* aripop Theme End */
/*
 * Add Active class to Wp-Nav-Menu
*/ 
 function aripop_active_nav_class($classes, $item){
     if( in_array('page_item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'aripop_active_nav_class' , 10 , 2);
 
 
 
function aripop_add_nav_class($output) {
	
    $output= preg_replace('/<ul/', '<ul class="list-unstyled widget-list"', $output);
    return $output;
}
add_filter('wp_list_categories', 'aripop_add_nav_class');
/*
 * Replace Excerpt [...] with Read More
**/
function aripop_read_more( ) {
return ' ...';
 }
add_filter( 'excerpt_more', 'aripop_read_more' ); 
/**
 * Enqueues scripts and styles for front-end.
 */
function aripop_scripts_styles() {
	 wp_enqueue_style('bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.css');
          wp_enqueue_style( 'aripop-basic-style', get_stylesheet_uri() );
		 wp_enqueue_style('font-awesome', get_template_directory_uri() . '/styles/font-awesome.css');
		   
			 
		  wp_enqueue_script( 'aripop_modernizr', get_template_directory_uri() . '/scripts/modernizr.js',array('jquery'),false,true);
		  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.js',array('jquery'),false,true);
		  wp_enqueue_script( 'aripop_custom', get_template_directory_uri() . '/scripts/custom.js',array('jquery'),false,true);
	  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'aripop_scripts_styles' );




 

// placeholder to textarea
function aripop_comment_textarea_field($comment_field) {
 
    $comment_field = 
         '<div class="col-md-12">
            <textarea class="form-control" required placeholder="'. __( 'Enter Your Comments', 'aripop' ).'" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
 
    return $comment_field;
}
add_filter('comment_form_field_comment','aripop_comment_textarea_field');
//comment text
function aripop_wrap_comment_text($content) {
    return "<div class=\"comment-text\"><a class='commenttext-arrow'></a>". $content ."</div>";
}
add_filter('comment_text', 'aripop_wrap_comment_text');









 

if ( ! function_exists( 'aripop_ie_js_header' ) ) {
	function aripop_ie_js_header () {
		echo '<!--[if lt IE 9]>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/html5.js' ) . '"></script>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/selectivizr.js' ) . '"></script>'. "\n";
		echo '<![endif]-->'. "\n";
	}
	
}
add_action( 'wp_head', 'aripop_ie_js_header' );
/*  IE js footer
/* ------------------------------------ */
if ( ! function_exists( 'aripop_ie_js_footer' ) ) {
	function aripop_ie_js_footer () {
		echo '<!--[if lt IE 9]>'. "\n";
		echo '<script src="' . esc_url( get_template_directory_uri() . '/scripts/respond.js' ) . '"></script>'. "\n";
		echo '<![endif]-->'. "\n";
	}
	
}
add_action( 'wp_footer', 'aripop_ie_js_footer', 20 );



















/**
 * Add default menu style if menu is not set from the backend.
 */
function aripop_add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
 
$toreplace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right"', $new_markup);
return $new_markup; }

add_filter('wp_page_menu', 'aripop_add_menuid');
/**
 * aripop custom pagination for posts 
 */
 
 
function aripop_paginate($pages = '', $range = 1)
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
         echo "<ul class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><span><i class='fa fa-angle-double-left'></i></span></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><span><i class='fa fa-angle-left'></i></span></a></li>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><a href='#' class='active'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><span><i class='fa fa-angle-right'></i></span></a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><span><i class='fa fa-angle-double-right'></i></span></a></li>";
         echo "</ul>\n";
     }
}



require get_template_directory() . '/inc/customizer.php';


require get_template_directory() . '/inc/aripop-admin_page.php';






