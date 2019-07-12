( function() {
	var navbar = actinia.navbar,
	menu = actinia.menu,
	parentLinks = actinia.parentLinks,
	menuToggler = actinia.menuToggler,
	searchFormToggler = actinia.searchFormToggler,
	closeLink = actinia.closeLink,
	scrollButton = actinia.scrollButton,
	tables = actinia.tables,
	updateDropdownDirection = actinia.updateDropdownDirection,
	setMainHeight = actinia.setMainHeight,
	toggleSearchForm = actinia.toggleSearchForm,
	toggleMenu = actinia.toggleMenu,
	addSubmenuToggler = actinia.addSubmenuToggler,
	toggleOnClick = actinia.toggleOnClick,
	removeFocus = actinia.removeFocus,
	handleResize = actinia.handleResize,
	handleScroll = actinia.handleScroll,
	wrapTables = actinia.wrapTables,
	setAllAriaExpanded = actinia.setAllAriaExpanded;


	//toggle search form
	searchFormToggler.addEventListener( 'click', toggleSearchForm );
	closeLink.addEventListener( 'click', toggleSearchForm );

	//hide or show scroll to top button
	window.addEventListener( 'scroll', handleScroll );

	//wrap tables in div to allow scrolling
	if ( tables ) {
		wrapTables();
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

	addSubmenuToggler();
	updateDropdownDirection();
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
	toggleOnClick();

	/**
	 * RESIZE & ORIENTATION CHANGE
	 */
	
	window.addEventListener( 'resize', handleResize );
	window.addEventListener( 'orientationchange', handleResize );

	 /**
	 * TOUCH
	 /* */
	if ( 'ontouchstart' in window ) {
		document.addEventListener( 'touchstart', removeFocus );
	}
 
	//allow active styles in mobile webkit-based browsers
	document.addEventListener( 'touchstart', function(){}, false );

} )();