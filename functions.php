<?php
if (!function_exists('a1_setup')) :
   function a1_setup() {
       global $content_width;
       if (!isset($content_width)) {
           $content_width = 770;
       }

		/*
		 * Make A1 theme available for translation.
		 */

		load_theme_textdomain( 'a1', get_template_directory() . '/languages' );
       // This theme styles the visual editor to resemble the theme style.
       add_editor_style(array('css/editor-style.css', a1_font_url()));
       // Add RSS feed links to <head> for posts and comments.
       add_theme_support('automatic-feed-links');
       add_theme_support( 'title-tag' );
       add_theme_support('post-thumbnails');
       set_post_thumbnail_size(672, 372, true);
       add_image_size('a1-full-width', 1038, 576, true);

		add_image_size('a1-portfolio-image', 320, 260, true);
       // This theme uses wp_nav_menu() in two locations.
       register_nav_menus(array(
           'primary' => __('Header Menu', 'a1'),
           'secondary' => __('Footer Menu', 'a1'),
       ));

	//custom background

	add_theme_support( 'custom-background', apply_filters( 'a1_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );
       /*
	   * Switch default core markup for search form, comment form, and comments
	   * to output valid HTML5.
	   */
       add_theme_support('html5', array(
           'search-form', 'comment-form', 'comment-list',
       ));
       // Add support for featured content.
       add_theme_support('featured-content', array(
           'featured_content_filter' => 'a1_get_featured_posts',
           'max_posts' => 6,
       ));
	   // This theme uses its own gallery styles.
		add_filter('use_default_gallery_style', '__return_false');   }

endif;
// a1_setup

add_action('after_setup_theme', 'a1_setup');

/** Register Lato Google font for a1.*/

function a1_font_url() {
   $a1_font_url = '';
   if ('off' !== _x('on', 'Lato font: on or off', 'a1')) {
       $a1_font_url = add_query_arg('family', urlencode('Lato:300,400,700,900,300italic,400italic,700italic'), "//fonts.googleapis.com/css");
   }
   return $a1_font_url;
}

// thumbnail list

function a1_thumbnail_image($content) {
   if (has_post_thumbnail())
       return the_post_thumbnail('thumbnail');

}
/*
* Set Theme Option variable as a global
*/
$a1_options = get_option('a1_theme_options');

global $a1_options;

/** Register widget areas.*/

function a1_widgets_init() {
   register_sidebar(array(
       'name' => __('Primary Sidebar', 'a1'),
       'id' => 'sidebar-1',
       'description' => __('Main sidebar that appears on the right.', 'a1'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h3 class="sidebar-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area One', 'a1'),
       'id' => 'footer-1',
       'description' => __('Footer Area One that appears on the footer.', 'a1'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Two', 'a1'),
       'id' => 'footer-2',
       'description' => __('Footer Area Two that appears on the footer.', 'a1'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Three', 'a1'),
       'id' => 'footer-3',
       'description' => __('Footer Area Three that appears on the footer.', 'a1'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   ));
   register_sidebar(array(
       'name' => __('Footer Area Four', 'a1'),
       'id' => 'footer-4',
       'description' => __('Footer Area Four that appears on the footer.', 'a1'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
   ));

}

add_action('widgets_init', 'a1_widgets_init');

/* Add default menu style if menu is not set from the backend.*/

function a1_add_menuid($page_markup) {
   preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $a1_matches);
   $a1_divclass = '';
   if (!empty($a1_matches)) {
       $a1_divclass = $a1_matches[1];
   }
   $a1_toreplace = array('<div class="' . $a1_divclass . ' pull-right-res">', '</div>');
   $a1_replace = array('<div class="navbar-collapse collapse ">', '</div>');
   $a1_new_markup = str_replace($a1_toreplace, $a1_replace, $page_markup);
   $a1_new_markup = preg_replace('/<ul/', '<ul class="a1-menu"', $a1_new_markup);
   return $a1_new_markup;

}

add_filter('wp_page_menu', 'a1_add_menuid');

function a1_excerpt_more() {
   return '...</p><a href="' . get_permalink() . '" class="read-button">'.__('Read more','a1').'</a>';

}

add_filter("excerpt_more", "a1_excerpt_more");

if (!function_exists('a1_entry_meta')) :
/**
* Set up post entry meta.
* Meta information for current post: categories, tags, permalink, author, and date.
**/
   function a1_entry_meta() {

		$a1_options = get_option( 'a1_theme_options' );

		if(!empty($a1_options['entry-meta-by'])) { $a1_by_text = $a1_options['entry-meta-by']; } else { $a1_by_text = __('by','a1'); }

		if(!empty($a1_options['entry-meta-in'])) { $a1_in_text = $a1_options['entry-meta-in']; } else { $a1_in_text =  __('In','a1'); }

		if(!empty($a1_options['entry-meta-on'])) { $a1_on_text = $a1_options['entry-meta-on']; } else { $a1_on_text = __('On','a1'); }

		if(!empty($a1_options['entry-meta-comments'])) { $a1_comments_text = $a1_options['entry-meta-comments']; } else { $a1_comments_text = 'Comments'; }

		if(!empty($a1_options['entry-meta-tags'])) { $a1_tags_text = $a1_options['entry-meta-tags']; } else { $a1_tags_text = __('Tags','a1'); }
       $a1_date = sprintf('<li>'.$a1_on_text.' <a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></li>', esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date('M d,Y'))       );

       $a1_author = sprintf('<li>'.$a1_by_text.': <a href="%1$s" title="%2$s" >%3$s</a></li>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(ucwords(get_the_author())), ucwords(get_the_author())
       );
       $a1_comment = sprintf('<li>'.$a1_comments_text.': %1$s', get_comments_number()
       );


       $a1_tag_list = sprintf('%1$s</li>', get_the_tag_list( '<li>'.$a1_tags_text.': ', ' , '));

	$a1_category_list = sprintf('<li>'.$a1_in_text.': %1$s</li>', get_the_category_list(' , '));

       printf('%1$s %2$s %3$s %4$s %5$s', $a1_author, $a1_category_list, $a1_date, $a1_comment, $a1_tag_list);
   }

endif;

//fetch title

function a1_title() {
   if (is_category() || is_single()) {
       if (is_category())
           the_category();
       if (is_single())
           the_title();
   }
   elseif (is_page())
       the_title();
   elseif (is_search())
       echo the_search_query();

}

function a1_left_sidebar_layout() {

	if ( is_page_template( 'page-template/left-sidebar.php' ) ) {
		echo "<style>.col-md-offset-1 { margin-right: 8.33333%; margin-left:0% }</style>";
	}
}

add_action('wp_head','a1_left_sidebar_layout');

/***** Theme function file ******/

require get_template_directory() . "/theme-options/a1.php";

require get_template_directory() . "/inc/enqueue_script.php";

require get_template_directory() . "/inc/tgm-plugins.php";

require get_template_directory() . "/inc/breadcrumbs.php";
