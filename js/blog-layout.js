/**
 * Conica Theme Custom Blog Functionality
 *
 */
( function( $ ) {
    
    $(window).load(function() {
        
        // Initialize the Masonry plugin
        var grid = $( '.blog-grid-layout-wrap-inner' ).masonry({
            columnWidth: '.blog-grid-layout',
            itemSelector: '.blog-grid-layout',
            percentPosition: true
        });

        // Once all images within the grid have loaded lay out the grid
        $( '.blog-grid-layout-wrap-inner' ).imagesLoaded( function() {
            grid.masonry('layout');
        });

        // Once the layout is complete hide the loader. Triggering the window resize event fixes a small spacing issue on the grid 
        grid.one( 'layoutComplete', function() {
            $( '.blog-grid-layout-wrap' ).removeClass( 'blog-grid-layout-wrap-remove' );
            $(window).resize();
        } );
        
    });
    
} )( jQuery );