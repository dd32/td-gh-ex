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
	add_image_size('70x50-right-top', 70, 50, array( 'right', 'top' ));
	
	//bb10 Title Tag
	add_theme_support( 'title-tag' );
	
	//editor style
	add_editor_style('css/editor.css');
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Enqueue style-file, if it exists.
	add_action('wp_enqueue_scripts', 'bb10_script');
	
	//copyright below single
	add_filter('the_content', 'bb10_copyright');

	// Add sidebar
	add_action( 'widgets_init', 'bb10_widgets' );
	
	//Add custom-header for logo
	$bb10_logo = array(
		'default-image'          => BB10_TPLDIR.'/images/header-logo.png',
		'random-default'         => false,
		'width'                  => 300,
		'height'                 => 60,
		'header-text'            => false,
		'uploads'                => true,
	);
	add_theme_support( 'custom-header', $bb10_logo );
	
	// Add menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','bb10'),
		'mobile' => __( 'Mobile Navigation', 'bb10'),
	) );
};

//Custom wp_list_pages
function bb10_wp_list_pages(){
	echo "<ul>";
	echo wp_list_pages('title_li=&depth=1');
	echo "</ul>";
}

// Enqueue style-file, if it exists.
function bb10_script() {
	if( !bb10_IsMobile ){
		wp_enqueue_style( 'bb10-style', get_stylesheet_uri(),  array(), '20150710', false);
	}else{
		wp_enqueue_style('bb10-mobile', BB10_TPLDIR . '/css/bb10-mobile.css', array(), '20150710', 'all', false);
	};
	wp_enqueue_script( 'jquery' );
	wp_enqueue_style( 'font-awesome', BB10_TPLDIR . '/css/font-awesome.min.css', array(), '20150710', 'all');
	wp_enqueue_script( 'bb10-js', BB10_TPLDIR . '/js/bb10.js', array(), '20150710', true);
	wp_enqueue_script( 'bb10-comments-ajax', BB10_TPLDIR . '/js/bb10-comments-ajax.js', array(), '20150710', true);
	wp_localize_script('bb10-comments-ajax', 'ajaxL10n', array(
		'edt1' => __('Before Refresh, you can','bb10'),
		'edt2' => __('Edit','bb10'),
		'cancel_edit' => __('Cancel Editing','bb10'),
		'txt1' => __('Wait a moment...','bb10'),
		'txt3' => __('Good Comment','bb10')
	));
		
	if ( is_singular() && comments_open() ) wp_enqueue_script( 'comment-reply' );
		
	if( is_page('archives') ){
		wp_enqueue_script( 'bb10-archives', BB10_TPLDIR . '/js/bb10-archives.js', array(), '20150710', false);
		wp_enqueue_style( 'bb10-archives', BB10_TPLDIR . '/css/bb10-archives.css', array(), '20150710', 'all');
	};
	if(is_404()){
		wp_enqueue_style( 'bb10-4041', '//fonts.googleapis.com/css?family=Press+Start+2P', array(), '20150710', 'all');
		wp_enqueue_style( 'bb10-4042', '//fonts.googleapis.com/css?family=Oxygen:700', array(), '20150710', 'all');
		wp_enqueue_style( 'bb10-4043', BB10_TPLDIR . '/css/bb10-404.css', array(), '20150710', 'all');
	}
}

//copyright below single
function bb10_copyright($content) {
	if( is_single() ){
		$content.= '<p>--'.__('CopyRights','bb10').': <a class="hjyl_Copy" href="'.home_url().'">'.get_bloginfo('name').'</a> &raquo; <a  class="hjyl_Copy" href="'.get_permalink().'">'.get_the_title().'</a></p>';
	}
	return $content;
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

//Load Custom parts
 require( get_template_directory() . '/inc/theme_inc.php' );
 require( get_template_directory() . '/inc/bbComment.php' );
  $bb10_theme_options = get_option('bb10_theme_options');
?>