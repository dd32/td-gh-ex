<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('alhena_lite_thumbnail_function')) {

	function alhena_lite_thumbnail_function ($id, $class = "" ) {
	
		if ( '' != get_the_post_thumbnail() ) :
	
			echo '<div class="'.$class.'">';
	
				the_post_thumbnail($id);
	
			echo '</div>';
	
		endif; 
	
	}

	add_action( 'alhena_lite_thumbnail', 'alhena_lite_thumbnail_function', 10, 2 );

}

?>