(function($) {
	var azauthority = {

		init: function() {
			this.navMenu();
			this.navSearch();
			this.scrollTop();
		},
		/**
		 * Menu Toggle
		 * 
		 * @return void
		 */
		navMenu: function() {
			$('<span class="sub-arrow"><i class="fa fa-angle-down"></i></span>').insertAfter( $('.menu-item-has-children > a') );

			$('.menu-item-has-children .sub-arrow').click(function(e) {
				e.preventDefault();
				e.stopPropagation();

				var subMenuOpen = $(this).hasClass('sub-menu-open');
				
				if ( subMenuOpen ) {
					
					$(this).removeClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
					$(this).next('ul.sub-menu, ul.children').removeClass('active').slideUp();
				
				} else {
					
					$(this).addClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
					$(this).next('ul.sub-menu, ul.children').addClass('active').slideDown();

				}

			});
			
			$('.menu-toggle').on('click', function(e) {

				e.preventDefault();
				$(this).addClass('active');
				$('body').addClass('nav-open');			

			});

			$('.menu-toggle-close').on('click', function(e) {
				e.preventDefault();

				$('.menu-toggle').removeClass('active');
				$('body').removeClass('nav-open');

			});

			$('#lightbox').click(function() {
				if ($('body').hasClass('nav-open')) {
					$('body').removeClass('nav-open');
				}
			});
			
		},
		/**
		 * Toggle Search Click
		 * 
		 * @return void
		 */
		navSearch: function() {
			$('.search-toggle-open').on('click', function(e) {
				e.preventDefault();

				$('body').toggleClass('search-open');
				
				//$(this).hide();

				$('.site-search .search-field').focus();

			});

			$('.search-toggle-close').on('click', function(e) {
				e.preventDefault();

				$('body').removeClass('search-open');
				$('.search-toggle-open').show();

			});

			$('#s-lightbox').click(function() {
				if ($('body').hasClass('search-open')) {
					$('body').removeClass('search-open');
				}
			});




		},

		/**
		 * Scroll To Top
		 * 
		 * @return void
		 */

		scrollTop: function() {

			$('.back-to-top').click( function() {

				$('html, body').animate({scrollTop : 0},800);
				return false;

			});

			$(document).scroll ( function() {
				
				var topPositionScrollBar = $(document).scrollTop();
				
				if ( topPositionScrollBar < '150' ) {
					
					$('.back-to-top').fadeOut();
				
				} else {

					$('.back-to-top').fadeIn();

				}

			});


		}


	}; // var azauthority

	$(document).ready(function() {
		azauthority.init();
	});

	$(document).mouseleave(function () {
		
	});

	$(window).load(function(){
  		//
	});
}) (jQuery);