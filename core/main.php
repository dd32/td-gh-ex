<?php

/**
 * Wp in Progress
 * 
 * @theme Suevafree
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Woocommerce is active */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'suevafree_is_woocommerce_active' ) ) {
	
	function suevafree_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function suevafree_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'suevafree' ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'suevafree_title', 10, 2 );

	function suevafree_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'suevafree_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_get_archive_title')) {

	function suevafree_get_archive_title() {
		
		if ( get_the_archive_title() && ( get_the_archive_title() <> 'Archives' ) ) :
		
			return get_the_archive_title();
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_is_single')) {

	function suevafree_is_single() {
		
		if ( is_single() || is_page() ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_setting')) {

	function suevafree_setting($id) {

		$suevafree_setting = get_theme_mod($id);
			
		if ( isset($suevafree_setting) ) :
			
			return $suevafree_setting;
			
		else:
		
			return false;
	
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_postmeta')) {
	
	function suevafree_postmeta($id) {
	
		global $post, $wp_query;
		
		$content_ID = $post->ID;
	
		if( suevafree_is_woocommerce_active('is_shop') ) {
	
			$content_ID = get_option('woocommerce_shop_page_id');
	
		}

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if(isset($val)) {
			
			return $val;
			
		} else {
				
			return '';
			
		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_require')) {

	function suevafree_require($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							require_once $dir . $value;
						
						} 
					
					} 

				}  
			
			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
					
						require_once get_template_directory()."/".$folder.$filename;
					
					}
				}
			}
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_enqueue_script')) {

	function suevafree_enqueue_script($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
		
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							wp_enqueue_script( str_replace('.js','',$value), get_template_directory_uri() . $folder . "/" . $value , array('jquery'), FALSE, TRUE ); 
						
						} 
					
					} 

				}  

			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
					
					}
					
				}
		
			}
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_enqueue_style')) {

	function suevafree_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			if ( ( !suevafree_setting('suevafree_loadsystem') ) || ( suevafree_setting('suevafree_loadsystem') == "mode_a" ) ) {
			
				$dir = dirname(dirname(__FILE__)) . $folder ;  
				
				$files = scandir($dir);  
				  
				foreach ($files as $key => $value) {  

					if ( !in_array($value,array(".DS_Store",".","..")) ) { 
						
						if ( !is_dir( $dir . $value) ) { 
							
							wp_enqueue_style( str_replace('.css','',$value), get_template_directory_uri() . $folder . "/" . $value ); 
						
						} 
					
					} 

				}  
			
			} else if ( suevafree_setting('suevafree_loadsystem') == "mode_b" ) {
	
				$dh  = opendir(get_template_directory().$folder);
				
				while (false !== ($filename = readdir($dh))) {
				   
					if ( ( strlen($filename) > 2 ) && ( $filename <> ".DS_Store" ) ) {
						
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				
					}
				
				}
			
			}
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_posticon')) {

	function suevafree_posticon() {
	
		$icons = array (
		
			"video" => "fa fa-film" , 
			"gallery" => "fa fa-camera" , 
			"audio" => "fa fa-music" , 
			"chat" => "fa fa-users", 
			"status" => "fa fa-keyboard-o", 
			"image" => "fa fa-file-image-o", 
			"quote" => "fa fa-quote-left", 
			"link" => "fa fa-external-link", 
			"aside" => "fa fa-file-text-o", 
		
		);
	
		if (get_post_format()) { 
		
			$icon = '<span class="entry-'.get_post_format().'"><i class="'.$icons[get_post_format()].'"></i>'.ucfirst(strtolower(get_post_format())).'</span>'; 
		
		} else {
		
			$icon = '<span class="entry-standard"><i class="fa fa-pencil-square-o"></i>'.__( "Article","suevafree").'</span>'; 
		
		}
	
		return $icon;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_post_class')) {

	function suevafree_post_class($classes) {	

		$masonry  = 'post-container masonry-item col-md-4';
		$standard = 'post-container col-md-12';

		if ( !suevafree_is_single() ) {

			if ( is_home() ) {
				
				if ( !suevafree_setting('suevafree_home') || suevafree_setting('suevafree_home') == "masonry" ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
				
			} else if ( is_archive() ) {
	
				if ( !suevafree_setting('suevafree_category_layout') || suevafree_setting('suevafree_category_layout') == "masonry" ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
				
			} else if ( is_search() ) {
				
				if ( !suevafree_setting('suevafree_search_layout') || suevafree_setting('suevafree_search_layout') == "masonry" ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
			
			}
			
		} else if ( suevafree_is_single() && !suevafree_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		} else if ( suevafree_is_woocommerce_active('is_cart') ) {
		
			$classes[] = 'woocommerce_cart_page';
				
		} else if ( is_page() ) {

			$classes[] = 'full';

		}

		return $classes;
		
	}
	
	add_filter('post_class', 'suevafree_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* Body class */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_body_class')) {
	
	function suevafree_body_class($classes) {
	
		$classes[] = 'custombody';
		
		if ( suevafree_setting('suevafree_body_layout') == "minimal" ) :

			$classes[] = 'minimal_layout';

		endif;
			
		return $classes;
		
	}
	
	add_filter('body_class', 'suevafree_body_class');
	
}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_template')) {
	
	function suevafree_template($id) {
	
		$template = array ( "full" => "col-md-12" , "left-sidebar" => "col-md-8" , "right-sidebar" => "col-md-8" );
	
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";
	
		if ( suevafree_is_woocommerce_active('is_woocommerce') && ( suevafree_is_woocommerce_active('is_product_category') || suevafree_is_woocommerce_active('is_product_tag') ) && suevafree_setting('suevafree_woocommerce_category_layout') ) {
		
			$span = $template[suevafree_setting('suevafree_woocommerce_category_layout')];
			$sidebar =  suevafree_setting('suevafree_woocommerce_category_layout');

		} else if ( suevafree_is_woocommerce_active('is_woocommerce') && is_search() && suevafree_postmeta('suevafree_template') ) {
					
			$span = $template[suevafree_postmeta('suevafree_template')];
			$sidebar =  suevafree_postmeta('suevafree_template');
	
		} else if ( ( is_page() || is_single() || suevafree_is_woocommerce_active('is_shop') ) && suevafree_postmeta('suevafree_template') ) {
					
			$span = $template[suevafree_postmeta('suevafree_template')];
			$sidebar =  suevafree_postmeta('suevafree_template');

		} else if ( ! suevafree_is_woocommerce_active('is_woocommerce') && ( is_archive() ) && suevafree_setting('suevafree_category_layout') ) {

			$span = $template[suevafree_setting('suevafree_category_layout')];
			$sidebar =  suevafree_setting('suevafree_category_layout');
						
		} else if ( is_home() && suevafree_setting('suevafree_home') ) {
					
			$span = $template[suevafree_setting('suevafree_home')];
			$sidebar =  suevafree_setting('suevafree_home');

		} else if ( ! suevafree_is_woocommerce_active('is_woocommerce') && is_search() && suevafree_setting('suevafree_search_layout') ) {

			$span = $template[suevafree_setting('suevafree_search_layout')];
			$sidebar =  suevafree_setting('suevafree_search_layout');
						
		}
		
		return ${$id};
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Excerpt */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_hide_excerpt_more')) {
	
	function suevafree_hide_excerpt_more() {
	
		return '';
	
	}
	
	add_filter('the_content_more_link', 'suevafree_hide_excerpt_more');
	add_filter('excerpt_more', 'suevafree_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_scripts_styles')) {

	function suevafree_scripts_styles() {
	
		suevafree_enqueue_style('/assets/css');

		if ( get_theme_mod('suevafree_skin') ):
	
			wp_enqueue_style( 'suevafree-' . get_theme_mod('suevafree_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		endif;

		wp_enqueue_style( 'suevafree-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic|Raleway:400,800,900,700,600,500,300,200,100|Allura&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic' );

		suevafree_enqueue_script('/assets/js');

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		wp_enqueue_script( "masonry", array('jquery') );

	}
	
	add_action( 'wp_enqueue_scripts', 'suevafree_scripts_styles', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_prettyPhoto')) {

	function suevafree_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}
	
	add_filter( 'wp_get_attachment_link', 'suevafree_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_remove_category_list_rel')) {

	function suevafree_remove_category_list_rel($output) {
		
		$output = str_replace('rel="category"', '', $output);
		return $output;
		
	}
	
	add_filter('wp_list_categories', 'suevafree_remove_category_list_rel');
	add_filter('the_category', 'suevafree_remove_category_list_rel');
	
}

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_thumb_size')) {

	function suevafree_thumb_size( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'suevafree_thumb_size', 10, 3 );

}

/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_gallery_style')) {

	function suevafree_gallery_style() {
		
		return "<div class='gallery'>";
	
	}
	
	add_filter( 'gallery_style', 'suevafree_gallery_style', 99 );
	
}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_embed_html')) {
	
	function suevafree_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'suevafree_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'suevafree_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAIL WIDTH */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('suevafree_get_width')) {

	function suevafree_get_width() {
		
		if (suevafree_setting('suevafree_screen3')):
		
			return suevafree_setting('suevafree_screen3');
		
		else:
		
			return "1170";
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAIL HEIGHT */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('suevafree_get_thumbs')) {

	function suevafree_get_thumbs($type) {
		
		if (suevafree_setting('suevafree_'.$type.'_thumbinal')):
		
			return suevafree_setting('suevafree_'.$type.'_thumbinal');
		
		else:
		
			return "429";
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('suevafree_setup')) {

	function suevafree_setup() {
		
		global $content_width;
		
		if ( ! isset( $content_width ) )
			$content_width = 940;

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'title-tag' );
	
		add_image_size( 'blog', suevafree_get_width(), suevafree_get_thumbs('blog'), TRUE ); 
	
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );

		register_nav_menu( 'main-menu', 'Main menu' );
	
		load_theme_textdomain("suevafree", get_template_directory() . '/languages');
		
		$require_array = array (
			"/core/classes/",
			"/core/admin/customize/",
			"/core/functions/",
			"/core/templates/",
			"/core/metaboxes/",
		);
		
		foreach ( $require_array as $require_file ) {	
		
			suevafree_require($require_file);
		
		}
		
	}

	add_action( 'after_setup_theme', 'suevafree_setup' );

}

?>