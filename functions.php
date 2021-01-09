<?php
/**
 * Aribiz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aribiz
 */

if ( ! defined( 'ARIBIZ_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ARIBIZ_VERSION', '1.0.0' );
}

if ( ! function_exists( 'aribiz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aribiz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aribiz, use a find and replace
		 * to change 'aribiz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aribiz', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'aribiz' ),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'aribiz_custom_background_args',
				array(
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
			'custom-logo',
			array(
				'height'      => 90,
				'width'       => 90,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'aribiz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aribiz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aribiz_content_width', 640 );
}
add_action( 'after_setup_theme', 'aribiz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aribiz_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aribiz' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aribiz' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	 
}
add_action( 'widgets_init', 'aribiz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aribiz_scripts() {
	wp_enqueue_style( 'aribiz-style', get_stylesheet_uri(), array(), ARIBIZ_VERSION );
	wp_style_add_data( 'aribiz-style', 'rtl', 'replace' );

	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome/css/fontawesome-all-v5.3.1.min.css' );
	wp_enqueue_style( 'aribiz-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), null );

	wp_enqueue_script( 'aribiz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ARIBIZ_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aribiz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Breadcbrumbs
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// Custom comment walker.
require get_template_directory() . '/inc/class-walker-comment.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-typography.php';
require get_template_directory() . '/inc/class-customize.php';







/**
 * Compare page CSS
 */

function aribiz_comparepage_css($hook) {
	if ( 'appearance_page_aribiz-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'aribiz-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'aribiz_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'aribiz_themepage');
function aribiz_themepage(){
	$theme_info = add_theme_page( __('Aribiz Info','aribiz'), __('Aribiz Info','aribiz'), 'manage_options', 'aribiz-info.php', 'aribiz_info_page' );
}

function aribiz_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap aribiz-add-css">
		<div>
			<h1>
				<?php echo esc_html_e('Thank you for using Aribiz Theme','aribiz'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html_e("View Premium Edition Theme Demo", "aribiz"); ?></h3>
						<p><?php echo esc_html_e("You can see more features & functionality in our PRO Version. You will get tension free many advance theme options just to customize your theme very easily. Watch the Demo by clicking the link below.", "aribiz"); ?></p>
						<p><a target="blank" href="http://arinio.com/aribiz-responsive-multipurpose-wordpress-theme/" class="button button-primary">
							<?php echo esc_html_e("View Demo", "aribiz"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html_e("View our other themes", "aribiz"); ?></h3>
						<p><?php echo esc_html_e("Want to see more our amazing themes you simply visit our site. Click the link below.", "aribiz"); ?></p>
						<p><a target="blank" href="http://arinio.com/" class="button button-primary">
							<?php echo esc_html_e("View All Themes", "aribiz"); ?>
						</a></p>
					</div>
				</div>
				 
			</div>
		</div>
		<hr>

		<h2><?php echo esc_html_e("Get Aribiz PRO Theme! Just $19","aribiz"); ?></h2>
		<div class="col">
					<div class="widgets-holder-wrap">
						 <p><?php echo esc_html_e("You are using the Aribiz, Free Version of Aribiz Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section, Contact Page and many more Page Templates, Social Link Section, Documents, Life time theme support and much more in just $19.", "aribiz"); ?></p>
						 
					</div>
				</div>
		<div class="aribiz-button-container">
			<a target="blank" href="http://arinio.com/aribiz-responsive-multipurpose-wordpress-theme/" class="button button-primary aribizbt">
				<?php echo esc_html_e("Upgrade to Aribiz Pro", "aribiz"); ?>
			</a>
		</div>


		

	</div>
	<?php
}
