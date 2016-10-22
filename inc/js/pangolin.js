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

    // Equal Height

    jQuery('.feature-block__inner').matchHeight();
    jQuery('.equal-height').matchHeight();
    jQuery('.front__product-featured__text, .front__product-featured__image').matchHeight();
    jQuery('.front-product-category__card').matchHeight();
    jQuery('.front__product-featured__left--2,.front__product-featured__right--2').matchHeight();
    jQuery('.front__product-featured__left--3,.front__product-featured__right--3').matchHeight();
    jQuery('.front-product-category__card__inner--l2').matchHeight();
    jQuery('.front-product-category__card__inner').matchHeight();
    jQuery('.post-item').matchHeight();
    jQuery('.product-card__info').matchHeight();
    jQuery('.product-card__inner').matchHeight();
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
    jQuery(".entry-header--lb-2").fitText(1);

    // Scroll To Top
    if (jQuery(window).scrollTop() > jQuery('.site-header').outerHeight(true)) {
        jQuery('body').addClass('scrolling');
    } else {
        jQuery('body').removeClass('scrolling');
    }

    // Superfish Menu Enhancement
    jQuery('ul.nav-menu').superfish({
                delay:       1000,
                animation:   {opacity:'show',height:'show'},
                speed:       'fast',
                autoArrows:  true,
                dropShadows: false
    });

    var menuSub = jQuery('.menu-item-has-children');
     menuSub.hover(function () {
        jQuery(this).find( '.sub-menu' ).toggleClass('delay--hover');
     });

});