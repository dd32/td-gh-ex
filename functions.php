<?php

function artikler_theme_setup() {
	global $content_width;
	// Set up the content width value.
	if ( ! isset( $content_width ) )
	$content_width = 728;
	
	/* Makes Artikler available for translation.*/
	load_theme_textdomain( 'artikler', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'jatheme' ) );

	 //This theme supports custom background color and image,
	 add_theme_support( 'custom-background', array(
		'default-color' => 'eaeaea',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	
	// Unlimited height, soft crop
	set_post_thumbnail_size( 624, 9999 ); 
	
	// This theme supports custom header image.
	$custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $custom_header );
	
	// This theme supports html5.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
}
add_action( 'after_setup_theme', 'artikler_theme_setup' );

//Register sidebars(Main Sidebar).
function artikler_theme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'jatheme' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'jatheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'artikler_theme_widgets_init' );

//Displays navigation.
function artikler_theme_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id ); ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<?php global $wp_query;

$big = 9999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 0, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'show_all'     => false,
	'end_size'     => 2,
	'mid_size'     => 3,
	'type'         => 'plain',
	'add_args'     => false,
	'add_fragment' => '',
	'before_page_number' => '',
	'after_page_number' => ''
) ); ?>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
<?php }


if ( ! function_exists( 'artikler_theme_entry_meta' ) ) :

/* Meta information for current post: categories, tags, permalink, author, and date. */
function artikler_theme_entry_meta() {

	$categories_list = get_the_category_list( __( ', ', 'jatheme' ) );

	$tag_list = get_the_tag_list( '', __( ', ', 'jatheme' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'jatheme' ), get_the_author() ) ),
		get_the_author()
	);

	//1 = category, 2 = tag, 3 = the date and 4 = author's name.
	if ( $tag_list ) {
		$full_text = __( 'Category: %1$s | Tag: %2$s | Date: %3$s | <span class="by-author"> Author: %4$s</span>.', 'jatheme' );
	} elseif ( $categories_list ) {
		$full_text = __( 'Category: %1$s | Date: %3$s | <span class="by-author"> Author: %4$s</span>.', 'jatheme' );
	} else {
		$full_text = __( 'Date: %3$s | <span class="by-author"> Author: %4$s</span>.', 'jatheme' );
	}

	printf(
		$full_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;


//Excerpt Length.
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Excerpt More.
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'artikler') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Support Google font stylesheet URL
function artikler_theme_get_font_url() {
	$font_url = '';
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'jatheme' ) ) {
		$subsets = 'latin,latin-ext';

		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'jatheme' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

//Style and Scriprt.
function artikler_scripts() {
	global $wp_styles;
	wp_enqueue_style( 'style-sheet', get_stylesheet_uri() );
	wp_enqueue_script( 'script-html5', get_template_directory_uri() . '/js/html5.js', array(), '1.0.0', true );
	wp_enqueue_style('googleFontsOpen+Sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700');
	wp_register_style('googleFontsTangerine', 'http://fonts.googleapis.com/css?family=Tangerine');
       wp_enqueue_style( 'googleFontsTangerine');
	$font_url = artikler_theme_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'jatheme-fonts', esc_url_raw( $font_url ), array(), null );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

}

add_action( 'wp_enqueue_scripts', 'artikler_scripts' );

function artikler_theme_mce_css( $mce_css ) {
	$font_url = artikler_theme_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'artikler_theme_mce_css' );

/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 */
function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( max( $paged, $page ) ) : '';

	return $filtered_title;
}

add_filter( 'wp_title', 'filter_wp_title' );

/**
 * Filter the page menu arguments.
 */
function artikler_theme_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'artikler_theme_page_menu_args' );

/**
 * Register postMessage support.
 * WP_Customize_Manager $wp_customize Customizer object.
 */
function artikler_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}
add_action( 'customize_register', 'artikler_theme_customize_register' );

function artikler_theme_add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
add_action( 'after_setup_theme', 'artikler_theme_add_editor_styles' );

function get_all_posts(){
			 /* Start the Loop */ 
			while ( have_posts() ) : the_post(); ?>
                 
                 <div class="content-post-main">
                 <div class="content-post-img">
				 <?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(150,150) ); ?></a>			
                 <?php else : ?>
                 <a href="<?php the_permalink(); ?>" id="no-image-yet"><div>No Image Yet</div></a>
                 <?php endif; ?>
                 </div>
                 
                 <div class="content-post-tilte-excerpt">
                 <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                 <small class="content-authore-excerpt"><b><?php _e( 'Posted by', 'artikler' ); ?></b> <?php the_author(); ?>.&nbsp;|&nbsp;<b> <?php _e( 'Posted on', 'artikler' ); ?></b> <?php the_time( 'F j, Y' ); ?></small>
                 <div class="post_expert_index">
                 <?php the_excerpt(); ?><br />
                 </div>
                 <?php $com_num = get_comments_number( ); ?>
				 <?php if( $com_num == 0 ): ?>
                  <small class="content-comment_no"><?php _e( 'No Comment', 'artikler' ); ?></small>
                 <?php elseif($com_num == 1): ?>
                 <small class="content-comment_no"><?php _e( '1 Comment', 'artikler' ); ?></small>
                 <?php else:  ?>
                 <small class="content-comment_no"><?php echo $com_num . _e( 'Comments', 'artikler' );?></small>
                 <?php endif; ?>
                 
                 </div>
                 </div>
			<?php endwhile; 

}

require( get_template_directory() . '/inc/custom-comment.php' );
