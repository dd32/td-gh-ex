/**
 *	
 *	JS for the Custom Customizer Controls
 *
**/

jQuery(document).ready( function() {
	"use strict";


	// Update the values for all our Featured Areas and initialise the sortable repeater

	
	jQuery('.drag_and_drop_control').each(function() {
		// If there is an existing customizer value, populate our rows
		var defaultValuesArray = jQuery(this).find('.customize-control-drag-and-drop')
										.val()
										.split(',');
		// Store all the Text values of the draggable fields in a variable
		var defaultTextArray   = jQuery.map(defaultValuesArray, function( val, i ) {
			return jQuery('.drag_and_drop_control').find('[data-sorter=' + defaultValuesArray[i] + ']').text();
		});
		
		var numRepeaterItems = defaultValuesArray.length;

		var i;
		
		for ( i = 0; i <= numRepeaterItems; i++ ) {
			jQuery(this).find('.repeater:eq(' + i + ')')
				.attr('data-sorter',defaultValuesArray[i])
				.html('<div class="repeater-input">' + defaultTextArray[i] + '</div>');
		}
		
		if ( sorter.woocommerce == '' ) {
			jQuery('.sortable').find('[data-sorter="feat_prod"],[data-sorter="feat_prod_car"]').remove();
		}
	});

	// Make our Repeater fields sortable

	jQuery(this).find('.sortable').sortable({
		items: "> li:not(.disabled)",
		helper: 'clone',
		update: function(event, ui) {
			dvtGetAllInputs(jQuery(this).parent());
		}
	});
	
	jQuery.each(sorter, function( key, value ) {
		if ( value == 'disable' ) {
			jQuery( '.sortable' ).find( '[data-sorter=' + key + ']' ).addClass( 'disabled' );
		}
	});
	
	jQuery('.sortable').find('li').each(function() {
		jQuery(this).hasClass('disabled') ? jQuery(this).removeData('sortableItem') : false;
	});
	
	
	// Get the values from the repeater input fields and add to our hidden field

	function dvtGetAllInputs(jQueryelement) {
		
		var inputValues = jQueryelement.find('.repeater').map(function() {
			return jQuery(this).attr('data-sorter');
		}).toArray();
		
		// Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
		jQueryelement.find('.customize-control-drag-and-drop').val(inputValues);
		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		jQueryelement.find('.customize-control-drag-and-drop').trigger('change');
	}
	
	// Reset the Order on clicking on the Reset Button
	jQuery('.sorter_reset').click(function() {
		
		var defaultValue	=	'feat_posts,feat_posts_car,feat_cat,feat_prod,feat_prod_car';
		
		var defaultValueArray	=	defaultValue.split(',');
		
		var defaultTextArray   = jQuery.map(defaultValueArray, function( val, i ) {
			return jQuery('.drag_and_drop_control').find('[data-sorter=' + defaultValueArray[i] + ']').text();
		});
		
		var numRepeaterItems = defaultValueArray.length;

		var i;
		
		for ( i = 0; i <= numRepeaterItems; i++ ) {
			jQuery('.sortable').find('.repeater:eq(' + i + ')')
				.attr('data-sorter',defaultValueArray[i])
				.html('<div class="repeater-input">' + defaultTextArray[i] + '</div>');
		}
		
		// Add the default value in the hidden field to save it
		jQuery('.drag_and_drop_control').find('.customize-control-drag-and-drop').val(defaultValue);
		// Make sure to trigger change event to tell Customizer to save a field
		jQuery('.drag_and_drop_control').find('.customize-control-drag-and-drop').trigger('change');
		
	});
	
	
	
	//Enable Disable Switch Control
    jQuery('body').on('click', '.enable-disable-switch', function () {
	    
        var jQuerythis = jQuery(this);
        
        if (jQuerythis.hasClass('switch-enable')) {
	        
            jQuery(this).removeClass('switch-enable');
            jQuerythis.next('input').val('disable').trigger('change');
            
        } else {
	        
            jQuery(this).addClass('switch-enable');
            jQuerythis.next('input').val('enable').trigger('change');
            
        }
    });

});