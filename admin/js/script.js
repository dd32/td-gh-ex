( function( $ ) {
	// Add Make Plus message
		upgrade = $('<a class="boxy-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/theme/boxy-pro/')
			.attr('target', '_blank')
			.text(boxy_upgrade.message) 
		;
		demo = $('<a class="boxy-docs"></a>')
			.attr('href','http://boxy.webulous.in/')   
			.attr('target','_blank')
			.text(boxy_upgrade.demo);
		docs = $('<a class="boxy-docs"></a>')
			.attr('href','http://www.webulousthemes.com/boxy-free/')
			.attr('target','_blank')
			.text(boxy_upgrade.docs);
		support = $('<a class="boxy-docs"></a>')
			.attr('href','http://www.webulousthemes.com/support-ticket/')
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