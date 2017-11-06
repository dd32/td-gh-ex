<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function novalite_before_content_function() { 

	global $post;

?>

    <div class="line"> 
    
        <div class="entry-info">
       
            <div class="entry-date"><strong> <?php esc_html_e( 'Posted on:','novalite'); ?> </strong> <?php echo get_the_date(); ?> <span class="sep">/</span> </div>
            
            <?php if  ( ( comments_open() ) && (novalite_setting('novalite_view_comments') == "on" ) ) : ?>
                <div class="entry-comments"> <strong><?php esc_html_e( 'Comments: ','novalite'); ?></strong>
                    <?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.esc_html__( "No comments","novalite").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.esc_html__( "comment","novalite").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.esc_html__( "comments","novalite").'</a>' ); ?>
                <span class="sep">/</span> </div> 
            <?php endif; ?>
            
            <div class="entry-standard"> 
            	<strong> <?php esc_html_e( 'Categories: ','novalite'); echo the_category(', '); ?> </strong>
            </div>

        </div>

    </div>
    
<?php

} 

add_action( 'novalite_before_content', 'novalite_before_content_function', 10, 2 );

?>