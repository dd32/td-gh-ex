/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function () {
	wp.customize.bind('ready', function () {

		wp.customize('wprig_top_right_header_content', function (setting) {
			if ('menus' == setting.get()) {
				$('#customize-control-arrival_top_right_header_menus').addClass('op-visible');
				$('#customize-control-arrival_top_social_redirect_btn').addClass('op-hidden'); //social icon redirect btn
			} else {
				$('#customize-control-arrival_top_right_header_menus').removeClass('op-visible');
				$('#customize-control-arrival_top_social_redirect_btn').addClass('op-visible'); //social icon redirect btn
			}
		});

		$(document).on('change', '#_customize-input-arrival_top_right_header_content', function () {
			var curentVal = $(this).val();
			if ('menus' == curentVal) {
				$('#customize-control-arrival_top_right_header_menus').addClass('op-visible');
				$('#customize-control-arrival_top_social_redirect_btn').addClass('op-hidden'); //social icon redirect btn
				$('#customize-control-arrival_top_social_redirect_btn').toggleClass('op-visible');
			} else {
				$('#customize-control-arrival_top_right_header_menus').removeClass('op-visible');
				$('#customize-control-arrival_top_social_redirect_btn').addClass('op-visible'); //social icon redirect btn
				$('#customize-control-arrival_top_social_redirect_btn').toggleClass('op-hidden');
			}
		});

		//main navigation last item
		wp.customize('wprig_main_nav_right_content', function (setting) {
			if ('button' == setting.get()) {
				$('#customize-control-arrival_main_nav_right_btn').addClass('op-visible');
			} else {
				$('#customize-control-arrival_main_nav_right_btn').removeClass('op-visible');
			}
		});

		$(document).on('change', '#_customize-input-arrival_main_nav_right_content', function () {
			var curentVal = $(this).val();
			if ('button' == curentVal) {
				$('#customize-control-arrival_main_nav_right_btn').addClass('op-visible');
			} else {
				$('#customize-control-arrival_main_nav_right_btn').removeClass('op-visible');
			}
		});
	});
})(jQuery);