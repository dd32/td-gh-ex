<?php

/*-----------------------------------------------------------------------------------------------------//
/*	Theme Setup
/*-----------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'swelllite_setup' ) ) :

function swelllite_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'swell-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Enable support for site title tag
	add_theme_support( 'title-tag' );
	
	add_image_size( 'swell-featured-large', 1800, 1200, true ); // Large Featured Image
	add_image_size( 'swell-featured-medium', 1200, 800, true ); // Medium Featured Image
	add_image_size( 'swell-featured-small', 640, 640, true ); // Small Featured Image

	// Create Menus
	register_nav_menus( array(
		'fixed-menu' => esc_html__( 'Fixed Menu', 'swell-lite' ),
		'main-menu' => esc_html__( 'Main Menu', 'swell-lite' ),
		'social-menu' => esc_html__( 'Social Menu', 'swell-lite' ),
	));
	
	// Custom Header
	register_default_headers( array(
	    'default' => array(
		    'url'   => get_template_directory_uri() . '/images/default-header.jpg',
		    'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
		    'description'   => esc_html__( 'Default Custom Header', 'swell-lite' )
		)
	));
	$defaults = array(
		'width'                 => 1800,
		'height'                => 480,
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => 'ffffff',
		'default-image' 		=> get_template_directory_uri() . '/images/default-header.jpg',
		'header-text'           => false,
		'uploads'               => true,
	);
	add_theme_support( 'custom-header', $defaults );
	
	// Custom Background
	$defaults = array(
		'default-color'          => 'eeeeee',
	);
	add_theme_support( 'custom-background', $defaults );
}
endif; // swelllite_setup
add_action( 'after_setup_theme', 'swelllite_setup' );

/*-----------------------------------------------------------------------------------------------------//	
	Admin Notice		       	     	 
-------------------------------------------------------------------------------------------------------*/

function swelllite_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'swelllite_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf( __('Enjoying Swell Lite? <a href="%1$s" target="_blank">Upgrade to the premium Swell Theme</a> to receive many more features, page templates, shortcodes and support. <a style="float:right;" href="%2$s">Hide Notice</a>', 'swelllite'), 'http://organicthemes.com/theme/swell-theme/', '?swelllite_nag_ignore=0');
        echo "</p></div>";
	}
}

add_action('admin_notices', 'swelllite_admin_notice');

function swelllite_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['swelllite_nag_ignore']) && '0' == $_GET['swelllite_nag_ignore'] ) {
             add_user_meta($user_id, 'swelllite_ignore_notice', 'true', true);
	}
}

add_action('admin_init', 'swelllite_nag_ignore');

/*-----------------------------------------------------------------------------------------------------//	
	Category ID to Name		       	     	 
-------------------------------------------------------------------------------------------------------*/

function swelllite_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) )
		return false;
	return $cat->cat_name;
}

/*-----------------------------------------------------------------------------------------------------//	
	Register Scripts		       	     	 
-------------------------------------------------------------------------------------------------------*/

if( !function_exists('swelllite_enqueue_scripts') ) {
	function swelllite_enqueue_scripts() {
	
		// Enqueue Styles
		wp_enqueue_style( 'swell-style', get_stylesheet_uri() );
		wp_enqueue_style( 'swell-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'swell-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'swell-style' ), '1.0' );
	
		// Enqueue Scripts
		wp_enqueue_script( 'swell-html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
		wp_enqueue_script( 'swell-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'swell-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'swell-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'swell-hover' ), '20130729' );
		wp_enqueue_script( 'swell-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'swell-superfish', 'swell-fitvids' ), '20130729', true );
		wp_enqueue_script( 'swell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );
		
		// IE Conditional Scripts
		global $wp_scripts;
		$wp_scripts->add_data( 'swell-html5shiv', 'conditional', 'lt IE 9' );
	
		// Load single scripts only on single pages
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    	wp_enqueue_script( 'comment-reply' );
	    }
	}
}
add_action('wp_enqueue_scripts', 'swelllite_enqueue_scripts');

/*-----------------------------------------------------------------------------------------------------//	
	Register Sidebars		       	     	 
-------------------------------------------------------------------------------------------------------*/

function swelllite_widgets_init() {
	register_sidebar(array(
		'name'=> esc_html__( "Default Sidebar", 'swell-lite' ),
		'id' => 'default-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6 class="title">',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Blog Sidebar", 'swell-lite' ),
		'id' => 'blog-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6 class="title">',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Footer Widgets", 'swell-lite' ),
		'id' => 'footer',
		'before_widget'=>'<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<h6 class="title">',
		'after_title'=>'</h6>'
	));
}
add_action( 'widgets_init', 'swelllite_widgets_init' );

/*-----------------------------------------------------------------------------------------------------//
	Add Stylesheet To Visual Editor
-------------------------------------------------------------------------------------------------------*/
	
add_action( 'widgets_init', 'swelllite_add_editor_styles' );
/**
* Apply theme's stylesheet to the visual editor.
*
* @uses add_editor_style() Links a stylesheet to visual editor
* @uses get_stylesheet_uri() Returns URI of theme stylesheet
*/
function swelllite_add_editor_styles() {
	add_editor_style( 'css/style-editor.css' );
}
	
/*----------------------------------------------------------------------------------------------------//
/*	Content Width
/*----------------------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 760;

function swelllite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swelllite_content_width', 760 );
}
add_action( 'after_setup_theme', 'swelllite_content_width', 0 );
	
/*-----------------------------------------------------------------------------------------------------//	
	Comments Function		       	     	 
-------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'swelllite_comment' ) ) :
function swelllite_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'swell-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'swell-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">
	
		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 48;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'swell-lite' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s', 'swell-lite' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
				</div><!-- .comment-author .vcard -->
			</footer>

			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'swell-lite' ); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'swell-lite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<?php edit_comment_link( esc_html__( 'Edit', 'swell-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}
endif; // ends check for swelllite_comment()

/*-----------------------------------------------------------------------------------------------------//	
	Custom Excerpt Length		       	     	 
-------------------------------------------------------------------------------------------------------*/

function swelllite_excerpt_length( $length ) {
	return 38;
}
add_filter( 'excerpt_length', 'swelllite_excerpt_length', 999 );

function swelllite_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__('Read More', 'swell-lite') .'</a>';
}
add_filter('excerpt_more', 'swelllite_excerpt_more');

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Function
/*-----------------------------------------------------------------------------------------------------*/

function swelllite_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => esc_html__('&laquo;', 'swell-lite'),
		'next_text' => esc_html__('&raquo;', 'swell-lite'),
		'total' => $wp_query->max_num_pages
	) );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Custom Page Links
/*-----------------------------------------------------------------------------------------------------*/

function swelllite_wp_link_pages_args_prevnext_add($args) {
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; 

    $args['next_or_number'] = 'number'; // Keep numbering for the main part
    if (!$more)
        return $args;

    if($page-1) // There is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';

    if ($page<$numpages) // There is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after'];

    return $args;
}

add_filter('wp_link_pages_args', 'swelllite_wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------------------------//
	Body Class
-------------------------------------------------------------------------------------------------------*/

function swelllite_body_class( $classes ) {
	if ( is_singular() )
		$classes[] = 'swell-singular';

	if ( is_active_sidebar( 'right-sidebar' ) )
		$classes[] = 'swell-right-sidebar';

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'swell-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'swell-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'swelllite_body_class' );

/*-----------------------------------------------------------------------------------------------------//
	Includes
-------------------------------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/includes/jetpack.php' );
require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );