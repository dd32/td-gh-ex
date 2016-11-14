/**** Dogcare Custom Js ****/
/* Main-Menu Js */
/* Deafult js */
(function (jQuery) {
    jQuery.fn.menumaker = function (options) {
        var cssmenu = jQuery(this),
            settings = jQuery.extend({
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
            jQuery(this).find(".menu").on('click', function () {
                jQuery(this).toggleClass('menu-opened');
                var mainmenu = jQuery(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
                if (jQuery('body').hasClass('menuOpen')) {
                    jQuery('body').removeClass('menuOpen');
                } else {
                    jQuery('body').addClass('menuOpen');
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    jQuery(this).toggleClass('submenu-opened');
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        jQuery(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 1024;
                if (jQuery(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if (jQuery(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function (jQuery) {
    jQuery(document).ready(function () {
        jQuery("#top-menu").menumaker({
            format: "multitoggle"
        });
        /** Set Position of Sub-Menu **/
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#top-menu ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('.sub-menu').addClass('submenu-left');
                }
            }
        });
        var $grid = jQuery('.grid').imagesLoaded(function () {
            $grid.masonry({
                itemSelector: '.grid-item',
                percentPosition: true,
                columnWidth: '.grid-sizer'
            });
        });
    });
})(jQuery);
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery('.header-top').addClass('fixed-header');
    } else {
        jQuery('.header-top').removeClass('fixed-header');
    }
});
/* Main-Menu Js End */
/*menu-button*/
var Menu = {

    el: {
        ham: jQuery('.menu'),
        menuTop: jQuery('.menu-top'),
        menuMiddle: jQuery('.menu-middle'),
        menuBottom: jQuery('.menu-bottom')
    },

    init: function () {
        Menu.bindUIactions();
    },

    bindUIactions: function () {
        Menu.el.ham
            .on(
                'click',
                function (event) {
                    Menu.activateMenu(event);
                    event.preventDefault();
                }
            );
    },

    activateMenu: function () {
        Menu.el.menuTop.toggleClass('menu-top-click');
        Menu.el.menuMiddle.toggleClass('menu-middle-click');
        Menu.el.menuBottom.toggleClass('menu-bottom-click');
    }
};

Menu.init();