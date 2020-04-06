<?php
/**
* functions.php
*
* @author    Franchi Design
* @package   Atomy
* @version   1.0.8
*/


/* Setup
========================================================================== */

if ( ! function_exists( 'atomy_setup' ) ) : 
    function atomy_setup() {
		load_theme_textdomain( 'atomy');
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
        // Add theme support Title-tag
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		// Custom size images
		add_image_size('atomy_big', 4000, 2000, true); 
		add_image_size('atomy_article',1500,800,true);
		add_image_size('atomy_portfolio',1200,800,true);
		add_image_size('atomy_slide',400,500,true);
		add_image_size('atomy_archive',1000,550,true);
		// Add Menu location
		register_nav_menus( array(
			'menu-1' => esc_html__('Primary', 'atomy'),
		) );
		// Switch default core markup for search form, comment form, and comments
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Support for background Image
		add_theme_support( 'custom-background', apply_filters( 'atomy_custom_background_args', array(
			'default-color' => 'fafafa',
		) ) );
        // Support for Video
		add_theme_support( 'custom-header', array(
			'video' => true,
		));
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
	}
endif;
add_action('after_setup_theme','atomy_setup');

/* Layout
========================================================================== */
function atomy_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('atomy_content_width',640);
}
add_action('after_setup_theme','atomy_content_width',0);

/* Widget Area
========================================================================== */

function atomy_widgets_init() {

	// Widget primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__('Sidebar Blog','atomy'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Card With Sidebar Section
	register_sidebar( array(
		'name'          => esc_html__('Card With Sidebar Section/Sidebar Store','atomy'), 
		'id'            => 'sidebar-3',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-featured %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-featured-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact Header
	register_sidebar( array(
		'name'          => esc_html__('Contact Header','atomy'),
		'id'            => 'sidebar-8',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact
	register_sidebar( array(
		'name'          => esc_html__('Contact Body','atomy'),
		'id'            => 'sidebar-9',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact Sidebar
	register_sidebar( array(
		'name'          => esc_html__('Contact Sidebar','atomy'),
		'id'            => 'sidebar-10',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services One
	register_sidebar( array(
		'name'          => esc_html__('Services One','atomy'),
		'id'            => 'sidebar-15',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services Two
	register_sidebar( array(
		'name'          => esc_html__('Services Two','atomy'),
		'id'            => 'sidebar-16',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services Three
	register_sidebar( array(
		'name'          => esc_html__('Services Three','atomy'),
		'id'            => 'sidebar-17',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'atomy_widgets_init' );

/* Enqueue scripts and styles
========================================================================== */

function atomy_scripts() {

	// Style
	wp_enqueue_style('atomy-style', get_stylesheet_uri() );
	// Bootstrap
	wp_enqueue_script('popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),'v1.14.3' ,true );
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),'v4.3.1' ,true );
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
    // Font Awesome
	wp_enqueue_style('font-awesome-css', get_template_directory_uri(). '/css/fontawesome-all.min.css');
	// AOS Animate
	wp_enqueue_script('aos-js',get_template_directory_uri() . '/js/aos.min.js', array(), '2.0.0', false );
	wp_enqueue_style('aos-css', get_template_directory_uri(). '/css/aos.min.css');
	// Atom Script
	wp_enqueue_script('atomy-custom-script-js', get_template_directory_uri() . '/js/atomy-custom-script.js', array(), 'v1.0.5', true );
	wp_enqueue_script('skip-link-focus-fix-js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// Comments
	if ( is_singular() && comments_open() && get_theme_mod( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomy_scripts' );

/* Require
========================================================================== */

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Implement the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';

// Functions which enhance the theme by hooking into WordPress
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-controls.php';


/* Woocommerce
========================================================================== */

// Add thema Support 
function atomy_add_woocommerce_support() {
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'atomy_add_woocommerce_support');

// Ensure cart contents update when products are added to the cart via AJAX
function atomy_header_add_to_cart_fragment( $fragments ) {
 
	ob_start();
	$count = WC()->cart->cart_contents_count;
	?><a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" data-tooltip="<?php esc_attr_e('Go to the cart','atomy');?>"> <i class="<?php echo esc_attr( get_theme_mod( 'at_icon_cart_change','fas fa-shopping-cart')); ?>"></i><?php
	if ( $count > 0 ) {
			?>
			<span class="cart-contents-count"><?php echo esc_html($count); ?></span>
			<?php            
	}
			?></a><?php

	$fragments['a.cart-contents'] = ob_get_clean();
	 
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'atomy_header_add_to_cart_fragment' );

//Hide category product count in product archives
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

//Display product category descriptions under category image/title on woocommerce shop page */

add_action( 'woocommerce_after_subcategory_title', 'atomy_add_cat_description', 12);
function atomy_add_cat_description ($category) {
$cat_id=$category->term_id;
$prod_term=get_term($cat_id,'product_cat');
$description=$prod_term->description;
echo '<div class="shop_cat_desc"><p>'.$description.'</p></div>';
}

// Change the breadcrumb separator
add_filter( 'woocommerce_breadcrumb_defaults', 'atomy_change_breadcrumb_delimiter' );
function atomy_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}

// Script custom select
function atomy_select_dropdown() {
	wp_enqueue_script( 'select2js', get_template_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '4.0.6', true );
	wp_enqueue_style( 'atomy-select2css', get_template_directory_uri() . '/css/atomy-select2.css' , array(), '4.0.6', 'all' );
	wp_enqueue_script( 'selectinit', get_template_directory_uri() . '/js/select2-init.js', array( 'select2js' ), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'atomy_select_dropdown');


/* Class Navigation Menu
========================================================================== */

// Add Class -li-
function atomy_add_classes_on_li($classes, $item, $args) {
	$classes[] = 'nav-item dropdown submenu';
	return $classes;

}
add_filter('nav_menu_css_class','atomy_add_classes_on_li',1,3);

// Add class -a-
function atomy_add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
}
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'atomy_add_menu_link_class', 1, 3 );

// Add Class -Sub-menu-
function atomy_some_function( $classes, $args, $depth ){
    foreach ( $classes as $key => $class ) {
    if ( $class == 'sub-menu' ) {
        $classes[ $key ] = 'dropdown-menu';
    }
}

return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'atomy_some_function', 10, 3 );

// Add filter dropdown-toggle
function atomy_add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
    $atts['class'] = 'dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
    $atts['data-target'] = '#';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'atomy_add_class_to_items_link', 10, 3 );


/* Add Menu Fallback
========================================================================== */

function atomy_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' .esc_url(admin_url( 'nav-menus.php' )) . '">' . $before .__('Add a menu','atomy') . $after . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}


/* Include script and styles for class add Panel
========================================================================== */

function atomy_pe_customize_controls_scripts() {

	wp_enqueue_script( 'atomy-pe-customize-controls', get_theme_file_uri( '/assets/js/atomy-pe-customize-controls.js' ), array(), '1.0', true );
}

add_action( 'customize_controls_enqueue_scripts', 'atomy_pe_customize_controls_scripts' );

function atomy_pe_customize_controls_styles() {

	wp_enqueue_style( 'atomy-pe-customize-controls', get_theme_file_uri( '/assets/css/atomy-pe-customize-controls.css' ), array(), '1.0' );
}

add_action( 'customize_controls_print_styles', 'atomy_pe_customize_controls_styles' );

function atomy_pe_customize_register( $wp_customize ) {

$wp_customize->register_panel_type( 'Atomy_WP_Customize_Panel' );
$wp_customize->register_section_type( 'Atomy_WP_Customize_Section' );

}

add_action( 'customize_register', 'atomy_pe_customize_register' );

/* Custom Navigation
========================================================================== */

function atomy_the_post_navigation( $args = array() ) {
	$args = wp_parse_args( $args, array(
			'prev_text'          => '<i class="far fa-arrow-alt-circle-left mr-2"></i>' . __( 'Previous Post:','atomy').'<br><span class="at-span-link-blog">'.'%title'.'</span>',
			'next_text'          =>  __( 'Next Post:','atomy') . '<i class="far fa-arrow-alt-circle-right ml-2"></i>'.'<br><span class="at-span-link-blog">'.'%title'.'</span>',
			'in_same_term'       => false,
			'excluded_terms'     => '',
			'taxonomy'           => 'category',
			'screen_reader_text' => __('Post navigation','atomy'),
	) );

	$navigation = '';

	$previous = get_previous_post_link(
			'<div class="nav-previous">%link</div>',
			$args['prev_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
	);

	$next = get_next_post_link(
			'<div class="nav-next">%link</div>',
			$args['next_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
	);

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
			$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

	return $navigation;
}

/* Google Font site
========================================================================== */

function atomy_custom_add_google_fonts() {
	wp_enqueue_style( 'atomy-custom-google-fonts', 'https://fonts.googleapis.com/css?family=Inconsolata:200,300,400,500,600,700,800,900|Indie+Flower:200,300,400,500,600,700,800,900|Lato:200,300,400,500,600,700,800,900|Montserrat:200,300,400,500,600,700,800,900|Roboto:200,300,400,500,600,700,800,900|Text+Me+One:200,300,400,500,600,700,800,900|Titillium+Web:200,300,400,500,600,700,800,900|Ubuntu:200,300,400,500,600,700,800,900',false );
	
}
add_action( 'wp_enqueue_scripts', 'atomy_custom_add_google_fonts' );


/* Custom button Pause/Play
========================================================================== */

add_filter( 'header_video_settings', 'atomy_video_settings');
function atomy_video_settings( $settings ) {
  $settings['l10n'] = array(
    'pause'      => '<i class="fas fa-pause"></i>',
    'play'       => '<i class="fas fa-play"></i>',
  );
  return $settings;
}

/* Breadcrumbs
========================================================================== */

function atomy_custom_breadcrumbs() {

    $sep = ' > ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div id="breadcrumbs">';
        echo '<a href="';
        echo esc_url(home_url());
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category($sep);
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'atomy' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'atomy' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'atomy' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'atomy' ), get_the_date( _x( 'Y', 'yearly archives date format', 'atomy' ) ) );
            } else {
                _e( 'Blog Archives', 'atomy' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

/* Magnific popup - https://dimsemenov.com/plugins/magnific-popup/
========================================================================== */

add_action('wp_enqueue_scripts', 'atomy_enqueue_magnificpopup_styles');
	function atomy_enqueue_magnificpopup_styles() {
				 wp_enqueue_style('magnific_popup_style', get_template_directory_uri().'/magnific-popup/magnific-popup.css', array());
	}
	 
add_action('wp_enqueue_scripts', 'atomy_enqueue_magnificpopup_scripts');
	function atomy_enqueue_magnificpopup_scripts() {
				wp_enqueue_script('magnific_popup_script', get_template_directory_uri().'/magnific-popup/jquery.magnific-popup.min.js', array('jquery'));
	 
				 wp_enqueue_script('magnific_init_script', get_template_directory_uri().'/magnific-popup/jquery.magnific-popup-init.js', array('jquery'));
	}


/* Include Plugin
========================================================================== */

require_once get_template_directory() . '/atomy-functionality-plugin/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'atomy_register_required_plugins' );


function atomy_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Contact Form 7
		array(
			'name'      => __('Contact Form 7','atomy'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// On Click Demo Import
		array(
			'name'      => __('One Click Demo Import','atomy'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		// WooCommerce
		array(
			'name'      => __('WooCommerce','atomy'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// YITH WooCommerce Quick View
		array(
			'name'      => __('YITH WooCommerce Quick View','atomy'),
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => false,
		),
		// I WooCommerce Wishlist
		array(
			'name'      => __('TI WooCommerce Wishlist','atomy'),
			'slug'      => 'ti-woocommerce-wishlist',
			'required'  => false,
		),
		// YITH WooCommerce Zoom Magnifier
		array(
			'name'      => __('YITH WooCommerce Zoom Magnifier','atomy'),
			'slug'      => 'yith-woocommerce-zoom-magnifier',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'atomy',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title'                      => __('Install Required Plugins','atomy'),
			'menu_title'                      => __('Install Plugins','atomy' ),
			/* translators: %s: search term */
			'installing'                      => __('Installing Plugin: %s','atomy'),
			/* translators: %s: search term */
			'updating'                        => __('Updating Plugin: %s','atomy'),
			'oops'                            => __('Something went wrong with the plugin API.','atomy'),
			/* translators: %1: search term */
			'notice_can_install_required'     => _n_noop(

				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'atomy'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'atomy'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'atomy'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'atomy'
			),
			'return'                          => __('Return to Required Plugins Installer','atomy'),
			'plugin_activated'                => __('Plugin activated successfully.','atomy'),
			'activated_successfully'          => __('The following plugin was activated successfully:','atomy'),
			/* translators: %1: search term */
			'plugin_already_active'           => __('No action taken. Plugin %1$s was already active.','atomy'),
			/* translators: %s: search term */
			'plugin_needs_higher_version'     => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.','atomy'),
			/* translators: %1: search term */
			'complete'                        => __('All plugins installed and activated successfully. %1$s','atomy'),
			'dismiss'                         => __('Dismiss this notice','atomy'),
			'notice_cannot_install_activate'  => __('There are one or more required or recommended plugins to install, update or activate.','atomy'),
			'contact_admin'                   => __('Please contact the administrator of this site for help.','atomy'),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);


	tgmpa( $plugins, $config );
}

/* Atomy Admin Page
========================================================================== */

 function atomy_page_create() {
     add_theme_page('Atomy', 'ATOMY', 'edit_theme_options', 'atomy_page', 'atomy_page_display',1);

 }

 add_action('admin_menu', 'atomy_page_create');

 require get_template_directory() . '/atomy-admin/atomy-support.php';
 
//Include Admin Style
function atomy_load_admin_style($hook) {
	if( $hook == 'appearance_page_atomy_page' ) {
	 wp_enqueue_style( 'atomy-admin-css', get_template_directory_uri() . '/atomy-admin/css/atomy-admin-style.css', false, '1.0.0' );
	 wp_enqueue_script( 'atomy-admin-script', get_template_directory_uri() . '/atomy-admin/js/atomy-admin-script.js', false, '1.0.0' );
	 wp_enqueue_style( 'atomy-font-awesome-admin', get_template_directory_uri() . '/css/fontawesome-all.min.css' );

	}
}
add_action( 'admin_enqueue_scripts', 'atomy_load_admin_style' );


/* Url Admin Support / Copyright
========================================================================== */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define('atomy_url_go_pro_theme','https://www.denisfranchi.com/atomy/');// Go Pro
define('atomy_url_updates_theme','https://www.denisfranchi.com/updates/');// Update Theme
define('atomy_url_documentation_theme','https://www.denisfranchi.com/community/index.php?forums/guides.20/');// Documentation Theme
define('atomy_url_support_theme','https://www.denisfranchi.com/community/index.php?forums/support.22/');// Support Theme
define('atomy_url_faq_1_support','https://www.denisfranchi.com/community/index.php?threads/initial-settings-atomy-free.29/#post-40');// Faq 1 Support
define('atomy_url_faq_2_support','https://www.denisfranchi.com/community/index.php?threads/plugin-settings.18/');// Faq 2 Support
define('atomy_url_faq_3_support','https://www.denisfranchi.com/community/index.php?threads/atomy-customize.17/');// Faq 3 Support
define('atomy_url_faq_4_support','https://www.denisfranchi.com/community/index.php?threads/image-size.20/');// Faq 4 Support
define('atomy_url_copyright_theme','https://www.denisfranchi.com/');// Franchi Design Copyright
define('atomy_url_demos_theme','https://www.denisfranchi.com/atomy-demos/');// Franchi Design Demo   
define('atomy_url_basic_documentation','https://www.denisfranchi.com/community/index.php?threads/initial-settings-atomy-free.29/');// Basic Documentation    
define('atomy_review_theme','https://wordpress.org/support/theme/atomy/reviews/');// Review Theme    


/* Notice Admin Area
-------------------------------------------------------- */

add_action( 'admin_enqueue_scripts', 'atomy_add_script' );
function atomy_add_script() {
		wp_register_script( 'notice-update',  get_theme_file_uri( '/atomy-admin/js/notice-update.js'),'','1.0', false );
		wp_enqueue_style( 'atomy-notice-style', get_theme_file_uri( '/atomy-admin/css/notice.css' ), array(), '1.0' );
		wp_localize_script( 'notice-update', 'notice_params', array(
			'ajax_url' => get_admin_url() . 'admin-ajax.php', 
		));
		
		wp_enqueue_script(  'notice-update' );
}

if( get_option( 'atomy_1_dismiss_notice' ) != true ) {

add_action( 'admin_notices', 'atomy_add_dismissible' );
}
function atomy_add_dismissible() {
  ?>
   <div class='notice notice-success atomy-1-dismiss-notice atomy-class-update is-dismissible'>
	   <div class="df-logo">
		   <a target="_blank" href="<?php echo esc_url(franchi_design_url); ?>">
	        <img src="<?php echo esc_url(get_template_directory_uri()).'/images/franchi-design.png';?>">
	   <span><?php _e('Franchi Design','atomy')?></span>
	   </a>
	   <h2><?php _e('Welcome to Atomy!','atomy')?></h2>
	   <p><?php _e('Important links to get you started with Atomy','atomy')?></p>
	  </div>
	  <div class="container">
		  <div class="row">
		  <div class="col-md-4">
		    <h3><?php _e('Get Started','atomy')?></h3>
		    <button class="at-button-dem"><a target="_blank" href="<?php echo esc_url(atomy_url_basic_documentation);?>"><?php _e('Learn Basics','atomy')?></a></button>
		  </div>
		  <div class="col-md-4">
			<h3><?php _e('Next Steps','atomy')?></h3>
			<ul>
			  <li><span class="dashicons dashicons-media-document"></span><a target="_blank" href="<?php echo esc_url(atomy_url_documentation_theme);?>"><?php _e('Documentation','atomy')?></a></li>
			  <li><span class="dashicons dashicons-layout"></span><a target="_blank" href="<?php echo esc_url(atomy_url_demos_theme);?>"><?php _e('Starter Demos','atomy')?></a></li>
			  <li><span class="dashicons dashicons-migrate"></span><a target="_blank" href="<?php echo esc_url(atomy_url_go_pro_theme);?>"><?php _e('Premium Version','atomy')?></a></li>
			</ul>
		</div>
		  <div class="col-md-4">
		    <h3><?php _e('Further Actions','atomy')?></h3>
			<ul>
			  <li><span class="dashicons dashicons-businessperson"></span><a target="_blank" href="<?php echo esc_url(atomy_url_support_theme);?>"><?php _e('Got theme support question?','atomy')?></a></li>
			  <li><span class="dashicons dashicons-thumbs-up"></span><a target="_blank" href="<?php echo esc_url(atomy_review_theme);?>"><?php _e('Leave a review','atomy')?></a></li>
			  <li><span class="dashicons dashicons-admin-appearance"></span><a target="_blank" href="<?php echo esc_url(atomy_url_updates_theme);?>"><?php _e('Changelog','atomy')?></a></li>
			</ul>
		  </div>
         </div>
		</div>
    </div>
  <?php
}

add_action( 'wp_ajax_atomy_1_dismiss_notice', 'atomy_1_dismiss_notice' );
function atomy_1_dismiss_notice() {
update_option( 'atomy_1_dismiss_notice', true );
}

/*  Demo Import
========================================================================== */

// Menu and Page
function atomy_after_import_setup() {
	// Assign menus to their locations.
	$menu_1 = get_term_by( 'name', 'Primary', 'nav_menu' );
	$menu_2 = get_term_by( 'name', 'Language', 'nav_menu' );
	
	set_theme_mod( 'nav_menu_locations', array(
			'menu-1' => $menu_1->term_id, 
			'menu-2' => $menu_2->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Store' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'atomy_after_import_setup' );

// Custim Text Plugin
function atomy_plugin_intro_text( $default_text ) {
	$default_text .= '<div class="ocdi__intro-text" style="margin-bottom:3em; text-align:center;background-color:#fff;height:100px;padding-top:50px;font-size:20px"><a target="_blank" style="margin-left:10px;text-decoration:none;" href="'.esc_url(atomy_url_demos_theme).'"><span class="dashicons dashicons-download"></span>'.__('Atomy Starter Demos','atomy').'</a><br><p>'.__('*Important! Before importing the demo install all the recommended plugins!','atomy').'</p></div>';
	
	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'atomy_plugin_intro_text' );

// Custom Title Plugin
function atomy_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'atomy' );
	$default_settings['menu_title']  = esc_html__( 'ATOMY Import Demo' , 'atomy' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'pt-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'atomy_plugin_page_setup' );

