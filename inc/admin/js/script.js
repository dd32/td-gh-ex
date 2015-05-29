( function( $ ) {
	// Add Make Plus message
		/*upgrade = $('<a class="stronghold-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/?add-to-cart=33')
			.attr('target', '_blank')
			.text(stronghold_upgrade.message)
		;
		$('.preview-notice').append(upgrade);
		// Remove accordion click event
		$('.stronghold-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});*/
		
		
		
// Services Section: Preview Selected Icon
  $(document).ready(function($){


    $('#accordion-section-services select').on('change', function(e){
		var optionSelected = $(this).find("option:selected").val();

	 	$(this).parent().parent().find('i.fa').hide();
		$(this).before("<i class='dinozoom fa-5x fa "+optionSelected+"'></i>");
		
    });

  });


//
} )( jQuery );