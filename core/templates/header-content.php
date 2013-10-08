<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function alhenalite_header_content_function() { 

	if ( alhenalite_postmeta('wip_slogan') ) : ?>
	
	<!-- START SLOGAN  -->
	
	<section id="slogan" >
		<div class="container">
			<div class="row">
				<div class="span12">
					<p> <?php echo alhenalite_postmeta('wip_slogan'); ?> </p>
				</div>
			</div>
		</div>
	</section>
	
	<!-- END SLOGAN -->
	
<?php
	
	endif;

	if ( ( alhenalite_postmeta('wip_top_sidebar')) && ( alhenalite_postmeta('wip_top_sidebar') <> "none" )) :  ?>
    
	<!-- TOP WIDGET -->

	<section id="top-box" >
		<div class="container">
			<div class="row">

			<?php if ( is_active_sidebar(alhenalite_postmeta('wip_top_sidebar'))) { 
            
				dynamic_sidebar(alhenalite_postmeta('wip_top_sidebar'));
            
            } else { 
                
                the_widget( 'WP_Widget_Archives','',
				array('before_widget' => '<div class="' . alhenalite_layout('wip_top_sidebar_area') . '"><div class="widget-box">',
					  'after_widget'  => '</div></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Calendar',
				array("title"=> __('Calendar')),
				array('before_widget' => '<div class="' . alhenalite_layout('wip_top_sidebar_area') . '"><div class="widget-box">',
					  'after_widget'  => '</div></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));

                the_widget( 'WP_Widget_Categories','',
				array('before_widget' => '<div class="' . alhenalite_layout('wip_top_sidebar_area') . '"><div class="widget-box">',
					  'after_widget'  => '</div></div>',
					  'before_title'  => '<header class="title"><div class="line"><h3>',
					  'after_title'   => '</h3></div></header>'
				));
            
             } 
			 
			 ?>

			</div>
		</div>
	</section>

	<!--  END TOP WIDGET -->

<?php endif;

} 

add_action( 'alhenalite_header_content', 'alhenalite_header_content_function', 10, 2 );

?>