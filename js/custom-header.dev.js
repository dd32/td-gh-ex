var farbtastic;

function pickColor(color) {
	farbtastic.setColor(color);
	jQuery('#header-color').val(color);
	jQuery('#custom-background-image').css('header-color', color);
}

jQuery(document).ready(function() {
	jQuery('#pickcolor').click(function() {
		jQuery('#colorPickerDiv').show();
		return false;
	});

	jQuery('#header-color').keyup(function() {
		var _hex = jQuery('#header-color').val(), hex = _hex;
		if ( hex[0] != '#' )
			hex = '#' + hex;
		hex = hex.replace(/[^#a-fA-F0-9]+/, '');
		if ( hex != _hex )
			jQuery('#header-color').val(hex);
		if ( hex.length == 4 || hex.length == 7 )
			pickColor( hex );
	});

	jQuery('input[name="background-position-x"]').change(function() {
		jQuery('#custom-background-image').css('background-position', jQuery(this).val() + ' top');
	});

	jQuery('input[name="background-repeat"]').change(function() {
		jQuery('#custom-background-image').css('background-repeat', jQuery(this).val());
	});

	farbtastic = jQuery.farbtastic('#colorPickerDiv', function(color) {
		pickColor(color);
	});
	pickColor(jQuery('#header-color').val());

	jQuery(document).mousedown(function(){
		jQuery('#colorPickerDiv').each(function(){
			var display = jQuery(this).css('display');
			if ( display == 'block' )
				jQuery(this).fadeOut(2);
		});
	});
});
