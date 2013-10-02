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

function wip_after_content_function() {

	if ((is_home()) || (is_category()) || (is_page() )):
		
		the_excerpt(); 
	
	else:
	
		the_content();
		the_tags( '<footer class="post-tags"><div class="line"><span class="entry-info"><strong>Tags:</strong> ', ', ', '</span></div></footer>' );

		if (wip_setting('wip_view_social_buttons') == "on" ) :
			do_action('wip_social_buttons');
		endif;
		
		if (wip_setting('wip_view_comments') == "on" ) :
			comments_template();
		endif;
	
	endif;

} 

add_action( 'wip_after_content', 'wip_after_content_function', 10, 2 );

?>