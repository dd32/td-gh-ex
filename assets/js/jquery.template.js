jQuery.noConflict()(function($){

/* ===============================================
   HEADER CART
   ============================================= */
	
	$('section.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);

/* ===============================================
   Footer
   =============================================== */

	function suevafree_footer() {
	
		var footer_h = $('#footer').innerHeight();
		$('#footer').css({'height': footer_h + 5 });
		$('#wrapper').css({'padding-bottom': footer_h + 5 });
	
	}
	
	$( document ).ready(suevafree_footer);
	$( window ).resize(suevafree_footer);
	
/* ===============================================
   Main menu
   =============================================== */

	$('nav#mainmenu li').hover(
			function () {
				$(this).children('ul').stop(true, true).fadeIn(100);
	 
			}, 
			function () {
				$(this).children('ul').stop(true, true).fadeOut(400);		
			}
			
	
	);

/* ===============================================
   Mobile menu
   =============================================== */

	$('nav#mainmenu').mobileMenu();

/* ===============================================
   Socials
   =============================================== */

	$('a.social').tipsy({fade:true, gravity:'s'});

/* ===============================================
   Prettyphoto
   =============================================== */

	$("a[data-rel^='prettyPhoto']").prettyPhoto({
				// Parameters for PrettyPhoto styling
				animationSpeed:'fast',
				slideshow:5000,
				theme:'pp_default',
				show_title:false,
				overlay_gallery: false,
				social_tools: false
	});
	
/* ===============================================
   Scroll to Top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			
			$('#back-to-top').fadeIn(500);
			
			} else {
			
			$('#back-to-top').fadeOut(500);
		}
		
	});

	$('#back-to-top').click(function(){
		$.scrollTo(0,'slow');
		return false;
	});
	
/* ===============================================
   Masonry
   =============================================== */

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
						
	$(document).ready(function(){
		suevafree_masonry();
	});

/* ===============================================
   Overlay
   =============================================== */

	$('.overlay-image').hover(function(){
		
		var imgwidth = $(this).children('img').width();
		var imgheight = $(this).children('img').height();
		$(this).children('.zoom').css({'width':imgwidth,'height':imgheight});	
		$(this).children('.link').css({'width':imgwidth,'height':imgheight});
		$(this).css({'width':imgwidth+10});		
		
		$('.overlay',this).animate({ opacity : 0.6 },{queue:false});
		}, 
		function() {
		$('.overlay',this).animate({ opacity: 0.0 },{queue:false});
	
	});
	
});          