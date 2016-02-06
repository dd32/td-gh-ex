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

function suevafree_masonry_script_function() { ?>
					
	function suevafree_masonry() {

		if ( $(window).width() >= 992 ) {

			$('.masonry').imagesLoaded(function () {

				$('.masonry').masonry({
					itemSelector: '.masonry-item',
					isAnimated: true
				});

			});
	
		} else {

			$('.masonry').imagesLoaded(function () {

				$('.masonry').masonry( 'destroy' );

			});

		}
	
	}
					
	$(window).resize(function(){
		suevafree_masonry();
	});
						
	$(document).ready(function($){
		suevafree_masonry();
	});

<?php 

} 

add_action( 'suevafree_masonry_script', 'suevafree_masonry_script_function', 10, 2 );

?>