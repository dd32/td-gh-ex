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

function wip_footer_content_function() { 

	if ( ( wip_postmeta('wip_footer_sidebar') <> "none" ) && ( is_active_sidebar(wip_postmeta('wip_footer_sidebar')) ) ) : ?>
	
    <!-- FOOTER WIDGET -->
    
    <section id="footer-box" >
        <div class="container">
            <div class="row">
            
                <?php dynamic_sidebar(wip_postmeta('wip_footer_sidebar')); ?>
                
            </div>
        </div>
    </section>
    
    <!-- END FOOTER WIDGET -->

<?php 

	endif;

} 

add_action( 'wip_footer_content', 'wip_footer_content_function', 10, 2 );

?>