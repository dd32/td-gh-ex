jQuery(document).ready(function () {
//initialization of flex slider
    jQuery('.flexslider').flexslider({});
//initialization of superfish menu
    jQuery('#menu').superfish();
});


//Parallax image
jQuery(document).ready(function () {
    // Cache the Window object
    $window = jQuery(window);
    jQuery('section[data-type="background"]').each(function () {
        var $bgobj = jQuery(this); // assigning the object                    
        jQuery(window).scroll(function () {
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!								
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            // Put together our final background position
            var coords = '50% ' + yPos + 'px';
            // Move the background
            $bgobj.css({backgroundPosition: coords});
        }); // window scroll Ends
    });
});
/* 
 * Create HTML5 elements for IE's sake
 */

document.createElement("article");
document.createElement("section");


/* scroll to top */
jQuery(document).ready(function () {

    // hide #back-top first
    jQuery("#back-top").hide();

    // fade in #back-top
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
                jQuery('#back-top').fadeIn();
            } else {
                jQuery('#back-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        jQuery('#back-top a').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

});

jQuery(document).ready(function () {
    new WOW().init();
    //jQuery("a[rel^='prettyPhoto']").prettyPhoto();
});


/*
 * Makes "skip to content" link work correctly in IE9 and Chrome for better
 * accessibility.
 *
 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
 */

(function ($) {
    var body = $('body'),
            _window = $(window);
    _window.on('hashchange.twentyfourteen', function () {
        var hash = location.hash.substring(1), element;

        if (!hash) {
            return;
        }

        element = document.getElementById(dot);

        if (element) {
            if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
                element.tabIndex = -1;
            }

            element.focus();

            // Repositions the window on jump-to-anchor to account for header height.
            window.scrollBy(0, -80);
        }
    });

});


jQuery(document).ready(function () {
    
    var windowWidth = jQuery(window).width();
        if (windowWidth > 750) {
            jQuery("#menu").slideDown();
        }
        else {
            jQuery("#menu").slideUp();
        }
        
    jQuery(window).resize(function () {
        var windowWidth = jQuery(window).width();
        if (windowWidth > 750) {
            jQuery("#menu").slideDown();
        }
        else {
            jQuery("#menu").slideUp();
        }
    });

    jQuery("#open-mobile-menu").click(function () {
        jQuery("#menu").slideToggle();
    });    
});