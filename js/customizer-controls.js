/*
 * Customizer-controls.js
 *
 * Add Theme Page, Theme Documentation and Rate this theme quick links to theme options panel in customizer
 *
 */

( function( $ ) {

	// Add Theme Links
	if ('undefined' !== typeof rubine_theme_links) {
		
		// Theme Links Wrapper
		box = $('<div class="rubine-theme-links"></div>')
			.css({
				'margin-top' : '14px',
				'padding' : '2px 14px 14px',
				'line-height': '2',
				'font-size' : '14px',
				'clear' : 'both'
			});
		
		title = $('<h3></h3>').text(rubine_theme_links.title).css({ 'margin-bottom' : '4px' });
		
		// Theme Links
		themePage = $('<a class="rubine-theme-page"></a>')
			.attr('href', rubine_theme_links.themeURL)
			.attr('target', '_blank')
			.text(rubine_theme_links.themeLabel)
			.css({ 'display' : 'block' });
		
		themeDocu = $('<a class="rubine-theme-docu"></a>')
			.attr('href', rubine_theme_links.docuURL)
			.attr('target', '_blank')
			.text(rubine_theme_links.docuLabel)
			.css({ 'display' : 'block' });
		
		rateTheme = $('<a class="rubine-rate-theme"></a>')
			.attr('href', rubine_theme_links.rateURL)
			.attr('target', '_blank')
			.text(rubine_theme_links.rateLabel)
			.css({ 'display' : 'block' });
		
		// Add Links to Box
		content = box.append(title).append(themePage).append(themeDocu).append(rateTheme);
		
		setTimeout(function () {
			$('#accordion-panel-rubine_options_panel .control-panel-content').append(content);
		}, 2000);

		// Remove accordion click event
		$('.rubine-theme-links a').on('click', function(e) {
			e.stopPropagation();
		});
	}
	
} )( jQuery );