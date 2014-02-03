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

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Athenea, use a find and replace
	 * to change 'athenea' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'athenea', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	add_editor_style();

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'athenea' ),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'athenea_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // athenea_setup
add_action( 'after_setup_theme', 'athenea_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
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

/**
 * Enqueue scripts and styles.
 */
function athenea_scripts() {
	
	wp_enqueue_script( 'jquery');
	
	wp_enqueue_style( 'athenea-style', get_stylesheet_uri() );

	wp_enqueue_script( 'athenea-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'athenea-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
    wp_register_script('bootstrap', get_template_directory_uri().'/inc/dist/js/bootstrap.min.js', false, '3.0.3', true, array('all'));
    wp_enqueue_script('bootstrap');
   
    wp_register_style('bootstrap', get_template_directory_uri().'/inc/dist/css/bootstrap.min.css', false, '3.0.3', false, array('all'));
    wp_enqueue_style('bootstrap');
   
    wp_register_script('athenea-menu', get_template_directory_uri().'/js/athenea.js', false, '3.0.3', false, array('all'));
    wp_enqueue_script('athenea-menu');
	
	wp_register_style('genericons', get_template_directory_uri().'/inc/dist/genericons/genericons.css', false, '3.0.3', false, array('all'));
    wp_enqueue_style('genericons');
   
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/** Cambio de design  */
	if ( !is_admin() ) {
	  if ( of_get_option('unique_design', 'design-red' ) == 'design-red' ) {
		  wp_enqueue_style( 'athenea-red', get_template_directory_uri() . '/inc/dist/css/athenea-red-min.css' );
		  wp_enqueue_style('athenea-red');
	  } else {
		  wp_enqueue_style( 'athenea-blue', get_template_directory_uri() . '/inc/dist/css/athenea-blue-min.css' );
		  wp_enqueue_style('athenea-blue');
	  }
	}
	
}
add_action( 'wp_enqueue_scripts', 'athenea_scripts' );

/**
 * Filters comments_form() default arguments
 *
 * @author	IBERMEGA digital
 * @since	1.7.0 - 16.06.2012
 *
 * @param	array	$defaults
 *
 * @return	array
 */
function athenea_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="control-group"><label class="control-label" for="comment">' . __( 'Comment', 'athenea' ) . '</label><div class="controls"><textarea class="form-control" id="comment" name="comment" rows="8" aria-required="true"></textarea></div></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'<div class="form-allowed-tags control-group"><label class="control-label">' . sprintf( _x( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'athenea' ), '</label><div class="controls"><pre>' . allowed_tags() . '</pre></div>' ) . '</div>
									 <div class="form-actions">',
		'title_reply'			=>	'<legend>' . __( 'Leave a reply', 'athenea' ) . '</legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'athenea' ). '</legend>',
		'must_log_in'			=>	'<div class="must-log-in control-group controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'athenea' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as control-group controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'athenea' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
add_filter( 'comment_form_defaults', 'athenea_comment_form_defaults' );


if ( ! function_exists( 'athenea_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own athenea_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	object	$comment	Comment data object.
 * @param	array	$args
 * @param	int		$depth		Depth of comment in reference to parents.
 *
 * @return	void
 */
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


/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap
 * needs
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	string	$html
 *
 * @return	string
 */
function athenea_comment_form_top() {
	echo '<div class="alert alert-warning">';
}
add_action( 'comment_form_top', 'athenea_comment_form_top' );


/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap
 * needs
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	string	$html
 *
 * @return	string
 */
function athenea_comment_form() {
	echo '</div></div>';
}
add_action( 'comment_form', 'athenea_comment_form' );


/**
 * Custom author form field for the comments form
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	string	$html
 *
 * @return	string
 */
function athenea_comment_form_field_author( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-author control-group">
				<label for="author" class="control-label">' . __( 'Name', 'athenea' ) . '</label>
				<div class="controls">
					<input id="author" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" class="form-control"' . $aria_req . ' />
					' . ( $req ? '<p class="help-inline"><span class="required">' . __('required', 'athenea') . '</span></p>' : '' ) . '
				</div>
			</div>';
}
add_filter( 'comment_form_field_author', 'athenea_comment_form_field_author');


/**
 * Custom HTML5 email form field for the comments form
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	string	$html
 *
 * @return	string
 */
function athenea_comment_form_field_email( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-email control-group">
				<label for="email" class="control-label">' . __( 'Email', 'athenea' ) . '</label>
				<div class="controls">
					<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control"' . $aria_req . ' />
					<p class="help-inline">' . ( $req ? '<span class="required">' . __('required', 'athenea') . '</span>, ' : '' ) . __( 'will not be published', 'athenea' ) . '</p>
				</div>
			</div>';
}
add_filter( 'comment_form_field_email', 'athenea_comment_form_field_email');


/**
 * Custom HTML5 url form field for the comments form
 *
 * @author	IBERMEGA digital
 * @since	1.0.0 - 10.10.2013
 *
 * @param	string	$html
 *
 * @return	string
 */
function athenea_comment_form_field_url( $html ) {
	$commenter	=	wp_get_current_commenter();
	
	return	'<div class="comment-form-url control-group">
				<label for="url" class="control-label">' . __( 'Website', 'athenea' ) . '</label>
				<div class="controls">
					<input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" class="form-control" />
				</div>
			</div>';
}
add_filter( 'comment_form_field_url', 'athenea_comment_form_field_url');

/**
 * Adds IE specific scripts
 * 
 * Respond.js has to be loaded after Theme styles
 *
 * @author	IBERMEGA digital
 * @since	1.7.0 - 11.06.2012
 *
 * @return	void
 */
function athenea_print_ie_scripts() {
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<?php
}
add_action( 'wp_head', 'athenea_print_ie_scripts', 11 );

/**
 * Adds Google Analytics specific scripts
 *
 * @author	IBERMEGA digital
 * @since	1.0.2 - 03.02.2014
 *
 * @return	void
 */
function athenea_print_analytics_scripts() {
?>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo of_get_option('athenea_analitics','no entry'); ?>']);
  _gaq.push(['_setDomainName', '<?php echo of_get_option('athenea_analidom','no entry'); ?>']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php
}
add_action( 'wp_footer', 'athenea_print_analytics_scripts', 11 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/* Estilo del menu con bootstrap */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/* Agregar widget de Formulario de Contacto */
require get_template_directory() . '/inc/widgets/form.php';


/**
 * Implementar menu de shortcodes y pagina de contacto
 */
	require_once( get_template_directory() . '/inc/form.php' );

	// Agrega paginas del formulario y recibido
	global $wpdb;

	$form_page = get_page_by_title('Form Contact');
	$message_page = get_page_by_title('Message Received');
	$form_check_id = $form_page ->ID;
	$message_check_id = $message_page ->ID;
	//Formulario
	$form_page = array(
		'post_type' => 'page',
		'post_name' => 'form-contact',
		'post_title' => 'Form Contact',
		'post_content'  => '[iberthemeform]',
		'post_status' => 'publish',
		'post_author' => 1,
		'comment_status' => 'closed',
		'ping_status'   => 'closed',
		'menu_order'   => 77,
		'post_category' => array(1),
	);
	//Recibido
	$message_page = array(
		'post_type' => 'page',
		'post_name' => 'message-received',
		'post_title' => 'Message Received',
		'post_content'  => __( '<div class=\"alert alert-success\"><h3>Message Received</h3>Thank you for contacting us.<br><br>Our systems are processing your message and reply you as soon as possible.<br><br><b>Thanks for your attention</b></div>', 'athenea' ),
		'post_status' => 'publish',
		'post_author' => 1,
		'comment_status' => 'closed',
		'ping_status'   => 'closed',
		'menu_order'   => 78,
		'post_category' => array(1),
	);
	if(!isset($form_check_id)){
		wp_insert_post($form_page);
		$form_page_data = get_page_by_title('Form Contact');
		$form_page_id = $form_page_data ->ID;
		update_post_meta($form_page_id, '_wp_page_template','dashboard.php');
	}
	if(!isset($message_check_id)){
		wp_insert_post($message_page);
		$message_page_data = get_page_by_title('Message Received');
		$message_page_id = $message_page_data ->ID;
		update_post_meta($message_page_id, '_wp_page_template','dashboard.php');
	}

/**
 * Add optionsframework
 */
if ( !function_exists( 'optionsframework_init' ) ) {
    define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
    require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>
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
      <p><strong><a href="http://www.ibermega.com/themes/athenea"><?php _e('Athenea Documentation','athenea'); ?></a></strong></p>
      </div>
    </div>
  </div>
</div>
<?php }