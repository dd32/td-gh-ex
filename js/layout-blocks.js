/**
 * Conica Theme Custom Home & Blog Functionality
 *
 */
( function( $ ) {
    
    $(window).load(function() {
        
        var isotope_container = $('.body-blocks-layout .blocks-wrap');
        // init
        isotope_container.isotope({
            // options
            itemSelector: '.electa-blocks-post',
            layoutMode: 'masonry',
            onLayout: onBlocksLayout()
        });
        
    });
    
    function onBlocksLayout() {
        $('.blocks-wrap').removeClass('blocks-wrap-remove');
    }
    
} )( jQuery );