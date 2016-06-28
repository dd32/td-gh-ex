jQuery.noConflict();
jQuery(document).ready(function () {
    "use strict";

    // Scroll Reveal
    new scrollReveal();

    // Featured Product Flexslider
    jQuery(window).load(function () {
        jQuery('.fearured-product__slider').flexslider({animation: "slide", touch: true, pauseOnHover: true});
    });

    // Equal Height
    jQuery('.front__product-featured__text, .front__product-featured__image').matchHeight();

    jQuery('.feature-block__inner').matchHeight();
    jQuery('.equal-height').matchHeight();
    jQuery('.product--l4').matchHeight();
    jQuery('.product-card__info--l4').matchHeight();
    jQuery('.front-product-category__card').matchHeight();
    jQuery('.front__product-featured__left--2,.front__product-featured__right--2').matchHeight();
    jQuery('.front__product-featured__left--3,.front__product-featured__right--3').matchHeight();
    jQuery('.post-item--l4').matchHeight();
    jQuery('.product-card__inner').matchHeight();
    jQuery('.product-card__inner--l3').matchHeight();
    jQuery('.front-product-category__card__inner--l2').matchHeight();
    jQuery('.front-product-category__card__inner').matchHeight();
    jQuery('.post-item--l3').matchHeight();
    jQuery('.post-item').matchHeight();


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
    });   




    // WooCommerce Product Search at Top Bar
    jQuery('.site-search__icon').click(function () {
        jQuery('.widget_product_search').toggle();
        jQuery(this).toggleClass('active');
        return false;
    });


    // Hero Image Headline Fittext
    jQuery(".slider-content__title").fitText();
    jQuery(".entry-header--lb-2").fitText(1);


});

jQuery(document).ready(function () {
    if (jQuery(window).scrollTop() > jQuery('.site-header').outerHeight(true)) {
        jQuery('body').addClass('scrolling');
    } else {
        jQuery('body').removeClass('scrolling');
    }
});

jQuery(document).ready(function() {
        jQuery('ul.nav-menu').superfish({ 
                delay:       100,                             
                animation:   {opacity:'show',height:'show'},   
                speed:       'fast',                          
                autoArrows:  true,                            
                dropShadows: false                           
            });
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