

jQuery(document).ready(function($) {
		if (pagenow && pagenow == 'b3_slide') {
			$('textarea.wp-editor-area').css('height', '150px');
		}
		try { $('.b3-color-option').wpColorPicker(); }
		finally {}
});

function b3_reset() {
	if (confirm(b3_admin.reset)) {
		jQuery('#b3_action').val('reset');
		jQuery('#b3_options_form').submit();
	}
}

function b3_upload() {
	if (confirm(b3_admin.upload)) {
		jQuery('#b3_action').val('upload');
		jQuery('#b3_options_form').submit();
	}
}
