<?php

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_post_class')) {

	function bazaarlite_post_class($classes) {	

		$masonry  = 'post-container masonry-element col-md-4';
		$standard = 'post-container col-md-12';

		if ( bazaarlite_is_woocommerce_active('is_cart') ) :
		
			$classes[] = 'woocommerce_cart_page';
				
		endif;

		if ( !bazaarlite_is_single() && is_home() ) {
			
			if ( !bazaarlite_setting('wip_home') || bazaarlite_setting('wip_home') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( !bazaarlite_is_single() && bazaarlite_get_archive_title() ) {
			
			if ( !bazaarlite_setting('wip_category_layout') || bazaarlite_setting('wip_category_layout') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( !bazaarlite_is_single() && is_search() ) {
			
			if ( !bazaarlite_setting('wip_search_layout') || bazaarlite_setting('wip_search_layout') == "masonry" ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( bazaarlite_is_single() && !bazaarlite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		}
	
		return $classes;
		
	}
	
	add_filter('post_class', 'bazaarlite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_get_archive_title')) {

	function bazaarlite_get_archive_title() {
		
		if ( get_the_archive_title()  && ( get_the_archive_title() <> __( 'Archives', 'bazaar-lite' )) && (!bazaarlite_is_woocommerce_active('is_woocommerce')) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_is_single')) {

	function bazaarlite_is_single() {
		
		if ( is_single() || is_page() || is_singular('portfolio') ) :
		
			return true;
		
		endif;
	
	}

}


/*-----------------------------------------------------------------------------------*/
/* VERSION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_remove_version')) {

	function bazaarlite_remove_version( $src ) {
	
		if ( strpos( $src, 'ver=' ) )
	
			$src = remove_query_arg( 'ver', $src );
	
		return $src;
	
	}

	add_filter( 'style_loader_src', 'bazaarlite_remove_version', 9999 );
	add_filter( 'script_loader_src', 'bazaarlite_remove_version', 9999 );

}

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function bazaarlite_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'seanlite' ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'bazaarlite_title', 10, 2 );

	function bazaarlite_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'bazaarlite_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASSES */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_body_classes_function')) {

	function bazaarlite_body_classes_function( $classes ) {

		global $wp_customize;

		if ( bazaarlite_setting('wip_infinitescroll_system') == "on" ) :
		
			$classes[] = 'infinitescroll';
				
		endif;

		if ( isset( $wp_customize ) ) :

			$classes[] = 'customizer_active';
				
		endif;

		if ( bazaarlite_setting('wip_minimal_layout') == "on" ) :
		
			$classes[] = 'minimal-layout';
				
		endif;

		return $classes;

	}
	
	add_filter( 'body_class', 'bazaarlite_body_classes_function' );

}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR LIST */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_sidebar_list')) {

	function bazaarlite_sidebar_list($sidebar_type) {
	
		if ( $sidebar_type == "side" ) :

			$default = array( $sidebar_type."_sidebar_area" => "Default" );

		else:

			$default = array("none" => "None", $sidebar_type."_sidebar_area" => "Default");

		endif;
		
		return $default;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_paged')) {

	function bazaarlite_paged() {
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		return $paged;
		
	}

}


/*-----------------------------------------------------------------------------------*/
/* EXCERPT MORE  */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_hide_excerpt_more')) {

	function bazaarlite_hide_excerpt_more() {
		return '';
	}
	
	add_filter('the_content_more_link', 'bazaarlite_hide_excerpt_more');
	add_filter('excerpt_more', 'bazaarlite_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_scripts_styles')) {

	function bazaarlite_scripts_styles() {

		wp_enqueue_style( 'bazaar-style', get_stylesheet_uri(), array() );

		bazaarlite_enqueue_style('/assets/css');
	
		if ( ( get_theme_mod('wip_skin') ) && ( get_theme_mod('wip_skin') <> "black_turquoise" ) ):
	
			wp_enqueue_style( 'bazaar-lite' . get_theme_mod('wip_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('wip_skin') . '.css' ); 
	
		endif;
		
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,600,700|Yesteryear' );
		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		wp_enqueue_script( "masonry", array('jquery') );

		bazaarlite_enqueue_script('/assets/js');
		
	}
	
	add_action( 'wp_enqueue_scripts', 'bazaarlite_scripts_styles', 11 );

}

?>