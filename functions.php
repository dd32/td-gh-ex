<?php 
   if ( ! isset( $content_width ) )
	$content_width = 584;

apply_filters('the_excerpt','wpautop');
if ( function_exists( 'add_theme_support' ) ) 
 {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		// Add support for a variety of post formats
	    add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image','chat','audio','video' ) );
}

//enqueue scripts
  add_action('wp_enqueue_scripts','appointpress_enqueue_script');
function appointpress_enqueue_script() {
   
   if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    //wp_enqueue_script('jquery-1.7.1.min',get_template_directory_uri('template_directory').'/js/jquery-1.7.1.min.js');
   wp_enqueue_script('jquery');
   wp_enqueue_script('jquery.nivo.slider.pack', get_template_directory_uri('template_directory').'/js/jquery.nivo.slider.pack.js');
   wp_enqueue_script('custom_nivo_slider',get_template_directory_uri().'/js/jquery_nivo_slider.php');
 
   wp_enqueue_style('nivo-slider', get_template_directory_uri('template_directory').'/css/nivo-slider.css');
   wp_enqueue_style('style_nivo_support', get_template_directory_uri('template_directory').'/css/style_nivo_support.css');
   wp_enqueue_style('default', get_template_directory_uri('template_directory').'/css/default.css');
 

}
 
 //code for the custom menus....
 add_action( 'init', 'register_my_menus' );
   function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => 'Header Menu' )
  );
}
// code for custom post type  services
  add_action( 'init', 'create_post_type_services' );

function create_post_type_services() {
	register_post_type( 'services',
		array(
			'labels' => array(
				'name' => 'Services',
				'singular_name' => 'Services',
				'add_new' => __('Add New Service', 'appointment'),
                'add_new_item' => __('Enter Name with Designation','appointment'),
				'edit_item' => __('Enter Name with Designation','appointment'),
				'new_item' => __('New Link','appointment'),
				'all_items' => __('All Services','appointment'),
				'view_item' => __('View Link','appointment'),
				'search_items' => __('Search Links','appointment'),
				'not_found' =>  __('No Links found','appointment'),
				'not_found_in_trash' => __('No Links found in Trash','appointment'), 
				
			),
				'supports' => array('title','editor','thumbnail','comments'),
			'public' => true,
			'menu_position' => 11
		
			
		)
	);
}
add_action( 'init', 'create_post_type_featured_slider' );

function create_post_type_featured_slider() {
	register_post_type( 'featured_slider',
		array(
			'labels' => array(
				'name' => 'Slider',
				'singular_name' => 'Slider',
				'add_new' => __('Add New Slide', 'appointment'),
                'add_new_item' => __('Add New Slide','appointment'),
				'edit_item' => __('Add New Slide','appointment'),
				'new_item' => __('New Link','appointment'),
				'all_items' => __('All Slide','appointment'),
				'view_item' => __('View Link','appointment'),
				'search_items' => __('Search Links','appointment'),
				'not_found' =>  __('No Links found','appointment'),
				'not_found_in_trash' => __('No Links found in Trash','appointment'), 
				
			),
				'supports' => array('title','editor'),
			'public' => true,
			'menu_position' => 11
		
			
		)
	);
}

function appointpres_widgets_init() {


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
add_action( 'widgets_init', 'appointpres_widgets_init' );

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
global $data;

//translations
$leave_reply = $data['translation_reply_to_coment'] ? $data['translation_reply_to_coment'] : __('Reply','appointment');
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

?>