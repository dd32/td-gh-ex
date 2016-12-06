/**
 * Upgrade notice
 */
( function( $ ) {

	// Add Upgrade Message to section
	if ('undefined' !== typeof advocatorLiteMiniUpgrade) {
		upsellMini = $('<span class="advocator-lite-upgrade-link"></span>')
			.text(advocatorLiteMiniUpgrade.advocatorLiteMiniUpgradeLabel)
			.css({
				'display' : 'inline-block',
				'background-color' : '#93b800',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '1px',
				'padding' : '3px 6px',
				'font-size': '9px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'clear' : 'both',
				'float' : 'right',
				'margin-right' : '30px'
			})
		;
 
		setTimeout(function () {
			$('#accordion-section-header h3, #accordion-section-home-top-widgets h3, #accordion-section-home-events-plus h3, #accordion-section-home-news-plus h3, #accordion-section-home-gallery-plus h3, #accordion-section-typography-plus h3, #accordion-section-footer h3, #accordion-section-events-calendar-plus h3, #accordion-section-give-plus h3, #accordion-section-woocommerce-plus h3').append(upsellMini);
		}, 200);

	}
 
} )( jQuery );
