/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	var api = wp.customize;
		
	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).text( newval );
		} );
	} );

	api( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).text( newval );
		} );
	} );

	// Header text color.
	api( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			if ( 'blank' === newval ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				setInactiveLink( '.site-title a', 'color', newval, '' );
				$( '.site-title' ).css( 'border-color', newval );
			}
		} );
	} );
	
	api( 'actinia_tagline_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).css( 'color', newval );
		} );
	} );

	//handle cookie widget in the primary widget area (actinia-no-sidebar class should apply!
	$( function() {
		if (
			api.instance( 'sidebars_widgets[sidebar-primary]' ).get().length === 1 && 
			api.instance( 'sidebars_widgets[sidebar-primary]' ).get()[ 0 ].includes( 'cookie' )
		) {
			if ( $( 'body' ).hasClass( 'left-sidebar' ) ) {
				$( 'body' ).removeClass( 'left-sidebar' );
			}
			$( 'body' ).addClass( 'actinia-no-sidebar' );
		}
	} );
	
	api( 'actinia_sidebar_position', function( value ) {
		value.bind( function( newval ) {
			if ( 'left' === newval && api.instance( 'sidebars_widgets[sidebar-primary]' ).get() != false ) {
				$( 'body' ).addClass( 'left-sidebar' );
			} else {
				$( 'body' ).removeClass( 'left-sidebar' );
			}
		} );
	} );
	
	api( 'actinia_post_meta_position', function( value ) {
		value.bind( function( newval ) {
			if( 'top' === newval ) {
				$( 'body' ).addClass( 'top-meta' );
			} else {
				$( 'body' ).removeClass( 'top-meta' );
			}
		});
	});
	
	api( 'actinia_navbar_position', function( value ) {
		value.bind( function( newval ) {
			if ( 'side' === newval ) {
				$( 'body' ).addClass( 'navbar-side' );
			} else {
				$( 'body' ).removeClass( 'navbar-side' );
			}
		} );
	} );
	
	api = parent.wp.customize;
		
	//CS constructor
	function ColorScheme( colorName, colors ) {
		this.colorName = colorName;
		this.colors = colors;
	}
	
	//get CS names (red, orange etc) from control select options and save them in an array
	function getColorSchemeOptions() {
		var colors = [];
		api.control( 'actinia_color_scheme' ).container.find( 'option' ).each( function() {
			colors.push( $( this ).val() );
		} );
		return colors;
	}
	
	//get color controls ids (primary_color_a, primary_color_b etc) and save them in an array
	function getColorControls() {
		var colorControls = [];
		_.each( api.section( 'colors' ).controls(), function( control ) {
			colorControls.push( control.id );
		} );
		//return an array of all color controls except CS, background color and header text color
		return colorControls.splice( 3 );
	}
	
	//create a twodimensional array containing an array of colors for each CS:
	//primary_color_a, primary_color_b, secondary_color_a, secondary_color_b, color_sticky, tagline_color
	function getColors() {
		var colors = [
			[ '#ba2a2a', '#e3a9a9', '#000', '#666', '#AA3939', '#8a8a8a' ],
			[ '#0d915e', '#64c8a2', '#c63f24', '#c66551', '#73AC96','#8a8a8a' ],
			[ '#A64B00', '#FF9640', '#0C6363', '#78CCCC', '#B56726','#8a8a8a' ],
			[ '#9b409b', '#cd8bcd', '#3c7a1b', '#52c612', '#A66FA6', '#8a8a8a' ],
			[ '#0775a0', '#62b1cf', '#fe8400', '#ffbc73', '#457385', '#8a8a8a' ],
			[ '#85004b', '#e667af', '#679b00', '#b9f73e', '#AA5585','#8a8a8a' ]
		];
		return colors;
	}
	
	function setColorSchemes() {
		var colorSchemeOptions = getColorSchemeOptions(); //red, orange etc
		var colors =  getColors(); //color arrays for each scheme
		var colorControls = getColorControls(); //primary_color_a etc
		var colorSchemes = [];

		for ( i = 0; i < colorSchemeOptions.length; i++ ) {
			colorSchemes.push( new ColorScheme( colorSchemeOptions[ i ], colors[ i ] ) );

			for ( a = 0; a < colorControls.length; a++ ) {
				//add properties based on color controls names to constructor
				colorSchemes[ i ][ colorControls[ a ] ] = colorSchemes[ i ].colors[ a ];
			}
		}

		//return an array of objects, each object containing a CS
		return colorSchemes;
	}
	
	var colorSchemes = setColorSchemes();
	
	//modify color picker current und default values according to the selected CS
	api( 'actinia_color_scheme', function( value ) {
		value.bind( function( newval ) {
			$.each( getColorControls(), function( index, id ) {
				var control = api.control.instance( id );
				var picker = control.container.find( '.color-picker-hex' );

				for ( i = 0; i < getColorSchemeOptions().length; i++ ) {
					if ( colorSchemes[ i ][ 'colorName' ] === newval ) {
						var newColor = colorSchemes[ i ][ id ];
						control.setting.set( newColor );
						picker.val( control.setting() );
						picker.data( 'data-default-color', newColor ).wpColorPicker( 'defaultColor', newColor );
					}
				}
			} );

			api.instance( 'header_textcolor' ).set( api.instance( 'actinia_primary_color_a' ).get() );
		} );
	} );
	
	function setGradientJQuery( el, topVal, bottomVal ) {
		el.css( 'background', topVal );
		el.css( { background: '-webkit-linear-gradient(' + topVal + ',' + bottomVal + ')' } );
		el.css( {background: '-o-linear-gradient(' + topVal + ',' + bottomVal + ')' } );
		el.css( { background: '-moz-linear-gradient(' + topVal + ',' + bottomVal + ')' } );
		el.css( {background: 'linear-gradient(' + topVal + ',' + bottomVal + ')' } );
	}
	
	function setGradientCSS( el, topVal, bottomVal, mq ) {
		var text = '';
		text = el + ' {';
		text +='background: ' + topVal + ';';
		text += 'background: -webkit-linear-gradient(' + topVal + ',' + bottomVal + ');';
		text += 'background: -o-linear-gradient(' + topVal + ',' + bottomVal + ');';
		text += 'background: -moz-linear-gradient(' + topVal + ',' + bottomVal + ');';
		text += 'background: linear-gradient(' + topVal + ',' + bottomVal + '); }';
		appendToHead( mq, text );
	}
	
	//link styles
	function setLink( el, prop, val, linkStates, mq ) {
		for ( i = 0; i < linkStates.length; i++ ) {
			appendToHead( mq, el + ':' + linkStates[ i ] + '{' + prop + ':' + val + '; }' );
		}
	}
	
	function inactiveLinkStates() {
		return [ 'link', 'visited' ];
	}
	
	function activeLinkStates() {
		return [ 'hover', 'focus', 'active' ];
	}
	
	//styles for link and visited states
	function setInactiveLink( el, prop, val, mq ) {
		setLink( el, prop, val, inactiveLinkStates(), mq );
	}
	
	//styles for hover, focus and active states
	function setActiveLink( el, prop, val, mq ) {
		setLink( el, prop, val, activeLinkStates(), mq );
	}
	
	function currentItems() {
		return [
			'.main-navigation #primary-menu > .current_page_item > a',
			'.main-navigation #primary-menu > .current-menu-item > a',
			'.main-navigation #primary-menu > .current_page_ancestor > a',
			'.main-navigation #primary-menu > .current-menu-ancestor > a',
			'.main-navigation #primary-menu .current_page_item > a',
			'.main-navigation #primary-menu .current-menu-item > a'
		];
	}
	
	function navLinks() {
		return [ '.comment-navigation', '.posts-navigation', '.post-navigation', '.image-navigation' ];
	}
	
	function widgets() {
		return [
			'.widget.widget_tag_cloud',
			'.widget.widget_archive',
			'.widget.widget_categories',
			'.widget.widget_nav_menu',
			'.widget.widget_meta',
			'.widget.widget_recent_comments',
			'.widget.widget_recent_entries',
			'.widget.widget_pages'
		];
	}
	
	function appendToHead( mq, styleRule ) {
		if ( mq === '' ) {
			$( '<style>' + styleRule + '</style>' ).appendTo( 'head' );
		} else {
			$( '<style>@media only screen and (min-width: ' + mq + 'px){' + styleRule + '}</style>' ).appendTo( 'head' );
		}
	}

	function customizeArticle_A( newval ) {
		$( 'article' ).not( '.sticky' ).find( '.entry-header' ).css( 'border-color', newval );
		$( 'article' ).not( '.sticky' ).find( '.wrapper' ).css( 'border-color', newval );
		setGradientJQuery(
			$( 'article' ).not( '.sticky' ).find( '.entry-header' ),
			newval,
			api.instance( 'actinia_primary_color_b' ).get()
		);
		$( '.single-attachment .entry-header' ).css( 'background', 'transparent' );
	}

	function customizeArticle_B( newval ) {
		setGradientJQuery(
			$( 'article' ).not( '.sticky' ).find( '.entry-header' ),
			api.instance( 'actinia_primary_color_a' ).get(),
			newval
		);
		$( '.single-attachment .entry-header' ).css( 'background', 'transparent' );
	}

	function customizeNavbar_A1( newval ) {
		setGradientJQuery(
			$( 'button.menu-toggle-btn' ),
			newval,
			api.instance( 'actinia_primary_color_b' ).get()
		);
		setActiveLink( '.main-navigation a', 'color', newval, '' );
		setActiveLink( '.main-navigation ul ul a', 'color', newval, 768 );

		for ( i = 0; i < activeLinkStates().length; i++ ) {
			appendToHead( '', '.main-navigation a:' + activeLinkStates()[ i ] +
				'>.dropdown-toggle:after{color:' + newval + ';}' 
			);
		}

		for ( a = 0; a < currentItems().length; a++ ) {
			appendToHead( '', currentItems()[ a ] + ' .dropdown-toggle:after{color:' + newval + ';}' );
			setInactiveLink( currentItems()[ a ], 'color', newval, '' );
		}

		for ( a = 0; a < currentItems().length - 2; a++ ) {
			setInactiveLink( currentItems()[ a ], 'background', newval, 768 );
			setInactiveLink( currentItems()[ a ], 'color', '#fff', 768 );
			appendToHead( 768, currentItems()[ a ] + ' .dropdown-toggle:after{color:#fff;}' );
		}

		appendToHead( 768, '.main-navigation ul ul a .dropdown-toggle:after{color:#8a8a8a;}' );

		for ( i = 0; i < activeLinkStates().length; i++ ) {
			appendToHead( 768, '.main-navigation ul ul a:' + activeLinkStates()[ i ] +
				' .dropdown-toggle:after{color: ' + newval + ';}'
			);
		}
	}

	function customizeNavbar_B1( newval ) {
		setGradientJQuery(
			$( 'button.menu-toggle-btn' ),
			api.instance( 'actinia_primary_color_a' ).get(),
			newval
		);
	}

	function customizeNavbar_A2( newval ) {
		for ( i = 0; i < inactiveLinkStates().length; i++ ) {
			setGradientCSS(
				'.main-navigation a:' + inactiveLinkStates()[ i ],
				newval,
				api.instance( 'actinia_secondary_color_b' ).get(),
			768);
		}

		setActiveLink( '.main-navigation a', 'background', '#fff', 768 );
	}

	function customizeNavbar_B2( newval ) {
		for ( i = 0; i < inactiveLinkStates().length; i++ ) {
			setGradientCSS(
				'.main-navigation a:' + inactiveLinkStates()[ i ],
				api.instance( 'actinia_secondary_color_a' ).get(),
				newval,
				768
			);
		}

		setActiveLink( '.main-navigation a', 'background', '#fff', 768 );
	}

	function customizeMore( newval ) {
		$( 'a.more-link' ).css( 'border-color', newval );
		appendToHead( '', 'a.more-link:after{ color: ' + newval + ';}' );
		$( 'a.more-link:after' ).css( 'color', newval );
		setInactiveLink( 'a.more-link', 'color', newval, '' );
	}

	function customizeComments( newval ) {
		$( 'a.comment-reply-link' ).css( 'color', newval );
		setInactiveLink( '.pingback a', 'color', newval, '' );
		setActiveLink( '.pingback a', 'color', '#ccc', '' );
	}

	function customizePageNavigation_A1( newval ) {
		for ( i = 0; i < navLinks().length; i++ ) {
			setGradientCSS(
				navLinks()[ i ] + ' .nav-previous a',
				newval,
				api.instance('actinia_primary_color_b').get(),
				''
			);

			for ( a = 0; a < activeLinkStates().length; a++ ) {
				setGradientCSS(
					navLinks()[ i ] + ' .nav-previous a:' + activeLinkStates()[ a ],
					api.instance('actinia_primary_color_b').get(),
					newval,
					''
				);
			}
		}
	}

	function customizePageNavigation_B1( newval ) {
		for ( i = 0; i < navLinks().length; i++ ) {
			setGradientCSS(
				navLinks()[ i ] + ' .nav-previous a',
				api.instance( 'actinia_primary_color_a' ).get(),
				newval,
				''
			);
			for ( a = 0; a < activeLinkStates().length; a++ ) {
				setGradientCSS(
					navLinks()[ i ] + ' .nav-previous a:' + activeLinkStates()[ a ],
					newval,
					api.instance( 'actinia_primary_color_a' ).get(),
					''
				);
			}
		}
	}

	function customizePageNavigation_A2( newval ) {
		for ( i = 0; i < navLinks().length; i++ ) {
			setGradientCSS(
				navLinks()[ i ] + ' .nav-next a',
				newval,
				api.instance( 'actinia_secondary_color_b' ).get(),
				''
			);

			for ( a = 0; a < activeLinkStates().length; a++ ) {
				setGradientCSS(
					navLinks()[ i ] + ' .nav-next a:' + activeLinkStates()[ a ],
					api.instance( 'actinia_secondary_color_b' ).get(),
					newval,
					''
				);
			}
		}
	}

	function customizePageNavigation_B2( newval ) {
		for ( i = 0; i < navLinks().length; i++ ) {
			setGradientCSS( 
				navLinks()[ i ] + ' .nav-next a',
				api.instance( 'actinia_secondary_color_a' ).get(),
				newval,
				''
			);
			for ( a = 0; a < activeLinkStates().length; a++ ) {
				setGradientCSS(
					navLinks()[ i ] + ' .nav-next a:' + activeLinkStates()[ a ],
					newval,
					api.instance( 'actinia_secondary_color_a' ).get(),
					''
				);
			}
		}
	}

	function customizeWidgets( newval ) {
		$( '.widget .widget-title' ).css( 'color', newval );
		$( '.widget .widget-title' ).css( 'border-color', newval );

		for( a = 0; a < widgets().length; a++ ) {
			setActiveLink( widgets()[ a ] + ' a', 'color', newval, '' );
			setActiveLink( '.widget-area-1 ' + widgets()[ a ] + ' a', 'color', newval, '' );
		}
	}

	function customizeAnchor( newval ) {
		$( '.anchor' ).css( 'border-color', newval );
		appendToHead( '', '.anchor:after {color: ' + newval + ';}' );
	}

	function customizeSearchForm( newval ) {
		appendToHead( 
			'', '.search-form input[type=text]:focus, .search-form input[type=search]:focus {' +
			'border-bottom: ' + newval + ';' +
			'box-shadow: 0 0.5em 0.5em ' + newval + ';' +'}'
		);
	}

	function customizeSubmit_A( newval ) {
		setGradientCSS(
			'input[type="submit"]',
			newval,
			api.instance( 'actinia_secondary_color_b' ).get(),
			''
		);

		for ( i = 0; i < activeLinkStates().length; i++ ) {
			setGradientCSS(
				'input[type="submit"]:' + activeLinkStates()[ i ],
				api.instance( 'actinia_secondary_color_b' ).get(),
				newval,
				''
			);
		}
	}
	
	function customizeSubmit_B( newval ) {
		setGradientCSS(
			'input[type="submit"]',
			api.instance( 'actinia_secondary_color_a' ).get(),
			newval,
			''
		);

		for ( i = 0; i < activeLinkStates().length; i++ ) {
			setGradientCSS(
				'input[type="submit"]:' + activeLinkStates()[ i ],
				newval,
				api.instance('actinia_secondary_color_a').get(),
				''
			);
		}
	}

	function customizeSticky( newval ) {
		$( 'article.sticky .entry-header, article.sticky .wrapper' ).css( 'border-color', newval );
		$( 'article.sticky' ).css( 'background-color', newval );
	}

	api( 'actinia_primary_color_a', function ( value ) {
		value.bind( function( newval ) {
			customizeArticle_A( newval );
			customizeNavbar_A1( newval );
			customizeMore( newval );
			customizeComments( newval );
			customizePageNavigation_A1( newval );
			customizeWidgets( newval );
		} );
	} );
	
	api( 'actinia_primary_color_b', function( value ) {
		value.bind( function( newval ) {
			customizeArticle_B( newval );
			customizeNavbar_B1( newval );
			customizePageNavigation_B1( newval );
			customizeAnchor( newval );
			customizeSearchForm( newval );
		} );
	} );
	
	api( 'actinia_secondary_color_a', function( value ) {
		value.bind( function( newval ) {
			customizeNavbar_A2( newval );
			customizePageNavigation_A2( newval );
			customizeSubmit_A( newval );
		} );
	} );
	
	api( 'actinia_secondary_color_b', function( value ) {
		value.bind( function( newval ) {
			customizeNavbar_B2( newval );
			customizePageNavigation_B2( newval );
			customizeSubmit_B( newval );
		} );
	} );
	
	api( 'actinia_color_sticky', function( value ) {
		value.bind( function( newval ) {
			customizeSticky( newval );
		} );
	} );
	
	
	if ( $( 'body' ).hasClass( 'navbar-side' ) ) {
		if ( ( api.instance( 'nav_menu_locations[primary]' ).get() == 0) || ( $( '.main-navigation' ).has('ul' ).length == 0 ) ) {
			$( 'body' ).removeClass( 'navbar-side' );
		}
	}
	
} )( jQuery );
