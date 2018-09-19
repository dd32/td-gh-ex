<?php if( !defined( 'ABSPATH' ) ) { exit; }

require_once( get_template_directory() . '/includes/adelle_getting_started.php' );

// ==================================================================
// Theme stylesheets
// ==================================================================
function adelle_theme_styles() { 
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'jquery-ui-widget' );
  wp_enqueue_style( 'adelle-style', get_stylesheet_uri(), '15.11.2', array(), 'all' );
  wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Muli:400,400italic|Montserrat:400,700', null, array(), 'all' );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
  wp_enqueue_script( 'adelle-doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'adelle-fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'adelle-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'adelle_theme_styles' );

// ==================================================================
// Conditional scripts
// ==================================================================
function adelle_theme_conditional_scripts() {
  ?>
  <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/IE9.js" type="text/javascript"></script><![endif]-->
  <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
  <?php
}
add_action( 'wp_head', 'adelle_theme_conditional_scripts' );

// ==================================================================
// Heading
// ==================================================================
function adelle_theme_heading() {
  if( get_header_image() == true ) { ?>
    <a href="<?php echo esc_url( home_url() ); ?>">
      <img src="<?php header_image(); ?>" class="header-title" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" />
    </a>
  <?php } elseif( is_home() || is_front_page() ) { ?>
      <h1><a href="<?php echo esc_url( home_url() ); ?>" class="header-title"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="header-desc"><?php bloginfo( 'description' ); ?></p>
  <?php } else { ?>
      <h5><a href="<?php echo esc_url( home_url() ); ?>" class="header-title"><?php bloginfo( 'name' ); ?></a></h5>
      <p class="header-desc"><?php bloginfo( 'description' ); ?></p>
  <?php }
}

// ==================================================================
// Content width
// ==================================================================
if ( ! isset( $content_width ) ) $content_width = 640;

// ====================================================================================================================================
// Innit
// ====================================================================================================================================
function adelle_setup() {

  // ==================================================================
  // Custom header
  // ==================================================================
  add_theme_support( 'custom-header', array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 400,
    'height'                 => 100,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => 'ff8f85',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => 'adelle_admin_header_style',
    'admin-preview-callback' => 'adelle_admin_header_image',
  ));

  function adelle_admin_header_style() { ?>
    <link href="//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic|Muli:400,400italic|Montserrat:400,700" rel="stylesheet" type="text/css">
    <style type="text/css" id="adelle-admin-header-css">
    .appearance_page_custom-header #headimg {
      background-color: #fff;
      padding: 30px 0;
      text-align: left;
    }
    #headimg h1 {
      font-family: 'Montserrat', Sans-serif;
      font-weight: 400;
      font-size: 48px;
      text-transform: uppercase;
      margin: 0;
    }
    #headimg h1 a {
      text-decoration: none;
    }
    #headimg h1 a:hover {
      color: #000;
    }
    #headimg .displaying-header-desc {
      font-family: 'Muli', Lucida Sans Unicode, Lucida Grande, Verdana, Tahoma, Arial, Sans-serif;
      font-weight: 400;
      margin: 0;
      color: #777;
    }
    #headimg img {
      vertical-align: middle;
      display: block;
      margin: 0 auto;
    }
    </style>
  <?php }

  function adelle_admin_header_image() { ?>
    <div id="headimg">
      <?php if ( get_header_image() ) : ?>
      <img src="<?php header_image(); ?>" alt="">
      <?php else : ?>
      <h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="displaying-header-text displaying-header-desc"><?php bloginfo( 'description' ); ?></p>
      <?php endif; ?>
    </div>
  <?php }

  function header_image_text() {
  $text_color = get_header_textcolor();
  // If no custom color for text is set, let's bail.
  if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
  return;
  // If we get this far, we have custom styles.
  ?>
    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
      .header-title,
      .header-desc {display: none;}
    <?php elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) : ?>
      .header-title {color: #<?php echo esc_attr( $text_color ); ?>;}
    <?php endif; ?>
    </style>
  <?php
  }
  add_action( 'wp_head', 'header_image_text' );

  // ==================================================================
  // Language
  // ==================================================================
  load_theme_textdomain( 'adelle', get_template_directory() . '/languages' );

  // ==================================================================
  // Add default posts and comments RSS feed links to head
  // ==================================================================
  add_theme_support( 'automatic-feed-links' );

  // ==================================================================
  // Post thumbnail
  // ==================================================================
  add_theme_support( 'post-thumbnails' );
    add_image_size( 'post_thumb', 300, 200, true );

  // ==================================================================
  // Menu location
  // ==================================================================
  register_nav_menu( 'top_menu', __( 'Top Menu', 'adelle' ) );

  // ==================================================================
  // Custom background
  // ==================================================================
  add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

  // ==================================================================
  // Visual editor stylesheet
  // ==================================================================
  add_editor_style( 'editor.css' );

  // ==================================================================
  // Header title tag support
  // ==================================================================
  add_theme_support( 'title-tag' );

  // ==================================================================
  // HTML5 Support
  // ==================================================================
	add_theme_support( 'html5', array(
	'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
	) );

  // ==================================================================
  // Jetpack infinite scroll
  // ==================================================================
  add_theme_support( 'infinite-scroll', array(
    'container' => 'section',
    'footer'    => false,
  ) );

// ====================================================================================================================================
// Innit
// ====================================================================================================================================
}
add_action( 'after_setup_theme', 'adelle_setup' );

// ==================================================================
// Custom comment style
// ==================================================================
function adelle_theme_comment_style($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?>>
  <article class="comment-content" id="comment-<?php comment_ID(); ?>">
    <div class="comment-meta">
    <?php echo get_avatar($comment, $size = '32' ); ?>
    <?php printf(__( '<h6>%s</h6>', 'adelle' ), get_comment_author_link()) ?>
    <small><?php printf( __( '%1$s at %2$s', 'adelle' ), get_comment_date(), get_comment_time()) ?></small>
    </div>
  <?php if ($comment->comment_approved == '0' ) : ?><em><?php _e( 'Your comment is awaiting moderation.', 'adelle' ) ?></em><br /><?php endif; ?>
  <?php comment_text() ?>
  <?php comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
  </article>
<?php }

// ==================================================================
// WordPress header title backward compatibility
// ==================================================================
if ( ! function_exists( '_wp_render_title_tag' ) ) :
  function adelle_theme_render_title() {
    echo wp_title();
  }
  add_action( 'wp_head', 'adelle_theme_render_title' );
endif;

// ==================================================================
// Post/page pagination
// ==================================================================
function adelle_theme_get_link_pages() {
  wp_link_pages(
    array(
    'before'           => '<p class="page-pagination"><span class="page-pagination-title">' . __( 'Pages:', 'adelle' ) . '</span>',
    'after'            => '</p>',
    'link_before'      => '<span class="page-pagination-number">',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'nextpagelink'     => __( 'Next page', 'adelle' ),
    'previouspagelink' => __( 'Previous page', 'adelle' ),
    'pagelink'         => '%',
    'echo'             => 1
    )
  );
}

// ==================================================================
// Pagination (WordPress)
// ==================================================================
function adelle_theme_pagination_links() {
  the_posts_pagination( array(
    'mid_size'  => 5,
    'prev_text' => __( 'Previous', 'adelle' ),
    'next_text' => __( 'Next', 'adelle' ),
  ) );
}

// ==================================================================
// Widget - Sidebar
// ==================================================================
function adelle_widgets_init() {
  register_sidebar(array(
    'name'          => __( 'Right Widget', 'adelle' ),
    'id'            => 'right-widget',
    'description'   => 'Right side widget area',
    'before_widget' => '<article id="%1$s" class="side-widget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}


add_action( 'widgets_init', 'adelle_widgets_init' );
// ==================================================================
// Widget - Instagram
// ==================================================================
function adelle_footer_widgets_instagram_init() {
  register_sidebar( array(
    'name'          => __( 'Instagram Widget', 'adelle' ),
    'id'            => 'footer-widget-instagram',
    'class'         => '',
    'description'   => 'Instagram widget area.',
    'before_widget' => '<article id="%1$s" class="footer-instagram-widget %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'adelle_footer_widgets_instagram_init' );

// ==================================================================
// Privacy policy
// ==================================================================
function ace_footer_privacy() {
	if( function_exists( 'the_privacy_policy_link' ) ) {
		if( !get_option( 'ace_privacy' ) ) {
			the_privacy_policy_link( '', '&nbsp;' );
		}
	}
}
// ==================================================================
// Gettting started
// ==================================================================
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == "themes.php" ) wp_redirect( 'themes.php?page=adelle_getting_started.php' );
