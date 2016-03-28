( function( $ ) {
	// Add Make Plus message
		upgrade = $('<a class="boxy-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/request-free-trial-for-themes/')
			.attr('target', '_blank')
			.text(boxy_upgrade.message)
		;
		demo = $('<a class="boxy-docs"></a>')
			.attr('href','http://demo.webulous.in/boxy/')   
			.attr('target','_blank')
			.text(boxy_upgrade.demo);
		docs = $('<a class="boxy-docs"></a>')
			.attr('href','http://documentation.webulous.in/boxy-free/')
			.attr('target','_blank')
			.text(boxy_upgrade.docs);
		support = $('<a class="boxy-docs"></a>')
			.attr('href','http://www.webulousthemes.com/forums/forum/free-support/boxy/')
			.attr('target','_blank')
			.text(boxy_upgrade.support);

		$('.preview-notice').append(upgrade);
		$('.preview-notice').append(demo);
		$('.preview-notice').append(docs);
		$('.preview-notice').append(support);
		// Remove accordion click event
		$('.boxy-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});
		$('.boxy-docs').on('click',function(e){
			e.stopPropagation();
		})
} )( jQuery );