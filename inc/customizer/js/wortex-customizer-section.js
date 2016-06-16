/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2015 Mathieu Sarrasin - Iceable Media
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add Wortex Pro upgrade message
	upgrade = $('<a class="wortex-customize-pro"></a>')
	.attr('href', "https://www.iceablethemes.com/shop/wortex-pro/")
	.attr('target', '_blank')
	.text(wortex_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.wortex-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );