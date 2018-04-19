jQuery(function ($) {

    $(window).scroll();
    // Sticky menu
    var top = 0;
    var height = 0;
    if ($('.default-menu').length) {
        top = $('.default-menu').offset().top;
        height = $('.default-menu').height();
    }
    if (height >= 80) {
        height = 80;
    }
    var abheight = $('#wpadminbar').outerHeight();

    function addFakeP() {
        $('<p class="fake-placeholder" style="min-height: ' + (height) + 'px;top: 0;right: 0;display: none;margin: 0;"></p>').insertAfter('.header-div');
    }

    $(window).scroll(function () {
        if ($('.stickable').length) { // Sticky operations are applied only when 'stickable' class exists
            if ($(this).scrollTop() > top - abheight) {
                $('.fake-placeholder').css('display', 'block');
                $('.default-menu').css('top', abheight).addClass('sticky-menu');
            }
            else {
                $('.fake-placeholder').css('display', 'none');
                $('.default-menu').css('top', '').removeClass('sticky-menu');
            }
        }
    });

    // END: Sticky menu

    // Footer Dropdown to Dropup converter
    //
    // $(document).ready(function () {
    //     $('footer .dropdown:not(.dropdown-submenu)').each(function () {
    //         var _this = this;
    //         //  convert footer nav to dropup
    //         if ($(this).closest('footer').length) {
    //             var $ul = $(this).children("ul.dropdown-menu");
    //             $ul.css('top', '-' + $ul.css('height'));
    //         }
    //     });
    // });

    // Responsive Dropdown menu JS

    function toggleDropdownMobile(_this) {

        if ($(_this).next('ul').css('display') === 'none') {
            $(_this).next('ul').css('display', 'grid');
            $(_this).children('i').removeClass('fa-caret-down');
            $(_this).children('i').addClass('fa-caret-up');

        } else {
            $(_this).next('ul').css('display', 'none');
            $(_this).children('i').removeClass('fa-caret-up');
            $(_this).children('i').addClass('fa-caret-down');
        }
    }

    $('.dropdown span.dropdown-toggler').click(function () {
        if ($(window).width() < 1000) {
            toggleDropdownMobile(this);
        }
    });

    $('.navbar-toggler').on('click', function () {
        $('.dropdown-menu').css('display', 'none');
        $('.dropdown-toggler').children('i').removeClass('fa-caret-up');
        $('.dropdown-toggler').children('i').addClass('fa-caret-down');
    });

    // This function is called each time window is resized
    var checkMod = function () {

        if ($('.stickable').length) { // Sticky operations are applied only when 'stickable' class exists
            if (Modernizr.mq('(max-width: 1000px)')) { // removes placeholder <p> for mobile screens
                $('.fake-placeholder').remove();

            } else if (!$('.fake-placeholder').length) { // adds placeholder <p> for desktop screens if it already does'nt exist
                addFakeP();
            }
        }
    };


    $(document).ready(function () {
        $(window).resize(checkMod);
        checkMod();
    });

    // END : Responsive JS

    // Navbar search form

    var showField = false;


    $('.nav-search-form span').mouseenter(function () {
        showField = true;
        searchFieldShow()
    });

    $('.nav-search-form input[type="search"]').mouseenter(function () {
        showField = true;
        searchFieldShow()
    });

    $('.nav-search-form input[type="search"]').mouseleave(function () {
        showField = false;
        searchFieldHide();
    });

    $('.nav-search-form span').mouseleave(function () {
        showField = false;
        searchFieldHide();
    });

    function searchFieldShow() {
        $('.nav-search-form input[type="search"]').css('padding', '10px 20px');
        $('.nav-search-form input[type="search"]').show().stop(true, true).animate({width: 200}, 300);
    }

    function searchFieldHide() {
        setTimeout(function () {
            if (!showField) {
                $('.nav-search-form input[type="search"]').animate({width: 0}, 300);
                $('.nav-search-form input[type="search"]').css('padding', '0');
                setTimeout(function () {
                    $('.nav-search-form input[type="search"]').hide();
                }, 300);
            }
        }, 500);
    }

    // END: Navbar search form


    // Back to top button

    $(document).ready(function () {

        var offset = 250;
        var duration = 300;

        $(window).scroll(function () {
            if ($('.back-to-top.canshow').length) {
                if ($(this).scrollTop() > offset) {
                    $('.back-to-top').fadeIn(duration);
                } else {
                    $('.back-to-top').fadeOut(duration);
                }
            }
        });

        $('.back-to-top').click(function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    // END: Back to top


// START: Full-Screen search form

    var wHeight = window.innerHeight;
    //search bar middle alignment
    $('#mk-fullscreen-searchform').css('top', wHeight / 2);
    //reform search bar
    jQuery(window).resize(function () {
        wHeight = window.innerHeight;
        $('#mk-fullscreen-searchform').css('top', wHeight / 2);
    });
    // Search
    $('#search-button').click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
    });
    $("a.mk-fullscreen-close").click(function (e) {
        e.preventDefault();
        $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
    });
//END : Full-Screen search form

    //mobile menu

    $(document).ready(function () {

        new gnMenu(document.getElementById('attire-mbl-menu'));

        $('.attire-mbl-menu').prepend('<li class="gn-search-item">' +
            '<form action="' + sitejs_local_obj.home_url + '">' +
            '<input name="post_type[]" value="product" type="hidden">' +
            '<input name="post_type[]" value="page" type="hidden">' +
            '<input name="post_type[]" value="post" type="hidden">' +
            '<input placeholder="Search" value="" name="s" type="search" required="required" class="gn-search">' +
            '<a class="gn-icon gn-icon-search"></a>' +
            '</form>' +
            '</li>'
        );
    });

});
