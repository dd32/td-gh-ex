<?php
/**
 * Backyard initial setup and constants
 */
define('POST_CONTENT_LENGTH', 40);
/**
 * Clean up the_excerpt()
 */
function backyard_excerpt_length($length) {
  return POST_CONTENT_LENGTH;
}
function backyard_remove_more_link_scroll( $link ) {
  $link = preg_replace( '|#more-[0-9]+|', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'backyard_remove_more_link_scroll' );
function backyard_excerpt_more($more) {
  return ' ';
}
add_filter('excerpt_length', 'backyard_excerpt_length');
add_filter('excerpt_more', 'backyard_excerpt_more');
// Custom Excerpt 
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
} 
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}
function backyard_title_limit($length, $replacer = '...') {
 $string = the_title('','',FALSE);
 if(strlen($string) > $length)
 $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 echo $string;
}

function backyard_setup() {
// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation'    => __('Primary Navigation', 'backyard'),
  ));
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size( 'backyard-widget-thumb', 80, 50, true );
  add_image_size('backyard-related-post', 230, 166, true);
  add_image_size('backyard-featured-categories', 263, 190, true );
  add_image_size('backyard-popular-thumb', 256, 151, true );
  add_image_size('backyard-post-thumb', 750, 387, true );
  add_image_size('backyard-full-grid', 550, 350, true );
  add_theme_support( 'automatic-feed-links' );
  add_editor_style(array('editor-style.css', backyard_google_web_fonts_url()));

  add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

$args = array(
        'default-text-color' => 'e1a232',
        'default-image' => '',
        'height' => 250,
        'width' => 1060,
        'max-width' => 2000,
        'flex-height' => true,
        'flex-width' => true,
        'random-default' => false,
        'wp-head-callback' =>'backyard_header_style',
       
    );
    add_theme_support('custom-header', apply_filters('backyard_custom_header_args',$args));
}
add_action('after_setup_theme', 'backyard_setup');

//* Add custom body class to the head
add_filter('body_class', 'sp_body_class');
function sp_body_class( $classes ) {
	if (!is_front_page() || is_home())
		$classes[] = 'inner-page';
		return $classes;
}
/*Start Content Limit Function*/
/*End Content Limit Function*/
/*Start Popular Posts Function*/
function backyard_set_post_views($postID) {
    $count_key = 'backyard_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function backyard_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    backyard_set_post_views($post_id);
}
add_action( 'wp_head', 'backyard_track_post_views');
function backyard_get_post_views($postID){
    $count_key = 'backyard_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*Start Search Form Hook*/
function backyard_search_form($form) {
$form = '<form role="search" method="get" id="search-widget" class="search-widget" action="'.esc_url(home_url('/')).'" >
<input class="form-control" type="text" value="'.get_search_query().'" name="s" id="s" placeholder="'.esc_attr__('Search','backyard').'"/>
<button type="submit"> <i class="fa fa-search"></i></button>
</form>';
return $form;
}
add_filter( 'get_search_form', 'backyard_search_form');
/*End Search Form Hook*/

if(!function_exists('Backyard_comment_nav')) :
function backyard_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option('page_comments') ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'backyard' ); ?></h2>
        <div class="nav-links">
            <?php
                if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'backyard' ) ) ) :
                    printf( '<div class="nav-previous">%s</div>', $prev_link );
                endif;
 
                if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'backyard' ) ) ) :
                    printf( '<div class="nav-next">%s</div>', $next_link );
                endif;
            ?>
        </div><!-- .nav-links -->
    </nav><!-- .comment-navigation -->
    <?php
    endif;
}
endif;

//Content Width
function backyard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'backyard_content_width', 770);
}
add_action('after_setup_theme', 'backyard_content_width', 0);

if ( ! function_exists( 'backyard_header_style' ) ) :
function backyard_header_style() {
    $text_color = esc_html(get_header_textcolor());
    ?>
    <style type="text/css">
    <?php if (!display_header_text() ) : ?>
        #logo a{font-family: 'Playfair Display', serif;font-size: 44px;text-transform: uppercase;color: #e1a232;letter-spacing: 4px;line-height: 45px;-webkit-transition: all 0.2s ease;-moz-transition: all 0.2s ease;-o-transition: all 0.2s ease;-ms-transition: all 0.2s ease;}
    <?php else : ?>
        #logo a{font-family: 'Playfair Display', serif;font-size: 44px;text-transform: uppercase;color: #<?php echo $text_color; ?>;letter-spacing: 4px;line-height: 45px;-webkit-transition: all 0.2s ease;-moz-transition: all 0.2s ease;-o-transition: all 0.2s ease;-ms-transition: all 0.2s ease;}
    <?php endif; ?>
    </style>
<?php } endif; ?>