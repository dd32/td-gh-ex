// Sticky header menu
jQuery(window).scroll(function() {
	var heightTop = jQuery(".navbar").height();
	var heightWpadminbar = jQuery("#wpadminbar").height();
	if (jQuery(this).scrollTop() > heightTop + heightWpadminbar){
		jQuery(".navbar").addClass("navbar-shrink");
	} else {
		jQuery(".navbar").removeClass("navbar-shrink");
	}
});

jQuery(function($) {   
	$('.stats-bar').appear();
	$('.stats-bar').on('appear', function() {
		var fx = function fx() {
			$(".stat-number").each(function (i, el) {
					var data = parseInt(this.dataset.n, 10);
					var props = {
						"from": {
						"count": 0
					},
						"to": {
						"count": data
					}
				};
				$(props.from).animate(props.to, {
					duration: 1000 * 1,
					step: function (now, fx) {
						$(el).text(Math.ceil(now));
					},
					complete:function() {
					if (el.dataset.sym !== undefined) {
							el.textContent = el.textContent.concat(el.dataset.sym)
						}
					}
				});
			});
		};

		var reset = function reset() {
			console.log($(this).scrollTop())
			if ($(this).scrollTop() > 90) {
				$(this).off("scroll");
				fx()
			}
		};

		$(window).on("scroll", reset);
	});
});

jQuery(function($) {
  "use strict";

	// hide #back-top first
	$("#back-top").hide();

	// scroll body to 0px on click
	$('#back-top a').on("click", function(){
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	// fade in #back-top
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});


$('.testimonials-slider').slick({
	autoplay: false,
	autoplaySpeed: 2000,
	dots: true,
	arrows: false,
});


});
