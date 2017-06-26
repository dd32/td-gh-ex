<?php

/**
 * Wp in Progress
 * 
 * @theme Alhena
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_setting')) {

	function alhenalite_setting($id) {

		$alhenalite_setting = get_theme_mod($id);
			
		if ( isset($alhenalite_setting))
			
			return $alhenalite_setting;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_postmeta')) {

	function alhenalite_postmeta($id) {

		global $post, $wp_query;
		
		$content_ID = $post->ID;
	
		if( alhenalite_is_woocommerce_active('is_shop') ) {
	
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
/* Woocommerce is active */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhenalite_is_woocommerce_active' ) ) {
	
	function alhenalite_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_get_archive_title')) {

	function alhenalite_get_archive_title() {
		
		if ( is_category() ) {
			$title = sprintf( esc_html__( 'Category: %s', 'alhena-lite' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( esc_html__( 'Tag: %s', 'alhena-lite' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( esc_html__( 'Author: %s', 'alhena-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Year: %s', 'alhena-lite' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'alhena-lite' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Month: %s', 'alhena-lite' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'alhena-lite' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Day: %s', 'alhena-lite' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'alhena-lite' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'alhena-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'alhena-lite' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( esc_html__( 'Archives: %s', 'alhena-lite' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title = sprintf( esc_html__( '%1$s: %2$s', 'alhena-lite' ), $tax->labels->singular_name, single_term_title( '', false ) );
		}
	
		if ( isset($title) )  :
			return $title;
		else:
			return false;
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_is_single')) {

	function alhenalite_is_single() {
		
		if ( is_single() || is_page() ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_require')) {

	function alhenalite_require($folder) {
	
		if (isset($folder)) : 
		
			$dir = get_template_directory() . $folder ;  
				
			$files = scandir($dir);  
				  
			foreach ($files as $key => $value) {  

				if ( !in_array($value,array(".DS_Store",".","..") ) && !strstr( $value, '._' ) ) { 
						
					if ( !is_dir( $dir . $value) ) { 
							
						require_once $dir . $value;
						
					} 
					
				} 

			}  
				
		
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_enqueue_script')) {

	function alhenalite_enqueue_script($folder) {
	
		if ( isset($folder) ) : 
	
			$dir = get_template_directory() . $folder ;  
				
			$files = scandir($dir);  
				  
			foreach ($files as $key => $value) {  

				if ( !in_array($value,array(".DS_Store",".","..") ) && !strstr( $value, '._' ) ) { 
						
					if ( !is_dir( $dir . $value ) && strstr ( $value, 'js' )) { 
							
						wp_enqueue_script( str_replace('.js','',$value), get_template_directory_uri() . $folder . "/" . $value , array('jquery'), FALSE, TRUE ); 
						
					} 
					
				} 

			}  

		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_enqueue_style')) {

	function alhenalite_enqueue_style($folder) {
	
		if (isset($folder)) : 
	
			$dir = get_template_directory() . $folder ;  
				
			$files = scandir($dir);  
				  
			foreach ($files as $key => $value) {  

				if ( !in_array($value,array(".DS_Store",".","..") ) && !strstr( $value, '._' ) ) { 
						
					if ( !is_dir( $dir . $value ) && strstr ( $value, 'css' )) { 
						
						wp_enqueue_style( str_replace('.css','',$value), get_template_directory_uri() . $folder . "/" . $value ); 
						
					} 
					
				} 

			}  
			
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function alhenalite_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', "alhena-lite" ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'alhenalite_title', 10, 2 );

	function alhenalite_addtitle() {
		
?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'alhenalite_addtitle' );

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_posticon')) {

	function alhenalite_posticon() {
	
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
		
			$icon = '<span class="entry-standard"><i class="fa fa-pencil-square-o"></i>'.esc_html__( "Article","alhena-lite").'</span>'; 
		
		}
	
		return $icon;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Default menu */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_add_menuclass')) {

	function alhenalite_add_menuclass( $ulclass ) {
		
		return preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	
	}
	
	add_filter( 'wp_page_menu', 'alhenalite_add_menuclass' );
	
}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_prettyPhoto')) {

	function alhenalite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink ) :
		
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		
		else :
		
			return $html;
		
		endif;
	
	}
	
	add_filter( 'wp_get_attachment_link', 'alhenalite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Excerpt */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_hide_excerpt_more')) {

	function alhenalite_hide_excerpt_more() {
		return '';
	}
	
	add_filter('the_content_more_link', 'alhenalite_hide_excerpt_more');
	add_filter('excerpt_more', 'alhenalite_hide_excerpt_more');
	
}

/*-----------------------------------------------------------------------------------*/
/* Customize excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('alhenalite_customize_excerpt_more')) {

	function alhenalite_customize_excerpt_more( $excerpt ) {
	
		global $post, $more;

		$allowed = array(
			'span' => array(
				'class' => array(),
			),
		);

		$more = 0;

		if ( $pos=strpos($post->post_content, '<!--more-->') && !has_excerpt( $post->ID )): 

			$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
		
		else:
		
			$content = $excerpt;

		endif;

		return $content. '<a class="read-more" href="'.get_permalink($post->ID).'" title="More"> <span class="button"> ' . esc_html__( "Read More", "alhena-lite") . ' </span> </a>';

	}
	
	add_filter( 'get_the_excerpt', 'alhenalite_customize_excerpt_more' );

}

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_remove_category_list_rel')) {

	function alhenalite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}
	
	add_filter('wp_list_categories', 'alhenalite_remove_category_list_rel');
	add_filter('the_category', 'alhenalite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_remove_thumbnail_dimensions')) {

	function alhenalite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'alhenalite_remove_thumbnail_dimensions', 10, 3 );
	
}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_embed_html')) {
	
	function alhenalite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'alhenalite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'alhenalite_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_my_gallery_style')) {

	function alhenalite_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'alhenalite_my_gallery_style', 99 );
	
}

/*-----------------------------------------------------------------------------------*/
/* Get Skin */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_getskins')) {

	function alhenalite_getskins($classes) {
	
		if (alhenalite_setting('wip_skins')) :
		
			$getskin = explode("_", alhenalite_setting('wip_skins'));
			$classes[] = $getskin[0];
			return $classes;
		
		else:
		
			$classes[] = "light";
			return $classes;
		
		endif;
	
	}
	
	add_filter('body_class','alhenalite_getskins');

}

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_post_class')) {

	function alhenalite_post_class($classes) {	

		$masonry  = 'post-container masonry-element col-md-4';
		$standard = 'post-container col-md-12';

		if ( alhenalite_is_woocommerce_active('is_cart') ) :
		
			$classes[] = 'woocommerce_cart_page';
				
		endif;

		if ( ( !alhenalite_is_single()) && ( is_home() ) ) {
			
			if ( ( !alhenalite_setting('wip_home')) || ( alhenalite_setting('wip_home') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( ( !alhenalite_is_single()) && ( alhenalite_get_archive_title() ) ) {
			
			if ( ( !alhenalite_setting('wip_category_layout')) || ( alhenalite_setting('wip_category_layout') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( ( !alhenalite_is_single()) && ( is_search() ) ) {
			
			if ( ( !alhenalite_setting('wip_search_layout')) || ( alhenalite_setting('wip_search_layout') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( alhenalite_is_single() && !alhenalite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		}
	
		return $classes;
		
	}
	
	add_filter('post_class', 'alhenalite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_template')) {

	function alhenalite_template($id) {
	
		$template = array ( 
		
			"full" => "col-md-12" , 
			"left-sidebar" => "col-md-8" , 
			"right-sidebar" => "col-md-8"
		
		);
	
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

		if ( alhenalite_is_woocommerce_active('is_woocommerce') && ( alhenalite_is_woocommerce_active('is_product_category') || alhenalite_is_woocommerce_active('is_product_tag') ) && alhenalite_setting('wip_woocommerce_category_layout') ) {
		
			$span = $template[alhenalite_setting('wip_woocommerce_category_layout')];
			$sidebar =  alhenalite_setting('wip_woocommerce_category_layout');

		} else if ( alhenalite_is_woocommerce_active('is_woocommerce') && is_search() && alhenalite_postmeta('wip_template') ) {
					
			$span = $template[alhenalite_postmeta('wip_template')];
			$sidebar =  alhenalite_postmeta('wip_template');
	
		} else if ( ( is_page() || is_single() || alhenalite_is_woocommerce_active('is_shop') ) && alhenalite_postmeta('wip_template') ) {
					
			$span = $template[alhenalite_postmeta('wip_template')];
			$sidebar =  alhenalite_postmeta('wip_template');

		} else if ( ! alhenalite_is_woocommerce_active('is_woocommerce') && ( is_category() || is_tag() || is_tax() || is_month() ) && alhenalite_setting('wip_category_layout') ) {

			$span = $template[alhenalite_setting('wip_category_layout')];
			$sidebar =  alhenalite_setting('wip_category_layout');
						
		} else if ( is_home() && alhenalite_setting('wip_home') ) {
					
			$span = $template[alhenalite_setting('wip_home')];
			$sidebar =  alhenalite_setting('wip_home');

		} else if ( ! alhenalite_is_woocommerce_active('is_woocommerce') && is_search() && alhenalite_setting('wip_search_layout') ) {

			$span = $template[alhenalite_setting('wip_search_layout')];
			$sidebar =  alhenalite_setting('wip_search_layout');
						
		}

		return esc_attr(${$id});
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhenalite_scripts_styles')) {

	function alhenalite_scripts_styles() {
	
		alhenalite_enqueue_style('/assets/css');

		wp_enqueue_style( 'alhenalite-style', get_stylesheet_uri(), array() );

		if ( ( get_theme_mod('wip_skin') ) && ( get_theme_mod('wip_skin') <> "light_blue" ) ):
	
			wp_enqueue_style( 'alhenalite ' . get_theme_mod('wip_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('wip_skin') . '.css' ); 
		
		endif;

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway:400,700,500,600,300,200,100,800,900|Roboto:400,700,400italic,500,500italic,300italic,300,100italic,100,700italic,900,900italic|Kristi&subset=latin,latin-ext' );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( "jquery-ui-core", array('jquery'));
		wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
		wp_enqueue_script( "masonry", array('jquery') );

		alhenalite_enqueue_script('/assets/js');

		wp_enqueue_script  ( 'alhenalite-html5', get_template_directory_uri().'/assets/scripts/html5.js');
		wp_script_add_data ( 'alhenalite-html5', 'conditional', 'IE 8' );
		
		wp_enqueue_script  ( 'alhenalite-selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr-min.js');
		wp_script_add_data ( 'alhenalite-selectivizr', 'conditional', 'IE 8' );

	}
	
	add_action( 'wp_enqueue_scripts', 'alhenalite_scripts_styles', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhenalite_setup')) {

	function alhenalite_setup() {

		if ( ! isset( $content_width ) ) :
		
			if ( ! alhenalite_setting('wip_screen3') ) :
			
				$content_width = 1170;
			
			else:
			
				$content_width = alhenalite_setting('wip_screen3');
			
			endif;
		
		endif;
		
		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );
		
		add_image_size( 'blog', 940,429, TRUE ); 
		
		register_nav_menu( 'main-menu', 'Main menu' );
	
		load_theme_textdomain("alhena-lite", get_template_directory() . '/languages');
		
		$require_array = array (
			"/core/classes/",
			"/core/admin/customize/",
			"/core/functions/",
			"/core/templates/",
			"/core/metaboxes/",
		);
		
		foreach ( $require_array as $require_file ) {	
		
			alhenalite_require($require_file);
		
		}
		
	}

	add_action( 'after_setup_theme', 'alhenalite_setup' );

}

?>