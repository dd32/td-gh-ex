<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

define( 'NOVA_LITE_MIN_PHP_VERSION', '5.3' );

/*-----------------------------------------------------------------------------------*/
/* Switches back to the previous theme if the minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'nova_lite_check_php_version' ) ) {

	function nova_lite_check_php_version() {
	
		if ( version_compare( PHP_VERSION, NOVA_LITE_MIN_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'nova_lite_min_php_not_met_notice' );
			switch_theme( get_option( 'theme_switched' ));
			return false;
	
		};
	}

	add_action( 'after_switch_theme', 'nova_lite_check_php_version' );

}

/*-----------------------------------------------------------------------------------*/
/* An error notice that can be displayed if the Minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'nova_lite_min_php_not_met_notice' ) ) {

	function nova_lite_min_php_not_met_notice() {
		?>
		<div class="notice notice-error is_dismissable">
			<p>
				<?php esc_html_e('You need to update your PHP version to run this theme.', 'nova-lite' ); ?><br />
				<?php
				printf(
					esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'nova-lite' ),
					PHP_VERSION,
					NOVA_LITE_MIN_PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_setting')) {

	function novalite_setting( $id, $type = "attr" ) {

		$sanitation = array(
			
			"attr" => array( "function" => "esc_attr", "controls" => "" ),
			"html" => array( "function" => "esc_html", "controls" => "" ),
			"url"  => array( "function" => "esc_url",  "controls" => array('http', 'https', 'skype', 'mailto') ),
			
		);
		
		$novalite_setting = call_user_func( $sanitation[$type]["function"], get_theme_mod($id), $sanitation[$type]["controls"] );
		
		if (isset($novalite_setting)) :
			
			return $novalite_setting;
	
		endif;

	}
	
}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_postmeta')) {

	function novalite_postmeta($id) {
	
		global $post;
		
		if (!is_404()) {
			$val = get_post_meta( $post->ID , $id, TRUE);
			if(isset($val))
			return $val;
		} else {
			return null;
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* CONTENT TEMPLATE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_template')) {

	function novalite_template($id) {
	
		$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );
	
		$span = $template["full"];
		$sidebar =  "full";
	
		if ( ( is_search() ) && ( novalite_setting('novalite_search_layout')) ) {
			
			$span = $template[novalite_setting('novalite_search_layout')];
			$sidebar =  novalite_setting('novalite_search_layout');
				
		} else if ( ( (is_category()) || (is_tag()) || (is_tax()) || (is_month()) ) && ( novalite_setting('novalite_category_layout')) ) {
			
			$span = $template[novalite_setting('novalite_category_layout')];
			$sidebar =  novalite_setting('novalite_category_layout');
				
		} else if ( ( is_home() ) && ( novalite_setting('novalite_home')) ) {
			
			$span = $template[novalite_setting('novalite_home')];
			$sidebar =  novalite_setting('novalite_home');
				
		} else if ( ( is_home() ) && ( !novalite_setting('novalite_home')) ) {
			
			$span = $template["right-sidebar"];
			$sidebar =  "right-sidebar";
				
		} else if (novalite_postmeta('novalite_template')) {
			
			$span = $template[novalite_postmeta('novalite_template')];
			$sidebar =  novalite_postmeta('novalite_template');
				
		}
	
		return ${$id};
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_paged')) {

	function novalite_paged() {
		
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
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('novalite_prettyPhoto')) {

	function novalite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}
	
	add_filter( 'wp_get_attachment_link', 'novalite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* CUSTOM EXCERPT MORE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('novalite_new_excerpt_more')) {

	function novalite_new_excerpt_more() {
		
		global $post;
		return '<p><a class="button" href="'.get_permalink($post->ID).'" title="More">  ' . esc_html__( "Read More","nova-lite") . ' →</a></p>';
	
	}
	
	add_filter('excerpt_more', 'novalite_new_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('novalite_remove_category_list_rel')) {

	function novalite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}
	
	add_filter('wp_list_categories', 'novalite_remove_category_list_rel');
	add_filter('the_category', 'novalite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_remove_thumbnail_dimensions')) {

	function novalite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'novalite_remove_thumbnail_dimensions', 10, 3 );
	
}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_my_gallery_style')) {

	function novalite_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'novalite_my_gallery_style', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* ALLOWED PROTOCOLS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_kses_allowed_protocols')) {

	function novalite_kses_allowed_protocols($protocols) {
		
		$protocols[] = 'skype';
		return $protocols;
	
	}

	add_filter( 'kses_allowed_protocols', 'novalite_kses_allowed_protocols');

}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_embed_html')) {
	
	function novalite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'novalite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'novalite_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('novalite_scripts_styles')) {

	function novalite_scripts_styles() {

		wp_enqueue_style( 'nova-lite-style', get_stylesheet_uri(), array() );

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Montez|Oxygen|Yanone+Kaffeesatz'),
			'subset' =>	'latin,latin-ext'
		);

		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '3.3.7' );
		wp_enqueue_style('bootstrap-responsive', get_template_directory_uri() . '/assets/css/bootstrap-responsive.css', array(), '3.3.7' );
		wp_enqueue_style('flexslider', get_template_directory_uri() . '/assets/css/flexslider.css', array(), '3.3.7' );
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '3.3.7' );
		wp_enqueue_style('nivoslider', get_template_directory_uri() . '/assets/css/nivoslider.css', array(), '3.3.7' );
		wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '3.3.7' );

		if ( get_theme_mod('novalite_skin') && get_theme_mod('novalite_skin') <> "turquoise" ) :
		
			wp_enqueue_style(
				'nova-lite-' . get_theme_mod('novalite_skin'),
				get_template_directory_uri() . '/assets/skins/' . get_theme_mod('novalite_skin') . '.css'
				
			); 
		
		endif;

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), '1.3', TRUE ); 
		wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js' , array('jquery'), '1.3', TRUE ); 
		wp_enqueue_script( 'jquery-tinynav', get_template_directory_uri() . '/assets/js/jquery.tinynav.js' , array('jquery'), '1.3', TRUE ); 
		wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/assets/js/prettyPhoto.js' , array('jquery'), '1.3', TRUE ); 
		wp_enqueue_script( 'nova-lite-template', get_template_directory_uri() . '/assets/js/template.js' , array('jquery'), '1.0.0', TRUE ); 

		wp_enqueue_script('html5shiv', get_template_directory_uri().'/assets/scripts/html5shiv.js', FALSE, '3.7.3');
		wp_script_add_data('html5shiv', 'conditional', 'IE 8' );
		wp_enqueue_script('selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr.js', FALSE, '1.0.3b');
		wp_script_add_data('selectivizr', 'conditional', 'IE 8' );

	}
	
	add_action( 'wp_enqueue_scripts', 'novalite_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('novalite_setup')) {

	function novalite_setup() {

		if ( ! isset( $content_width ) )
			$content_width = 1170;

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
	
		add_theme_support( 'title-tag' );
	
		add_theme_support( 'custom-background', array(
			'default-color' => 'cccccc'
		) );

		load_theme_textdomain('nova-lite', get_template_directory() . '/languages');

		add_image_size( 'nova_lite_blog', 1170,429, TRUE ); 

		register_nav_menu(
			'main-menu', esc_html__( 'Main menu', 'nova-lite' )
		);
		
		require_once( trailingslashit( get_template_directory() ) . 'core/classes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/classes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/classes/class-notice.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/admin/customize/customize.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/functions/style.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/functions/widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/footer.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/header.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/templates/title.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/metaboxes/page.php' );
		require_once( trailingslashit( get_template_directory() ) . 'core/metaboxes/post.php' );

	}

	add_action( 'after_setup_theme', 'novalite_setup' );

}

?>