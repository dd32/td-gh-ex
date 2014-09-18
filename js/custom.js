jQuery(document).ready(function($){
    var headerHeight = $('#masthead').outerHeight();
    $('#go-top, .next-page').localScroll({
        offset: {
        top: -headerHeight
     }
    });

    $(window).scroll(function(){
        if($(window).scrollTop() > 200){
            $('#go-top').fadeIn();
        }else{
            $('#go-top').fadeOut();
        }
    });

	$('.parallax-on.home .nav').onePageNav({
		currentClass: 'current',
    	changeHash: false,
    	scrollSpeed: 1500,
    	scrollOffset: headerHeight,
    	scrollThreshold: 0.5,
	});

	$(window).resize(function(){
    var headerHeight = $('#masthead').outerHeight();
    $('.parallax-on #content').css('padding-top', headerHeight);

    $('.slider-caption').each(function(){
    var cap_height = $(this).actual( 'outerHeight' );
    $(this).css('margin-top',-(cap_height/2));
    });

    }).resize();;

    $('#main-slider .overlay').prependTo('#main-slider .slides');

    $('.testimonial-slider').bxSlider({
        auto:true,
        speed: 1000,
        pause: 8000,
        pager:false,
        nextText: '&#8250',
        prevText: '&#8249'
    });

    $('.team-slider').bxSlider({
        auto:false,
        pager:false,
        nextText: '&#8250',
        prevText: '&#8249',
        moveSlides : 1,
        minSlides: 2,
        maxSlides: 7,
        slideWidth: 140,
        slideMargin: 20,
        infiniteLoop: false,
        hideControlOnEnd: true
    });

    $('.team-content .team-list:first').show();
    $('.team-tab .team-image:first').addClass('active');

    $('.team-tab .team-image').on('click', function(){
        $('.team-image').removeClass('active');
        $('.team-content .team-list').hide();
        $(this).addClass('active');
        var teamid = $(this).attr('id');
        $('.team-content .'+teamid).fadeIn();
        return false;
    });

    $(window).bind('load',function(){
        $('.googlemap-content').hide();  
    });
    
    $('.googlemap-toggle').on('click', function(){
        $('.googlemap-content').slideToggle();
        $(this).toggleClass('active');
    });

    $('.social-icons a').each(function(){
    var title = $(this).attr('data-title')
    $(this).find('span').text(title);
    });

    $('.gallery-item a').each(function(){
        $(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    $(".fancybox-gallery").nivoLightbox();

    $('.menu-toggle').click(function(){
        $(this).next('ul').slideToggle();
    });

    $("#content").fitVids();
});