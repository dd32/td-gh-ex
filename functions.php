<?php
/**
 * functions.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.1
 */

/* TABLE OF CONTENT

 1 - Dependecies
 2 - Setup Theme  
 3 - Register Area Widget Contact Form
 4 - Register widget area   
 5 - Custom label for Form Search
 6 - Remove default Url Website Form Comments
 7 - Breadcrumb
 8 - Breadcrumb Archive
 9 - Breadcrumb Search
10 - Add Custom Styles Editor
11 - Carousel featured image
12 - Avik Support Page
13 - Lightbox popup image
14 - Lenght excerpt
15 - Include javascript files
16 - Include css files
17 - Include script and styles for class add Panel 
18 - Add additional templates
19 - Google Fonts URL function
20 - Include Plugin
21 - Multipost Thumbnails Plugin
*/


/* 1 Dependecies
 ------------------------------------------------------------*/

// Include custom navwalker

require_once('assets/bs4navwalker.php');

/* 2 Setup Theme
------------------------------------------------------------*/

if ( ! function_exists( 'avik_setup' ) ) :

  function avik_setup() {

        load_theme_textdomain( 'avik', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

        // add support titles
        add_theme_support( 'title-tag' );
        // add support excerpt page
        add_post_type_support( 'page', 'excerpt' );

		// enable featured image
		add_theme_support("post-thumbnails");

		// create custom size images
		add_image_size('avik_big', 1400, 800, true);
		add_image_size('avik_quad', 600, 600, true);
		add_image_size('avik_single', 750, 450, true);
		add_image_size('avik_brand', 115, 100, true);
		add_image_size('avik_services', 80, 80, true);
		// create custom menus
		register_nav_menus( array(
			'menu-1' => esc_html__('Primary (Home)', 'avik'),
			'menu-2' => esc_html__('Secondary (Pages)','avik'),
		) );


		// add support  HTML5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// add support for Video
		add_theme_support( 'custom-header', array(
			'video' => true,
			'video-active-callback' => true,
		   ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'avik_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	}
endif;
add_action( 'after_setup_theme', 'avik_setup' );

function avik_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'avik_content_width', 640 );
}
add_action( 'after_setup_theme', 'avik_content_width', 0 );

/* 3 Register Area Widget Contact Form 
-------------------------------------------------------- */

if(! function_exists('avik_widget_contact_form') ) {

	function avik_widget_contact_form(){
	  register_sidebar(array(
		'name' => esc_html__('Area Widget Contact Form','avik'),
		'id' => 'widget_contact_form',
		'description' => esc_html__('Area Widget Contact Form','avik'),
		'before_title' => '<h3>' ,
		'after_title' => '</h3>',
		'before_widget' => '<div class="widget avik-contact %2$s clearfix">',
		'after_widget' => '</div>',
		)
	  );
	}
  }
  
add_action('widgets_init','avik_widget_contact_form');

/* 3 B Register Area Widget Contact Form Services
-------------------------------------------------------- */

if(! function_exists('avik_widget_contact_form_services') ) {

	function avik_widget_contact_form_services(){
	  register_sidebar(array(
		'name' => esc_html__('Area Widget Contact Form Services','avik'),
		'id' => 'widget_contact_form_services',
		'description' => esc_html__('Area Widget Contact Form Services','avik'),
		'before_title' => '<h3>' ,
		'after_title' => '</h3>',
		'before_widget' => '<div class="widget avik-contact %2$s clearfix">',
		'after_widget' => '</div>',
		)
	  );
	}
  }
  
add_action('widgets_init','avik_widget_contact_form_services');



/* 4 Register widget area
------------------------------------------------------------*/

if(! function_exists('avik_widget_init') ) {

function avik_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'avik' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'avik' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	}	

}
add_action( 'widgets_init', 'avik_widgets_init' );

/* 5 Custom label for Form Search
------------------------------------------------------------*/


if(! function_exists('avik_html5_search_form') ) {

	function avik_html5_search_form( $form ) { 
		$form = '<section class="search"><form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	   <label class="screen-reader-text" for="s">' . __('',  'avik') . '</label>
		<input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder= "'. esc_attr__('Keyword ...', 'avik') .'" />
		<input type="submit" class="search-submit" value="'. esc_attr__('Search', 'avik') .'" />
		</form></section>';
		return $form;
	}
	}
	
	add_filter( 'get_search_form', 'avik_html5_search_form' );

/* 6 Remove default Url Website Form Comments
------------------------------------------------------------*/

if(! function_exists('avik_disable_comment_url') ) {

function avik_disable_comment_url($fields) { 
    unset($fields['url']);
	return $fields;
}	
}
add_filter('comment_form_default_fields','avik_disable_comment_url');


/* 7 Breadcrumb
------------------------------------------------------------*/

function avik_the_breadcrumb() {

    $sep = ' &nbsp;|&nbsp; ';
    if (!is_front_page()) {
		echo '<div class="container">';
		echo '<div class="row breadcrumbs">';
		echo '<div class="text-breadcrumbs avikArticle text-left col-sm-4">';
		echo '<i class="fas fa-image"></i>';
		the_title();
		echo '</div>';
		echo '<div class="menu-breadcrumbs col-sm-8">';
		echo esc_html__( 'You are here:&nbsp;&nbsp;', 'avik' );	
        echo '<a href="';
        echo home_url('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
        if (is_category() || is_single() ){
            single_term_title();
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'avik' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'avik' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'Y', 'yearly archives date format', 'avik' ) ) );
            } else {
                _e( 'Blog Archives', 'avik' );
            }
        }
        if (is_single()) {
            echo $sep;
            the_title();
        }
        if (is_page()) {
            echo the_title();
        }
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
		echo '</div>';
		echo '</div>';
		echo '</div>';	
	}
}

/* 8 Breadcrumb Archive
------------------------------------------------------------*/

function avik_the_breadcrumb_archive() {

    $sep = ' &nbsp;|&nbsp; ';
    if (!is_front_page()) {
		echo '<div class="container">';
		echo '<div class="row breadcrumbs">';
		echo '<div class="text-breadcrumbs text-left col-sm-4">';
        echo '<i class="fas fa-archive"></i>';	
		single_term_title();
		echo '</div>';
		echo '<div class="menu-breadcrumbs avikArchive col-sm-8">';
		echo esc_html__( 'You are here:&nbsp;&nbsp;', 'avik' );	
        echo '<a href="';
        echo home_url('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
        if (is_category() || is_single() ){
            single_term_title();
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'avik' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'avik' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'Y', 'yearly archives date format', 'avik' ) ) );
            } else {
                _e( 'Blog Archives', 'avik' );
            }
        }
        if (is_single()) {
            echo $sep;
            the_title();
        }
        if (is_page()) {
            echo the_title();
        }
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
		echo '</div>';
		echo '</div>';
		echo '</div>';	
	}
}

/* 9 Breadcrumb Search
------------------------------------------------------------*/

function avik_the_breadcrumb_search() {

    $sep = ' &nbsp;|&nbsp; ';
    if (!is_front_page()) {
		echo '<div class="container">';
		echo '<div class="row breadcrumbs">';
		echo '<div class="text-breadcrumbs avikSearch text-left col-sm-4">';
		echo '<i class="far fa-lightbulb"></i>';
		printf( esc_html__( 'Results for: "%s"', 'avik' ), '<span>' . get_search_query() . '</span>' );
		echo '</div>';
		echo '<div class="menu-breadcrumbs col-sm-8">';
		echo esc_html__( 'You are here:&nbsp;&nbsp;', 'avik' );	
        echo '<a href="';
        echo home_url('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'avik' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'avik' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'avik' ), get_the_date( _x( 'Y', 'yearly archives date format', 'avik' ) ) );
            } else {
                _e( 'Blog Archives', 'avik' );
            }
        }
        if (is_single()) {
            echo $sep;
            the_title();
        }	
        if (is_page()) {
            echo the_title();
        }	
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
		echo '</div>';
		echo '</div>';
		echo '</div>';	
	}
}

/* 10 Add Custom Styles Editor 
-------------------------------------------------------- */

function avik_wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'avik_wpb_mce_buttons_2');
	
/* Callback function to filter the MCE settings */
 
function avik_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
	 
$style_formats = array(  

			array(  
				'title' => __('Avik Success', 'avik'),
				'block' => 'blockquote',  
				'classes' => 'alert alert-success alert-link',
				'wrapper' => true,
			),

			array(  
				'title' => __('Avik Quote', 'avik'), 
				'block' => 'blockquote',  
				'classes' => 'alert alert-secondary alert-link',
				'wrapper' => true,
			),

			array(  
				'title' => __('Avik Danger','avik'),  
				'block' => 'blockquote',  
				'classes' => 'alert alert-danger alert-link',
				'wrapper' => true,
			),

			
			array(  
				'title' => __('Avik Warning','avik'),  
				'block' => 'blockquote',  
				'classes' => 'alert alert-warning alert-link',
				'wrapper' => true,
			),

			array(  
				'title' => __('Avik Info','avik'), 
				'block' => 'blockquote',  
				'classes' => 'alert alert-info alert-link',
				'wrapper' => true,
			),

			array(  
				'title' => __('Avik Button','avik'), 
				'block' => 'span',  
				'classes' => 'avik-button-editor',
				'wrapper' => true,
			),  
		
			
		);  
		
    $init_array['style_formats'] = json_encode( $style_formats );  	 
	return $init_array;  	   
} 
	
add_filter( 'tiny_mce_before_init', 'avik_mce_before_init_insert_formats' ); 


function avik_my_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'avik_my_theme_add_editor_styles' );


/* 11 Carousel featured image 
------------------------------------------------------------*/

function avik_carousel_scripts() {
  
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '20120206', true );
   
}
add_action( 'wp_enqueue_scripts', 'avik_carousel_scripts' );


add_image_size( 'carousel-pic', 480, 320, true ); 

/* 12 Avik Support Page
------------------------------------------------------------*/

add_action('admin_menu', 'avik_page_create');

function avik_page_create() {
    add_theme_page('Avik', 'AVIK', 'edit_theme_options', 'avik_page', 'avik_page_display','dashicons-universal-access-alt');
    
}

function avik_page_display() {
    include 'avik-support.php';
}

  //Include Admin Style

add_action( 'admin_enqueue_scripts', 'avik_load_admin_style' );
function avik_load_admin_style() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );	
    wp_enqueue_script( 'admin_script', get_template_directory_uri() . '/js/admin-script.js', false, '1.0.0' );
    wp_enqueue_style( 'wp-bootstrap-avik-font-awesome-admin', get_template_directory_uri() . '/css/fontawesome-all.css' );		
}

/* 13 Lightbox popup image
-------------------------------------------------------- */

function avik_register_lightbox() {
	if (!is_admin()) {
	wp_register_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.min.css');
	wp_enqueue_style('lightbox-css');
	wp_register_script('lightbox-script', get_template_directory_uri() . '/js/lightbox-plus-jquery.min.js', '', '', false);
	wp_enqueue_script('lightbox-script');
}
}
add_action( 'init', 'avik_register_lightbox' );

add_filter('the_content', 'avik_addtaglightbox', 12);
    
function avik_addtaglightbox ($content){ 
    global $post;
    $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 data-lightbox="img['.$post->ID.']"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

/* 14 Lenght excerpt
-------------------------------------------------------- */

function avik_wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'avik_wpdocs_custom_excerpt_length', 999 );

//Filter content more excerpt

function avik_custom_excerpt_more( $more ) { return '...';
    
} add_filter( 'excerpt_more', 'avik_custom_excerpt_more' ); 

   
/* 15 Include javascript files
------------------------------------------------------------*/

function avik_scripts() {

    // Bootstrap
	wp_enqueue_script('avik-popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),null ,true );
    wp_enqueue_script('avik-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),null ,true );
    // Avik 
	wp_enqueue_script('avik-script-js', get_template_directory_uri() .'/js/avik-script.js',  array('jquery'),null,true);
	wp_enqueue_script( 'avik-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'avik-skip-link-focus-fix-js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    // Writing text 
    wp_enqueue_script( 'avik-text-js', get_template_directory_uri() . '/js/typed.js', array(), '20151215', true );
    // AOS Animate
    wp_enqueue_script('avik-aos-js',get_template_directory_uri() . '/js/aos.js', array(), '2.0.0', false );
    // Carousel Brands
	wp_enqueue_script('avik-carousel-brands-js', get_template_directory_uri() . '/js/carousel.js', array(), '1.6.0', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'avik_scripts' );


/* 16 Include css files
-------------------------------------------------------- */

if(! function_exists('avik_styles') ) {

  function avik_styles(){
	
	// Bootstrap
	wp_enqueue_style('avik-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
	// Default Avik
	wp_enqueue_style( 'avik-style', get_stylesheet_uri() );
	// Font Awesome
	wp_enqueue_style('avik-font-awesome', get_template_directory_uri(). '/css/fontawesome-all.min.css');
	// AOS Animate
	wp_enqueue_style('avik-aos-css', get_template_directory_uri(). '/css/aos.css'); 
	// Include Font
	wp_enqueue_style('avik-google-fonts', avik_fonts_url(), array(), null); 

  }

}

add_action('wp_enqueue_scripts', 'avik_styles');

/* 17 Include script and styles for class add Panel
------------------------------------------------------------*/

function avik_pe_customize_controls_scripts() {

    wp_enqueue_script( 'avik-pe-customize-controls', get_theme_file_uri( '/assets/js/pe-customize-controls.js' ), array(), '1.0', true );
}

    add_action( 'customize_controls_enqueue_scripts', 'avik_pe_customize_controls_scripts' );

function avik_pe_customize_controls_styles() {

    wp_enqueue_style( 'avik-pe-customize-controls', get_theme_file_uri( '/assets/css/pe-customize-controls.css' ), array(), '1.0' );
}

    add_action( 'customize_controls_print_styles', 'avik_pe_customize_controls_styles' );

function avik_pe_customize_register( $wp_customize ) {

$wp_customize->register_panel_type( 'Avik_WP_Customize_Panel' );
$wp_customize->register_section_type( 'Avik_WP_Customize_Section' );

}

    add_action( 'customize_register', 'avik_pe_customize_register' );

/* 18 Add additional templates
-------------------------------------------------------- */

// Custom template tags for this theme

require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress

require get_template_directory() . '/inc/template-functions.php';

// Implement the Custom Header feature

require get_template_directory() . '/inc/custom-header.php';

//Customizer additions

require get_template_directory() . '/inc/customizer.php';

// Customizer Custom Controls CSS
	
require get_template_directory() . '/inc/custom-controls.php'; 

// Scheme colors

require get_template_directory() . '/inc/color-scheme.php';
 		new Avik_Color_Scheme;

// Load Jetpack compatibility file

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* 19 Google Fonts URL function
-------------------------------------------------------- */


if ( ! function_exists( 'avik_fonts_url' ) ){
	function avik_fonts_url() {
	    $fonts_url = '';
	    $content_font = get_theme_mod('avik_google_font_list_p', '');
 
	    if ( 'off' !== $content_font ) {
	        $font_families = array();
 
	        if ( 'off' !== $content_font ) {
	            $font_families[] = $content_font;
	        }
 
	        $query_args = array(
	            'family' => urlencode( implode( '|', array_unique($font_families) ) ),
	        );
 
	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }
 
	    return esc_url_raw( $fonts_url );
	}
}


/* 20 Include Plugin
-------------------------------------------------------- */


require_once get_template_directory() . '/avik-functionality-plugin/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'avik_register_required_plugins' );


function avik_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Contact Fotm 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Multiple Post Thumbnails',
			'slug'      => 'multiple-post-thumbnails',
			'required'  => false,
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Featured Video Plus', 
			'slug'      => 'featured-video-plus',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'avik',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'avik' ),
			'menu_title'                      => __( 'Install Plugins', 'avik' ),
			
			'installing'                      => __( 'Installing Plugin: %s', 'avik' ),
			
			'updating'                        => __( 'Updating Plugin: %s', 'avik' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'avik' ),
			'notice_can_install_required'     => _n_noop(
				
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'avik'
			),
			'notice_can_install_recommended'  => _n_noop(
				
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'avik'
			),
			'notice_ask_to_update'            => _n_noop(
				
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'avik'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
			
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'avik'
			),
			'notice_can_activate_required'    => _n_noop(
				
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'avik'
			),
			'notice_can_activate_recommended' => _n_noop(
				
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'avik'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'avik'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'avik'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'avik'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'avik' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'avik' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'avik' ),
			
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'avik' ),
			
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'avik' ),
			
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'avik' ),
			'dismiss'                         => __( 'Dismiss this notice', 'avik' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'avik' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'avik' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}


$header_info = array(
    'width'         => 1400,
	'height'        => 750,
	'flex-width'    => true,
    'flex-height'   => true,
    'default-image' => get_template_directory_uri() . '/img/static.jpg',
);
add_theme_support( 'custom-header', $header_info );
 
$header_images = array(
    'city' => array(
            'url'           => get_template_directory_uri() . '/img/static.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/img/static_thumbnail.jpg',
            'description'   => 'City',
    ),
    'man' => array(
            'url'           => get_template_directory_uri() . '/img/static_2.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/img/static_2_thumbnail.jpg',
            'description'   => 'Man',
    ),  
);
register_default_headers( $header_images );


/* 21 Multipost Thumbnails Plugin
-------------------------------------------------------- */

   if ( class_exists( 'MultiPostThumbnails' )) {
    new MultiPostThumbnails(
        array(
            'label' => __( 'Featured Image 2','avik' ),
            'id' => 'thumbnail-two-post',
            'post_type' => 'post'
        )
    );
}

if ( class_exists( 'MultiPostThumbnails' )) {
    new MultiPostThumbnails(
        array(
            'label' => __( 'Featured Image 2 Page','avik' ),
            'id' => 'thumbnail-two-page',
            'post_type' => 'page'
        )
    );
}




