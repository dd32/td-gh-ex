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

function wip_header_content_function() { 

	if ( wip_postmeta('wip_slogan') ) : ?>
	
	<!-- START SLOGAN  -->
	
	<section id="slogan" >
		<div class="container">
			<div class="row">
				<div class="span12">
					<p> <?php echo wip_postmeta('wip_slogan'); ?> </p>
				</div>
			</div>
		</div>
	</section>
	
	<!-- END SLOGAN -->
	
<?php
	
	endif;

	if ( ( wip_postmeta('wip_top_sidebar') <> "none" ) && ( is_active_sidebar(wip_postmeta('wip_top_sidebar')) ) ) : ?>
	
	<!-- TOP WIDGET -->
	
	<section id="top-box" >
		<div class="container">
			<div class="row">
	
				<?php dynamic_sidebar(wip_postmeta('wip_top_sidebar')); ?>

			</div>
		</div>
	</section>
	
	<!--  END TOP WIDGET -->

<?php 

	endif;
	
} 

add_action( 'wip_header_content', 'wip_header_content_function', 10, 2 );

?>