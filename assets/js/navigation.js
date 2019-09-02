/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var bestwp_secondary_container, bestwp_secondary_button, bestwp_secondary_menu, bestwp_secondary_links, bestwp_secondary_i, bestwp_secondary_len;

    bestwp_secondary_container = document.getElementById( 'bestwp-secondary-navigation' );
    if ( ! bestwp_secondary_container ) {
        return;
    }

    bestwp_secondary_button = bestwp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof bestwp_secondary_button ) {
        return;
    }

    bestwp_secondary_menu = bestwp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof bestwp_secondary_menu ) {
        bestwp_secondary_button.style.display = 'none';
        return;
    }

    bestwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === bestwp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        bestwp_secondary_menu.className += ' nav-menu';
    }

    bestwp_secondary_button.onclick = function() {
        if ( -1 !== bestwp_secondary_container.className.indexOf( 'bestwp-toggled' ) ) {
            bestwp_secondary_container.className = bestwp_secondary_container.className.replace( ' bestwp-toggled', '' );
            bestwp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            bestwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            bestwp_secondary_container.className += ' bestwp-toggled';
            bestwp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            bestwp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    bestwp_secondary_links    = bestwp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( bestwp_secondary_i = 0, bestwp_secondary_len = bestwp_secondary_links.length; bestwp_secondary_i < bestwp_secondary_len; bestwp_secondary_i++ ) {
        bestwp_secondary_links[bestwp_secondary_i].addEventListener( 'focus', bestwp_secondary_toggleFocus, true );
        bestwp_secondary_links[bestwp_secondary_i].addEventListener( 'blur', bestwp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function bestwp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'bestwp-focus' ) ) {
                    self.className = self.className.replace( ' bestwp-focus', '' );
                } else {
                    self.className += ' bestwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( bestwp_secondary_container ) {
        var touchStartFn, bestwp_secondary_i,
            parentLink = bestwp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, bestwp_secondary_i;

                if ( ! menuItem.classList.contains( 'bestwp-focus' ) ) {
                    e.preventDefault();
                    for ( bestwp_secondary_i = 0; bestwp_secondary_i < menuItem.parentNode.children.length; ++bestwp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[bestwp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[bestwp_secondary_i].classList.remove( 'bestwp-focus' );
                    }
                    menuItem.classList.add( 'bestwp-focus' );
                } else {
                    menuItem.classList.remove( 'bestwp-focus' );
                }
            };

            for ( bestwp_secondary_i = 0; bestwp_secondary_i < parentLink.length; ++bestwp_secondary_i ) {
                parentLink[bestwp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( bestwp_secondary_container ) );
} )();


( function() {
    var bestwp_primary_container, bestwp_primary_button, bestwp_primary_menu, bestwp_primary_links, bestwp_primary_i, bestwp_primary_len;

    bestwp_primary_container = document.getElementById( 'bestwp-primary-navigation' );
    if ( ! bestwp_primary_container ) {
        return;
    }

    bestwp_primary_button = bestwp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof bestwp_primary_button ) {
        return;
    }

    bestwp_primary_menu = bestwp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof bestwp_primary_menu ) {
        bestwp_primary_button.style.display = 'none';
        return;
    }

    bestwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === bestwp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        bestwp_primary_menu.className += ' nav-menu';
    }

    bestwp_primary_button.onclick = function() {
        if ( -1 !== bestwp_primary_container.className.indexOf( 'bestwp-toggled' ) ) {
            bestwp_primary_container.className = bestwp_primary_container.className.replace( ' bestwp-toggled', '' );
            bestwp_primary_button.setAttribute( 'aria-expanded', 'false' );
            bestwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            bestwp_primary_container.className += ' bestwp-toggled';
            bestwp_primary_button.setAttribute( 'aria-expanded', 'true' );
            bestwp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    bestwp_primary_links    = bestwp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( bestwp_primary_i = 0, bestwp_primary_len = bestwp_primary_links.length; bestwp_primary_i < bestwp_primary_len; bestwp_primary_i++ ) {
        bestwp_primary_links[bestwp_primary_i].addEventListener( 'focus', bestwp_primary_toggleFocus, true );
        bestwp_primary_links[bestwp_primary_i].addEventListener( 'blur', bestwp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function bestwp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'bestwp-focus' ) ) {
                    self.className = self.className.replace( ' bestwp-focus', '' );
                } else {
                    self.className += ' bestwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( bestwp_primary_container ) {
        var touchStartFn, bestwp_primary_i,
            parentLink = bestwp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, bestwp_primary_i;

                if ( ! menuItem.classList.contains( 'bestwp-focus' ) ) {
                    e.preventDefault();
                    for ( bestwp_primary_i = 0; bestwp_primary_i < menuItem.parentNode.children.length; ++bestwp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[bestwp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[bestwp_primary_i].classList.remove( 'bestwp-focus' );
                    }
                    menuItem.classList.add( 'bestwp-focus' );
                } else {
                    menuItem.classList.remove( 'bestwp-focus' );
                }
            };

            for ( bestwp_primary_i = 0; bestwp_primary_i < parentLink.length; ++bestwp_primary_i ) {
                parentLink[bestwp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( bestwp_primary_container ) );
} )();