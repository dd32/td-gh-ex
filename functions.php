<?php
require_once ( get_stylesheet_directory() . '/theme-options.php' );


function badeyes_2014_customize_register() {

global $wp_customize;

//add extended featured content section

//add controls
$wp_customize->add_setting( 'num_posts_grid', array( 'default' => '0' ) );
$wp_customize->add_setting( 'num_posts_slider', array( 'default' => '6' ) );
$wp_customize->add_setting( 'layout_mobile', array( 'default' => 'grid' ) );

$wp_customize->add_control( 'num_posts_grid', array(
'label' => __( 'Number of posts for grid', 'text-domain'),
'section' => 'featured_content',
'settings' => 'num_posts_grid',
) );

$wp_customize->add_control( 'num_posts_slider', array(
'label' => __( 'Number of posts for slider', 'text-domain'),
'section' => 'featured_content',
'settings' => 'num_posts_slider',
) );

$wp_customize->add_control( 'layout_mobile', array(
'label' => __( 'Layout for mobile devices', 'text-domain'),
'section' => 'featured_content',
'settings' => 'layout_mobile',
'type' => 'select',
'choices' => array(
'grid' => 'Grid',
'slider' => 'Slider',
),
) );
}

add_action( 'customize_register', 'badeyes_2014_customize_register' );

function badeyes_2014_get_featured_posts( $posts ){

$fc_options = (array) get_option( 'featured-content' );

if ( $fc_options ) {
//$tag-name = $fc_options['tag-name'];
//} else {
$tag_name = 'featured';
}

$layout = get_theme_mod( 'featured_content_layout' );
$max_posts = get_theme_mod( 'num_posts_' . $layout, 2 );

$args = array(
'tag' => $tag_name,
'posts_per_page' => $max_posts,
'order_by' => 'post_date',
'order' => 'DESC',
'post_status' => 'publish',
);

$new_post_array = get_posts( $args );

if ( count($new_post_array) > 0 ) {
return $new_post_array;
} else {
return $posts;
}

}

add_filter( 'twentyfourteen_get_featured_posts', 'badeyes_2014_get_featured_posts', 999, 1 );

 
function my_child_theme_setup() {
	load_child_theme_textdomain( '2014child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );

function be_exclude_post_formats_from_blog( $query ) {

	if( $query->is_main_query() && $query->is_home() ) {
		$tax_query = array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-quote', 'post-format-gallery', 'post-format-aside', 'post-format-link', 'post-format-audio', 'post-format-quote', 'post-format-image', 'post-format-video' ),
			'operator' => 'NOT IN',
		) );
		$query->set( 'tax_query', $tax_query );
	}

}
add_action( 'pre_get_posts', 'be_exclude_post_formats_from_blog' );
function mytheme_setup() {
    set_post_thumbnail_size(300, 300, true);
}
add_action('after_setup_theme', 'mytheme_setup', 20);
function twentyfourteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<div class="navigation paging-navigation" role="navigation">
<div class="center">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"></span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>
</div>
		</div><!-- .nav-links -->
	</div><!-- .navigation -->
	<?php
}
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentyfourteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="navigation post-navigation" role="navigation">
<div class="center">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h3>
		<div class="nav-links">

			<?php previous_post_link( 'Previous Post %link', _x( '<span class="meta-nav"></span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( 'Next Post %link', _x( '%title <span class="meta-nav"></span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
</div>
	</div><!-- .navigation -->
	<?php
}

function remove_twentyfourteen_widgets(){

unregister_widget( 'Twenty_Fourteen_Ephemera_Widget' );

unregister_sidebar( 'sidebar-1' );

	unregister_sidebar( 'sidebar-2' );

	unregister_sidebar( 'sidebar-3' );

}

add_action( 'widgets_init', 'remove_twentyfourteen_widgets', 11 );

function twentyfourteen_badeyes_widgets_init() {	

include get_stylesheet_directory() . '/inc/widgets.php';

register_widget( 'badeyes_twentyfourteen_child_Ephemera_Widget' );

register_sidebar( array(

		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),

'before_widget' => '<div id="%1$s" class="widget %2$s">',

'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),

		'id'            => 'sidebar-2',

		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),

'before_widget' => '<div id="%1$s" class="widget %2$s">',

'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

register_sidebar( array(
'name'          => __( 'Header Widget Area', 'twentyfourteen' ),
'id'            => 'sidebar-4',
'description'   => __( 'Appears in the Custom Menu Header section of the site.', 'twentyfourteen' ),
'before_widget' => '<div class="custom_widget_menu">',
'after_widget'  => '</div>',
'before_title'  => '<h2 class="widget-title">',
'after_title'   => '</h2>',
) );
	register_sidebar( array(
		'name'          => __( 'Custom_Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<div class="custom_widget_menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}




remove_action( 'widgets_init', 'twentyfourteen_widgets_init', 11 );

add_action( 'widgets_init', 'twentyfourteen_badeyes_widgets_init', 11 );

