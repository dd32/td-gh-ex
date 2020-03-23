(function ($) {
	//ZIDI ONE

	$(document).ready(function () {

		$('.panbtn').on("click", () => {
			$(".panbtn").toggleClass('close');
		});


		$('.panbtn').on("focus", () => {
			$(".panbtn").toggleClass('close');
		});


		$(window).on('resize', function() {

			if ($(window).width() > 767 ) {
				$(".panbtn").removeClass('close');
			}

			if ($(window).width() < 767 ) {
				$(".panbtn").removeClass('close');
			}

			if ($(window).width() < 767 ) {

				$('.nav-wrap ul li ul > li:last-child a').on("focusout", () => {
					if($(".theme-nav").length) {
						$(".panbtn").toggleClass('close');
					}
					
				});

			}

		});

 

	});	


})(this.jQuery);
