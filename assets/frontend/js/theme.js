/**
 * Acoustics Theme Scripts
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */
(function($) {

	var productSlider = {
	    init: function(){
			$('.products-grid').each(function( index ) {
				var data = $(this).parents('.section-products').attr('type');
				$(this).owlCarousel({
					loop:true,
				    margin:0,
					lazyLoad: true,
				    responsiveClass:true,
					dots: false,
					navContainer: '.owl-nav-'+data,
					navText: [$('.owl-next-'+data),$('.owl-prev-'+data)],
				    responsive:{
				        0:{
				            items:1,
				            nav:true,
							autoplay:true,
						    autoplayTimeout:2000,
						    autoplayHoverPause:true
				        },
				        600:{
				            items:3,
				            nav:true,
							autoplay:true,
						    autoplayTimeout:2000,
						    autoplayHoverPause:true
				        },
				        1000:{
				            items:4,
				            nav:true,
				            loop:false
				        }
				    }
				});
			});
	    }
	};

    productSlider.init();

})( window.jQuery );
