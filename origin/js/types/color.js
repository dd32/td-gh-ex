jQuery(function($){
	$('fieldset.type-color').each(function(){
		var $$ = $(this);
		$$.find('.current').ColorPicker({
			'color' : $$.find('input').val(),
			onChange: function (hsb, hex, rgb) {
				$$.find('.current').css('background-color', '#' + hex);
				$$.find('input').val('#' + hex);
			},
			onSubmit: function(){
				previewUpdate($$.find('input')) // Update the preview
			},
			onHide: function(){
				previewUpdate($$.find('input')) // Update the preview
			} 
		});
		
		$$.find('input').change(function(){
			var $this = $(this);
			$$.find('.current').ColorPickerSetColor($this.val());
			$$.find('.current').css('background-color', $this.val());
		});
	});
});