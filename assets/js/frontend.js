/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

/* global Atlanticl10n, jetpackLazyImagesModule  */
( function( $ ) {

	var atlantic = atlantic || {};

	atlantic.init = function() {

		atlantic.$body 		= $( document.body );
		atlantic.$window 	= $( window );
		atlantic.$html 		= $( 'html' ),
		atlantic.$masonryEntries = $( '.site-content .masonry-container' ),
		atlantic.$masonryWidgets = $( '.widget-area .masonry-container' );

		this.inlineSVG();
		this.fitVids();
		this.smoothScroll();
		this.subMenuToggle();
		this.masonry();
		this.equalHeightProduct();
		this.entryGallery();
		this.returnTop();
		this.event();

	};

	atlantic.supportsInlineSVG = function() {

		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );

	};

	atlantic.inlineSVG = function() {

		if ( true === atlantic.supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
		}

	};

	atlantic.fitVids = function() {

		$( '#page' ).fitVids({
			customSelector: 'iframe[src^="https://videopress.com"]'
		});

	};

	atlantic.smoothScroll = function() {

		var $smoothScroll 	= $( 'a[href*="#content"], a[href*="#site-navigation"], a[href*="#secondary"], a[href*="#page"]' );

		$smoothScroll.click(function(event) {
	        // On-page links
	        if (
	            location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
	            location.hostname === this.hostname
	        ) {
	            // Figure out element to scroll to
	            var target = $(this.hash);
	            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	            // Does a scroll target exist?
	            if (target.length) {
	                // Only prevent default if animation is actually gonna happen
	                event.preventDefault();
	                $('html, body').animate({
	                    scrollTop: target.offset().top
	                }, 500, function() {
	                    // Callback after animation
	                    // Must change focus!
	                    var $target = $(target);
	                    $target.focus();
	                    if ($target.is(':focus')) { // Checking if the target was focused
	                        return false;
	                    } else {
	                        $target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
	                        $target.focus(); // Set focus again
	                    }
	                });
	            }
	        }
		});

	};

	atlantic.subMenuToggle = function() {

		$( '.main-navigation .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-expanded="false">' + Atlanticl10n.expandMenu + Atlanticl10n.collapseMenu + Atlanticl10n.subNav + '</button>' );
		$( '.sub-menu-toggle' ).on( 'click', function( e ) {

			e.preventDefault();

			var $this = $( this );

			$this.attr( 'aria-expanded', function( index, value ) {
				return 'false' === value ? 'true' : 'false';
			});

			// Add class to toggled menu
			$this.toggleClass( 'toggled' );
			$this.next( '.sub-menu' ).slideToggle( 0 );

		});

	};

	atlantic.masonry = function() {

		atlantic.$masonryEntries.masonry({
			itemSelector: '.entry',
			columnWidth: '.entry'
		});

		atlantic.$masonryWidgets.masonry({
			itemSelector: '.widget',
			columnWidth: '.widget'
		});

	};

	atlantic.masonryRefresh = function() {
		atlantic.$masonryEntries.masonry( 'reloadItems' );
		atlantic.$masonryEntries.masonry( 'layout' );
		atlantic.$masonryWidgets.masonry( 'reloadItems' );
		atlantic.$masonryWidgets.masonry( 'layout' );
	};

	atlantic.equalHeightProduct = function() {

		var $products = $( 'ul.products' ),
        	highestBox = 0;

       $products.find( 'li.product' ).each(function(){
            $(this).css('height','auto');
            if($(this).height() > highestBox){
                highestBox = $(this).height();
            }
        });

        $products.find( 'li.product' ).height(highestBox);

	};

	atlantic.entryGallery = function() {

		$( '.entry-gallery' ).each( function() {

			var galleryID = $(this).attr('id');

			if ( 'undefined' === typeof galleryID ) {
				return;
			}

			$( '#'+ galleryID ).not('.slick-initialized').slick({
				arrows: false,
				dots: true,
				adaptiveHeight: true,
				fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 5000,
				dotsClass: 'atlantic-slick-dots'
			});

		});

	};

	atlantic.returnTop = function() {

		var $returnTop	= $('.return-to-top');

		atlantic.$window.scroll(function () {
		    if ($(this).scrollTop() > 500) {
		        $returnTop.removeClass('off').addClass('on');
		    }
		    else {
		        $returnTop.removeClass('on').addClass('off');
		    }
		});

	};

	atlantic.event = function() {

		atlantic.$window.on( 'load resize', function(){
			atlantic.masonryRefresh();
			atlantic.equalHeightProduct();
		});

		atlantic.$body.on( 'post-load', function () {
			atlantic.masonryRefresh();
			atlantic.fitVids();
		});

		atlantic.$body.on( 'ajaxComplete', function() {
			atlantic.$masonryWidgets.masonry( 'reloadItems' );
			atlantic.$masonryWidgets.masonry( 'layout' );
			atlantic.equalHeightProduct();
		});

		atlantic.$body.on( 'afterChange', function () {
			atlantic.$masonryEntries.masonry( 'reloadItems' );
			atlantic.$masonryEntries.masonry( 'layout' );
		});

		atlantic.$body.on( 'afterChange', function () {
		    if ( 'undefined' === typeof jetpackLazyImagesModule ) {
		        return;
		    }
			jetpackLazyImagesModule( $ );
		});

	};

	/** Initialize atlantic.init() */
	$( function() {

		atlantic.init();

	    if ( 'undefined' === typeof wp || ! wp.customize || ! wp.customize.selectiveRefresh ) {
	        return;
	    }

	    wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {

	    	if ( placement.partial.id ) {
	    		atlantic.subMenuToggle();
	    	}

	    });

		wp.customize.selectiveRefresh.bind( 'sidebar-updated', function( sidebarPartial ) {

			if ( 'sidebar-1' === sidebarPartial.sidebarId ) {
	            atlantic.$footerWidgets.masonry( 'reloadItems' );
	            atlantic.$footerWidgets.masonry( 'layout' );
			}

		});

	});

} )( jQuery );
