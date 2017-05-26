/**
 * Functionality specific to Aguafuerte.
 *
 * Provides helper functions to enhance the theme experience.
 */

(function($) {
	
	menuToggle = $('.menu-toggle');
	siteNavigation = $('#masthead');
	_window = $(window);

if (881 > _window.width()) {
	var dropdownToggle = $('<button />', {'class': 'dropdown-toggle'});
}


function switchClass (a, b, c) {
	if(a.hasClass(b)){
		a.removeClass(b);
		a.addClass(c);
	}
	else{
		a.removeClass(c);
		a.addClass(b);
	}
}

function onResizeARIA() {
		if ( 881 > _window.width() ) {
			menuToggle.attr( 'aria-expanded', 'false' );
			siteNavigation.attr( 'aria-expanded', 'false' );
			menuToggle.attr( 'aria-controls', 'nav-menu' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

_window.on('load', onResizeARIA());

menuToggle.click(function(){
	$(this).toggleClass('toggled-on');
	siteNavigation.toggleClass('toggled-on');

	if($(this).hasClass('toggled-on')){
		$(this).attr('aria-expanded', 'true');
		siteNavigation.attr('aria-expanded', 'true');        
	}
	else {
		$(this).attr('aria-expanded', 'false');
		siteNavigation.attr('aria-expanded', 'false');
	}
	//$(this).attr('aria-expanded', $(this).attr('aria-expanded') === 'false' ? 'true' : 'false');
	//siteNavigation.attr('aria-expanded', $(this).attr('aria-expanded') === 'false' ? 'true' : 'false');

});


siteNavigation.find( 'li:has(ul) > a' ).after(dropdownToggle);

siteNavigation.find( '.dropdown-toggle' ).click( function(e) {
			var _this = $( this );
			
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.sub-menu' ).toggleClass( 'toggled-on' );

			// _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			//_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );

siteNavigation.find( '.menu a' ).on( 'focus blur', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );

	
})( jQuery );

