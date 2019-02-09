/**
 * Toggle a class on scroll to display scroll button.
 *
 * @since 1.0.0
 */

function postsSlider() {
	var containers = $( '.slider-wrapper' );

	containers.each( function() {
		var container  = $(this),
			slides     = container.find( '.dp-entry' ),
			nextBtn    = container.find( '.dp-next-slide' ),
			prevBtn    = container.find( '.dp-prev-slide' ),
			current    = slides.first(),
			prev;

		current.addClass( 'makeitvisible firstslide' );

		nextBtn.click( function() {
			slideTimer('next');
		} );

		prevBtn.click( function() {
			slideTimer('prev');
		} );

		function slideTimer(direction) {
			var height;
			direction = direction || 'next';
			prev      = current;

			if ( 'next' === direction ) {
				current = current.next( '.dp-entry' );
				current = ( 0 === current.length ) ? slides.first() : current;
			}
			
			if ( 'prev' === direction ) {
				current = current.prev( '.dp-entry' );
				current = ( 0 === current.length ) ? slides.last() : current;
			}

			current.addClass( 'makeitvisible' );
			prev.removeClass( 'makeitvisible' );
			if ( container.hasClass( 'slider2' ) ) {
				height = current.height();
				container.animate({
					height: height
				}, 1000);
			}
		}
	} );
}
postsSlider();
