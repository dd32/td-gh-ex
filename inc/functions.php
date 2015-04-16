<?php
add_action( 'wp_enqueue_scripts', 'fmi_scripts_styles_method' );
/**
 * Register jquery scripts
 */
function fmi_scripts_styles_method() {
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery_cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( of_get_option( 'fmi_activate_slider', '0' ) == '1' ) { 
		if ( is_home() || is_front_page() ) {
			wp_enqueue_script( 'fmi_slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery_cycle' ), false, true );

		}
	}
	
	echo "<!--[if lt IE 9]>\n";
	echo "<script type='text/javascript' src='".get_template_directory_uri()."/js/html5shiv.min.js'></script>\n";
	echo "<![endif]-->\n";
}


add_action('admin_print_styles', 'fmi_admin_styles');
/**
 * Enqueuing some styles.
 *
 * @uses wp_enqueue_style to register stylesheets.
 * @uses wp_enqueue_style to add styles.
 */
function fmi_admin_styles() {
	wp_enqueue_style( 'fmi-fontawesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css', array() );
	wp_enqueue_style( 'fmi_admin_style', get_template_directory_uri(). '/inc/css/admin.css' );
}


if ( ! function_exists( 'fmi_sidebar_select' ) ) :
/**
 * Fucntion to select the sidebar
 */
function fmi_sidebar_select() {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_fmi_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_fmi_layout', true ); 
	}
	
	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$fmi_default_layout = of_get_option( 'fmi_default_layout', 'right_sidebar' );

	$fmi_default_page_layout = of_get_option( 'fmi_pages_default_layout', 'right_sidebar' );
	$fmi_default_post_layout = of_get_option( 'fmi_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $fmi_default_page_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $fmi_default_page_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( is_single() ) {
			if( $fmi_default_post_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $fmi_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( $fmi_default_layout == 'right_sidebar' ) { get_sidebar(); }
		elseif ( $fmi_default_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
	}
	elseif( $layout_meta == 'right_sidebar' ) { get_sidebar(); }
	elseif( $layout_meta == 'left_sidebar' ) { get_sidebar( 'left' ); }
}
endif;


add_filter( 'body_class', 'fmi_body_class' );
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function fmi_body_class( $fmi_classes ) {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, '_fmi_layout', true ); }
	
	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, '_fmi_layout', true ); 
	}

	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$fmi_default_layout = of_get_option( 'fmi_default_layout', 'right_sidebar' );

	$fmi_default_page_layout = of_get_option( 'fmi_pages_default_layout', 'right_sidebar' );
	$fmi_default_post_layout = of_get_option( 'fmi_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() || is_home() ) {
			if( $fmi_default_page_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
			elseif( $fmi_default_page_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
			elseif( $fmi_default_page_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( is_single() ) {
			if( $fmi_default_post_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
			elseif( $fmi_default_post_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
			elseif( $fmi_default_post_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

		}
		elseif( $fmi_default_layout == 'right_sidebar' ) { $fmi_classes[] = ''; }
		elseif( $fmi_default_layout == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
		elseif( $fmi_default_layout == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

	}
	elseif( $layout_meta == 'right_sidebar' ) { $fmi_classes[] = ''; }
	elseif( $layout_meta == 'left_sidebar' ) { $fmi_classes[] = 'left-sidebar'; }
	elseif( $layout_meta == 'no_sidebar_full_width' ) { $fmi_classes[] = 'no-sidebar-full-width'; }

	if( of_get_option( 'fmi_site_layout', 'wide' ) == 'wide' ) {
		$fmi_classes[] = 'wide';
	}
	
	return $fmi_classes;
}
?>