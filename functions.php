<?php
/**
 * i-transform functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage i-transform
 * @since i-transform 1.0
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see itransform_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Add support for a custom header image.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * i-transform only works in WordPress 3.6 or later.
 */

/**
 * i-transform setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * i-transform supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.  
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_setup() {
	/*
	 * Makes i-transform available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on i-transform, use a find and
	 * replace to change 'itransform' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'itransform', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', itransform_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'itransform' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	/*
	 * additional Image sizes.
	 */
	add_image_size( 'category-thumb', 300, 300, true ); //300 pixels wide (and unlimited height)
	add_image_size( 'homepage-thumb', 220, 220, true ); //(cropped)	

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'itransform_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since i-transform 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function itransform_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	 //fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700|Roboto:400,400italic,500italic,700italic'
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'itransform' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$roboto = _x( 'on', 'Roboto font: on or off', 'itransform' );

	if ( 'off' !== $open_sans || 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $open_sans )
			$font_families[] = 'Open Sans:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $roboto )
			$font_families[] = 'Roboto:300,400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	
	// Loads JavaScript file with functionality specific to i-transform.
	wp_enqueue_script( 'modernizer-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for scroll related functions and animations.
	wp_enqueue_script( 'itransform-waypoint', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2014-01-13', true );
	
	// Loads JavaScript file for small screen side menu.
	wp_enqueue_script( 'itransform-sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), '2014-01-13', true );	
	
	// Loads JavaScript file with functionality specific to i-transform.
	wp_enqueue_script( 'itransform-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );
	
	$color_scheme = of_get_option('itrans_color_scheme','red');

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'itransform-fonts', itransform_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );
	
	// Add Animate stle, used used for css animations.
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '2014-01-12' );
	
	// Add Animate stle, used used for side menu.
	wp_enqueue_style( 'side-menu', get_template_directory_uri() . '/css/jquery.sidr.dark.css', array(), '2014-01-12' );	
	
	// Add Animate stle, used used for banner slider.
	wp_enqueue_style( 'itrans-slider', get_template_directory_uri() . '/css/itrans-slider.css', array(), '2014-01-12' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'itransform-style', get_stylesheet_uri(), array(), '2013-07-18' );
	
	// color scheme files
	wp_enqueue_style( 'itrans-color-scheme', get_template_directory_uri() . '/css/color_scheme/'.$color_scheme.'.css', array(), '2014-01-12' );	

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'itransform-ie', get_template_directory_uri() . '/css/ie.css', array( 'itransform-style' ), '2013-07-18' );
	wp_style_add_data( 'itransform-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'itransform_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since i-transform 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function itransform_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'itransform' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'itransform_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'itransform' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'itransform' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Main Sidebar Widget Area', 'itransform' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'itransform' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
}
add_action( 'widgets_init', 'itransform_widgets_init' );

if ( ! function_exists( 'itransform_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_paging_nav() {
	
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
    <?php
		$big = 999999999; // need an unlikely integer
		$args = array(
			'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type' => 'list',
			'prev_text' => '<span class="text">&laquo; ' . __( 'Previous', 'itransform' ) . '</span>',
			'next_text' => '<span class="text">' . __( 'Next', 'itransform' ) . ' &raquo;</span>'					
		);
	?>				    
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'itransform' ); ?></h1>
		<div class="nav-links">
            <div id="posts-nav" class="navigation">
				<?php echo paginate_links( $args ); ?>
            </div><!-- #posts-nav -->
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'itransform_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since i-transform 1.0
*
* @return void
*/
function itransform_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'itransform' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'itransform' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'itransform' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'itransform_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own itransform_entry_meta() to override in a child theme.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'itransform' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		itransform_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'itransform' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'itransform' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'itransform' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'itransform_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own itransform_entry_date() to override in a child theme.
 *
 * @since i-transform 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function itransform_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'itransform' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'itransform' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'itransform_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since i-transform 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'itransform_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since i-transform 1.0
 *
 * @return string The Link format URL.
 */
function itransform_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since i-transform 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function itransform_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'itransform_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
function itransform_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'itransform_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since i-transform 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function itransform_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'itransform_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since i-transform 1.0
 *
 * @return void
 */
 

function itransform_customize_preview_js() {
	wp_enqueue_script( 'itransform-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'itransform_customize_preview_js' );

/*-----------------------------------------------------------------------------------*/
/*	Custom Functions
/*-----------------------------------------------------------------------------------*/ 

include get_template_directory() . '/inc/custom_functions.php';


/*-----------------------------------------------------------------------------------*/
/*	changing default Excerpt length 
/*-----------------------------------------------------------------------------------*/ 

function itransform_excerpt_length($length) {
	return 24;
}
add_filter('excerpt_length', 'itransform_excerpt_length');


/*-----------------------------------------------------------------------------------*/
/*	changing changing default read more text 
/*-----------------------------------------------------------------------------------*/ 
function itransform_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">'. __( 'Read More...', 'itransform' ). '</a>';
}
add_filter('excerpt_more', 'itransform_excerpt_more');



/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

?>
