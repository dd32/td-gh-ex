<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function alhenalite_get_title() {
	
	global $post;
	
	if ( alhenalite_postmeta('wip_content_title') <> "off") { 

		if ((is_home()) || (is_category()) || (is_page() )): ?>
			
        <header class="title">
            <div class="line"><h1><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1></div>
        </header>
            
	<?php else: ?>
		
        <header class="title">
            <div class="line"><h1><?php the_title(); ?></h1></div>
        </header>
		
	<?php endif; 

	}
}

?>