jQuery(document).ready(function($) {
    'use strict';
	var api = wp.customize;
	// Hide the section sidebars
		$( 'div[id*=section-]' ).each( function( i, s ) {
			$( s ).parent( '.widgets-holder-wrap' ).hide();
		});
		
		$('#sub-accordion-panel-avata_frontpage_sections_panel > li.control-section > .accordion-section-title').append('<i class="fa fa-arrows">&nbsp;</i>');
		$('#sub-accordion-panel-avata_frontpage_sections_panel').sortable({items: "> li.control-section",update: function( event, ui ){
			
			var sections = new Array(),i = 0;
			$('#sub-accordion-panel-avata_frontpage_sections_panel > li.control-section:visible').each(function(index, element) {
                var id = $(this).attr('id');
				api.section( id.replace('accordion-section-','') ).priority( i+10 );
				id = id.replace('accordion-section-avata_','');	
				id = id.replace(/_/g, '-');
				sections[i] = id;
				i++;
            });
			
			var data_to_send = JSON.stringify(sections);
			api.instance('avata[section_order]').set(data_to_send)
        	api.instance('avata[section_order]').previewer.refresh();
			
		
			/*$.ajax({
				type: "POST",
				dataType:"html",
				url: avata_params.ajaxurl,
				data: { action: "sortsections",sections:sections }
			  })
				.done(function( msg ) {
				  $('#re-order-saved').remove();
				  $('#sub-accordion-panel-avata_frontpage_sections_panel').append('<li id="re-order-saved" style="padding: 10px;color: green;font-size: 16px;">'+avata_params.i18n_01+'</li>');
				  
				});*/
			
			
			}});
				
			
});