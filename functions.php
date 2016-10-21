<?php // Theme Functions


// Theme setup
add_action( 'after_setup_theme', 'bento_theme_setup' );
add_action( 'after_setup_theme', 'bento_exists' );
add_action( 'switch_theme', 'bento_deactivated' );

function bento_theme_setup() {
	
	// Features
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'link', 'image' ) );
	add_theme_support( 'woocommerce' ); 
	add_theme_support( 'custom-logo' );
	
	// Actions
	add_action( 'wp_enqueue_scripts', 'bento_theme_styles_scripts' );
	add_action( 'admin_enqueue_scripts', 'bento_admin_scripts' );
	add_action( 'template_redirect', 'bento_theme_adjust_content_width' );
	add_action( 'get_header', 'bento_enable_threaded_comments' );
	add_action( 'wp_ajax_dismiss_novice', 'bento_dismiss_novice' );
	add_action( 'wp_ajax_nopriv_dismiss_novice', 'bento_dismiss_novice' );
	add_action( 'tgmpa_register', 'bento_register_required_plugins' );
	add_action( 'wp_ajax_ajax_pagination', 'bento_ajax_pagination' );
	add_action( 'wp_ajax_nopriv_ajax_pagination', 'bento_ajax_pagination' );
	add_action( 'widgets_init', 'bento_register_sidebars' );
	add_action( 'wp_ajax_bento_migrate_customizer_options', 'bento_migrate_customizer_options' );
	add_action( 'wp_ajax_nopriv_bento_migrate_customizer_options', 'bento_migrate_customizer_options' );
		
	// Filters
	add_filter( 'excerpt_more', 'bento_custom_excerpt_more' );
	add_filter( 'body_class', 'bento_extra_classes' );
	add_filter( 'post_class', 'bento_has_thumb_class' );
	add_filter( 'get_the_archive_title', 'bento_cleaner_archive_titles' );
	add_filter( 'cmb2_admin_init', 'bento_metaboxes' );
	add_filter( 'upload_mimes', 'bento_font_uploading' );
	add_filter( 'dynamic_sidebar_params', 'bento_count_footer_widgets', 50 );
	
	// Languages
	load_theme_textdomain( 'bento', get_template_directory() . '/languages' );
	
	// Customizer options
	if ( file_exists( get_template_directory() . '/includes/customizer/customizer.php' ) ) {
		require_once( get_template_directory() . '/includes/customizer/customizer.php' );
	}
	add_action( 'customize_register', 'bento_customize_register' );
	add_action( 'customize_controls_print_styles', 'bento_customizer_stylesheet' );
	add_action( 'customize_controls_enqueue_scripts', 'bento_customizer_scripts' );
	add_action( 'admin_notices', 'bento_customizer_admin_notice' );
	
	// SiteOrigin Content Builder integration
	add_filter('siteorigin_panels_row_attributes', 'bento_extra_row_attr', 10, 2);
	add_filter('siteorigin_panels_before_row', 'bento_content_builder_row_ids', 10, 3);
	
	// WooCommerce integration
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	add_action( 'woocommerce_before_main_content', 'bento_woo_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'bento_woo_wrapper_end', 10 );
	add_action( 'woocommerce_before_single_product_summary', 'bento_woo_single_product_sections_start', 20 );
	add_action( 'woocommerce_after_single_product_summary', 'bento_woo_single_product_sections_end', 20 );
	add_filter( 'woocommerce_enqueue_styles', 'bento_woo_dequeue_styles' );
	add_filter( 'woocommerce_product_add_to_cart_text', 'bento_woo_custom_cart_button_text' );  
	add_filter( 'get_product_search_form', 'bento_woo_custom_product_searchform' );
	add_filter( 'loop_shop_columns', 'bento_woo_loop_columns' );
	add_filter( 'loop_shop_per_page', create_function( '$cols', bento_woo_loop_perpage() ), 20 );
	    
}


// Register and enqueue CSS and scripts
function bento_theme_styles_scripts () {	
	
	// Register scripts
	wp_register_script( 'isotope', get_template_directory_uri().'/includes/isotope/isotope.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'packery', get_template_directory_uri().'/includes/isotope/packery-mode.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'imagesloaded', get_template_directory_uri().'/includes/isotope/imagesloaded.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'fitcolumns', get_template_directory_uri().'/includes/isotope/fit-columns.js', array('jquery'), false, true );
	wp_register_script( 'fitvids', get_template_directory_uri().'/includes/fitvids/jquery.fitvids.js', array('jquery'), false, true );
	wp_register_script( 'bento-theme-scripts', get_template_directory_uri().'/includes/js/theme-scripts.js', array('jquery'), false, true );
	
	// Enqueue scripts
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'packery' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'fitcolumns' );
	wp_enqueue_script( 'fitvids' );
	wp_enqueue_script( 'bento-theme-scripts' );
	
	// Register styles
	wp_register_style( 'bento-theme', get_template_directory_uri().'/style.css', array( 'dashicons' ), null, 'all' );
	wp_register_style( 'bento-fontawesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.min.css', array(), null, 'all' );
	
	// Enqueue styles
	wp_enqueue_style( 'bento-theme' );
	wp_enqueue_style( 'bento-fontawesome' );
	wp_enqueue_style( 'bento-google-fonts', bento_google_fonts(), array(), null );
		
	// Passing php variables to theme scripts
	bento_localize_scripts();

	// Inline styles for customizing the theme
	wp_add_inline_style( 'bento-theme', bento_customizer_css() );
	wp_add_inline_style( 'bento-theme', bento_insert_custom_styles() );
	    
}


// Admin scripts
function bento_admin_scripts () {
	
	// Register scripts
	wp_register_script( 'bento-admin-scripts', get_template_directory_uri().'/includes/js/admin-scripts.js', array('jquery'), false, true );
	
	// Enqueue scripts
	wp_enqueue_script( 'bento-admin-scripts' );
	
	// Passing php variables to admin scripts
	bento_localize_admin_scripts();
	
}


// Registed theme status for the Expansion Pack
function bento_exists() {
	if ( ! get_option( 'bento_theme' ) ) {
		if ( function_exists( 'add_option' ) ) {
			add_option( 'bento_theme', 'enabled' );
		}
	} else {
		update_option( 'bento_theme', 'enabled' );
	}
}
function bento_deactivated() {
	delete_option('bento_theme');
}


// Localize scripts
function bento_localize_scripts() {
	$bento_query = new WP_Query( bento_grid_query() );
	$bento_max_pages = $bento_query->max_num_pages; 
	global $post;
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
	$bento_grid_mode = 'nogrid';
	$bento_grid_setting = get_post_meta( $postid, 'bento_page_grid_mode', true );
	if ( get_page_template_slug($postid) == 'page-grid.php' ) {
		if ( $bento_grid_setting == 'rows' ) {
			$bento_grid_mode = 'fitRows';
		} else {
			$bento_grid_mode = 'packery';
		}
	}
	$bento_full_width_grid = 'off';
	if ( get_post_meta( $postid, 'bento_grid_full_width', true ) == 'on' ) {
		$bento_full_width_grid = 'on';
	}
    wp_localize_script( 'bento-theme-scripts', 'bentoThemeVars', array(
		'menu_config' => get_theme_mod( 'bento_menu_config' ),
		'fixed_menu' => get_theme_mod( 'bento_fixed_header' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	    'query_vars' => json_encode( $bento_query->query ),
        'max_pages' => $bento_max_pages,
		'grid_mode' => $bento_grid_mode,
		'full_width_grid' => $bento_full_width_grid,
    ));	
}
function bento_localize_admin_scripts() {
	wp_localize_script( 'bento-admin-scripts', 'bentoAdminVars', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	));
}


// Custom styles
function bento_insert_custom_styles() {
	
	$custom_css = '';
	
	// Grid
	global $post;
	if ( is_singular() && get_page_template_slug( $post->ID ) == 'page-grid.php' ) {
		$bento_grid_gutter = 10;
		$bento_grid_column = 3;
		$bento_grid_column_width = 33.3333;
		if ( get_post_meta($post->ID, 'bento_page_columns', true) > 0 ) {
			$bento_grid_column = get_post_meta($post->ID, 'bento_page_columns', true); 
		}
		$bento_grid_column_width = 100 / $bento_grid_column;
		$bento_gutter_setting = get_post_meta($post->ID, 'bento_page_item_margins', true); 
		if ( is_numeric($bento_gutter_setting) ) {
			$bento_grid_gutter = $bento_gutter_setting;
		}
		if ( strpos($bento_gutter_setting, 'px') !== false ) {
			$bento_grid_gutter = substr($bento_gutter_setting, 0, -2);
		}
		$bento_grid_double_width = $bento_grid_column_width * 2;
		
		$custom_css .= '
			@media screen and (min-width: 10em) {
				.grid-item,
				.grid-sizer {
					width: 100%;	
				}
			}
			@media screen and (min-width: 48em) {
				.grid-item,
				.grid-sizer {
					width: '.$bento_grid_column_width.'%;	
				}
				.grid-masonry .grid-item.tile-2x1,
				.grid-masonry .grid-item.tile-2x2 {
					width: '.$bento_grid_double_width.'%;
				}
			}
			.grid-container {
				margin: 0 -'.$bento_grid_gutter.'px;	
			}
			.grid-item-inner {
				padding: '.$bento_grid_gutter.'px;	
			}
			.grid-rows .grid-item {
				margin-bottom: '.$bento_grid_gutter.'px;	
				padding-bottom: '.$bento_grid_gutter.'px;	
			}
		';
	}
	
	// Individual page/post settings
	$postid = '';
	if ( is_singular() ) {
		$postid = $post->ID;
		$custom_css .= '
			.post-header-title h1,
			.entry-header h1 { 
				color: '.get_post_meta( $postid, 'bento_title_color', true ).'; 
			}
			.post-header-subtitle {
				color: '.get_post_meta( $postid, 'bento_subtitle_color', true ).';
			}
			.site-content {
				background-color: '.get_post_meta( $postid, 'bento_page_background_color', true ).';
			}
		';
		if ( get_post_meta( $postid, 'bento_hide_title', true ) == 'on' ) {
			$custom_css .= '
				.post-header-title h1,
				.entry-title:not(.grid-item-header .entry-title),
				.post-header-subtitle { 
					display: none;
				}
			';
		}
		if ( get_post_meta( $postid, 'bento_title_position', true ) == 'center' ) {
			$custom_css .= '
				.post-header-title,
				.post-header-subtitle {
					margin-left: auto;
					margin-right: auto;
				}
				.post-header-title h1,
				.entry-header h1,
				.post-header-subtitle,
				.portfolio-filter {
					text-align: center;
				}
			';
		}
		if ( get_post_meta( $postid, 'bento_uppercase_title', true ) == 'on' ) {
			$custom_css .= '
				.post-header-title h1,
				.entry-header h1 { 
					text-transform: uppercase;
				}
			';
		}
		if ( get_post_meta( $postid, 'bento_activate_header', true ) != '' ) {
			$custom_css .= '
				.post-header {
					background-image: url('.get_post_meta( $postid, 'bento_header_image', true ).');
				}
				.post-header-overlay {
					background-color: '.get_post_meta( $postid, 'bento_header_overlay', true ).';
					opacity: '.get_post_meta( $postid, 'bento_header_overlay_opacity', true ).';
				}
				.post-header-subtitle {
					margin-bottom: 0;
				}
				.post-header-cta a,
				.post-header-cta div {
					border-color: '.get_post_meta( $postid, 'bento_cta_background_color', true ).';
				}
				.post-header-cta .post-header-cta-primary {
					background-color: '.get_post_meta( $postid, 'bento_cta_background_color', true ).';
					color: '.get_post_meta( $postid, 'bento_cta_text_color', true ).';
				}
				.post-header-cta .post-header-cta-secondary {
					color: '.get_post_meta( $postid, 'bento_cta_background_color', true ).';
				}
				.post-header-cta a:hover,
				.post-header-cta div:hover {
					border-color: '.get_post_meta( $postid, 'bento_cta_background_color_hover', true ).';
				}
				.post-header-cta .post-header-cta-primary:hover {
					background-color: '.get_post_meta( $postid, 'bento_cta_background_color_hover', true ).';
				}
				.post-header-cta .post-header-cta-secondary:hover {
					color: '.get_post_meta( $postid, 'bento_cta_background_color_hover', true ).';
				}
				.post-header-cta .post-header-cta-secondary {
					color: '.get_post_meta( $postid, 'bento_cta_secondary_color', true ).';
					border-color: '.get_post_meta( $postid, 'bento_cta_secondary_color', true ).';
				}
				.post-header-cta .post-header-cta-secondary:hover {
					color: '.get_post_meta( $postid, 'bento_cta_secondary_color_hover', true ).';
					border-color: '.get_post_meta( $postid, 'bento_cta_secondary_color_hover', true ).';
				}
				@media screen and (min-width: 48em) {
					.post-header-title {
						padding-top: '.get_post_meta( $postid, 'bento_header_image_height', true ).';
						padding-bottom: '.get_post_meta( $postid, 'bento_header_image_height', true ).';
					}
				}
			';
			if ( get_post_meta( $postid, 'bento_transparent_header', true ) == 'on' && get_theme_mod( 'bento_menu_config' ) != 'side' ) {
				$custom_css .= '
					.site-header.no-fixed-header {
						background: transparent;
						position: absolute;
						top: 0;
						width: 100%;
						z-index: 1;
					}
					.primary-menu > li > .sub-menu {
						border-top-color: transparent;
					}
					.no-fixed-header .primary-menu > li > a, 
					.site-header .mobile-menu-trigger,
					.site-header .ham-menu-trigger {
						color: '.get_post_meta( $postid, 'bento_menu_color', true ).';
					}
					.no-fixed-header .primary-menu > li > a:hover {
						color: '.get_post_meta( $postid, 'bento_menu_color_hover', true ).';
					}
				';
			}
		}	
	}
	
	return $custom_css;
}


// Dismiss novice header on button click
function bento_dismiss_novice() {
    $option = $_POST['novice_option'];
	$new_value = 'dismissed';
	if ( current_user_can('install_themes') ) {
		update_option( $option, $new_value );
	}
}


// Load custom template tags
if ( file_exists( get_template_directory() . '/includes/template-tags.php' ) ) {
	require_once get_template_directory() . '/includes/template-tags.php';
}


// Set the content width
function bento_theme_adjust_content_width() {
	if ( ! isset( $content_width ) ) {
    	$content_width = 1080;
	}
}


// Enable threaded comments
function bento_enable_threaded_comments() {
if ( !is_admin() ) {
	if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1) )
		wp_enqueue_script('comment-reply');
	}
}


// Initialize navigation menus
register_nav_menus(
	array(
		'primary-menu' => 'Primary Menu',
		'footer-menu' => 'Footer Menu',
	)
);


// Register sidebars
function bento_register_sidebars() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(
			array(
				'name'=>'Sidebar',
				'id' => 'bento_sidebar',
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s clear">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		));
		register_sidebar(
			array(
				'name'=>'Footer',
				'id' => 'bento_footer',
				'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s clear">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		));
		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar(
				array(
					'name'=>'WooCommerce',
					'id' => 'bento_woocommerce',
					'before_widget' => '<div id="%1$s" class="widget widget-woo %2$s clear">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				)
			);
		}
	}
}


// Initialize the metabox class
if ( ! class_exists( 'CMB2_Bootstrap_212' ) ) {
	if ( file_exists( get_template_directory() . '/includes/metaboxes/init.php' ) ) {
		require_once ( get_template_directory().'/includes/metaboxes/init.php' );
	}
}


// Initialize the class for activating bundled plugins
if ( file_exists( get_template_directory() . '/includes/plugin-activation/class-tgm-plugin-activation.php' ) ) {
	require_once ( get_template_directory().'/includes/plugin-activation/class-tgm-plugin-activation.php' );
}
function bento_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Page Builder',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'Page Builder: Extra Elements',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		),
	);
	// Array of configuration settings
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'bento-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}


// Custom excerpt ellipses
function bento_custom_excerpt_more($more) {
	return __('Continue reading', 'bento').' &rarr;';
}


// Extra body classes
function bento_extra_classes( $classes ) {
	global $post;
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
    
	// Sidebar configuration	
	if ( is_singular() ) {
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			if ( ! is_active_sidebar( 'bento_woocommerce' ) || get_post_meta( $postid, 'bento_sidebar_layout', true ) == 'full-width' || is_cart() || is_checkout() ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'has-sidebar';
				if ( get_post_meta( $postid, 'bento_sidebar_layout', true ) == 'left-sidebar' ) {
					$classes[] = 'left-sidebar';
				} else {
					$classes[] = 'right-sidebar';
				}
			}
		} else {
			if ( ( ! is_active_sidebar( 'bento_sidebar' ) && get_post_type( $postid ) != 'project' ) || get_post_meta( $postid, 'bento_sidebar_layout', true ) == 'full-width' ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'has-sidebar';
				if ( get_post_meta( $postid, 'bento_sidebar_layout', true ) != '' ) {
					$classes[] = get_post_meta( $postid, 'bento_sidebar_layout', true );
				} else {
					$classes[] = 'right-sidebar';
				}
			}
		}
	} else {
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			if ( is_shop() ) {
				$page_id = woocommerce_get_page_id('shop');
				if ( get_post_meta( $page_id, 'bento_sidebar_layout', true ) == 'full-width' ) {
					$classes[] = 'no-sidebar';	
				} else {
					$classes[] = get_post_meta( $page_id, 'bento_sidebar_layout', true );
					$classes[] = 'has-sidebar';
				}
			} else {
				if ( is_active_sidebar( 'bento_woocommerce' ) ) {
					$classes[] = 'has-sidebar';	
					$classes[] = 'right-sidebar';
				} else {
					$classes[] = 'no-sidebar';	
				}
			}
		} else {
			if ( is_active_sidebar( 'bento_sidebar' ) ) {
				$classes[] = 'has-sidebar';	
				$classes[] = 'right-sidebar';
			} else {
				$classes[] = 'no-sidebar';	
			}
		}
	}
	
	// Boxed website layout
	if ( get_theme_mod( 'bento_website_layout' ) == 1 ) {
		$classes[] = 'boxed-layout';
	}
	
	// Extended header
	if ( get_post_meta( $postid, 'bento_activate_header', true ) == 'on' ) {
		$classes[] = 'extended-header';
	}
	
	// Header configuration
	if ( get_theme_mod( 'bento_menu_config' ) == 1 ) {
		$classes[] = 'header-centered';
	} else if ( get_theme_mod( 'bento_menu_config' ) == 2 ) {
		$classes[] = 'header-hamburger';
	} else if ( get_theme_mod( 'bento_menu_config' ) == 3 ) {
		$classes[] = 'header-side';
	} else {
		$classes[] = 'header-default';
	}
	
	// WooCommerce shop columns
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$classes[] = 'shop-columns-'.get_theme_mod( 'bento_wc_shop_columns' );
	}
	
    return $classes;
}


// Adds a class to post depending on whether it has a thumbnail
function bento_has_thumb_class($classes) {
	global $post;
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
	if ( has_post_thumbnail($postid) ) { 
		$classes[] = 'has-thumb'; 
	} else {
		$classes[] = 'no-thumb'; 	
	}
	return $classes;
}


// Remove prefixes from archive page titles
function bento_cleaner_archive_titles($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
    return $title;
}


// Allow uploading fonts
function bento_font_uploading( $existing_mimes ){
	$existing_mimes['svg'] = 'image/svg+xml';
	$existing_mimes['ttf'] = 'application/x-font-ttf'; 
	$existing_mimes['otf'] = 'application/x-font-opentype'; 
	$existing_mimes['woff'] = 'application/font-woff'; 
	$existing_mimes['eot'] = 'application/vnd.ms-fontobject';  
	return $existing_mimes;
}


// Count the number of active widgets
function bento_count_footer_widgets( $params ) {
	global $wp_registered_widgets;
	global $sidebars_widgets;
	$widget_count = 0;
	if ( isset ( $sidebars_widgets['bento_footer'] ) ) {
		foreach ( $sidebars_widgets['bento_footer'] as $widget_id ) {
			if ( function_exists( 'pll_current_language' ) && is_object( $wp_registered_widgets[ $widget_id ]['callback'][0] ) ) {
				$widget_options = get_option( 'widget_' . $wp_registered_widgets[ $widget_id ]['callback'][0]->id_base );
				$widget_number = preg_replace( '/[^0-9.]+/i', '', $widget_id );
				$current_widget_options = $widget_options[ $widget_number ];
				if ( $current_widget_options['pll_lang'] == pll_current_language() ) {
					$widget_count++;
				}
			} else {
				$widget_count ++;
			}
		}
	}	
	if ( isset( $params[0]['id'] ) && $params[0]['id'] == 'bento_footer' ) {
		$class = 'class="column-'.$widget_count.' '; 
		$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
	}
	return $params;
}


// Load more posts with ajax
function bento_ajax_pagination() {
	$url = wp_get_referer();
	$post_id = url_to_postid( $url );
	global $bento_parent_page_id; 
	$bento_parent_page_id = $post_id;
	$query_args = bento_grid_query(); 
	$query_args['paged'] = $_POST['page'] + 1;
	$post_types = get_post_meta( $post_id, 'bento_page_content_types', true );
	$query_args['post_type'] = $post_types;
	$bento_grid_number_items = get_post_meta( $post_id, 'bento_page_number_items', true );
	if ( ctype_digit($bento_grid_number_items) &&  ctype_digit($bento_grid_number_items) != 0 ) {
		$query_args['posts_per_page'] = (int)$bento_grid_number_items;
	} else {
		$query_args['posts_per_page'] = get_option('posts_per_page');	
	}
    $pagination_query = new WP_Query( $query_args );
	if ( $pagination_query->have_posts() ) { 
		while ( $pagination_query->have_posts() ) { 
			$pagination_query->the_post();
			// Include the page content
			if ( get_page_template_slug( $post_id ) == 'page-grid.php' ) {
				get_template_part( 'content', 'grid' ); 
			} else {
				get_template_part( 'content' ); 
			}
		}
	}
	die();
}


// Custom query for grid pages
function bento_grid_query() {
	global $post;
	global $post_id;
	if ( isset( $post->ID ) ) {
		$post_id = $post->ID;
	}
	$bento_grid_query_args = array();
	$post_types = get_post_meta( $post_id, 'bento_page_content_types', true );
	$bento_grid_query_args['post_type'] = $post_types;
	if ( is_front_page() ) {
		$bento_paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	} else {
		$bento_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	}
	$bento_grid_query_args['paged'] = $bento_paged;
	$bento_grid_number_items = get_post_meta( $post_id, 'bento_page_number_items', true );
	if ( ctype_digit($bento_grid_number_items) && ctype_digit($bento_grid_number_items) != 0 ) {
		$bento_grid_query_args['posts_per_page'] = (int)$bento_grid_number_items;
	} else {
		$bento_grid_query_args['posts_per_page'] = get_option('posts_per_page');	
	}
	return $bento_grid_query_args;
}


// Page settings metaboxes
function bento_metaboxes() {
	
	// Define strings
	$bento_prefix = 'bento_';
	$bento_ep_url = '<a href="http://satoristudio.net/bento-free-wordpress-theme/#expansion-pack/?utm_source=disabled&utm_medium=theme&utm_campaign=theme" target="_blank">Expansion Pack</a>';
	
	// Function to add a multicheck with post types
	add_action( 'cmb2_render_multicheck_posttype', 'bento_render_multicheck_posttype', 10, 5 );
	function bento_render_multicheck_posttype( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
		$cpts = array( 'post', 'project' );
		if ( class_exists( 'WooCommerce' ) ) {
			$cpts[] = 'product';
		}
		$options = '';
		$i = 1;
		$values = (array) $escaped_value;
		if ( $cpts ) {
			foreach ( $cpts as $cpt ) {
				$args = array(
					'value' => $cpt,
					'label' => $cpt,
					'type' => 'checkbox',
					'name' => $field->args['_name'] . '[]',
				);
				if ( in_array( $cpt, $values ) ) {
					$args[ 'checked' ] = 'checked';
				}
				if ( $cpt == 'project' && get_option( 'bento_ep_license_status' ) != 'valid' ) {
					$args[ 'disabled' ] = 'disabled';
				}
				$options .= $field_type_object->list_input( $args, $i );
				$i++;
			}
		}
		$classes = false === $field->args( 'select_all_button' ) ? 'cmb2-checkbox-list no-select-all cmb2-list' : 'cmb2-checkbox-list cmb2-list';
		echo $field_type_object->radio( array( 'class' => $classes, 'options' => $options ), 'multicheck_posttype' );
	}
	
	// SEO settings
	$bento_seo_settings = new_cmb2_box( 
		array(
			'id'            => 'seo_settings_metabox',
			'title'         => __( 'SEO Settings', 'bento' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	if ( get_option( 'bento_ep_license_status' ) == 'valid' ) {
		$bento_seo_settings->add_field(
			array(
				'name' => __( 'Meta title', 'bento' ),
				'desc' => __( 'Input the meta title - the text to be used by search engines as well as browser tabs (recommended max length - 60 symbols); the post title will be used by default if this field is empty.', 'bento' ),
				'id' => $bento_prefix . 'meta_title',
				'type' => 'text',
			)
		);
		$bento_seo_settings->add_field(
			array(
				'name' => __( 'Meta description', 'bento' ),
				'desc' => __( 'Input the meta description - the text to be used by search engines on search result pages (recommended max length - 160 symbols); the first part of the post body will be used by default is this field is left blank.', 'bento' ),
				'id' => $bento_prefix . 'meta_description',
				'type' => 'textarea',
				'attributes' => array(
					'rows' => 3,
				),
			)
		);
	} else {
		$bento_seo_settings->add_field(
			array(
				'name' => __( 'Meta title', 'bento' ),
				'desc' => sprintf( __( 'Install the %s to set the meta title for individual posts and pages', 'bento' ), $bento_ep_url ),
				'id' => $bento_prefix . 'meta_title',
				'type' => 'text',
				'attributes'  => array(
					'readonly' => 'readonly',
					'disabled' => 'disabled',
				),
			)
		);
		$bento_seo_settings->add_field(
			array(
				'name' => __( 'Meta description', 'bento' ),
				'desc' => sprintf( __( 'Install the %s to set the meta description for individual posts and pages', 'bento' ), $bento_ep_url ),
				'id' => $bento_prefix . 'meta_description',
				'type' => 'textarea',
				'attributes' => array(
					'rows' => 3,
					'readonly' => 'readonly',
					'disabled' => 'disabled',
				),
			)
		);
	}
	
	// General page/post settings
	$bento_general_settings = new_cmb2_box( 
		array(
			'id'            => 'post_settings_metabox',
			'title'         => __( 'General Settings', 'bento' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names' => true,
		) 
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Sidebar layout', 'bento' ),
			'desc' => __( 'Choose whether to display a sidebar and on which side of the content', 'bento' ),
			'id' => $bento_prefix . 'sidebar_layout',
			'type' => 'select',
			'options' => array(
				'right-sidebar' => __( 'Right Sidebar (default)', 'bento' ),
				'left-sidebar' => __( 'Left Sidebar', 'bento' ),
				'full-width' => __( 'Full Width', 'bento' ),
			),
			'default' => 'right-sidebar',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Page background color', 'bento' ),
			'desc' => __( 'Choose the background color for current page/post. This will override any settings in the Theme Options', 'bento' ),
			'id' => $bento_prefix . 'page_background_color',
			'type' => 'colorpicker',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Hide featured image', 'bento' ),
			'desc' => __( 'Check this option if you DO NOT want to display the featured image (thumbnail) on the page; it will still be used for the corresponding tile on the "columns" or "rows" grid pages.', 'bento' ),
			'id' => $bento_prefix . 'hide_thumb',
			'type' => 'checkbox',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Hide title', 'bento' ),
			'desc' => __( 'Check this option if you DO NOT want to display the title on the page', 'bento' ),
			'id' => $bento_prefix . 'hide_title',
			'type' => 'checkbox',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Uppercase title', 'bento' ),
			'desc' => __( 'Check this option if you want the page title to be entirely in uppercase (useful for landing pages).', 'bento' ),
			'id' => $bento_prefix . 'uppercase_title',
			'type' => 'checkbox',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Title position', 'bento' ),
			'desc' => __( 'Choose the position of the title; default is left-aligned.', 'bento' ),
			'id' => $bento_prefix . 'title_position',
			'type' => 'select',
			'options' => array(
				'left' => __( 'Left-aligned (default)', 'bento' ),
				'center' => __( 'Centered', 'bento' ),
			),
			'default' => 'left',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Title color', 'bento' ),
			'desc' => __( 'Choose the text color for the title of this post. This will override any settings in the Theme Options', 'bento' ),
			'id' => $bento_prefix . 'title_color',
			'type' => 'colorpicker',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Subtitle', 'bento' ),
			'desc' => __( 'Input the subtitle for the page.', 'bento' ),
			'id' => $bento_prefix . 'subtitle',
			'type' => 'textarea',
		)
	);
	$bento_general_settings->add_field(
		array(
			'name' => __( 'Subtitle color', 'bento' ),
			'desc' => __( 'Choose the text color for the subtitle of this page; default is #999999 (light grey).', 'bento' ),
			'id' => $bento_prefix . 'subtitle_color',
			'type' => 'colorpicker',
			'default' => '#999999',
		)
	);
	
	// Extended header settings
	$bento_header_settings = new_cmb2_box( 
		array(
			'id'            => 'post_header_metabox',
			'title'         => __( 'Page Header Settings', 'bento' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names' => true,
		) 
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Activate extended header', 'bento' ),
			'desc' => __( 'Check this box to enable extended header options such as header image and call-to-action-buttons.', 'bento' ),
			'id' => $bento_prefix . 'activate_header',
			'type' => 'checkbox',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Header height', 'bento' ),
			'desc' => __( 'Choose the title top and bottom padding, which will affect the header height; default is 10%', 'bento' ),
			'id' => $bento_prefix . 'header_image_height',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'bento' ),
				'5%' => '5%',
				'10%' => __( '10% (default)', 'bento' ),
				'15%' => '15%',
				'20%' => '20%',
				'25%' => '25%',
			),
			'default' => '10%',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Header image', 'bento' ),
			'desc' => __( 'Upload the image to serve as the header; recommended size is 1400x300 pixels and above, yet mind the file size - excessively large images may worsen user experience', 'bento' ),
			'id' => $bento_prefix . 'header_image',
			'type' => 'file',
		)
	);
	if ( get_option( 'bento_ep_license_status' ) == 'valid' ) {
		$bento_header_settings->add_field(
			array(
				'name' => __( 'Header video', 'bento' ),
				'desc' => __( 'Upload the video file to be used as header background; if this is active, the header image will serve as a placeholder for mobile devices; .mp4 files are recommended, but you can also use .ogv and .webm formats. Please mind the file size - excessively large images may worsen user experience', 'bento' ),
				'id' => $bento_prefix . 'header_video_source',
				'type' => 'file',
			)
		);
	}
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Header image overlay color', 'bento' ),
			'desc' => __( 'Choose the color for the image overlay, designed to make the title text stand out more clearly', 'bento' ),
			'id' => $bento_prefix . 'header_overlay',
			'type' => 'colorpicker',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Header image overlay opacity', 'bento' ),
			'desc' => __( 'Choose the opacity level for the image overlay; 0.0 is fully transparent, 1.0 is fully opaque, default is 0.3', 'bento' ),
			'id' => $bento_prefix . 'header_overlay_opacity',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'bento' ),
				'0.0' => '0.0',
				'0.1' => '0.1',
				'0.2' => '0.2',
				'0.3' => __( '0.3 (default)', 'bento' ),
				'0.4' => '0.4',
				'0.5' => '0.5',
				'0.6' => '0.6',
				'0.7' => '0.7',
				'0.8' => '0.8',
				'0.9' => '0.9',
				'1.0' => '1.0',
			),
			'default' => '0.3',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Transparent website header', 'bento' ),
			'desc' => __( 'Check this option to make the website header (the top area with the menu and the logo) look like a transparent overlay on top of the header image on this page.', 'bento' ),
			'id' => $bento_prefix . 'transparent_header',
			'type' => 'checkbox',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Website menu color on this page', 'bento' ),
			'desc' => __( 'Choose the color for the website menu on this page (useful for the transparent header).', 'bento' ),
			'id' => $bento_prefix . 'menu_color',
			'type' => 'colorpicker',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Website menu mouse-hover color on this page', 'bento' ),
			'desc' => __( 'Choose the mouse-over color for the website menu on this page (useful for the transparent header).', 'bento' ),
			'id' => $bento_prefix . 'menu_color_hover',
			'type' => 'colorpicker',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button text', 'bento' ),
			'desc' => __( 'Input the text for an optional call-to-action button.', 'bento' ),
			'id' => $bento_prefix . 'cta_primary_text',
			'type' => 'text_medium',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button link', 'bento' ),
			'desc' => __( 'Paste the URL link to point the call-to-action button to; leave this blank to scroll the page below the header on button click.', 'bento' ),
			'id' => $bento_prefix . 'cta_primary_link',
			'type' => 'text',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button background color', 'bento' ),
			'desc' => __( 'Choose the background color for the call-to-action buttons; default is #00b285 (green-blue).', 'bento' ),
			'id' => $bento_prefix . 'cta_background_color',
			'type' => 'colorpicker',
			'default' => '#00b285',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button mouse-over background color', 'bento' ),
			'desc' => __( 'Choose the text color for the call-to-action buttons on hover; default is #00906c (dark-green).', 'bento' ),
			'id' => $bento_prefix . 'cta_background_color_hover',
			'type' => 'colorpicker',
			'default' => '#00906c',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button text color', 'bento' ),
			'desc' => __( 'Choose the text color for the primary call-to-action button; default is #ffffff (white).', 'bento' ),
			'id' => $bento_prefix . 'cta_text_color',
			'type' => 'colorpicker',
			'default' => '#ffffff',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button text', 'bento' ),
			'desc' => __( 'Input the text for an optional secondary call-to-action button.', 'bento' ),
			'id' => $bento_prefix . 'cta_secondary_text',
			'type' => 'text_medium',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button link', 'bento' ),
			'desc' => __( 'Paste the URL link to point the secondary call-to-action button to; leave this blank to scroll the page below the header on button click.', 'bento' ),
			'id' => $bento_prefix . 'cta_secondary_link',
			'type' => 'text',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button color', 'bento' ),
			'desc' => __( 'Choose the text and border color for the secondary call-to-action button; default is #00b285 (green-blue) or the same as the primary button.', 'bento' ),
			'id' => $bento_prefix . 'cta_secondary_color',
			'type' => 'colorpicker',
		)
	);
	$bento_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button mouse-over color', 'bento' ),
			'desc' => __( 'Choose the text and border color for the secondary call-to-action button on hover; default is #00906c (dark-green) or the same as the primary button.', 'bento' ),
			'id' => $bento_prefix . 'cta_secondary_color_hover',
			'type' => 'colorpicker',
		)
	);
	
	// Map header settings
	if ( get_option( 'bento_ep_license_status' ) == 'valid' ) {
		$bento_headermap_settings = new_cmb2_box( 
			array(
				'id'            => 'post_headermap_metabox',
				'title'         => __( 'Map Header', 'bento' ),
				'object_types'  => array( 'page' ),
				'context'       => 'normal',
				'priority'      => 'low',
				'show_names' => true,
			) 
		);
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Activate Google Maps header', 'bento' ),
				'desc' => __( 'Check this box to enable Google Maps header; note that this will deactivate the extended header image/video.', 'bento' ),
				'id' => $bento_prefix . 'activate_headermap',
				'type' => 'checkbox',
			)
		);
		$maps_key_url = 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key';
		$maps_key_text = sprintf( wp_kses( __( 'Input the API key for this instance of Maps - you can find detailed instructions on generating your API key <a href="%s" target="_blank">here</a>.', 'bento' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( $maps_key_url ) );
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Google Maps API key', 'bento' ),
				'desc' => $maps_key_text,
				'id' => $bento_prefix . 'headermap_key',
				'type' => 'text',
			)
		);
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Map center location', 'bento' ),
				'desc' => __( 'Input the address (country, city, or exact address) of the location on which to center the map.', 'bento' ),
				'id' => $bento_prefix . 'headermap_center',
				'type' => 'text',
			)
		);
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Map height', 'bento' ),
				'desc' => __( 'Select the height of the map, in pixels.', 'bento' ),
				'id' => $bento_prefix . 'headermap_height',
				'type' => 'select',
				'options' => array(
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => __( '400 (default)', 'bento' ),
					'500' => '500',
					'600' => '600',
					'700' => '700',
				),
				'default' => '400',
			)
		);
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Map zoom level', 'bento' ),
				'desc' => __( 'Choose the zoom level for the map, 1 being entire world and 20 being individual buildings.', 'bento' ),
				'id' => $bento_prefix . 'headermap_zoom',
				'type' => 'select',
				'options' => array(
					1 => '1',
					2 => '2',
					3 => '3',
					4 => '4',
					5 => '5',
					6 => '6',
					7 => '7',
					8 => '8',
					9 => '9',
					10 => '10',
					11 => '11',
					12 => '12',
					13 => '13',
					14 => '14',
					15 => __( '15 (default)', 'bento' ),
					16 => '16',
					17 => '17',
					18 => '18',
					19 => '19',
					20 => '20',
				),
				'default' => 15,
			)
		);
		$snazzymaps_url = 'https://snazzymaps.com';
		$snazzymaps_link = sprintf( wp_kses( __( 'You can insert the code for custom map styling here; check <a href="%s" target="_blank">Snazzymaps.com</a> for ready-made snippets: when on the page of the particular style, click on the "Copy" button or simply select and copy the code under the "Javascript Style Array" heading.', 'bento' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $snazzymaps_url ) );
		$bento_headermap_settings->add_field(
			array(
				'name' => __( 'Map custom style', 'bento' ),
				'desc' => $snazzymaps_link,
				'id' => $bento_prefix . 'headermap_style',
				'type' => 'textarea',
			)
		);
	}
	
	// Masonry tile settings
	$bento_tile_settings = new_cmb2_box( 
		array(
			'id'            => 'tile_settings_metabox',
			'title'         => __( 'Masonry Tile Settings / Only for displaying on "Grid" page template with "Masonry" grid type', 'bento' ),
			'object_types'  => array( 'post', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile size', 'bento' ),
			'desc' => __( 'Choose the size of the tile relative to the default 1x1 tile (defined by the number of columns in the grid)', 'bento' ),
			'id' => $bento_prefix . 'tile_size',
			'type' => 'select',
			'options' => array(
				'1x1' => __( '1x1 (default)', 'bento' ),
				'1x2' => '1x2',
				'2x1' => '2x1',
				'2x2' => '2x2',
			),
			'default' => '1x1',
		)
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile overlay color', 'bento' ),
			'desc' => __( 'Choose the color for an overlay for the tile background image; default is #666666 (grey)', 'bento' ),
			'id' => $bento_prefix . 'tile_overlay_color',
			'type' => 'colorpicker',
			'default' => '#666666',
		)
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile image', 'bento' ),
			'desc' => __( 'Upload the image to be used in the tile; if this field is empty, the featured image (thumbnail) will be used.', 'bento' ),
			'id' => $bento_prefix . 'tile_image',
			'type' => 'file',
		)
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile overlay opacity', 'bento' ),
			'desc' => __( 'Select the opacity level for an overlay for the tile background image, 0 is fully transparent (default is 0.6)', 'bento' ),
			'id' => $bento_prefix . 'tile_overlay_opacity',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'bento' ),
				'0.0' => '0.0',
				'0.1' => '0.1',
				'0.2' => '0.2',
				'0.3' => '0.3',
				'0.4' => '0.4',
				'0.5' => '0.5',
				'0.6' => __( '0.6 (default)', 'bento' ),
				'0.7' => '0.7',
				'0.8' => '0.8',
				'0.9' => '0.9',
				'1.0' => '1.0',
			),
			'default' => '0.6',
		)
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile text color', 'bento' ),
			'desc' => __( 'Choose the color for the text inside the tile; default is #ffffff (white)', 'bento' ),
			'id' => $bento_prefix . 'tile_text_color',
			'type' => 'colorpicker',
			'default' => '#ffffff',
		)
	);
	$bento_tile_settings->add_field(
		array(
			'name' => __( 'Tile text size', 'bento' ),
			'desc' => __( 'Choose the text size for the tile; default is 16px', 'bento' ),
			'id' => $bento_prefix . 'tile_text_size',
			'type' => 'select',
			'options' => array(
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'16' => __( '16 (default)', 'bento' ),
				'18' => '18',
				'20' => '20',
				'24' => '24',
				'28' => '28',
			),
			'default' => '16',
		)
	);
	
	// Grid page settings
	$bento_grid_settings = new_cmb2_box( 
		array(
			'id'            => 'grid_settings_metabox',
			'title'         => __( 'Grid Settings', 'bento' ),
			'object_types'  => array( 'page' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Grid mode', 'bento' ),
			'desc' => __( 'Choose which grid type to use on this page', 'bento' ),
			'id' => $bento_prefix . 'page_grid_mode',
			'type' => 'select',
			'options' => array(
				'columns' => 'Columns',
				'masonry' => 'Masonry',
				'rows' => 'Rows',
			),
			'default' => 'columns',
		)
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Number of columns', 'bento' ),
			'desc' => __( 'Select the number of columns in the grid or number of base tiles per line in masonry', 'bento' ),
			'id' => $bento_prefix . 'page_columns',
			'type' => 'select',
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => __( '3 (default)', 'bento' ),
				'4' => '4',
				'5' => '5',
				'6' => '6',
			),
			'default' => '3',
		)
	);
	if ( get_option( 'bento_ep_license_status' ) == 'valid' ) {
		$bento_grid_settings->add_field(
			array(
				'name' => __( 'Content types', 'bento' ),
				'id' => $bento_prefix . 'page_content_types',
				'type' => 'multicheck_posttype',
				'default' => 'post',
			)
		);
	} else {
		$bento_grid_settings->add_field(
			array(
				'name' => __( 'Content types', 'bento' ),
				'desc' => sprintf( __( 'Install the %s to use the "project" (portfolio) content type', 'bento' ), $bento_ep_url ),
				'id' => $bento_prefix . 'page_content_types',
				'type' => 'multicheck_posttype',
				'default' => 'post',
			)
		);
	}
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Items per page', 'bento' ),
			'desc' => __( 'Input the number of items to display per page; default is the number set in "Settings - Reading" admin section', 'bento' ),
			'id' => $bento_prefix . 'page_number_items',
			'type' => 'text_small',
			'default' => '10',
		)
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Item margins', 'bento' ),
			'desc' => __( 'Input the margin width in pixels (default is 10)', 'bento' ),
			'id' => $bento_prefix . 'page_item_margins',
			'type' => 'text_small',
			'default' => '10',
		)
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Hide tile overlays', 'bento' ),
			'desc' => __( 'Only display tile overlays in masonry on mouse hover', 'bento' ),
			'id' => $bento_prefix . 'hide_tile_overlays',
			'type' => 'checkbox',
		)
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Force full width', 'bento' ),
			'desc' => __( 'Check this option if you want the grid to stretch the entire width of the screen', 'bento' ),
			'id' => $bento_prefix . 'grid_full_width',
			'type' => 'checkbox',
		)
	);
	$bento_grid_settings->add_field(
		array(
			'name' => __( 'Load items on same page', 'bento' ),
			'desc' => __( 'Replace the standard pagination with a button which loads next items without refreshing the page', 'bento' ),
			'id' => $bento_prefix . 'page_ajax_load',
			'type' => 'checkbox',
		)
	);
	
}


// SiteOrigin Content Builder integration
	
	// Add extra attribute to rows
	function bento_extra_row_attr( $attributes, $grid ) {
		if ( ! empty( $grid['style'] ) ) {
			if ( ! empty ( $grid['style']['class'] ) ) {
				$attributes['data-extraid'] = $grid['style']['class'];
			}
		}
		return $attributes;
	}
	
	// Add divs with ids before each row which has extra classes (useful for one-page layouts)
	function bento_content_builder_row_ids( $code, $grid, $attr ) {
		if ( ! empty( $attr['data-extraid'] ) ) {
			$rowclasses = $attr['data-extraid'];
			$extradiv = '<a id="'.$rowclasses.'"></a>';
			return $extradiv;
		}
	}


// WooCommerce integration

	// Declare new content wrappers
	function bento_woo_wrapper_start() {
		echo '<div class="bnt-container"><div class="content"><main class="site-main" role="main"><article>';
	}
	function bento_woo_wrapper_end() {
		echo '</article></main></div>';
		$page_id = '';
		global $post;
		if ( is_shop() ) {
			$page_id = woocommerce_get_page_id('shop');
		} else if ( $post ) {
			$page_id = $post->ID;
		}
		if ( is_active_sidebar( 'bento_woocommerce' )  ) {
			if ( get_post_meta( $page_id, 'bento_sidebar_layout', true ) != 'full-width' || is_product_category() ) {
				echo '<div class="sidebar widget-area sidebar-woo clear">';
					dynamic_sidebar( 'bento_woocommerce' );
				echo '</div>';
			}
		}
		echo '</div>';
	}
	
	// Remove plugin styling
	function bento_woo_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );
		return $enqueue_styles;
	}
		
	// Hide image placeholder for products without thumbnails
	function woocommerce_template_loop_product_thumbnail() {
		global $post;
		if ( has_post_thumbnail() ) {
			echo get_the_post_thumbnail( $post->ID, 'shop_catalog' );
		}
	}
	
	// Change the "Add to cart" button text 
	function bento_woo_custom_cart_button_text() {
		return '';
	}
	
	// Custom number of products per shop page
	function bento_woo_loop_perpage() {
		$bento_wc_shop_num = get_theme_mod( 'bento_wc_shop_number_items' );
		return 'return '.$bento_wc_shop_num.';';
	}
	
	// Custom number of columns on the shop page
	function bento_woo_loop_columns() {
		$bento_wc_shop_col = (int)get_theme_mod( 'bento_wc_shop_columns' );
		return $bento_wc_shop_col;
	}
 
	// Adjust single product layout so that the sections flow more naturally
	function bento_woo_single_product_sections_start() {
		echo '<div class="single-product-section-wrap">';
	}
	function bento_woo_single_product_sections_end() { 
		echo '</div>';
		woocommerce_output_related_products(); 
	}
	
	// Custom search form
	function bento_woo_custom_product_searchform( $form ) {
		$form = '
			<form role="search" method="get" class="woocommerce-product-search" action="'.esc_url( get_home_url( '/'  ) ).'">
				<input type="search" class="search-field" placeholder="'.esc_attr_x( 'Search Products&hellip;', 'placeholder', 'bento' ).'" value="'.get_search_query().'" name="s" title="'.esc_attr_x( 'Search for:', 'label', 'bento' ).'" />
				<input type="submit" value="&#xf179;" />
				<input type="hidden" name="post_type" value="product" />
			</form>
		';
		return $form;
	}
	

?>