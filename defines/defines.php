<?php
/**
 * Theme defines.
 *
 * @package BA Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}

$data = array();

//////////////////////////////////////////////////
/**
 * Required plugins.
 *
 * Required keys are name and slug.
 * If the source is NOT from the WP .org repo, then source is also required.
 */
$data['plugins'] = array(
	array(
		'name'               => 'Redux Framework',
		'slug'               => 'redux-framework',
		'source'             => '', // The plugin source.
		'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	),
	array(
		'name'               => 'BA Book Everything',
		'slug'               => 'ba-book-everything',
		'required'           => false,
	),
    array(
		'name'                 => 'BA Tours light posts',
		'slug'                 => 'ba-tours-light-posts',
		'source'               => 'https://ba-booking.com/ba-tours/wp-content/uploads/sites/5/2018/09/ba-tours-light-posts.zip',
		'required'             => false,
		'version'              => '',
		'force_activation'     => false,
		'force_deactivation'   => false,
		'external_url'         => '',
	),
	array(
		'name'               => 'Sassy Social Share',
		'slug'               => 'sassy-social-share',
		'required'           => false,
	),
    array(
		'name'               => 'Easy Social Icons',
		'slug'               => 'easy-social-icons',
		'required'           => false,
	),
    array(
		'name'               => 'Contact Form 7',
		'slug'               => 'contact-form-7',
		'required'           => false,
	),
    array(
		'name'               => 'MailChimp for WordPress',
		'slug'               => 'mailchimp-for-wp',
		'required'           => false,
	),
);



//////////////////////////////////////////////////
/**
 * Default theme options.
 */
$data['options'] = array(
	'layout' => 'no-sidebars',
	'color-set' => 'default',
	'font-set' => 'default',
);



//////////////////////////////////////////////////
/**
 * Assets.
 *
 * @param bool 'admin' is
 *    = true, for admin-only assets
 *    = false, or not presented, otherwise
 *
 * @param string 'loc' is
 *    = 'url', for external sources
 *    = 'wp', for build-in WP sources
 *    = corresponding slug name in other cases
 *
 * @param string 'type' is
 *    = 'style', for css-files
 *    = 'script', for js-files
 *
 * @param string 'src' is file name with extention.
 *
 * @param array 'deps' is array of dependencies.
 *
 * @param array 'meta' is additional parameters, including:
 *    'conditional' => string, loading conditions
 */
$data['assets'] = array(
	//////////////////////////////////////////////////
	/**
	 * Admin-only assets.
	 */
	'fontawesome-admin' => array(
		'admin' => true,
		'type'  => 'style',
		'loc'   => 'url',
		'src'   => 'https://use.fontawesome.com/releases/v5.2.0/css/all.css',
		'ver'   => '5.2.0',
		'media' => 'all',
	),
	'font1-admin' => array(
		'admin' => true,
		'type'  => 'style',
		'loc'   => 'url',
		'src'   => 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500',
		'ver'   => '',
		'media' => 'all',
	),
	'support-customizer-script' => array(
		'admin'     => true,
		'type'      => 'script',
		'loc'       => 'js',
		'src'       => 'customizer.js',
		'deps'      => array( 'jquery', 'customize-preview' ),
		'ver'       => '1.0.0',
		'in_footer' => true,
	),
	'bathemos-admin-style' => array(
		'admin' => true,
		'type'  => 'style',
		'loc'   => 'admin-css',
		'src'   => 'admin.css',
	),
	//////////////////////////////////////////////////
	/**
	 * Bootstrap.
	 */
	'bootstrap-reboot-style' => array(
		'type' => 'style',
		'loc'  => 'bootstrap-css',
		'src'  => 'bootstrap-reboot.min.css',
	),
	'bootstrap-style' => array(
		'type' => 'style',
		'loc'  => 'bootstrap-css',
		'src'  => 'bootstrap.min.css',
	),
	'bootstrap-popper-script' => array(
		'type'      => 'script',
		'loc'       => 'bootstrap-js',
		'src'       => 'popper.min.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '4.1.0',
		'in_footer' => true,
	),
	'bootstrap-script' => array(
		'type'      => 'script',
		'loc'       => 'bootstrap-js',
		'src'       => 'bootstrap.min.js',
		'deps'      => array( 'jquery', 'bootstrap-popper-script' ),
		'ver'       => '4.1.0',
		'in_footer' => true,
	),
	//////////////////////////////////////////////////
	/**
	 * Support.
	 */
	'support-html5-script' => array(
		'type'      => 'script',
		'loc'       => 'js',
		'src'       => 'html5.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '3.7.3',
		'in_footer' => true,
		'meta'      => array(
			'conditional' => 'lt IE 9',
		),
	),
	'support-navigation-script' => array(
		'type'      => 'script',
		'loc'       => 'js',
		'src'       => 'navigation.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '1.0.0',
		'in_footer' => true,
	),
	'support-skip-link-focus-fix-script' => array(
		'type'      => 'script',
		'loc'       => 'js',
		'src'       => 'skip-link-focus-fix.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '1.0.0',
		'in_footer' => true,
	),
	//////////////////////////////////////////////////
	/**
	 * Additional assets.
	 */
	'fontawesome' => array(
		'type'  => 'style',
		'loc'   => 'url',
		'src'   => 'https://use.fontawesome.com/releases/v5.2.0/css/all.css',
		'ver'   => '5.2.0',
		'media' => 'all',
	),
	'dashicons' => array(
		'type' => 'style',
		'loc'  => 'wp',
	),
    ///////////////////////////////////////////////
    /**
	 * Slick assets.
	 */
    'slick-style' => array(
		'type' => 'style',
		'loc'  => 'slick',
		'src'  => 'slick.css',
	),
    'slick-theme-style' => array(
		'type' => 'style',
		'loc'  => 'slick',
		'src'  => 'slick-theme.css',
	),
	'slick-script' => array(
		'type'      => 'script',
		'loc'       => 'slick',
		'src'       => 'slick.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '1.9.0',
		'in_footer' => true,
	),
	//////////////////////////////////////////////////
	/**
	 * Theme assets.
	 */
	'bathemos-basic-style' => array(
		'type' => 'style',
		'loc'  => 'css',
		'src'  => 'bathemos.css',
	),
	'bathemos-script' => array(
		'type'      => 'script',
		'loc'       => 'js',
		'src'       => 'bathemos.js',
		'deps'      => array( 'jquery' ),
		'ver'       => '1.0.0',
		'in_footer' => true,
	),
	'bathemos-manifest' => array(
		'type' => 'manifest',
		'src'  => 'style.css',
	),
);



//////////////////////////////////////////////////
/**
 * Menus.
 */
$data['menus'] = array(
	'theme' => array(
		'primary' => __( 'Primary Menu', 'ba-tours-light' ),
	//	'footer_menu' => __( 'Footer Menu', 'ba-tours-light' ),
	),
	'admin' => array(),
);



//////////////////////////////////////////////////
/**
 * Default theme texts.
 */
$data['texts'] = array();



//////////////////////////////////////////////////
/**
 * Image sizes.
 */
$data['image_sizes'] = array(
	'bathemos_wide' => array(
		'width' => 1920,
		'height' => 870,
		'crop' => true,
	),
    'bathemos_thumbnail' => array(
		'width' => 350,
		'height' => 200,
		'crop' => true,
	),
    'bathemos_thumbnail_wide' => array(
		'width' => 430,
		'height' => 190,
		'crop' => true,
	),
);



//////////////////////////////////////////////////
/**
 * Slugs via folders structure.
 */
$data['slugs'] = array(
	// Admin assets.
	'admin' => array(
		'slug' => '/admin',
		'incl' => array(
			'admin-css' => array(
				'slug' => '/assets/css',
			),
			'admin-images' => array(
				'slug' => '/assets/images',
			),
			'admin-js' => array(
				'slug' => '/assets/js',
			),
			'admin-templates' => array(
				'slug' => '/templates',
			),
		),
	),
	// Shortcodes.
	'shortcodes' => array(
		'slug' => '/shortcodes/shortcodes',
	),
	// Sliders.
	'slider' => array(
		'slug' => '/sliders/slider',
	),
	// Assets.
	'assets' => array(
		'slug' => '/template-assets',
		'incl' => array(
			'bootstrap' => array(
				'slug' => '/bootstrap',
				'incl' => array(
					'bootstrap-css' => array(
						'slug' => '/css',
					),
					'bootstrap-js' => array(
						'slug' => '/js',
					),
				),
			),
			'css' => array(
				'slug' => '/css',
			),
			'fonts' => array(
				'slug' => '/fonts',
			),
			'images' => array(
				'slug' => '/images',
			),
			'js' => array(
				'slug' => '/js',
			),
            'slick' => array(
				'slug' => '/slick',
			),
		),
	),
	// Page parts.
	'parts' => array(
		'slug' => '/template-parts',
		'incl' => array(
			'content' => array(
				'slug' => '/contents/content',
			),
			'content-tag' => array(
				'slug' => '/content-tags/content-tag',
			),
			'container' => array(
				'slug' => '/containers/container',
			),
			'navbar' => array(
				'slug' => '/navbars/navbar',
			),
			'header' => array(
				'slug' => '/headers/header',
			),
			'footer' => array(
				'slug' => '/footers/footer',
			),
			'panel' => array(
				'slug' => '/panels/panel',
			),
			'widget-wrap' => array(
				'slug' => '/widget-wraps/widget-wrap',
			),
		),
	),
	// Template styles sets.
	'sets' => array(
		'slug' => '/template-sets',
		'incl' => array(
			'layout' => array(
				'slug' => '/layouts/layout',
			),
			'color-set' => array(
				'slug' => '/color-sets/color-set',
			),
			'font-set' => array(
				'slug' => '/font-sets/font-set',
			),
		),
	),
);



//////////////////////////////////////////////////
/**
 * Page components.
 */
$data['components'] = array(
	// Template sets.
	'layout' => array(
		'default' => 'no-sidebars',
		'name' => __( 'Layout', 'ba-tours-light' ),
		//'desc' => __( 'Page layout.', 'ba-tours-light' ),
		//'file_ext' => 'php',
	),
	'color-set' => array(
		'name' => __( 'Color scheme', 'ba-tours-light' ),
	),
	'font-set' => array(
		'name' => __( 'Font set', 'ba-tours-light' ),
	),
	// Page parts.
	'navbar' => array(
		'name' => __( 'Navigation bar', 'ba-tours-light' ),
	),
	'header' => array(
		'name' => __( 'Header', 'ba-tours-light' ),
	),
	'footer' => array(
		'name' => __( 'Footer', 'ba-tours-light' ),
	),
	'container' => array(
		'name' => __( 'Content area container', 'ba-tours-light' ),
	),
);



//////////////////////////////////////////////////
/**
 * Shortcodes.
 */
$data['shortcodes'] = array(
	'babe',
);



//////////////////////////////////////////////////
/**
 * Sliders.
 */
$data['sliders'] = array(
	'frontpage',
);



//////////////////////////////////////////////////
/**
 * Custom styles.
 *
 * Will be enqueued in this order.
 */
$data['custom_styles'] = array(
	'color-set' => array(
		// Option name in the theme settings.
		'option' => 'color-set',
	),
	'font-set' => array(
		'option' => 'font-set',
	),
	'custom-css' => array(
		'option' => 'custom-css',
	),
);



//////////////////////////////////////////////////
/**
 * List of the page parts
 * which default sources are in the root dir.
 */
$data['root_sources'] = array(
	'header',
	'footer',
	'sidebar',
	'searchform',
);



//////////////////////////////////////////////////
/**
 * Panels (sidebars).
 */
$data['panels'] = array(
	// Classic sidebars.
	'sidebar-left' => array(
		'name' => __( 'Left Sidebar', 'ba-tours-light' ),
		//'desc' => __( 'Left Sidebar', 'ba-tours-light' ),
	),
	'sidebar-right' => array(
		'name' => __( 'Right Sidebar', 'ba-tours-light' ),
	),
	// Main panels.
	'before-header' => array(
		'name' => __( 'Before-Header panel', 'ba-tours-light' ),
	),
	'header'=> array(
		'name' => __( 'Header panel', 'ba-tours-light' ),
	),
	'before-content' => array(
		'name' => __( 'Before-Content panel', 'ba-tours-light' ),
	),
	'before-footer' => array(
		'name' => __( 'Before-Footer panel', 'ba-tours-light' ),
	),
	'footer' => array(
		'name' => __( 'Footer panel', 'ba-tours-light' ),
	),
	// Footer group panels.
	'footer-left' => array(
		'name' => __( 'Footer left panel', 'ba-tours-light' ),
	),
	'footer-middle' => array(
		'name' => __( 'Footer middle panel', 'ba-tours-light' ),
	),
	'footer-right' => array(
		'name' => __( 'Footer right panel', 'ba-tours-light' ),
	),
	// Content panels.
    /*
	'content-top' => array(
		'name' => __( 'Content-Top panel', 'ba-tours-light' ),
	),
	'content-left' => array(
		'name' => __( 'Content-Left panel', 'ba-tours-light' ),
	),
	'content-right' => array(
		'name' => __( 'Content-Right panel', 'ba-tours-light' ),
	),
	'content-bottom' => array(
		'name' => __( 'Content-Bottom panel', 'ba-tours-light' ),
	),
    */
);



//////////////////////////////////////////////////
/**
 * Grid classes support.
 */
$data['grid_classes'] = array(
	//'xs',
	//'sm',
	//'md',
	'lg',
);



//////////////////////////////////////////////////
/**
 * Panels base grid.
 * You can add grid-class-specific sets here.
 */
$data['grid'] = array(
	'main' => array(
		'default' => array(
			'sidebar-left'  => '3',
			'sidebar-right' => '3',
			'rest' => '6',
		),
	),
	'content' => array(
		'default' => array(
			'content-left'  => '2',
			'content-right' => '2',
			'rest' => '8',
		),
	),
	'footer' => array(
		'default' => array(
			'footer-middle' => '4',
			'footer-right'  => '4',
			'rest' => '4',
		),
	),
);



//////////////////////////////////////////////////
/**
 * Provide defines.
 */
do_action( 'bathemos_collect_data', $data, 'defines' );

$data = null;