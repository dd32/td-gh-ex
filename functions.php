<?php
/**
 * @package BestCorporate
 * @since BestCorporate 1.5
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 650; /* pixels */

if ( ! function_exists( 'best_corporate_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function best_corporate_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'best-corporate', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'best-corporate' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
	
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'add_editor_style' );
	add_theme_support( 'add_custom_image_header' );
	add_theme_support( 'add_custom_background' );
	
	
	// This theme allows users to set a custom background
	add_custom_background();

	define('HEADER_TEXTCOLOR', '');
    define('HEADER_IMAGE', '%s/images/logo.png'); // %s is the template dir uri
    define('HEADER_IMAGE_WIDTH', 220); // use width and height appropriate for your theme
    define('HEADER_IMAGE_HEIGHT', 90);
    define('NO_HEADER_TEXT', true);
	add_custom_image_header('', 'admin_header_style');
}
endif; // best_corporate_setup



/**
 * Tell WordPress to run best_corporate_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'best_corporate_setup' );

/**
 * Set a default theme color array for WP.com.
 */
$themecolors = array(
	'bg' => 'ffffff',
	'border' => 'eeeeee',
	'text' => '444444',
);

 
 if ( ! function_exists( 'admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().

 */
function admin_header_style() {}
endif;

function best_corporate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'best_corporate_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function best_corporate_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'best-corporate' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widgetbox"><div class="widgetbottom">',
		'after_widget' => "</div></div></aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'init', 'best_corporate_widgets_init' );

function best_corporate_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'best_corporate_enqueue_comment_reply' );

/**
 * Theme Options
 */
$bc_options = get_option('best_corporate_theme_options');
//Return array for theme options
function best_corporate_theme_options_items(){
	$items = array (
		array(
			'id' => 'logo_src',
			'name' => __('Logo Upload','best-corporate'),
			'desc' => __('Need to replace or remove default logo? <a href="themes.php?page=custom-header">Click here</a>.','best-corporate')
		),
		array(
			'id' => 'rss_url',
			'name' => __('RSS URL','best-corporate'),
			'desc' => __('Put your full rss subscribe address here.(with http://). If empty, auto-set system defaults.','best-corporate')
		)
	);
	return $items;
}
add_action( 'admin_init', 'best_corporate_theme_options_init' );
add_action( 'admin_menu', 'best_corporate_theme_options_add_page' );
function best_corporate_theme_options_init(){
	register_setting( 'best_corporate_options', 'best_corporate_theme_options','best_corporate_options_validate' );
}
function best_corporate_theme_options_add_page() {
	add_theme_page( __( 'Theme Options','best-corporate' ), __( 'Theme Options','best-corporate' ), 'edit_theme_options', 'theme_options', 'best_corporate_theme_options_do_page' );
}
function best_corporate_theme_options_do_page() {
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;
?>

<div class="wrap">
  <?php screen_icon(); echo "<h2>" . sprintf( __('%1$s Theme Options','best-corporate'), get_current_theme() )	 . "</h2>"; ?>
  <?php settings_errors(); ?>
  <div id="poststuff" class="metabox-holder">
    <form method="post" action="options.php">
      <div class="stuffbox">
        <h3>
          <label for="link_url">
          <?php _e('General settings','best-corporate'); ?>
          </label>
        </h3>
        <div class="inside">
          <?php settings_fields( 'best_corporate_options' ); ?>
          <?php $options = get_option( 'best_corporate_theme_options' ); ?>
          <table class="form-table">
            <?php foreach (best_corporate_theme_options_items() as $item) { ?>
            <?php if ($item['id'] == 'logo_src') { ?>
           <tr valign="top">
              <th scope="row"><?php echo esc_attr($item['name']); ?></th>
              <td><label class="description"><?php echo esc_attr($item['desc']); ?></label>
              </td>
            </tr> 
            <?php } 
			else{?>
            <tr valign="top" style="margin-top:5px;border-top:1px solid #e1e1e1;">
              <th scope="row"><?php echo esc_attr($item['name']); ?></th>
              <td><input name="<?php echo 'best_corporate_theme_options['.esc_attr($item['id']).']'; ?>" type="text" value="<?php if ( $options[esc_attr($item['id'])] != "") { echo $options[esc_attr($item['id'])]; } else { echo ''; } ?>" size="80" />
                <br/>
                <label class="description"><?php echo esc_attr($item['desc']); ?></label>
              </td>
            </tr>
            <?php } ?>
            <?php } ?>
          </table>
        </div>
      </div>
      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Options','best-corporate'); ?>" />
      </p>
    </form>
  </div>
</div>
<?php
}

function best_corporate_options_validate($input) {
	$input['logo_src'] = esc_url_raw($input['logo_src']);
	$input['rss_url'] = esc_url_raw($input['rss_url']);
	return $input;
}


add_filter('feed_link','best_corporate_custom_feed_link',1,2);

function best_corporate_custom_feed_link($output, $feed) {
	$bc_options = get_option( 'best_corporate_theme_options' );	
	if($bc_options['rss_url']!='')
	{$feed_url = esc_url_raw($bc_options['rss_url']);
	$feed_array = array('rss' => $feed_url, 'rss2' => $feed_url, 'atom' => $feed_url, 'rdf' => $feed_url, 'comments_rss2' => '');
	$feed_array[$feed] = $feed_url;
	$output = $feed_array[$feed];
	}
	return $output;
}

if ( ! function_exists( 'best_corporate_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 */
function best_corporate_content_nav( $nav_id ) {
	global $wp_query;

	?>
<nav id="<?php echo $nav_id; ?>">
  <h1 class="assistive-text section-heading">
    <?php _e( 'Post navigation', 'best-corporate' ); ?>
  </h1>
  <?php if ( is_single() ) : // navigation links for single posts ?>
  <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'best-corporate' ) . '</span> %title' ); ?>
  <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'best-corporate' ) . '</span>' ); ?>
  <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
  <?php if ( get_next_posts_link() ) : ?>
  <div class="nav-previous">
    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'best-corporate' ) ); ?>
  </div>
  <?php endif; ?>
  <?php if ( get_previous_posts_link() ) : ?>
  <div class="nav-next">
    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'best-corporate' ) ); ?>
  </div>
  <?php endif; ?>
  <?php endif; ?>
</nav>
<!-- #<?php echo $nav_id; ?> -->
<?php
}
endif; // best_corporate_content_nav


if ( ! function_exists( 'best_corporate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own best_corporate_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function best_corporate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
<li class="pingback">
  <p>
    <?php _e( 'Pingback:', 'best-corporate' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'best-corporate' ), ' ' ); ?>
  </p>
  <?php
			break;
		default :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment">
    <footer>
      <div class="comment-author vcard"> <?php echo get_avatar( $comment, 100 ); ?> <?php printf( __( '%s <span class="says">says:</span>', 'best-corporate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> </div>
      <!-- .comment-author .vcard -->
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em>
      <?php _e( 'Your comment is awaiting moderation.', 'best-corporate' ); ?>
      </em> <br />
      <?php endif; ?>
      <div class="comment-meta commentmetadata"> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
        <time pubdate datetime="<?php comment_time( 'c' ); ?>">
          <?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'best-corporate' ), get_comment_date(), get_comment_time() ); ?>
        </time>
        </a>
        <?php edit_comment_link( __( '(Edit)', 'best-corporate' ), ' ' );
					?>
      </div>
      <!-- .comment-meta .commentmetadata -->
    </footer>
    <div class="comment-content">
      <?php comment_text(); ?>
    </div>
    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <!-- .reply -->
  </article>
  <!-- #comment-## -->
  <?php
			break;
	endswitch;
}
endif; // ends check for best_corporate_comment()

if ( ! function_exists( 'best_corporate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own best_corporate_posted_on to override in a child theme
 *
 */
function best_corporate_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'best-corporate' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'best-corporate' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 */
function best_corporate_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'best_corporate_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 */
function best_corporate_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
  ) );
  
  // Count the number of categories that are attached to the posts
  $all_the_cool_cats = count( $all_the_cool_cats );
  
  set_transient( 'all_the_cool_cats', $all_the_cool_cats );
  }
  
  if ( '1' != $all_the_cool_cats ) {
  // This blog has more than 1 category so best_corporate_categorized_blog should return true
  return true;
  } else {
  // This blog has only 1 category so best_corporate_categorized_blog should return false
  return false;
  }
  }
  
  /**
  * Flush out the transients used in best_corporate_categorized_blog
  *
  */
  function best_corporate_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
  }
  add_action( 'edit_category', 'best_corporate_category_transient_flusher' );
  add_action( 'save_post', 'best_corporate_category_transient_flusher' );
  
  /**
  * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
  */
  function best_corporate_enhanced_image_navigation( $url ) {
  global $post, $wp_rewrite;
  
  $id = (int) $post->ID;
  $object = get_post( $id );
  if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
  $url = $url . '#main';
  
  return $url;
  }
  add_filter( 'attachment_link', 'best_corporate_enhanced_image_navigation' );
