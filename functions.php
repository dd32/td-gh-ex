<?php
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


// Add support for featured content.
function twentyfourteen_child_setup () {
  // This will remove support for featured content in the parent theme  
  remove_theme_support( 'featured-content' );
  
  //This adds support for featured content in child theme 
  //with a different max_posts value of 3 instead of default 6  
  add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'twentyfourteen_get_featured_posts',
	'max_posts' => 3,
  ) );
}

//Action hook for theme support 
add_action( 'after_setup_theme', 'twentyfourteen_child_setup', 11);

function my_child_theme_setup() {
	load_child_theme_textdomain( '2014child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );

function be_exclude_post_formats_from_blog( $query ) {

	if( $query->is_main_query() && $query->is_home() ) {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-quote', 'post-format-gallery', 'post-format-aside', 'post-format-link', 'post-format-audio', 'post-format-quote', 'post-format-image', 'post-format-video' ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}

}
add_action( 'pre_get_posts', 'be_exclude_post_formats_from_blog' );
function mytheme_setup() {
    set_post_thumbnail_size(300, 300, true);
}
add_action('after_setup_theme', 'mytheme_setup', 20);
function twentyfourteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<div class="navigation paging-navigation" role="navigation">
<div class="center">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"></span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>
</div>
		</div><!-- .nav-links -->
	</div><!-- .navigation -->
	<?php
}
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentyfourteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="navigation post-navigation" role="navigation">
<div class="center">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h3>
		<div class="nav-links">

			<?php previous_post_link( 'Previous Post %link', _x( '<span class="meta-nav"></span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( 'Next Post %link', _x( '%title <span class="meta-nav"></span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
</div>
	</div><!-- .navigation -->
	<?php
}

function remove_twentyfourteen_widgets(){

unregister_widget( 'Twenty_Fourteen_Ephemera_Widget' );

unregister_sidebar( 'sidebar-1' );

	unregister_sidebar( 'sidebar-2' );

	unregister_sidebar( 'sidebar-3' );

}

add_action( 'widgets_init', 'remove_twentyfourteen_widgets', 11 );

function twentyfourteen_badeyes_widgets_init() {	

include get_stylesheet_directory() . '/inc/widgets.php';
include get_stylesheet_directory() . '/inc/customizer.php';
register_widget( 'badeyes_twentyfourteen_child_Ephemera_Widget' );

register_sidebar( array(

		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),

'before_widget' => '<div id="%1$s" class="widget %2$s">',

'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),

		'id'            => 'sidebar-2',

		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),

'before_widget' => '<div id="%1$s" class="widget %2$s">',

'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

register_sidebar( array(
'name'          => __( 'Header Widget Area', 'twentyfourteen' ),
'id'            => 'sidebar-4',
'description'   => __( 'Appears in the Custom Menu Header section of the site.', 'twentyfourteen' ),
'before_widget' => '<div class="custom_widget_menu">',
'after_widget'  => '</div>',
'before_title'  => '<h2 class="widget-title">',
'after_title'   => '</h2>',
) );
	register_sidebar( array(
		'name'          => __( 'Custom_Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<div class="custom_widget_menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}




remove_action( 'widgets_init', 'twentyfourteen_widgets_init', 11 );

add_action( 'widgets_init', 'twentyfourteen_badeyes_widgets_init', 11 );

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from a private repo in your theme.
        array(
            'name'               => 'Post Teaser', // The plugin name.
            'slug'               => 'post-teaser-plugin', // The plugin slug (typically the folder name).
            'source'             => 'http://www.badeyes.com/documents/post-teaser.zip', // The plugin source.
            'required'           =>false , // If false, the plugin is only 'recommended' instead of required.
 //'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
        ),
   );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
'page_title'                      => __( 'Install Recommended Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
'notice_can_install_recommended'  => _n_noop( 'This theme Recommends the following plugin: %1$s.<p>Notice: This plugin will install and be activated at the same time, if it is already installed just click on the dismiss notice below.</p>', 
'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
//'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
//'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
//'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),

            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

function badeyes_customize_css()
{
?>
<style type="text/css">
<?php echo get_theme_mod('styleSheet', ''); ?></style>
<?php
}
add_action( 'wp_head', 'badeyes_customize_css');

