/**
 * Wordpress Front End Enhancements.
 *
 * jQuery effects used in theme.
 */

//----------------------------------------------------------------------------------
//	FORMAT FOOTER LAYOUT
//----------------------------------------------------------------------------------
jQuery(document).ready(function(){

jQuery('#footer-core .widget-area:last-child').addClass("last");

// Footer - Footer Widgets Layout (Options 1 - 6)
jQuery('#footer-core.option2 .widget-area').addClass("one_half");
jQuery('#footer-core.option3 .widget-area').addClass("one_third");
jQuery('#footer-core.option4 .widget-area').addClass("one_fourth");
jQuery('#footer-core.option5 .widget-area').addClass("one_fifth");
jQuery('#footer-core.option6 .widget-area').addClass("one_sixth");

// Footer - Footer Widgets Layout (Option 7)
jQuery('#footer-core.option7 #footer-col1.widget-area').addClass("one_third");
jQuery('#footer-core.option7 #footer-col2.widget-area').addClass("two_third");

// Footer - Footer Widgets Layout (Option 8)
jQuery('#footer-core.option8 #footer-col1.widget-area').addClass("two_third");
jQuery('#footer-core.option8 #footer-col2.widget-area').addClass("one_third");

// Footer - Footer Widgets Layout (Option 9)
jQuery('#footer-core.option9 #footer-col1.widget-area').addClass("one_fourth");
jQuery('#footer-core.option9 #footer-col2.widget-area').addClass("three_fourth");

// Footer - Footer Widgets Layout (Option 10)
jQuery('#footer-core.option10 #footer-col1.widget-area').addClass("three_fourth");
jQuery('#footer-core.option10 #footer-col2.widget-area').addClass("one_fourth");

// Footer - Footer Widgets Layout (Option 11)
jQuery('#footer-core.option11 #footer-col1.widget-area').addClass("one_fifth");
jQuery('#footer-core.option11 #footer-col2.widget-area').addClass("four_fifth");

// Footer - Footer Widgets Layout (Option 12)
jQuery('#footer-core.option12 #footer-col1.widget-area').addClass("four_fifth");
jQuery('#footer-core.option12 #footer-col2.widget-area').addClass("one_fifth");

// Footer - Footer Widgets Layout (Option 13)
jQuery('#footer-core.option13 #footer-col1.widget-area').addClass("one_sixth");
jQuery('#footer-core.option13 #footer-col2.widget-area').addClass("one_sixth");
jQuery('#footer-core.option13 #footer-col3.widget-area').addClass("one_sixth");
jQuery('#footer-core.option13 #footer-col4.widget-area').addClass("one_half");

// Footer - Footer Widgets Layout (Option 14)
jQuery('#footer-core.option14 #footer-col1.widget-area').addClass("one_half");
jQuery('#footer-core.option14 #footer-col2.widget-area').addClass("one_sixth");
jQuery('#footer-core.option14 #footer-col3.widget-area').addClass("one_sixth");
jQuery('#footer-core.option14 #footer-col4.widget-area').addClass("one_sixth");

// Footer - Footer Widgets Layout (Option 15)
jQuery('#footer-core.option15 #footer-col1.widget-area').addClass("one_sixth");
jQuery('#footer-core.option15 #footer-col2.widget-area').addClass("one_third");
jQuery('#footer-core.option15 #footer-col3.widget-area').addClass("one_half");

// Footer - Footer Widgets Layout (Option 16)
jQuery('#footer-core.option16 #footer-col1.widget-area').addClass("one_half");
jQuery('#footer-core.option16 #footer-col2.widget-area').addClass("one_third");
jQuery('#footer-core.option16 #footer-col3.widget-area').addClass("one_sixth");

// Footer - Footer Widgets Layout (Option 17)
jQuery('#footer-core.option17 #footer-col1.widget-area').addClass("one_fourth");
jQuery('#footer-core.option17 #footer-col2.widget-area').addClass("one_fourth");
jQuery('#footer-core.option17 #footer-col3.widget-area').addClass("one_sixth");
jQuery('#footer-core.option17 #footer-col4.widget-area').addClass("one_sixth");
jQuery('#footer-core.option17 #footer-col5.widget-area').addClass("one_sixth");

// Footer - Footer Widgets Layout (Option 18)
jQuery('#footer-core.option18 #footer-col1.widget-area').addClass("one_sixth");
jQuery('#footer-core.option18 #footer-col2.widget-area').addClass("one_sixth");
jQuery('#footer-core.option18 #footer-col3.widget-area').addClass("one_sixth");
jQuery('#footer-core.option18 #footer-col4.widget-area').addClass("one_fourth");
jQuery('#footer-core.option18 #footer-col5.widget-area').addClass("one_fourth");
});


//----------------------------------------------------------------------------------
//	FORMAT MAIN HEADER MENU
//----------------------------------------------------------------------------------
function mainmenu(){

	// Add menu-hover class
	jQuery("header .header-links ul.menu > li").hover(function(){
		jQuery(this).find('ul.sub-menu:first').css({visibility: "visible",display: "none"}).parent().addClass('menu-hover');
	},function(){
		jQuery(this).find('ul.sub-menu:first').css({visibility: "hidden",display: "none"}).parent().removeClass('menu-hover');
	});

	// Add menu-parent class
	jQuery("header .header-links ul.menu > li").each(function(){
		jQuery(this).find('ul.sub-menu').css({visibility: "visible",display: "none"}).parent().addClass('menu-parent');
	});

	// Add menu-hover class - DEFAULT MENU
	jQuery("header #header-links .menu > ul > li").hover(function(){
		jQuery(this).find('ul.children:first').css({visibility: "visible",display: "none"}).parent().addClass('menu-hover');
	},function(){
		jQuery(this).find('ul.children:first').css({visibility: "hidden",display: "none"}).parent().removeClass('menu-hover');
	});

	// Add menu-parent class - DEFAULT MENU
	jQuery("header #header .menu > ul > li").each(function(){
		jQuery(this).find('ul.children').css({visibility: "visible",display: "none"}).parent().addClass('menu-parent');
	});

	// Add smooth dropdown effect
	jQuery("header #pre-header li, header #header li").hover(function(){
		parentWidth = jQuery(this).width();
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none","min-width": parentWidth}).slideToggle(400);
	},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
	});
}
jQuery(document).ready(function(){
	mainmenu();
});

//----------------------------------------------------------------------------------
//	FLUID MEDIA SIZES (Modified from http://bavotasan.com/2012/better-way-to-resize-video-using-jquery)
//----------------------------------------------------------------------------------

// Videos
jQuery(document).ready(function() {

	// Supported Platforms
	var all_videos = jQuery( 'iframe[src*="//player.vimeo.com"], iframe[src*="//www.youtube.com"], iframe[src*="//blip.tv"], iframe[src*="//www.slideshare.net"], iframe[src*="//www.scribd.com"], iframe[src*="//revision3.com"], iframe[src*="//www.hulu.com"], iframe[src*="//www.funnyordie.com"], iframe[src*="//www.dailymotion.com"], embed[src*="//v.wordpress.com"], object, embed' );

	all_videos.each(function() {
		var el = jQuery(this);
		el
			.attr( 'data-aspectRatio', 360 / 640 )
			.attr( 'data-oldWidth', el.width() );
	} );

	jQuery(document).ready(function() {
		all_videos.each( function() {
		var el = jQuery(this),
			newWidth = el.parents().width(),
			oldWidth = el.attr( 'data-oldWidth' );

			el
				.removeAttr( 'height' )
				.removeAttr( 'width' )
				.width( newWidth )
				.height( newWidth * el.attr( 'data-aspectRatio' ) );
		});
	}).resize();

	jQuery(window)
		.resize( function() {
			all_videos.each( function() {
			var el = jQuery(this),
				newWidth = el.parents().width(),
				oldWidth = el.attr( 'data-oldWidth' );

				el
					.removeAttr( 'height' )
					.removeAttr( 'width' )
					.width( newWidth )
		    		.height( newWidth * el.attr( 'data-aspectRatio' ) );
			});
		}).resize();
});

// SoundCloud
jQuery(document).ready(function() {

	// Supported Platforms
	var all_sounds = jQuery( 'iframe[src^="http://w.soundcloud.com"]' );

	all_sounds.each(function() {
		var el = jQuery(this);
		el
			.attr( 'data-aspectRatio', el.attr( 'height' ) / el.attr( 'width' )  )
			.attr( 'data-oldWidth', el.width() );
	});

	jQuery(document).ready(function() {
		all_sounds.each( function() {
		var el = jQuery(this),
			newWidth = el.parents().width(),
			oldWidth = el.attr( 'data-oldWidth' );

			el
				.removeAttr( 'width' )
				.width( newWidth )
		});
	}).resize();

	jQuery(window)
		.resize( function() {
			all_sounds.each( function() {
			var el = jQuery(this),
				newWidth = el.parents().width(),
				oldWidth = el.attr( 'data-oldWidth' );

				el
					.removeAttr( 'width' )
					.width( newWidth )
			});
		}).resize();
});


/* ----------------------------------------------------------------------------------
	MASONRY - LOAD AFTER IMAGES HAVE LOADED
---------------------------------------------------------------------------------- */

jQuery(document).ready(function() {

	// Call imagedLoaded for Masonry if imagedLoaded function is available
	(function ( $ ) {
		if ( $.isFunction($.fn.imagesLoaded) ) {

			// Different target for masonry on portfolio pages than any other page
			if ( $( '#container' ).hasClass( 'portfolio-wrapper' ) ) {
				var $container = $('#container-inner');
			} else if ( $( 'body' ).hasClass( 'woo-shop-grid' ) ) {
				var $container = $('#main-core > .products');
			} else {
				var $container = $('#container');
			}

			$container.imagesLoaded( function() {
				if ( $.isFunction($.fn.masonry) ) {
					$container.masonry();
				}
			});
		}
	}( jQuery ));
});


//----------------------------------------------------------------------------------
//	WIDGETS
//----------------------------------------------------------------------------------

// Categories
jQuery(document).ready(function(){
	jQuery('.widget.thinkup_widget_categories .cat-item a').append('<i class="icon-chevron-right"></i>');
});


//----------------------------------------------------------------------------------
//	ADD _BLANK TO OUTGOING LINKS
//----------------------------------------------------------------------------------

jQuery(document).ready(function(){
	jQuery('.thinkup_widget_flickr a[href^="http://"], .thinkup_widget_flickr a[href^="https://"]').attr('target','_blank');
	jQuery('.thinkup_widget_socialshare a[href^="http://"], .thinkup_widget_socialshare a[href^="https://"]').attr('target','_blank');
	jQuery('.thinkup_widget_socialprofiles a[href^="http://"], .thinkup_widget_socialprofiles a[href^="https://"]').attr('target','_blank');
	jQuery('#pre-header-social a[href^="http://"], #pre-header-social a[href^="https://"]').attr('target','_blank');
	jQuery('#shareicons a[href^="http://"], #shareicons a[href^="https://"]').attr('target','_blank');
});


//----------------------------------------------------------------------------------
//	SHORTCODES
//----------------------------------------------------------------------------------

jQuery(document).ready(function() {

	// Accordion - Fix Bootstrap Toggle Issue
	jQuery('.accordion-toggle').click(function() {
	    if(jQuery(this).hasClass('collapsed')) {
	        jQuery(this).closest('.accordion').find('.accordion-toggle').not(this).addClass('collapsed');
	    }
	});

	// Divider - Scroll To Top
	jQuery('.backtotop').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
	});

	// Lightbox - Add Image Overlay
	jQuery('.lightbox').after('<span class="lightbox-overlay"></span>');

	// Tooltip - Activate Bootstrap
	jQuery('[data-tip]').each( function() {jQuery(this).tooltip({ placement: jQuery(this).data('tip') }); });

	/* Blog Post - Carousel (used for identifying if input variable is an integer */
	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}

	/* Blog Post - Activate CarouFredSel */
	jQuery(window).bind( 'load resize', function() {
		jQuery( '.sc-carousel' ).each( function(i) {

			// Don't run caroufredsel code if the following classes are present.
			if ( jQuery( this ).hasClass( 'sc-postitem' ) || 
				 jQuery( this ).hasClass( 'sc-featured' ) || 
				 jQuery( this ).hasClass( 'sc-image' ) ) {
					return;
			};

			var instanceID = 'sc-carousel-' + i;

			jQuery( this ).attr( 'id', instanceID );

			jQuery( this ).children( 'ul').attr( 'id', instanceID + '-inner' );

			var show   = jQuery( '#' + instanceID + '.sc-carousel' ).data( 'show' );
			var scroll = jQuery( '#' + instanceID + '.sc-carousel' ).data( 'scroll' );
			var speed  = jQuery( '#' + instanceID + '.sc-carousel' ).data( 'speed' );
			var effect = jQuery( '#' + instanceID + '.sc-carousel' ).data( 'effect' );

			if ( show == 0 || isNaN( show ) == true ) show = '3';
			if ( scroll == 0 || isNaN( scroll ) == true ) scroll = '1';
			if ( speed == 0 ) speed = '500';
			if ( effect == 0 ) {
				effect = '"scroll"'; 
			} else {
				effect = '"' + effect + '"';
			}

			var showItems = show;
			var scrollItems = scroll;
			var speedItems = speed;
			var fxItems = effect;

			var width = jQuery(window).width();

			if ( jQuery( 'body' ).hasClass( 'layout-responsive' ) ) {
				if(width <=685) {
						showItems = 2;
						if( scrollItems >= 2 ) {
							scrollItems = 2;
						}
				}
				if(width <=480) {
					showItems = 1;
					scrollItems = 1;
				}
			}

				// Apply carousel code if needed				
				if ( jQuery( this ).find( '#' + instanceID + '-inner' ).length ) {

					jQuery( this ).find( '#' + instanceID + '-inner' ).carouFredSel({
						width: '100%',
						items			: {
								visible         : showItems,
								minimum         : 3,
								minimum         : 3,
								start: 0
						},
						scroll			: {
								items           : scrollItems,
								fx              : fxItems,
								easing          : "swing",
								duration        : speedItems,
						},
						responsive      : true,
						circular        : true,
						infinite        : false,
						auto 	        : false,
						prev	: {	
							button	: '#' + instanceID + ' .prev',
							key		: 'left'
						},
						next	: { 
							button	: '#' + instanceID + ' .next',
							key		: 'right'
						},
						pagination	: '#' + instanceID + ' .pagination',
						onCreate: function () {
							jQuery(window).bind("load resize", function() {
							
							// Set height to testimonial carousel elements - Style 2 and Style 3
							parentWidthTestimonial = jQuery( '#' + instanceID + '.carousel-testimonial li').height();
							jQuery( '#' + instanceID + '.carousel-testimonial' ).height( 'auto' );
							jQuery( '#' + instanceID + '.carousel-testimonial .caroufredsel_wrapper' ).css( { 'height': parentWidthTestimonial } );

							// Set height to testimonial carousel elements - Style 1
							parentWidthTestimonial = jQuery( '#' + instanceID + '.carousel-testimonial.style1 .sc-carousel-thumbs').height();
							jQuery( '#' + instanceID + '.carousel-testimonial.style1' ).height( 'auto' );
							jQuery( '#' + instanceID + '.carousel-testimonial.style1 .sc-carousel-thumbs' ).parent().height( parentWidthTestimonial );
							});	
						}
					});
				}

				// Used for adding thumbnails to slider - Currently only for Testimonials slider
				if ( jQuery( this ).find('.sc-carousel-thumbs').length ) {

					jQuery( this ).find('.sc-carousel-thumbs').carouFredSel({
						responsive: true,
						circular: false,
						infinite: false,
						auto: false,
						prev: '#prev',
						next: '#next',
						items: {
							visible: {
								min: 2,
								max: 6
							},
							width: 150,
							height: 70
						}
					});
				}

				jQuery( this ).find('.sc-carousel-thumbs a').click(function() {
					jQuery('#' + instanceID + '-inner').trigger('slideTo', '#' + this.href.split('#').pop() );
					jQuery('.sc-carousel-thumbs a').removeClass('selected');
					jQuery( this ).addClass('selected');
					return false;
				});

			// Set carousel container height
			parentHeight = jQuery( '#' + instanceID + ' li').height();
			jQuery( '#' + instanceID + ' li' ).each(function() {
				var elementHeight = jQuery(this).height(); 
				parentHeight = elementHeight > parentHeight ? elementHeight : parentHeight;
			});

			// Add addition height if carousel thumbnails are showing
			if( jQuery( '#' + instanceID ).closest('.sc-carousel').find('.sc-carousel-thumbs').length > 0 ) {
				parentHeightThumb = parentHeight + jQuery( '#' + instanceID ).closest('.sc-carousel').find('.sc-carousel-thumbs').height();
			} else {
				parentHeightThumb = parentHeight;
			}

			// Assign height to unique carousel ID (Max used to ensure thumbnail carousel displays correctly)
			jQuery( '#' + instanceID ).height( Math.max( parentHeight, parentHeightThumb ) );
			jQuery( '#' + instanceID + '-inner' ).height( parentHeight );
			jQuery( '#' + instanceID + '-inner' ).parent().height( parentHeight );

			// Set carousel container height to auto if iframe exists in featured images
			if ( jQuery( '#' + instanceID + ' iframe').length > 0 ) {
				jQuery( '#' + instanceID ).addClass('carousel-iframe');
			}
		});

	}).resize();

});