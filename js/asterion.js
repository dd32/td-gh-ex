
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
	        if (typeof executed == 'undefined') {
				executed = true;
				if ($(this).scrollTop() > 90) {
					
					fx()
				}
			}
		};

		$(window).on("scroll", reset);
	});

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

	// Sticky header menu
	function sticky_header() {
		var heightWpadminbar = $("#wpadminbar").height();

		if ($(this).scrollTop() > heightWpadminbar){
			$(".navbar").addClass("navbar-shrink");
		} else {
			$(".navbar").removeClass("navbar-shrink");
		}

	}
 	
	$(window).scroll(function() {
		sticky_header();
	});

	sticky_header();

	$('.testimonials-slider').slick({
		autoplay: false,
		autoplaySpeed: 2000,
		dots: true,
		arrows: false,
	});



    // Clone elements to offcanvas
    jQuery(".asterion-primary-nav nav").clone().appendTo(".asterion-offcanvas-nav");

    // Toggle mobile nav
    jQuery(".site-navigation-toggle, .asterion-offcanvas-wrap .close").on("click", function () {
        jQuery(".asterion-offcanvas-wrap").toggleClass("active");
   });

    // Off-canvas menu sub-menus
    jQuery(".asterion-offcanvas-nav .menu-item-has-children a").on("click", function () {
        event.stopPropagation();
        location.href = this.href;
    });
    jQuery(".asterion-offcanvas-nav .menu-item-has-children").on("click", function () {
        jQuery(this).children("ul").toggle();
        jQuery(".asterion-offcanvas-nav nav").resize();
        jQuery(this).toggleClass("show-sub-menu");
        return false;
    }); 
});