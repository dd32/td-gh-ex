<?php
if ( ! isset( $content_width ) ) $content_width = 800;
require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'after_setup_theme', 'adamsrazor_setup' );

if ( ! function_exists( 'adamsrazor_setup' ) ):
function adamsrazor_setup() {
		
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'adams-razor', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'adams-razor' ),
	) );			
	
	remove_action('wp_head', 'wp_generator');
}
endif;

function adamsrazor_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'adamsrazor_page_menu_args' );

function adamsrazor_excerpt_length( $length ) {
	return 140;
}
add_filter( 'excerpt_length', 'adamsrazor_excerpt_length' );

function adamsrazor_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'adams-razor' ) . '</a>';
}

function adamsrazor_auto_excerpt_more( $more ) {
	return ' &hellip;' . adamsrazor_continue_reading_link();
}
add_filter( 'excerpt_more', 'adamsrazor_auto_excerpt_more' );

function adamsrazor_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= adamsrazor_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'adamsrazor_custom_excerpt_more' );

function adamsrazor_remove_default_gallery_css ( $css ) {
	return str_replace("border: 2px solid #cfcfcf;", "", $css);
}
add_filter('gallery_style', 'adamsrazor_remove_default_gallery_css'	);

function adamsrazor_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'adams-razor' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Widget area to right of content. SUGGESTION: This is a useful place to include a Sub Pages Widget to show child navigation.', 'adams-razor' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'adams-razor' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first (left) footer widget area', 'adams-razor' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'adams-razor' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second (middle) footer widget area', 'adams-razor' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'adams-razor' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third (right) footer widget area', 'adams-razor' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'adamsrazor_widgets_init' );

if ( ! function_exists( 'adamsrazor_post_meta_date' ) ) :
function adamsrazor_post_meta_date() {
	printf( __( '<span class="%1$s">Published on</span> %2$s <span class="meta-sep">by</span> %3$s', 'adams-razor' ),
		'meta-prep meta-prep-author',
		sprintf( '<span class="entry-date">%1$s</span>',
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View more from %s', 'adams-razor' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'adamsrazor_posted_in' ) ) :
function adamsrazor_posted_in() {
	
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark this <a href="%3$s" title="Permalink to %4$s" rel="bookmark">page</a>.', 'adams-razor' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark this <a href="%3$s" title="Permalink to %4$s" rel="bookmark">page</a>.', 'adams-razor' );
	} else {
		$posted_in = __( 'Bookmark this <a href="%3$s" title="Permalink to %4$s" rel="bookmark">page</a>.', 'adams-razor' );
	}
	
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;


// remove inline style from captions
// adapted from: http://troychaplin.ca/blog/wordpress-functions/remove-automatically-generated-inline-style-on-images-with-caption-in-wordpress/
add_shortcode('wp_caption', 'adamsrazor_fixed_img_caption_shortcode');
add_shortcode('caption', 'adamsrazor_fixed_img_caption_shortcode');
function adamsrazor_fixed_img_caption_shortcode($attr, $content = null) {
	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' ) return $output;
	extract(shortcode_atts(array(
		'id'=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''), $attr));
	if ( 1 > (int) $width || empty($caption) )
	return $content;
	
	$custom_width = "32em"; //max width for bigger images
	if ($width < 528) $custom_width = $width . 'px';
	
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width:' . $custom_width . '" >'
	. do_shortcode( $content ) . '<span class="wp-caption-text">'
	. $caption . '</span></div>';
}




if ( ! function_exists( 'adamsrazor_comment' ) ) :
function adamsrazor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'adams-razor' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adams-razor' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'adams-razor' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'adams-razor' ), ' ' );
			?>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'adams-razor' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'adams-razor' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

function adamsrazor_enqueue_scripts(){
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 	
}
add_action( 'wp_enqueue_scripts', 'adamsrazor_enqueue_scripts');

function adamsrazor_custom_head(){
	$options = get_option('adamsrazor_theme_options');	
	echo htmlspecialchars_decode($options['precloseheadtag']);
}
add_action( 'wp_head', 'adamsrazor_custom_head' );

function adamsrazor_custom_footer(){
	$options = get_option('adamsrazor_theme_options');	
	echo htmlspecialchars_decode($options['preclosebodytag']);			
}
add_action( 'wp_footer', 'adamsrazor_custom_footer' );

endif;
