<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'medics_setup' ) ) :
function medics_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make medics theme available for translation.
	 */
	load_theme_textdomain( 'medics', get_template_directory() . '/languages' );	
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', medics_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_theme_support( "title-tag" );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'medics' ),
		'secondary' => __( 'Footer Secondary menu', 'medics' ),
	) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'medics_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'medics_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}

endif; // medics_setup
add_action( 'after_setup_theme', 'medics_setup' );

// Medics Pro Version Menu
add_action( 'admin_menu', 'medics_admin_menu');
function medics_admin_menu( ) {
    add_theme_page( __('Pro Feature','medics'), __('Medics Pro','medics'), 'manage_options', 'medics-pro-buynow', 'medics_buy_now', 300 );   
}
function medics_buy_now(){ ?>
<div class="medics_pro_version">
  <a href="<?php echo esc_url('https://fasterthemes.com/wordpress-themes/medics/'); ?>" target="_blank">    
    <img src ="<?php echo esc_url(get_template_directory_uri()); ?>/images/medics_pro_features.png" width="70%" height="auto" />
  </a>
</div>
<?php
}

/**
 * Register Lato Google font for medics.
 */
function medics_font_url() {
	$medics_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'medics' ) ) {
		$medics_font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $medics_font_url;
}
// Comment Form Fields Placeholder
function medics_comment_form_fields( $fields ) {
    foreach( $fields as &$field ) {
        $field = str_replace( 'id="author"', 'placeholder="First Name"', $field );
        $field = str_replace( 'id="email"', 'placeholder="Email Id"', $field );
        $field = str_replace( 'id="url"', 'placeholder="Website"', $field );
    }
    return $fields;
}
add_filter( 'comment_form_default_fields', 'medics_comment_form_fields' );
// Change comment form textarea to use placeholder
function medics_comment_textarea_placeholder( $args ) {
    $args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="Message"', $args['comment_field'] );
    return $args;
}
add_filter( 'comment_form_defaults', 'medics_comment_textarea_placeholder' );

/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';

/*** Theme Default Setup ***/
require get_template_directory() . '/functions/theme-default-setup.php';

/*** Recent Post Widget ***/
require get_template_directory() . '/functions/recent-post-widget.php';

/*** Breadcrumbs ***/
require get_template_directory() . '/functions/breadcrumbs.php';

/*** Custom Header ***/
require get_template_directory() . '/functions/custom-header.php';

/*** Theme Customizer Option ***/
require get_template_directory() . '/functions/theme-customization.php';