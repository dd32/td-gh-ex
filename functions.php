<?php
/* 	Selfie Theme's Functions
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/

	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	function selfie_about_page() { 
	add_theme_page( 'Selfie Options', 'Selfie Options', 'edit_theme_options', 'theme-about', 'selfie_theme_about' ); 
	}
	add_action('admin_menu', 'selfie_about_page');
	function selfie_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }

	function selfie_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'selfie', get_template_directory() . '/languages' );

// 	Theme Menus
	register_nav_menus( array( 'main-menu' => __('Main Menu', 'selfie'), 'top-menu' => __('Top Menu', 'selfie') ) );

//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;


// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "title-tag" );
	add_editor_style();
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'fpage-thumb', 1000, 500, true ); 
	
		
// 	WordPress 3.4 Custom Background Support	
	$selfie_custom_background = array( 'default-color' => 'FFFFFF', 'default-image'  => '', );
	add_theme_support( 'custom-background', $selfie_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$selfie_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '0a96d8',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $selfie_custom_header );
	}
	add_action( 'after_setup_theme', 'selfie_setup' );

// 	Functions for adding script
	function selfie_enqueue_scripts() { 
	wp_enqueue_style('selfie-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'selfie-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_register_style('selfie-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('selfie-gfonts1');
	wp_register_style('selfie-gfonts2', '//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700', false );
	wp_enqueue_style('selfie-gfonts2');
	wp_enqueue_style('selfie-responsive', get_template_directory_uri(). '/style-responsive.css' );
	}
	add_action( 'wp_enqueue_scripts', 'selfie_enqueue_scripts' );

	// 	Functions for adding script to Admin Area
	function selfie_admin_style() { wp_enqueue_style( 'selfie_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'selfie_admin_style' );

// 	Functions for adding some custom code within the head tag of site
	function selfie_custom_code() {
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	
	color: #<?php echo get_header_textcolor(); ?>;
	}
	<?php if ( is_admin_bar_showing() && selfie_get_option('header-fixed', '1') != '0' ): echo '#header { top: 32px; }'; endif; ?>
	</style>
	
<?php 
	
	}
	
	add_action('wp_head', 'selfie_custom_code');


function selfie_creditline () {
	$selfie_theme_data = wp_get_theme(); $selfie_author_uri = $selfie_theme_data->get( 'AuthorURI' );
	echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ). '<span class="credit"> | Selfie ' . __('Theme by:', 'selfie') . ' <a href="'. $selfie_author_uri .'" target="_blank"> D5 Creation</a> | ' . __('Powered by:', 'selfie') . ' <a href="http://wordpress.org" target="_blank">WordPress</a>';
    }
	

//	function tied to the excerpt_more filter hook.
	function selfie_excerpt_length( $length ) {
	global $selfie_excerpt_length;
	if ($selfie_excerpt_length) {
    return $selfie_excerpt_length;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'selfie_excerpt_length', 999 );
	
	function selfie_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . __('Read More', 'selfie'). '</a>';
	}
	add_filter('excerpt_more', 'selfie_excerpt_more');
	
	// Content Type Showing
	function selfie_content() {
	if ( is_page() || is_single() ) : the_content('<span class="read-more">' . __('Read More', 'selfie'). '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function selfie_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'selfie_page_menu_args' );
	
// 	Post Meta design
	function selfie_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link(__('Edit', 'selfie'),'<span class="genericon-edit">','</span>' ); ?></span> <span class="post-author genericon-user"> <?php the_author_posts_link(); ?> </span> <span class="post-date genericon-time"><?php the_time('F j, Y'); ?></span>	<span class="post-tag genericon-tag"> <?php the_tags('' , ', '); ?> </span> <span class="post-category genericon-category"> <?php the_category(', '); ?> </span> <span class="post-comments genericon-comment"> <?php comments_popup_link('No Comments' . ' &#187;', 'One Comment' . ' &#187;', '% ' . 'Comments' . ' &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
// Post Not Found
	function selfie_not_found() { ?>
	<br /><br />
        <div class="searchinfo">
        <h1 class="page-title fa-times-circle"><?php __('SORRY, NOT FOUND ANYTHING', 'selfie'); ?></h1>
		<h3 class="arc-src"><span><?php __('You Can Try Another Search...', 'selfie'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo home_url(); ?>" ><?php __('&laquo; Or Return to the Home Page', 'selfie'); ?></a></p>
        </div>
        <br />
	
	<?php
	}
	
// Page Navigation
	function selfie_page_nav() { ?>	
	<div id="page-nav">
			<div class="alignleft"><?php previous_posts_link('<span class="genericon-previous"></span>  ' . __('NEWER ENTRIES', 'selfie') ); ?></div>
			<div class="alignright"><?php next_posts_link( __('OLDER ENTRIES', 'selfie') .' <span class="genericon-next"></span>'); ?></div>
	</div>
    <?php
	}
	
//	Registers the Widgets and Sidebars for the site
	function selfie_widgets_init() {

	register_sidebar( array(
		'name' =>  __('Primary Sidebar', 'selfie'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  __('Secondary Sidebar', 'selfie'), 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => __('Footer Area One', 'selfie'), 
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' =>  __('Footer Area Two', 'selfie'), 
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three', 'selfie'), 
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __('Footer Area Four', 'selfie'), 
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'selfie_widgets_init' );
	
	
	add_filter('the_title', 'selfie_title');
	function selfie_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	
