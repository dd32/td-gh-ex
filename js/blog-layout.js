/**
 * Alba Theme Custom Blog Functionality
 *
 */
( function( $ ) {
    
    $(window).load(function() {
        
        var isotope_container = $('.blog-grid-layout .blog-list-wrap');
        // init
        isotope_container.isotope({
            // options
            itemSelector: '.alba-blog-grid-block',
            layoutMode: 'masonry',
            onLayout: onBlogGridLayout()
        });
        
    });
    
    function onBlogGridLayout() {
        $('.blog-list-wrap').removeClass('blog-list-wrap-remove');
    }
    
} )( jQuery );