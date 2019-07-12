var actinia = ( function() {
	var navbar = document.getElementById( 'site-navigation' );
	var menu = document.getElementById( 'primary-menu' );
	var menuItemsWithChildren = navbar.querySelectorAll( '#primary-menu > .menu-item-has-children' );
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
	var tables = document.getElementById('primary').getElementsByTagName( 'table' );
	var _forEach = Array.prototype.forEach;
	var resized;

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

	//change the direction of the dropdown menu if there is not enough space 
	function updateDropdownDirection() {
		if (windowWidth < 768) {
			return;
		}

		var subMenu, offsetRight, subMenuWidth;
		hasVerticalNavbar = document.body.classList.contains( 'navbar-side' );
		hasLeftSidebar = document.body.classList.contains( 'left-sidebar' );

		_forEach.call( menuItemsWithChildren, function( menuItem ) {
			if ( menuItem.classList.contains( 'dropdown-left' ) ) {
				menuItem.classList.remove( 'dropdown-left' );
			}
		} );

		if ( windowWidth >= 1024 && hasVerticalNavbar && hasLeftSidebar ) {
			_forEach.call( menuItemsWithChildren, function( menuItem ) {
				menuItem.classList.add( 'dropdown-left' );
			} );
		} else if ( windowWidth >= 1024 && hasVerticalNavbar ) {
			//return if navbar is on the left
			return;
		} else {
			_forEach.call( menuItemsWithChildren, function( menuItem ) {
				subMenu = menuItem.querySelector( '.sub-menu' );
				offsetRight = getOffsetRight( menuItem );
				
				//calculate total width of 2nd and (if applicable) 3rd level menu
				subMenuWidth = totalSubMenuWidth( subMenu );
				if ( subMenuWidth > offsetRight ) {
					menuItem.classList.add( 'dropdown-left' );
				}
			} );
		}
	}

	function getOffsetRight( menuItem ) {
		var offsetLeft = menuItem.getBoundingClientRect().left;
		return windowWidth - ( offsetLeft );
	}

	//calculate total width of 2nd and (if applicable) 3rd level menu
	function totalSubMenuWidth( subMenu ) {
		var subSubMenu = subMenu.querySelector( 'ul' );
		var marginSubMenu = parseInt( getComputedStyle( subMenu ).marginLeft );

		return menuWidth( subMenu ) + marginSubMenu + ( subSubMenu ? menuWidth( subSubMenu ) : 0 );
	}

	function menuWidth( menu ) {
		var boxShadow = 16;
		return menu.offsetWidth + boxShadow;
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

	function removeToggled() {
		navbar.classList.remove( 'toggled' );
	}

	//add toggle button for displaying submenu
	function addSubmenuToggler() {
		var itemsWithChildren = menu.querySelectorAll( '.menu-item-has-children > a' );
		_forEach.call( itemsWithChildren, function( menuItem ) {
			var btn = document.createElement( 'button' );
			var text = menuItem.textContent;
			var span = document.createElement( 'span' );
			span.className = 'link-text';
			menuItem.textContent = '';
			span.textContent = text;
			btn.className = 'dropdown-toggle';
			btn.insertAdjacentHTML( 'beforeend', '<span class="screen-reader-text">expand child menu</span>' );
			menuItem.appendChild( span );
			menuItem.appendChild( btn );
		} );
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
	};

	function toggleOnClick() {
		if ( ! toggleButtons ) {
			return;
		}
		for (var i = 0; i < toggleButtons.length; i++ ) {
			if ( windowWidth < 768 || 'ontouchstart' in window ) {
				toggleButtons[ i ].addEventListener( 'click', toggleFocus );
			} else if (resized) {
				toggleButtons[ i ].removeEventListener( 'click', toggleFocus );
			}
		}
	}

	function collapseSubMenu() {
		_forEach.call( menuItemsWithChildren, function( menuItem ) {
			if ( menuItem.classList.contains( 'focus' ) ) {
				toggleClass( menuItem, 'focus' );
			}
		} );
	}

	//toggle .focus on touch screen (screen >= 768 only)
	function toggleFocus( e ) {
		var menuItem = this.closest('li'), i;
		e.preventDefault();

		if ( ! menuItem.classList.contains( 'focus' ) ) {

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

			_forEach.call( parentLinks, function( link ) {
				if ( link.parentNode.classList.contains( 'focus' ) ) {
					link.parentNode.classList.remove( 'focus' );
				}
			} );
		}
	}

	function handleResize() {
		resized = true;
		windowWidth = document.documentElement.clientWidth;
		updateDropdownDirection();
		setAllAriaExpanded();
		setMainHeight();
		collapseSubMenu();
		if ( windowWidth >= 768 && navbar.classList.contains( 'toggled' ) ) {
			removeToggled();
		}
		toggleOnClick();
	}

	//hide or display or lift the scroll button
	function handleScroll() {
		if ( pageYOffset === 0 ) {
			scrollButton.classList.add( 'hidden' );
		} else {
			scrollButton.classList.remove( 'hidden' );
		}
	}

	//add wrapper to tables to allow scrolling
	function wrapTables() {
		if (! tables ) {
			return;
		}

		_forEach.call( tables, function( table ) {
			var wrapper = document.createElement( 'div' );
			table.parentElement.appendChild( wrapper );
			wrapper.classList.add( 'table-wrapper' );
			wrapper.appendChild( table );
		} );
	}

	return {
		navbar: navbar,
		menu: menu,
		parentLinks: parentLinks,
		menuToggler: menuToggler,
		windowWidth: windowWidth,
		searchFormToggler: searchFormToggler,
		closeLink: closeLink,
		scrollButton: scrollButton,
		tables: tables,
		updateDropdownDirection: updateDropdownDirection,
		getOffsetRight: getOffsetRight,
		setMainHeight: setMainHeight,
		toggleSearchForm: toggleSearchForm,
		toggleMenu: toggleMenu,
		addSubmenuToggler: addSubmenuToggler,
		toggleOnClick: toggleOnClick,
		removeFocus: removeFocus,
		handleResize: handleResize,
		handleScroll: handleScroll,
		wrapTables: wrapTables,
		setAllAriaExpanded: setAllAriaExpanded
	};
}() );
