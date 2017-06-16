/*
 * DISPLAY MOBILE NAV SECONDARY
 */

jQuery(document).ready(function($) { 
	// Hide mobile menu by default	
	$('.mobile-nav-secondary').hide();

	// Display mobile menu when clicked	
	$( ".mobile-nav-secondary-toggle" ).click(function() { 
		$( ".mobile-nav-secondary" ).toggle(); 
	}); 

	// Hide mobile submenu by default	
	$('.mobile-nav-secondary .sub-menu').hide();

	// Add toggle that displays mobile submenu
	var subnavToggle = $( '<button />', { 'class': 'subnav-toggle' })
		.append( "+" );
	$( ".mobile-nav-secondary .menu" ).find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( subnavToggle );

	// Display mobile submenu when clicked	
	$( ".subnav-toggle" ).click(function() { 
		$(this).next('.mobile-nav-secondary .children, .mobile-nav-secondary .sub-menu').toggle(); 
	}); 
});