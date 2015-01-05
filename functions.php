<?php
require_once('theme-option/ariniothemes.php');
/**
 * Set up the content width value based on the theme's design.
 */
 
 
 
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}
// Adding breadcrumbs
function avnii_breadcrumbs() {
 echo '<li><a href="';
 //echo get_option('home');
 echo home_url(); 
 echo '">Home';
 echo "</a></li>";
 
if (is_attachment()) {
            echo "<li class='active'>attachment: ";
    
    
   
   echo "</li>";
        }
 
  if (is_category() || is_single()) {
   if(is_category())
   {
    echo "<li class='active'>Category By: ";
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
        } elseif (is_tag()) { echo "<li class='active'>"; single_tag_title(); echo "</li>";}
		 elseif (is_day()) {echo"<li class='active'>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='active'>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='active'>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='active'>Author Archive: "; printf(__(' %s', 'avnii'), "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); echo'</li>';}
	elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . '<li class="active">Search results for "' . get_search_query() . '"' . $after; echo "</li>";
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
/* avnii Theme Starts */
if ( ! function_exists( 'avnii_setup' ) ) :
function avnii_setup() {
	/*
	 * Make avnii theme available for translation.
	 *
	 */
	load_theme_textdomain( 'avnii', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
 
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails, and declare two sizes.
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

/**
 * Register Lato Google font for avnii.
 *
 */
 

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
return ' ... <p class="moree"><a class="btn btn-inverse btn-normal btn-primary " href="'. get_permalink( get_the_ID() ) . '">Read more</a></p>';
 }
add_filter( 'excerpt_more', 'avnii_read_more' ); 
/**
 * Enqueues scripts and styles for front-end.
 */
function avnii_scripts_styles() {
	 wp_enqueue_style('bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.css');
          
		   wp_enqueue_script('jquery');
			wp_enqueue_script( 'nav', get_template_directory_uri() . '/scripts/jquery.nav.js',array(),false,true);
		   
		  wp_enqueue_script( 'validate', get_template_directory_uri() . '/styles/jquery.validate.min.js',array(),false,true);
		
		  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/scripts/modernizr.js',array(),false,true);
		  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/styles/bootstrap.min.js',array(),false,true);
		  wp_enqueue_script( 'custom', get_template_directory_uri() . '/scripts/custom.js',array(),false,true);
	  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'avnii_scripts_styles' );

















add_filter( 'comment_form_default_fields', 'avnii_comment_placeholders' );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
function avnii_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
        /** I use _x() here to make your translators life easier. :)
         * See http://codex.wordpress.org/Function_Reference/_x
         */
            . _x(
                'Name',
                'comment form placeholder',
                'avnii'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        '<input type="email" placeholder="contact@example.com"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        // Again: a better 'type' attribute value.
        '<input placeholder="http://example.com" id="url" name="url" type="url"',
        $fields['url']
    );
	

    return $fields;
}

// placeholder to textarea
function avnii_comment_textarea_field($comment_field) {
 
    $comment_field = 
         '<div class="col-md-12">
            <textarea class="form-control" required placeholder="Enter Your Comments" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
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
$divclass = $matches[1];
$toreplace = array('<div class="'.$divclass.'">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right"', $new_markup);
return $new_markup; }

add_filter('wp_page_menu', 'avnii_add_menuid');
/**
 * avnii custom pagination for posts 
 */
function avnii_paginate($pages = '', $range = 1)
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









