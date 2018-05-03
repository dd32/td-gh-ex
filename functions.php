<?php
/**
 * Best Simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Best_Simple
 */

if ( ! function_exists( 'best_simple_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function best_simple_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Best Simple, use a find and replace
		 * to change 'best-simple' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'best-simple', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Add Thumbnail Support.
		add_image_size( 'best-simple-grid-thumbnail', 384, 250, true );
		add_image_size( 'best-simple-left-right-thumbnail', 804, 300, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'best-simple' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'best_simple_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo', array(
				'height'      => 65,
				'width'       => 300,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'best_simple_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function best_simple_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'best_simple_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_simple_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_simple_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'best-simple' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'best-simple' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'best_simple_widgets_init' );

/**
 * Above Header -- Hero Banner.
 */
function best_simple_homepage_hero_widget() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Hero Section', 'best-simple' ),
			'id'            => 'home-hero',
			'description'   => esc_html__( 'Add widgets here.', 'best-simple' ),
			'before_widget' => '<div class="hero-info">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="home-hero-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'best_simple_homepage_hero_widget' );

/**
 * Enqueue scripts and styles.
 */
function best_simple_scripts() {
	wp_enqueue_style( 'best-simple-style', get_stylesheet_uri() );

	// Loading Handpicked Fonts For Best Simple Theme.
	wp_enqueue_style( 'best-simple-icons', get_stylesheet_directory_uri() . '/assets/css/simple.css' );

	// Loading Google Web Font
	wp_enqueue_style( 'best-simple-google-font', '//fonts.googleapis.com/css?family=Merriweather|Nunito+Sans:700' );

	wp_enqueue_script( 'best-simple-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20151215', true );

	wp_localize_script(
		'best-simple-navigation', 'best_simple_ScreenReaderText', array(
			'expand'   => __( 'Expand child menu', 'best-simple' ),
			'collapse' => __( 'Collapse child menu', 'best-simple' ),
		)
	);

	wp_enqueue_script( 'best-simple-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'best_simple_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Modify the given HTML
 *
 * @param String $template  - Comment Pagination Template HTML.
 * @param String $class     - Passed HTML Class Attribute.
 *
 * @return String $template - Return Modified HTML
 */
function change_reader_heading( $template, $class ) {

	if ( ! empty( $class ) && false !== strpos( $class, 'pagination' ) ) {
		$template = str_replace( '<h2', '<h6', $template );
	}

	return $template;
}
add_filter( 'navigation_markup_template', 'change_reader_heading', 10, 2 );

/**
 * Modify the excerpt read more text.
 *
 * @param More $more - Holds New Read More Text.
 */
function best_simple_excerpt_more( $more ) {
	global $post;
	if ( is_admin() ) {
		return $more; }
	return '&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'best_simple_excerpt_more' );


if ( ! function_exists( 'best_simple_breadcrumb' ) ) {

	/**
	 * Loading Breadcrumb Navigation Support.
	 */
	function best_simple_breadcrumb() {
		if ( is_front_page() || is_archive() || is_author() || is_tag() || is_post_type_archive() ) {
			return;
		}
		echo '<span class="home"><i class="best-simple-icon icon-home"></i></span>';
		echo '<span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
		echo esc_url( home_url() );
		echo '">' . esc_html( sprintf( __( 'Home', 'best-simple' ) ) );
		echo '</a></span><span class="seperator">&#8250;</i></span>';
		if ( is_single() ) {
			$categories = get_the_category();
			if ( $categories ) {
				$level         = 0;
				$hierarchy_arr = array();
				foreach ( $categories as $cat ) {
					$anc       = get_ancestors( $cat->term_id, 'category' );
					$count_anc = count( $anc );
					if ( 0 < $count_anc && $level < $count_anc ) {
						$level         = $count_anc;
						$hierarchy_arr = array_reverse( $anc );
						array_push( $hierarchy_arr, $cat->term_id );
					}
				}
				if ( empty( $hierarchy_arr ) ) {
					$category = $categories[0];
					echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="v:url" property="v:title">' . esc_html( $category->name ) . '</a></span><span class="seperator">&#8250;</span>';
				} else {
					foreach ( $hierarchy_arr as $cat_id ) {
						$category = get_term_by( 'id', $cat_id, 'category' );
						echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="v:url" property="v:title">' . esc_html( $category->name ) . '</a></span><span class="seperator">&#8250;</i></span>';
					}
				}
			}
		} elseif ( is_page() ) {
			$parent_id = wp_get_post_parent_id( get_the_ID() );
			if ( $parent_id ) {
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page          = get_page( $parent_id );
					$breadcrumbs[] = '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_permalink( $page->ID ) ) . '" rel="v:url" property="v:title">' . esc_html( get_the_title( $page->ID ) ) . '</a></span><span><i class="best-simple-icon icon-angle-double-right"></i></span>';
					$parent_id     = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				foreach ( $breadcrumbs as $crumb ) {
					echo esc_attr( $crumb ); }
			}
			echo '<span><span>';
			the_title();
			echo '</span></span>';
		} elseif ( is_category() ) {
			global $best_simple_wp_query;
			$cat_obj       = $best_simple_wp_query->get_queried_object();
			$this_cat_id   = $cat_obj->term_id;
			$hierarchy_arr = get_ancestors( $this_cat_id, 'category' );
			if ( $hierarchy_arr ) {
				$hierarchy_arr = array_reverse( $hierarchy_arr );
				foreach ( $hierarchy_arr as $cat_id ) {
					$category = get_term_by( 'id', $cat_id, 'category' );
					echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="v:url" property="v:title">' . esc_html( $category->name ) . '</a></span><span><i class="best-simple-icon icon-angle-double-right"></i></span>';
				}
			}
			echo '<span><span>';
			single_cat_title();
			echo '</span></span>';
		} elseif ( is_author() ) {
			echo '<span><span>';
			if ( get_query_var( 'author_name' ) ) :
				$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
			else :
				$curauth = get_userdata( get_query_var( 'author' ) );
			endif;
			echo esc_html( $curauth->nickname );
			echo '</span></span>';
		} elseif ( is_search() ) {
			echo '<span><span>';
			the_search_query();
			echo '</span></span>';
		} elseif ( is_tag() ) {
			echo '<span><span>';
			single_tag_title();
			echo '</span></span>';
		}
	}
}
