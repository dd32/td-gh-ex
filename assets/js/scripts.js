/*
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
* Get Viewport Dimensions
* returns object with viewport dimensions to match css in width and height properties
* (Source:http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript)
*/
	function updateViewportDimensions() {
		var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
		return { width:x,height:y }
	}
	// setting the viewport width
	var viewport = updateViewportDimensions();


/*
* Throttle Resize-triggered Events
* Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
* (source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
	var waitForFinalEvent = (function () {
		var timers = {};
		return function (callback, ms, uniqueId) {
			if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
			if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
			timers[uniqueId] = setTimeout(callback, ms);
		};
	})();

	// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
	var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
	function loadGravatars() {
		// set the viewport using the function above
		viewport = updateViewportDimensions();
		// if the viewport is tablet or larger, we load in the gravatars
		if (viewport.width >= 768) {
				jQuery('.comment img[data-gravatar]').each(function(){
					jQuery(this).attr('src',$(this).attr('data-gravatar'));
				});
			}
	} // end function


/*
 * Put all your regular jQuery in here.
*/
	jQuery(document).ready(function($) {

		/*
		* Let's fire off the gravatar function
		* You can remove this if you don't need it
		*/
		loadGravatars();
		
		/*
		* Back to Top
		* 
		*/
		// hide #back-top first
		$("#back-top").hide();

		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('#back-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
		
		/*
		* Sticky Element
		* 
		*/
		$('.my-sticky-element').waypoint('sticky');
		
		/*
		* WOW
		* 
		*/
		wow = new WOW(
			{
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true        // trigger animations on mobile devices (true is default)
			}
		);
		wow.init();
		
		// ******* Attention Seekers
		$('.bounce').addClass('animated bounce');
		$('.flash').addClass('animated flash');
		$('.pulse').addClass('animated pulse');
		$('.rubberBand').addClass('animated rubberBand');
		$('.shake').addClass('animated shake');
		$('.swing').addClass('animated swing');
		$('.tada').addClass('animated tada');
		$('.wobble').addClass('animated wobble');
		// ******* Bouncing Entrances
		$('.bounceIn').addClass('animated bounceIn');
		$('.bounceInDown').addClass('animated bounceInDown');
		$('.bounceInLeft').addClass('animated bounceInLeft');
		$('.bounceInRight').addClass('animated bounceInRight');
		$('.bounceInUp').addClass('animated bounceInUp');
		$('.bounceOut').addClass('animated bounceOut');
		$('.bounceOutDown').addClass('animated bounceOutDown');
		$('.bounceOutLeft').addClass('animated bounceOutLeft');
		$('.bounceOutRight').addClass('animated bounceOutRight');
		$('.bounceOutUp').addClass('animated bounceOutUp');
		// ******* Bouncing Exits
		$('.bounceOut').addClass('animated bounceOut');
		$('.bounceOutDown').addClass('animated bounceOutDown');
		$('.bounceOutLeft').addClass('animated bounceOutLeft');
		$('.bounceOutRight').addClass('animated bounceOutRight');
		$('.bounceOutUp').addClass('animated bounceOutUp');
		// ******* Fading Entrances
		$('.fadeIn').addClass('animated fadeIn');
		$('.fadeInDown').addClass('animated fadeInDown');
		$('.fadeInDownBig').addClass('animated fadeInDownBig');
		$('.fadeInLeft').addClass('animated fadeInLeft');
		$('.fadeInLeftBig').addClass('animated fadeInLeftBig');
		$('.fadeInRight').addClass('animated fadeInRight');
		$('.fadeInRightBig').addClass('animated fadeInRightBig');
		$('.fadeInUp').addClass('animated fadeInUp');
		$('.fadeInUpBig').addClass('animated fadeInUpBig');
		// ******* Fading Exits
		$('.fadeOut').addClass('animated fadeOut');
		$('.fadeOutDown').addClass('animated fadeOutDown');
		$('.fadeOutDownBig').addClass('animated fadeOutDownBig');
		$('.fadeOutLeft').addClass('animated fadeOutLeft');
		$('.fadeOutLeftBig').addClass('animated fadeOutLeftBig');
		$('.fadeOutRight').addClass('animated fadeOutRight');
		$('.fadeOutRightBig').addClass('animated fadeOutRightBig');
		$('.fadeOutUp').addClass('animated fadeOutUp');
		$('.fadeOutUpBig').addClass('animated fadeOutUpBig');
		// ******* Flippers
		$('.flip').addClass('animated flip');
		$('.flipInX').addClass('animated flipInX');
		$('.flipInY').addClass('animated flipInY');
		$('.flipOutX').addClass('animated flipOutX');
		$('.flipOutY').addClass('animated flipOutY');
		// ******* Lightspeed
		$('.lightSpeedIn').addClass('animated lightSpeedIn');
		$('.lightSpeedOut').addClass('animated lightSpeedOut');
		// ******* Rotating Entrances
		$('.rotateIn').addClass('animated rotateIn');
		$('.rotateInDownLeft').addClass('animated rotateInDownLeft');
		$('.rotateInDownRight').addClass('animated rotateInDownRight');
		$('.rotateInUpLeft').addClass('animated rotateInUpLeft');
		$('.rotateInUpRight').addClass('animated rotateInUpRight');
		// ******* Rotating Exits
		$('.rotateOut').addClass('animated rotateOut');
		$('.rotateOutDownLeft').addClass('animated rotateOutDownLeft');
		$('.rotateOutDownRight').addClass('animated rotateOutDownRight');
		$('.rotateOutUpLeft').addClass('animated rotateOutUpLeft');
		$('.rotateOutUpRight').addClass('animated rotateOutUpRight');
		// ******* Sliders
		$('.slideInDown').addClass('animated slideInDown');
		$('.slideInLeft').addClass('animated slideInLeft');
		$('.slideInRight').addClass('animated slideInRight');
		$('.slideOutLeft').addClass('animated slideOutLeft');
		$('.slideOutRight').addClass('animated slideOutRight');
		$('.slideOutUp').addClass('animated slideOutUp');
		// ******* Specials
		$('.hinge').addClass('animated hinge');
		$('.rollIn').addClass('animated rollIn');
		$('.rollOut').addClass('animated rollOut');
		
		// Animation On Hover
		function animationHover(element, animation){
		  element = $(element);
		  element.hover(
			function() {
			  element.addClass('animated ' + animation);
			},
			function(){
			  //wait for animation to finish before removing classes
			  window.setTimeout( function(){
				element.removeClass('animated ' + animation);
			  }, 2000);
			}
		  );
		};
		
		//Animate on Click function
		function animationClick(element, animation){
		  element = $(element);
		  element.click(
			function() {
			  element.addClass('animated ' + animation);
			  //wait for animation to finish before removing classes
			  window.setTimeout( function(){
				  element.removeClass('animated ' + animation);
			  }, 2000);
			}
		  );
		};
			
		$(document).ready(function(){
			$('#logo').each(function() {
				animationHover(this, 'fadeIn');
			});
		});
		$(document).ready(function(){
			$('id.menu').each(function() {
				animationHover(this, 'fadeIn');
			});
		});
			
		$(document).ready(function(){
			var touch = $('#touch-menu');
			var menu = $('.menu');
			 
			$(touch).on('click', function(e) {
			e.preventDefault();
			menu.slideToggle();
			});
			$(window).resize(function(){
			var w = $(window).width();
			if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
			}
			});
		});
	

	}); /* end of as page load scripts */



		
	
	