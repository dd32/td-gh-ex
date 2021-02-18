<?php
/**
 * Display all arise functions and definitions
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */

/************************************************************************************************/
if ( ! function_exists( 'arise_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function arise_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$arise_settings = arise_get_theme_options();
		if($arise_settings['arise_sidebar_layout_options'] == 'fullwidth'){
			$content_width = 1170;
		}else{
			$content_width=790;
		}
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on arise, use a find and replace
	 * to change 'arise' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'arise', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in three location.
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'arise' ),
		'topmenu' => __( 'Top Menu', 'arise' ),
		'social-link'  => __( 'Add Social Icons Only', 'arise' ),
	) );
	add_image_size('slider_image', 1920, 1080, true);
	add_image_size('portfolio', 768, 480, true);
	add_image_size('blog_image', 800, 500, true);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'arise_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_editor_style( array( 'css/editor-style.css', 'font/genericons.css', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700' ) );
}
endif; // arise_setup
add_action( 'after_setup_theme', 'arise_setup' );

/***************************************************************************************/
function arise_get_theme_options() {
    return wp_parse_args(  get_option( 'arise_theme_options', array() ),  arise_get_option_defaults_values() );
}

/***************************************************************************************/
require get_template_directory() . '/inc/admin-panel/arise-default-values.php';
require( get_template_directory() . '/inc/settings/arise-functions.php' );
require( get_template_directory() . '/inc/settings/arise-common-functions.php' );
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/footer-details.php';
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/tgm/tgm.php';

/************************ Arise Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/contactus-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/ourteam-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/parallax-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/post-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/testimonials-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/video-widgets.php';

/************************ Arise Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';
function arise_customize_register( $wp_customize ) {
if ( !is_plugin_active( 'arise-plus/arise-plus.php' ) ) {
	class Arise_Customize_Arise_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
			<a title="<?php esc_attr_e( 'Review Arise', 'arise' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/arise/' ); ?>" target="_blank" id="about_arise">
			<?php _e( 'Review Arise', 'arise' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'http://themefreesia.com/theme-instruction/arise/' ); ?>" title="<?php esc_attr_e( 'Theme Instructions', 'arise' ); ?>" target="_blank" id="about_arise">
			<?php _e( 'Theme Instructions', 'arise' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'http://themefreesa.com/forums/' ); ?>" title="<?php esc_attr_e( 'Forum', 'arise' ); ?>" target="_blank" id="about_arise">
			<?php _e( 'Forum', 'arise' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'http://demo.themefreesia.com/arise/' ); ?>" title="<?php esc_attr_e( 'View Demo', 'arise' ); ?>" target="_blank" id="about_arise">
			<?php _e( 'View Demo', 'arise' ); ?>
			</a><br/>
		<?php
		}
	}
	$wp_customize->add_section('arise_upgrade_links', array(
		'title'					=> __('About Arise', 'arise'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'arise_upgrade_links', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Arise_Customize_Arise_upgrade(
		$wp_customize,
		'arise_upgrade_links',
			array(
				'section'				=> 'arise_upgrade_links',
				'settings'				=> 'arise_upgrade_links',
			)
		)
	);
}
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/frontpage-services.php';
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
}

add_action( 'customize_register', 'arise_customize_register' );
add_action( 'customize_preview_init', 'arise_customize_preview_js' );
/**************************************************************************************/

/**
 * Making the theme Woocommrece compatible
 */

add_theme_support( 'woocommerce' );

// Add Post Class Clearfix
function post_class_clearfix( $classes ) {
	$classes[] = 'clearfix';
	return $classes;
}
add_filter( 'post_class', 'post_class_clearfix' );

/******************* Front Page *************************/
function arise_display_front_page(){
	require get_template_directory() . '/index.php';
}

add_action('arise_show_front_page','arise_display_front_page');

/******************* Arise Header Display *************************/
function arise_header_display(){
	$arise_settings = arise_get_theme_options();
	$header_display = $arise_settings['arise_header_display'];
	$header_logo = $arise_settings['arise-img-upload-header-logo'];
	if ($header_display == 'header_text') { ?>
		<div id="site-branding">
		<?php if(is_home() || is_front_page()){ ?>
		<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
			<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
		<?php if(is_home() || is_front_page() || is_search()){ ?>
		</h1>  <!-- end .site-title -->
		<?php } else { ?> </h2> <!-- end .site-title --> <?php } 
		$site_description = get_bloginfo( 'description', 'display' );
		if($site_description){?>
		<p id ="site-description"> <?php bloginfo('description');?> </p> <!-- end #site-description -->
		<?php } ?>
		</div> <!-- end #site-branding -->
		<?php
	} elseif ($header_display == 'header_logo') { ?>
		<div id="site-branding"> <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <img src="<?php echo $header_logo;?>" id="site-logo" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"></a> </div> <!-- end #site-branding -->
		<?php } elseif ($header_display == 'show_both'){ ?>
		<div id="site-branding"> <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <img src="<?php echo $header_logo;?>" id="site-logo" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"></a>
		<?php if(is_home() || is_front_page()){ ?>
		<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
			<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
			<?php if(is_home() || is_front_page()){ ?> </h1> <!-- end .site-title -->
		<?php }else{ ?> </h2> <!-- end .site-title -->
		<?php }
		$site_description = get_bloginfo( 'description', 'display' );
			if($site_description){?>
			<p id ="site-description"> <?php bloginfo('description');?> </p>
		<?php } ?>
		</div> <!-- end #site-branding -->
		<?php }
}
add_action('arise_site_branding','arise_header_display');
?>
