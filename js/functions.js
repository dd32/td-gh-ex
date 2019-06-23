( function() {
	var navbar = document.getElementById( 'site-navigation' );
	var menu = document.getElementById( 'primary-menu' );
	var menuItems = navbar.querySelectorAll( '#primary-menu > .menu-item-has-children' );
	var parentLinks = navbar.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
	var menuToggler = navbar.getElementsByClassName( 'menu-toggle-btn' )[ 0 ];//toggles navbar on small screens
	if ( menu ) {
		var toggleButtons = menu.getElementsByClassName( 'dropdown-toggle' );//toggles submenus
	}
	var windowWidth = document.documentElement.clientWidth;
	var hasVerticalNavbar = document.body.classList.contains( 'navbar-side' );
	var hasLeftSidebar = document.body.classList.contains( 'left-sidebar' );
	var searchFormToggler = document.getElementsByClassName( 'searchform-toggle' )[ 0 ];
	var searchForm = document.getElementsByClassName( 'search-form' )[ 0 ];
	var closeLink = document.getElementsByClassName( 'hide-form-btn' )[ 0 ];
	var scrollButton = document.querySelector( '.anchor' );

	/* Polyfill for closest */
	if ( ! Element.prototype.matches ) {
		Element.prototype.matches = Element.prototype.msMatchesSelector || 
		Element.prototype.webkitMatchesSelector;
	}

	if ( ! Element.prototype.closest ) {
		Element.prototype.closest = function( s ) {
		var el = this;
	
		do {
			if ( el.matches( s ) ) {
				return el;
			}
			el = el.parentElement || el.parentNode;
			} while ( el !== null && el.nodeType === 1 );
			return null;
		};
	}
	
	if ( ! navbar ) {
		return;
	}

	if ( 'undefined' === typeof menuToggler ) {
		return;
	}

	// Hide menu toggle button if menu is empty and return early.
	if ( ! menu ) {
		menuToggler.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = parentLinks.length; i < len; i++ ) {
		parentLinks[ i ].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}
	
	//add toggle button for displaying submenu
	function addSubmenuToggler() {
		var itemsWithChildren = document.querySelectorAll( '.menu-item-has-children > a' );

		Array.prototype.forEach.call( itemsWithChildren, function( menuItem ) {
			var btn = document.createElement( 'button' );
			btn.className = 'dropdown-toggle';
			btn.insertAdjacentHTML( 'beforeend', '<span class="screen-reader-text">expand child menu</span>' );
			menuItem.appendChild( btn );
		} );
	}
	
	//change the direction of the dropdown menu if there is not enough space 
	function addClassDropdownLeft() {
		var subMenu, offsetLeft, offsetRight, subMenuWidth, marginSubMenu;
	
		Array.prototype.forEach.call( menuItems, function( menuItem ) {
			if ( menuItem.classList.contains( 'dropdown-left' ) ) {
				menuItem.classList.remove( 'dropdown-left' );
			}
		} );

		if ( hasVerticalNavbar && hasLeftSidebar ) {
			Array.prototype.forEach.call( menuItems, function( menuItem ) {
				menuItem.classList.add( 'dropdown-left' );
			} );
		} else {
			Array.prototype.forEach.call( menuItems, function( menuItem ) {
				subMenu = menuItem.querySelector( '.sub-menu' );
				offsetLeft = menuItem.getBoundingClientRect().left;
				subSubMenu = subMenu.querySelector( 'ul' );
				marginSubMenu = parseInt( getComputedStyle( subMenu ).marginLeft );
				offsetRight = windowWidth - ( offsetLeft + marginSubMenu );
				//calculate total width of 2nd and (if applicable) 3rd level menu
				subMenuWidth = subMenu.querySelector( 'li' ).offsetWidth  + ( subSubMenu ? subSubMenu.offsetWidth : 0 );

				if ( subMenuWidth > offsetRight ) {
					menuItem.classList.add( 'dropdown-left' );
				}
			} );
		}
	}

	//set minimum height of the main block to prevent the navbar from overlapping the footer
	//(for example if sidebar and post are shorter than navbar)
	function setMainHeight() {
		if ( hasVerticalNavbar && windowWidth >= 1024 ) {
			var navbarHeight = navbar.offsetHeight;
			document.getElementById( 'main' ).style.minHeight = navbarHeight + 'px';
		}
	}

	function toggleClass( elem, className ) {
		elem.classList.toggle( className );
	}

	function toggleSearchForm() {
		toggleClass( closeLink, 'hidden' );
		toggleClass( searchForm, 'visible' );
		toggleClass( searchFormToggler, 'hidden' );
		toggleAriaExpanded( searchFormToggler );
	}

	function toggleMenu() {
		toggleClass( navbar, 'toggled' );
		toggleAriaExpanded( menuToggler );
	}

	//set aria-expanded to a certain value or just toggle it
	function setAriaExpanded( el, newVal ) {
		el.setAttribute( 'aria-expanded', newVal );
	}

	function toggleAriaExpanded( el ) {
		setAriaExpanded( 
			el,
			el.getAttribute( 'aria-expanded' ) === 'true' ? 'false' : 'true'
		);
	}

	function setAllAriaExpanded() {
		if ( getComputedStyle( menu ).display === 'none' ) {
			setAriaExpanded( menuToggler, 'false' );
		} else {
			setAriaExpanded( menuToggler, 'true' );
		}

		if ( getComputedStyle( searchForm ).display === 'none' ) {
			setAriaExpanded( searchFormToggler, 'false' )
		} else {
			setAriaExpanded( searchFormToggler, 'true' );
		}
	}

	function toggleSubMenu( e ) {
		e.preventDefault();
		var parentLink = e.target.closest( 'li' );
		toggleClass( parentLink, 'focus' );
	}

	function collapseSubMenu() {
		Array.prototype.forEach.call( menuItems, function( menuItem ) {
			if ( menuItem.classList.contains( 'focus' ) ) {
				toggleClass( menuItem, 'focus' );
			}
		} );
	}

	//toggle .focus on touch screen (screen >= 768 only)
	function toggleFocus( e ) {
		var menuItem = this.parentNode, i;

		if ( ! menuItem.classList.contains( 'focus' ) ) {
			e.preventDefault();

			for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
				if ( menuItem === menuItem.parentNode.children[ i ] ) {
					continue;
				}
				menuItem.parentNode.children[ i ].classList.remove( 'focus' );
			}

			menuItem.classList.add( 'focus' );
		} else {
			menuItem.classList.remove( 'focus' );
		}
	}

	//remove .focus class from links when clicking outside of navigation bar (touch screen only)
	function removeFocus( e ) {
		if ( ! e.target.closest( '.main-navigation' ) ) {
			if ( ! parentLinks ) {
				return;
			}

			Array.prototype.forEach.call( parentLinks, function( link ) {
				if ( link.parentNode.classList.contains( 'focus' ) ) {
					link.classList.remove( 'focus' );
				}
			} );
		}
	}

	function handleResize() {
		windowWidth = document.documentElement.clientWidth;
		addClassDropdownLeft();
		setAllAriaExpanded();
		setMainHeight();
		collapseSubMenu();
	}

	//hide or display or lift the scroll button
	function handleScroll() {
		if ( pageYOffset === 0 ) {
			scrollButton.classList.add( 'hidden' );
		} else {
			scrollButton.classList.remove( 'hidden' );
		}
	}	

	addSubmenuToggler();
	addClassDropdownLeft();
	setAllAriaExpanded();
	setMainHeight();

	if ( pageYOffset === 0 ) {
		scrollButton.classList.add( 'hidden' );
	}

	/**
	* HANDLE EVENTS
	* -----------------------------------------------------------------------------------------------------------------------
	*/

	/**
	 * CLICK
	 */
	//toggle menu
	menuToggler.addEventListener( 'click', toggleMenu );

	//toggle submenu
	if ( toggleButtons ) {
		for (var i = 0; i < toggleButtons.length; i++ ) {
			toggleButtons[ i ].addEventListener( 'click', toggleSubMenu );
		}
	}

	//toggle search form
	searchFormToggler.addEventListener( 'click', toggleSearchForm );
	closeLink.addEventListener( 'click', toggleSearchForm );

	/**
	 * RESIZE
	 */
	
	window.addEventListener( 'resize', handleResize );

	/**
	 * SCROLL
	 */
	 window.addEventListener( 'scroll', handleScroll );

	 /**
	 * TOUCH
	 */
	 if ( 'ontouchstart' in window ) {
		document.addEventListener( 'touchstart', removeFocus );

		if ( windowWidth < 768 ) {
			return;
		}

		for ( var i = 0; i < parentLinks.length; ++i ) {
			parentLinks[ i ].addEventListener( 'touchstart', toggleFocus );
		}
	}

	//allow active styles in mobile webkit-based browsers
	document.addEventListener( 'touchstart', function(){}, false );

} )();
