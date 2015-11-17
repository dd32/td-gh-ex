<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('bazaarlite_excerpt_function')) {

	function bazaarlite_excerpt_function() {

		echo bazaarlite_readmore_function();
		
	}

	add_action( 'bazaarlite_excerpt', 'bazaarlite_excerpt_function', 10, 2 );

}

?>