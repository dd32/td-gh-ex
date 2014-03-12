<?php

include('customizer.php');//Include code for customizer

if ( ! isset( $content_width ) ) { //set content width
	$content_width = 600;
}

add_theme_support( 'automatic-feed-links' );
	

function mp_enqueue_sripts() { //enque scripts like css
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true );
	wp_enqueue_script("jquery"); //enque jquery
	
	
	if ( is_singular() ) { //if on single page load comment script
		wp_enqueue_script( "comment-reply" );
	} 
	
	$stylesheet = get_theme_mod('css');
	
	if($stylesheet != '') { //if stylesheet is generated
		wp_enqueue_style( 'style', $stylesheet['url'], array('dashicons'), '1.0' );
	}
		
	//load google font
	wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,300,600' );
    wp_enqueue_style( 'googleFonts' );
	
}

add_action( 'wp_enqueue_scripts', 'mp_enqueue_sripts' );

if (get_theme_mod('css') == '') {
	add_action('wp_head', 'mp_print_style');
}


function mp_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'giga_games' ),
      'extra-menu' => __( 'Extra Menu', 'giga_games' )
    )
  );
}
add_action( 'init', 'mp_register_my_menus' );



// Show posts of 'game' and 'post' post type
add_action( 'pre_get_posts', 'mp_add_my_post_types_to_query' );

function mp_add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
	{
		$query->set( 'post_type', array( 'giga_game', 'post' ) ); //Add post type giga_game to main query for game plugin support
		
		
		/* Get all sticky posts */
		$sticky = get_option( 'sticky_posts' );

		$numberstickies = mp_sticky_counter();	//get number of stickies (max 4)
			
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
			
			if( $paged != 1 )
			{
				$numberstickies = 0;
			}
		
	/* Sort the stickies with the newest ones at the top */
		rsort( $sticky );

	/* Get the 4 newest stickies (change 2 for a different number) */
		$sticky = array_slice( $sticky, 4 );

	/* Query sticky posts */
		$query->set( 'post__not_in' , $sticky );
		
		$query->set( 'posts_per_page', 10 - $numberstickies );
	}
		
	return $query;
}

/**
 * Sticky counter function
 *
 */

function mp_sticky_counter() {
	$sticky = get_option( 'sticky_posts' );

		$numberstickies = count( $sticky );
		
			if( $numberstickies > 4 ) {
				$numberstickies = 4;
			}
			
			
			
	return $numberstickies;
}


//thumbail resize
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 480, 320, true );     
}
//add image size
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'prev-2', 200, 125, true );
}


//add link to post thumbnail

add_filter( 'post_thumbnail_html', 'mp_post_image_html', 10, 3 );

function mp_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
  return $html;

}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function mp_register_sidebars() {

	register_sidebar( array( //sidebar on home page
		'name' => 'Home Sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array( //sidebar next to single game
		'name' => 'Single Game', 
		'id' => 'single_game_1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	register_sidebar( array( //sidebar next to pages and posts
		'name' => 'General Sidebar',
		'id' => 'general_1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	
	register_sidebar( array( //footer1
		'name' => 'Footer 1',
		'id' => 'footer_1',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array( //footer2
		'name' => 'Footer 2',
		'id' => 'footer_2',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array( //footer3
		'name' => 'Footer 3',
		'id' => 'footer_3',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array( //footer4
		'name' => 'Footer 4',
		'id' => 'footer_4',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-head"><h4>',
		'after_title' => '</h4></div>',
	) );
	

	
}
add_action( 'widgets_init', 'mp_register_sidebars' );


function mp_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	//$max   = intval( $wp_query->max_num_pages );
	$max = intval(($wp_query->found_posts + mp_sticky_counter()) / 10);
	
	
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( get_theme_mod( 'pag_prev_text', '« Previous' ) ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( get_theme_mod( 'pag_next_text', 'Next »' ) ) );

	echo '</ul></div>' . "\n";

}

/**
* Code for displaying post meta
*
*/
add_action('mp_post_meta', 'mp_display_post_meta');

function mp_display_post_meta() {
	the_tags('<div class="tag-icon"></div>');?>
	<div class="category-icon"></div><?php
	the_category(', ');
}






/**
* Filter the default title to be seo friendly but also compatible with seo plugins
*
*/
add_filter( 'wp_title', 'mp_title_filter', 10, 2 );

function mp_title_filter($title, $seperator)
{
	if(is_front_page())
	{
		
		$result = get_bloginfo( 'title' ) .  ' - ' . get_bloginfo( 'description' );
		
		
	}
	else
	{
		$result = get_the_title() . ' - ' . get_bloginfo( 'title' );
	}
	
	return $result;
		
}

/**
* REL next prev for optimal seo :)
*
*/

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
add_action ( 'wp_head', 'mp_rel_next_prev' );

function mp_rel_next_prev() { 
  global $paged;
  if ( get_previous_posts_link() ) { ?>
  <link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>">
  <?php
  }
  if ( get_next_posts_link() ) { ?>
  <link rel="next" href="<?php echo get_pagenum_link( $paged + 1 ); ?>">
  <?php
  }
}

/**
* content style function 
*
*/

function mp_content_class() {
	
			if( is_archive() || is_front_page() || is_search() ) {	
				$style = get_theme_mod( 'layout_archive', 'cs' );
			}
			else {
				$style = get_theme_mod( 'layout_posts', 'cs' );
			}
		
			if( $style == 'cs' ) {
				return false;
			}
			
			$class;
			
			if( $style == 'c' ) {
				$class = 'full-width';
			}
			else {
				$class = 'left-sidebar';
			}
			
			echo( $class );
}

/**
* Special excerpt function
*
*/
function mp_excerpt() {
	  $content = strip_shortcodes( get_the_content() );
	  $content = strip_tags( $content );
	  $content = wp_trim_words( $content, get_theme_mod( 'post_excerpt_length', '30' ), '<a href="' . get_permalink() . '">' . get_theme_mod( 'readmore_text', '...Read more' ) . '</a>' );
										  		 									  		 
	  
		
		if( $content != "" ) {							  		 
		?> <p><?php  echo  $content ?></p>							  	
		<?php
		}
}


/**
* Special thumbnail function
*
*/

function mp_thumbnail( $width, $height ) {
	
	global $post;

	if ( '' == has_post_thumbnail() && get_theme_mod( 'show_placeholder', '1' ) ) { // check if the post has a Post Thumbnail assigned to it.
										
			?>
			<a href="<?php the_permalink() ?>"><div class="img-placeholder"><div class="icon"></div></div></a><?php
			
		}
							

}


remove_action( 'wp_head', 'wp_generator' ); //REMOVE GENERATOR TAG
remove_action( 'wp_head', 'wlwmanifest_link' ); // REMOVE wlwmanifest link
remove_action( 'wp_head', 'rsd_link' ); //remove rsd link 




?>