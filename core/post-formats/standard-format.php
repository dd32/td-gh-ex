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

do_action('alhenalite_thumbnail', 'blog', 'media-container'); ?>
        
<div class="post-article">

	<?php 
	
		do_action('alhenalite_before_content');
		do_action('alhenalite_post_info');
		do_action('alhenalite_after_content'); 
		
	?>

</div>