<?php

if (!function_exists('bazaarlite_breadcrumb')) {

	function bazaarlite_breadcrumb() {
		
		global $s;
	
		echo '<ul id="breadcrumb">';
		
		if ( !bazaarlite_is_woocommerce_active('is_woocommerce') ) {
			
			echo '<li><a href="' . home_url() . '">' . __("Home","bazaar-lite") . "</a></li> / ";
			
			if ( is_category() ) {
				
				echo '<li>' . bazaarlite_get_archive_title(). '</li>';

			} elseif (is_single() && !is_attachment()) {
				
				echo "<li>" . the_category(' </li> / <li> ') . '</li> / <li> ' . get_the_title() . '</li>';
	
			} elseif (is_page()) {
				
				echo "<li>" . get_the_title() . '</li>';
	
			} else if ( bazaarlite_get_archive_title()) {
			
				echo "<li>" . bazaarlite_get_archive_title() . "</li>";
			
			} else if ( is_search() ) {

				echo "<li>" . __( '<span>Search </span> results for ', 'bazaar-lite' ) . $s . "</li>";
			
			} else if ( is_404() ) {

				echo "<li>" . __( 'Page 404', 'bazaar-lite' ) . $s . "</li>";
			
			} else if ( is_attachment() ) {

				echo "<li>" . __( 'Attachment: ', 'bazaar-lite' ) . get_the_title() . "</li>";
			
			} 
	
		} else if ( bazaarlite_is_woocommerce_active('is_woocommerce') ) {
	
			woocommerce_breadcrumb(
				array(
					'wrap_before' => '',
					'wrap_after'  => '',
					'before'      => '<li>',
					'after'       => '</li>',
				)
			);
	
		}
		
		echo '</ul>';
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* READ MORE */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_readmore_function')) {

	function bazaarlite_readmore_function() {
		
		global $post,$more;
		
		$more = 0;
	
		$class = 'button';
		$button = __('Read more','bazaar-lite');

		if ( bazaarlite_setting('wip_readmore_button') == "off" ): 
	
			$class = 'more';
			$button = ' [...] ';
		
		endif;
	
		if ($pos=strpos($post->post_content, '<!--more-->')): 
		
			$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
		
		else:
		
			$content = substr(apply_filters( 'the_excerpt', get_the_excerpt()), 0, -5);
		
		endif;
		
		$html = $content. '<a class="'.$class.'" href="'.get_permalink($post->ID).'" title="More">'.$button.'</a>';
		
		return $html;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_posticon')) {

	function bazaarlite_posticon( $view = "off" ) {
	
		$icons = array (
				
			"video" => "genericon-video" , 
			"gallery" => "genericon-image" , 
			"audio" => "genericon-audio" , 
			"chat" => "genericon-chat", 
			"status" => "genericon-status", 
			"image" => "genericon-picture", 
			"quote" => "genericon-quote" , 
			"link" => "genericon-external", 
			"aside" => "genericon-aside"
			
		);
		
		if (get_post_format()) : 
			
			$icon = '<span class="genericon '.$icons[get_post_format()].'"></span>'; 
			
		else:
			
			$icon = '<span class="genericon genericon-standard"></span>'; 
			
		endif;

		if ( $view == "on" ):
		
			return $icon;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* LOGIN AREA */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_custom_login_logo')) {
	
	function bazaarlite_custom_login_logo() { 
	
		if ( bazaarlite_setting('wip_login_logo') ) : ?>
	
			<style type="text/css">
				
				body.login div#login h1 a {
					background-image: url('<?php echo bazaarlite_setting('wip_login_logo'); ?>');
					-webkit-background-size: inherit;
					background-size: inherit ;
					width:100%;
					height:<?php echo bazaarlite_setting('wip_login_logo_height'); ?>px;
				}
				
			</style>
		
<?php 
	
		endif;
	
	}
	
	add_action( 'login_enqueue_scripts', 'bazaarlite_custom_login_logo' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_template')) {

	function bazaarlite_template($id) {
	
		$template = array ( 
		
			"full" => "col-md-12" , 
			"left-sidebar" => "col-md-8" , 
			"right-sidebar" => "col-md-8",
			"masonry" => "col-md-4"
		
		);
	
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

		if ( bazaarlite_is_woocommerce_active('is_woocommerce') && ( bazaarlite_is_woocommerce_active('is_product_category') || bazaarlite_is_woocommerce_active('is_product_tag') ) && bazaarlite_setting('wip_woocommerce_category_layout') ) {
		
			$span = $template[bazaarlite_setting('wip_woocommerce_category_layout')];
			$sidebar =  bazaarlite_setting('wip_woocommerce_category_layout');

		} else if ( bazaarlite_is_woocommerce_active('is_woocommerce') && is_search() && bazaarlite_postmeta('wip_template') ) {
					
			$span = $template[bazaarlite_postmeta('wip_template')];
			$sidebar =  bazaarlite_postmeta('wip_template');
	
		} else if ( ( is_page() || is_single() || bazaarlite_is_woocommerce_active('is_shop') ) && bazaarlite_postmeta('wip_template') ) {
					
			$span = $template[bazaarlite_postmeta('wip_template')];
			$sidebar =  bazaarlite_postmeta('wip_template');

		} else if ( !bazaarlite_is_woocommerce_active('is_woocommerce') && ( is_category() || is_tag() || is_tax() || is_month() ) && bazaarlite_setting('wip_category_layout') ) {

			$span = $template[bazaarlite_setting('wip_category_layout')];
			$sidebar =  bazaarlite_setting('wip_category_layout');
						
		} else if ( is_home() && bazaarlite_setting('wip_home') ) {
					
			$span = $template[bazaarlite_setting('wip_home')];
			$sidebar =  bazaarlite_setting('wip_home');

		} else if ( ! bazaarlite_is_woocommerce_active('is_woocommerce') && is_search() && bazaarlite_setting('wip_search_layout') ) {

			$span = $template[bazaarlite_setting('wip_search_layout')];
			$sidebar =  bazaarlite_setting('wip_search_layout');
						
		}

		return ${$id};
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_prettyPhoto')) {

	function bazaarlite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a rel="prettyPhoto" ', $html );
		else
			return $html;
	
	}
	
	add_filter( 'wp_get_attachment_link', 'bazaarlite_prettyPhoto', 10, 6);
	
}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('bazaarlite_remove_category_list_rel')) {

	function bazaarlite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}
	
	add_filter('wp_list_categories', 'bazaarlite_remove_category_list_rel');
	add_filter('the_category', 'bazaarlite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_remove_thumbnail_dimensions')) {

	function bazaarlite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
	
	add_filter( 'post_thumbnail_html', 'bazaarlite_remove_thumbnail_dimensions', 10, 3 );

}

/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('bazaarlite_my_gallery_style')) {

	function bazaarlite_my_gallery_style() {
		return "<div class='gallery'>";
	}
	
	add_filter( 'gallery_style', 'bazaarlite_my_gallery_style', 99 );
	
}


?>