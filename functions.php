<?php
/* 	SunRain Theme's Functions
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SunRain 1.0
*/
	
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	function sunrain_about_page() { 
	add_theme_page( 'SunRain Options', 'SunRain Options', 'edit_theme_options', 'theme-about', 'sunrain_theme_about' ); 
	}
	add_action('admin_menu', 'sunrain_about_page');
	function sunrain_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }		
	
	function sunrain_setup() {
	register_nav_menus( array( 'main-menu' => __('Main Menu', 'sunrain'), 'top-menu' => __('Top Menu', 'sunrain') ) );
	load_theme_textdomain( 'sunrain', get_template_directory() . '/languages' );
//	Set the content width based on the theme's design and stylesheet.
	global $content_width; if ( ! isset( $content_width ) ) $content_width = 584;
	add_theme_support( 'title-tag' );


// 	Tell WordPress for the Feed Link
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)

	
// 	WordPress 3.4 Custom Background Support	
	$sunrain_custom_background = array( 'default-color' => 'ffffff', 'default-image'          => get_template_directory_uri() . '/images/back1.png', );
	add_theme_support( 'custom-background', $sunrain_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$sunrain_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '000000',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $sunrain_custom_header );
	}
	add_action( 'after_setup_theme', 'sunrain_setup' );

// 	Functions for adding script
	function sunrain_enqueue_scripts() { 
	wp_enqueue_style('sunrain-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	
	wp_enqueue_script( 'sunrain-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'sunrain-html5', get_template_directory_uri().'/js/html5.js');
    wp_script_add_data( 'sunrain-html5', 'conditional', 'lt IE 9' );
	
	wp_register_style('sunrain-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('sunrain-gfonts1');
	if (is_front_page()): 
	wp_enqueue_script( 'sunrain-main-slider', get_template_directory_uri() . '/js/jquery.fractionslider.min.js', array( 'jquery' ) );
	wp_enqueue_style('sunrain-main-slider-css', get_template_directory_uri(). '/css/fractionslider.css' );
	endif;
	if ( sunrain_get_option('responsive', '0') == '1' ) : wp_enqueue_style('sunrain-responsive', get_template_directory_uri(). '/style-responsive.css' ); endif;
	}
	add_action( 'wp_enqueue_scripts', 'sunrain_enqueue_scripts' );
	
// 	Functions for adding script to Admin Area
	function sunrain_admin_style() { wp_enqueue_style( 'sunrain_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'sunrain_admin_style' );


// 	Functions for adding some custom code within the head tag of site
	function sunrain_custom_code() {
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
			
<?php 
	
	}
	
	add_action('wp_head', 'sunrain_custom_code');
	
//	function tied to the excerpt_more filter hook.
	function sunrain_excerpt_length( $length ) {
	global $blExcerptLength;
	if ($blExcerptLength) {
    return $blExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'sunrain_excerpt_length', 999 );
	
	function sunrain_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">'.__('Read More', 'sunrain').'<span> ></span></a>';
	}
	add_filter('excerpt_more', 'sunrain_excerpt_more');
	
	// Content Type Showing
	function sunrain_content() {
	if (( sunrain_get_option('contype', '1') != '2' ) || is_page() || is_single() ) : the_content('<span class="read-more">'.__('Read More', 'sunrain').'<span> ></span></span>');
	else: the_excerpt();
	endif;	
	}
	
	function sunrain_creditline() { echo '<span class="credit">| SunRain Theme by: <a href="'. esc_url('http://d5creation.com') .'" target="_blank"><img  src="' . get_template_directory_uri() . '/images/d5logofooter.png" /> D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span>'; }

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function sunrain_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'sunrain_page_menu_args' );
	
// 	Post Date design
	function sunrain_post_date() {
	echo '<div class="post-date"><span class="post-month"> ' . get_the_time('M') . ' </span> <span class="post-day"> ' . get_the_time('d') . ' </span> <span class="post-year"> ' . get_the_time('Y') . ' </span></div>';
	}
	
// 	Post Meta design
	function sunrain_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link('Edit'); ?></span> <span class="post-author"> <?php the_author_posts_link(); ?> </span>
	<span class="post-tag"> <?php the_tags('<span class="post-tag-icon"></span>' , ', '); ?> </span> <span class="post-category"> <?php the_category(', '); ?> </span> <span class="post-comments"> <?php comments_popup_link('No Comments &#187;', 'One Comment &#187;', '% Comments &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
//	Registers the Widgets and Sidebars for the site
	function sunrain_widgets_init() {

	register_sidebar( array(
		'name' => __('Primary Sidebar','sunrain'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Secondary Sidebar','sunrain'),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => __('Footer Area One','sunrain'),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' =>  __('Footer Area Two','sunrain'),
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three','sunrain'),
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer Area Four','sunrain'),
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	}
	add_action( 'widgets_init', 'sunrain_widgets_init' );
	
	add_filter('the_title', 'sunrain_title');
	function sunrain_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	
