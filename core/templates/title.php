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

function wip_get_title() {
	
	global $post;
	
	if ( wip_postmeta('wip_content_title') <> "off"):
	
?>

    <header class="title">
        <div class="line"><h1><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1></div>
	</header>

<?php

	endif;

}

?>