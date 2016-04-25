<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_postformat_function')) {
	
	function suevafree_postformat_function() {
	
		if ( get_post_type( get_the_ID()) == "page" ) {
				
			$postformats = "page";
			
		} else if ( get_post_type( get_the_ID()) == "product" ) {
			
			$postformats = "product";
			
		} else if ( get_post_format() == "image" ) {
		
			$postformats = "image";
		
		}

		else {
		
			$postformats = "standard";
		
		}
						
		get_template_part( 'core/post-formats/' . $postformats );
	
	}
	
	add_action( 'suevafree_postformat','suevafree_postformat_function', 10, 2 );
	
}

?>