jQuery(function($){ // wait while jQuery loads (document-ready)

	$('.nav-menu ul.sub-menu').parent('li').addClass('has-subpages'); // add class for adding arrow
	$('.nav-menu ul.children').parent('li').addClass('has-subpages'); // add class for adding arrow

	$('input#submit').addClass('btn btn-primary'); // add styles for submit button in comments

	$('table#wp-calendar').addClass('table table-condensed'); // add styles for calendar

	$('.search-submit-button-real').hide(); // hide real search submit button
	$('.search-submit-button').show(); // show fake search button (with search icon)
	$('.search-submit-button').click(function() { // submit the form if the search icon was clicked
		$(this).closest('form').submit();
	});

	$('input[type=submit], input[type=image], input[type=button], input[type=reset], button').addClass('btn');

	// fix when long menus overlaps site content
	var menu_height = $('.navbar').height();
	if( menu_height > 50 ) { // if there are more than one row of menu items
		var margin_top_fix = menu_height + 20;
		$('.site-wrapper').css('margin-top', margin_top_fix+'px');
	}

});