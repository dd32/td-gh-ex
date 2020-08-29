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
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Support title tag
	add_theme_support( 'title-tag' );

	// Add Custom Logo
	add_theme_support( 'custom-logo' );

	// Gutenberg
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-units' );
	add_theme_support( 'responsive-embeds' );
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
 * Returns a "Read more" link for excerpts
 *
 * @since gump 1.0
 */
function gump_excerpt_more( $more ) {
	return '<a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read more ->', 'gump' ) . '</a>';
}
add_filter( 'excerpt_more', 'gump_excerpt_more' );

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

  ga('create', '<?php echo esc_attr(get_theme_mod( 'pk_start_here_analytics' )); ?>', 'auto');
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