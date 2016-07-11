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

if (!function_exists('alhenalite_excerpt_function')) {

	function alhenalite_excerpt_function() {
	
		global $post,$more;
		
		$more = 0;
	
		if ($pos=strpos($post->post_content, '<!--more-->')): 
		
			$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
		
		else:
		
			$content = substr(apply_filters( 'the_excerpt', get_the_excerpt()), 0, -5);
		
		endif;

		echo $content. '<a class="read-more" href="'.get_permalink($post->ID).'" title="More"> <span class="button"> ' . __( "Read More","alhena-lite") . ' </span> </a>';

	}
	
	add_action( 'alhenalite_excerpt', 'alhenalite_excerpt_function', 10, 2 );

}

?>