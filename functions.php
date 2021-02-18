<?php
/**
 * Bekko WordPress theme.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'BEKKO_VERSION', '1.0.2' );

if ( ! function_exists( 'bekko_setup' ) ) {
	add_action( 'after_setup_theme', 'bekko_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 */
	function bekko_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'bekko' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height' => 70,
			'width' => 350,
			'flex-height' => true,
			'flex-width' => true
		) );
		
		add_theme_support( "custom-background",
			array(
				'default-color' 		 => 'ffffff',
				'default-image'          => '',
				'default-repeat'         => 'repeat',
				'default-position-x'     => 'left',
				'default-position-y'     => 'top',
				'default-size'           => 'auto',
				'default-attachment'     => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			)
		);
		
		add_theme_support( "custom-header",
			array(
				'default-image'          => '',
				'flex-height'            => false,
				'flex-width'             => false,
				'uploads'                => true,
				'random-default'         => false,
				'header-text'            => false,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			)
		);

		// Register primary menu.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'bekko' ),
		) );

		/**
		 * Set the content width to something large
		 * We set a more accurate width in bekko_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'css/admin/editor-style.css' );
	}
}

/**
 * Get all necessary theme files
 */
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/class-css.php';
require get_template_directory() . '/inc/css-output.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/markup.php';
require get_template_directory() . '/inc/element-classes.php';
require get_template_directory() . '/inc/typography.php';
require get_template_directory() . '/inc/plugin-compat.php';

if ( is_admin() ) {
	require get_template_directory() . '/inc/meta-box.php';
	require get_template_directory() . '/inc/dashboard.php';
}

/**
 * Load our theme structure
 */
require get_template_directory() . '/inc/structure/archives.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/featured-images.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/navigation.php';
require get_template_directory() . '/inc/structure/post-meta.php';
require get_template_directory() . '/inc/structure/sidebars.php';

define('BEKKO_THEME_URL','http://wpkoi.com/bekko-wpkoi-wordpress-theme/','bekko');
define('BEKKO_WPKOI_AUTHOR_URL','http://wpkoi.com','bekko');
define('BEKKO_WPKOI_SOCIAL_URL','https://www.facebook.com/wpkoithemes/','bekko');
define('BEKKO_WORDPRESS_REVIEW','https://wordpress.org/support/theme/bekko/reviews/?filter=5','bekko');
define('BEKKO_DOCUMENTATION','http://wpkoi.com/docs/','bekko');