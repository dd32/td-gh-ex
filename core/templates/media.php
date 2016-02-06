<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_thumbnail_function')) {

	function suevafree_thumbnail_function ($id ) {
	
		if ( '' != get_the_post_thumbnail() ) :
	
			echo '<div class="pin-container">';
	
				the_post_thumbnail($id);
	
			echo '</div>';
	
		endif; 
	
	}

	add_action( 'suevafree_thumbnail', 'suevafree_thumbnail_function', 10, 2 );

}

?>