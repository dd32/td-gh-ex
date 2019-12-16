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

if (!function_exists('alhena_lite_after_content_function')) {

	function alhena_lite_after_content_function( $type = "" ) {
	
		if ( ! alhena_lite_is_single() ) :
			
			the_excerpt(); 
	
		else: 
			
			if ( $type == "post" ) {
	
				echo '<div class="line"><div class="post-info">'; 
	
					echo '<span class="genericon genericon-time"></span>' . get_the_date(); 
					
					echo '<span class="genericon genericon-category"></span>'; the_category(', ');
					
					the_tags( '<span class="genericon genericon-tag"></span>' , ', ');
					
				echo '</div></div>';
		
			} 
		
			the_content();

			if ( alhena_lite_setting('wip_view_comments') == "on" ) :
				
				comments_template();
			
			endif;

			echo '<div class="clear"></div>';

		endif;
		 
	} 
	
	add_action( 'alhena_lite_after_content', 'alhena_lite_after_content_function', 10, 2 );

}

?>