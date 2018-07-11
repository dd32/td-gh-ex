<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'multishop_setup' ) ) :
function multishop_setup() {
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 745;
	}
	/*
	 * Make multishop theme available for translation.
	 */
	load_theme_textdomain( 'multishop', get_template_directory() . '/languages' );	
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', multishop_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'multishop-full-width', 1038, 576, true );
	add_image_size( 'multishop-blog-image', 380, 260, true );
	// This theme uses wp_nav_menu() in one locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'multishop' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support('custom-logo');       
	add_theme_support( 'custom-background', apply_filters( 'multishop_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'multishop_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // multishop_setup
add_action( 'after_setup_theme', 'multishop_setup' );

/**
 * Register Istok Web Google font for multishop.
 */
function multishop_font_url() {
	$multishop_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Istok Web, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Istok+Web font: on or off', 'multishop' ) ) {
		$multishop_font_url = add_query_arg( 'family', urlencode( 'Istok+Web:400,700,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $multishop_font_url;
}
add_filter( 'comment_form_default_fields', 'multishop_comment_placeholders' );
/**
* Change default fields, add placeholder and change type attributes.
*
* @param array $fields
* @return array
*/
function multishop_comment_placeholders( $fields ) {
	$fields['author'] = str_replace(
	'<input',
	'<input placeholder="'
	/* Replace 'theme_text_domain' with your theme’s text domain.
	* I use _x() here to make your translators life easier. :)
	* See http://codex.wordpress.org/Function_Reference/_x
	*/
	. _x(
	'First Name',
	'comment form placeholder',
	'multishop'
	)
	. '"',
	$fields['author']
	);
	$fields['email'] = str_replace(
	'<input',
	'<input id="email" name="email" type="text" placeholder="'
	. _x(
	'Email Id',
	'comment form placeholder',
	'multishop'
	)
	. '"',
	$fields['email']
	);
	$fields['url'] = str_replace(
	'<input',
	'<input id="url" name="url" type="text" placeholder="'
	. _x(
	'Website',
	'comment form placeholder',
	'multishop'
	)
	. '"',
	$fields['url']
);	

return $fields;
}
add_filter( 'comment_form_defaults', 'multishop_textarea_insert' );
function multishop_textarea_insert( $fields )
{
$fields['comment_field'] = str_replace(
'</textarea>',
''. _x(
'Comment',
'comment form placeholder',
'multishop'
)
. ''. '</textarea>',
$fields['comment_field']
);
return $fields;
}

// now we set our cookie if we need to
function multishop_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = sanitize_text_field(wp_unslash($_COOKIE['shop_pageResults']));
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns'])), time()+1209600, '/', '', false); //this will fail if any part of page has been output- hope this works!
    $count = sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns']));
  }
  // else normal page load and no cookie
  return $count;
}
 
add_action( 'admin_menu', 'multishop_admin_menu');
function multishop_admin_menu( ) {
    add_theme_page( __('Pro Feature','multishop'), __('Multishop Pro','good-news-lite'), 'manage_options', 'multishop-pro-buynow', 'multishop_pro_buy_now', 300 );   
}
function multishop_pro_buy_now(){ ?>
<div class="multishop_pro_version">
  <a href="<?php echo esc_url('https://fasterthemes.com/wordpress-themes/multishop/'); ?>" target="_blank">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/images/multishop_pro_features.png') ?>" width="70%" height="auto" />
  </a>
</div>
<?php
}

add_filter('loop_shop_per_page','multishop_sort_by_page');
add_action( 'tgmpa_register', 'multishop_action_tgm_plugin_active_register_required_plugins' );
function multishop_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(        
        array(
           'name'      => __('WooCommerce excelling eCommerce','multishop'),
           'slug'      => 'woocommerce',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'multishop-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Recommended Plugins', 'multishop' ),
           'menu_title'                      => __( 'Install Plugins', 'multishop' ),
           'installing'                      => /* translators: %s is plugin name.*/__( 'Installing Plugin: %s', 'multishop' ),            
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}
/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';

require get_template_directory() . '/functions/class-tgm-plugin-activation.php';
/*** Theme Default Setup ***/
require get_template_directory() . '/functions/theme-default-setup.php';
//multishop theme theme option
require get_template_directory() . '/functions/customizer.php';
/*** Recent Post Widget ***/
require get_template_directory() . '/functions/recent-post-widget.php';
/*** Breadcrumbs ***/
require get_template_directory() . '/functions/breadcrumbs.php';
/*** Custom Header ***/
require get_template_directory() . '/functions/custom-header.php';

if ( ! function_exists('is_plugin_inactive')) {
      require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}