<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>
<?php

// Global Content Width, Kind of a Joke with this theme, lol
	if (!isset($content_width))
		$content_width = 1100;
			
// Ladies, Gentalmen, boys and girls let's start our engines
add_action('after_setup_theme', 'semperfi_setup');

if (!function_exists('semperfi_setup')):

    function semperfi_setup() {

        global $content_width; 
			
        // Add Callback for Custom TinyMCE editor stylesheets. (editor-style.css)
        add_editor_style();

        // This feature enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');

        // This feature enables post-thumbnail support for a theme
		add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
			add_image_size( 'page-thumbnail', 600, 355, true );
			add_image_size( 'post-thumbnail', 1200, 710, true );

        // This feature enables custom-menus support for a theme
        register_nav_menus(array(
			'bar' => __('The Menu Bar', 'semperfi' ) ) );

        // WordPress 3.4+
		if ( function_exists('get_custom_header')) {
        	add_theme_support('custom-background'); }
		
		// Custom-Header
		$args = array(
			'flex-width'    => true,
			'width'         => 1000,
			'flex-height'    => true,
			'height'        => 300,
		);
		add_theme_support( 'custom-header', $args );
		
	}

endif;

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
function semperfi_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args; }

add_filter( 'wp_page_menu_args', 'semperfi_page_menu_args' );

/**
 * wp_list_comments() Pings Callback
 * 
 * wp_list_comments() Callback function for 
 * Pings (Trackbacks/Pingbacks)
 */
function semperfi_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

// Wrap Video with a DIV for a CSS Resposive Video
function wrap_embed_with_div($html, $url, $attr) { 
	// YouTube isn't in here because it provides sufficient mark-ups to just use their html elements
	if (preg_match("/vimeo/", $html)) { return '<div class="video-container">' . $html . '</div>'; }
	if (preg_match("/wordpress.tv/", $html)) { return '<div class="video-container">' . $html . '</div>'; } }
	// Don't see your video host in here? Just add it in, make sure you have the forward slash marks

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

// Sets the post excerpt length to 250 characters
function semperfi_excerpt_length($length) {
    return 250; }

add_filter('excerpt_length', 'semperfi_excerpt_length');

// This function adds in code specifically for IE6 to IE9
function semperfi_ie_css() {
	echo "\n" . '<!-- IE 6 to 9 CSS Hacking -->' . "\n";
	echo '<!--[if lte IE 9]><style type="text/css">#header h1 i{bottom:.6em;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 8]><style type="text/css">#center{width:1000px;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 7]><style type="text/css">#header{padding:0 auto;}#header ul {padding-left:1.5em;}#header ul li{float:left;}</style><![endif]-->' . "\n";
	echo '<!--[if lte IE 6]><style type="text/css">#header.small h1{display: none;}#center{width:800px;}#banner{background:none;}.overlay{display:none;}.browsing li {width:47%;margin:1%;}#footer{background-color:#111);}</style><![endif]-->' . "\n";
	echo "\n";
}

add_action('wp_head', 'semperfi_ie_css');

// This function removes inline styles set by WordPress gallery
function semperfi_remove_gallery_css($css) {
    return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css); }

add_filter('gallery_style', 'semperfi_remove_gallery_css');

// This function removes default styles set by WordPress recent comments widget
function semperfi_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) ); }

add_action( 'widgets_init', 'semperfi_remove_recent_comments_style' );

// A comment reply
function semperfi_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) 
            wp_enqueue_script('comment-reply'); }

add_action( 'wp_enqueue_scripts', 'semperfi_enqueue_comment_reply' );

//	A safe way of adding javascripts to a WordPress generated page
if (!is_admin())
	add_action('wp_enqueue_scripts', 'semperfi_js');

if (!function_exists('semperfi_js')) {
	function semperfi_js() {
			// JS at the bottom for fast page loading
			wp_enqueue_script('semperfi-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '1.3', true);
            wp_enqueue_script('semperfi-menu-scrolling', get_template_directory_uri() . '/js/jquery.menu.scrolling.js', array('jquery'), '1', true);
			wp_enqueue_script('semperfi-scripts', get_template_directory_uri() . '/js/jquery.fittext.js', array('jquery'), '1.0', true);
			wp_enqueue_script('semperfi-fittext', get_template_directory_uri() . '/js/jquery.fittext.sizing.js', array('jquery'), '1', true);  } }

// Redirect to the theme options Page after theme is activated
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=theme_options' ); 

// WordPress Widgets start right here.
function semperfi_widgets_init() {

	register_sidebars(3, array(
		'name'=>'footer widget%d',
		'id' => 'widget',
		'description' => 'Widgets in this area will be shown below the the content of every page.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>', )); }
	
add_action('widgets_init', 'semperfi_widgets_init');

// Checks if the Widgets are active
function semperfi_is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) {
		return true; }
		return false; }
		
// Load up links in admin bar so theme is edit
function semperfi_theme_options_add_page() {
	add_theme_page('Theme Customizer', 'Theme Customizer', 'edit_theme_options', 'customize.php' );
    add_theme_page('Theme Info', 'Theme Info', 'edit_theme_options', 'theme_options', 'semperfi_theme_options_do_page');}
	
// Add link to theme options in Admin bar
function semperfi_admin_link() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array( 'id' => 'Semper_Fi_Customizer', 'title' => 'Theme Customizer', 'href' => admin_url( 'customize.php' ) ));
	$wp_admin_bar->add_menu( array( 'id' => 'Semper_Fi_Information', 'title' => 'Theme Information', 'href' => admin_url( 'themes.php?page=theme_options' ) )); }

add_action( 'admin_bar_menu', 'SemperFi_admin_link', 113 );

// Sets up the Customize.php for Semper Fi (More to come)
function semperfi_customize($wp_customize) {

	// Before we begin let's create a textarea input
	class Semperfi_Customize_Textarea_Control extends WP_Customize_Control {
    
		public $type = 'textarea';
	 
		public function render_content() { ?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="1" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label> <?php } }
			
	// The Standard Sections for Theme Custimizer
	$wp_customize->add_section( 'meta_section', array(
        'title'					=> 'Meta',
        'priority'				=> 1, ));

	$wp_customize->add_section( 'header_section', array(
        'title'					=> 'Header',
		'priority'				=> 26, ));
		
	$wp_customize->add_section( 'header_image', array(
        'title'					=> 'Header Image',
		'priority'				=> 26, ));

	$wp_customize->add_section( 'nav', array(
        'title'					=> 'Menu',
		'priority'				=> 27, ));

	$wp_customize->add_section( 'background_image', array(
        'title'					=> 'Background',
		'priority'				=> 28, ));

	$wp_customize->add_section( 'content_section', array(
        'title'					=> 'Content',
        'priority'				=> 29, ));

	$wp_customize->add_section( 'sidebar_section', array(
        'title'					=> 'Sidebar',
        'priority'				=> 30, ));

	$wp_customize->add_section( 'links_section', array(
        'title'					=> 'Links',
        'priority'				=> 32, ));

	// Remove the Section Colors for the Sake of making Sense
	$wp_customize->remove_section( 'colors');

	// Background needed to be moved to to the Background Section
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'					=> 'Background Color',
		'section'				=> 'background_image', )));

	// Add the option to use the CSS3 property Background-size
	$wp_customize->add_setting( 'backgroundsize_setting', array(
		'default'				=> 'auto',
		'control'				=> 'select',));

	$wp_customize->add_control( 'backgroundsize_control', array(
		'section'				=> 'background_image',
		'label'					=> 'Background Size',
		'settings'				=> 'backgroundsize_setting',
		'type'					=> 'radio',
		'choices'				=> array(
			'auto'				=> 'Auto (Default)',
			'contain'			=> 'Contain',
			'cover'				=> 'Cover',), ));
			
	// Change up the type of paper in the background
	$wp_customize->add_setting( 'backgroundpaper_setting', array(
		'default'           	=> 'clean',
		'control'           	=> 'select',));

	$wp_customize->add_control( 'backgroundpaper_control', array(
		'section'				=> 'content_section',
		'label'					=> 'Background Paper Image',
		'settings'				=> 'backgroundpaper_setting',
		'type'					=> 'radio',
		'choices'				=> array(
			'clean'				=> 'Clean but Used (Default)',
			'peppered'			=> 'Peppered',
			'vintage'			=> 'Vintage',
			'canvas'			=> 'Heavy Canvas',), ));
			
	// Turn the Search bar in the navigation on or off
	$wp_customize->add_setting( 'navi_search_setting', array(
		'default'           	=> 'off',
		'control'           	=> 'select',));

	$wp_customize->add_control( 'navi_search_control', array(
		'section'				=> 'header_section',
		'label'					=> 'Search bar in navigaton',
		'settings'				=> 'navi_search_setting',
		'type'					=> 'select',
		'choices'				=> array(
			'off'				=> 'Do not display search',
			'on'				=> 'Display the search',), ));
			
	// Add Facebook Icon to the navigation
	$wp_customize->add_setting( 'facebook_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'facebook_control', array(
		'label'				=> 'Facebook icon in the Menu',
		'priority'			=> 50,
		'section'			=> 'header_section',
		'settings'			=> 'facebook_setting', )));
			
	// Add Twitter Icon to the navigation
	$wp_customize->add_setting( 'twitter_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'twitter_control', array(
		'label'				=> 'Twitter icon in the Menu',
		'priority'			=> 51,
		'section'			=> 'header_section',
		'settings'			=> 'twitter_setting', )));
			
	// Add Google+ Icon to the navigation
	$wp_customize->add_setting( 'google_plus_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'google_plus_control', array(
		'label'				=> 'Google Plus icon in the Menu',
		'priority'			=> 52,
		'section'			=> 'header_section',
		'settings'			=> 'google_plus_setting', )));
			
	// Add YouTube Icon to the navigation
	$wp_customize->add_setting( 'youtube_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'youtube_control', array(
		'label'				=> 'Youtube icon in the Menu',
		'priority'			=> 54,
		'section'			=> 'header_section',
		'settings'			=> 'youtube_setting', )));
			
	// Add Vimeo Icon to the navigation
	$wp_customize->add_setting( 'vimeo_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'vimeo_control', array(
		'label'				=> 'Vimeo icon in the Menu',
		'priority'			=> 55,
		'section'			=> 'header_section',
		'settings'			=> 'vimeo_setting', )));
			
	// Add Soundcloud Icon to the navigation
	$wp_customize->add_setting( 'soundcloud_setting', array(
		'default'			=> 'The url link goes in here.', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'soundcloud_control', array(
		'label'				=> 'Soundcloud icon in the Menu',
		'priority'			=> 56,
		'section'			=> 'header_section',
		'settings'			=> 'soundcloud_setting', )));	
			
	// Comments Choice
	$wp_customize->add_setting( 'comments_setting', array(
		'default'           	=> 'pages_and_posts',
		'control'           	=> 'select',));

	$wp_customize->add_control( 'comments_control', array(
		'section'				=> 'content_section',
		'label'					=> 'Options for Displaying Comments',
		'settings'				=> 'comments_setting',
		'type'					=> 'select',
		'choices'				=> array(
			'pages_and_posts'	=> 'Comments on both Pages & Posts',
			'posts'				=> 'Comments only on Posts',
			'pages'				=> 'Comments only on Pages',
			'none'				=> 'Comments completely Off',), ));
			
	// Use Featured Images on individual pages and posts
	$wp_customize->add_setting( 'featured_image_on_single_setting', array(
		'default'           	=> 'off',
		'control'           	=> 'select',));

	$wp_customize->add_control( 'featured_image_on_single_control', array(
		'section'				=> 'content_section',
		'label'					=> 'Featured image on Posts & Pages',
		'settings'				=> 'featured_image_on_single_setting',
		'type'					=> 'select',
		'choices'				=> array(
			'off'				=> 'Do not display featured images',
			'on'				=> 'Display Featured Images',), ));
			
	// Turn the date / time on post on or off
	$wp_customize->add_setting( 'display_date_setting', array(
		'default'           	=> 'on',
		'control'           	=> 'select',));

	$wp_customize->add_control( 'display_date_control', array(
		'section'				=> 'content_section',
		'label'					=> 'Display the date',
		'settings'				=> 'display_date_setting',
		'type'					=> 'select',
		'choices'				=> array(
			'on'				=> 'Display the dates',
			'off'				=> 'Do not display dates',), ));

	// Upload and Customization for the Banner and Header Options
	$wp_customize->add_setting('menu_setting', array(
		'default'			=> 'standard',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'option', ));

	$wp_customize->add_control('menu_control', array(
		'label'				=> 'Menu Display Options',
		'priority'			=> 6,
		'section'			=> 'header_section',
		'settings'			=> 'menu_setting',
		'type'				=> 'radio',
		'choices'			=> array(
			'standard'		=> 'Standard (Default)',
			'notitle'		=> 'No Title',
			'bottom'		=> 'Moves Menu To Bottom', ), ));

	// Change Site Title Color
	$wp_customize->add_setting( 'titlecolor_setting', array(
		'default'			=> '#e0dbce', ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'titlecolor_control', array(
		'label'				=> 'Site Title Color - #e0dbce',
		'section'			=> 'title_tagline',
		'settings'			=> 'titlecolor_setting', )));

	// Change Tagline Color
	$wp_customize->add_setting( 'taglinecolor_setting', array(
		'default'			=> '#3e5a21', ));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taglinecolor_control', array(
		'label'				=> 'Site Title Color - #3e5a21',
		'section'			=> 'title_tagline',
		'settings'			=> 'taglinecolor_setting', )));

	// Choose the Different Images for the Banner
	$wp_customize->add_setting('bannerimage_setting', array(
		'default'			=> 'blue.png',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'option', ));

	$wp_customize->add_control('themename_color_scheme', array(
		'section'			=> 'header_section',
		'label'				=> 'Choose one of the choices below...',
		'settings'			=> 'bannerimage_setting',
		'type'				=> 'radio',
		'choices'			=> array(
			'blue.png'		=> 'Blue',
			'purple.png'	=> 'Purple',
			'marble.png'	=> 'Marble',
			'green.png'		=> 'Green', ), ));

	// Adding Google Analytics to the Theme
	$wp_customize->add_setting( 'google_analytics_setting', array(
		'default'			=> 'For example mine is "UA-9335180-X"', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'analytics_control', array(
		'label'				=> 'Enter Your Google Analytics Code',
		'section'			=> 'meta_section',
		'settings'			=> 'google_analytics_setting', )));
			
	// Adding Webmaster Tools to the Theme
	$wp_customize->add_setting( 'google_webmaster_tool_setting', array(
		'default'			=> 'For example "gN9drVvyyDUFQzMSBL8Y8-EttW1pUDtnUypP-331Kqh"', ));

	$wp_customize->add_control( new Semperfi_Customize_Textarea_Control( $wp_customize, 'google_webmaster_tool_control', array(
		'label'				=> 'Enter Your Google Webmaster Verification Code',
		'section'			=> 'meta_section',
		'settings'			=> 'google_webmaster_tool_setting', )));

	// Adjust the Space Between the Top of the Page and Content
	$wp_customize->add_setting( 'headerspacing_setting', array(
		'default'           => '35%',
		'control'           => 'select',));

	$wp_customize->add_control( 'headerspacing_control', array(
		'label'				=> 'Adjust the Spacing Between Top and Content',
		'priority'			=> 90,
		'section'			=> 'header_section',
		'settings'			=> 'headerspacing_setting',
		'type'				=> 'select',
		'choices'			=> array(
			'65'			=> '65%',
			'60'			=> '60%',
			'55'			=> '55%',
			'50'			=> '50%',
			'45'			=> '45%',
			'40'			=> '40%',
			'35'			=> '35% Default',
			'30'			=> '30%',
			'25'			=> '25%',
			'20'			=> '20%',
			'15'			=> '15%',
			'10'			=> '10%',
			'5'				=> '5%',), ));
	
	// Create an Array with a ton of google fonts	
	$google_font_array = array(
			'Default'				=> 'Default',
			'Questrial'				=> 'Questrial',
			'Astloch'				=> 'Astloch',
			'IM+Fell+English+SC'	=> 'IM+Fell+English+SC',
			'Lekton'				=> 'Lekton',
			'Nova+Round'			=> 'Nova+Round',
			'Nova+Oval'				=> 'Nova+Oval',
			'League+Script'			=> 'League+Script',
			'Caudex'				=> 'Caudex',
			'IM+Fell+DW+Pica'		=> 'IM+Fell+DW+Pica',
			'Nova+Script'			=> 'Nova+Script',
			'Nixie+One'				=> 'Nixie+One',
			'IM+Fell+DW+Pica+SC'	=> 'IM+Fell+DW+Pica+SC',
			'Puritan'				=> 'Puritan',
			'Prociono'				=> 'Prociono',
			'Abel'					=> 'Abel',
			'Snippet'				=> 'Snippet',
			'Kristi'				=> 'Kristi',
			'Mako'					=> 'Mako',
			'Ubuntu+Mono'			=> 'Ubuntu+Mono',
			'Nova+Slim'				=> 'Nova+Slim',
			'Patrick+Hand'			=> 'Patrick+Hand',
			'Crafty+Girls'			=> 'Crafty+Girls',
			'Brawler'				=> 'Brawler',
			'Droid+Sans'			=> 'Droid+Sans',
			'Geostar'				=> 'Geostar',
			'Yellowtail'			=> 'Yellowtail',
			'Permanent+Marker'		=> 'Permanent+Marker',
			'Just+Another+Hand'		=> 'Just+Another+Hand',
			'Unkempt'				=> 'Unkempt',
			'Jockey+One'			=> 'Jockey+One',
			'Lato'					=> 'Lato',
			'Arvo'					=> 'Arvo',
			'Cabin'					=> 'Cabin',
			'Playfair+Display'		=> 'Playfair+Display',
			'Crushed'				=> 'Crushed',
			'Asset'					=> 'Asset',
			'Sue+Ellen+Francisco'	=> 'Sue+Ellen+Francisco',
			'Julee'					=> 'Julee',
			'Judson'				=> 'Judson',
			'Neuton'				=> 'Neuton',
			'Sorts+Mill+Goudy'		=> 'Sorts+Mill+Goudy',
			'Mate'					=> 'Mate',
			'News+Cycle'			=> 'News+Cycle',
			'Michroma'				=> 'Michroma',
			'Lora'					=> 'Lora',
			'Give+You+Glory'		=> 'Give+You+Glory',
			'Rammetto+One'			=> 'Rammetto+One',
			'Pompiere'				=> 'Pompiere',
			'PT+Sans'				=> 'PT+Sans',
			'Andika'				=> 'Andika',
			'Cabin+Sketch'			=> 'Cabin+Sketch',
			'Delius+Swash+Caps'		=> 'Delius+Swash+Caps',
			'Coustard'				=> 'Coustard',
			'Cherry+Cream+Soda'		=> 'Cherry+Cream+Soda',
			'Maiden+Orange'			=> 'Maiden+Orange',
			'Syncopate'				=> 'Syncopate',
			'PT+Sans+Narrow'		=> 'PT+Sans+Narrow',
			'Montez'				=> 'Montez',
			'Short+Stack'			=> 'Short+Stack',
			'Poller+One'			=> 'Poller+One',
			'Tinos'					=> 'Tinos',
			'Philosopher'			=> 'Philosopher',
			'Neucha'				=> 'Neucha',
			'Gravitas+One'			=> 'Gravitas+One',
			'Corben'				=> 'Corben',
			'Istok+Web'				=> 'Istok+Web',
			'Federo'				=> 'Federo',
			'Yeseva+One'			=> 'Yeseva+One',
			'Petrona'				=> 'Petrona',
			'Arimo'					=> 'Arimo',
			'Irish+Grover'			=> 'Irish+Grover',
			'Quicksand'				=> 'Quicksand',
			'Paytone+One'			=> 'Paytone+One',
			'Kelly+Slab'			=> 'Kelly+Slab',
			'Nova+Flat'				=> 'Nova+Flat',
			'Vast+Shadow'			=> 'Vast+Shadow',
			'Ubuntu'				=> 'Ubuntu',
			'Smokum'				=> 'Smokum',
			'Ruslan+Display'		=> 'Ruslan+Display',
			'La+Belle+Aurore'		=> 'La+Belle+Aurore',
			'Federant'				=> 'Federant',
			'Podkova'				=> 'Podkova',
			'IM+Fell+French+Canon'	=> 'IM+Fell+French+Canon',
			'PT+Serif+Caption'		=> 'PT+Serif+Caption',
			'The+Girl+Next+Door'	=> 'The+Girl+Next+Door',
			'Artifika'				=> 'Artifika',
			'Marck+Script'			=> 'Marck+Script',
			'Droid+Sans+Mono'		=> 'Droid+Sans+Mono',
			'Contrail+One'			=> 'Contrail+One',
			'Swanky+and+Moo+Moo'	=> 'Swanky+and+Moo+Moo',
			'Wire+One'				=> 'Wire+One',
			'Tenor+Sans'			=> 'Tenor+Sans',
			'Nova+Mono'				=> 'Nova+Mono',
			'Josefin+Sans'			=> 'Josefin+Sans',
			'Bitter'				=> 'Bitter',
			'Supermercado+One'		=> 'Supermercado+One',
			'PT+Serif'				=> 'PT+Serif',
			'Limelight'				=> 'Limelight',
			'Coda+Caption:800'		=> 'Coda+Caption:800',
			'Lobster'				=> 'Lobster',
			'Gentium+Basic'			=> 'Gentium+Basic',
			'Atomic+Age'			=> 'Atomic+Age',
			'Mate+SC'				=> 'Mate+SC',
			'Eater+Caps'			=> 'Eater+Caps',
			'Bigshot+One'			=> 'Bigshot+One',
			'Kreon'					=> 'Kreon',
			'Rationale'				=> 'Rationale',
			'Sniglet:800'			=> 'Sniglet:800',
			'Smythe'				=> 'Smythe',
			'Waiting+for+the+Sunrise' => 'Waiting+for+the+Sunrise',
			'Gochi+Hand'			=> 'Gochi+Hand',
			'Reenie+Beanie'			=> 'Reenie+Beanie',
			'Kameron'				=> 'Kameron',
			'Anton'					=> 'Anton',
			'Holtwood+One+SC'		=> 'Holtwood+One+SC',
			'Schoolbell'			=> 'Schoolbell',
			'Tulpen+One'			=> 'Tulpen+One',
			'Redressed'				=> 'Redressed',
			'Ovo'					=> 'Ovo',
			'Shadows+Into+Light'	=> 'Shadows+Into+Light',
			'Rokkitt'				=> 'Rokkitt',
			'Josefin+Slab'			=> 'Josefin+Slab',
			'Passero+One'			=> 'Passero+One',
			'Copse'					=> 'Copse',
			'Walter+Turncoat'		=> 'Walter+Turncoat',
			'Sigmar+One'			=> 'Sigmar+One',
			'Convergence'			=> 'Convergence',
			'Gloria+Hallelujah'		=> 'Gloria+Hallelujah',
			'Fontdiner+Swanky'		=> 'Fontdiner+Swanky',
			'Tienne'				=> 'Tienne',
			'Calligraffitti'		=> 'Calligraffitti',
			'UnifrakturCook:700'	=> 'UnifrakturCook:700',
			'Tangerine'				=> 'Tangerine',
			'Days+One'				=> 'Days+One',
			'Cantarell'				=> 'Cantarell',
			'IM+Fell+Great+Primer'	=> 'IM+Fell+Great+Primer',
			'Antic'					=> 'Antic',
			'Muli'					=> 'Muli',
			'Monofett'				=> 'Monofett',
			'Just+Me+Again+Down+Here' => 'Just+Me+Again+Down+Here',
			'Geostar+Fill'			=> 'Geostar+Fill',
			'Candal'				=> 'Candal',
			'Cousine'				=> 'Cousine',
			'Merienda+One'			=> 'Merienda+One',
			'Goblin+One'			=> 'Goblin+One',
			'Monoton'				=> 'Monoton',
			'Ubuntu+Condensed'		=> 'Ubuntu+Condensed',
			'EB+Garamond'			=> 'EB+Garamond',
			'Droid+Serif'			=> 'Droid+Serif',
			'Lancelot'				=> 'Lancelot',
			'Cookie'				=> 'Cookie',
			'Fjord+One'				=> 'Fjord+One',
			'Arapey'				=> 'Arapey',
			'Rancho'				=> 'Rancho',
			'Sancreek'				=> 'Sancreek',
			'Butcherman+Caps'		=> 'Butcherman+Caps',
			'Salsa'					=> 'Salsa',
			'Amatic+SC'				=> 'Amatic+SC',
			'Creepster+Caps'		=> 'Creepster+Caps',
			'Chivo'					=> 'Chivo',
			'Linden+Hill'			=> 'Linden+Hill',
			'Nosifer+Caps'			=> 'Nosifer+Caps',
			'Marvel'				=> 'Marvel',
			'Alice'					=> 'Alice',
			'Love+Ya+Like+A+Sister' => 'Love+Ya+Like+A+Sister',
			'Pinyon+Script'			=> 'Pinyon+Script',
			'Stardos+Stencil'		=> 'Stardos+Stencil',
			'Leckerli+One'			=> 'Leckerli+One',
			'Nothing+You+Could+Do'	=> 'Nothing+You+Could+Do',
			'Sansita+One'			=> 'Sansita+One',
			'Poly'					=> 'Poly',
			'Alike'					=> 'Alike',
			'Fanwood+Text'			=> 'Fanwood+Text',
			'Bowlby+One+SC'			=> 'Bowlby+One+SC',
			'Actor'					=> 'Actor',
			'Terminal+Dosis'		=> 'Terminal+Dosis',
			'Aclonica'				=> 'Aclonica',
			'Gentium+Book+Basic'	=> 'Gentium+Book+Basic',
			'Rosario'				=> 'Rosario',
			'Satisfy'				=> 'Satisfy',
			'Sunshiney'				=> 'Sunshiney',
			'Aubrey'				=> 'Aubrey',
			'Jura'					=> 'Jura',
			'Ultra'					=> 'Ultra',
			'Zeyada'				=> 'Zeyada',
			'Changa+One'			=> 'Changa+One',
			'Varela'				=> 'Varela',
			'Black+Ops+One'			=> 'Black+Ops+One',
			'Open+Sans'				=> 'Open+Sans',
			'Alike+Angular'			=> 'Alike+Angular',
			'Prata'					=> 'Prata',
			'Bowlby+One'			=> 'Bowlby+One',
			'Megrim'				=> 'Megrim',
			'Damion'				=> 'Damion',
			'Coda'					=> 'Coda',
			'Vidaloka'				=> 'Vidaloka',
			'Radley'				=> 'Radley',
			'Indie+Flower'			=> 'Indie+Flower',
			'Over+the+Rainbow'		=> 'Over+the+Rainbow',
			'Open+Sans+Condensed:300' => 'Open+Sans+Condensed:300',
			'Abril+Fatface'			=> 'Abril+Fatface',
			'Miltonian'				=> 'Miltonian',
			'Delius'				=> 'Delius',
			'Six+Caps'				=> 'Six+Caps',
			'Francois+One'			=> 'Francois+One',
			'Dorsa'					=> 'Dorsa',
			'Aldrich'				=> 'Aldrich',
			'Buda:300'				=> 'Buda:300',
			'Rochester'				=> 'Rochester',
			'Allerta'				=> 'Allerta',
			'Bevan'					=> 'Bevan',
			'Wallpoet'				=> 'Wallpoet',
			'Quattrocento'			=> 'Quattrocento',
			'Dancing+Script'		=> 'Dancing+Script',
			'Amaranth'				=> 'Amaranth',
			'Unna'					=> 'Unna',
			'PT+Sans+Caption'		=> 'PT+Sans+Caption',
			'Geo'					=> 'Geo',
			'Quattrocento+Sans'		=> 'Quattrocento+Sans',
			'Oswald'				=> 'Oswald',
			'Carme'					=> 'Carme',
			'Spinnaker'				=> 'Spinnaker',
			'MedievalSharp'			=> 'MedievalSharp',
			'Nova+Square'			=> 'Nova+Square',
			'IM+Fell+French+Canon+SC' => 'IM+Fell+French+Canon+SC',
			'Voltaire'				=> 'Voltaire',
			'Raleway:100'			=> 'Raleway:100',
			'Delius+Unicase'		=> 'Delius+Unicase',
			'Shanti'				=> 'Shanti',
			'Expletus+Sans'			=> 'Expletus+Sans',
			'Crimson+Text'			=> 'Crimson+Text',
			'Nunito'				=> 'Nunito',
			'Numans'				=> 'Numans',
			'Hammersmith+One'		=> 'Hammersmith+One',
			'Miltonian+Tattoo'		=> 'Miltonian+Tattoo',
			'Allerta+Stencil'		=> 'Allerta+Stencil',
			'Vollkorn'				=> 'Vollkorn',
			'Pacifico'				=> 'Pacifico',
			'Cedarville+Cursive'	=> 'Cedarville+Cursive',
			'Cardo'					=> 'Cardo',
			'Merriweather'			=> 'Merriweather',
			'Loved+by+the+King'		=> 'Loved+by+the+King',
			'Slackey'				=> 'Slackey',
			'Nova+Cut'				=> 'Nova+Cut',
			'Rock+Salt'				=> 'Rock+Salt',
			'Yanone+Kaffeesatz'		=> 'Yanone+Kaffeesatz',
			'Molengo'				=> 'Molengo',
			'Nobile'				=> 'Nobile',
			'Goudy+Bookletter+1911' => 'Goudy+Bookletter+1911',
			'Bangers'				=> 'Bangers',
			'Old+Standard+TT'		=> 'Old+Standard+TT',
			'Orbitron'				=> 'Orbitron',
			'Comfortaa'				=> 'Comfortaa',
			'Varela+Round'			=> 'Varela+Round',
			'Forum'					=> 'Forum',
			'Maven+Pro'				=> 'Maven+Pro',
			'Volkhov'				=> 'Volkhov',
			'Allan:700'				=> 'Allan:700',
			'Luckiest+Guy'			=> 'Luckiest+Guy',
			'Gruppo'				=> 'Gruppo',
			'Cuprum'				=> 'Cuprum',
			'Anonymous+Pro'			=> 'Anonymous+Pro',
			'UnifrakturMaguntia'	=> 'UnifrakturMaguntia',
			'Covered+By+Your+Grace' => 'Covered+By+Your+Grace',
			'Homemade+Apple'		=> 'Homemade+Apple',
			'Lobster+Two'			=> 'Lobster+Two',
			'Coming+Soon'			=> 'Coming+Soon',
			'Mountains+of+Christmas' => 'Mountains+of+Christmas',
			'Architects+Daughter'	=> 'Architects+Daughter',
			'Dawning+of+a+New+Day'	=> 'Dawning+of+a+New+Day',
			'Kranky'				=> 'Kranky',
			'Adamina'				=> 'Adamina',
			'Carter+One'			=> 'Carter+One',
			'Bentham'				=> 'Bentham',
			'IM+Fell+Great+Primer+SC' => 'IM+Fell+Great+Primer+SC',
			'Chewy'					=> 'Chewy',
			'IM+Fell+English'		=> 'IM+Fell+English',
			'Inconsolata'			=> 'Inconsolata',
			'Vibur'					=> 'Inconsolata',
			'Andada'				=> 'Andada',
			'IM+Fell+Double+Pica'	=> 'IM+Fell+Double+Pica',
			'Kenia'					=> 'Kenia',
			'Meddon'				=> 'Meddon',
			'Metrophobic'			=> 'Metrophobic',
			'Play'					=> 'Play',
			'Special+Elite'			=> 'Special+Elite',
			'IM+Fell+Double+Pica+SC' => 'IM+Fell+Double+Pica+SC',
			'Didact+Gothic'			=> 'Didact+Gothic',
			'Modern+Antiqua'		=> 'Modern+Antiqua',
			'VT323'					=> 'VT323',
			'Annie+Use+Your+Telescope' => 'Annie+Use+Your+Telescope');

	// Changes the font for the title
	$wp_customize->add_setting( 'titlefontstyle_setting', array(
		'Default'           => 'Default',
		'control'           => 'select',));

	$wp_customize->add_control( 'titlefontstyle_control', array(
		'label'					=> 'Google Webfonts Site Title',
		'priority'				=> 10,
		'section'				=> 'title_tagline',
		'settings'				=> 'titlefontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));
			
	// Changes the font style for the tagline
	$wp_customize->add_setting( 'taglinefontstyle_setting', array(
		'Default'           => 'Default',
		'control'           => 'select',));

	$wp_customize->add_control( 'taglinefontstyle_control', array(
		'label'					=> 'Google Webfonts Tagline',
		'priority'				=> 11,
		'section'				=> 'title_tagline',
		'settings'				=> 'taglinefontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));

	// Changes the menus font style
	$wp_customize->add_setting( 'menufontstyle_setting', array(
		'Default'           => 'Default',
		'control'           => 'select',));

	$wp_customize->add_control( 'menufontstyle_control', array(
		'label'					=> 'Google Webfonts Menu',
		'priority'				=> 50,
		'section'				=> 'nav',
		'settings'				=> 'menufontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));

	// Change the font style on Post & Page Titles
	$wp_customize->add_setting( 'posttitlefontstyle_setting', array(
		'Default'           => 'Default',
		'control'           => 'select',));

	$wp_customize->add_control( 'posttitlefontstyle_control', array(
		'label'					=> 'Google Webfonts Post Title',
		'priority'				=> 50,
		'section'				=> 'content_section',
		'settings'				=> 'posttitlefontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));

	// Change the font style on the content
	$wp_customize->add_setting( 'contentfontstyle_setting', array(
		'Default'           => 'Default',
		'control'           => 'select',));

	$wp_customize->add_control( 'contentfontstyle_control', array(
		'label'					=> 'Google Webfonts Content',
		'priority'				=> 50,
		'section'				=> 'content_section',
		'settings'				=> 'contentfontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, )); }
	
add_action('customize_register', 'semperfi_customize');
		
// Inject the Customizer Choices into the Theme
function semperfi_inline_css() {
		
		echo '<!-- Custom Font Styles -->' . "\n";
		if ( (get_theme_mod('titlefontstyle_setting') != 'Default') && (get_theme_mod('titlefontstyle_setting') != '') ) {	echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('titlefontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n"; }
		if ( (get_theme_mod('taglinefontstyle_setting') != 'Default') && (get_theme_mod('taglinefontstyle_setting') != '')  ) {	echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('taglinefontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n"; }
		if ( (get_theme_mod('menufontstyle_setting') != 'Default') && (get_theme_mod('menufontstyle_setting') != '')  ) {	echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('menufontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n"; }
		if ( (get_theme_mod('posttitlefontstyle_setting') != 'Default') && (get_theme_mod('posttitlefontstyle_setting') != '')  ) {	echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('posttitlefontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n"; }
		if ( (get_theme_mod('contentfontstyle_setting') != 'Default') && (get_theme_mod('contentfontstyle_setting') != '')  ) {	echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('contentfontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n"; }
		echo '<!-- End Custom Fonts -->' . "\n\n";
		
// Inject the Customizer Choices into the Theme
		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		if ( (get_theme_mod('backgroundsize_setting') != 'auto') && (get_theme_mod('backgroundsize_setting') != '') ) echo '	body.custom-background {background-size:' . get_theme_mod('backgroundsize_setting') . ';}' . "\n";
		if ( (get_theme_mod('backgroundpaper_setting') != 'auto') && (get_theme_mod('backgroundpaper_setting') != '') )echo '	#margin {background-image:url(' . get_template_directory_uri() . '/images/' . get_theme_mod('backgroundpaper_setting') . '.png);}' . "\n";
		if ( (get_option('bannerimage_setting') != 'blue.png') && (get_option('bannerimage_setting') != '') ) echo '	#header {background: bottom url(' . get_template_directory_uri() . '/images/' . get_option('bannerimage_setting') .  ');}'. "\n";
		if ( (get_theme_mod('headerspacing_setting') != '35') && (get_theme_mod('headerspacing_setting') != '') ) echo '	#margin {margin:' . get_theme_mod('headerspacing_setting') . '% 2% 0%;}'. "\n";
		if ( (get_theme_mod('titlecolor_setting') != '#e0dbce') && (get_theme_mod('titlecolor_setting') != '') ) echo '	#header h1 a {color:' . get_theme_mod('titlecolor_setting') . ';}' . "\n";
		if ( (get_theme_mod('taglinecolor_setting') != '#3e5a21') && (get_theme_mod('taglinecolor_setting') != '') ) echo '	#header h1 i {color:' . get_theme_mod('taglinecolor_setting') . ';}' . "\n";
		if ( get_option('menu_setting') == 'notitle' ) { echo '	#header {position: fixed;margin-top:0px;}' . "\n" . '	.admin-bar #header {margin-top:28px;}' . "\n" . '#header h1:first-child, #header h1:first-child i,  #header img:first-child {display: none;}' . "\n"; }
		if ( get_option('menu_setting') == 'bottom' ) { echo '	#header {position: fixed; bottom:0; top:auto;}' . "\n" . '	#header h1:first-child, #header h1:first-child i,  #header img:first-child {display: none;}' . "\n" . '#header li ul {bottom:2.78em; top:auto;}' . "\n";}
		
		if ( (get_theme_mod('titlefontstyle_setting') != 'Default') && (get_theme_mod('titlefontstyle_setting') != '') ) {
			$q = get_theme_mod('titlefontstyle_setting');
			$q = preg_replace('/[^a-zA-Z0-9]+/', ' ', $q);
		 	echo	"#header h1 {font-family: '" . $q . "';}" . "\n"; }
		if ( (get_theme_mod('taglinefontstyle_setting') != 'Default') && (get_theme_mod('taglinefontstyle_setting') != '') ) {
			$x = get_theme_mod('taglinefontstyle_setting');
			$x = preg_replace('/[^a-zA-Z0-9]+/', ' ', $x);
			echo	"#header h1 i {font-family: '" . $x . "';}" . "\n"; }		
		if ( (get_theme_mod('menufontstyle_setting') != 'Default') && (get_theme_mod('menufontstyle_setting') != '') ) {
			$b = get_theme_mod('menufontstyle_setting');
			$b = preg_replace('/[^a-zA-Z0-9]+/', ' ', $b);
			echo	"#header li {font-family: '" . $b . "';}" . "\n"; }
		if ( (get_theme_mod('posttitlefontstyle_setting') != 'Default') && (get_theme_mod('posttitlefontstyle_setting') != '') ) {
			$z = get_theme_mod('posttitlefontstyle_setting');
			$z = preg_replace('/[^a-zA-Z0-9]+/', ' ', $z);
			echo	"h1, h2, h3, h4, h5, h6 {font-family: '" . $z . "';}" . "\n"; }
		if ( (get_theme_mod('contentfontstyle_setting') != 'Default') && (get_theme_mod('contentfontstyle_setting') != '') ) {
			$d = get_theme_mod('contentfontstyle_setting');
			$d = preg_replace('/[^a-zA-Z0-9]+/', ' ', $d);
			echo	"body {font-family: '" . $d . "';}" . "\n"; }

		echo '</style>' . "\n";
		echo '<!-- End Custom CSS -->' . "\n";
		echo "\n";
		
		if ( ( ( get_theme_mod('google_webmaster_tool_setting') != '' ) && ( get_theme_mod('google_webmaster_tool_setting') != 'For example mine is "gN9drVvyyDUFQzMSBL8Y8-EttW1pUDtnUypP-331Kqh"' ) ) || ( ( get_theme_mod('google_analytics_setting') != '' ) && ( get_theme_mod('google_analytics_setting') != 'For example mine is "UA-9335180-X"' ) ) ) {
			echo '<!-- Google Analytics & Webtool -->' . "\n";
			if ( ( get_theme_mod('google_webmaster_tool_setting') != '' ) && ( get_theme_mod('google_webmaster_tool_setting') != 'For example mine is "gN9drVvyyDUFQzMSBL8Y8-EttW1pUDtnUypP-331Kqh"' ) ) echo '<meta name="google-site-verification" content="' .  get_theme_mod('google_webmaster_tool_setting') . '" />' . "\n";
			if ( ( get_theme_mod('google_analytics_setting') != '' ) && ( get_theme_mod('google_analytics_setting') != 'For example mine is "UA-9335180-X"' ) ) {
			echo '<script type="text/javascript">' . "\n"; 
			echo '	var _gaq = _gaq || [];' . "\n"; 
			echo "	_gaq.push(['_setAccount', '" .  get_theme_mod('google_analytics_setting') . "']);" . "\n"; 
			echo "	_gaq.push(['_trackPageview']);" . "\n\n"; 
			echo "	(function() {" . "\n"; 
			echo "	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;" . "\n"; 
			echo "	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';" . "\n"; 
			echo "	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);" . "\n"; 
			echo "	})();" . "\n\n"; 
			echo "</script>" . "\n";  }
			echo '<!-- End Google Analytics & Webtool -->' . "\n";
			echo "\n"; } }

add_action('wp_head', 'semperfi_inline_css');

// Add some CSS so I can Style the Theme Options Page
function semperfi_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('semperfi-theme-options', get_template_directory_uri() . '/theme-options.css', false, '1.0');}

add_action('admin_print_styles-appearance_page_theme_options', 'semperfi_admin_enqueue_scripts');
	
// Create the Theme Information page (Theme Options)
function semperfi_theme_options_do_page() { ?>
    
    <div class="cover">
    
    <div id="header">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customize.png">
    </div>
    
    <div id="banner"></div>
    
    <div id="center">
	<div id="floatfix">

	<div class="reading">
    <div class="spacing"></div>
    <h3 class="title"><span>Please Read</br>This Page!</span>Thanks for using Semper Fi Lite!</h3>
	<span class="content"><p>Thank you for downloading and installing the WordPress Theme "Semper Fi Lite." I hope that you enjoy it and that I can continue to create these beautiful themes for years to come. But, if you could take a moment and become acutely aware that I have created this Theme and other themes free of charge, and while I'm not looking to get Rich, I really like creating these themes for you guys. Which is why I offer additional customization of "Semper Fi Lite" when you support me and install the standard version, "Semper Fi." If you're interested in supporting my work, or need some of the addition features in "Semper Fi" head on over to <a href="http://schwarttzy.com/shop/semper-fi/">this page</a>.</p>
    <p>Incase you happen to have any issues, questions, comments, or a requests for features with "Semper Fi Lite," you can contact me through E-Mail with the form on <a href="http://schwarttzy.com/contact-me/">this page</a>.</p>
    <p>Thank you again,</br><a href="http://schwarttzy.com/about-2/">Eric J. Schwarz</a></p>
	</span>
    <h3 class="title">Customizing Semper Fi</h3>
    <span class="content">
    There are more Features than this old video shows now.
    <p><span class='embed-youtube' style='text-align:center; display: block;'><iframe class='youtube-player' type='text/html' width='1100' height='649' src='http://www.youtube.com/embed/IU__-ipUxxc?version=3&#038;rel=1&#038;fs=1&#038;showsearch=0&#038;showinfo=1&#038;iv_load_policy=1&#038;wmode=transparent' frameborder='0'></iframe></span></p>
	</span>
    <h3 class="title">Features</h3>
    <span class="content">
    <table>
        <tbody>
        <tr>
        <th class="justify">Semper Fi Theme Features</th>
        <th>Lite</th>
        <th>Standard</th>
        </tr>
        <tr>
        <td class="justify">100% Responsive WordPress Theme</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Clean and Beautiful Stylized HTML, CSS, JavaScript</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Featured Images for Posts &amp; Pages</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Change the site Title and Slogan Colors</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Google Analytics & Site Verification</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload Your Own Background Image</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Choose from 4 different Background Paper Images</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload your own Background for the Paper Image</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Multiple Menu Banner Images to Choose</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Google Web Fonts for Title, Slogan, Post Title, and Content</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload Your Own Custom Banner Image</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        </tr>
        <tr>
        <td class="justify">Comments on Pages only, Posts only, Both, or None</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Option to have dates on posts to not display.</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Option for Social Icons in the menu.</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Option for search bar in menu.</td>
        <td>&#9733;</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload Your Header Image</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload Your Own Logo</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
		<tr>
        <td class="justify">Change the Link Colors in the Menu</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Choose you own Hyper Link Color</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Favicon to be Easily Implemented on Your Website</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">The Ability to use Custom Fonts from Typekit</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Remove my Mark from the Footer with the click of one button, instead of digging through the code to remove it.</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
		<tr>
        <td class="justify">Personal Support on Technical Issues You May Run Into</td>
        <td></td>
        <td>&#9733;</td>
        </tr>
        </tbody>
	</table>
    <p>Don't see a feature that you want, maybe theres plugin that doesn't work right, <a href="http://schwarttzy.com/contact-me/">send me an Email about it</a>.</p>
	</span>
    <h3 class="title">Semper Fi Lite Version Information</h3>
    <span class="content">
    <table>
        <tbody>
        <tr>
        <th>Version</th>
        <th class="justify"></th>
        </tr>
        <tr>
        <td>1.9</td>
        <td class="justify">Forgot a bit of code in the CSS that would just waste bandwidth.</td>
        </tr>
        <tr>
        <td>1.7</td>
        <td class="justify">Added code to the theme so that search engines can understand when a post was published. Brought back featured images into individual posts and pages, but you have to enable from the theme customizer. Dropped some code I thought I would use but never got around to it. Finally I fixed the google analytics, not sure what happened, but it is back along with adding site verification.</td>
        </tr>
        <tr>
        <td>1.6</td>
        <td class="justify">Fixed the issue where comments wouldn't display.</td>
        </tr>
        <tr>
        <td>1.5</td>
        <td class="justify">Fixed an issue with comments, SEO plugins, and add complete control over commenting.</td>
        </tr>
        <tr>
        <td>1.4</td>
        <td class="justify">Minor fixes that show up in the header the theme options are blank.</td>
        </tr>
        <tr>
        <td>1.3</td>
        <td class="justify">Included Google Web Fonts for the Title, Slogan, Menu, Post Title, and Content. I also cleaned up the "Theme Customizer" menu so that it makes more sense.</td>
        </tr>
        <tr>
        <td>.9</td>
        <td class="justify">Just a mix up in the code that would cause some errors in version .8</td>
        </tr>
        <tr>
        <td>.8</td>
        <td class="justify">Decided to rewrite the theme over again, completely from scratch, after having an amazing thought. The responsive website movement is because the vast number of different size resolutions of screen that we view the content. This amazing thought came to me that I could base everything off of em, which is the average width of one letter on your screen. Unlike using pixels to decide how the website displays where you have no idea what the end users font size is, using em give you a relatively good idea. Doing it this way I have optimized the readability of website based on how the user want to view the website. I also cleaned some code up to lighten the load on browsers and bring a more unified experience whether you're using Chrome, Firefox, or Internet Explorer.</td>
        </tr>
        <tr>
        <td>.7</td>
        <td class="justify">Small update to add in a new feature and rewrite some of the code. The new feature allows for someone to choose from 4 different choices for the white background that looks like paper. This feature is located under the "Background" tab on the "<a href="<?php echo home_url(); ?>/wp-admin/customize.php">Theme Customizer</a> Page." As for the rewrite of the code, I decided to have the Style.CSS file leave partially unfinished and have the default choice, or the choices currently chosen, finish the file Style.CSS with the missing code in the Header of the page. By choosing to leave the code out, browsers such as in firefox, chrome, IE, etc. will only see the CSS code once and won't have to write over and duplicate entries. Basically it keeps things lighter and cleaner.</td>
        </tr>
        <td>.6</td>
        <td class="justify">Quick update to add some more features to the theme along with a better "Theme Information" page. It is now possible to choose one of three different banners on the <a href="<?php echo home_url(); ?>/wp-admin/customize.php">Theme Customizer</a> page. I plan to add even more choices in the future for the banner, and on a side note you can upload you own with Semper Fi. Added in the ablity to easily change the color on Site Title and also the Site Slogan on the <a href="<?php echo home_url(); ?>/wp-admin/customize.php">Theme Customizer</a> page too. I have removed the file "theme-options.php" from the theme and the that was in there has been move to the file "functions.php" which is in the same folder. Finally the javascript file "background-size-preview.js" which handled the background changing on the <a href="<?php echo home_url(); ?>/wp-admin/customize.php">Theme Customizer</a> has been rename to "customizer.js" becuase it makes more sense since adding a bunch of code.</td>
        </tr>
        <td>.5</td>
        <td class="justify">The initial release.</td>
        </tr>
        </tbody>
	</table>
	</span>
    <h3 class="title">Semper Fi Version Information</h3>
    <span class="content">
    <table>
        <tbody>
        <tr>
        <th>Version</th>
        <td class="justify"></td>
        </tr>
        <tr>
        <td>7</td>
        <td class="justify">Same stuff as in 1.7 Semper Fi Lite, but special stuff for you guys soon.</td>
        </tr>
        <tr>
        <td>6</td>
        <td class="justify">Same stuff as in 1.5 Semper Fi Lite.</td>
        </tr>
        <tr>
        <td>5</td>
        <td class="justify">I have add the option to Upload a Header Image, a Banner Logo, Just the menu at the top or bottom, Google Web Fonts, orgainzed the "Theme Customizer Menu," adjust the margin from the top of the page to content, and fixed a bunch errors &amp; issues. I wasn't able to have the sidebar make it into this update, but will be in the next update coming soon. </td>
        </tr>
        <tr>
        <td>4</td>
        <td class="justify">Semper Fi, the standard version received a similar update to "Lite" in .9 including the same new features and small rewrite of some code. Theres no real difference between the two except for the additional features.</td>
        </tr>
        <tr>
        <td>3</td>
        <td class="justify">Semper Fi, the standard version received a similar update to "Lite" in .7 including the same new features and small rewrite of some code. It too now includes 4 different choices for the white background that looks like paper, but unlike "Lite" the standard version of Semper Fi allows you upload your own image also. Semper Fi also had the same rewrite of code so that the code basically leaves Style.CSS uncomplete and has the final bit of code added in the header based on either the default choices, or the ones currently chosen in <a href="<?php echo home_url(); ?>/wp-admin/customize.php">Theme Customizer</a>. All in all the point is to reduce the footprint of code, and the possibility of downloading unnecessary content.</td>
        </tr>
        <td>2</td>
        <td class="justify">This is the first update after the initial release of the “Lite” version of “Semper Fi” and includes a bunch of changes for the better. Both “Semper Fi” and “Semper Fi Lite” now use Theme Customizer instead of Theme Options to customize the page, allowing for the administrator to visually see the changes to the website before the changes take effect in real time. I have included all the promised functionality into the theme with this update, except for a custom logo which will be in future update. Which means you can change the color on the Links, Menu, Title, and Slogan for now, and more in the future. This update also includes the ablitiy to choose from the three standard options for the banner, but unquie to the Semper Fi you can upload your own image for the banner, where as you can't in Lite. Finally, with this update I have added in the ablity for you quickly remove the footer that says "Good Old Fasioned Hand Written Code by Eric J. Schwarz" from the theme.</td>
        </tr>
        <td>1.1</td>
        <td class="justify">The initial release.</td>
        </tr>
        </tbody>
	</table>
	</span>
    <h3 class="title">About the Theme Semper Fi</h3>
	<span class="content"><p>I dedicate this theme to my Grandfather, Eldon Schwarz, for his strength and courage in WWII. He is the sole survivor of the crew aboard the B17 Flying Fortress #44-6349, of the 483rd Bombardment Group, in the 840th Bomb Squadron and a prisoner of war from August 7, 1943 to November 5, 1945. I miss you Grandpa.</p>
    <p>This theme began with me reading a newspaper from May 8, 1945. Just holding it I could sense that a lot time and planning went into simple things like font, layout, and especially choosing the paper's material. I marveled at the quality that clearly went into this paper. Even with how old the newspaper was, it makes modern newspapers just seem like a mere shadow of themselves clinging to their former glory.</p>
    <p>Because of that I decided that I had to create a theme that feels like a newspaper, rich with details and fine quality. From hidden luxurious floral patterns, images that create the nostalgia of finely crafted paper, to incredibly detailed shadowing, but most importantly, the ability to respond to any width screen. "Semper Fi" is a completely flexible theme able to stretch from 300 pixels wide, all the way to 1920 and beyond. Images, galleries, quotes, text, titles, they all move fluidly to respond to any thing you through at it.</p>
    </span>
	</div>
    
    </div>
    </div>
    
    </div>
<?php }
add_action('admin_menu', 'semperfi_theme_options_add_page');

?>