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

/*/\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\/

	Add the editor style

------------------------------------------------------------------------------------*/

function dreamscape_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );}
	
add_action( 'init', 'dreamscape_editor_styles' );

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

// Wrap Video in a DIV so that videos width and height become reponsive using CSS
function wrap_embed_with_div($html, $url, $attr) {
	if (preg_match("/youtu.be/", $html) || preg_match("/youtube.com/", $html) || preg_match("/vimeo/", $html) || preg_match("/wordpress.tv/", $html) || preg_match("/v.wordpress.com/", $html)) { 
        // Don't see your video host in here? Just add it in, make sure you have the forward slash marks
            $html = '<div class="video-container">' . $html . "</div>"; }
            return $html;}

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
			wp_enqueue_script('semperfi-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '1', true);
			wp_enqueue_script('semperfi-scripts', get_template_directory_uri() . '/js/jquery.fittext.js', array('jquery'), '2', true);
			wp_enqueue_script('semperfi-fittext', get_template_directory_uri() . '/js/jquery.fittext.sizing.js', array('jquery'), '2', true);
            wp_enqueue_script('semperfi-menu-scrolling', get_template_directory_uri() . '/js/jquery.menu.scrolling.js', array('jquery'), '1', true);  } }

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


// Adds a meta box to the post editing screen
add_action( 'add_meta_boxes', 'prfx_custom_meta' );
function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Featured Background', 'prfx-textdomain' ), 'prfx_meta_callback', 'post', 'side' );
    add_meta_box( 'prfx_meta', __( 'Featured Background', 'prfx-textdomain' ), 'prfx_meta_callback', 'page', 'side' ); }


// Outputs the content of the meta box
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
	if (!empty($prfx_stored_meta['featured-background'][0]) ) $featured_background = $prfx_stored_meta['featured-background'][0];
    ?>

	<p>
	<label for="featured-background" class="prfx-row-title" style="text-align:justify;">The ideal image size is smaller than 400kb and a resolution around 1920 by 1080 pixels.<br><br></label>
	<?php if (!empty($featured_background)): ?><img alt="Featured Background Image" src="<?php echo $featured_background; ?>" style="box-shadow:0 0 .05em rgba(19,19,19,.5); height:auto; width:100%;"><?php endif; ?>
		<input type="text" name="featured-background" id="featured-background" value="<?php if ( isset ( $featured_background ) ) echo $featured_background; ?>" style="margin:0 0 .5em; width:100%;" />
		<input type="button" id="featured-background-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" style="margin:0 0 .25em; width:100%;" />
	</p> <?php }


// Loads the image management javascript
add_action( 'admin_enqueue_scripts', 'enqueue_featured_background' );

function enqueue_featured_background() {
	global $typenow;
    if(($typenow == 'post' ) || ($typenow == 'page' )) {

        // This function loads in the required files for the media manager.
        wp_enqueue_media();

        // Register, localize and enqueue our custom JS.
        wp_register_script( 'enqueue-featured-background', get_template_directory_uri() . '/js/featured-background.js', array( 'jquery' ), '1', true );
        wp_localize_script( 'enqueue-featured-background', 'js_array_featured_background',
            array(
                'title' => 'Upload or choose an image for the Featured Background',
                'button' =>'Use as Featured Background') );
        wp_enqueue_script( 'enqueue-featured-background' ); } }


// Saves the custom meta input
add_action( 'save_post', 'prfx_meta_save' );
function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return; }
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'featured-background' ] ) ) {
    	update_post_meta( $post_id, 'featured-background', $_POST[ 'featured-background' ] ); } }


// Sets up the Customize.php for Semper Fi (More to come)
add_action('customize_register', 'semperfi_customize');
function semperfi_customize($wp_customize) {

	// Before we begin let's create a textarea input
	class Semperfi_Customize_Textarea_Control extends WP_Customize_Control {
    
		public $type = 'textarea';
	 
		public function render_content() { ?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="1" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label><?php } }
			
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

		
// Inject the Customizer Choices into the Theme
add_action('wp_head', 'semperfi_inline_css', 16);
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
        if (is_page() || is_single()) $featured_background = get_post_meta( get_queried_object_ID(), 'featured-background', true ); if (!empty($featured_background)) echo '   body.custom-background {background-image:url(' . $featured_background . '); background-size:cover;}' . "\n";
        if (is_page()) echo '<!-- ' . $featured_background . ' -->';
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
		echo "\n";  }


// Add some CSS so I can Style the Theme Options Page
add_action('admin_print_styles-appearance_page_theme_options', 'semperfi_admin_enqueue_scripts');
function semperfi_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('semperfi-theme-information-css', get_template_directory_uri() . '/theme-options.css', false, '1.0');}


// Create the Theme Information page (Theme Options)
add_action('admin_menu', 'semperfi_theme_options_add_page');
function semperfi_theme_options_do_page() { ?>
    
    <div class="cover">
    
    <ul id="spacing"></ul>
    
    <div class="contain">
            
        <div id="header">
		
			<div class="themetitle">
				<a href="http://schwarttzy.com/shop/semper-fi/" target="_blank" ><h1><?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' ); ?></h1>
				<span>- v<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Version' ); ?></span></a>
			</div>
            
            
			<div class="upgrade">
                <a href="http://schwarttzy.com/shop/semper-fi/" target="_blank" ><h2>Upgrade Semper Fi</h2></a>
            </div>
		
    	</div>
            
        <ul class="info_bar">
			<li><a href="#description">Description</a></li>
			<li><a href="#customizing">Customizing</a></li>
			<li><a href="#features">Features</a></li>
			<li><a href="#faq">FAQ</a></li>
			<!-- <li><a href="#screenshots">Screen Shots</a></li> -->
			<li><a href="#changelog">Changelog</a></li>
			<li><a href="#support">Support</a></li>
		</ul>
        
        <div id="main">
            
            <div id="customizing" class="information">
                <h3>Customizing</h3>
                <p>Basically all I have right now is <a href="https://www.youtube.com/watch?v=IU__-ipUxxc" target="_blank">this video</a> on YouTube. I know the video is a little out dated, but this will change soon. Also, I would embed the video, but regrettably people wiser than me have said that it will introduce security issues. In the future I plan to add more stuff here, but for now I just need to get the theme approved.</p>
            </div>
            
            <div id="features" class="information">
                <h3>Features</h3>
                <ul>
                    <li>100% Responsive WordPress Theme</li>
                    <li>Clean and Beautiful Stylized HTML, CSS, JavaScript</li>
                    <li>Change the site Title and Slogan Colors</li>
                    <li>Upload Your Own Background Image</li>
                    <li>Adjust the opacity of the Content from 0 to 100% in 5% intervails</li>
                    <li>Adjust the opacity of the Sidebar from 0 to 100% in 5% intervails</li>
                    <li>Adjust Color of the Background for Content</li>
                    <li>Adjust Color of the Background for Sidebar</li>
                    <li>Multiple Menu Banner Images to Choose From</li>
                    <li>Control wether or not the "Previous" & "Next" shows</li>
                    <li>Adjust the spacing between the top of the page and content</li>
                    <li>Comments on Pages only, Posts only, Both, or Nones</li>
                    <li>Featured Background Image unique to a post or page</li>
                    <li>Choose from 100's of Google fonts for the Title and Slogan</li>
                </ul>
                <p>Don't see a feature the theme needs? <a href="http://schwarttzy.com/contact-me/" target="_blank">Contact me</a> about it.</p>
                <h3>Feature of the Semper Fi Upgrade</h3>
                <ul>
                    <li>Easily remove the footer with the link to my website</li>
                    <li>Favicon on Your Website</li>
                    <li>Change the Hyper Link Color</li>
                    <li>Change the Link Colors in the Menu</li>
                    <li>Change the Font Color in the Content</li>
                    <li>Upload Your Own Logo in either the Header or above Content</li>
                    <li>Upload Your Own Custom Banner Image</li>
                    <li>Upload your own image for the Background</li>
                    <li>Basic Google Meta for Analytics & Webmaster Verification</li>
                    <li>More to come!</li>
                </ul>
            </div>
            
            <div id="faq" class="information">
                <h3>FAQ</h3>
                <p><b>How do I remove the "Good Old Fashioned Hand Written code by Eric J. Schwarz"</b></p>
                <p>According to the WordPress.org I'm allowed to include one credit link, which you can read about <a href="http://make.wordpress.org/themes/guidelines/guidelines-license-theme-name-credit-links-up-sell-themes/" target="_blank">here</a>. I use this link to spread the word about my coding skills in the hopes I'll get some jobs. Anyway, you can dig through the code and remove it by hand but if you upgrade to the lastest version it will come right back. It's not really a big deal to do it by hand each time I release an update. However if you want to support my theme and get the Semper Fi upgrade, it's just a simple "On or Off" option in the "Theme Customizer."</p>
                <p><b>More FAQ's coming soon!</b></p>
            </div>
            
            <!--- <div id="screenshots" class="information">
                <h3>I'll take some screen shots</h3>
            </div> -->
            
            <div id="changelog" class="information">
                <h3>The Changelog</h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Version</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>2.3</th>
                            <td>The Theme Information page was changed to something more professional looking and easierto navigate. Fixed some issues with CSS problems with video not displaying correctly, wp-caption issues, etc. Added in the ablity to choose a differnet background image for a post or page.</td>
                        </tr>
                        <tr>
                            <th>2.1</th>
                            <td>Sorry about not updating as much lately I just don't have the money to spend the time on this theme as much as I would like too. Anyway, I added in editor CSS so that it easier to know what the text, photos, list, and any other HTML element will actually look like on the website. Social icon open up a new tab for browsing.</td>
                        </tr>
                        <tr>
                            <th>1.9</th>
                            <td>Forgot a bit of code in the CSS that would just waste bandwidth.</td>
                        </tr>
                        <tr>
                            <th>1.7</th>
                            <td>Added code to the theme so that search engines can understand when a post was published. Brought back featured images into individual posts and pages, but you have to enable from the theme customizer. Dropped some code I thought I would use but never got around to it. Finally I fixed the google analytics, not sure what happened, but it is back along with adding site verification.</td>
                        </tr>
                        <tr>
                            <th>1.6</th>
                            <td>Fixed the issue where comments wouldn't display.</td>
                        </tr>
                        <tr>
                            <th>1.5</th>
                            <td>Fixed an issue with comments, SEO plugins, and add complete control over commenting.</td>
                        </tr>
                        <tr>
                            <th>1.4</th>
                            <td>Minor fixes that show up in the header the theme options are blank.</td>
                        </tr>
                        <tr>
                            <th>1.3</th>
                            <td>Included Google Web Fonts for the Title, Slogan, Menu, Post Title, and Content. I also cleaned up the "Theme Customizer" menu so that it makes more sense.</td>
                        </tr>
                        <tr>
                            <th>.9</th>
                            <td>Just a mix up in the code that would cause some errors in version .8</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            
            <div id="support" class="information">
                <h3>Support Information</h3>
                <p>If you happen to have issues with plugins, writing posts, customizing the theme, and basically anything just shoot me an email on <a href="http://schwarttzy.com/contact-me/" target="_blank">this page</a> I setup for contacting me.</p>
                <p>I have a <a href="https://twitter.com/Schwarttzy" target="_blank">Twitter</a> account, but all I really use it for is posting information on updates to my themes. So if you looking for a new feature, you may be in luck. I'm not really sure what to do with Twitter, but I know a lot of people use it, which I why I have one.</p>
                <p>Your always welcome to use the "<a href="http://wordpress.org/support/theme/semper-fi-lite" target="_blank">Support</a>" forums on WordPress.org for any questions or problems, I just don't check it as often because I don't recieve email notifications on new posts or replies there.</p>
            </div>
        
            <div id="description" class="information">
                <h3>Description</h3>
                <p>If you're having trouble with using the WordPress Theme <?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' )?> and need some help, <a href="http://schwarttzy.com/contact-me/" target="_blank">contact me</a> about it. But I recommend taking a look at <a href="https://www.youtube.com/watch?v=IU__-ipUxxc" target="_blank">this video</a> before sending me an email. The video is kind of getting old, but it will show everything there is to customizing the theme "<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' )?>."</p>
                <p>Now that I have covered contacting me and linked a how to video for you, I would like to thank you for downloading and installing this theme. I hope that you enjoy it. I also hope that I can continue to create more beautiful themes like this for years to come, but that requires your help. I have created this Theme, and others, free of charge. And while I'm not looking to get rich, I really like creating <a href="http://profiles.wordpress.org/Schwarttzy/" target="_blank">these themes</a> for you guys.</p>
                <p>So if you're interested in supporting my work, I can offer you an <a href="http://schwarttzy.com/shop/semper-fi/" target="_blank" >upgrade to Semper-Fi Lite</a>. I have already included a few more features, some of which I'm not allowed include in the free version, and I also offer to write additional code to customize the theme for you. Even if the code will be unique to your website.</p>
                <p>Eric Schwarz<br><a href="http://schwarttzy.com/" targe="_blank">http://schwarttzy.com/</a></p>                
            </div>
        
        </div>
            
    </div>
    
    <ul id="finishing"></ul>
    
    </div><?php } ?>