<?php
/**
 * Miranda functions and definitions.
 *
 * @package Miranda
 */

if ( ! function_exists( 'miranda_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function miranda_setup() {	
		add_theme_support( 'automatic-feed-links' );

		add_editor_style();

		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 200,
				'width'       => 200,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'header' => __( 'Primary Menu', 'miranda' ),
				'social' => __( 'Social Menu', 'miranda' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support(
			'custom-background',
			array(
				'default-color' => '#fff',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'jetpack-responsive-videos' );

		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main',
				'footer'    => 'page',
			)
		);

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support(
			'starter-content',
			array(
				'nav_menus' => array(
					'main'  => array(
						'name'  => __( 'Main Menu (Header)', 'miranda' ),
						'items' => array(
							'page_about',
							'page_contact',
						),
					),
					'social' => array(
						'name'  => __( 'Social Menu (Footer)', 'miranda' ),
						'items' => array(
							'link_facebook',
							'link_twitter',
							'link_instagram',
						),
					),
				),
				'posts' => array(
					'about',
					'contact',
					'blog',
					'news',
				),

			)
		);

	}
endif; // End miranda_setup.

add_action( 'after_setup_theme', 'miranda_setup' );

if ( ! function_exists( 'miranda_content_width' ) ) {
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function miranda_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'miranda_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'miranda_content_width', 0 );
}

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function miranda_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar 1 (left)', 'miranda' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar 2 (right)', 'miranda' ),
			'id'            => 'sidebar-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer widget area', 'miranda' ),
			'id'            => 'sidebar-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'miranda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function miranda_scripts() {
	wp_enqueue_style( 'miranda-style', get_stylesheet_uri(), array( 'dashicons' ) );
	wp_style_add_data( 'miranda-style', 'rtl', 'replace' );

	wp_enqueue_script( 'miranda-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'miranda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'miranda_scripts' );

/**
 * Add styles and fonts for the new editor.
 */
function miranda_gutenberg_assets() {
	wp_enqueue_style( 'miranda-gutenberg', get_theme_file_uri( 'gutenberg-editor.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'miranda_gutenberg_assets' );

/**
 * Custom header for this theme.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


add_filter( 'the_title', 'miranda_post_title' );
/**
 * Add a title to posts that are missing title.
 *
 * @param mixed $title -The post title.
 */
function miranda_post_title( $title ) {
	if ( '' === $title ) {
		return __( 'Untitled', 'miranda' );
	} else {
		return $title;
	}
}

add_filter( 'body_class', 'miranda_classes' );
/**
 * Add extra classes to the body tag.
 */
function miranda_classes( $classes ) {

	if ( ! is_page_template() || is_page_template( 'page-template-default' ) ) {
		if ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) ) {
			$classes[] = 'has-both-sidebars';
		} elseif ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-left-sidebar';
		} elseif ( is_active_sidebar( 'sidebar-2' ) ) {
			$classes[] = 'has-right-sidebar';
		} elseif ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}
	}

	if ( is_page_template( 'sidebar-left.php' ) && is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-left-sidebar';
	}

	if ( is_page_template( 'sidebar-right.php' ) && is_active_sidebar( 'sidebar-2' ) ) {
		$classes[] = 'has-right-sidebar';
	}

	if ( is_page_template( 'no-sidebar.php' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

/**
 * Add support for changing the accent color.
 */
function miranda_customize_css() {
	echo '<style type="text/css">';
	echo "\n.site-title,
		.site-title a,
	.site-description{color: #" . esc_attr( get_header_textcolor() ) . ";}\n";

	echo '#header{background:url("' . esc_url( get_header_image() ) . '"); height:' . esc_attr( get_custom_header()->height ) . 'px; }';
	echo "\n";
	echo '.widget-title{border-bottom:3px solid ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';}';
	echo "\n";

	echo '.social-navigation li a:before,
	.plus:before,
	.more-link:after,
	.nav-next:after,
	.nav-previous:before,
	.entry-title,
	.entry-title a {color: ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';}';
	echo "\n";

	echo '.main-navigation ul ul a:hover,
	.main-navigation ul ul a:focus,
	.main-navigation ul li ul :hover > a {
		border-left: 3px solid ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';
		border-right: 3px solid ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';
	}';
	echo "\n";

	echo '.main-navigation a:hover,
	.main-navigation a:focus {border-bottom: 3px solid ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';}';
	echo "\n";

	echo '.social-menu li a:before, .menu-toggle:before, .bypostauthor .fn,.bypostauthor .says{color: ' . esc_attr( get_theme_mod( 'miranda_color', '#861a50' ) ) . ';}';
	echo "\n";
	echo '</style>';
}
add_action( 'wp_head', 'miranda_customize_css' );
