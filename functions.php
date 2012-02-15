<?php
/**
 * @package AKYUZ
 * @since Akyuz 1.0
 */

define( 'AKYUZ_TEXT_DOMAIN',       'akyuz' );
define( 'AKYUZ_SHORTNAME',         'akyuz' );
define( 'AKYUZ_THEMENAME',         'akyuz' );
define( 'AKYUZ_THEMENAME_OP_VER',  'v1.0.0' );
define( 'AKYUZ_THEMENAME_OP_NAME', 'Akyuz Administration Panel' );
define( 'AKYUZ_OPTIONSGROUPNAME',  'akyuz_options' );
define( 'AKYUZ_OPTIONSNAME',       'akyuz_options' );
define( 'AKYUZ_OPTIONSPAGENAME',   'akyuz-options-page' );

if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run akyuz_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'akyuz_setup' );

if ( ! function_exists( 'akyuz_setup' ) ):
/**
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Akyuz 1.0
 */
function akyuz_setup() {

	/* Make Akyuz available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( AKYUZ_TEXT_DOMAIN, get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory() . '/functions/akyuz-theme-options.php' );


	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', AKYUZ_TEXT_DOMAIN ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image', 'video', 'audio', 'chat' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// The default header text color

	register_nav_menus( array(
		'primary'   => __( 'Main Navigation', AKYUZ_TEXT_DOMAIN ),
		'secondary' => __( 'Top Navigation',  AKYUZ_TEXT_DOMAIN ),
	) );

	// By leaving empty, we allow for random image rotation.

	// The height and width of your custom header.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 943 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 190 ) );
	define( 'NO_HEADER_TEXT', false );
	define( 'HEADER_TEXTCOLOR', '');

	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Akyuz's custom image sizes
	add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
	add_image_size( 'small-feature', 573, 320 ); // Used for featured posts if a large-feature doesn't exist

	// Turn on random header image rotation by default.
	add_theme_support( 'custom-header' );

	// Add a way for the custom header to be styled in the admin panel that controls
	add_custom_image_header( 'akyuz_header_style', 'akyuz_admin_header_style', 'akyuz_admin_header_image' );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'wheel' => array(
			'url' => '%s/images/headers/wheel.jpg',
			'thumbnail_url' => '%s/images/headers/wheel-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Wheel', AKYUZ_TEXT_DOMAIN )
		),
		'shore' => array(
			'url' => '%s/images/headers/shore.jpg',
			'thumbnail_url' => '%s/images/headers/shore-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Shore', AKYUZ_TEXT_DOMAIN )
		),
		'trolley' => array(
			'url' => '%s/images/headers/trolley.jpg',
			'thumbnail_url' => '%s/images/headers/trolley-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Trolley', AKYUZ_TEXT_DOMAIN )
		),
		'pine-cone' => array(
			'url' => '%s/images/headers/pine-cone.jpg',
			'thumbnail_url' => '%s/images/headers/pine-cone-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pine Cone', AKYUZ_TEXT_DOMAIN )
		),
		'chessboard' => array(
			'url' => '%s/images/headers/chessboard.jpg',
			'thumbnail_url' => '%s/images/headers/chessboard-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Chessboard', AKYUZ_TEXT_DOMAIN )
		),
		'lanterns' => array(
			'url' => '%s/images/headers/lanterns.jpg',
			'thumbnail_url' => '%s/images/headers/lanterns-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Lanterns', AKYUZ_TEXT_DOMAIN )
		),
		'willow' => array(
			'url' => '%s/images/headers/willow.jpg',
			'thumbnail_url' => '%s/images/headers/willow-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Willow', AKYUZ_TEXT_DOMAIN )
		),
		'hanoi' => array(
			'url' => '%s/images/headers/hanoi.jpg',
			'thumbnail_url' => '%s/images/headers/hanoi-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Hanoi Plant', AKYUZ_TEXT_DOMAIN )
		)
	) );
}
endif; // akyuz_setup

if ( ! function_exists( 'akyuz_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Akyuz 1.0
 */
function akyuz_header_style() {
	
	// If no custom options for text are set, let's bail
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	?>
	<?php
		// Has the text been hidden?
		if ( 'blank' != get_header_textcolor() ) :
		// If the user has set a custom color for the text use that
	?>
	<style type="text/css">
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	</style>
	<?php endif; ?>
	<?php
		// Has the text been hidden?
		if ( '' != header_image() ) :
		// If the user has set a custom color for the text use that
	?>
	<style type="text/css">
		#sa_branding {background:url(<?php echo header_image(); ?>) top left no-repeat;background-position:center;}
	</style>
	<?php endif; ?>
	
	<?php
}
endif; // akyuz_header_style

if ( ! function_exists( 'akyuz_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Akyyuz 1.0
 */
function akyuz_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 978px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // akyuz_admin_header_style

if ( ! function_exists( 'akyuz_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @since Akyuz 1.0
 */
function akyuz_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // akyuz_admin_header_image

/**
 * Sets the post excerpt length to 80 words.
 *
 * @since Akyuz 1.0
 */
function akyuz_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'akyuz_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function akyuz_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 */
function akyuz_auto_excerpt_more( $more ) {
	return ' &hellip;' . akyuz_continue_reading_link();
}
add_filter( 'excerpt_more', 'akyuz_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function akyuz_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= akyuz_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'akyuz_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function akyuz_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'akyuz_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Akyuz 1.0
 */
function akyuz_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Page Sidebar', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Page Template', AKYUZ_TEXT_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', AKYUZ_TEXT_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', AKYUZ_TEXT_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', AKYUZ_TEXT_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Area Four', AKYUZ_TEXT_DOMAIN ),
		'id' => 'sidebar-6',
		'description' => __( 'An optional widget area for your site footer', AKYUZ_TEXT_DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'akyuz_widgets_init' );

if ( ! function_exists( 'akyuz_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function akyuz_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="span-24 last">
			<h3 class="assistive-text"><?php _e( 'Post navigation', AKYUZ_TEXT_DOMAIN ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', AKYUZ_TEXT_DOMAIN ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', AKYUZ_TEXT_DOMAIN ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // akyuz_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Akyuz 1.0
 */
function akyuz_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function akyuz_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'akyuz_comment' ) ) :

/**
 * Template for comments and pingbacks.
 *
 * @since Akyuz 1.0
 */
function akyuz_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', AKYUZ_TEXT_DOMAIN ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', AKYUZ_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<?php
				$avatar_size = 68;
				if ( '0' != $comment->comment_parent )
					$avatar_size = 39;
				echo get_avatar( $comment, $avatar_size );
			?>
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						printf(__( '%1$s <span class="says">said:</span>', AKYUZ_TEXT_DOMAIN ),
							sprintf( '<cite class="fn" title="%1$s"><a href="%1$s" title="%2$s" class="url" rel="external nofollow">%3$s</a></cite>', 
								get_comment_author_link(),
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_author_link()
							)
						);
					?>
				</div><!-- .comment-author .vcard --> 
				<span class="published">
					<?php
						printf(__( '%1$s ', AKYUZ_TEXT_DOMAIN ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', AKYUZ_TEXT_DOMAIN ), get_comment_date(), get_comment_time() )
							)
						);
					?>

				</span>
				
				| <a class="permalink" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) );?>" title="Permalink to comment <?php comment_ID();?>">Permalink</a>
				| <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', AKYUZ_TEXT_DOMAIN ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', AKYUZ_TEXT_DOMAIN ); ?></em>
				<?php endif; ?>
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for akyuz_comment()

if ( ! function_exists( 'akyuz_posted_on' ) ) :
/**
 * @since Akyuz 1.0
 */
function akyuz_posted_on() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> - </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', AKYUZ_TEXT_DOMAIN ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('j M') ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', AKYUZ_TEXT_DOMAIN ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/**
 * Adds two classes to the array of body classes.
 *
 * @since Akyuz 1.0
 */
function akyuz_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'akyuz_body_classes' );

/*
 * Akyuz Get Options Value Function
 */
if ( ! function_exists( 'akyuz_get_options_value' ) ) :
	function akyuz_get_options_value($akyuz_options){
		$my_options = get_option( AKYUZ_OPTIONSNAME );
		return $my_options[$akyuz_options];
	}
endif;

/*
 * Akyuz Get Social Bar Function
 */
if ( ! function_exists( 'akyuz_get_social_bar' ) ) :
	function akyuz_get_social_bar(){

		$my_options = get_option( AKYUZ_OPTIONSNAME );
		
		if ( isset($my_options[AKYUZ_SHORTNAME.'_social_enable']))?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_rss_url'];?>" title="Feedburner"><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/rss_16.png" alt="<?php bloginfo( 'name' );?>- Feedburner" width="16px" height="16px" title="<?php bloginfo('name');?>- Feedburner" /></a>
		<?php
		if (isset($my_options[AKYUZ_SHORTNAME.'_social_enable'])) {
			      if ( $my_options[AKYUZ_SHORTNAME.'_social_facebook_url'] !='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_facebook_url'];?>"  title="Facebook" ><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png"  alt="<?php bloginfo( 'name' );?>- Facebook"  width="16px" height="16px" title="<?php bloginfo('name');?>- Facebook" /></a><?php endif; ?>
			<?php if ( $my_options[AKYUZ_SHORTNAME.'_social_twitter_url']  !='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_twitter_url'];?>"   title="Twitter"  ><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png"   alt="<?php bloginfo( 'name' );?>- Twitter"   width="16px" height="16px" title="<?php bloginfo('name');?>- Twitter" /></a><?php endif; ?>
			<?php if ( $my_options[AKYUZ_SHORTNAME.'_social_youtube_url']  !='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_youtube_url'];?>"   title="Youtube"  ><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png"   alt="<?php bloginfo( 'name' );?>- Youtube"   width="16px" height="16px" title="<?php bloginfo('name');?>- Youtube" /></a><?php endif; ?>
			<?php if ( $my_options[AKYUZ_SHORTNAME.'_social_flickr_url']   !='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_flickr_url'];?>"    title="Flickr"   ><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png"    alt="<?php bloginfo( 'name' );?>- Flickr"    width="16px" height="16px" title="<?php bloginfo('name');?>- Flickr" /></a><?php endif; ?>
			<?php if ( $my_options[AKYUZ_SHORTNAME.'_social_linkedin_url'] !='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_linkedin_url'];?>"  title="Linkedin" ><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png"  alt="<?php bloginfo( 'name' );?>- Linkedin"  width="16px" height="16px" title="<?php bloginfo('name');?>- Linkedin" /></a><?php endif; ?>
			<?php if ( $my_options[AKYUZ_SHORTNAME.'_social_delicious_url']!='http://'): ?> <a href="<?php echo $my_options[AKYUZ_SHORTNAME.'_social_delicious_url'];?>" title="Delicious"><img class="top_social_bar" src="<?php echo get_template_directory_uri(); ?>/images/social/delicious.png" alt="<?php bloginfo( 'name' );?>- Delicious" width="16px" height="16px" title="<?php bloginfo('name');?>- Delicious" /></a><?php endif; ?>
			<?php 
		}
	}
endif;


if ( ! function_exists( 'akyuz_get_post_meta_top_bar' ) ) :
	function akyuz_get_post_meta_top_bar(){
	?>
		<div class="sa-entry-meta span-15 last">
			<?php $show_sep = false; ?>
			<?php if ('post'== get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php 
				$categories_list = get_the_category_list( __( ' - ', AKYUZ_TEXT_DOMAIN ) );
				$categories_list = str_replace('rel="category tag"', 'rel="category"', $categories_list);
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '%1$s', AKYUZ_TEXT_DOMAIN ), $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if 'post' == get_post_type() ?>

		</div>
	
	<?php
	}
endif;

if ( ! function_exists( 'akyuz_get_post_meta_bottom_bar_loop' ) ) :
	function akyuz_get_post_meta_bottom_bar_loop(){
	?>
		<footer class="sa-entry-meta-footer-loop span-15 last">
			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php $tags_list = get_the_tag_list( '', __( ', ', AKYUZ_TEXT_DOMAIN ) );
				if ( $tags_list ):
					if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '%1$s', AKYUZ_TEXT_DOMAIN ), $tags_list );
				$show_sep = true; ?>
			</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php edit_post_link( __( 'Edit', AKYUZ_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	<?php
	}
endif;

if ( ! function_exists( 'akyuz_get_post_meta_bottom_bar' ) ) :
	function akyuz_get_post_meta_bottom_bar(){
	?>
		<footer class="sa-entry-meta-footer span-15 last">
		<?php $show_sep = false; ?>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php $tags_list = get_the_tag_list( '', __( ', ', AKYUZ_TEXT_DOMAIN ) );
			if ( $tags_list ):
			if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '%1$s', AKYUZ_TEXT_DOMAIN ), $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php edit_post_link( __( 'Edit', AKYUZ_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
	<?php
	}
endif;


if ( ! function_exists( 'akyuz_get_post_header_bar' ) ) :
	function akyuz_get_post_header_bar(){
	?>
		<?php 
		$format = get_post_format();
		if ( false === $format )
			$format = 'standard';
		?>

		<header class="sa-entry-header span-15 last">
			<h1 class="sa-entry-title span-10">
				<a class="post2-<?php echo $format;?>" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', AKYUZ_TEXT_DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" ><?php the_title(); ?></a>
			</h1>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="sa-entry-meta-top span-5 last">
				<?php akyuz_posted_on(); ?>
				<?php if ( comments_open() && ! post_password_required() ) : ?>
					-<span class="comments-link">
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', AKYUZ_TEXT_DOMAIN ) . '</span>', _x( '1', 'comments number', AKYUZ_TEXT_DOMAIN ), _x( '%', 'comments number', AKYUZ_TEXT_DOMAIN ) ); ?>
					</span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</header>

	<?php
	}
endif;

/**************************
 * Paginations Function
 **************************/
function pagination($pages = '', $range = 4){
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {$pages = 1;}
     } 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; " . __("First", AKYUZ_TEXT_DOMAIN) . "</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __("Previous", AKYUZ_TEXT_DOMAIN) . "</a>";
 
         for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
          if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">" . __("Next", AKYUZ_TEXT_DOMAIN) . " &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>" . __("Last", AKYUZ_TEXT_DOMAIN) . " &raquo;</a>";
         echo "</div>\n";
     }
}

add_action('wp_enqueue_scripts','akyuz_scripts_function');

function akyuz_scripts_function() {
	wp_enqueue_style('BluPrintResetCss',  get_stylesheet_directory_uri() . '/css/reset.css', false);
	wp_enqueue_style('BluPrintScreenCss', get_stylesheet_directory_uri() . '/css/blueprint/screen.css', false);
	wp_enqueue_style('BluPrintPrintCss',  get_stylesheet_directory_uri() . '/css/blueprint/print.css', false, '1.0','print');
	wp_enqueue_style('BluPrintIECss',     get_stylesheet_directory_uri() . '/css/blueprint/ie.css', false);
	wp_enqueue_style('jqslidemenu_css',   get_stylesheet_directory_uri() . '/functions/menu/jqueryslidemenu.css', false);
	wp_enqueue_script("jquery");
	wp_register_script('jqslidemenu_scr', get_stylesheet_directory_uri() . '/functions/menu/jqueryslidemenu.js', false);
	wp_enqueue_script('jqslidemenu_scr');

}

//add_filter( 'use_default_gallery_style', '__return_false' );
?>