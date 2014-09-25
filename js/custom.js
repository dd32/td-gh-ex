/**
 * Electa Theme Custom Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        
		// Search Show / Hide
        $(".search-btn").toggle(function(){
            $(".search-button").addClass('search-on');
            $(".search-block").show().animate( { left: '+=5' }, 200 );
            $(".search-block .search-field").focus();
        },function(){
            $(".search-block").animate( { left: '-=5' }, 200 ).hide();
            $(".search-button").removeClass('search-on');
        });
		
    });
    
    $(window).resize(function () {
        $(".site-content").width( $( window ).width() - 280 );
        
        
    }).resize();
    
    $(window).load(function() {
        //electa_home_slider();
        electa_carousel();
        //electa_post_images();
        //electa_blog_list_carousel();
    });
    
    function electa_carousel() {
        $(".electa-carousel-wrapper").each(function(c) {
            var this_carousel = $(this);
            var this_carousel_id = 'electa-carousel-id-'+c;
            var column_no = this_carousel.data('columns');
            this_carousel.attr('id', this_carousel_id);
            $('#'+this_carousel_id+' .electa-carousel').carouFredSel({
                responsive: true,
                scroll: null,
                circular: false,
                infinite: false,
                auto: false,
                onCreate: function(items) {
                    this_carousel.removeClass('electa-carousel-remove-load');
                    $('#'+this_carousel_id+' .electa-carousel').removeClass('electa-carousel-remove');
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
                    container: '#'+this_carousel_id+' .electa-carousel-pagination'
                },
                prev: '#'+this_carousel_id+' .electa-carousel-arrow-prev',
                next: '#'+this_carousel_id+' .electa-carousel-arrow-next'
            });
        });
    }

    function electa_post_images() {
        $(".electa-pi-wrapper").each(function(c) {
            var this_pi_carousel = $(this);
            var this_pi_carousel_id = 'electa-pi-carousel-id-'+c;
            this_pi_carousel.attr('id', this_pi_carousel_id);

            $('#'+this_pi_carousel_id+'.electa-pi-wrapper').hover(function() {
                $('#'+this_pi_carousel_id+' .electa-pi-pager').addClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-prev').addClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-next').addClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-carousel').trigger( 'next' );
            }, function() {
                $('#'+this_pi_carousel_id+' .electa-pi-pager').removeClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-prev').removeClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-next').removeClass( 'visible' );
                $('#'+this_pi_carousel_id+' .electa-pi-carousel').trigger( 'prev' );
            });

            $('#'+this_pi_carousel_id+' .electa-pi-carousel').carouFredSel({
                circular: false,
                infinite: false,
                direction: 'up',
                auto: false,
                scroll: {
                    queue: 'last'
                }
            });
            $('#'+this_pi_carousel_id+' .electa-pi-images').carouFredSel({
                circular: false,
                infinite: false,
                auto: false,
                pagination: '#'+this_pi_carousel_id+' .electa-pi-pager',
                prev: '#'+this_pi_carousel_id+' .electa-pi-prev',
                next: '#'+this_pi_carousel_id+' .electa-pi-next'
            });
        });
    }
    
    function electa_blog_list_carousel() {
        $(".electa-blog-standard-block-img-carousel-wrapper").each(function(c) {
            var this_blog_carousel = $(this);
            var this_blog_carousel_id = 'electa-blog-standard-block-img-carousel-id-'+c;
            this_blog_carousel.attr('id', this_blog_carousel_id);
            $('#'+this_blog_carousel_id+' .electa-blog-standard-block-img-carousel').carouFredSel({
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
                    $('#'+this_blog_carousel_id).removeClass('electa-blog-standard-block-img-wrapper-remove');
                    $('#'+this_blog_carousel_id+' .electa-blog-standard-block-img-carousel').removeClass('electa-blog-standard-block-img-remove');
                },
                scroll: 500,
                auto: false,
                prev: '#'+this_blog_carousel_id+' .electa-blog-standard-block-img-prev',
                next: '#'+this_blog_carousel_id+' .electa-blog-standard-block-img-next'
            });
        });
    }
    
} )( jQuery );