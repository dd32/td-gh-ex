function show_value(x)
{
 document.getElementById("slider_value").innerHTML=x;
}
function show_value1(x)
{
 document.getElementById("slider_value1").innerHTML=x;
}
jQuery(document).ready(function($) {
	$('.remove-image').click(function(e) {
        $('#logo').val('');
    });
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	// Switches option sections
	$('.group').hide();
	var active_tab = '';
	if (typeof(localStorage) != 'undefined' ) {
		active_tab = localStorage.getItem('"active_tab"');

	}
	if (active_tab != '' && $(active_tab).length ) {
		$(active_tab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	if (active_tab != '' && $(active_tab + '-tab').length ) {
		$(active_tab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("active_tab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		// Editor Height (needs improvement)
		$('.wp-editor-wrap').each(function() {
			var editor_iframe = $(this).find('iframe');
			if ( editor_iframe.height() < 30 ) {
				editor_iframe.css({'height':'auto'});
			}
		});
	
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
		
	(function($) {
		var allPanels = $('.theme-option-inner-tabs .theme-option-inner-tab-group').hide();
		$('.theme-option-inner-tabs .theme-option-inner-tab-group.active').show();
		var allPanelsThis = $('.theme-option-inner-tabs .theme-option-inner-tab');
		
		$('.theme-option-inner-tabs .theme-option-inner-tab').click(function() {
			$this = $(this);
			$targetThis =  $this;
			$target =  $this.next();
			
		if(!$target.hasClass('active')){			
			allPanels.removeClass('active').slideUp();
			allPanelsThis.removeClass('active');
			$target.addClass('active').slideDown();
			$targetThis.addClass('active');
		}		
		return false;
		});
	})(jQuery);
	(function ($) {
        $('.theme-tabs-drag .theme-tabs').slideToggle('shlow');
        $('.theme-tabs-drag > h3').click(function () {
            $(this).parent().children('.theme-tabs').slideToggle('shlow');
        });
    })(jQuery);

	//callback handler for form submit
jQuery("#form-option").submit(function(e)
{
	var postData = jQuery(this).serializeArray();
	var formURL = jQuery(this).attr("action");
	jQuery.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		async:false,
		success:function(data, textStatus, jqXHR)
	{
		//data: return data from server
		jQuery( ".theme-option-themes .btn-save input" ).addClass( "save-details" );
		jQuery(".theme-option-themes .btn-save input").val('Options saved successfully');
		setTimeout(function () {
            jQuery( ".theme-option-themes .btn-save input" ).removeClass( "save-details" );
            jQuery(".theme-option-themes .btn-save input").val('Save options');
            
        }, 5000);

	},
	error: function(jqXHR, textStatus, errorThrown)
		{
		//if fails
		}
	});
	
	e.preventDefault(); //STOP default action
	});
	
	jQuery('.caption_color').wpColorPicker();
});

jQuery(document).ready(function () {

    jQuery('#homepagesettings').sortable({
        revert: true,
        handle: '.sortable-handle',
        placeholder: "highlight",
        start: function (event, ui) {
            ui.item.toggleClass("highlight");
        },
        stop: function (event, ui) {
            var data = jQuery(this).sortable("toArray");
            jQuery.ajax({
                data: {
                    action: 'avocation_theme_options_order',
                    data: data,
                },
                type: 'POST',
                url: admin_url,
                cache: false,
                success: function (data) {
                    ui.item.toggleClass("highlight");
                    //jQuery('.remove-slider-class').text(data);
                }
            });
        }
    });

// Export Theme options deta
    jQuery('#export_start').bind('click', function () {	
        jQuery.ajaxSetup({cache: false});
        jQuery.post(
                ajaxurl,
                {
                    action: "avocation_exportdata"
                },
        function (data) {
            if (data.errors) {
                alert('Error in Export!');
            } else {
                //update nonce
                jQuery("#exportdata").val(data.avocation_exportdata);
                jQuery("#exportdata").slideDown(500);
            }
        }, "json");
        jQuery.ajaxSetup({cache: true});
    });

 // Import Theme options deta
    jQuery('#import_start').bind('click', function () {

        if (jQuery('#import_data').val() == '')
        {
            jQuery('#import_data').css({'border': '1px solid red'});
            return false;
        }
        jQuery.ajaxSetup({cache: false});
        jQuery.post(
                ajaxurl,
                {
                    import_data: jQuery("#import_data").val(),
                    action: "avocation_importdata"
                },
        function (data) {
            if (data.avocation_import_e) {
                alert('Error in Import! :(');
            } else {
                //update nonce
                jQuery('.button-primary').val('Import data successfully.')
		jQuery( ".theme-option-themes .btn-save input" ).addClass( "save-details" );
                setTimeout(function () {
		jQuery( ".theme-option-themes .btn-save input" ).removeClass( "save-details" );
                    jQuery('.button-primary').val('Save Options')
                }, 1500);
                //location.reload(true);
            }
        }, "json");
        jQuery.ajaxSetup({cache: true});
    });

});



   
