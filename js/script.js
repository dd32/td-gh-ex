jQuery(document).ready(function($) {

     /*
    Menu animation
    =========================================================
    */
    $( ".main-navigation .menu > li.menu-item-has-children" ).hover(
        function() {
            if (  576 < $(window).width() ) {
                $( this ).children('.sub-menu').addClass('animated fadeInUp').removeClass('fadeOut');
            }
        }, function() {
            if (  576 < $(window).width() ) {
                $( this ).children('.sub-menu').addClass('fadeOut').removeClass('slideInUp');
            }
        }
    );

    // Mega Menu offscreen
    $(".main-navigation li").on('mouseenter mouseleave', function (e) {
        if ( 767 < $(document).width() ) {
            if ($('ul', this).length) {
                var elm = $('ul:first', this);
                var off = elm.offset();
                var l = off.left;
                var w = elm.width();
                var docH = $("#header").height();
                var docW = $("#header").width();
                var isEntirelyVisible = (l + w <= docW);
                if ( ! isEntirelyVisible) {
                    $(this).addClass('edge');
                } else {
                    $(this).removeClass('edge');
                }
            }
        }
    });

    /*
    Video Function
    =========================================================
    */
   $('a[data-video]').on("click", function(){
        event.preventDefault();
        var video = $(this).data('video');
        if (video) {
            $(this).parents('.absolutte-video-popup').html(createVideo(video));
        }
    });

    /*
    Tesimonials Function
    =========================================================
    */
    $('.absolutte-testimonials-wrap').flickity({
        contain: false,
        cellSelector: '.absolutte-testimonial',
        cellAlign: 'center',
        prevNextButtons: false,
        pageDots: true,
        imagesLoaded: true
    });

    /*
    Numbers
    =========================================================
    */
   $('.absolutte-numbers-wrap .absolutte-number .absolutte-number-number').each( function (indexInArray, valueOfElement) {
        var from = $(this).data('from');
        var to = $(this).data('to');
        animateValue($(this), from, to, 2000);
    });

    /*
    Gallery Function
    =========================================================
    */
    $('.absolutte-gallery').flickity({
        cellSelector: '.absolutte-gallery-item',
        cellAlign: 'left',
        prevNextButtons: false,
        pageDots: false,
        imagesLoaded: true,
        freeScroll: true
    });
    //Call Lightbox
    initPhotoSwipe('.absolutte-gallery', 'a');



    //https://gist.github.com/yangshun/9892961
    function parseVideo (url) {    
        url.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);
        if (RegExp.$3.indexOf('youtu') > -1) {
            var type = 'youtube';
        } else if (RegExp.$3.indexOf('vimeo') > -1) {
            var type = 'vimeo';
        }
        return {
            type: type,
            id: RegExp.$6
        };
    }
    function createVideo (url, width, height) {
        // Returns an iframe of the video with the specified URL.
        var videoObj = parseVideo(url);
        var $iframe = $('<iframe>', { width: width, height: height });
        $iframe.attr('frameborder', 0);
        if (videoObj.type == 'youtube') {
            $iframe.attr('src', '//www.youtube.com/embed/' + videoObj.id);
        } else if (videoObj.type == 'vimeo') {
            $iframe.attr('src', '//player.vimeo.com/video/' + videoObj.id);
        }
        return $iframe;
    }





    //Animation to section on Main Menu
    $("body").on('click', '#primary-menu > li > a[href^="#"], #secondary-menu > ul > li > a[href^="#"], #primary-menu > li > a[href^="."], #secondary-menu > ul > li > a[href^="."]', function(event) {
        event.preventDefault();
        $("html, body").animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000);
    });

    function animateValue($obj, start, end, duration) {    
        var range = end - start;
        var minTimer = 50;
        var stepTime = Math.abs(Math.floor(duration / range));
        stepTime = Math.max(stepTime, minTimer);
        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;
        function run() {
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));
            $obj.text(value);
            if (value == end) {
                clearInterval(timer);
            }
        }
        var timer = setInterval(run, stepTime);
        run();
    }


    appear({
        init: function init(){
            
        },
        elements: function elements(){
            // work with all elements with the class "track"
            return document.getElementsByClassName('absolutte-track');
        },
            appear: function appear(el){
                var animation = '';
                if ( $('body').hasClass('absolutte-animations') ) {
                    animation = $(el).data('animation');    
                }
                
                $(el).addClass('absolutte-is-visible animated').addClass( animation );
        },
            disappear: function disappear(el){
        },
        bounds: 0,
        reappear: true
    });



    $('#absolutte-header-side-btn').on("click", function(){
        event.preventDefault();
        $("body").toggleClass('absolutte-header-open');
    });

    

    /*
    Tesimonials Function
    =========================================================
    */
    $('.absolutte-testimonials').flickity({
        contain: false,
        cellSelector: '.absolutte-testimonial',
        cellAlign: 'center',
        prevNextButtons: false,
        pageDots: true,
        imagesLoaded: true
    });


    /*
    Blog Items Function
    =========================================================
    */
    $('.absolutte-blog-items').flickity({
        contain: false,
        cellSelector: '.absolutte-blog-item',
        cellAlign: 'center',
        prevNextButtons: false,
        pageDots: true,
        imagesLoaded: true,
        autoPlay: true
    });

    $('.absolutte-blog-items.absolutte-blog-items-style-3').flickity({
        contain: true,
        cellSelector: '.absolutte-blog-item',
        cellAlign: 'left',
        prevNextButtons: false,
        pageDots: true,
        imagesLoaded: true,
        autoPlay: true
    });



    $('body').on('click', '.absolutte-up-button', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    });

    $('.dropdown-toggle').dropdown();
    $('*[data-toggle="tooltip"]').tooltip();



    /*
    // Force Fullwidth
    //===========================================================
    */
    $.each($('.absolutte_row_fullwidth'), function(index, val) {
        $(this).wrap(function() {
            return '<div class="absolutte_force_fullwidth"><div class="absolutte_force_fullwidth_container"></div><div class="absolutte_force_fullwidth_height"></div></div><!-- /absolutte_force_fullwidth -->';
        });
    });
    // Full width background color
    $.each($('.absolutte_background_fullwidth'), function(index, val) {
        $(this).prepend('<div class="absolutte_bck_f"></div>');
    });

    window.onresize = function(event) {
        position_fullwidth_container()
    };
    function position_fullwidth_container(){
        $.each($('.absolutte_force_fullwidth'), function(index, val) {
            var fullwidth_pos = $(val).offset();
            var body_width = $("body").prop("clientWidth");
            if ( $('body').hasClass('absolutte-sidenav') && $(window).outerWidth() > 1264 ) {
                fullwidth_pos.left = fullwidth_pos.left - $('#header').width();
                body_width = body_width - $('#header').width();
            }
            var $absolutte_force_fullwidth_container = $(val).children('.absolutte_force_fullwidth_container');
            $absolutte_force_fullwidth_container.css('left', ( ( fullwidth_pos.left - ( fullwidth_pos.left * 2  ) ) ) );
            $absolutte_force_fullwidth_container.width( body_width );
            if ( $ql_products_slider.length ) { $ql_products_slider.flickity('resize'); }
            if ( $ql_products_carousel.length ) { $ql_products_carousel.flickity('resize'); }
            setTimeout(function(){ $(val).children('.absolutte_force_fullwidth_height').height( $absolutte_force_fullwidth_container.height() ); }, 400);
        });
        // Full width background color
        $.each($('.absolutte_background_fullwidth'), function(index, val) {
            var fullwidth_pos = $(val).offset();
            var body_width = $("body").prop("clientWidth");
            if ( $('body').hasClass('absolutte-sidenav') && $(window).outerWidth() > 1264 ) {
                fullwidth_pos.left = fullwidth_pos.left - $('#header').width();
                body_width = body_width - $('#header').width();
            }
            var $absolutte_bck_f = $(this).children('.absolutte_bck_f');
            $absolutte_bck_f.css('left', ( ( fullwidth_pos.left - ( fullwidth_pos.left * 2  ) ) ) );
            $absolutte_bck_f.width( body_width );
        });
    }
    position_fullwidth_container();
    setTimeout(function(){ position_fullwidth_container(); }, 600);




});













