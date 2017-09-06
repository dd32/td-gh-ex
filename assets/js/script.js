(function ($) {
	"use strict";

	var $window = $(window),
	        $body = $('body');

	/*=============================
	        Menu - Toggle button
	==============================*/

	$(".toggle-btn").on("click", function () {
	    $(this).toggleClass("active");
	    $(".main-menu").toggleClass("active");
	});

	/*=============================
	        Sticky header
	==============================*/

	$window.on('scroll', function() {
    	if ($(".navbar").offset().top > 100) {
    	    $(".navbar-fixed-top").addClass("top-nav-collapse");
    	} else {
    	    $(".navbar-fixed-top").removeClass("top-nav-collapse");
    	}
	});

	/*=============================
	        Blog Masonry
	==============================*/

	var $blocks = $(".blog-masonry"); //Masonry blocks
	
	$blocks.imagesLoaded(function(){
		$blocks.masonry({
			itemSelector: '.masonry-entry'
		});
		// Fade blocks in after images are ready (prevents jumping and re-rendering)
		$(".masonry-entry").fadeIn();
	});
	
	$(document).ready( function() { 
		setTimeout( function() { 
			$blocks.masonry(); 
		}, 500); 
	});

	$(window).resize(function () {
		setTimeout( function() { 
			$blocks.masonry(); 
		}, 500);
	});

	/*=============================
	        Flexslider
	==============================*/
    $(".flexslider").flexslider({
        animation: "slide",
        controlNav: false,
        prevText: " ",
        nextText: " ",
        smoothHeight: false,
        pauseOnHover: true,
        slideshowSpeed: 3000,
        pauseOnAction: false,
        after: function(){
        	$blocks.masonry();
        }
    });


    /*=============================
       resize videos after container
    ==============================*/
	var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).resize(function() {
		resizeVideo(vidSelector);
	});

})(jQuery);

