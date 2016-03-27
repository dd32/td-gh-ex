
// jQuery for Theme Options page

jQuery(document).ready(function($) {
	
	
	// Wrap each panel into a proper class for tabs
	var wrapped = $(".settings-sections-inner h2,.settings-sections-inner h3").wrap("<div class=\"ui-tabs-panel\">");
	wrapped.each(function() {
		$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
	});
	
	
	// Add id's to tabs and classes for hidden tabs
	$(".ui-tabs-panel").each(function(index) {
		var str = $(this).children("h3,h2").text().replace(/\s/g, "_");
		$(this).attr("id", str.toLowerCase());
		if (index > 0) {
			$(this).addClass("ui-tabs-hide");
		}
	});	
	
	
	// Initialize the tabs
	$(".ui-tabs").tabs({
        activate: function (event, ui) {
            var scrollPos = $(window).scrollTop();
            window.location.hash = ui.newPanel.selector;
            $(window).scrollTop(scrollPos);
        }
    });
	
	
	// Submit the form with ajax
	$('#theme-options-form').ajaxForm({ 
		success: function() {
			var successMessage = $('<div class="form-submit-message"><span class="dashicons dashicons-yes"></span>All changes have been saved</div><div class="form-submit-shadow"></div>').hide().fadeIn(500).delay(1200).fadeOut(500, function() {
				$(this).remove();
			});
			$("#wpcontent").append(successMessage);
			$(".form-submit-shadow, .form-submit-message").click(function() {
				$(".form-submit-shadow, .form-submit-message").fadeOut(500, function() {
					$(this).remove();
				});
			});
		},
		error: function() {
			var errorMessage = $('<div class="form-submit-message"><span class="dashicons dashicons-yes"></span>An error has occured; new settings have not been saved. Please try again.</div><div class="form-submit-shadow"></div>').hide().fadeIn(500).delay(1200).fadeOut(500, function() {
				$(this).remove();
			});
			$("#wpcontent").append(errorMessage);
			$(".form-submit-shadow, .form-submit-message").click(function() {
				$(".form-submit-shadow, .form-submit-message").fadeOut(500, function() {
					$(this).remove();
				});
			});
		}
	}); 
		
		
	// Add placeholders to text and textarea fields
	$("input[type=text], textarea").each(function() {
		if ($(this).val() === $(this).attr("placeholder")) {
			$(this).css("color", "#999");
		}
	});
	$("input[type=text], textarea").focus(function() {
		if ($(this).val() === $(this).attr("placeholder")) {
			$(this).val("");
			$(this).css("color", "#000");
		}
	}).blur(function() {
		if ($(this).val() === "" || $(this).val() === $(this).attr("placeholder")) {
			$(this).val($(this).attr("placeholder"));
			$(this).css("color", "#999");
		}
	});
	
	
	// Firefox fix for placeholders
	if ($.browser.mozilla)  {
         $("form").attr("autocomplete", "off");
	}
	
	
	// Show content after it's been loaded
	var $spinner = $(".spinner-loading").hide(300);
	var $content = $(".wrap h3, .wrap h2, .wrap table, .wrap .submit").show(300);
	$spinner.$content;
	
	
	// Add Color Picker to all inputs with specific class
    $(function() {
        $('.color-field').wpColorPicker();
    });
	
	
	// Upload field
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;
	$('.upload-button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment) {
			if ( _custom_media ) {
				$("#"+id).val(attachment.url);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}
		wp.media.editor.open(button);
		return false;
	});
	
	
	// Field logic
	function revealFields() {
		$('.parent').each(function() {
			$parentEl = $(this);
			var parentValue = $parentEl.find(':selected').attr('value');
			var classText = $parentEl.attr('class');
			var classes = classText.split(" ");
			cleanClasses = $.grep(classes, function(value) {
				return ( value != 'parent' && value != 'hidden' );
			});
			var activeClass = cleanClasses[parentValue];
			if ( activeClass != 'noaction' ) {
				if ( ! $parentEl.hasClass('hidden') ) {
					$('.'+activeClass).parents('tr').removeClass('hidden', 3000);
				}
			} else {
				var hideClasses = $.grep(cleanClasses, function(value) {
					return ( value != 'noaction' );
				});
				$.each( hideClasses, function( index, value ) {
					$('.'+value).parents('tr').addClass('hidden', 3000);
				});
			}
		});
	}
	revealFields();
	$('.parent select').change( function() {
		revealFields();
	});
	
	
});