<?php 

/**
 * theme main functions
 *
 * @package auckland
 */

/**
 * load template hooks
 */
require get_template_directory() . '/inc/functions/template-hooks.php';

/**
 * load social icons
 */
require get_template_directory() . '/inc/functions/social-nav.php';

/**
 * load bootstrap navwalker
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
  require get_template_directory() . '/assets/wp_bootstrap_navwalker.php'; /* Theme wp_bootstrap_navwalker display */
}
/**
 * customizer
 */
require get_template_directory() . '/inc/customizer/controls.php';
require get_template_directory() . '/inc/customizer/display.php';

/**
 * Theme setup
 */
add_action( 'after_setup_theme', 'auckland_theme_setup' );
function auckland_theme_setup() {

    load_theme_textdomain( 'auckland', get_template_directory() . '/library/translation' );

    add_action( 'wp_enqueue_scripts', 'auckland_scripts_and_styles', 999 );

    auckland_theme_support();

    global $content_width;
    if ( ! isset( $content_width ) ) {
    $content_width = 640;
    }

    // Thumbnail sizes
    add_image_size( 'auckland-thumb-600', 600, 600, true );
    add_image_size( 'auckland-thumb-300', 300, 300, true );

} 

/**
 * enqueue scripts and styles
 */
function auckland_scripts_and_styles() {

    global $wp_styles; 

    wp_enqueue_script( 'auckland-jquery-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.min.js', array('jquery'), '2.5.3', false );
    wp_enqueue_script( 'auckland-jquery-boostrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );

    wp_enqueue_style( 'auckland-font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', array(), '', 'all' );

    wp_enqueue_style('auckland-google-fonts-Playfair', '//fonts.googleapis.com/css?family=Playfair+Display:700,700i');
    wp_enqueue_style('auckland-google-fonts-Raleway', '//fonts.googleapis.com/css?family=Raleway:400,700,900');

    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

}

/**
 * theme support
 */
function auckland_theme_support() {

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 600, 600 );

    add_theme_support( 'custom-background',
    array(
    'default-image' => '',    // background image default
    'default-color' => 'ffffff',    // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
    );

    add_theme_support('automatic-feed-links');

    add_theme_support( 'title-tag' );

    add_theme_support( 'menus' );

    add_theme_support( 'custom-logo' );

    register_nav_menus(
    array(
    'main-nav' => __( 'Main Nav', 'auckland' ),
    'footer-nav' => __( 'Footer Nav', 'auckland' ),
    'social-nav' => __( 'Social Media Links', 'auckland' ),
    )
    );
  
}

/**
 * post nav
 */
function auckland_paging_nav() {
  global $wp_query;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 )
    return;
  ?>
  <div class="next-post-pagination" role="navigation">

      <?php if ( get_previous_posts_link() ) : ?>
      <?php previous_posts_link( __( 'Newer Posts <span class="fa fa-chevron-right"></span>', 'auckland' ) ); ?>
      <?php endif; ?>
      
      <?php if ( get_next_posts_link() ) : ?>
      <?php next_posts_link( __( '<span class="fa fa-chevron-left"></span> Older Posts', 'auckland' ) ); ?>
      <?php endif; ?>

      <span class="clearfix"></span>
    </div>
  <?php
}

/**
 * Comment layout
 */
function auckland_comments( $comment, $args, $depth ) { ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('comments'); ?>>

      <header class="comment-author vcard">
        <?php echo get_avatar( $comment,60 ); ?>
      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'auckland' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'auckland' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'auckland' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time(__( 'F jS, Y', 'auckland' )); ?></time>
        <?php comment_text() ?>
        <p class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
      </section>
<?php
} // don't remove this bracket!

/**
 * load custom functions
 */
require get_template_directory() . '/inc/functions/custom-functions.php';