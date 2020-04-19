<?php
/* 	Searchlight Theme's Functions
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/

	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function searchlight_about_page() { 
		add_theme_page( esc_html__('Searchlight Options','searchlight'), esc_html__('Searchlight Options','searchlight'), 'edit_theme_options', 'theme-about', 'searchlight_theme_about' ); 
	}
	add_action('admin_menu', 'searchlight_about_page');
	function searchlight_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }

// 	Tell WordPress for the Feed Link
	add_theme_support( "title-tag" );
	add_theme_support( 'yoast-seo-breadcrumbs' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' )))):
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	endif;

	function searchlight_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'searchlight', get_template_directory() . '/languages' );

// 	Theme Menus
	register_nav_menus( array( 'main-menu' => esc_html__('Main Menu', 'searchlight'), 'top-menu' => esc_html__('Top Menu', 'searchlight') ) );

//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;

// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'searchlight-fpage-thumb', 1000, 500, true ); 
	
		
// 	WordPress Custom Background Support	
	$searchlight_custom_background = array( 'default-color' => 'FFFFFF', 'default-image'  => '', );
	add_theme_support( 'custom-background', $searchlight_custom_background );
	
// 	WordPress Custom Header Support				
	$searchlight_custom_header = array(
	'default-image'          => /* get_template_directory_uri(). '/images/logo.png' */'',
	'random-default'         => false,
	'width'                  => 300,
	//'height'                 => 90,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '03d56b',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $searchlight_custom_header );
	}
	add_action( 'after_setup_theme', 'searchlight_setup' );

// 	Functions for adding script
	function searchlight_enqueue_scripts() { 
	wp_enqueue_style('searchlight-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  wp_enqueue_script( 'comment-reply' );  }

	wp_enqueue_script( 'searchlight-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ) );
	wp_register_style('searchlight-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('searchlight-gfonts1');
	wp_register_style('searchlight-gfonts2', '//fonts.googleapis.com/css?family=Monda:400,700', false );
	wp_enqueue_style('searchlight-gfonts2');
		
	wp_enqueue_style('font-awesome5', get_template_directory_uri(). '/css/fawsome-all.css' );
	
	if (searchlight_get_option('header-fixed', '1')) wp_enqueue_script( 'searchlight-fixed-header', get_template_directory_uri(). '/js/fixedheader.js', array( 'jquery' ));
	
	if (is_front_page() || is_page_template( 'front-page.php' ) ): 
	wp_enqueue_script( 'searchlight-flex-js', get_template_directory_uri(). '/js/jquery.flexslider.js', array( 'jquery' ) );
	wp_enqueue_style('searchlight-flex-css', get_template_directory_uri(). '/css/flexslider.css' );
	endif;	
	
	wp_enqueue_style('searchlight-responsive', get_template_directory_uri(). '/style-responsive.css' );
	}
	add_action( 'wp_enqueue_scripts', 'searchlight_enqueue_scripts' );
	
	// 	Functions for adding script to Admin Area
	function searchlight_admin_style($hook) { 
		if ( 'appearance_page_theme-about' != $hook ) { return; }
		wp_enqueue_style( 'searchlight_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); 
	}
	add_action( 'admin_enqueue_scripts', 'searchlight_admin_style' );

//	Enqueue Customizer stylesheet
	function searchlight_customizer_style() {
		wp_enqueue_style( 'searchlight-customizer-css', get_template_directory_uri() . '/inc/customizer-style.css', false );
	}
	add_action( 'customize_controls_print_styles', 'searchlight_customizer_style' );
	
	function searchlight_creditline () {
		echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ). '<span class="credit"> | Searchlight ' . esc_html__('Theme by:', 'searchlight') . ' <a href="'.  esc_url('https://d5creation.com/theme/searchlight/') .'" target="_blank"> D5 Creation</a> | ' . esc_html__('Powered by:', 'searchlight') . ' <a href="http://wordpress.org" target="_blank">WordPress</a>';
    }
	

//	function tied to the excerpt_more filter hook.
	function searchlight_excerpt_length( $length ) {
	global $searchlight_excerpt_length;
	if ($searchlight_excerpt_length) {
    return $searchlight_excerpt_length;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'searchlight_excerpt_length', 999 );
	
	function searchlight_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . esc_html__('Read More', 'searchlight'). '</a>';
	}
	add_filter('excerpt_more', 'searchlight_excerpt_more');
	
	// Content Type Showing
	function searchlight_content() {
	if ( is_page() || is_single() ) : the_content('<span class="read-more">' . esc_html__('Read More', 'searchlight'). '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function searchlight_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'searchlight_page_menu_args' );
	
// 	Post Meta design
	function searchlight_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link(esc_html__('Edit', 'searchlight'),'<span class="fa-edit">','</span>' ); ?></span> <span class="post-author fa-user-md"> <?php the_author_posts_link(); ?> </span> <span class="post-date fa-clock"><?php the_time('F j, Y'); ?></span>	<span class="post-tag fa-tags"> <?php the_tags('' , ', '); ?> </span> <span class="post-category genericon-category"> <?php the_category(', '); ?> </span> <span class="post-comments fa-comments"> <?php comments_popup_link('No Comments' . ' &#187;', 'One Comment' . ' &#187;', '% ' . 'Comments' . ' &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
// Post Not Found
	function searchlight_not_found() { ?>
	<br /><br />
        <div class="searchinfo">
        <h1 class="page-title"><?php echo esc_html__('SORRY, NOT FOUND ANYTHING', 'searchlight'); ?></h1>
		<h3 class="arc-src"><span><?php echo esc_html__('You Can Try Another Search...', 'searchlight'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo home_url(); ?>" ><?php echo esc_html__('&laquo; Or Return to the Home Page', 'searchlight'); ?></a></p>
        </div>
        <br />
	
	<?php
	}
	
// Page Navigation
	function searchlight_page_nav() {
	echo '<div class="page-nav">';
		echo paginate_links(array(
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> '<span class="pagenavprevnext pagenavprev  fa-arrow-circle-left"></span>',
				'next_text'		=> '<span class="pagenavprevnext pagenavnext fa-arrow-circle-right"></span>',
			 ) );
		echo '</div>';    
	}
	
//	Registers the Widgets and Sidebars for the site
	function searchlight_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__('Primary Sidebar', 'searchlight'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__('WooCommerce Sidebar', 'searchlight'), 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => esc_html__('Footer Area One', 'searchlight'), 
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' => esc_html__('Footer Area Two', 'searchlight'), 
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__('Footer Area Three', 'searchlight'), 
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => esc_html__('Footer Area Four', 'searchlight'), 
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'searchlight_widgets_init' );
	
	
	function searchlight_title($title) {
        if ( !is_singular() && (function_exists('is_woocommerce') && !is_woocommerce()) && '' == $title ) { return '--------'; } else { return $title; }
    }
	add_filter('the_title', 'searchlight_title');