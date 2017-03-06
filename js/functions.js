/* 
 * Scripts de Bassist.
 */

(function ($) {
	
menuToggle = $('.menu-toggle');
siteNavigation = $('#masthead');
linkToggle = $('#main-menu a');
_window = $(window);

if (881 > _window.width()) {
	var dropdownToggle = $('<button />', {'class': 'dropdown-toggle'})
					.append( $( '<i />', {'class': 'fa fa-caret-right', 'aria-hidden': 'true'}));
} else {
	var dropdownToggle = $('<i />', {'class': 'fa fa-caret-right', 'aria-hidden': 'true'});
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
			dropdownToggle.attr( 'aria-expanded', 'false' );
			menuToggle.attr( 'aria-controls', '.nav-menu' );
			dropdownToggle.attr( 'aria-controls', '.sub-menu' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			dropdownToggle.removeAttr('aria-expanded');
			menuToggle.removeAttr( 'aria-controls' );
			dropdownToggle.removeAttr('aria-controls');
		}
	}

_window.on('load', onResizeARIA());

if (881 > _window.width()) {
	// This linkToggle click function is needed to close the menu if the links are anchors in the same page.
	linkToggle.click(function() {
		menuToggle.children('i').removeClass("fa fa-times").addClass("fa fa-bars");
		menuToggle.removeClass('toggled-on').attr('aria-expanded', 'false');
		siteNavigation.removeClass('toggled-on').attr('aria-expanded', 'false');
	});

menuToggle.click(function(){
	switchClass($(this).children('i'), 'fa-bars', 'fa-times');
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
});
}

siteNavigation.find( 'li:has(ul) > a' ).after(dropdownToggle);

siteNavigation.find( '.dropdown-toggle' ).click( function(e) {
			var _this = $( this );
			var _i = _this.children('i');
			
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.sub-menu' ).toggleClass( 'toggled-on' );
			switchClass (_i, 'fa-caret-right', 'fa-caret-down');

			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			//_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );

siteNavigation.find( 'a' ).on( 'focus blur', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );

menuToggle.on( 'focus', function(){
	$('#main-menu').addClass('focused');
});

$('.nav-menu > li:last-of-type a:last').on( 'focusout', function(){
	$('#main-menu').removeClass('focused');
} );


})( jQuery );



