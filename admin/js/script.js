( function( $ ) {
	// Add Make Plus message
		upgrade = $('<a class="greenr-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/?add-to-cart=27')
			.attr('target', '_blank')
			.text(greenr_upgrade.message)  
		;
		demo = $('<a class="greenr-docs"></a>')
			.attr('href','http://demo.webulous.in/greenr/')
			.attr('target','_blank')
			.text(greenr_upgrade.demo);
		docs = $('<a class="greenr-docs"></a>')
			.attr('href','http://documentation.webulous.in/greenr-free/')
			.attr('target','_blank')
			.text(greenr_upgrade.docs);
		support = $('<a class="greenr-docs"></a>')
			.attr('href','http://www.webulousthemes.com/forums/forum/free-support/greenr/')
			.attr('target','_blank')
			.text(greenr_upgrade.support);

		$('.preview-notice').append(upgrade);
		$('.preview-notice').append(demo);
		$('.preview-notice').append(docs);
		$('.preview-notice').append(support);
		// Remove accordion click event
		$('.greenr-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});
		$('.greenr-docs').on('click',function(e){
			e.stopPropagation();
		})
} )( jQuery );