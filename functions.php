<?php
/**
 * Best Charity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Best_Charity
 */

if ( ! function_exists( 'best_charity_setup' ) ) :
	
	function best_charity_setup() {
		
		load_theme_textdomain( 'best-charity', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
	
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'best-charity-page-thumb', 823, 397.141, true );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'best-charity' ),
		) );


		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'best_charity_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'best_charity_setup' );

function best_charity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_charity_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_charity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_charity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'best-charity' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'best-charity' ),
		'before_widget' => '<div id="%1$s" class="mgb-md widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="s-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget', 'best-charity' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'best-charity' ),
		'before_widget' => '<div id="%1$s" class="col-xl-3 col-sm-6 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="f-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'best_charity_widgets_init' );

require get_template_directory(). '/inc/enqueue.php';

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer/customizer.php';

require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/breadcrumbs.php';

require get_template_directory() . '/elementor-widget/widgets.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';
}

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}