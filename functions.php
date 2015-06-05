<?php
/**
 * aaron functions and definitions
 *
 * @package aaron
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'aaron_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aaron_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on aaron, use a find and replace
	 * to change 'aaron' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aaron', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'woocommerce' );		
	
	add_theme_support( 'jetpack-responsive-videos' ); 

	add_theme_support( 'jetpack-testimonial' );
	
	add_theme_support( 'jetpack-portfolio' );

	add_editor_style();
	
	add_theme_support( 'post-thumbnails' );	

	add_image_size( 'aaron-featured-posts-thumb', 360, 300);
	
	add_theme_support( 'title-tag' );
	
	register_nav_menus( array(
		'header' => __( 'Primary Menu', 'aaron' ),
		'social' => __( 'Social Menu', 'aaron' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

}
endif; // aaron_setup
add_action( 'after_setup_theme', 'aaron_setup' );

/**
* aaron_hide_search
*
* Unless the option is hidden in the customizer, display a search form in the primary menu.
*/

if ( get_theme_mod('aaron_hide_search') =="" ){

	function aaron_menu_search( $items, $args ) {
	    if( $args->theme_location == 'header' ) {
	    	 $items = $items . '<li class="topsearch">' . get_search_form(false) .'</li>';
	    }
	    return $items;
	}
	
	add_filter('wp_nav_menu_items','aaron_menu_search', 10, 2);
}


/**
* aaron_hide_title
*
* Unless the option is hidden in the customizer, display the site title (with link) in the primary menu.
*/

if ( get_theme_mod( 'aaron_hide_title') =="" ){

	function aaron_menu_title( $items, $args ) {
	    if( $args->theme_location == 'header' ){

	    	$new_item       = array( '<li class="toptitle"><a href="' . esc_url( home_url( '/' ) ) .'" rel="home">' . get_bloginfo('name') .'</a></li>' );
	        $items          = preg_replace( '/<\/li>\s<li/', '</li>,<li',  $items );

	        $array_items    = explode( ',', $items );
	        array_splice( $array_items, 0, 0, $new_item ); // splice in at position 1
	        $items          = implode( '', $array_items );

	    }

	    return $items;
	}
	add_filter('wp_nav_menu_items','aaron_menu_title', 10, 2);
}


/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function aaron_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'aaron' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer widget area', 'aaron' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer copyright area', 'aaron' ),
		'id'            => 'sidebar-copyright',
		'description'   => __( 'Place a text widget in this area and add your copyright text', 'aaron'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'aaron_widgets_init' );


if ( ! function_exists( 'aaron_fonts_url' ) ) :
	function aaron_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'aaron' ) ) {
			$fonts[] = 'Montserrat';
		}

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'aaron' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;


/**
 * Enqueue scripts and styles.
 */
function aaron_scripts() {
	wp_enqueue_style( 'aaron-style', get_stylesheet_uri(), array('dashicons') );
	wp_enqueue_style( 'aaron-fonts', aaron_fonts_url(), array(), null );
	wp_enqueue_style( 'open-sans');

	wp_enqueue_script( 'aaron-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'aaron-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aaron_scripts' );


/*
 * Enqueue styles for the setup help page.
 */ 

function aaron_admin_scripts($hook) {
	if ( 'appearance_page_aaron-theme' !== $hook ){
		return;
	}
	wp_enqueue_style( 'aaron-admin-style', get_template_directory_uri() .'/admin.css');
}
add_action( 'admin_enqueue_scripts', 'aaron_admin_scripts' );


/**
 * Custom header for this theme.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Highlights
 */
require get_template_directory() . '/inc/highlights.php';

/**
 * Setup help
 */
require get_template_directory() . '/documentation.php';


/* Add a title to posts that are missing titles */
add_filter( 'the_title', 'aaron_post_title' );
function aaron_post_title( $title ) {
	if ( $title == '' ) {
		return __( '(Untitled)', 'aaron' );
	}else{
		return $title;
	}
}

function aaron_no_sidebars($classes) {
	 /* 	Are sidebars hidden on the frontpage?
	 *		Is the sidebar activated?
	 *		Add 'no-sidebar' to the $classes array
	 */		
	if ( is_front_page() && get_theme_mod('aaron_front_sidebar') =="" || is_home() && get_theme_mod('aaron_front_sidebar') =="" || is_page() && get_theme_mod('aaron_show_sidebar_on_pages')=="" || ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if( get_theme_mod('aaron_hide_meta')){
		$classes[] = 'no-meta';
	}

	return $classes;
}
add_filter( 'body_class', 'aaron_no_sidebars' );


function aaron_customize_css() {
	echo '<style type="text/css">';
	 if ( is_admin_bar_showing() ) {
	 	?>
	 	.main-navigation{top:32px;}

	 	@media screen and ( max-width: 782px ) {
			.main-navigation{top:46px;}
		}

		@media screen and ( max-width: 600px ) {
			.main-navigation{top:0px;}
		}

	<?php
	 }
	 
	echo '.site-title{color:#' . get_header_textcolor() . ';} ';

	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) {
	?>
		.site-header {
		background: <?php esc_attr_e( get_theme_mod('aaron_header_bgcolor', '#4777a6') ) ?> url(<?php header_image(); ?>) <?php esc_attr_e( get_theme_mod('aaron_header_bgrepeat', 'no-repeat') ); ?> <?php esc_attr_e( get_theme_mod('aaron_header_bgpos', 'center top') ); ?>;
		background-size: <?php esc_attr_e( get_theme_mod('aaron_header_bgsize', 'cover') ); ?>;
		}

	<?php
	/* No header image has been chosen, check for background color: */
	}else{
		if( get_theme_mod('aaron_header_bgcolor') ){
			echo '.site-header { background:' . esc_attr( get_theme_mod('aaron_header_bgcolor', '#4777a6') ) . ';}';
			echo '#action:hover, #action:focus{text-shadow:none;}';
		}

	}

	//Call to Action text color
	if( get_theme_mod( 'aaron_action_color' ) <> ' ') {
		echo '#action, #action a{ color:' . esc_attr( get_theme_mod('aaron_action_color', '#ffffff') ) . ';}';
	}

	//Call to Action background color
	if( get_theme_mod( 'aaron_action_bgcolor' ) <> '') {
		echo '#action, #action a{background:#' . esc_attr( get_theme_mod('aaron_action_bgcolor', 'none') ) . ';}';
	}

	//Change UPPERCASE to Capitalized Text Instead
	if( get_theme_mod( 'aaron_caps' )) {
		echo '.main-navigation,
			.widget-title,
			.widgettitle,
			.entry-title,
			.entry-title a,
			.site-title,
			.site-info,
			.site-description,
			.page-links,
			.page-title,
			.comments-title,
			.comment-reply-title,
			.featured-headline,
			.testimonial-entry-title,
			.featured-post h2{text-transform:capitalize;}';
	}

	// If avatars are enabled, alter the css:
	if ( get_option( 'show_avatars' ) ) {
		echo '.comment-metadata{
			margin-left:70px;
			display:block;
			margin-top:-25px;
		}';
	}

	echo '</style>' . "\n";
}
add_action( 'wp_head', 'aaron_customize_css');