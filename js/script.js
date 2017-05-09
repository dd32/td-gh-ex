jQuery.fn.exists = function(callback) {
	var args = [].slice.call(arguments, 1);
	if (this.length) {
		callback.call(this, args);
	}
	return this;
};

(function($) {

	var base = {
		initAll: function() {
			this.mainmenu();
			this.mobileMenu();
			this.scrollTop();
			this.stickyMenu();
			this.socialSharer();
			this.loadSocialScript(document, 'script');
			if (typeof loadStyle != 'undefined') {
				if (loadStyle === 'infinite') {
					this.infiniteScroll();
				} else {
					this.infiniteLoading();	
				}
			}
		},
		mainmenu: function() {
				$menu = $('.main-navigation > ul li.menu-item-has-children > a');
				$menu.append('<span class="arrow-main-menu"><i class="fa fa-angle-down"></i></span>');

				$('.main-navigation ul.sub-menu').hide();
				var time;
				var delay = 100;
				$('.main-navigation li').hover(
						function() {
							var $this = $(this);
							time = setTimeout(function(){ 
							$this.children('ul.sub-menu').slideDown(600); 
							}, delay);
							
						},
						function() {
							$(this).children('ul.sub-menu').hide();
							clearTimeout(time);
						}
					);

		},
		mobileMenu: function() {
			var $primary_menu = $('#primary-navigation');
			var $secondary_menu = $('#category-navigation');
			var $first_menu = '';
			var $second_menu = '';

			$('.sub-menu').parent().append('<span class="arrow-menu"><i class="fa fa-angle-down"></i></span>');

			if ($primary_menu.length == 0 && $secondary_menu.length == 0) {
				return;
			} else {
				if ($primary_menu.length) {
					$first_menu = $primary_menu;
					if($secondary_menu.length) {
						$second_menu = $secondary_menu;
					}
				} else {
					$first_menu = $secondary_menu;
				}
			}
			var menu_wrapper = $first_menu
			.clone().attr('class', 'mobile-menu')
			.wrap('<div id="mobile-menu-wrapper" class="mobile-only"></div>').parent().hide()
			.appendTo('body');


			// Add items from the other menu
			if ($second_menu.length) {
				$second_menu.clone().appendTo('#mobile-menu-wrapper');
			}
			
			
			$('.menu-toggle').click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				$('#mobile-menu-wrapper').show(); // only required once
				$('body').toggleClass('mobile-menu-active');
			});

			$('#page').click(function() {
				if ($('body').hasClass('mobile-menu-active')) {
					$('body').removeClass('mobile-menu-active');
				}
			});

			if($('#wpadminbar').length) {
				$('#mobile-menu-wrapper').addClass('wpadminbar-active');
			}


			$('.arrow-menu').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				var subMenuOpen = $(this).hasClass('sub-menu-open');
				

				if ( subMenuOpen ) {
					$(this).removeClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
					$(this).prev('ul.sub-menu').slideUp();
				} else {
					$(this).prev('ul.sub-menu').slideDown();
					$(this).addClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
				}

			});
		

		},
		stickyMenu: function() {
			var self = this;

			var catcher = $('#catcher'),
				sticky  = $('#sticky'),
				bodyTop = $('body').offset().top;

			if ( sticky.length ) {
				$(window).scroll(function() {
					self.stickThatMenu(sticky,catcher,bodyTop);
				});
				$(window).resize(function() {
					self.stickThatMenu(sticky,catcher,bodyTop);
				});
			}
		},
		isScrolledTo: function(elem,top) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var elemTop = $(elem).offset().top - top;
			var elemBottom = elemTop + $(elem).height();

			return ((elemTop <= docViewTop));
		},
		stickThatMenu: function(sticky,catcher,top) {
			var self = this;

			if(self.isScrolledTo(sticky,top)) {
				sticky.addClass('sticky-nav');
				catcher.height(sticky.height());
			} 
			var stopHeight = catcher.offset().top;
	
			if ( stopHeight > sticky.offset().top) {
				sticky.removeClass('sticky-nav');
				catcher.height(0);
			}
		},
		scrollTop : function() {
			$(".back-to-top").click(function () {
				$('html, body').animate({scrollTop : 0},800);
				return false;
			});

			$(document).scroll ( function() {
				var topPositionScrollBar = $(document).scrollTop();
				if ( topPositionScrollBar < "150" ) {
					$(".back-to-top").fadeOut();
				} else {
					$(".back-to-top").fadeIn();
				}
			});
		},
		infiniteLoading: function() {
			var pageNumber = 2;

			jQuery("#load-more-post").on('click', function(e) {

			if ( pageNumber <= totalPages ) {
				var that = this;
				e.preventDefault();

				var data = {
							action: 'infinite_scroll',
							nonce: baseLoadMore.nonce,
							page: pageNumber,
							query: baseLoadMore.query,
						};

				jQuery.ajax({
					url: baseLoadMore.url,
					type:'POST',
					data: data,
					beforeSend : function() {
						jQuery(that).html(jQuery(that).data('loading'));
					}

				}).done(function(html) {
					jQuery(".post-wrapper").append(html);
					jQuery(that).html(jQuery(that).data('more'));
				});
				pageNumber++;

				if ( pageNumber > totalPages ) {
					jQuery(this).parent().hide();
				}
			}

			e.preventDefault();

			});

		},
		infiniteScroll: function() {
			var pageNumber = 2;
			var isLoading = false;
			jQuery(window).scroll(function(){

				if($(window).scrollTop() + $(window).height() > $('#main').height()) {

					if (pageNumber <= totalPages && isLoading === false) {

						var data = {
							action: 'infinite_scroll',
							nonce: baseLoadMore.nonce,
							page: pageNumber,
							query: baseLoadMore.query,
						};
						
						jQuery.ajax({
							url: baseLoadMore.url,
							type: 'POST',
							data: data,
							beforeSend: function () {
								isLoading = true;
								$('.tc-infinite-scroll').show();
							},
							success: function (data) {
								jQuery(".post-wrapper").append(data); 
								isLoading = false;
								pageNumber++;
								$('.tc-infinite-scroll').removeAttr('style');
							}

						});

					}
				}
			}); 
		},
		
	socialSharer: function() {
			if( $('.tc-social-sharing').length ) {
				//Call jqSocialSharer
				$('.tc-social-sharing a').jqSocialSharer();

				$('.btn-hide').on('click', function(e) {
					e.preventDefault();
					var open = $(this).hasClass('active');
					if(!open) {
						$(this).addClass('active');
						$('.sticky-left').addClass('hide-social');
					} else {
						$(this).removeClass('active');
						$('.sticky-left').removeClass('hide-social');
					}
				});
			}
		},
	loadSocialScript: function(d,s) {
			var js, fjs = d.getElementsByTagName(s)[0],
			load = function(url, id) {
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.src = url;
				js.id = id;
				fjs.parentNode.insertBefore(js, fjs);
			};
			$('span.facebookbtn, .fb-like-box').exists(function() {
				load('//connect.facebook.net/en_US/all.js#xfbml=1', 'fbjssdk');
			});
			$('span.gplusbtn').exists(function() {
				load('https://apis.google.com/js/plusone.js', 'gplus1js');
			});
			$('span.twitterbtn').exists(function() {
				load('//platform.twitter.com/widgets.js', 'tweetjs');
			});
			$('span.linkedinbtn').exists(function() {
				load('//platform.linkedin.com/in.js', 'linkedinjs');
			});
			$('span.pinbtn, .tc-pinterest-profile').exists(function() {
				load('//assets.pinterest.com/js/pinit.js', 'pinterestjs');
			});
			$('span.stumblebtn').exists(function() {
				load('//platform.stumbleupon.com/1/widgets.js', 'stumbleuponjs');
			});
		},
		skipLinkFocusFix: function() {
			var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
			is_opera	= navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
			is_ie		= navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

			if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
				window.addEventListener( 'hashchange', function() {
					var element = document.getElementById( location.hash.substring( 1 ) );

					if ( element ) {
						if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
							element.tabIndex = -1;

						element.focus();
					}
				}, false );
			}
		}
	};

	$(document).ready(function() {
		base.initAll();
	});	

})(jQuery);