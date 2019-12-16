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

	do_action('alhena_lite_header_type'); 
	do_action('alhena_lite_thumbnail', 'blog', 'media-container'); 

?>

<div class="post-article">

	<?php 
		
		do_action('alhena_lite_before_content');
		the_content(); 
		
	?>

</div>