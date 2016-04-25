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

	if ( ! suevafree_is_single() ) :
	
		do_action('suevafree_thumbnail', 'blog', 'overlay'); 
	
	else :

		do_action('suevafree_thumbnail','blog'); 
	
?>

    <div class="post-article">
    
        <?php 
        
            do_action('suevafree_before_content');
            do_action('suevafree_post_info');
            do_action('suevafree_after_content');
            
        ?>
    
    </div>

<?php 

	endif; 

?>