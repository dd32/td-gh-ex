<?php
/**
 * gump functions and definitions
 *
 * @package Gump
 * @since Gump 1.0.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'gump_setup' ) ) :
	
	function gump_setup() {
	
	// Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'gump', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gump' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'quote', 'audio' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gump_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
	
	// Support title tag
	add_theme_support( 'title-tag' );
}
endif; // gump_setup
add_action( 'after_setup_theme', 'gump_setup' );

/**
 * Custom Editor Style
 *
 * @since gump 1.0
 */
function gump_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'gump_add_editor_styles' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gump_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gump' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'gump' ),
		'id'            => 'footer-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'gump' ),
		'id'            => 'footer-sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'gump' ),
		'id'            => 'footer-sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'gump_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gump_scripts() {
	wp_enqueue_style( 'gump-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_script( 'gump-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

	wp_enqueue_script( 'gump-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20120206', true );

	wp_enqueue_script( 'gump-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gump_scripts' );

/**
 * Add notice after active theme.
 */
function gump_notice() {
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
	?>
	<div class="updated notice notice-success is-dismissible">
		<p>
			<?php
			// Translators: welcome page.
			echo wp_kses_post( sprintf( __( 'Thank you for choosing Gump Free. To get started, visit our <a href="%s">welcome page</a>.', 'gump' ), esc_url( admin_url( 'themes.php?page=gump' ) ) ) );
			?>
		</p>
		<p>
			<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=gump' ) ); ?>"><?php esc_html_e( 'Get started with Gump Free', 'gump' ); ?></a>
		</p>
	</div>
	<?php
	}
}
add_action( 'admin_notices', 'gump_notice' );

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/class-pk-dashboard.php';
$dashboard = new Gump_Dashboard;

/**
 * Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags
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
 * Load Custom Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Add "pro" link to the customizer
 *
 */
require get_template_directory() . '/inc/customize-pro/class-customize.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function gump_register_required_plugins() {

	$plugins = array(
		
		array(
			'name'      => 'Contact Form by WPForms',
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),
		
		array(
			'name'      => 'Jetpack',
			'slug'      => 'jetpack',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'gump',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'gump_register_required_plugins' );

/**
 * Print the attached image with a link to the next attached image.
 *
 * @since gump 1.0
 */
if ( ! function_exists( 'gump_the_attached_image' ) ) :
function gump_the_attached_image() {
	$post                = get_post();
	/**
	 *
	 * @since gump 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'gump_attachment_size', array( 810, 810 ) );
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
 * Returns a "Read more" link for excerpts
 *
 * @since gump 1.0
 */
function gump_excerpt_more( $more ) {
	return '<a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read more ->', 'gump' ) . '</a>';
}
add_filter( 'excerpt_more', 'gump_excerpt_more' );


/**
 * Remove Code from Header
 *
 * http://www.themelab.com/remove-code-wordpress-header/
 *
 * @since gump 1.0
 */
remove_action('wp_head', 'wp_generator'); //Version of Wordpress
remove_action('wp_head', 'adjacent_posts_rel_link'); //Next and Prev Posts

/**
 * Add Google Fonts
 */
function gump_add_google_fonts() {

wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Pacifico&subset=cyrillic,latin-ext,vietnamese');
	wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'gump_add_google_fonts');

/**
 * Add Google Analytics
 */
function gump_analytics() {
?>
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo get_theme_mod( 'pk_start_here_analytics' ); ?>', 'auto');
  ga('send', 'pageview');

</script>
<!-- /Google Analytics -->
<?php
}
add_action('wp_head', 'gump_analytics',99);

/**
 * Add Search Box to the Menu
 *
 */
function gump_add_search_form($items, $args) {
          if( $args->theme_location == 'primary' ){
          $items .= '<li class="menu-item search-box">'
                  . '<form role="search" method="get" class="search-form" action="'.home_url( '/' ).'">'
                  . '<label>'
                  . '<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'gump' ) . '</span>'
                  . '<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search', 'placeholder', 'gump' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'gump' ) . '" />'
                  . '</label>'
                  . '<input type="submit" class="search-submit" value="'. esc_attr_x('Search', 'submit button', 'gump') .'" />'
                  . '</form>'
                  . '</li>';
          }
        return $items;
}
add_filter('wp_nav_menu_items', 'gump_add_search_form', 10, 2);

/**
 * Custom Comments
 */
function gump_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'gump' ), get_comment_author_link() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'gump' ); ?></em><br/><?php 
        } ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s', 'gump'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)', 'gump' ), '  ', '' ); ?>
        </div>

        <div class="comment-content"><?php comment_text(); ?></div>

        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

/**
 * Set the WPForms ShareASale ID.
 *
 * @param string $shareasale_id The the default ShareASale ID.
 *
 * @return string $shareasale_id
 */
function gump_wpforms_shareasale_id( $shareasale_id ) {
	
	// If this WordPress installation already has an WPForms ShareASale ID
	// specified, use that.
	if ( ! empty( $shareasale_id ) ) {
		return $shareasale_id;
	}
	
	// Define the ShareASale ID to use.
	// This should be your ShareASale affiate ID, see https://cl.ly/3H1v093A252f.
	$shareasale_id = '1845472';
	
	// This WordPress installation doesn't have an ShareASale ID specified, so 
	// set the default ID in the WordPress options and use that.
	update_option( 'wpforms_shareasale_id', $shareasale_id );
	
	// Return the ShareASale ID.
	return $shareasale_id;
}
add_filter( 'wpforms_shareasale_id', 'gump_wpforms_shareasale_id' );