jQuery(document).on( 'ready widget-updated widget-added', function()  {
     //  Accordion Panels
   
    jQuery(".accordion_advance h4").click(function () {
        jQuery(this).next(".pane_advance").slideToggle("slow").siblings(".pane_advance:visible").slideUp("slow");
        jQuery(this).toggleClass("current");
        jQuery(this).siblings("h4").removeClass("current");
    });
  });

jQuery(document).ready( function($) {

    function media_upload(button_class) {

        var _custom_media = true,

        _orig_send_attachment = wp.media.editor.send.attachment;



        $('body').on('click', button_class, function(e) {

            var button_id ='#'+$(this).attr('id');

            var self = $(button_id);

            var send_attachment_bkp = wp.media.editor.send.attachment;

            var button = $(button_id);

            var id = button.attr('id').replace('_button', '');

            _custom_media = true;

            wp.media.editor.send.attachment = function(props, attachment){

                if ( _custom_media  ) {

                    $('.custom_media_id').val(attachment.id);

                    $('.custom_media_url').val(attachment.url);

                    $('.custom_media_image').attr('src',attachment.url).css('display','block');

                } else {

                    return _orig_send_attachment.apply( button_id, [props, attachment] );

                }

            }

            wp.media.editor.open(button);

                return false;

        });

    }

    media_upload('.custom_media_button.button');

});


	
		

//Widget MEDIAPICKER PLUGIN
	 //MEDIA PICKER FUNCTION
	 function mediaPicker(pickerid){
		var custom_uploader;
		var row_id 
        //e.preventDefault();
		row_id = jQuery('#'+pickerid).prev().attr('id');

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
        	custom_uploader.open();
        	return;
        }

        //CREATE THE MEDIA WINDOW
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Insert Images',
            button: {
                text: 'Insert Images'
            },
			type: 'image',
            multiple: false
        });

        //"INSERT MEDIA" ACTION. PREVIEW IMAGE AND INSERT VALUE TO INPUT FIELD
		custom_uploader.on('select', function(){
		var selection = custom_uploader.state().get('selection');
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				//INSERT THE SRC IN INPUT FIELD
				jQuery('#' + row_id).val(""+attachment.url+"").trigger('change');
					//APPEND THE PREVIEW IMAGE
					jQuery('#' + row_id).parent().find('.media-picker-preview, .media-picker-remove').remove();
					if(attachment.sizes.medium){
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.sizes.medium.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}else{
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}

			});
			jQuery(".media-picker-remove").on('click',function(e) {
				jQuery(this).parent().find('.media-picker').val('').trigger('change');
				jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
			});
		});
        //OPEN THE MEDIA WINDOW
        custom_uploader.open();

    }


jQuery(document).on( 'ready widget-updated widget-added', function() {
	
	//jQuery(".media-picker-remove").unbind( "click" );
	jQuery(".media-picker-remove").on('click',function(e) {
		jQuery(this).parent().find('.media-picker').val('').trigger('change');
		jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
	});
	
	//jQuery( ".media-picker-button").unbind( "click" );
	 

});

jQuery(document).ready(function ($) {
jQuery('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
jQuery('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});

// Easy Responsive Tabs 
(function ($) {
    $.fn.extend({
        easyResponsiveTabs: function (options) {
            //Set the default values, use comma to separate the settings, example:
            var defaults = {
                type: 'default', //default, vertical, accordion;
                width: 'auto',
                fit: true,
                closed: false,
                activate: function(){}
            }
            //Variables
            var options = $.extend(defaults, options);            
            var opt = options, jtype = opt.type, jfit = opt.fit, jwidth = opt.width, vtabs = 'vertical', accord = 'accordion';

            //Events
            $(this).bind('tabactivate', function(e, currentTab) {
                if(typeof options.activate === 'function') {
                    options.activate.call(currentTab, e)
                }
            });

            //Main function
            this.each(function () {
                var $respTabs = $(this);
                var $respTabsList = $respTabs.find('ul.resp-tabs-list');
                $respTabs.find('ul.resp-tabs-list li').addClass('resp-tab-item');
                $respTabs.css({
                    'display': 'block',
                    'width': jwidth
                });

                $respTabs.find('.resp-tabs-container > div').addClass('resp-tab-content');
                jtab_options();
                //Properties Function
                function jtab_options() {
                    if (jtype == vtabs) {
                        $respTabs.addClass('resp-vtabs');
                    }
                    if (jfit == true) {
                        $respTabs.css({ width: '100%', margin: '0px' });
                    }
                    if (jtype == accord) {
                        $respTabs.addClass('resp-easy-accordion');
                        $respTabs.find('.resp-tabs-list').css('display', 'none');
                    }
                }

                //Assigning the h2 markup to accordion title
                var $tabItemh2;
                $respTabs.find('.resp-tab-content').before("<h2 class='resp-accordion' role='tab'><span class='resp-arrow'></span></h2>");

                var itemCount = 0;
                $respTabs.find('.resp-accordion').each(function () {
                    $tabItemh2 = $(this);
                    var innertext = $respTabs.find('.resp-tab-item:eq(' + itemCount + ')').html();
                    $respTabs.find('.resp-accordion:eq(' + itemCount + ')').append(innertext);
                    $tabItemh2.attr('aria-controls', 'tab_item-' + (itemCount));
                    itemCount++;
                });

                //Assigning the 'aria-controls' to Tab items
                var count = 0,
                    $tabContent;
                $respTabs.find('.resp-tab-item').each(function () {
                    $tabItem = $(this);
                    $tabItem.attr('aria-controls', 'tab_item-' + (count));
                    $tabItem.attr('role', 'tab');

                    //First active tab, keep closed if option = 'closed' or option is 'accordion' and the element is in accordion mode 
                    if(options.closed !== true && !(options.closed === 'accordion' && !$respTabsList.is(':visible')) && !(options.closed === 'tabs' && $respTabsList.is(':visible'))) {                  
                        $respTabs.find('.resp-tab-item').first().addClass('resp-tab-active');
                        $respTabs.find('.resp-accordion').first().addClass('resp-tab-active');
                        $respTabs.find('.resp-tab-content').first().addClass('resp-tab-content-active').attr('style', 'display:block');
                    }

                    //Assigning the 'aria-labelledby' attr to tab-content
                    var tabcount = 0;
                    $respTabs.find('.resp-tab-content').each(function () {
                        $tabContent = $(this);
                        $tabContent.attr('aria-labelledby', 'tab_item-' + (tabcount));
                        tabcount++;
                    });
                    count++;
                });

                //Tab Click action function
                $respTabs.find("[role=tab]").each(function () {
                    var $currentTab = $(this);
                    $currentTab.click(function () {

                        var $tabAria = $currentTab.attr('aria-controls');

                        if ($currentTab.hasClass('resp-accordion') && $currentTab.hasClass('resp-tab-active')) {
                            $respTabs.find('.resp-tab-content-active').slideUp('', function () { $(this).addClass('resp-accordion-closed'); });
                            $currentTab.removeClass('resp-tab-active');
                            return false;
                        }
                        if (!$currentTab.hasClass('resp-tab-active') && $currentTab.hasClass('resp-accordion')) {
                            $respTabs.find('.resp-tab-active').removeClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content-active').slideUp().removeClass('resp-tab-content-active resp-accordion-closed');
                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active');

                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + ']').slideDown().addClass('resp-tab-content-active');
                        } else {
                            $respTabs.find('.resp-tab-active').removeClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content-active').removeAttr('style').removeClass('resp-tab-content-active').removeClass('resp-accordion-closed');
                            $respTabs.find("[aria-controls=" + $tabAria + "]").addClass('resp-tab-active');
                            $respTabs.find('.resp-tab-content[aria-labelledby = ' + $tabAria + ']').addClass('resp-tab-content-active').attr('style', 'display:block');
                        }
                        //Trigger tab activation event
                        $currentTab.trigger('tabactivate', $currentTab);
                    });
                    //Window resize function                   
                    $(window).resize(function () {
                        $respTabs.find('.resp-accordion-closed').removeAttr('style');
                    });
                });
            });
        }
    });
})(jQuery);
