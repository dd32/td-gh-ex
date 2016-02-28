<?php	

/**
 * safreen functions and definitions
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 */

/*
 * Set up the content width value based on the theme's design.
 *
 */

if ( ! isset( $content_width ) )
	$content_width = 630;



//Load Other CSS files


function safreen_scripts() {
wp_enqueue_style( 'safreen-style', get_stylesheet_uri() );	
wp_enqueue_style( 'safreen_fontawesome', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css','font_awesome', true );
wp_enqueue_style( 'safreen_nivo', get_template_directory_uri() . '/css/nivo-slider.css','nivo_slider', true );
wp_enqueue_style( 'safreen_foundation', get_template_directory_uri() . '/css/foundation.css','foundation_css', true );
wp_enqueue_style( 'safreen_animate', get_template_directory_uri() . '/css/animate.css','animate_css', true );
wp_enqueue_style( 'safreen_mobile', get_template_directory_uri() . '/css/mobile.css' ,'mobile_css', true);
wp_enqueue_style( 'safreen_sidrcss', get_template_directory_uri() . '/css/jquery.sidr.dark.css' ,'mobilemenu', true);
wp_enqueue_style( 'safreen_normalize', get_template_directory_uri() . '/css/normalize.css' ,'normalize_css', true);
if(get_theme_mod('safreen_header_checkbox') == "1"){
wp_enqueue_style( 'safreen_header_check', get_template_directory_uri() . '/css/customcss/header_checkbox.css' ,'header_check', true);

}

if(get_theme_mod('safreen_Static_Slider') == "1"){
wp_enqueue_style( 'safreen_Static_check', get_template_directory_uri() . '/css/customcss/Static_Slider.css' ,'Static_Slider', true);

}

if(get_theme_mod('safreen_body_layout') == "1"){
wp_enqueue_style( 'safreen_body_check', get_template_directory_uri() . '/css/customcss/body_layout.css' ,'body_layout', true);

}

if(get_theme_mod('safreen_sticky_menu') == "1"){
wp_enqueue_style( 'safreen_sticky_check', get_template_directory_uri() . '/css/customcss/sticky_menu.css' ,'sticky_menu', true);

}

if(get_theme_mod('safreen_mobile_slider') == "1"){
wp_enqueue_style( 'safreen_mobileslider_check', get_template_directory_uri() . '/css/customcss/mobile_slider.css' ,'mobile_slider', true);

}

if(get_theme_mod('safreen_mobile_sidebar') == "1"){
wp_enqueue_style( 'safreen_mobilesidebar_check', get_template_directory_uri() . '/css/customcss/mobile_sidebar.css' ,'mobile_sidebar', true);

}

	
	}
 
 
add_action( 'wp_enqueue_scripts', 'safreen_scripts' );

function admin_style() {
  wp_enqueue_style('safreen_widgets_custom_css', get_template_directory_uri() . '/css/safreen_widgets_custom_css.css');
	wp_enqueue_style( 'safreen_fontawesome_custom_css', get_template_directory_uri() . '/fonts/awesome/css/font-awesome.min.css' );
	
	}
add_action('admin_enqueue_scripts', 'admin_style');


//Load Java Scripts to header
function safreen_head_js() { 
if ( !is_admin() ) {
wp_enqueue_script('jquery');
wp_enqueue_script('safreen_js',get_template_directory_uri().'/js/safreen.js' ,array('jquery'), true);
wp_enqueue_script('safreen_other',get_template_directory_uri().'/js/other.js',array('jquery'), true);
wp_enqueue_script('safreen_wow',get_template_directory_uri().'/js/wow.js',array('jquery'), true);
wp_enqueue_script('safreen_nivojs',get_template_directory_uri().'/js/jquery.nivo.js',array('jquery'), true);
wp_enqueue_script('safreen_sidr',get_template_directory_uri().'/js/jquery.sidr.min.js',array('jquery'), true);
wp_enqueue_script('safreen_matchHeight',get_template_directory_uri().'/js/jquery.matchHeight.js',array('jquery'), true);
 if(get_theme_mod('safreen_Static_Slider') == "1"){ 
wp_enqueue_script('safreen_nivost',get_template_directory_uri().'/js/nivo-st.js',array('jquery'), true);
} 
if(get_theme_mod('safreen_Static_Slider') == "0"){ 
wp_enqueue_script('safreen_nivonm',get_template_directory_uri().'/js/nivo-nm.js',array('jquery'), true);
} 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}
}
add_action('wp_enqueue_scripts', 'safreen_head_js');


 function safreen_customizer_live_preview()
{
	wp_enqueue_script( 
		  'safreen-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/js/customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'safreen_customizer_live_preview' );


/* safreen first image */

function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
$first_img = $matches [1] [0];
return $first_img;
}
else {
$first_img = get_template_directory_uri()."/images/blank1.jpg";
return $first_img;
}
}


//safreen get the first image of the post Function
function safreen_get_images($overrides = '', $exclude_thumbnail = false)
{
    return get_posts(wp_parse_args($overrides, array(
        'numberposts' => -1,
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'exclude' => $exclude_thumbnail ? array(get_post_thumbnail_id()) : array(),
        'orderby' => 'menu_order ID'
    )));
}




//ADD FULL WIDTH BODY CLASS

//Custom Excerpt Length
function safreen_excerptlength_teaser($length) {
    return 30;
}
function safreen_excerptlength_index($length) {
    return 12;
}
function safreen_excerptmore($more) {
    return '...';
}

function safreen_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/*-----------------------------------------------------------------------------------*/
/* Display <title> tag
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}
	

//SIDEBAR
function safreen_widgets_init(){
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'safreen'),
	'id'            => 'sidebar',
	'description'   => __('Right Sidebar', 'safreen'),
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget_wrap">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Footer Widgets', 'safreen'),
	'id'            => 'foot_sidebar',
	'description'   => __('Widget Area for the Footer', 'safreen'),
	'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="medium-3 columns">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Service Block', 'safreen'),
	'id'            => 'sidebar-serviceblock',
	'description'   => __('With safreen Free you can only add 3 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'safreen'),
	'before_widget' => '',
	'after_widget'  => '',
		));
		
		register_sidebar(array(
	'name'          => __('About Us', 'safreen'),
	'id'            => 'sidebar-aboutus',
	'description'   => __('With safreen Free you can only add 2 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'safreen'),
	'before_widget' => '',
	'after_widget'  => '',
		));
		
		
				
		register_sidebar(array(
	'name'          => __('Our Team', 'safreen'),
	'id'            => 'sidebar-ourteam',
	'description'   => __('With safreen Free you can only add 4 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'safreen'),
	'before_widget' => '',
	'after_widget'  => '',
		));

register_sidebar(array(
	'name'          => __('Our Client', 'safreen'),
	'id'            => 'sidebar-ourclient',
	'description'   => __('With safreen Free you can only add 1 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'safreen'),
	'before_widget' => '',
	'after_widget'  => '',
		));

	
}

add_action( 'widgets_init', 'safreen_widgets_init' );



require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'safreen_theme_register_required_plugins' );
function safreen_theme_register_required_plugins() {

    /**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
    $plugins = array(

         // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name' => 'Safreen Widgets', // The plugin name.
            'slug' => 'safreen-widgets', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        )
         // This is an example of how to include a plugin from a private repo in your theme.
       

    );

    /**
* Array of configuration settings. Amend each line as needed.
* If you want the default strings to be available under your own theme domain,
* leave the strings uncommented.
* Some of the strings are added into a sprintf, so see the comments at the
* end of each line for what each argument will be.
*/
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __( 'Install Required Plugins', 'safreen' ),
            'menu_title' => __( 'Install Plugins', 'safreen' ),
            'installing' => __( 'Installing Plugin: %s', 'safreen' ), // %s = plugin name.
            'oops' => __( 'Something went wrong with the plugin API.', 'safreen' ),
            'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'safreen' ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'safreen' ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'safreen' ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'safreen' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'safreen' ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'safreen' ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'safreen' ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'safreen' ), // %1$s = plugin name(s).
            'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'safreen' ),
            'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'safreen' ),
            'return' => __( 'Return to Required Plugins Installer', 'safreen' ),
            'plugin_activated' => __( 'Plugin activated successfully.', 'safreen' ),
            'complete' => __( 'All plugins installed and activated successfully. %s', 'safreen' ), // %s = dashboard link.
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

 
//load widgets ,kirki ,customizer
require(get_template_directory() . '/inc/kirki/kirki.php');
require(get_template_directory() . '/inc/customizer.php');
require(get_template_directory() . '/inc/widgets.php');
require(get_template_directory() . '/inc/upsell.php');
require(get_template_directory() . '/inc/extra.php');
require(get_template_directory() . '/inc/about-theme.php');

//**************safreen SETUP******************//
function safreen_setup() {
//Custom Background
add_theme_support( 'custom-background', array(
	'default-color' => 'FFF',
	
) );

add_theme_support('automatic-feed-links');

// Declare WooCommerce support
add_theme_support( 'woocommerce' );


add_theme_support( 'html5', array( 'search-form' ) );



function my_theme_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );


//Post Thumbnail	
   add_theme_support( 'post-thumbnails' );

//Register Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation(Header)', 'safreen' ),
		
	) );

 // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');


// Make theme available for translation
 load_theme_textdomain('safreen', get_template_directory() . '/languages');  
 
 
}
add_action( 'after_setup_theme', 'safreen_setup' );?>