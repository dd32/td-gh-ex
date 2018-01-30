<?php 

/**
 * theme main functions
 *
 * @package affidavit
 */


/**
 * Theme setup
 */
add_action( 'after_setup_theme', 'affidavit_theme_setup' );
function affidavit_theme_setup() {

    load_theme_textdomain( 'affidavit', get_template_directory() . '/inc/translation' );

    add_action( 'wp_enqueue_scripts', 'affidavit_scripts_and_styles', 999 );

    affidavit_theme_support();

    add_action( 'widgets_init', 'affidavit_register_sidebars' );

    global $content_width;
    if ( ! isset( $content_width ) ) {
    $content_width = 640;
    }

    // Thumbnail sizes
    add_image_size( 'affidavit-thumb-600', 600, 600, true );
    add_image_size( 'affidavit-thumb-300', 300, 300, true );

} 

/**
 * enqueue scripts and styles
 */
function affidavit_scripts_and_styles() {

    global $wp_styles; 

    wp_enqueue_script( 'affidavit-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.min.js', array('jquery'), '2.5.3', false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', array(), '', 'all' );

    wp_enqueue_style('affidavit-google-fonts-Montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('affidavit-google-fonts-Open-Sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400i');

    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

}

/**
 * theme support
 */
function affidavit_theme_support() {

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
    'main-nav' => __( 'The Main Menu', 'affidavit' ),
    )
    );
  
}

/**
 * register sidebar
 */
function affidavit_register_sidebars() {

  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Posts Widget Area', 'affidavit' ),
    'description' => __( 'The Posts Widget Area.', 'affidavit' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget Area 1', 'affidavit' ),
    'description' => __( 'The Footer Widget Area.', 'affidavit' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget Area 2', 'affidavit' ),
    'description' => __( 'The Footer Widget Area.', 'affidavit' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget Area 3', 'affidavit' ),
    'description' => __( 'The Footer Widget Area.', 'affidavit' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

} 

/**
 * Comment layout
 */
function affidavit_comments( $comment, $args, $depth ) { ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('comments'); ?>>

      <header class="comment-author vcard">
        <?php echo get_avatar( $comment,60 ); ?>
      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'affidavit' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'affidavit' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'affidavit' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time(__( 'F jS, Y', 'affidavit' )); ?></time>
        <?php comment_text() ?>
        <p class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
      </section>
<?php
} // don't remove this bracket!