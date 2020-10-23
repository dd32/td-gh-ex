/**
 * File main.js.
 *
 */

( function() {

	function toggleMenu() {

		const mobileNav = document.getElementById( 'mobile-navigation' );
		if ( ! mobileNav ) {
			return;
		}

		const body = document.body,
		menu = mobileNav.querySelector( 'ul' ),
		menuToggle = document.querySelector( '.mobile-header .menu-toggle' ),
		closePanel = document.getElementById( 'side-panel-close'),
		overlay = document.getElementById( 'side-panel-overlay');

		menu.setAttribute( 'aria-expanded', 'false' );

		menuToggle.addEventListener( 'click', () => {
			if ( mobileNav.classList.contains( 'is-open' ) ) {
				menuToggle.setAttribute( 'aria-expanded', 'false' );
				menu.setAttribute( 'aria-expanded', 'false' );
			} else {
				menuToggle.setAttribute( 'aria-expanded', 'true' );
				menu.setAttribute( 'aria-expanded', 'true' );
			}
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
			closePanel.focus();
		} );

		closePanel.addEventListener( 'click', () => {
			menuToggle.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
		} );

		overlay.addEventListener( 'click', () => {
			menuToggle.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
			mobileNav.classList.toggle( 'is-open' );
			body.classList.toggle( 'side-panel-open' );
		} );

	}

	function keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const mobileNav = document.getElementById( 'mobile-navigation' );

			if ( ! mobileNav || ! mobileNav.classList.contains( 'is-open' ) ) {
				return;
			}

			const closePanel = document.getElementById( 'side-panel-close'),
				elements = [...mobileNav.querySelectorAll( 'a, button' )],
				lastEl = elements[ elements.length - 1 ],
				firstEl = elements[0],
				activeEl = closePanel,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && lastEl === activeEl ) {
				e.preventDefault();
				firstEl.focus();
			}

			if ( shiftKey && tabKey && firstEl === activeEl ) {
				e.preventDefault();
				lastEl.focus();
			}
		} );
	}

	function toggleSubmenu() {
		const mobileNav = document.getElementById( 'mobile-navigation' );
		if ( ! mobileNav ) {
			return;
		}

		const buttons = [...mobileNav.querySelectorAll( '.sub-menu-toggle' )];

		buttons.forEach( button => {
			button.addEventListener( 'click', e => {
				e.preventDefault();
				const a = button.previousElementSibling, li = a.closest( 'li' );
				if ( li.classList.contains( 'is-open' ) ) {
					button.setAttribute( 'aria-expanded', 'false' );
					a.setAttribute( 'aria-expanded', 'false' );
				} else {
					button.setAttribute( 'aria-expanded', 'true' );
					a.setAttribute( 'aria-expanded', 'true' );
				}
				li.classList.toggle( 'is-open' );
			} );
		} );
	}

	function goToTop() {
		const button = document.getElementById( 'back-to-top' );

		if ( ! button ) {
			return;
		}

		window.addEventListener( 'scroll', () => {
			if ( window.scrollY > 480 ) {
				button.classList.add( 'is-visible' );
			} else {
				button.classList.remove( 'is-visible' );
			}
		} );

		button.addEventListener( 'click', e => {
			e.preventDefault();
			window.scrollTo( { top: 0, left: 0, behavior: 'smooth' } );
		} );
	}

	function openSearch() {
		const siteHeader = document.getElementById( 'masthead' );
		const openButtons = siteHeader.querySelectorAll( '.site-header .search-open' );

		if ( ! openButtons ) {
			return;
		}

		const searchItems = siteHeader.querySelectorAll( '.search-popup' ),
			inputFields = siteHeader.querySelectorAll( '.search-field' );

		openButtons.forEach( openButton => {
			openButton.addEventListener( 'click', e => {
				e.preventDefault();
				openButton.setAttribute( 'aria-expanded', 'true' );
				searchItems.forEach( function( searchItem ) {
					searchItem.classList.add( 'active' );
				} );
				inputFields.forEach( function( inputField ) {
					inputField.focus();
				} );
			} );
		} );
	}

	function closeSearch() {
		const siteHeader = document.getElementById( 'masthead' );
		const closeButtons = siteHeader.querySelectorAll( '.site-header .search-close' );

		if ( ! closeButtons ) {
			return;
		}

		const searchItems = siteHeader.querySelectorAll( '.search-popup' ),
			openButtons = siteHeader.querySelectorAll( '.site-header .search-open' );

		closeButtons.forEach( closeButton => {
			closeButton.addEventListener( 'click', e => {
				e.preventDefault();
				searchItems.forEach( function( searchItem ) {
					searchItem.classList.remove( 'active' );
				} );
				openButtons.forEach( function( openButton ) {
					openButton.focus();
					openButton.setAttribute( 'aria-expanded', 'false' );
				} );
			} );
		} );
	}

	function getAdminBarHeight() {
		const adminBar = document.getElementById( 'wpadminbar' );

		if ( ! adminBar ) {
			return;
		}

		adminBarHeight = adminBar.getBoundingClientRect().height;
		return Number( adminBarHeight );
	}

	function stickyHeader() {
		const header  = document.getElementById( 'masthead' );
		const headerSticky = header.querySelector( '.is-fixed' );

		if ( ! headerSticky ) {
			return;
		}

		var paddingTop = 60;
		var headerHeight = Number( headerSticky.getBoundingClientRect().height );
		const sidePanel = document.getElementById( 'side-panel' );
		let isMobile = window.matchMedia("only screen and (max-width: 600px)").matches;

		if ( getAdminBarHeight() && ! isMobile ) {
			paddingTop = getAdminBarHeight() + 60;
			headerSticky.style.setProperty( 'top', getAdminBarHeight() + 'px' );
		}

		window.addEventListener( 'scroll', event => {
			const { scrollTop } = event.target.scrollingElement;
			headerSticky.classList.toggle( 'sticky-header', scrollTop >= headerHeight );
			if (  scrollTop >= headerHeight ) {
				document.body.style.setProperty( 'padding-top', paddingTop + 'px' );
				if ( getAdminBarHeight() && isMobile ) {
					sidePanel.style.setProperty( 'top', 0 );
				}
			} else {
				document.body.style.removeProperty( 'padding-top' );
				if ( getAdminBarHeight() && isMobile ) {
					sidePanel.style.removeProperty( 'top' );
				}
			}
		} );
	}

	toggleMenu();
	keepFocusInMenu();
	toggleSubmenu();
	goToTop();
	openSearch();
	closeSearch();
	stickyHeader();

}() );
