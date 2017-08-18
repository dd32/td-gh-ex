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

			var mhHeigh = $('#masthead').height() - 50;
			$('.site-search').css('top', mhHeigh + 'px' );

			$('.header-right').css('height', $('.header-left').height() + 'px');

			$('.search-toggle').on('click', function(e) {
				e.preventDefault();

				$('body').removeClass('nav-open');
				$('.menu-toggle').removeClass('active');

				var hasActive = $(this).hasClass('active');

				if ( !hasActive ) {
					$(this).addClass('active');
					$('body').addClass('search-open');
				} else {
					$(this).removeClass('active');
					$('body').removeClass('search-open');
				}
			});
		}
	};

	$(document).ready(function() {
		azonbooster.initAll();
	});

})(jQuery);