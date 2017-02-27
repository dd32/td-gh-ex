<?php
/**
 * HowlThemes functions and definitions
 *
 * @package HowlThemes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 640; /* pixels */
}

if ( ! function_exists( 'drag_themes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function howlthemes_setup() {

  load_theme_textdomain( 'aqueduct', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'aqueduct-xlarge', 720, 480, true );
  add_image_size( 'aqueduct-large', 480, 320, true );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'aqueduct' ),
    'secondary' => __( 'Secondary Menu', 'aqueduct' ),
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

  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
  ) );
*/

}
endif; // epidermis_das_themes_setup
add_action( 'after_setup_theme', 'howlthemes_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function howlthemes_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'aqueduct' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'howlthemes_widgets_init' );

function howlthemes_fwidgets_init() {
  register_sidebar( array(
    'name'          => __( 'Footer', 'aqueduct' ),
    'id'            => 'footer-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="fwidget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="fwidget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'howlthemes_fwidgets_init' );

function howlthemes_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'howlthemes_excerpt_length', 999 );

/**
 * Enqueue scripts and styles.
 */
function howlthemes_scripts() {
  wp_enqueue_style( 'drag-themes-style', get_stylesheet_uri(), '', true);
    if(get_theme_mod("typography-setting")){
  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family='. str_replace(" ", "+", get_theme_mod("typography-setting")) .':400,700');
}

else{
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Titillium+Web:400,600,700');
}
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
        wp_enqueue_script( 'myscript', get_template_directory_uri().'/js/dragjs.js', array( 'jquery' ), '', true);
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply', '', true);
  }
}
add_action( 'wp_enqueue_scripts', 'howlthemes_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * HowlThemes Functions
 */
require get_template_directory() . '/inc/dragfun/dragthemesfunction.php';


/*------------------------
Removing Some Default Widgets
--------------------*/
 function howlthemes_unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Nav_Menu_Widget');
     unregister_widget('WP_Widget_Recent_Posts');
 }
 add_action('widgets_init', 'howlthemes_unregister_default_widgets', 11);

/*-------------------------------------------------------------
Social Media Follow Buttons
-----------------------------------------*/
function howlthemes_socialmediafollow(){
   if(get_theme_mod("fsocial_url")){
    echo'<li><a class="fblink" href="'.esc_url(get_theme_mod("fsocial_url")).'" target="blank"><i class="fa fa-facebook"></i></a></li>';
}
   if(get_theme_mod("tsocial_url")){
echo'<li><a class="twitterlink" href="'.esc_url(get_theme_mod("tsocial_url")).'" target="blank"><i class="fa fa-twitter"></i></a></li>';
}
   if(get_theme_mod("gsocial_url")){
echo'
<li><a class="gpluslink" href="'.esc_url(get_theme_mod("gsocial_url")).'" target="blank"><i class="fa fa-google-plus"></i></a></li>';
}
if(get_theme_mod("psocial_url")){
echo'
 <li><a class="pinlink" href="'.esc_url(get_theme_mod("psocial_url")).'" target="blank"><i class="fa fa-pinterest-p"></i></a></li>';
}
if(get_theme_mod("isocial_url")){
echo'
 <li><a class="instalink" href="'.esc_url(get_theme_mod("isocial_url")).'" target="blank"><i class="fa fa-instagram"></i></a></li>';
}
if(get_theme_mod("lsocial_url")){
echo'<li><a class="linkdlink" href="'.esc_url(get_theme_mod("lsocial_url")).'" target="blank"><i class="fa fa-linkedin"></i></a></li>';
}
if(get_theme_mod("ysocial_url")){
echo' <li><a class="ytubelink" href="'.esc_url(get_theme_mod("ysocial_url")).'" target="blank"><i class="fa fa-youtube"></i></a></li>';
}
if(get_theme_mod("rsocial_url")){
echo' <li><a class="rsslink" href="'.esc_url(get_theme_mod("rsocial_url")).'" target="blank"><i class="fa fa-rss"></i></a></li>';
}
}
/*------------------
* Support Core Logo
--------------------*/
function aqueduct_logo_setup() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'aqueduct_logo_setup' );


function aqueduct_oldlogotonew(){


  if (get_theme_mod('howl-themes_logo') && function_exists('get_custom_logo')) {
    $logo = attachment_url_to_postid( get_theme_mod( 'howl-themes_logo' ) );
    if ( is_int( $logo ) ) {
      set_theme_mod( 'custom_logo', $logo );
    }
    remove_theme_mod( 'howl-themes_logo' );
  }



}
add_action( 'after_setup_theme', 'aqueduct_oldlogotonew' );

function aqueduct_previous_magazine_settings() {

if(get_theme_mod("newsbox_one") || get_theme_mod("newsbox_two") || get_theme_mod("newsbox_three") || get_theme_mod("newsbox_four") || get_theme_mod("newsbox_five")){
// Slider
if(get_theme_mod("newsbox_one")){
  $slider_cat = get_theme_mod("newsbox_one");
  remove_theme_mod( 'newsbox_one' );
}
else{
  $slider_cat = 'none';
}

//Carousel
if(get_theme_mod("newsbox_two")){
  $carousel_cat = get_theme_mod("newsbox_two");
  remove_theme_mod( 'newsbox_two' );
}
else{
  $carousel_cat = 'none';
}

//Grid 1
if(get_theme_mod("newsbox_three")){
  $gridone_cat = get_theme_mod("newsbox_three");
  remove_theme_mod( 'newsbox_three' );
}
else{
  $gridone_cat = 'none';
}

//Grid 2
if(get_theme_mod("newsbox_four")){
  $gridtwo_cat = get_theme_mod("newsbox_four");
  remove_theme_mod( 'newsbox_four' );
}
else{
  $gridtwo_cat = 'none';
}

//Blog
if(get_theme_mod("newsbox_five")){
  $blog_cat = get_theme_mod("newsbox_five");
  remove_theme_mod( 'newsbox_five' );
}
else{
  $blog_cat = 'none';
}

$all_prev_cat = $slider_cat. ', '. $carousel_cat. ', '. $gridone_cat. ', '. $gridtwo_cat. ', '. $blog_cat. ',';
set_theme_mod( 'category_remember', $all_prev_cat );
$prev_box_arrang = '1, 2, 3, 4, 5,';
set_theme_mod( 'homebuilder', $prev_box_arrang );
}
}
add_action( 'after_setup_theme', 'aqueduct_previous_magazine_settings' );
