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
			$('#accordion-section-pro h3').append(upsellMini);
		}, 200);

	}
 
} )( jQuery );
