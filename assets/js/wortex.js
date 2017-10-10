/**
 * Wortex Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 * Copyright 2014-2017 Mathieu Sarrasin - Iceable Media
 * Javascripts
 *
 * Dependencies:
 * - Superfish
 */

$ = jQuery;

/* Adjust navbar on (window).load */

$(window).load(function() { navbarWidth(); });

/* --- Update navbar on window resize --- */

$(window).resize(function() { navbarWidth(); });

/* --- (document).ready function wrap --- */

$(document).ready(function($){

	navbarWidth();	// Calculate navbar max-width
	subMenuPos();	// Position submenus

	// Fields placeholders function
	$('input[data-placeholder], textarea[data-placeholder]').each(function() {
		$(this).click(function(){ if($(this).attr('value') == $placeholder) $(this).setCursorPosition(0); });
		var $placeholder = $(this).attr('data-placeholder');
		$(this).attr('value', $placeholder).addClass("notfilled");
		$(this).keydown(function(){ if( $(this).attr('value') == $placeholder ) $(this).attr('value', '').removeClass("notfilled"); });
		$(this).keyup(function(){
			if($(this).attr('value') === ''){ $(this).attr('value', $placeholder).addClass("notfilled").setCursorPosition(0); }
		});
	});

	// Navbar Search functions
	var menuwidth = 0;
	$("#navbar > div > ul > li").each(function() { menuwidth += $(this).outerWidth(); });
	$("#navbar .search-field").width(menuwidth-35);
	$("#nav-search .nav-search-toggle").click(function(e) {
		$("#navbar .search-form").toggle();
		$("i", this).toggleClass("fa-search").toggleClass("fa-close");
		$("#navbar .search-field").focus();
		var $placeholder = $('#navbar .search-field').attr('data-placeholder');
		if($('#navbar .search-field').attr('value') == $placeholder) $('#navbar .search-field').setCursorPosition(0);
		e.preventDefault();
	});

	/*--- Responsive Dropdown Menu ---*/

	$('#dropdown-menu').change( function () {
		var url = $('#dropdown-menu').val();
		$(location).attr('href',url);
	});

	/*--- Hookup Superfish ---*/

	$('ul.sf-menu').superfish({
		delay:	700,	// the delay in milliseconds that the mouse can remain outside a submenu without it closing
		animation:	{opacity:'show',height:'show'},	// an object equivalent to first parameter of jQuery’s .animate() method
		speed:	'normal',	// speed of the animation. Equivalent to second parameter of jQuery’s .animate() method
		autoArrows:	false,	// if true, arrow mark-up generated automatically = cleaner source code at expense of initialisation performance
		dropShadows:	false,	// completely disable drop shadows by setting this to false
	});

	/* Remove empty comment reply link wrappers */
	$('div.reply').filter(function() {return $.trim($(this).text()) === '';}).remove();

}); /*--- End of $(document).ready(function() ---*/

/*--- Helper functions ---*/

$.fn.setCursorPosition = function(position){
	    if(this.lengh === 0) return this;
	    input = this[0];
	    if (input.createTextRange) {
	        var range = input.createTextRange();
	        range.collapse(true);
	        range.moveEnd('character', position);
	        range.moveStart('character', position);
	        range.select();
	    } else if (input.setSelectionRange) {
	        input.focus();
	        input.setSelectionRange(position, position);
	    }
	    return this;
	};

// Position sub-menus depending on navbar height and header padding
function subMenuPos() {
	var submenuTop = $('#navbar ul.menu').height() + parseInt( $('#header').css('padding-bottom') );
	$('#navbar ul.menu > li > ul').each(function(){ $(this).css('top', submenuTop + 'px'); });
}

// Define max-width for navbar (depending on container and logo size)
function navbarWidth() {
	var menuMinWidth = 30;
	$("#navbar ul.menu > li").each(function() { menuMinWidth += $(this).outerWidth(true); } );
	var menuWidth = Math.max(menuMinWidth, $("#header .container").width() - $("#logo").width() );
	console.log(menuWidth);
	$("#navbar").css("width", menuWidth + 'px' );
}
