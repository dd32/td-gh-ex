<?php
/**
 * Akasse functions and definitions
 *
 * @package Akasse
 *
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/**
 * Initialize Options Panel
 */
if ( !function_exists( 'optionsframework_init' ) ) {
        define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
        require_once get_template_directory() . '/inc/options-framework.php';
}

if ( ! function_exists( 'akasse_setup' ) ) :

function akasse_setup() {

	load_theme_textdomain( 'akasse', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_image_size('homepage-thumb',180,130,true);

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'akasse' ),
	) );
	add_theme_support( 'post-formats', array( 'image', 'video', 'quote' ) );

	add_theme_support( 'custom-background', apply_filters( 'akasse_custom_background_args', array(
		'default-color' => "ffffff",
	) ) );
}
endif; // akasse_setup
add_action( 'after_setup_theme', 'akasse_setup' );

function akasse_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'akasse' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'akasse_widgets_init' );

add_action('optionsframework_custom_scripts', 'akasse_custom_scripts');

function akasse_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>
 
<?php
}

function akasse_scripts() {
	wp_enqueue_style( 'akasse-fonts', '//fonts.googleapis.com/css?family=Lora:200,400,700');
	wp_enqueue_style( 'akasse-basic-style', get_stylesheet_uri() );
	if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
		if (of_get_option('sidebar-layout', true) ==  'right') {
			wp_enqueue_style( 'akasse-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
		}
		else {
			wp_enqueue_style( 'akasse-layout', get_template_directory_uri()."/css/layouts/sidebar-content.css" );
		}	
	}	
	else {
		wp_enqueue_style( 'akasse-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
	}
	wp_enqueue_style( 'akasse-bootstrap-style', get_template_directory_uri()."/css/bootstrap.min.css", array('akasse-fonts','akasse-layout') );
	wp_enqueue_style( 'akasse-main-style', get_template_directory_uri()."/css/main.css", array('akasse-fonts','akasse-layout') );
	
	wp_enqueue_script( 'akasse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'akasse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_style( 'akasse-nivo-slider-default-theme', get_template_directory_uri()."/css/nivo/themes/default/default.css" );
	
	wp_enqueue_style( 'akasse-nivo-slider-style', get_template_directory_uri()."/css/nivo/nivo.css" );
		
	wp_enqueue_script('akasse-collapse', get_template_directory_uri() . '/js/collapse.js', array('jquery') );
	
	wp_enqueue_script( 'akasse-nivo-slider', get_template_directory_uri() . '/js/nivo.slider.js', array('jquery') );
	
	wp_enqueue_script( 'akasse-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery','hoverIntent') );

	wp_enqueue_script( 'akasse-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	
	wp_enqueue_script( 'akasse-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery','akasse-nivo-slider','akasse-superfish') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'akasse-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'akasse_scripts' );

function akasse_custom_head_codes() {
 if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
	echo "<style>".of_get_option('style2', true)."</style>";
 }
 if ( get_header_image() ) {
 	echo "<style>#masthead {background: url(".get_header_image().");,height:450px, overflow: auto;}</style>";
 	}
}	
add_action('wp_head', 'akasse_custom_head_codes');

function akasse_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_page_menu_args', 'akasse_nav_menu_args' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Menu For Bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
/**
 * Custom functions that act independently of the theme templates. Import Widgets
 */
//require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
