jQuery(document).ready(function($) {

    $(".bestwp-nav-secondary .bestwp-secondary-nav-menu").addClass("bestwp-secondary-responsive-menu").before('<div class="bestwp-secondary-responsive-menu-icon"></div>');

    $(".bestwp-secondary-responsive-menu-icon").click(function(){
        $(this).next(".bestwp-nav-secondary .bestwp-secondary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".bestwp-nav-secondary .bestwp-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".bestwp-secondary-responsive-menu > li").removeClass("bestwp-secondary-menu-open");
        }
    });

    $(".bestwp-secondary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-secondary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-secondary-menu-open");
        });
    });

    $("div.bestwp-secondary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-secondary-menu-open");
        });
    });

    if(bestwp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var bestwpstickyNavTop = $('.bestwp-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var bestwpstickyNav = function(){
        var bestwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(bestwp_ajax_object.sticky_menu_mobile){
            if (bestwpscrollTop > bestwpstickyNavTop) {
                $('.bestwp-primary-menu-container').addClass('bestwp-fixed');
            } else {
                $('.bestwp-primary-menu-container').removeClass('bestwp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (bestwpscrollTop > bestwpstickyNavTop) {
                    $('.bestwp-primary-menu-container').addClass('bestwp-fixed');
                } else {
                    $('.bestwp-primary-menu-container').removeClass('bestwp-fixed'); 
                }
            }
        }
    };

    bestwpstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        bestwpstickyNav();
    });
    }

    $(".bestwp-nav-primary .bestwp-nav-primary-menu").addClass("bestwp-primary-responsive-menu").before('<div class="bestwp-primary-responsive-menu-icon"></div>');

    $(".bestwp-primary-responsive-menu-icon").click(function(){
        $(this).next(".bestwp-nav-primary .bestwp-nav-primary-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".bestwp-nav-primary .bestwp-nav-primary-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".bestwp-primary-responsive-menu > li").removeClass("bestwp-primary-menu-open");
        }
    });

    $(".bestwp-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-primary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-primary-menu-open");
        });
    });

    $("div.bestwp-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("bestwp-primary-menu-open");
        });
    });

    $(".bestwp-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("bestwp-search-overlay-wrap").style.display = "block";
    });

    $(".bestwp-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("bestwp-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    $( 'body' ).prepend( '<div class="bestwp-scroll-top"></div>');
    var scrollButtonEl = $( '.bestwp-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.bestwp-scroll-top' ).fadeOut();
        } else {
            $( '.bestwp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if ( $().owlCarousel ) {
        var bestwpcarouselwrapper = $('.bestwp-posts-carousel');
        var imgLoad = imagesLoaded(bestwpcarouselwrapper);
        imgLoad.on( 'always', function() {
            bestwpcarouselwrapper.each(function(){
                    var $this = $(this);
                    $this.find('.owl-carousel').owlCarousel({
                        autoplay: true,
                        loop: true,
                        margin: 0,
                        smartSpeed: 250,
                        dots: false,
                        nav: true,
                        autoplayTimeout: 4000,
                        autoHeight: false,
                        navText: [ '<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>' ],
                        responsive:{
                        0:{
                            items: 1
                        },
                        580:{
                            items: 2
                        },
                        991:{
                            items: 3
                        },
                        1150:{
                            items: 4
                        }
                    }
                });
            });
        });
    } // end if

    if(bestwp_ajax_object.sticky_sidebar){
    $('.bestwp-main-wrapper, .bestwp-sidebar-one-wrapper, .bestwp-sidebar-two-wrapper').theiaStickySidebar({
        containerSelector: ".bestwp-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 890,
    });
    }

});