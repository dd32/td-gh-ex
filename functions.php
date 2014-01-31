<?php
/**
 * Functions.php
 *
 * Magic happens here,
 * If you're not comfortable with PHP / WordPress, please do not edit this file.
 * Otherwise, happy hacking! ;)
 *
 * @package WordPress
 * @subpackage Aquarius
 * @since Aquarius 1.0
 * @author wplovin <hello@wplovin.com>
 */

/**
 * Setup some basic constants.
 *
 * @since Aquarius 1.0
 */
define( 'WPLOVIN_THEME_NAME', 'Aquarius' );
define( 'WPLOVIN_THEME_SLUG', 'wpl-aquarius' );
define( 'WPLOVIN_THEME_VERSION', '1.0' );
define( 'WPLOVIN_THEME_AUTHOR', 'wplovin' );
define( 'WPLOVIN_THEME_AUTHOR_URL', 'http://wplovin.com' );
define( 'WPLOVIN_THEME_PATH', get_template_directory_uri() );

/**
 * Set up the content width value based on the theme's design.
 *
 * @since Aquarius 1.0
 */
if ( ! isset( $content_width ) ) 
	$content_width = 820;

/**
 * Oh, let's add some useful stuff we'll need later.
 *
 * @since Aquarius 1.0
 */
function wplovin_setup() {

	load_theme_textdomain( WPLOVIN_THEME_SLUG, get_template_directory() . '/languages' );
	
	$header_defaults = array(
		'default-image'          => WPLOVIN_THEME_PATH . '/images/transparent-header.png',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
	);
	add_theme_support( 'custom-header', $header_defaults );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	add_theme_support( 'post-thumbnails' );

	register_nav_menu( 'primary', __( 'Navigation Menu', WPLOVIN_THEME_SLUG ) );

	add_filter( 'use_default_gallery_style', '__return_false' );
	
	set_post_thumbnail_size( 788, 320, true );
	
	//add_editor_style( array( 'editor-style.css' ) );
	// Sorry, no editor styles in 1.0! ;(
	
}
add_action( 'after_setup_theme', 'wplovin_setup' );

/**
 * Register widgetized areas.
 *
 * @since Aquarius 1.0
 */
function wplovin_sidebar_init() {

	register_sidebar( array(
		'name'          => __( 'Main Widget Area', WPLOVIN_THEME_SLUG ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar.', WPLOVIN_THEME_SLUG ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', WPLOVIN_THEME_SLUG ),
		'id'            => 'footer-1',
		'description'   => __( 'Main footer.', WPLOVIN_THEME_SLUG ),
		'before_widget' => '<div id="%1$s" class="widget %2$s one-third">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'wplovin_sidebar_init' );

/**
 * Conditionally include needed JavaScript plugins, stylesheets, etc.
 *
 * @since Aquarius 1.0
 */
function wplovin_scripts_styles() {
	
	$options = array();
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
		wp_enqueue_script( 'comment-reply' );
		
	wp_enqueue_script( WPLOVIN_THEME_SLUG .'-sidr-js', get_template_directory_uri() . '/js/sidr/jquery.sidr.min.js', array( 'jquery' ), 'v1.2.1', true );
	wp_enqueue_script( WPLOVIN_THEME_SLUG .'-scrollspy-js', get_template_directory_uri() . '/js/jquery-scrollspy.js', array( 'jquery' ), 'v1.0', true );
	wp_enqueue_script( WPLOVIN_THEME_SLUG .'-ps-js', get_template_directory_uri() . '/js/perfect-scrollbar/perfect-scrollbar-0.4.6.with-mousewheel.min.js', array( 'jquery' ), 'v0.4.6', true );
	wp_enqueue_script( WPLOVIN_THEME_SLUG .'-fitvids-js', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), 'v1.0.3', true );

	wp_enqueue_style( WPLOVIN_THEME_SLUG . '-style', get_stylesheet_uri(), array(), '1.0' );
	wp_enqueue_style( WPLOVIN_THEME_SLUG . '-fa-icons', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), '4.0.3' );
	wp_enqueue_style( WPLOVIN_THEME_SLUG . '-sidr-css', get_template_directory_uri() . '/js/sidr/jquery.sidr.dark.css', array(), 'v1.2.1' );
	wp_enqueue_style( WPLOVIN_THEME_SLUG . '-ps-css', get_template_directory_uri() . '/js/perfect-scrollbar/perfect-scrollbar-0.4.6.min.css', array(), 'v0.4.6' );
	
	if ( is_active_sidebar( 'sidebar-1' ) )
		$options['sidrSidebar'] = true;
		
	if ( is_active_sidebar( 'footer-1' ) ) {
		wp_enqueue_script( WPLOVIN_THEME_SLUG .'-masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), 'v3.1.4', true );
		$options['footerMasonry'] = true;
	}
	
	wp_enqueue_script( WPLOVIN_THEME_SLUG .'-aquarius-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), 'v1.0', true );
	wp_localize_script( WPLOVIN_THEME_SLUG .'-aquarius-js', 'wplovin', $options );

}
add_action( 'wp_enqueue_scripts', 'wplovin_scripts_styles' );

/**
 * Function which prints out the post meta.
 *
 * @since Aquarius 1.0
 */
if ( ! function_exists( 'wplovin_post_meta' ) ) {

	function wplovin_post_meta() {

		$date = wplovin_get_date(); 
		
		if ( $date ) {
			echo $date;
		}
		
		if( 'chat' != get_post_format() && 'quote' != get_post_format() ) {
			$categories = get_the_category_list( __( ', ', WPLOVIN_THEME_SLUG ) );
			if ( $categories ) {
				echo '<span class="categories"><i class="fa fa-folder-open"></i>' . $categories . '</span>';
			}

			$tags = get_the_tag_list( '', __( ', ', WPLOVIN_THEME_SLUG ) );
			if ( $tags ) {
				echo '<span class="tags"><i class="fa fa-tags"></i>' . $tags . '</span>';
			}
		}
	}
	
}

/**
 * Function which returns the post date.
 *
 * @since Aquarius 1.0
 */
if ( ! function_exists( 'wplovin_get_date' ) ) {

	function wplovin_get_date() {
	
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', WPLOVIN_THEME_SLUG );
		else
			$format_prefix = '%2$s';

		$date = sprintf( '<span class="date"><i class="fa fa-calendar-o"></i><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', WPLOVIN_THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		return $date;

	}
	
}

/**
 * Function which prints out the paging on archive pages.
 *
 * Feel free to use wplovin_pager_prev_icon / wplovin_pager_next_icon filters to change the icon to another one from Font Awesome icon set.
 *
 * @since Aquarius 1.0
 */
if ( ! function_exists( 'wplovin_archive_pager' ) ) {

	function wplovin_archive_pager() {
		global $wp_query;
		
		$prev_icon = apply_filters( 'wplovin_pager_prev_icon', 'fa-chevron-circle-right' ); 
		$next_icon = apply_filters( 'wplovin_pager_next_icon', 'fa-chevron-circle-left' ); 
		
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		} else {
		?>
		<nav class="paging-navigation" role="navigation">
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="pager-link nav-previous"><i class="fa <?php echo $prev_icon; ?>"></i><?php next_posts_link( __( 'Older posts &rarr;', WPLOVIN_THEME_SLUG ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="pager-link nav-next"><i class="fa <?php echo $next_icon; ?>"></i><?php previous_posts_link( __( '&larr; Newer posts', WPLOVIN_THEME_SLUG ) ); ?></div>
				<?php endif; ?>

			</div>
		</nav>
		<?php
		}
	}
}

/**
 * Function which prints out archive header.
 *
 * @since Aquarius 1.0
 */
if ( ! function_exists( 'wplovin_archive_header' ) ) {

	function wplovin_archive_header() { 
		if( !is_home() ) { ?>
		<header class="archive-header">
			<h3 class="archive-title"><?php
				if ( is_day() ) :
					printf( __( 'Daily archives: %s', WPLOVIN_THEME_SLUG ), '<span>' . get_the_date() . '</span>' );
				elseif ( is_month() ) :
					printf( __( 'Monthly archives: %s', WPLOVIN_THEME_SLUG ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', WPLOVIN_THEME_SLUG ) ) . '</span>' );
				elseif ( is_year() ) :
					printf( __( 'Yearly archives: %s', WPLOVIN_THEME_SLUG ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', WPLOVIN_THEME_SLUG ) ) . '</span>' );
				elseif ( is_category() )  :
					printf( __( 'Category archives: %s', WPLOVIN_THEME_SLUG ), '<span>' . single_cat_title( '', false ) . '</span>' );
				elseif ( is_tag() )  :
					printf( __( 'Tag archives: %s', WPLOVIN_THEME_SLUG ), '<span>' . single_tag_title( '', false ) . '</span>' );				
				elseif ( is_search() )  :
					printf( __( 'Search results: %s', WPLOVIN_THEME_SLUG ), '<span>' . esc_html( $_GET['s'] ) . '</span>' );
				else : 
					_e( 'Archives', WPLOVIN_THEME_SLUG ); 
				endif;
			?></h3>
		</header>
	<?php } 
	}
}

/**
 * Function which prints out the custom header (navigation) background image.
 *
 * @since Aquarius 1.0
 */
function wplovin_nav_background() {

	if( get_custom_header() ) {
		$url = get_custom_header()->url;
		$output =  '<style>#navigation-main {background-image: url(\'' . $url . '\');}</style>';
		echo $output;
	}

}

add_action( 'wp_head', 'wplovin_nav_background' );

/**
 * Filter the page title.
 *
 * @since Aquarius 1.0
 */
function wplovin_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', WPLOVIN_THEME_SLUG ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wplovin_wp_title', 10, 2 );

/**
 * Go on! This theme is meant for hacking. 
 *
 * Add some codes below this line to tweak it further, and don't forget to report the bugs to hello@wplovin.com, thanks!
 *
 */