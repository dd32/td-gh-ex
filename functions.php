<?php
// Setup Content Width value based on the theme's design and stylesheet.
if (!isset($content_width))
	$content_width = 650;
?>

<?php 
function silverquantum_setup() {

load_theme_textdomain( 'silverquantum', get_template_directory() . '/languages' );

// This theme supports a variety of post formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
	
// This theme styles the visual editor with editor-styles.css to mach the theme style.
add_editor_style();

// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

// Adds RSS feed links to <head> for post and comments.
add_theme_support('automatic-feed-links');

// This theme uses a custom image size for featured images, display on a "standard" posts.
add_theme_support('post-thumbnails');
set_post_thumbnail_size(624, 9999); 

// This theme does support custom background color.
add_theme_support('custom-background', array(
	'default-color'	=> 'cccccc',
	)); 

}
add_action('after_setup_theme', 'silverquantum_setup');
?>

<?php 
// Add Support for Custom Header Image.
require(get_template_directory() . '/include/custom-header.php');
?>

<?php 
function silverquantum_widgets_init() {
	register_sidebar( array (
		'name' 				=> __('Main Sidebar', 'silverquantum'),
		'id'				=> 'sidebar-1',	
		'description' 		=>__('Appear on posts and pages'),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	));
}
add_action( 'widgets_init', 'silverquantum_widgets_init' );
?>

<?php 
function silverquantum_content_nav() {  
	// Sets how many pages to show (leave it alone)
	$pages = '';
	// Sets how many buttons you want to show in the pagination area
	$range = 3;
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
		echo '<ul class="pagination">';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link(1).'">&laquo;</a></li>';
		if($paged > 1 && $showitems < $pages) echo '<li>' . previous_posts_link('&laquo; Previous Entries') . '</li>';

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? '<li class="current">'.$i.'</li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
			}
		}

		if ($paged < $pages && $showitems < $pages) echo '<li>' . next_posts_link('Next &raquo;','') . '</li>';  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
		echo '</ul>';
	}
}
// END pagination
?>

