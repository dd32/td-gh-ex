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

if (!function_exists('alhenalite_get_title_function')) {

	function alhenalite_get_title_function($type) {
		
		global $post;
		
		$title = get_the_title();
		
		if (!empty($title)) {
		
			if ( ( $type == "blog" ) || ( $type == "search" ) ) { 
				
				$html = '<header class="title"><div class="line"><h3 class="title"><a href=" ' . get_permalink($post->ID) . '"> ' . $title . '</a></h3></div></header>';
				
			} else if ( ( $type == "standard" ) || ( $type == "post" ) )  { 
			
				$html = '<header class="title"><div class="line"><h1 class="title">' . $title . '</h1></div></header>';

			}
		
			echo $html;
		
		}
		
	}
	
	add_action( 'alhenalite_get_title', 'alhenalite_get_title_function', 10, 2 );

}

?>