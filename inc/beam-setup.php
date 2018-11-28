<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beam
 */

if ( ! function_exists( 'beam_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function beam_setup() {
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 */
		load_theme_textdomain( 'beam', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 */
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions, cropped.
			// additional image sizes.
			add_image_size( 'beam-small-thumbnail', 80, 80, true );
			add_image_size( 'beam-big-thumbnail', 600, 220 );
			add_image_size( 'beam-large-thumbnail', 720, 340 );
		}

		/**
		* This theme uses wp_nav_menu() in two locations.
		*/
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'beam' ),
				'footer'  => __( 'Footer Menu', 'beam' ),
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

		/*
		* Enable support for Post Formats.
		* See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Enable support for Custom Logo.
		add_theme_support( 'custom-logo' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'beam_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'beam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beam_content_width()
{
  $GLOBALS['content_width'] = apply_filters('beam_content_width', 1170);
}
add_action('after_setup_theme', 'beam_content_width', 0);

/**
 * Primary menu fallback.
 *
 * If no Primary menu is defined show this.
 *
 */
function beam_primary_menu_fallback()
{
    $beam_get_dashboard_url = get_dashboard_url();

    ?>
  <ul id="menu-fallback-menu" class="menu"><a class="navbar-item" href="/">Home</a><a class="navbar-item" href="<?php echo $beam_get_dashboard_url . "nav-menus.php" ?>">Set primary menu</a></ul>
  <?php
}
