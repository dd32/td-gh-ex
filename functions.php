<?php
/**
 * @package BestCorporate
 * @since BestCorporate 1.7
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 650; /* pixels */

if ( ! function_exists( 'bestcorporate_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function bestcorporate_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'bestcorporate', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'bestcorporate' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
	
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'add_editor_style' );
	
	add_theme_support( 'custom-background', array(
	// Background color default
	'default-color' => 'fff',
	// Background image default
	'default-image' => get_template_directory_uri() . '/images/background.jpg'
) );
	
	add_theme_support( 'custom-header', array(
	// Header image default
	'default-image'			=> get_template_directory_uri() . '/images/logo.png',
	// Header text display default
	'header-text'			=> true,
	// Header text color default
	'default-text-color'		=> '000',
	// Header image width (in pixels)
	'width'				=> 220,
	// Header image height (in pixels)
	'height'			=> 90
) );
}
endif; // bestcorporate_setup

// filter function for wp_title
function bestcorporate_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'bestcorporate_filter_wp_title', 10, 3 );

/**
 * Tell WordPress to run bestcorporate_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'bestcorporate_setup' );

/**
 * Set a default theme color array for WP.com.
 */
$themecolors = array(
	'bg' => 'ffffff',
	'border' => 'eeeeee',
	'text' => '444444',
);


function bestcorporate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bestcorporate_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function bestcorporate_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'bestcorporate' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widgetbox"><div class="widgetbottom">',
		'after_widget' => "</div></div></aside>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'init', 'bestcorporate_widgets_init' );

function bestcorporate_enqueue_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'bestcorporate_enqueue_comment_reply' );

/**
 * Theme Options
 */
$bc_options = get_option('bestcorporate_theme_options');
//Return array for theme options
function bestcorporate_theme_options_items(){
	$items = array (
		array(
			'id' => 'logo_src',
			'name' => 'Logo Upload',
			'desc' => 'Need to replace or remove default logo? <a href="themes.php?page=custom-header">Click here</a>.'
		),
		array(
			'id' => 'rss_url',
			'name' => 'RSS URL','bestcorporate',
			'desc' => 'Put your full rss subscribe address here.(with http://). If empty, auto-set system defaults.'
		)
	);
	return $items;
}
add_action( 'admin_init', 'bestcorporate_theme_options_init' );
add_action( 'admin_menu', 'bestcorporate_theme_options_add_page' );
function bestcorporate_theme_options_init(){
	register_setting( 'bestcorporate_options', 'bestcorporate_theme_options','bestcorporate_options_validate' );
}
function bestcorporate_theme_options_add_page() {
	add_theme_page( __( 'Theme Options','bestcorporate' ), __( 'Theme Options','bestcorporate' ), 'edit_theme_options', 'theme_options', 'bestcorporate_theme_options_do_page' );
}
function bestcorporate_theme_options_do_page() {
	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;
?>

<div class="wrap">
  <?php screen_icon(); echo "<h2>" . sprintf( __('%1$s Theme Options','bestcorporate'), get_current_theme() )	 . "</h2>"; ?>
  <?php settings_errors(); ?>
  <div id="poststuff" class="metabox-holder">
    <form method="post" action="options.php">
      <div class="stuffbox">
        <h3>
          <label for="link_url">
          <?php _e('General settings','bestcorporate'); ?>
          </label>
        </h3>
        <div class="inside">
          <?php settings_fields( 'bestcorporate_options' ); ?>
          <?php $options = get_option( 'bestcorporate_theme_options' ); ?>
          <table class="form-table">
            <?php foreach (bestcorporate_theme_options_items() as $item) { ?>
            <?php if ($item['id'] == 'logo_src') { ?>
           <tr valign="top">
              <th scope="row"><?php echo esc_attr($item['name']); ?></th>
              <td><label class="description"><?php echo $item['desc']; ?></label>
              </td>
            </tr> 
            <?php } 
			else{?>
            <tr valign="top" style="margin-top:5px;border-top:1px solid #e1e1e1;">
              <th scope="row"><?php echo esc_attr($item['name']); ?></th>
              <td><input name="<?php echo 'bestcorporate_theme_options['.esc_attr($item['id']).']'; ?>" type="text" value="<?php if ( $options[esc_attr($item['id'])] != "") { echo $options[esc_attr($item['id'])]; } else { echo ''; } ?>" size="80" />
                <br/>
                <label class="description"><?php echo $item['desc']; ?></label>
              </td>
            </tr>
            <?php } ?>
            <?php } ?>
          </table>
        </div>
      </div>
      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Options','bestcorporate'); ?>" />
      </p>
    </form>
  </div>
</div>
<?php
}

function bestcorporate_options_validate($input) {
	$input['logo_src'] = esc_url_raw($input['logo_src']);
	$input['rss_url'] = esc_url_raw($input['rss_url']);
	return $input;
}


add_filter('feed_link','bestcorporate_custom_feed_link',1,2);

function bestcorporate_custom_feed_link($output, $feed) {
	$bc_options = get_option( 'bestcorporate_theme_options' );	
	if($bc_options['rss_url']!='')
	{$feed_url = esc_url_raw($bc_options['rss_url']);
	$feed_array = array('rss' => $feed_url, 'rss2' => $feed_url, 'atom' => $feed_url, 'rdf' => $feed_url, 'comments_rss2' => '');
	$feed_array[$feed] = $feed_url;
	$output = $feed_array[$feed];
	}
	return $output;
}

if ( ! function_exists( 'bestcorporate_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 */
function bestcorporate_content_nav( $nav_id ) {
	global $wp_query;

	?>
<nav id="<?php echo $nav_id; ?>">
  <h1 class="assistive-text section-heading">
    <?php _e( 'Post navigation', 'bestcorporate' ); ?>
  </h1>
  <?php if ( is_single() ) : // navigation links for single posts ?>
  <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bestcorporate' ) . '</span> %title' ); ?>
  <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bestcorporate' ) . '</span>' ); ?>
  <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
  <?php if ( get_next_posts_link() ) : ?>
  <div class="nav-previous">
    <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bestcorporate' ) ); ?>
  </div>
  <?php endif; ?>
  <?php if ( get_previous_posts_link() ) : ?>
  <div class="nav-next">
    <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bestcorporate' ) ); ?>
  </div>
  <?php endif; ?>
  <?php endif; ?>
</nav>
<!-- #<?php echo $nav_id; ?> -->
<?php
}
endif; // bestcorporate_content_nav


if ( ! function_exists( 'bestcorporate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bestcorporate_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function bestcorporate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
<li class="pingback">
  <p>
    <?php _e( 'Pingback:', 'bestcorporate' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'bestcorporate' ), ' ' ); ?>
  </p></li>
  <?php
			break;
		default :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment">
    <footer>
      <div class="comment-author vcard"> <?php echo get_avatar( $comment, 100 ); ?> <?php printf( __( '%s <span class="says">says:</span>', 'bestcorporate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> </div>
      <!-- .comment-author .vcard -->
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em>
      <?php _e( 'Your comment is awaiting moderation.', 'bestcorporate' ); ?>
      </em> <br />
      <?php endif; ?>
      <div class="comment-meta commentmetadata"> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
        <time pubdate datetime="<?php comment_time( 'c' ); ?>">
          <?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'bestcorporate' ), get_comment_date(), get_comment_time() ); ?>
        </time>
        <?php edit_comment_link( __( '(Edit)', 'bestcorporate' ), ' ' );
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
</li>
<?php
	break;
	endswitch;
}
endif; // ends check for bestcorporate_comment()

if ( ! function_exists( 'bestcorporate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bestcorporate_posted_on to override in a child theme
 *
 */
function bestcorporate_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bestcorporate' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bestcorporate' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 */
function bestcorporate_categorized_blog() {
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
  // This blog has more than 1 category so bestcorporate_categorized_blog should return true
  return true;
  } else {
  // This blog has only 1 category so bestcorporate_categorized_blog should return false
  return false;
  }
  }
  
  /**
  * Flush out the transients used in bestcorporate_categorized_blog
  *
  */
  function bestcorporate_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
  }
  add_action( 'edit_category', 'bestcorporate_category_transient_flusher' );
  add_action( 'save_post', 'bestcorporate_category_transient_flusher' );
  
  /**
  * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
  */
  function bestcorporate_enhanced_image_navigation( $url ) {
  global $post, $wp_rewrite;
  
  $id = (int) $post->ID;
  $object = get_post( $id );
  if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
  $url = $url . '#main';
  
  return $url;
  }
  add_filter( 'attachment_link', 'bestcorporate_enhanced_image_navigation' );
