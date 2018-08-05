/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
	$(document).ready(function () {
		if ( 'undefined' === typeof wp || !wp.customize || !wp.customize.selectiveRefresh ) {
			return;
		}

		wp.customize.selectiveRefresh.bind('widget-updated', function (placement) {
			switch ( placement.widgetIdParts.idBase ) {
				case 'beenews_slider_widget':
					machothemes.initMainSlider($);
					break;
			}
			machothemes.initBlazyLoad($);
			machothemes.initStyleSelects($);
		});
	});
})(jQuery);