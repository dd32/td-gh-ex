<?php
/**
 * @package WordPress
 * @subpackage Adventure_Journal
 */

//define('WP_DEBUG', true);

//Adds the code into the footer
add_action( 'wp_footer', 'ctx_attribution');
// Remove message about IP blocking
add_filter('login_errors', 'ctx_aj_login_error_mess');
//Run initial setup for the theme
add_action( 'after_setup_theme', 'ctx_aj_setup');

// Hook for adding admin menus
add_action('admin_menu', 'ctx_aj_theme_add_pages');
//Custom "Read more" text
add_filter('excerpt_more', 'ctx_aj_auto_excerpt_more');
add_filter('get_the_excerpt', 'ctx_aj_custom_excerpt_more');
//Add help to the Layout page
add_action('admin_head-appearance_page_theme-options','ctx_aj_help_theme_options');

/************************************************************************************************
 * Add this theme's scripts and stylesheets
 ************************************************************************************************/
//Get the URL of the active theme directory
$themeDir = get_bloginfo('template_directory');

//Add these files to the core website but NOT the Admin Section
if(!is_admin()) {
    wp_enqueue_style('theme', $themeDir.'/style.css','','');
}

//If we don't have a content width specified, assume this as default
if ( ! isset( $content_width ) ){
    $content_width = 665;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override ctx_adventurejournal_setup() in a child theme, add your own ctx_adventurejournal_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Advenure Journal 1.0
 */
function ctx_aj_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'adventurejournal', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in 2 locations.
	register_nav_menus( array(
            'primary-menu' => __( 'Primary Menu', 'adventurejournal' ),
            'footer-menu' => __( 'Footer Menu', 'adventurejournal' )
	) );

	// This theme allows users to set a custom background
	add_custom_background();

        define( 'HEADER_TEXTCOLOR', '' );
        // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
        define( 'HEADER_IMAGE', '%s/images/headers/ctx-header-egypt.jpg' );

        // The height and width of your custom header. You can hook into the theme's own filters to change these values.
        // Add a filter to adventurejournal_header_image_width and adventurejournal_header_image_height to change these values.
        define( 'HEADER_IMAGE_WIDTH', apply_filters( 'adventurejournal_header_image_width', 920 ) );
        define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'adventurejournal_header_image_height', 360 ) );

        // We'll be using post thumbnails for custom header images on posts and pages.
        // We want them to be 920 pixels wide by 180 pixels tall.
        // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
        set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT/2, true );

        // Don't support text inside the header image.
        define( 'NO_HEADER_TEXT', true );

        // This theme allows users to set a custom image header
        add_custom_image_header('', 'ctx_aj_admin_header_style');

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
            'egypt' => array(
                    'url' => '%s/images/headers/ctx-header-egypt.jpg',
                    'thumbnail_url' => '%s/images/headers/ctx-header-egypt-thumbnail.jpg',
                    /* translators: header image description */
                    'description' => __( 'Egypt', 'adventurejournal' )
            ),
            'cart' => array(
                    'url' => '%s/images/headers/ctx-header-cart.jpg',
                    'thumbnail_url' => '%s/images/headers/ctx-header-cart-thumbnail.jpg',
                    /* translators: header image description */
                    'description' => __( 'Cart', 'adventurejournal' )
            ),
            'flower' => array(
                    'url' => '%s/images/headers/ctx-header-flower.jpg',
                    'thumbnail_url' => '%s/images/headers/ctx-header-flower-thumbnail.jpg',
                    /* translators: header image description */
                    'description' => __( 'Flower', 'adventurejournal' )
            ),
            'hut' => array(
                    'url' => '%s/images/headers/ctx-header-hut.jpg',
                    'thumbnail_url' => '%s/images/headers/ctx-header-hut-thumbnail.jpg',
                    /* translators: header image description */
                    'description' => __( 'Hut', 'adventurejournal' )
            )
	));

        //Choose which sidebars the user can add widgets to
        if ( function_exists('register_sidebar') ){
            //Page Sidebar
            register_sidebar(array(
                'name'=>'Page Sidebar',
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget' => '</li>',
                'before_title' => '<h3></h3>',
                'after_title' => '<h3></h3>',
            ));
            //Blog Sidebar
            register_sidebar(array(
                'name'=>'Blog Sidebar',
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget' => '</li>',
                'before_title' => '<h3></h3>',
                'after_title' => '<h3></h3>',
            ));
        }

        //Create the default theme options
        ctx_aj_set_options();

}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in ctx_adventurejournal_setup().
 *
 * @since Adventure Journal 1.0
 */
function ctx_aj_admin_header_style() {
    ?>
    <style type="text/css">
        #headimg {}
        /* If NO_HEADER_TEXT is false, you would style the text with these selectors:
                #headimg #name { }
                #headimg #desc { }
        */
    </style>
    <?php
}

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @return string "Continue Reading" link
 */
function ctx_aj_continue_reading_link() {
	return ' <a class="read-excerpt" href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'adventurejournal' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and adventuretheme_continue_reading_link().
 * 
 * @param <type> $more
 * @return <type>
 */
function ctx_aj_auto_excerpt_more( $more ) {
	return ' &hellip' . ctx_aj_continue_reading_link();
}

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function ctx_aj_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ctx_aj_continue_reading_link();
	}
	return $output;
}

/**
 * Handles creating or updating the options array for the theme
 *
 * @param array $array_overrides An associative array containing key=>value pairs to override originals
 * @return string
 */
function ctx_aj_set_options($arrayOverrides=false){

    //Set defaults
    $defaultOpts = array(
        "layout"=>"col-2-left"
    );

    //Let's see if the options already exist...
    $dbOpts = get_option('ctx-adventurejournal-options');

    if(!$dbOpts){
        //There's no options! Let's build them...
        if($arrayOverrides!=false && is_array($arrayOverrides)){
            //If we have some custom settings, use those
            $defaultOpts = array_merge($defaultOpts, $arrayOverrides);
        }
        //Now add them to the db
        return add_option('ctx-adventurejournal-options',$defaultOpts);
    }else{
        //db options exist, so let's merge it with the defaults (just to be sure we have all the latest options
        $defaultOpts = array_merge($defaultOpts, $dbOpts);
        //Now let's add our custom settings (if appropriate)
        if($arrayOverrides!=false && is_array($arrayOverrides)){
            //If we have some custom settings, use those
            $defaultOpts = array_merge($defaultOpts, $arrayOverrides);
        }
        return update_option('ctx-adventurejournal-options',$defaultOpts);
    }

}


/**
 * This snippet creates an ID and a series of classes for the body tag based on the nested URL structure which recreates the
 * sites child parent relationships. This allows you to control elements via CSS on a per page and per section basis
 *
 * @param int $postID The id of the post get relationships for
 * @return string Returns a string containing html attributes for the body tag
 */
function ctx_aj_get_relationships($postID=''){
    // Remove any leading and trailing slashes.
    $uri_path = trim($_SERVER['REQUEST_URI'], '/');
    // Split up the remaining URI into an array, using '/' as delimiter.
    $uri_parts = explode('/', $uri_path);

    // If this is the homepage, set ID and class accordingly
    if ($uri_parts[0] == '') {
        $ancestor = 'homepage';
        $body_class = 'index';
    } else {
        // Construct the class name from the first part of the URI only.
        $body_class = str_replace('/',' page-', $uri_path);

        //Generates an array of this pages parents based on the variable passed in the function
        $myAncestors = get_post_ancestors($postID);
        //Grab the top most parent's ID out of the array
        $ancestor = $myAncestors[count($myAncestors)-1];
        //If the current page IS a top level parent then grab it's own ID since it would otherwise be blank
        if($ancestor == ""){$ancestor = $postID;}

    }
    //Prefix body classes with "page-"
    $body_class = 'page-'.$body_class;

    //Generate the ID and Class tags
    return 'id="ancestor-'.$ancestor.'" class="'.$body_class.'"';
}


/************************************************************************************************
 * This snippet displays a link in the wp_footer section with a link back back to the theme's creator
 ************************************************************************************************/
function ctx_attribution() {
    echo ('<div id="attrition"><a href="http://www.contextureintl.com">Proudly Designed By Contexture International</a></div>');
}


/**
 * Determines the html layout/order and components of the comments section. This function is called by
 * wp_list_comments() located in comments.php. Without this function Wordpress would use the default layout
 * and components. This function allows you to customize everything comments related
 *
 * @param <type> $comment
 * @param <type> $args
 * @param <type> $depth
 */
function ctx_aj_get_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <div class="comment-meta">
            <?php echo get_avatar( $comment, 64 ); ?>
            <span class="comment-date"><a href="#comment-<?php comment_ID() ?>" title="Permanent Link"><?php comment_date() ?></a></span><br />
        </div>
        <div class="comment-body">
            <?php edit_comment_link(__("Edit"), ''); ?>
            <strong><?php comment_author_link(); ?></strong>
            <?php comment_text() ?>
            <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'sandbox') ?>
        </div>
	</li>
<?php
}

/**
 * Changes the error message that occurs during a bad login attempt to something generic that
 * doesn't reveal whether it was the username or password that was bad
 */
function ctx_aj_login_error_mess() {
    return 'ERROR: Invalid username or password.';
}


//Add these files to the Admin Section only
if(is_admin()) {
    wp_enqueue_style('theme', $themeDir.'/admin/admin-style.css','',''); //Admin section stylesheet
}


/************************************************************************************************
Sets the default layout for the site based on the option set in the admin menu
************************************************************************************************/
function ctx_aj_getlayout(){
    //Get the current layout from the database
    $layout = get_option('ctx-adventurejournal-options');

    //Make sure that the current option isn't blank and if it is reset it to the default layout
    if($layout['layout'] == ''){
        $layout['layout'] = 'col-2-left';
    }

    //Return the layout as an ID
    //The CSS and style information for the layout can be found in style.css under the Layout section
    echo ' id="',$layout['layout'],'"';
}


/**
 * Determines which sidebars need to be generated based on the layout option set in the admin section
 * then send the results to ctx_aj_build_sidebar() which actually generates the html
 */
function ctx_aj_generate_sidebars(){
    //Get the selected layout option
    $layout = get_option('ctx-adventurejournal-options');

    if($layout['layout'] == 'col-1'){
        //Do nothing - no sidebar support
    }
    else if(($layout['layout'] == "col-2-left")||($layout['layout'] == "col-2-right")){

        //Check if the current page is a non blog related page
        if (is_page()){
            //If so then generate the normal website sidebar
            ctx_aj_build_sidebar('col-left','Page Sidebar');
        } else  {
            //If this is a blog or blog related page then generate the blog sidebar
            ctx_aj_build_sidebar('col-left','Blog Sidebar');
        }
        
    }
}


/**
 * Creates and populates the sidebars based on the layout option set in the admin section
 */
function ctx_aj_build_sidebar($sidebar_html, $sidebar_name){
    echo sprintf('<div id="%s" class="sidebar"><ul>',$sidebar_html);
    $generic_sidebar = (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_name) ) ? true : false;
    echo '</ul></div>';
}


/**
 * Add's "Layout" option to the theme-options/Appearance nav menu
 */
function ctx_aj_theme_add_pages() {
    // Add a new submenu under Appearance:
    add_theme_page('Layout', 'Layout', 'administrator', 'theme-options', 'ctx_aj_options_appearance_layout');
}


/**
 * Shows "choose layout" page in Appearance Meny
 */
function ctx_aj_options_appearance_layout() {
    require_once 'admin/appearance-layout.php';
}

/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function ctx_aj_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'adventuretheme' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'adventuretheme' ), get_the_author() ),
			get_the_author()
		)
	);
}

/**
 *
 */
function ctx_aj_help_theme_options(){
    //Add contextual help to this page
    add_contextual_help( 'appearance_page_theme-options', __('<p>Adventure Journal supports different page layouts without any additional coding. Simply select the layout you want to use on your site and click Save Changes.') );
}

?>