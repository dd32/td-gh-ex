<?php
/**
 * Catchbase Framework
 *
 * WARNING: This file is part of the core Catchbase Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * Create structure for srtucture
 *
 * @package Catchbase
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( ! function_exists( 'catchbase_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'catchbase_doctype', 'catchbase_doctype', 10 );


if ( ! function_exists( 'catchbase_head' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
		<![endif]-->
		<?php
	}
endif;
add_action( 'catchbase_before_wp_head', 'catchbase_head', 10 );


if ( ! function_exists( 'catchbase_doctype_start' ) ) :
	/**
	 * Start Page
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_page_start() {
		?>
		<div id="page" class="hfeed site">
		<?php
	}
endif;
add_action( 'catchbase_header', 'catchbase_page_start', 10 );


if ( ! function_exists( 'catchbase_page_end' ) ) :
	/**
	 * End Page
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'catchbase_footer', 'catchbase_page_end', 200 );


if ( ! function_exists( 'catchbase_header_start' ) ) :
	/**
	 * Start Page
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_header_start() {
		?>
		<header id="masthead" class="site-header" role="banner">
    		<div class="wrapper">
		<?php
	}
endif;
add_action( 'catchbase_header', 'catchbase_header_start', 30 );


if ( ! function_exists( 'catchbase_header_end' ) ) :
	/**
	 * Start Page
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'catchbase_header', 'catchbase_header_end', 100 );


if ( ! function_exists( 'catchbase_content_start' ) ) :
	/**
	 * Start Content
	 *
	 * @since Catchbase 1.0
	 *
	 */
	function catchbase_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('catchbase_content', 'catchbase_content_start', 10 );

if ( ! function_exists( 'catchbase_content_end' ) ) :
	/**
	 * End Content
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'catchbase_after_content', 'catchbase_content_end', 30 );


if ( ! function_exists( 'catchbase_content_sidebar_wrap_start' ) ) :
	/**
	 * Start wrapper if three columns layout
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_content_sidebar_wrap_start() {
		?>
			<div id="content_sidebar_wrap">
		<?php
	}
endif;


if ( ! function_exists( 'catchbase_content_sidebar_wrap_end' ) ) :
	/**
	 * End wrapper if three columns layout
	 * 
	 * @since Catchbase 1.0
	 */
	function catchbase_content_sidebar_wrap_end() {
		?>
			</div><!-- #content_sidebar_wrap -->
		<?php
	}
endif;


if ( ! function_exists( 'catchbase_sidebar_secondary' ) ) :
	/**
	 * Secondary Sidebar
	 * 
	 * @since Catchbase 1.0
	 */
	function catchbase_sidebar_secondary() {
		get_sidebar( 'secondary' );
	}
endif;


if ( ! function_exists( 'catchbase_layout_condition_check' ) ) :
	/**
	 * Display Featured Header Image
	 *
	 * @since Catchbase 1.0
	 */
	function catchbase_layout_condition_check() {
		global $post, $wp_query;

		$options = catchbase_get_theme_options();
		
		$themeoption_layout = $options['theme_layout'];
		
		// Front page displays in Reading Settings
		$page_on_front = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts'); 

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();	
		
		// Post /Page /General Layout
		if ( $post) {
			if ( is_attachment() ) { 
				$parent = $post->post_parent;
				$layout = get_post_meta( $parent, 'catchbase-layout-option', true );
				$sidebaroptions = get_post_meta( $parent, 'catchbase-sidebar-options', true );
				
			} else {
				$layout = get_post_meta( $post->ID, 'catchbase-layout-option', true ); 
				$sidebaroptions = get_post_meta( $post->ID, 'catchbase-sidebar-options', true ); 
			}
		}
		else {
			$sidebaroptions = '';
		}
				
		if( empty( $layout ) || ( !is_page() && !is_single() ) ) {
			$layout='default';
		}
		
		if ( $layout == 'three-columns' || ( $layout=='default' && ( $themeoption_layout == 'three-columns' ) ) ){
			add_action( 'catchbase_content', 'catchbase_content_sidebar_wrap_start', 40 );

			add_action( 'catchbase_after_content', 'catchbase_content_sidebar_wrap_end', 10 );
			
			add_action( 'catchbase_after_content', 'catchbase_sidebar_secondary', 20 );

			
		}
	} // catchbase_layout_condition_check
endif;
add_action( 'catchbase_before', 'catchbase_layout_condition_check' ); 


if ( ! function_exists( 'catchbase_footer_content_start' ) ) :
/**
 * Template for Featured Image in Content
 *
 * To override this in a child theme
 * simply create your own catchbase_content_image(), and that function will be used instead.
 *
 * @since Catchbase 1.0
 */
function catchbase_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action('catchbase_footer', 'catchbase_footer_content_start', 20 );


if ( ! function_exists( 'catchbase_footer_sidebar' ) ) :
/**
 * Template for Featured Image in Content
 *
 * To override this in a child theme
 * simply create your own catchbase_content_image(), and that function will be used instead.
 *
 * @since Catchbase 1.0
 */
function catchbase_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'catchbase_footer', 'catchbase_footer_sidebar', 30 );


if ( ! function_exists( 'catchbase_footer_content_end' ) ) :
/**
 * Template for Featured Image in Content
 *
 * To override this in a child theme
 * simply create your own catchbase_content_image(), and that function will be used instead.
 *
 * @since Catchbase 1.0
 */
function catchbase_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'catchbase_footer', 'catchbase_footer_content_end', 110 );


if ( ! function_exists( 'catchbase_header_right' ) ) :
	/**
	 * Shows Header Right Sidebar
	 */
	function catchbase_header_right() { 
		get_sidebar( 'header-right' ); 
	}
endif;
add_action( 'catchbase_header', 'catchbase_header_right', 50 );
