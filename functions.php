<?php
/**
 * Generate functions and definitions
 *
 * @package Generate
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1000; /* pixels */
	
define( 'GEN_VERSION', '0.1');
define( 'GEN_URI', get_template_directory_uri() );
define( 'GEN_DIR', get_template_directory() );

add_action( 'after_setup_theme', 'generate_setup' );
if ( ! function_exists( 'generate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function generate_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Generate, use a find and replace
	 * to change 'generate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'generate', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	  * Allow shortcodes in widgets
	  */
	add_filter('widget_text', 'do_shortcode');

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'generate' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	
	/**
	 * Set default options
	 */
	global $generate_defaults;
	$generate_defaults = array(
		'container_width' => '1100',
		'header_layout_setting' => 'fluid-header',
		'nav_layout_setting' => 'fluid-nav',
		'nav_position_setting' => 'nav-below-header',
		'content_layout_setting' => 'separate-containers',
		'layout_setting' => 'right-sidebar',
		'blog_layout_setting' => 'right-sidebar',
		'footer_layout_setting' => 'fluid-footer',
		'footer_widget_setting' => '3',
		'background_color' => '#efefef',
		'text_color' => '#3a3a3a',
		'link_color' => '#1e73be',
		'link_color_hover' => '#000000',
		'link_color_visited' => '',
	);

}
endif; // generate_setup

/**
 * Register widgetized area and update sidebar with default widgets
 */
add_action( 'widgets_init', 'generate_widgets_init' );
function generate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'generate' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'generate' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header', 'generate' ),
		'id'            => 'header',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'generate' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'generate' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'generate' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'generate' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'generate_scripts' );
function generate_scripts() {

	// Generate stylesheets
	wp_enqueue_style( 'generate-style-grid', get_template_directory_uri() . '/css/structure.css' );
	wp_enqueue_style( 'generate-style', get_template_directory_uri() . '/css/style.css', false, GEN_VERSION, 'all' );
	wp_enqueue_style( 'generate-child', get_stylesheet_uri(), false, GEN_VERSION, 'all' );
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css' );
	wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
	
	// If the Typography plugin isn't activated, set up the default fonts
	if ( !function_exists('generate_fonts_setup') ) :
		wp_enqueue_style( 'generate-fonts', '//fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic' );
	endif;

	// Generate scripts
	wp_enqueue_script( 'generate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'generate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), GEN_VERSION, true );
	wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array('superfish'), GEN_VERSION, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), GEN_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'generate-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

/**
 * Remove Open Sans from the front-end of the website
 * @since 0.1
 */
add_action('wp_enqueue_scripts', 'generate_remove_wp_open_sans');
function generate_remove_wp_open_sans() 
{
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
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
 * Load Element Classes
 */
require get_template_directory() . '/inc/element-classes.php';

/**
 * Load Metaboxes
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Load Options
 */
require get_template_directory() . '/inc/options.php';

/**
 * Load Options
 */
require get_template_directory() . '/inc/helper.php';


/**
 * Construct the sidebars
 * @since 0.1
 */
add_action('generate_sidebars','construct_generate_sidebars');
function construct_generate_sidebars()
{
	global $post, $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	$stored_meta = '';
	
	// Prevent PHP notices
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_meta-generate-layout', true );
	endif;
	
	// If the metabox is set, use it instead of the global settings
	if ( '' !== $stored_meta ) :
		$generate_settings['layout_setting'] = $stored_meta;
	endif;
	
	// If we're on the blog, single post etc.. replace value with the blog layout setting
	if ( is_home() || 
		is_single() || 
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['blog_layout_setting'];
	endif;

	// When to show the right sidebar
	$rs = array('right-sidebar','both-sidebars','both-right','both-left');

	// When to show the left sidebar
	$ls = array('left-sidebar','both-sidebars','both-right','both-left');

	// If right sidebar, show it
	if ( in_array( $generate_settings['layout_setting'], $rs ) ) :
		get_sidebar(); 
	endif;

	// If left sidebar, show it
	if ( in_array( $generate_settings['layout_setting'], $ls ) ) :
		get_sidebar('left'); 
	endif;
}

add_action('generate_credits','generate_add_footer_info');
function generate_add_footer_info()
{
	?>
	<span class="copyright"><?php _e('Copyright','generate');?> &copy; <?php echo date('Y'); ?></span> <?php do_action('generate_copyright_line');?>
	<?php
}

add_action('generate_copyright_line','generate_add_login_attribution');
function generate_add_login_attribution()
{
	?>
	&#x000B7; <a href="<?php echo esc_url('http://generatepress.com');?>" target="_blank" title="<?php _e('GeneratePress','generate');?>"><?php _e('GeneratePress','generate');?></a> &#x000B7; <a href="http://wordpress.org" target="_blank" title="<?php _e('Proudly powered by WordPress','generate');?>"><?php _e('WordPress','generate');?></a> &#x000B7; <a href="<?php echo wp_login_url(); ?>" title="<?php _e('Log in','generate');?>"><?php _e('Log in','generate');?></a>
	<?php
}

/**
 * Generate the navigation based on settings
 * @since 0.1
 */
add_action( 'generate_after_header', 'generate_add_navigation_after_header', 5 );
function generate_add_navigation_after_header()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	
	if ( 'nav-below-header' == $generate_settings['nav_position_setting'] ) :
		generate_navigation_position();
	endif;
	
}
add_action( 'generate_before_header', 'generate_add_navigation_before_header', 5 );
function generate_add_navigation_before_header()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	
	if ( 'nav-above-header' == $generate_settings['nav_position_setting'] ) :
		generate_navigation_position();
	endif;
	
}
add_action( 'generate_inside_header', 'generate_add_navigation_float_right', 5 );
function generate_add_navigation_float_right()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	
	if ( 'nav-float-right' == $generate_settings['nav_position_setting'] ) :
		generate_navigation_position();
	endif;
	
}
add_action( 'generate_before_right_sidebar', 'generate_add_navigation_before_right_sidebar', 5 );
function generate_add_navigation_before_right_sidebar()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	
	if ( 'nav-right-sidebar' == $generate_settings['nav_position_setting'] ) :
		echo '<div class="gen-sidebar-nav">';
			generate_navigation_position();
		echo '</div>';
	endif;
	
}
add_action( 'generate_before_left_sidebar', 'generate_add_navigation_before_left_sidebar', 5 );
function generate_add_navigation_before_left_sidebar()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	
	if ( 'nav-left-sidebar' == $generate_settings['nav_position_setting'] ) :
		echo '<div class="gen-sidebar-nav">';
			generate_navigation_position();
		echo '</div>';
	endif;
	
}
function generate_navigation_position()
{
	?>
	<nav itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" role="navigation" <?php navigation_class(); ?>>
		<div class="inside-navigation grid-container grid-parent">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'generate' ); ?></h3>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'generate' ); ?>"><?php _e( 'Skip to content', 'generate' ); ?></a></div>
				<div class="main-nav">
					<ul <?php menu_class(); ?>>
						<?php 
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array( 
								'theme_location' => 'primary',
								'container_class' => 'main-nav',
								'menu_class' => 'menu',
								'items_wrap' => '%3$s'
							) );
						else :
							wp_list_pages('sort_column=menu_order&title_li=');
						endif;
						?>
					</ul>
				</div><!-- .main-nav -->
		</div><!-- .inside-navigation -->
	</nav><!-- #site-navigation -->
	<?php
}

/**
 * If the user has pages with comments set, we can choose to disable them once.
 * Turned off by default - may turn this into an option
 * @since 0.1
 */
//add_action('init','generate_disable_all_page_comments');
function generate_disable_all_page_comments()
{
	// Make sure this function only runs once.
	if (get_option('generate_run_comment_disable') != "yes") {
	
		global $wpdb;
		
		 $wpdb->update( 
			'wp_posts', 
			array(
				'comment_status' => 'closed'
			), 
			array(
				'post_type' => 'page'
			), 
			null, 
			null 
		);

		//now that function has been run, set option so it wont run again
		update_option( 'generate_run_comment_disable', 'yes' );

	}
}
/**
 * Turn comments off by default when adding new pages.
 * @since 0.1
 */
add_filter( 'wp_insert_post_data', 'default_comments_off' );
function default_comments_off( $data ) {

    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
		$data['ping_status'] = 0;
    }

    return $data;
}

/**
 * Generate the CSS in the <head> section using the Theme Customizer
 * @since 0.1
 */
add_action('wp_head','generate_base_css');
function generate_base_css()
{
	global $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	$space = ' ';
	
	// Start the magic
	$visual_css = array (
	
		// Body CSS
		'body'  => array(
			'background-color' => $generate_settings['background_color'],
			'color' => $generate_settings['text_color']
		),
		
		// Link CSS
		'a, a:visited' => array(
			'color'				=> $generate_settings['link_color'],
			'text-decoration' 	=> 'none'
		),
		
		// Visited link color if specified
		'a:visited' => array(
			'color' 			=> ( !empty( $generate_settings['link_color_visited'] ) ) ? $generate_settings['link_color_visited'] : null,
		),
		
		// Link hover
		'a:hover' => array(
			'color' 			=> $generate_settings['link_color_hover'],
			'text-decoration' 	=> null
		),
		
		// Grid container
		'body .grid-container' => array(
			'max-width' => $generate_settings['container_width'] . 'px'
		),
		
		// Header 
		'.site-header' => array(
			'text-align' => ( !empty( $generate_settings['center_header'] ) ) ? 'center' : null
		),
		
		// Navigation 
		'.nav-below-header .main-navigation,
		.nav-above-header .main-navigation' => array(
			'text-align' => ( !empty( $generate_settings['center_nav'] ) ) ? 'center' : null
		),
		
		// Navigation 
		'.nav-below-header .main-navigation .menu > li, 
		.nav-below-header .main-navigation .sf-menu > li,
		.nav-above-header .main-navigation .menu > li, 
		.nav-above-header .main-navigation .sf-menu > li' => array(
			'float' => ( !empty( $generate_settings['center_nav'] ) ) ? 'none' : null,
			'display' => ( !empty( $generate_settings['center_nav'] ) ) ? 'inline-block' : null,
			'margin-right' => ( !empty( $generate_settings['center_nav'] ) ) ? '-4px' : null,
			'*display' => ( !empty( $generate_settings['center_nav'] ) ) ? 'inline' : null,
			'*zoom' => ( !empty( $generate_settings['center_nav'] ) ) ? '1' : null,
		),
		
	);
	
	// Output the above CSS
	$output = '';
	foreach($visual_css as $k => $properties) {
		if(!count($properties))
			continue;

		$temporary_output = $k . ' {';
		$elements_added = 0;

		foreach($properties as $p => $v) {
			if(empty($v))
				continue;

			$elements_added++;
			$temporary_output .= $p . ': ' . $v . '; ';
		}

		$temporary_output .= "}";

		if($elements_added > 0)
			$output .= $temporary_output;
	}
	?>
<!-- Generate CSS -->
<style type="text/css">
<?php 
$output = str_replace(array("\r", "\n"), '', $output);
echo $output; ?>
<?php do_action('generate_head_css') . '\n'; ?> 
</style>
<?php
}

/**
 * Add the scripts added in Generate > Options to the <head> section
 * @since 0.1
 */
add_action('wp_head','generate_add_head_scripts');
function generate_add_head_scripts()
{
	echo get_option('gen_header_scripts');
}

/**
 * Add the scripts added in Generate > Options before the closing </body> tag
 * @since 0.1
 */
add_action('wp_footer','generate_add_footer_scripts');
function generate_add_footer_scripts()
{
	echo get_option('gen_footer_scripts');
}

/**
 * Add fonts if Typography plugin isn't installed
 * @since 0.1
 */
add_action('generate_head_css','generate_default_fonts');
function generate_default_fonts()
{
	// If the plugin is active, stop the function
	if ( function_exists('generate_fonts_setup') )
		return;
		
	echo 'body {font-family: Arial, Helvetica, sans-serif; font-weight: normal; text-transform: none; font-size: 15px; }.main-title {font-family: Roboto; font-weight: bold; text-transform: uppercase; font-size: 45px; }.site-description {font-family: Roboto; font-weight: normal; text-transform: none; font-size: 15px; }.main-navigation a, .gen-sidebar-nav .widget_nav_menu a {font-family: Roboto; font-weight: normal; text-transform: none; font-size: 15px; }.widget-title {font-family: Roboto; font-weight: normal; text-transform: none; font-size: 20px; }h1 {font-family: Roboto; font-weight: 300; text-transform: none; font-size: 40px; }h2 {font-family: Roboto; font-weight: 300; text-transform: none; font-size: 30px; }h3 {font-family: inherit; font-weight: normal; text-transform: none; font-size: 20px; }h4 {font-family: inherit; font-weight: normal; text-transform: none; font-size: 15px; }';
}

/**
 * Add colors if Colors plugin isn't installed
 * @since 0.1
 */
add_action('generate_head_css','generate_default_colors');
function generate_default_colors()
{
	// If the plugin is active, stop the function
	if ( function_exists('generate_colors_setup') )
		return;
		
	echo 'body{background-color: #efefef; color: #3a3a3a; }a, a:visited {color: #1e73be; text-decoration: none; }a:hover {color: #000000; }body .grid-container {max-width: 1100px; }.site-header {background: #FFFFFF; color: #3a3a3a; }.site-header a, .site-header a:visited {color: #3a3a3a; }.main-title a, .main-title a:hover, .main-title a:visited {color: #222222; }.site-description {color: #999999; }.main-navigation,   .main-navigation ul ul {background: #222222; }.main-navigation ul ul {background: #3f3f3f; }.main-navigation .main-nav ul li a, .menu-toggle {color: #FFFFFF; }.main-navigation .main-nav ul ul li a {color: #FFFFFF; }.main-navigation .main-nav ul li > a:hover,  .main-navigation .main-nav ul li.sfHover > a {color: #FFFFFF; background: #1e72bd; }.main-navigation .main-nav ul ul li > a:hover,  .main-navigation .main-nav ul ul li.sfHover > a {color: #FFFFFF; background: #4f4f4f; }.main-navigation .main-nav ul .current-menu-item > a,  .main-navigation .main-nav ul .current-menu-parent > a,  .main-navigation .main-nav ul .current-menu-ancestor > a,  .main-navigation .main-nav ul .current_page_item > a,  .main-navigation .main-nav ul .current_page_parent > a,  .main-navigation .main-nav ul .current_page_ancestor > a {color: #FFFFFF; background: #1e72bd; }.main-navigation .main-nav ul .current-menu-item > a:hover,  .main-navigation .main-nav ul .current-menu-parent > a:hover,  .main-navigation .main-nav ul .current-menu-ancestor > a:hover,  .main-navigation .main-nav ul .current_page_item > a:hover,  .main-navigation .main-nav ul .current_page_parent > a:hover,  .main-navigation .main-nav ul .current_page_ancestor > a:hover,  .main-navigation .main-nav ul .current-menu-item.sfHover > a,  .main-navigation .main-nav ul .current-menu-parent.sfHover > a,  .main-navigation .main-nav ul .current-menu-ancestor.sfHover > a,  .main-navigation .main-nav ul .current_page_item.sfHover > a,  .main-navigation .main-nav ul .current_page_parent.sfHover > a,  .main-navigation .main-nav ul .current_page_ancestor.sfHover > a {color: #FFFFFF; background: #1e72bd; }.main-navigation .main-nav ul ul .current-menu-item > a,  .main-navigation .main-nav ul ul .current-menu-parent > a,  .main-navigation .main-nav ul ul .current-menu-ancestor > a,  .main-navigation .main-nav ul ul .current_page_item > a,  .main-navigation .main-nav ul ul .current_page_parent > a,  .main-navigation .main-nav ul ul .current_page_ancestor > a {color: #FFFFFF; background: #4f4f4f; }.main-navigation .main-nav ul ul .current-menu-item > a:hover,  .main-navigation .main-nav ul ul .current-menu-parent > a:hover,  .main-navigation .main-nav ul ul .current-menu-ancestor > a:hover,  .main-navigation .main-nav ul ul .current_page_item > a:hover,  .main-navigation .main-nav ul ul .current_page_parent > a:hover,  .main-navigation .main-nav ul ul .current_page_ancestor > a:hover, .main-navigation .main-nav ul ul .current-menu-item.sfHover > a,  .main-navigation .main-nav ul ul .current-menu-parent.sfHover > a,  .main-navigation .main-nav ul ul .current-menu-ancestor.sfHover > a,  .main-navigation .main-nav ul ul .current_page_item.sfHover > a,  .main-navigation .main-nav ul ul .current_page_parent.sfHover > a,  .main-navigation .main-nav ul ul .current_page_ancestor.sfHover > a {color: #FFFFFF; background: #4f4f4f; }.inside-article,  .comments-area,  .page-header, .one-container .container, .paging-navigation, .inside-page-header {background: #FFFFFF; color: #3a3a3a; }.entry-meta {color: #888888; }.entry-meta a,  .entry-meta a:visited {color: #666666; }.entry-meta a:hover {color: #1E73BE; }.sidebar .widget {background: #FFFFFF; color: #3a3a3a; }.sidebar .widget .widget-title {color: #000000; }.footer-widgets {background: #FFFFFF; color: #3a3a3a; }.footer-widgets a,  .footer-widgets a:visited {color: #1e73be; }.footer-widgets a:hover {color: #000000; }.footer-widgets .widget-title {color: #000000; }.site-info {background: #222222; color: #ffffff; }.site-info a,  .site-info a:visited {color: #ffffff; }.site-info a:hover {color: #4295DD; }';
}