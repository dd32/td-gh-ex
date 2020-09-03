<?php 
	define('bb10_IsMobile', wp_is_mobile());
	define('BB10_TPLDIR', get_template_directory_uri());
	
add_action( 'after_setup_theme', 'bb10_setup' );
function bb10_setup(){
	// for /languages/
	load_theme_textdomain( 'bb10', get_template_directory() . '/languages' );

	//set content width for video
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 560;

	//Add background for theme
	add_theme_support('custom-background');
	
	//post-thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('70x50-right-top', 160, 90, array( 'right', 'top' ));
	
	//bb10 Title Tag
	add_theme_support( 'title-tag' );
	add_filter( 'document_title_separator', 'hjyl_title_separator_to_line' );
	add_filter( 'document_title_parts', 'hjyl_document_title_parts' );
	
	// add @ for comment
	add_filter( 'comment_text' , 'hjyl_comment_add_at', 20, 2);
	
	//editor style
	add_editor_style('css/editor.css');
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Enqueue style-file, if it exists.
	add_action('wp_enqueue_scripts', 'bb10_script');
	
	//copyright below single
	add_filter('the_content', 'bb10_copyright');
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	// Add sidebar
	add_action( 'widgets_init', 'bb10_widgets' );
	
	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'quote',
		'status',
	) );
	
	//Add custom-header for logo
	$bb10_logo = array(
		'default-image'          => BB10_TPLDIR.'/images/header-logo.png',
		'random-default'         => false,
		'width'                  => 600,
		'height'                 => 150,
		'header-text'            => false,
		'uploads'                => true,
        'flex-width'			 => true,
        'flex-height'			 => true,
	);
	add_theme_support( 'custom-header', $bb10_logo );
	
	// Add menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','bb10'),
		'mobile' => __( 'Mobile Navigation', 'bb10'),
	) );
};
// add @ for comment
function hjyl_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}
//bb10 Title Tag
function hjyl_title_separator_to_line(){
    return '|';
}
function hjyl_document_title_parts( $title ){
    if( is_home() && isset( $title['tagline'] ) ) unset( $title['tagline'] );
	//no title
	if(is_singular() && ""==get_the_title() ) { 
		$title['title'] = sprintf(__('Untitled #%s', 'bb10'),get_the_date('Y-m-d'));
	};
    return $title;
}

//Custom wp_list_pages
function bb10_wp_list_pages(){
	echo "<ul>";
	echo wp_list_pages('title_li=&depth=1');
	echo "</ul>";
}

// Enqueue style-file, if it exists.
function bb10_script() {
	if( !bb10_IsMobile ){
		wp_enqueue_style( 'bb10-style', get_stylesheet_uri(),  array(), '20200903', false);
	}else{
		wp_enqueue_style('bb10-mobile', BB10_TPLDIR . '/css/bb10-mobile.css', array(), '20200903', 'all', false);
	};
	wp_enqueue_style( 'Play', '//fonts.googleapis.com/css?family=Play', array(), '20200903', 'all');
	wp_enqueue_script( 'bb10-js', BB10_TPLDIR . '/js/bb10.js', array('jquery'), '20200903', true);
	if ( is_singular() && comments_open() ) {
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'ajax-comment', BB10_TPLDIR . '/js/bb10-comments-ajax.js', array('jquery'), '20200903', true);
	}
	wp_localize_script( 'ajax-comment', 'ajaxcomment', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'order' => get_option('comment_order'),
		'formpostion' => 'bottom',
		'txt1' => __('Wait a moment...','bb10'),
		'txt2' => __('Good Comment','bb10'),
	) );
	if( is_page('archives') ){
		wp_enqueue_script( 'bb10-archives', BB10_TPLDIR . '/js/bb10-archives.js', array(), '20200903', false);
		wp_enqueue_style( 'bb10-archives', BB10_TPLDIR . '/css/bb10-archives.css', array(), '20200903', 'all');
	};
	if(is_404()){
		wp_enqueue_style( 'bb10-4041', '//fonts.googleapis.com/css?family=Press+Start+2P', array(), '20200903', 'all');
		wp_enqueue_style( 'bb10-4042', '//fonts.googleapis.com/css?family=Oxygen:700', array(), '20200903', 'all');
		wp_enqueue_style( 'bb10-4043', BB10_TPLDIR . '/css/bb10-404.css', array(), '20200903', 'all');
	}
}

//copyright below single
function bb10_copyright($content) {
	if( is_single() ){
		$content.= '<p class="clear">--'.__('CopyRights','bb10').': <a  class="hjyl_Copy" href="'.get_permalink().'">'.get_permalink().'</a></p>';
	}
	return $content;
}

//time formats "xxxx ago"
function time_ago($type = 'commennt', $day = 365) {
    $d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
    //if (time() - $d('U') > 60 * 60 * 24 * $day) return;
	echo sprintf(__('%s ago','bb10'), human_time_diff($d('U') , strtotime(current_time('mysql', 0))));
}
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return __('Just Now','bb10');
    $interval = array(
        12 * 30 * 24 * 60 * 60 => __('years ago', 'bb10'),
        30 * 24 * 60 * 60 => __('month ago', 'bb10'),
        7 * 24 * 60 * 60 => __('weeks ago', 'bb10'),
        24 * 60 * 60 => __('days ago', 'bb10'),
        60 * 60 => __('hours ago', 'bb10'),
        60 => __('minutes ago', 'bb10'),
        1 => __('seconds ago', 'bb10')
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

// Add sidebar
function bb10_widgets(){
    register_sidebar(array(
		'name' =>''.__('Home', 'bb10').'',
		'id' => 'home',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
		'name'=>''.__('Single', 'bb10').'',
		'id' => 'single',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
		'name'=>''.__('404', 'bb10').'',
		'id' => 'error',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
	register_sidebar(array(
		'name'=>''.__('Other', 'bb10').'',
		'id' => 'other',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
}

//move comment field to bottom
function move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom' );

//Load Custom parts
 require( get_template_directory() . '/inc/theme_inc.php' );
 require( get_template_directory() . '/inc/bbComment.php' );
 require( get_template_directory() . '/inc/functions-svg.php');
  $bb10_theme_options = get_option('bb10_theme_options');
