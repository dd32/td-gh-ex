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

if (!function_exists('alhenalite_post_info_function')) {
	
	function alhenalite_post_info_function() { 
	
		global $post;
		
?>

        <div class="entry-info">
           
             <span> <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>
          
             <?php if (alhenalite_setting('wip_view_comments') == "on" ): ?>
             
                <span> <i class="fa fa-comments-o"></i>
                    <?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.esc_html__( "No comments","alhena-lite").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.esc_html__( "comment","alhena-lite").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.esc_html__( "comments","alhena-lite").'</a>' ); ?>
                </span>
                
            <?php 
			
				endif;
				echo alhenalite_posticon(); 
				
			?>

			<?php if (alhenalite_setting('wip_view_author') == "on" ): ?>

				<span><i class="fa fa-user"></i><?php the_author(); ?></span>

			<?php endif; ?>

        </div>
	
<?php
	
	} 

	add_action( 'alhenalite_post_info', 'alhenalite_post_info_function', 10, 2 );

}

?>