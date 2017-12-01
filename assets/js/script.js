(function($) {

	var azonbooster = {

		initAll: function() {

			this.navigation();
			this.navSearch();
		},
		navigation: function() {

			// Apply top position for nav first
			var mhHeigh = $('#masthead').innerHeight();
			$('#site-navigation').css('top', mhHeigh + 'px' );

			$('.menu-toggle').on('click touch', function() {

				var hasActive = $(this).hasClass('active');

				if ( !hasActive ) {

					$('body').addClass('nav-open');
					$(this).addClass('active');
					
				} else {
					$('body').removeClass('nav-open');
					$(this).removeClass('active');
				}

			});
		},

		navSearch: function() {

			//var mhHeigh = $('#masthead').height() - 50;
			//$('.site-search').css('top', mhHeigh + 'px' );

			//$('.header-right').css('height', $('.header-left').height() + 'px');

			$('.search-toggle').on('click', function(e) {
				e.preventDefault();

				$(this).addClass('active');
				$('body').addClass('search-open');
				$(this).hide();
			});

			$('.search-toggle-close').on('click', function(e) {
				e.preventDefault();
				$(this).removeClass('active');
				$('body').removeClass('search-open');
				$('.search-toggle').show('slow');
			});
		}
	};

	$(document).ready(function() {
		azonbooster.initAll();
	});

})(jQuery);