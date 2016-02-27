
jQuery(document).ready(function ($) {

	$('#customize-info .preview-notice').html('<a class="button button-primary" href="http://www.mojo-themes.com/item/maxflat-fully-responsive-flat-design-theme-for-blog-or-small-magazine/?r=netbiel" target="_blank">Upgrade to MaxFlat Pro version</a>');
	$('#customize-info .preview-notice').append('<p style="color: #d10000">The pro version includes more Customizer options e.g. backgrounds, colors, fonts and layout adjustments, extended support and more!</p>');
	$(".maxflat_project_layout_width").noUiSlider({

		range:[900, 1280], slide:triggerChange, start:$("#maxflat_project_layout_width").val(), handles:1, step: 1, serialization:{
			to:$("#maxflat_project_layout_width"),  resolution: 1
		}

	});

	$(".maxflat_project_sidebar_resize").noUiSlider({

		range:[250, 350], slide:triggerChange, start:$("#maxflat_project_sidebar_resize").val(), handles:1, step: 1, serialization:{
			to:$("#maxflat_project_sidebar_resize"), resolution: 1
		}

	});


});

function triggerChange() {
	jQuery('input').change();






}