jQuery.noConflict();
jQuery(document).ready(function () {
    "use strict";

    // Scroll Reveal
    new scrollReveal();

    // Featured Product Slick Slider
    jQuery('.single-item--featured').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
        });


    jQuery(function($) {
        var $container = $('.products');
        $container.imagesLoaded( function() {
            jQuery('.product-card__inner').matchHeight({byRow: false});
        });
    });

    jQuery(function($) {
        var $container = $('.product__categories');
        $container.imagesLoaded( function() {
            jQuery('.front-product-category__card').matchHeight({byRow: false});
        });
    });

    // Equal Height
    jQuery('.nav-previous, .nav-next').matchHeight();
    jQuery('.feature-block__inner').matchHeight();
    jQuery('.equal-height').matchHeight();
    jQuery('.front__product-featured__text, .front__product-featured__image').matchHeight();
    jQuery('.post-item--l5').matchHeight();
    jQuery('.type-product').matchHeight();

    // Cart Toggle
    jQuery('.cart-toggles').click(function () {
        jQuery('.sidebar__cart__full').toggleClass('sidebar__cart--open');
        jQuery('.site-content').toggleClass('site--collapsed');
        jQuery('.site-branding').toggleClass('site--collapsed');
    });

     // Hamburger Menu
    jQuery('.hamburger').click(function () {
        jQuery(this).toggleClass('is-active');
        jQuery('.hamburger__menu__full').toggleClass('hamburger__menu--open');
        return false;
    });

     // Hamburger Close
    jQuery('.ham__close').click(function () {
        jQuery('.hamburger__menu__full').removeClass('hamburger__menu--open');
        jQuery( ".header-inner" ).find( ".hamburger--spring" ).removeClass('is-active');
        return false;
    });

    // WooCommerce Product Search at Top Bar
    jQuery('.site-search__icon').click(function () {
        jQuery('.widget_product_search').slideToggle(200);
        jQuery(this).toggleClass('active');
        return false;
    });

    // Hero Image Headline Fittext
    jQuery(".slider-content__title").fitText();

    // Scroll To Top
    if (jQuery(window).scrollTop() > jQuery('.site-header').outerHeight(true)) {
        jQuery('body').addClass('scrolling');
    } else {
        jQuery('body').removeClass('scrolling');
    }

    var menuSub = jQuery('.menu-item-has-children');
     menuSub.hover(function () {
        jQuery(this).find( '.sub-menu' ).toggleClass('delay--hover');
     });

    jQuery(".woocommerce-ordering select").simpleselect();

});