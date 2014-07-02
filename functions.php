<?php
/**
 * Aperture functions and definitions
 *
 * @package Aperture
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 712; /* pixels */
}
 
/**
 * Set the content width for the fullwidth page template and the portfolio type template.
 */
function aperture_adjust_content_width() {
    global $content_width;
    $pagesize = get_theme_mod( 'aperture_portfolio_pagesize' );
 
    if ( is_page_template( 'page-fullwidth.php' ) || ( is_tax ( 'jetpack-portfolio-type' ) && ( $pagesize == 'fullwidth' ) ) || ( is_singular( 'jetpack-portfolio' )  && ( $pagesize == 'fullwidth' ) ) )
        $content_width = 960;
}
add_action( 'template_redirect', 'aperture_adjust_content_width' );

if ( ! function_exists( 'aperture_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aperture_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aperture, use a find and replace
	 * to change 'aperture' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aperture', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 662, 9999, false );
	add_image_size( 'aperture-full-width', 910, 9999, false );
	add_image_size( 'aperture-image-post-format', 712, 9999, false );
	add_image_size( 'aperture-portfolio-item', 445, 300, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aperture' ),
		'secondary' => __( 'Secondary Menu', 'aperture' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'status', 'image', 'gallery', 'video', 'audio', 'quote', 'chat', 'link', 
	) );

	// Enable support for the Portfolio CPT.
	add_theme_support( 'jetpack-portfolio' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aperture_custom_background_args', array(
		'default-color' => '000000',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // aperture_setup
add_action( 'after_setup_theme', 'aperture_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function aperture_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'aperture' ),
		'id'            => 'right-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget widget-sidebar %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'aperture' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'After Post', 'aperture' ),
		'id'            => 'after-post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget widget-after-post %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'aperture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aperture_scripts() {
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.0.3' );

	wp_enqueue_style( 'aperture-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald:400,700');

	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array( 'jquery' ), '1.2.1', true );

	wp_enqueue_script( 'aperture-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_page_template( 'page-slider.php' ) ) {

		wp_enqueue_script( 'hammer', get_template_directory_uri() . '/js/hammer.min.js', array( 'jquery' ), '1.0.5', true );

		wp_enqueue_script( 'jquery-super-slides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array( 'jquery' ), '0.6.2', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aperture_scripts' );

/**
 * Custom editor styles.
 */
function aperture_add_editor_styles() {
    add_editor_style( 'aperture-editor-style.css' );
    $font_url = 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald:400,700';
    add_editor_style( str_replace( ',', '%2C', $font_url ) );
}
add_action( 'init', 'aperture_add_editor_styles' );

/**
 * Remove the Jetpack share and like buttons.
 * @link http://jetpack.me/2013/06/10/moving-sharing-icons/
 */
if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'sharedaddy' ) ) {
	function aperture_remove_share() {
	    remove_filter( 'the_content', 'sharing_display',19 );
	    remove_filter( 'the_excerpt', 'sharing_display',19 );
	    if ( class_exists( 'Jetpack_Likes' ) ) {
	        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	    }
	}
	add_action( 'loop_start', 'aperture_remove_share' );
}

/**
 * Remove the Jetpack related posts.
 * @link http://wordpress.org/support/topic/change-location-of-related-posts
 */
if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'related-posts' ) ) {
	function remove_jprp(){
		$jprp = Jetpack_RelatedPosts::init();
		remove_filter( 'the_content', array( $jprp, 'filter_add_target_to_dom' ), 40 );
	}
	add_action('wp', 'remove_jprp', 11);
}

/**
 * Removes the custom background on the page-slider template.
 * @link http://www.transformationpowertools.com/wordpress/twenty-eleven-new-page-template-with-sidebar-correction
 */
function aperture_remove_custom_background($wp_classes, $extra_classes) { 
	if( is_page_template( 'page-slider.php' ) ) :
	// Filter the body classes     
	 
	    foreach($wp_classes as $key => $value) {
	    if ($value == 'custom-background' ) unset($wp_classes[$key]);
	    }
	 
	endif;
// Add the extra classes back untouched
return array_merge($wp_classes, (array) $extra_classes );
}
add_filter( 'body_class', 'aperture_remove_custom_background', 20, 2 );

/**
 * Adds a single image background on the page-slider template.
 * This function is only used when the user has one image in the slider.
 * It places the neccesary style in the <head> to prevent FOUC.
 */
function aperture_single_slide_background_css() {
	$slider = get_theme_mod( 'aperture_slider_image'); 
    if ( false != $slider ) $slider = array_filter( $slider );
    if ( false == $slider ) return false;

	$numberofslides = count( $slider );
	$imageurl = array_shift( $slider );

	if ( 1 == $numberofslides ) : ?>
		<style type="text/css" id="single-slide-background-css">
			body.page-template-page-slider-php {
				background-color: #000000;
				background-image: url('<?php echo esc_url( $imageurl ); ?>');
				background-repeat:no-repeat;
				background-attachment:fixed;
				background-position:center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
		</style>
	<?php endif;
}
add_action('wp_head', 'aperture_single_slide_background_css');

/**
 * Adds style for fullscreen background image when selected in the customizer.
 */
function aperture_optional_background_size_css() {
	$backgroundsize = get_theme_mod( 'aperture_background_size'); 

	if ( $backgroundsize == 'fullscreen' ) : ?>
		<style type="text/css" id="fullscreen-background-css">
			body.custom-background {
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
		</style>
	<?php endif;
}
add_action('wp_head', 'aperture_optional_background_size_css');

/**
 * The attachment for the image template.
 * Borrowed from TwentyFourteen.
 */
if ( ! function_exists( 'aperture_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 */
function aperture_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Aperture atachment size.
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */

	$attachment_size     = apply_filters( 'aperture_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

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
		'orderby'        => 'menu_order ID',
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
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Remove post-type support for portfolio items.
 */
function aperture_remove_post_type_support() {
    remove_post_type_support( 'jetpack-portfolio', 'post-formats' );
}
add_action( 'init', 'aperture_remove_post_type_support', 10 );

/**
 * Add a link and an infinity symbol to the aside post format.
 * @link http://justintadlock.com/archives/2012/09/06/post-formats-aside
 */
function aperture_aside_format( $content ) {
	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a id="aside-infinity" class="infinity-link" href="' . get_permalink() . '">&#8734;</a>';

	return $content;
}
add_filter( 'the_content', 'aperture_aside_format', 9 ); // run before wpautop

/**
 * Add a link and an infinity symbol to the status post format.
 */
function aperture_status_format( $content ) {
	if ( has_post_format( 'status' ) && !is_singular() )
		$content .= ' <a id="status-infinity" class="infinity-link" href="' . get_permalink() . '">&#8734;</a>';

	return $content;
}
add_filter( 'the_content', 'aperture_status_format', 9 ); // run before wpautop

/**
 * And finally the Chat Post Format.
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 */
/* Filter the content of chat posts. */
add_filter( 'the_content', 'aperture_format_chat_content' );

/* Auto-add paragraphs to the chat text. */
add_filter( 'aperture_post_format_chat_text', 'wpautop' );

/**
 * This function filters the post content when viewing a post with the "chat" post format.  It formats the 
 * content with structured HTML markup to make it easy for theme developers to style chat posts.  The 
 * advantage of this solution is that it allows for more than two speakers (like most solutions).  You can 
 * have 100s of speakers in your chat post, each with their own, unique classes for styling.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $content The content of the post.
 * @return string $chat_output The formatted content of the post.
 */
function aperture_format_chat_content( $content ) {
	global $_post_format_chat_ids;

	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters( 'aperture_post_format_chat_separator', ':' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = aperture_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'aperture_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'aperture_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* If there is no speaker_id leave this alone. */
				if ( !empty( $speaker_id ) ) { 
					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
				} else {
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row">';
				}

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* If there is no chat author leave this alone. */
				if ( !empty( $chat_author ) ) { 

					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'aperture_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';
				}

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'aperture_post_format_chat_content', $chat_output );
}

/**
 * This function returns an ID based on the provided chat author name.  It keeps these IDs in a global 
 * array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
 * that will be used in an HTML class for individual chat rows so they can be styled.  So, speaker "John" 
 * will always have the same class each time he speaks.  And, speaker "Mary" will have a different class 
 * from "John" but will have the same class each time she speaks.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $chat_author Author of the current chat row.
 * @return int The ID for the chat row based on the author.
 */
function aperture_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}
/* End of chat post format. */

/**
 * Fix IE8
 */
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/custom-widgets.php';
