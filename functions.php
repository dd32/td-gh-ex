<?php 
/**
 * Theme's Functions and Definitions
 *
 *
 * @file           functions.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appointment/functions.php
 */

function appointment_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'appointment' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'appointment_wp_title', 10, 2 );

add_action('add_meta_boxes','appointment_slider_meta');
function appointment_slider_meta() {

 add_action('admin_enqueue_scripts', 'appointment_admin_enqueue_script'); 
 function appointment_admin_enqueue_script(){
	wp_enqueue_script('my-upload-admin',get_bloginfo('template_directory').'/js/media-upload-script.js',array('media-upload','thickbox'));
	} 
    $screens = array( 'post' );
    foreach ($screens as $screen) {
        add_meta_box(
            'slider_section',
            __( 'HomePage Slider', 'appointment' ),
            'appointment_slider_custom_box',
            $screen
        );
    }
	}
	
	
	function appointment_slider_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_meta_value_key', true );?>
 <div class="wp-media-buttons" id="wp-content-media-buttons">
<?php 
	$src= get_post_meta( get_the_ID(), '_meta_image', true );$cp= get_post_meta( get_the_ID(), '_meta_caption', true );
	echo '<label for="myplugin_new_field">';
       _e("Image Caption", 'appointment' );
  echo '</label> ';?>
  <input type="textarea" id="myplugin_new_field" name="myplugin_new_field" value="<?php if (!empty($cp)) echo $cp ?>" size="25" />
    
 <br />
 <?php _e('Upload Image','appointment');?>: <input  class="upload" type="text" size="36" name="upload_image" value="<?php if(!empty($src)) echo $src?>" />
<input class="upload_image_button" type="button" value="<?php _e('Add File','appointment');?>" /><br />
	</div>
				
	
	
	
<?php }

add_action( 'save_post', 'appointment_save_slider_data' );
function appointment_save_slider_data( $post_id ) {
    //global $page;global $post_type;
  // First we need to check if the current user is authorised to do this action. 
 
     if ( ! current_user_can( 'edit_page', $post_id ) ){
        return ;
  } 
  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['myplugin_noncename'] ) || ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return ;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  echo $post_ID;
  //sanitize user input
  $caption = sanitize_text_field( $_POST['myplugin_new_field'] );
  $meta_image = sanitize_text_field( $_POST['upload_image'] );

  // Do something with $mydata 
  // either using 
  add_post_meta($post_ID, '_meta_caption', $caption, true) or
    update_post_meta($post_ID, '_meta_caption', $caption);
		
	add_post_meta($post_ID, '_meta_image', $meta_image, true) or
    update_post_meta($post_ID, '_meta_image', $meta_image);
	
  // or a custom table (see Further Reading section below)
}
?>
<?php 
   if ( ! isset( $content_width ) )
	$content_width = 584;

apply_filters('the_excerpt','wpautop');

//enqueue scripts
  add_action('wp_enqueue_scripts','appointment_enqueue_script');
function appointment_enqueue_script() {
  
   if ( is_singular() ) wp_enqueue_script( "comment-reply" );
  if(!is_admin())
  {
   wp_enqueue_script('jquery');
   wp_enqueue_script('jquery.nivo.slider.pack', get_template_directory_uri('template_directory').'/js/jquery.nivo.slider.pack.js');
   wp_enqueue_script('jquery.nivo.slider',get_template_directory_uri().'/js/jquery.nivo.slider.js');
    }
	if(is_page_template('categorised_blog.php')){     wp_enqueue_script('cat_ajax',get_template_directory_uri().'/js/cat_blog_ajax.js'); }
	
    wp_enqueue_style('nivo-slider', get_template_directory_uri('template_directory').'/css/nivo-slider.css');
    wp_enqueue_style('default', get_template_directory_uri('template_directory').'/css/default.css');
	wp_enqueue_style('font',get_template_directory_uri('template_directory').'/css/font/font.css');
    
}
 
 add_action('after_setup_theme', 'appointment_setup_theme');
function appointment_setup_theme(){
    load_theme_textdomain('appointment', get_template_directory() . '/languages');
	if ( function_exists( 'add_theme_support' ) ) 
 {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		
		$header_args = array(
		'flex-width'    => true,
		'width'         => 200,
		'flex-height'    => true,
		'height'        => 40,
		'default-image' => get_template_directory_uri() . '/images/logo.png',
		);
add_theme_support( 'custom-header', $header_args );
		
		// Add support for a variety of post formats
	    add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image','chat','audio','video' ) );
}
	
}
 
//code for the admin side....
add_action( 'init', 'appointment_admin' );
   
   function appointment_admin() {
   add_editor_style( get_template_directory_uri() . '/custom-editor-style.css' );
  
   register_nav_menus(
    array( 'header-menu' => __('Header Menu','appointment') )
  );
}
// code for custom post type  services
  
add_action( 'widgets_init', 'appointment_widgets_init');
function appointment_widgets_init() {


/*sidebar*/
register_sidebar( array(
		'name' => __( ' Sidebar', 'appointment' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'appointment' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="bog_right_2bo "></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
/*footer sidebar*/

register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'appointment' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'appointment' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'appointment' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'appointment' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'appointment' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'appointment' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'appointment' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'appointment' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}	                     


/*Post date show*/
if ( ! function_exists( 'appointment_posted_on' ) ) :
function appointment_posted_on() {
	printf( __( '<span class="sep">Posted by </span><a class="name" href="%5$s" title="%6$s" rel="author">%7$s</a><span class="sep">on </span><time class="entry-date" datetime="%3$s" pubdate>%4$s</time> ', 'appointment' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'appointment' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}
endif;


// code for comment
if ( ! function_exists( 'appointment_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own appointment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since appointment
 */
function appointment_comment( $comment, $args, $depth ) {
	
	$GLOBALS['comment'] = $comment;

//get theme data
global $comment_data;

//translations
$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','appointment');
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body <?php if ($comment->comment_approved == '0') echo 'pending-comment'; ?> clearfix">
                <div class="comment-details">
                    <div class="comment-avatar">
                        <?php echo get_avatar($comment, $size = '65'); ?>
                    </div><!-- /comment-avatar -->
                    <section class="comment-author vcard">
						<?php printf(__('<cite class="author">%s</cite>'), get_comment_author_link()) ?>
						<span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">- <?php echo get_comment_date(); ?></a></span>
                    </section><!-- /comment-meta -->
                    <section class="comment-content">
									<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'appointment' ); ?></em>
					<br />
				<?php endif; ?>
    	                <div class="comment-text">
    	                    <?php comment_text() ?>
    	                </div><!-- /comment-text -->
    	              <div class="comment_mn_row_sub2">
    	                    <?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply. '&rarr;','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    	                </div><!-- /reply -->
                    </section><!-- /comment-content -->
				</div><!-- /comment-details -->
		</div><!-- /comment -->
<?php
}
endif;

/* Static Front Page Settings*/

$appointment_options = appointment_get_options();

/**
 * Appoinment Theme option defaults */

function appointment_get_options() {
  // Globalize the variable that holds the Theme options
  global $appointment_options;
  // Parse array of option defaults against user-configured Theme options
  $appointment_options = wp_parse_args( get_option( 'appointment_theme_options', array() ), appointment_get_option_defaults() );
  // Return parsed args array
  return $appointment_options;
}
function appointment_get_option_defaults() {
  $defaults = array(
    'front_page' => 0,
  );
  return apply_filters( 'appointment_option_defaults', $defaults );
}
?>






<?php

//code for categorised blog
add_action( 'wp_ajax_nopriv_load-filter1', 'appointment_ajax_cat_posts' );
add_action( 'wp_ajax_load-filter1', 'appointment_ajax_cat_posts' );
function appointment_ajax_cat_posts () {
ob_start ();
$cat_name = $_POST[ 'term' ];

query_posts( array ( 'category_name' => $cat_name, 'posts_per_page' => -1 ) );
 
// The Loop
if(have_posts()){
while ( have_posts() ) : the_post();?>
 <div class="blog_row_mn">
                      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title();
    if (strlen($title) == 0)  _e('no title','appointment'); 
	else  echo $title; ?></a></h2>
					    <div class="blog_link_mn">	
                         <span><img src="<?php echo get_template_directory_uri();?>/images/blog_ic.png" alt="Icon" /> 
						<?php the_date('M j,Y');?></span> 
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog_ic2.png" alt="Icon" /> </a>
                 <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( 'Comments', 'appointment' ),'name' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic3.png" alt="Icon" />
                          <?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?>
						<?php the_category(); ?>
					  </div><!--blog_link_mn-->	
                      
                      					<?php if(has_post_thumbnail()):?>					
					<div class="blog_img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail('large',array('class' => 'fleft'));?>
						</a>
					</div>
					<?php endif;?>					
					<p class="blog_con_mn"><?php  the_excerpt(); ?></p>
					<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul>
                     </div><!--pagination_blog-->
					 <?php endif;?>
					<div class="blog_bot_mn">
						
						<span> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </span>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','appointment'); ?></a>
					</div><!--blog_bot_mn-->
				</div><!--blog_row_mn-->
				
	
	<?php
endwhile;
 }
wp_reset_query();
 wp_reset_postdata(); 
       $response = ob_get_contents();
       ob_end_clean();
       echo $response;
       die(1);
}
?>