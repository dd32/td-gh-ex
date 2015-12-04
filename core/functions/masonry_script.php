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

if (!function_exists('alhenalite_masonry_script_function')) {

	function alhenalite_masonry_script_function() { ?>
	
		<script type="text/javascript">
	
			jQuery.noConflict()(function($){
						
				function wip_masonry() {
							
					if ( $(window).width() >= 992 ) {
	
						$('.row.masonry').imagesLoaded(function () {
	
							$('.row.masonry').masonry({
								itemSelector: '.masonry-element',
								isAnimated: true
							});
	
						});
		
					} 
								
					else {
								
						$('.row.masonry').masonry( 'destroy' );
		
					}
		
				}
						
				$(window).resize(function(){
					wip_masonry();
				});
							
				$(window).load(function($) {
					wip_masonry();
				});
					
			});
						
		</script>
		
<?php 
	
	} 
	
	add_action( 'alhenalite_masonry_script', 'alhenalite_masonry_script_function', 10, 2 );

}

?>