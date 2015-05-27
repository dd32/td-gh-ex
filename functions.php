<?php
/**Theme Name	: wallstreet
 * Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
	define('WEBRITI_THEME_OPTIONS_PATH',WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	
	//wp title tag starts here
	function webriti_head( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wallstreet' ), max( $paged, $page ) );

	return $title;
}
	add_filter( 'wp_title', 'webriti_head', 10, 2);
	
	add_action( 'after_setup_theme', 'webriti_setup' ); 	
	function webriti_setup()
	{
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 600;//In PX
		
		// Load text domain for translation-ready
		load_theme_textdomain( 'wallstreet', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'wallstreet' ) ); //Navigation
		// theme support 	
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args  ); 
		add_theme_support( 'automatic-feed-links');
		add_theme_support('woocommerce');
		require_once('theme_setup_data.php');
		// setup admin pannel defual data for index page		
		$wallstreet_lite_options=theme_data_setup();
		
		$current_theme_options = get_option('wallstreet_lite_options'); // get existing option data 		
		if($current_theme_options)
		{ 	$wallstreet_lite_options = array_merge($wallstreet_lite_options, $current_theme_options);
			update_option('wallstreet_lite_options',$wallstreet_lite_options);	// Set existing and new option data			
		}
		else
		{
			add_option('wallstreet_lite_options', $wallstreet_lite_options);
		}
		require( WEBRITI_THEME_FUNCTIONS_PATH . '/theme_options/option_pannel.php' ); // for Option Panel Settings
		add_action('wp_enqueue_scripts', 'webriti_scripts');
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
	}
	// Read more tag to formatting in blog page 	
	function new_content_more($more)
	{  global $post;
		return '<div class=\"blog-btn-col\"><a href="' . get_permalink() . "#more-{$post->ID}\" class=\"blog-btn\">Read More</a></div>";
	}   
	add_filter( 'the_content_more_link', 'new_content_more' );

	/********** Image Resize *************/
	if ( function_exists( 'add_image_size' ) ) 
	{
		add_image_size('webriti_blogleft_img',740,400,true);
		add_image_size('webriti_blogfull_img',1140,500,true);
	}

/*sidebar*/
add_action( 'widgets_init', 'webriti_widgets_init');
function webriti_widgets_init() {
register_sidebar( array(
		'name' => __( 'Sidebar', 'wallstreet' ),
		'id' => 'sidebar_primary',
		'description' => __( 'The left sidebar widget area', 'wallstreet' ),
		'before_widget' => '<div class="sidebar-widget" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h2>',
		'after_title' => '</h2></div>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'wallstreet' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'wallstreet' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 footer_widget_column">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="footer_widget_title">',
		'after_title' => '</h2>',
	) );
}
/* Added By Harish */
	/*===================================================================================
	 * Add Author Links
	 * =================================================================================*/
	function webriti_add_to_author_profile( $contactmethods ) {
		$contactmethods['facebook_profile'] = __('Facebook Profile URL','wallstreet');
		$contactmethods['twitter_profile'] = __('Twitter Profile URL','wallstreet');
		$contactmethods['linkedin_profile'] = __('Linkedin Profile URL','wallstreet');
		$contactmethods['google_profile'] = __('Google Profile URL','wallstreet');
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'webriti_add_to_author_profile', 10, 1);
	
	function webriti_add_gravatar_class($class) {
		$class = str_replace("class='avatar", "class='img-responsive comment-img img-circle", $class);
		return $class;
	}
	
	add_filter('get_avatar','webriti_add_gravatar_class');

function webriti_scripts()
{	
	$current_options = get_option('wallstreet_lite_options');	
	wp_enqueue_style('bootstrap', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');	
	wp_enqueue_style('theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');
	wp_enqueue_style('media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	wp_enqueue_style('font', WEBRITI_TEMPLATE_DIR_URI . '/css/font/font.css');	
	wp_enqueue_style('font-awesome-min', WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome-4.0.3/css/font-awesome.min.css');
	wp_enqueue_style('tool-tip', WEBRITI_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
	
	wp_enqueue_script('menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_script('bootstrap', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');
}	
		// code for comment
		if ( ! function_exists( 'wallstreet_comment' ) ) {
		function wallstreet_comment( $comment, $args, $depth ) 
		{
		$GLOBALS['comment'] = $comment;
		//get theme data
		global $comment_data;
		//translations
		$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','wallstreet');
	?><div <?php comment_class('media comment_box'); ?> id="comment-<?php comment_ID(); ?>">
			<a class="pull-left-comment" href="<?php the_author_meta('user_url'); ?>">
			<?php echo get_avatar( $comment , 70); ?>		
			</a>
			<div class="media-body">
				<div class="comment-detail">
					<h4 class="comment-detail-title"><?php comment_author(); ?><span class="comment-date"><a href="<?php echo get_comment_link( $comment->comment_ID );?>"><?php _e('Posted on &nbsp;', 'wallstreet'); ?><?php echo comment_time('g:i a'); ?><?php echo " - "; echo comment_date('M j, Y');?></a></span></h4>
					<?php comment_text(); ?>
					<?php edit_comment_link( __( 'Edit', 'wallstreet' ), '<p class="edit-link">', '</p>' ); ?>
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
					</div>					
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wallstreet' ); ?></em>
					<br/>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	<?php } }// end of wallstreet_comment function ?>