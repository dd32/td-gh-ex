<?php
/* 	Awesome Theme's Functions
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
  
  	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	function awesome_about_page() { 
	add_theme_page( 'AWESOME Options', 'AWESOME Options', 'edit_theme_options', 'theme-about', 'awesome_theme_about' ); 
	}
	add_action('admin_menu', 'awesome_about_page');
	function awesome_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }	
	function awesome_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'awesome', get_template_directory() . '/languages' );
	
	register_nav_menus( array( 'main-menu' => "Main Menu", 'top-menu' => "Top Menu" ) );


//	Set the content width based on the theme's design and stylesheet.
	if ( ! isset( $content_width ) ) $content_width = 584;
	add_theme_support( 'title-tag' );

// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'awesome-fpage-thumb', 1100, 600, array( 'left', 'top' ) ); 
	
		
// 	WordPress 3.4 Custom Background Support	
	$awesome_custom_background = array( 'default-color' => '025A05', 'default-image'  => get_template_directory_uri() . '/images/background.png', );
	add_theme_support( 'custom-background', $awesome_custom_background );
	
	add_theme_support( 'custom-logo', array(
   'height'      =>90,
   'width'       => 300,
   'flex-width' => true,
	) );
	
	}
	add_action( 'after_setup_theme', 'awesome_setup' );

// 	Functions for adding script
	function awesome_enqueue_scripts() { 
	wp_enqueue_style('awesome-style', get_stylesheet_uri(), false );
	wp_enqueue_script( 'awesome-html5', get_template_directory_uri().'/js/html5.js');
    wp_script_add_data( 'awesome-html5', 'conditional', 'lt IE 9' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' );  }
	wp_enqueue_script( 'awesome-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_register_style('awesome-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('awesome-gfonts1');
	wp_enqueue_style('awesome-font-awesome-css', get_template_directory_uri(). '/css/font-awesome.css' );
	
	if (is_front_page() || is_page_template( 'front-page.php' ) ): 
	wp_enqueue_script( 'awesome-owl-js', get_template_directory_uri(). '/js/owl.carousel.js', array( 'jquery' ) );
	wp_enqueue_script( 'awesome-slide', get_template_directory_uri(). '/js/slide.js', array( 'jquery' ) );
	wp_enqueue_style('awesome-owl-m-css', get_template_directory_uri(). '/css/owl.theme.css' ); 
	wp_enqueue_style('awesome-owl-css', get_template_directory_uri(). '/css/owl.carousel.css' ); 
	wp_enqueue_style('awesome-owl-t-css', get_template_directory_uri(). '/css/owl.transitions.css' ); 
	endif; 
	wp_enqueue_style('awesome-responsive', get_template_directory_uri(). '/style-responsive.css' );
	}
	add_action( 'wp_enqueue_scripts', 'awesome_enqueue_scripts' );
	// 	Functions for adding script to Admin Area
	function awesome_admin_style() { wp_enqueue_style( 'awesome_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'awesome_admin_style' );


// 	Functions for adding some custom code within the head tag of site
	function awesome_custom_code() {
?>
	
	<style type="text/css">
	.site-title a, 
	.site-title a:active, 
	.site-title a:hover {
	color: #<?php echo get_header_textcolor(); ?>;
	}
	<?php if ( is_admin_bar_showing() ): echo '#header { top: 32px; }'; endif; ?>
	</style>
	
<?php 
	
	echo awesome_get_option('headcode');
	}
	
	add_action('wp_head', 'awesome_custom_code');


	function awesome_creditline () {
	echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ). '<span class="credit"> | Awesome ' . __('Theme by:', 'awesome') . ' <a href="'. 		esc_url('http://d5creation.com') .'" target="_blank"> D5 Creation</a> | ' . __('Powered by:', 'awesome') . ' <a href="http://wordpress.org" target="_blank">WordPress</a>';
    }
	

//	function tied to the excerpt_more filter hook.
	function awesome_excerpt_length( $length ) {
	global $blExcerptLength;
	if ($blExcerptLength) {
    return $blExcerptLength;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'awesome_excerpt_length', 999 );
	
	function awesome_excerpt_more($more) {
    global $post;
	return '<a href="'. esc_url(get_permalink($post->ID)) . '" class="read-more">' . __('Read More', 'awesome'). '</a>';
	}
	add_filter('excerpt_more', 'awesome_excerpt_more');
	
	// Content Type Showing
	function awesome_content() {
	if ( is_page() || is_single() ) : the_content('<span class="read-more">' . __('Read More', 'awesome'). '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function awesome_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'awesome_page_menu_args' );
	
// 	Post Meta design
	function awesome_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link(__('Edit', 'awesome'),'<span class="fa-edit">','</span>' ); ?></span> <span class="post-author fa-user-md"> <?php the_author_posts_link(); ?> </span> <span class="post-date fa-clock-o"><?php the_time('F j, Y'); ?></span>	<span class="post-tag fa-tags"> <?php the_tags('' , ', '); ?> </span> <span class="post-category fa-archive"> <?php the_category(', '); ?> </span> <span class="post-comments fa-comments"><?php comments_popup_link(__('No Comments', 'awesome') . ' &#187;', __('One Comment', 'awesome') . ' &#187;', '% ' . __('Comments', 'awesome') . ' &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
//	Page Navigation
	function awesome_page_nav() { ?>
		<div id="page-nav">
			<div class="alignleft"><?php previous_posts_link('<span class="fa-arrow-left"></span>  ' .  __('NEWER ENTRIES', 'awesome') ) ?></div>
			<div class="alignright"><?php next_posts_link(__('OLDER ENTRIES', 'awesome') .' <span class="fa-arrow-right"></span>') ?></div>
		</div>
    <?php }
	
//	Page Not Found
	function awesome_not_found() { ?>
		<br /><br />
        <div class="searchinfo">
        <h1 class="page-title fa-times-circle"><?php echo __('SORRY, NOT FOUND ANYTHING', 'awesome'); ?></h1>
		<h3 class="arc-src"><span><?php echo __('You Can Try Another Search...', 'awesome'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo esc_url(home_url()); ?>" >&laquo; <?php echo __('&laquo; Or Return to the Home Page', 'awesome'); ?></a></p>
        </div>
        <br />
    <?php }	
	
//	Registers the Widgets and Sidebars for the site
	function awesome_widgets_init() {

	register_sidebar( array(
		'name' =>  __('Primary Sidebar', 'awesome'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  __('Secondary Sidebar', 'awesome'), 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => __('Footer Area One', 'awesome'), 
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' =>  __('Footer Area Two', 'awesome'), 
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three', 'awesome'), 
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __('Footer Area Four', 'awesome'), 
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'awesome_widgets_init' );
	
	
	add_filter('the_title', 'awesome_title');
	function awesome_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	

