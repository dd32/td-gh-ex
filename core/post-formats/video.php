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
    
    <div class="entry-info">
       
         <span class="entry-date"><i class="icon-time" ></i><?php echo get_the_date(); ?></span>
      
         <?php if (wip_setting('wip_view_comments') == "on" ): ?>
         
             <span class="entry-comments"><i class="icon-comments-alt" ></i> <?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.__( "No comments","wip").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.__( "comment","wip").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.__( "comments","wip").'</a>' ); ?> 
             </span>
            
        <?php endif; ?>
        
        <span class="entry-standard"><i class="icon-film"></i>Video</span>
        
    </div>

	<?php do_action('wip_after_content'); ?>

</article>