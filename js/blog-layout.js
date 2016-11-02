/**
 * Conica Theme Custom Blog Functionality
 *
 */
( function( $ ) {
    
    $(window).load(function() {
        var $container = $( '.blog-grid-layout-wrap-inner' );
        
        // initialize
        $container.masonry({
            columnWidth: '.blog-grid-layout',
            itemSelector: '.blog-grid-layout'
        });
        
        // Show layout once Masonry is complete
        $container.masonry( 'on', 'layoutComplete', onBlogGridLayout() );
        
    });
    
    function onBlogGridLayout() {
        $( '.blog-grid-layout-wrap' ).removeClass( 'blog-grid-layout-wrap-remove' );
    }
    
} )( jQuery );