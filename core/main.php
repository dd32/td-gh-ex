<?php

/**
 * Wp in Progress
 * 
 * @theme Alhena
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */
 
define( 'ALHENA_LITE_MIN_PHP_VERSION', '5.3' );

/*-----------------------------------------------------------------------------------*/
/* Switches back to the previous theme if the minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhena_lite_check_php_version' ) ) {

	function alhena_lite_check_php_version() {
	
		if ( version_compare( PHP_VERSION, ALHENA_LITE_MIN_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'alhena_lite_min_php_not_met_notice' );
			switch_theme( get_option( 'theme_switched' ));
			return false;
	
		};
	}

	add_action( 'after_switch_theme', 'alhena_lite_check_php_version' );

}

/*-----------------------------------------------------------------------------------*/
/* An error notice that can be displayed if the Minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'alhena_lite_min_php_not_met_notice' ) ) {

	function alhena_lite_min_php_not_met_notice() {
		?>
		<div class="notice notice-error is_dismissable">
			<p>
				<?php esc_html_e('You need to update your PHP version to run this theme.', 'alhena-lite' ); ?><br />
				<?php
				printf(
					esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'alhena-lite' ),
					PHP_VERSION,
					ALHENA_LITE_MIN_PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_setting')) {

	function alhena_lite_setting($id) {

		$alhena_lite_setting = get_theme_mod($id);
			
		if ( isset($alhena_lite_setting))
			
			return $alhena_lite_setting;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_postmeta')) {

	function alhena_lite_postmeta($id) {

		global $post, $wp_query;
		
		$content_ID = $post->ID;
	
		if( alhena_lite_is_woocommerce_active('is_shop') ) {
	
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

if ( ! function_exists( 'alhena_lite_is_woocommerce_active' ) ) {
	
	function alhena_lite_is_woocommerce_active( $type = "" ) {
	
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

if (!function_exists('alhena_lite_get_archive_title')) {

	function alhena_lite_get_archive_title() {
		
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

if (!function_exists('alhena_lite_is_single')) {

	function alhena_lite_is_single() {
		
		if ( is_single() || is_page() ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_posticon')) {

	function alhena_lite_posticon() {
	
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

if (!function_exists('alhena_lite_add_menuclass')) {

	function alhena_lite_add_menuclass( $ulclass ) {
		
		return preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	
	}
	
	add_filter( 'wp_page_menu', 'alhena_lite_add_menuclass' );
	
}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhena_lite_prettyPhoto')) {

	function alhena_lite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink ) :
		
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		
		else :
		
			return $html;
		
		endif;
	
	}
	
	add_filter( 'wp_get_attachment_link', 'alhena_lite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Excerpt */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhena_lite_hide_excerpt_more')) {

	function alhena_lite_hide_excerpt_more() {
		return '';
	}
	
	add_filter('the_content_more_link', 'alhena_lite_hide_excerpt_more');
	add_filter('excerpt_more', 'alhena_lite_hide_excerpt_more');
	
}

/*-----------------------------------------------------------------------------------*/
/* Customize excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('alhena_lite_customize_excerpt_more')) {

	function alhena_lite_customize_excerpt_more( $excerpt ) {
	
		global $post, $more;

		$allowed = array(
			'span' => array(
				'class' => array(),
			),
		);

		$more = 0;

		if ( 
			( $pos=strpos($post->post_content, '<!--more-->') ) && 
			!has_excerpt($post->ID)
		): 
			
			$content = apply_filters( 'the_content', get_the_content());
		
		else:
			
			$content = $excerpt;
	
		endif;

		return $content. '<a class="read-more" href="'.esc_url(get_permalink($post->ID)).'" title="More"> <span class="button"> ' . esc_html__( "Read More", "alhena-lite") . '</span></a>';

	}
	
	add_filter( 'get_the_excerpt', 'alhena_lite_customize_excerpt_more' );

}

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhena_lite_remove_category_list_rel')) {

	function alhena_lite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}
	
	add_filter('wp_list_categories', 'alhena_lite_remove_category_list_rel');
	add_filter('the_category', 'alhena_lite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_remove_thumbnail_dimensions')) {

	function alhena_lite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'alhena_lite_remove_thumbnail_dimensions', 10, 3 );
	
}

/*-----------------------------------------------------------------------------------*/
/* ALLOWED PROTOCOLS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_kses_allowed_protocols')) {

	function alhena_lite_kses_allowed_protocols($protocols) {
		
		$protocols[] = 'skype';
		return $protocols;
	
	}

	add_filter( 'kses_allowed_protocols', 'alhena_lite_kses_allowed_protocols');

}

/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_embed_html')) {
	
	function alhena_lite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'alhena_lite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'alhena_lite_embed_html' );
	
}

/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_my_gallery_style')) {

	function alhena_lite_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'alhena_lite_my_gallery_style', 99 );
	
}

/*-----------------------------------------------------------------------------------*/
/* Get Skin */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_getskins')) {

	function alhena_lite_getskins($classes) {

		$classes[] = 'custombody';

		if (alhena_lite_setting('wip_skins')) :
		
			$getskin = explode("_", alhena_lite_setting('wip_skins'));
			$classes[] = $getskin[0];
			return $classes;
		
		else:
		
			$classes[] = "light";
			return $classes;
		
		endif;
	
	}
	
	add_filter('body_class','alhena_lite_getskins');

}

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhena_lite_post_class')) {

	function alhena_lite_post_class($classes) {	

		$masonry  = 'post-container masonry-element col-md-4';
		$standard = 'post-container col-md-12';

		if ( alhena_lite_is_woocommerce_active('is_cart') ) :
		
			$classes[] = 'woocommerce_cart_page';
				
		endif;

		if ( ( !alhena_lite_is_single()) && ( is_home() ) ) {
			
			if ( ( !alhena_lite_setting('wip_home')) || ( alhena_lite_setting('wip_home') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( ( !alhena_lite_is_single()) && ( alhena_lite_get_archive_title() ) ) {
			
			if ( ( !alhena_lite_setting('wip_category_layout')) || ( alhena_lite_setting('wip_category_layout') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( ( !alhena_lite_is_single()) && ( is_search() ) ) {
			
			if ( ( !alhena_lite_setting('wip_search_layout')) || ( alhena_lite_setting('wip_search_layout') == "masonry" ) ) {

				$classes[] = $masonry;

			} else {

				$classes[] = $standard;

			}
			
		} else if ( alhena_lite_is_single() && !alhena_lite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		}
	
		return $classes;
		
	}
	
	add_filter('post_class', 'alhena_lite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_template')) {

	function alhena_lite_template($id) {
	
		$template = array ( 
		
			"full" => "col-md-12" , 
			"left-sidebar" => "col-md-8" , 
			"right-sidebar" => "col-md-8"
		
		);
	
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

		if ( alhena_lite_is_woocommerce_active('is_woocommerce') && ( alhena_lite_is_woocommerce_active('is_product_category') || alhena_lite_is_woocommerce_active('is_product_tag') ) && alhena_lite_setting('wip_woocommerce_category_layout') ) {
		
			$span = $template[alhena_lite_setting('wip_woocommerce_category_layout')];
			$sidebar =  alhena_lite_setting('wip_woocommerce_category_layout');

		} else if ( alhena_lite_is_woocommerce_active('is_woocommerce') && is_search() && alhena_lite_postmeta('wip_template') ) {
					
			$span = $template[alhena_lite_postmeta('wip_template')];
			$sidebar =  alhena_lite_postmeta('wip_template');
	
		} else if ( ( is_page() || is_single() || alhena_lite_is_woocommerce_active('is_shop') ) && alhena_lite_postmeta('wip_template') ) {
					
			$span = $template[alhena_lite_postmeta('wip_template')];
			$sidebar =  alhena_lite_postmeta('wip_template');

		} else if ( ! alhena_lite_is_woocommerce_active('is_woocommerce') && ( is_category() || is_tag() || is_tax() || is_month() ) && alhena_lite_setting('wip_category_layout') ) {

			$span = $template[alhena_lite_setting('wip_category_layout')];
			$sidebar =  alhena_lite_setting('wip_category_layout');
						
		} else if ( is_home() && alhena_lite_setting('wip_home') ) {
					
			$span = $template[alhena_lite_setting('wip_home')];
			$sidebar =  alhena_lite_setting('wip_home');

		} else if ( ! alhena_lite_is_woocommerce_active('is_woocommerce') && is_search() && alhena_lite_setting('wip_search_layout') ) {

			$span = $template[alhena_lite_setting('wip_search_layout')];
			$sidebar =  alhena_lite_setting('wip_search_layout');
						
		}

		return esc_attr(${$id});
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_scripts_styles')) {

	function alhena_lite_scripts_styles() {

		wp_enqueue_style( 'alhenalite', get_stylesheet_uri(), array() );

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Raleway:400,700,500,600,300,200,100,800,900|Roboto:400,700,400italic,500,500italic,300italic,300,100italic,100,700italic,900,900italic|Kristi'),
			'subset' =>	'latin,latin-ext'
		);

		wp_enqueue_style('google-fonts', add_query_arg ($googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '3.3.7' );
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0' );
		wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '3.1.6' );
		wp_enqueue_style('alhena-lite-template', get_template_directory_uri() . '/assets/css/template.css', array(), '1.0.0' );
		wp_enqueue_style('alhena-lite-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '1.0.0' );

		if ( get_theme_mod('wip_skin') && get_theme_mod('wip_skin') <> 'light_blue' ):
	
			wp_enqueue_style(
				'alhenalite ' . get_theme_mod('wip_skin'),
				get_template_directory_uri() . '/assets/skins/' . get_theme_mod('wip_skin') . '.css'
			); 
		
		endif;

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), '1.3', TRUE ); 
		wp_enqueue_script( 'jquery-tinynav', get_template_directory_uri() . '/assets/js/jquery.tinynav.js' , array('jquery'), '1.1', TRUE ); 
		wp_enqueue_script( 'jquery-tipsy', get_template_directory_uri() . '/assets/js/jquery.tipsy.js' , array('jquery'), '1.0.0a', TRUE ); 
		wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/assets/js/prettyPhoto.js' , array('jquery'), '3.1.4', TRUE ); 
		wp_enqueue_script( 'alhena-lite-template',get_template_directory_uri() . '/assets/js/template.js',array('jquery', 'imagesloaded', 'masonry'), '1.0.0', TRUE ); 

		wp_enqueue_script('html5shiv', get_template_directory_uri().'/assets/scripts/html5shiv.js', FALSE, '3.7.3');
		wp_script_add_data('html5shiv', 'conditional', 'IE 8' );
		wp_enqueue_script('selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr.js', FALSE, '1.0.3b');
		wp_script_add_data('selectivizr', 'conditional', 'IE 8' );

	}
	
	add_action( 'wp_enqueue_scripts', 'alhena_lite_scripts_styles', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('alhena_lite_setup')) {

	function alhena_lite_setup() {

		if ( ! isset( $content_width ) ) :
		
			if ( ! alhena_lite_setting('wip_screen3') ) :
			
				$content_width = 1170;
			
			else:
			
				$content_width = alhena_lite_setting('wip_screen3');
			
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
		
		require_once( trailingslashit( get_template_directory() ) . '/core/classes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/classes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/classes/class-notice.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/classes/class-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/masonry_script.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/required_plugins.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/style.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/woocommerce.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/general.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/header-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-info.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/page.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/post.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/product.php' );

	}

	add_action( 'after_setup_theme', 'alhena_lite_setup' );

}

?>