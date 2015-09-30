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
function drag_themes_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on HowlThemes, use a find and replace
   * to change 'howl-themes' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'howl-themes', get_template_directory() . '/languages' );

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

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'howl-themes' ),
    'secondary' => __( 'Secondary Menu', 'howl-themes' ),
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
add_action( 'after_setup_theme', 'drag_themes_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function drag_themes_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'howl-themes' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'drag_themes_widgets_init' );

function drag_themes_fwidgets_init() {
  register_sidebar( array(
    'name'          => __( 'Footer', 'howl-themes' ),
    'id'            => 'footer-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="fwidget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="fwidget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'drag_themes_fwidgets_init' );

function custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Enqueue scripts and styles.
 */
function drag_themes_scripts() {
  wp_enqueue_style( 'drag-themes-style', get_stylesheet_uri(), '', true);
    if(get_option('dt_fontid')){
  wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family='. get_option('dt_fontid') .':400,700');
}
else{
    wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700');
}
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome.css');
        wp_deregister_script('jquery');
        wp_enqueue_script( 'myscript', get_template_directory_uri().'/js/dragjs.js', array( 'jquery' ), '', true);
        wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js", false, null, true);
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply', '', true);
  }
}
add_action( 'wp_enqueue_scripts', 'drag_themes_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * HowlThemes Functions
 */
require get_template_directory() . '/inc/dragfun/dragthemesfunction.php';

/**
 * Adding Meta Box For Star Rating
 */
add_action( 'add_meta_boxes', 'star_meta_box_add' );  
function star_meta_box_add() {  
    add_meta_box( 'star-options', 'Give Star Rating', 'star_meta_box_cb', 'post', 'normal');  
}  
function star_meta_box_cb() {
    wp_nonce_field( basename( __FILE__ ), 'star_meta_box_nonce' );
    $value = get_post_meta(get_the_ID(), 'star_key', true);
    $html = '<label>Out of 5: </label><input type="text" name="star" value="'.$value.'"/>';
    echo $html;
}
add_action( 'save_post', 'star_meta_box_save' );  
function star_meta_box_save( $post_id ){   
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if ( !isset( $_POST['star_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['star_meta_box_nonce'], basename( __FILE__ ) ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;  
    if( isset( $_POST['star'] ) )  
        update_post_meta( $post_id, 'star_key', esc_attr( $_POST['star'], $allowed ) );
}


function showstarrating() {
$starvalue = get_post_meta(get_the_ID(), 'star_key', true); 
 if($starvalue <= 0.7 && $starvalue > 0){ echo'<div class="starsholder half-star"><i class="fa fa-star-half-o"></i></div>'; } if($starvalue <= 1 && $starvalue > 0.7){ echo '<div class="starsholder one-star"><i class="fa fa-star"></i></div>'; } if($starvalue <= 1.7 && $starvalue > 1){ echo '<div class="starsholder one-half-star"><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>'; } if($starvalue <= 2 && $starvalue > 1.77){ echo '<div class="starsholder two-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>'; } if($starvalue <= 2.7 && $starvalue > 2){ echo '<div class="starsholder two-half-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>'; } if($starvalue <= 3 && $starvalue > 2.7){ echo '<div class="starsholder three-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>'; } if($starvalue <= 3.7 && $starvalue > 3){ echo '<div class="starsholder three-half-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>'; } if($starvalue <= 4 && $starvalue > 3.7){ echo'<div class="starsholder four-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>'; } if($starvalue <= 4.7 && $starvalue > 4){ echo'<div class="starsholder four-half-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>'; } if($starvalue > 4.7){ echo'<div class="starsholder five-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>'; }
}
/*------------------------
Removing Some Default Widgets
--------------------*/
 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Nav_Menu_Widget');
     unregister_widget('WP_Widget_Recent_Posts');
 }
 add_action('widgets_init', 'unregister_default_widgets', 11);
/*------------------------------
Adding Widget Popular Post
--------------------------*/
class wpb_widget extends WP_Widget {
function __construct() {
parent::__construct(
'wpb_widget', 
__('Popular Posts', 'howl-themes'), 

array( 'description' => __( 'Show Post With Most Pageviews', 'howl-themes' ), ) 
);
}
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
if($instance['nopts']){
  $numptd = $instance['nopts'];
}
else{
  $numptd = 5;
}
$popularpost = new WP_Query( array( 'posts_per_page' => $numptd, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();
?><div class="popular-posts">
<?php
 if ( get_the_post_thumbnail() != '' ) {
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
  $resizedImage = aq_resize($source_image_url, 290, 193, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
} elseif(catch_that_image()){
 $source_image_url = catch_that_image();
 $resizedImage = aq_resize($source_image_url, 290, 193, true);
 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo $resizedImage;
 echo '" alt="';the_title();
 echo '" />';
 echo '</a>';
}
else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/thumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
} 
?><h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>
<?php
endwhile;
echo $args['after_widget'];
}
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
$nopts = esc_attr($instance['nopts']);
}
else {
$title = __( 'New title', 'howl-themes' );
}
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'howl-themes'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('nopts'); ?>"><?php _e('Number of posts to show', 'howl-themes'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('nopts'); ?>" name="<?php echo $this->get_field_name('nopts'); ?>" type="text" value="<?php echo $nopts; ?>" />
</p>
<?php 
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['nopts'] = strip_tags($new_instance['nopts']);
return $instance;
}
} 
function wpb_load_widget() {
  register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

/*-----------------------------------------
Recent Post Widget
-----------------------------------------*/
class recnt_widget extends WP_Widget {
function __construct() {
parent::__construct(
'recnt_widget', 
__('Recent Posts', 'howl-themes'), 
array( 'description' => __( 'This widget shows the post you published recentally', 'howl-themes' ), ) 
);
}
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
?>
<ul class="recent-post-perl">
<?php
if($instance['nopts']){
  $numptd = $instance['nopts'];
}
else{
  $numptd = 5;
}
  $argss = array( 'numberposts' => $numptd );
  $recent_postss = wp_get_recent_posts( $argss );
  foreach( $recent_postss as $recent ){
    echo '<li>';
    if ( get_the_post_thumbnail($recent["ID"]) != '' ) { 
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"], 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 75, 75, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/thumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
    ?>
<p class="rmeta-holder">
  <?php echo'<a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a>'; ?>
</p>
</li> 
<?php
  }
?>
</ul>
<?php 
echo $args['after_widget'];
}
    public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
$nopts = esc_attr($instance['nopts']);
}
else {
$title = __( 'New title', 'howl-themes' );
}
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'howl-themes'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<p>
<label for="<?php echo $this->get_field_id('nopts'); ?>"><?php _e('Number of posts to show', 'howl-themes'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('nopts'); ?>" name="<?php echo $this->get_field_name('nopts'); ?>" type="text" value="<?php echo $nopts; ?>" />
</p>
<?php 
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['nopts'] = strip_tags($new_instance['nopts']);
return $instance;
}
}
function recnt_load_widget() {
  register_widget( 'recnt_widget' );
}
add_action( 'widgets_init', 'recnt_load_widget' );
/*-----------------------------------------------------
Email Subscription Box
-----------------------------------------------------*/
class emails_widget extends WP_Widget {
function __construct() {
parent::__construct(
'emails_widget', 
__('Email Newsletter', 'howl-themes'), 
array( 'description' => __( 'Email Subscription Box', 'howl-themes' ), ) 
);
}
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$whichboxtoshow = $instance['nopts'];
if($whichboxtoshow == 'feedburner'){
?>
<!-- Begin Feedburner Signup Form -->
<div class="howl-email-subs-box">
<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $instance['feedbid'];?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
    <p class="howl-title-form"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="short-dec-form"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>
    <div class="real-content-form">
    <div class="email-container-howl">
    <input placeholder="Enter your email here" type="text" name="email"/>
    </div>
    <input type="hidden" value="<?php echo $instance['feedbid'];?>" name="uri"/>
    <input type="hidden" name="loc" value="en_US"/>
    <input class="sub-scribe-button" type="submit" value="Sign Me Up!" />
    </div>
</form>
</div>
<?php }
elseif($whichboxtoshow == 'mailchimp'){
  ?>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup" class="howl-email-subs-box">
<form action="<?php echo $instance['mcbc'];?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
 <p class="howl-title-form"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="short-dec-form"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>

        <div class="real-content-form">
<div class="mc-field-group email-container-howl">
  <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email here">
</div>
    
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_ab7c9ca049fdda7c69d9d9ca8_29753914b3" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Sign Me Up!" name="subscribe" id="mc-embedded-subscribe" class="button sub-scribe-button"></div>
        </div></div>
</form>
</div>
<?php } elseif($whichboxtoshow == 'aweber'){?>
<div class="howl-email-subs-box">
   <p class="howl-title-form"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="short-dec-form"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>

<form method="post" action="http://www.aweber.com/scripts/addlead.pl" >
<input type="hidden" name="meta_web_form_id" value="910039589" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="<?php echo $instance['abbc']; ?>" />
<input type="hidden" name="redirect" value="http://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_bbed426798c8f9985057d0ba6b0a16a9" target="blank" />
<input type="hidden" name="meta_adtracking" value="Home_Sidebar" />
<input type="hidden" name="meta_message" value="1" />
<input type="hidden" name="meta_required" value="name,email" />
<input type="hidden" name="meta_tooltip" value="" />
<div class="real-content-form">
<div class="email-container-howl">
<input type="text" name="name" value="" tabindex="500" placeholder="Enter your name here"/>
</div>
<div class="email-container-howl">
<input type="text" name="email" value="" tabindex="501" placeholder="Enter your email here" />
</div>
<input name="submit" tabindex="502" class="sub-scribe-button" type="submit" value="Sign Me Up!"/></div>
</form>
  </div><?php } ?>
<!--End mc_embed_signup-->  
<?php 
echo $args['after_widget'];
}
public function form( $instance ) {
  if(isset($instance[ 'title' ])){
$title = $instance[ 'title' ];
}
else{
  $title = '';
}
  if(isset($instance[ 'text' ])){
$text = $instance[ 'text' ];
}
else{
  $text = '';
}
  if(isset($instance[ 'nopts' ])){
$nopts =$instance['nopts'];
 }
 else{
  $nopts = '';
}
  if(isset($instance[ 'mcbc' ])){
$mcbc = $instance['mcbc'];
  }
  else{
  $mcbc = '';
}
  if(isset($instance[ 'abbc' ])){
$abbc = $instance['abbc'];
  }
  else{
  $abbc = '';
}
  if(isset($instance[ 'feedbid' ])){
$feedbid = $instance['feedbid'];
}
else{
  $feedbid = '';
}
?>
<p>
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>

<script>
$(document).ready(function(){ 
  var emailserval = "<?php echo isset($nopts) ?>";
  if(emailserval == 'mailchimp'){
  $('.mailchimphldr').show();
   $('.feedburnerhldr').hide();
   $('.aweberhldr').hide();
  }
  else if(emailserval == 'feedburner'){
   $('.mailchimphldr').hide();
   $('.feedburnerhldr').show();
   $('.aweberhldr').hide();
}
else{
   $('.mailchimphldr').hide();
   $('.feedburnerhldr').hide();
   $('.aweberhldr').show();
}
$('.emailserchose').change(function(){
  if($(this).val() == 'mailchimp'){
  $('.mailchimphldr').show();
   $('.feedburnerhldr').hide();
   $('.aweberhldr').hide();
  }
  else if($(this).val() == 'feedburner'){
   $('.mailchimphldr').hide();
   $('.feedburnerhldr').show();
   $('.aweberhldr').hide();
   }
  else{
   $('.mailchimphldr').hide();
   $('.feedburnerhldr').hide();
   $('.aweberhldr').show();
  }
  });        

  });
</script>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'howl-themes'); ?></label> 
<input placeholder="Subscribe To Our Newsletter" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<br/>
<br/>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:', 'howl-themes'); ?></label> 
<input placeholder="Subscribe to our mailing list and receive latest news and updates from our team." class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
<br/>
<br/>
<select name="<?php echo $this->get_field_name('nopts'); ?>" id="<?php echo $this->get_field_id('nopts'); ?>" class="emailserchose" type="text">
<option value="aweber" <?php echo "aweber" == $nopts ? "selected" : ""; ?>>Aweber</option>
<option value="mailchimp" <?php echo "mailchimp" == $nopts ? "selected" : ""; ?> >MailChimp</option>
<option value="feedburner" <?php echo "feedburner" == $nopts ? "selected" : ""; ?>>Feedburner</option>
</select>
<div class="mailchimphldr">
<label for="<?php echo $this->get_field_id( 'mcbc' ); ?>"><?php _e( 'MailChimp form action URL:', 'howl-themes'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'mcbc' ); ?>" name="<?php echo $this->get_field_name( 'mcbc' ); ?>" type="text" value="<?php echo esc_attr( $mcbc ); ?>" />
<label><a href="https://docs.shopify.com/manual/configuration/store-customization/communicating-with-customers/accounts-and-newsletters/where-do-i-get-my-mailchimp-form-action" target="blank">Find Form URL</a></label>
</div>
<div class="feedburnerhldr">
<label for="<?php echo $this->get_field_id( 'feedbid' ); ?>"><?php _e( 'Feedburner ID:', 'howl-themes'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'feedbid' ); ?>" name="<?php echo $this->get_field_name( 'feedbid' ); ?>" type="text" value="<?php echo esc_attr( $feedbid); ?>" />
</div>
<div class="aweberhldr">
<label for="<?php echo $this->get_field_id( 'abbc' ); ?>"><?php _e( 'Aweber List ID:', 'howl-themes'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'abbc' ); ?>" name="<?php echo $this->get_field_name( 'abbc' ); ?>" type="text" value="<?php echo esc_attr( $abbc ); ?>" />
<label><a href="https://help.aweber.com/hc/en-us/articles/204028426-What-Is-The-Unique-List-ID-" target="blank">Find List ID</a></label>
</div>
</p>
<?php 
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = $new_instance['title'];
$instance['text'] = $new_instance['text'];
$instance['nopts'] = $new_instance['nopts'];
$instance['mcbc'] = $new_instance['mcbc'];
$instance['abbc'] = $new_instance['abbc'];
$instance['feedbid'] = $new_instance['feedbid'];
return $instance;
}
}
function emails_load_widget() {
  register_widget( 'emails_widget' );
}
add_action( 'widgets_init', 'emails_load_widget' );

/*--------------------------
PageNavi
---------------------------------*/
function numberedhowlnav(){
  global $wp_query;
        $big = 999999999; // need an unlikely integer
        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?page=%#%',
            'total' => $wp_query->max_num_pages,
            'current' => max( 1, get_query_var( 'paged') ),
            'show_all' => false,
            'end_size' => 3,
            'mid_size' => 2,
            'prev_next' => True,
            'prev_text' => __('&laquo; Previous', 'howl-themes'),
            'next_text' => __('Next &raquo;', 'howl-themes'),
            'type' => 'list',
            );
        echo paginate_links($args);
}
/*--------------------------------------------
Sharing Buttons
---------------------------------*/
function sharingbuttons(){
  echo '<p>Share this post:</p>
<a style="background: #204385;" href="http://www.facebook.com/sharer.php?u='. get_permalink(). '" target="_blank"><i class="fa fa-facebook"></i></a>
<a style="background: #2aa9e0;" href="http://twitter.com/share?url='. get_permalink() . '&amp;text=' . rawurlencode(get_the_title()). '" target="_blank"><i class="fa fa-twitter"></i></a>
<a style="background:#d3492c;" href="https://plus.google.com/share?url='. get_permalink(). '" target="_blank"><i class="fa fa-google-plus"></i></a>

<a style="background: #02669a;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_permalink(). '" target="_blank"><i class="fa fa-linkedin"></i></a>

<a style="background: #cb2027;" href="http://pinterest.com/pin/create/button/?url=' .get_permalink(). '&amp;media=' .$url = wp_get_attachment_url( get_post_thumbnail_id() ). '"><i class="fa fa-pinterest-p"></i></a>

';
}
/**
 * Title         : Aqua Resizer
 * Description   : Resizes WordPress images on the fly
 * Version       : 1.2.0
 * Author        : Syamil MJ
 * Author URI    : http://aquagraphite.com
 * License       : WTFPL - http://sam.zoy.org/wtfpl/
 * Documentation : https://github.com/sy4mil/Aqua-Resizer/
 *
 * @param string  $url      - (required) must be uploaded using wp media uploader
 * @param int     $width    - (required)
 * @param int     $height   - (optional)
 * @param bool    $crop     - (optional) default to soft crop
 * @param bool    $single   - (optional) returns an array if false
 * @param bool    $upscale  - (optional) resizes smaller images
 * @uses  wp_upload_dir()
 * @uses  image_resize_dimensions()
 * @uses  wp_get_image_editor()
 *
 * @return str|array
 */

if(!class_exists('Aq_Resize')) {
    class Aq_Exception extends Exception {}

    class Aq_Resize
    {
        /**
         * The singleton instance
         */
        static private $instance = null;

        /**
         * Should an Aq_Exception be thrown on error?
         * If false (default), then the error will just be logged.
         */
        public $throwOnError = false;

        /**
         * No initialization allowed
         */
        private function __construct() {}

        /**
         * No cloning allowed
         */
        private function __clone() {}

        /**
         * For your custom default usage you may want to initialize an Aq_Resize object by yourself and then have own defaults
         */
        static public function getInstance() {
            if(self::$instance == null) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Run, forest.
         */
        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
            try {
                // Validate inputs.
                if (!$url)
                    throw new Aq_Exception('$url parameter is required');
                if (!$width)
                    throw new Aq_Exception('$width parameter is required');
                if (!$height)
                    throw new Aq_Exception('$height parameter is required');

                // Caipt'n, ready to hook.
                if ( true === $upscale ) add_filter( 'image_resize_dimensions', array($this, 'aq_upscale'), 10, 6 );

                // Define upload path & dir.
                $upload_info = wp_upload_dir();
                $upload_dir = $upload_info['basedir'];
                $upload_url = $upload_info['baseurl'];
                
                $http_prefix = "http://";
                $https_prefix = "https://";
                $relative_prefix = "//"; // The protocol-relative URL
                
                /* if the $url scheme differs from $upload_url scheme, make them match 
                   if the schemes differe, images don't show up. */
                if(!strncmp($url,$https_prefix,strlen($https_prefix))){ //if url begins with https:// make $upload_url begin with https:// as well
                    $upload_url = str_replace($http_prefix,$https_prefix,$upload_url);
                }
                elseif(!strncmp($url,$http_prefix,strlen($http_prefix))){ //if url begins with http:// make $upload_url begin with http:// as well
                    $upload_url = str_replace($https_prefix,$http_prefix,$upload_url);      
                }
                elseif(!strncmp($url,$relative_prefix,strlen($relative_prefix))){ //if url begins with // make $upload_url begin with // as well
                    $upload_url = str_replace(array( 0 => "$http_prefix", 1 => "$https_prefix"),$relative_prefix,$upload_url);
                }
                

                // Check if $img_url is local.
                if ( false === strpos( $url, $upload_url ) )
                    throw new Aq_Exception('Image must be local: ' . $url);

                // Define path of image.
                $rel_path = str_replace( $upload_url, '', $url );
                $img_path = $upload_dir . $rel_path;

                // Check if img path exists, and is an image indeed.
                if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) )
                    throw new Aq_Exception('Image file does not exist (or is not an image): ' . $img_path);

                // Get image info.
                $info = pathinfo( $img_path );
                $ext = $info['extension'];
                list( $orig_w, $orig_h ) = getimagesize( $img_path );

                // Get image size after cropping.
                $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );
                $dst_w = $dims[4];
                $dst_h = $dims[5];

                // Return the original image only if it exactly fits the needed measures.
                if ( ! $dims && ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {
                    $img_url = $url;
                    $dst_w = $orig_w;
                    $dst_h = $orig_h;
                } else {
                    // Use this to check if cropped image already exists, so we can return that instead.
                    $suffix = "{$dst_w}x{$dst_h}";
                    $dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
                    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

                    if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {
                        // Can't resize, so return false saying that the action to do could not be processed as planned.
                        throw new Aq_Exception('Unable to resize image because image_resize_dimensions() failed');
                    }
                    // Else check if cache exists.
                    elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) ) {
                        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
                    }
                    // Else, we resize the image and return the new resized image url.
                    else {

                        $editor = wp_get_image_editor( $img_path );

                        if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) ) {
                            throw new Aq_Exception('Unable to get WP_Image_Editor: ' . 
                                                   $editor->get_error_message() . ' (is GD or ImageMagick installed?)');
                        }

                        $resized_file = $editor->save();

                        if ( ! is_wp_error( $resized_file ) ) {
                            $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
                            $img_url = $upload_url . $resized_rel_path;
                        } else {
                            throw new Aq_Exception('Unable to save resized image file: ' . $editor->get_error_message());
                        }

                    }
                }

                // Okay, leave the ship.
                if ( true === $upscale ) remove_filter( 'image_resize_dimensions', array( $this, 'aq_upscale' ) );

                // Return the output.
                if ( $single ) {
                    // str return.
                    $image = $img_url;
                } else {
                    // array return.
                    $image = array (
                        0 => $img_url,
                        1 => $dst_w,
                        2 => $dst_h
                    );
                }

                return $image;
            }
            catch (Aq_Exception $ex) {
                error_log('Aq_Resize.process() error: ' . $ex->getMessage());

                if ($this->throwOnError) {
                    // Bubble up exception.
                    throw $ex;
                }
                else {
                    // Return false, so that this patch is backwards-compatible.
                    return false;
                }
            }
        }

        /**
         * Callback to overwrite WP computing of thumbnail measures
         */
        function aq_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {
            if ( ! $crop ) return null; // Let the wordpress default function handle this.

            // Here is the point we allow to use larger image size than the original one.
            $aspect_ratio = $orig_w / $orig_h;
            $new_w = $dest_w;
            $new_h = $dest_h;

            if ( ! $new_w ) {
                $new_w = intval( $new_h * $aspect_ratio );
            }

            if ( ! $new_h ) {
                $new_h = intval( $new_w / $aspect_ratio );
            }

            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

            $crop_w = round( $new_w / $size_ratio );
            $crop_h = round( $new_h / $size_ratio );

            $s_x = floor( ( $orig_w - $crop_w ) / 2 );
            $s_y = floor( ( $orig_h - $crop_h ) / 2 );

            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
        }
    }
}
if(!function_exists('aq_resize')) {

    /**
     * This is just a tiny wrapper function for the class above so that there is no
     * need to change any code in your own WP themes. Usage is still the same :)
     */
    function aq_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {
        $aq_resize = Aq_Resize::getInstance();
        return $aq_resize->process( $url, $width, $height, $crop, $single, $upscale );
    }
}


/*-------------------------------------------------------------
Social Media Follow Buttons
-----------------------------------------*/
function socialmediafollow(){
   if(get_option('dt_fbpageurl')){
    echo'<li><a href="'.get_option('dt_fbpageurl').'" target="blank"><i class="fa fa-facebook"></i></a></li>';
}
   if(get_option('dt_twpageurl')){
echo'<li><a href="'.get_option('dt_twpageurl').'" target="blank"><i class="fa fa-twitter"></i></a></li>';
}
   if(get_option('dt_gopageurl')){
echo'
<li><a href="'.get_option('dt_gopageurl').'" target="blank"><i class="fa fa-google-plus"></i></a></li>';
}
if(get_option('dt_pinteresturl')){
echo'
 <li><a href="'.get_option('dt_pinteresturl').'" target="blank"><i class="fa fa-pinterest-p"></i></a></li>';
}
if(get_option('dt_instagramurl')){
echo'
 <li><a href="'.get_option('dt_instagramurl').'" target="blank"><i class="fa fa-instagram"></i></a></li>';
}
if(get_option('dt_linkedinurl')){
echo'<li><a href="'.get_option('dt_linkedinurl').'" target="blank"><i class="fa fa-linkedin"></i></a></li>';
}
if(get_option('dt_youtubeurl')){
echo' <li><a href="'.get_option('dt_youtubeurl').'" target="blank"><i class="fa fa-youtube"></i></a></li>';
}
if(get_option('dt_rssurl')){
echo' <li><a href="'.get_option('dt_rssurl').'" target="blank"><i class="fa fa-rss"></i></a></li>';
}
}