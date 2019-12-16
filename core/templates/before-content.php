<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('alhena_lite_before_content_function')) {

	function alhena_lite_before_content_function() {

		if ( ! alhena_lite_is_single() ) {

			do_action('alhena_lite_get_title', 'blog' ); 

		} else {

			if ( !alhena_lite_postmeta('wip_view_title') || alhena_lite_postmeta('wip_view_title') == "on" ) :

				if ( !alhena_lite_is_woocommerce_active('is_cart') ) :
	
					if ( alhena_lite_is_single() && !is_page_template() ) :
							 
						do_action('alhena_lite_get_title','post');
							
					else :
					
						do_action('alhena_lite_get_title','blog'); 
							 
					endif;
	
				endif;

			endif;

		}
		
	} 
	
	add_action( 'alhena_lite_before_content', 'alhena_lite_before_content_function', 10, 2 );

}

?>