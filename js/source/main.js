jQuery( function() {

	// Search toggle.
	$(function(){
		var $searchlink = $('#search-toggle');
		var $searchbox  = $('#search-box');
		$('#search-toggle').on('click', function(){
			if($(this).attr('id') == 'search-toggle') {
				if(!$searchbox.is(":visible")) { 
					// if invisible we switch the icon to appear collapsable
					$searchlink.removeClass('header-search').addClass('header-search-x');
				} else {
					// if visible we switch the icon to appear as a toggle
					$searchlink.removeClass('header-search-x').addClass('header-search');
				}
					$searchbox.slideToggle(200, function(){
					// callback after search bar animation
				});
			}
		});
	});

		// Menu toggle for below 768 screens.
		( function() {
			var nav = $( '.main-navigation' ), button, menu;
			if ( ! nav ) {
				return;
			}

			button = nav.find( '.menu-toggle' );
			if ( ! button ) {
				return;
			}

			// Hide
			menu = nav.find( '.menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}

			$( '.menu-toggle' ).on( 'click', function() {
				$(this).toggleClass("on");
				nav.toggleClass( 'toggled-on' );
			} );
		} )();

		// Mini Slider 
		 /*The code is pretty simple, we animate the ul with a -220px margin left. Then we find the first li and put it last to get the infinite animation.*/
		$(function(){
			setInterval(function(){
				$(".min_slider ul").animate({marginLeft:-220},1000,function(){
					$(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
				})
			}, 3000);
		}); 

		// Go to top button.
		$(document).ready(function(){

		// Hide Go to top icon.
		$(".go-to-top").hide();

		  $(window).scroll(function(){

		    var windowScroll = $(window).scrollTop();
		    if(windowScroll > 900)
		    {
		      $('.go-to-top').fadeIn();
		    }
		    else
		    {
		      $('.go-to-top').fadeOut();
		    }
		  });

		  // scroll to Top on click
		  $('.go-to-top').click(function(){
		    $('html,header,body').animate({
		    	scrollTop: 0
			}, 700);
			return false;
		  });

		});	
} );