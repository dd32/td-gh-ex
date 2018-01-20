// Hello.
//
// This is The Scripts used for article blocks sizing
//
//
jQuery(function(jQuery) { // DOM is now read and ready to be manipulated
    equalheight = function(container) {
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            jQueryel,
            topPosition = 0;
        jQuery(container).each(function() {

            jQueryel = jQuery(this);
            jQuery(jQueryel).height('auto')
            topPostion = jQueryel.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = jQueryel.height();
                rowDivs.push(jQueryel);
            } else {
                rowDivs.push(jQueryel);
                currentTallest = (currentTallest < jQueryel.height()) ? (jQueryel.height()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    jQuery(window).load(function() {
        equalheight('.eq-blocks');
    });


    jQuery(window).resize(function() {
        equalheight('.eq-blocks');
    });

});


function main() {

    (function() {
        'use strict';

        /* ==============================================
  	Slider
  	=============================================== */

        jQuery('a.page-scroll').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top - 40
                    }, 900);
                    return false;
                }
            }
        });

        /*====================================
        Show Menu while scrolling
        ======================================*/
        jQuery(window).bind('scroll', function() {
            var navHeight = jQuery(window).height() - 100;
            if (jQuery(window).scrollTop() > navHeight) {
                jQuery('.navbar-default').addClass('on');
            } else {
                jQuery('.navbar-default').removeClass('on');
            }
        });

        jQuery('body').scrollspy({
            target: '.navbar-default',
            offset: 80
        })

        jQuery(document).ready(function() {
            jQuery("#team").owlCarousel({

                navigation: false, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                autoHeight: true,
                itemsCustom: [
                    [0, 1],
                    [450, 2],
                    [600, 2],
                    [700, 2],
                    [1000, 4],
                    [1200, 4],
                    [1400, 4],
                    [1600, 4]
                ],
            });

            jQuery("#clients").owlCarousel({

                navigation: false, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                autoHeight: true,
                itemsCustom: [
                    [0, 1],
                    [450, 2],
                    [600, 2],
                    [700, 2],
                    [1000, 4],
                    [1200, 5],
                    [1400, 5],
                    [1600, 5]
                ],
            });

            jQuery("#testimonial").owlCarousel({
                navigation: false, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true
            });

        });

        /*====================================
    Page loader
    ======================================*/

        jQuery(document).ready(function() {

            setTimeout(function() {
                jQuery('body').addClass('loaded');
                //jQuery('h1').css('color','#222222');
            }, 3000);

        });

        /*====================================
    Portfolio Isotope Filter
    ======================================*/
        jQuery(window).load(function() {
            var jQuerycontainer = jQuery('#lightbox');
            jQuerycontainer.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            jQuery('.cat a').click(function() {
                jQuery('.cat .active').removeClass('active');
                jQuery(this).addClass('active');
                var selector = jQuery(this).attr('data-filter');
                jQuerycontainer.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

        });
    }());

}
main();