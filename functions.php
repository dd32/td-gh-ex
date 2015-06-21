<?php 
	define('IsMobile', wp_is_mobile());
	define('TPLDIR', get_template_directory_uri());
	
add_action( 'after_setup_theme', 'hjyl_setup' );
function hjyl_setup(){
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
	add_image_size('index', 70, 50);
	
	//bb10 Title Tag
	add_filter( 'wp_title', 'hjyl_wp_title', 10, 2 );
	add_theme_support( 'title-tag' );
	remove_theme_support( 'title-tag' );
	
	//editor style
	add_editor_style('css/editor.css');
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Enqueue style-file, if it exists.
	add_action('wp_enqueue_scripts', 'hjyl_script');
	
	//copyright below single
	add_filter('the_content', 'hjyl_copyright');

	// Add sidebar
	add_action( 'widgets_init', 'hjyl_widgets' );
	
	//Add custom-header for logo
	$hjyl_logo = array(
		'default-image'          => TPLDIR.'/images/header-logo.png',
		'random-default'         => false,
		'width'                  => 300,
		'height'                 => 60,
		'header-text'            => false,
		'uploads'                => true,
	);
	add_theme_support( 'custom-header', $hjyl_logo );
	
	// Add menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','bb10'),
		'mobile' => __( 'Mobile Navigation', 'bb10'),
	) );
};

//bb10 Title Tag
function hjyl_wp_title($title, $sep) {
	global $paged, $wp_query;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo('name');
	// Add a page number if necessary:
	if( is_paged() ){
		echo sprintf( __('Page %1$s of %2$s', 'bb10'), intval( get_query_var('paged')), $wp_query->max_num_pages)."$sep";
	}
	// Add the blog name.
	if(is_home() && is_front_page()) {
		return $title;
	}
	return $title;
}

//Custom wp_list_pages
function hjyl_wp_list_pages(){
	echo "<ul>";
	echo wp_list_pages('title_li=&depth=1');
	echo "</ul>";
}

// Enqueue style-file, if it exists.
function hjyl_script() {
	if( !IsMobile ){
		wp_enqueue_style( 'bb10', get_stylesheet_uri(),  array(), '20150621', false);
	}else{
		wp_enqueue_style('mobile', TPLDIR . '/css/mobile.css', array(), '20150621', 'all', false);
	};
	wp_enqueue_script( 'bb10', TPLDIR . '/js/bb10.js', array(), '20150621', true);
	wp_enqueue_script( 'comments-ajax', TPLDIR . '/js/comments-ajax.js', array(), '20150621', true);
	wp_localize_script('comments-ajax', 'ajaxL10n', array(
		'edt1' => __('Before Refresh, you can','bb10'),
		'edt2' => __('Edit','bb10'),
		'cancel_edit' => __('Cancel Editing','bb10'),
		'txt1' => __('Wait a moment...','bb10'),
		'txt3' => __('Good Comment','bb10')
	));
		
	if ( is_singular() && comments_open() ) wp_enqueue_script( 'comment-reply' );
		
	if( is_page('archives') ){
		wp_enqueue_script( 'archives', TPLDIR . '/js/archives.js', array(), '20150621', false);
		wp_enqueue_style( 'archives', TPLDIR . '/css/archives.css', array(), '20150621', 'screen');
	};
	if(is_404()){
		wp_enqueue_style( '4041', 'http://fonts.googleapis.com/css?family=Press+Start+2P', array(), '20150621', 'screen');
		wp_enqueue_style( '4042', 'http://fonts.googleapis.com/css?family=Oxygen:700', array(), '20150621', 'screen');
		wp_enqueue_style( '4043', TPLDIR . '/css/404.css', array(), '20150621', 'screen');
	}
}

//copyright below single
function hjyl_copyright($content) {
	if( is_single() ){
		$content.= '<p>--'.__('CopyRights','bb10').': <a class="hjyl_Copy" href="'.home_url().'">'.get_bloginfo('name').'</a> &raquo; <a  class="hjyl_Copy" href="'.get_permalink().'">'.get_the_title().'</a></p>';
	}
	return $content;
}

// Add sidebar
function hjyl_widgets(){
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

//par_pagenavi	
function olo_pagenavi(){
	$args = array(
	'base'         => '%_%',
	'format'       => '?page=%#%',
	'total'        => 1,
	'current'      => 0,
	'show_all'     => False,
	'end_size'     => 1,
	'mid_size'     => 2,
	'prev_next'    => True,
	'prev_text'    => __('<< Previous', 'bb10'),
	'next_text'    => __('Next >>', 'bb10'),
	'type'         => 'plain',
	'add_args'     => False,
	'add_fragment' => ''
	);
	echo paginate_links( $args );
}

//Load Custom parts
 require( dirname( __FILE__ ) . '/inc/theme_inc.php' );
 require( dirname( __FILE__ ) . '/inc/bbComment.php' );
  $hjyl_theme_options = get_option('hjyl_theme_options');
?>