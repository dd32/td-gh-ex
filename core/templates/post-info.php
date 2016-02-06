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

if (!function_exists('suevafree_post_info_function')) {
	
	function suevafree_post_info_function() { ?>

        <div class="line"> 
    
            <div class="entry-info">
           
                <span class="entry-date"><i class="fa fa-clock-o" ></i><?php echo get_the_date(); ?></span>
                
                <?php if (comments_open()): ?>
                
                    <span class="entry-comments">
                        
                        <i class="fa fa-comments-o" ></i>
                        <?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.__( "No comments","suevafree").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.__( "comment","suevafree").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.__( "comments","suevafree").'</a>' ); ?>
                    
                    </span>
                
                <?php endif; ?>
                
                <?php echo suevafree_posticon(); ?>
                
                <?php if (suevafree_setting('suevafree_view_author') == "on" ) : ?>
    
                    <span class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></span>
    
                <?php endif; ?>
                
            </div>
        
        </div>
	
<?php
	
	} 

	add_action( 'suevafree_post_info', 'suevafree_post_info_function', 10, 2 );

}

?>