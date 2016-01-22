<?php
/**
 * beam functions and definitions
 *
 * @package beam
 */

 

if ( ! function_exists( 'beam_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function beam_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */

	load_theme_textdomain( 'beam', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */

	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 */

	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions, cropped
		// additional image sizes
		add_image_size( 'big-thumbnail', 600, 220); //500 pixels wide and unlimited height, cropped
		add_image_size( 'thumb-large', 720, 340 ); // Soft proprtional crop to max 720px width, max 340px height
	}

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beam' ),
		'footer' => __( 'Footer Menu', 'beam' ),
	) );

	/**
	 * Enable support for Post Formats
	 */

	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'gallery', 'quote', 'link', 'chat', 'status', ) );

	/**
	 * Declare Title Tag Support
	 */

	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function theme_slug_render_title() {
			echo "<title><?php wp_title( '|', true, 'right' ); ?></title>";
		}
	add_action( 'wp_head', 'theme_slug_render_title' );
	}

	/**
	 * Declare Theme Editor Styling Support
	 * TO DO: 
	 */

	if(is_admin()){
		function my_theme_add_editor_styles() {
			//add_editor_style( 'custom-editor-style.css' );
			$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,300' );
			add_editor_style( $font_url );
		}
		add_action( 'after_setup_theme', 'beam_setup' );
	}

	/**
	* Declare Custom Header Support
	*/
	$args = array(
		'width'         => 1312,
		'height'        => 200,
		'default-image' => get_template_directory_uri() . '/inc/images/default-header-bcg.png',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $args );

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) )
		$content_width = 1312; /* pixels */
}
endif; // beam_setup

add_action( 'after_setup_theme', 'beam_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */

function beam_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'beam' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'beam' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Home', 'beam' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );	

		register_sidebar( array(
		'name'          => __( 'Footer Widget', 'beam' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}

add_action( 'widgets_init', 'beam_widgets_init' );


/**
 * Add Kirki
 */

include_once( dirname( __FILE__ ) . '/inc/adm/kirki/kirki.php' );

/**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 */

function kirki_update_url( $config ) {
    $config['url_path'] = get_template_directory_uri() . '/inc/adm/kirki/';
    return $config;
	add_action( 'wp_enqueue_scripts', function() {
		remove_action( 'wp_enqueue_scripts', array( Kirki()->styles['front'], 'enqueue_styles' ) );
	}, 999 );
}

add_filter( 'kirki/config', 'kirki_update_url' );


/**
 * Enqueue scripts and styles
 */

function beam_scripts() {
	wp_enqueue_script( 'beam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'beam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'beam-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action( 'wp_enqueue_scripts', 'beam_scripts' );


/**
 * Load CSS & Font Awesome fonts for this theme.
 */ 

function beam_styles() 

{
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/inc/fonts/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'beam_styles' ); 



/**
 * Load content-one content
 * Used in Include One template
 */ 

function load_content_one($path) {
	  $post = get_page_by_path($path);
	  $content = apply_filters('the_content', $post->post_content);
	  echo $content;
}


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


function beam_setup_html() {

	/**
	* Add HTML5 Support
	*/

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'beam_setup_html' );