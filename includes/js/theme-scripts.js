
// Scripts used by the theme



// Noconflict
var $str = jQuery.noConflict();

// Variables
var $isocontainer = $str('.items-container');
var lastwindowPos = $str(window).scrollTop();

// Check if an iOS device
function bntCheckDevice() {
	var iDevices = [
		'iPad Simulator',
		'iPhone Simulator',
		'iPod Simulator',
		'iPad',
		'iPhone',
		'iPod',
		'Mac68K',
		'MacPPC',
		'MacIntel'
	];
	if ( !!navigator.platform ) {
		while ( iDevices.length ) {
			if ( navigator.platform === iDevices.pop() ) { 
				return true; 
			}
		}
	}
	return false;
}

// Generate em values
function bntEmValue(input) {
    var emSize = parseFloat( $str('html').css('font-size') );
    var output = emSize * 1.6 * input;
	return output;
}


$str(document).ready(function() {
	
	
	// Submenu animations
	if ( bntThemeVars.menu_config < 2 ) {
		$str('.primary-menu .menu-item-has-children').hover(function() {
			var parentMenu = $str(this);
			var submPos = parentMenu.offset().left;
			var windowWidth = $str(window).width();
			if ( parentMenu.parents('.menu-item-has-children').length ) {
				var subsubOff = submPos + 400; // 200 for each submenu width
				if ( subsubOff > windowWidth ) {
					parentMenu.children('.sub-menu').css({'left':'auto','right':'100%'});
				}
			} else {
				var subsubOff = submPos + 200; // 200 is the submenu width
				if ( subsubOff > windowWidth ) {
					parentMenu.children('.sub-menu').css({'right':'0'});
				}
			}
			$str(this).children('.sub-menu').fadeIn(200);
		}, function() {
			$str(this).children('.sub-menu').fadeOut(200);
		});
	} else if ( bntThemeVars.menu_config == 2 ) {
		$str('.ham-menu-trigger-container').click(function() {
			$str('.header-menu, .ham-menu-close-container').fadeIn(200, function() {
				$str('body').addClass('mobile-menu-open');
			});
			var $menu = $str('#nav-primary');
			var menuHeight = 0;
			if ( $menu.outerHeight(false) > 0 ) {
				menuHeight = $menu.outerHeight(false);
			}
			var menuMargin = ( $str(window).height() - menuHeight ) / 2;
			$menu.css('margin-top',menuMargin+'px');
		});
		$str('.ham-menu-close-container').click(function() {
			$str('.header-menu, .ham-menu-close-container').fadeOut(200, function() {
				$str('body').removeClass('mobile-menu-open');
			});
		});
	} else if ( bntThemeVars.menu_config == 3 ) {
		$str('.primary-menu .menu-item-has-children > a').toggle(function(e) {
			if ( ! $str(this).hasClass('opened-side-menu') ) {
				$str(this).addClass('opened-side-menu');
			}
			$str(this).siblings('.sub-menu').slideDown(200);
		}, function(e) {
			e.preventDefault();
			if ( $str(this).hasClass('opened-side-menu') ) {
				$str(this).removeClass('opened-side-menu');
			}
			$str(this).siblings('.sub-menu').slideUp(200);
		});
	}
	
	
	// Mobile menu animations
	$str('.mobile-menu-trigger-container').click(function() {	
		var device = bntCheckDevice();
		if ( device == false ) {
			$str('body').addClass('mobile-menu-open');
		}
		$str('.mobile-menu-shadow').fadeIn(500);
		$str('#nav-mobile').css("left", '0');
	});
	$str('.mobile-menu-close').click(function() {
		if ( $str('body').hasClass('mobile-menu-open') ) {
			$str('body').removeClass('mobile-menu-open');
		}
		$str('.mobile-menu-shadow').fadeOut(500);
		$str('#nav-mobile').css("left", '-100%');
	});
	
	
	// Side menu position on load
	if ( bntThemeVars.menu_config == 3 ) {
		var headertop = 0;
		if ( $str('#wpadminbar').outerHeight(true) > 0 ) {
			headertop = $str('#wpadminbar').outerHeight(true);
		}
		$str('.header-side .site-header').css('top',headertop+'px');
	}
	
	
	// Fixed header on scroll
	if ( bntThemeVars.fixed_menu == 1 && bntThemeVars.menu_config != 3 && $str(window).width() > bntEmValue(80) ) {
		if ( $str(window).scrollTop() > 0 ) {
			if ( ! $str('.fixed-header').length ) {
				var $headerClone = $str('.site-header > .bnt-container').clone();
				$str('body').append('<header class="site-header fixed-header"></header>');
				$str('.fixed-header').html($headerClone);
			}
		}
	}
	
	
	// Smooth scrolling for same-page menu links
	$str('.menu-container a').click(function() {
		if ( /^#/.test($str(this).attr('href')) === true ) {
			var hash = $str(this).attr('href').substr(1);
			var scrollPosition = 0; 
			var headerHeight = 0;
			if ( bntThemeVars.fixed_menu == 1 ) {
				headerHeight = $str('.site-header').outerHeight(true);
			}
			if ( $str('[name="' + hash + '"]').length ) {
				scrollPosition = $str('[name="' + hash + '"]').offset().top - headerHeight - 10;
				$str('html, body').animate( { scrollTop: scrollPosition }, 500 );
			}
			return false;
		}
	});
	
	
	// Comment form labels
	$str('.comment-form-field input').focus(function() {
		$str(this).siblings('label').fadeIn(500);
	}).blur(function() {
		if ( ! $str(this).val() ) {
			$str(this).siblings('label').fadeOut(500);
		}
	});
	if ( $str('.comment-form-field input').val() ) {
		$str(this).siblings('label').css('display','block');	
	}
	
	
	// Responsive videos
	$str('.entry-content iframe[src*="youtube.com"],.entry-content iframe[src*="vimeo.com"]').each(function() {
		$str(this).parent().fitVids();
	});
	
	
	// Grid layouts with Isotope
	var $grid = $isocontainer.imagesLoaded( function() {
		$grid.isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			packery: {
				columnWidth: $grid.find('.grid-sizer')[0],
			}
		});
		$grid.isotope({ 
			layoutMode: bntThemeVars.grid_mode,
		});
	});
	
	
	// Ajax pagination
	var page = 1;
	if ( page < bntThemeVars.max_pages ) {
		$str('.ajax-load-more').fadeIn(100).css('display','block');
	}
	$str('.ajax-load-more').click(function () {
		$str('.spinner-ajax').fadeIn(400);
		$str.ajax({
			url: bntThemeVars.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: bntThemeVars.query_vars,
				page: page
			},
			success: function (html) {
				var $posts = $str(html).fadeIn(400);
				if ( $isocontainer.length ) {
					$grid.append($posts).isotope('appended', $posts);
					$grid.imagesLoaded().progress( function() {
						$grid.isotope('layout');
					});
				} else {
					$str('.site-main').append($posts);	
				}
			}
		});
		page++;
		$str('.spinner-ajax').fadeOut(400);
		if ( page >= bntThemeVars.max_pages ) {
			$str('.ajax-load-more').remove();
		}
	});
	
	
	// Scroll to bottom of header with CTA buttons
	$str('.post-header-cta div').click(function() {
		var hb = $str('.post-header').position().top + $str('.post-header').outerHeight(true);
		$str('html, body').animate( { scrollTop: hb }, 1000 );
	});
	
	
	// Display "add to cart" buttons on products
	$str('.products .product').hover(function() {
		$str(this).find('.add_to_cart_button').fadeIn(200);
	}, function() {
		$str(this).find('.add_to_cart_button').fadeOut(200);	
	});
	
	
	// Hide novice header on button click
	$str('.nhb-dismiss').click(function() {
		$str.ajax({
            type:   'post',
            url:    bntThemeVars.ajaxurl,
			data: {
                action: 'dismiss_novice',
                novice_option: 'novice_header'
            },
            dataType: 'json'
		}).done(function( json ) {
            $str('.novice-header').fadeOut();
        });
	});
		
		
});


$str(window).load(function () {


	// Display grid items when everything is loaded
	$str('.spinner-grid').fadeOut(100);
	$isocontainer.fadeIn(300, function() {
		if ( bntThemeVars.full_width_grid == 'on' ) {
			var ww = $str(window).width();
			var im = $str('.grid-item-inner').css('padding-left').replace("px", "");
			var nw = ww - ( 2 * im );
			var cw = $str('.site-content .bnt-container').width();
			var ml = ( ( ww - cw ) / -2 ) + ( im * 2 );
			$str('.site-content .grid-container').css({'width':nw+'px','left':ml+'px'});
		}
		$isocontainer.isotope().isotope('layout');
	});
	$isocontainer.isotope().isotope('layout');
	
	
	// Submenu margins 
	if ( bntThemeVars.menu_config == 0 ) {
		var headerheight = $str('.site-header').height();
		var menuheight = $str('.primary-menu').height();
		var submenumargin = ( headerheight - menuheight ) / 2;
		$str('.primary-menu > li > .sub-menu').css('border-top-width',submenumargin+'px');
	}


});


$str(window).resize(function () {


	// Relayout Isotope on browser resize
	if ( bntThemeVars.full_width_grid == 'on' ) {
		var ww = $str(window).width();
		var im = $str('.grid-item-inner').css('padding-left').replace("px", "");
		var nw = ww - ( 2 * im );
		var cw = $str('.site-content .bnt-container').width();
		var ml = ( ( ww - cw ) / -2 ) + ( im * 2 );
		$str('.site-content .grid-container').css({'width':nw+'px','left':ml+'px'});
	}
	$isocontainer.isotope().isotope('layout');
	
	
	// Set overlay menu margin
	if ( bntThemeVars.menu_config == 2 ) {
		var $menu = $str('#nav-primary');
		var menuHeight = 0;
		if ( $menu.outerHeight(false) > 0 ) {
			menuHeight = $menu.outerHeight(false);
		}
		var menuMargin = ( $str(window).height() - menuHeight ) / 2;
		$menu.css('margin-top',menuMargin+'px');
	}


});


$str(window).scroll(function () {
	
	
	// Side menu on scroll
	if ( bntThemeVars.menu_config == 3 ) {
		var $header = $str('.header-side .site-header');
		var windowPos = $str(window).scrollTop();
		var headertop = parseInt($header.css('top'),10);
		var windowHeight = $str(window).height();
		var headerHeight = $header.outerHeight(true); 
		var bodyHeight = $str(document).height();
		adminbarHeight = 0;
		if ( $str('#wpadminbar').outerHeight(true) > 0 ) {
			adminbarHeight = $str('#wpadminbar').outerHeight(true);
		}
		var coef = 1;
		if ( headerHeight > windowHeight ) {
			headerDiff = headerHeight - windowHeight;
			if ( headerDiff * 2 < bodyHeight - windowHeight ) {
				coef = 2;
			}
			if ( windowPos > lastwindowPos ) {
				if ( headertop >= -headerDiff ) {
					headertop = headertop - ( ( windowPos - lastwindowPos ) / coef );
				}
				if ( windowHeight + windowPos >= bodyHeight ) {
					headertop = -headerDiff;
				}
			} else {
				if ( windowPos == 0 || headertop >= adminbarHeight ) {
					headertop = adminbarHeight;
				} else {
					headertop = headertop + ( ( lastwindowPos - windowPos ) / coef );
				}
			}	
		}
		$header.css('top',headertop+'px');
		lastwindowPos = windowPos;
	}
	
	
	// Fixed header on scroll
	if ( bntThemeVars.fixed_menu == 1 && bntThemeVars.menu_config != 3 && $str(window).width() > bntEmValue(80) ) {
		if ( $str(window).scrollTop() > 0 ) {
			if ( ! $str('.fixed-header').length ) {
				var $headerClone = $str('.site-header > .bnt-container').clone(true);
				$str('body').append('<header class="site-header fixed-header"></header>');
				$str('.fixed-header').html($headerClone).fadeIn(600);
			}
		} else {
			if ( $str('.fixed-header').length ) {
				$str('.fixed-header').remove();
			}
		}
	}
	
	
});