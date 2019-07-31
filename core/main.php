<?php

/**
 * Wp in Progress
 * 
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

define( 'LOOKI_LITE_MIN_PHP_VERSION', '5.3' );

/*-----------------------------------------------------------------------------------*/
/* Switches back to the previous theme if the minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'looki_lite_check_php_version' ) ) {

	function looki_lite_check_php_version() {
	
		if ( version_compare( PHP_VERSION, LOOKI_LITE_MIN_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'looki_lite_min_php_not_met_notice' );
			switch_theme( get_option( 'theme_switched' ));
			return false;
	
		};
	}

	add_action( 'after_switch_theme', 'looki_lite_check_php_version' );

}

/*-----------------------------------------------------------------------------------*/
/* An error notice that can be displayed if the Minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'looki_lite_min_php_not_met_notice' ) ) {

	function looki_lite_min_php_not_met_notice() {
		?>
		<div class="notice notice-error is_dismissable">
			<p>
				<?php esc_html_e('You need to update your PHP version to run this theme.', 'looki-lite' ); ?><br />
				<?php
				printf(
					esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'looki-lite' ),
					PHP_VERSION,
					LOOKI_LITE_MIN_PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_post_class')) {

	function lookilite_post_class($classes) {
	
		$classes[] = 'post-container col-md-12';
			
		return $classes;
		
	}
	
	add_filter('post_class', 'lookilite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_body_class')) {

	function lookilite_body_class($classes) {

		global $wp_customize;

		$classes[] = 'custombody';
	
		if ( isset( $wp_customize ) ) :

			$classes[] = 'customizer_active';
				
		endif;
	
		return $classes;
		
	}
	
	add_filter('body_class', 'lookilite_body_class');

}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_embed_html')) {
	
	function lookilite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'lookilite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'lookilite_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_require')) {

	function lookilite_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
		
				$folder = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($folder);  
				  
				foreach ($files as $key => $name) {  
					if (!is_dir( $name )) { 
						require_once $folder . $name;
					} 
				}  
			
			} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {
	
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( strlen($filename) > 2 ) {
					require_once get_template_directory()."/".$folder.$filename;
					}
				}
			}
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_enqueue_script')) {

	function lookilite_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  
					if (!is_dir( $name )) { 
						
						wp_enqueue_script( 'lookilite_'. str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
						
					} 
				}  
			
			} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( strlen($filename) > 2 ) {
							wp_enqueue_script( 'lookilite_'. str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
					}
				}
		
			}
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_enqueue_style')) {

	function lookilite_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $name) {  
					
					if (!is_dir( $name )) { 
						
						wp_enqueue_style( 'lookilite_'. str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
						
					} 
				}  
			
			
			} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {
	
			
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( strlen($filename) > 2 ) {
							wp_enqueue_style( 'lookilite_'. str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
					}
				}
			
	
			}
		
		endif;
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_setting')) {
	
	function lookilite_setting($id) {
		
		$lookilite_setting = get_theme_mod($id);
			
		if(isset($lookilite_setting))
			
			return $lookilite_setting;
		
	}
	
}


/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_postmeta')) {

	function lookilite_postmeta($id) {
	
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
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_is_single')) {

	function lookilite_is_single() {
		
		if ( is_single() || is_page() ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* CONTENT TEMPLATE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_template')) {

	function lookilite_template($id) {
	
		$template = "col-md-12";
	
		if (lookilite_setting($id)) { $template = lookilite_setting($id); }
	
		return $template;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_paged')) {

	function lookilite_paged() {
		
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
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_get_archive_title')) {

	function lookilite_get_archive_title() {
		
		if ( get_the_archive_title()  && ( get_the_archive_title() <> 'Archives' ) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* LOGIN AREA */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'lookilite_custom_login_logo' ) ) {
 
	function lookilite_custom_login_logo() { 
	
		if ( lookilite_setting('lookilite_login_logo') ) : ?>
	
			<style type="text/css">

				body.login div#login h1 a {
					background-image: url('<?php echo esc_url(lookilite_setting('lookilite_login_logo')); ?>');
					-webkit-background-size: inherit;
					background-size: inherit ;
					width:100%;
					height:<?php echo lookilite_setting('lookilite_login_logo_height'); ?>px;
				}
				
			</style>
		
	<?php 
	
		endif;
	
	}
	
	add_action( 'login_enqueue_scripts', 'lookilite_custom_login_logo' );

}

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_prettyPhoto')) {

	function lookilite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}
	
	add_filter( 'wp_get_attachment_link', 'lookilite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* EXCERPT MORE  */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_hide_excerpt_more')) {

	function lookilite_hide_excerpt_more() {
		return '';
	}
	
	add_filter('the_content_more_link', 'lookilite_hide_excerpt_more');
	add_filter('excerpt_more', 'lookilite_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* Customize excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lookilite_customize_excerpt_more')) {

	function lookilite_customize_excerpt_more( $excerpt ) {

		global $post;

		if ( lookilite_is_single() ) :

			return $excerpt;

		else:

			$allowed = array(
				'span' => array(
					'class' => array(),
				),
			);
	
			$class = 'more';
			$button = ' [...] ';

			if ( $pos=strpos($post->post_content, '<!--more-->') && !has_excerpt( $post->ID )): 
			
				$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
			
			else:
			
				$content = $excerpt;
	
			endif;
	
			return $content. '<a class="'. wp_kses($class, $allowed) . '" href="' . esc_url(get_permalink($post->ID)) . '" title="'.esc_html__('Read More','lookilite').'">' . $button . '</a>';

		endif;
		

	}
	
	add_filter( 'get_the_excerpt', 'lookilite_customize_excerpt_more' );

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_remove_category_list_rel')) {

	function lookilite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}
	
	add_filter('wp_list_categories', 'lookilite_remove_category_list_rel');
	add_filter('the_category', 'lookilite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_remove_thumbnail_dimensions')) {

	function lookilite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'lookilite_remove_thumbnail_dimensions', 10, 3 );

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_my_gallery_style')) {

	function lookilite_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'lookilite_my_gallery_style', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('lookilite_scripts_styles')) {

	function lookilite_scripts_styles() {
	
		lookilite_enqueue_style('/assets/css');

		if ( ( lookilite_setting('lookilite_skin') ) && ( lookilite_setting('lookilite_skin') <> "turquoise" ) ):
	
			wp_enqueue_style( 'lookilite-' . lookilite_setting('lookilite_skin') , get_template_directory_uri() . '/assets/skins/' . lookilite_setting('lookilite_skin') . '.css' ); 
		
		endif;

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));

		wp_enqueue_style( 'lookilite-style', get_stylesheet_uri(),array() );

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Fjalla+One|Roboto+Slab:400,300,100,700' );
		
		lookilite_enqueue_script('/assets/js');

		wp_enqueue_script('html5shiv', get_template_directory_uri().'/assets/scripts/html5shiv.js', FALSE, '3.7.0');
		wp_script_add_data('html5shiv', 'conditional', 'IE 8' );
		wp_enqueue_script('selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr.js', FALSE, '1.0.3b');
		wp_script_add_data('selectivizr', 'conditional', 'IE 8' );

	}
	
	add_action( 'wp_enqueue_scripts', 'lookilite_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('lookilite_setup')) {

	function lookilite_setup() {
	
		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );

		add_image_size( 'blog', 1170,429, TRUE ); 
		add_image_size( 'portfolio', 1170,429, TRUE ); 
		add_image_size( 'slide', 1170,429, TRUE ); 
		
		add_image_size( 'large', 449,304, TRUE ); 
		add_image_size( 'medium', 290,220, TRUE ); 
		add_image_size( 'small', 211,150, TRUE ); 
	
		register_nav_menu( 'main-menu', 'Main menu' );
	
		load_theme_textdomain('lookilite', get_template_directory() . '/languages');
	
		if ( ! isset( $content_width ) )
			$content_width = 1170;
	
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );
	
		lookilite_require('/core/includes/');
		lookilite_require('/core/admin/customize/');
		lookilite_require('/core/templates/');
		lookilite_require('/core/functions/');
		lookilite_require('/core/metaboxes/');
	
	}
	
	add_action( 'after_setup_theme', 'lookilite_setup' );

}

?>