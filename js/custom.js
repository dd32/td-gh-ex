jQuery( document ).ready( function( $ ){

	$( '.flexslider' ).flexslider( {
		animation: "slide",
		controlNav: true
	} );

	$( '.clients' ).flexslider( {
		animation: "slide",
		animationLoop: false,
		itemWidth: 240,
		directionNav: true,
		controlNav: false,
		maxItems: 4
	} );

	$( '.tabs-container' ).tabs();

	/* Get the window's width, and check whether it is narrower than 480 pixels */
	var windowWidth = $( window ).width();

	if ( windowWidth <= 600 ) {

		/* Clone our navigation */
		var mainNavigation = $( '.primary-menu' ).clone();

		/* Replace unordered list with a "select" element to be populated with options, and create a variable to select our new empty option menu */
		$( '.primary-menu' ).html( '<select class="menu"></select>' );
		var selectMenu = $( 'select.menu' );

		/* Navigate our nav clone for information needed to populate options */
		$( mainNavigation ).children( 'ul' ).children( 'li' ).each( function() {

		/* Get top-level link and text */
		var href = $( this ).children( 'a' ).attr( 'href' ); 
		var text = $( this ).children( 'a' ).text();

		/* Append this option to our "select" */
		var option = '<option value="' + href + '"';
		if($(this).hasClass('current_page_item')) {
			option += 'selected="selected">';
		} else {
			option += '>'
		}
		option += text + '</option>'; 
		$( selectMenu ).append( option );

			/* Check for "children" and navigate for more options if they exist */
			if ( $( this ).children( 'ul' ).length > 0) {
				$( this ).children( 'ul' ).children( 'li' ).each( function() {

					/* Get child-level link and text */
					var href2 = $( this ).children( 'a' ).attr( 'href' );
					var text2 = $( this ).children( 'a' ).text();

					/* Append this option to our "select" */
					var option2 = '<option value="' + href2 + '"';
					if($(this).hasClass('current_page_item')) {
						option2 += 'selected="selected">';
					} else {
						option2 += '>'
					}
					option2 += text2 + '</option>';
					$( selectMenu ).append( option2 );
				});
			}

		});
	}

	/* When our select menu is changed, change the window location to match the value of the selected option. */
	$( selectMenu ).change( function() {
		location = this.options[this.selectedIndex].value;   
	});

});

