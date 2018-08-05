(function( $, customize ) {
	customize.bind( 'ready', function () {
		var controls = [
			customize.control( 'aamla_primary_google_font' ),
			customize.control( 'aamla_secondary_google_font' ),
			customize.control( 'aamla_tertiary_google_font' )
		];

		$.each( controls, function( i, control ) {
			control.container.on( 'click', '.advanced-button', function(event) {
				$( this ).parent().next( ".google-font-additional-settings" ).slideToggle('fast', 'linear');
			} );
			control.container.on( 'change', 'input[type="checkbox"]', function() {
		
				var value = [],
				i = 0;
	
				// Build the value as an object using the sub-values from individual checkboxes.
				$.each( control.params.weight.choices, function( key, subValue ) {
					if ( control.container.find( 'input[value="' + key + '"]' ).is( ':checked' ) ) {
						value[ i ] = key;
						i++;
					}
				});
				control.settings.weight.set( value );
			} );
			control.container.on( 'change', 'select.aamla-select', function() {
				var value = $(this).val(),
					fontWeight = [];
	
				control.settings.family.set( value );
	
				if ( value in control.params.sans ) {
					fontWeight = control.params.sans[value].variants;
				} else if ( value in control.params.serif ) {
					fontWeight = control.params.serif[value].variants;
				}
	
				$.each( control.params.weight.choices, function( key, subValue ) {
					var weight = control.container.find( 'input[value="' + key + '"]' ).next();
					if ( -1 !== fontWeight.indexOf(key) ) {
						weight.removeClass( 'strikethrough' );
					} else {
						weight.addClass( 'strikethrough' );
					}
				});
			} );
		} );
	} );
}( jQuery, wp.customize ));
