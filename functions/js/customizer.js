/**
 * Theme Customizer enhancements for a better user experience
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously
 */

( function( $ ) {

	wp.customize('blogname', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').text( to );
		} );
	} );
	wp.customize('blogdescription', function( value ) {
		value.bind( function( to ) {
			$('.site-description').text( to );
		} );
	} );

	wp.customize('header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				$( 'body' ).removeClass( 'title-tagline-hidden' );
				$('.site-description,#primary-menu,#primary-menu li a,#primary-menu li.highlight.current-menu-item > a,#site-top-right,#site-top-right a,.toggle-nav').css('color', to );
			}			
		} );
	} );

	wp.customize('container_width', function( value ) {
		value.bind( function( to ) {
			$('.container').css( {'max-width': to + 'px'} );
		} );
	} );

	wp.customize('header_search_off', function( value ) {
		value.bind( function( to ) {
			if ( to == 1 ) {
				$('#masthead .top-search').css( {'display': 'none'} );
			} else {
				$('#masthead .top-search').css( {'display': 'inline-block'} );
			}			
		} );
	} );

	wp.customize('grid_layout', function( value ) {
		value.bind( function( to ) {
			$( '#grid-loop' ).removeClass();	
			$( '#grid-loop' ).addClass( 'layout-' + to );			
		} );
	} );

	wp.customize('hi_color', function( value ) {
		value.bind( function( to ) {
			var featicon = azuma_hex2rgba(to, '0.5');

			var styleBackground = '.button,a.button,button,input[type="button"],input[type="reset"],input[type="submit"],#infinite-handle span button,#infinite-handle span button:hover,#infinite-handle span button:focus,#infinite-handle span button:active,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce a.added_to_cart,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover,.bx-wrapper .bx-controls-direction a:hover,#primary-menu li.highlight > a,.featured-post:hover .featured-icon,#footer-menu a[href^="mailto:"]:before,.widget_nav_menu a[href^="mailto:"]:before,#footer-menu a[href^="tel:"]:before,.widget_nav_menu a[href^="tel:"]:before{background:' + to + ';}';

			var styleBgColor = '.woocommerce .sale-flash,.woocommerce ul.products li.product .sale-flash,#yith-quick-view-content .onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle{background-color:' + to + ';}';

			var styleColor = 'a,#masthead a.azuma-cart.items .azuma-icon-shopping-cart,#masthead a.azuma-cart.items .item-count,.site-title a,.site-title a:hover,.site-title a:active,.site-title a:focus,#primary-menu li.current-menu-item > a,.pagination a:hover,.pagination .current,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,#wc-sticky-addtocart .options-button,#add_payment_method .cart-collaterals .cart_totals .discount td,.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce-checkout .cart-collaterals .cart_totals .discount td,.infinite-loader{color:' + to + ';}';

			var styleBorderColor = '.top-search .mini-search,#masthead .top-account .mini-account,#masthead .top-cart .mini-cart,#primary-menu ul,.woocommerce-info,.woocommerce-message{border-color:' + to + ';}';

			var styleBoxShadow = '.featured-post:hover .featured-icon{box-shadow: 0px 0px 0px 4px ' + featicon + ';}';

			$('head').append('<style>' + styleBackground + styleBgColor + styleColor + styleBorderColor + styleBoxShadow + '</style>');
		} );
	} );

	wp.customize('hi_color2', function( value ) {
		value.bind( function( to ) {
			var featicon = azuma_hex2rgba(to, '0.7');
			var featicon2 = azuma_hex2rgba(to, '0.5');

			var styleBackground = '.button:hover,a.button:hover,button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,#infinite-handle span button:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce a.added_to_cart,.woocommerce a.added_to_cart:hover,#grid-loop article:hover,#main.infinite-grid .infinite-wrap article:hover,.woocommerce ul.products li.product:hover,.woocommerce-page ul.products li.product:hover,.single .entry-footer,aside,#site-usp,#shop-filters,.comment-navigation .nav-previous a,.comment-navigation .nav-next a,.top-search .mini-search,#masthead .top-account .mini-account,#masthead .top-cart .mini-cart,#home-hero-section .widget_media_image:before,#primary-menu ul,.posts-navigation,.post-navigation,.featured-post:hover,.featured-post .featured-icon{background:' + to + ';}';

			var styleBgColor = '.entry-header.with-image,#masthead,#colophon{background-color:' + to + ';}';

			var styleColor = '#grid-loop article:hover a.button:hover,#main.infinite-grid .infinite-wrap article:hover a.button:hover,.woocommerce ul.products li.product:hover a.button:hover,.woocommerce ul.products li.product:hover button.button:hover,.woocommerce ul.products li.product:hover input.button:hover,.woocommerce ul.products li.product:hover a.button.alt:hover,.woocommerce ul.products li.product:hover button.button.alt:hover,.woocommerce ul.products li.product:hover input.button.alt:hover,.woocommerce ul.products li.product:hover a.added_to_cart,.woocommerce ul.products li.product:hover a.added_to_cart:hover{color:' + to + ';}';

			var styleBorderColor = '.top-account p.mini-account-footer,#wc-sticky-addtocart{border-color:' + to + ';}';

			var styleBorderColor2 = '.sticky{border-top: 5px solid ' + to + ';}';

			var styleBorderLeftColor = '.comment-navigation .nav-next a:after{border-left-color:' + to + ';}';

			var styleBorderRightColor = '.comment-navigation .nav-previous a:after{border-right-color:' + to + ';}';

			var styleEntryHeader = '.entry-header .title-meta-wrapper{background: ' + featicon + ';}';

			var stylebxcontrols = '.bx-wrapper .bx-controls-direction a{background: ' + featicon2 + ';}';

			var styleBoxShadow = '.featured-post .featured-icon{box-shadow: 0px 0px 0px 4px ' + featicon + ';}';

			$('head').append('<style>' + styleBackground + styleBgColor + styleColor + styleBorderColor + styleBorderColor2 + styleBorderLeftColor + styleBorderRightColor + styleEntryHeader + stylebxcontrols + styleBoxShadow + '</style>');
		} );
	} );

	// Featured Page icons
	wp.customize('featured_page_icon1', function( value ) {
		value.bind( function( to ) {
			$('.featured-post1 .featured-icon i').removeClass().addClass(to);
		} );
	} );
	wp.customize('featured_page_icon2', function( value ) {
		value.bind( function( to ) {
			$('.featured-post2 .featured-icon i').removeClass().addClass(to);
		} );
	} );
	wp.customize('featured_page_icon3', function( value ) {
		value.bind( function( to ) {
			$('.featured-post3 .featured-icon i').removeClass().addClass(to);
		} );
	} );

	wp.customize('font_site_title', function( value ) {
		value.bind( function( to ) {
			azuma_font_bind( to, '.site-title' );
		} );
	} );

	wp.customize('font_nav', function( value ) {
		value.bind( function( to ) {
			azuma_font_bind( to, '.site-main-menu' );
		} );
	} );

	wp.customize('font_content', function( value ) {
		value.bind( function( to ) {
			var font_nav = wp.customize.value( 'font_nav' )();
			var font_site_title = wp.customize.value( 'font_site_title' )();
			azuma_font_bind( to, 'body, button, input, select, textarea' );
			if ( font_site_title === '' ) {
				$('.site-title').css({ fontFamily: 'initial' });
			} else {
				azuma_font_bind( font_site_title, '.site-title' );
			}
			if ( font_nav === '' ) {
				$('.site-main-menu').css({ fontFamily: 'initial' });
			} else {
				azuma_font_bind( font_nav, '.site-main-menu' );
			}
		} );
	} );

	wp.customize('font_headings', function( value ) {
		value.bind( function( to ) {
			azuma_font_bind( to, 'h1:not(.site-title), h2, h3, h4, h5, h6' );
		} );
	} );

	wp.customize('fs_site_title', function( value ) {
		value.bind( function( to ) {
			$('.site-title').css( {'font-size': to + 'px'} );
		} );
	} );
	wp.customize('fw_site_title', function( value ) {
		value.bind( function( to ) {
			$('.site-title').css('font-weight', to );
		} );
	} );
	wp.customize('ft_site_title', function( value ) {
		value.bind( function( to ) {
			$('.site-title').css('text-transform', to );
		} );
	} );
	wp.customize('fl_site_title', function( value ) {
		value.bind( function( to ) {
			$('head').append('<style>.site-title{letter-spacing:' + to + 'px;}</style>');
		} );
	} );


} )( jQuery );

function azuma_font_bind( to, style_class ) {
	if ( to == '' || to == 'Arial, Helvetica, sans-serif' || to == 'Impact, Charcoal, sans-serif' || to == '"Lucida Sans Unicode", "Lucida Grande", sans-serif' || to == 'Tahoma, Geneva, sans-serif' || to == '"Trebuchet MS", Helvetica, sans-serif' || to == 'Verdana, Geneva, sans-serif' || to == 'Georgia, serif' || to == '"Palatino Linotype", "Book Antiqua", Palatino, serif' || to == '"Times New Roman", Times, serif' ) {
	} else {
		var googlefont = encodeURI(to.replace(" ", "+"));
		$('head').append('<link href="//fonts.googleapis.com/css?family=' + googlefont + '" type="text/css" media="all" rel="stylesheet">');
		to = to.substr(0, to.indexOf(':'));
		to = "'" + to + "'";
	}
	$(style_class).css({
		fontFamily: to
	});
}

function azuma_font_style( to, style_class ) {
	if ( to == 'italic' ) {
		var to_style = 'italic';
	} else {
		var to_style = 'normal';
	}
	$(style_class).css( {'font-style': to_style } );
}

function azuma_hex2rgba( colour, opacity ) {
	var r,g,b;
	if ( colour.charAt(0) == '#') {
	colour = colour.substr(1);
	}

	r = colour.charAt(0) + '' + colour.charAt(1);
	g = colour.charAt(2) + '' + colour.charAt(3);
	b = colour.charAt(4) + '' + colour.charAt(5);

	r = parseInt( r,16 );
	g = parseInt( g,16 );
	b = parseInt( b,16);
	return 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
}
