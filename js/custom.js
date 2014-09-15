/**
 * Conica Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
        // Insert up arrow for navigation
        $( '.navigation-main ul li a' ).wrapInner( '<span class="nav-span"></span>' );
        $( '.navigation-main ul.sub-menu' ).prepend( '<span class="nav-arrow"></span>' );
        
		// Adding padding to the footer widgets
		$('.footer-widgets .widget').wrapInner('<div class="footer-widgets-pad" />');
		// Add class to last footer widget
		$('.footer-widgets .widget:last').addClass('footer-widget-last');
		
        // Search Show / Hide
        $(".search-button").toggle(function(){
            $(".search-block").animate( { bottom: '-=55' }, 120 );
            $(".search-block .search-field").focus();
        },function(){
            $(".search-block").animate( { bottom: '+=55' }, 120 );
        });
        
        // Scroll To Top Button Functionality
        $(".scroll-to-top").bind("click", function() {
            $('html, body').animate( { scrollTop: 0 }, 800 );
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        // Banner height setter
        $(".banner-full-width-on").parent().addClass("banner-full-width-on-parent").css("height", $(".banner-full-width-on").height());
        
        // Function to make the Icon always be square
        $('.conica-icon-inner').each(function(c) {
            var this_icon = $(this);
            var this_icon_id = 'conica-icon-'+c;
            this_icon.attr('id', this_icon_id);
            $('#conica-icon-'+c).css('min-width', $('#conica-icon-'+c).height());
        });
        
    }).resize();
    
    $(window).load(function() {
        conica_home_slider();
        conica_carousel();
        conica_blog_list_carousel();
    });
    
    function conica_carousel() {
        $(".conica-carousel-wrapper").each(function(c) {
            var this_carousel = $(this);
            var this_carousel_id = 'conica-carousel-id-'+c;
            var column_no = this_carousel.data('columns');
            this_carousel.attr('id', this_carousel_id);
            $('#'+this_carousel_id+' .conica-carousel').carouFredSel({
                responsive: true,
                scroll: null,
                circular: false,
                infinite: false,
                auto: false,
                onCreate: function(items) {
                    this_carousel.removeClass('conica-carousel-remove-load');
                    $('#'+this_carousel_id+' .conica-carousel').removeClass('conica-carousel-remove');
                },
                items: {
                    width: 300,
                    height: '200px',
                    visible: {
                        min: 1,
                        max: column_no
                    }
                },
                pagination: {
                    container: '#'+this_carousel_id+' .conica-carousel-pagination'
                },
                prev: '#'+this_carousel_id+' .conica-carousel-arrow-prev',
                next: '#'+this_carousel_id+' .conica-carousel-arrow-next'
            });
        });
    }
    
    function conica_blog_list_carousel() {
        $(".conica-blog-standard-block-img-carousel-wrapper").each(function(c) {
            var this_blog_carousel = $(this);
            var this_blog_carousel_id = 'conica-blog-standard-block-img-carousel-id-'+c;
            this_blog_carousel.attr('id', this_blog_carousel_id);
            $('#'+this_blog_carousel_id+' .conica-blog-standard-block-img-carousel').carouFredSel({
                responsive: true,
                circular: false,
                width: 580,
                height: "variable",
                items: {
                    visible: 1,
                    width: 580,
                    height: 'variable'
                },
                onCreate: function(items) {
                    $('#'+this_blog_carousel_id).removeClass('conica-blog-standard-block-img-wrapper-remove');
                    $('#'+this_blog_carousel_id+' .conica-blog-standard-block-img-carousel').removeClass('conica-blog-standard-block-img-remove');
                },
                scroll: 500,
                auto: false,
                prev: '#'+this_blog_carousel_id+' .conica-blog-standard-block-img-prev',
                next: '#'+this_blog_carousel_id+' .conica-blog-standard-block-img-next'
            });
        });
    }
    
    function conica_home_slider() {
        var home_slider_auto = $('#conica-home-slider-wrapper').data('auto');
        var home_slider_circular = $('#conica-home-slider-wrapper').data('circular');
        var home_slider_infinite = $('#conica-home-slider-wrapper').data('infinite');
        
        $("#conica-home-slider").carouFredSel({
            responsive: true,
            circular: home_slider_circular,
            infinite: home_slider_infinite,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                $("#conica-home-slider-wrapper").removeClass("conica-home-slider-remove");
            },
            scroll: {
                fx: 'crossfade',
                duration: 450
            },
            auto: home_slider_auto,
            pagination: '#conica-home-slider-pager',
            prev: "#conica-home-slider-prev",
            next: "#conica-home-slider-next"
        });
    }
} )( jQuery );