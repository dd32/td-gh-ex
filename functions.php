<?php
function awesome_2014_customize_register() {

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

add_action( 'customize_register', 'awesome_2014_customize_register' );

function awesome_2014_get_featured_posts( $posts ){

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

add_filter( 'twentyfourteen_get_featured_posts', 'awesome_2014_get_featured_posts', 999, 1 );

 
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
if (!class_exists('post_teaser')) {
include_once(get_stylesheet_directory() . '/post-teaser/post-teaser.php' );
}

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
		<h3><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h3>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"></span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

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
		<h2><?php _e( 'Post navigation', 'twentythirteen' ); ?></h2>
		<div class="nav-links">

			<?php previous_post_link( 'Previous Post %link', _x( '<span class="meta-nav"></span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( 'Next Post %link', _x( '%title <span class="meta-nav"></span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
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

function twentyfourteen_cms3_widgets_init() {	

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

add_action( 'widgets_init', 'twentyfourteen_cms3_widgets_init', 11 );

remove_action( 'welcome_panel', 'wp_welcome_panel' );

function your_welcome_panel() {
print '<h1>Welcome to the Badeyes 2014 Child Theme</h1>
<p>Important! This Theme requires that you have the TwentyFourteen Theme installed.</p>
<p>If you haven\'t already done so you can see a mock up version of this site at <a href="http://www.badeyes.com/2014" target="_blank">www.badeyes.com/2014/ (opens in new window/tab)</a>.</p> 
<p>This Child Theme has been optimized for screen reader users but should still be understanbable by those who dont, see changes below.</p>
<h2>Visual Editor</h2>
<p>If you use a screen reader then you will need to go to your <a href="'. get_admin_url() . '/profile.php">Profile page</a> and check the box "Disable the visual Editor" so that you can create Posts properly, you will quickly find out that it does not work very well if you dont.</p> 
<h2>Widgets</h2>
<p>Screen reader users will also need to go to the <a href="'. get_admin_url() . '/widgets.php">Widgets page</a> and check the "enable accessibility mode" in the "Screen Options" area in order to be able to add and edit Widgets.</p>
<h2>Header Image</h2>
<p>The ability to crop the image has been removed for a number of reasons:<br />
<ul><li>* Those who use a screen reader more than likely cant see it to be able to change the dimensions so it is important that the image you upload is the size you want, you can however change the size in the Media Library once it is uploaded.</li>
 <li>* Even when you chose not to crop the image I found that it did not keep your image at its original dimensions it just filled the full width distorting the image.</li></ul>

<h2>Menus</h2>
<p>This Child Theme has 3 possible Menus, there is a custom menu an Primary one, both are situated horizontally under the Header section and the Secondary one or "Side Menu" located in the left hand sidebar.</p>
<p>Neither These menus nor their corresponding "Skip Links" will appear unless you create and manage them in the <a href="'. get_admin_url() . 'nav-menus.php">Menus area</a>.</p> 
<p>You can see examples at <a href="http://www.badeyes.com/2014/" target="_blank">www.badeyes.com/2014/ (opens in new window/tab)</a></p>
<h2>Post Teaser Plugin</h2>
<p>For accessibility reasons the Post Teaser Plugin comes bundled with this Theme and is edited accordingly so there is no need to install it again, you can however edit it as you would any other Plugin in the Admin area.</p>
 <p>Note: If you do install and activate it you will not be able to access the Admin area and will have to use ftp to uninstal it or change its name.</p>
<p>If you do not wish to use it and know what you are doing then remove the corresponding code from the functions.php file or delete the "Post Teaser" folder from this Child Theme.</p>
<h2>WordPress for Bad Eyes</h2>
<p>If you are new to WordPress then you might find my book useful even if you dont use a screen reader you can buy it at <a href="http://www.wordpressforbadeyes.com" target=_blank">www.wordpressforbadeyes.com(opens in new window/tab</a>.</p>';
}
add_action('welcome_panel','your_welcome_panel');