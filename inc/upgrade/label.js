/**
 * Upgrade notice
 */
( function( $ ) {
 
	// Add Upgrade Message to Customizer Header
	if ('undefined' !== typeof advocatorLiteUpgrade) {
		upsell = $('<a class="advocator-lite-upgrade-link"></a>')
			.attr('href', advocatorLiteUpgrade.advocatorLiteUpgradeURL)
			.attr('target', '_blank')
			.text(advocatorLiteUpgrade.advocatorLiteUpgradeLabel)
			.css({
				'display' : 'inline-block',
				'background-color' : '#93b800',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '6px',
				'padding' : '3px 6px',
				'font-size': '9px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'clear' : 'both'
			})
		;
 
		setTimeout(function () {
			$('.preview-notice').append(upsell);
		}, 200);
 
		// Remove accordion click event
		$('.preview-notice').on('click', function(e) {
			e.stopPropagation();
		});
	}
 
} )( jQuery );
