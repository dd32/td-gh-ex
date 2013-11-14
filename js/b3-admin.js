

jQuery(document).ready(function($) {
		if (pagenow && pagenow == 'b3_slide') {
			$('textarea.wp-editor-area').css('height', '150px');
		}
		try { $('.b3-color-option').wpColorPicker(); }
		finally {}
});

function b3_reset() {
	if (confirm('All theme settings will be replaced by default dettings. Continue?')) {
		jQuery('#b3_action_reset').val('1');
		jQuery('#b3_options_form').submit();
	}
}

function b3_upload() {
	if (confirm('Theme settings will be replaced by settings from the uploaded file. Continue?')) {
		jQuery('#b3_action_upload').val('1');
		jQuery('#b3_options_form').submit();
	}
}
