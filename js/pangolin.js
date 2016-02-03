jQuery.noConflict();
jQuery(document).ready(function () {
    "use strict";
    // Scroll Reveal
    new scrollReveal();

    // Scroll To Top
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 700) {
            jQuery('.scrollToTop').fadeIn();
        } else {
            jQuery('.scrollToTop').fadeOut();
        }
    });

    //Scroll to top
    jQuery('.scrollToTop').click(function () {
        jQuery('html, body').animate({scrollTop : 0}, 1000);
        return false;
    });


    // Featured Product Flexslider
    jQuery(window).load(function () {
        jQuery('.fearured-product__slider').flexslider({animation: "slide", touch: true, pauseOnHover: true});
    });

    // Equal Height
    jQuery('.front__product-featured__text, .front__product-featured__image').matchHeight();

    jQuery('.feature-block__inner').matchHeight();

    // Hamburger Menu
    jQuery('.cart-toggles').click(function () {
        jQuery('.sidebar__cart__full').toggleClass('sidebar__cart--open');
        jQuery('.site-content').toggleClass('site--collapsed');
        jQuery('.site-branding').toggleClass('site--collapsed');
    });

    // WooCommerce Product Search at Top Bar
    jQuery('.site-search__icon').click(function () {
        jQuery('.widget_product_search').toggle();
        jQuery(this).toggleClass('active');
        return false;
    });


/*

    // Hamburger Menu
    jQuery('.menu-toggles').click(function () {
        jQuery('.full-menu').toggleClass('full-menu--open');
        jQuery('.site-content').toggleClass('site--collapsed');
        jQuery('.site-branding').toggleClass('site--collapsed');
    });




   // WooCommerce Product Cart at Top Bar
    jQuery('.site-cart__icon').click(function () {
        jQuery('.site-header-cart').toggle();
        jQuery(this).toggleClass('active');
        return false;
    });
*/

    // Hero Image Headline Fittext
    jQuery(".slider-content__title").fitText();
    jQuery(".entry-header--lb-2").fitText(1);

});




/*

jQuery(".menu-item").hoverIntent({
    sensitivity: 1, // number = sensitivity threshold (must be 1 or higher)
    interval: 10,  // number = milliseconds for onMouseOver polling interval
    timeout: 1800,   // number = milliseconds delay before onMouseOut
    over:function(){
        jQuery(this)
            .find('.sub-menu').fadeIn(200);
    },
    out: function(){
        jQuery(this)
            .find('.sub-menu').fadeOut(200);
    }
});

jQuery(".menu-item").hoverIntent({
    over:function(){
        jQuery(".sub-menu").fadeIn(200);
    },
    out: function(){
        jQuery(".sub-menu").stop(true,true).fadeOut(200);
    }
});
});


jQuery(function() {
    jQuery('#primary-menu').hoverIntent({
        over:function() {
        jQuery(this).find('.sub-menu').fadeIn();
        //jQuery(this).find('.sub-menu').fadeIn();
    },
    out:function() {
        jQuery(this).find('.sub-menu').css('transition-delay', '2s');
        //jQuery(this).find('.sub-menu').fadeOut(1000);
    }
});
});

    jQuery('.menu-item').on({

        mouseenter: function () {
            jQuery(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();
        },

        mouseleave: function () {
            jQuery(this).find('.sub-menu').first().stop(true, true).delay(450).slideUp();
        }

    });

    jQuery(function() {
        jQuery('.menu-item').hover(function() {
            jQuery(this).find('.sub-menu').first().stop(true, true).delay(250).slideDown();

        }, function() {
            jQuery(this).find('.sub-menu').first().stop(true, true).delay(150).slideUp();

        });
    });


    jQuery('.site-cart__icon').hover(
        function() {jQuery('.site-header-cart').stop().fadeIn(200).addClass('search_on');},
        function() {jQuery('.site-header-cart').stop().fadeOut(800).removeClass('search_on');}
    );



( function( $ ) {

    $( window ).load( function() {

        function searchAddClass() {
            $( this ).closest( '.search-form' ).addClass( 'hover' );
        }
        function searchRemoveClass() {
            $( this ).closest( '.search-form' ).removeClass( 'hover' );
        }
        var searchSubmit = $( '.search-submit' );
        searchSubmit.hover( searchAddClass, searchRemoveClass );
        searchSubmit.focusin( searchAddClass );
        searchSubmit.focusout( searchRemoveClass );

    } );

} )( jQuery );

( function() {

    var container, button, form, siteHeaderInner, siteNavigation, div;

    container = document.getElementById( 'search-header' );
    if ( ! container ) {
        return;
    }

    button = container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof button ) {
        return;
    }

    form = container.getElementsByTagName( 'form' )[0];
    if ( 'undefined' === typeof form ) {
        button.style.display = 'none';
        return;
    }
    form.setAttribute( 'aria-expanded', 'false' );

    button.onclick = function() {
        if ( -1 !== container.className.indexOf( 'toggled' ) ) {
            document.body.className = document.body.className.replace( ' search-toggled', '' );
            container.className = container.className.replace( ' toggled', '' );
            button.setAttribute( 'aria-expanded', 'false' );
            form.setAttribute( 'aria-expanded', 'false' );
        } else {
            document.body.className += ' search-toggled';
            container.className += ' toggled';
            button.setAttribute( 'aria-expanded', 'true' );
            form.setAttribute( 'aria-expanded', 'true' );
        }
    };

} )();





/*
        jQuery(".blog__post__right").hover(function() {
            jQuery(this).find(".yolo").slideDown(100);
        }, function() {
            jQuery(this).find(".yolo").slideUp(100);
        });

*/

/*
jQuery( ".widget_product_search form" ).on( "click", function() {
  jQuery( this ).find("input[type=submit]").css( "visibility", "visible" );
    jQuery( this ).find("input.search-field").css( "visibility", "visible" );
});
*/

/*
jQuery('.site-search').toggle(
    function () {
    jQuery( this ).find("input[type=submit]").css( "display", "none" );
    jQuery( this ).find("input.search-field").css( "display", "none" );
    },
    function () {
    jQuery( this ).find("input[type=submit]").css( "display", "block" );
    jQuery( this ).find("input.search-field").css( "display", "block" );
    }
);

*/

/*
//TOP SEARCH BAR
jQuery('.wpd_search_head').toggle(
  function(){
      jQuery(this).addClass('search_bttn_on');
     jQuery('.search_nohome').slideDown(100);
  },
  function(){
     jQuery('.search_nohome').slideUp(100);
     jQuery(this).removeClass('search_bttn_on');
  });
*/