<?php // Theme Functions


// Theme setup
add_action( 'after_setup_theme', 'bnt_theme_setup' );

function bnt_theme_setup() {
	
	// Features
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'link', 'image' ) );
	add_theme_support( 'woocommerce' ); 
	
	// Actions
	add_action( 'wp_enqueue_scripts', 'bnt_theme_styles_scripts' );
	add_action( 'admin_enqueue_scripts', 'bnt_admin_scripts' );
	add_action( 'customize_controls_enqueue_scripts', 'bnt_customizer_extras' );
	add_action( 'template_redirect', 'bnt_theme_adjust_content_width' );
	add_action( 'wp_head', 'bnt_favicon' );
	add_action( 'wp_head', 'bnt_google_font' );
	add_action( 'get_header', 'bnt_enable_threaded_comments' );
	add_action( 'wp_ajax_dismiss_novice', 'bnt_dismiss_novice' );
	add_action( 'wp_ajax_nopriv_dismiss_novice', 'bnt_dismiss_novice' );
	add_action( 'tgmpa_register', 'bnt_register_required_plugins' );
	add_action( 'wp_ajax_ajax_pagination', 'bnt_ajax_pagination' );
	add_action( 'wp_ajax_nopriv_ajax_pagination', 'bnt_ajax_pagination' );
	add_action( 'widgets_init', 'bnt_register_sidebars' );
		
	// Filters
	add_filter( 'excerpt_more', 'bnt_custom_excerpt_more' );
	add_filter( 'body_class', 'bnt_extra_classes' );
	add_filter( 'post_class', 'bnt_has_thumb_class' );
	add_filter( 'wp_title', 'bnt_wp_title', 10, 2 );
	add_filter( 'get_the_archive_title', 'bnt_cleaner_archive_titles' );
	add_filter( 'cmb2_admin_init', 'bnt_metaboxes' );
	add_filter( 'upload_mimes', 'bnt_font_uploading' );
	
	// Languages
	load_theme_textdomain( 'satori', get_template_directory() . '/languages' );
	
	// SiteOrigin Content Builder integration
	add_filter('siteorigin_panels_row_attributes', 'bnt_extra_row_attr', 10, 2);
	add_filter('siteorigin_panels_before_row', 'bnt_content_builder_row_ids', 10, 3);
	
	// WooCommerce integration
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	add_action( 'woocommerce_before_main_content', 'bnt_woo_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'bnt_woo_wrapper_end', 10 );
	add_action( 'woocommerce_before_single_product_summary', 'bnt_woo_single_product_sections_start', 20 );
	add_action( 'woocommerce_after_single_product_summary', 'bnt_woo_single_product_sections_end', 20 );
	add_filter( 'woocommerce_enqueue_styles', 'bnt_woo_dequeue_styles' );
	add_filter( 'woocommerce_product_add_to_cart_text', 'bnt_woo_custom_cart_button_text' );  
	add_filter( 'get_product_search_form', 'bnt_woo_custom_product_searchform' );
	add_filter( 'loop_shop_columns', 'bnt_woo_loop_columns' );
	add_filter( 'loop_shop_per_page', create_function( '$cols', bnt_woo_loop_perpage() ), 20 );
	    
}


// Register and enqueue CSS and scripts
function bnt_theme_styles_scripts () {	
	
	// Register scripts
	wp_register_script( 'isotope', get_template_directory_uri().'/includes/isotope/isotope.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'packery', get_template_directory_uri().'/includes/isotope/packery-mode.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'imagesloaded', get_template_directory_uri().'/includes/isotope/imagesloaded.pkgd.min.js', array('jquery'), false, true );
	wp_register_script( 'fitcolumns', get_template_directory_uri().'/includes/isotope/fit-columns.js', array('jquery'), false, true );
	wp_register_script( 'fitvids', get_template_directory_uri().'/includes/fitvids/jquery.fitvids.js', array('jquery'), false, true );
	wp_register_script( 'themescripts', get_template_directory_uri().'/includes/js/theme-scripts.js', array('jquery'), false, true );
	
	// Enqueue scripts
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'packery' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'fitcolumns' );
	wp_enqueue_script( 'fitvids' );
	wp_enqueue_script( 'themescripts' );
	
	// Register styles
	wp_register_style( 'theme', get_template_directory_uri().'/style.css', array( 'dashicons' ), null, 'all' );
	wp_register_style( 'fontawesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.min.css', array(), null, 'all' );
	
	// Enqueue styles
	wp_enqueue_style( 'theme' );
	wp_enqueue_style( 'fontawesome' );
		
	// Passing php variables to theme scripts
	bnt_localize_scripts();

	// Inline styles for customizing the theme
	wp_add_inline_style( 'theme', bnt_insert_custom_css() );
	    
}


// Admin scripts
function bnt_admin_scripts () {
	
	// Register scripts
	wp_register_script( 'admin', get_template_directory_uri().'/includes/js/admin-scripts.js', array('jquery'), false, true );
	
	// Enqueue scripts
	wp_enqueue_script( 'admin' );
	
}


// Localize scripts
function bnt_localize_scripts() {
	$bnt_query = new WP_Query( bnt_grid_query() );
	$bnt_max_pages = $bnt_query->max_num_pages; 
	global $post;
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
	$bnt_grid_mode = 'nogrid';
	$bnt_grid_setting = get_post_meta( $postid, 'bnt_page_grid_mode', true );
	if ( get_page_template_slug($postid) == 'page-grid.php' ) {
		if ( $bnt_grid_setting == 'rows' ) {
			$bnt_grid_mode = 'fitRows';
		} else {
			$bnt_grid_mode = 'packery';
		}
	}
	$bnt_full_width_grid = 'off';
	if ( get_post_meta( $postid, 'bnt_grid_full_width', true ) == 'on' ) {
		$bnt_full_width_grid = 'on';
	}
    wp_localize_script( 'themescripts', 'phpvars', array(
		'menu_config' => satori_option( 'bnt_menu_config' ),
		'fixed_menu' => satori_option( 'bnt_fixed_header' ),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	    'query_vars' => json_encode( $bnt_query->query ),
        'max_pages' => $bnt_max_pages,
		'grid_mode' => $bnt_grid_mode,
		'full_width_grid' => $bnt_full_width_grid,
    ));	
}


// Custom styles
function bnt_insert_custom_css() {
	
	$custom_css = '';
	
	// Grid
	global $post;
	if ( is_singular() && get_page_template_slug( $post->ID ) == 'page-grid.php' ) {
		$bnt_grid_gutter = 10;
		$bnt_grid_column = 3;
		$bnt_grid_column_width = 33.3333;
		$bnt_grid_column = get_post_meta($post->ID, 'bnt_page_columns', true); 
		$bnt_grid_column_width = 100 / $bnt_grid_column;
		$bnt_gutter_setting = get_post_meta($post->ID, 'bnt_page_item_margins', true); 
		if ( is_numeric($bnt_gutter_setting) ) {
			$bnt_grid_gutter = $bnt_gutter_setting;
		}
		if ( strpos($bnt_gutter_setting, 'px') !== false ) {
			$bnt_grid_gutter = substr($bnt_gutter_setting, 0, -2);
		}
		$bnt_grid_double_width = $bnt_grid_column_width * 2;
		
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
					width: '.$bnt_grid_column_width.'%;	
				}
				.grid-masonry .grid-item.tile-2x1,
				.grid-masonry .grid-item.tile-2x2 {
					width: '.$bnt_grid_double_width.'%;
				}
			}
			.grid-container {
				margin: 0 -'.$bnt_grid_gutter.'px;	
			}
			.grid-item-inner {
				padding: '.$bnt_grid_gutter.'px;	
			}
			.grid-rows .grid-item {
				margin-bottom: '.$bnt_grid_gutter.'px;	
				padding-bottom: '.$bnt_grid_gutter.'px;	
			}
		';
	}
	
	// Theme Options: Layout and Background tab
	$bnt_content_width_med_px = intval( satori_option( 'bnt_content_width' ) );
	$bnt_content_width_med_rem = $bnt_content_width_med_px / 10;
	$bnt_content_width_hi_px = $bnt_content_width_med_px + 360;
	$bnt_content_width_hi_rem = $bnt_content_width_hi_px / 10;
	$bnt_box_width_med_px = $bnt_box_width_med_rem = $bnt_box_width_hi_px = $bnt_box_width_hi_rem = 'none';
	if ( satori_option( 'bnt_website_layout' ) == 1 ) {
		$bnt_box_width_med_px = $bnt_content_width_med_px + 80;
		$bnt_box_width_med_rem = $bnt_box_width_med_px / 10;
		$bnt_box_width_hi_px = $bnt_content_width_hi_px + 120;
		$bnt_box_width_hi_rem = $bnt_box_width_hi_px / 10;
		$custom_css .= '
			@media screen and (min-width: 80em) {
				.site-wrapper {
					max-width: '.$bnt_box_width_med_px.'px;
					max-width: '.$bnt_box_width_med_rem.'rem;
				}
				.bnt-container {
					max-width: '.$bnt_content_width_med_px.'px;
					max-width: '.$bnt_content_width_med_rem.'rem;
				}
			}
			@media screen and (min-width: 120em) {
				.site-wrapper {
					max-width: '.$bnt_box_width_hi_px.'px;
					max-width: '.$bnt_box_width_hi_rem.'rem;
				}
				.bnt-container {
					max-width: '.$bnt_content_width_hi_px.'px;
					max-width: '.$bnt_content_width_hi_rem.'rem;
				}
			}
		';
		if ( satori_option( 'bnt_website_background' ) == 1 && satori_option( 'bnt_website_background_texture' ) != '' ) {
			$custom_css .= '
				body {
					background-image: url('.satori_option( 'bnt_website_background_texture' ).');
					background-repeat: repeat;
				}
			';
		} elseif ( satori_option( 'bnt_website_background' ) == 2 && satori_option( 'bnt_website_background_image' ) != '' ) {
			$custom_css .= '
				body {
					background-image: url('.satori_option( 'bnt_website_background_image' ).');
					background-repeat: no-repeat;
					background-position: center center;
					background-size: cover;
				}
			';
		} else {
			$custom_css .= '
				body {
					background-color: '.satori_option( 'bnt_website_background_color' ).';
				}
			';
		}
	}
	if ( satori_option( 'bnt_menu_config' ) == 2 ) {
		$custom_css .= '
			.header-menu {
				background-color: '.satori_option( 'bnt_primary_menu_background' ).';
			}
		';
	} else if ( satori_option( 'bnt_menu_config' ) == 3 ) {
		$custom_css .= '
			@media screen and (min-width: 48em) {
				.primary-menu > li {
					border-color: '.satori_option( 'bnt_menu_separators' ).';
				}
				.primary-menu .sub-menu li a:hover {
					color: '.satori_option( 'bnt_primary_menu_text_hover_color' ).';
				}
				.primary-menu .sub-menu, .primary-menu .sub-menu li {
					border-color: '.satori_option( 'bnt_menu_separators' ).' !important;
				}
			}
		';
	}
	
	// Theme Options: Fonts and Typography tab
	$bnt_font_face_body = $bnt_font_face_headings = $bnt_font_face_menu = '';
	$bnt_body_font = $bnt_headings_font = 'Open Sans';
	$bnt_menu_font = 'Montserrat';
	$bnt_body_text_size = $bnt_menu_text_size = 14;
	if ( satori_option( 'bnt_font_body_upload' ) != '' ) {
		$bnt_font_face_body = '
			@font-face {
				font-family: bodyFont;
				src: url('.satori_option( 'bnt_font_body_upload' ).');
			}
		';
		$bnt_body_font = 'bodyFont';
	} else if ( satori_option( 'bnt_font_body' ) != '' ) {
		$bnt_body_font = satori_option( 'bnt_font_body' );
	}
	if ( satori_option( 'bnt_font_headings_upload' ) != '' ) {
		$bnt_font_face_headings = '
			@font-face {
				font-family: headingsFont;
				src: url('.satori_option( 'bnt_font_headings_upload' ).');
			}
		';
		$bnt_headings_font = 'headingsFont';
	} else if ( satori_option( 'bnt_font_headings' ) != '' ) {
		$bnt_headings_font = satori_option( 'bnt_font_headings' );
	}
	if ( satori_option( 'bnt_font_menu_upload' ) != '' ) {
		$bnt_font_face_menu = '
			@font-face {
				font-family: menuFont;
				src: url('.satori_option( 'bnt_font_menu_upload' ).');
			}
		';
		$bnt_menu_font = 'menuFont';
	} else if ( satori_option( 'bnt_font_menu' ) != '' ) {
		$bnt_menu_font = satori_option( 'bnt_font_menu' );
	}
	if ( satori_option( 'bnt_text_size_body' ) != 14 ) {
		$bnt_body_text_size = satori_option( 'bnt_text_size_body' );
	}
	if ( satori_option( 'bnt_text_size_menu' ) != 14 ) {
		$bnt_menu_text_size = satori_option( 'bnt_text_size_menu' );
	}
	$bnt_body_text_size_em = $bnt_body_text_size / 10;
	$bnt_menu_text_size_rem = $bnt_menu_text_size / 10;
	if ( satori_option( 'bnt_menu_config' ) == 3 ) {
		$bnt_menu_parent_after = ( $bnt_menu_text_size_rem * 2 + 2 ) / 1.2;
	} else {
		$bnt_menu_parent_after = $bnt_menu_text_size_rem * 6 / 1.2;
	}
	$custom_css .= 
		$bnt_font_face_body.
		$bnt_font_face_headings.
		$bnt_font_face_menu.'
		body {
			font-family: '.$bnt_body_font.', Arial, sans-serif;
			font-size: '.$bnt_body_text_size.'px;
			font-size: '.$bnt_body_text_size_em.'em;
		}
		.site-content h1, 
		.site-content h2, 
		.site-content h3, 
		.site-content h4, 
		.site-content h5, 
		.site-content h6 {
			font-family: '.$bnt_headings_font.', Arial, sans-serif;
		}
		#nav-primary {
			font-family: '.$bnt_menu_font.', Arial, sans-serif;
		}
		.primary-menu > li > a {
			font-size: '.$bnt_menu_text_size.'px;
			font-size: '.$bnt_menu_text_size_rem.'rem;
		}
		.primary-menu > .menu-item-has-children > a:after {
			line-height: '.$bnt_menu_parent_after.';
		}
	';
	if ( satori_option( 'bnt_sentence_case_menu' ) == 1 ) {
		$custom_css .= '
			#nav-primary {
				text-transform: none;
			}
		';
	}
	
	// Theme Options: Header Colors tab
	$custom_css .= '
		.site-header {
			background: '.satori_option( 'bnt_header_background_color' ).';
		}
		.primary-menu > li > a,
		#nav-mobile li a,
		.mobile-menu-trigger,
		.mobile-menu-close,
		.ham-menu-close {
			color: '.satori_option( 'bnt_primary_menu_text_color' ).';
		}
		.primary-menu > li > a:hover,
		.primary-menu > li.current-menu-item > a,
		.primary-menu > li.current-menu-ancestor > a {
			color: '.satori_option( 'bnt_primary_menu_text_hover_color' ).';
		}
		.primary-menu .sub-menu,
		#nav-mobile {
			background-color: '.satori_option( 'bnt_primary_menu_submenu_background_color' ).';
		}
		.primary-menu .sub-menu li a:hover,
		.primary-menu .sub-menu .current-menu-item:not(.current-menu-ancestor) > a,
		#nav-mobile li a:hover,
		#nav-mobile .current-menu-item:not(.current-menu-ancestor) > a {
			background-color: '.satori_option( 'bnt_primary_menu_submenu_background_hover_color' ).';
		}
		.primary-menu .sub-menu,
		.primary-menu .sub-menu li,
		#nav-mobile li a,
		#nav-mobile .primary-mobile-menu > li:first-child > a {
			border-color: '.satori_option( 'bnt_primary_menu_submenu_border_color' ).';
		}
		.primary-menu .sub-menu li a {
			color: '.satori_option( 'bnt_primary_menu_submenu_text_color' ).'; 
		}
		.primary-menu .sub-menu li:hover a {
			color: '.satori_option( 'bnt_primary_menu_submenu_text_hover_color' ).'; 
		}
		#nav-mobile {
			background-color: '.satori_option( 'bnt_mobile_menu_background_color' ).';
		}
		#nav-mobile li a,
		.mobile-menu-trigger,
		.mobile-menu-close {
			color: '.satori_option( 'bnt_mobile_menu_text_color' ).';
		}
		#nav-mobile li a:hover,
		#nav-mobile .current-menu-item:not(.current-menu-ancestor) > a {
			background-color: '.satori_option( 'bnt_mobile_menu_background_hover_color' ).';
		}
		#nav-mobile li a,
		#nav-mobile .primary-mobile-menu > li:first-child > a {
			border-color: '.satori_option( 'bnt_mobile_menu_border_color' ).';	
		}
		#nav-mobile li a:hover,
		.mobile-menu-trigger-container:hover,
		.mobile-menu-close:hover {
			color: '.satori_option( 'bnt_mobile_menu_text_hover_color' ).';
		}
	';
	
	// Theme Options: Content Colors tab
	$custom_css .= '
		.site-content {
			background-color: '.satori_option( 'bnt_content_background_color' ).';
		}
		.site-content h1, 
		.site-content h2, 
		.site-content h3, 
		.site-content h4, 
		.site-content h5, 
		.site-content h6 {
			color: '.satori_option( 'bnt_content_heading_text_color' ).';
		}
		.products .product a h3,
		.masonry-item-box a h2 {
			color: inherit;	
		}
		.site-content {
			color: '.satori_option( 'bnt_content_body_text_color' ).';
		}
		.site-content a:not(.masonry-item-link):not(.page-numbers):not(.ajax-load-more):not(.remove):not(.button) {
			color: '.satori_option( 'bnt_content_link_text_color' ).';
		}
		.page-link-text:not(:hover) {
			color: #00B285;
		}
		label,
		.wp-caption-text,
		.post-date-blog,
		.entry-footer, 
		.archive-header .archive-description, 
		.comment-meta,
		.comment-notes,
		.project-types,
		.widget_archive li,
		.widget_categories li,
		.widget .post-date,
		.widget_calendar table caption,
		.widget_calendar table th,
		.widget_recent_comments .recentcomments,
		.product .price del,
		.widget del,
		.widget del .amount,
		.product_list_widget a.remove,
		.product_list_widget .quantity,
		.product-categories .count,
		.product_meta,
		.shop_table td.product-remove a,
		.woocommerce-checkout .payment_methods .wc_payment_method .payment_box {
			color: '.satori_option( 'bnt_content_meta_text_color' ).';
		}
		hr,
		.entry-content table,
		.entry-content td,
		.entry-content th,
		.separator-line,
		.comment .comment .comment-nested,
		.comment-respond,
		.site-footer .widget_recent_entries ul li,
		.site-footer .widget_recent_comments ul li,
		.site-footer .widget_categories ul li,
		.site-footer .widget_archive ul li,
		.site-footer .widget_product_categories ul li,
		.woocommerce .site-footer .widget-woo .product_list_widget li,
		.woocommerce .site-footer .widget-woo .cart_list li:last-child,
		.woocommerce-tabs .tabs,
		.woocommerce-tabs .tabs li.active,
		.cart_item,
		.cart_totals .cart-subtotal,
		.cart_totals .order-total,
		.woocommerce-checkout-review-order table tfoot,
		.woocommerce-checkout-review-order table tfoot .order-total,
		.woocommerce-checkout-review-order table tfoot .shipping {
			border-color: '.satori_option( 'bnt_content_delimiter_color' ).';	
		}
		input[type="text"], 
		input[type="password"], 
		input[type="email"], 
		input[type="number"], 
		input[type="tel"], 
		input[type="search"], 
		textarea, 
		select, 
		.select2-container {
			background-color: '.satori_option( 'bnt_content_input_background_color' ).';
			color: '.satori_option( 'bnt_content_input_text_color' ).';
		}
		::-webkit-input-placeholder { 
			color: '.satori_option( 'bnt_content_input_placeholder_color' ).'; 
		}
		::-moz-placeholder { 
			color: '.satori_option( 'bnt_content_input_placeholder_color' ).'; 
		}
		:-ms-input-placeholder { 
			color: '.satori_option( 'bnt_content_input_placeholder_color' ).'; 
		}
		input:-moz-placeholder { 
			color: '.satori_option( 'bnt_content_input_placeholder_color' ).'; 
		}
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover,
		.widget_price_filter .ui-slider .ui-slider-range, 
		.widget_price_filter .ui-slider .ui-slider-handle,
		input[type="submit"],
		.site-content .button,
		.widget_price_filter .ui-slider .ui-slider-range, 
		.widget_price_filter .ui-slider .ui-slider-handle {
			background-color: '.satori_option( 'bnt_content_button_background_color' ).';	
		}
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover {
			border-color: '.satori_option( 'bnt_content_button_background_color' ).';
		}
		.page-link-text:not(:hover),
		.pagination a, 
		.woocommerce-pagination a,
		.site-content a.ajax-load-more {
			color: '.satori_option( 'bnt_content_button_background_color' ).';
		}
		input[type="submit"]:hover,
		.site-content .button:hover {
			background-color: '.satori_option( 'bnt_content_button_hover_background_color' ).';
		}
		input[type="submit"],
		.site-content .button,
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover {
			color: '.satori_option( 'bnt_content_button_text_color' ).';	
		}
		input[type="submit"]:hover,
		.site-content .button:hover {
			color: '.satori_option( 'bnt_content_button_text_hover_color' ).';
		}
		.shop_table .actions .button,
		.shipping-calculator-form .button,
		.checkout_coupon .button,
		.widget_shopping_cart .button:first-child,
		.price_slider_amount .button {
			background-color: '.satori_option( 'bnt_content_secondary_button_background_color' ).';
		}
		.shop_table .actions .button:hover,
		.shipping-calculator-form .button:hover,
		.checkout_coupon .button:hover,
		.widget_shopping_cart .button:first-child:hover,
		.price_slider_amount .button:hover {
			background-color: '.satori_option( 'bnt_content_secondary_button_hover_background_color' ).';
		}
		.shop_table .actions .button,
		.shipping-calculator-form .button,
		.checkout_coupon .button,
		.widget_shopping_cart .button:first-child,
		.price_slider_amount .button {
			color: '.satori_option( 'bnt_content_secondary_button_text_color' ).';
		}
		.shop_table .actions .button:hover,
		.shipping-calculator-form .button:hover,
		.checkout_coupon .button:hover,
		.widget_shopping_cart .button:first-child:hover,
		.price_slider_amount .button:hover {
			color: '.satori_option( 'bnt_content_secondary_button_text_hover_color' ).';
		}
	';
	
	// Theme Options: Footer Colors tab
	$custom_css .= '
		.sidebar-footer {
			background-color: '.satori_option( 'bnt_footer_widgets_background_color' ).';
		}
		.site-footer {
			color: '.satori_option( 'bnt_footer_text_color' ).';
		}
		.site-footer a {
			color: '.satori_option( 'bnt_footer_link_text_color' ).';
		}
		.site-footer label, 
		.site-footer .post-date-blog, 
		.site-footer .entry-footer, 
		.site-footer .comment-meta, 
		.site-footer .comment-notes, 
		.site-footer .widget_archive li, 
		.site-footer .widget_categories li, 
		.site-footer .widget .post-date, 
		.site-footer .widget_calendar table caption, 
		.site-footer .widget_calendar table th, 
		.site-footer .widget_recent_comments .recentcomments {
			color: '.satori_option( 'bnt_footer_meta_text_color' ).';
		}
		.sidebar-footer .widget_recent_entries ul li, 
		.sidebar-footer .widget_recent_comments ul li, 
		.sidebar-footer .widget_categories ul li, 
		.sidebar-footer .widget_archive ul li {
			border-color: '.satori_option( 'bnt_footer_delimiter_color' ).';
		}
		.bottom-footer {
			background-color: '.satori_option( 'bnt_footer_bottom_background_color' ).';
			color: '.satori_option( 'bnt_footer_bottom_text_color' ).';
		}
		.bottom-footer a {
			color: '.satori_option( 'bnt_footer_bottom_link_text_color' ).';
		}
	';
	
	// Theme Options: Custom CSS tab
	$custom_css .= satori_option( 'bnt_custom_css' );
	
	// Individual page/post settings
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
	$custom_css .= '
		.post-header-title h1,
		.entry-header h1 { 
			color: '.get_post_meta( $postid, 'bnt_title_color', true ).'; 
		}
		.post-header-subtitle {
			color: '.get_post_meta( $postid, 'bnt_subtitle_color', true ).';
		}
		.site-content {
			background-color: '.get_post_meta( $postid, 'bnt_page_background_color', true ).';
		}
	';
	if ( get_post_meta( $postid, 'bnt_hide_title', true ) == 'on' ) {
		$custom_css .= '
			.post-header-title h1,
			.entry-title,
			.post-header-subtitle { 
				display: none;
			}
		';
	}
	if ( get_post_meta( $postid, 'bnt_title_position', true ) == 'center' ) {
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
	if ( get_post_meta( $postid, 'bnt_uppercase_title', true ) == 'on' ) {
		$custom_css .= '
			.post-header-title h1 { 
				text-transform: uppercase;
			}
		';
	}
	if ( get_post_meta( $postid, 'bnt_activate_header', true ) != '' ) {
		$custom_css .= '
			.post-header {
				background-image: url('.get_post_meta( $postid, 'bnt_header_image', true ).');
			}
			.post-header-overlay {
				background-color: '.get_post_meta( $postid, 'bnt_header_overlay', true ).';
				opacity: '.get_post_meta( $postid, 'bnt_header_overlay_opacity', true ).';
			}
			.post-header-subtitle {
				margin-bottom: 0;
			}
			.post-header-cta a,
			.post-header-cta div {
				border-color: '.get_post_meta( $postid, 'bnt_cta_background_color', true ).';
			}
			.post-header-cta .post-header-cta-primary {
				background-color: '.get_post_meta( $postid, 'bnt_cta_background_color', true ).';
				color: '.get_post_meta( $postid, 'bnt_cta_text_color', true ).';
			}
			.post-header-cta .post-header-cta-secondary {
				color: '.get_post_meta( $postid, 'bnt_cta_background_color', true ).';
			}
			.post-header-cta a:hover,
			.post-header-cta div:hover {
				border-color: '.get_post_meta( $postid, 'bnt_cta_background_color_hover', true ).';
			}
			.post-header-cta .post-header-cta-primary:hover {
				background-color: '.get_post_meta( $postid, 'bnt_cta_background_color_hover', true ).';
			}
			.post-header-cta .post-header-cta-secondary:hover {
				color: '.get_post_meta( $postid, 'bnt_cta_background_color_hover', true ).';
			}
			.post-header-cta .post-header-cta-secondary {
				color: '.get_post_meta( $postid, 'bnt_cta_secondary_color', true ).';
				border-color: '.get_post_meta( $postid, 'bnt_cta_secondary_color', true ).';
			}
			.post-header-cta .post-header-cta-secondary:hover {
				color: '.get_post_meta( $postid, 'bnt_cta_secondary_color_hover', true ).';
				border-color: '.get_post_meta( $postid, 'bnt_cta_secondary_color_hover', true ).';
			}
			@media screen and (min-width: 48em) {
				.post-header-title {
					padding-top: '.get_post_meta( $postid, 'bnt_header_image_height', true ).';
					padding-bottom: '.get_post_meta( $postid, 'bnt_header_image_height', true ).';
				}
			}
		';
		if ( get_post_meta( $postid, 'bnt_transparent_header', true ) == 'on' && satori_option( 'bnt_menu_config' ) != 'side' ) {
			$custom_css .= '
				.site-header.no-fixed-header {
					background: transparent;
					position: absolute;
					top: 0;
					width: 100%;
					z-index: 1;
				}
				.no-fixed-header .primary-menu > li > a, 
				.mobile-menu-trigger,
				.ham-menu-trigger {
					color: '.get_post_meta( $postid, 'bnt_menu_color', true ).';
				}
				.no-fixed-header .primary-menu > li > a:hover {
					color: '.get_post_meta( $postid, 'bnt_menu_color_hover', true ).';
				}
			';
		}
	}	
	
	return $custom_css;
}


// Additional Customizer content
function bnt_customizer_extras() {
	wp_register_script( 'bnt_customizer', get_template_directory_uri().'/includes/js/customizer-scripts.js', array('jquery'), false, true );
	wp_enqueue_script( 'bnt_customizer' );
	wp_localize_script( 'bnt_customizer', 'phpvars', array(
		'options' => __( 'Go to Theme Options', 'satori' ),
		'adminurl' => get_admin_url( null, 'themes.php?page=theme-options'),
		'exp' => __( 'Get the Expansion Pack', 'satori' ),
		'review' => __( 'Rate the theme (thanks!)', 'satori' ),
		'documentation' => __( 'View theme manual', 'satori' ),
	) );
}


// Set meta title
function bnt_wp_title( $title, $sep ) {
	global $post;
	$suffix = get_bloginfo('name');
	
	// Custom separator
	if ( satori_option( 'bnt_meta_title_separator' ) != '' ) {
		$sep = ' ' . satori_option( 'bnt_meta_title_separator' ) . ' ';
	}
	
	// Pages and posts
	if ( is_singular($post) && get_post_meta($post->ID, 'bnt_meta_title', true) != '' ) {
		$title = get_post_meta($post->ID, 'bnt_meta_title', true) . ' ' . $sep . ' ';
		
	// Front page
	} else if ( is_front_page() ) {
		if ( satori_option( 'bnt_front_meta_title' ) != '' ) {
			$title = satori_option( 'bnt_front_meta_title' );
		} else {
			$title = $suffix;
		}
	}
	
	// Custom suffix
	if ( satori_option( 'bnt_meta_title_suffix' ) != '' ) {
		$suffix = satori_option( 'bnt_meta_title_suffix' );
	}
	if ( ! is_front_page() ) {
		$title .= $suffix;
	}
	
	return $title;
}


// Dismiss novice header on button click
function bnt_dismiss_novice() {
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
function bnt_theme_adjust_content_width() {
	if ( ! isset( $content_width ) ) {
    	$content_width = 1080;
	}
}


// Initialize theme options
if ( file_exists( get_template_directory() . '/includes/theme-options/class-satori-theme-options.php' ) ) {
	require_once( get_template_directory() . '/includes/theme-options/class-satori-theme-options.php' );
}


// Custom favicon
function bnt_favicon() {
	if ( satori_option( 'bnt_favicon' ) ) {
		echo '<link rel="shortcut icon" href="'.satori_option( 'bnt_favicon' ).'" />';
	}
}


// Enable threaded comments
function bnt_enable_threaded_comments() {
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
function bnt_register_sidebars() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(
			array(
				'name'=>'Sidebar',
				'id' => 'bnt_sidebar',
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s clear">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		));
		register_sidebar(
			array(
				'name'=>'Footer',
				'id' => 'bnt_footer',
				'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s '.bnt_count_active_widgets().' clear">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		));
		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar(
				array(
					'name'=>'WooCommerce',
					'id' => 'bnt_woocommerce',
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
if ( file_exists( get_template_directory() . '/includes/metaboxes/init.php' ) ) {
	require_once ( get_template_directory().'/includes/metaboxes/init.php' );
}


// Initialize the class for activating bundled plugins
if ( file_exists( get_template_directory() . '/includes/plugin-activation/class-tgm-plugin-activation.php' ) ) {
	require_once ( get_template_directory().'/includes/plugin-activation/class-tgm-plugin-activation.php' );
}
function bnt_register_required_plugins() {
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
function bnt_custom_excerpt_more($more) {
	return __('Continue reading', 'satori').' &rarr;';
}


// Extra body classes
function bnt_extra_classes( $classes ) {
	global $post;
	$postid = '';
	if ( is_object($post) ) {
		$postid = $post->ID;
	}
    
	// Sidebar configuration	
	if ( is_singular() ) {
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			if ( ! is_active_sidebar( 'bnt_woocommerce' ) || get_post_meta( $postid, 'bnt_sidebar_layout', true ) == 'full-width' || is_cart() || is_checkout() ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'has-sidebar';
				if ( get_post_meta( $postid, 'bnt_sidebar_layout', true ) == 'left-sidebar' ) {
					$classes[] = 'left-sidebar';
				} else {
					$classes[] = 'right-sidebar';
				}
			}
		} else {
			if ( ! is_active_sidebar( 'bnt_sidebar' ) || get_post_meta( $postid, 'bnt_sidebar_layout', true ) == 'full-width' ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'has-sidebar';
				$classes[] = get_post_meta( $postid, 'bnt_sidebar_layout', true );
			}
		}
	} else {
		if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			if ( is_shop() ) {
				$page_id = woocommerce_get_page_id('shop');
				if ( get_post_meta( $page_id, 'bnt_sidebar_layout', true ) == 'full-width' ) {
					$classes[] = 'no-sidebar';	
				} else {
					$classes[] = get_post_meta( $page_id, 'bnt_sidebar_layout', true );
					$classes[] = 'has-sidebar';
				}
			} else {
				if ( is_active_sidebar( 'bnt_woocommerce' ) ) {
					$classes[] = 'has-sidebar';	
					$classes[] = 'right-sidebar';
				} else {
					$classes[] = 'no-sidebar';	
				}
			}
		} else {
			if ( is_active_sidebar( 'bnt_sidebar' ) ) {
				$classes[] = 'has-sidebar';	
				$classes[] = 'right-sidebar';
			} else {
				$classes[] = 'no-sidebar';	
			}
		}
	}
	
	// Boxed website layout
	if ( satori_option( 'bnt_website_layout' ) == 1 ) {
		$classes[] = 'boxed-layout';
	}
	
	// Extended header
	if ( get_post_meta( $postid, 'bnt_activate_header', true ) == 'on' ) {
		$classes[] = 'extended-header';
	}
	
	// Header configuration
	if ( satori_option( 'bnt_menu_config' ) == 1 ) {
		$classes[] = 'header-centered';
	} else if ( satori_option( 'bnt_menu_config' ) == 2 ) {
		$classes[] = 'header-hamburger';
	} else if ( satori_option( 'bnt_menu_config' ) == 3 ) {
		$classes[] = 'header-side';
	} else {
		$classes[] = 'header-default';
	}
	
	// WooCommerce shop columns
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$classes[] = 'shop-columns-'.satori_option( 'bnt_wc_shop_columns' );
	}
	
    return $classes;
}


// Adds a class to post depending on whether it has a thumbnail
function bnt_has_thumb_class($classes) {
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
function bnt_cleaner_archive_titles($title) {
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
function bnt_font_uploading( $existing_mimes ){
	$existing_mimes['svg'] = 'image/svg+xml';
	$existing_mimes['ttf'] = 'application/x-font-ttf'; 
	$existing_mimes['otf'] = 'application/x-font-opentype'; 
	$existing_mimes['woff'] = 'application/font-woff'; 
	$existing_mimes['eot'] = 'application/vnd.ms-fontobject';  
	return $existing_mimes;
}


// Count the number of active widgets
function bnt_count_active_widgets() {
	$the_sidebars = wp_get_sidebars_widgets();
	$footer_widget_class = 'column-'.count( $the_sidebars['bnt_footer'] );
	return $footer_widget_class;
}


// Load more posts with ajax
function bnt_ajax_pagination() {
	$url = wp_get_referer();
	$post_id = url_to_postid( $url );
	global $bnt_parent_page_id; 
	$bnt_parent_page_id = $post_id;
	$query_args = bnt_grid_query(); 
	$query_args['paged'] = $_POST['page'] + 1;
	$post_types = get_post_meta( $post_id, 'bnt_page_content_types', true );
	$query_args['post_type'] = $post_types;
	$bnt_grid_number_items = get_post_meta( $post_id, 'bnt_page_number_items', true );
	if ( ctype_digit($bnt_grid_number_items) &&  ctype_digit($bnt_grid_number_items) != 0 ) {
		$query_args['posts_per_page'] = (int)$bnt_grid_number_items;
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
function bnt_grid_query() {
	global $post;
	global $post_id;
	if ( isset( $post->ID ) ) {
		$post_id = $post->ID;
	}
	$bnt_grid_query_args = array();
	$post_types = get_post_meta( $post_id, 'bnt_page_content_types', true );
	$bnt_grid_query_args['post_type'] = $post_types;
	$bnt_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$bnt_grid_query_args['paged'] = $bnt_paged;
	$bnt_grid_number_items = get_post_meta( $post_id, 'bnt_page_number_items', true );
	if ( ctype_digit($bnt_grid_number_items) && ctype_digit($bnt_grid_number_items) != 0 ) {
		$bnt_grid_query_args['posts_per_page'] = (int)$bnt_grid_number_items;
	} else {
		$bnt_grid_query_args['posts_per_page'] = get_option('posts_per_page');	
	}
	return $bnt_grid_query_args;
}


// Page settings metaboxes
function bnt_metaboxes() {
	
	// Define strings
	$bnt_prefix = 'bnt_';
	$bnt_ep_url = '<a href="http://satoristudio.net/bento-free-wordpress-theme/#expansion-pack/?utm_source=disabled&utm_medium=theme&utm_campaign=theme" target="_blank">Expansion Pack</a>';
	
	// Function to add a multicheck with post types
	add_action( 'cmb2_render_multicheck_posttype', 'bnt_render_multicheck_posttype', 10, 5 );
	function bnt_render_multicheck_posttype( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
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
				if ( $cpt == 'project' && get_option( 'bnt_ep_license_status' ) != 'valid' ) {
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
	$bnt_seo_settings = new_cmb2_box( 
		array(
			'id'            => 'seo_settings_metabox',
			'title'         => __( 'SEO Settings', 'satori' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	$bnt_seo_settings->add_field(
		array(
			'name' => __( 'Meta title', 'satori' ),
			'desc' => __( 'Input the meta title - the text to be used by search engines as well as browser tabs (recommended max length - 60 symbols); the post title will be used by default if this field is empty.', 'satori' ),
			'id' => $bnt_prefix . 'meta_title',
			'type' => 'text',
		)
	);
	$bnt_seo_settings->add_field(
		array(
			'name' => __( 'Meta description', 'satori' ),
			'desc' => __( 'Input the meta description - the text to be used by search engines on search result pages (recommended max length - 160 symbols); the first part of the post body will be used by default is this field is left blank.', 'satori' ),
			'id' => $bnt_prefix . 'meta_description',
			'type' => 'textarea',
			'attributes' => array(
				'rows' => 3,
			),
		)
	);
	
	// General page/post settings
	$bnt_general_settings = new_cmb2_box( 
		array(
			'id'            => 'post_settings_metabox',
			'title'         => __( 'General Settings', 'satori' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names' => true,
		) 
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Sidebar layout', 'satori' ),
			'desc' => __( 'Choose whether to display a sidebar and on which side of the content', 'satori' ),
			'id' => $bnt_prefix . 'sidebar_layout',
			'type' => 'select',
			'options' => array(
				'right-sidebar' => __( 'Right Sidebar (default)', 'satori' ),
				'left-sidebar' => __( 'Left Sidebar', 'satori' ),
				'full-width' => __( 'Full Width', 'satori' ),
			),
			'default' => 'right-sidebar',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Page background color', 'satori' ),
			'desc' => __( 'Choose the background color for current page/post. This will override any settings in the Theme Options', 'satori' ),
			'id' => $bnt_prefix . 'page_background_color',
			'type' => 'colorpicker',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Hide title', 'satori' ),
			'desc' => __( 'Check this option if you DO NOT want to display the title on the page', 'satori' ),
			'id' => $bnt_prefix . 'hide_title',
			'type' => 'checkbox',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Uppercase title', 'satori' ),
			'desc' => __( 'Check this option if you want the page title to be entirely in uppercase (useful for landing pages).', 'satori' ),
			'id' => $bnt_prefix . 'uppercase_title',
			'type' => 'checkbox',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Title position', 'satori' ),
			'desc' => __( 'Choose the position of the title; default is left-aligned.', 'satori' ),
			'id' => $bnt_prefix . 'title_position',
			'type' => 'select',
			'options' => array(
				'left' => __( 'Left-aligned (default)', 'satori' ),
				'center' => __( 'Centered', 'satori' ),
			),
			'default' => 'left',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Title color', 'satori' ),
			'desc' => __( 'Choose the text color for the title of this post. This will override any settings in the Theme Options', 'satori' ),
			'id' => $bnt_prefix . 'title_color',
			'type' => 'colorpicker',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Subtitle', 'satori' ),
			'desc' => __( 'Input the subtitle for the page.', 'satori' ),
			'id' => $bnt_prefix . 'subtitle',
			'type' => 'textarea',
		)
	);
	$bnt_general_settings->add_field(
		array(
			'name' => __( 'Subtitle color', 'satori' ),
			'desc' => __( 'Choose the text color for the subtitle of this page; default is #999999 (light grey).', 'satori' ),
			'id' => $bnt_prefix . 'subtitle_color',
			'type' => 'colorpicker',
			'default' => '#999999',
		)
	);
	
	// Extended header settings
	$bnt_header_settings = new_cmb2_box( 
		array(
			'id'            => 'post_header_metabox',
			'title'         => __( 'Page Header Settings', 'satori' ),
			'object_types'  => array( 'post', 'page', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names' => true,
		) 
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Activate extended header', 'satori' ),
			'desc' => __( 'Check this box to enable extended header options such as header image and call-to-action-buttons.', 'satori' ),
			'id' => $bnt_prefix . 'activate_header',
			'type' => 'checkbox',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Header height', 'satori' ),
			'desc' => __( 'Choose the title top and bottom padding, which will affect the header height; default is 10%', 'satori' ),
			'id' => $bnt_prefix . 'header_image_height',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'satori' ),
				'5%' => '5%',
				'10%' => __( '10% (default)', 'satori' ),
				'15%' => '15%',
				'20%' => '20%',
				'25%' => '25%',
			),
			'default' => '10%',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Header image', 'satori' ),
			'desc' => __( 'Upload the image to serve as the header; recommended size is 1400x300 pixels and above, yet mind the file size - excessively large images may worsen user experience', 'satori' ),
			'id' => $bnt_prefix . 'header_image',
			'type' => 'file',
		)
	);
	if ( get_option( 'bnt_ep_license_status' ) == 'valid' ) {
		$bnt_header_settings->add_field(
			array(
				'name' => __( 'Header video', 'satori' ),
				'desc' => __( 'Upload the video file to be used as header background; if this is active, the header image will serve as a placeholder for mobile devices; .mp4 files are recommended, but you can also use .ogv and .webm formats. Please mind the file size - excessively large images may worsen user experience', 'satori' ),
				'id' => $bnt_prefix . 'header_video_source',
				'type' => 'file',
			)
		);
	}
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Header image overlay color', 'satori' ),
			'desc' => __( 'Choose the color for the image overlay, designed to make the title text stand out more clearly', 'satori' ),
			'id' => $bnt_prefix . 'header_overlay',
			'type' => 'colorpicker',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Header image overlay opacity', 'satori' ),
			'desc' => __( 'Choose the opacity level for the image overlay; 0.0 is fully transparent, 1.0 is fully opaque, default is 0.3', 'satori' ),
			'id' => $bnt_prefix . 'header_overlay_opacity',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'satori' ),
				'0.0' => '0.0',
				'0.1' => '0.1',
				'0.2' => '0.2',
				'0.3' => __( '0.3 (default)', 'satori' ),
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
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Transparent website header', 'satori' ),
			'desc' => __( 'Check this option to make the website header (the top area with the menu and the logo) look like a transparent overlay on top of the header image on this page.', 'satori' ),
			'id' => $bnt_prefix . 'transparent_header',
			'type' => 'checkbox',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Website menu color on this page', 'satori' ),
			'desc' => __( 'Choose the color for the website menu on this page (useful for the transparent header).', 'satori' ),
			'id' => $bnt_prefix . 'menu_color',
			'type' => 'colorpicker',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Website menu mouse-hover color on this page', 'satori' ),
			'desc' => __( 'Choose the mouse-over color for the website menu on this page (useful for the transparent header).', 'satori' ),
			'id' => $bnt_prefix . 'menu_color_hover',
			'type' => 'colorpicker',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button text', 'satori' ),
			'desc' => __( 'Input the text for an optional call-to-action button.', 'satori' ),
			'id' => $bnt_prefix . 'cta_primary_text',
			'type' => 'text_medium',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button link', 'satori' ),
			'desc' => __( 'Paste the URL link to point the call-to-action button to; leave this blank to scroll the page below the header on button click.', 'satori' ),
			'id' => $bnt_prefix . 'cta_primary_link',
			'type' => 'text',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button background color', 'satori' ),
			'desc' => __( 'Choose the background color for the call-to-action buttons; default is #00b285 (green-blue).', 'satori' ),
			'id' => $bnt_prefix . 'cta_background_color',
			'type' => 'colorpicker',
			'default' => '#00b285',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button mouse-over background color', 'satori' ),
			'desc' => __( 'Choose the text color for the call-to-action buttons on hover; default is #00906c (dark-green).', 'satori' ),
			'id' => $bnt_prefix . 'cta_background_color_hover',
			'type' => 'colorpicker',
			'default' => '#00906c',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Call-to-action button text color', 'satori' ),
			'desc' => __( 'Choose the text color for the primary call-to-action button; default is #ffffff (white).', 'satori' ),
			'id' => $bnt_prefix . 'cta_text_color',
			'type' => 'colorpicker',
			'default' => '#ffffff',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button text', 'satori' ),
			'desc' => __( 'Input the text for an optional secondary call-to-action button.', 'satori' ),
			'id' => $bnt_prefix . 'cta_secondary_text',
			'type' => 'text_medium',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button link', 'satori' ),
			'desc' => __( 'Paste the URL link to point the secondary call-to-action button to; leave this blank to scroll the page below the header on button click.', 'satori' ),
			'id' => $bnt_prefix . 'cta_secondary_link',
			'type' => 'text',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button color', 'satori' ),
			'desc' => __( 'Choose the text and border color for the secondary call-to-action button; default is #00b285 (green-blue) or the same as the primary button.', 'satori' ),
			'id' => $bnt_prefix . 'cta_secondary_color',
			'type' => 'colorpicker',
		)
	);
	$bnt_header_settings->add_field(
		array(
			'name' => __( 'Secondary call-to-action button mouse-over color', 'satori' ),
			'desc' => __( 'Choose the text and border color for the secondary call-to-action button on hover; default is #00906c (dark-green) or the same as the primary button.', 'satori' ),
			'id' => $bnt_prefix . 'cta_secondary_color_hover',
			'type' => 'colorpicker',
		)
	);
	
	// Map header settings
	if ( get_option( 'bnt_ep_license_status' ) == 'valid' ) {
		$bnt_headermap_settings = new_cmb2_box( 
			array(
				'id'            => 'post_headermap_metabox',
				'title'         => __( 'Map Header', 'satori' ),
				'object_types'  => array( 'page' ),
				'context'       => 'normal',
				'priority'      => 'low',
				'show_names' => true,
			) 
		);
		$bnt_headermap_settings->add_field(
			array(
				'name' => __( 'Activate Google Maps header', 'satori' ),
				'desc' => __( 'Check this box to enable Google Maps header; note that this will deactivate the extended header image/video.', 'satori' ),
				'id' => $bnt_prefix . 'activate_headermap',
				'type' => 'checkbox',
			)
		);
		$bnt_headermap_settings->add_field(
			array(
				'name' => __( 'Map center location', 'satori' ),
				'desc' => __( 'Input the address (country, city, or exact address) of the locaiton on which to center the map.', 'satori' ),
				'id' => $bnt_prefix . 'headermap_center',
				'type' => 'text',
			)
		);
		$bnt_headermap_settings->add_field(
			array(
				'name' => __( 'Map height', 'satori' ),
				'desc' => __( 'Select the height of the map, in pixels.', 'satori' ),
				'id' => $bnt_prefix . 'headermap_height',
				'type' => 'select',
				'options' => array(
					'100' => '100',
					'200' => '200',
					'300' => '300',
					'400' => __( '400 (default)', 'satori' ),
					'500' => '500',
					'600' => '600',
					'700' => '700',
				),
				'default' => '400',
			)
		);
		$bnt_headermap_settings->add_field(
			array(
				'name' => __( 'Map zoom level', 'satori' ),
				'desc' => __( 'Choose the zoom level for the map, 1 being entire world and 20 being individual buildings.', 'satori' ),
				'id' => $bnt_prefix . 'headermap_zoom',
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
					15 => __( '15 (default)', 'satori' ),
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
		$snazzymaps_link = sprintf( wp_kses( __( 'You can insert the code for custom map styling here; check <a href="%s" target="_blank">Snazzymaps.com</a> for ready-made snippets: when on the page of the particular style, click on the "Copy" button or simply select and copy the code under the "Javascript Style Array" heading.', 'satori' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $snazzymaps_url ) );
		$bnt_headermap_settings->add_field(
			array(
				'name' => __( 'Map custom style', 'satori' ),
				'desc' => $snazzymaps_link,
				'id' => $bnt_prefix . 'headermap_style',
				'type' => 'textarea',
			)
		);
	}
	
	// Masonry tile settings
	$bnt_tile_settings = new_cmb2_box( 
		array(
			'id'            => 'tile_settings_metabox',
			'title'         => __( 'Masonry Tile Settings / Only for displaying on "Grid" page template with "Masonry" grid type', 'satori' ),
			'object_types'  => array( 'post', 'project', 'product' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	$bnt_tile_settings->add_field(
		array(
			'name' => __( 'Tile size', 'satori' ),
			'desc' => __( 'Choose the size of the tile relative to the default 1x1 tile (defined by the number of columns in the grid)', 'satori' ),
			'id' => $bnt_prefix . 'tile_size',
			'type' => 'select',
			'options' => array(
				'1x1' => __( '1x1 (default)', 'satori' ),
				'1x2' => '1x2',
				'2x1' => '2x1',
				'2x2' => '2x2',
			),
			'default' => '1x1',
		)
	);
	$bnt_tile_settings->add_field(
		array(
			'name' => __( 'Tile overlay color', 'satori' ),
			'desc' => __( 'Choose the color for an overlay for the tile background image; default is #666666 (grey)', 'satori' ),
			'id' => $bnt_prefix . 'tile_overlay_color',
			'type' => 'colorpicker',
			'default' => '#666666',
		)
	);
	$bnt_tile_settings->add_field(
		array(
			'name' => __( 'Tile overlay opacity', 'satori' ),
			'desc' => __( 'Select the opacity level for an overlay for the tile background image, 0 is fully transparent (default is 0.6)', 'satori' ),
			'id' => $bnt_prefix . 'tile_overlay_opacity',
			'type' => 'select',
			'options' => array(
				'' => __( 'Choose value', 'satori' ),
				'0.0' => '0.0',
				'0.1' => '0.1',
				'0.2' => '0.2',
				'0.3' => '0.3',
				'0.4' => '0.4',
				'0.5' => '0.5',
				'0.6' => __( '0.6 (default)', 'satori' ),
				'0.7' => '0.7',
				'0.8' => '0.8',
				'0.9' => '0.9',
				'1.0' => '1.0',
			),
			'default' => '0.6',
		)
	);
	$bnt_tile_settings->add_field(
		array(
			'name' => __( 'Tile text color', 'satori' ),
			'desc' => __( 'Choose the color for the text inside the tile; default is #ffffff (white)', 'satori' ),
			'id' => $bnt_prefix . 'tile_text_color',
			'type' => 'colorpicker',
			'default' => '#ffffff',
		)
	);
	$bnt_tile_settings->add_field(
		array(
			'name' => __( 'Tile text size', 'satori' ),
			'desc' => __( 'Choose the text size for the tile; default is 16px', 'satori' ),
			'id' => $bnt_prefix . 'tile_text_size',
			'type' => 'select',
			'options' => array(
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'16' => __( '16 (default)', 'satori' ),
				'18' => '18',
				'20' => '20',
				'24' => '24',
				'28' => '28',
			),
			'default' => '16',
		)
	);
	
	// Grid page settings
	$bnt_grid_settings = new_cmb2_box( 
		array(
			'id'            => 'grid_settings_metabox',
			'title'         => __( 'Grid Settings', 'satori' ),
			'object_types'  => array( 'page' ),
			'context'       => 'normal',
			'priority'      => 'low',
			'show_names'	=> true,
		) 
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Grid mode', 'satori' ),
			'desc' => __( 'Choose which grid type to use on this page', 'satori' ),
			'id' => $bnt_prefix . 'page_grid_mode',
			'type' => 'select',
			'options' => array(
				'columns' => 'Columns',
				'masonry' => 'Masonry',
				'rows' => 'Rows',
			),
			'default' => 'columns',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Number of columns', 'satori' ),
			'desc' => __( 'Select the number of columns in the grid or number of base tiles per line in masonry', 'satori' ),
			'id' => $bnt_prefix . 'page_columns',
			'type' => 'select',
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => __( '3 (default)', 'satori' ),
				'4' => '4',
				'5' => '5',
				'6' => '6',
			),
			'default' => '3',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Content types', 'satori' ),
			'desc' => sprintf( __( 'Install the %s to use the "project" (portfolio) content type', 'satori' ), $bnt_ep_url ),
			'id' => $bnt_prefix . 'page_content_types',
			'type' => 'multicheck_posttype',
			'default' => 'post',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Items per page', 'satori' ),
			'desc' => __( 'Input the number of items to display per page; default is the number set in "Settings - Reading" admin section', 'satori' ),
			'id' => $bnt_prefix . 'page_number_items',
			'type' => 'text_small',
			'default' => '10',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Item margins', 'satori' ),
			'desc' => __( 'Input the margin width in pixels (default is 10)', 'satori' ),
			'id' => $bnt_prefix . 'page_item_margins',
			'type' => 'text_small',
			'default' => '10',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Hide tile overlays', 'satori' ),
			'desc' => __( 'Only display tile overlays in masonry on mouse hover', 'satori' ),
			'id' => $bnt_prefix . 'hide_tile_overlays',
			'type' => 'checkbox',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Force full width', 'satori' ),
			'desc' => __( 'Check this option if you want the grid to stretch the entire width of the screen', 'satori' ),
			'id' => $bnt_prefix . 'grid_full_width',
			'type' => 'checkbox',
		)
	);
	$bnt_grid_settings->add_field(
		array(
			'name' => __( 'Load items on same page', 'satori' ),
			'desc' => __( 'Replace the standard pagination with a button which loads next items without refreshing the page', 'satori' ),
			'id' => $bnt_prefix . 'page_ajax_load',
			'type' => 'checkbox',
		)
	);
	
}


// SiteOrigin Content Builder integration
	
	// Add extra attribute to rows
	function bnt_extra_row_attr( $attributes, $grid ) {
		if ( ! empty( $grid['style'] ) ) {
			if ( ! empty ( $grid['style']['class'] ) ) {
				$attributes['data-extraid'] = $grid['style']['class'];
			}
		}
		return $attributes;
	}
	
	// Add divs with ids before each row which has extra classes (useful for one-page layouts)
	function bnt_content_builder_row_ids( $code, $grid, $attr ) {
		if ( ! empty( $attr['data-extraid'] ) ) {
			$rowclasses = $attr['data-extraid'];
			$extradiv = '<a name="'.$rowclasses.'"></a>';
			return $extradiv;
		}
	}


// WooCommerce integration

	// Declare new content wrappers
	function bnt_woo_wrapper_start() {
		echo '<div class="bnt-container"><div class="content"><main class="site-main" role="main"><article>';
	}
	function bnt_woo_wrapper_end() {
		echo '</article></main></div>';
		global $post;
		if ( is_shop() ) {
			$page_id = woocommerce_get_page_id('shop');
		} else {
			$page_id = $post->ID;
		}
		if ( is_active_sidebar( 'bnt_woocommerce' )  ) {
			if ( get_post_meta( $page_id, 'bnt_sidebar_layout', true ) != 'full-width' ) {
				echo '<div class="sidebar widget-area sidebar-woo clear">';
					dynamic_sidebar( 'bnt_woocommerce' );
				echo '</div>';
			}
		}
		echo '</div>';
	}
	
	// Remove plugin styling
	function bnt_woo_dequeue_styles( $enqueue_styles ) {
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
	function bnt_woo_custom_cart_button_text() {
		return '';
	}
	
	// Custom number of products per shop page
	function bnt_woo_loop_perpage() {
		if ( ctype_digit( satori_option( 'bnt_wc_shop_number_items' ) ) ) {
			$bnt_wc_shop_num = satori_option( 'bnt_wc_shop_number_items' );
		} else {
			$bnt_wc_shop_num = '12';
		}
		return 'return '.$bnt_wc_shop_num.';';
	}
	
	// Custom number of columns on the shop page
	function bnt_woo_loop_columns() {
		$bnt_wc_shop_col = (int)satori_option( 'bnt_wc_shop_columns' );
		return $bnt_wc_shop_col;
	}
 
	// Adjust single product layout so that the sections flow more naturally
	function bnt_woo_single_product_sections_start() {
		echo '<div class="single-product-section-wrap">';
	}
	function bnt_woo_single_product_sections_end() { 
		echo '</div>';
		woocommerce_output_related_products(); 
	}
	
	// Custom search form
	function bnt_woo_custom_product_searchform( $form ) {
		$form = '
			<form role="search" method="get" class="woocommerce-product-search" action="'.esc_url( get_home_url( '/'  ) ).'">
				<input type="search" class="search-field" placeholder="'.esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ).'" value="'.get_search_query().'" name="s" title="'.esc_attr_x( 'Search for:', 'label', 'woocommerce' ).'" />
				<input type="submit" value="&#xf179;" />
				<input type="hidden" name="post_type" value="product" />
			</form>
		';
		return $form;
	}
	

?>