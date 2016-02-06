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

if (!function_exists('suevafree_before_content_function')) {

	function suevafree_before_content_function() {
		
		if ( ! suevafree_is_single() ) {

			do_action('suevafree_get_title', 'blog' ); 

		} else {

			if ( !suevafree_is_woocommerce_active('is_cart') ) :
			
				if ( suevafree_is_single() && !is_page_template() ) :

					do_action('suevafree_get_title','standard');
							
				else :
					
					do_action('suevafree_get_title','blog'); 
							 
				endif;
	
			endif;

		}
		
	} 
	
	add_action( 'suevafree_before_content', 'suevafree_before_content_function', 10, 2 );

}

?>