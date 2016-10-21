<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit; ?><?php

// Global Content Width, Kind of a Joke with this theme, lol
if (!isset($content_width)) $content_width = 648;

// Ladies, Gentalmen, boys and girls let's start our engines
add_action('after_setup_theme', 'semperfi_setup');

if (!function_exists('semperfi_setup')):

function semperfi_setup() {

global $content_width; 
			
// Add Callback for Custom TinyMCE editor stylesheets. (editor-style.css)
add_editor_style();

// This feature enables post and comment RSS feed links to head
add_theme_support('automatic-feed-links');

// This feature enables custom-menus support for a theme
register_nav_menus(array(
    'touch_menu' => __('Touch Menu', 'localize_semperfi'),
    'content_menu' => __('Menu Bar Below Title', 'localize_semperfi')));

// This enables featured image on posts and pages
add_theme_support( 'post-thumbnails' );
add_image_size( 'thumbnail_size', 300, 300, true);
add_image_size( 'small_featured', 400, 237, true );
add_image_size( 'medium_featured', 600, 355, true );
add_image_size( 'large_featured', 1200, 1200 );

// Jetpack Open Graph protocol isn't really that good, I'm better.
add_filter( 'jetpack_enable_open_graph', '__return_false' );
    
// WordPress 3.4+
if (function_exists('get_custom_header')) {
    add_theme_support('custom-background');}} endif;


/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );


/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
    'search-form',
    //'comment-form',
    //'comment-list',
    'gallery',
    'caption' ));


// Filter 'get_comments_number' to display correct number of comments (count only comments, not trackbacks/pingbacks) Courtesy of Chip Bennett
function semperfi_comment_count( $count ) {  
	if ( ! is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']); }
	else {
        return $count;}}

// wp_list_comments() Callback function for Pings (Trackbacks/Pingbacks)
add_filter('get_comments_number', 'semperfi_comment_count', 0);
function semperfi_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

// Sets the post excerpt length to 250 characters
add_filter('excerpt_length', 'semperfi_excerpt_length');
function semperfi_excerpt_length($length) {
    return 250; }

// This function removes inline styles set by WordPress gallery
add_filter('gallery_style', 'semperfi_remove_gallery_css');
function semperfi_remove_gallery_css($css) {
    return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css); }

// This function removes default styles set by WordPress recent comments widget
add_action( 'widgets_init', 'semperfi_remove_recent_comments_style' );
function semperfi_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) ); }

// A comment reply
add_action( 'wp_enqueue_scripts', 'semperfi_enqueue_comment_reply' );
function semperfi_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) 
            wp_enqueue_script('comment-reply'); }

// Wrap Video in a DIV so that videos width and height become reponsive using CSS
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);
function wrap_embed_with_div($html, $url, $attr) {
	if (preg_match("/youtu.be/", $html) || preg_match("/youtube.com/", $html) || preg_match("/vimeo/", $html) || preg_match("/wordpress.tv/", $html) || preg_match("/v.wordpress.com/", $html)) { 
        // Don't see your video host in here? Just add it in, make sure you have the forward slash marks
        $html = '<div class="video-container">' . $html . "</div>"; }
        return $html;}

// WordPress Widgets start right here.
add_action('widgets_init', 'semperfi_widgets_init');
function semperfi_widgets_init() {

	register_sidebars(3, array(
		'name'=>'footer widget%d',
		'id' => 'widget',
		'description' => 'Widgets in this area will be shown below the the content of every page.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="post_title">',
		'after_title' => '</h2>', )); 

    register_sidebar( array(
		'name'          => 'Touch Menu Widgets',
		'id'            => 'touch_menu_widgets',
		'before_widget' => '<li class="touch_menu_widgetz">',
		'after_widget'  => '</li>',
		'before_title'  => '<h5 class="post_title">',
		'after_title'   => '</h5>',
	) );}

// Checks if the Widgets are active
function semperfi_is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index]) {
		return true; }
		return false; }
	
// Load up links in admin bar so theme is edit
function semperfi_theme_options_add_page() {
    add_theme_page(__('Semper Fi Info', 'localize_semperfi'), __('Semper Fi Info', 'localize_semperfi'), 'edit_theme_options', 'theme_options', 'semperfi_theme_options_do_page');}

// Load up the Localizer so that the theme can be translated
load_theme_textdomain( 'semperfi_localizer', get_template_directory() . '/language' );

// Adds Semper Fi Theme Options to the post editing screen
function prfx_custom_meta() {
add_meta_box( 'prfx_meta', __( 'Semper Fi Theme Options', 'localize_semperfi' ), 'prfx_meta_callback', 'post', 'side', 'high' );
add_meta_box( 'prfx_meta', __( 'Semper Fi Theme Options', 'localize_semperfi' ), 'prfx_meta_callback', 'page', 'side', 'high' );
add_meta_box( 'prfx_meta', __( 'Semper Fi Theme Options', 'localize_semperfi' ), 'prfx_meta_callback', 'product', 'side', 'high' );}

add_action( 'add_meta_boxes', 'prfx_custom_meta' );

// Outputs the content of the Semper Fi Theme Options
function prfx_meta_callback( $post ) {
wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
$prfx_stored_meta = get_post_meta( $post->ID );
$featured_background = get_post_meta( $post->ID , 'featured-background' , true ); ?>

<p>
	<label for="featured-background" style="text-align:justify;"><?php _e( 'This allows you to change the background image when viewing this particular post or page. The ideal image size is smaller than 400kb and a resolution around 1920 by 1080 pixels.', 'localize_semperfi' )?><br><br></label>
	<img id="theimage" src='<?php if (empty($featured_background)) { echo get_template_directory_uri() . '/images/nothing_found.jpg';} else {echo $featured_background;} ?>' style="box-shadow:0 0 .05em rgba(19,19,19,.5); height:auto; width:100%;"/> 
    <input type="text" name="featured-background" id="featured-background" value="<?php if ( isset ( $featured_background ) ) echo $featured_background; ?>" style="margin:0 0 .5em; width:100%;" />
    <input type="button" id="featured-background-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'localize_semperfi' )?>" style="margin:0 0 .25em; width:100%;" />
</p>
<hr>
<p>
    <span class="prfx-row-title"><?php _e( 'If this post or page has a featured image selected, along having this box check, and save the post will be displayed in the slider.', 'localize_semperfi' )?></span>
    <div class="prfx-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox'] ) ) checked( $prfx_stored_meta['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Add to Slider', 'localize_semperfi' )?>
        </label>
    </div>
</p>
<hr>
<p>
    <label for="meta-select" class="prfx-row-title"><?php _e( 'Higer numbers will display first in the slider. One is a netural number, 20 is the most important.', 'localize_semperfi' )?></label>
    <select name="meta-select" id="meta-select">
        <option value="1" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '1' ); ?>><?php _e( '1', 'localize_semperfi' )?></option>';
        <option value="2" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '2' ); ?>><?php _e( '2', 'localize_semperfi' )?></option>';
        <option value="3" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '3' ); ?>><?php _e( '3', 'localize_semperfi' )?></option>';
        <option value="4" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '4' ); ?>><?php _e( '4', 'localize_semperfi' )?></option>';
        <option value="5" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '5' ); ?>><?php _e( '5', 'localize_semperfi' )?></option>';
        <option value="6" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '6' ); ?>><?php _e( '6', 'localize_semperfi' )?></option>';
        <option value="7" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '7' ); ?>><?php _e( '7', 'localize_semperfi' )?></option>';
        <option value="8" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '8' ); ?>><?php _e( '8', 'localize_semperfi' )?></option>';
        <option value="9" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '9' ); ?>><?php _e( '9', 'localize_semperfi' )?></option>';
        <option value="10" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '10' ); ?>><?php _e( '10', 'localize_semperfi' )?></option>';
        <option value="11" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '11' ); ?>><?php _e( '11', 'localize_semperfi' )?></option>';
        <option value="12" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '12' ); ?>><?php _e( '12', 'localize_semperfi' )?></option>';
        <option value="13" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '13' ); ?>><?php _e( '13', 'localize_semperfi' )?></option>';
        <option value="14" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '14' ); ?>><?php _e( '14', 'localize_semperfi' )?></option>';
        <option value="15" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '15' ); ?>><?php _e( '15', 'localize_semperfi' )?></option>';
        <option value="16" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '16' ); ?>><?php _e( '16', 'localize_semperfi' )?></option>';
        <option value="17" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '17' ); ?>><?php _e( '17', 'localize_semperfi' )?></option>';
        <option value="18" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '18' ); ?>><?php _e( '18', 'localize_semperfi' )?></option>';
        <option value="19" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '19' ); ?>><?php _e( '19', 'localize_semperfi' )?></option>';
        <option value="20" <?php if ( isset ( $prfx_stored_meta['meta-select'] ) ) selected( $prfx_stored_meta['meta-select'][0], '20' ); ?>><?php _e( '20', 'localize_semperfi' )?></option>';
    </select>
</p>
<hr>
<p>
    <span class="prfx-row-title"><?php _e( 'Checking this will make the slide display the image only. Removing the title and the text from the slide.', 'localize_semperfi' )?></span>
    <div class="prfx-row-content">
        <label for="meta-checkbox-image">
            <input type="checkbox" name="meta-checkbox-image" id="meta-checkbox-image" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox-image'] ) ) checked( $prfx_stored_meta['meta-checkbox-image'][0], 'yes' ); ?> />
            <?php _e( 'Display just image', 'localize_semperfi' )?>
        </label>
    </div>
</p>
<hr>
<p>
    <span class="prfx-row-title"><?php _e( 'Exclude this Post from being displayed in the Blog', 'localize_semperfi' )?></span>
    <div class="prfx-row-content">
        <label for="meta-checkbox2">
            <input type="checkbox" name="meta-checkbox2" id="meta-checkbox2" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox2'] ) ) checked( $prfx_stored_meta['meta-checkbox2'][0], 'yes' ); ?> />
            <?php _e( 'Remove from Blog', 'localize_semperfi' )?>
        </label>
    </div>
</p><?php }

// Loads the image management javascript
function prfx_image_enqueue() {
    global $typenow;
    if (($typenow == 'page') || ($typenow == 'post') || ($typenow == 'product')) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'featured-background', get_template_directory_uri() . '/js/featured-background.js', array( 'jquery' ), '1', true );
        wp_localize_script( 'featured-background', 'featured_background',
            array(
                'title'     => 'Upload or choose an image for the Featured Background',
                'button'    => 'Use as Featured Background',));

        wp_enqueue_script( 'featured-background' );}}

add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );

// Saves the Semper Fi Theme Options
function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {return;}
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'featured-background' ] ) ) {
        update_post_meta( $post_id, 'featured-background', $_POST[ 'featured-background' ] );}

    // Checks for input and saves
    if( isset( $_POST[ 'meta-checkbox' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox', 'yes' );}
    else {
        update_post_meta( $post_id, 'meta-checkbox', '' );}

    // Checks for input and saves
    if( isset( $_POST[ 'meta-checkbox-image' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox-image', 'yes' );}
    else {
        update_post_meta( $post_id, 'meta-checkbox-image', '' );}
    
    // Set the prioity of the Slider Order
    if( isset( $_POST[ 'meta-select' ] ) ) {
        update_post_meta( $post_id, 'meta-select', $_POST[ 'meta-select' ] );}
    else {
        update_post_meta( $post_id, 'meta-select', '1' );}

    // Checks for input and saves
    if( isset( $_POST[ 'meta-checkbox2' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox2', 'yes' );}
    else {
        update_post_meta( $post_id, 'meta-checkbox2', '' );}}

add_action( 'save_post', 'prfx_meta_save' );

// Adds the meta box stylesheet when appropriate
function prfx_admin_styles(){
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style( 'prfx_meta_box_styles',  get_template_directory_uri() . 'meta-box-styles.css' );}}

add_action( 'admin_print_styles', 'prfx_admin_styles' );

// Theme Support Woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );}

// Remove the WooCommerce Breadcrumb
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );}

// Remove the WooCommerce Tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] ); // Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;}

// Put the title at the top
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_new_title' );
function woocommerce_new_title () {
    echo '<h3 class="post_title"><time>';
    do_action( 'woocommerce_move_price' );
    echo '</time>';
    if ( get_the_title() ) { the_title();} else { __('(No Title)', 'localize_semperfi'); };
    echo '</h3>';}

// Remove title & price in small discription
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );

// Add in this stuff
add_action( 'woocommerce_move_price', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_before_template_single_meta', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woo_normal_content_please', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_after_template_single_meta', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woo_normal_comments_please', 20 );

function woocommerce_before_template_single_meta() {echo '<div style="float:left;clear:both;width:100%;">';}
function woocommerce_after_template_single_meta() {echo '</div>';}

// Make Woocommerce display without those dumb tabs
function woo_normal_content_please() {
    echo '<div class="stars_and_bars" style="margin-bottom:1em;"><span class="left">';
    if ( get_the_title() ) { the_title();} else { __('(No Title)', 'localize_semperfi'); };
    echo ' - Details</span></div>';
    the_content();}
function woo_normal_comments_please() {comments_template();}

// Modify the Main Query to not Display post ment for just the slider
function exclude_category( $query ) {

    // Run only on the homepage
    if ( $query->is_home() && $query->is_main_query() ) {

        $query->set( 'meta_query', array(

            // Which ever is true (default is "And")
            'relation' => 'OR',
            
            // If the key has no value
            array(
                'key' => 'meta-checkbox2',
                'value' => 'completely',
                'compare' => 'NOT EXISTS'),
            
            // And if the key has a value and excludes "yes" posts
            array(
                'key' => 'meta-checkbox2',
                'value' => 'yes',
                'compare' => '!=')));

        // Lets limit the queries to multiples of six, otherwise the design doesn't look right for all css @media targets
        if (get_option('posts_per_page ') > 36)
                $query->query_vars['posts_per_page'] = 36;
        
        elseif ((get_option('posts_per_page ') < 36) && (get_option('posts_per_page ') >= 30))
                $query->query_vars['posts_per_page'] = 30;
        
        elseif ((get_option('posts_per_page ') < 30) && (get_option('posts_per_page ') >= 24))
                $query->query_vars['posts_per_page'] = 24;
        
        elseif ((get_option('posts_per_page ') < 24) && (get_option('posts_per_page ') >= 18))
                $query->query_vars['posts_per_page'] = 18;
        
        elseif ((get_option('posts_per_page ') < 18) && (get_option('posts_per_page ') >= 12))
                $query->query_vars['posts_per_page'] = 12;
        
        else $query->query_vars['posts_per_page'] = 6;}}


add_action( 'pre_get_posts', 'exclude_category' );

// Sets up the Customize.php for Semper Fi (More to come)
function semperfi_customize($wp_customize) {
    
// Extend Customize for an information tab
class Theme_Info extends WP_Customize_Control {
    public $type = 'info';
    public $label = '';
    public function render_content() { ?>
            <h3><?php echo esc_html( $this->label ); ?></h3><?php }};
    
$my_theme = wp_get_theme();

$wordpress_theme_uri = "https://wordpress.org/support/theme/" . strtolower(str_replace(" ", "-", $my_theme->get( 'Name' )));

$wordpress_theme_review =  "https://wordpress.org/support/view/theme-reviews/" . strtolower(str_replace(" ", "-", $my_theme->get( 'Name' )));

// Create an array for generating $wp_customize->add_section
$semperfi_add_section_array = array(
    'theme_info' => array('title' => __('Theme Information', 'localize_semperfi'), 'description' => '
    
    <h1 style="font-weight:300;font-size:32;">
        ' . $my_theme->get( 'Name' ) . '
        <div style="font-size:12px;display:inline-block;"><b>by</b> - <a href="https://wordpress.org/themes/author/' . $my_theme->get('Author') . '/" target="_blank">' . $my_theme->get( 'Author' ) . '</a></div>
    </h1>
    
    <a href="' . $my_theme->get( 'ThemeURI' ) . '" target="_blank">
        <img src="' . $my_theme->get_screenshot() . '" style="height:auto;margin-top:1.25em;width:100%;"/>
    </a>

    <p style="text-align:justify;">' . $my_theme->get( 'Description' ) . '</p>

    <h1 style="border-bottom:.025em solid #bbb;">
        <a href="' . $my_theme->get( 'ThemeURI' ) . '" target="_blank">Upgrade</a>
    </h1>
    
    <p style="text-align:justify;">All of the themes on <a href="https://wordpress.org/themes/" target="_blank">WordPress.org</a> are created, developed, and maintained free of charge by the author. The author of this theme, <i>' . $my_theme->get( 'Author' ) . '</i>, offers a <a href="' . $my_theme->get('ThemeURI') . '" target="_blank">premium version</a> that includes additional features to enhance your experience. This premium version of ' . $my_theme->get( 'Name' ) . ' supports the author by offsetting the many hours of work being put into the theme. For incentive, the premium version of ' . $my_theme->get( 'Name' ) . ' includes additional features to customize the theme with. Many of these options, list of these options are just below, are not available in the free version. Additionally, the author has offered to make minor custom changes to the ' . $my_theme->get( 'Name' ) . ' code for further customization. However, the author is still going to support the free versions when issues of bugs or errors in the code are found.</p>
                
                <a href="' . $my_theme->get('ThemeURI') . '" class="button button-secondary"  style="margin-bottom:1.11em;padding:0 2em;" target="_blank">Upgrade</a>
    
    <h1 style="border-bottom:.025em solid #bbb;">
        <a href="' . $wordpress_theme_review . '" target="_blank">Rate the Theme</a>
    </h1>
    
    <p>Help out the WordPress community by rating ' . $my_theme->get('Name') . '. Providing a review of the theme' . $my_theme->get('Name') . ' helps the community out by flitering the best WordPress Themes to the top. Visit <a href="' . $wordpress_theme_review . '" target="_blank">' . $my_theme->get('Name') . ' Reviews</a> page and take a couple minutes to help out with the WordPress comunity.</p>
    
    <a href="https://wordpress.org/support/view/theme-reviews/' . strtolower(str_replace(' ', '-', $my_theme->get('Name'))) . '#postform" style="margin-bottom:1.11em;padding:0 2em;" class="button button-secondary" target="_blank">Add Your Review</a>
    
    <h1 style="border-bottom:.025em solid #bbb;">
        <a href="http://schwarttzy.com/contact-me/" target="_blank">Support</a>
    </h1>
    
    <p>Contact the author, ' . $my_theme->get('Author') . ' , by email for support with their theme ' . $my_theme->get('Name') . ' using this <a href="http://schwarttzy.com/contact-me/" target="_blank">contact page</a>.</p>
    
    <a href="http://schwarttzy.com/contact-me/" class="button button-secondary" style="margin-bottom:1.11em;padding:0 2em;" target="_blank">Email</a>
    
    <p>Got something to say? Need help? View the offical <a href="' . $wordpress_theme_uri . '" target="_blank">support forum</a> for ' . $my_theme->get('Name') . ' on WordPress.org</p>
    
    <a href="https://wordpress.org/support/theme/' . strtolower(str_replace(' ', '-', $my_theme->get('Name'))) . '" class="button button-secondary" style="margin-bottom:1.11em;padding:0 2em;" target="_blank">View support forum</a>' , 'priority' => 2),

    'nav' => array('title' => __('Menu', 'localize_semperfi'), 'description' => '', 'priority' => 27),
    'options' => array('title' => __('Theme Options', 'localize_semperfi'), 'description' => '', 'priority' => 29),
    'sidebar' => array('title' => __('Sidebar', 'localize_semperfi'), 'description' => '', 'priority' => 30),
    'background_image' => array('title' => __('Images', 'localize_semperfi'), 'description' => '', 'priority' => 33),
    'font_style' => array('title' => __('Font Style', 'localize_semperfi'), 'description' => '', 'description' => '', 'priority' => 22),
    'size' => array('title' => __('Theme Sizing', 'localize_semperfi'), 'description' => '', 'priority' => 32),
    'social_icons' => array('title' => __('Social Icons', 'localize_semperfi'), 'description' => '', 'priority' => 21));

// Loop through and create the sections
foreach($semperfi_add_section_array as $section => $name) {
    if ($name['description'] != '') {
        $wp_customize->add_section( $section, array(
            'title'				=> $name['title'],
            'description'       => $name['description'],
            'priority'			=> $name['priority'], ));}
    else {
        $wp_customize->add_section( $section, array(
            'title'				=> $name['title'],
            'priority'			=> $name['priority'] ));}}

// Create an Array with a ton of google fonts
$google_font_array = array(
    'Default'				=> 'Default',
    'Abel'					=> 'Abel',
    'Abril+Fatface'			=> 'Abril+Fatface',
    'Aclonica'				=> 'Aclonica',
    'Actor'					=> 'Actor',
    'Adamina'				=> 'Adamina',
    'Aldrich'				=> 'Aldrich',
    'Alice'					=> 'Alice',
    'Alike'					=> 'Alike',
    'Alike+Angular'			=> 'Alike+Angular',
    'Allan:700'				=> 'Allan:700',
    'Allerta'				=> 'Allerta',
    'Allerta+Stencil'		=> 'Allerta+Stencil',
    'Amaranth'				=> 'Amaranth',
    'Amatic+SC'				=> 'Amatic+SC',
    'Andada'				=> 'Andada',
    'Andika'				=> 'Andika',
    'Annie+Use+Your+Telescope' => 'Annie+Use+Your+Telescope',
    'Anonymous+Pro'			=> 'Anonymous+Pro',
    'Antic'					=> 'Antic',
    'Anton'					=> 'Anton',
    'Arapey'				=> 'Arapey',
    'Architects+Daughter'	=> 'Architects+Daughter',
    'Arimo'					=> 'Arimo',
    'Artifika'				=> 'Artifika',
    'Arvo'					=> 'Arvo',
    'Asset'					=> 'Asset',
    'Astloch'				=> 'Astloch',
    'Atomic+Age'			=> 'Atomic+Age',
    'Aubrey'				=> 'Aubrey',
    'Bangers'				=> 'Bangers',
    'Bentham'				=> 'Bentham',
    'Bevan'					=> 'Bevan',
    'Bigshot+One'			=> 'Bigshot+One',
    'Bitter'				=> 'Bitter',
    'Black+Ops+One'			=> 'Black+Ops+One',
    'Bowlby+One'			=> 'Bowlby+One',
    'Bowlby+One+SC'			=> 'Bowlby+One+SC',
    'Brawler'				=> 'Brawler',
    'Buda:300'				=> 'Buda:300',
    'Butcherman+Caps'		=> 'Butcherman+Caps',
    'Cabin'					=> 'Cabin',
    'Cabin+Sketch'			=> 'Cabin+Sketch',
    'Calligraffitti'		=> 'Calligraffitti',
    'Candal'				=> 'Candal',
    'Cantarell'				=> 'Cantarell',
    'Cardo'					=> 'Cardo',
    'Carme'					=> 'Carme',
    'Carter+One'			=> 'Carter+One',
    'Caudex'				=> 'Caudex',
    'Cedarville+Cursive'	=> 'Cedarville+Cursive',
    'Changa+One'			=> 'Changa+One',
    'Cherry+Cream+Soda'		=> 'Cherry+Cream+Soda',
    'Chewy'					=> 'Chewy',
    'Chivo'					=> 'Chivo',
    'Coda'					=> 'Coda',
    'Coda+Caption:800'		=> 'Coda+Caption:800',
    'Comfortaa'				=> 'Comfortaa',
    'Coming+Soon'			=> 'Coming+Soon',
    'Contrail+One'			=> 'Contrail+One',
    'Convergence'			=> 'Convergence',
    'Cookie'				=> 'Cookie',
    'Copse'					=> 'Copse',
    'Corben'				=> 'Corben',
    'Cousine'				=> 'Cousine',
    'Coustard'				=> 'Coustard',
    'Covered+By+Your+Grace' => 'Covered+By+Your+Grace',
    'Creepster+Caps'		=> 'Creepster+Caps',
    'Crimson+Text'			=> 'Crimson+Text',
    'Crushed'				=> 'Crushed',
    'Crafty+Girls'			=> 'Crafty+Girls',
    'Cuprum'				=> 'Cuprum',
    'Damion'				=> 'Damion',
    'Dancing+Script'		=> 'Dancing+Script',
    'Dawning+of+a+New+Day'	=> 'Dawning+of+a+New+Day',
    'Days+One'				=> 'Days+One',
    'Delius'				=> 'Delius',
    'Delius+Swash+Caps'		=> 'Delius+Swash+Caps',
    'Delius+Unicase'		=> 'Delius+Unicase',
    'Didact+Gothic'			=> 'Didact+Gothic',
    'Dorsa'					=> 'Dorsa',
    'Droid+Sans'			=> 'Droid+Sans',
    'Droid+Sans+Mono'		=> 'Droid+Sans+Mono',
    'Droid+Serif'			=> 'Droid+Serif',
    'Eater+Caps'			=> 'Eater+Caps',
    'EB+Garamond'			=> 'EB+Garamond',
    'Expletus+Sans'			=> 'Expletus+Sans',
    'Fanwood+Text'			=> 'Fanwood+Text',
    'Federant'				=> 'Federant',
    'Federo'				=> 'Federo',
    'Fjord+One'				=> 'Fjord+One',
    'Fontdiner+Swanky'		=> 'Fontdiner+Swanky',
    'Forum'					=> 'Forum',
    'Francois+One'			=> 'Francois+One',
    'Gentium+Basic'			=> 'Gentium+Basic',
    'Gentium+Book+Basic'	=> 'Gentium+Book+Basic',
    'Geo'					=> 'Geo',
    'Geostar'				=> 'Geostar',
    'Geostar+Fill'			=> 'Geostar+Fill',
    'Give+You+Glory'		=> 'Give+You+Glory',
    'Gloria+Hallelujah'		=> 'Gloria+Hallelujah',
    'Goblin+One'			=> 'Goblin+One',
    'Gochi+Hand'			=> 'Gochi+Hand',
    'Goudy+Bookletter+1911' => 'Goudy+Bookletter+1911',
    'Gravitas+One'			=> 'Gravitas+One',
    'Gruppo'				=> 'Gruppo',
    'Hammersmith+One'		=> 'Hammersmith+One',
    'Holtwood+One+SC'		=> 'Holtwood+One+SC',
    'Homemade+Apple'		=> 'Homemade+Apple',
    'IM+Fell+Double+Pica'	=> 'IM+Fell+Double+Pica',
    'IM+Fell+Double+Pica+SC' => 'IM+Fell+Double+Pica+SC',
    'IM+Fell+DW+Pica'		=> 'IM+Fell+DW+Pica',
    'IM+Fell+DW+Pica+SC'	=> 'IM+Fell+DW+Pica+SC',
    'IM+Fell+English'		=> 'IM+Fell+English',
    'IM+Fell+English+SC'	=> 'IM+Fell+English+SC',
    'IM+Fell+French+Canon'	=> 'IM+Fell+French+Canon',
    'IM+Fell+French+Canon+SC' => 'IM+Fell+French+Canon+SC',
    'IM+Fell+Great+Primer'	=> 'IM+Fell+Great+Primer',
    'IM+Fell+Great+Primer+SC' => 'IM+Fell+Great+Primer+SC',
    'Inconsolata'			=> 'Inconsolata',
    'Indie+Flower'			=> 'Indie+Flower',
    'Irish+Grover'			=> 'Irish+Grover',
    'Istok+Web'				=> 'Istok+Web',
    'Jockey+One'			=> 'Jockey+One',
    'Josefin+Sans'			=> 'Josefin+Sans',
    'Josefin+Slab'			=> 'Josefin+Slab',
    'Judson'				=> 'Judson',
    'Julee'					=> 'Julee',
    'Jura'					=> 'Jura',
    'Just+Another+Hand'		=> 'Just+Another+Hand',
    'Just+Me+Again+Down+Here' => 'Just+Me+Again+Down+Here',
    'Kameron'				=> 'Kameron',
    'Kelly+Slab'			=> 'Kelly+Slab',
    'Kenia'					=> 'Kenia',
    'Kranky'				=> 'Kranky',
    'Kreon'					=> 'Kreon',
    'Kristi'				=> 'Kristi',
    'La+Belle+Aurore'		=> 'La+Belle+Aurore',
    'Lancelot'				=> 'Lancelot',
    'Lato'					=> 'Lato',
    'League+Script'			=> 'League+Script',
    'Leckerli+One'			=> 'Leckerli+One',
    'Lekton'				=> 'Lekton',
    'Limelight'				=> 'Limelight',
    'Linden+Hill'			=> 'Linden+Hill',
    'Lobster'				=> 'Lobster',
    'Lobster+Two'			=> 'Lobster+Two',
    'Lora'					=> 'Lora',
    'Love+Ya+Like+A+Sister' => 'Love+Ya+Like+A+Sister',
    'Loved+by+the+King'		=> 'Loved+by+the+King',
    'Luckiest+Guy'			=> 'Luckiest+Guy',
    'Maiden+Orange'			=> 'Maiden+Orange',
    'Mako'					=> 'Mako',
    'Marck+Script'			=> 'Marck+Script',
    'Marvel'				=> 'Marvel',
    'Mate'					=> 'Mate',
    'Mate+SC'				=> 'Mate+SC',
    'Maven+Pro'				=> 'Maven+Pro',
    'Meddon'				=> 'Meddon',
    'MedievalSharp'			=> 'MedievalSharp',
    'Megrim'				=> 'Megrim',
    'Merienda+One'			=> 'Merienda+One',
    'Merriweather'			=> 'Merriweather',
    'Metrophobic'			=> 'Metrophobic',
    'Michroma'				=> 'Michroma',
    'Miltonian'				=> 'Miltonian',
    'Miltonian+Tattoo'		=> 'Miltonian+Tattoo',
    'Molengo'				=> 'Molengo',
    'Monofett'				=> 'Monofett',
    'Monoton'				=> 'Monoton',
    'Montez'				=> 'Montez',
    'Modern+Antiqua'		=> 'Modern+Antiqua',
    'Mountains+of+Christmas' => 'Mountains+of+Christmas',
    'Muli'					=> 'Muli',
    'Neucha'				=> 'Neucha',
    'Neuton'				=> 'Neuton',
    'News+Cycle'			=> 'News+Cycle',
    'Nixie+One'				=> 'Nixie+One',
    'Nobile'				=> 'Nobile',
    'Nosifer+Caps'			=> 'Nosifer+Caps',
    'Nothing+You+Could+Do'	=> 'Nothing+You+Could+Do',
    'Nova+Cut'				=> 'Nova+Cut',
    'Nova+Flat'				=> 'Nova+Flat',
    'Nova+Mono'				=> 'Nova+Mono',
    'Nova+Oval'				=> 'Nova+Oval',
    'Nova+Script'			=> 'Nova+Script',
    'Nova+Slim'				=> 'Nova+Slim',
    'Nova+Round'			=> 'Nova+Round',
    'Nova+Square'			=> 'Nova+Square',
    'Numans'				=> 'Numans',
    'Nunito'				=> 'Nunito',
    'Old+Standard+TT'		=> 'Old+Standard+TT',
    'Open+Sans'				=> 'Open+Sans',
    'Open+Sans+Condensed:300' => 'Open+Sans+Condensed:300',
    'Orbitron'				=> 'Orbitron',
    'Oswald'				=> 'Oswald',
    'Over+the+Rainbow'		=> 'Over+the+Rainbow',
    'Ovo'					=> 'Ovo',
    'Pacifico'				=> 'Pacifico',
    'Play'					=> 'Play',
    'Passero+One'			=> 'Passero+One',
    'Patrick+Hand'			=> 'Patrick+Hand',
    'Paytone+One'			=> 'Paytone+One',
    'Permanent+Marker'		=> 'Permanent+Marker',
    'Petrona'				=> 'Petrona',
    'Philosopher'			=> 'Philosopher',
    'Pinyon+Script'			=> 'Pinyon+Script',
    'Playfair+Display'		=> 'Playfair+Display',
    'Podkova'				=> 'Podkova',
    'Poller+One'			=> 'Poller+One',
    'Poly'					=> 'Poly',
    'Pompiere'				=> 'Pompiere',
    'Prata'					=> 'Prata',
    'Prociono'				=> 'Prociono',
    'PT+Sans'				=> 'PT+Sans',
    'PT+Sans+Caption'		=> 'PT+Sans+Caption',
    'PT+Sans+Narrow'		=> 'PT+Sans+Narrow',
    'PT+Serif'				=> 'PT+Serif',
    'PT+Serif+Caption'		=> 'PT+Serif+Caption',
    'Puritan'				=> 'Puritan',
    'Quattrocento'			=> 'Quattrocento',
    'Quattrocento+Sans'		=> 'Quattrocento+Sans',
    'Questrial'				=> 'Questrial',
    'Quicksand'				=> 'Quicksand',
    'Radley'				=> 'Radley',
    'Raleway:100'			=> 'Raleway:100',
    'Rammetto+One'			=> 'Rammetto+One',
    'Rancho'				=> 'Rancho',
    'Rationale'				=> 'Rationale',
    'Redressed'				=> 'Redressed',
    'Reenie+Beanie'			=> 'Reenie+Beanie',
    'Rock+Salt'				=> 'Rock+Salt',
    'Rochester'				=> 'Rochester',
    'Rokkitt'				=> 'Rokkitt',
    'Rosario'				=> 'Rosario',
    'Ruslan+Display'		=> 'Ruslan+Display',
    'Salsa'					=> 'Salsa',
    'Sancreek'				=> 'Sancreek',
    'Sansita+One'			=> 'Sansita+One',
    'Satisfy'				=> 'Satisfy',
    'Schoolbell'			=> 'Schoolbell',
    'Shadows+Into+Light'	=> 'Shadows+Into+Light',
    'Shanti'				=> 'Shanti',
    'Short+Stack'			=> 'Short+Stack',
    'Sigmar+One'			=> 'Sigmar+One',
    'Six+Caps'				=> 'Six+Caps',
    'Slackey'				=> 'Slackey',
    'Smokum'				=> 'Smokum',
    'Smythe'				=> 'Smythe',
    'Sniglet:800'			=> 'Sniglet:800',
    'Snippet'				=> 'Snippet',
    'Sorts+Mill+Goudy'		=> 'Sorts+Mill+Goudy',
    'Special+Elite'			=> 'Special+Elite',
    'Spinnaker'				=> 'Spinnaker',
    'Stardos+Stencil'		=> 'Stardos+Stencil',
    'Sue+Ellen+Francisco'	=> 'Sue+Ellen+Francisco',
    'Supermercado+One'		=> 'Supermercado+One',
    'Sunshiney'				=> 'Sunshiney',
    'Swanky+and+Moo+Moo'	=> 'Swanky+and+Moo+Moo',
    'Syncopate'				=> 'Syncopate',
    'Tangerine'				=> 'Tangerine',
    'Tenor+Sans'			=> 'Tenor+Sans',
    'Terminal+Dosis'		=> 'Terminal+Dosis',
    'The+Girl+Next+Door'	=> 'The+Girl+Next+Door',
    'Tienne'				=> 'Tienne',
    'Tinos'					=> 'Tinos',
    'Tulpen+One'			=> 'Tulpen+One',
    'Ubuntu'				=> 'Ubuntu',
    'Ubuntu+Condensed'		=> 'Ubuntu+Condensed',
    'Ubuntu+Mono'			=> 'Ubuntu+Mono',
    'Ultra'					=> 'Ultra',
    'UnifrakturCook:700'	=> 'UnifrakturCook:700',
    'UnifrakturMaguntia'	=> 'UnifrakturMaguntia',
    'Unkempt'				=> 'Unkempt',
    'Unna'					=> 'Unna',
    'Varela'				=> 'Varela',
    'Varela+Round'			=> 'Varela+Round',
    'Vast+Shadow'			=> 'Vast+Shadow',
    'Vidaloka'				=> 'Vidaloka',
    'Vibur'					=> 'Inconsolata',
    'Volkhov'				=> 'Volkhov',
    'Vollkorn'				=> 'Vollkorn',
    'Voltaire'				=> 'Voltaire',
    'VT323'					=> 'VT323',
    'Waiting+for+the+Sunrise' => 'Waiting+for+the+Sunrise',
    'Wallpoet'				=> 'Wallpoet',
    'Walter+Turncoat'		=> 'Walter+Turncoat',
    'Wire+One'				=> 'Wire+One',
    'Yanone+Kaffeesatz'		=> 'Yanone+Kaffeesatz',
    'Yellowtail'			=> 'Yellowtail',
    'Yeseva+One'			=> 'Yeseva+One',
    'Zeyada'				=> 'Zeyada');
    
function list_semper_fi_google_fonts_array($google_font_array) {
    return $google_font_array;}
add_action( 'hook_semper_fi_google_fonts_array', 'list_semper_fi_google_fonts_array' );

// List out all the controls and the options
$semperfi_customizer_array_of_options = array(

    'fontcolor' => array(
        'type' => 'color',
        'standard' => '#111111',
        'label' => __('Base Color', 'localize_semperfi')),

    'titlecolor' => array(
        'type' => 'color',
        'standard' => '#111111',
        'label' => __('Site Title', 'localize_semperfi')),

    'taglinecolor' => array(
        'type' => 'color',
        'standard' => '#111111',
        'label' => __('Tagline', 'localize_semperfi')),
    
    'title_and_tagline_shadow_color' => array(
        'type' => 'color',
        'standard' => '#ffffff',
        'label' => __('Tile & Tagline Shadow Color', 'localize_semperfi')),

    'navcolor' => array(
        'type' => 'color',
        'standard' => '#dddddd',
        'label' => __('Menu - 1st Level', 'localize_semperfi')),

    'navcolorhover' => array(
        'type' => 'color',
        'standard' => '#dc1111',
        'label' => __('Menu - 1st Level Hovering', 'localize_semperfi')),

    'dropcolor' => array(
        'type' => 'color',
        'standard' => '#dddddd',
        'label' => __('Menu - 2nd Level', 'localize_semperfi')),

    'dropcolorhover' => array(
        'type' => 'color',
        'standard' => '#dc1111',
        'label' => __('Menu - 2nd Level Hovering', 'localize_semperfi')),

    'linkcolor' => array(
        'type' => 'color',
        'standard' => '#dc1111',
        'label' => __('Link', 'localize_semperfi')),

    'linkcolorhover' => array(
        'type' => 'color',
        'standard' => '#555555',
        'label' => __('Link Hovering', 'localize_semperfi')),

    'link_text_shadow' => array(
        'type' => 'color',
        'standard' => '',
        'label' => __('Link Text Shadow', 'localize_semperfi')),

    'header_background' => array(
        'type' => 'img',
        'priority' => '10',
        'label' => __('Background for Title & Slogan', 'localize_semperfi')),

    'content_bg' => array(
        'type' => 'img',
        'priority' => '1',
        'label' => __('Content Background Upload', 'localize_semperfi')),

    'title_size' => array(
        'type' => 'range',
        'label' => __('Site Title Font', 'localize_semperfi'),
        'priority' => '1',
        'section' => 'size',
        'standard' => '1.0',
        'high' => '6.00',
        'low' => '.2',
        'step' => '.05',
        'units' => 'em'),

    'tagline_size' => array(
        'type' => 'range',
        'label' => __('Tagline Font', 'localize_semperfi'),
        'priority' => '1',
        'section' => 'size',
        'standard' => '.9',
        'high' => '6.00',
        'low' => '.025',
        'step' => '.025',
        'units' => 'em'),

    'touch_title_size' => array(
        'type' => 'range',
        'label' => __('Touch Menu Site Title Font', 'localize_semperfi'),
        'priority' => '2',
        'section' => 'size',
        'standard' => '2.5',
        'high' => '6.00',
        'low' => '.2',
        'step' => '.025',
        'units' => 'em'),

    'touch_tagline_size' => array(
        'type' => 'range',
        'label' => __('Touch Menu Tagline Font', 'localize_semperfi'),
        'priority' => '2',
        'section' => 'size',
        'standard' => '.4',
        'high' => '6.00',
        'low' => '.02',
        'step' => '.02',
        'units' => 'em'),


    'title_rotation' => array(
        'type' => 'range',
        'label' => __('Rotate Title', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => '0',
        'high' => '180',
        'low' => '-180',
        'step' => '.1',
        'units' => '&deg;'),

    'tagline_rotation' => array(
        'type' => 'range',
        'label' => __('Rotate Tagline', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => '0.00',
        'high' => '180',
        'low' => '-180',
        'step' => '.25',
        'units' => '&deg;'),

    'tagline_up_down' => array(
        'type' => 'range',
        'label' => __('Move Tagline Up/Down', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => '0.00',
        'high' => '1',
        'low' => '-5',
        'step' => '.25',
        'units' => '&em;'),

    'tagline_right_left' => array(
        'type' => 'range',
        'label' => __('Move Tagline Right/Left', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => '0.00',
        'high' => '30',
        'low' => '-30',
        'step' => '.1',
        'units' => '&em;'),

    'menu_drop_down' => array(
        'type' => 'range',
        'label' => __('Move Submenu Up/Down', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => '2.4',
        'high' => '4.5',
        'low' => '1.5',
        'step' => '.1',
        'units' => '&em;'),

    'headerspacing' => array(
        'type' => 'range',
        'label' => __('Spacing Between Top and Content', 'localize_semperfi'),
        'priority' => '90',
        'section' => 'size',
        'standard' => '18',
        'high' => '26',
        'low' => '0',
        'step' => '1',
        'units' => 'em'),

    'header_min_size' => array(
        'type' => 'range',
        'label' => __('Adjust the padding of the Header', 'localize_semperfi'),
        'priority' => '91',
        'section' => 'size',
        'standard' => '0',
        'high' => '16',
        'low' => '0',
        'step' => '.25',
        'units' => 'em'),

    'header_height' => array(
        'type' => 'range',
        'label' => __('Adjust the Height of the Header', 'localize_semperfi'),
        'priority' => '91',
        'section' => 'size',
        'standard' => '0',
        'high' => '16',
        'low' => '0',
        'step' => '.25',
        'units' => 'em'),

    /* Doesn't work at the moment
    'fontsizeadjust' => array(
        'type' => 'range',
        'label' => __('Adjust size of the entire website', 'localize_semperfi'),
        'priority' => '90',
        'section' => 'size',
        'standard' => '100',
        'high' => '120',
        'low' => '86',
        'step' => '1',
        'units' => '%'),*/

    'display_menu' => array(
        'type' => 'select',
        'label' => __('Hide Touch Menu while in Customizer', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'true',
        'choices' => array(
            false => __('Hide', 'localize_semperfi'),
            true => __('Display', 'localize_semperfi'))),

    'featured_image_display' => array(
        'type' => 'select',
        'label' => __('Display or Hide Featured Image on Post and Pages', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'on',
        'choices' => array(
            'off' => __('Hide', 'localize_semperfi'),
            'on' => __('Display', 'localize_semperfi'))),

    'navi_search' => array(
        'type' => 'select',
        'label' => __('Search Box in navigaton', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'on',
        'choices' => array(
            'off' => __('Hide', 'localize_semperfi'),
            'on' => __('Display', 'localize_semperfi'))),

    'tagline_display' => array(
        'type' => 'select',
        'label' => __('Display / Hide Tagline', 'localize_semperfi'),
        'priority' => '3',
        'section' => 'options',
        'standard' => 'block',
        'choices' => array(
            'block' => __('Tagline is Visible', 'localize_semperfi'),
            'none' => __('Tagline is Hidden', 'localize_semperfi'))),

    'blog_title' => array(
        'type' => 'select',
        'label' => __('Double up the height of blog titles for more text.', 'localize_semperfi'),
        'priority' => '4',
        'section' => 'options',
        'standard' => 'block',
        'choices' => array(
            'normal' => __('Normal blog title height', 'localize_semperfi'),
            'double' => __('Tagline height is doubled', 'localize_semperfi'))),

    'number_slides' => array(
        'type' => 'select',
        'label' => __('Maxium number of Slides to display', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'on',
        'choices' => array(
			'2' => __('Two', 'localize_semperfi'),
			'3' => __('Three', 'localize_semperfi'))),

    'slider_text' => array(
        'type' => 'select',
        'label' => __('Disable text in the slider', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'off',
        'choices' => array(
			'off' => __('Text is Displayed', 'localize_semperfi'),
			'on' => __('Text is Hidden', 'localize_semperfi'))),

    'display_date' => array(
        'type' => 'select',
        'label' => __('Display Date Next to Title', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'on',
        'choices' => array(
			'on' => __('Date are Displayed', 'localize_semperfi'),
			'off' => __('Dates are Hidden', 'localize_semperfi'))),

    'previousnext' => array(
        'type' => 'select',
        'label' => __('Previous & Next Links After Content', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'both',
        'choices' => array(
			'both'			=> __('Both Pages & Posts', 'localize_semperfi'),
			'single'	    => __('Only Posts', 'localize_semperfi'),
			'page'			=> __('Only Pages', 'localize_semperfi'),
			'neither'		=> __('Neither', 'localize_semperfi'))),

    'backgroundpaper' => array(
        'type' => 'select',
        'label' => __('Content Background Image', 'localize_semperfi'),
        'priority' => '',
        'section' => 'background_image',
        'standard' => 'clean',
        'choices' => array(
			'clean'				=> __('Clean but Used (Default)', 'localize_semperfi'),
			'peppered'			=> __('Peppered', 'localize_semperfi'),
			'vintage'			=> __('Vintage', 'localize_semperfi'),
            'xv'                => __('Epic', 'localize_semperfi'),
			'canvas'			=> __('Heavy Canvas', 'localize_semperfi'))),

    'backgroundsize' => array(
        'type' => 'radio',
        'label' => __('Background Size', 'localize_semperfi'),
        'priority' => 10,
        'section' => 'background_image',
        'standard' => 'auto',
        'choices' => array(
			'auto'			=> __('Auto', 'localize_semperfi'),
			'contain'		=> __('Contain', 'localize_semperfi'),
			'cover'			=> __('Cover', 'localize_semperfi'))),

    'backgroundsizeheader' => array(
        'type' => 'radio',
        'label' => __('Background Size in Header', 'localize_semperfi'),
        'priority' => 11,
        'section' => 'background_image',
        'standard' => 'cover',
        'choices' => array(
			'auto'			=> __('Auto', 'localize_semperfi'),
			'contain'		=> __('Contain', 'localize_semperfi'),
			'cover'			=> __('Cover', 'localize_semperfi'))),

    'headerbackgroundposition' => array(
        'type' => 'radio',
        'label' => __('Position the Background', 'localize_semperfi'),
        'priority' => 11,
        'section' => 'background_image',
        'standard' => 'center',
        'choices' => array(
			'top'			=> __('Top', 'localize_semperfi'),
			'25%'			=> __('75%', 'localize_semperfi'),
			'center'		=> __('Center', 'localize_semperfi'),
			'75%'			=> __('25%', 'localize_semperfi'),
			'bottom'		=> __('Bottom', 'localize_semperfi'))),

    'comments' => array(
        'type' => 'select',
        'label' => __('Options for Displaying Comments', 'localize_semperfi'),
        'priority' => 10,
        'section' => 'comments',
        'standard' => 'both',
        'choices' => array(
			'both'           => __('Comments on both Pages & Posts', 'localize_semperfi'),
			'single'	     => __('Comments only on Posts', 'localize_semperfi'),
			'page'		     => __('Comments only on Pages', 'localize_semperfi'),
			'none'           => __('Comments completely Off', 'localize_semperfi'))),

    /* Not sure this should be an option
    'menu_location' => array(
        'type' => 'select',
        'label' => __('Menu Display Options', 'localize_semperfi'),
        'priority' => '',
        'section' => 'options',
        'standard' => 'both',
        'choices' => array(
			'right'			=> __('Right', 'localize_semperfi'),
			'left'	    => __('Left', 'localize_semperfi'))),*/

    'social_icon' => array(
        'type' => 'social_icon',
        'icons' => array(
            '500px' => '',
            'bitcoin' => '',
            'comments' => '',
            'copyright' => '',
            'digg' => '',
            'dropbox' => '',
            'email' => '',
            'facebook' => '',
            'gallery' => '',
            'google_plus' => '',
            'google_maps' => '',
            'instagram' => '',
            'link' => '',
            'linkedin' => '',
            'magnifying_glass' => '',
            'paper_airplane' => '',
            'paper_clip' => '',
            'paypal' => '',
            'pencil' => '',
            'phone_cell' => '',
            'phone_old' => '',
            'pinterest' => '',
            'push_pin' => '',
            'recycle' => '',
            'rss' => '',
            'shopping_cart' => '',
            'soundcloud' => '',
            'steam' => '',
            'stumble_upon' => '',
            'sykpe' => '',
            'tags' => '',
            'twitter' => '',
            'wordpress' => '',
            'world' => '',
            'yelp' => '',
            'youtube' => '',
            'vimeo' => '')),

    'titlefontstyle' => array(
        'type' => 'font',
        'label' => __('Site Title', 'localize_semperfi'),
		'choices' => $google_font_array,
        'css' => '.header h1'),

    'taglinefontstyle' => array(
        'type' => 'font',
        'label' => __('Tagline', 'localize_semperfi'),
		'choices' => $google_font_array,
        'css' => '.header h2'),
    
    'theme_information' => array(
        'type' => 'theme_docs',
        'priority' => '1',
        'section' => 'theme_info'));
    
if (function_exists('semper_fi_add_customizer_array')) {
    
    // Define to not get errors
    $semper_fi_plugin_add_to_array = array();
    
    //add_action('admin_enqueue_scripts', 'semper_fi_add_customizer_array');
    do_action( 'hook_semper_fi_plugin_customizer_options' );
    
    // Here I'm pushing more features into the array to add more features to the customizer
    $semperfi_customizer_array_of_options = array_merge($semperfi_customizer_array_of_options, semper_fi_add_customizer_array( $semper_fi_plugin_add_to_array ));}

    
/* Sanitize the Select Options
foreach($semperfi_customizer_array_of_options as $option => $values) {
    if ($values['type'] == 'select') {
        $name_sanitize = $option . 'semperf_fi_select_sanitize'
        function $name_sanitize ( $input ) {
            if ( array_key_exists( $input, $values['choices'] ) ) {
                return $input;}
            else {
                return '';}}}}*/


function oenology_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $control = $setting->manager->get_control($setting->id);
    $choices = $control->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );}

// Loop throught the array and create all the customizer controls
foreach($semperfi_customizer_array_of_options as $option => $values) {

    if ($values['type'] == 'social_icon') {
        
        foreach($values['icons'] as $icon => $digits) {

        $wp_customize->add_setting( $icon, array('default' => '', 'sanitize_callback' => 'esc_url'));

        $wp_customize->add_control( $icon . '_control', array(
            'type' => 'url',
            'section' => 'social_icons',
            'label' => ucwords(strtolower(str_replace('_', ' ', $icon))),
            'settings'  => $icon,
            'description' => ''));}}

    if ($values['type'] == 'color') {

        $wp_customize->add_setting( $option, array('default' => $values['standard'], 'sanitize_callback' => 'sanitize_hex_color'));
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $option . '_control', array(
            'section'   => 'colors',
            'label'     => $values['label'],
            'settings'  => $option)));}
    
    if ($values['type'] == 'select') {

        $wp_customize->add_setting( $option, array('default' => $values['standard'], 'sanitize_callback' =>  'esc_textarea'));
        
        $wp_customize->add_control( $option . '_control', array(
            'section'   => $values['section'],
            'label'     => $values['label'],
            'priority'  => $values['priority'],
            'type'      => 'select',
            'settings'  => $option,
            'choices'   => $values['choices'] ));}

    if ($values['type'] == 'range') { 
        
        // Range is cool and all but the accuracy sucks if you have more than 5 options, so lets just build arrays for a select type
        
        if (function_exists('semper_fi_add_customizer_array')) {
            
             $stepping = range($values['low'], $values['high'], (1 * ($values['step'])));}
        
        else {
        
            $stepping = range($values['low'], $values['high'], (2 * ($values['step'])));}

        $array_choices = array_combine($stepping, $stepping);

        $wp_customize->add_setting( $option, array(
            'default' => $values['standard'],
            'sanitize_callback' => 'esc_textarea'));

        $wp_customize->add_control( $option . '_control', array(
            'section'       => $values['section'],
            'label'         => $values['label'],
            'priority'      => $values['priority'],
            'type'          => 'select',
            'settings'      => $option,
            'choices'       => $array_choices));
    
        unset($array_choices);}

    if ($values['type'] == 'radio') {

        $wp_customize->add_setting( $option , array(
            'default' => $values['standard'],
            'sanitize_callback' => 'esc_textarea'));

        $wp_customize->add_control( $option , array(
            'section'       => $values['section'],
            'label'         => $values['label'],
            'priority'      => $values['priority'],
            'type'          => 'radio',
            'choices'       => $values['choices'] ));}

    if ($values['type'] == 'font') {

        $wp_customize->add_setting( $option, array(
            'default' => 'Default',
            'sanitize_callback' => 'esc_textarea'));

    	$wp_customize->add_control( $option . '_control', array(
            'section'   => 'font_style',
            'label'     => $values['label'],
            'type'      => 'select',
            'settings'  => $option,
            'choices'   => $google_font_array, ));}

    if ($values['type'] == 'img') {

        $wp_customize->add_setting( $option, array(
            'sanitize_callback' => 'esc_url_raw'));
 
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $option . '_control', array(
            'section'   => 'background_image',
            'label'     => $values['label'],
            'priority'  => $values['priority'],
            'settings'  => $option,)));}
    
    if ($values['type'] == 'url') {

        $wp_customize->add_setting( $option, array(
            'default' => $values['standard'],
            'sanitize_callback' => 'esc_url'));

        $wp_customize->add_control( $option . '_control', array(
            'type'          => 'url',
            'priority'      => $values[priority],
            'section'       => 'social_icons',
            'label'         => $values['label'],
            'settings'      => $option,
            'description'   => ''));}}
    
    if ($values['type'] == 'theme_docs') {
        
        $wp_customize->add_setting( $option, array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr'));

        $wp_customize->add_control( new Theme_Info( $wp_customize, $option . '_control', array(
            'section'       => $values['section'],
            'settings'      => $option,
            'priority'      => $values['priority'],)));}

} add_action('customize_register', 'semperfi_customize');


// Inject the Customizer CSS into the Header
function semperfi_add_customizer_css() {
    
    $semperfi_customizer_array_of_options_css = array(

        'titlefontstyle' => array(
            'default' => 'Default',
            'type' => 'font',
            'css' => '.header h1'),

        'taglinefontstyle' => array(
            'default' => 'Default',
            'type' => 'font',
            'css' => '.header h2'),
        
        'backgroundsize' => array(
            'default' => 'auto',
            'css'=> 'body {background-size:$ !important'),

        'fontcolor' => array(
            'default' => '#111111',
            'css' => 'body, .blog .content > div a p, .search .content > div a p, .post_title, .post_title a, aside a, em {color: $',
            'css2' => '.post_title, .comment-reply-title {border-bottom:1px solid $',
            'css3' => '.post_title, .comment-reply-title {border-top:2px solid $',
            'css4' => '.featured_image {border-bottom:1px solid $',
            'css5' => '.header-menu, .header-menu li > ul, .stars_and_bars, .navigation, .navigation:target h1, .navigation > li.menu-navigation-close, li.credits, #search-submit-menu, input {background: $',
            'css6' => 'textarea, #menu-search #s {border:1px solid $',
            'css7' => 'th, td {border-right:1px solid $',
            'css8' => 'td {border-top:1px solid $'),

        'titlecolor' => array(
            'default' => '#111111',
            'css' => '.header a h1 {color: $'),

        'taglinecolor' => array(
            'default' => '#111111',
            'css' => '.header a h2 {color: $'),

        'title_and_tagline_shadow_color' => array(
            'default' => '#ffffff',
            'css' => '.header {text-shadow:.025em .025em .05em $'),

        'navcolor' => array(
            'default' => '#dddddd',
            'css' => '.header-menu li a {color: $'),

        'navcolorhover' => array(
            'default' => '#dc1111',
            'css' => '.header-menu li a:hover {color: $'),

        'dropcolor' => array(
            'default' => '#dddddd',
            'css' => '.header-menu li li a {color: $'),

        'dropcolorhover' => array(
            'default' => '#dc1111',
            'css' => '.header-menu li li a:hover {color: $'),

        'linkcolor' => array(
            'default' => '#dc1111',
            'css' => 'a, aside a:hover, .navigation h1 i, .navigation .credits a {color: $'),

        'linkcolorhover' => array(
            'default' => '#555555',
            'css' => 'a:hover {color: $'),

        'link_text_shadow' => array(
            'default' => '',
            'css' => '.contents a {text-shadow:.05em .05em 0 $'),

        'header_background' => array(
            'default' => '',
            'css' => '.header {background:center center url("$"); background-size:cover; margin:.25em 0 .35em'),
        
        'backgroundsizeheader' => array(
            'default' => 'cover',
            'css'=> '.header {background-size:$'),
        
        'headerbackgroundposition' => array(
            'default' => 'center',
            'css'=> '.header {background-position:center $'),

        'backgroundpaper' => array(
            'default' => 'clean',
            'css' => '.content {background-image: url("' . get_template_directory_uri() . '/images/$.png")'),

        'tagline_display' => array(
            'default' => 'block',
            'css' => '.header a {display:$'),

        'blog_title' => array(
            'default' => 'normal',
            'css' => '.blog .post_title {height:3em;max-height:3em'),

        'content_bg' => array(
            'default' => '',
            'css' => '.content {background-image: url("$")'),

        'featured_image_display' => array(
            'default' => 'on',
            'css' => '.single .featured_image, .page .featured_image {display:none'),

        'navi_search' => array(
            'default' => 'on',
            'css' => '#menu-search {display:none'),

        'headerspacing' => array(
            'default' => '18',
            'css' => '.spacing {height:$em'),

        'title_size' => array(
            'default' => '1.0',
            'css' => '.header {font-size:$em'),

        'tagline_size' => array(
            'default' => '.9',
            'css' => '.header h2 {font-size:$em; line-height:1.1em'),

        'touch_title_size' => array(
            'default' => '2.5',
            'css' => '.navigation h1 {font-size:$em'),

        'touch_tagline_size' => array(
            'default' => '.4',
            'css' => '.navigation h1 i {font-size:$em; line-height:1.1em'),

        'header_min_size' => array(
            'default' => '0',
            'css' => '.header {padding:$em 0'),

        'header_height' => array(
            'default' => '0',
            'css' => '.header {height:$em'),

        'title_rotation' => array(
            'default' => '0',
            'css' => '.header h1 {-moz-transform:rotate($deg); transform:rotate($deg)'),

        'tagline_rotation' => array(
            'default' => '0',
            'css' => '.header h2 {-moz-transform:rotate($deg); transform:rotate($deg)'),

        'tagline_up_down' => array(
            'default' => '0',
            'css' => '.header h2 {margin-top:$em;'),

        'tagline_right_left' => array(
            'default' => '0',
            'css' => '.header h2 {margin-left:$em;'),

        'menu_drop_down' => array(
            'default' => '2.4',
            'css' => '.header-menu li > ul {top:$em;'),

        /* Doesn't work at the moment
        'fontsizeadjust' => array(
            'default' => '100',
            'css' => 'body {font:normal $% ),*/ );
    
    
    if (function_exists('semper_fi_add_customizer_css')) {
    
    // Define to not get errors
    $semper_fi_plugin_add_to_css = array();
    
    //add_action('admin_enqueue_scripts', 'semper_fi_add_customizer_array');
    do_action( 'hook_semper_fi_plugin_customizer_css' );
    
    // Here I'm pushing more features into the array to add more features to the customizer
    $semperfi_customizer_array_of_options_css = array_merge($semperfi_customizer_array_of_options_css, semper_fi_add_customizer_css( $semper_fi_plugin_add_to_css ));}
    

    // Link in the Google Fonts for the Custom CSS
    //echo '<!-- Semper Fi Custom Font Styles -->' . "\n";
    $semperfi_customizer_css = '<!--  Semper Fi Custom Font Styles -->' . "\n";
    
    // Array for Duplicate font checking
    $check_for_duplicate_fonts = array('Default');

    foreach( $semperfi_customizer_array_of_options_css as $option => $values) {
        if (array_key_exists('type', $values)) {
            
            // Print the link to the google font
            if ((get_theme_mod($option) != '') && (get_theme_mod($option) != 'Default') && (!in_array(get_theme_mod($option), $check_for_duplicate_fonts))) {

                //echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod($option) . "' rel='stylesheet' type='text/css'>"  . "\n";
                $semperfi_customizer_css .= "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod($option) . "' rel='stylesheet' type='text/css'>"  . "\n";
                
                // Add to Array and Stop future duplicate fonts
                array_push($check_for_duplicate_fonts, get_theme_mod($option));}}}


    // Actual part that creates the CSS
    //echo '<!-- Custom CSS Styles -->' . "\n";
    $semperfi_customizer_css .= '<!-- Custom CSS Styles -->' . "\n";
    //echo '<style type="text/css" media="screen">' . "\n";
    $semperfi_customizer_css .= '<style type="text/css" media="screen">' . "\n";
    
    if (is_page() || is_single()) $featured_background = get_post_meta( get_queried_object_ID(), 'featured-background', true );
        if (!empty($featured_background)) { //echo 'body, body.custom-background {background-image:url(' . $featured_background . '); background-size:cover;}' . "\n";
        $semperfi_customizer_css .= 'body, body.custom-background {background-image:url(' . $featured_background . '); background-size:cover;}' . "\n";}

    foreach( $semperfi_customizer_array_of_options_css as $option => $values) {

        if ((get_theme_mod($option) != '') && (get_theme_mod($option) != $values['default'])) {

            if (array_key_exists('type', $values)) {

                $edit_font_name = preg_replace('/[^a-zA-Z0-9]+/', ' ', get_theme_mod($option));

                //echo $values['css'] . " {font-family: '" . $edit_font_name . "';}" . "\n";
                
                $semperfi_customizer_css .= $values['css'] . " {font-family: '" . $edit_font_name . "';}" . "\n";}

            else {

                foreach (array_slice($values, 1) as $key => $css) {

                    $css = str_replace("$", get_theme_mod($option), $css);
                    
                    $css = str_replace("@", abs(get_theme_mod($option)), $css);

                    //echo $css . ";}\n";
                    
                    $semperfi_customizer_css .= $css . ";}\n";}}}}

    //echo '</style>' . "\n";
    $semperfi_customizer_css .= '</style>' . "\n";
    //echo '<!-- End Theme Customizer -->' . "\n";
    $semperfi_customizer_css .= '<!-- End Theme Customizer -->' . "\n";
    //echo "\n";
    $semperfi_customizer_css .= "\n";
    
    // Display the result of the string
    echo $semperfi_customizer_css;
    
    // Temporary save location
    set_theme_mod ('semperfi_temporary_customizer_updated', $semperfi_customizer_css);

} add_action('hook_semperfi_generate_customizer_options', 'semperfi_add_customizer_css', 20);


// Let's Compress all the data on a simple set_theme_mod and only update on page refresh in customizer. The point is to effetively reduce CPU load on the server.
add_action('wp_head', 'semperfi_echo_theme_mod_css', 1);
function semperfi_echo_theme_mod_css() {
    
    // Lets not generate the Customizer if it has already ran
    if (get_theme_mod('semperfi_customizer_updated')) {

        // Echo all the setting with all the CSS Data
        echo get_theme_mod('semperfi_customizer_css');}

    // What if we just made some chance in customizer and saved
    elseif (!is_customize_preview()) {

        // Generate the new code
        do_action('hook_semperfi_generate_customizer_options');

        // Set the two as the same
        set_theme_mod('semperfi_customizer_css', get_theme_mod('semperfi_temporary_customizer_updated'));

        // Make is so we don't run the code again
        set_theme_mod('semperfi_customizer_updated', true);}

    // for everything else let us just take it the hard way
    else {

        // Here check if the function exits, otherwise we're wasting time
        if (function_exists('semperfi_add_customizer_css')) {

            // Function 'semper_fi_generate_customizer_css' exist, add the hook in.
            do_action('hook_semperfi_generate_customizer_options');
            
            // Echo all the setting with all the CSS Data
            echo get_theme_mod('semperfi_temporary_customizer_updated');}}}


// Customizer options change lets reflect that in the customizer
add_action('customize_preview_init','semperfi_new_customizer_options');
function semperfi_new_customizer_options(){

    set_theme_mod('semperfi_customizer_updated', false);}


//	A safe way of adding scripts to WordPress
if (!function_exists('semperfi_scripts')) {
	function semperfi_scripts() {
        wp_enqueue_style('semperfi-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' ); }}

if (!is_admin()) add_action('wp_enqueue_scripts', 'semperfi_scripts', 21);

// Add some CSS so I can Style the Theme Options Page
function semperfi_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('semperfi-theme-options', get_template_directory_uri() . '/theme-options.css', false, '1.0');}

add_action('admin_print_styles-appearance_page_theme_options', 'semperfi_admin_enqueue_scripts');

// Create the Theme Information page (Theme Options)
function semperfi_theme_options_do_page() { ?>

<div class="theme-wrap clear">
    
    <div class="theme-about hentry">
    
        <div>

            <h3 class="theme-name entry-title"><?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' ); ?></h3>

            <h4 class="theme-author">By 
                <a href="https://wordpress.org/themes/author/<?php echo $my_theme->get('Author'); ?>/" target="_blank">
                    <span class="author"><?php echo $my_theme->get('Author'); ?></span>
                </a>
            </h4>

        </div>

        <div class="theme-info">

            <div class="screenshot">

                <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="">

            </div>
            
            <div class="upgrade-summary">
                
                <h4>Upgrade:</h4>
                
                <p>All of the theme's on <a href="https://wordpress.org/themes/" target="_blank">WordPress.org</a> are created, developed, and maintained free of charge by the author. The author of this theme, <i><?php echo $my_theme->get( 'Author' ); ?></i>, offers a premium version that includes additional features to enhance your experience. This premium version of <?php echo $my_theme->get( 'Name' ); ?> supports the author by offsetting the many hours of work being put into the theme. For incentive, the premium version of <?php echo $my_theme->get( 'Name' ); ?> includes additional features to customize the theme with. Many of these options, list of these options are just below, are not available in the free version. Additionally, the author has offered to make minor custom changes to the <?php echo $my_theme->get( 'Name' ); ?> code for further customization. However, the author is still going to support the free versions when issues of bugs or errors in the code are found.</p>
                
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-secondary alignright"  style="margin-bottom:1em;" target="_blank">Upgrade</a>
                
            </div>
            
            <div class="upgrade-summary clear" style="display:none;">
                
                <h4>Premium Options:</h4>
                
                <table>
                    <tr>
                        <th>Upgraded Premium Features</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Double every numerical choice for every Customizer option.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Change <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements" target="_blank">Header</a> to any <a href="https://www.google.com/fonts" target="_blank">Google Font</a></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Change <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/p" target="_blank">Body</a> to any <a href="https://www.google.com/fonts" target="_blank">Google Font</a></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Increase slider maxium count to 10</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Replace the content background with uploaded image.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Control <?php echo $my_theme->get( 'Name' ); ?>'s main color through out the website.</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Support with minor changes to <?php echo $my_theme->get( 'Name' ); ?>'s code.</td>
                        <td>&#10004;</td>
                    </tr>
                </table>
                
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-secondary alignright"  style="margin-bottom:3.33em;" target="_blank">Upgrade</a>
                
            </div>
            
            <div class="theme-description entry-summary clear">
                
                <h4>Description:</h4>
                
                <p><?php echo $my_theme->get('Description'); ?></p>
            
            </div>
            
            <div class="theme-tags">
                
                <h4>Tags:</h4>
                
                <p>
                    <?php
                        
                        $tags_array = $my_theme->get('Tags');
                        
                        $result = count($tags_array) - 1;
                                           
                        $count = 0;
                        
                        foreach ($tags_array as $tag) {
                            
                            $count = $count + 1;
                            
                            if ($count <= $result)
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . $tag . '" target="_blank">' . ucwords(str_replace("-", " ", $tag)) . '</a>, ';
                        
                            else
                            
                                echo '<a href="https://wordpress.org/themes/tags/' . $tag . '" target="_blank">' . ucwords(str_replace("-", " ", $tag)) . '</a>';} ?>
                    
                </p>
                    
            </div>

        </div>
        
        <div class="theme-head">
            
            <div class="theme-actions clear">
                
                
                <a href="http://schwarttzy.com/contact-me/" class="button button-secondary alignleft">Email</a>
				
                <a href="<?php echo $my_theme->get('ThemeURI'); ?>" class="button button-primary alignright" target="_blank">Upgrade</a>
				
            </div>

            <div class="theme-meta-info">
                
                <p>Version: <strong><?php echo $my_theme->get('Version');  ?></strong></p>
                
                <p>
                    
                    <strong>
					
				        <a href="<?php echo $my_theme->get('ThemeURI'); ?>" target="_blank">Theme Homepage &#8594;</a>
					
				    </strong>
                    
                </p>
            
            </div>
            
        </div>
            
            
				<div class="theme-meta">
                    
                    <div class="theme-rating">
                    
                        <h4>Rate the Theme</h4>
                        
                        <p>Help improve the WordPress community by rating <?php echo $my_theme->get('Name'); ?>. Rating a theme helps the community out by flitering the best WordPress Themes to the top. Visit <?php echo $my_theme->get('Name'); ?>'s Reviews page and take just a couple minutes to help improve the WordPress comunity for all of us.</p>
                        
                            <a href="https://wordpress.org/support/view/theme-reviews/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>#postform" class="button button-secondary" target="_blank">Add Your Review</a>

                    </div><!-- .theme-rating -->

                    <div class="theme-support">
                        <h4>Support</h4>
                        <p>Contact the author, <i><?php echo $my_theme->get('Author');  ?></i>, by email for support with their theme, <i><?php echo $my_theme->get( 'Name' ); ?></i>, using this contact page.</p>
                        <a href="http://schwarttzy.com/contact-me/" class="button button-secondary" target="_blank">Email</a>
                        <p>Got something to say? Need help? View the offical support forum for <?php echo $my_theme->get( 'Name' ); ?> on WordPress.org <div class="just-for-fun">somethings fucky<div class="ace"></div></div></p>
                        <a href="https://wordpress.org/support/theme/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>" class="button button-secondary" target="_blank">View support forum</a>
                    </div><!-- .theme-support -->

                    <div class="theme-translations">
                        <h4>Translations</h4>
                            <a href="https://translate.wordpress.org/projects/wp-themes/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>" target="_blank">
                                Translate <?php echo $my_theme->get( 'Name' ); ?>
                            </a>
                    </div><!-- .theme-translations -->

                    <div class="theme-devs">
                        <h4>Development</h4>
                        <h5>Subscribe</h5>
                        <ul class="unmarked-list">
                            <li>
                                <a href="//themes.trac.wordpress.org/log/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>?limit=100&amp;mode=stop_on_copy&amp;format=rss" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/feedicon.png">
                                    Development Log
                                </a>
                            </li>
                        </ul>

                        <h5>Browse the Code</h5>
                        <ul class="unmarked-list">
                            <li><a href="//themes.trac.wordpress.org/log/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/"  target="_blank">Development Log</a></li>
                            <li class="holy-cannoli"><a href="https://www.youtube.com/watch?v=WeTIa69NbVk" target="_blank">Aeronautical Jump</a><div class="chris-farley"></div></li>
                            <li><a href="//themes.svn.wordpress.org/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/"  target="_blank">Subversion Repository</a></li>
                            <li><a href="//themes.trac.wordpress.org/browser/<?php echo strtolower(str_replace(' ', '-', $my_theme->get('Name'))); ?>/" target="_blank">Browse in Trac</a></li>
                        </ul>
                    </div><!-- .theme-devs -->

        
        </div>
        
    </div>

</div>

<?php }
add_action('admin_menu', 'semperfi_theme_options_add_page'); ?>