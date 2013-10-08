<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function alhenalite_footer_content_function() { 

	if ( ( alhenalite_postmeta('wip_footer_sidebar')) && ( alhenalite_postmeta('wip_footer_sidebar') <> "none" )) :  ?>

    <!-- FOOTER WIDGET -->

    <section id="footer-box" >
        <div class="container">
            <div class="row">

			<?php if ( is_active_sidebar(alhenalite_postmeta('wip_footer_sidebar'))) { 
            
				dynamic_sidebar(alhenalite_postmeta('wip_footer_sidebar'));
            
            } else { 
                
                the_widget( 'WP_Widget_Archives','',
				array('before_widget' => '<div class="pin-article ' . alhenalite_layout('wip_footer_sidebar_area') . '"><article class="article">',
					  'after_widget'  => '</article></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
		              'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Calendar',
				array("title"=> __('Calendar')),
				array('before_widget' => '<div class="pin-article ' . alhenalite_layout('wip_footer_sidebar_area') . '"><article class="article">',
					  'after_widget'  => '</article></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
		              'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Categories','',
				array('before_widget' => '<div class="pin-article ' . alhenalite_layout('wip_footer_sidebar_area') . '"><article class="article">',
					  'after_widget'  => '</article></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
		              'after_title'   => '</h3></div></header>'
				));
            
             } 
			 
			 ?>

            </div>
        </div>
    </section>

	<!--  END FOOTER WIDGET -->

<?php endif;

} 

add_action( 'alhenalite_footer_content', 'alhenalite_footer_content_function', 10, 2 );

?>