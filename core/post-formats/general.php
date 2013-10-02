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

wip_thumbnail('blog','pin-container'); ?>
    
<article class="article">

	<?php wip_get_title(); ?>    
    
	<?php do_action('wip_after_content'); ?>

</article>