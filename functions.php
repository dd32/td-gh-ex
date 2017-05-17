<?php
function aqua_theme_features()  {
	global $wp_version;
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aquaparallax Theme, use a find and replace
	 */
	load_theme_textdomain( 'aquaparallax', get_template_directory() . '/languages' );
	
	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '#cccccc',
		'default-image' 		 => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
        'random-default'         => false,
        'width'                  => '',
        'height'                 => '',
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
	);
	
add_theme_support( 'custom-header', $header_args );

function aqua_register_menus() {
  register_nav_menus(
    array(
      'header-menu' => esc_html( 'Header Menu', 'aquaparallax' ),
      'extra-menu' => esc_html( 'Extra Menu', 'aquaparallax' )
    )
  );
}
add_action( 'init', 'aqua_register_menus' );	

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

}

// Aquaparallax custom logo 
function aqua_custom_logo_setup() {
    $defaults = array(
        'height'      => 71,
        'width'       => 255,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'aqua_custom_logo_setup' );

// Featured image support
add_theme_support( 'post-thumbnails' ); 

// wp enque script and style
function aqua_scripts() {
    // aquaparallax styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', true, '', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', false, '', 'all' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css', false, '', 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, '', 'all' );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.min.css', false, '', 'all' );
	wp_enqueue_style( 'elastic', get_template_directory_uri() . '/assets/css/elastic_grid.min.css', false, '', 'all' );
	wp_enqueue_style( 'testimonial', get_template_directory_uri() . '/assets/css/testimonial-style.css', false, '', 'all' );
	wp_enqueue_style( 'pagination', get_template_directory_uri() . '/assets/css/pagination.css', false, '', 'all' );
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Pacifico|Roboto:400,500,700', false, '', 'all' );

    // aquaparallax scripts
	wp_enqueue_script( 'test-modernizr', get_template_directory_uri() . '/assets/js/testi-modernizr.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true ); 
	wp_enqueue_script( 'menu-jquery', get_template_directory_uri() . '/assets/js/menu-jquery.js', array( 'jquery' ), '', true );  
	wp_enqueue_script( 'nav-jquery', get_template_directory_uri() . '/assets/js/nav.jquery.min.js', array( 'jquery' ), '', true );	
}
add_action('wp_enqueue_scripts', 'aqua_scripts');

// Aquaparallax Register widget
function aqua_widgets_init() {
	// Right Sidebar
	register_sidebar( array(
		'name'          => esc_html( 'Right Sidebar', 'aquaparallax' ),
		'id'            => 'aqua_right_sidebar',
		'description'   => esc_html( 'Add widgets here for right sidebar.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Left Sidebar
	register_sidebar( array(
		'name'          => esc_html( 'Left Sidebar', 'aquaparallax' ),
		'id'            => 'aqua_left_sidebar',
		'description'   => esc_html( 'Add widgets here for left sidebar.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 1
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 1', 'aquaparallax' ),
		'id'            => 'aqua_footer_sidebar1',
		'description'   => esc_html( 'Add widgets here for footer sidebar 1.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 2
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 2', 'aquaparallax' ),
		'id'            => 'aqua_footer_sidebar2',
		'description'   => esc_html( 'Add widgets here for footer sidebar 2.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 3
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 3', 'aquaparallax' ),
		'id'            => 'aqua_footer_sidebar3',
		'description'   => esc_html( 'Add widgets here for footer sidebar 3.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	// Footer 4
	register_sidebar( array(
		'name'          => esc_html( 'Footer Sidebar 4', 'aquaparallax' ),
		'id'            => 'aqua_footer_sidebar4',
		'description'   => esc_html( 'Add widgets here for footer sidebar 4.', 'aquaparallax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'aqua_widgets_init' );

// Aquaparallax register nav walker
require_once('wp_bootstrap_navwalker.php');

// Aquaparallax excerpt length for posts
function custom_excerpt_length( $length ) {
        return 20;
    }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Aquaparallax register customizer
require_once('inc/customizer.php');

// Aquaparallax register testimonial 
require_once('inc/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once('inc/tgm-plugin-activation/tgmpa-aqua.php');

// Aquaparallax post format support
function aqua_post_formats_setup() {
    add_theme_support( 'post-formats', array( 'audio', 'quote', 'image', 'video' ) );
}
add_action( 'after_setup_theme', 'aqua_post_formats_setup' );

// Aquaparallax register custom fields 
add_action('wp_insert_post', 'aqua_custom_fields');
function aqua_custom_fields($post_id){
if ( 'post_type' == 'testimonial' ) {
 
add_post_meta($post_id, 'Client Name', '', true);
add_post_meta($post_id, 'Client Company', '', true);
}
return true;
}

// Aquaparallax register pagination
require_once('inc/pagination.php');

// Generate breadcrumbs
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

// Aquaparallax title tag
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

function aqua_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( esc_html( 'Page %s', 'aquaparallax' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'aqua_wp_title', 10, 2 );
 
 // Aquaparallax content width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

// Aquaparallax link pages
 	$defaults = array(
		'before'           => '<p>' . esc_html( 'Pages:', 'aquaparallax' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => esc_html( 'Next page', 'aquaparallax' ),
		'previouspagelink' => esc_html( 'Previous page', 'aquaparallax' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
        wp_link_pages( $defaults );
		
function aqua_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'aqua_add_editor_styles' );