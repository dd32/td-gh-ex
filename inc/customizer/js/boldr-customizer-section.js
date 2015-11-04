/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013-2015 Mathieu Sarrasin - Iceable Media
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add BoldR Pro upgrade message
	upgrade = $('<a class="boldr-customize-pro"></a>')
	.attr('href', "http://www.iceablethemes.com/shop/boldr-pro/")
	.attr('target', '_blank')
	.text(boldr_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.boldr-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );