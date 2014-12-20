<?php
/**
 * Athenea functions and definitions
 *
 * @package Athenea
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'athenea_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function athenea_setup() {
    // Make theme available for translation.
	load_theme_textdomain( 'athenea', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style();
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'athenea' ),
	) );
	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'athenea_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // athenea_setup
add_action( 'after_setup_theme', 'athenea_setup' );

// Register widgetized area and update sidebar with default widgets.
function athenea_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'athenea' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	
	// Footer A
	register_sidebar( array(
		'name'          => __( 'Footer A', 'athenea' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget_foot %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	// Footer B
	register_sidebar( array(
		'name'          => __( 'Footer B', 'athenea' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget_foot %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	// Footer C
	register_sidebar( array(
		'name'          => __( 'Footer C', 'athenea' ),
		'id'            => 'sidebar-8',
		'before_widget' => '<aside id="%1$s" class="widget_foot %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	// Footer C
	register_sidebar( array(
		'name'          => __( 'Footer D', 'athenea' ),
		'id'            => 'sidebar-9',
		'before_widget' => '<aside id="%1$s" class="widget_foot %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
}
add_action( 'widgets_init', 'athenea_widgets_init' );

// Enqueue styles and scripts.
function athenea_scripts_styles() {
	wp_enqueue_style( 'athenea-style', get_stylesheet_uri() );
	wp_enqueue_style('athenea-fonts', '//fonts.googleapis.com/css?family=Nunito:300|Aclonica', array(), null );
	/** Design change  */
	if ( !is_admin() ) {
	  if ( of_get_option('unique_design', 'design-red' ) == 'design-red' ) {
		  wp_enqueue_style( 'athenea-red', get_template_directory_uri() . '/inc/dist/css/athenea-red-min.css' );
		  wp_enqueue_style('athenea-red');
	  } else {
		  wp_enqueue_style( 'athenea-blue', get_template_directory_uri() . '/inc/dist/css/athenea-blue-min.css' );
		  wp_enqueue_style('athenea-blue');
	  }
	}
	wp_enqueue_script('athenea-menu', get_template_directory_uri().'/js/athenea.js', array(), '1.1.5', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'athenea_scripts_styles' );

// Adds IE specific scripts
function athenea_print_ie_scripts() {
?>
<!--[if lt IE 9]>
 <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
<![endif]-->
<?php
}
add_action( 'wp_head', 'athenea_print_ie_scripts', 11 );


// Add Favicon
function athenea_favicon() {
?>
<link rel="shortcut icon" href="<?php if ( of_get_option('athenea_favicon') !='' ) { ?><?php echo of_get_option('athenea_favicon'); ?><?php } ?>">
<?php
}
add_action( 'wp_head', 'athenea_favicon' );


/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Athenea
 */

// Name
function athenea_comment_form_field_author( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-author control-group">
				<label for="author">' . __( 'Name', 'athenea' ) . '</label>
				<div class="controls">
					<input id="author" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" class="form-control"' . $aria_req . ' />
					' . ( $req ? '<p class="help-inline"><span class="required">' . __('required', 'athenea') . '</span></p>' : '' ) . '
				</div>
			</div>';
}
add_filter( 'comment_form_field_author', 'athenea_comment_form_field_author');


// E-Mail
function athenea_comment_form_field_email( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-email control-group">
				<label for="email">' . __( 'Email', 'athenea' ) . '</label>
				<div class="controls">
					<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"' . $aria_req . ' />
					<p class="help-inline">' . ( $req ? '<span class="required">' . __('required', 'athenea') . '</span>, ' : '' ) . __( 'will not be published', 'athenea' ) . '</p>
				</div>
			</div>';
}
add_filter( 'comment_form_field_email', 'athenea_comment_form_field_email');


// Website
function athenea_comment_form_field_url( $html ) {
	$commenter	=	wp_get_current_commenter();
	
	return	'<div class="comment-form-url control-group">
				<label for="url">' . __( 'Website', 'athenea' ) . '</label>
				<div class="controls">
					<input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" class="form-control" />
				</div>
			</div>';
}
add_filter( 'comment_form_field_url', 'athenea_comment_form_field_url');

// Comment
function athenea_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="form-group control-group"><label for="comment">' . __( 'Comment', 'athenea' ) . '</label><textarea class="form-control" id="comment" name="comment" rows="5" aria-required="true"></textarea></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'athenea' ), '<pre>' . allowed_tags() . '</pre>' ) . '<div class="form-actions">',	 
		'title_reply'			=>	'<legend>' . __( 'Leave a reply', 'athenea' ) . '</legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'athenea' ). '</legend>',	
		'must_log_in'			=>	'<div class="must-log-in control-group controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'athenea' ), 
		wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as control-group controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'athenea' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
add_filter( 'comment_form_defaults', 'athenea_comment_form_defaults' );


// Template for comments and pingbacks.
if ( ! function_exists( 'athenea_comment' ) ) :
 
function athenea_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( 'pingback' == $comment->comment_type OR 'trackback' == $comment->comment_type ) : ?>
	
	<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
      <p class="row">
	  <strong class="ping-label span1"><?php _e( 'Pingback:', 'athenea' ); ?></strong>
	  <span class="span7"><?php comment_author_link(); edit_comment_link( __( 'Edit', 'athenea' ), '<span class="sep">&nbsp;</span><span class="edit-link label">', '</span>' ); ?></span>
      </p>
	
	<?php else:
		$offset	=	$depth - 1;
		$span	=	7 - $offset; ?>
		
		<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<article id="comment-<?php comment_ID(); ?>" class="comment row">
				<div class="comment-author-avatar span1<?php if ($offset) echo " offset{$offset}"; ?>">
					<?php echo get_avatar( $comment, 70 ); ?>
				</div>
				<footer class="comment-meta span<?php echo $span; ?>">
					<p class="comment-author vcard">
						<?php
							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s <span class="says">said</span> on %2$s:', 'athenea' ),
								sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
								sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									sprintf( __( '%1$s at %2$s', 'athenea' ), get_comment_date(), get_comment_time() )
								)
							);
							edit_comment_link( __( 'Edit', 'athenea' ), '<span class="sep">&nbsp;</span><span class="edit-link label">', '</span>' ); ?>
					</p><!-- .comment-author .vcard -->
	
					<?php if ( ! $comment->comment_approved ) : ?>
					<div class="comment-awaiting-moderation alert alert-info"><em><?php _e( 'Your comment is awaiting moderation.', 'athenea' ); ?></em></div>
					<?php endif; ?>
	
				</footer><!-- .comment-meta -->
	
				<div class="conmment">
					<?php
					comment_text();
					comment_reply_link( array_merge( $args, array(
						'reply_text'	=>	__( 'Reply <span>&darr;</span>', 'athenea' ),
						'depth'			=>	$depth,
						'max_depth'		=>	$args['max_depth']
					) ) ); ?>
				</div><!-- .comment-content -->
			</article><!-- #comment-<?php comment_ID(); ?> .comment -->
			
	<?php endif; // comment_type
}
endif; // ends check for athenea_comment()


// Styling a form box
function athenea_comment_form_top() {
	echo '<div class="conmment_formu">';
}
add_action( 'comment_form_top', 'athenea_comment_form_top' );


// Close box style form
function athenea_comment_form() {
	echo '</div></div>';
}
add_action( 'comment_form', 'athenea_comment_form' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

function athenea_print_imghead_style() { ?>
<style type="text/css">
<?php if ( get_header_image() ) : ?>
#imgHead {
background: url(<?php header_image(); ?>) no-repeat center bottom fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
height: 200px;
width: 100%;
z-index:-999;
top:0px;
bottom:0px;
left:0px;
padding: 20px 0px 10px 0px;
}
<?php endif; ?>
</style>
<?php }
add_action( 'wp_head', 'athenea_print_imghead_style' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
// Customizer additions.
require get_template_directory() . '/inc/customizer.php';
// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
// Estilo del menu con bootstrap
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
// Video responsive
if(!function_exists('video_content_filter')) {
  function video_content_filter($content) {
	$pattern = '/<iframe.*?src=".*?(vimeo|justin|ustream|youtu\.?be).*?".*?<\/iframe>/';
	preg_match_all($pattern, $content, $matches);
	foreach ($matches[0] as $match) {
	  $wrappedframe = '<div class="flex-video">' . $match . '</div>';
	  $content = str_replace($match, $wrappedframe, $content);
	}
	return $content;
  }
  add_filter( 'the_content', 'video_content_filter' );
  add_filter( 'widget_text', 'video_content_filter' );
}
// Add optionsframework
if ( !function_exists( 'optionsframework_init' ) ) {
    define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
    require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts()
{ ?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>
<?php
}

/* Donativos */
// Athenea opciones con sidebar
add_action( 'optionsframework_after','athenea_options_display_sidebar' );

function athenea_options_display_sidebar() { ?>
<div id="optionsframework-sidebar">
  <div class="metabox-holder">
    <div class="postbox">
      <h3><?php esc_attr_e( 'Do you like the theme Athenea?', 'athenea' ); ?><br>
      <span style="color:#090"><?php esc_attr_e( 'Buy me a coffee!', 'athenea' ); ?></span></h3>
      <div class="inside"> 
      <p><?php esc_attr_e( 'Help us keep working for you on the update of this issue and the improvement. You can make a donation to your choice or collaboration with the developer :-)', 'athenea' ); ?></p>
      
      <div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
      <strong><?php esc_attr_e( 'Collaborate', 'athenea' ); ?></strong>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="HL8GKV7SVC42G">
      
      <input type="hidden" name="on0" value="Collaboration"><br>
      <select name="os0">
          <option value="for Coffee"><?php esc_attr_e( 'for Coffee &#8364;0,80 EUR', 'athenea' ); ?></option>
          <option value="for Coca-Cola"><?php esc_attr_e( 'for Coca-Cola &#8364;1,20 EUR', 'athenea' ); ?></option>
          <option value="for Beer"><?php esc_attr_e( 'for Beer &#8364;1,45 EUR', 'athenea' ); ?></option>
          <option value="for a Burger"><?php esc_attr_e( 'for a Burger &#8364;2,00 EUR', 'athenea' ); ?></option>
          <option value="All"><?php esc_attr_e( 'All &#8364;5,45 EUR', 'athenea' ); ?></option>
      </select><br>
      <input type="hidden" name="on1" value="Opinion"><?php esc_attr_e( 'Opinion', 'athenea' ); ?><br>
      <select name="os1">
          <option value="Very good"><?php esc_attr_e( 'Very good', 'athenea' ); ?></option>
          <option value="Good"><?php esc_attr_e( 'Good', 'athenea' ); ?></option>
          <option value="Not bad"><?php esc_attr_e( 'Not bad', 'athenea' ); ?></option>
          <option value="Keep working"><?php esc_attr_e( 'Keep working', 'athenea' ); ?></option>
      </select><br>
      <input type="hidden" name="currency_code" value="EUR">
      <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal. La forma rapida y segura de pagar en Internet.">
      <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
      </form>
      </div>
      
      <div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
      <strong><?php esc_attr_e( 'Voluntary donation', 'athenea' ); ?></strong>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="T7UW8BYKFML6Q">
      <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rapida y segura de pagar en Internet.">
      <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
      </form>
      </div>
      <p><strong><a href="<?php echo esc_url( __( 'http://www.ibermega.com/themes/athenea/', 'athenea' ) ); ?>"><?php _e('Athenea Documentation','athenea'); ?></a></strong></p>
      </div>
    </div>
  </div>
</div>
<?php }