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

if (!function_exists('alhenalite_before_content_function')) {

	function alhenalite_before_content_function() {

		if ( ! alhenalite_is_single() ) {

			do_action('alhenalite_get_title', 'blog' ); 

		} else {

			if ( !alhenalite_postmeta('wip_view_title') || alhenalite_postmeta('wip_view_title') == "on" ) :

				if ( !alhenalite_is_woocommerce_active('is_cart') ) :
	
					if ( alhenalite_is_single() && !is_page_template() ) :
							 
						do_action('alhenalite_get_title','post');
							
					else :
					
						do_action('alhenalite_get_title','blog'); 
							 
					endif;
	
				endif;

			endif;

		}
		
	} 
	
	add_action( 'alhenalite_before_content', 'alhenalite_before_content_function', 10, 2 );

}

?>