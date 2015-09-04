<?php
if ( ! function_exists( 'bbird_under_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * 
 */

    if ( ! isset( $content_width ) ) {
	$content_width = 640;
}
    
function bbird_under_setup() {
	
	load_theme_textdomain( 'bbird-under', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
        
        add_theme_support( 'post-thumbnails' );         
       
	add_theme_support( 'title-tag' );

	//Register menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bbird-under' ),
               'mobile-off-canvas' => __( 'Mobile', 'bbird-under' ),
	) );
        
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bbird_under_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
        
        //  Declare WooCommerce Support
        
         add_theme_support( 'woocommerce' );
}
endif; // bbird_under_setup
add_action( 'after_setup_theme', 'bbird_under_setup' );

/**
 * Register widget areas.

 */
function bbird_under_widgets_init() {
         register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'bbird-under' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
         register_sidebar( array(
		'name'          => __( 'WooCommerce Sidebar', 'bbird-under' ),
		'id'            => 'woocommerce_sidebar',
		'description'   => __( 'Widgets for WooCommerce page templates', 'bbird-under' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
        $args = array(
		'id'            => 'footer-1',
		'name'          => __( 'First Footer Sidebar', 'bbird-under' ),
		'description'   => __( 'Widgets for first footer column', 'bbird-under' ),
            'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
             'before_widget' => '<div id="footer-widget %2$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>'
	);
	register_sidebar( $args );
        
        $args = array(
		'id'            => 'footer-2',
		'name'          => __( 'Second Footer Sidebar', 'bbird-under' ),
		'description'   => __( 'Widgets for second footer column', 'bbird-under' ),
           'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
            'before_widget' => '<div id="footer-widget %2$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>'
	);
	register_sidebar( $args );
        
        $args = array(
		'id'            => 'footer-3',
		'name'          => __( 'Third Footer Sidebar', 'bbird-under' ),
		'description'   => __( 'Widgets for third footer column', 'bbird-under' ),
            'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
            'before_widget' => '<div id="footer-widget %2$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>'
	);
	register_sidebar( $args );
        
        $args = array(
		'id'            => 'footer-4',
		'name'          => __( 'Fourth Footer Sidebar', 'bbird-under' ),
		'description'   => __( 'Widgets for fourth footer column', 'bbird-under' ),
         'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
             'before_widget' => '<div id="footer-widget %2$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>'
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'bbird_under_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bbird_under_scripts() {    
        
        wp_enqueue_style( 'font-awseome', get_template_directory_uri().'/css/font-awesome.min.css' );
        
        wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.css' );        
              
        wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
        
        wp_enqueue_style( 'bbird-under-style', get_stylesheet_uri() );
       
        wp_enqueue_script( 'ui-scripts', get_template_directory_uri() . '/js/uiscripts.js', array('jquery'));
            
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '', false );
	
	wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array(), '', false );
	       
        wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
        
        wp_enqueue_script( 'loadiframe', get_stylesheet_directory_uri() . '/js/loadiframe.js', array('jquery'));
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bbird_under_scripts' );


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
 * Custom Walker class for navigation
 */

class bbird_under_top_bar_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );

		$output .= ( 0 == $depth  ) ? '<li class="divider"></li>' : '';

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		if ( in_array( 'label', $classes ) ) {
			$output .= '<li class="divider"></li>';
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}

	if ( in_array( 'divider', $classes ) ) {
		$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
	}

		$output .= $item_html;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}

}

/**
 * Custom Walker class for sliding (mobile) navigation
 */

class bbird_under_offcanvas_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-submenu' : '';

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		if ( in_array( 'label', $classes ) ) {
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}

		$output .= $item_html;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"left-submenu\">\n<li class=\"back\"><a href=\"#\">". __( 'Back', 'foundationpress' ) ."</a></li>\n";
	}

}

add_action( 'init', 'bbird_under_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 */
function  bbird_under_add_editor_styles() {

    add_editor_style( get_stylesheet_uri() );

}

/**
 * Custom comment layout
 */

function bbird_under_comments($comment, $args, $depth) {

$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>
   <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <div class="row">
  <div class="small-3 columns">
      <div class="gravatar-container">
          <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      </div><!-- .comment-meta -->
  </div>
  <div class="small-9 columns">    <div class="comment-meta">
                 
                    <div class="comment-author">
                        
                        <?php printf( __( '%s' ), sprintf( '<span class="commenter">%s</span>', get_comment_author_link() ) ); ?>
                    </div><!-- .comment-author -->
 
                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php printf( __( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
                                
                            </time>
                        </a>
                     </div><!-- .comment-metadata -->
 
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php printf( __( 'Your comment is awaiting moderation.', 'bbird-under'  )); ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->
                   <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
  </div>
 
</div>

  <div class="small-12 columns">
 
                <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>'
                ) ) );
                ?>
      
      </div>
            </article><!-- .comment-body -->
<?php
    }

/**
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bbird_under_register_required_plugins' );

function bbird_under_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'      => 'WP-PageNavi',
			'slug'      => 'wp-pagenavi',
			'required'  => false,
			
	)
        );
	tgmpa( $plugins );
}

/**
 Filtering comment form fields
 */ 

function bbird_under_comment_form_layout ($fields) {
    
$commenter = wp_get_current_commenter();
$req       = get_option('require_name_email');
$aria_req  = ($req ? " aria-required='true'" : '');
$html_req  = ($req ? " required='required'" : '');
$html5     = 'html5';

$fields = array(
    'author' => '<div class="row"><div class="medium-6 columns"><p class="comment-form-author">' . '<label for="author">' . __('Name', 'bbird-under') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' /></p></div>',
    'email' => '<div class="medium-6 columns"><p class="comment-form-email"><label for="email">' . __('Email', 'bbird-under') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p></div></div>',
    'url' => '<p class="comment-form-url"><label for="url">' . __('Website', 'bbird-under') . '</label> ' . '<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
);
   return $fields;  
   
}
add_filter( 'comment_form_default_fields', 'bbird_under_comment_form_layout' );



