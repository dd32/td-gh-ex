/*
 * DISPLAY MOBILE NAV PRIMARY
 */

jQuery(document).ready(function($) { 
	// Hide mobile menu by default	
	$('.mobile-nav-primary').hide();

	// Display mobile menu when clicked	
	$( ".mobile-nav-primary-toggle" ).click(function() { 
		$( ".mobile-nav-primary" ).toggle(); 
	}); 

	// Hide mobile submenu by default	
	$('.mobile-nav-primary .sub-menu').hide();

	// Add toggle that displays mobile submenu
	var subnavToggle = $( '<button />', { 'class': 'subnav-toggle' })
		.append( "+" );
	$( ".mobile-nav-primary .menu" ).find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( subnavToggle );

	// Display mobile submenu when clicked	
	$( ".subnav-toggle" ).click(function() { 
		$(this).next('.mobile-nav-primary .children, .mobile-nav-primary .sub-menu').toggle(); 
	}); 
});